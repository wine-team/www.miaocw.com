<?php
class Cart extends CS_Controller {

	public function _init() {

		$this->load->model('region_model', 'region');
		$this->load->model('mall_freight_tpl_model','mall_freight_tpl');
		$this->load->model('mall_freight_price_model','mall_freight_price');
		$this->load->model('user_coupon_get_model','user_coupon_get');
		$this->load->model('mall_goods_base_model','mall_goods_base');
		$this->load->model('mall_cart_goods_model','mall_cart_goods');
		$this->load->model('mall_enshrine_model','mall_enshrine');
		$this->load->model('mall_address_model','mall_address');
	}

	  /**
	  **首页
	  */
     public function grid(){
     	
     	$result = $this->mall_address->findAddressByRes(array('uid'=>$this->uid));
     	$data['address'] = null;
     	if ($result->num_rows()>0) {
     		$address = $result->row(0);
     		$data['address'] = $address;
     		$data['province_id'] = $address->province_id;
     		$data['city_id'] = $address->city_id;
            $data['district_id'] = $address->district_id;
     	}
        $this->load->view('cart/grid',$data);
     }
     
      /**
       ** 购物车
      */
     public function main() {
     	
     	$area = $this->input->post('area',true);
     	$couponId = $this->input->post('coupon') ? $this->input->post('coupon') : 0;
     	$cart = $this->mall_cart_goods->getCartGoodsByRes(array('uid'=>$this->uid));
     	$cartData = $this->encrypt($cart,$area);
     	$data['couponId'] = $couponId;//优惠劵
     	$data['cart'] = $cartData['cart'];
     	$data['total'] = $cartData['total'];
     	$couponRes = $this->user_coupon_get->getCouponByRes(array('uid'=>$this->uid,'condition'=>$data['total'])); // 优惠劵使用条件
     	$yhqTotal = ($couponId && count($couponRes)>0) ?  $couponRes[$couponId]->amount : 0;
     	$data['coupon'] = $couponRes;
     	$data['actual_price'] = bcsub($cartData['actual_price'],$yhqTotal,2);
     	$data['transport_cost'] = $cartData['transport_cost'];
     	echo json_encode(array(
     		'status' => true,
     		'html'   => $this->load->view('cart/main',$data,true),
     		'amount' => $this->load->view('cart/amount',$data,true)
     	));exit;
     }
     
     /**
      *--产品的循环处理
     */
     public function encrypt($cart,$area) {
     	
     	$total = 0; //--订单销售价
     	$actual_price = 0; //--实际支付价
     	$transport_cost = 0; //--总运费价格
     	$cartArr = array();
     	foreach ($cart->result() as $val) {
     		$cartArr[$val->supplier_id]['supplier_id'] = $val->supplier_id;
     		$cartArr[$val->supplier_id]['shop_name'] = $val->alias_name;
     		$cartArr[$val->supplier_id]['goods'][] = $val;
     		$total_price = $this->getTotalPrice($val);
     		$total += bcmul($val->goods_num,$total_price,2);
     	}
     	$transport_cost = $this->getFreight($cartArr,$area); //算运费
     	$actual_price = bcadd($total,$transport_cost,2);
     	return array(
     			 'cart'   =>  $cartArr,
     			 'total'  =>  $total,
     			 'transport_cost' => $transport_cost,
     			 'actual_price'   => $actual_price
     	        );
     }
     
     /**
      * 获取实际价格  促销价和妙处网销售价
      * @param unknown $val
      */
     private function getTotalPrice($val) {
     	
     	if( !empty($val->promote_price) && !empty($val->promote_start_date) && !empty($val->promote_end_date) && ($val->promote_start_date<=time()) && ($val->promote_end_date>=time())) {
     		$total_price =  $val->promote_price;
     	} else {
     		$total_price = $val->shop_price;
     	}
     	return $total_price;
     }
     
     
      /**
      * 获取运维信息
      * @param unknown $cartArr
      */
     public function getFreight($cartArr,$area) {
     	  
     	$freight = array(); //获取商品是哪个模板 哪个地区 是否是
     	foreach ($cartArr as $key => $item) { 
     		foreach ($item['goods'] as $val) {//循环店铺
     			$tid = $val->freight_id;
     			$freight[$key][$tid]['supplier_id'] = $val->supplier_id;
     			if ($tid==0) {
     				//没有使用模板 使用默认金额
     				$freight[$key][$tid]['total_qty'][] = $val->goods_num;
     				$freight[$key][$tid]['freight_cost'] = $val->freight_cost;
     			} else {
                    //计算总件数
                    $freight[$key][$tid]['total_qty'][] = $val->goods_num;
                    //计算总重量
                    $freight[$key][$tid]['total_weight'][] = $val->goods_num * $val->goods_weight;
                    $freight[$key][$tid]['total_price'][] = bcmul($val->goods_num,$val->promote_price,2);
                }
     		}
     	}
     	foreach ($freight as $key => $items) {
     		
     		$sub = 0;
     		foreach ($items as $freight_id => $item) {  //店铺下运费模版的计算
     			if ($freight_id == 0) {
     				$sub += $item['freight_cost'];
     			}
     			$result = $this->mall_freight_tpl->getTransports(array('freight_id'=>$freight_id,'uid'=>$item['supplier_id']));
     			if (isset($result->methods)) {
     				//根据收货地址获取模板计算规则
     				$param['area'] = $area;
     				$param['freight_id'] = $freight_id;
     				$transport = $this->mall_freight_price->getFreightRow($param);
     				if ($result->methods == 1) { //按件计算
     					$total_qty = 0;
     					foreach ($item['total_qty'] as $freight_val) {
     						$total_qty += $freight_val; //总件数
     					}
     					if ($transport->add_unit == 0) {
     						$sub += $transport->first_price;
     					} else {
     						if ($total_qty <= $transport->first_unit) {//总件数小于首件
     							$sub += $transport->first_price;
     						} else {
     							//计算超出部分
     							$over_unit = $total_qty - $transport->first_unit;
     							//超出部分价格
     							$over_price = ceil($over_unit / $transport->add_unit) * $transport->add_price;
     							$sub += $over_price + $transport->first_price;
     						}
     					}
     			    }
     			    if ($result->methods == 2) { //按重量计算
     			    	
     			    	$total_weight = 0;
     			    	$total_price = 0;
     			    	foreach ($item['total_weight'] as $freight_val) {
     			    		$total_weight += $freight_val;// 总重量
     			    	}
     			    	if ($transport->add_unit == 0) {
     			    		$sub += $transport->first_price;
     			    	} else {
     			    		if ($total_weight <= $transport->first_unit) {//重量小于首重
     			    			$sub += $transport->first_price;
     			    		} else {//重量大于首重
     			    				//计算超出部分
     			    			$over_weight = $total_weight - $transport->first_unit;
     			    				//超出部分价格
     			    			$over_price = ceil($over_weight / $transport->add_unit) * $transport->add_price;
     			    			$sub += $over_price + $transport->first_price;
     			    		}
     			    	 }
     			     }
     			   }
     		    }
     		  $cartArr[$key]['sub'] = $sub;  //每个供应商下的产品的运费
     		}
     		$tranCost = 0; //总运费
     	    foreach ($cartArr as $seller_uid=>$val) {
     	    	$tranCost += $val['sub'];
     	    }
     	    return $tranCost;
     	}
     
      /**
      * 收藏
      */
     public function enshrine() {
     
     	$uid = $this->uid;
     	$goods_id = base64_decode($this->input->post('goods_id',true));
     	if (empty($uid)) {
     		$this->jsen('没有登陆');
     	}
     	$insert = false;
     	$result = $this->mall_enshrine->findByEnshrine(array('uid'=>$uid, 'goods_id'=>$goods_id));
     	if ($result->num_rows() > 0) {
     		$this->jsen('已经收藏');
     	} else {
     		$insert = $this->mall_enshrine->insert($uid,$goods_id);
     	}
     	if ($insert) {
     		$this->jsen('收藏成功');
     	} 
     	$this->jsen('收藏失败');
     }
     
      /**
      * 购物车的删除
      */
     public function delete(){
     	
     	$uid = $this->uid;
     	$goods_id = base64_decode($this->input->post('goods_id',true));
     	if (empty($uid)) {
     		$this->jsen('没有登陆');
     	}
     	$status = $this->mall_cart_goods->deleteCartGoods(array('uid'=>$uid,'goods_id'=>$goods_id));
        if($status) {
        	$this->jsen('删除成功',true);
        }
        $this->jsen('删除失败');
     }
     
      /**
      *购车的ajax添加产品
      */
     public function ajaxGoods() {
     	
     	$uid = $this->uid;
     	$goods_id = (int)base64_decode($this->input->post('goods_id',true));
     	$qty = (int)$this->input->post('qty',true);
     	if (empty($uid)) {
     		$this->jsen('没有登陆');
     	}
     	if ($qty < 1) {
     		$qty = 1;
     	}
     	$result = $this->mall_goods_base->getGoodsByGoodsId($goods_id);
     	if($result->num_rows()<=0){
     		$this->jsen('该商品不存在');
     	}
     	$result = $result->row(0);
     	if( $result->limit_num > 0 ){
     		$qty = ($result->limit_num >= $qty) ?  $qty : $result->limit_num;
     	}else{
     		$qty = ($result->in_stock >= $qty) ? $qty : $result->in_stock;
     	}
     	$status = $this->mall_cart_goods->updateCartQty(array('uid'=>$uid,'goods_id'=>$goods_id),$qty);
     	if ($status) {
     		$this->jsen('操作成功',true);
     	}
     	$this->jsen('操作失败');
     }
}