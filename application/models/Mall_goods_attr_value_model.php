<?php
class Mall_goods_attr_value_model extends CI_Model
{
    private $table = 'mall_goods_attr_value';
    
     /**
     * 所有的
     * @param unknown $param
     */
    public function findByRes($param=array(),$f='*'){
    	
    	$this->db->select($f);
    	$this->db->from($this->table);
    	if (!empty($param['goods_id'])) {
    	   $this->db->where('goods_id',$param['goods_id']);
    	}
    	return $this->db->get();
    }
}