<?php
class Task extends MW_Controller
{
    public function _init()
    {
    	$this->load->model('user_model','user');
    	$this->load->model('account_log_model','account_log');
    	$this->load->model('mall_order_base_model','mall_order_base');
    	$this->load->model('mall_order_product_model','mall_order_product');
    	$this->load->model('mall_order_reviews_model','mall_order_reviews');
    	$this->load->model('mall_order_product_profit_model','mall_order_product_profit');
    }

    /**
     * 自动关闭订单
     * $order_state  = 1
     * $order_status = 1
     */
    public function undoMallOrder()
    {
        //24小时 未付款的订单
        $result = $this->mall_order_base->findByParamsOrder(array('created_at'=>date('Y-m-d H:i:s', strtotime('-1 day')), 'order_status'=>2),$f='order_id');
        if ($result->num_rows() <= 0) {
            return ;
        }
        $order = $result->result();
        foreach ($order as $item) {
            $order_ids[] = $item->order_id;
        }
        if (empty($order_ids)) {
            return ;
        }
        //事物处理中
        $this->db->trans_begin();
        $stockInfo = $this->mall_order_product->findByParamProduct(array('order_ids'=>$order_ids));
        foreach ($stockInfo->result() as $key => $item) {
        	if ($item->minus_stock ==1) { //拍下减库存
        		$numStatus = $this->mall_goods_base->setMallNum(array('goods_id'=>$item->goods_id,'number'=>$item->refund_num)); // 产品表库存的变化
        		if (!$numStatus) {
        			$this->db->trans_rollback();
        			$this->jsen('更新库存失败');
        		}
        	}
        }
        $isUndoOrder = $this->mall_order_base->undoNotPayOrder($order_ids);
        if ($this->db->trans_status() === FALSE || !$isUndoOrder) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
        echo implode(',', $order_ids);exit;
    }

    /**
     * 发货7天后未确认收货的，自动确认收货
     * $order_state  = 3
     * $order_status = 5
     */
    public function receiveMallOrder()
    {
        $send_time = date('Y-m-d H:i:s', strtotime('-1 week'));
        $result = $this->mall_order_base->findByParamsOrder(array('send_time'=>$send_time, 'order_status'=>4),$f='order_id');
        if ($result->num_rows() <= 0) {
            return ;
        }
        $order = $result->result();
        foreach ($order as $item) {
            $order_ids[] = $item->order_id;
        }
        if (empty($order_ids)) {
            return ;
        }
        $this->db->trans_begin();
        $isReceive = $this->mall_order_base->receiveMallOrder($order_ids);
        if ($this->db->trans_status() === FALSE || !$isReceive) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
        echo implode(',', $order_ids);exit;
    } 
    
     /**
     * 确认收货后7天未评价，则系统自动好评，然后分钱
     * $order_state  = 4
     * $order_status = 6
     */
    public function reviewsMallOrder()
    {
    	/**
    	 * order_status = 5
    	 * receive_time > date('Y-m-d H:i:s', strtotime('-1 week'))
    	 */
    	$result = $this->mall_order_base->findByParamsOrder(array('order_status'=>5, 'receive_time'=>date('Y-m-d H:i:s', strtotime('-1 week'))));
    	if ($result->num_rows() <= 0) {
    		return ;
    	}
    	$orders = $result->result();
    	$ordersInfo = array();
    	foreach ($orders as $item) {
    		$order_ids[] = $item->order_id;
    		$ordersInfo[$item->order_id]['payer_uid']  = $item->payer_uid;
    		$ordersInfo[$item->order_id]['user_name']  = $item->user_name;
    		$ordersInfo[$item->order_id]['seller_uid'] = $item->seller_uid;
    	}
    	if (empty($order_ids) || empty($ordersInfo)) {
    		return ;
    	}
    	//获取订单下所有产品
    	$result1 = $this->mall_order_product->getOrderProduct(array('order_id'=>$order_ids));
    	if ($result1->num_rows() <= 0) {
    		return ;
    	}
    	$orderPoduct = $result1->result();
    	$orderReviews = array();
    	foreach ($orderPoduct as $key=>$product) {
    		$order_product_ids[] = $product->order_product_id;
    		$orderReviews[$key]['order_product_id']= $product->order_product_id;
    		$orderReviews[$key]['order_id']        = $product->order_id;
    		$orderReviews[$key]['goods_id']   	   = $product->goods_id;
    		$orderReviews[$key]['goods_attr'] 	   = $product->attr_value;
    		$orderReviews[$key]['goods_name']      = $product->goods_name;
    		$orderReviews[$key]['uid']             = $ordersInfo[$product->order_id]['payer_uid'];
    		$orderReviews[$key]['user_name']       = $ordersInfo[$product->order_id]['user_name'];
    		$orderReviews[$key]['content']         = '好评！';
    		$orderReviews[$key]['status']          = 2; //审核通过
    		$orderReviews[$key]['score']           = 5; //好评分
    	}
    	if (empty($order_product_ids) || empty($orderReviews)) {
    		return ;
    	}
    	//获取订单产品下所有分润信息
    	$result2 = $this->mall_order_product_profit->findByParamProductProfit(array('order_product_ids'=>$order_product_ids));
    	if ($result2->num_rows() <= 0) {
    		return ;
    	}
    	$orderPoductProfit = $result2->result();
    	$this->db->trans_begin();
    	$isProfit = $this->operatingProfit($orderPoductProfit); //产品分润
    	$isFreight = $this->distributionFreight($orders); //运费分润
    	//对订单下的产品进行好评处理
    	$isReviews = $this->mall_order_reviews->insertBatchReviews($orderReviews);
    	$isUpdate = $this->mall_order_base->reviewsMallOrder($order_ids); //订单状态修改
    	
    	if ($this->db->trans_status() === FALSE || !$isProfit || !$isFreight || !$isReviews || !$isUpdate) {
    		$this->db->trans_rollback();
    	} else {
    		$this->db->trans_commit();
    	}
    	echo implode(',', $order_ids);exit;
    }
    
    
    /***
     * 分钱操作  1，给账户分钱
    *          2，插入分钱记录
    *          3，插入分润记录
    * @param $orderProductProfit
    * @return bool
    */
    private function operatingProfit($orderProductProfit)
    {
    	$accountLogData = array();
    	$userAccountData = array();
    	foreach ($orderProductProfit as $key => $item) {
    		if ($item->uid <= 0 || $item->account <= 0) {
    			continue;
    		}
    		
    		$accountStatus = $this->user->updateUserAccountProfit($item->uid,$item->account);
    	    
    		$accountLogData[$key]['uid'] = $item->uid;
    		$accountLogData[$key]['order_id'] = $item->order_product_id;
    		$accountLogData[$key]['account_type'] = $item->account_type;//1提现
    		$accountLogData[$key]['flow'] = 1;//收入
    		$accountLogData[$key]['trade_type'] = 3;// 1购物，2充值，3提现，4转账，5还款,6退款
    		$accountLogData[$key]['amount'] = $item->account;
    		$accountLogData[$key]['note'] = '产品供应价分钱';
    		$accountLogData[$key]['created_at'] = date('Y-m-d H:i:s',time());
    	}
    	$accountLog = $this->account_log->insertBatch($accountLogData);
    	if (!$accountLog && !$accountStatus) {
    		return false;
    	}
    	return true;
    }
    
    /**
     * 给供应商 分运费的钱
     * @param $tourismOrder
     */
    public function distributionFreight($orders)
    {
    	$accountLog = array();
    	foreach ($orders as $key => $order) {
    		if (!empty($order->seller_uid) && $order->deliver_price > 0) {
    			$freight = $this->user->updateUserAccountProfit($order->seller_uid, $order->deliver_price);
    			if (!$freight) {
    				return false;
    			}
    			
    			$accountLogData[$key]['uid'] = $order->seller_uid;
    			$accountLogData[$key]['order_id'] = $order->order_id;
    			$accountLogData[$key]['account_type'] = $order->account_type;//1提现
    			$accountLogData[$key]['flow'] = 1;//收入
    			$accountLogData[$key]['trade_type'] = 3;// 1购物，2充值，3提现，4转账，5还款,6退款
    			$accountLogData[$key]['amount'] = $order->deliver_price;
    			$accountLogData[$key]['note'] = '运费分钱';
    			$accountLogData[$key]['created_at'] = date('Y-m-d H:i:s',time());
    		}
    	}
    	if (!empty($accountLog)) {
    		$log = $this->account_log->insertBatch($accountLog);
    		if (!$log) {
    			return false;
    		}
    	}
    	return true;
    }
}