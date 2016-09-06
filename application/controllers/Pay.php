<?php
class Pay extends CS_Controller {

	public function _init() {
		
		$this->load->library('encrypt');
		$this->load->library('chinapay/chinapay', null, 'chinapay');
		$this->load->library('alipay/alipaypc', null, 'alipaypc');
		$this->load->model('mall_goods_base_model','mall_goods_base');
		$this->load->model('mall_order_main_model','mall_order_main');
		$this->load->model('mall_order_base_model','mall_order_base');
		$this->load->model('mall_order_product_model','mall_order_product');
	}

	/**
	 * 网银去支付方法。
	 */
	public function grid()
	{
		$order_main_sn = $this->input->post('order_main_sn');
		$pay_bank = $this->input->post('pay_bank');
		$result = $this->mall_order_main->findOrderMainByRes(array('uid'=>$this->uid,'order_main_sn'=>$order_main_sn));
		if ($result->num_rows() <= 0) {
			$this->alertJumpPre('订单信息不对。');
		}
		$orderInfo = $result->row(0);
		switch ($pay_bank) {
			case '2' :  //微信支付
				$data['orderInfo'] = $orderInfo;
				$this->load->view('payment/balancePay', $data);
				break;
			case '3' :  //银联支付
				$BgRetUrl = site_url('paycallback/chinapayReturn');
				$PageRetUrl = site_url('paycallback/chinapayReturn');
				$objPay = $this->chinapay->callChinapayApi($order_main_sn, $orderInfo->order_amount, 'notcart', $BgRetUrl, $PageRetUrl);
				break;
			default :   //支付宝支付
				$alipayParameter = $this->alipayParameter($pay_bank, $orderInfo);
				$this->alipaypc->callAlipayApi($alipayParameter);
				break;
		}
	}
	
	
	/**
	 * 获取支付宝需要参数。
	 * @param paybank $bank_id
	 * @param object $orderInfo
	 * @param object $orderProductInfo    ---主订单号的
	 * @return array
	 */
	private function alipayParameter($pay_bank, $orderInfo)
	{
		$parameter = array(
				'out_trade_no' => $orderInfo->order_main_sn,
				'subject'      => $orderInfo->order_main_sn,
				'total_fee'    => $orderInfo->order_amount,
				'body'         => $orderInfo->order_main_sn,
				'show_url'     => base_url(),
				'notify_url'   => base_url('paycallback/alipayNotify'),
				'return_url'   => base_url('payt/alipayReturn'),
				'pay_method'   => $pay_bank,
				'defaultbank'  => 'alipay'
		);
		return $parameter;
	}
}