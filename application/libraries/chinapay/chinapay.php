<?php 
require_once 'netpayclient.php';
class Chinapay 
{
    private $httpUrl     = 'http://payment.chinapay.com/pay/TransGet';
    
    private $MerId       = null; //MerId为ChinaPay统一分配给商户的商户号，15位长度，必填
    private $OrdId       = null; //商户提交给ChinaPay的交易订单号，16位长度，必填
    
    private $TransAmt    = null; //订单交易金额，单位为分，12位长度，左补0，必填
    private $CuryId      = '156'; //订单交易币种，3位长度，固定为人民币156，必填
    
    private $TransDate   = null; //订单交易日期，8位长度，必填
    private $TransType   = '0001'; //交易类型，4位长度，必填 --- 0001表示消费交易， 0002表示退货交易
            
    public  $Version     = '20070129'; //支付接入版本号，必填 --- 两个版本 20070129 和 20040916
    
    private $BgRetUrl    = null; //后台交易接收URL，必填，长度不要超过80个字节
    private $PageRetUrl  = null; //页面交易接收URL，长度不要超过80个字节，必填

    private $GateId      = null; //支付网关号，可选
    private $Priv1       = null; //商户私有域，长度不要超过60个字节，可选
    
    private $ChkValue    = null; //256字节长的ASCII码,为此次交易提交关键数据的数字签名，必填
    
    public function __construct()
    {
        $this->BgRetUrl   = site_url('payment/chinapayReturn');
        $this->PageRetUrl = site_url('payment/chinapayReturn');
    }
    
    /*
     * $OrdId      string 订单id
     * $TransAmt   订单金额
     * $nonCard    false为快捷支付。
     * $BgRetUrl   后台交易接收URL
     * $PageRetUrl 页面交易接收URL
     */
    public function callChinapayApi($OrdId, $TransAmt, $nonCard = 'notcart', $BgRetUrl = null, $PageRetUrl = null)
    {
        if (!$this->validateMerId($nonCard)) {
            echo '导入私钥文件失败！';exit;
        }
        
        $this->TransDate  = date('Ymd');
        
        if (!$this->validateChkValue($OrdId, $TransAmt, $BgRetUrl, $PageRetUrl)) {
            echo '签名失败！';exit;
        }

        $postArray = $this->getPostData();
        $returnData = $this->chinaPayFrom($postArray);
        printf($returnData);
    }
    
    private function chinaPayFrom($postArray)
    {
        //post方式传递
        $sHtml = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        $sHtml .= '<form id="chinapaysubmit" name="chinapaysubmit" action="'.$this->httpUrl.'" method="post">';
        foreach ($postArray as $key=>$item) {
            $sHtml .= '<input type="hidden" name="'.$key.'" value="'.$item.'"/>';
        }

        //submit按钮控件请不要含有name属性
        $sHtml .= '<input type="submit" value="确认支付" style="display:none">';
        $sHtml .= '</form>';
        $sHtml .= '<script type="text/javascript">document.forms["chinapaysubmit"].submit();</script>';
        return $sHtml;
    }
    
    private function getPostData()
    {
        $postArray = array();
        if ($this->MerId) {
            $postArray['MerId']      = $this->MerId;
        }
        if ($this->OrdId) {
            $postArray['OrdId']      = $this->OrdId;
        }
        if ($this->TransAmt) {
            $postArray['TransAmt']   = $this->TransAmt;
        }
        if ($this->CuryId) {
            $postArray['CuryId']     = $this->CuryId;
        }
        if ($this->TransDate) {
            $postArray['TransDate']  = $this->TransDate;
        }
        if ($this->TransType) {
            $postArray['TransType']  = $this->TransType;
        }
        if ($this->Version) {
            $postArray['Version']    = $this->Version;
        }
        if ($this->BgRetUrl) {
            $postArray['BgRetUrl']   = $this->BgRetUrl;
        }
        if ($this->PageRetUrl) {
            $postArray['PageRetUrl'] = $this->PageRetUrl;
        }
        if ($this->GateId) {
            $postArray['GateId']     = $this->GateId;
        }
        if ($this->Priv1) {
            $postArray['Priv1']      = $this->Priv1;
        }
        if ($this->ChkValue) {
            $postArray['ChkValue']   = $this->ChkValue;
        }
        return $postArray;
    }
    
    private function validateMerId($nonCard)
    {
        if ($this->MerId === null) {
            if ($nonCard == 'notcart') {
                $merIdKey = APPPATH.'libraries/chinapay/MerPrK_808080201306122_20140818175758.key';
            } else {
                $merIdKey = APPPATH.'libraries/chinapay/MerPrK_808080201306121_20140815172844.key';
            }
            $this->MerId = buildKey($merIdKey);
        }
        return $this->MerId;
    }
    
    private function validateChkValue($OrdId, $TransAmt, $BgRetUrl, $PageRetUrl)
    {
        //取得值
        $MerId          = $this->MerId;
        $this->OrdId    = $this->formatOrdId($OrdId);
        $this->TransAmt = $this->formatPrice($TransAmt);
        $CuryId         = $this->CuryId;
        $TransDate      = $this->TransDate;
        $TransType      = $this->TransType;
        
        if ($BgRetUrl !== null) {
            $this->BgRetUrl   = $BgRetUrl;
        }
        if ($PageRetUrl !== null) {
            $this->PageRetUrl = $PageRetUrl;
        }
        
        if ($this->Version == '20040916') { //版本不通，则签名方式不同。
            $this->ChkValue = sign($MerId, $this->OrdId, $this->TransAmt, $CuryId, $TransDate, $TransType);
            return $this->ChkValue;
        }

        if ($this->Version == '20070129') {
            $plain = $MerId.$this->OrdId.$this->TransAmt.$CuryId.$TransDate.$TransType;
            $this->ChkValue = sign($plain);
            return $this->ChkValue;
        }

        return false;
    }
    
    private function formatOrdId($OrdId)
    {
        return str_pad($OrdId, 16, 0, STR_PAD_LEFT);
    }
    
    private function formatPrice($TransAmt)
    {
        $price = round($TransAmt*100);
        if (strpos($price, '.') !== false) {
            $price = strstr($price, '.', true);
        }
        return padstr($price, 12);
    }
    
    private function curl_api_post($url, $paramsArray)
    {
        $curlPost = $paramsArray;//dealwithPostData($paramsArray);
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL, $url);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, true);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        curl_close($ch);
        return $data;
    }
    
    public function responseChinapayApi($getPost)
    {
        $error =  $this->validate($getPost); //验证数字签名和数据完整性。
        
        if (count($error) <= 0 && isset($getPost['status']) && $getPost['status'] == '1001') {
            return true;
        }
        
        return $error;
    }
    
    private function validate($getPost)
    {
        $error = array();
        $PgPubk = APPPATH.'libraries/chinapay/PgPubk.key';
        $flag = buildKey($PgPubk);
        if (!$flag) {
            $error[] = '导入公钥文件失败！';
        }
        if (isset($getPost['merid'])) {
            $merid = $getPost['merid'];
        }
        if (isset($getPost['orderno'])) {
            $orderno = $getPost['orderno'];
        }
        if (isset($getPost['amount'])) {
            $amount = $getPost['amount'];
        }
        if (isset($getPost['currencycode'])) {
            $currencycode = $getPost['currencycode'];
        }
        if (isset($getPost['transdate'])) {
            $transdate = $getPost['transdate'];
        }
        if (isset($getPost['transtype'])) {
            $transtype = $getPost['transtype'];
        }
        if (isset($getPost['status'])) {
            $status = $getPost['status'];
        }
        if (isset($getPost['checkvalue'])) {
            $checkvalue = $getPost['checkvalue'];
        }
        if (isset($getPost['GateId'])) {
            $GateId = $getPost['GateId'];
        }
        if (isset($getPost['Priv1'])) {
            $priv1 = $getPost['Priv1'];
        }
        /* 此字段无用
        if (isset($getPost['clock'])) {
            $priv1 = $getPost['clock'];
        }
        */
        //验证数据完整性。
        if (isset($merid, $orderno, $amount, $currencycode, $transdate, $transtype, $status, $checkvalue)) {
            if ($this->Version == '20070129') { //版本不通，则签名方式不同。
                $isVerify = verifyTransResponse($merid, $orderno, $amount, $currencycode, $transdate, $transtype, $status, $checkvalue);
            } else {
                $plain = $merid.$orderno.$amount.$currencycode.$transdate.$transtype.$status.$checkvalue;
                $isVerify = verify($plain, $checkvalue);
            }
            
            if (!$isVerify) {
                $error[] = '验证签名失败！';
            }
        } else {
            $error[] = '回传数据缺失！';
        }
        
        return $error;
    }
}

?>