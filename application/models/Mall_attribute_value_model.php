<?php
class Mall_attribute_value_model extends CI_Model
{
    private $table = 'mall_attribute_value';

    /**
     * 获取
     * @param unknown $param
     * @param string $f
     */
    public function findByRes($param=array(),$f='*') {
    	
    	$this->db->select($f);
    	$this->db->from($this->table);
    	if (!empty($param['attr_value_id'])) {
    		if (is_array($param['attr_value_id'])) {
    			$this->db->where_in('attr_value_id',$param['attr_value_id']);
    		} else {
    			$this->db->where('attr_value_id',$param['attr_value_id']);
    		}
    	}
    	return $this->db->get();
    }
}