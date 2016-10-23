<?php $this->load->view('layout/cartHeader');?>
<div class="w9 payment" id="content"> 
	<div class="bgwd over order-creat">
		<div class="rel">
			<p class="f green l_icon iconfont">&#xe60f;</p>
			<h1 class="f18 yahei c3">恭喜！订单提交成功，请尽快付款！</h1>
		</div>
		<p class="lh18">&nbsp;</p>
		<p>订单编号：
			<b><?php echo $mainOrder->pay_id;?></b>
			<?php $deliver = json_decode($orderProduct[0]->delivery_address);?>
			<em class="pl30">收货信息：<?php echo $deliver->receiver_name;?>，手机号码</em><?php echo $deliver->tel;?>，<?php echo $deliver->detailed;?>
		</p>
		<p class="lh18">&nbsp;</p>
		<?php if (!empty($orderProduct)):?>
		<p><b>商品清单</b></p>
		<table width="100%" border="0" id="o_xq" class="lh35">
			<?php foreach ($orderProduct as $val):?>
			<tr> 
				<td width="350"> 
					<a href="<?php echo site_url('goods/detail/'.$val->goods_id);?>" target="_blank">
						<?php echo $val->goods_name;?> <b class="red pl10"><?php echo $val->attr_value;?></b>
					</a> 
	  			</td>
				<td>数量<b><?php echo $val->refund_num;?></b>件</td>
				<td>共¥<?php echo bcmul($val->shop_price,$val->refund_num,2);?></td>
			</tr>
			<?php endforeach;?>
		</table>
		<?php endif;?>
		<p class="lh18">&nbsp;</p>
		<p class="red f24 yahei">
			<em class="c3 pr5">待支付金额:</em>¥<?php echo bcadd($order->transport_cost,$order->actual_pay,2);?> <?php if($order->transport_cost>0):?>（含运费:¥<?php echo $order->transport_cost;?>）<?php endif;?>  
		</p>
		<p class="lh18">&nbsp;</p>
		<form action="<?php echo site_url('pay/grid');?>" method="post" class="pay">
		    <input type="hidden" name="pay_id" value="<?php echo $mainOrder->pay_id;?>"/>
		    <input type="hidden" name="pay_bank" value="<?php echo $mainOrder->pay_bank;?>" />
			<input type="submit" class="bigsee" value="立即使用<?php echo $pay_method[$mainOrder->pay_bank]?>支付" />
	    </form> 
	</div>
    <?php $this->load->view('payment/help');?>
</div>
<?php $this->load->view('layout/cartFooter');?>