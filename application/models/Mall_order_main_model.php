<?php
class Mall_order_main_model extends CI_Model
{
    private $table   = 'mall_order_main';
    
    /**
     * 主订单编号 子订单id
     * @param unknown $params
     */
    public function create_order($params)
    {
        $this->db->insert($this->table, $params);
        return $this->db->insert_id();
    }
    
    
     /**
     * 更新订单信息
     * @param unknown $order_sn
     * @param unknown $param
     */
    public function updatePayOrderInfo($order_main_sn,$param){
    	
        $this->db->where('order_main_sn',$order_main_sn);
        return $this->db->update($this->table,$param);
    }
    
     /**
     * 获取总订单信息
     * @param unknown $param
     */
    public function findOrderMainByRes($param=array()) {
    	
    	 $this->db->select('*');
    	 $this->db->from($this->table);
    	 if (!empty($param['uid'])){
    	 	$this->db->where('uid',$param['uid']);
    	 }
    	 if (!empty($param['order_main_sn'])){
    	 	$this->db->where('order_main_sn',$param['order_main_sn']);
    	 }
    	 return $this->db->get();
    }
}