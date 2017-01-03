<?php
 
class Mall_cart_goods_model extends CI_Model{
	
	private $table = 'mall_cart_goods';
	private $table_1 = 'mall_goods_base';
	
	 /**
	 * 获取购物车内容
	 * @param unknown $uid
	 */
	public function getCartGoodsByRes($param=array(),$f='*'){
		
		$this->db->select('mall_cart_goods.goods_id,uid,attribute_value,goods_num,goods_name,goods_img,shop_price,promote_price,promote_start_date,promote_end_date');
		$this->db->from($this->table);
		$this->db->join('mall_goods_base','mall_goods_base.goods_id=mall_cart_goods.goods_id');
		if (!empty($param['uid'])) {
			$this->db->where('uid',$param['uid']);
		}
		return $this->db->get();
	}
	
	 /**
	 * 购物车的添加
	 * @param unknown $param
	 */
	public function addQty($param=array()){
		
	    $data = array(
	    	'uid'  => $param['uid'],
	        'goods_id' => $param['goods_id'],
	    	'attribute_value' => $param['attribute_value'],
	        'goods_num' => $param['goods_num'],
	    	'creat_at'  => date('Y-m-d H:i:s')
	    );
	    return $this->db->insert($this->table,$data);
	}
	
	 /**
	 * 删除
	 * @param unknown $param
	 */
	public function deleteCartGoods($param=array()) {
		 
		if (!empty($param['uid'])) {
			$this->db->where('uid',$param['uid']);
		}
		if (!empty($param['goods_id'])) {
			$this->db->where('goods_id',$param['goods_id']);
		}
		return $this->db->delete($this->table);
	}
}