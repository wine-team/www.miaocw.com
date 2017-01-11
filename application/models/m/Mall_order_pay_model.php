<?php
class Mall_order_pay_model extends CI_Model
{
    private $table   = 'mall_order_pay';
    
    /**
     * 主订单编号 子订单id
     * @param unknown $params
     */
    public function create_order($params)
    {
       return $this->db->insert($this->table, $params);
    }
}