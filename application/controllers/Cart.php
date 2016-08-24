<?php
class Cart extends CS_Controller {

	public function _init() {

		$this->load->model('region_model', 'region');
		$this->load->model('mall_cart_goods_model','mall_cart_goods');
		$this->load->model('mall_enshrine_model','mall_enshrine');
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
        $this->load->view('cart/grid',$data);
     }
     
      /**
      *购物车
      */
     public function main(){
     	
     	$data['cart'] = $this->mall_cart_goods->getCartGoodsByUid($this->uid);
     	echo json_encode(array(
     		'status' => true,
     		'html'   => $this->load->view('cart/main',$data,true)
     	));exit;
     }
     
      /**
      * 收藏
      */
     public function enshrine() {
     
     	$uid = $this->uid;
     	$goods_id = base64_decode($this->input->post('goods_id',true));
     	if (empty($uid)) {
     		$this->jsen('没有登陆');
     	}
     	$insert = false;
     	$result = $this->mall_enshrine->findByEnshrine(array('uid'=>$uid, 'goods_id'=>$goods_id));
     	if ($result->num_rows() > 0) {
     		$this->jsen('已经收藏');
     	} else {
     		$insert = $this->mall_enshrine->insert($uid,$goods_id);
     	}
     	if ($insert) {
     		$this->jsen('收藏成功');
     	} 
     	$this->jsen('收藏失败');
     }
     
      /**
      * 购物车的删除
      */
     public function delete(){
     	
     	$uid = $this->uid;
     	$goods_id = base64_decode($this->input->post('goods_id',true));
     	if (empty($uid)) {
     		$this->jsen('没有登陆');
     	}
     	$status = $this->mall_cart_goods->deleteCartGoods(array('uid'=>$uid,'goods_id'=>$goods_id));
        if($status) {
        	$this->jsen('删除成功',true);
        }
        $this->jsen('删除失败');
     }
}