<?php

class Sales_topic_category_model extends CI_Model
{
    private $table = 'sales_topic_category';

    /**
     * 获取sales
     * @param unknown $salesId
     * @param string $f
     */
    public function getSalesTopicCate($salesId,$f='*') {
    	 
    	$this->db->select($f);
    	$this->db->from($this->table);
    	$this->db->where('status',1);
    	if (is_array($salesId)) {
    		$this->db->where_in('sales_id',$salesId);
    	} else {
    		$this->db->where('sales_id',$salesId);
    	}
    	$this->db->order_by('sort','desc');
    	$result = $this->db->get();
    	$cateArray = array();
    	foreach ($result->result() as $i=>$item) {
    		$cateArray[$item->sales_id][] = $item;
    	}
    	return $cateArray;
    }
    
     /**
     * 获取分类精品推荐
     * @param unknown $salesId
     */
    public function getSalesProduct($salesId) {
    	
    	$this->db->select('sales_category_product.product_id');
    	$this->db->from($this->table);
    	$this->db->join('sales_category_product','sales_topic_category.category_id = sales_category_product.category_id');
    	if (is_array($salesId)) {
    		$this->db->where_in('sales_topic_category.sales_id',$salesId);
    	} else {
    		$this->db->where('sales_topic_category.sales_id',$salesId);
    	}
    	$this->db->order_by('sales_category_product.sort','asc');
    	return $this->db->get();
    }

}