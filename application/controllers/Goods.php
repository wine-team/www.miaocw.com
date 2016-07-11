<?php
class Goods extends MW_Controller{
	
	public function _init() {
		
		$this->load->model('advert_model','advert');
		$this->load->model('cms_block_model','cms_block');
		$this->load->model('mall_brand_model','mall_brand');
		$this->load->model('help_center_model','help_center');
		$this->load->model('mall_category_model','mall_category');
		$this->load->model('mall_cart_goods_model','mall_cart_goods');
	}
		
	/**
	 **产品页
	*/
	public function grid(){

		$data['cms_block'] = $this->cms_block->findByBlockIds(array('home_keyword'));
		$data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByUid($this->uid)->num_rows() : 0; 
		$this->load->view('home/grid',$data);
	}
	
	
}