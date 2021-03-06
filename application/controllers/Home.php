<?php
class Home extends MW_Controller
{
    public function _init()
    {
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
    public function grid()
    {
        $cms_block = array(
            'home_keyword', 'head_right_advert','head_today_recommend',
            'head_recommend_down','head_hot_keyword','homepage_advert',
            'home_condom','home_lingeries','home_man',
            'home_woman','home_yanshi','home_lover'
        );
        if (!$this->cache->memcached->get('hostHomePageCache')) {
            $data = array(
                'advert' => $this->advert->findBySourceState($source_state=1)->result_array(),
                'cms_block' => $this->cms_block->findByBlockIds($cms_block),
            );
            $this->cache->memcached->save('hostHomePageCache',$data,365*24*3600);
        } else {
            $data = $this->cache->memcached->get('hostHomePageCache');
        }
        $data['cart_num'] = ($this->uid) ? $this->mall_cart_goods->getCartGoodsByRes(array('uid'=>$this->uid))->num_rows() : 0; 
        $this->load->view('home/grid',$data);
    }
    
    /**
     * 加入购物车
     */
    public function addToCart()
    {
        $uid = $this->uid;
        $callback = $this->input->get('callback');
        $specArray = '';
        $spec = $this->input->get('spec');
        $param['uid'] = $uid;
        $param['goods_id'] = $this->input->get('goods_id') ? (int)(base64_decode($this->input->get('goods_id'))) : 0;
        $param['qty'] = $this->input->get('qty') ? (int)$this->input->get('qty') : 0;
        if (!$param['goods_id'] || !$param['qty']) {
            $jsonData = json_encode(array(
                'status' => 0,
                'msg' => '找不到该商品的信息'
            ));
            echo $callback . '(' . $jsonData . ')';exit;
        }
        if (!empty($spec)) {
            $specArray = implode(',',$spec);
        }
        $result = $this->mall_goods_base->getGoodsByGoodsId($param['goods_id']);
        if ($result->num_rows()<=0) {
            $jsonData = json_encode(array(
                'status' => 0,
                'msg' => '找不到该商品的信息'
            ));
            echo $callback . '(' . $jsonData . ')';exit;
        }
        $result = $result->row(0);
        $limit_num = $result->limit_num;
        if ($result->limit_num > 0){
            if($result->limit_num < $param['qty']){
                $jsonData = json_encode(array(
                    'status' => 0,
                    'msg'    => '限购'.$result->limit_num.'件'
                ));
                echo $callback . '(' . $jsonData . ')';exit;
            }
        }
        //判断是否存在该商品 且商品仍然有库存
        if (!isset($result->in_stock) || $result->in_stock < $param['qty']) {
            $jsonData = json_encode(array(
                'status' => 0,
                'msg' => '库存不足'
            ));
            echo $callback . '(' . $jsonData . ')';exit;
        }
        
        //加入商品价格记录 判断商品是否重复
        $info = $this->mall_cart_goods->getCartGoods($param);
        if ($info->num_rows()>0) {
            $info = $info->row(0);
            if ($info->goods_num + $param['qty'] < $result->in_stock){
                if ( ($info->goods_num >= $limit_num) && ($limit_num>0)) {
                    $status = $this->mall_cart_goods->updateCart($info->id,$limit_num,$specArray);
                } else {
                    $param['qty'] = $limit_num > 0 ? ( (($info->goods_num + $param['qty']) >= $limit_num ) ? ($limit_num-($info->goods_num)) : $param['qty'] ) :  $param['qty'];
                    $status = $this->mall_cart_goods->updateQty($info->id,$param['qty'],$specArray);
                }
            } else {
                $status = $this->mall_cart_goods->updateCart($info->id,$result->in_stock,$specArray);
            }
        } else {
            $params['uid'] = $uid;
            $params['attribute_value'] = $specArray;
            $params['goods_id'] = $param['goods_id'];
            $params['goods_num'] = $param['qty'];
            $status = $this->mall_cart_goods->addQty($params);
        }
        if ($status) {
            $jsonData = json_encode(array(
                'status' => 2,
                'msg'    => '加入成功'
            ));
            echo $callback . '(' . $jsonData . ')';exit;
        }
        $jsonData = json_encode(array(
            'status' => 0,
            'msg'    => '加入购物车失败'
        ));
        echo $callback . '(' . $jsonData . ')';exit;
    }
    
     /**
     *历史记录
     */
    public function getHistory()
    {
        $callback = $this->input->get('callback');
        $history = unserialize(base64_decode(get_cookie('historyPram')));  // 存取goods_id数组
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
    public function getCart()
    {
        $callback = $this->input->get('callback');
        if (empty($this->uid)) {
            $data = array();
            $jsonData = json_encode(array(
                'status' => true,
                'html'   => $this->load->view('home/cartlist',$data,true)
            ));
            echo $callback . '(' . $jsonData . ')';exit;
        }
        $data['cart_goods'] = $this->mall_cart_goods->getCartGoodsByRes(array('uid'=>$this->uid));
        $jsonData = json_encode(array(
            'status' => true,
            'html'   => $this->load->view('home/cartlist',$data,true)
        ));
        echo $callback . '(' . $jsonData . ')';exit;
    }

    public function getCartInfor()
    {
        if (empty($this->uid)) {
            echo json_encode(array(
                'status' => false,
                'msg'    => '没有登陆'
            ));exit;
        }
        $res = $this->mall_cart_goods->getCartGoodsByRes(array('uid'=>$this->uid));
        $num = 0;
        $sum = 0;
        foreach ($res->result() as $item) {
            $num += $item->goods_num;
            $total_price = $this->getTotalPrice($item);
            $sum += bcmul($total_price,$item->goods_num,2);
        }
        echo json_encode(array(
            'status' => true,
            'num' => $num,
            'sum' => $sum
        ));exit;
    }
    
     /**
     * 获取实际价格  促销价和妙处网销售价
     * @param unknown $val
     */
    private function getTotalPrice($val)
    {
        if( !empty($val->promote_price) && !empty($val->promote_start_date) && !empty($val->promote_end_date) && ($val->promote_start_date<=time()) && ($val->promote_end_date>=time())) {
            $total_price =  $val->promote_price;
        } else {
            $total_price = $val->shop_price;
        }
        return $total_price;
    }
}