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
				<a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/1.html';?>" target="_blank">免费注册</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/9.html';?>" target="_blank">购物流程</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/28.html';?>" target="_blank">常见问题</a>
			</dd>
		</dl>
		<dl class="f_dl">
			<dt>支付方式</dt>
			<dd>
			    <a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/5.html';?>" target="_blank">在线支付</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/7.html';?>" target="_blank">优惠劵支付</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/8.html';?>" target="_blank">积分抵现</a>
			</dd>
		</dl>
		<dl class="f_dl">
			<dt>配送与售后</dt>
			<dd>
				<a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/13.html';?>" target="_blank">签收验货</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/15.html';?>" target="_blank">退/换货政策</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/21.html';?>" target="_blank">退/换货流程</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/16.html';?>" target="_blank">隐私保护</a>
			</dd>
		</dl>
		<dl class="f_dl">
			<dt>订购方式</dt>
			<dd>
				<a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/9.html';?>" target="_blank">网站订购</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/10.html';?>" target="_blank">电话订购</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/11.html';?>" target="_blank" >微信订购</a>
			</dd>
		</dl>
		<dl class="f_dl">
			<dt>关于我们</dt>
			<dd>
				<a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/26.html';?>" target="_blank">公司简介</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/27.html';?>" target="_blank">联系我们</a>
				<a rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/22.html';?>" target="_blank">正品保证</a>
			</dd>
		</dl>
		<dl class="f_dl mr0">
			<dt>妙处网微信号</dt>
			<dd><img src="help/images/weixin.png" width="100" height="100"></dd>
		</dl>
		<div class="clear"></div>
	</div>
	<div class="f_dot">
		<div class="w alC">
			<p>
				<a target="_blank" href="<?php echo $this->config->main_base_url;?>" class="c9">首页</a>
				<span class="vline">|</span>
				<a target="_blank" rel="nofollow" href="<?php echo $this->config->help_url.'help_center/index/26.html';?>" class="c9">关于我们</a>
				<span class="vline">|</span>
				<a target="_blank" href="<?php echo $this->config->help_url.'help_center/index/27.html';?>" rel="nofollow" class="c9">联系我们</a>
				<span class="vline">|</span>
				<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=2665892628&site=qq&menu=yes" rel="nofollow" class="c9">联系客服</a>
				<span class="vline">|</span>
				<a rel="nofollow" target="_blank" href="<?php echo $this->config->help_url.'help_center/index/27.html';?>" class="c9">商家入驻</a>
				<span class="vline">|</span>
				订购热线 <span>888-8888-8888</span>
			</p>
			<p>Copyright © 2016 ICP经营性许可证:浙ICP备16035696号</p>
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