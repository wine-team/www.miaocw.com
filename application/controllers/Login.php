<?php 
class Login extends MW_Controller
{
    public function _init()
    {
        $this->load->helper(array('ip'));
        $this->load->model('user_model', 'user');
    }
        
     /**
     * 登录提交页面
     */
    public function loginPost()
    {
    	$d = $this->input->post();
        if ($this->validateParam($d['username'])) {
    	    $this->jsonMessage('请输入用户名');
    	}
    	if ($this->validateParam($d['password'])) {
    	    $this->jsonMessage('请输入密码');
    	}
    	$result = $this->user->login($d);
    	if ($result->num_rows() <=0) {
    		$this->jsonMessage('用户名或密码错误');
    	}
    	$user = $result->row();
    	if ($user->flag == 2) {
    		$this->jsonMessage('此帐号已被冻结，请与管理员联系');
    	}
    	$userInfor = array(
    			'uid' => $user->uid,
    			'userName' => $user->alias_name
    	);
    	$expireTime = empty($d['auto_login']) ? 7200 : 7200;//是不是永久登陆
    	set_cookie('frontUser',base64_encode(serialize($userInfor)),$expireTime);
    	$this->cache->memcached->save('frontUser', base64_encode(serialize($userInfor)),$expireTime);
    	$param = array(
    			'uid'  => $user->uid,
    			'log_time' => date('Y-m-d H:i:s'),
    			'ip_from'  => getIP(),
    			'operate_type'  => 1,
    			'status' => 1
    	);
    	$this->user->insertUserLog($param);
    	$this->jsonMessage('','登录成功');
    }
}