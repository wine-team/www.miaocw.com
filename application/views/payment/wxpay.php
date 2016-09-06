<?php $this->load->view('layout/cartHeader');?>
<div class="w9" id="content"> 
	<div class="bgwd" id="weixinzhifu">
        <table width="100%" border="0" height="415">
	        <tr>
	        	<td width="20">&nbsp;</td>
	        	<td width="80" valign="top">
	        		<p class="okts"></p>
	        	</td>
	        	<td style="background:url(miaow/images/weipay.png) 320px 52px no-repeat;">
		        	<h3 class="c3 lh30 f16">恭喜，提交成功，请使用微信扫一扫，扫描二维码支付</h3>
		        	<p class="lh18">&nbsp;</p>
		        	<div style="border:1px solid #ddd;width:280px;margin-top:20px;padding-top:10px;">
		       			<div id="codeimg" class="alC" style="height:230px;">
		       				<img width="230" height="230" src="<?php echo $this->config->show_image_url('common/ewm',$payEwm);?>" />
		       			</div>        
			        	<div style="background-color:#eee;padding:10px;">
				        	<p><em class="gray">订单编号：</em><b><?php echo $mainOrder->order_main_sn;?></b></p>
				        	<?php $deliver = json_decode($orderProduct[0]->delivery_address);?>
				        	<p><em class="gray">收货信息：</em><?php echo $deliver->receiver_name;?>，<?php echo $deliver->tel;?>，<?php echo $deliver->detailed;?></p>
				        	<p>
				        		<em class="gray">订单总价:</em>
				            	<b class="red f24">¥<?php echo bcadd($order->transport_cost,$order->actual_pay,2);?></b>
				        	</p>
			        	</div>
		        	</div>
		        	<p class="lh18">&nbsp;</p>
	        	</td>
	        </tr>
        </table>
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
<script type="text/javascript">
jQuery(function(){

	
})
</script>
<?php $this->load->view('layout/cartFooter');?>
