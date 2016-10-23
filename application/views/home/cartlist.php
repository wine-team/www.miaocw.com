<?php if(isset($cart_goods) && ($cart_goods->num_rows() >0)):?>
<ul class="acar">
<?php $num=0;$total=0;?>
<?php foreach ($cart_goods->result() as $key=>$item):?>
    <li>
		<a href="<?php echo site_url('goods/detail/'.$item->goods_id)?>" target="_blank">
			<img class="left" width="60" height="60" alt="妙处网" src="<?php echo $this->config->show_image_thumb_url('mall',strstr($item->goods_img,'|',true));?>" />
			<p><?php echo $item->goods_name;?></p>
			<p class="red">
			    <?php if( !empty($item->promote_price) && !empty($item->promote_start_date) && !empty($item->promote_end_date) && ($item->promote_start_date<=time()) && ($item->promote_end_date>=time())):?>
					<?php $total_price = $item->promote_price;?>
				<?php else:?>
					<?php $total_price = $item->shop_price;?>
				<?php endif;?>
				<?php echo $total_price;?>
				<b class="c5"> X </b>
				<?php echo $item->goods_num;?>
			</p>
		</a>
	</li>
	 <?php $num += $item->goods_num;?>
	 <?php $total += bcmul($item->goods_num, $total_price,2);?>
<?php endforeach;?>
</ul>
<div class="ac_t alR clearfix">
	<p>
		共<b id="a_num" class="red"><?php echo $num;?></b>件商品，总计
		<b id="a_sum" class="red"><?php echo $total;?></b>元
	</p>
	<p class="gray">在线支付满99包邮</p>
	<p><a class="srbtn mt5 right" href="<?php echo site_url('cart/grid');?>">去购物车结算>></a></p>
</div>
<?php else:?>
<div class="ac_t alR clearfix">
	您的购物车是空的,赶紧选购吧！
</div>
<?php endif;?>
