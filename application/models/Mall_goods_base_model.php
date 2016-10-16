 <?php
class Mall_goods_base_model extends CI_Model{
	
	private $table = 'mall_goods_base';
	private $table1 = 'mall_brand';
	private $table2 = 'mall_category';
	
	 /**
	 * 获取购物车内容
	 * @param unknown $uid
	 */
	public function getGoodsByGoodsId($goodsId,$f='*'){
		
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
 	     if (!empty($param['attr_set_id'])) {
 	     	$this->db->where('attr_set_id',$param['attr_set_id']);
 	     }
 	     
 	     $this->db->order_by('sort_order','desc');// 越大越前
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
		
		$this->db->select('mall_goods_base.goods_id,goods_name,goods_brief,shop_price,market_price,promote_price,goods_img,sale_count,review_count');
		$this->db->from($this->table);
		$this->db->join('mall_category_product','mall_category_product.goods_id=mall_goods_base.goods_id');
		$this->db->where('mall_goods_base.is_on_sale',1);
		$this->db->where('mall_goods_base.is_check',2);
		$this->db->where('mall_category_product.category_id',$param['category_id']);
		if (isset($param['sort'])) {
			$this->db->order_by($param['sort'],'desc');
		}
		$this->db->limit($param['num']);
		return $this->db->get();
	}
 
 
	
	/**
	 * 搜索结果条数
	 * */
	public function searchTotal($search)
	{
	    $this->db->select('mall_goods_base.goods_id, t.category_id, t.cat_name');
	    $this->db->from($this->table);
	    $this->db->join($this->table1, 'mall_goods_base.brand_id = mall_brand.brand_id', 'left');
	    $this->db->join("(SELECT mall_category_product.category_id,mall_category_product.goods_id,mall_category.cat_name FROM mall_category_product LEFT JOIN mall_category ON mall_category_product.category_id = mall_category.cat_id ) t", 'mall_goods_base.goods_id = t.goods_id', 'left');
	    if (!empty($search['keyword'])) {
	    	$keyword = trim(addslashes($search['keyword']));
	    	$this->db->where("((`mall_goods_base`.`goods_name` LIKE '%{$keyword}%') OR (`mall_goods_base`.`goods_sku` LIKE '%{$keyword}%') OR (`mall_brand`.`brand_name` LIKE '%{$keyword}%'))");
	    }
	    if (!empty($search['category_id'])) {
	        $this->db->where('t.category_id', (int)$search['category_id']);
	    }
	    if (!empty($search['price_range'])) {
	        $price_range = get_priceRange();
	        $price_arr = explode('-', $price_range[$search['price_range']]);
	        if (!is_numeric($price_arr[1])) {
	            $this->db->where('shop_price >=', $price_arr[0]);
	        } else {
	            $this->db->where("(`shop_price` BETWEEN '{$price_arr[0]}' AND '{$price_arr[1]}')");
	        }
	    }
	    if (!empty($search['brand_id'])) {
	    	$this->db->where('mall_goods_base.brand_id', (int)$search['brand_id']);
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
	    $this->db->join("(SELECT mall_category_product.category_id,mall_category_product.goods_id,mall_category.cat_name FROM mall_category_product LEFT JOIN mall_category ON mall_category_product.category_id = mall_category.cat_id ) t", 'mall_goods_base.goods_id = t.goods_id', 'left');
	    if (!empty($search['keyword'])) {
	    	$keyword = trim(addslashes($search['keyword']));
	        $this->db->where("((`mall_goods_base`.`goods_name` LIKE '%{$keyword}%') OR (`mall_goods_base`.`goods_sku` LIKE '%{$keyword}%') OR (`mall_brand`.`brand_name` LIKE '%{$keyword}%'))");
	    }
	    if (!empty($search['category_id'])) {
	        $this->db->where('t.category_id', (int)$search['category_id']);
	    }
	    if (!empty($search['price_range'])) {
	        $price_range = get_priceRange();
	        $price_arr = explode('-', $price_range[$search['price_range']]);
	        if (!is_numeric($price_arr[1])) {
	            $this->db->where('shop_price >=', $price_arr[0]);
	        } else {
	            $this->db->where("(`shop_price` BETWEEN '{$price_arr[0]}' AND '{$price_arr[1]}')");
	        }
	    }
	    if (!empty($search['brand_id'])) {
	        $this->db->where('mall_goods_base.brand_id', (int)$search['brand_id']);
	    }
	    $this->db->where('is_on_sale', 1);
	    $this->db->where('is_check', 2);
	    if (!empty($search['order'])) {
	        switch ($search['order']) {
	            case 1 : $this->db->order_by('goods_id', 'DESC');break;
	            case 2 : $this->db->order_by('sale_count', 'DESC');break;
	            case 3 : $this->db->order_by('tour_count', 'DESC');break;
	            case 4 : $this->db->order_by('shop_price', 'ASC');break;
	            case 5 : $this->db->order_by('shop_price', 'DESC');break;
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
	
	/**
	 * 商品修改 创建订单时候使用变更库存
	 * @param unknown $param
	 */
	public function setMallNum($param)
	{
		$this->db->where('goods_id', $param['goods_id']);
		$this->db->set('in_stock', 'in_stock-' . $param['number'], FALSE);
		return $this->db->update($this->table);
	}
}