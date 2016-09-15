<?php $this->load->view('layout/header');?>
<p class="lh35 hid" id="konav">&nbsp;</p>
<div id="content" class="w">
	<div class="bl_l left">
		<a href="<?php echo site_url('goods/search?keyword=多点按摩棒');?>" class="l_aa">
			<img src="miaow/images/62-38x38.jpg" />
			<p>多点按摩棒</p>
		</a>
		<a href="<?php echo site_url('goods/search?keyword=仿真阳具');?>" class="l_aa">
			<img src="miaow/images/7-38x38.jpg"/>
			<p>仿真阳具</p>
		</a>
		<a href="<?php echo site_url('goods/search?keyword=转珠棒');?>" class="l_aa">
			<img src="miaow/images/8-38x38.jpg"/>
			<p>转珠棒</p>
		</a>
		<a href="<?php echo site_url('goods/search?keyword=G点震动棒');?>" class="l_aa">
			<img src="miaow/images/10-38x38.jpg"/>
			<p>G点震动棒</p>
		</a>
		<a href="<?php echo site_url('goods/search?keyword=性爱机器');?>" class="l_aa">
			<img src="miaow/images/54-38x38.jpg"/>
			<p>性爱机器</p>
		</a>
		<a href="<?php echo site_url('goods/search?keyword=跳蛋');?>" class="l_aa">
			<img src="miaow/images/64-38x38.jpg"/>
			<p>跳蛋</p>
		</a>
		<a href="<?php echo site_url('goods/search?keyword=情欲提升');?>" class="l_aa">
			<img src="miaow/images/117-38x38.jpg"/>
			<p>情欲提升</p>
		</a>
		<a href="<?php echo site_url('goods/search?keyword=多点按摩棒');?>" class="l_aa">
			<img src="miaow/images/115-38x38.jpg"/>
			<p>AV震动棒</p>
		</a>
		<a href="<?php echo site_url('goods/search?keyword=双乳刺激');?>" class="l_aa">
			<img src="miaow/images/53-38x38.jpg"/>
			<p>双乳刺激</p>
		</a>
		<a href="<?php echo site_url('goods/search?keyword=后庭拉珠');?>" class="l_aa">
			<img src="miaow/images/59-38x38.jpg"/>
			<p>后庭拉珠</p>
		</a>
		<a href="<?php echo site_url('goods/search?keyword=男女共震器');?>" class="l_aa">
			<img src="miaow/images/118-38x38.jpg"/>
			<p>男女共震器</p>
		</a>
		<a href="<?php echo site_url('goods/search?keyword=私处挑逗');?>" class="l_aa">
			<img src="miaow/images/39-38x38.jpg"/>
			<p>私处挑逗</p>
		</a>
		<div class="clear"></div>
		<p class="lh16">&nbsp;</p>
		<a href="<?php echo site_url('goods/search?keyword=自慰专场');?>" class="l_ab">自慰专场</a>
		<a href="<?php echo site_url('goods/search?keyword=炮机');?>" class="l_ab">炮机</a>
		<a href="<?php echo site_url('goods/search?keyword=强震跳蛋');?>" class="l_ab">强震跳蛋</a>
		<a href="<?php echo site_url('goods/search?keyword=土豪级男根');?>" class="l_ab">土豪级男根</a>
		<a href="<?php echo site_url('goods/search?keyword=乳房增大');?>" class="l_ab">乳房增大</a>
	</div>
	<div class="bl_m left">
	    <?php if($advert->num_rows()>0):?>
		<div id="bl_m" class="goods-advert">
			<ul class="s_ul">
				<?php foreach ($advert->result() as $val):?>
				<li>
					<a href="<?php echo $val->url;?>" target="_blank">
						<img width="890" height="320" src="<?php echo $this->config->show_image_url('advert',$val->picture);?>"/>
					</a>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
		<?php endif;?>
		<?php echo $cms_block['femal_head_recommend'];?>
	</div>	
	<div class="clear"></div>
	<?php if ($recommend->num_rows() > 0):?>
	<div class="over mt35 wbox" id="wbox">
		<div class="c_tt yahei">
			<!-- <em class="red fB">1F</em>  -->
			<h1 class="dinl">女性用品</h1>推荐
			<!-- <em class="c9">MASTERPIECE</em>-->
		</div>
		<?php foreach ($recommend->result() as $item):?>
		<a href="<?php echo site_url('goods/detail?goods_id='.$item->goods_id);?>" class="dn_a" title="<?php echo $item->goods_name;?>" target="_blank">
			<img src="miaow/images/load.jpg" data-original="<?php echo $this->config->show_image_thumb_url('mall',strstr($item->goods_img,'|',true));?>" width="270" height="270" class="sbm lazy"/>
			<div class="h250">
				<p class="OverH">
					<?php echo $item->goods_name;?>
				</p>
				<p>
					<i class="rmb">¥</i>
					<b class="xj"><?php echo $item->promote_price;?></b>
					<del class="ml10">¥<?php echo $item->market_price;?></del>
				</p>
				<p class="c9">销量 <em class="c_zon"><?php echo $item->sale_count;?></em>笔 | 评价 <em class="c_blue"><?php echo $item->review_count;?></em></p>
			</div>
		</a>
		<?php endforeach;?>
	</div>
	<?php endif;?>
	<p class="lh30">&nbsp;</p>
	<div class="ov w_hd">
	    <a href="<?php echo site_url();?>" target="_blank">
	    	<img src="miaow/images/femal.jpg" width="1190" height="90"/>
	    </a>
	</div>
</div>
<div class="w" id="gdls">
	<div class="bdls femal">
	    <?php if($mall_goods->num_rows()>0):?>
	    <?php foreach ($mall_goods->result() as $item):?>
		<dl class="gl">
			<dt>
				<a href="<?php echo site_url('goods/detail?goods_id='.$item->goods_id);?>" target="_blank">
					<img  src="miaow/images/load.jpg" data-original="<?php echo $this->config->show_image_thumb_url('mall',strstr($item->goods_img,'|',true))?>" width="270" height="270" class="sbm lazy" alt="<?php echo $item->goods_name;?>">
				</a>
			</dt>
			<?php $img = array_filter(explode('|',$item->goods_img));?>
			<dd class="simg">
			    <?php foreach ( $img as $val):?>
				<img class="lazy" src="miaow/images/load.jpg" data-original="<?php echo $this->config->show_image_thumb_url('mall',$val,'60');?>" width="30" height="30" data-s="<?php echo $this->config->show_image_thumb_url('mall',$val);?>"/>
			    <?php endforeach;?>
			</dd>
			<dd class="mb5">
				<a href="<?php echo site_url('goods/detail?goods_id='.$item->goods_id);?>" class="gna" title="<?php echo $item->goods_name;?>" target="_blank"><?php echo $item->goods_name;?></a>
				<a href="<?php echo site_url('goods/detail?goods_id='.$item->goods_id);?>" class="gna c9" title="<?php echo $item->goods_brief;?>" target="_blank"><?php echo $item->goods_brief;?></a>
			</dd>
			<dd>
				<i class="rmb">¥</i>
				<b class="xj"><?php echo $item->promote_price;?></b>
				<del>¥<?php echo $item->market_price;?></del>
			</dd>
			<dd class="mt5">销量 <em class="c_zon"><?php echo $item->sale_count;?></em>笔 | 评价 <em class="c_blue"><?php echo $item->review_count;?></em></dd>
		</dl>
		<?php endforeach;?>
		<?php endif;?>
	</div>
</div>
<div class="w over">
    <?php if($child_cat->num_rows()>0):?>
    <div class="bgw mt35 pd20">
		<b class="pr10">所有女性用品分类：</b>
		<?php foreach ($child_cat->result() as $val):?>
		<a href="<?php echo site_url('goods/search?cat='.$val->cat_id);?>" class="pl10"><?php echo $val->cat_name;?></a>
		<?php endforeach;?>
	</div>
	<?php endif;?>
	<p class="lh30">&nbsp;</p>
	<div class="tpk over">
	    <?php echo $cms_block['foot_recommend_img'];?>
	</div>
	<p class="alC">
		<a href="javascript:;" class="hbtn c9 mt15" target="_blank" rel="nofollow">查看更多活动</a>
	</p>
	<div class="fa_l clearfix mt35">
		<?php echo $cms_block['foot_speed_key'];?>
	</div>
</div>
<?php $this->load->view('layout/footer');?>