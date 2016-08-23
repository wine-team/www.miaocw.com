<?php $this->load->view('layout/cartHeader');?>
<div class="w9 cart" id="content">
	<div class="bgwd">
    	<h2 class="c_t f16 lh30"><em>1</em>我的购物车</h2>
    	<div class="pd4">
      		<table width="100%" border="0" class="tb_c lh20 cart">
		        <tr>
			        <th width="70">商品名称</th>
			        <th width="300"></th>
			        <th width="150">单价</th>
			        <th width="150">数量</th>
			        <th width="150">小计</th>
			        <th>操作</th>
		        </tr>
		        <?php if($cart->num_rows()>0):?>
		        <?php $total=0;?>
		        <?php foreach ($cart->result() as $val):?>
                <tr>
			        <td> 
			        	<a href="<?php echo site_url('goods/detail?goods_id='.$val->goods_id);?>" target="_blank">
			        		<img class="lazy" src="miaow/images/load.jpg"  data-original="<?php echo $this->config->show_image_thumb_url('mall',strstr($val->goods_img,'|',true),'60')?>" title="<?php echo $val->goods_name;?>" width="60" height="60" />
			            </a> 
			        </td>
			        <td> 
	            		<a href="<?php echo site_url('goods/detail?goods_id='.$val->goods_id);?>" target="_blank" class="pr50">
		            		<?php echo $val->goods_name;?>
		            		<?php if(!empty($val->attribute_value)):?>
		            			<p class="green"><?php echo $val->attribute_value;?></p>
		            		<?php endif;?>
	            	    </a> 
	            	</td>
	          		<td>
	          			<em class="q_price">¥<?php echo $val->promote_price;?></em>
	          		</td>
		          	<td>            
			            <input type="text" name="goods_number[<?php echo $val->goods_id;?>]" goods_num="<?php echo $val->in_stock;?>" limit-num="<?php echo $val->limit_num;?>" data-id="<?php echo $val->goods_id;?>" value="<?php echo $val->goods_num;?>"  class="number left"  onkeyup="this.value=this.value.replace(/\D/g,'')"/>
			            <div class="amount left">
			               <p class="increase" ></p>
			               <p class="decrease" ></p>
			            </div>
		            </td>
          			<td class="g_xj">¥<?php echo bcmul($val->goods_num,$val->promote_price,2);?></td>
          			<?php $total +=  bcmul($val->goods_num,$val->promote_price,2);?>
          			<td>
          				<p><a class="c9 enshirne" href="javascript:;" goods-id="<?php echo $val->goods_id?>">转为收藏</a></p>
                    	<a href="javascript:"  class="c9" >删除</a>
                    </td>
        		</tr>
        		<?php endforeach;?>
                <?php endif;?>
                <tr>
			        <td colspan="3"></td>
			        <td colspan="3" align="right">商品总价 &nbsp;<b class="red" id="q_xj" >¥<?php echo bcadd($total,0,2);?></b></td>
        		</tr>
      		</table>
    	</div>
   </div>
   <form  name="theForm" id="theForm" class="quform" >
	  <div class="bgwd p_bg">
      	 <h2 class="c_t f16 lh30"><em>2</em>填写订购信息</h2>
         <div class="pd4 bgcr">
            <input type="hidden" name="address_id" value="<?php echo isset($address->address_id) ? $address->address_id : '';?>">  
        	<table width="100%" border="0" class="p_td mt10 lh30">
          		<tr>
                	<td width="80">您的姓名</td>
            		<td>  
            			<input type="text" placeholder="请准确填写收货人" datatype="s" maxlength="8" m="2" name="consignee" size="30" class="yz ipt left" id="consignee" value="<?php echo isset($address->receiver_name) ? $address->receiver_name : '';?>"/>
              			<em class="red ert pl5">必填</em>
              	    </td>
          		</tr>
		        <tr>
		            <td>手机号码</td>
		            <td>
		            	<input type="text"  placeholder="11位手机号码" maxlength="15"  name="mobile" class="ipt left" size="30" id="mobile" value="<?php echo isset($address->tel) ? $address->tel : '';?>"/>
		              	<em class="red pl5 ert">必填</em>
		            </td>
		        </tr>
          		<tr>
            		<td>地　　区</td>
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
	              		<input type="text" errormsg="街道地址至少4个字！" datatype="s" placeholder="镇、街道、小区名、门牌号" maxlength="30" style="width:350px;" m="4" class="yz ipt left" name="address" id="address" value="<?php echo isset($address->detailed) ? $address->detailed : '';?>"/>
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
            </tbody>
        </table>
      </div>
    </div>
    <div class="bgwd">
      　	   <h2 class="c_t f16 lh30"><em>3</em>选择支付方式</h2>
       <div class="pd4">
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
            	<b class="f14">银联支付</b>
            	<p>99元包邮</p>
          	</div>
         </div>
         <div class="clear"></div>
      </div>
    </div>
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
          	<div class="right free" id="favourable">
				<select name="bonus" id="ECS_BONUS" class="right hid select-free" style="width:100px;">
            		<option value="0" selected>选择优惠券</option>
                   	<option value="1331926" >新注册送10元优惠券[¥10.00]</option>
                </select>
          		<label class="pr10 right">
            		<input type="checkbox" name="youhuiquan" class="youhuiquan"/>
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
        <div class="alR lh35 ov" id="d10">
            <input type="submit" class="b_sub right ml10" value="提交订单" id="tijiao"/>
            <a class="f14 pr10 mt15 right"  href="javascript:history.go(-1);">&lt;&lt;返回继续购物</a>
        </div>
      </div>
    </div>
  </form>
</div>
<?php $this->load->view('layout/cartFooter');?>