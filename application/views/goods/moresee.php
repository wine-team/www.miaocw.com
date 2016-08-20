 <?php foreach ($recommond->result() as $val):?>
	<li>
		<a href="<?php echo site_url('goods/detail?goods_id='.$val->goods_id);?>" target="_blank" title="<?php echo $val->goods_name?>" class="ka_ra">
			<img class="lazy" src="miaow/images/load.jpg"  data-original="<?php echo $this->config->show_image_thumb_url('mall',strstr($val->goods_img,'|',true));?>" width="130" height="130" />
			<p class="ka_rp"><?php echo $val->promote_price;?></p>
		</a>
	</li>
 <?php endforeach;?>