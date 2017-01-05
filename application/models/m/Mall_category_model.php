<?php

class Mall_category_model extends CI_Model{
	
	private $table = 'mall_category';
	
	public function getMallCategory($param=array(),$f='*') {
		
		$this->db->select($f);
		$this->db->from($this->table);
		return $this->db->get();
	}
}