<?php $this->load->view('layout/header');?>
<div class="w" id="content">
	<div class="goods rel">
	    <?php $images = array_filter(explode('|',$goods->goods_img));?>
		<div class="gd_l left goods-image" id="gd_l">
			<img width="430" height="430" id="preview" class="goods-main-pic"  alt="<?php echo $goods->goods_name;?>" src="<?php echo $this->config->show_image_url('mall',$images[0],400);?>"/>
			<ul id="spic" class="left goods-pic">   
			    <?php foreach ($images as $val):?>
				<li class="on" data-src="<?php echo $this->config->show_image_url('mall',$val,400);?>">
					<img src="<?php echo $this->config->show_image_url('mall',$val,60);?>" height="50" width="50" />
				</li>
				<?php endforeach;?>
			</ul>
			<a href="javascript:;" class="afav left hand" goods-id="<?php echo base64_encode($goods->goods_id);?>">
				<i class="f f18">&#xe636;</i><p>收藏</p>
			</a>
			<div class="clear"></div>
		</div>
		<div class="gd_r rel left">
			<form action="javascript:addToCart(9113)" method="post">
				<input type="hidden" id="referertype" name="referertype" value="0" />
				<div class="wb">
					<h1 class="gh1"><?php echo $goods->goods_name;?></h1><span class="pl5 pr5 gh1"><em class="c_blue">(货号:<i id="ECS_GOODS_SKU"><?php echo $goods->goods_sku;?></i>)</em></span>
				</div>
				<h2 class="gh2 yahei f14"><?php echo $goods->goods_brief;?></h2>
				<div class="cg_bg">
					<dl class="gdl">
						<dt class="mt5">售价</dt>
						<dd>
							<b class="yen">¥</b>
							<b id="ECS_RANKPRICE_m" class="red f30"><?php echo $goods->promote_price;?></b>
							<?php if (($goods->freight_id==0)&&($goods->freight_cost==0)):?>
							<i class="baoy lh20">包邮</i>
							<?php endif;?>
							<em class="xline pl10">¥<?php echo $goods->market_price;?></em> 
							<a href="javascript:;" onClick="slog(1)" class="pl30">
								<em class="U">登录</em> <em class="c9">享受会员价</em>
							</a>
						</dd>
					</dl>
					<dl class="gdl">
						<dt>统计</dt>
						<dd>
							已销售<b class="blue"><?php echo $goods->sale_count;?></b>件
							<span class="vline">|</span>
							<a href="#comment" onClick="tplun()" class="gray" rel="nofollow">(<b class="blue"><?php echo $goods->review_count;?></b>人已评</a>)
						</dd>
					</dl>
				</div>
				<dl class="rel gdl ren">
					<dt>配送至</dt>
					<dd>
						<div class="pes left" id="pes">
							<p class="pes_id hand">
								<em id="pes_id"><?php echo $address['city'];?></em>
								<em class="rdop"></em>
							</p>
							<div class="pes_z lh25">
								<ul id="pes_ul" class="region">
									<li class="on">省份</li>
									<li>地级市</li>
									<li>区县</li>
								</ul>
								<div id="pes_z">
									<ul id="sel1" class="pes_o">
									    <?php foreach ($region->result() as $val):?>
										<li><a href="javascript:;"><?php echo $val->region_name;?></a></li>
										<?php endforeach;?>
									</ul>
									<ul id="sel2" class="pes_o hid">
										<li><a href="javascript:;" onClick="cgp(383,3,1,this)" >杭州市</a></li>
									</ul>
									<ul id="sel3" class="pes_o hid">
										<li><a href="javascript:;" onClick="cgp(3229,4,2,this)" >西湖区</a></li>
									</ul>
								</div>
							</div>
						</div>
						<span class="pl10 c9">预计<em id="yuji">5月6日(周五)</em>送达</span>
						<div class="dx_d lh18" id="dx_d">
							<h4 class="red f14">短信订购指南</h4>
							<p>&nbsp;</p>
							<p>用短信编辑以下内容发送到：138-838-73375</p>
							<p class="red">商品货号#数量#规格#收件人姓名#收件地址</p>
							<p>&nbsp;</p>
							<p class="bg_gray">例如： Q8164#1#白色#张三#北京朝阳区XX路XX小区XX号</p>
							<p>&nbsp;</p>
							<p class="c9">注意：发送前请认真核对好货号信息，如该商品没有规格信息，则不用填写。</p>
						</div>
					</dd>
				</dl>
				<dl class="gdl">
					<dt>服务</dt>
					<dd>
						<p class="c9">
							私密配送<em class="vline">|</em>
							支持货到付款<em class="vline">|</em>
							正品保障<em class="vline">|</em>
							满99元发顺丰
						</p>
					</dd>
				</dl>
				<p class="lh16">&nbsp;</p>
				<p class="bline"></p>
				<p class="lh16">&nbsp;</p>
				<div id="wrap" class="xcolor mb15 additive">
					<dl class="gdl dato">
						<dt><span class="c5">款型</span></dt>
						<dd>
							<div class="catt over">
								<a href="javascript:;" data-h="QZ9429-1" data-p="258" title="¥258.00" class="xc_a" rel="nofollow">5只装<input type="radio" class="hid" value="89068" name="spec_74" autocomplete="off"></a>
								<a href="javascript:;" data-h="QZ9429-2" data-p="498" title="¥498.00" class="xc_a" rel="nofollow">10只装<input type="radio" class="hid" value="89073" name="spec_74" autocomplete="off"></a>
							</div>
						</dd>
					</dl>
				</div>
				<dl class="gdl">
					<dt class="lh40">
						<span class="c5">数量</span>
					</dt>
					<dd>
						<input type="text" size="4" value="1" id="number" name="number" class="number left">
						<div class="amount left">
							<p onclick="cadd()" class="increase"></p>
							<p onclick="cdec()" class="decrease"></p>
						</div>
						<span class="gray">件</span>
						<span class="hid">(库存<?php echo $goods->in_stock;?>件)</span>
				    </dd>
				</dl>
				<div class="bzone rel clearfix">
					<div id="tishi" class="tishi">
						<a href="javascript:closeT();" class="g_close">X</a>
						<table width="100%" border="0" align="center">
							<tbody><tr><td width="30" valign="top" rowspan="3"><p class="f green f24">&#xe638;</p></td><td><h4 class="f16px c3">恭喜，您已成功将该商品加入购物车！</h4></td></tr>
								<tr>
									<td>
										<p id="g_cts" class="c5">您的购物车中有0件商品，总计￥0</p>
									</td>
								</tr>
								<tr>
									<td height="50">
										<a href="/flow.php" class="redb left mr10">去购物车结算&gt;&gt;</a>
										<a href="javascript:;" onClick="closeT()" class="huib ml10 left">继续购物&gt;&gt;</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<a href="javascript:;" onClick="tobuy(9113)" class="fu_btn" id="bigadd" title="点击加入购物车">加入购物车</a>
				    <a href="javascript:;" onClick="fbuy(9113)" class="red_btn" id="thunder" title="点击立即购买，直接结算">立即订购</a>
				</div>
				<div class="lh25 c9 yahei f14 pl10">订购电话: <em title="您可以拨打我们的全国免费服务热线:400-660-0606" class="f16 red">400-660-0606</em>
				<span class="dx_tip hand" id="dx_tip">短信订购：<em class="tre f16">138-838-73375</em></span></div>
			</form>
		</div>
		<div class="kan">
			<p class="lh35 mt10 c9">看了又看<a href="javascript:;" id="s_next" class="c9 nua kan_i change" from="<?php echo base64_encode($goods->supplier_id);?>" pg="1">换一换</a></p>
			<div id="wrapB" class="wrapb rel">
				<ul class="ka_r recommend">
				    <?php $this->load->view('goods/moresee');?>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="g_r left rel">
		<div class="jba">
			<div id="jbar" class="jbar">
				<ul id="tabbar" class="jbars">
					<li class="on" rel="detail"><a href="<?php echo site_url('Goods/detail')?>#detail">产品介绍</a></li>
					<li rel="comment"><a href="<?php echo site_url('Goods/detail')?>#comment">用户评论 <em class="blue">12</em></a></li>
					<li rel="zhixun"><a href="<?php echo site_url('Goods/detail')?>#zhixun">用户咨询 </a></li>
					<li rel="shouhou"><a href="<?php echo site_url('Goods/detail')?>#shouhou">优质服务</a></li>
				</ul>
				<a class="rbuy right hid" href="javascript:;" onClick="fbuy(9113)"><i class="f pr5">&#xe634;</i>立即订购</a>
				<a href="javascript:;" onClick="jieshou()" class="right pr10 c9"><img src="http://s.qw.cc/themes/v4/css/ft/rkf1.png" width="21" height="44" class="mr5" >在线客服</a>
			</div>
		</div>
		<div class="des" id="detail">
			<div id="description" class="gdes lh25">
				<div class="g_attr mb10">
				    <?php foreach ($spec->result() as $val):?>
					<p title="<?php echo $val->attr_value;?>"><?php echo $val->attr_name;?>：<?php echo $val->attr_value;?></p>
					<?php endforeach;?>
					<div class="clear"></div>
				</div>
				<div class="des">
				    <?php echo $goods->goods_desc;?>  
				</div>
			</div>
		</div>
		<div id="comment" class="des rel">
			<div class="g_t over alR">
				<div class="left fB">
					<em class="red">2F</em> 用户评论
					<em class="gray pl10">COMMENT</em>
				</div>
				<div class="right c9">
					<em class="c3 f14">好评度：</em>
					<b class="red">100%</b>
					<em class="vline f12">|</em>
					<em class="f14">评论/晒单可赠送20/30积分</em>
				</div>
			</div>
			<ul id="whatchoose" class="u_q clearfix comment-type">
				<li data-id="0" class="first on" data-s="12">全部 (12)</li>
				<li data-id="1" data-s="12">好评 (12)</li>
				<li data-id="2" data-s="0" class="xline">中评 (0)</li>
				<li data-id="3" data-s="0" class="xline">差评 (0)</li>
				<li data-id="4" data-s="2" >晒图 (2)</li>
			</ul>
			<p class="lh16">&nbsp;</p>
			<div class="over" id="wpl">
				<div class="ucom">
					<div class="ucoml">
						<p>
							<img src2="http://s.qw.cc/images/avatar/admin/pic_018.jpg" width="50" height="50">
						</p>
					</div>
					<div class="ucomr">
						<p class="lcor">◆</p>
						<div class="ov">
							<em class="left">o***瑟</em> 
							<em class="vip v2"></em>
							<em class='c9'>青海省-海东地区</em>
							<div class="right px px5"><p></p></div>
						</div>
						太牛了，今天找了个妞试试，一个小时没射，累死我了，可能喷多了。哈哈哈。。。
					</div>
				</div>
				<div class="ucom">
					<div class="ucoml">
						<p>
							<img src2="http://s.qw.cc/images/avatar/admin/pic_018.jpg" width="50" height="50">
						</p>
					</div>
					<div class="ucomr">
						<p class="lcor">◆</p>
						<div class="ov">
							<em class="left">o***瑟</em> 
							<em class="vip v2"></em>
							<em class='c9'>青海省-海东地区</em>
							<div class="right px px5"><p></p></div>
						</div>
						太牛了，今天找了个妞试试，一个小时没射，累死我了，可能喷多了。哈哈哈。。。
					</div>
				</div>
			    <div class="ucom">
					<div class="ucoml">
						<p>
							<img src2="http://s.qw.cc/images/avatar/admin/pic_018.jpg" width="50" height="50">
						</p>
					</div>
					<div class="ucomr">
						<p class="lcor">◆</p>
						<div class="ov">
							<em class="left">o***瑟</em> 
							<em class="vip v2"></em>
							<em class='c9'>青海省-海东地区</em>
							<div class="right px px5"><p></p></div>
						</div>
						太牛了，今天找了个妞试试，一个小时没射，累死我了，可能喷多了。哈哈哈。。。
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div id="pager" class="page alC">
				<a href="javascript:;" onClick="ppage()">&lt;</a>
				<a href="javascript:;" onClick="gpage(1)" class="on">1</a>
				<a href="javascript:;" onClick="gpage(2)" >2</a>
				<a href="javascript:;" onClick="npage()">&gt;</a>
			</div>
		</div>
		<div id="zhixun" class="des">
			<div class="g_t fB">
				<em class="red">3F</em> 商品咨询
				<em class="C9 pl10">CONSULT</em>
			</div>
			<div class="lr20">
				<div class="lr20 lh25">
					<sapn>因厂家更改产品包装、产地或者更换随机附件等没有任何提取通知，且每位咨询者购买情况、提取时间等不同，为此以下回复仅对提问者3天内有效，其他网友仅供参考！若由此给您带来不便请多多谅解，谢谢！<a href="zixun-9113-1.html" class="ybtn" target="_blank">我也要咨询</a> 或者 <a href="javascript:;" onClick="jieshou()" class="ml5 ybtn" target="_blank">联系在线客服</a></sapn>
					<p class="lh16">&nbsp;</p>
					<p class="bline"></p>
				</div>
			</div>
			<div class="lh30" id="wzx">
				<p class="yahei f24 alC"><br>该商品暂时没有相关咨询信息！<br></p>
			</div>
		</div>
		<div id="shouhou" class="des">
			<div class="g_t fB">
				<em class="red">4F</em> 优质服务
				<em class="gray pl10">SERVICE</em>
			</div>
			<div class="pd20 ba_z yahei">
				<table width="100%" border="0" class="lh35">
				  <tr>
					  <td width="50%">
				    	<a href="/article-22.html" target="_blank" class="g_bza" rel="nofollow">
				    		<img src="http://s.qw.cc/themes/v4/css/ft/gbz1.jpg" width="150" height="190" class="left mr10">
				    		<p>&nbsp;</p><p>360度严密包装, 保密配送</p>
				    		<b class="f24 red">保密配送</b>
				    		<p>快递单无网站网址无商品名称</p>
				    	</a>
					  </td>
				  	  <td>
				  	  	<a href="/article-285.html" target="_blank" class="g_bza" rel="nofollow">
				  	  		<img src="http://s.qw.cc/themes/v4/css/ft/gbz2.jpg" width="150" height="190" class="left mr10"/>
				  	  		<p>&nbsp;</p>
				  	  		<p>正规品牌采购， 官方品牌授权</p>
				  	  		<b class="f24 red">正品保障</b>
				  	  	    <p>上百国内国际知名品牌授权</p>
				  	  	</a>
				  	  </td>
				  </tr>
				  <tr>
				      <td>
				      	<a href="/article-15.html" target="_blank" class="g_bza" rel="nofollow">
				      		<img src="http://s.qw.cc/themes/v4/css/ft/gbz3.jpg" width="150" height="190" class="left mr10">
				      		<p>&nbsp;</p>
				      		<p>全国上千城市货到付款(港澳台除外)</p>
				      		<b class="f24 red">货到付款</b>
				      		<p>重点城市1日送达 满99发顺丰</p>
				      	 </a>
				      </td>
				      <td>
				      	<a href="javascript:;" onClick="jieshou()" class="g_bza" rel="nofollow">
				      		<img src="http://s.qw.cc/themes/v4/css/ft/gbz4.jpg" width="150" height="190" class="left mr10">
				      		<p>&nbsp;</p>
				      		<p>7*24小时客服在线服务</p>
				      		<b class="f24 red">优质客服</b>
				      		<p>服务热线400-660-0606</p>
				      	</a>
				      </td>
				  </tr>
				</table>
			<p>&nbsp;</p> 
			<p class="bline"></p>
			<div class="pd20">
			<p class="f18 c3"><b>趣网所售商品均保密配送</b></p>
			<p>为了保障顾客的隐私利益，商品外包装不含任何敏感字样，快递单无网站网址无商品名称，快递单统一标注【礼品】字样，快递员及其他第三人均不会知晓产品。</p>
			<p class="f18 c3"><b>全国上千城市货到付款，重点城市1日送达，满198就免运费</b></p>
			<p>全国上千城市支持货到付款，重点城市1日送达，满198免运费 为方便用户，我们实行先收货再付款政策，偏远地区邮局可送达，如果你所在的城市是省会城市或者其它重要城市，1-2天 内即可送达（不可抗力情况除外），区县地区2-5天送达。一同送达。</p>
			<p class="f18 c3"><b>趣网所售商品均为原装正品</b></p>
			<p>趣网所有出售的商品均来源于知名品牌公司，为各品牌授权的正规渠道正品，完善的供应链，正规的采购渠道，入仓全检保障，所有产品均通过国家相关质量认证。</p>
			<p class="f18 c3"><b>任何质量问题无条件免费退换</b></p>
			<p>如果您收到的商品有质量问题，请在签收后48小时内联系我们，我们将为您提供一次免费更换的服务，更换时请确保产品没有使用过且包装完好无损。为了保证您和其他消费者的健康，对因质量问题而退回的产品，将一律销毁，绝不二次销售。</p>
			<p class="f18 c3"><b>360°购物保障，放心购买，安心使用</b></p>
			<p>趣网打造完美服务，精选正规商品，确保每一位用户都买得安心，用得放心，如果您对趣网服务方面有任何疑问，欢迎致电趣网商城电话400-660-0606，或点击网站上方"联系客服"栏详细了解，我们竭诚为你服务！</p>
			<p>&nbsp;</p>
			</div>
			<p class="alC"><img src2="http://s.qw.cc/themes/v4/css/ft/fuwu.png" width="690" height="552"></p>
			</div>
		</div>
	</div>
	<div class="g_l right">
		<p class="glh3">
			<em class="f f16">&#xe648;</em> 
			<b>手机扫描查看该商品</b>
		</p>
		<div class="glb alC">
			<a title="扫一扫手机购买" href="http://vip.anqihao.com/mobile/goods-9113.html" target="_blank" class="op6" rel="nofollow">
				<img width="160" height="160" src="<?php echo $this->config->show_image_url('common/ewm',$ewm);?>">
		    </a>
		</div>
		<p class="glh3">
			<em class="f f16">&#xe63b;</em>
			<b>在线客服</b>
		</p>
		<div class="glb lh30">
			<div onClick="jieshou()" title="点击咨询在线客服" class="rel hand">
				<table width="160" height="140" border="0" class="alR kftab">
				  <tr>
				    <td width="44"><img src2="http://s.qw.cc/themes/v4/css/ft/zkf.gif" width="14" height="20"></td>
				    <td width="60"><img src2="http://s.qw.cc/themes/v4/css/ft/zkf.gif" width="14" height="20"></td>
				    <td><img src2="http://s.qw.cc/themes/v4/css/ft/zkf.gif" width="14" height="20"></td>
				  </tr>
				  <tr>
				    <td><img src2="http://s.qw.cc/themes/v4/css/ft/zkf.gif" width="14" height="20"></td>
				    <td><img src2="http://s.qw.cc/themes/v4/css/ft/zkf.gif" width="14" height="20"></td>
				    <td><img src2="http://s.qw.cc/themes/v4/css/ft/zkf.gif" width="14" height="20"></td>
				  </tr>
				</table>
				<img src2="http://s.qw.cc/themes/v4/css/ft/glkf.png" width="160" height="140">
			</div>
		</div>
		<p class="glh3">
			<em class="f f16">&#xe636;</em> 
		    <b>同类热卖</b>
		</p>
		<div class="glb">
			<a href="goods-5415.html" class="rx_a" target="_blank">
				<img src="http://s.qw.cc/images/201604/thumb_img/5415_thumb_P220_1460455530090-160x160.jpg" width="160" height="160"/>
				<p>藏帝 高原植物延时喷剂 不麻木无依赖 15ml</p>
				<p class="xj">¥198.00</p>
			</a>
			<a href="goods-9108.html" class="rx_a" target="_blank">
				<img src="http://s.qw.cc/images/201602/thumb_img/9108_thumb_P220_1456304222764-160x160.jpg" width="160" height="160"/>
				<p>雅迪克 华夏古方秘制延时喷剂 15ml</p>
				<p class="xj">¥198.00</p>
			</a>
			<a href="goods-6012.html" class="rx_a" target="_blank">
				<img src="http://s.qw.cc/images/201509/thumb_img/6012_thumb_P220_1442303546050-160x160.jpg" width="160" height="160"/>
				<p>UZ诱芷 天然复方延时精油 安全无添加 10ml</p>
				<p class="xj">¥238.00</p>
			</a>
		</div>
		<p class="glh3">
			<em class="f f16">&#xe636;</em>
			<b>整站热卖</b>
		</p>
		<div class="glb">
			<a href="goods-9023.html" class="rx_a" target="_blank">
			 	<img src="http://s.qw.cc/images/201601/thumb_img/9023_thumb_P220_1452670834102-160x160.jpg" width="160" height="160"/>
				<p>Lesparty莱斯帕蒂  一阳指潮吹硅胶G点刺激手指套</p>
				<p class="xj">¥28.00</p>
			</a>
			<a href="goods-8646.html" class="rx_a" target="_blank">
				<img src="http://s.qw.cc/images/201511/thumb_img/8646_thumb_P220_1446702687020-160x160.jpg" width="160" height="160"/>
				<p>可比例  男女情趣水润快感热感润滑液 45ml</p>
				<p class="xj">¥49.00</p>
			</a>
			<a href="goods-7577.html" class="rx_a" target="_blank">
				<img src="http://s.qw.cc/images/201601/thumb_img/7577_thumb_P220_1453100833465-160x160.jpg" width="160" height="160"/>
				<p>UNIMAT 电动夹吸飞机杯式阴茎增大器</p>
				<p class="xj">¥459.00</p>
			</a>
			<a href="goods-6007.html" class="rx_a" target="_blank">
				<img src="http://s.qw.cc/images/201505/thumb_img/6007_thumb_P220_1432548264763-160x160.jpg" width="160" height="160"/>
				<p>UZ诱芷 催欲高潮提升精油  10ml</p>
				<p class="xj">¥268.00</p>
			</a>
			<a href="goods-5484.html" class="rx_a" target="_blank">
				<img src="http://s.qw.cc/images/201511/thumb_img/5484_thumb_P220_1446535105755-160x160.jpg" width="160" height="160"/>
				<p>香港雷霆Leten活塞X-9第三代全自动飞机杯</p>
				<p class="xj">¥299.00</p>
			</a>
		</div>
		<p class="glh3"><em class="f f14">&#xe645;</em> <b>浏览历史</b></p>
		<div class="glb over">
			<a href="goods-5520.html" target="_blank" class="hs_a">
				<img src="http://s.qw.cc/images/201511/thumb_img/5520_thumb_P220_1446535221322-70x70.jpg" width="70" height="70" class="left" />
				<p>奇乐圆Q-LUV-U无线遥控自动抽插电动仿真阳具</p>
				<p>¥329.00</p>
			</a>
		</div>
		<div id="goodsrm">
			<p class="glh3">
				<em class="f f16">&#xe636;</em> 
				<b>当前浏览商品</b>
			</p>
			<div class="glb">
				<img src="http://s.qw.cc//images/201603/goods_img/9113_P_1456888624440.jpg" width="160" height="160">
				<p>2H2D 倍力挺男性喷雾剂金尊版2ml组合装</p>
				<b class="red f14">¥498.00</b>
				<i class="i_new lh20">包邮</i><p class="bline mt5"></p>
				<p class="pt5 alC"><a href="javascript:;" class="nua f14"><i class="f pr5">&#xe64b;</i>返回顶部</a></p>
			</div>
		</div>
	</div>
	<div class="clear"></div>
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
