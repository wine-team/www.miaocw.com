<?php if (count($history)>0 && !empty($goods) ) :?>
<?php foreach ($goods->result() as $key=>$item):?>
<a title="<?php echo $item->goods_name;?>" class="hs_ra" target="_blank" href="<?php echo site_url('goods/detail/'.$item->goods_id);?>">
	<img width="70" height="70" src="<?php echo $this->config->show_image_thumb_url('mall',strstr($item->goods_img,'|',true));?>">
	<?php if( !empty($item->promote_price) && !empty($item->promote_start_date) && !empty($item->promote_end_date) && ($item->promote_start_date<=time()) && ($item->promote_end_date>=time())):?>
		<?php $total_price = $item->promote_price;?>
	<?php else:?>
		<?php $total_price = $item->shop_price;?>
	<?php endif;?>
	<p>¥<?php echo $total_price;?></p>
</a>
<?php endforeach;?>
<?php else:?>
<p class="alC">还没有浏览历史哦~~</p>
<?php endif;?>