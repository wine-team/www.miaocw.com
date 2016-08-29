<?php
class Payment extends CS_Controller {

	public function _init() {

		
	}

	 /**
	  * 首页
	 */
     public function grid(){
     	
     	$postData = $this->input->post();
     	var_dump($postData);exit;
     	$this->validate($postData);
     	
     	$this->load->view('payment/grid');
     }

      /**
      * 订单验证
      * @param unknown $postData
      */
     public function validate($postData){
     	
     	if (empty($postData['goods']) || !is_array($postData['goods'])) {
     		$this->jsen('请传产品参数');
     	}
     	if (empty($postData['address_id'])) {
     		$this->jsen('请传地址参数');
     	}
     	if (empty($postData['receiver_name'])) {
     		$this->jsen('请传收货姓名');
     	}
     	if (empty($postData['tel'])) {
     		$this->jsen('请传联系方式');
     	}
     	if (empty($postData['province_id'])) {
     		$this->jsen('请传省份ID');
     	}
     	if (empty($postData['city_id'])) {
     		$this->jsen('请传市区ID');
     	}
     	if (empty($postData['district_id'])) {
     		$this->jsen('请传区ID');
     	}
     	if (empty($postData['detailed'])) {
     		$this->jsen('请传详细地址');
     	}
     	if (empty($postData['pay_bank'])) {
     		$this->jsen('请传支付方式');
     	}
     }
}