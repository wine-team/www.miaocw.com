 <?php
class Mall_goods_base_model extends CI_Model{
	
	private $table = 'mall_goods_base';

	 
	 /**
	 * 获取购物车内容
	 * @param unknown $uid
	 */
	public function getGoodsByGoodsId($goodsId,$f='*') {
		
		$this->db->select($f);
		$this->db->from($this->table);
		if(is_array($goodsId)){
			$this->db->where_in('goods_id',$goodsId);
		} else { 
			$this->db->where('goods_id',$goodsId);
		}
		return $this->db->get();
	}
	
	/**
	 * 更新库存
	 * @param unknown $goods_id
	 * @param unknown $in_stock
	 */
	public function updateStock($goods_id, $in_stock){
		
        $this->db->set("in_stock", "in_stock + {$in_stock}", false);
        $this->db->where(array('goods_id'=>$goods_id));
        return $this->db->update($this->table);
    }
}