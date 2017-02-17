<?php
class Home extends MW_Controller {
	
	private $d;
	
	public function _init() {
		
		$this->d = $this->input->post();
		$this->load->model('m/advert_model','advert');
		$this->load->model('m/user_feedback_model','user_feedback');
		$this->load->model('m/mall_cart_goods_model','mall_cart_goods');
		$this->load->model('m/mall_goods_base_model','mall_goods_base');
		$this->load->model('m/sales_topic_model','sales_topic');
		$this->load->model('m/sales_topic_category_model','sales_topic_category');
	    $this->load->model('m/mall_category_model','mall_category');
	    $this->load->model('m/mall_order_reviews_model','mall_order_reviews');
	}
 	
	 /**
	 * 移动端首页幻灯片
	 */
	public function advert() {
		
		$f = 'advert_id,url,picture,title';
		$result = $this->advert->findBySourceState(4,$f);
		if ($result->num_rows()<=0) {
			$this->jsonMessage('暂无幻灯片');
		}
		$advert = $result->result();
		$this->jsonMessage('',$advert);
	}
	
	 /**
	 * 首页分类和幻灯片
	 */
	public function homeCategory() {
		
		$salesId = array(2,3,5,6,7);
		$sf = 'sales_id,sales_name,link_url,image';
		$cf = 'sales_id,title,link_url';
		$result = $this->sales_topic->getSalesTopic($salesId,$sf);
		$salesResult = $result->result_array();
		$cateResult = $this->sales_topic_category->getSalesTopicCate($salesId,$cf);
	    foreach ($salesResult as $key=>$val) {
	    	$salesResult[$key]['category'] = $cateResult[$val['sales_id']];
	    }
	    $this->jsonMessage('',$salesResult);
	}
	
	 /**
	 * 首页热门推荐
	 */
	public function homeHot() {
		
		$goodsId = array();
		$result = $this->sales_topic_category->getSalesProduct($salesId=4);
	    foreach ($result->result() as $val) {
	    	$goodsId[] = $val->product_id;
	    }
	    $f = 'goods_id,goods_name,goods_img,shop_price,promote_price,promote_start_date,promote_end_date,sale_count';
	    $gResult = $this->mall_goods_base->getGoodsByGoodsId($goodsId,$f);
	    $goodResult = $gResult->result();
	    $this->jsonMessage('',$goodResult);
	} 
	
	 /**
	 * 获取推销产品
	 */
	public function getSale() {
		
		if (empty($this->d['sales_id'])) {
			$this->jsonMessage('请传促销ID');
		}
		$sales = $this->sales_topic->getSalesTopic($this->d['sales_id'],'image')->result();
		$cate = $this->sales_topic_category->getSalesTopicCate($this->d['sales_id'],'sales_id,category_id,title,note');
		$productId = $this->sales_topic_category->getSalesProduct($this->d['sales_id'],true);
	    foreach ($productId as $key => $val) {
	    	foreach ($val as $jj) {
	    		$goodsIdArray[] = $jj;
	    	}
	    }
	    $f = 'goods_id,goods_name,goods_brief,market_price,shop_price,promote_price,promote_start_date,promote_end_date,goods_img,sale_count';
	    $goods = $this->mall_goods_base->getGoodsByGoodsId($goodsIdArray,$f);
	    foreach ($goods->result() as $i=>$item) {
	    	$goodsArray[$item->goods_id] = $item;
	    }
	    foreach ($productId as $key=>$val) {
	    	foreach ($val as $jj) {
	    		$product[$key][] = $goodsArray[$jj];
	    	}
	    }
	    $this->jsonMessage('',array('sales'=>$sales,'cate'=>$cate,'goods'=>$product));
	}
		
	/**
	 ** 获取购物车
	*/
	public function getCart() {
		
		if (empty($this->d['uid'])) {
			$this->jsonMessage('请传用户UID');
		}
		$result = $this->mall_cart_goods->getCartGoodsByRes($this->d);
		$cartGoods = $result->result();
		$this->jsonMessage('',$cartGoods);
	}
	
	 /**
	  * 分类名称
	 */
	public function category() {
		
		$f = 'cat_id,cat_name,parent_id,cat_img';
		$result = $this->mall_category->getMallCategory('',$f);
	    $cate = $this->getCategory($result->result_array());
	    $this->jsonMessage('',$cate);
	}
	
	/**
	 * 获取所要分类数据
	 * @param unknown $cate
	 */
	private function getCategory($cateArray) {
		
		$ctParent = array();
		$ctChild = array();
		foreach ($cateArray as $key => $val) {
			if ($val['parent_id'] ==0) {
				$ctParent[] = $val;
			}
			if ($val['parent_id'] !=0) {
				$ctChild[$val['parent_id']][] = $val;
			}
		}
		foreach ($ctParent as $key=>$item) {
			$ctParent[$key]['child'] = $ctChild[$item['cat_id']];
		}
		return $ctParent;
	}
	
	 /**
	 * 搜索
	 */
	public function search() {
		
		$pg = isset($this->d['pg']) ? $this->d['pg'] : 1;
		$pgNum = isset($this->d['pgNum']) ? $this->d['pgNum'] : 20;
		$num = ($pg-1)*$pgNum;
		$f = 'goods_id,goods_name,goods_img,shop_price,provide_price,promote_price,promote_start_date,promote_end_date,freight_id,freight_cost,sale_count,review_count';
		$param = array(
			'order' => isset($this->d['order']) ? (int)$this->d['order'] : 1,
			'keyword' => empty($this->d['keyword']) ? '' : trim(addslashes($this->d['keyword'])),
			'category_id' => empty($this->d['cateid']) ? '' : (int)$this->d['cateid'],
		);
		$result = $this->mall_goods_base->page_list($pgNum,$num,$param,$f);
	    $goodsResult = $result->result();
	    $cateReult = $this->get_ct_param($this->d);
	    $total = $this->mall_goods_base->total($param);
	    $pgSum = ceil($total/$pgNum);
	    $infor = array(
	    	'total' => $total,
	    	'pgSum' => $pgSum,
	    	'pg' => $pg
	    );
	    $this->jsonMessage('',array('infor'=>$infor,'ct'=>$cateReult,'goods'=>$goodsResult));
	}
	
	
	 /**
	 * 获取分类
	 * @param unknown $param
	 */
	private function get_ct_param($param) {
		
		if (!empty($param['cateid'])) {
			
			$cf = 'cat_id,cat_name,parent_id,full_name';
			$ctRes = $this->mall_category->findCatById($cf,$param['cateid']);
			$ct = $ctRes->row(0);
			
			$parentId = ($ct->parent_id==0) ? $ct->cat_id : $ct->parent_id;
			$categoryResult = $this->mall_category->getChildCat($parentId,$cf);
			$category = $categoryResult->result();
			return array('self'=>$ct,'child'=>$category);
		}
		return array();
	}
	
	 /**
	  * 
	  * http://m.qu.cn/goods-4965.html
	 * 详情  http://m.qu.cn/goods-10266.html
	 */
	public function detail() {
		
		if (empty($this->d['goods_id'])) {
			$this->jsonMessage('请传产品ID');
		}
		$f = 'goods_id,goods_name,goods_img,goods_sku,market_price,shop_price,provide_price,in_stock,
			  promote_price,promote_start_date,promote_end_date,attr_set_id,goods_desc,wap_goods_desc,
			  attr_spec,attr_value,booking_limit,limit_num,freight_id,freight_cost,
			  sale_count';
		$result = $this->mall_goods_base->getGoodsByGoodsId($this->d['goods_id'],$f);
	    if ($result->num_rows()<=0) {
	    	$this->jsonMessage('无产品');
	    }
	    $goods = $result->row(0);
	    $this->seeHistory($goods); //设置浏览记录
	    $this->mall_goods_base->setMallCount($goods->goods_id); //设置产品浏览量
	    $mf = 'goods_id,goods_name,goods_img,shop_price,promote_price,promote_start_date,promote_end_date';
	    $more = $this->mall_goods_base->getByParam(array('attr_set_id'=>$goods->attr_set_id,'num'=>6),$mf);
	    $this->jsonMessage('',array('goods'=>$goods,'more'=>$more->result()));
	}
	
	 /**
	 * 获取产品评价
	 */
	public function goodsReview() {
		
		if (empty($this->d['goods_id'])) {
			$this->jsonMessage('请传产品ID');
		}
		$pg = isset($this->d['pg']) ? $this->d['pg'] : 1;
		$pgNum = isset($this->d['pgNum']) ? $this->d['pgNum'] : 20;
		$num = ($pg-1)*$pgNum;
		$result = $this->mall_order_reviews->page_list($pgNum, $num, array('goods_id'=>$this->d['goods_id'],'status'=>2));
	    $review = $result->result();
	    $this->jsonMessage('',$review);
	}
	
	/**
	 * 浏览记录
	 * @param unknown $tourismGoods
	 */
	public function seeHistory($mallGoods)
	{
		$historyPram = array();
		$historyCookie = get_cookie('historyPram');
		if (!empty($historyCookie)) {
			$historyPram = unserialize(base64_decode($historyCookie));
			if (!in_array($mallGoods->goods_id, $historyPram)) {
				array_unshift($historyPram, $mallGoods->goods_id);
			}
			if (count($historyPram) > 6) {
				array_pop($historyPram);
			}
		} else {
			$historyPram[] = $mallGoods->goods_id;
		}
		set_cookie('historyPram', base64_encode(serialize($historyPram)), 14400);
	}
	
	 /**
	 * 删除购物的产品
	 */
	public function deleteCart() {
		
		if (empty($this->d['uid'])) {
			$this->jsonMessage('请传用户UID');
		}
		if (empty($this->d['goods_id'])) {
			$this->jsonMessage('请传商品ID');
		}
		$result = $this->mall_cart_goods->deleteCartGoods($this->d);
		if ($result) {
			$this->jsonMessage('','删除成功');
		}
		$this->jsonMessage('删除失败');
	}
	
	 /**
	 * 添加购物车产品数量
	 */
	public function addCart() {
		
		if (empty($this->d['uid'])) {
			$this->jsonMessage('请传用户UID');
		}
		if (empty($this->d['goods_id'])) {
			$this->jsonMessage('请传产品ID');
		}
		$specArray = '';
	    $qty = empty($this->d['qty']) ? 1 : (int)$this->d['qty'];
	    if (!empty($this->d['spec'])) {
	    	$specArray = implode(',',$this->d['spec']);
	    }
	    $f = 'goods_id,limit_num,in_stock';
	    $result = $this->mall_goods_base->getGoodsByGoodsId($this->d['goods_id'],$f);
	    if ($result->num_rows()<=0) {
	    	$this->jsonMessage('该产品不存在');
	    }
	    $goods = $result->row(0);
	    if (!isset($goods->in_stock) || $goods->in_stock < $qty) {
	    	$this->jsonMessage('库存不足');
	    }
	    if ($goods->limit_num > 0){
	    	if($goods->limit_num < $qty){
	    		$this->jsonMessage('限购'.$goods->limit_num.'件');
	    	}
	    }
	    $limit_num = $goods->limit_num;
	    $info = $this->mall_cart_goods->getCartGoods(array('uid'=>$this->d['uid'],'goods_id'=>$this->d['goods_id']));
	    if ($info->num_rows()>0) {
	    	$info = $info->row(0);
	    	if ($info->goods_num + $qty < $goods->in_stock){
	    		if ( ($info->goods_num >= $limit_num) && ($limit_num>0)) {
	    			$status = $this->mall_cart_goods->updateCart($info->id,$limit_num,$specArray);
	    		} else {
	    			$qty = $limit_num > 0 ? ( (($info->goods_num + $qty) >= $limit_num ) ? ($limit_num-($info->goods_num)) : $qty ) :  $qty;
	    			$status = $this->mall_cart_goods->updateQty($info->id,$qty,$specArray);
	    		}
	    	} else {
	    		$status = $this->mall_cart_goods->updateCart($info->id,$goods->in_stock,$specArray);
	    	}
	    } else {
	    	$params['uid'] = $this->d['uid'];
	    	$params['attribute_value'] = $specArray;
	    	$params['goods_id'] = $this->d['goods_id'];
	    	$params['goods_num'] = $qty;
	    	$status = $this->mall_cart_goods->addQty($params);
	    }
	    if ($status) {
	    	$this->jsonMessage('','加入购物车成功');
	    }
	    $this->jsonMessage('加入购物车失败');
	}
	
	 /**
	 * 获取购物车信息--统计
	 */
	public function getCartInfor() {
		
		if (empty($this->d['uid'])) {
			$this->jsonMessage('请传用户UID');
		}
		$res = $this->mall_cart_goods->getCartGoodsByRes(array('uid'=>$this->d['uid']));
		$num = 0;
		$sum = 0;
		foreach ($res->result() as $item) {
			$num += $item->goods_num;
			$total_price = $this->getTotalPrice($item);
			$sum += bcmul($total_price,$item->goods_num,2);
		}
		echo json_encode(array(
				'status' => true,
				'num' => $num,
				'sum' => $sum
		));exit;
	}
	
	/**
	 * 获取实际价格  促销价和妙处网销售价
	 * @param unknown $val
	 */
	private function getTotalPrice($val)
	{
		if( !empty($val->promote_price) && !empty($val->promote_start_date) && !empty($val->promote_end_date) && ($val->promote_start_date<=time()) && ($val->promote_end_date>=time())) {
			$total_price =  $val->promote_price;
		} else {
			$total_price = $val->shop_price;
		}
		return $total_price;
	}
	
	/**
	 * 意见反馈表单提交
	 **/
	public function feedback() {
	
		$res = $this->user_feedback->insert($this->d);
		if ($res) {
			$this->jsonMessage('','插入成功');
		}
		$this->jsonMessage('网络繁忙，请稍后再试');
	}
	
}