<?php
 
class Mall_category_model extends CI_Model{
	
	private $table = 'mall_category';
	
	/**
	 *获取所有的分类
	 */
	public function getAllCategory(){
	
		$this->db->where('is_show',1);
		$category = $this->db->get($this->table);
		$firstCat = array();
		foreach ($category->result() as $key=>$val) {
			if (($val->parent_id==0) ) {
				$firstCat[$key]['cat_id'] = $val->cat_id;
				$firstCat[$key]['cat_name'] = $val->cat_name;
				 //$firstCat[$key]['keyword'] = $val->keyword;
			}
		}
		foreach ($firstCat as $key=>$item){
			foreach ($category->result() as $ikey=>$jitem) {
				if( $jitem->parent_id == $item['cat_id'] ){
					$firstCat[$key]['childCat'][$ikey]['cat_id'] = $jitem->cat_id;
					$firstCat[$key]['childCat'][$ikey]['cat_name'] = $jitem->cat_name;
				}
			}
		}
		return $firstCat;
	}
	
	 /**
	 * 获取下级分类ID
	 * @param unknown $parent_id
	 */
	public function getChildCat($parent_id){
		
		$this->db->select('cat_name,cat_id');
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