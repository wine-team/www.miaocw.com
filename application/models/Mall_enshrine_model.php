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
	
	 /**
	 * 
	 * @param unknown $param
	 */
	public function findByEnshrine($param=array()){
		
		if (!empty($param['goods_id'])) {
			$this->db->where('goods_id',$param['goods_id']);
		}
		if (!empty($param['uid'])) {
			$this->db->where('uid',$param['uid']);
		}
		return $this->db->get($this->table);
	}
	
	 /**
	 * 删除
	 * @param unknown $param
	 */
	public function deleteByEnshrine($param=array()) {
		
		if (!empty($param['goods_id'])) {
			$this->db->where('goods_id',$param['goods_id']);
		}
		if (!empty($param['uid'])) {
			$this->db->where('uid',$param['uid']);
		}
		return $this->db->delete($this->table);
	}
	
}