<?php
class Mall_goods_base_model extends CI_Model{
	
	private $table = 'mall_goods_base';
	private $table1 = 'mall_brand';
	private $table2 = 'mall_category';
	
	 /**
	 * 获取购物车内容
	 * @param unknown $uid
	 */
	public function getGoodsByGoodsId($goodsId){
		
		$this->db->select('goods_id,category_id,goods_name,promote_price,supplier_id,goods_img,goods_sku,market_price,goods_brief,goods_desc,goods_img,freight_id,in_stock,freight_cost,sale_count,review_count');
		$this->db->from($this->table);
		if(is_array($goodsId)){
			$this->db->where_in('goods_id',$goodsId);
		} else { 
			$this->db->where('goods_id',$goodsId);
		}
		return $this->db->get();
	}
	
	 /**
	 * 根据条件获取供应商产品
	 * @param unknown $param
	 */
	public function getRecommend($uid,$num,$pgNum){ 
		
		$this->db->select('goods_id,goods_name,promote_price,goods_img,goods_sku,market_price,goods_brief,goods_desc,goods_img,freight_id,in_stock,freight_cost,sale_count,review_count');
		$this->db->from($this->table);
		$this->db->where('supplier_id',$uid);
		$this->db->where('is_on_sale',1);
		$this->db->where('is_check',2);
		$this->db->order_by('tour_count','desc');
		$this->db->limit($pgNum,$num);
		return $this->db->get();
	}
	
	/**
	 * 获取分类页面的推荐产品
 	 * @param unknown $param
 	 * @param unknown $param
 	 */
	public function getRecommendGoodsBase($param=array()){
 	     $this->db->select('goods_id,goods_name,market_price,promote_price,goods_img,sale_count,review_count');
 	     $this->db->from($this->table);
 	     $this->db->where('is_on_sale',1);
 	     $this->db->where('is_check',2);
 	     if (!empty($param['category_id'])) {
 	     	$this->db->where('category_id',$param['category_id']);
 	     }
 	     if (!empty($param['hot_recommend'])) {
 	     	$this->db->where('hot_recommend',$param['hot_recommend']);
 	     }
 	     $this->db->order_by('tour_count','desc');
 	     if (!empty($param['num'])) {
 	     	$this->db->limit($param['num']);
 	     }
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
	    $this->db->select('mall_goods_base.goods_id, mall_goods_base.category_id, mall_category.cat_name');
	    $this->db->from($this->table);
	    $this->db->join($this->table1, 'mall_goods_base.brand_id = mall_brand.brand_id', 'left');
	    $this->db->join($this->table2, 'mall_goods_base.category_id = mall_category.cat_id', 'left');
	    if (!empty($search['keyword'])) {
	        $this->db->where("((`mall_goods_base`.`goods_name` LIKE '%{$search['keyword']}%') OR (`mall_goods_base`.`goods_sku`='{$search['keyword']}') OR (`mall_brand`.`brand_name`='{$search['keyword']}'))");
	    }
	    if (!empty($search['category_id'])) {
	        $this->db->where('category_id', $search['category_id']);
	    }
	    if (!empty($search['price_range'])) {
	        $price_arr = explode('-', $search['price_range']);
	        $this->db->where('promote_price >=', $price_arr[0]);
	        if (is_numeric($price_arr[1])) $this->db->where('promote_price <', $price_arr[1]);
	    }
	    if (!empty($search['brand_id'])) {
	        $this->db->where('mall_goods_base.brand_id', $search['brand_id']);
	    }
	    $this->db->where('is_on_sale', 1);
	    $this->db->where('is_check', 2);
	    return $this->db->get();
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
	    $this->db->join($this->table2, 'mall_goods_base.category_id = mall_category.cat_id', 'left');
	    if (!empty($search['keyword'])) {
	        $this->db->where("((`mall_goods_base`.`goods_name` LIKE '%{$search['keyword']}%') OR (`mall_goods_base`.`goods_sku`='{$search['keyword']}') OR (`mall_brand`.`brand_name`='{$search['keyword']}'))");
	    }
	    if (!empty($search['category_id'])) {
	        $this->db->where('category_id', $search['category_id']);
	    }
	    if (!empty($search['price_range'])) {
	        $price_arr = explode('-', $search['price_range']);
	        $this->db->where('promote_price >=', $price_arr[0]);
	        if (is_numeric($price_arr[1])) $this->db->where('promote_price <', $price_arr[1]);
	    }
	    if (!empty($search['brand_id'])) {
	        $this->db->where('mall_goods_base.brand_id', $search['brand_id']);
	    }
	    $this->db->where('is_on_sale', 1);
	    $this->db->where('is_check', 2);
	    if (!empty($search['order'])) {
	        if ($search['order'] == 'price_asc') {
	            $this->db->order_by('promote_price', 'ASC');
	        } else if ($search['order'] == 'price_desc') {
	            $this->db->order_by('promote_price', 'DESC');
	        } else{
	            $this->db->order_by($search['order'], 'DESC');
	        }
	    }
	    $this->db->order_by('mall_goods_base.sort_order', 'ASC');
	    $this->db->limit($page_num, $num);
	    return $this->db->get();
	}
	
	/**
	 * 更新浏览量
	 * @param unknown $param
	 */
	public function setMallCount($id)
	{
		$this->db->where('goods_id',$id);
		$this->db->set('tour_count', 'tour_count+1', FALSE);
		return $this->db->update($this->table);
	}
	
	
}