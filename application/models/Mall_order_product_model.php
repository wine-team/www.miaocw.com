<?php
class Mall_order_product_model extends CI_Model
{
    private $table   = 'mall_order_product';
   
    public function addOrderProduct($params)
    {
    	$this->db->insert($this->table, $params);
    	return $this->db->insert_id();
    }
    
     /**
     * 获取产品订单信息
     * @param unknown $param
     */
    public function getOrderProduct($param=array()){
    	
    	$this->db->select( 'mall_order_product.order_product_id,
    						mall_order_product.goods_id,
    			            mall_order_product.goods_name,
    			            mall_order_product.attr_value,
    						mall_order_product.shop_price,
    						mall_order_product.number,
    			            mall_order_product.refund_num,
    			            mall_order_base.delivery_address,
    			            mall_goods_base.minus_stock'
   						);
    	$this->db->from($this->table);
    	$this->db->join('mall_order_base','mall_order_base.order_id=mall_order_product.order_id');
        $this->db->join('mall_goods_base','mall_goods_base.goods_id=mall_order_product.goods_id');
        if (!empty($param['order_id'])) {
        	if (is_array($param['order_id'])) {
        		$this->db->where_in('mall_order_base.order_id',$param['order_id']);
        	} else {
        		$this->db->where('mall_order_base.order_id',$param['order_id']);
        	}
        }
        if (!empty($param['pay_id'])) {
        	$this->db->where('mall_order_base.pay_id',$param['pay_id']);
        }
    	if (!empty($param['uid'])) {
    		$this->db->where('mall_order_base.payer_uid',$param['uid']);
    	}
        return $this->db->get();
    }
    
     /**
     * 根据pay_id产品信息
     * @param unknown $pay_id
     */
    public function getOrderProductByPayId($pay_id) {
    	
    	$this->db->select('user.phone,mall_order_product.goods_id,mall_order_product.refund_num,mall_goods_base.minus_stock');
    	$this->db->from($this->table);
    	$this->db->join('mall_goods_base','mall_goods_base.goods_id=mall_order_product.goods_id');
    	$this->db->join('mall_order_base','mall_order_base.order_id=mall_order_product.order_id');
    	$this->db->join('user','mall_order_base.seller_uid=user.uid');
    	$this->db->where('mall_order_base.pay_id',$pay_id);
    	return $this->db->get();
    }
}