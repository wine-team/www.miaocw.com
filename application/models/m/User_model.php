<?php
class User_model extends CI_Model
{
    private $table = 'user';

    /**
     * 发现
     * @param unknown $uid
     * @param string $f
     */
    public function findByUid($uid,$f='*') {
    	
    	$this->db->select($f);
        $this->db->where('uid', $uid);
        return $this->db->get($this->table);
    }
    
    /**
     * 数组发现
     * @param unknown $param
     * @param string $f
     */
    public function findByParam($param=array(),$f='*') {
    	
    	$this->db->select($f);
    	if (!empty($param['phone'])) {
    		$this->db->where('phone', $param['phone']);
    	}
    	if (!empty($param['email'])) {
    		$this->db->where('email', $param['email']);
    	}
    	return $this->db->get($this->table);
    }
    

    /**
     * 更新
     */
    public function updateUser($param=array()) {

    	if (!empty($param['password'])) {
    		$data['password'] = $param['password'];
    	}
    	if (!empty($param['sex'])) {
    		$data['sex'] = $param['sex'];
    	}
    	if (!empty($param['alias_name'])) {
    		$data['alias_name'] = $param['alias_name'];
    	}
    	if (!empty($param['phone'])) {
    		$data['phone'] = $param['phone'];
    	}
    	if (!empty($param['email'])) {
    		$data['email'] = $param['email'];
    	}
    	if (!empty($param['uid'])) {
    		$this->db->where('uid',$param['uid']);
    	}
    	return $this->db->update($this->table,$data);
    }
    
    /**
     * 更新积分
     * @param unknown $uid
     * @param unknown $pay_points
     */
    public function updatePoints($uid, $pay_points){
    	
    	$this->db->set("pay_points", "pay_points + {$pay_points}", false);
    	$this->db->where('uid',$uid);
    	return $this->db->update($this->table);
    }
}