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
}