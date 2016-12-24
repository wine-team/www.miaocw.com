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
		$param = array(
			'uid' => $this->d['uid'],
			'address_id' => $this->d['address_id']
		);
		$result = $this->mall_address->delete($param);
		if ($result) {
			$this->jsonMessage('','操作成功');
		}
		$this->jsonMessage('操作失败');
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
		$status = $this->mall_address->editAddress($this->d);
		if ($status) {
			$this->jsonMessage('','修改成功');
		}
		$this->jsonMessage('修改失败');
	}
	
	 /**
	  * 添加地址
	 */
	public function insertAddress() {
		
		if (empty($this->d['uid'])) {
			$this->jsonMessage('请传用户UID');
		}
		if (empty($this->d['province_id'])) {
			$this->jsonMessage('请传省份ID');
		}
		if (empty($this->d['province_name'])) {
			$this->jsonMessage('请传省份');
		}
		if (empty($this->d['city_id'])) {
			$this->jsonMessage('请传城市ID');
		}
		if (empty($this->d['city_name'])) {
			$this->jsonMessage('请传城市');
		}
		if (empty($this->d['district_id'])) {
			$this->jsonMessage('请传区ID');
		}
		if (empty($this->d['district_name'])) {
			$this->jsonMessage('请传区');
		}
		if (empty($this->d['detailed'])) {
			$this->jsonMessage('请传详细地址');
		}
		if (empty($this->d['code'])) {
			$this->jsonMessage('请传邮政编码');
		}
		if (strlen($this->d['code']) !=6 ) {
			$this->jsonMessage('请传正确的邮政编码');
		}
		if (empty($this->d['receiver_name'])) {
			$this->jsonMessage('请传收件人姓名');
		}
		if (empty($this->d['tel'])) {
			$this->jsonMessage('请传联系电话');
		}
		if (!valid_mobile($this->d['tel'])) {
			$this->jsonMessage('请填正确联系电话');
		}
		if (empty($this->d['is_default'])) {
			$this->jsonMessage('请传是否默认');
		}
		$status = $this->mall_address->insert($this->d);
		if ($status) {
			$this->jsonMessage('','添加成功');
		}
		$this->jsonMessage('添加失败');
	}
	
}