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
}