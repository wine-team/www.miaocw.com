<?php
class Payment extends MW_Controller {
	
	private $d;
	
	public function _init() {
		
		$this->d = $this->input->post();
		$this->load->model('mall_address_model','mall_address');
	}
 	
     /**
	  **地址列表
	  */
    public function address(){
     	
    	if (empty($this->d['uid'])) {
    		$this->jsonMessage('请传用户UID');
    	}
     	$result = $this->mall_address->findAddressByRes(array('uid'=>$this->d['uid']));
     	$address = $result->row(0);
     	$this->jsonMessage('',$address);
     }
	
	
}