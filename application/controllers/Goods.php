<?php
class Goods extends MW_Controller{
	
	public function _init() {
		
		$this->load->helper('ip');
	    $this->load->library('pagination');
		$this->load->model('advert_model','advert');
		$this->load->model('cms_block_model','cms_block');
		$this->load->model('mall_brand_model','mall_brand');
		$this->load->model('mall_enshrine_model','mall_enshrine');
		$this->load->model('mall_category_model','mall_category');
		$this->load->model('mall_cart_goods_model','mall_cart_goods');
		$this->load->model('mall_goods_base_model','mall_goods_base');
	}
		
	 /**
	 * 搜索页
	 */
	public function search($pg = 1){
		
	    $page_num = 20;
	    $num = ($pg-1)*$page_num;
	    $config['first_url'] = base_url('Goods/search').$this->pageGetParam($this->input->get());
	    $config['suffix'] = $this->pageGetParam($this->input->get());
	    $config['base_url'] = base_url('Goods/search');
	    $config['total_rows'] = $this->mall_goods_base->searchTotal($this->input->get());
	    $config['uri_segment'] = 3;
	    $this->pagination->initialize($config);
	    $data = $this->common();
	    $data['pg_link'] = $this->pagination->create_links(); 
	    $data['page_list'] = $this->mall_goods_base->page_list($page_num, $num, $this->input->get())->result(); 
	    $data['all_pg'] = ceil($config['total_rows']/$page_num);
	    $data['all_rows'] = $config['total_rows'];
	    $data['pg_now'] = $pg;
	    $data['order_arr'] = array('goods_id'=>'最新上架','sale_count'=>'热销','tour_count'=>'热门');
		$this->load->view('goods/search',$data);
	}
	
	 /**
	  *女性
	 */
	public function femal(){
		
		$data = $this->common();
	    $data['advert'] = $this->advert->findBySourceState($source_state=3);
	    $data['child_cat'] = $this->mall_category->getChildCat($cat_id=2);
	    $data['recommend'] = $this->mall_goods_base->getRecommendGoodsBase(array('category_id'=>2,'hot_recommend'=>2,'num'=>4));
	    $data['mall_goods'] = $this->mall_goods_base->getGoodsBase(array('category_id'=>2,'num'=>40));
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
		//$uidGoods = $this->mall_goods_base->getRecommend($goods->supplier_id,$goods->goods_id);
		$data['goods'] = $goods;
		$data['address'] = getIpLookup();
		$this->load->view('goods/detail',$data);
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
		$res = $this->mall_enshrine->insert($uid,$goods_id);
		if ($res) {
			$this->jsen('收藏成功',true);
		}
		$this->jsen('收藏失败');
	}
	
	/**
	 * 公用的方法 
	 */
	public function common(){

		$_data['head_menu'] = 'on';
		$_data['cms_block'] = $this->cms_block->findByBlockIds(array('home_keyword','foot_recommend_img','foot_speed_key','femal_head_recommend'));
		$_data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByUid($this->uid)->num_rows() : 0;
	    return $_data;
	}
}