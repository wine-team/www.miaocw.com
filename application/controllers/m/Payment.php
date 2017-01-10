<?php
class Payment extends MW_Controller {
	
	private $d;
	
	public function _init() {
		
		$this->d = $this->input->post();
		$this->load->model('m/user_model','user');
		$this->load->model('m/mall_address_model','mall_address');
		$this->load->model('m/mall_cart_goods_model','mall_cart_goods');
		$this->load->model('m/user_coupon_get_model','user_coupon_get');
		$this->load->model('m/mall_freight_tpl_model','mall_freight_tpl');
		$this->load->model('m/mall_freight_price_model','mall_freight_price');
	}
 	
     /**
	  **地址列表
	  */
    public function address(){
     	
    	if (empty($this->d['uid'])) {
    		$this->jsonMessage('请传用户UID');
    	}
    	$userResult = $this->user->findByUid($this->d['uid'],'uid,pay_points');
    	if ($userResult->num_rows()<=0) {
    		$this->jsonMessage('该用户不存在');
    	}
    	$user = $userResult->row(0);
     	$result = $this->mall_address->findAddressByRes(array('uid'=>$this->d['uid']));
     	$address = $result->row(0);
     	$coupnResult = $this->user_coupon_get->getUserCoupn(array('uid'=>$this->d['uid'],'status'=>1,'date'=>date('Y-m-d H:i:s')),'coupon_get_id,coupon_name,uid,amount,condition');
     	$coupn = $coupnResult->result();
     	$this->jsonMessage('',array('address'=>$address,'user'=>$user,'coupn'=>$coupn));
     }
	
     /**
      * 购买页面--加购物车页面
     */
     public function buy() {
     		
     	$area = $this->input->post('area',true);
     	if (empty($this->d['uid'])) {
     		$this->jsonMessage('请传用户UID');
     	}
     	$cart = $this->mall_cart_goods->getCartGoodsByRes(array('uid'=>$this->d['uid']));
     	$cartData = $this->encrypt($cart,$area);
     	$this->jsonMessage('',$cartData);
     }
     
     /**
      *--产品的循环处理
      */
     private function encrypt($cart,$area) {
     
     	$total = 0; //--订单销售价
     	$actual_price = 0; //--实际支付价
     	$transport_cost = 0; //--总运费价格
     	$cartArr = array();
     	foreach ($cart->result() as $val) {
     		$cartArr[$val->supplier_id]['supplier_id'] = $val->supplier_id;
     		$cartArr[$val->supplier_id]['goods'][] = $val;
     		$total_price = $this->getTotalPrice($val);
     		$total += bcmul($val->goods_num,$total_price,2);
     	}
     	$transport_cost = $this->getFreight($cartArr,$area,$total); //算运费
     	$actual_price = bcadd($total,$transport_cost,2);
     	return array(
     			'cart'   =>  $cartArr, // 总的商品信息
     			'total'  =>  $total, // 总的销售价
     			'transport_cost' => $transport_cost, // 运费
     			'actual_price'   => $actual_price,   // 实际支付价
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
     private function getFreight($cartArr,$area,$totalPrice) {
     
     	$freight = array(); //获取商品是哪个模板 哪个地区 是否是
     	$tranCost = 0; //总运费
     	if (bcsub($totalPrice,99,2)>=0) { //满99元包邮
     		return $tranCost;
     	}
     	foreach ($cartArr as $key => $item) {
     		foreach ($item['goods'] as $val) {//循环店铺
     			$tid = $val->freight_id;
     			$freight[$key][$tid]['supplier_id'] = $val->supplier_id;
     			if ($tid==0) {//没有使用模板 使用默认金额
     				$freight[$key][$tid]['total_qty'][] = $val->goods_num;
     				$freight[$key][$tid]['freight_cost'] = $val->freight_cost;
     			} else { //计算总件数 和 总重量
     				$freight[$key][$tid]['total_qty'][] = $val->goods_num;
     				$freight[$key][$tid]['total_weight'][] = $val->goods_num * $val->goods_weight;
     			}
     		}
     	}
     	foreach ($freight as $key => $items) {
     		 
     		$sub = 0;
     		foreach ($items as $freight_id => $item) {  //店铺下运费模版的计算
     			if ($freight_id == 0) {
     				$sub += $item['freight_cost'];
     				continue;
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
     	foreach ($cartArr as $seller_uid=>$val) {
     		$tranCost += $val['sub'];
     	}
     	return $tranCost;
     }
}