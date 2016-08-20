 <?php if ($page_list->num_rows() > 0): ?>
<div class="over" id="wpl">
        <?php foreach ($page_list->result() as $item):?>
		<div class="ucom">
			<div class="ucoml">
				<p>
					<img src="<?php $this->config->show_image_url('common/touxiang',$item->photo)?>" width="50" height="50">
				</p>
			</div>
			<div class="ucomr">
				<p class="lcor">◆</p>
				<div class="ov">
					<em class="left"><?php echo substr_cut($item->alias_name);?></em> 
					<!--<em class="vip v2"></em><em class='c9'>青海省-海东地区</em>-->
					<div class="right px px<?php echo $item->score;?>"><p></p></div>
				</div>
				<?php echo $item->content;?>
				<?php if(!empty($item->slide_show)):?>
				<?php $image = array_filter(explode('|',$item->slide_show));?>
				<div class="s_d">
				    <?php foreach ($image as $val):?>
					<img width="60" height="60" onclick="zom(this)" data-b="http://s.qw.cc/images/comment/9221/1463386872460187446.jpg" src="http://s.qw.cc/images/comment/9221/1463386872460187446-60x60.jpg" class="on" data-n="0">
				    <?php endforeach;?>
				</div>
				<?php endif;?>
			</div>
		</div>
		<?php endforeach;?>
		<div class="clear"></div>
</div>
<div id="pager" class="page alC">
    <!--  
	<a href="javascript:;" onClick="ppage()">&lt;</a>
	<a href="javascript:;" onClick="gpage(1)" class="on">1</a>
	<a href="javascript:;" onClick="gpage(2)" >2</a>
	<a href="javascript:;" onClick="npage()">&gt;</a>
	-->
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



