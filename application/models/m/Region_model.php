 <?php
class Region_model extends CI_Model
{
    private $table = 'region';
      
     /**
     * 通过数组IDs获取多个地区
     * @param unknown $regionids
     */
    public function getByRegionIds($regionids=array())
    {
    	$this->db->where_in('region_id', $regionids);
    	$this->db->order_by('region_id', 'ASC');
    	return $this->db->get($this->table);
    }
}