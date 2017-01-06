<?php

class Mall_category_model extends CI_Model{
	
	private $table = 'mall_category';
	
	public function getMallCategory($param=array(),$f='*') {
		
		$this->db->select($f);
		$this->db->from($this->table);
		return $this->db->get();
	}
	
	/**
	 * 获取下级分类ID
	 * @param unknown $parent_id
	 */
	public function getChildCat($parent_id,$f='*'){
	
		$this->db->select($f); 
		$this->db->from($this->table);
		$this->db->where('parent_id',$parent_id);
		$this->db->where('is_show',1);
		return $this->db->get();
	}
	
	/**
	 *
	 * @param string $f
	 * @param unknown $cat_id
	 */
	public function findCatById($f='*',$cat_id) {
	
		$this->db->select($f);
		$this->db->from($this->table);
		$this->db->where('cat_id',$cat_id);
		return $this->db->get();
	}
}