<?php
class Pay_failure_log_model extends CI_Model {
	
	private $table = 'pay_failure_log';
	
	 /**
	 * 插入错误日志
	 * @param unknown $order_sn
	 * @param unknown $return_param
	 * @param unknown $error_body
	 */
	public function insertPayFailure($order_sn,$return_param,$error_body) {
		
		$data = array(
			'order_sn'   => $order_sn,
			'order_sn'   => $return_param,
			'error_body' => $error_body
		);
		return $this->db->insert($this->table,$data);
	}
	
	public function findByOrderSn($order_sn,$f='*') {
		
		$this->db->select($f);
		$this->db->from($this->table);
		$this->db->where('order_sn',$order_sn);
		return $this->db->get();
	}
}