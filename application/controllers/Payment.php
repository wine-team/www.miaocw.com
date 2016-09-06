<?php
class Payment extends CS_Controller {

	public function _init() {
		
		$this->load->library('encrypt');
		$this->load->model('region_model','region');
		$this->load->model('mall_address_model','mall_address');
		$this->load->model('mall_cart_goods_model','mall_cart_goods');
		$this->load->model('mall_goods_base_model','mall_goods_base');
		$this->load->model('mall_order_main_model','mall_order_main');
		$this->load->model('mall_order_base_model','mall_order_base');
		$this->load->model('mall_order_product_model','mall_order_product');
		$this->load->model('mall_freight_tpl_model','mall_freight_tpl');
		$this->load->model('mall_freight_price_model','mall_freight_price');
		$this->load->model('user_coupon_get_model','user_coupon_get');
		$this->load->model('mall_order_product_profit_model','mall_order_product_profit');
	}

	 /**
	  * 首页
	 */
     public function create_order(){
     	
     	$postData = $this->input->post();
     	$this->validate($postData);
     	$addressId = $this->input->post('address_id');
     	$couponId = $this->input->post('couponId');
     	$deliveryArray = $this->getAddress($addressId,$postData);
        if (empty($deliveryArray)) {
        	$this->jsen('收货地址出错');
        }
     	$goods = $this->encryptGoods($postData['goods'],$deliveryArray['area']);// 检验商品数量和限制购买数量
     	if (empty($goods)) {
     		$this->jsen('产品生成出错');
     	}
     	$subtotal = 0;
     	$orderMainSn = $this->getOrderSn(); //主订单编号
     	$orderParam['pay_bank'] = isset($postData['pay_bank']) ? $postData['pay_bank'] : 1;
     	$orderParam['order_note'] = isset($postData['order_note']) ? $postData['order_note'] : '';
     	$orderParam['delivery_address'] = $deliveryArray['deliver'];
     	$this->db->trans_begin();
     	foreach ($goods['order'] as $key => $item) {
     		$transport_cost = $item['sub'];
     		$orderShopPrice = 0;// 订单销售价
     		$orderActualPrice = 0; // 订单实际支付价
     		$orderSupplyPrice = 0; // 订单供应价
     		$order_id = $this->create_mall_order($key, $item, $orderMainSn, $orderParam);
     		if (!$order_id) {
     			$this->db->trans_rollback();
     			$this->jsen('生成订单失败');
     		}
     		foreach ($item['goods'] as $k => $val) {
     			$order_product_id = $this->creat_order_product($val,$order_id); //订单产品表
     			if (!$order_product_id) {
     				$this->db->trans_rollback();
     				$this->jsen('生成订单产品失败');
     			}
     			$mallProfit = $this->creat_order_profit($order_product_id,$val); //订单分润数据
     			if (!$mallProfit) {
     				$this->db->trans_rollback();
     				$this->jsen('订单分润失败');
     			}
     			$orderShopPrice += bcmul($val->goods_num,$val->shop_price,2);
     			$orderSupplyPrice += bcmul($val->goods_num,$val->provide_price,2);
     			$orderActualPrice += bcmul($val->goods_num,$val->shop_price,2);
     		    
     			$paramsCart['uid'] = $this->uid;
     			$paramsCart['goods_id'][] = $val->goods_id;
     			
     			$product_param['goods_id'] = $val->goods_id;
     			$product_param['number'] = $val->goods_num;
     			$numStatus = $this->mall_goods_base->setMallNum($product_param); // 产品表库存的变化
     			if (!$numStatus) {
     				$this->db->trans_rollback();
     				$this->jsen('更新库存失败');
     			}
     		}
     		
     		$order_update_params['order_id'] = $order_id;
     		$order_update_params['status'] = 2;
     		$order_update_params['order_supply_price'] = $orderSupplyPrice;// 实际供应价
     		$order_update_params['order_shop_price'] = $orderShopPrice;// 实际销售价
     		$order_update_params['actual_price'] = $orderActualPrice;// 实际支付价
     		$order_update_params['order_pay_price'] = $orderActualPrice; // 实际支付价
     		$updateOrder = $this->mall_order_base->updateMallOrder($order_update_params);//订单表的修改
     	    if (!$updateOrder) {
     	    	$this->db->trans_rollback();
     	    	$this->jsen('更新订单失败');
     	    }
     	    $subtotal += bcadd($orderActualPrice, $transport_cost, 2); //所有订单总价
     	}
     	$main_order = $this->creat_main_order($orderMainSn,$subtotal,$orderParam['pay_bank']);
     	if (!$main_order) {
     		$this->db->trans_rollback();
     		$this->jsen('主订单生成失败');
     	}
     	if ($this->db->trans_status() === FALSE) {
     		$this->db->trans_rollback();
     		$this->jsen('订单生成失败');
     	}
     	$this->db->trans_commit();
     	$this->mall_cart_goods->clear_cart($paramsCart);//清除购物车已经生成订单的产品
        $mainOrder = $this->encrypt->encode($orderMainSn); //加密
        $this->jsen(site_url('payment/order?pay='.$mainOrder),true);
     }
     
      /**
      *订单支付页面
      */
     public function order() {
     	
     	$pay = $this->input->get('pay');
     	if (empty($pay)) {
     	 	$this->alertJumpPre('非法参数');
     	}
     	$orderMainSn = $this->encrypt->decode($pay);
     	$orderRes = $this->mall_order_base->getOrderBaseByRes(array('uid'=>$this->uid,'order_main_sn'=>$orderMainSn));
     	if ($orderRes->num_rows()<=0) {
     		$this->alertJumpPre('订单不存在');
     	}
     	$data['order'] = $orderRes->row(0);
     	$mainRes = $this->mall_order_main->findOrderMainByRes(array('uid'=>$this->uid,'order_main_sn'=>$orderMainSn));
     	if ($mainRes->num_rows()<=0) {
     		$this->alertJumpPre('主订单不存在');
     	}
     	$data['mainOrder'] = $mainRes->row(0);
     	$productRes = $this->mall_order_product->getOrderProduct(array('uid'=>$this->uid,'order_main_sn'=>$orderMainSn));
     	if ($productRes->num_rows()<=0) {
     		$this->alertJumpPre('订单产品表不存在');
     	}
     	$data['orderProduct'] = $productRes->result();
     	$data['pay_method'] = array('1'=>'支付宝','2'=>'微信','3'=>'银联');
     	$this->load->view('payment/grid',$data);
     }
     
      /**
      * 创建主订单
      * @param unknown $orderMainSn
      * @param unknown $subtotal
      * @param unknown $pay_bank
      */
     public function creat_main_order($orderMainSn,$subtotal,$pay_bank) {
     	
     	$main_params['uid'] = $this->uid;
     	$main_params['pay_bank'] = $pay_bank; //支付银行
     	$main_params['order_main_sn'] = $orderMainSn;
     	$main_params['created_at'] = date('Y-m-d H:i:s');
     	$main_params['order_amount'] = $subtotal;
     	return $this->mall_order_main->create_order($main_params); //插入总订单
     }
     
      /**
      * 订单分润数据的插入
      * @param unknown $order_product_id
      * @param unknown $val
      */
     public function creat_order_profit($order_product_id,$val){
     	
     	$param['order_product_id'] = $order_product_id;
     	$param['uid'] = $val->supplier_id;
     	$param['account'] = bcmul($val->goods_num,$val->provide_price,2);
     	$param['account_type'] = 1;
     	$param['as'] = 1;
     	return $this->mall_order_product_profit->insertOrderProfit($param);
     }
     
      /**
      * 生成订单
      * @param unknown $key
      * @param unknown $item
      * @param unknown $orderMainSn
      * @param unknown $orderParam
      */
     public function create_mall_order($key, $item, $orderMainSn, $orderParam) {
     	
     	$params['order_main_sn'] = $orderMainSn;
     	$params['order_sn'] = $this->getOrderSn();
     	$params['state'] = 1;
     	$params['status'] = 1;
     	$params['seller_uid'] = $key;
     	$params['payer_uid'] = $this->uid;
     	$params['user_name'] = $this->userName;
     	$params['pay_method'] = 1;
     	$params['pay_bank'] = $orderParam['pay_bank'];
     	$params['deliver_order_id'] = 0;
     	$params['delivery_address'] = $orderParam['delivery_address'];
     	$params['deliver_price'] = $item['sub'];
     	$params['order_note'] = $orderParam['order_note'];
     	$params['is_form'] = 1;
     	$params['created_at'] = date('Y-m-d H:i:s');
     	return $this->mall_order_base->create_order($params);
     }
     
      /**
      * 创建订单产品表
      * @param unknown $val
      * @param unknown $order_id
      */
     public function creat_order_product($val,$order_id) {
     	
     	$param['order_id'] = $order_id;
     	$param['goods_id'] = $val->goods_id;
     	$param['goods_name'] = $val->goods_name;
     	$param['attr_value'] = $val->attribute_value;
     	$param['goods_img'] = $val->goods_img;
     	$param['extension_code'] = $val->extension_code;
     	$param['number']  = $val->goods_num;
     	$param['barter_num'] = 0;
     	$param['refund_num'] = $val->goods_num;
     	$param['market_price'] = $val->market_price; //市场价
     	$param['shop_price'] = $val->shop_price;// 贝竹价
     	$param['supply_price'] = $val->provide_price; // 供应价
     	$param['integral'] = 0 ; //可用积分
     	$param['pay_amount'] = $val->shop_price;// 实际支付价
     	$param['created_at'] = date('Y-m-d H:i:s');
     	return $this->mall_order_product->addOrderProduct($param);
     }
     
      /**
      * 插入地址
      * @param unknown $postData
      * @return string
      */
     public function getAddress($addressId,$postData) {
     	
     	$regionids = array($postData['province_id'], $postData['city_id'],$postData['district_id']);
     	$region = $this->region->getByRegionIds($regionids);
     	if ($region->num_rows() < 3) {
     		$this->jsen('城市地区请填写完整');
     	}
     	$regionNames = array();
     	foreach ($region->result() as $item) {
     		$regionNames[] = $item->region_name;
     	}
     	if (empty($addressId)) {
     		$param['uid'] = $this->uid;
     		$param['province_id'] = $postData['province_id'];
     		$param['province_name'] = $regionNames[0];
     		$param['city_id'] = $postData['city_id'];
     		$param['city_name'] =  $regionNames[1];
     		$param['district_id'] = $postData['district_id'];
     		$param['district_name'] = $regionNames[2];
     		$param['detailed'] = $postData['detailed'];
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
      * 校验产品数量
      * @param unknown $goods
      */
     public function encryptGoods($goods,$area) {
     	
     	$goodsIdArr = array_keys($goods);
     	$goodsRes = $this->mall_cart_goods->getCartGoodsByRes(array('uid'=>$this->uid,'goods_id'=>$goodsIdArr));
     	if ($goodsRes->num_rows()<=0) {
     		$this->jsen('产品不存在');
     	}
     	$total = 0; // 订单销售价
     	$argc = array();
     	foreach ($goodsRes->result() as $item) {
     		if ($item->in_stock<=0) {
     			$this->jsen('商品' . $item->goods_name . '库存为零');
     		} 
     		if ($goods[$item->goods_id] > $item->in_stock) {
     			$this->jsen('商品' . $item->goods_name . '库存不足，最多可购买'. $item->in_stock . '件' );
     		}
     		if ($item->limit_num>0) {
     			if ($goods[$item->goods_id] > $item->limit_num ) {
     				$this->jsen('商品' . $item->goods_name . '（一个用户限购' . $item->limit_num . '件）');
     			}
     		}
     		$item->goods_num = $goods[$item->goods_id]; //购买产品的数量
     		$total += bcmul($item->goods_num,$item->promote_price,2); //销售价
     		/**订单数据的处理**/
     		$supplier_id = $item->supplier_id;
     		$argc[$supplier_id]['order_sn'] = $this->getOrderSn();
     		$argc[$supplier_id]['supplier_id'] = $supplier_id;
     		$argc[$supplier_id]['goods'][] = $item;
     	}
     	$argc = $this->getFreight($argc,$area);
     	return array(
     		  'order' => $argc,
     		  'total' => $total  //总价多少钱
     	);
     }
     
     /**
      * 获取运维信息
      * @param unknown $cartArr
      */
     public function getFreight($goods,$area) {
     	 
     	$freight = array(); //获取商品是哪个模板 哪个地区 是否是
     	foreach ($goods as $key => $item) {
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
     		$goods[$key]['sub'] = $sub; //每个供应商下的产品的运费
     	} 
     	return $goods;
     }
     
      /**
      * 订单唯一的序列编号
      * @return string
      */
     public function getOrderSn() {
     	
     	return date('ynjGis') . mt_rand(100, 999);
     }
      
      /**
      * 订单验证
      * @param unknown $postData
      */
     public function validate($postData){
     	
     	if (empty($postData['goods']) || !is_array($postData['goods'])) {
     		$this->jsen('请选购产品');
     	}
     	if (empty($postData['address_id'])) {
     		$this->jsen('请传地址参数');
     	}
     	if (empty($postData['receiver_name'])) {
     		$this->jsen('请传收货姓名');
     	}
     	if (empty($postData['tel'])) {
     		$this->jsen('请传联系方式');
     	}
     	if (!valid_mobile($postData['tel'])) {
     		$this->jsen('请填正确的手机号码');
     	}
     	if (empty($postData['province_id'])) {
     		$this->jsen('请传省份ID');
     	}
     	if (empty($postData['city_id'])) {
     		$this->jsen('请传市区ID');
     	}
     	if (empty($postData['district_id'])) {
     		$this->jsen('请传区ID');
     	}
     	if (empty($postData['detailed'])) {
     		$this->jsen('请传详细地址');
     	}
     	if (empty($postData['pay_bank'])) {
     		$this->jsen('请传支付方式');
     	}
     }
}