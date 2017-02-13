<?php
class User_feedback_model extends CI_Model {

	private $table = 'user_feedback';

	 /**
	 * 插入
	 * @param unknown $data
	 */
	public function insert($data) {
		
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

}