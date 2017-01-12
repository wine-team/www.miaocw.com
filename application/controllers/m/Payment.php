<?php
class Payment extends MW_Controller {
	
	private $d;
	
	public function _init() {
		
		$this->d = $this->input->post();
		$this->load->model('m/user_model','user');
		$this->load->model('m/region_model','region');
		$this->load->model('m/mall_address_model','mall_address');
		$this->load->model('m/mall_order_pay_model','mall_order_pay');
		$this->load->model('m/mall_cart_goods_model','mall_cart_goods');
		$this->load->model('m/user_coupon_get_model','user_coupon_get');
		$this->load->model('m/mall_order_base_model','mall_order_base');
		$this->load->model('m/mall_freight_tpl_model','mall_freight_tpl');
		$this->load->model('m/mall_freight_price_model','mall_freight_price');
		$this->load->model('m/mall_goods_base_model','mall_goods_base');
		$this->load->model('m/mall_order_product_model','mall_order_product');
		$this->load->model('m/mall_order_product_profit_model','mall_order_product_profit');
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
      * 生成订单
      */
     public function createOrder() {
     	
     	$this->validate($this->d);
     	$couponId = $this->input->post('couponId');
     	$deliveryArray = $this->getAddress($this->d);
     	if (empty($deliveryArray)) {
     		$this->jsonMessage('收货地址出错');
     	}
     	$goods = $this->encryptGoods($this->d['goods'],$deliveryArray['area']);// 检验商品数量和限制购买数量
     	if (empty($goods)) {
     		$this->jsonMessage('产品生成出错');
     	}
     	$subtotal = 0;
     	$overrPoints = 0;// 剩余积分
     	$payId = $this->getOrderSn(); //主订单编号
     	$userPoints = $this->user->getPayPoints($this->d['uid']); // 用户总积分
     	$orderParam['pay_bank'] = (int)$this->d['pay_bank'];
     	$orderParam['order_note'] = isset($this->d['order_note']) ? htmlspecialchars($this->d['order_note']) : '';
     	$orderParam['delivery_address'] = $deliveryArray['deliver'];
     	$this->db->trans_begin();
     	foreach ($goods['order'] as $key => $item) {
     		
     		$transport_cost = $item['sub'];
     		$orderShopPrice = 0; // 订单销售价
     		$orderActualPrice = 0; // 订单实际支付价
     		$orderSupplyPrice = 0; // 订单供应价
     		$orderIntegral = 0;    // 产品积分
     		$orderActualIntegral = 0; // 每个订单实际支付积分
     		$orderActualCoupn = 0 ;// 优惠劵实际抵扣
     		$order_id = $this->create_mall_order($key, $item, $payId, $orderParam);
     		if (!$order_id) {
     			$this->db->trans_rollback();
     			$this->jsonMessage('生成订单失败');
     		}
     		foreach ($item['goods'] as $k => $val) {
     			$order_product_id = $this->creat_order_product($val,$order_id); //订单产品表
     			if (!$order_product_id) {
     				$this->db->trans_rollback();
     				$this->jsonMessage('生成订单产品失败');
     			}
     			$mallProfit = $this->creat_order_profit($order_product_id,$val); //订单分润数据
     			if (!$mallProfit) {
     				$this->db->trans_rollback();
     				$this->jsonMessage('订单分润失败');
     			}
     			$orderShopPrice += bcmul($val->goods_num,$val->total_price,2);
     			$orderSupplyPrice += bcmul($val->goods_num,$val->provide_price,2);
     			$orderActualPrice += bcmul($val->goods_num,$val->total_price,2);
     			$orderIntegral += bcmul($val->goods_num,$val->integral,2);
     	
     			$paramsCart['uid'] = $this->uid;
     			$paramsCart['goods_id'][] = $val->goods_id;
     	
     			if ($val->minus_stock ==1) { // 拍下减库存
     				$numStatus = $this->mall_goods_base->setMallNum(array('goods_id'=>$val->goods_id,'number'=>$val->goods_num)); // 产品表库存的变化
     				if (!$numStatus) {
     					$this->db->trans_rollback();
     					$this->jsonMessage('更新库存失败');
     				}
     			}
     		}
     		
     		if (!empty($this->d['jf'])) {  //积分的使用
     			$orderActualIntegral = $this->getIntegral($orderIntegral,$userPoints);// 获取实际抵扣积分
     			$order_update_params['integral'] = $orderActualIntegral;
     			if ($orderActualIntegral != 0) {
     				$userStatus = $this->user->setPayPoints($orderActualIntegral,$this->uid);
     				$logStatus = $this->insertLog($order_id,$orderActualIntegral);//积分使用记录
     				if (!$userStatus || !$logStatus) {
     					$this->db->trans_rollback();
     					$this->jsonMessage('更新账户积分失败');
     				}
     			}
     			$userPoints = bcsub($userPoints,$orderActualIntegral);//剩余积分
     		}
     		 
     		if (!empty($couponId)) { //优惠劵的使用 
     			 
     			$couponRes = $this->user_coupon_get->getCouponById($couponId,$this->d['uid']);
     			if ($couponRes->num_rows()<=0) {
     				$this->jsonMessage('优惠劵不存在');
     			}
     			$coupon = $couponRes->row(0);
     			if ( (bcsub(bcsub($orderActualPrice,$coupon->amount,2),$orderActualIntegral/100,2)>=0) && ($coupon->status==1) ) {
     				$orderActualCoupn = $coupon->amount;
     				$this->user_coupon_get->setStatus($couponId,$this->d['uid']);
     			}
     		}
     		$updateOrder = $this->updateMallOrder($order_id,$couponId,$orderSupplyPrice,$orderShopPrice,$orderActualPrice,$orderActualIntegral,$orderActualCoupn);
     		if (!$updateOrder) {
     			$this->db->trans_rollback();
     			$this->jsonMessage('更新订单失败');
     		}
     		$subtotal += bcsub(bcsub(bcadd($orderActualPrice, $transport_cost, 2),$orderActualIntegral/100,2),$orderActualCoupn,2); //所有订单总价
     	}
     	$main_order = $this->creat_main_order($payId,$subtotal,$orderParam['pay_bank']);
     	if (!$main_order) {
     		$this->db->trans_rollback();
     		$this->jsonMessage('主订单生成失败');
     	}
     	$this->mall_cart_goods->clear_cart($paramsCart);//清除购物车已经生成订单的产品
     	if ($this->db->trans_status() === FALSE) {
     		$this->db->trans_rollback();
     		$this->jsonMessage('订单生成失败');
     	}
     	$this->db->trans_commit();
     	$this->jsonMessage('',base64_encode($payId));//生产订单---
     }
     
     /**
      * 创建主订单
      * @param unknown $orderMainSn
      * @param unknown $subtotal
      * @param unknown $pay_bank
      */
     private function creat_main_order($payId,$subtotal,$pay_bank) {
     
     	$main_params['uid'] = $this->d['uid'];
     	$main_params['pay_bank'] = $pay_bank; //支付银行
     	$main_params['pay_id'] = $payId;
     	$main_params['created_at'] = date('Y-m-d H:i:s');
     	$main_params['order_amount'] = $subtotal;
     	return $this->mall_order_pay->create_order($main_params); //插入总订单
     }
     
     /**
      * 更新主库的订单信息
      * @param unknown $order_id
      * @param unknown $couponId
      * @param unknown $orderSupplyPrice
      * @param unknown $orderShopPrice
      * @param unknown $orderActualPrice
      * @param unknown $orderActualIntegral
      * @param unknown $orderActualCoupn
      */
     private function updateMallOrder($order_id,$couponId,$orderSupplyPrice,$orderShopPrice,$orderActualPrice,$orderActualIntegral,$orderActualCoupn) {
     
     	$actual_price =  bcsub(bcsub($orderActualPrice,$orderActualIntegral/100,2),$orderActualCoupn,2);
     	$order_update_params['order_id'] = $order_id;
     	$order_update_params['coupon_code'] = $couponId;
     	$order_update_params['order_status'] = 2;
     	$order_update_params['order_supply_price'] = $orderSupplyPrice;// 实际供应价
     	$order_update_params['order_shop_price'] = $orderShopPrice;// 实际销售价
     	$order_update_params['actual_price'] = $actual_price;// 实际支付价
     	$order_update_params['order_pay_price'] = $actual_price; // 实际支付价
     	$order_update_params['coupon_price'] = $orderActualCoupn;
     	return $this->mall_order_base->updateMallOrder($order_update_params);//订单表的修改
     }
     
     /**
      * 使用日志
      * @param unknown $order_id
      * @param unknown $orderActualIntegral
      */
     private function insertLog($order_id,$orderActualIntegral) {
     	
     	$param = array(
     		'uid' => $this->d['uid'],
     		'order_id' => $order_id,
     		'account_type' => 2,//1账户,2积分 
     		'flow' => 2, // 1收入，2支出
     		'trade_type' => 1,//1购物，2充值，3提现，4转账，5还款,6退款
     		'amount' => bcdiv($orderActualIntegral,100,2),
     		'note' => '订单号为：'.$order_id.' 使用  '.$orderActualIntegral.'积分'
     	);
     	return $this->account_log->insertLog($param);
     }
     /**
      * 获取可抵积分
      * @param unknown $orderIntegral  --一个订单表的需要抵扣积分
      * @param unknown $userPoints -- 用户账户积分
      */
     private function getIntegral($orderIntegral,$userPoints) {
     
     	if ($orderIntegral == 0) {
     		return $orderIntegral;
     	}
     	if ($userPoints == 0) {
     		return $userPoints;
     	}
     	if ($userPoints < $orderIntegral) {
     		return $userPoints;
     	}
     	if ($orderIntegral < $userPoints) {
     		return $orderIntegral;
     	}
     }
     
     
     /**
      * 订单分润数据的插入
      * @param unknown $order_product_id
      * @param unknown $val
      */
     private function creat_order_profit($order_product_id,$val){
     
     	$param['order_product_id'] = $order_product_id;
     	$param['uid'] = $val->supplier_id;
     	$param['account'] = bcmul($val->goods_num,$val->provide_price,2);
     	$param['account_type'] = 1;
     	$param['as'] = 1;
     	return $this->mall_order_product_profit->insertOrderProfit($param);
     }
     
     
     /**
      * 创建订单产品表
      * @param unknown $val
      * @param unknown $order_id
      */
     private function creat_order_product($val,$order_id) {
     
     	$param['order_id'] = $order_id;
     	$param['goods_id'] = $val->goods_id;
     	$param['goods_name'] = $val->goods_name;
     	$param['attr_value'] = $val->attribute_value;
     	$param['goods_img'] = $val->goods_img;
     	$param['extension_code'] = $val->extension_code;
     	$param['number']  = $val->goods_num;// 购买数量
     	$param['barter_num'] = 0;//退货数量
     	$param['refund_num'] = $val->goods_num;  //换货剩余数量
     	$param['market_price'] = $val->market_price; //市场价
     	$param['shop_price'] = $val->total_price;// 贝竹价
     	$param['supply_price'] = $val->provide_price; // 供应价
     	$param['integral'] = 0 ; //可用积分
     	$param['pay_amount'] = $val->total_price;// 实际支付价
     	$param['created_at'] = date('Y-m-d H:i:s');
     	return $this->mall_order_product->addOrderProduct($param);
     }
     
      /**
      * 生成订单
      * @param unknown $key
      * @param unknown $item
      * @param unknown $orderMainSn
      * @param unknown $orderParam
      */
     private function create_mall_order($key, $item, $payId, $orderParam) {
     	
     	$params['pay_id'] = $payId;
     	$params['order_state'] = 1;
     	$params['order_status'] = 1;
     	$params['seller_uid'] = $key;
     	$params['payer_uid'] = $this->d['uid'];
     	$params['user_name'] = $this->d['aliasName'];
     	$params['pay_method'] = 1;
     	$params['pay_bank'] = $orderParam['pay_bank'];
     	$params['deliver_order_id'] = 0;
     	$params['delivery_address'] = $orderParam['delivery_address'];
     	$params['deliver_price'] = $item['sub'];
     	$params['order_note'] = $orderParam['order_note'];
     	$params['is_from'] = 1;
     	$params['created_at'] = date('Y-m-d H:i:s');
     	return $this->mall_order_base->create_order($params);
     }
     
      /**
      * 订单唯一的序列编号
      * @return string
      */
     private function getOrderSn() {
     	
     	return date('ynjGis') . mt_rand(100, 999);
     }
     
      /**
      * 产品订单生成
      */
     private function encryptGoods($goods,$area) {
     	
     	$goodsIdArr = array_keys($goods);
     	$goodsRes = $this->mall_cart_goods->getCartGoodsByRes(array('uid'=>$this->d['uid'],'goods_id'=>$goodsIdArr));
     	if ($goodsRes->num_rows()<=0) {
     		$this->jsonMessage('产品不存在');
     	}
     	$total = 0; // 订单销售价
     	foreach ($goodsRes->result() as $item) {
     		
     		if ($item->in_stock<=0) {
     			$this->jsonMessage('商品' . $item->goods_name . '库存为零');
     		}
     		if ($goods[$item->goods_id] > $item->in_stock) {
     			$this->jsonMessage('商品' . $item->goods_name . '库存不足，最多可购买'. $item->in_stock . '件' );
     		}
     		if ($item->limit_num>0) {
     			if ($goods[$item->goods_id] > $item->limit_num ) {
     				$this->jsonMessage('商品' . $item->goods_name . '（一个用户限购' . $item->limit_num . '件）');
     			}
     		}
     		$item->goods_num = $goods[$item->goods_id]; //购买产品的数量
     		$item->total_price = $this->getTotalPrice($item); // 实际销售价因为促销价在里面
     		$total += bcmul($item->goods_num,$item->total_price,2);
     		/**订单数据的处理**/
     		$supplier_id = $item->supplier_id;
     		$argc[$supplier_id]['supplier_id'] = $supplier_id;
     		$argc[$supplier_id]['goods'][] = $item;
     	}
     	$argc = $this->getFreight($argc,$area,$total,$flag=2);
     	return array(
     		'order' => $argc,
     		'total' => $total  //总价多少钱
     	);
     }
     
     /**
      * 插入地址
      * @param unknown $postData
      * @return string
      */
     private function getAddress($postData) {
     
     	$regionids = array($postData['province_id'], $postData['city_id'],$postData['district_id']);
     	$region = $this->region->getByRegionIds($regionids);
     	if ($region->num_rows() < 3) {
     		$this->jsonMessage('城市地区请填写完整');
     	}
     	$regionNames = array();
     	foreach ($region->result() as $item) {
     		$regionNames[] = $item->region_name;
     	}
     	if (empty($postData['addressId'])) {
     		$param['uid'] = $postData['uid'];
     		$param['province_id'] = $postData['province_id'];
     		$param['province_name'] = $regionNames[0];
     		$param['city_id'] = $postData['city_id'];
     		$param['city_name'] =  $regionNames[1];
     		$param['district_id'] = $postData['district_id'];
     		$param['district_name'] = $regionNames[2];
     		$param['detailed'] = htmlspecialchars($postData['detailed']);
     		$param['code'] = isset($postData['code']) ? $postData['code'] : '000000';
     		$param['receiver_name'] = $postData['receiver_name'];
     		$param['tel'] = $postData['tel'];
     		$param['is_default'] = 2;
     		$addressId = $this->mall_address->insert($param);
     	}
     	$deliver = array(
     			'receiver_name' => $postData['receiver_name'],
     			'detailed'      => $regionNames[0] .' '.$regionNames[1].' '.$regionNames[2].' '.$postData['detailed'],
     			'tel'           => $postData['tel'],
     	);
     	return array('deliver'=>json_encode($deliver),'area'=>$regionNames[0]);
     }
     
     /**
      * 验证
      * @param unknown $param
      */
     private function validate($postData) {
     	
     	if (empty($postData['uid'])) {
     		$this->jsonMessage('请先登录');
     	}
     	if (empty($postData['aliasName'])) {
     		$this->jsonMessage('请传用户名');
     	}
     	if (empty($postData['goods']) || !is_array($postData['goods'])) {
     		$this->jsonMessage('快去选购产品哦');
     	}
     	if (empty($postData['receiver_name'])) {
     		$this->jsonMessage('请填收货姓名');
     	}
     	if (empty($postData['tel'])) {
     		$this->jsonMessage('请填联系方式');
     	}
     	if (!valid_mobile($postData['tel'])) {
     		$this->jsonMessage('请填正确的手机号码');
     	}
     	if (empty($postData['province_id'])) {
     		$this->jsonMessage('请选择省份');
     	}
     	if (empty($postData['city_id'])) {
     		$this->jsonMessage('请选择市');
     	}
     	if (empty($postData['district_id'])) {
     		$this->jsonMessage('请选择区');
     	}
     	if (empty($postData['detailed'])) {
     		$this->jsonMessage('请填详细地址');
     	}
     	if (empty($postData['pay_bank'])) {
     		$this->jsonMessage('请选择支付方式');
     	}
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
      * flag =1 为产品购买页获取运费
      * flag =2 为生成订单的时候返回运费和产品信息
      * @param unknown $cartArr
      * @param unknown $area
      * @param unknown $totalPrice
      * @param number $flag
      * @return number|unknown|Ambigous <number, unknown>
      */
     private function getFreight($cartArr,$area,$totalPrice,$flag=1) {
     
     	$freight = array(); //获取商品是哪个模板 哪个地区 是否是
     	if ($flag==1) {
     		$tranCost = 0; //总运费
     		if (bcsub($totalPrice,99,2)>=0) { //满99元包邮
     			return $tranCost;
     		}
     	} else {
     		if (bcsub($totalPrice,99,2)>=0) { //满99元包邮
     			foreach ($cartArr as $key => $item) {
     				$cartArr[$key]['sub'] = 0; // 每个商品运费为零
     			}
     			return $cartArr;
     		}
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
     	if ($flag == 1) {
     		foreach ($cartArr as $seller_uid=>$val) {
     			$tranCost += $val['sub'];
     		}
     		return $tranCost; // 购买页面返回运费
     	} else {
     		return $cartArr;// 订单填写页面返回产品信息
     	}
     }
}