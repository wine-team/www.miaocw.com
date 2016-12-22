<?php
class Passport extends MW_Controller {

	public function _init() {

		$this->d = $this->input->post();
		$this->load->model('m/user_model','user');
	}

	/**
	 * 移动端登陆
	 */
	public function login() {

		if ($this->validateParam($this->d['username'])) {
			$this->jsonMessage('请输入用户名');
		}
		if ($this->validateParam($this->d['password'])) {
			$this->jsonMessage('请输入密码');
		}
		$result = $this->user->login($this->d,'uid,alias_name,phone,email,parent_id,photo');
		if ($result->num_rows() <=0) {
			$this->jsonMessage('用户名或密码错误');
		}
		$user = $result->row();
		if ($user->flag == 2) {
			$this->jsonMessage('此帐号已被冻结');
		}
		$userInfor = array(
			'uid'       => $user->uid,
			'aliasName' => !empty($user->alias_name) ? $user->alias_name : $user->phone,
			'userPhone' => $user->phone,
			'userEmail' => $user->email,
			'parentId'  => $user->parent_id,
			'userPhoto' => $user->photo,
		);
		$this->jsonMessage('',$userInfor);
	}
}