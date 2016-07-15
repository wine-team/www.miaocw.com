<?php
class Payment extends CS_Controller {

	public function _init() {

	}

	 /**
	  * 首页
	 */
     public function grid(){
     	
     	$data = array();
     	$this->load->view('payment/grid',$data);
     }

}