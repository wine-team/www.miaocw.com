<?php
class Mall_order_product_model extends CI_Model
{
    private $table   = 'mall_order_product';
   
    public function addOrderProduct($params)
    {
    	$this->db->insert($this->table, $params);
    	return $this->db->insert_id();
    }
}