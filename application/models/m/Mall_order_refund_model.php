<?php
class Mall_order_refund_model extends CI_Model
{
    private $table = 'mall_order_refund';
    
    /**
     * 发现
     * @param unknown $order_id
     */
    public function findByOrderId($order_id,$rf='*')
    {
    	$this->db->select($rf);
    	$this->db->from($this->table);
    	$this->db->where('order_id',$order_id);
    	return $this->db->get();
    }
    
     /**
     * 插入
     * @param unknown $data
     */
    public function insertArray($data)
    {
        return $this->db->insert_batch($this->table, $data);
    }
    
    
}