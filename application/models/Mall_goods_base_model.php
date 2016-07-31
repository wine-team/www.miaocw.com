<?php
class Mall_goods_base_model extends CI_Model{
	
	private $table = 'mall_goods_base';
	
	 /**
	 * 获取购物车内容
	 * @param unknown $uid
	 */
	public function getGoodsByGoodsId($goodsId){
		
		$this->db->select('goods_id,goods_name,promote_price,goods_img');
		$this->db->from($this->table);
		if(is_array($goodsId)){
			$this->db->where_in('goods_id',$goodsId);
		} else { 
			$this->db->where('goods_id',$goodsId);
		}
		return $this->db->get();
	}
}