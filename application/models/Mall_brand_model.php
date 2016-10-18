 <?php
class Mall_brand_model extends CI_Model{
	
	private $table = 'mall_brand';
	
	/**
	 * 获取品牌
	 * @param unknown $limit
	 */
	public function findBrand($limit = 0,$f='*'){
		
		$this->db->select($f);
		$this->db->from($this->table);
		$this->db->order_by('sort_order','asc');
		if($limit) $this->db->limit($limit);
		return $this->db->get();
	}
}