<?php
class Home extends MW_Controller{
	
	public function _init() {
		
		$this->load->model('advert_model','advert');
		$this->load->model('cms_block_model','cms_block');
		$this->load->model('mall_category_model','mall_category');
		$this->load->model('mall_cart_goods_model','mall_cart_goods');
	}
		
	/**
	 **首页
	*/
	public function grid(){

		$data['advert'] = $this->advert->findBySourceState($source_state=1);
		$data['cms_block'] = $this->cms_block->findByBlockIds(array('home_keyword','head_right_advert','head_today_recommend','head_recommend_down','head_hot_keyword'));
		$data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByUid($this->uid)->num_rows() : 0; 
		$this->load->view('home/grid',$data);
	}
	
	/**
	**购物车的加载
	*/
	public function getCart(){
		
		if (empty($this->uid)) {
		   $data = array();
		   echo json_encode(array(
		   	    'status' => true,
		   		'html'   => $this->load->view('home/cartlist',$data,true)
		   ));exit;
		}
		$data['cart_goods'] = $this->mall_cart_goods->getCartGoodsByUid($this->uid);
		echo json_encode(array(
				'status' => true,
				'html'   => $this->load->view('home/cartlist',$data,true)
		));exit;
	}
}