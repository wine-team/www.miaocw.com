<?php
 
class Mall_cart_goods_model extends CI_Model{
	
	private $table = 'mall_cart_goods';
	private $table_1 = 'mall_goods_base';
	
	 /**
	 * 获取购物车内容
	 * @param unknown $uid
	 */
	public function getCartGoodsByRes($param=array()){
		
		$this->db->select('mall_goods_base.goods_name,mall_goods_base.supplier_id,
				           mall_goods_base.promote_price,market_price,
				           shop_price,provide_price,promote_start_date,
				           promote_end_date,integral,minus_stock,mall_goods_base.goods_img,
				           mall_goods_base.extension_code,mall_goods_base.in_stock,
				           mall_goods_base.limit_num,mall_goods_base.goods_weight,
				           mall_goods_base.freight_cost,mall_goods_base.freight_id,
				           mall_cart_goods.goods_id,mall_cart_goods.goods_num,
				           mall_cart_goods.attribute_value'
	                      );
		$this->db->from($this->table);
		$this->db->join('mall_goods_base','mall_goods_base.goods_id=mall_cart_goods.goods_id','inner');
		$this->db->where('mall_goods_base.is_check','2');//审核通过
		$this->db->where('mall_goods_base.is_on_sale','1');//上架
		if (!empty($param['uid'])) {
		   $this->db->where('mall_cart_goods.uid',$param['uid']);
		}
		if (!empty($param['goods_id'])) {
		   $this->db->where_in('mall_cart_goods.goods_id',$param['goods_id']);
		}
		$this->db->order_by('mall_cart_goods.creat_at','desc');
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
	 * 查询么个商品是否存在
	 * @param unknown $param
	 */
	public function getCartGoods($param=array()) {
		
		$this->db->where('uid',$param['uid']);
		$this->db->where('goods_id',$param['goods_id']);
		return $this->db->get($this->table);
	}
	
	 /**  
	 * 更新购物车
	 * @param unknown $id
	 * @param unknown $qty
	 * @param unknown $spec
	 */
	public function updateCart($id, $qty,$spec)
	{
		$data['goods_num'] = $qty;
		$data['attribute_value'] = $spec;
		$this->db->where('id', $id);
		return $this->db->update($this->table,$data);
	}
	
	/**
	 * 更新数量
	 * @param unknown $id
	 * @param unknown $qty
	 * @param unknown $spec
	 */
	public function updateQty($id, $qty ,$spec)
	{
		$this->db->set('goods_num', 'goods_num+' . $qty, FALSE);
		$this->db->set('attribute_value', $spec);
		$this->db->where('id', $id);
		return $this->db->update($this->table);
	}
		
	 /**
	 * 删除
	 * @param unknown $param
	 */
    public function deleteCartGoods($param=array()){
    	
    	if (!empty($param['uid'])) {
    		$this->db->where('uid',$param['uid']);
    	}
    	if (!empty($param['goods_id'])) {
    		$this->db->where('goods_id',$param['goods_id']);
    	}
    	return $this->db->delete($this->table);
    }
    
     /**
     * 更新购物车的数量
     * @param unknown $param
     * @param unknown $qty
     */
    public function updateCartQty($param=array(),$qty){
    	
    	$this->db->set('goods_num','goods_num'+$qty,false);
    	$this->db->where('uid',$param['uid']);
    	$this->db->where('goods_id',$param['goods_id']);
    	return $this->db->update($this->table);
    }
    
     /**
     * 删除购物车的信息
     * @param unknown $params
     */
    public function clear_cart($params)
    {
    	$this->db->where_in('goods_id', $params['goods_id']);
    	$this->db->where('uid', $params['uid']);
    	return $this->db->delete($this->table);
    }
}