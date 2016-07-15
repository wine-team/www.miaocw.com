<?php
class Cart extends CS_Controller {

	public function _init() {

		$this->load->model('region_model', 'region');
		$this->load->model('mall_cart_goods_model','mall_cart_goods');
	}

	  /**
	  * 首页
	  */
     public function grid(){
     	
     	$data = array();
     	$this->load->view('cart/grid',$data);
     }

}