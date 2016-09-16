<?php if(!empty($cart)):?>
<table width="100%" border="0" class="tb_c lh20 cart">
	<tr>
		<th width="70">商品名称</th>
	    <th width="300"></th>
	    <th width="150">单价</th>
	    <th width="150">数量</th>
	    <th width="150">小计</th>
	    <th>操作</th>
    </tr>
    <?php foreach ($cart  as $item):?>
    <?php foreach ($item['goods'] as $val):?>
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
	    <td class="cart-solve">            
		    <input type="text" name="goods[<?php echo $val->goods_id;?>]" goods-num="<?php echo $val->in_stock;?>" limit-num="<?php echo $val->limit_num;?>" goods-id="<?php echo base64_encode($val->goods_id);?>" value="<?php echo $val->goods_num;?>"  class="number left"  onkeyup="this.value=this.value.replace(/\D/g,'')" onblur="javascript:cartQtyChange($(this))"/>
			<div class="amount left">
				<p class="increase" onclick="javascript:cartQtyUpdate('up',$(this))" ></p>
			    <p class="decrease" onclick="javascript:cartQtyUpdate('down',$(this))"></p>
			</div>
		</td>
        <td class="g_xj">¥<?php echo bcmul($val->goods_num,$val->promote_price,2);?></td>
        <td class="operate">
          	<p><a class="c9 enshirne" href="javascript:;" goods-id="<?php echo base64_encode($val->goods_id);?>">收藏</a></p>
            <a class="c9 delete" href="javascript:;" goods-id="<?php echo base64_encode($val->goods_id);?>">删除</a>
        </td>
	</tr>
    <?php endforeach;?>
    <?php endforeach;?>
    <tr>
	    <td colspan="3"></td>
	    <td colspan="3" align="right">商品总价 &nbsp;<b class="red" id="q_xj" >¥<?php echo bcadd($total,0,2);?></b></td>
    </tr>
</table>
<?php else:?>
<div class="m-cart-body">     
	<div class="cart-empty">
		<h2 class="c3">你的购物车是空的，快去 <a class="link-btn cart-btn" href="<?php echo site_url();?>">首页</a> 抢购吧O(∩_∩)O</h2>
		<p class="link-wrap lh28 clearfix">您可以 <a href="<?php echo $this->config->ucenter_url.'enshrine.html'?>" target="_blank">查看我的收藏&gt;&gt;</a></p>
	</div>
</div>
<?php endif;?>