<?php foreach ($recommond->result() as $val):?>
<li>
	<a href="<?php echo site_url('goods/detail/'.$val->goods_id);?>" target="_blank" title="<?php echo $val->goods_name?>" class="ka_ra">
		<img class="lazy" src="miaow/images/load.jpg"  data-original="<?php echo $this->config->show_image_thumb_url('mall',strstr($val->goods_img,'|',true));?>" width="130" height="130" />
		<?php if (!empty($val->promote_price) && ($val->promote_start_date<=time()) && ($val->promote_end_date>=time())) : ?>
			<?php $total_price = $val->promote_price;?>
		<?php else:?>
			<?php $total_price = $val->shop_price;?>
		<?php endif;?>
		<p class="ka_rp">
			<?php echo $total_price;?>
		</p>
	</a>
</li>
<?php endforeach;?>