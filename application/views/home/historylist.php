<?php if (count($history)>0 && !empty($goods) ) :?>
<?php foreach ($goods->result() as $key=>$item):?>
<?php $goodsImage = explode('|',$item->goods_img);?>
<a title="<?php echo $item->goods_name;?>" class="hs_ra" target="_blank" href="">
	<img width="70" height="70" src="<?php echo $this->config->show_image_thumb_url('mall',$goodsImage[0]);?>">
	<p>¥<?php echo $item->promote_price;?></p>
</a>
<?php endforeach;?>
<?php else:?>
<p class="alC">还没有浏览历史哦~~</p>
<?php endif;?>