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
     * 更新
     */
    public function updateUser($param=array()) {

    	if (!empty($param['password'])) {
    		$data['password'] = $param['password'];
    	}
    	if (!empty($param['uid'])) {
    		$this->db->where('uid',$param['uid']);
    	}
    	return $this->db->update($this->table,$data);
    }
}