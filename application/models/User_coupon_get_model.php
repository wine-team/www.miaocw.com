<?php
class User_coupon_get_model extends CI_Model
{
	private $table = 'user_coupon_get';
	
	 /**
	 * 获取优惠劵
	 * @param unknown $uid
	 */
	public function getCouponByRes($param=array()) {
		
		$this->db->select('coupon_get_id,coupon_set_id,coupon_name,uid,amount,condition');
		$this->db->from($this->table);
	    $this->db->where('user_coupon_get.status',1);
	    $this->db->where('user_coupon_get.start_time<=',date('Y-m-d H:i:s'));
	    $this->db->where('user_coupon_get.end_time>=',date('Y-m-d H:i:s'));
	    if (isset($param['uid'])) {
	    	$this->db->where('user_coupon_get.uid',$param['uid']);
	    }
	    if (isset($param['condition'])) {
	    	$this->db->where('user_coupon_get.condition <= ',$param['condition']);
	    }
	    if (isset($param['coupon_get_id'])) {
	    	$this->db->where('user_coupon_get.coupon_get_id',$param['coupon_get_id']);
	    }
	    $result = $this->db->get();
	    $couponArr = array();
	    if ($result->num_rows()>0) {
	    	foreach ($result->result() as $key=>$item) {
	    		$couponArr[$item->coupon_get_id] = $item;
	    	}
	    }
	    return  $couponArr;
	}
	
	/**
	 * 根据coupon_id更新这个已用
	 * @param unknown $coupon_id
	 */
    public function updateStatus($coupon_id,$uid) {
    	
        $data['status'] = 2;//已用
        $this->db->where('uid',$uid);
        $this->db->where('coupon_get_id',$coupon_id);
    	return $this->db->update($this->table,$data);
    }
    
     /**
      * 根据多个id进行选取结果
      * @param unknown $coupon_get_id
      * @param unknown $uid
      */
    public function getCouponById($coupon_get_id,$uid) {
    	
    	$this->db->select('coupon_get_id,amount,condition,status');
    	$this->db->from($this->table);
    	$this->db->where('coupon_get_id',$coupon_get_id);
    	$this->db->where('uid',$uid);
    	$this->db->where('user_coupon_get.start_time <=',date('Y-m-d H:i:s'));
    	$this->db->where('user_coupon_get.end_time >=',date('Y-m-d H:i:s'));
    	return $this->db->get();
    }
	
}