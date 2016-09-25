<?php
class Mall_order_base_model extends CI_Model
{
    private $table   = 'mall_order_base';
    
    public function create_order($params)
    {
    	$this->db->insert($this->table, $params);
    	return $this->db->insert_id();
    }
    
    public function updateMallOrder($param)
    {
    	$this->db->where('order_id', $param['order_id']);
    	return $this->db->update($this->table, $param);
    }
    
    /**
     * 根据pay_id更新内容
     * @param unknown $pay_id
     * @param unknown $param
     */
    public function updateByPayId($pay_id,$param) {
    	
    	$this->db->where('pay_id',$pay_id);
    	return $this->db->update($this->table,$param);
    }
    
     /**
     * 获取订单信息
     * @param unknown $param
     */
    public function getOrderBaseByRes($param=array()){
    	
    	$this->db->select('SUM(deliver_price) AS transport_cost,SUM(actual_price) AS actual_pay');
        $this->db->from($this->table);
        if (!empty($param['uid'])) {
        	$this->db->where('payer_uid',$param['uid']);
        }
        if (!empty($param['pay_id'])) {
        	$this->db->where('pay_id',$param['pay_id']);
        }
        return $this->db->get();
    }
    
    /**
     * 获取要更改的信息
     * @param unknown $params
     */
    public function findByParamsOrder($params,$f){
    	
    	$this->db->select($f);
    	if (!empty($params['order_status'])) {
    		$this->db->where('order_status', $params['order_status']);
    	}
    	if (!empty($params['created_at'])) { //生成订单时间
    		$this->db->where('created_at <', $params['created_at']);
    	}
    	if (!empty($params['send_time'])) { //卖家发货时间
    		$this->db->where('send_time <', $params['send_time']);
    	}
    	if (!empty($params['receive_time'])) { //买家确认收货时间
    		$this->db->where('receive_time <', $params['receive_time']);
    	}
    	return $this->db->get($this->table);
    }
    
    /**
     * 24小时未付款，自动取消订单
     * @param unknown $params
     */
    public function undoNotPayOrder($order_ids)
    {
    	$data = array(
    			'order_state'  => 1, //未付款
    			'order_status' => 1, //取消订单
    			'updated_at'   => date('Y-m-d H:i:s', time())
    	);
    	$this->db->where_in('order_id', $order_ids);
    	$this->db->where('order_status', 2);
    	return $this->db->update($this->table, $data);
    }
    
    /**
     * 发货后7天未确认收货的，订单自动确认收货
     */
    public function receiveMallOrder($order_ids)
    {
    	$data = array(
    			'order_state'  => 3, //已完成
    			'order_status' => 5, //已收货
    			'receive_time' => date('Y-m-d H:i:s', time()),
    			'updated_at'   => date('Y-m-d H:i:s', time())
    	);
    	$this->db->where_in('order_id', $order_ids);
    	$this->db->where('order_status', 4);
    	return $this->db->update($this->table, $data);
    }
    
     /**
     * 确认收货后7天未评价的，订单自动评价，分钱
     */
    public function reviewsMallOrder($order_ids)
    {
    	$data = array(
    			'order_state'  => 4, //已评价
    			'order_status' => 6, //已评价
    			'reviews_time' => date('Y-m-d H:i:s', time()),
    			'updated_at'   => date('Y-m-d H:i:s', time())
    	);
    	$this->db->where_in('order_id', $order_ids);
    	$this->db->where('order_status', 5);
    	return $this->db->update($this->table, $data);
    }
}