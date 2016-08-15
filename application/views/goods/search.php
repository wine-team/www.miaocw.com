<?php $this->load->view('layout/header');?>
<div id="content" class="w goods-list">
   	<div class="s_tl">
   		<span class="left">
   			<a href="<?php echo $this->config->main_base_url?>">首页</a>
   			<code class="lr3">></code>
   			<a href="javascript:;">关键字</a><code class="lr3">></code>
   			<b class="lr3">“ <?php echo $this->input->get('keyword');?> ”</b>
   		</span>	
		<ul class="left s_sx">
            <li><a class="d_xx" title="排序" href="<?php echo site_url('Goods/search?keyword='.$this->input->get('keyword'));?>">排序：
            <?php 
    		if($this->input->get('order')) echo $order_arr[$this->input->get('order')];
    		$o_price=$this->input->get('order_price');
    		if($o_price=='ASC')echo '价格从低到高';
    		if($o_price=='DESC')echo '价格从高到低';
    		if(empty($this->input->get('order')) && empty($o_price)) echo '默认';
    		?>
		    </a></li>
        </ul>
   		
   		<span class="right">共找<b class="c3"><?php echo $all_rows;?></b>件</span>
    </div>
	
	<div class="sxbox">
		<div class="ls_cat" id="ls_cat">
			<div class="w">
				<div class="left pl10">
					<form method="GET" class="sort"  name="listform">
					    <a href="<?php echo site_url('Goods/search?keyword='.$this->input->get('keyword'))?>" class="sb_a <?php if(empty($this->input->get('order_price')) && empty($this->input->get('order'))) echo 'sb_on'?>">默认</a>
					    <a href="<?php echo site_url('Goods/search?order=goods_id&keyword='.$this->input->get('keyword'))?>" class="sb_a <?php if($this->input->get('order')=='goods_id') echo 'sb_on'?>">最新上架</a>
					    <a href="<?php $order_price=($o_price=='ASC') ? 'DESC' : 'ASC';echo site_url('Goods/search?order_price='.$order_price.'&keyword='.$this->input->get('keyword'))?>" class="sb_a <?php if($this->input->get('order_price')=='ASC') echo 'sup';?> <?php if($this->input->get('order_price')) echo 'sb_on'?>"><em class="pr10">价格</em><i class="rjg"></i></a>
					    <a href="<?php echo site_url('Goods/search?order=sale_count&keyword='.$this->input->get('keyword'))?>" class="sb_a <?php if($this->input->get('order')=='sale_count') echo 'sb_on'?>">热销</a>
					    <a href="<?php echo site_url('Goods/search?order=tour_count&keyword='.$this->input->get('keyword'))?>" class="sb_a <?php if($this->input->get('order')=='tour_count') echo 'sb_on'?>">热门</a>
					</form>
				</div>
				<div class="prt right"> 
					<span class="left mr10"><?php echo $pg_now?>/<?php echo $all_pg;?></span>
					<?php if($pg_now==1) :?>
					<a class="pr_a p_off" href="javascript:;" title="已经是第一页了">上一页</a> 
					<?php else : ?>
					<a class="pr_a" href="<?php echo site_url('Goods/search/'.($pg_now-1).'?keyword='.$this->input->get('keyword').'&order='.$this->input->get('order').'&order_price='.$this->input->get('order_price'));?>" >上一页</a> 
					<?php endif;?>
					<?php if($pg_now==$all_pg) :?>
					<a class="pr_a p_off" href="javascript:;" title="已经是最后一页了">下一页</a>
					<?php else :?>
					<a class="pr_a" href="<?php echo site_url('Goods/search/'.($pg_now+1).'?keyword='.$this->input->get('keyword').'&order='.$this->input->get('order').'&order_price='.$this->input->get('order_price'));?>">下一页</a>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	<div class="gdls" id="gdls">
	    <?php foreach ($page_list as $goods) :?>
		<dl class="gl">
			<dt><?php $img_arr=explode('|',$goods->goods_img);?>
				<a href="<?php echo $goods->goods_id;?>" target="_blank">
					<img src="<?php echo $this->config->show_image_url('mall',$img_arr[0]);?>" width="270" height="270" class="sbm" alt="<?php echo $goods->goods_brief;?>" />
				</a>
			</dt>
			<dd class="simg">
			    <?php foreach($img_arr as $img) :?>
				<img src="<?php echo $this->config->show_image_thumb_url('mall',$img,60);?>" width="30" height="30" data-s="<?php echo $this->config->show_image_thumb_url('mall',$img);?>"/>
			    <?php endforeach;?>
			</dd>
			<dd class="mb10">
				<a href="<?php echo $goods->goods_id;?>" class="gna" title="<?php echo $goods->goods_name;?>" target="_blank"><?php echo $goods->goods_name;?></a>
				<a href="<?php echo $goods->goods_id;?>" class="gna c9" title="<?php echo $goods->goods_brief;?>" target="_blank"><?php echo $goods->goods_brief;?></a>
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
