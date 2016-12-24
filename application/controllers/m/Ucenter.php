<?php
class Ucenter extends MW_Controller {

	private $d;
	
	public function _init() {
		
        $this->d = $this->input->post();
        $this->load->model('m/user_model','user');
		$this->load->model('m/mall_address_model','mall_address');
		$this->load->model('m/mall_enshrine_model', 'mall_enshrine');
		$this->load->model('m/user_coupon_get_model', 'user_coupon_get');
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
	
	 /**
	 * 修改登陆密码
	 */
	public function modifyPass() {
		
		if (empty($this->d['uid'])) {
			$this->jsonMessage('请传用户UID');
		}
		if (empty($this->d['oldPw'])) {
			$this->jsonMessage('请传原始密码');
		}
		if (empty($this->d['newPw'])) {
			$this->jsonMessage('请传新密码');
		}
		if (empty($this->d['newConfirmPw'])) {
			$this->jsonMessage('请传确认密码');
		}
		if (strlen($this->d['newPw'])<6) {
			$this->jsonMessage('新密码长度小于6位');
		}
		if (strlen($this->d['newConfirmPw'])<6) {
			$this->jsonMessage('确认密码长度小于6位');
		}
		$result = $this->user->findByUid($this->d['uid'],'uid,password');
		if ($result->num_rows()<=0) {
			$this->jsonMessage('没有该用户信息');
		}
		$user = $result->row(0);
		if ($user->password != sha1(base64_encode($this->d['oldPw']))) {
			$this->jsonMessage('原始密码不对');
		}
		if ($this->d['newPw'] != $this->d['newConfirmPw']) {
			$this->jsonMessage('密码不一致');
		}
		$param = array(
			'uid' => $this->d['uid'],
			'password' => sha1(base64_encode($this->d['newPw']))
		);
		$result = $this->user->updateUser($param);
		if ($result) {
			$this->jsonMessage('','操作成功');
		}
		$this->jsonMessage('操作失败');
	}
	
	 /**
	 * 用户优惠劵
	 */
	public function userCoupn() {
		
		if (empty($this->d['uid'])) {
			$this->jsonMessage('请传用户UID');
		}
		$f = 'coupon_name,uid,amount,condition,start_time,end_time,status';
	    $result = $this->user_coupon_get->getUserCoupn($this->d,$f)->result();
	    $this->jsonMessage('',$result);
	}
	
	 /**
	 * 获取优惠劵
	 */
	public function getUserCoupn() {
		
		if (empty($this->d['uid'])) {
			$this->jsonMessage('请传用户UID');
		}
		if (empty($this->d['userCoupnNumber'])) {
			$this->jsonMessage('请传优惠劵序列号');
		}
		$this->jsonMessage('正在开发中');
	}
	
	 /**
	  * 获取收藏列表
	 */
    public function enshrineList() {
    	
    	if (empty($this->d['uid'])) {
    		$this->jsonMessage('请传用户UID');
    	}
    	$pg = isset($this->d['pg']) ? $this->d['pg'] : 1;
    	$pgNum = isset($this->d['pgNum']) ? $this->d['pgNum'] : 20;
    	$num = ($pg-1)*$pgNum;
    	$result = $this->mall_enshrine->enshrineList($num, $pgNum, $this->d['uid']);
        $enshrine = $result->result();
        $this->jsonMessage('',$enshrine);
    }
    
    /**
     * 删除用户收藏
     */
    public function deleteMallEnshrine() {
    	
    	if (empty($this->d['uid'])) {
    		$this->jsonMessage('请传用户UID');
    	}
    	if (empty($this->d['enshrine_id'])) {
    		$this->jsonMessage('请传收藏商品');
    	}
    	$param = array(
    		'uid' => $this->d['uid'],
    		'id'  => $this->d['enshrine_id']
    	);
    	$result = $this->mall_enshrine->delete($param);
    	if ($result) {
    		$this->jsonMessage('','删除成功');
    	}
    	$this->jsonMessage('删除失败');
    }
    
     /**
     * 添加收藏
     */
    public function insertMallEnshrine() {
    	
    	if (empty($this->d['uid'])) {
    		$this->jsonMessage('请传用户UID');
    	}
    	if (empty($this->d['goods_id'])) {
    		$this->jsonMessage('请传商品ID');
    	}
    	$param = array(
    		'uid' => $this->d['uid'],
    		'goods_id' => $this->d['goods_id'],
    		'created_at' => date('Y-m-d H:i:s')
    	);
    	$result = $this->mall_enshrine->insert($param);
    	if ($result) {
    		$this->jsonMessage('','收藏成功');
    	}
    	$this->jsonMessage('收藏失败');
    }
    
     /**
     * 获取历史列表
     */
	public function getHistory() {

		$goods = array();
		$history = unserialize(base64_decode(get_cookie('historyPram')));  // 存取goods_id数组
		if (empty($history)) {
		   $this->jsonMessage('',$goods); 	
		}
		$f = 'goods_id,goods_name,shop_price,market_price,promote_price,promote_start_date,promote_end_date,goods_img';
		$result = $this->mall_goods_base->getGoodsByGoodsId($history,$f);
		$goods = $result->result_array();
		$this->jsonMessage('',$goods);
	}
}