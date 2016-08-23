<?php
class Cart extends CS_Controller {

	public function _init() {

		$this->load->model('region_model', 'region');
		$this->load->model('mall_cart_goods_model','mall_cart_goods');
		$this->load->model('mall_address_model','mall_address');
	}

	  /**
	  **首页
	  */
     public function grid(){
     	
     	$address = $this->mall_address->findAddressByRes(array('uid'=>$this->uid));
     	$data['address'] = null;
     	if ($address->num_rows()>0) {
     		$data['address'] = $address->row(0);
     		$data['province_id'] = $address->row(0)->province_id;
            $data['city_id'] = $address->row(0)->city_id;
            $data['district_id'] = $address->row(0)->district_id;
     	}
        $data['cart'] = $this->mall_cart_goods->getCartGoodsByUid($this->uid);
        if ($data['cart']->num_rows()<=0) {
        	$this->load->view('cart/grid',$data);
        } else {
        	$this->load->view('cart/grid',$data);
        }
     }
}