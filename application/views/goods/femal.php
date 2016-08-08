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
			<a class="h_pres" href="javascript:;">&lt;</a>
			<a class="h_nxts" href="javascript:;">&gt;</a>
		</div>
		<?php endif;?>
		<?php echo $cms_block['femal_head_recommend'];?>
	</div>	
	<div class="clear"></div>
	<?php if ($recommend->num_rows() > 0):?>
	<div class="over mt35 wbox" id="wbox">
		<div class="c_tt yahei">
			<em class="red fB">1F</em>
			<h1 class="dinl">女性用品</h1>推荐
			<em class="c9">MASTERPIECE</em>
		</div>
		<?php foreach ($recommend->result() as $item):?>
		<a href="<?php echo site_url('goods/detail?goods_id='.$item->goods_id);?>" class="dn_a" title="<?php echo $item->goods_name;?>">
			<img src = "<?php echo $this->config->show_image_url('mall',strstr($item->goods_img,'|',true));?>" width="270" height="270" class="sbm"/>
			<div class="h250">
				<p class="OverH"><?php echo $item->goods_name;?></p>
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
	    <a href="topic.php?topic_id=450" target="_blank">
	    	<img src = "http://s.qw.cc/data/afficheimg/1441780867067551921.jpg" width="1190" height="90">
	    </a>
	</div>
</div>
<div class="w" id="gdls">
	<div class="blt mt35">
		<div class="c_tt yahei">
			<em class="red fB">2F</em>
			<a href="woman/sdcj/" target="_blank">
				<h2 class="dinl c3">多点按摩棒</h2>
			</a>
			<i class="lwen" data-id="2">&nbsp;&nbsp;&nbsp;&nbsp;</i>&nbsp;
		</div>
		<a href="woman/sdcj/b0-min0-max0-chara217.html" class="bc_a" target="_blank">恒温设计</a>
		<a href="woman/sdcj/b0-min0-max0-chara218.html" class="bc_a" target="_blank">智能调频</a>
		<a href="woman/sdcj/b0-min0-max0-chara62.html" class="bc_a" target="_blank">多频震动</a>
		<a href="woman/sdcj/b0-min0-max0-chara64.html" class="bc_a" target="_blank">可充电</a>
		<a href="woman/sdcj/b0-min0-max0-chara63.html" class="bc_a" target="_blank">智能遥控</a>
		<a href="woman/sdcj/b0-min0-max0-chara230.html" class="bc_a" target="_blank">组合套装</a>
		<a href="woman/sdcj/b0-min0-max0-chara65.html" class="bc_a" target="_blank">超静音</a>
		<a href="woman/sdcj/b0-min0-max0-chara66.html" class="bc_a" target="_blank">防水</a>
		<a href="woman/sdcj/" class="gray cfr" target="_blank"></a>
		<div class="b_h4 hid">
			<!--
			电动按摩棒实现女性阴蒂G点同时高潮，电动设计带来更真实的性爱体验，仿真细滑材质。多点电动按摩棒是非常受欢迎的女性情趣用品，有仿真按摩棒型、电动按摩棒型等。趣网商城双点按摩棒型是正品品牌如LELO 倍力乐 香港雷霆 FunFactory等
			-->
		</div>
	</div>
	<div class="bdls">
		<dl class="gl">
			<dt>
				<a href="/goods-6017.html?ps=woman" target="_blank">
					<img src="http://s.qw.cc/images/201602/goods_img/6017_P_1456367705335-270x270.jpg" width="270" height="270" class="sbm">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201602/thumb_img2/6017_thumb_P60_1456367733135-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/6017_P_1456367705034-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201508/thumb_img2/6017_thumb_P60_1441018539983-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201508/source_img/6017_P_1441018512536-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201508/thumb_img2/6017_thumb_P60_1441018539383-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201508/source_img/6017_P_1441018512495-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201504/thumb_img2/6017_thumb_P60_1429779252365-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201504/source_img/6017_P_1429779243722-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201508/thumb_img2/6017_thumb_P60_1441018539672-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201508/source_img/6017_P_1439799862310-270x270.jpg"/>
			</dd>
			<dd class="mb5">
				<a href="/goods-6017.html" class="gna" title="香港简爱月亮之上自动抽插多频快感智能加温震动棒" target="_blank">香港简爱月亮之上自动抽插多频快感智能加温震动棒</a>
				<a href="./goods-6017.html" class="gna c9" title="智能恒温开启你的高潮模式！" target="_blank">智能恒温开启你的高潮模式！</a>
			</dd>
			<dd>
				<i class="rmb">¥</i>
				<b class="xj">368</b>
				<del>¥478.40</del>
			</dd>
			<dd class="mt5">销量 <em class="c_zon">9058</em>笔 | 评价 <em class="c_blue">142</em></dd>
		</dl>
		<dl class="gl">
			<dt>
				<a href="/goods-5245.html?ps=woman" target="_blank">
					<img src="http://s.qw.cc/images/201508/goods_img/5245_P_1441015166803-270x270.jpg" width="270" height="270" class="sbm">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201508/thumb_img2/5245_thumb_P60_1441015201574-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201508/source_img/5245_P_1441015166255-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201603/thumb_img2/5245_thumb_P60_1456795523439-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201603/source_img/5245_P_1456795497615-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201603/thumb_img2/5245_thumb_P60_1456795523953-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201603/source_img/5245_P_1456795497889-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201603/thumb_img2/5245_thumb_P60_1456795523070-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201603/source_img/5245_P_1456795497033-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201603/thumb_img2/5245_thumb_P60_1456795524731-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201603/source_img/5245_P_1456795497405-270x270.jpg"/>
			</dd>
			<dd class="mb5">
				<a href="/goods-5245.html" class="gna" title="倍力乐VIBMAX-G点抠动型女用震动棒" target="_blank">倍力乐VIBMAX-G点抠动型女用震动棒</a>
				<a href="./goods-5245.html" class="gna c9" title="扣动+震动+膨动 不潮吹都难！" target="_blank">扣动+震动+膨动 不潮吹都难！</a>
			</dd>
			<dd>
				<i class="rmb">¥</i>
				<b class="xj">299</b>
				<del>¥599.00</del>
			</dd>
			<dd class="mt5">销量 <em class="c_zon">1643</em>笔 | 评价 <em class="c_blue">119</em></dd>
		</dl>
		<dl class="gl">
			<dt>
				<a href="/goods-5055.html?ps=woman" target="_blank">
					<img src = "http://s.qw.cc/images/201602/goods_img/5055_P_1455846376821-270x270.jpg" width="270" height="270" class="sbm">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201602/thumb_img2/5055_thumb_P60_1455846394652-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/5055_P_1455846376370-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201508/thumb_img2/5055_thumb_P60_1441019851191-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201508/source_img/5055_P_1441008365091-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201506/thumb_img2/5055_thumb_P60_1434331359754-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201506/source_img/5055_P_1434331105923-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201506/thumb_img2/5055_thumb_P60_1434331359473-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201506/source_img/5055_P_1434331105209-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201506/thumb_img2/5055_thumb_P60_1434331359364-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201506/source_img/5055_P_1434331105593-270x270.jpg"/>
			</dd>
			<dd class="mb5">
				<a href="/goods-5055.html" class="gna" title="BaiLe玫瑰恋人G点按摩震动棒" target="_blank">BaiLe玫瑰恋人G点按摩震动棒</a>
				<a href="./goods-5055.html" class="gna c9" title="双点震撼，找回真高潮，还你快感！" target="_blank">双点震撼，找回真高潮，还你快感！</a>
			</dd>
			<dd>
				<i class="rmb">¥</i>
				<b class="xj">239</b>
				<del>¥310.70</del>
			</dd>
			<dd class="mt5">销量 <em class="c_zon">2317</em>笔 | 评价 <em class="c_blue">136</em></dd>
		</dl>
		<dl class="gl">
			<dt>
				<a href="/goods-3541.html?ps=woman" target="_blank">
					<img src="http://s.qw.cc/images/201510/goods_img/3541_P_1445592363397-270x270.jpg" width="270" height="270" class="sbm">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201511/thumb_img2/3541_thumb_P60_1446718941287-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/3541_P_1445592363634-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201510/thumb_img2/3541_thumb_P60_1445226252826-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201508/source_img/3541_P_1439863539242-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489787-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458625-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489118-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458039-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489246-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458575-270x270.jpg"/>
			</dd>
			<dd class="mb5">
				<a href="/goods-3541.html" class="gna" title="瑞典LELO-Soraya索瑞娅 全防水铂金涂层 双重震动 玫红色" target="_blank">瑞典LELO-Soraya索瑞娅 全防水铂金涂层 双重震动 玫红色</a>
				<a href="./goods-3541.html" class="gna c9" title="双重功能振动器,为你带来奢华的愉悦享受" target="_blank">双重功能振动器,为你带来奢华的愉悦享受</a>
			</dd>
			<dd>
				<i class="rmb">¥</i>
				<b class="xj">1480</b>
				<del>¥2072.00</del>
			</dd>
			<dd class="mt5">销量 <em class="c_zon">980</em>笔 | 评价 <em class="c_blue">31</em></dd>
		</dl>
		<dl class="gl">
			<dt>
				<a href="/goods-3541.html?ps=woman" target="_blank">
					<img src="http://s.qw.cc/images/201510/goods_img/3541_P_1445592363397-270x270.jpg" width="270" height="270" class="sbm">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201511/thumb_img2/3541_thumb_P60_1446718941287-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/3541_P_1445592363634-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201510/thumb_img2/3541_thumb_P60_1445226252826-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201508/source_img/3541_P_1439863539242-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489787-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458625-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489118-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458039-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489246-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458575-270x270.jpg"/>
			</dd>
			<dd class="mb5">
				<a href="/goods-3541.html" class="gna" title="瑞典LELO-Soraya索瑞娅 全防水铂金涂层 双重震动 玫红色" target="_blank">瑞典LELO-Soraya索瑞娅 全防水铂金涂层 双重震动 玫红色</a>
				<a href="./goods-3541.html" class="gna c9" title="双重功能振动器,为你带来奢华的愉悦享受" target="_blank">双重功能振动器,为你带来奢华的愉悦享受</a>
			</dd>
			<dd>
				<i class="rmb">¥</i>
				<b class="xj">1480</b>
				<del>¥2072.00</del>
			</dd>
			<dd class="mt5">销量 <em class="c_zon">980</em>笔 | 评价 <em class="c_blue">31</em></dd>
		</dl>
		<dl class="gl">
			<dt>
				<a href="/goods-3541.html?ps=woman" target="_blank">
					<img src="http://s.qw.cc/images/201510/goods_img/3541_P_1445592363397-270x270.jpg" width="270" height="270" class="sbm">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201511/thumb_img2/3541_thumb_P60_1446718941287-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/3541_P_1445592363634-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201510/thumb_img2/3541_thumb_P60_1445226252826-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201508/source_img/3541_P_1439863539242-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489787-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458625-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489118-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458039-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489246-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458575-270x270.jpg"/>
			</dd>
			<dd class="mb5">
				<a href="/goods-3541.html" class="gna" title="瑞典LELO-Soraya索瑞娅 全防水铂金涂层 双重震动 玫红色" target="_blank">瑞典LELO-Soraya索瑞娅 全防水铂金涂层 双重震动 玫红色</a>
				<a href="./goods-3541.html" class="gna c9" title="双重功能振动器,为你带来奢华的愉悦享受" target="_blank">双重功能振动器,为你带来奢华的愉悦享受</a>
			</dd>
			<dd>
				<i class="rmb">¥</i>
				<b class="xj">1480</b>
				<del>¥2072.00</del>
			</dd>
			<dd class="mt5">销量 <em class="c_zon">980</em>笔 | 评价 <em class="c_blue">31</em></dd>
		</dl>
		<dl class="gl">
			<dt>
				<a href="/goods-3541.html?ps=woman" target="_blank">
					<img src="http://s.qw.cc/images/201510/goods_img/3541_P_1445592363397-270x270.jpg" width="270" height="270" class="sbm">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201511/thumb_img2/3541_thumb_P60_1446718941287-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/3541_P_1445592363634-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201510/thumb_img2/3541_thumb_P60_1445226252826-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201508/source_img/3541_P_1439863539242-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489787-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458625-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489118-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458039-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489246-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458575-270x270.jpg"/>
			</dd>
			<dd class="mb5">
				<a href="/goods-3541.html" class="gna" title="瑞典LELO-Soraya索瑞娅 全防水铂金涂层 双重震动 玫红色" target="_blank">瑞典LELO-Soraya索瑞娅 全防水铂金涂层 双重震动 玫红色</a>
				<a href="./goods-3541.html" class="gna c9" title="双重功能振动器,为你带来奢华的愉悦享受" target="_blank">双重功能振动器,为你带来奢华的愉悦享受</a>
			</dd>
			<dd>
				<i class="rmb">¥</i>
				<b class="xj">1480</b>
				<del>¥2072.00</del>
			</dd>
			<dd class="mt5">销量 <em class="c_zon">980</em>笔 | 评价 <em class="c_blue">31</em></dd>
		</dl>
		<dl class="gl">
			<dt>
				<a href="/goods-3541.html?ps=woman" target="_blank">
					<img src="http://s.qw.cc/images/201510/goods_img/3541_P_1445592363397-270x270.jpg" width="270" height="270" class="sbm">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201511/thumb_img2/3541_thumb_P60_1446718941287-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/3541_P_1445592363634-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201510/thumb_img2/3541_thumb_P60_1445226252826-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201508/source_img/3541_P_1439863539242-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489787-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458625-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489118-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458039-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489246-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458575-270x270.jpg"/>
			</dd>
			<dd class="mb5">
				<a href="/goods-3541.html" class="gna" title="瑞典LELO-Soraya索瑞娅 全防水铂金涂层 双重震动 玫红色" target="_blank">瑞典LELO-Soraya索瑞娅 全防水铂金涂层 双重震动 玫红色</a>
				<a href="./goods-3541.html" class="gna c9" title="双重功能振动器,为你带来奢华的愉悦享受" target="_blank">双重功能振动器,为你带来奢华的愉悦享受</a>
			</dd>
			<dd>
				<i class="rmb">¥</i>
				<b class="xj">1480</b>
				<del>¥2072.00</del>
			</dd>
			<dd class="mt5">销量 <em class="c_zon">980</em>笔 | 评价 <em class="c_blue">31</em></dd>
		</dl>
		<dl class="gl">
			<dt>
				<a href="/goods-3541.html?ps=woman" target="_blank">
					<img src="http://s.qw.cc/images/201510/goods_img/3541_P_1445592363397-270x270.jpg" width="270" height="270" class="sbm">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201511/thumb_img2/3541_thumb_P60_1446718941287-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/3541_P_1445592363634-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201510/thumb_img2/3541_thumb_P60_1445226252826-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201508/source_img/3541_P_1439863539242-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489787-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458625-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489118-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458039-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201602/thumb_img2/3541_thumb_P60_1455787489246-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201602/source_img/3541_P_1455787458575-270x270.jpg"/>
			</dd>
			<dd class="mb5">
				<a href="/goods-3541.html" class="gna" title="瑞典LELO-Soraya索瑞娅 全防水铂金涂层 双重震动 玫红色" target="_blank">瑞典LELO-Soraya索瑞娅 全防水铂金涂层 双重震动 玫红色</a>
				<a href="./goods-3541.html" class="gna c9" title="双重功能振动器,为你带来奢华的愉悦享受" target="_blank">双重功能振动器,为你带来奢华的愉悦享受</a>
			</dd>
			<dd>
				<i class="rmb">¥</i>
				<b class="xj">1480</b>
				<del>¥2072.00</del>
			</dd>
			<dd class="mt5">销量 <em class="c_zon">980</em>笔 | 评价 <em class="c_blue">31</em></dd>
		</dl>
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