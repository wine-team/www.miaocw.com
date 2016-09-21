<?php
class Account_log_model extends CI_Model
{
	private $table = 'account_log';
	
	 /**
	 * 插入用户账户日志
	 * @param unknown $param
	 */
	public function insertLog($param=array()) {
		
		$data = array(
			
		     'uid' => $param['uid'],
			 'order_id' => $param['order_id'], // 订单ID
			 'account_type' => $param['account_type'],//1账户,2积分 
			 'flow' => $param['flow'], //1收入，2支出
			 'trade_type' => $param['trade_type'],  // 1购物，2充值，3提现，4转账，5还款,6退款
			 'amount' => $param['amount'],// 金额
			 'note' => $param['note'],
			 'created_at' => date('Y-m-d H:i:s')
		);
		return $this->db->insert($this->table,$data);
	}
	
}