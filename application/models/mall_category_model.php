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
}