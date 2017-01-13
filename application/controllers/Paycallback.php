<?php
class Paycallback extends MW_Controller {

	public function _init() {
		
		$this->load->library('encrypt');
		$this->load->library('alipay/alipaypc', null, 'alipaypc');
		$this->load->model('mall_goods_base_model','mall_goods_base');
		$this->load->model('mall_order_pay_model','mall_order_pay');
		$this->load->model('mall_order_base_model','mall_order_base');
		$this->load->model('mall_order_product_model','mall_order_product');
		$this->load->model('pay_failure_log_model','pay_failure_log');
	}
    
	 /**
	 * 支付宝支付
	 * 异步回调函数。 ok
	 */
	public function alipayNotify() {
		
		$response = $this->alipaypc->responseAlipayNotify();
		$pay_id = $_POST['out_trade_no'];
		$postdata = $_POST['out_trade_no'].'-'.$_POST['trade_no'].'-'.$_POST['buyer_email'].'-'.$_POST['total_fee'];
		if ($response) {
			$this->db->trans_start();
			$mallPay = $this->mall_order_pay->findOrderPayByRes(array('pay_id'=>$pay_id));
			if ($mallPay->num_rows()<=0) {
				return false; 
			}
			if ($mallPay->row(0)->pay_status >1 ) { 
			    return false; // 已经支付
			}
			$updatePay = $this->mall_order_pay->updatePayOrderInfo($pay_id,array('pay_status'=>2, 'other_trade_no'=>$_POST['trade_no']));// 支付宝他网订单号
			$updateMallOrder = $this->mall_order_base->updateByPayId($pay_id,array('order_state'=>2,'order_status'=>3,'pay_time'=>date('Y-m-d H:i:s',time()),'updated_at'=>date('Y-m-d H:i:s',time())));
			$productRes = $this->mall_order_product->getOrderProductByPayId($pay_id);
			foreach ($productRes->result() as $item) {
			    
				if ($item->minus_stock==2) {
					$numStatus = $this->mall_goods_base->setMallNum(array('goods_id'=>$item->goods_id,'number'=>$item->refund_num)); // 产品表库存的变化
				}
				$content = '尊敬的妙处网优质供应商：'.$item->phone.' 您有一笔新的订单需要发货，请尽快发货，祝你发财';
				$this->sendToSms($item->phone, $content);
			}
			$this->db->trans_complete();
		} else {
			$result = $this->pay_failure_log->findByOrderSn($pay_id,$f='order_sn');
			if ($result->num_rows()<=0) { //保存错误日志。
				$last_id = $this->pay_failure_log->insertPayFailure($pay_id, $postdata, $response);
			}
		}
	}
	
	/**
	 * 银联支付回调函数，主订单 order_main_sn
	 */
	public function chinapayReturn()
	{
		$postData = $this->input->post();
		$response = $this->chinapay->responseChinapayApi($postData);
		$pay_id = preg_replace('/^0+/', '', $this->input->post('orderno'));
		if ($response == true) { //$response付款成功；判断第二次执行, 表示未付款
			
				$this->db->trans_start();
				$mallPay = $this->mall_order_pay->findOrderPayByRes(array('pay_id'=>$pay_id));
				if($mallPay->num_rows()<=0){
					return false;
				}
				$updatePay = $this->mall_order_pay->updatePayOrderInfo($pay_id,array('pay_status'=>2));
				$updateMallOrder = $this->mall_order_base->updateByPayId($pay_id,array('order_state'=>2,'order_status'=>3,'pay_time'=>date('Y-m-d H:i:s',time()),'updated_at'=>date('Y-m-d H:i:s',time())));
				$productRes = $this->mall_order_product->getOrderProductByPayId($pay_id);
				foreach ($productRes->result() as $item) {
					if ($item->minus_stock==2) {
						$numStatus = $this->mall_goods_base->setMallNum(array('goods_id'=>$item->goods_id,'number'=>$item->refund_num)); // 产品表库存的变化
					}
					$content = '尊敬的妙处网优质供应商：'.$item->phone.' 您有一笔新的订单需要发货，请尽快发货，祝你发财';
					$this->sendToSms($item->phone, $content);
				}
				$this->db->trans_complete();
		} else {
			$result = $this->pay_failure_log->findByOrderSn($pay_id);
			if (!$result) { //保存错误日志。
				$last_id = $this->pay_failure_log->insertPayFailureLog($pay_id, $postData, $response);
			}
		}
	}
}