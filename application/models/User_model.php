<?php
class User_model extends CI_Model
{
    private $table = 'user';
    private $table_1 = 'user_log';
 
    /**
     * 登陆获取
     * @param unknown $postData
     */
    public function login($postData)
    {
        $username = trim(addslashes($postData['username']));
        $this->db->where("(`phone`='{$username}' OR `email`='{$username}')");
        $this->db->where('password', sha1(base64_encode(($postData['password']))));
        return $this->db->get($this->table);
    }

    
    
    public function insertUserLog($param){
    	return $this->db->insert($this->table_1,$param);
    }
    
     /**
     * 获取用户信息
     * @param unknown $param
     * @param string $f
     */
    public function getPayPoints($uid) {
    	
    	$this->db->select('pay_points');
    	$this->db->from($this->table);
    	$this->db->where('uid',$uid);
        $result = $this->db->get();
        return ($result->num_rows() > 0) ?  $result->row(0)->pay_points : 0;
    }
    
     /**
     * 重新设置积分
     * @param unknown $pay_points
     * @param unknown $uid
     */
    public function setPayPoints($pay_points,$uid){
    	
    	$this->db->set('pay_points','pay_points-'.$pay_points,false);
    	$this->db->where('uid',$uid);
    	return $this->db->update($this->table);
    }
}