<?php
class User_coupon_get_model extends CI_Model
{
	private $table = 'user_coupon_get';
	
	 /**
	 * 获取优惠劵
	 * @param unknown $uid
	 */
	public function getCouponByUid($uid) {
		
		$this->db->select('user_coupon_get.*');
		$this->db->from($this->table);
		//$this->db->join('user_coupon_set','user_coupon_set.coupon_set_id=user_coupon_get.coupon_set_id');
	    $this->db->where('user_coupon_get.uid',$uid);
	    $this->db->where('user_coupon_get.status',1);
	    $this->db->where('user_coupon_get.start_time<=',date('Y-m-d H:i:s'));
	    //$this->db->where('user_coupon_get.end_time>=',date('Y-m-d H:i:s'));
	    return $this->db->get();
	}
	
}