<?php
class Home extends MW_Controller {
	
	private $d;
	
	public function _init() {
		
		$this->d = $this->input->post();
		$this->load->model('m/advert_model','advert');
		$this->load->model('m/mall_cart_goods_model','mall_cart_goods');
		$this->load->model('m/mall_goods_base_model','mall_goods_base');
		$this->load->model('m/sales_topic_model','sales_topic');
		$this->load->model('m/sales_topic_category_model','sales_topic_category');
	}
 	
	 /**
	 * 移动端首页幻灯片
	 */
	public function advert() {
		
		$f = 'advert_id,url,picture,title';
		$result = $this->advert->findBySourceState(4,$f);
		if ($result->num_rows()<=0) {
			$this->jsonMessage('暂无幻灯片');
		}
		$advert = $result->result();
		$this->jsonMessage('',$advert);
	}
	
	 /**
	 * 首页分类和幻灯片
	 */
	public function homeCategory() {
		
		$salesId = array(2,3);
		$sf = 'sales_id,sales_name,link_url,image';
		$cf = 'sales_id,title,link_url';
		$result = $this->sales_topic->getSalesTopic($salesId,$sf);
		$salesResult = $result->result_array();
		$cateResult = $this->sales_topic_category->getSalesTopicCate($salesId,$cf);
	    foreach ($salesResult as $key=>$val) {
	    	$salesResult[$key]['category'] = $cateResult[$val['sales_id']];
	    }
	    $this->jsonMessage('',$salesResult);
	}
	
	 /**
	 * 首页热门推荐
	 */
	public function homeHot() {
		
		$goodsId = array();
		$result = $this->sales_topic_category->getSalesProduct($salesId=4);
	    foreach ($result->result() as $val) {
	    	$goodsId[] = $val->product_id;
	    }
	    $f = 'goods_id,goods_name,goods_img,shop_price,promote_price,promote_start_date,promote_end_date';
	    $gResult = $this->mall_goods_base->getGoodsByGoodsId($goodsId,$f);
	    $goodResult = $gResult->result();
	    $this->jsonMessage('',$goodResult);
	} 
	
	/**
	 ** 获取购物车
	*/
	public function getCart() {
		
		if (empty($this->d['uid'])) {
			$this->jsonMessage('请传用户UID');
		}
		$result = $this->mall_cart_goods->getCartGoodsByRes($this->d);
		$cartGoods = $result->result();
		$this->jsonMessage('',$cartGoods);
	}
	
	 /**
	 * 删除购物的产品
	 */
	public function deleteCart() {
		
		if (empty($this->d['uid'])) {
			$this->jsonMessage('请传用户UID');
		}
		if (empty($this->d['goods_id'])) {
			$this->jsonMessage('请传商品ID');
		}
		$result = $this->mall_cart_goods->deleteCartGoods($this->d);
		if ($result) {
			$this->jsonMessage('','删除成功');
		}
		$this->jsonMessage('删除失败');
	}
	
	 /**
	 * 添加购物车产品数量
	 */
	public function addCart() {
		
		
	}
}