<?php
class Cart extends MW_Controller{

	public function _init() {

		$this->load->model('mall_cart_goods_model','mall_cart_goods');
	}

	/**
	 **头部购物车的加载
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