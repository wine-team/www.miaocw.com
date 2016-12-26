<?php
class Mall_order_product_model extends CI_Model
{
    private $table   = 'mall_order_product';
   
     /**
     * 获取订单产品
     * @param unknown $param
     * @param unknown $opf
     */
    public function getMallOrderProduct($param=array(),$opf)
    {
    	$this->db->select($opf);
    	$this->db->from($this->table);
    	$this->db->where('order_id',$param['order_id']);
    	return $this->db->get();
    }
    
}