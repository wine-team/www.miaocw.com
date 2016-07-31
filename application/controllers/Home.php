<?php
class Home extends MW_Controller{
	
	public function _init() {
		
		$this->load->model('advert_model','advert');
		$this->load->model('cms_block_model','cms_block');
		$this->load->model('mall_brand_model','mall_brand');
		$this->load->model('help_center_model','help_center');
		$this->load->model('mall_category_model','mall_category');
		$this->load->model('mall_cart_goods_model','mall_cart_goods');
		$this->load->model('mall_goods_base_model','mall_goods_base');
	}
		
	/**
	 **首页
	*/
	public function grid(){

		if (!$this->cache->memcached->get('hostHomePageCache')) {
			$data = array(
				'advert' => $this->advert->findBySourceState($source_state=1)->result_array(),
			    'cms_block' => $this->cms_block->findByBlockIds(array('home_keyword','head_right_advert','head_today_recommend','head_recommend_down','head_hot_keyword')),
			    'brand' => $this->mall_brand->findBrand($limit=6)->result_array()
			);
			$this->cache->memcached->save('hostHomePageCache',$data);
		} else {
			$data = $this->cache->memcached->get('hostHomePageCache');
		}
        $data['infor'] = $this->help_center->getHelpCenter($limit=6);
		$data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByUid($this->uid)->num_rows() : 0; 
		$this->load->view('home/grid',$data);
	}
	
	 /**
	 *历史记录
	 */
	public function getHistory(){
		
		$callback = $this->input->get('callback');
		$history = unserialize(base64_decode(get_cookie('history')));  // 存取goods_id数组
		$data['goods'] = empty($history) ? false : $this->mall_goods_base->getGoodsByGoodsId($history);
		$data['history'] = $history;
		$jsonData = json_encode(array(
			'status' => true,
			'html'   => $this->load->view('home/historylist',$data,true)
		));
		echo $callback . '(' . $jsonData . ')';exit;
	}
	
	/**
	 **头部购物车的加载
	 */
	public function getCart(){
	
		$callback = $this->input->get('callback');
		if (empty($this->uid)) {
			$data = array();
			$jsonData = json_encode(array(
					'status' => true,
					'html'   => $this->load->view('home/cartlist',$data,true)
			));
			echo $callback . '(' . $jsonData . ')';exit;
		}
		$data['cart_goods'] = $this->mall_cart_goods->getCartGoodsByUid($this->uid);
		$jsonData = json_encode(array(
				'status' => true,
				'html'   => $this->load->view('home/cartlist',$data,true)
		));
		echo $callback . '(' . $jsonData . ')';exit;
	}
	
}