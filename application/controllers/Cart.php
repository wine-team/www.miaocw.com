<?php
class Cart extends CS_Controller {

	public function _init() {

		$this->load->model('region_model', 'region');
		$this->load->model('mall_freight_price_model','mall_freight_price');
		$this->load->model('user_coupon_get_model','user_coupon_get');
		$this->load->model('mall_goods_base_model','mall_goods_base');
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
     	
     	$cart = $this->mall_cart_goods->getCartGoodsByUid($this->uid);
     	$data['coupon'] = $this->user_coupon_get->getCouponByUid($this->uid);
     	$cartData = $this->encrypt($cart);
     	$data['cart'] = $cartData['cart'];
     	$data['total'] = $cartData['total'];
     	$data['actual_price'] = $cartData['actual_price'];
     	$data['transport_cost'] = $cartData['transport_cost'];
     	echo json_encode(array(
     		'status' => true,
     		'html'   => $this->load->view('cart/main',$data,true),
     		'amount' => $this->load->view('cart/amount',$data,true)
     	));exit;
     }
     
     /**
      *--产品的循环处理
     */
     public function encrypt($cart) {
     	
     	$free = 0 ;// 优惠价
     	$total = 0; // 订单销售价
     	$actual_price = 0; // 积极支付价
     	$transport_cost = 0; // 运费价格
     	$cartArr = array();
     	foreach ($cart->result() as $val){
     		$cartArr[$val->supplier_id]['supplier_id'] = $val->supplier_id;
     		$cartArr[$val->supplier_id]['shop_name'] = $val->alias_name;
     		$cartArr[$val->supplier_id]['goods'][] = $val;
     		$total += bcmul($val->goods_num,$val->promote_price,2);
     	}
     	$actual_price = bcsub(bcadd($total,$transport_cost,2),$free,2);
     	return array(
     			 'cart'   =>  $cartArr,
     			 'total'  =>  $total,
     			 'transport_cost' => $transport_cost,
     			 'actual_price'   => $actual_price
     	        );
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
     
      /**
      *购车的ajax添加产品
      */
     public function ajaxGoods() {
     	
     	$uid = $this->uid;
     	$goods_id = (int)base64_decode($this->input->post('goods_id',true));
     	$qty = (int)$this->input->post('qty',true);
     	if (empty($uid)) {
     		$this->jsen('没有登陆');
     	}
     	if ($qty < 1) {
     		$qty = 1;
     	}
     	$result = $this->mall_goods_base->getGoodsByGoodsId($goods_id);
     	if($result->num_rows()<=0){
     		$this->jsen('该商品不存在');
     	}
     	$result = $result->row(0);
     	if( $result->limit_num > 0 ){
     		$qty = ($result->limit_num >= $qty) ?  $qty : $result->limit_num;
     	}else{
     		$qty = ($result->in_stock >= $qty) ? $qty : $result->in_stock;
     	}
     	$status = $this->mall_cart_goods->updateCartQty(array('uid'=>$uid,'goods_id'=>$goods_id),$qty);
     	if ($status) {
     		$this->jsen('操作成功',true);
     	}
     	$this->jsen('操作失败');
     }
}