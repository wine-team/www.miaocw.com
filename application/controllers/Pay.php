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
		$result = $this->mall_order_main->findByOrderMain($order_main_sn);
		if ($result->num_rows() <= 0) {
			$this->alertJumpPre('订单信息不对。');
		}
		$orderInfo = $result->row();
		switch ($pay_bank) {
			case '2' :  //银联支付
				$BgRetUrl = site_url('paycallback/chinapayReturn');
				$PageRetUrl = site_url('paycallback/chinapayReturn');
				$objPay = $this->chinapay->callChinapayApi($order_main_sn, $orderInfo->order_amount, 'notcart', $BgRetUrl, $PageRetUrl);
				break;
			case '3' :  //微信支付
				$userAccount = $this->user_account->findByUid($this->uid);
				$data['userAccount'] = $userAccount->row();
				$data['orderInfo'] = $orderInfo;
				$this->load->view('payment/balancePay', $data);
				break;
			default :   //支付宝支付
				$alipayParameter = $this->alipayParameter($pay_bank, $orderInfo);
				$this->alipaypc->callAlipayApi($alipayParameter);
				break;
		}
	}
}