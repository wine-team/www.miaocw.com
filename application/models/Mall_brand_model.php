 <?php
class Mall_brand_model extends CI_Model{
	
	private $table = 'mall_brand';
	
	/**
	 * 获取品牌
	 * @param unknown $limit
	 */
	public function findBrand($f='*',$param=array(),$limit=0){
		
		$this->db->select($f);
		$this->db->from($this->table);
		$this->db->order_by('sort_order','asc');
		if (!empty($param['cat_id'])) {
		   $this->db->where('cat_id',$param['cat_id']);
		}
		if ($limit) {
		   $this->db->limit($limit);
		} 
		return $this->db->get();
	}
}