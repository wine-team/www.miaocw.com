 <?php if ($page_list->num_rows() > 0): ?>
<div class="over" id="wpl">
        <?php foreach ($page_list->result() as $item):?>
		<div class="ucom">
			<div class="ucoml">
				<p>
					<img class="lazy" src="miaow/images/load.jpg"  data-original="<?php $this->config->show_image_url('common/touxiang',$item->photo)?>" width="50" height="50">
				</p>
			</div>
			<div class="ucomr">
				<p class="lcor">◆</p>
				<div class="ov">
					<em class="left"><?php echo substr_cut($item->alias_name);?></em> 
					<!--<em class="vip v2"></em><em class='c9'>青海省-海东地区</em>-->
					<div class="right px px<?php echo $item->score;?>"><p></p></div>
				</div>
				<p>
					<?php echo $item->content;?>
				</p>
				<?php if(!empty($item->slide_show)):?>
				<?php $image = array_filter(explode('|',$item->slide_show));?>
				<div class="s_d">
				    <?php foreach ($image as $val):?>
						<img width="60" height="60" onclick="zom(this)" data-b="<?php echo $this->config->show_image_url('mall',$val);?>" src="<?php echo $this->config->show_image_thumb_url('mall',$val,60);?>" class="on" data-n="0">
				    <?php endforeach;?>
				</div>
				<?php endif;?>
			</div>
		</div>
		<?php endforeach;?>
		<div class="clear"></div>
</div>
<div id="pager" class="page alC">
	<?php echo $pg_list; ?>
</div>
<?php else:?>
<div class="over" id="wpl">
	<p class="yahei f24 alC">
		<br>
		该商品还有没有评论信息呦，赶紧去购买！
		<br>
	</p>
</div>
<?php endif;?>



