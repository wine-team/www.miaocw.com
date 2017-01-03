<?php
class Home extends MW_Controller {
	
	private $d;
	
	public function _init() {
		
		$this->d = $this->input->post();
		$this->load->model('m/advert_model','advert');
		$this->load->model('m/mall_cart_goods_model','mall_cart_goods');
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