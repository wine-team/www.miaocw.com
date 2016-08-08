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
	
	/**
	 * 根据么些特定的原因获取产品
	 * @param unknown $param
	 */
	public function getGoodsBaseByReason($param){
		
	     $this->db->select('goods_id,goods_name,market_price,promote_price,goods_img,sale_count,review_count');
	     $this->db->from($this->table);
	     $this->db->where('is_on_sale',1);
	     $this->db->where('is_check',2);
	     if (!empty($param['category_id'])){
	     	$this->db->where('category_id',$param['category_id']);
	     }
	     if (!empty($param['hot_recommend'])){
	     	$this->db->where('hot_recommend',$param['hot_recommend']);
	     }
	     return $this->db->get();
	}
}