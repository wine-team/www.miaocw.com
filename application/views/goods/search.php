<?php $this->load->view('layout/header');?>

<div id="content" class="w goods-list">
    
   	<?php $this->load->view('goods/searchHeader');?>
   	
   	<?php if ($goods->num_rows()>0):?>
	<div class="gdls" id="gdls">
	    <?php foreach ($goods->result() as $goods) :?>
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
	<?php else:?>
	<?php 
		$keyword = $this->input->get('keyword');
		$headKeyword = empty($keyword) ?  $ct_param['keyword'] : $keyword;
	?>
	<div class="no-find lack-goods">
		<i></i>
		<div class="no-messages">
			<h3>非常抱歉！没有找到与<em class="highlight"><?php echo $headKeyword;?></em> 相关的商品。</h3>
			建议您：变换关键词或筛选条件重新搜索 
		</div>
	</div>
	<?php endif;?>
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
	
</div>
<?php $this->load->view('layout/footer');?>
