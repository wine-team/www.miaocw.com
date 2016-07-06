<?php
class Cart extends MW_Controller{

	public function _init() {

		$this->load->model('mall_cart_goods_model','mall_cart_goods');
	}

	/**
	 **头部购物车的加载
	 */
	public function getCart(){
	
		$callback = $this->input->get('callback');
		if (empty($this->uid)) {
			$data = array();
			$jsonData = json_encode(array(
					'status' => true,
					'html'   => $this->load->view('home/cartlist',$data,true)
			));
			echo $callback . '(' . $jsonData . ')';exit;
		}
		$data['cart_goods'] = $this->mall_cart_goods->getCartGoodsByUid($this->uid);
		$jsonData = json_encode(array(
				'status' => true,
				'html'   => $this->load->view('home/cartlist',$data,true)
		));
		echo $callback . '(' . $jsonData . ')';exit;
	}


}