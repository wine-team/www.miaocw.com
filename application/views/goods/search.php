<?php $this->load->view('layout/header');?>
<div id="content" class="w goods-list">
   	<div class="s_tl">
   		<span class="left">
   			<a href="javascript:;">当前位置</a>
   			<code class="lr3">:</code>
   			<a href="<?php echo site_url();?>">妙处网</a>
   			<?php if ($this->input->get('keyword')):?>
   			<code class="lr3">></code>
   			<b class="lr3"><?php echo $this->input->get('keyword');?></b>
   			<?php endif;?>
   		</span>	
		<ul class="left s_sx">
		    <?php if ($this->input->get('category_id')) :?>
		      <li>
		          <a class="d_xx" title="分类" href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'category_id'));?>">
		           分类：<?php echo $category_arr[$this->input->get('category_id')];?>
                  </a>
              </li>
		    <?php endif;?>
		    <?php if($this->input->get('brand_id')) :?>
		      <li>
		          <a class="d_xx" title="品牌" href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'brand_id'));?>">
		          品牌：<?php echo $this->input->get('brand_name');?>
		          </a>
	          </li>
		    <?php endif;?>
		    <?php if($this->input->get('price_range')) :?>
		      <li>
    		      <a class="d_xx" title="价格" href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'price_range'));?>">
    		 价格：<?php echo $price_arr[$this->input->get('price_range')];?>
    		      </a>
		      </li>
		    <?php endif;?>
		    
		    <?php if($this->input->get('order')):?>
            <li>
                <a class="d_xx" title="排序" href="<?php echo site_url('goods/search?keyword='.$this->input->get('keyword'));?>">
                      排序：<?php echo $order_arr[$this->input->get('order')];?>
    		    </a>
		    </li>
		    <?php endif;?>
        </ul>
   		
   		<span class="right">共找<b class="c3"><?php echo $all_rows;?></b>件</span>
    </div>
    
    <?php if(count($page_list) > 0) :?>
    <div class="scat over">
		<dl class="sdl sfst">
			<dt><b class="red">分类</b></dt> 
			<dd class="brand_dl">
				<div id="list_b" class="over">
				    <?php foreach ($category_arr as $cat_id=>$cat_name) : ?>
    				<a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'category_id').'&category_id='.$cat_id);?>" class="<?php if($this->input->get('category_id')==$cat_id) echo 'on';?>"><?php echo $cat_name;?></a>
    			    <?php endforeach;?>
				</div>
				<p class="wz_b"></p>
				<p class="b_rmo <?php if(count($category_arr)<14) echo 'hid';?>" id="">更多</p>
			</dd>
		</dl>
		
		<?php if ($brand_arr->num_rows()>0):?>
		<dl class="sdl">
			<dt>品牌</dt>
			<dd id="brand_dl" class="brand_dl">
				<div id="list_b" class="over">
				    <?php foreach ($brand_arr->result() as $brand) :?>
					<a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'brand_id,brand_name').'&brand_id='.$brand->brand_id.'&brand_name='.$brand->brand_name);?>" class="<?php if($this->input->get('brand_id')==$brand->brand_id) echo 'on';?>"><?php echo $brand->brand_name;?></a>
					<?php endforeach;?>
				</div>
				<p class="wz_b"></p>
				<p class="b_rmo <?php if($brand_arr->num_rows()<14):?>hid<?php endif;?>" id="b_rmo">更多</p>
			</dd>
		</dl>
		<?php endif;?>
		
		<dl class="sdl">
			<dt>价格</dt>
			<dd>
			    <?php foreach ($price_arr as $key=>$price) :?>
			    <a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get(), 'price_range').'&price_range='.$key);?>" class="<?php if($this->input->get('price_range')==$key) echo 'on';?>"><?php echo $price;?></a>
			    <?php endforeach;?>
			</dd>
		</dl>
    </div>
	<?php endif;?>
	
	<div class="sxbox">
		<div class="ls_cat" id="ls_cat">
			<div class="w">
				<div class="left pl10">
					<form method="GET" class="sort"  name="listform">
					    <a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get()))?>" class="sb_a <?php if(empty($this->input->get('order'))) echo 'sb_on'?>">默认</a>
					    <a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get()).'&order=1')?>" class="sb_a <?php if($this->input->get('order')==1) echo 'sb_on'?>">最新上架</a>
					    <a href="<?php $order_price=($this->input->get('order')==4) ? 5 : 4;echo site_url('goods/search?'.create_suffix($this->input->get()).'&order='.$order_price)?>" class="sb_a <?php if($this->input->get('order')==4) echo 'sup';?> <?php if($this->input->get('order')==4 || $this->input->get('order')==5) echo 'sb_on'?>"><em class="pr10">价格</em><i class="rjg"></i></a>
					    <a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get()).'&order=2')?>" class="sb_a <?php if($this->input->get('order')==2) echo 'sb_on'?>">热销</a>
					    <a href="<?php echo site_url('goods/search?'.create_suffix($this->input->get()).'&order=3')?>" class="sb_a <?php if($this->input->get('order')==3) echo 'sb_on'?>">热门</a>
					</form>
				</div>
				<div class="prt right"> 
					<span class="left mr10"><?php echo $pg_now?>/<?php echo $all_pg;?></span>
					<?php if($pg_now==1) :?>
					<a class="pr_a p_off" href="javascript:;" title="已经是第一页了">上一页</a> 
					<?php else : ?>
					<a class="pr_a" href="<?php echo site_url('goods/search/'.($pg_now-1).'?'.create_suffix($this->input->get()));?>" >上一页</a> 
					<?php endif;?>
					<?php if($pg_now==$all_pg) :?>
					<a class="pr_a p_off" href="javascript:;" title="已经是最后一页了">下一页</a>
					<?php else :?>
					<a class="pr_a" href="<?php echo site_url('goods/search/'.($pg_now+1).'?'.create_suffix($this->input->get()));?>">下一页</a>
					<?php endif;?>
				</div>
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
