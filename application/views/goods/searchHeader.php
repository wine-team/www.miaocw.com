<?php 
    $order = $this->input->get('order');
    $keyword = $this->input->get('keyword');
    $category_id = $this->input->get('category_id');
    $brand_id = $this->input->get('brand_id');
    $price_range = $this->input->get('price_range');
    $price_arr = get_priceRange();
    $headKeyword = empty($keyword) ?  $ct_param['keyword'] : $keyword;
?>
	<div class="s_tl">
   		<span class="left">
   			<a href="javascript:;">当前位置</a>
   			<code class="lr3">></code>
   			<a href="<?php echo site_url();?>">妙处网</a>
   			<?php if (!empty($headKeyword)):?>
   			<code class="lr3">></code>
   			<a><?php echo $headKeyword;?></a>
   			<?php endif;?>
   		</span>	
   		<span class="right">共找<b class="c3"><?php echo $all_rows;?></b>件</span>
    </div>
    
    <?php if ( !empty($category_id) && empty($keyword)):?>
    <div class="scat over">
        <?php if( !empty($ct_param['category']) && ($ct_param['category']->num_rows()>0)):?>
		<dl class="sdl sfst">
			<dt>分类</dt> 
			<dd class="brand_dl">
				<div id="list_b" class="over">
					<a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'category_id').'&category_id='.$ct_param['parentId']);?>" class="<?php if($ct_param['parentId']==$category_id):?>on<?php endif;?>">不限</a>
					<?php foreach($ct_param['category']->result() as $val):?>
    				<a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'category_id').'&category_id='.$val->cat_id);?>" class="<?php if($category_id==$val->cat_id):?>on<?php endif;?>"><?php echo $val->cat_name;?></a>
    				<?php endforeach;?>
				</div>
				<p class="wz_b"></p>
				<p class="b_rmo <?php if($ct_param['category']->num_rows()<14):?>hid<?php endif;?>">更多</p>
			</dd>
		</dl>
		<?php endif;?>
		
		<?php if( !empty($ct_param['brand']) && ($ct_param['brand']->num_rows()>0)):?>
		<dl class="sdl">
			<dt>品牌</dt>
			<dd id="brand_dl" class="brand_dl">
				<div id="list_b" class="over">
					<a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'brand_id'));?>" class="<?php if(empty($brand_id)):?>on<?php endif;?>">不限</a>
				    <?php foreach ($ct_param['brand']->result() as $item):?>
					<a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'brand_id').'&brand_id='.$item->brand_id);?>" class="<?php if($brand_id==$item->brand_id):?>on<?php endif;?>"><?php echo $item->brand_name;?></a>
					<?php endforeach;?>
				</div>
				<p class="wz_b"></p>
				<p class="b_rmo <?php if($ct_param['brand']->num_rows()<14):?>hid<?php endif;?>" id="b_rmo">更多</p>
			</dd>
		</dl>
		<?php endif;?>
		
		<dl class="sdl">
			<dt>价格</dt>
			<dd>
			   	<a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'price_range'));?>" class="<?php if(empty($price_range)):?>on<?php endif;?>">不限</a>
				<?php foreach ($price_arr as $key=>$price) :?>
			    <a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'price_range').'&price_range='.$key);?>" class="<?php if($this->input->get('price_range')==$key):?>on<?php endif;?>"><?php echo $price;?></a>
			    <?php endforeach;?>
			</dd>
		</dl>
    </div>
	<?php endif;?>

	<div class="sxbox">
		<div class="ls_cat" id="ls_cat">
			<div class="w">
				<div class="left pl10">
				    <a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'order'));?>" class="sb_a <?php if(empty($order)):?>sb_on<?php endif;?>">默认</a>
				    <a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'order').'&order=1');?>" class="sb_a <?php if($order==1):?>sb_on<?php endif;?>">最新上架</a>
				    <a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'order').'&order='.($order==4 ? 5 : 4));?>" class="sb_a <?php if(in_array($order,array(4,5))):?>sb_on<?php endif;?>  <?php if($order==4):?>sup<?php endif;?>">
				    	<em class="pr10">价格</em>
				    	<i class="rjg"></i>
				    </a>
				    <a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'order').'&order=2');?>" class="sb_a <?php if($order==2):?>sb_on<?php endif;?>">热销</a>
				    <a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'order').'&order=3');?>" class="sb_a <?php if($order==3):?>sb_on<?php endif;?>">热门</a>
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