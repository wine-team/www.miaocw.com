<?php
class Mall_order_pay_model extends CI_Model
{
    private $table   = 'mall_order_pay';
    
    /**
     * 主订单编号 子订单id
     * @param unknown $params
     */
    public function create_order($params)
    {
       return $this->db->insert($this->table, $params);
    }
    
     /**
     * 获取总订单信息
     * @param unknown $param
     */
    public function findOrderPayByRes($param=array(),$f='*') {
    	 
    	$this->db->select($f);
    	$this->db->from($this->table);
    	if (!empty($param['uid'])){
    		$this->db->where('uid',$param['uid']);
    	}
    	if (!empty($param['pay_id'])){
    		$this->db->where('pay_id',$param['pay_id']);
    	}
    	return $this->db->get();
    }
}