<?php
class Paycallback extends MW_Controller {

	public function _init() {
		
		$this->load->library('encrypt');
		$this->load->library('alipay/alipaypc', null, 'alipaypc');
		$this->load->library('chinapay/chinapay', null, 'chinapay');
		$this->load->model('mall_goods_base_model','mall_goods_base');
		$this->load->model('mall_order_pay_model','mall_order_pay');
		$this->load->model('mall_order_base_model','mall_order_base');
		$this->load->model('mall_order_product_model','mall_order_product');
	}
    
	 /**
	 * 支付宝支付
	 * 异步回调函数。 ok
	 */
	public function alipayNotify() {
		
		$response = $this->alipaypc->responseAlipayNotify();
		$pay_id = $ths->input->post('out_trade_no');
		$postdata = $this->input->post();
		if ($response) {
			$this->db->trans_start();
			$mallPay = $this->mall_order_pay->findOrderPayByRes(array('pay_id'=>$pay_id));
			if($mallPay->num_rows()<=0){
				return ;
			}
			$updatePay = $this->mall_order_pay->updatePayOrderInfo($pay_id,array('pay_status'=>2));
			$updateMallOrder = $this->mall_order_base->updateByPayId($pay_id,array('order_state'=>2,'order_status'=>3,'pay_time'=>date('Y-m-d H:i:s',time()),'updated_at'=>date('Y-m-d H:i:s',time())));
			$productRes = $this->mall_order_product->getOrderProduct(array('pay_id'=>$pay_id));
			$this->db->trans_complete();
		}
	}
}