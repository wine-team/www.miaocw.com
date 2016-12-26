<?php
class Mall_order_history_model extends CI_Model
{
    private $table = 'mall_order_history';
    
    public function insert($data){
    	
        return $this->db->insert($this->table, $data);
    }
}