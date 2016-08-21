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
}