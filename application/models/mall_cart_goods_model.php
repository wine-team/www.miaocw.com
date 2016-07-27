<?php
class Mall_cart_goods_model extends CI_Model{
	
	private $table = 'mall_cart_goods';
	private $table_1 = 'mall_goods_base';
	
	 /**
	 * 获取购物车内容
	 * @param unknown $uid
	 */
	public function getCartGoodsByUid($uid){
		
		$this->db->select('mall_goods_base.goods_name,mall_goods_base.promote_price,mall_goods_base.goods_img,mall_cart_goods.goods_num');
		$this->db->from($this->table);
		$this->db->join('mall_goods_base','mall_goods_base.goods_id=mall_cart_goods.goods_id','inner');
		$this->db->where('mall_cart_goods.uid',$uid);
		$this->db->order_by('mall_cart_goods.creat_at','desc');
		return $this->db->get();
	}
		
}