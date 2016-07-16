<?php $this->load->view('layout/cartHeader');?>
<div class="w9 payment" id="content"> 
	<div class="bgwd over" style="padding:30px 30px 30px 80px;">
		<div class="rel">
			<p class="f green l_icon">&#xe638;</p>
			<h1 class="f18 yahei c3">恭喜！订单提交成功，请尽快付款！</h1>
		</div>
		<p class="lh18">&nbsp;</p>
		<p>订单编号：
			<b>2016050523200156755</b>
			<em class="pl30">收货信息：蒋主席，手机号码</em>1598817***，台湾省高雄市
		</p>
		<p class="lh18">&nbsp;</p>
		<p><b>商品清单</b></p>
		<table width="100%" border="0" id="o_xq" class="lh35">
			<tr> 
				<td width="350"> 
					<a href="javascript:;" target="_blank">
						藏帝 高原植物延时喷剂 不麻木无依赖 15ml-<b class="red pl10">套餐:买二送一,加赠藏帝延时湿巾10片[198] </b>
					</a> 
	  			</td>
				<td>数量<b>1</b>件</td>
				<td>共¥392.04</td>
			</tr>
		</table>
		<p class="lh18">&nbsp;</p>
		<p class="red f24 yahei">
			<em class="c3 pr5">待支付金额:</em>¥392.04   
		</p>
		<p class="lh18">&nbsp;</p>
		<form name="pay" id="pay" action="https://mapi.alipay.com/gateway.do?_input_charset=utf-8" method="post" target="_blank">
		    <input type="hidden" name="_input_charset" value="utf-8"/>
			<input type="hidden" name="notify_url" value="http://vip.yiyanpai.com/notify/alipay.php"/>
			<input type="hidden" name="out_trade_no" value="2016050523200156755-2188491"/>
			<input type="hidden" name="partner" value="2088211707337241"/>
			<input type="hidden" name="payment_type" value="1"/>
			<input type="hidden" name="return_url" value="http://vip.yiyanpai.com/respond.php?code=alipay"/>
			<input type="hidden" name="seller_email" value="vip@hongju.cc"/>
			<input type="hidden" name="service" value="create_direct_pay_by_user"/>
			<input type="hidden" name="subject" value="2016050523200156755"/>
			<input type="hidden" name="total_fee" value="392.04"/>
			<input type="hidden" name="sign" value="c995ce1daaf4a91434f18a14c56cab8c"/>
			<input type="hidden" name="sign_type" value="MD5"/>
			<input type="submit" class="bigsee" value="立即使用支付宝支付">
	    </form> 
	</div>
    <div class="bgwd p80">
    	<h2 class="c3 f16 rel lh30">
    		<p class="l_icon">
    			<img src="http://s.qw.cc/themes/v4/css/ft/faq.png" width="40" height="40" />
    		</p>常见问题
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
			        <td>如果您是登陆会员提交的订单，点击我的订单即可查看。如果您不是登陆会员提交订单，点击自动生成会员可查看。如需电话查询请拨<b class="red">400-660-0606</b><p>&nbsp;</p></td>
			        <td>为了尽快送达您的宝贝，凡满99元且顺丰能到的地方，首选发顺丰。正常情况下，大中城市约1-3天能到，中小城市约3-5天能到，请耐心等候！<p>&nbsp;</p></td>
			    </tr>
				<tr>
			        <td><b class="c5">收快递的时候会不会尴尬？</b></td>
			        <td><b class="c5">商品不满意，怎么退/换货？</b></td>
			        <td rowspan="2"><b class="c5">如何在手机上看</b><img src="http://s.qw.cc/themes/v4/css/2/appf.png" width="100" height="100" class="left mr5">
			          <p>私密访问</p>
			          <p>下载APP</p>
			        </td>
      			</tr>
      			<tr>
			        <td>包装与普通包裹无异，货物名称会写“礼品”、“日用品”等，您尽管放心。如果您非要当着朋友面拆货我们就帮不了了 -_-！</td>
			        <td>如果您不满意商品，请根据相关规定办理退换货。查看<a href="/article-23.html" target="_blank" class="U">退/换货详细规则</a></td>
        		</tr>
    		</tbody>
    	</table>
	</div>
	<div class="clear"></div>
</div>
<?php $this->load->view('layout/cartFooter');?>