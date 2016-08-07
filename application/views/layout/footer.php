<div id="minbar" class="minbar">
	<div class="r_panel">
		<ul class="m_mid" id="m_mid">
			<li class="m_li" id="minarg">
				<a href="<?php echo site_url('cart/grid');?>">
					<i class="f iconfont">&#xe603;</i>
					<i id="carr_num"><?php echo isset($cart_num) ? $cart_num : '0';?></i>
				</a>
				<p class="rt_line"></p>
				<div class="r_av m_tr" id="racar">
					<em class="r_vt">◆</em>
					<div id="rxcar"></div>
				</div>
			</li>
			<!--  
			<li class="m_li m_lih" id="minar">
				<a href="javascript:;">
					<img src="http://s.qw.cc/themes/v4/css/ft/rkf.gif" width="28" height="29">
					<em class="mr_wd">美女客服</em>
				</a>
				<p class="rt_line"></p>
			</li>
			-->
			<li class="m_li">
				<a href="<?php echo $this->config->ucenter_url;?>" target="blank" class="f">
					<i class="iconfont">&#xe600;</i>
				</a>
				<p class="r_av m_tr">订单查询<em class="r_vt">◆</em></p>
			</li>
			<li class="m_li">
				<a href="<?php echo $this->config->ucenter_url.'enshrine/index';?>" class="f">
					<i class="iconfont">&#xe606;</i>
				</a>
				<p class="r_av m_tr">我的收藏<em class="r_vt">◆</em></p>
			</li>
			<li class="m_li" id="rhist">
				<a href="javascript:;" class="f">
					<i class="iconfont">&#xe602;</i>
				</a>
				<div class="r_av m_tr" id="ghis">
					<em class="r_vt">◆</em>
					<h4>我的足迹</h4>
					<div id="hibx"></div>
				</div>
			</li>
		</ul>
		<ul class="m_mid" id="m_fid">
			<li class="m_li">
				<a href="<?php echo $this->config->help_url.'user_feedback/index';?>" class="f" target="_blank">
					<i class="iconfont">&#xe601;</i>
				</a>
				<p class="r_av m_tr">意见反馈
					<em class="r_vt">◆</em>
				</p>
			</li>
			<li class="m_li">
				<a href="javascript:;" class="f">
					<i class="iconfont">&#xe607;</i>
				</a>
				<p class="r_av m_tr" id="m_fma">
					<img src="http://s.qw.cc/themes/v4/css/2/qapp02.png" width="120" height="135">
					<em class="r_vt">◆</em>
				</p>
			</li>
			<li class="m_li m_tops">
				<a href="javascript:;" class="f top">
					<i class="iconfont">&#xe604;</i>
				</a>
				<p class="r_av m_tr">返回顶部
					<em class="r_vt">◆</em>
				</p>
			</li>
		</ul>
	</div>
</div>
<div id="footer">
	<div class="ft_t">
		<p class="w over">
			<img src="miaow/images/service.png"/>
		</p>
	</div>
	<div class="w">
		<dl class="f_dl">
			<dt>购物指南</dt>
			<dd>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">购物流程</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">会员介绍</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">免费注册</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">常见问题</a>
			</dd>
		</dl>
		<dl class="f_dl">
			<dt>支付方式</dt>
			<dd>
			    <a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">网银支付</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">快捷支付</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">优惠券抵扣</a>
			</dd>
		</dl>
		<dl class="f_dl">
			<dt>配送与售后</dt>
			<dd>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">签收验货</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">物流查询</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">退/换货政策</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">隐私保护</a>
			</dd>
		</dl>
		<dl class="f_dl">
			<dt>订购方式</dt>
			<dd>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">网站订购</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank" >微信订购</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">APP订购</a>
			    <a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">400电话订购</a>
			</dd>
		</dl>
		<dl class="f_dl">
			<dt>商家服务</dt>
			<dd>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">商家入驻</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">培训中心</a>
				<a rel="nofollow" href="javascript:jieshou();">广告服务</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url;?>" target="_blank">商家帮助</a>
			</dd>
		</dl>
		<dl class="f_dl mr0">
			<dt>妙处网客户端</dt>
			<dd><img src="" width="100" height="100"></dd>
		</dl>
		<div class="clear"></div>
	</div>
	<div class="f_dot">
		<div class="w alC">
			<p>
				<a target="_blank" href="<?php echo $this->config->main_base_url;?>" class="c9">首页</a>
				<span class="vline">|</span>
				<a target="_blank" rel="nofollow" href="<?php echo $this->config->help_url;?>" class="c9">关于我们</a>
				<span class="vline">|</span>
				<a target="_blank" href="<?php echo $this->config->help_url;?>" rel="nofollow" class="c9">联系我们</a>
				<span class="vline">|</span>
				<a target="_blank" href="<?php echo $this->config->help_url;?>" rel="nofollow" class="c9">联系客服</a>
				<span class="vline">|</span>
				<a rel="nofollow" target="_blank" href="<?php echo $this->config->help_url;?>" class="c9">商家入驻</a>
				<span class="vline">|</span>
				订购热线 <span>888-8888-8888</span>
			</p>
			<p>Copyright © 2015 ICP经营性许可证:浙ICP备8888888号-2</p>
			<p>公司：杭州小医仙网络科技有限公司</p>
			<!--  
			<p class="mt10">
				<a href="javascript:;" target="_blank" title="妙处网iPhone,ipad版" rel="nofollow" class="ml5 mr5">
					<img src="passport/images/sf2.png" width="110" height="30">
				</a>
				<a href="javascript:;" target="_blank" title="妙处网Android版" rel="nofollow">
					<img src="passport/images/sf3.png" width="110" height="30">
				</a>
			</p>
			-->
		</div>
	</div>
</div>
</body>
</html>