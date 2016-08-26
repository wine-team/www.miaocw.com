<?php $this->load->view('layout/header');?>
<div id="content" class="w goods-list">
   	<div class="s_tl">
   		<span class="left">
   			<a href="<?php echo $this->config->main_base_url?>">首页</a>
   			<code class="lr3">></code>
   			<a href="javascript:;">关键字</a><code class="lr3">></code>
   			<b class="lr3"> <?php echo $this->input->get('keyword');?> </b>
   		</span>	
		<ul class="left s_sx">
		    <?php if($this->input->get('category_id') && !empty($category_arr)) :?>
		      <li>
		          <a class="d_xx" title="分类" href="<?php echo site_url('Goods/search?'.create_suffix($this->input->get(), 'category_id'));?>">
		           分类：<?php echo $category_arr[$this->input->get('category_id')];?>
                  </a>
              </li>
		    <?php endif;?>
		    <?php if($this->input->get('brand_id')) :?>
		      <li>
		          <a class="d_xx" title="品牌" href="<?php echo site_url('Goods/search?'.create_suffix($this->input->get(), 'brand_id'));?>">
		          品牌：<?php echo $this->input->get('brand_name');?>
		          </a>
	          </li>
		    <?php endif;?>
		    <?php if($this->input->get('price_range')) :?>
		      <li>
    		      <a class="d_xx" title="价格" href="<?php echo site_url('Goods/search?'.create_suffix($this->input->get(), 'price_range'));?>">
    		 价格：<?php echo $this->input->get('price_range');?>
    		      </a>
		      </li>
		    <?php endif;?>
		    
            <li>
                <a class="d_xx" title="排序" href="<?php echo site_url('Goods/search?keyword='.$this->input->get('keyword'));?>">
                             排序：<?php echo empty($this->input->get('order')) ? '默认' : $order_arr[$this->input->get('order')];?>
    		    </a>
		    </li>
        </ul>
   		
   		<span class="right">共找<b class="c3"><?php echo $all_rows;?></b>件</span>
    </div>
    
    <?php if(count($page_list) > 0) :?>
    <div class="scat over">
		<dl class="sdl sfst">
			<dt><b class="red">分类</b></dt> 
			<dd id="" class="brand_dl">
				<div id="list_b" class="over">
				    <?php foreach ($category_arr as $cat_id=>$cat_name) : ?>
    				<a href="<?php echo site_url('Goods/search?'.create_suffix($this->input->get(), 'category_id').'&category_id='.$cat_id);?>" class="<?php if($this->input->get('category_id')==$cat_id) echo 'on';?>"><?php echo $cat_name;?></a>
    			    <?php endforeach;?>
				</div>
				<p class="wz_b"></p>
				<p class="b_rmo <?php if(count($category_arr)<14) echo 'hid';?>" id="">更多</p>
			</dd>
		</dl>
		<dl class="sdl">
			<dt>品牌</dt>
			<dd id="brand_dl" class="brand_dl">
				<div id="list_b" class="over">
				    <?php foreach ($brand_arr as $brand) :?>
					<a href="<?php echo site_url('Goods/search?'.create_suffix($this->input->get(), 'brand_id,brand_name').'&brand_id='.$brand->brand_id.'&brand_name='.$brand->brand_name);?>" class="<?php if($this->input->get('brand_id')==$brand->brand_id) echo 'on';?>"><?php echo $brand->brand_name;?></a>
					<?php endforeach;?>
				</div>
				<p class="wz_b"></p>
				<p class="b_rmo <?php if(count($brand_arr)<14) echo 'hid';?>" id="b_rmo">更多</p>
			</dd>
		</dl>
		<dl class="sdl">
			<dt>价格</dt>
			<dd>
			    <?php foreach ($price_arr as $price) :?>
			    <a href="<?php echo site_url('Goods/search?'.create_suffix($this->input->get(), 'price_range').'&price_range='.$price);?>" class="<?php if($this->input->get('price_range')==$price) echo 'on';?>"><?php echo $price;?></a>
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
					    <a href="<?php echo site_url('Goods/search?'.create_suffix($this->input->get()))?>" class="sb_a <?php if(empty($this->input->get('order'))) echo 'sb_on'?>">默认</a>
					    <a href="<?php echo site_url('Goods/search?'.create_suffix($this->input->get()).'&order=goods_id')?>" class="sb_a <?php if($this->input->get('order')=='goods_id') echo 'sb_on'?>">最新上架</a>
					    <a href="<?php $order_price=($this->input->get('order')=='price_asc') ? 'price_desc' : 'price_asc';echo site_url('Goods/search?'.create_suffix($this->input->get()).'&order='.$order_price)?>" class="sb_a <?php if($this->input->get('order')=='price_asc') echo 'sup';?> <?php if($this->input->get('order')=='price_asc' || $this->input->get('order')=='price_desc') echo 'sb_on'?>"><em class="pr10">价格</em><i class="rjg"></i></a>
					    <a href="<?php echo site_url('Goods/search?'.create_suffix($this->input->get()).'&order=sale_count')?>" class="sb_a <?php if($this->input->get('order')=='sale_count') echo 'sb_on'?>">热销</a>
					    <a href="<?php echo site_url('Goods/search?'.create_suffix($this->input->get()).'&order=tour_count')?>" class="sb_a <?php if($this->input->get('order')=='tour_count') echo 'sb_on'?>">热门</a>
					</form>
				</div>
				<div class="prt right"> 
					<span class="left mr10"><?php echo $pg_now?>/<?php echo $all_pg;?></span>
					<?php if($pg_now==1) :?>
					<a class="pr_a p_off" href="javascript:;" title="已经是第一页了">上一页</a> 
					<?php else : ?>
					<a class="pr_a" href="<?php echo site_url('Goods/search/'.($pg_now-1).'?'.create_suffix($this->input->get()));?>" >上一页</a> 
					<?php endif;?>
					<?php if($pg_now==$all_pg) :?>
					<a class="pr_a p_off" href="javascript:;" title="已经是最后一页了">下一页</a>
					<?php else :?>
					<a class="pr_a" href="<?php echo site_url('Goods/search/'.($pg_now+1).'?'.create_suffix($this->input->get()));?>">下一页</a>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	<div class="gdls" id="gdls">
	    <?php foreach ($page_list as $goods) :?>
		<dl class="gl">
			<dt><?php $img_arr=explode('|',$goods->goods_img);?>
				<a href="<?php echo site_url('Goods/detail?goods_id='.$goods->goods_id);?>" target="_blank">
					<img src="miaow/images/load.jpg" data-original="<?php echo $this->config->show_image_url('mall',$img_arr[0]);?>" width="270" height="270" class="sbm lazy" alt="<?php echo $goods->goods_brief;?>" />
				</a>
			</dt>
			<dd class="simg">
			    <?php foreach($img_arr as $img) :?>
			    <?php if(!empty($img)) : ?>
				<img class="lazy" src="miaow/images/load.jpg" width="30" height="30" data-s="<?php echo $this->config->show_image_thumb_url('mall',$img);?>"/>
			    <?php endif;?>
			    <?php endforeach;?>
			</dd>
			<dd class="mb10">
				<a href="<?php echo site_url('Goods/detail?goods_id='.$goods->goods_id);?>" class="gna" title="<?php echo $goods->goods_name;?>" target="_blank"><?php echo $goods->goods_name;?></a>
				<a href="<?php echo site_url('Goods/detail?goods_id='.$goods->goods_id);?>" class="gna c9" title="<?php echo $goods->goods_brief;?>" target="_blank"><?php echo $goods->goods_brief;?></a>
			</dd>
			<dd>
				<em class="i_hot">热销</em>
				<i class="rmb">¥</i>
				<b class="xj"><?php echo $goods->promote_price;?></b>
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
    <div class="ftj mt35">
		<b class="bl_red">热门推荐:</b>
		<a href="/topic/zengda/">阴茎增大</a><em class="vline">|</em>
		<a href="/topic/feijibei/">飞机杯专场</a><em class="vline">|</em>
		<a href="/topic/nvyoumingqi/">AV女优盛宴</a><em class="vline">|</em>
		<a href="/topic/ximilu/">实体娃娃</a><em class="vline">|</em>
		<a href="/topic/gdzt/">高端情趣用品</a><em class="vline">|</em>
		<a href="/topic/yanshi/">延长性爱时间</a><em class="vline">|</em>
		<a href="/topic/jnxzw/">女性自慰神器</a><em class="vline">|</em>
		<a href="/topic/rexiao/">成人用品热卖</a>
	</div>
	<div class="b_li">
		<a href="javascript:;" class="dn_a" target="_blank">
			<img src="http://s.qw.cc/images/201503/goods_img/5076_P_1426578924869-270x270.jpg" width="270" height="270" class="sbm" />
			<div class="h250">
				<p class="OverH">德国FunFactory神鬼战士左鹰深度抽插按摩棒</p>
				<p><b class="red f14">¥1610.00</b><del class="ml10">¥3299.00</del></p>
				<p class="c9">销量 <em class="c_zon">1753</em>笔 | 评价 <em class="c_blue">53</em></p>
			</div>
		</a>
		<a href="javascript:;" class="dn_a" target="_blank">
			<img src="http://s.qw.cc/images/201511/goods_img/6002_P_1446719027726-270x270.jpg" width="270" height="270" class="sbm" />
			<div class="h250">
				<p class="OverH">香港简爱定海神针智能恒温高潮冲击棒</p>
				<p><b class="red f14">¥338.00</b><del class="ml10">¥439.40</del></p>
				<p class="c9">销量 <em class="c_zon">4212</em>笔 | 评价 <em class="c_blue">57</em></p>
			</div>
		</a>
		<a href="goods-8926.html" class="dn_a" target="_blank">
			<img src="http://s.qw.cc/images/201601/goods_img/8926_P_1452499709527-270x270.jpg" width="270" height="270" class="sbm">
			<div class="h250">
				<p class="OverH">惹火猫 加温震动充电静音防水AV棒</p>
				<p><b class="red f14">¥298.00</b><del class="ml10">¥387.40</del></p>
				<p class="c9">销量 <em class="c_zon">1690</em>笔 | 评价 <em class="c_blue">66</em></p>
			</div>
		</a>
		<a href="goods-5510.html" class="dn_a" target="_blank">
			<img src="http://s.qw.cc/images/201602/goods_img/5510_P_1456297733634-270x270.jpg" width="270" height="270" class="sbm">
			<div class="h250">
				<p class="OverH">法国乐慕L-AMOUROSE加温G点震动棒</p>
				<p><b class="red f14">¥1680.00</b><del class="ml10">¥3399.00</del></p>
				<p class="c9">销量 <em class="c_zon">1191</em>笔 | 评价 <em class="c_blue">21</em></p>
			</div>
		</a>
	</div>	
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
