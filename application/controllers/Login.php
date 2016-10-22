<?php 
class Login extends MW_Controller
{
    public $d;
    
    public function _init()
    {
        $this->d = $this->input->post();
        $this->load->helper('api');
    }
        
     /**
     * 登录提交页面
     */
    public function loginPost()
    {
        $res = getApiDynamic($this->d, $this->config->passport_url.'login/loginPost.html');
        die($res);
    }
}