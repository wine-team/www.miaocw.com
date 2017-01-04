<?php

class Sales_topic_model extends CI_Model
{
    private $table = 'sales_topic';

    /**
     * 获取sales
     * @param unknown $salesId
     * @param string $f
     */
    public function getSalesTopic($salesId,$f='*') {
    	
    	$this->db->select($f);
    	$this->db->from($this->table);
    	if (is_array($salesId)) {
    		$this->db->where_in('sales_id',$salesId);
    	} else {
    		$this->db->where('sales_id',$salesId);
    	}
    	$this->db->where('status',1);
    	return $this->db->get();
    }


}