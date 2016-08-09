<?php $this->load->view('layout/header');?>
<div id="content" class="w goods-list">
   	<div class="s_tl">
   		<span class="left">
   			<a href="<?php echo $this->config->main_base_url?>">首页</a>
   			<code class="lr3">></code>
   			<a href="javascript:;">商品搜索  _</a>
   			<b class="lr3"><?php echo $this->input->get('keyword');?></b>
   		</span>
   		<span class="right">共找<b class="c3"><?php echo $all_rows;?></b>件</span>
    </div>
	
	<div class="sxbox">
		<div class="ls_cat" id="ls_cat">
			<div class="w">
				<div class="left pl10">
					<form method="GET" class="sort"  name="listform">
					    <a href="<?php echo site_url('Goods/search?keyword='.$this->input->get('keyword'))?>" class="sb_a <?php if(empty($this->input->get('order_price')) && empty($this->input->get('order'))) echo 'sb_on'?>">默认</a>
					    <a href="<?php echo site_url('Goods/search?order=goods_id&keyword='.$this->input->get('keyword'))?>" class="sb_a <?php if($this->input->get('order')=='goods_id') echo 'sb_on'?>">最新上架</a>
					    <a href="<?php $o_price=$this->input->get('order_price');$order_price=($o_price=='ASC') ? 'DESC' : 'ASC';echo site_url('Goods/search?order_price='.$order_price.'&keyword='.$this->input->get('keyword'))?>" class="sb_a <?php if($this->input->get('order_price')=='ASC') echo 'sup';?> <?php if($this->input->get('order_price')) echo 'sb_on'?>"><em class="pr10">价格</em><i class="rjg"></i></a>
					    <a href="<?php echo site_url('Goods/search?order=sale_count&keyword='.$this->input->get('keyword'))?>" class="sb_a <?php if($this->input->get('order')=='sale_count') echo 'sb_on'?>">热销</a>
					    <a href="<?php echo site_url('Goods/search?order=tour_count&keyword='.$this->input->get('keyword'))?>" class="sb_a <?php if($this->input->get('order')=='tour_count') echo 'sb_on'?>">热门</a>
					</form>
				</div>
				<div class="prt right"> 
					<span class="left mr10"><?php echo $pg_now?>/<?php echo $all_pg;?></span>
					<?php if($pg_now==1) :?>
					<a class="pr_a p_off" href="javascript:;" title="已经是第一页了">上一页</a> 
					<?php else : ?>
					<a class="pr_a" href="" >上一页</a> 
					<?php endif;?>
					<?php if($pg_now==$all_pg) :?>
					<a class="pr_a p_off" href="javascript:;" title="已经是最后一页了">下一页</a>
					<?php else :?>
					<a class="pr_a" href="">下一页</a>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	<div class="gdls" id="gdls">
	    <?php foreach ($page_list as $goods) :?>
		<dl class="gl">
			<dt>
				<a href="javascript:;" target="_blank">
					<img src="http://s.qw.cc/images/201604/goods_img/8806_P_1459839060126-270x270.jpg" width="270" height="270" class="sbm" alt="逼真 时尚 超长仿真阳具" />
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201604/thumb_img2/8806_thumb_P60_1459839066302-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201604/source_img/8806_P_1459839060325-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/8806_thumb_P60_1456282671557-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/8806_P_1456282572597-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201604/thumb_img2/8806_thumb_P60_1459828835719-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201604/source_img/8806_P_1459828743003-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201604/thumb_img2/8806_thumb_P60_1459828835300-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201604/source_img/8806_P_1459828743923-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201604/thumb_img2/8806_thumb_P60_1459828835025-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201604/source_img/8806_P_1459828743554-270x270.jpg"/>
			</dd>
			<dd class="mb10">
				<a href="javascript:;" class="gna" title="COC罗马大帝超长多频仿真阳具" target="_blank">COC罗马大帝超长多频仿真阳具</a>
				<a href="./goods-8806.html" class="gna c9" title="逼真 时尚 超长仿真阳具" target="_blank">逼真 时尚 超长仿真阳具</a>
			</dd>
			<dd>
				<em class="i_hot">热销</em>
				<i class="rmb">¥</i>
				<b class="xj">198</b>
				<del>¥257.40</del>
			</dd>
			<dd class="mt5">销量 
				<em class="c_zon">13994</em>笔 | 评价 
				<em class="c_blue">92</em>
			</dd>
		</dl>
		<?php endforeach;?>
	</div>
	<div class="page" id="pager">
  		<span class="yemr">总计<b>46</b> 条记录</span>                     
  		<a href="javascript:;"class="on">1</a>
        <a href="woman/bizhen/b0-min0-max0-chara0-2-sort_order-DESC.html">2</a>
        <a href="woman/bizhen/b0-min0-max0-chara0-3-sort_order-DESC.html">3</a>
        <a href="woman/bizhen/b0-min0-max0-chara0-2-sort_order-DESC.html">下一页</a> 
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
