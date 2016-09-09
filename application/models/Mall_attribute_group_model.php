<?php
class Mall_attribute_group_model extends CI_Model
{
    private $table = 'mall_attribute_group';
    private $table1 = 'mall_attribute_value';

    
     /**
     * 
     * @param unknown $attr_set_id
     */
    public function getAttrValuesByAttrSetId($attr_set_id)
    {
        $this->db->select('mall_attribute_group.attr_set_id, mall_attribute_group.group_name, mall_attribute_value.*');
        $this->db->from($this->table);
        $this->db->join($this->table1, 'mall_attribute_group.group_id = mall_attribute_value.group_id');
        $this->db->where('mall_attribute_group.attr_set_id', $attr_set_id, 'INNER');
        return $this->db->get();
    }
}