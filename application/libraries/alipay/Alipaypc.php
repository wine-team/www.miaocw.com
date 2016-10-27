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
            "seller_id"			=> $alipay_config['seller_id'],
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
            "_input_charset"	=> trim(strtolower($alipay_config['input_charset'])),
        );
       $parameter['sign_type'] = $alipay_config['sign_type'];
       $parameter['sign'] = $this->getSign($parameter,$alipay_config['key']); // 剔出sign  和   md5 参数
       $alipaySubmit = new AlipaySubmit($alipay_config);
       $html_text = $alipaySubmit->buildRequestForm($parameter,"post","确认");
       echo $html_text;
    }
    
    /**
     * 支付宝同步验证处理方法
     * @return boolean
     */
    public function responseAlipayReturn()
    {
        require_once("alipay_config.php");
        require_once("lib/alipay_notify.class.php");
        $alipayNotify = new AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyReturn();
        if ($verify_result) {
            
            $trade_status = $_GET['trade_status'];
            if ($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS') {
                return true;
            } else {
                return false;
            }
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
    
    /**
     * 获取签名  sign
     * @param unknown $param
     * @return string
     * 把MD5密钥（Key）拼接在待验证签名的字符串尾部、从支付宝返回时得到的参数sign的值。签名验证函数调用md5加密函数，对已经与MD5密钥拼接好的新字符串做加密运算得到加密结果mysign，与从支付宝返回时得到的参数
    */
    public function getSign($param,$key) {
    	
    	$firstParam = $this->argSort($param);
    	$twoParam = $this->createLinkstring($firstParam);
    	$twoParam = $twoParam . $key;
    	return md5($twoParam);
    }
    
    /**
     * 对数组ASCII码进行字母升序排序
     * @param unknown $para
     * @return unknown
     */
    private function argSort($para) {
    	
    	ksort($para);
    	reset($para);
    	return $para;
    }
    
    /**
     * 把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
     * @param $para 需要拼接的数组
     * return 拼接完成以后的字符串
     */
    private function createLinkstring($para) {
        
    	$arg  = "";
    	while (list ($key, $val) = each ($para)) {
    		$arg.=$key."=".$val."&";
    	}
    	//去掉最后一个&字符
    	$arg = substr($arg,0,count($arg)-2);
    
    	//如果存在转义字符，那么去掉转义
    	if(get_magic_quotes_gpc()){$arg = stripslashes($arg);}
    
    	return $arg;
    }
}