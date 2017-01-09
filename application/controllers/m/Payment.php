<?php
class Payment extends MW_Controller {
	
	private $d;
	
	public function _init() {
		
		$this->d = $this->input->post();
		$this->load->model('m/user_model','user');
		$this->load->model('m/mall_address_model','mall_address');
		$this->load->model('m/user_coupon_get_model','user_coupon_get');
	}
 	
     /**
	  **地址列表
	  */
    public function address(){
     	
    	if (empty($this->d['uid'])) {
    		$this->jsonMessage('请传用户UID');
    	}
    	$userResult = $this->user->findByUid($this->d['uid'],'uid,pay_points');
    	if ($userResult->num_rows()<=0) {
    		$this->jsonMessage('该用户不存在');
    	}
    	$user = $userResult->row(0);
     	$result = $this->mall_address->findAddressByRes(array('uid'=>$this->d['uid']));
     	$address = $result->row(0);
     	$coupnResult = $this->user_coupon_get->getUserCoupn(array('uid'=>$this->d['uid'],'status'=>1,'date'=>date('Y-m-d H:i:s')),'coupon_get_id,coupon_name,uid,amount,condition');
     	$coupn = $coupnResult->result();
     	$this->jsonMessage('',array('address'=>$address,'user'=>$user,'coupn'=>$coupn));
     }
	
     /**
      * 购买页面
     */
     public function buy(){
     	
     	
     	
     }
	 
}