<?php
class Mall_enshrine_model extends CI_Model{
	
	private $table = 'mall_enshrine';
	
	 /**
	 * 插入
	 * @param unknown $uid
	 * @param unknown $goods_id
	 */
	public function insert($uid,$goods_id){

		$data = array(
			'uid' => $uid,
		    'goods_id' => $goods_id,
		    'created_at' => date('Y-m-d H:i:s')
		);
		return $this->db->insert($this->table,$data);
	}
	
}