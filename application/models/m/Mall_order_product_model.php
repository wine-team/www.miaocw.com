<?php
class Mall_order_product_model extends CI_Model
{
    private $table   = 'mall_order_product';
   
    /**
     * 添加产品订单
     * @param unknown $params
     */
    public function addOrderProduct($params)
    {
    	$this->db->insert($this->table, $params);
    	return $this->db->insert_id();
    }
     /**
     * 获取订单产品
     * @param unknown $param
     * @param unknown $opf
     */
    public function getMallOrderProduct($param=array(),$opf)
    {
    	$this->db->select($opf);
    	$this->db->from($this->table);
    	if (!empty($param['order_id'])) {
    		$this->db->where('order_id',$param['order_id']);
    	}
    	return $this->db->get();
    }
    
     /**
     * 更新数据
     */
    public function update($param=array(),$orderProductId) {
    	
    	if (isset($param['refund_num'])) {
    		$data['refund_num'] = $param['refund_num'];
    	}
    	$data['updated_at'] = date('Y-m-d H:i:s');
    	$this->db->where('order_product_id',$orderProductId);
    	return $this->db->update($this->table,$data);
    }
}