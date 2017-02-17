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
	 * 
	 * @param unknown $param
	 * @param string $f
	 */
	public function getByParam($param=array(),$f='*') {
		
		$this->db->select($f);
		$this->db->from($this->table);
		if (!empty($param['attr_set_id'])) {
			$this->db->where('attr_set_id',$param['attr_set_id']);
		}
		$this->db->where('is_on_sale', 1);
		$this->db->where('is_check', 2);
		if (!empty($param['num'])) {
		    $this->db->limit($param['num']);
		}
		$this->db->order_by('mall_goods_base.sort_order', 'ASC');
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
    
     /**
      * @param $search['order'] tour_count热门/goods_id最新/sale_count热销;
      * 搜索结果列表
     **/
    public function page_list($page_num, $num, $search=array(),$f='*')
    {
    	$this->db->select($f);
    	$this->db->from($this->table);
    	if (!empty($search['keyword'])) {
    		$this->db->where("((`mall_goods_base`.`goods_name` LIKE '%{$search['keyword']}%') OR (`mall_goods_base`.`goods_sku` LIKE '%{$search['keyword']}%'))");
    	}
    	if (!empty($search['category_id'])) {
    		$this->db->where("`mall_goods_base`.`goods_id` IN (SELECT DISTINCT goods_id FROM mall_category_product WHERE category_id=".$search['category_id'].")");
    	}
    	if (isset($search['order'])) {
    		switch ($search['order']) {
    			case 1 : 
    				$this->db->order_by('sale_count', 'DESC');
    				$this->db->order_by('review_count', 'DESC');
    			break;
    			case 2 :
    				$this->db->order_by('sale_count', 'ASC');
    				$this->db->order_by('review_count', 'ASC');
    			break;
    			case 3 : 
    				$this->db->order_by('sale_count', 'DESC');
    			break;
    			case 4 : 
    				$this->db->order_by('sale_count', 'ASC');
    			break;
    			case 5 : 
    				$this->db->order_by('shop_price', 'ASC');
    			break;
    			case 6 : 
    				$this->db->order_by('shop_price', 'DESC');
    			break;
    		}
    	}
    	$this->db->where('is_on_sale', 1);
    	$this->db->where('is_check', 2);
    	$this->db->order_by('mall_goods_base.sort_order', 'ASC');
    	$this->db->limit($page_num, $num);
    	return $this->db->get();
    }
    
     /**
     * 总数
     * @param unknown $search
     */
    public function total($search=array()) {
    	
    	if (!empty($search['keyword'])) {
    		$this->db->where("((`mall_goods_base`.`goods_name` LIKE '%{$search['keyword']}%') OR (`mall_goods_base`.`goods_sku` LIKE '%{$search['keyword']}%'))");
    	}
    	if (!empty($search['category_id'])) {
    		$this->db->where("`mall_goods_base`.`goods_id` IN (SELECT DISTINCT goods_id FROM mall_category_product WHERE category_id=".$search['category_id'].")");
    	}
    	$this->db->where('is_on_sale', 1);
    	$this->db->where('is_check', 2);
    	return $this->db->count_all_results($this->table);
    }
    
     /**
     * 更新浏览量
     * @param unknown $param
     */
    public function setMallCount($id)
    {
    	$this->db->set('tour_count', 'tour_count+1', FALSE);
    	$this->db->where('goods_id',$id);
    	return $this->db->update($this->table);
    }
    
    /**
     * 商品修改 创建订单时候使用变更库存
     * @param unknown $param
     */
    public function setMallNum($param)
    {
    	$this->db->set('in_stock', 'in_stock-' . $param['number'], FALSE);
    	$this->db->where('goods_id', $param['goods_id']);
    	return $this->db->update($this->table);
    }
}