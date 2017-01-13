<?php 
class Alipaypc
{    
   public function callAlipayApi($alipayParameter)
   {   
       header("Content-type:text/html;charset=utf-8");
       require_once ('alipay_config.php');
       require_once('lib/alipay_submit.class.php');
       $format = "xml";
       $v = "2.0";
       $req_id = date('Ymdhis');
       $seller_email	= "hzmiaocw@126.com";
       $notify_url = $alipayParameter['notify_url']; //异步回来
       $call_back_url = $alipayParameter['call_back_url']; // 同步回来
       $merchant_url = $alipayParameter['show_url'];     //中断地址
       $out_trade_no = $alipayParameter['out_trade_no']; //商户订单号
       $subject = $alipayParameter['subject']; //订单名称
       $total_fee = $alipayParameter['total_fee']; //付款金额
       //业务详细
       $req_data = '<direct_trade_create_req><notify_url>' . $notify_url . '</notify_url><call_back_url>' . $call_back_url . '</call_back_url><seller_account_name>' . $seller_email . '</seller_account_name><out_trade_no>' . $out_trade_no . '</out_trade_no><subject>' . $subject . '</subject><total_fee>' . $total_fee . '</total_fee><merchant_url>' . $merchant_url . '</merchant_url></direct_trade_create_req>';
       $para_token = array(
               "service"    => "alipay.wap.trade.create.direct",
               "partner"    => trim($alipay_config['partner']),
               "sec_id"     => trim($alipay_config['sign_type']),
               "format"	    => $format,
               "v"	        => $v,
               "req_id"	    => $req_id,
               "req_data"	=> $req_data,
               "_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
       );
       //建立请求
       $alipaySubmit = new AlipaySubmit($alipay_config);
       $html_text = $alipaySubmit->buildRequestHttp($para_token);
       //URLDECODE返回的信息
       $html_text = urldecode($html_text);
       //解析远程模拟提交后返回的信息
       $para_html_text = $alipaySubmit->parseResponse($html_text);
       //获取request_token
       $request_token = $para_html_text['request_token'];
       /**************************根据授权码token调用交易接口alipay.wap.auth.authAndExecute**************************/
       //业务详细       //必填
       $req_data = '<auth_and_execute_req><request_token>' . $request_token . '</request_token></auth_and_execute_req>';
       //构造要请求的参数数组，无需改动
       $parameter = array(
               "service" => "alipay.wap.auth.authAndExecute",
               "partner" => trim($alipay_config['partner']),
               "sec_id"  => trim($alipay_config['sign_type']),
               "format"	 => $format,
               "v"	     => $v,
               "req_id"	 => $req_id,
               "req_data"	=> $req_data,
               "_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
       );
       //建立请求
       $alipaySubmit = new AlipaySubmit($alipay_config);
       $html_text = $alipaySubmit->buildRequestForm($parameter, 'get', '确认');
       echo $html_text;
    }

    public function responseAlipayReturn()
    {
        if ($_GET['result'] == 'success') {
            return true;
        } else {
            return false;
        }
    }
    
    public function responseAlipayNotify()
    {
        require_once("alipay_config.php");
        require_once("lib/alipay_notify.class.php");
        $alipayNotify = new AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyNotify();
        if ($verify_result) {
            $doc = new DOMDocument();
            if ($alipay_config['sign_type'] == 'MD5') {
                $doc->loadXML($_POST['notify_data']);
            }
            if ($alipay_config['sign_type'] == '0001') {
                $doc->loadXML($alipayNotify->decrypt($_POST['notify_data']));
            }
            if(!empty($doc->getElementsByTagName( "notify" )->item(0)->nodeValue)) {
                $out_trade_no = $doc->getElementsByTagName( "out_trade_no" )->item(0)->nodeValue;// 商户订单号  pay_id
                $trade_no = $doc->getElementsByTagName( "trade_no" )->item(0)->nodeValue;// 支付宝订单号  
                $total_fee = $doc->getElementsByTagName( "total_fee" )->item(0)->nodeValue; //总价
                $gmt_payment = $doc->getElementsByTagName( "gmt_payment" )->item(0)->nodeValue;
                $trade_status = $doc->getElementsByTagName( "trade_status" )->item(0)->nodeValue; //交易状态
            }
            if ($trade_status == "TRADE_FINISHED" || $trade_status == "TRADE_SUCCESS") {
                echo "success";
                return array(
                	'out_trade_no' => $out_trade_no,
                	'trade_no' => $trade_no
                );
            }
        } else {
            echo "fail";
            return false;
        }
    }
}