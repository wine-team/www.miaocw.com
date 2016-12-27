<?php
class User_coupon_get_model extends CI_Model
{
    private $table = 'user_coupon_get';
    
     /**
     * 获取用户优惠劵
     * @param unknown $uid
     * @param string $f
     */
    public function getUserCoupn($param=array(),$f='*') {
    	
    	$this->db->select($f);
    	$this->db->from($this->table);
    	if (!empty($param['uid'])) {
    		$this->db->where('uid',$param['uid']);
    	}
    	return $this->db->get();
    }
    
     /**
     * 更新数据
     * @param unknown $coupon_id
     */
    public function updateStatus($coupon_id){
    	
    	$this->db->where('coupon_get_id', $coupon_id);
    	return $this->db->update($this->table, array('status'=>1));
    }
}