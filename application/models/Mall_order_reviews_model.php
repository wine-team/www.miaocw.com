 <?php
class Mall_order_reviews_model extends CI_Model
{
    private $table   = 'mall_order_reviews';
    private $table_2 = 'mall_reviews_reply';
    private $table_3 = 'user';

     /**
     * 评价数的统计
     * @param unknown $goods_attr_id
     */
    public function countReviewsTotal($goods_id){
    	
        $this->db->select('score,count(*) AS total');
        $this->db->from($this->table);
        $this->db->where('status',2);
        $this->db->where('mall_order_reviews.goods_id', $goods_id);
        $this->db->group_by('score');
        $this->db->order_by('score','desc');
        return $this->db->get();
    }
    
    public function total($params = array())
    {
    	$this->db->from($this->table . ' AS mall_order_reviews');
    	$this->db->join($this->table_2 . ' AS mall_reviews_reply', 'mall_order_reviews.reviews_id = mall_reviews_reply.review_id', 'LEFT');
    	$this->db->join($this->table_3 . ' AS user','user.uid=mall_order_reviews.uid');
    	$this->db->where('mall_order_reviews.goods_id', base64_decode($params['goods_id']));
    	$this->db->where('mall_order_reviews.status', 2);
    	if (!empty($params['flag'])) {
    		$this->db->where_in('score',$this->reviewsArray($params['flag']));
    	}
    	return $this->db->count_all_results();
    }
    
    public function page_list($page_num, $num, $params = array())
    {
    	$this->db->select('mall_order_reviews.*, mall_reviews_reply.reply_user_name, mall_reviews_reply.reply_content, mall_reviews_reply.created_at AS reply_type,user.alias_name,user.photo');
    	$this->db->from($this->table . ' AS mall_order_reviews');
    	$this->db->join($this->table_2 . ' AS mall_reviews_reply', 'mall_order_reviews.reviews_id = mall_reviews_reply.review_id', 'LEFT');
    	$this->db->join($this->table_3 . ' AS user','user.uid=mall_order_reviews.uid');
    	$this->db->where('mall_order_reviews.goods_id', base64_decode($params['goods_id']));
    	$this->db->where('mall_order_reviews.status', 2);
    	if (!empty($params['flag'])) {
    		$this->db->where_in('score',$this->reviewsArray($params['flag']));
    	}
    	$this->db->limit($page_num, $num);
    	return $this->db->get();
    }
    
    /**
     * 1好评  2中评  3差评
     * @param unknown $flag
     * @return multitype:string
     */
    public function reviewsArray($flag){
    	 
    	switch($flag){
    		case '1' : return array('4','5');break;
    		case '2' : return array('3');break;
    		case '3' : return array('1','2');break;
    	}
    }
    
    public function insertBatchReviews($params)
    {
    	$data = array();
    	foreach ($params as $value) {
    		$data[] = array(
    				'order_product_id'=> $value['order_product_id'],
    				'order_id'        => $value['order_id'],
    				'goods_id'        => $value['goods_id'],
    				'goods_attr'      => json_encode($value['goods_attr']),
    				'goods_name'      => $value['goods_name'],
    				'uid'             => $value['uid'],
    				'user_name'       => $value['user_name'],
    				'content'         => $value['content'],
    				'status'          => $value['status'],
    				'score'           => $value['score'],
    				'created_at'      => date('Y-m-d H:i:s',time()),
    				'updated_at'      => date('Y-m-d H:i:s',time())
    		);
    	}
    	return $this->db->insert_batch($this->table, $data);
    }
}