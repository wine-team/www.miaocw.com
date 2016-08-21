 <?php
class Region_model extends CI_Model
{
    private $table = 'region';
    
    /**
     * 查找同一个父级元素
     * @param unknown $parent_id
     * @param unknown $region_type
     */
    public function findCityByParentId($parent_id, $region_type){
    	 
    	$this->db->select('region_id,parent_id,region_name');
    	$this->db->from($this->table);
    	$this->db->where('parent_id',$parent_id);
    	$this->db->where('region_type',$region_type);
    	return $this->db->get();
    }
    
    function children_of($parent_id)
    {
    	$this->db->where('parent_id', (int)$parent_id);
    	$result = $this->db->get($this->table);
    	if ($result->num_rows() > 0){
    		return $result->result_array();
    	}
    	return array();
    }
    
}