<?php $this->load->view('layout/cartHeader');?>
<div class="w9 payment" id="content"> 
	<div class="bgwd over order-creat" style="padding:30px 30px 30px 80px;">
		<div class="rel">
			<p class="f green l_icon">&#xe638;</p>
			<h1 class="f18 yahei c3">恭喜！订单提交成功，请尽快付款！</h1>
		</div>
		<p class="lh18">&nbsp;</p>
		<p>订单编号：
			<b><?php echo $mainOrder->order_main_sn;?></b>
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
					<a href="<?php echo site_url('goods/detail.html?goods_id='.$val->goods_id);?>" target="_blank">
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
		    <input type="hidden" name="order_main_sn" value="<?php echo $mainOrder->order_main_sn;?>"/>
		    <input type="hidden" name="pay_bank" value="<?php echo $mainOrder->pay_bank;?>" />
			<input type="submit" class="bigsee" value="立即使用<?php echo $pay_method[$mainOrder->pay_bank]?>支付" />
	    </form> 
	</div>
    <div class="bgwd p80">
    	<h2 class="c3 f16 rel lh30">
    		<p class="l_icon">
    			<img src="miaow/images/faq.png"/>
    		</p>常见事项
    	</h2>
    	<p class="bline"></p>
    	<p class="lh20">&nbsp;</p>
    	<table width="100%" border="0" class="o_wt lh25">
      		<tbody>
      			<tr>
        			<td><b class="c5">之后会发生什么？</b></td>
        			<td><b class="c5">怎么查看订单？</b></td>
        			<td><b class="c5">多久能收到货？</b></td>
      			</tr>
			    <tr>
			        <td>我们稍后会有客服妹纸跟您确认订单，然后尽快安排发货。发货会有短信/邮件提醒，请注意查收<p>&nbsp;</p></td>
			        <td>如果您是登陆会员提交的订单，点击我的订单即可查看。如果您不是登陆会员提交订单，点击自动生成会员可查看。如需电话查询请拨<b class="red">888-888-8888</b><p>&nbsp;</p></td>
			        <td>为了尽快送达您的宝贝，凡满99元且顺丰能到的地方，首选发顺丰。正常情况下，大中城市约1-3天能到，中小城市约3-5天能到，请耐心等候！<p>&nbsp;</p></td>
			    </tr>
				<tr>
			        <td><b class="c5">收快递的时候会不会尴尬？</b></td>
			        <td><b class="c5">商品不满意，怎么退/换货？</b></td>
			        <td rowspan="2"><b class="c5">如何在手机上看</b><img src="" width="100" height="100" class="left mr5">
			          <p>私密访问</p>
			          <p>下载APP</p>
			        </td>
      			</tr>
      			<tr>
			        <td>包装与普通包裹无异，货物名称会写“礼品”、“日用品”等，您尽管放心。如果您非要当着朋友面拆货我们就帮不了了 -_-！</td>
			        <td>如果您不满意商品，请根据相关规定办理退换货。查看<a href="<?php echo $this->config->help_url;?>" target="_blank" class="U">退/换货详细规则</a></td>
        		</tr>
    		</tbody>
    	</table>
	</div>
	<div class="clear"></div>
</div>
<?php $this->load->view('layout/cartFooter');?>