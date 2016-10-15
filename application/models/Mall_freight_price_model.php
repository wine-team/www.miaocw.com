 <?php
class Mall_freight_price_model extends CI_Model{
	
	private $table = 'mall_freight_price';
	
	 /**
	 * 获取运费模板
	 * @param unknown $params
	 */
	public function getFreightRow($params)
	{
		$area = trim(addslashes($params['area']));
		$sql = 'freight_id = ' . $params['freight_id'] . ' AND (is_default = 1 OR area like "%' . $area . '%")';
		$this->db->where($sql);
		$this->db->order_by('is_default', 'asc');
		return $this->db->get($this->table)->row();
	}
	
}