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
}