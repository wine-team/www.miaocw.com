<?php
class Paycallback extends MW_Controller
{
    public function _init()
    {
        parent::__construct();
        $this->load->library('wapalipay/alipaypc', null, 'alipaypc');
        $this->load->model('m/mall_order_pay_model','mall_order_pay');
        $this->load->model('m/mall_order_base_model','mall_order_base');
        $this->load->model('m/mall_order_product_model','mall_order_product');
        $this->load->model('m/mall_goods_base_model','mall_goods_base');
    }
    
    /**
     * 支付宝支付
     * 异步回调函数。 ok
     */
    public function alipayNotify()
    {
        $response = $this->alipaypc->responseAlipayNotify();
        if (empty($response)) {
        	return false;
        }
        $pay_id = $response['out_trade_no']; // 妙处网payId
        $trade_no = $response['trade_no']; // 支付宝订单号
        $mallPay = $this->mall_order_pay->findOrderPayByRes(array('pay_id'=>$pay_id));
        if ($mallPay->num_rows()<=0) {
        	return false;
        }
        if ($mallPay->row(0)->pay_status >1 ) {
        	return false; // 已经支付
        }
        $this->db->trans_start();
        $updatePay = $this->mall_order_pay->updatePayOrderInfo($pay_id,array('pay_status'=>2, 'other_trade_no'=>$trade_no));// 支付宝他网订单号
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
    }
}

