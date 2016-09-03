<?php
class Payment extends CS_Controller {

	public function _init() {
		
		$this->load->model('mall_goods_base_model','mall_goods_base');
	}

	 /**
	  * 首页
	 */
     public function grid(){
     	
     	$postData = $this->input->post();
     	$this->validate($postData);
     	$this->checkGoods($postData['goods']);// 检验商品数量和限制购买数量
     	
     	
     	
     	
     	$this->load->view('payment/grid');
     }

     /**
      * 校验产品数量
      * @param unknown $goods
      */
     public function checkGoods($goods) {
     	
     	$goodsIdArr = array_keys($goods);
     	$goodsRes = $this->mall_goods_base->getGoodsByGoodsId($goodsIdArr);
     	if ($goodsRes->num_rows()<=0) {
     		$this->jsen('产品不存在');
     	}
     	foreach ($goodsRes->result() as $item) {
     		
     		if ($item->in_stock<=0) {
     			$this->jsonMessage('商品' . $item->goods_name . '库存为零');
     		} 
     		if ($goods[$item->goods_id] > $item->in_stock) {
     			$this->jsonMessage('商品' . $item->goods_name . '库存不足，最多可购买'. $item->in_stock . '件' );
     		}
     		if ($item->limit_num>0) {
     			if ($goods[$item->goods_id] > $item->limit_num ) {
     				$this->jsen('商品' . $item->goods_name . '（一个用户限购' . $item->limit_num . '件）');
     			}
     		}
     	}
     }
      
      /**
      * 订单验证
      * @param unknown $postData
      */
     public function validate($postData){
     	
     	if (empty($postData['goods']) || !is_array($postData['goods'])) {
     		$this->jsen('请传产品参数');
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