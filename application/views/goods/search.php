<?php $this->load->view('layout/header');?>
<div id="content" class="w goods-list">
   	<div class="s_tl">
   		<span class="left">
   			<a href="/">首页</a>
   			<code class="lr3">></code>
   			<a href="woman/">女性用品</a>
   			<code class="lr3">></code>
   		</span>
   		<ul class="left s_sx">
   			<li>
   				<a class="d_xx" href="javascript:;" title="点击回到女性用品首页">分类：仿真阳具</a>
   			</li>
   		</ul>
   		<span class="right">共找<b class="c3">46</b>件</span>
    </div>
	<div class="scat over">
		<dl class="sdl sfst">
			<dt><b class="red">分类</b></dt> 
			<dd>
				<a href="woman/sdcj/" >多点按摩棒</a>
				<a href="woman/bizhen/" class="on">仿真阳具</a>
				<a href="woman/zhuanzhu/" >转珠棒</a>
				<a href="woman/gdian/" >G点震动棒</a>
				<a href="woman/aidejiqi/" >性爱机器</a>
				<a href="woman/tiaodan/" >跳蛋</a>
				<a href="woman/mmsq/" >情欲提升</a>
				<a href="woman/avb/" >AV震动棒</a>
				<a href="woman/xbcj/" >双乳刺激</a>
				<a href="woman/houting/" >后庭拉珠</a>
				<a href="woman/cqrenou/" >充气男人</a>
				<a href="woman/sichu/" >私处挑逗</a>
			</dd>
		</dl>
		<dl class="sdl">
			<dt>品牌</dt>
			<dd id="brand_dl" class="brand_dl">
				<div id="list_b" class="over">
					<a href="woman/bizhen/b29-min0-max0-chara0.html" >爱侣情趣用品</a>
					<a href="woman/bizhen/b65-min0-max0-chara0.html" >兆邦NMC</a>
					<a href="woman/bizhen/b64-min0-max0-chara0.html" >积之美</a>
					<a href="woman/bizhen/b59-min0-max0-chara0.html" >百乐情趣用品</a>
					<a href="woman/bizhen/b461-min0-max0-chara0.html" >COC</a>
					<a href="woman/bizhen/b83-min0-max0-chara0.html" >CEN</a>
					<a href="woman/bizhen/b347-min0-max0-chara0.html" >简爱</a>
					<a href="woman/bizhen/b243-min0-max0-chara0.html" >乐透 Leco</a>
					<a href="woman/bizhen/b239-min0-max0-chara0.html" >PE</a>
					<a href="woman/bizhen/b264-min0-max0-chara0.html" >奇乐园Q-LUV-U</a>
					<a href="woman/bizhen/b258-min0-max0-chara0.html" >Lovetoy</a>
					<a href="woman/bizhen/b207-min0-max0-chara0.html" >蒂贝</a>
					<a href="woman/bizhen/b287-min0-max0-chara0.html" >幸色</a>
					<a href="woman/bizhen/b234-min0-max0-chara0.html" >爱世界</a>
					<a href="woman/bizhen/b41-min0-max0-chara0.html" >日暮里NPG名器</a>
				</div>
				<p class="wz_b"></p>
				<p class="b_rmo hid" id="b_rmo">更多</p>
			</dd>
		</dl>
		<dl class="sdl">
			<dt>特点</dt>
			<dd>
				<a href="woman/bizhen/b0-min0-max0-chara74.html" >自动抽插</a>
				<a href="woman/bizhen/b0-min0-max0-chara75.html" >超强震动</a>
				<a href="woman/bizhen/b0-min0-max0-chara72.html" >大小适中</a>
				<a href="woman/bizhen/b0-min0-max0-chara73.html" >大号款</a>
				<a href="woman/bizhen/b0-min0-max0-chara78.html" >可穿戴</a>
				<a href="woman/bizhen/b0-min0-max0-chara77.html" >支持旋转</a>
				<a href="woman/bizhen/b0-min0-max0-chara215.html" >小号款</a>
				<a href="woman/bizhen/b0-min0-max0-chara76.html" >可射精</a>
			</dd>
		</dl>
		<dl class="sdl">
			<dt>价格</dt>
			<dd>
				<a href="woman/bizhen/b0-min100-max900-chara0.html" >100&nbsp;-&nbsp;900</a>
				<a href="woman/bizhen/b0-min900-max1700-chara0.html" >900&nbsp;-&nbsp;1700</a>
				<a href="woman/bizhen/b0-min1700-max2500-chara0.html" >1700&nbsp;-&nbsp;2500</a>
				<a href="woman/bizhen/b0-min3300-max4100-chara0.html" >3300&nbsp;-&nbsp;4100</a>
			</dd>
		</dl>
	</div>
	<div class="sxbox">
		<div class="ls_cat" id="ls_cat">
			<div class="w">
				<div class="left pl10">
					<form method="GET" class="sort"  name="listform">
					    <a href="javascript:;" class="sb_a sb_on">默认</a>
					    <a href="javascript:;" class="sb_a">最新上架</a>
					    <a href="javascript:;" class="sb_a"><em class="pr10">价格</em><i class="rjg"></i></a>
					    <a href="javascript:;" class="sb_a">热销</a>
					    <label class="ls_lab">
					    	<a href="javascript:;" class="c9">
					    		<input type="checkbox" value="0" name="discount"  class="mr5">抢购
					    	</a>
					    </label>
					    <label class="ls_lab">
					    	<a href="javascript:;" class="c9">
					    		<input type="checkbox" value="0" name="video"  class="mr5">有视频
					    	</a>
					    </label>
					</form>
				</div>
				<form class="left over sesh" onsubmit="return scheck(this)" method="get" action="/search.php">
					<input type="text" value="" class="sefl left" autocomplete="off" name="keywords">
					<input type="submit" value="搜索" title="搜索" class="sefr right">
				</form>
				<div class="prt right"> 
					<span class="left mr10">1/3</span>
					<a class="pr_a p_off" href="javascript:;" title="已经是第一页了">上一页</a> 
					<a class="pr_a" href="javascript:;">下一页</a>
				</div>
			</div>
		</div>
	</div>
	<div class="gdls" id="gdls">
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
		<dl class="gl">
			<dt>
				<a href="./goods-5520.html?ps=woman/bizhen" target="_blank">
					<img src="http://s.qw.cc/images/201511/goods_img/5520_P_1446535221453-270x270.jpg" width="270" height="270" class="sbm" alt="脉冲抽插设计，模拟真人性爱动作！">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201511/thumb_img2/5520_thumb_P60_1446718955508-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201511/source_img/5520_P_1446535221880-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201510/thumb_img2/5520_thumb_P60_1445226313697-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5520_P_1445224768718-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201509/thumb_img2/5520_thumb_P60_1443509708572-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201508/source_img/5520_P_1441017948824-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201505/thumb_img2/5520_thumb_P60_1430711711929-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201505/source_img/5520_P_1430711652511-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201505/thumb_img2/5520_thumb_P60_1430711711780-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201505/source_img/5520_P_1430711652229-270x270.jpg"/>
			</dd>
			<dd class="mb10">
				<a href="./goods-5520.html" class="gna" title="奇乐圆Q-LUV-U无线遥控自动抽插电动仿真阳具" target="_blank">奇乐圆Q-LUV-U无线遥控自动抽插电动仿真阳具</a>
				<a href="./goods-5520.html" class="gna c9" title="脉冲抽插设计，模拟真人性爱动作！" target="_blank">脉冲抽插设计，模拟真人性爱动作！</a>
			</dd>
			<dd>
				<em class="i_hot">热销</em>
				<i class="rmb">¥</i>
				<b class="xj">329</b>
				<del>¥688.00</del>
			</dd>
			<dd class="mt5">
				销量 <em class="c_zon">8265</em>笔 | 评价 
				<em class="c_blue">141</em>
			</dd>
		</dl>
		<dl class="gl">
			<dt>
				<a href="./goods-5842.html?ps=woman/bizhen" target="_blank">
					<img src="http://s.qw.cc/images/201510/goods_img/5842_P_1445821592758-270x270.jpg" width="270" height="270" class="sbm" alt="仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040702-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592087-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040979-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592758-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040567-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592383-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201510/thumb_img2/5842_thumb_P60_1445493552745-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201504/source_img/5842_P_1429874993228-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201512/thumb_img2/5842_thumb_P60_1448951733147-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201511/source_img/5842_P_1448597552429-270x270.jpg"/>
			</dd>
			<dd class="mb10">
				<a href="./goods-5842.html" class="gna" title="COC斯巴达之矛高端震动仿真阳具" target="_blank">COC斯巴达之矛高端震动仿真阳具</a>
				<a href="./goods-5842.html" class="gna c9" title="仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！" target="_blank">仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！</a>
			</dd>
			<dd>
				<em class="i_hot">热销</em>
				<i class="rmb">¥</i>
				<b class="xj">1380</b>
				<del>¥2799.00</del>
			</dd>
			<dd class="mt5">
				销量 <em class="c_zon">3843</em>
				笔 | 评价 <em class="c_blue">169</em>
			</dd>
		</dl>
		<dl class="gl">
			<dt>
				<a href="./goods-5842.html?ps=woman/bizhen" target="_blank">
					<img src="http://s.qw.cc/images/201510/goods_img/5842_P_1445821592758-270x270.jpg" width="270" height="270" class="sbm" alt="仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040702-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592087-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040979-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592758-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040567-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592383-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201510/thumb_img2/5842_thumb_P60_1445493552745-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201504/source_img/5842_P_1429874993228-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201512/thumb_img2/5842_thumb_P60_1448951733147-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201511/source_img/5842_P_1448597552429-270x270.jpg"/>
			</dd>
			<dd class="mb10">
				<a href="./goods-5842.html" class="gna" title="COC斯巴达之矛高端震动仿真阳具" target="_blank">COC斯巴达之矛高端震动仿真阳具</a>
				<a href="./goods-5842.html" class="gna c9" title="仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！" target="_blank">仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！</a>
			</dd>
			<dd>
				<em class="i_hot">热销</em>
				<i class="rmb">¥</i>
				<b class="xj">1380</b>
				<del>¥2799.00</del>
			</dd>
			<dd class="mt5">
				销量 <em class="c_zon">3843</em>
				笔 | 评价 <em class="c_blue">169</em>
			</dd>
		</dl>
		<dl class="gl">
			<dt>
				<a href="./goods-5842.html?ps=woman/bizhen" target="_blank">
					<img src="http://s.qw.cc/images/201510/goods_img/5842_P_1445821592758-270x270.jpg" width="270" height="270" class="sbm" alt="仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040702-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592087-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040979-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592758-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040567-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592383-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201510/thumb_img2/5842_thumb_P60_1445493552745-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201504/source_img/5842_P_1429874993228-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201512/thumb_img2/5842_thumb_P60_1448951733147-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201511/source_img/5842_P_1448597552429-270x270.jpg"/>
			</dd>
			<dd class="mb10">
				<a href="./goods-5842.html" class="gna" title="COC斯巴达之矛高端震动仿真阳具" target="_blank">COC斯巴达之矛高端震动仿真阳具</a>
				<a href="./goods-5842.html" class="gna c9" title="仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！" target="_blank">仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！</a>
			</dd>
			<dd>
				<em class="i_hot">热销</em>
				<i class="rmb">¥</i>
				<b class="xj">1380</b>
				<del>¥2799.00</del>
			</dd>
			<dd class="mt5">
				销量 <em class="c_zon">3843</em>
				笔 | 评价 <em class="c_blue">169</em>
			</dd>
		</dl>
		<dl class="gl">
			<dt>
				<a href="./goods-5842.html?ps=woman/bizhen" target="_blank">
					<img src="http://s.qw.cc/images/201510/goods_img/5842_P_1445821592758-270x270.jpg" width="270" height="270" class="sbm" alt="仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040702-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592087-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040979-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592758-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040567-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592383-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201510/thumb_img2/5842_thumb_P60_1445493552745-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201504/source_img/5842_P_1429874993228-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201512/thumb_img2/5842_thumb_P60_1448951733147-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201511/source_img/5842_P_1448597552429-270x270.jpg"/>
			</dd>
			<dd class="mb10">
				<a href="./goods-5842.html" class="gna" title="COC斯巴达之矛高端震动仿真阳具" target="_blank">COC斯巴达之矛高端震动仿真阳具</a>
				<a href="./goods-5842.html" class="gna c9" title="仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！" target="_blank">仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！</a>
			</dd>
			<dd>
				<em class="i_hot">热销</em>
				<i class="rmb">¥</i>
				<b class="xj">1380</b>
				<del>¥2799.00</del>
			</dd>
			<dd class="mt5">
				销量 <em class="c_zon">3843</em>
				笔 | 评价 <em class="c_blue">169</em>
			</dd>
		</dl>
		<dl class="gl">
			<dt>
				<a href="./goods-5842.html?ps=woman/bizhen" target="_blank">
					<img src="http://s.qw.cc/images/201510/goods_img/5842_P_1445821592758-270x270.jpg" width="270" height="270" class="sbm" alt="仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040702-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592087-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040979-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592758-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040567-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592383-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201510/thumb_img2/5842_thumb_P60_1445493552745-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201504/source_img/5842_P_1429874993228-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201512/thumb_img2/5842_thumb_P60_1448951733147-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201511/source_img/5842_P_1448597552429-270x270.jpg"/>
			</dd>
			<dd class="mb10">
				<a href="./goods-5842.html" class="gna" title="COC斯巴达之矛高端震动仿真阳具" target="_blank">COC斯巴达之矛高端震动仿真阳具</a>
				<a href="./goods-5842.html" class="gna c9" title="仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！" target="_blank">仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！</a>
			</dd>
			<dd>
				<em class="i_hot">热销</em>
				<i class="rmb">¥</i>
				<b class="xj">1380</b>
				<del>¥2799.00</del>
			</dd>
			<dd class="mt5">
				销量 <em class="c_zon">3843</em>
				笔 | 评价 <em class="c_blue">169</em>
			</dd>
		</dl>
		<dl class="gl">
			<dt>
				<a href="./goods-5842.html?ps=woman/bizhen" target="_blank">
					<img src="http://s.qw.cc/images/201510/goods_img/5842_P_1445821592758-270x270.jpg" width="270" height="270" class="sbm" alt="仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！">
				</a>
			</dt>
			<dd class="simg">
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040702-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592087-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040979-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592758-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201511/thumb_img2/5842_thumb_P60_1446710040567-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201510/source_img/5842_P_1445821592383-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201510/thumb_img2/5842_thumb_P60_1445493552745-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201504/source_img/5842_P_1429874993228-270x270.jpg"/>
				<img src="http://s.qw.cc/images/201512/thumb_img2/5842_thumb_P60_1448951733147-30x30.jpg" width="30" height="30" data-s="http://s.qw.cc/images/201511/source_img/5842_P_1448597552429-270x270.jpg"/>
			</dd>
			<dd class="mb10">
				<a href="./goods-5842.html" class="gna" title="COC斯巴达之矛高端震动仿真阳具" target="_blank">COC斯巴达之矛高端震动仿真阳具</a>
				<a href="./goods-5842.html" class="gna c9" title="仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！" target="_blank">仿真阳具巅峰之作，这款不用带安全套的阳具，让你尽情享受南欧猛男的冲击力！</a>
			</dd>
			<dd>
				<em class="i_hot">热销</em>
				<i class="rmb">¥</i>
				<b class="xj">1380</b>
				<del>¥2799.00</del>
			</dd>
			<dd class="mt5">
				销量 <em class="c_zon">3843</em>
				笔 | 评价 <em class="c_blue">169</em>
			</dd>
		</dl>
		<dl class="gl">
			<dt>
				<a href="javascript:;" target="_blank">
					<img src="http://s.qw.cc/images/201604/goods_img/8806_P_1459839060126-270x270.jpg" width="270" height="270" class="sbm" alt="逼真 时尚 超长仿真阳具">
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
		<dl class="gl">
			<dt>
				<a href="javascript:;" target="_blank">
					<img src="http://s.qw.cc/images/201604/goods_img/8806_P_1459839060126-270x270.jpg" width="270" height="270" class="sbm" alt="逼真 时尚 超长仿真阳具">
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
		<dl class="gl">
			<dt>
				<a href="javascript:;" target="_blank">
					<img src="http://s.qw.cc/images/201604/goods_img/8806_P_1459839060126-270x270.jpg" width="270" height="270" class="sbm" alt="逼真 时尚 超长仿真阳具">
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
		<dl class="gl">
			<dt>
				<a href="javascript:;" target="_blank">
					<img src="http://s.qw.cc/images/201604/goods_img/8806_P_1459839060126-270x270.jpg" width="270" height="270" class="sbm" alt="逼真 时尚 超长仿真阳具">
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
