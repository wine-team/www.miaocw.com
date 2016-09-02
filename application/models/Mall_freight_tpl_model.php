 <?php
class Mall_freight_tpl_model extends CI_Model{
	
	private $table = 'mall_freight_tpl';
	
	 /**
	 *  获取运费信息
	 *  @param unknown $params
	 */
	public function getTransports($params){
	
		$this->db->where('uid',$params['uid']);
		$this->db->where('freight_id',$params['freight_id']);
		return $this->db->get($this->table)->row();
	}
}