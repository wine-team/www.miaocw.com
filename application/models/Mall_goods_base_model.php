<?php
class Mall_goods_base_model extends CI_Model{
	
	private $table = 'mall_goods_base';
	private $table1 = 'mall_brand';
	
	 /**
	 * 获取购物车内容
	 * @param unknown $uid
	 */
	public function getGoodsByGoodsId($goodsId){
		
		$this->db->select('goods_id,goods_name,promote_price,goods_img');
		$this->db->from($this->table);
		if(is_array($goodsId)){
			$this->db->where_in('goods_id',$goodsId);
		} else { 
			$this->db->where('goods_id',$goodsId);
		}
		return $this->db->get();
	}
	
	/**
	 * 获取分类页面的推荐产品
 	 * @param unknown $param
 	 * @param unknown $param
 	 */
	public function getRecommendGoodsBase($param){
 	     $this->db->select('goods_id,goods_name,market_price,promote_price,goods_img,sale_count,review_count');
 	     $this->db->from($this->table);
 	     $this->db->where('is_on_sale',1);
 	     $this->db->where('is_check',2);
 	     $this->db->where('category_id',$param['category_id']);
 	     $this->db->where('hot_recommend',$param['hot_recommend']);
 	     $this->db->order_by('tour_count','desc');
 	     $this->db->limit($param['num']);
 	     return $this->db->get();
 	}
	
	/**
	 * 获取 分类页面的
	 * @param unknown $param
	 */
	public function getGoodsBase($param) {
		
		$this->db->select('goods_id,goods_name,goods_brief,market_price,promote_price,goods_img,sale_count,review_count');
		$this->db->from($this->table);
		$this->db->where('is_on_sale',1);
		$this->db->where('is_check',2);
		$this->db->where('category_id',$param['category_id']);
		$this->db->where('hot_recommend !=',2);
		$this->db->order_by('sort_order','desc');
		$this->db->limit($param['num']);
		return $this->db->get();
	}
 
 
	
	/**
	 * 搜索结果条数
	 * */
	public function searchTotal($search)
	{
	    $this->db->select('mall_goods_base.goods_id');
	    $this->db->from($this->table);
	    $this->db->join($this->table1, 'mall_goods_base.brand_id = mall_brand.brand_id', 'left');
	    if (!empty($search['keyword'])) {
	        $this->db->like('goods_name', $search['keyword']);
	        $this->db->or_like('goods_name', $search['keyword']);
	        $this->db->or_like('brand_name', $search['keyword']);
	    }
	    $this->db->where('is_on_sale',1);
	    $this->db->where('is_check',2);
	    return $this->db->count_all_results();
	}
	
	/**
	 * @param $search['order'] tour_count热门/goods_id最新/sale_count热销;
	 * 搜索结果列表
	 * */
	public function page_list($page_num, $num, $search=array())
	{
	    $this->db->select('mall_goods_base.*');
	    $this->db->from($this->table);
	    $this->db->join($this->table1, 'mall_goods_base.brand_id = mall_brand.brand_id', 'left');
	    if (!empty($search['keyword'])) {
	        $this->db->like('goods_name', $search['keyword']);
	        $this->db->or_like('goods_name', $search['keyword']);
	        $this->db->or_like('brand_name', $search['keyword']);
	    }
	    $this->db->where('is_on_sale',1);
	    $this->db->where('is_check',2);
	    if (!empty($search['order'])) {
	        $this->db->order_by($search['order'], 'DESC');
	    }
	    if (!empty($search['order_price'])) {
	        $this->db->order_by('promote_price', $search['order_price']);
	    }
	    $this->db->order_by('mall_goods_base.sort_order', 'ASC');
	    $this->db->limit($page_num, $num);
	    return $this->db->get();
	}
	
	
	
	
}