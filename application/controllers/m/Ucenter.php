<?php
class Ucenter extends MW_Controller {

	private $d;
	
	public function _init() {
		
        $this->d = $this->input->post();
		$this->load->model('m/mall_address_model','mall_address');
	}

	 /**
	 * 获取地址列表
	 */
	public function getAddress() {
		
		if (empty($this->d['uid'])) {
			$this->jsonMessage('请传用户UID');
		}
		$result = $this->mall_address->findAddressByRes(array('uid'=>$this->d['uid']));
	    $address = $result->result();
	    $this->jsonMessage('',$address);
	}
	
	 /**
	 * 删除
	 */
	public function deleteAddress() {
		
		if (empty($this->d['uid'])) {
			$this->jsonMessage('请传用户UID');
		}
		if (empty($this->d['address_id'])) {
			$this->jsonMessage('请传地址ID');
		}
		$result = $this->mall_address->delete($this->d['address_id']);
		if ($result) {
			$this->jsonMessage('操作失败');
		}
		$this->jsonMessage('操作成功');
	}
	
	 /**
	 * 编辑地址
	 */
	public function editAddress() {

		if (empty($this->d['uid'])) {
			$this->jsonMessage('请传用户UID');
		}
		if (empty($this->d['address_id'])) {
			$this->jsonMessage('请传地址ID');
		}
	}
	
	 /**
	  * 添加地址
	 */
	public function insertAddress() {
		
		
	}
	
}