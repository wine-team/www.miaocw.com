<?php $this->load->view('layout/header');?>
<div class="w" id="content">
	<div class="goods rel">
	    <?php $images = array_filter(explode('|',$goods->goods_img));?>
		<div class="gd_l left goods-image" id="gd_l">
			<img width="430" height="430" id="preview" class="goods-main-pic"  alt="<?php echo $goods->goods_name;?>" src="<?php echo $this->config->show_image_url('mall',$images[0],400);?>"/>
			<ul id="spic" class="left goods-pic">   
			    <?php foreach ($images as $key=>$val):?>
				<li <?php if($key==0):?>class="on"<?php endif;?> data-src="<?php echo $this->config->show_image_url('mall',$val,400);?>">
					<img src="<?php echo $this->config->show_image_url('mall',$val,60);?>" height="50" width="50" />
				</li>
				<?php endforeach;?>
			</ul>
			<a href="javascript:;" class="afav left hand <?php if($enshrine):?>active<?php endif;?>" goods-id="<?php echo base64_encode($goods->goods_id);?>">
				<i class="f f18 iconfont">&#xe60d;</i>
				<p>收藏</p>
			</a>
			<div class="clear"></div>
		</div>
		<div class="gd_r rel left">
				<div class="wb">
					<h1 class="gh1"><?php echo $goods->goods_name;?></h1><span class="pl5 pr5 gh1"><em class="c_blue">(货号:<i id="ECS_GOODS_SKU"><?php echo $goods->goods_sku;?></i>)</em></span>
				</div>
				<h2 class="gh2 yahei f14"><?php echo $goods->goods_brief;?></h2>
				<div class="cg_bg">
					<dl class="gdl">
						<dt class="mt5">售价</dt>
						<dd>
							<b class="yen">¥</b>
							<?php if (!empty($goods->promote_price) && ($goods->promote_start_date<=time()) && ($goods->promote_end_date>=time())) : ?>
								<?php $total_price = $goods->promote_price;?>
							<?php else:?>
								<?php $total_price = $goods->shop_price;?>
							<?php endif;?>
							<b class="red f30">
								<?php echo $total_price;?>
							</b>
							<?php if ($total_price>=99):?>
								<i class="baoy lh20">包邮</i>
							<?php endif;?>
							<em class="xline pl10">¥<?php echo $goods->market_price;?></em> 
						</dd>
					</dl>
					<dl class="gdl">
						<dt>统计</dt>
						<dd>
							已销售<b class="blue"><?php echo $goods->sale_count;?></b>件
							<span class="vline">|</span>
							<a href="javascript:;" class="gray <?php if($countReviews['all']>0):?>review-count<?php endif;?>" rel="nofollow">(<b class="blue "><?php echo $countReviews['all'];?></b>人已评</a>)
						</dd>
					</dl>
				</div>
				<dl class="rel gdl ren freight">
					<dt>配送至</dt>
					<dd>
						<?php $this->load->view('goods/region');?>
					</dd>
				</dl>
				<dl class="gdl">
					<dt>服务</dt>
					<dd>
						<p class="c9">
							保密配送<em class="vline">|</em>
							正品保障<em class="vline">|</em>
							满99元包邮
						</p>
					</dd>
				</dl>
				<p class="lh16">&nbsp;</p>
				<p class="bline"></p>
				<p class="lh16">&nbsp;</p>
				<div id="wrap" class="xcolor mb15 additive">
				    <?php $spec = json_decode($goods->attr_spec, true);?>
				    <?php if (!empty($spec)):?>
					    <?php foreach ($spec as $attr_value_id=>$val):?>
						    <?php if(!empty($val['spec_value'])):?>
							<dl class="gdl dato">
								<dt>
									<span class="c5"><?php echo $val['spec_name'];?></span>
								</dt>
								<dd>
									<div class="catt over">
									    <?php $i=0;foreach ($val['spec_value'] as $key=>$item):?>
										<a href="javascript:;"  class="xc_a <?php if($i==0):?>hover<?php endif;?>" rel="nofollow">
											<?php echo $item;?>
											<input type="radio" class="hid spec" value="<?php echo $item;?>" name="spec[<?php echo $attr_value_id;?>]" autocomplete="off" <?php if($i==0):?>checked="checked"<?php endif;?> />
										</a>
										<?php $i++; endforeach;?>
									</div>
								</dd>
							</dl>
							<?php endif;?>
						<?php endforeach;?>
					<?php endif;?>
				</div>
				<dl class="gdl">
					<dt class="lh40">
						<span class="c5">数量</span>
					</dt>
					<dd class="purchase" >
						<input type="text" name="number" value="1" id="number" class="number left" onkeyup="this.value=this.value.replace(/\D/g,'')"  goods-id="<?php echo $goods->goods_id;?>"  goods-num="<?php echo $goods->in_stock;?>" limit-num="<?php echo $goods->limit_num;?>" onblur="javascript:goodsQtyChange($(this))"/>
						<div class="amount left">
							<p onclick="javascript:goodsQtyUpdate('up',$(this))" class="increase"></p>
							<p onclick="javascript:goodsQtyUpdate('down',$(this))" class="decrease"></p>
						</div>
						<span class="gray">件</span>
						<span class="hid">(库存<?php echo $goods->in_stock;?>件)</span>
				    </dd>
				</dl>
				<div class="bzone rel clearfix ">
					<div id="tishi" class="tishi hid">
						<a href="javascript:;" class="g_close close">X</a>
						<table width="100%" border="0" align="center">
							<tbody>
								<tr>
									<td width="30" valign="top" rowspan="3">
										<p class="f green f24">&#xe638;</p>
									</td>
									<td>
										<h4 class="f16px c3">恭喜，您已成功将该商品加入购物车！</h4>
									</td>
								</tr>
								<tr>
									<td>
										<p id="g_cts" class="c5 cat-infor"></p>
									</td>
								</tr>
								<tr>
									<td height="50">
										<a href="<?php echo site_url('cart/grid');?>" class="redb left mr10">去购物车结算&gt;&gt;</a>
										<a href="javascript:;" class="huib ml10 left close">继续购物&gt;&gt;</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<a href="javascript:;" class="fu_btn add_to_cart"  title="点击加入购物车">加入购物车</a>
				    <a href="javascript:;" class="red_btn shopping-s-submit"  title="点击立即购买，直接结算">立即订购</a>
				</div>
				<div class="lh25 c9 yahei f14 pl10">订购电话: <em title="您可以拨打我们的全国免费服务热线:888-8888-8888" class="f16 red">888-8888-8888</em>
				<span class="dx_tip hand" id="dx_tip">短信订购：<em class="tre f16">15988173721</em></span></div>
		</div>
		<div class="kan">
			<p class="lh35 mt10 c9">看了又看<a href="javascript:;" id="s_next" class="c9 nua kan_i change" from="<?php echo base64_encode($goods->supplier_id);?>" pg="1">换一换</a></p>
			<div id="wrapB" class="wrapb rel">
				<ul class="ka_r recommend">
				    <?php //$this->load->view('goods/moresee');?>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="g_r left rel">
		<div class="jba">
			<div id="jbar" class="jbar">
				<ul id="tabbar" class="jbars">
					<li class="on" rel="detail">
						<a href="javascript:;">
							产品介绍
						</a>
					</li>
					<li  rel="comment">
						<a href="javascript:;">
							用户评论 <em class="blue"><?php echo $countReviews['all'];?></em>
						</a>
					</li>
					<li rel="shouhou">
						<a href="javascript:;">
							优质服务
						</a>
					</li>
				</ul>
				<a class="rbuy right hid " href="javascript:;"><i class="f pr5 iconfont">&#xe603;</i>立即订购</a>
			</div>
		</div>
		<div class="des" id="detail">
			<div id="description" class="gdes lh25">
			    <?php if(!empty($attr_value)):?>
				<div class="g_attr mb10">
				    <?php foreach ($attr_value as $val):?>
					    <?php foreach ($val['group_value'] as $item):?>
							<p title="<?php echo $item['attr_name'];?>">
								<?php echo $item['attr_name']; ?>：<?php echo $item['attr_value']; ?>
							</p>
						<?php endforeach;?>
					<?php endforeach;?>
					<div class="clear"></div>
				</div>
				<?php endif;?>
				<div id="video" class="mt10 mb10">
				    <?php echo $goods->goods_desc;?>
				</div>
			</div>
		</div>
		<div id="comment" class="des rel">
			<div class="g_t over alR">
				<div class="left fB">
					<em class="red"></em> 用户评论
				</div>
				<div class="right c9">
					<em class="c3 f14">好评度：</em>
					<b class="red">
						<?php echo $countReviews['all'] > 0 ? bcdiv($countReviews['up'], $countReviews['all'], 2)*100 : 100; ?>%
					</b>
					<em class="vline f12">|</em>
					<em class="f14">评论/晒单可赠送20/30积分</em>
				</div>
			</div>
			<?php if ($countReviews['all'] > 0) : ?>
				<ul id="whatchoose" class="u_q clearfix comment-type">
					<li data-id="0" class="first on" data-s="<?php echo $countReviews['all'] ?>">全部 (<?php echo $countReviews['all'] ?>)</li>
					<li data-id="1" data-s="<?php echo $countReviews['up'] ?>">好评 (<?php echo $countReviews['up'] ?>)</li>
					<li data-id="2" data-s="<?php echo $countReviews['middle'] ?>">中评 (<?php echo $countReviews['middle'] ?>)</li>
					<li data-id="3" data-s="<?php echo $countReviews['low'] ?>">差评 (<?php echo $countReviews['low'] ?>)</li>
				</ul> 
			<?php endif; ?>
			<div class="product-review">
			   <?php //$this->load->view('goods/reviews');?>
			</div>
		</div>
		<div id="shouhou" class="des">
			<div class="g_t fB">
				<em class="red"></em> 优质服务
				<em class="gray pl10"></em>
			</div>
			<div class="pd20 ba_z yahei">
				<table width="100%" border="0" class="lh35">
				  <tr>
					  <td width="50%">
				    	<a href="<?php echo site_url('goods/detail/'.$goods->goods_id);?>" class="g_bza" rel="nofollow">
				    		<img src="miaow/images/gbz1.jpg" width="150" height="190" class="left mr10">
				    		<p>&nbsp;</p><p>360度严密包装, 保密配送</p>
				    		<b class="f24 red">保密配送</b>
				    		<p>快递单无网站网址无商品名称</p>
				    	</a>
					  </td>
				  	  <td>
				  	  	<a href="<?php echo site_url('goods/detail/'.$goods->goods_id);?>" class="g_bza" rel="nofollow">
				  	  		<img src="miaow/images/gbz2.jpg" width="150" height="190" class="left mr10"/>
				  	  		<p>&nbsp;</p>
				  	  		<p>正规品牌采购， 官方品牌授权</p>
				  	  		<b class="f24 red">正品保障</b>
				  	  	    <p>上百国内国际知名品牌授权</p>
				  	  	</a>
				  	  </td>
				  </tr>
				  <tr>
				      <td>
				      	<a href="<?php echo site_url('goods/detail/'.$goods->goods_id);?>" class="g_bza" rel="nofollow">
				      		<img src="miaow/images/gbz3.jpg" width="150" height="190" class="left mr10">
				      		<p>&nbsp;</p>
				      		<p></p>
				      		<b class="f24 red">货到付款</b>
				      		<p>重点城市2日送达 满99包邮</p>
				      	 </a>
				      </td>
				      <td>
				      	<a href="http://wpa.qq.com/msgrd?v=3&uin=3552892797&site=qq&menu=yes"  class="g_bza" rel="nofollow" target="_blank">
				      		<img src="miaow/images/gbz4.jpg" width="150" height="190" class="left mr10">
				      		<p>&nbsp;</p>
				      		<b class="f24 red">优质客服</b>
				      		<p>7*24小时客服在线服务</p>
				      	</a>
				      </td>
				  </tr>
				</table>
				<p>&nbsp;</p> 
				<p class="bline"></p>
				<div class="pd20">
					<p class="f18 c3"><b>妙处网所售商品均保密配送</b></p>
					<p>为了保障顾客的隐私利益，商品外包装不含任何敏感字样，快递单无网站网址无商品名称，快递单统一标注【礼品】字样，快递员及其他第三人均不会知晓产品。</p>
					<p class="f18 c3"><b>满99就免运费</b></p>
					<p>满99免运费 为方便用户，偏远地区邮局可送达，如果你所在的城市是省会城市或者其它重要城市，1-2天 内即可送达（不可抗力情况除外），区县地区2-5天送达。一同送达。</p>
					<p class="f18 c3"><b>妙处网所售商品均为原装正品</b></p>
					<p>妙处网所有出售的商品均来源于知名品牌公司，为各品牌授权的正规渠道正品，完善的供应链，正规的采购渠道，入仓全检保障，所有产品均通过国家相关质量认证。</p>
					<p class="f18 c3"><b>任何质量问题无条件免费退换</b></p>
					<p>如果您收到的商品有质量问题，请在签收后48小时内联系我们，我们将为您提供一次免费更换的服务，更换时请确保产品没有使用过且包装完好无损。为了保证您和其他消费者的健康，对因质量问题而退回的产品，将一律销毁，绝不二次销售。</p>
					<p class="f18 c3"><b>360°购物保障，放心购买，安心使用</b></p>
					<p>妙处网打造完美服务，精选正规商品，确保每一位用户都买得安心，用得放心，如果您对妙处网服务方面有任何疑问，欢迎致电妙处网电话888-888-8889，或点击网站上方"联系客服"栏详细了解，我们竭诚为你服务！</p>
					<p>&nbsp;</p>
				</div>
			</div>
		</div>
	</div>
	<div class="g_l right">
		<p class="glh3">
			<em class="f f16 iconfont">&#xe608;</em>
			<b>手机扫描查看该商品</b>
		</p>
		<div class="glb alC">
			<a title="扫一扫手机购买" href="javascript:;" class="op6" rel="nofollow">
				<img width="160" height="160" src="<?php echo $this->config->show_image_url('common/ewm',$ewm);?>">
		    </a>
		</div>
		<p class="glh3">
			<em class="f f16 iconfont">&#xe605;</em>
			<b>在线客服</b>
		</p>
		<div class="glb lh30">
			<div title="点击咨询在线客服" class="rel hand">
				<table width="160" height="140" border="0" class="alR kftab">
				  <tr>
				    <td width="44"><img src="miaow/images/zkf.gif" width="14" height="20"></td>
				    <td width="60"><img src="miaow/images/zkf.gif" width="14" height="20"></td>
				    <td><img src="miaow/images/zkf.gif" width="14" height="20"></td>
				  </tr>
				  <tr>
				    <td><img src="miaow/images/zkf.gif" width="14" height="20"></td>
				    <td><img src="miaow/images/zkf.gif" width="14" height="20"></td>
				    <td><img src="miaow/images/zkf.gif" width="14" height="20"></td>
				  </tr>
				</table>
				<img src="miaow/images/glkf.png" width="160" height="140">
			</div>
		</div>
		<p class="glh3">
			<em class="f f16 iconfont">&#xe60d;</em> 
		    <b>同类热卖</b>
		</p>
		<div class="glb same-hot" cat="<?php echo $goods->attr_set_id;?>">
			 <?php //$this->load->view('goods/samehot');?>
		</div>
	</div>
	<div class="clear"></div>
	<div class="fa_l clearfix mt35">
		<?php echo $cms_block['foot_speed_key'];?>
	</div>
</div>
<?php $this->load->view('layout/footer');?>