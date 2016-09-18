<?php $this->load->view('layout/cartHeader');?>
<div class="w9 cart" id="content">
    <form class="order-form">
	   <div class="bgwd">
	    	<h2 class="c_t f16 lh30"><em>1</em>我的购物车</h2>
	    	<div class="pd4 cart-content">
	    	    <?php //$this->load->view('cart/main')?>
	    	</div>
	   </div>
	   <div class="bgwd p_bg">
	      	<h2 class="c_t f16 lh30"><em>2</em>填写订购信息</h2>
	        <div class="pd4 bgcr">
	            <input type="hidden" name="address_id" value="<?php echo isset($address->address_id) ? $address->address_id : 0;?>" />  
	        	<table width="100%" border="0" class="p_td mt10 lh30">
	          		<tr>
	                	<td width="80">您的姓名</td>
	            		<td>  
	            			<input type="text" placeholder="收货人"   name="receiver_name" size="30" class="yz ipt left" value="<?php echo isset($address->receiver_name) ? $address->receiver_name : '';?>"/>
	              			<em class="red ert pl5">必填</em>
	              	    </td>
	          		</tr>
			        <tr>
			            <td>手机号码</td>
			            <td>
			            	<input type="text"  placeholder="手机号码" name="tel" size="30" class="ipt left" value="<?php echo isset($address->tel) ? $address->tel : '';?>"/>
			              	<em class="red pl5 ert">必填</em>
			            </td>
			        </tr>
	          		<tr>
	            		<td>地　　区</td>
	            		<td>
	              			<?php $this->load->view('cart/address')?>
	              			<em class="red ert pl5" id="sero">必填</em>
	              		</td>
	          		</tr>
		          	<tr>
		            	<td>详细地址</td>
		            	<td>
		              		<input type="text"  placeholder="镇、街道、小区名、门牌号" maxlength="30" style="width:350px;" class="yz ipt left" name="detailed"  value="<?php echo isset($address->detailed) ? $address->detailed : '';?>"/>
		              		<em class="red pl5 ert">必填</em>
		              	</td>
		          	</tr>
	          		<tr>
			            <td>备　　注</td>
			            <td>
			            	<textarea name="order_note" rows="3" id="postscript" class="f12 c_bz"></textarea>
			              	<span class="gray pl5">选填</span>
			            </td>
	          		</tr>
	            </table>
	       </div>
	    </div>
	    <div class="bgwd">
	      　	   <h2 class="c_t f16 lh30"><em>3</em>选择支付方式</h2>
	       <div class="pd4">
	       	 <div class="ov pay-type" id="zhif">          
	         	<div class="zfu zon left"  data-id="1">
	         	    <input type="radio" class="hid pay" name="pay_bank" value="1"  checked="checked"/>
	         		<b class="f14">支付宝</b>
	          	</div>
	            <div class="zfu left"  data-id="2">
	            	<input type="radio" class="hid pay" name="pay_bank" value="2" />
	            	<b class="f14">微信支付</b>
	          	</div>
	            <div class="zfu left"  data-id="3">
	            	<input type="radio" class="hid pay" name="pay_bank" value="3" />
	            	<b class="f14">银联支付</b>
	            	<!-- <p>99元包邮</p> -->
	          	</div>
	         </div>
	         <div class="clear"></div>
	       </div>
	    </div>
	    <div class="bgwd order_detail">
	       <h2 class="c_t f16 lh30"><em>4</em>结算</h2>
	       <div class="pd4">
		       <div class="ov lh20 mb10 alR pay-order">
		        	 <?php //$this->load->view('cart/amount');?>
		       </div>         
	       	   <div class="clear"></div>
	       	   <p class="btp mt10 ov">&nbsp;</p>
	       	   <p class="lh16">&nbsp;</p>
		       <div class="alR lh35 ov" id="d10">
		             <input type="submit" class="b_sub right ml10" value="提交订单"/>
		             <a class="f14 pr10 mt15 right"  href="javascript:history.go(-1);">&lt;&lt;返回继续购物</a>
		       </div>
	     	</div>
	    </div>
  	</form>
</div>
<?php $this->load->view('layout/cartFooter');?>