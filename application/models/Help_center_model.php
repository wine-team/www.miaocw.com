<?php
class Help_center_model extends CI_Model{
	
	private $table = 'help_center';
	
	 /**
	 * 首页获取资讯中心内容
	 * @param unknown $uid
	 */
	public function getHelpCenter($limit){
		
		$this->db->select('help_center.*');
		$this->db->from($this->table);
		$this->db->join('help_category','help_category.category_id=help_center.help_category_id');
		$this->db->where('help_category.flag',2); //资讯中心
		$this->db->where('help_center.flag',1); //上架
		$this->db->order_by('help_center.sort','desc');
		$this->db->limit($limit);
		return $this->db->get();
	}
}