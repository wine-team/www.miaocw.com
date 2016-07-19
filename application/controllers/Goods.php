<?php
class Goods extends MW_Controller{
	
	public function _init() {
		
		$this->load->model('cms_block_model','cms_block');
		$this->load->model('mall_brand_model','mall_brand');
		$this->load->model('mall_category_model','mall_category');
		$this->load->model('mall_cart_goods_model','mall_cart_goods');
	}
		
	 /**
	 * 搜索页
	 */
	public function search(){
		
		$data['head_menu'] = 'on';
		$data['cms_block'] = $this->cms_block->findByBlockIds(array('home_keyword','foot_recommend_img','foot_speed_key'));
		$data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByUid($this->uid)->num_rows() : 0;
		$this->load->view('goods/search',$data);
	}
	
	 /**
	 * 女性
	 */
	public function femal(){
		
	    $data['head_menu'] = 'on';
	    $data['cms_block'] = $this->cms_block->findByBlockIds(array('home_keyword','foot_recommend_img','foot_speed_key'));
	    $data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByUid($this->uid)->num_rows() : 0;
	    $this->load->view('goods/femal',$data);
	}
	
	 /**
	 *产品详情
	 */
	public function detail(){
		
		$data['head_menu'] = 'on';
		$data['cms_block'] = $this->cms_block->findByBlockIds(array('home_keyword','foot_recommend_img','foot_speed_key'));
		$data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByUid($this->uid)->num_rows() : 0;
		$this->load->view('goods/detail',$data);
	}
	
	
	

}