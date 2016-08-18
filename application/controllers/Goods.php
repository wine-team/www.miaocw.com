<?php
class Goods extends MW_Controller{
	
	public function _init() {
	    $this->load->library('pagination');
		$this->load->model('advert_model','advert');
		$this->load->model('cms_block_model','cms_block');
		$this->load->model('mall_brand_model','mall_brand');
		$this->load->model('mall_category_model','mall_category');
		$this->load->model('mall_cart_goods_model','mall_cart_goods');
		$this->load->model('mall_goods_base_model','mall_goods_base');
	}
		
	 /**
	 * 搜索页
	 */
	public function search($pg = 1){
	    if(empty($this->input->get('keyword'))) {
	        $this->alertJumpPre('请输入关键字');
	    }
	    $page_num = 20;
	    $num = ($pg-1)*$page_num;
	    $searchTotal = $this->mall_goods_base->searchTotal($this->input->get());
	    $config['first_url'] = base_url('Goods/search').$this->pageGetParam($this->input->get());
	    $config['suffix'] = $this->pageGetParam($this->input->get());
	    $config['base_url'] = base_url('Goods/search');
	    $config['total_rows'] = $searchTotal->num_rows();
	    $config['uri_segment'] = 3;
	    $this->pagination->initialize($config);
	    $data['pg_link'] = $this->pagination->create_links(); 
	    $data['page_list'] = $this->mall_goods_base->page_list($page_num, $num, $this->input->get())->result(); 
	    $data['all_pg'] = ceil($config['total_rows']/$page_num);
	    $data['all_rows'] = $config['total_rows'];
	    $data['pg_now'] = $pg;
	    $category = array(); 
	    foreach ($searchTotal->result() as $s) {
	        if (!isset($category[$s->category_id])) {
	            $category[$s->category_id] = $s->cat_name;
	        }
	    }
	    $data['category_arr'] = $category;
	    $data['price_arr'] = array('0-100', '100-500', '500-1000', '1000-2500', '2500-以上');
	    $data['brand_arr'] = $this->mall_brand->findBrand()->result();
	    $data['order_arr'] = array('goods_id'=>'最新上架','sale_count'=>'热销','tour_count'=>'热门', 'price_asc'=>'价格从低到高', 'price_desc'=>'价格从高到低');
		$data['head_menu'] = 'on';
		$data['cms_block'] = $this->cms_block->findByBlockIds(array('home_keyword','foot_recommend_img','foot_speed_key'));
		$data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByUid($this->uid)->num_rows() : 0;
		$this->load->view('goods/search',$data);
	}
	
	 /**
	  *女性
	 */
	public function femal(){
		
	    $data['head_menu'] = 'on';
	    $data['advert'] = $this->advert->findBySourceState($source_state=3);
	    $data['cms_block'] = $this->cms_block->findByBlockIds(array('home_keyword','foot_recommend_img','foot_speed_key','femal_head_recommend'));
	    $data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByUid($this->uid)->num_rows() : 0;
	    $data['child_cat'] = $this->mall_category->getChildCat($cat_id=2);
	    $data['recommend'] = $this->mall_goods_base->getRecommendGoodsBase(array('category_id'=>2,'hot_recommend'=>2,'num'=>4));
	    $data['mall_goods'] = $this->mall_goods_base->getGoodsBase(array('category_id'=>2,'num'=>40));
	    $this->load->view('goods/femal',$data);
	}
	
	 /**
	 *产品详情
	 */
	public function detail(){
		
		$data['head_menu'] = 'on';
		$data['cms_block'] = $this->cms_block->findByBlockIds(array('home_keyword','foot_recommend_img','foot_speed_key'));
		$data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByUid($this->uid)->num_rows() : 0;
		$this->load->view('goods/detail',$data);
	}
	
	
	

}