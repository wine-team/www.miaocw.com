<?php if($samegoods->num_rows()>0):?>
<?php foreach ($samegoods->result() as $val):?>
<a href="<?php echo site_url('goods/detail/'.$val->goods_id);?>" class="rx_a" target="_blank">
	<img class="lazy" src="miaow/images/load.jpg"  data-original="<?php echo $this->config->show_image_thumb_url('mall',strstr($val->goods_img,'|',true))?>" width="160" height="160"/>
	<p><?php echo $val->goods_name;?></p>
	<?php if (!empty($val->promote_price) && ($val->promote_start_date<=time()) && ($val->promote_end_date>=time())) : ?>
		<?php $total_price = $val->promote_price;?>
	<?php else:?>
		<?php $total_price = $val->shop_price;?>
	<?php endif;?>
	<p class="xj">¥<?php echo $total_price;?></p>
</a>
<?php endforeach;?>
<?php endif;?>
