<?php $this->load->view('layout/header');?>
<div id="content" class="w goods-list">
   	<div class="s_tl">
   		<span class="left">
   			<a href="javascript:;">当前位置</a>
   			<code class="lr3">></code>
   			<a href="<?php echo site_url();?>">妙处网</a>
   			<?php if ($this->input->get('keyword')):?>
   			<code class="lr3">></code>
   			<a><?php echo $this->input->get('keyword');?></a>
   			<?php endif;?>
   		</span>	
   		<span class="right">共找<b class="c3"><?php echo $all_rows;?></b>件</span>
    </div>
	<div class="sxbox">
		<div class="ls_cat" id="ls_cat">
		    <?php 
		    	$order = $this->input->get('order');
		        $keyword = $this->input->get('keyword');
		    ?>
			<div class="w">
				<div class="left pl10">
				    <a href="<?php echo site_url('goods/search?'.http_build_query(array('keyword'=>$keyword)));?>" class="sb_a <?php if(empty($order)):?>sb_on<?php endif;?>">默认</a>
				    <a href="<?php echo site_url('goods/search?'.http_build_query(array('keyword'=>$keyword,'order'=>1)));?>" class="sb_a <?php if($order==1):?>sb_on<?php endif;?>">最新上架</a>
				    <a href="<?php echo site_url('goods/search?'.http_build_query(array('keyword'=>$keyword,'order'=>($order==4 ? 5 : 4))));?>" class="sb_a <?php if(in_array($order,array(4,5))):?>sb_on<?php endif;?>  <?php if($order==4):?>sup<?php endif;?>">
				    	<em class="pr10">价格</em>
				    	<i class="rjg"></i>
				    </a>
				    <a href="<?php echo site_url('goods/search?'.http_build_query(array('keyword'=>$keyword,'order'=>2)));?>" class="sb_a <?php if($order==2):?>sb_on<?php endif;?>">热销</a>
				    <a href="<?php echo site_url('goods/search?'.http_build_query(array('keyword'=>$keyword,'order'=>3)));?>" class="sb_a <?php if($order==3):?>sb_on<?php endif;?>">热门</a>
				</div>
				<?php if ($all_pg>1):?>
				<div class="prt right"> 
					<span class="left mr10"><?php echo $pg_now?>/<?php echo $all_pg;?></span>
					<?php if($pg_now>1) :?>
						<a class="pr_a" href="<?php echo site_url('goods/search/'.($pg_now-1).'?'.http_build_query($this->input->get()));?>" >上一页</a> 
					<?php endif;?>
					<?php if($pg_now<$all_pg):?>
						<a class="pr_a" href="<?php echo site_url('goods/search/'.($pg_now+1).'?'.http_build_query($this->input->get()));?>">下一页</a>
					<?php endif;?>
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>
	<div class="gdls" id="gdls">
	    <?php foreach ($page_list as $goods) :?>
		<dl class="gl">
			<dt>
			    <?php $img_arr = array_filter(explode('|',$goods->goods_img));?>
				<a href="<?php echo site_url('goods/detail/'.$goods->goods_id);?>" target="_blank">
					<img src="miaow/images/load.jpg" data-original="<?php echo $this->config->show_image_thumb_url('mall',$img_arr[0]);?>" width="270" height="270" class="sbm lazy" alt="<?php echo $goods->goods_name;?>" />
				</a>
			</dt>
			<dd class="simg">
			    <?php foreach($img_arr as $img):?>
					<img class="lazy" src="miaow/images/load.jpg" width="30" height="30" data-original="<?php echo $this->config->show_image_thumb_url('mall',$img,60);?>" data-s="<?php echo $this->config->show_image_thumb_url('mall',$img);?>"/>
			    <?php endforeach;?>
			</dd>
			<dd class="mb10">
				<a href="<?php echo site_url('goods/detail/'.$goods->goods_id);?>" class="gna" title="<?php echo $goods->goods_name;?>" target="_blank"><?php echo $goods->goods_name;?></a>
				<a href="<?php echo site_url('goods/detail/'.$goods->goods_id);?>" class="gna c9" title="<?php echo $goods->goods_brief;?>" target="_blank"><?php echo $goods->goods_brief;?></a>
			</dd>
			<?php if( !empty($goods->promote_price) && !empty($goods->promote_start_date) && !empty($goods->promote_end_date) && ($goods->promote_start_date<=time()) && ($goods->promote_end_date>=time())):?>
				<?php $shop_price = $goods->promote_price;?>
			<?php else:?>
				<?php $shop_price = $goods->shop_price;?>
			<?php endif;?>
			<dd>
				<em class="i_hot">热销</em>
				<i class="rmb">¥</i>
				<b class="xj"><?php echo $shop_price;?></b>
				<del>¥<?php echo $goods->market_price;?></del>
			</dd>
			<dd class="mt5">销量 
				<em class="c_zon"><?php echo $goods->sale_count;?></em>笔 | 评价 
				<em class="c_blue"><?php echo $goods->review_count;?></em>
			</dd>
		</dl>
		<?php endforeach;?>
	</div>
	<div class="page" id="pager">
  		<span class="yemr">总计<b><?php echo $all_rows;?></b> 条记录</span>              
  		<?php echo $pg_link;?>
    </div>
    <div class="ftj mt35 b_li">
		<?php echo $cms_block['search_keyword'];?>
	</div>
	
	<div class="tpk over">
	    <?php echo $cms_block['foot_recommend_img'];?>
	</div>
	
	<div class="fa_l clearfix mt35">
		<?php echo $cms_block['foot_speed_key'];?>
	</div>
</div>
<?php $this->load->view('layout/footer');?>
