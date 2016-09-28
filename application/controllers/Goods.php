 <?php
class Goods extends MW_Controller{
	
	public function _init() {
		
		$this->load->helper('ip');
	    $this->load->library('pagination');
	    $this->load->library('qrcode',null,'QRcode');
	    $this->load->model('region_model', 'region');
		$this->load->model('advert_model','advert');
		$this->load->model('cms_block_model','cms_block');
		$this->load->model('mall_brand_model','mall_brand');
		$this->load->model('mall_enshrine_model','mall_enshrine');
		$this->load->model('mall_category_model','mall_category');
		$this->load->model('mall_cart_goods_model','mall_cart_goods');
		$this->load->model('mall_goods_base_model','mall_goods_base');
		$this->load->model('mall_order_reviews_model','mall_order_reviews');
	    $this->load->model('mall_attribute_value_model','mall_attribute_value');
	    $this->load->model('mall_freight_price_model','mall_freight_price');
	    $this->load->model('mall_freight_tpl_model','mall_freight_tpl');
	}
		
	 /**
	 * 搜索页
	 */
	public function search($pg = 1){
		
	    $page_num = 20;
	    $num = ($pg-1)*$page_num;
	    $searchTotal = $this->mall_goods_base->searchTotal($this->input->get());
	    $config['first_url'] = base_url('goods/search').$this->pageGetParam($this->input->get());
	    $config['suffix'] = $this->pageGetParam($this->input->get());
	    $config['base_url'] = base_url('goods/search');
	    $config['total_rows'] = $searchTotal->num_rows();
	    $config['uri_segment'] = 3;
	    $this->pagination->initialize($config);
	    $data = $this->common();
	    $data['pg_link'] = $this->pagination->create_links(); 
	    $data['page_list'] = $this->mall_goods_base->page_list($page_num, $num, $this->input->get())->result(); 
	    $data['all_pg'] = ceil($config['total_rows']/$page_num);
	    $data['all_rows'] = $config['total_rows'];
	    $data['pg_now'] = $pg;
	    $category = array(); 
	    foreach ($searchTotal->result() as $s) {
	        if (!isset($category[$s->category_id]) && !empty($s->category_id)) {
	            $category[$s->category_id] = $s->cat_name;
	        }
	    } 
	    $data['category_arr'] = $category;
	    $data['price_arr'] = get_priceRange();
	    $data['brand_arr'] = $this->mall_brand->findBrand()->result();
		$data['order_arr'] = array('1'=>'最新上架','2'=>'热销','3'=>'热门', '4'=>'价格从低到高', '5'=>'价格从高到低');
		$this->load->view('goods/search',$data);
	}
	
	 /**
	  *女性
	 */
	public function femal(){
		
		$data = $this->common();
	    $data['advert'] = $this->advert->findBySourceState($source_state=3);
	    $data['child_cat'] = $this->mall_category->getChildCat($cat_id=2);
	    $data['recommend'] = $this->mall_goods_base->getGoodsBase(array('category_id'=>2,'num'=>4,'sort'=>'tour_count')); //浏览量最高的   
	    $data['mall_goods'] = $this->mall_goods_base->getGoodsBase(array('category_id'=>2,'num'=>40,'sort'=>'position')); //按照推荐排序
	    $this->load->view('goods/femal',$data);
	}
	
	 /**
	 *产品详情
	 */
	public function detail(){
		
		$data = $this->common();
		$goods_id = $this->input->get('goods_id',true);
		$res = $this->mall_goods_base->getGoodsByGoodsId($goods_id);
		if ($res->num_rows()<=0) {
		   $this->error('goods/search','','搜索无结果');
		}
		$goods = $res->row(0);
		$this->seeHistory($goods);
		$attr_value = json_decode($goods->attr_value,true);
		$this->mall_goods_base->setMallCount($goods_id);
		$data['goods'] = $goods;
		$data['ewm'] = $this->productEwm($goods_id);
		$data['enshrine'] = $this->isEnshrine($goods_id);
		$data['attr_value'] = $attr_value;
		$data['attribute_value'] = $this->getAttrValues($attr_value);
		$data['countReviews'] = $this->getReviewsArray($goods_id);
		$this->load->view('goods/detail',$data);
	}
	
	 /**
	 * 获取所有的规格属性
	 * @param unknown $attr_set_id
	 */
	public function getAttrValues($attr_value) {
		
		if (empty($attr_value)) {
			return false;
		}
		$idArray = array();
		foreach($attr_value as $group_id=>$val) {
			foreach ($val['group_value'] as $attr_value_id=>$item) {
				$idArray[] = $attr_value_id;
			}
		}
		if (empty($idArray)) {
			return false;
		}
		$f = 'attr_value_id,attr_name';
		$res = $this->mall_attribute_value->findByRes(array('attr_value_id'=>$idArray),$f);
	    if ($res->num_rows()<=0){
	    	return false;
	    }
	    $attr = array();
	    foreach ($res->result() as $item){
	    	$attr[$item->attr_value_id] = $item->attr_name;
	    }
	    return $attr;
	}
	
	/**
	 * 推荐产品
	 */
	public function ajaxMoreSee(){
		
		$uid = base64_decode($this->input->post('from',true));
		$pg = $this->input->post('pg') ? (int)$this->input->post('pg') : 2;
		$pgNum = 3;
		$num = ($pg-1)*$pgNum;
		$result = $this->mall_goods_base->getRecommend($uid,$num,$pgNum);
		if( $result->num_rows() <= 0 ){
			$pg = 1;
			$result = $this->mall_goods_base->getRecommend($uid,0,$pgNum);
		}
		$data['recommond'] = $result;
		echo json_encode(
				array(
						'status' => true,
						'pg'     => $pg,
						'html'   => $this->load->view('goods/moresee',$data,true)
				));exit;
	}
	
	 /**
	 * 是否收藏
	 * @param unknown $goods_id
	 */
	public function isEnshrine($goods_id) {
		
		if (empty($this->uid)) {
		   return false; 
		}
		$result = $this->mall_enshrine->findByEnshrine(array('uid'=>$this->uid, 'goods_id'=>$goods_id));
	    if ($result->num_rows()>0) {
	    	return true;
	    }
	    return false;
	}
	
	 /**
	 * 添加评论数组
	 * @param unknown $attr_id
	 */
	public function getReviewsArray($goods_id){
		 
		$up = 0;
		$middle = 0;
		$low = 0;
		$totalResult =  $this->mall_order_reviews->countReviewsTotal($goods_id);
		if($totalResult->num_rows() > 0){
			 
			foreach ($totalResult->result() as $item){
				switch ($item->score){
					case '5' :
					case '4' : $up += $item->total;break; //好评
					case '3' : $middle += $item->total;break;//中评
					case '2' :
					case '1' : $low += $item->total;break; //差评
				}
			}
			return array('up'=>$up,'middle'=>$middle,'low'=>$low,'all'=>$up+$middle+$low);
		}
		return array();
	}
	
	/**
	 * 二维码的生产
	 * @param unknown $attr_id
	 */
	public function productEwm($goods_id){
		 
		$url = $this->config->main_base_url.'goods/detail?goods_id='.$goods_id.'.html';
		$name = 'shangpin-'.$goods_id.'.png';
		$path = $this->config->upload_image_path('common/ewm').$name;
		$this->QRcode->png($url,$path,4,10);
		return $name;
	}
	
	/**
	 * 浏览记录
	 * @param unknown $tourismGoods
	 */
	public function seeHistory($mallGoods){
		 
		$historyPram = array();
		$historyCookie = get_cookie('historyPram');
		if( !empty($historyCookie) ){
			$historyPram = unserialize(base64_decode($historyCookie));
			if( !in_array($mallGoods->goods_id,$historyPram) ){
				array_unshift($historyPram, $mallGoods->goods_id);
			}
			if( count($historyPram)>16 ){
				array_pop($historyPram);
			}
		}else{
			$historyPram[] = $mallGoods->goods_id;
		}
		set_cookie('historyPram',base64_encode(serialize($historyPram)),14400);
	}
	
	 /**
	 *获取特卖产品
	 */
	public function getHot(){
		
		$param['num'] = 5;
		$param['attr_set_id'] = trim($this->input->post('cat',true));
		$data['samegoods'] = $this->mall_goods_base->getRecommendGoodsBase($param);
	    $data['allgoods'] = $this->mall_goods_base->getRecommendGoodsBase(array('num'=>$param['num']));
	    echo json_encode(array(
	    	'status' => true,
	        'same'   => $this->load->view('goods/samehot',$data,true),
	    	'all'    => $this->load->view('goods/allhot',$data,true)
	    )); exit;
	}
	
	 /**
	 * 收藏
	 */
	public function enshrine() {
		
		$uid = $this->uid;
		$goods_id = base64_decode($this->input->post('goods_id',true));
		if (empty($uid)) {
			echo json_encode(array(
				  'status' => false,
				  'message' => $this->config->passport_url
			));exit;
		}
		$insert = false;
		$delete = false;
		$result = $this->mall_enshrine->findByEnshrine(array('uid'=>$uid, 'goods_id'=>$goods_id));
		if ($result->num_rows() > 0) {
			$delete = $this->mall_enshrine->deleteByEnshrine(array('uid'=>$uid, 'goods_id'=>$goods_id));
		} else {
			$insert = $this->mall_enshrine->insert($uid,$goods_id);
		}
		if ($insert || $delete) {
			echo json_encode(array(
					'status'   => true,
					'isShrine' => $insert ? true : false,
					'message'  => $insert ? '收藏成功' : '取消收藏',
			));exit;
		} else {
			echo json_encode(array(
					'status'   => false,
					'message' => '服务器异常，请稍候再试'
			));exit;
		}
	}
	
	/**
	 *立即购买
	*/
	public function purchase_confirm()
	{
		delete_cookie('cart');
		$uid = $this->uid;
		if (!$uid) {
			echo json_encode(array(
					'status' => 1,
					'msg'    => '请先登录'
			)); exit;
		}
		$specArray = '';
		$spec = $this->input->post('spec');
		$goods_id = $this->input->post('goods_id') ? (int)(base64_decode($this->input->post('goods_id'))) : 0;
		$qty = $this->input->post('qty') ? (int)$this->input->post('qty') : 0;
		if (!empty($spec)) {
			$specArray = implode(',',$spec);
		}
		if (!$goods_id || !$qty) {
			echo json_encode(array(
					'status' => 0,
					'msg'    => '找不到该商品的信息'
			));exit;
		}
		//判断是否存在该商品 且商品仍然有库存  和 是否限购
		$result = $this->mall_goods_base->getGoodsByGoodsId($goods_id);
		if ($result->num_rows()<=0) {
			echo json_encode(array(
					'status' => 0,
					'msg'    => '找不到该商品的信息'
			));exit;
		}
		$result = $result->row(0);
		if ($result->limit_num > 0){
			if($result->limit_num < $qty){
				echo json_encode(array(
						'status' => 0,
						'msg'    => '限购'.$result->limit_num.'件'
				));exit;
			}
		}
		if ($result->in_stock < $qty) {
			echo json_encode(array(
					'status' => 0,
					'msg'    => '库存不足'
			));exit;
		}
		//加入商品价格记录 判断商品是否重复
		$limit_num = $result->limit_num;
		$param['uid'] = $uid;
		$param['goods_id'] = $goods_id;
		$info = $this->mall_cart_goods->getCartGoods($param);
		if ($info->num_rows()>0) {
			$info = $info->row(0);
			if ($info->goods_num + $qty < $result->in_stock){
				if ( ($info->goods_num >= $limit_num) && ($limit_num>0)) {
					$status = $this->mall_cart_goods->updateCart($info->id,$limit_num,$specArray);
				} else {
					$qty = $limit_num > 0 ? ( (($info->goods_num + $qty) >= $limit_num ) ? ($limit_num-($info->goods_num)) : $qty ) :  $qty;
					$status = $this->mall_cart_goods->updateQty($info->id,$qty,$specArray);
				}
			} else {
				$status = $this->mall_cart_goods->updateCart($info->id,$result->in_stock,$specArray);
			}
			$cartId = $info->id;
		} else {
			$params['uid'] = $uid;
			$params['attribute_value'] = $specArray;
			$params['goods_id'] = $goods_id;
			$params['goods_num'] = $qty;
			$cartId = $this->mall_cart_goods->addQty($params);
		}
		if ($cartId) {
			$cookie_param = array();
			$cookie_param['from'] = 'detail';
			$cookie_param['id'][$cartId] = $cartId;
			$cookie_param['qty'][$cartId] = $qty;
			$cookie_param['goods_id'][$cartId] = $goods_id;
			set_cookie('cart', base64_encode(serialize($cookie_param)), 86500);
			echo json_encode(array(
					'status' => 2,
					'msg'    => site_url('cart/grid')
			));exit;
		}
		echo json_encode(array(
				'status' => 0,
				'msg'    => '立即购买失败,请刷新后尝试'
		));exit;
	}
	
	
	 /**
	 * 公用的方法 
	 */
	public function common(){
    
		$_data['head_menu'] = 'on';
		$_data['cms_block'] = $this->cms_block->findByBlockIds(array('home_keyword','foot_recommend_img','search_keyword','foot_speed_key','femal_head_recommend'));
		$_data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByRes(array('uid'=>$this->uid))->num_rows() : 0;
	    return $_data;
	}
	
	 /**
	  **--运费信息
	 */
	public function ajaxFreight() {
		
		$this->d = $this->input->post();
		if (empty($this->d['goods_id']) || empty($this->d['qty'])) {
			$this->jsen(0,true);
		}
		$qty = (int)$this->d['qty'];
		$f = 'goods_weight,supplier_id,shop_price,promote_price,promote_start_date,promote_end_date,freight_id,freight_cost';
	    $res = $this->mall_goods_base->getGoodsByGoodsId($this->d['goods_id'],$f);
	    if ($res->num_rows()<=0) {
	    	$this->jsen(0,true);
	    }
	    $goods = $res->row(0);
	    if ( !empty($goods->promote_price) && !empty($goods->promote_start_date) && !empty($goods->promote_end_date) && ($goods->promote_start_date<=time()) && ($goods->promote_end_date>=time())){
	     	$actual_price = $goods->promote_price;
	    } else {
	     	$actual_price = $goods->shop_price;
	    }
	    $total_price = bcmul($actual_price,$qty,2);
	    if (bcsub($total_price,99,2)>=0) { // 满99元包邮
	    	$this->jsen(0,true);
	    }
	    if ($goods->freight_id==0) { 
	    	$this->jsen($goods->freight_cost,true);
	    }
	    $freight = $this->mall_freight_tpl->getTransports(array('uid'=>$goods->supplier_id,'freight_id'=>$goods->freight_id));
	    if (empty($freight)) {
	    	$this->jsen($goods->freight_cost,true);
	    }
	    $transport = $this->mall_freight_price->getFreightRow(array('freight_id'=>$goods->freight_id,'area'=>trim($this->d['province'])));
	    if (empty($transport)) {
	    	$this->jsen($goods->freight_cost,true);
	    }
	    if ($freight->methods==1) { // 按件
	    	if ($transport->add_unit == 0) {  //如果没有增加的单位为零，直接为第一份的价格
	    		$this->jsen($transport->first_price,true);
	    	} else {
	    		if ($qty <= $transport->first_unit) {
	    			$this->jsen($transport->first_price,true);
	    		}else{
	    			$over_unit = $qty - $transport->first_unit;//计算超出部分
	    			$over_price = ceil($over_unit / $transport->add_unit) * $transport->add_price;//超出部分价格
	    			$total_price = bcadd($over_price,$transport->first_price,2);
	    			$this->jsen($total_price,true);
	    		}
	    	}
	    }
	    if ( $freight->methods == 2 ) { //按重量计算
	    	$total_weight = bcmul($goods->goods_weight/1000,$qty,3);  // g转化成kg
	    	if ($transport->add_unit == 0) {  // 如果没有增加的单位为零，直接为第一份的价格
	    		$this->jsen($transport->first_price,true);
	    	}else{
	    		if (bcsub($transport->first_unit,$total_weight,3)>=0) {
	    			$this->jsen($transport->first_price,true);
	    		} else { //重量大于首重
	    			$over_weight = bcsub($total_weight , $transport->first_unit,3);//计算超出部分
	    			$over_price = ceil($over_weight / $transport->add_unit) * $transport->add_price;
	    			$total_price = bcadd($over_price,$transport->first_price,2);
	    			$this->jsen($total_price,true);
	    		}
	    	}
	    }
	    $this->jsen($goods->freight_cost,true);
	}
}