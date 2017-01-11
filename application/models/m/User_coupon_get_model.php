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
    	$this->checkWhere($param);
    	return $this->db->get();
    }
    
    public function checkWhere($param=array()) {
    	
    	if (!empty($param['uid'])) {
    		$this->db->where('uid',$param['uid']);
    	}
    	if (!empty($param['status'])) {
    		$this->db->where('status',$param['status']);
    	}
    	if (!empty($param['date'])) {
    		$this->db->where('start_time<=',$param['date']);
    		$this->db->where('end_time>=',$param['date']);
    	}
    }
    
     /**
     * 更新数据
     * @param unknown $coupon_id
     */
    public function updateStatus($coupon_id) {
    	
    	$this->db->where('coupon_get_id', $coupon_id);
    	return $this->db->update($this->table, array('status'=>1));
    }
    
    /**
     * 根据coupon_id更新这个已用
     * @param unknown $coupon_id
     */
    public function setStatus($coupon_id,$uid) {
    	 
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