<?php $this->load->view('layout/cartHeader');?>
<div class="w9 cart" id="content">
	<div class="bgwd">
    	<h2 class="c_t f16 lh30"><em>1</em>我的购物车</h2>
    	<div class="pd4">
      		<table width="100%" border="0" class="tb_c lh20">
		        <tr>
			        <th width="70">商品名称</th>
			        <th width="300"></th>
			        <th width="150">单价</th>
			        <th width="150">数量</th>
			        <th width="150">小计</th>
			        <th>操作</th>
		        </tr>
                <tr>
			        <td> 
			        	<a href="goods-6197.html" target="_blank">
			        		<img src="http://s.qw.cc/images/201512/thumb_img/6197_thumb_P220_1449128855593-60x60.jpg" title="日本Rends DIY编程智能旋转自慰飞机杯" width="60" height="60" />
			            </a> 
			        </td>
			        <td> 
	            		<a href="goods-6197.html" target="_blank" class="pr50">日本Rends DIY编程智能旋转自慰飞机杯<p class="green"></p></a> 
	            	</td>
	          		<td>
	          			<em class="q_price">¥2547.02</em>
	          		</td>
		          	<td>            
			            <input type="text" size="4" name="goods_number[22748726]" id="goods_number_22748726" data-id="22748726" value="1" onblur="chageCarnum(22748726)" r_buy="1" class="number left"/>
			            <div class="amount left">
			               <p class="increase"></p>
			               <p class="decrease"></p>
			            </div>
		            </td>
          			<td class="g_xj">¥2547.02</td>
          			<td>
          				<p><a class="c9" href="javascript:;">转为收藏</a></p>
                    	<a href="javascript:"  class="c9">删除</a>
                    </td>
        		</tr>
                <tr>
		          	<td> 
			            <a href="javascript:;" target="_blank">
			            	<img src="http://s.qw.cc/images/201511/thumb_img/4971_thumb_P220_1446530875302-60x60.jpg" title="香港兆邦凯撒爱的摇篮充气式性爱床" width="60" height="60" />
			            </a> 
			        </td>
		          	<td> 
            			<a href="javascript:;" target="_blank" class="pr50">香港兆邦凯撒爱的摇篮充气式性爱床<p class="green"></p></a> 
             		</td>
          			<td>
          				<em class="q_price">¥2234.40</em>
          			</td>
			        <td>            
			            <input type="text" size="4" name="goods_number[22762056]" id="goods_number_22762056" data-id="22762056" value="1" onblur="chageCarnum(22762056)" r_buy="1" class="number left"/>
			            <div class="amount left">
			              <p class="increase" onclick="c_add(22762056)"></p>
			              <p class="decrease" onclick="c_rem(22762056)"></p>
			            </div>
			        </td>
          		    <td class="g_xj">¥2234.40</td>
          			<td>  
          				<p><a class="c9" href="javascript:adfav(4971)">转为收藏</a></p>
                    	<a href="javascript:" onClick="delgoods(22762056)" class="c9">删除</a>
                    </td>
        		</tr>
                <tr>
			        <td> 
			        	<a href="goods-7577.html" target="_blank">
			        		<img src="http://s.qw.cc/images/201601/thumb_img/7577_thumb_P220_1453100833465-60x60.jpg" title="UNIMAT 电动夹吸飞机杯式阴茎增大器" width="60" height="60" />
			            </a> 
			        </td>
			        <td> 
            			<a href="goods-7577.html" target="_blank" class="pr50">UNIMAT 电动夹吸飞机杯式阴茎增大器
            				<p class="green">选择颜色:精装版白色 </p>
            		    </a> 
             		</td>
          			<td>
          				<em class="q_price">¥449.82</em>
          			</td>
          			<td>            
			            <input type="text" size="4" name="goods_number[22763751]" id="goods_number_22763751" data-id="22763751" value="1" onblur="chageCarnum(22763751)" r_buy="1" class="number left"/>
			            <div class="amount left">
			              <p class="increase" onclick="c_add(22763751)"></p>
			              <p class="decrease" onclick="c_rem(22763751)"></p>
			            </div>
            		</td>
          			<td class="g_xj">¥449.82</td>
          			<td>
          				<p><a class="c9" href="javascript:adfav(7577)">转为收藏</a></p>
                    	<a href="javascript:" onClick="delgoods(22763751)" class="c9">删除</a>
                    </td>
        		</tr>
                <tr>
			        <td colspan="3"></td>
			        <td colspan="3" align="right">商品总价 &nbsp;<b class="red" id="q_xj" >¥5231.24</b></td>
        		</tr>
      		</table>
    	</div>
   </div>
   <form action="flow.php" method="post" name="theForm" id="theForm" class="quform" >
   	  <input type="hidden" value="106b994e60a3ee2fa49db8ffd6b1db36" name="token"/>
	  <div class="c_tb gft lh25 hid mb10" id="gift">
	     <h3 class="f14"><span id="gf_name"></span>,您一共可以免费选择<b class="red" id="gf_num">0</b>件赠品</h3>
	     <ul class="ov alC" id="gf_ul">
	     </ul>
	  </div>
	  <div class="bgwd p_bg">
      	 <h2 class="c_t f16 lh30"><em>2</em>填写订购信息</h2>
         <div class="pd4 bgcr">
        	<table width="100%" border="0" class="p_td mt10 lh30">
          		<tr>
                	<td width="80">您的姓名</td>
            		<td>
            			<input type="text" errormsg="收货人姓名至少2个汉字,最多8个字符！" placeholder="请准确填写收货人" datatype="s" maxlength="8" m="2" name="consignee" size="30" class="yz ipt left" id="consignee" value="蒋主席"/>
              			<em class="red ert pl5">必填</em>
              	    </td>
          		</tr>
		        <tr>
		            <td>手机号码</td>
		            <td>
		            	<input type="text"  placeholder="11位手机号码" maxlength="15"  name="mobile" class="ipt left" size="30" id="mobile" value="15988173722"/>
		              	<em class="red pl5 ert">必填</em>
		            </td>
		        </tr>
          		<tr>
            		<td>地&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;区</td>
            		<td>
            			<input type="hidden" name="address_id" value="8883416"/>
              			<?php $this->load->view('cart/address')?>
              			<em class="red ert pl5" id="sero">必填</em>
              		</td>
          		</tr>
	          	<tr>
	            	<td>详细地址</td>
	            	<td>
	            		<em id="x_p" class="left"></em><em id="x_c" class="left"></em><em id="x_z" class="left"></em>
	              		<input type="text" errormsg="街道地址至少4个字！" datatype="s" placeholder="镇、街道、小区名、门牌号" maxlength="30" style="width:350px;" m="4" class="yz ipt left" name="address" id="address" value="台湾省高雄市"/>
	              		<em class="red pl5 ert">必填</em>
	              	</td>
	          	</tr>
          		<tr>
		            <td><em class="gray">备注</em></td>
		            <td>
		            	<textarea name="postscript" rows="3" id="postscript" class="f12 c_bz"></textarea>
		              	<span class="gray pl5">选填</span>
		            </td>
          		</tr>
            </tbody>
        </table>
      </div>
    </div>
    <div class="bgwd">
      <h2 class="c_t f16 lh30"><em>3</em>选择支付方式</h2>
      <div class="pd4">
        <input type="hidden" id="discount" value="0.98"/>
        <input type="hidden" id="payment" name="payment" value="4"/>
        <div class="ov pay-type" id="zhif">          
        	<div class="zfu zon left"  data-id="4">
        		<b class="f14">支付宝</b>
            	<p>99元包邮</p>
          	</div>
            <div class="zfu left"  data-id="12">
            	<b class="f14">微信支付</b>
            	<p>99元包邮</p>
          	</div>
            <div class="zfu left"  data-id="13">
            	<b class="f14">银行卡/信用卡</b>
            	<p>99元包邮</p>
          	</div>
            <div class="zfu left" id="delivery" data-id="3">
            	<b class="f14">货到付款</b>
            	<p>198元包邮</p>
          	</div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <input type="hidden" name="step" value="done" />
    <input type="hidden" name="referertype" value="" />
    <div id="order_detail" class="bgwd">
      <h2 class="c_t f16 lh30"><em>4</em>结算</h2>
      <div class="pd4">
        <div class="ov lh20 mb10 alR">
        	<b class="red right" id="amount">¥5231.24</b>
        	<em class="gray right">实付款：</em>
        	<em class="right ml10 pr10"> = </em>
		 	<div class="right hid" id="computer">
          		<span class="right">满减<b class="red" id="computer_discount">¥0.00</b></span><i class="o_cut right"></i>
          	</div>
          	<div class="right " id="favourable">
				<select name="bonus" onchange="changeBonus(this.value)" id="ECS_BONUS" class="right hid" style="width:100px;">
            		<option value="0" selected>选择优惠券</option>
                   	<option value="1331926" >新注册送10元优惠券[¥10.00]</option>
                </select>
          		<label class="pr10 right">
            		<input type="checkbox" name="youhuiquan" id="u_yh" autocomplete="off"/>
            		使用优惠券(<em class="red">1</em>张可用)
            	</label>
          		<i class="right o_cut"></i> 
		  	</div>
          	<span class="right">邮费<b class="red" id="yf">¥0.00</b></span>
          	<i class="o_add right"></i>
          	<span class="right">商品总价<b class="red" id="zj" data-price="5231.24">¥5231.24</b></span> 
        </div>         
        <div class="clear"></div>
        <p class="btp mt10 ov">&nbsp;</p>
        <p class="lh16">&nbsp;</p>
        <div class="alR lh35 hid ov" id="d9">
          <p class="red f14 fB mb10">商品总价不满99元，建议再挑几件或选择在线支付方式</p>
          <input type="submit" class="right b_sub ml10" value="继续提交"/>
          <a class="f14 pr10 mt15 right"  href="javascript:window.history.go(-1);">&lt;&lt;返回继续购物</a>
        </div>
        <div class="alR lh35 ov" id="d10">
          <input type="submit" class="b_sub right ml10" value="提交订单" id="tijiao"/>
          <a class="f14 pr10 mt15 right"  href="javascript:window.history.go(-1);">&lt;&lt;返回继续购物</a>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <input name="shipping" id="shipping" type="hidden" value = "11"/>
  </form>
  <p class="lh30">&nbsp;</p>
  <div class="pbox lh35 hid" id="pbox">
     <p class="g_b hand alC" onClick="pclose()">关闭</p>
     <h2 class="c3 f14">请选择产品附加属性</h2>
     <form id="ECS_FORMBUY" name="ECS_FORMBUY">
	     <input type="hidden" name="gid" value="0" id="gid"/>
	     <div class="xcolor clearfix" id="wrap"></div>
	     <div class="clear"></div>
	     <p>&nbsp;</p>
	     <input type="button" onClick="adacr()" value="确认选择" class="redb"/>
     </form>
  </div>
  <p class="mask hid" id="mask"></p>
</div>
<?php $this->load->view('layout/cartFooter');?>
