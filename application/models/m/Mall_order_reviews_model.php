<?php
class Mall_order_reviews_model extends CI_Model
{
    private $table = 'mall_order_reviews';
        
    public function insertArray($data)
    {
        return $this->db->insert_batch($this->table, $data);
    }
    
    public function page_list($page_num, $num, $param = array())
    {
    	$this->db->select('user.alias_name,photo,content,score,slide_show,reply_content');
    	$this->db->from('mall_order_reviews');
    	$this->db->join('mall_reviews_reply', 'mall_order_reviews.reviews_id = mall_reviews_reply.review_id', 'LEFT');
    	$this->db->join('user','user.uid=mall_order_reviews.uid');
    	if (!empty($param['goods_id'])) {
    		$this->db->where('mall_order_reviews.goods_id', (int)$param['goods_id']);
    	}
    	if (!empty($param['status'])) {
    		$this->db->where('mall_order_reviews.status', $param['status']);
    	}
    	$this->db->limit($page_num, $num);
    	return $this->db->get();
    }
    
}