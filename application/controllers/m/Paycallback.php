<?php
class Paycallback extends MW_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('wapalipay/alipaypc', null, 'alipaypc');
        
    }
    
    /**
     * 支付宝支付
     * 异步回调函数。 ok
     */
    public function alipayNotify()
    {
        $response = $this->alipaypc->responseAlipayNotify();
        $payId = $response;
        $result = $this->pay_record->findByPayId($payId);
        if ($result->num_rows() <= 0) {
            return ;
            //$this->jsonMessage('订单信息有误，或长时间未支付');
        }
        $payRecord = $result->row(0);
        if ($response) { //$response付款成功；
            
        }
    }
}

