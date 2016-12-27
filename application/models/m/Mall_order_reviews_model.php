<?php
class Mall_order_reviews_model extends CI_Model
{
    private $table = 'mall_order_reviews';
        
    public function insertArray($data)
    {
        return $this->db->insert_batch($this->table, $data);
    }
    
}