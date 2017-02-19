<?php
class Mall_enshrine_model extends CI_Model
{
    private $table = 'mall_enshrine';
    private $table1 = 'mall_goods_base';
    
    public function enshrineList($num, $perpage, $uid)
    {
        $this->db->select('mall_enshrine.id AS enshrine_id, mall_goods_base.goods_id,mall_goods_base.goods_name,mall_goods_base.shop_price,mall_goods_base.market_price,mall_goods_base.promote_price,mall_goods_base.promote_start_date,mall_goods_base.promote_end_date,mall_goods_base.goods_img');
        $this->db->from($this->table);
        $this->db->join($this->table1, 'mall_enshrine.goods_id = mall_goods_base.goods_id','inner');
        $this->db->where('uid', $uid);
        $this->db->limit($perpage, $num);
        $this->db->order_by('id','desc');
        return $this->db->get();
    }
    
     /**
     * 删除收藏
     * @param unknown $param
     */
    public function delete($param=array())
    {
        $this->db->where($param);
        return $this->db->delete($this->table);
    }
    
    public function insert($param=array()) {
    	
    	return $this->db->insert($this->table,$param);
    }
    
    /**
     * 总数
     * @param unknown $param
     */
    public function total($param=array()){
    	
    	if(!empty($param['uid'])) {
    		$this->db->where('uid',$param['uid']);
    	}
    	return $this->db->count_all_results($this->table);
    }
    
}