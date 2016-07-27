<?php if(isset($cart_goods) && ($cart_goods->num_rows() >0)):?>
<ul class="acar">
<?php $num=0;$total=0;?>
<?php foreach ($cart_goods->result() as $key=>$item):?>
     <?php $goodsImage = explode('|',$item->goods_img);?>
    <li>
		<a href="javascript:;">
			<img class="left" width="60" height="60" alt="妙处网" src="<?php echo $this->config->show_image_thumb_url('mall',$goodsImage[0]);?>" />
			<p><?php echo $item->goods_name?></p>
			<p class="red"><?php echo $item->promote_price;?><b class="c5"> X </b><?php echo $item->goods_num;?></p>
		</a>
	</li>
	<?php $num += $item->goods_num; ?>
	<?php $total += bcmul($item->goods_num, $item->promote_price,2);?>
<?php endforeach;?>
</ul>
<div class="ac_t alR clearfix">
	<p>
		共<b id="a_num" class="red"><?php echo $num;?></b>件商品，总计
		<b id="a_sum" class="red"><?php echo $total;?></b>元
	</p>
	<p class="gray">在线支付满199包邮</p>
	<p><a class="srbtn mt5 right" href="<?php echo site_url('cart/grid');?>">去购物车结算>></a></p>
</div>
<?php else:?>
<div class="ac_t alR clearfix">
	您的购物车是空的,赶紧选购吧！
</div>
<?php endif;?>
