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
    			            mall_order_base.delivery_address'
   						);
    	$this->db->from($this->table);
    	$this->db->join('mall_order_base','mall_order_base.order_id=mall_order_product.order_id');
        if (!empty($param['pay_id'])) {
        	$this->db->where('mall_order_base.pay_id',$param['pay_id']);
        }
    	if (!empty($param['uid'])) {
    		$this->db->where('mall_order_base.payer_uid',$param['uid']);
    	}
        return $this->db->get();
    }
}