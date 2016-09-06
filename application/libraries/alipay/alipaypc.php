<?php 
class Alipaypc
{    
   private $anti_phishing_key   = '';	//防钓鱼时间戳
   private $exter_invoke_ip     = '';	//获取客户端的IP地址，建议：编写获取客户端IP地址的程序
   private $extra_common_param  = '';	//自定义参数，可存放任何内容（除=、&等特殊字符外），不会显示在页面上
   private $buyer_email		    = '';	//默认买家支付宝账号
   private $royalty_type		= "";	//提成类型，该值为固定值：10，不需要修改
   private $royalty_parameters	= "";
   private $sign_type		    = "MD5";
   private $_input_charset	    = "utf-8";
   private $transport		    = "http";
     
   public function callAlipayApi($alipayParameter)
   {   
       header("Content-type:text/html;charset=utf-8");
       require_once ('alipay_config.php');
       require_once('lib/alipay_submit.class.php');
       if ($alipayParameter['pay_method'] == 1) {
           $alipay_paymethod = 'directPay';
           $defaultbank = '';
       } else {
           $alipay_paymethod = 'bankPay';
           $defaultbank = $alipayParameter['defaultbank'];
       }
       $parameter = array(
            
            "service"           => 'create_direct_pay_by_user', //接口名称，不需要修改
            "partner"			=> $alipay_config['partner'],
            "seller_email"		=> $alipay_config['seller_email'],
            "payment_type"      => '1',  //交易类型，不需要修改
            "return_url"        => $alipayParameter['return_url'],
            "notify_url"		=> $alipayParameter['notify_url'],
            "out_trade_no"		=> $alipayParameter['out_trade_no'],
            "subject"			=> $alipayParameter['subject'],    
            "total_fee"		    => $alipayParameter['total_fee'],
            "body"			    => $alipayParameter['body'],
            "paymethod"			=> $alipay_paymethod,
            "defaultbank"		=> $defaultbank,
            "show_url"			=> $alipayParameter['show_url'],
            "anti_phishing_key"	=> $this->anti_phishing_key,     
            "exter_invoke_ip"	=> $this->exter_invoke_ip,
            "_input_charset"	=> $alipay_config['input_charset'],
             /*
            "buyer_email"		=> $this->buyer_email,
            "extra_common_param"=> $this->extra_common_param,
            "royalty_type"		=> $this->royalty_type,
            "royalty_parameters"=> $this->royalty_parameters,
            */
        );
       $alipaySubmit = new AlipaySubmit($alipay_config);
       $html_text = $alipaySubmit->buildRequestForm($parameter,"post","确认");
       echo $html_text;
    }
    
    /**
     * 支付宝同步处理方法
     * @return boolean
     */
    public function responseAlipayReturn()
    {

        if ($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
            return true;
        } else {
            return false;
        }
    }
    
     /**
     * 支付宝异步处理方法
     * @return boolean
     */
    public function responseAlipayNotify()
    {
        require_once("alipay_config.php");
        require_once("lib/alipay_notify.class.php");
        $alipayNotify = new AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyNotify();
        if ($verify_result) {
            echo 'success';
            $trade_status = $_POST['trade_status'];
            if ($trade_status == "TRADE_FINISHED" || $trade_status == "TRADE_SUCCESS") {
                return true;
            }
        } else {
            echo "fail";
            return false;
        }
    }
}