<?php $this->load->view('layout/header');?>
<?php if(count($advert)>0):?>
<div id="focus" class="focus header-advert">
	<ul class="f_ul">
	    <?php foreach ($advert as $key=>$item):?>
	    <li>
	        <a target="_blank" href="<?php echo $item['url'];?>"  alt="妙处网，成人用品">
	            <img  src="<?php echo $this->config->show_image_url('advert',$item['picture']);?>" />
	        </a>
	    </li>
	    <?php endforeach;?>
	</ul>
	<a class="h_pre" href="javascript:;">&lt;</a>
	<a class="h_nxt" href="javascript:;">&gt;</a>
	<p id="hr_a" class="ov">
	    <?php echo $cms_block['head_right_advert'];?>
	</p>
</div>
<?php endif;?>
<div id="content" class="w home-content">
    <div class="hlock over mt35">
	    <div class="lk_l left"><p class="ldok">●</p></div>
	    <div class="lk_r left" id="lk_r">
	        <?php echo $cms_block['head_today_recommend'];?>
	    </div>
	</div>
	<div class="w ov mt35">
		<div class="h_pic" id="h_pic">
		     <?php echo $cms_block['head_recommend_down'];?>
		     <div class="clear"></div>
		</div>
	</div>
	<div class="hotk ov">
		<?php echo $cms_block['head_hot_keyword'];?>
	</div>
	<div class="home-man">
		<p class="lh35">&nbsp;</p>
		<div class="h_tt over">
			<em class="flor left">1F</em>
			<h2 class="left">
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=男性用品');?>" class="h_ha">男性用品</a>
				<em class="gray pl5 f16">MAN</em>
			</h2>
			<p class="right">
				<a href="<?php echo site_url('goods/search?keyword=飞机杯');?>" target="_blank" class="gray">飞机杯</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=女优名器');?>" target="_blank" class="gray">女优名器</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=性感美臀');?>" target="_blank" class="gray">性感美臀</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=延时喷剂');?>" target="_blank" class="c9">延时喷剂</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search');?>" target="_blank" class="org" rel="nofollow">更多>></a>
			</p>
		</div>
		<div class="h_fl">
			<div class="h_cat">
				<h3 class="mb5">飞机杯/增大</h3>
				<a class="c_zon" href="<?php echo site_url('goods/search?keyword=电动型');?>" target="_blank">电动型</a>
				<a href="<?php echo site_url('goods/search?keyword=手动型');?>" target="_blank">手动型</a>
				<a href="<?php echo site_url('goods/search?keyword=免提式');?>" target="_blank">免提式</a>
				<a href="<?php echo site_url('goods/search?keyword=阴交型');?>" class="c_zon" target="_blank">阴交型</a>
				<a href="<?php echo site_url('goods/search?keyword=电动增大');?>" class="c_zon" target="_blank">电动增大</a>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank">两用型</a>
			</div>
			<div class="h_cat">
				<h3 class="mb5">真人倒模</h3>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>"  class="c_zon"target="_blank">阴部</a>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank">臀部</a>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank" class="c_zon">AV女优</a>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank" >真人呻吟</a>
			</div>
			<div class="h_cat">
				<h3 class="mb5">其他</h3>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" class="c_zon" target="_blank">充气娃娃</a>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank">实体娃娃</a>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank">前列腺刺激</a>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank">延时喷剂</a>
			</div>
			<a class="h_ff" target="_blank" href="<?php echo site_url('goods/femal');?>">
				<img src="http://s.qw.cc/themes/v4/css/ft/f1.jpg" width="123" height="75" alt="男性用品">
			</a>
		</div>
		<div class="h_fm">
			<a href="<?php echo site_url('goods/femal');?>" target="_blank">
				<img src="http://s.qw.cc/data/afficheimg/1451448053762084083.jpg" width="400" height="390">
			</a>
		</div>
		<div class="h_fr">
	        <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	            <div class="f_am">
	            	飞机杯式<em class="red">增大器</em>
					<p>电动夹吸，4D通道</p>
					<i>¥459</i>
				</div>
				<img src="http://s.qw.cc/data/afficheimg/1453446640724076722.jpg" width="160" height="170" class="ha_po" />
		    </a>
	        <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	            <div class="f_am">
	                                             国优<em class="red">名器</em>
	                                             兽兽宝贝<p>私处仿真倒模</p>
	                <i>¥199</i>
	            </div>
	            <img src = "http://s.qw.cc/data/afficheimg/1441781567790022284.jpg" width="160" height="170" class="ha_po"/>
	        </a>
	        <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	            <div class="f_am">
	                                             触控型<em class="red">真人发声</em>
	            	飞机杯<p>配嫩模真人叫床声</p>
	            	<i>¥299</i>
	            </div>
	            <img src = "http://s.qw.cc/data/afficheimg/1449233890346675557.jpg" width="160" height="170" class="ha_po" />
	        </a>
	        <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	           <div class="f_am">
	            	<em class="red">英国Revo</em>
	            	前列腺按摩<p>360°旋转式按摩</p>
	            	<i>¥1799</i>
	           </div>
	           <img src = "http://s.qw.cc/data/afficheimg/1456883466852655483.jpg" width="160" height="170" class="ha_po">
	        </a>
	    </div>
    </div>
    <div class="home-woman">
	    <p class="clear lh35">&nbsp;</p>
	    <div class="h_tt over">
			<em class="flor left">2F</em>
			<h2 class="left">
				<a target="_blank" href="<?php echo site_url('goods/femal');?>" class="h_ha">女性用品</a>
				<em class="gray pl5 f16">WOMAN</em>
			</h2>
			<p class="right">
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank" class="gray">按摩棒</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank" class="gray">仿真阳具</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank" class="gray">跳蛋</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank" class="gray">G点振动棒</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank" class="gray">性爱机器</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank" class="org" rel="nofollow">更多>></a>
			</p>
		</div>
		<div class="h_fl">
			<div class="h_cat">
				<h3 class="mb5">仿真阳具</h3>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=两用型');?>" class="c_zon">自动抽插</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=两用型');?>">强烈震动</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=两用型');?>" class="c_zon">大号阳具</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=两用型');?>">高端阳具</a>
			</div>
			<div class="h_cat">
				<h3 class="mb5">震动棒</h3>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=两用型');?>">模仿抽插</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=两用型');?>" class="c_zon">吹潮利器</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=两用型');?>" class="c_zon">静音设计</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=两用型');?>">恒温设计</a>
			</div>
			<div class="h_cat">
				<h3 class="mb5">高阶性爱</h3>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=两用型');?>" class="c_zon">跳蛋</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=两用型');?>">AV棒</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=两用型');?>">后庭玩具</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=两用型');?>" class="c_zon">转珠棒</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=两用型');?>">炮机</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=两用型');?>">双乳刺激</a>
			</div>
			<a class="h_ff" target="_blank" href="<?php echo site_url('goods/femal');?>">
				<img alt="女性用品" src="http://s.qw.cc/themes/v4/css/ft/f2.jpg" width="123" height="75">
			</a>
		</div>
		<div class="h_fm">
	    	<a href="<?php echo site_url('goods/detail');?>" target="_blank">
	    		<img src="http://s.qw.cc/data/afficheimg/1449214998420055584.jpg" width="400" height="390">
	    	</a>
		</div>
		<div class="h_fr">
	        <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	        	<div class="f_am">
	        		斯巴达<em class="red">震动</em>
	        		仿真阳具<p>仿真阳具巅峰之作</p>
	        		<i>¥1380</i>
	        	</div>
	        	<img src="http://s.qw.cc/data/afficheimg/1441781720776336813.jpg" width="160" height="170" class="ha_po" />
	        </a>
	        <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	        	<div class="f_am">
	        		深度<em class="red">抽插</em>
	        		按摩棒<p>上下抽送 强劲力道</p>
	        		<i>¥1610</i>
	        	</div>
	        	<img src="http://s.qw.cc/data/afficheimg/1441781779482574595.jpg" width="160" height="170" class="ha_po">
	        </a>
	        <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	        	<div class="f_am">
	        		罗马大帝<em class="red">仿真</em>
	        		阳具<p>畅销逼真男根</p>
	        		<i>¥198</i>
	        	</div>
	        	<img src="http://s.qw.cc/data/afficheimg/1447915354219598613.jpg" width="160" height="170" class="ha_po"/>
	        </a>
	        <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	        	<div class="f_am">
	        		简爱<em class="red">智能恒温</em>
	        		按摩棒<p>升温至37.5°C</p>
	        		<i>¥338</i>
	        	</div>
	        	<img src="http://s.qw.cc/data/afficheimg/1458550848549445050.jpg" width="160" height="170" class="ha_po">
	        </a>
	     </div>
     </div>
     <div class="home-yanshi">
		 <p class="clear lh35">&nbsp;</p>
		 <div class="ov w_hd">
	    	<a href="<?php echo site_url('goods/detail');?>" target="_blank" rel="nofollow">
	    		<img src="http://s.qw.cc/data/afficheimg/1441780867067551921.jpg" width="1190" height="90">
	    	</a>
		 </div>
		 <p class="lh35">&nbsp;</p>
		 <div class="h_tt over">
			<em class="flor left">3F</em>
			<h2 class="left">
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>" class="h_ha">延时助情</a>
				<em class="gray pl5 f16">DELAY</em>
			</h2>
			<p class="right">
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank" class="gray">延时喷剂</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank" class="gray">情欲提升</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank" class="gray">助勃增大器</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=两用型');?>" target="_blank" class="org" rel="nofollow">更多>></a>
			</p>
		  </div>
		  <div class="h_fl">
			<div class="h_cat">
				<h3 class="mb5">男用延时</h3>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>" class="c_zon">延时喷剂</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">延时凝胶</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">延时精油</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">延时湿巾</a>
			</div>
			<div class="h_cat">
				<h3 class="mb5">情欲提升</h3>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">催性欲</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>" class="c_zon">高潮提升液</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">女用</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">男用</a>
			</div>
			<div class="h_cat">
				<h3 class="mb5">增大助勃</h3>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">高端增大器</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">电动锻炼</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">助勃器</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">手动锻炼</a>
			</div>
			<a class="h_ff" target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">
				<img alt="延时助情" src="http://s.qw.cc/themes/v4/css/ft/f3.jpg" width="123" height="75">
			</a>
		  </div>
		  <div class="h_fm">
	    	  <a href="<?php echo site_url('goods/detail');?>" target="_blank"><img src="http://s.qw.cc/data/afficheimg/1459134189557135269.jpg" width="400" height="390"></a>
		  </div>
		  <div class="h_fr">
	          <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	          	 <div class="f_am">
	          	 	女用<em class="red">高潮提升</em>
	          	 	精油<p>提升G点快感</p>
	          	 	<i>¥268</i>
	          	 </div>
	          	 <img src="http://s.qw.cc/data/afficheimg/1441782351374297020.jpg" width="160" height="170" class="ha_po">
	          </a>
	          <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	          	 <div class="f_am">
	          	 	<em class="red">电动夹吸</em>
	          	 	飞机杯<p>阴茎训练器与飞机杯结合</p>
	          	 	<i>¥459</i>
	          	 </div>
	          	 <img src="http://s.qw.cc/data/afficheimg/1448004202691270693.jpg" width="160" height="170" class="ha_po" />
	          </a>
	          <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	          	 <div class="f_am">
	          	 	<em class="red">女性情欲提升</em>
	          	 	强效凝露<p>强效发情催欲高潮液！</p>
	          	 	<i>¥499</i>
	          	 </div>
	          	 <img src="http://s.qw.cc/data/afficheimg/1459143488481780014.jpg" width="160" height="170" class="ha_po" />
	          </a>
	          <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	          	 <div class="f_am">
	          	 	强效<em class="red">调情挑逗</em>
	          	 	型香氛 <p>最强吸引异性"神器"</p>
	          	 	<i>¥198</i>
	          	 </div>
	          	 <img src = "http://s.qw.cc/data/afficheimg/1449039996246107799.jpg" width="160" height="170" class="ha_po"/>
	          </a>
	      </div>
      </div>
      <div class="home-qingqu">
	      <p class="clear lh35">&nbsp;</p>
	      <div class="h_tt over">
			<em class="flor left">4F</em>
			<h2 class="left">
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>" class="h_ha">情趣内衣</a>
				<em class="gray pl5 f16">LINGERIES</em>
			</h2>
			<p class="right">
				<a href="<?php echo site_url('goods/search?keyword=延时助情');?>" target="_blank" class="gray">性感裙装</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=延时助情');?>" target="_blank" class="gray">制服诱惑</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=延时助情');?>" target="_blank" class="gray">三点激情</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=延时助情');?>" target="_blank" class="gray">情趣内裤</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=延时助情');?>" target="_blank" class="gray">连体网衣</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=延时助情');?>" target="_blank" class="gray">情趣丝袜</a>
				<em class="vline">|</em>
				<a href="<?php echo site_url('goods/search?keyword=延时助情');?>" target="_blank" class="org" rel="nofollow">更多>></a>
			</p>
		  </div>
		  <div class="h_fl">
			<div class="h_cat">
				<h3 class="mb5">挑逗服饰</h3>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>" class="c_zon">火辣三点</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">连体网衣</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>" class="c_on">黑色丝袜</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">丁字裤</a>
			</div>
			<div class="h_cat">
				<h3 class="mb5">制服诱惑</h3>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">女仆</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">学生</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">护士</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">空姐</a>
			</div>
			<div class="h_cat">
				<h3 class="mb5">性感诱惑</h3>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">性感裙装</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>" class="c_zon">透视</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">开档丝袜</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">蕾丝</a>
			</div>
			<a class="h_ff" target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">
				<img alt="情趣内衣" src = "http://s.qw.cc/themes/v4/css/ft/f4.jpg" width="123" height="75">
			</a>
		 </div>
		 <div class="h_sex" id="h_sex">
            <a href="<?php echo site_url('goods/detail');?>" class="hx_a" target="_blank">
            	<img src="http://s.qw.cc/data/afficheimg/1454400614446268041.jpg" width="248" height="390"/>
            	<p class="sx_t"></p>
            </a>
            <a href="<?php echo site_url('goods/detail');?>" class="hx_a" target="_blank">
            	<img src="http://s.qw.cc/data/afficheimg/1441706343050175272.jpg" width="248" height="390">
            		<p class="sx_t"></p>
            	</a>
            <a href="<?php echo site_url('goods/detail');?>" class="hx_a" target="_blank">
            	<img src="http://s.qw.cc/data/afficheimg/1441706369696309198.jpg" width="248" height="390">
            	<p class="sx_t"></p>
            </a>
            <a href="<?php echo site_url('goods/detail');?>" class="hx_a" target="_blank">
            	<img src="http://s.qw.cc/data/afficheimg/1457420294119268664.jpg" width="248" height="390">
            	<p class="sx_t"></p>
            </a>
	     </div>
     </div>
     <div class="home-double-qingqu">
		 <p class="clear lh35">&nbsp;</p>
		 <div class="h_tt over">
		 	<em class="flor left">5F</em>
		 	<h2 class="left">
		 		<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>" class="h_ha">双人情趣</a>
		 		<em class="gray pl5 f16">LOVER</em>
		 	</h2>
		 	<p class="right">
		 		<a href="<?php echo site_url('goods/search?keyword=延时助情');?>" target="_blank" class="gray">体位道具</a>
		 		<em class="vline">|</em>
		 		<a href="<?php echo site_url('goods/search?keyword=延时助情');?>" target="_blank" class="gray">夫妻共振</a>
		 		<em class="vline">|</em>
		 		<a href="<?php echo site_url('goods/search?keyword=延时助情');?>" target="_blank" class="gray">捆绑调教</a>
		 		<em class="vline">|</em>
		 		<a href="<?php echo site_url('goods/search?keyword=延时助情');?>" target="_blank" class="gray">鞭打</a>
		 		<em class="vline">|</em>
		 		<a href="<?php echo site_url('goods/search?keyword=延时助情');?>" target="_blank" class="org" rel="nofollow">更多>></a>
		 	</p>
		 </div>
		 <div class="h_fl rel left">
			<div class="h_cat">
				<h3 class="mb5">挑逗</h3>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>" class="c_zon">体位道具</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">夫妻共振</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">捆绑调教</a>
			</div>
			<div class="h_cat">
				<h3 class="mb5">刑具</h3>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">手脚拷环</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">项圈脖套</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">乳夹口塞</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>" class="c_zon">鞭打</a>
			</div>
			<div class="h_cat">
				<h3 class="mb5">其他</h3>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">同性用品</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">头套眼罩</a>
				<a target="_blank" href=<?php echo site_url('goods/search?keyword=延时助情');?>>润滑剂</a>
				<a target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">性欲提升</a>
			</div>
			<a class="h_ff" target="_blank" href="<?php echo site_url('goods/search?keyword=延时助情');?>">
				<img alt="双人情趣" src="http://s.qw.cc/themes/v4/css/ft/f5.jpg" width="123" height="75" />
			</a>
		</div>
		<div class="h_fm">
			<a href="<?php echo site_url('goods/search?keyword=延时助情');?>" target="_blank"><img src="http://s.qw.cc/data/afficheimg/1449214950971513126.jpg" width="400" height="390"></a>
		</div>
		<div class="h_fr">
	        <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	        	<div class="f_am">
	        		遥控<em class="red">情侣共震</em>
	        		按摩器<p>TIANI 蒂阿妮二代</p>
	        		<i>¥1380</i>
	        	</div>
	        	<img src="http://s.qw.cc/data/afficheimg/1441782545242117551.jpg" width="160" height="170" class="ha_po">
	        </a>
	        <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	        	<div class="f_am">
	        		空心穿<em class="red">戴仿</em>
	        		真阳具<p>香港积之美</p>
	        		<i>¥168</i>
	        	</div>
	        	<img src="http://s.qw.cc/data/afficheimg/1441782602037227639.jpg" width="160" height="170" class="ha_po">
	        </a>
	        <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	        	<div class="f_am">
	        		Toughage高级性爱<em class="red">蹦床</em>
	        		<p>各种姿势任你摆</p>
	        		<i>¥429</i>
	        	</div>
	        	<img src="http://s.qw.cc/data/afficheimg/1441782642682829101.jpg" width="160" height="170" class="ha_po">
	        </a>
	        <a href="<?php echo site_url('goods/detail');?>" class="f_aa" target="_blank">
	        	<div class="f_am">
	        		夫妻<em class="red">共震</em>
	        		器自慰器<p>APP远程遥控</p>
	        		<i>¥1580</i>
	        	</div>
	        	<img src="http://s.qw.cc/data/afficheimg/1441782691017318240.jpg" width="160" height="170" class="ha_po">
	        </a>
	    </div>
    </div>
    <div class="home-advert">
		<p class="clear lh35">&nbsp;</p>
		<div class="ov w_hd">
	    	<a href="<?php echo site_url('goods/detail');?>" target="_blank" rel="nofollow">
	    		<img src="http://s.qw.cc/data/afficheimg/1441780892113456140.jpg" width="1190" height="90">
	    	</a>
		</div>
	</div>
	<div class="home-other">
		<p class="lh35">&nbsp;</p>
		<div class="h_df over">
			<div class="z3 mr10">
				<div class="bl_red fB alR">
					<strong class="left">订单查询</strong>
					<a href="<?php echo $this->config->ucenter_url;?>" rel="nofollow" class="fN gray f12" target="_blank">会员登录查看></a>
				</div>
				<p class="pl10 pt10 alC">
					<img src="http://s.qw.cc/themes/v4/css/2/homewx.png" width="314" height="132" alt="查询物流、咨询售后、产品使用方法，请关注微信号:趣网">
				</p>
			</div>
			<div class="z3 mr10">
				<h3 class="bl_red alR">
					<strong class="left">成人用品资讯</strong>
					<a href="<?php echo $this->config->help_url;?>" target="_blank" class="fN gray" rel="nofollow">more></a>
				</h3>
				<?php if ($infor->num_rows()>0):?>
				<ul class="h_zx">
				    <?php foreach ($infor->result() as $item):?>
					<li><a href="<?php echo $this->config->help_url.'help_center/detail/'.$item->id.'.html';;?>" target="_blank"><?php echo $item->sub_title;?></a></li>
					<?php endforeach;?>
				</ul>
				<?php endif;?>
			</div>
			<div class="z3">
				<h3 class="bl_red alR">
					<strong class="left">情趣品牌</strong>
					<a href="javascript:;" target="_blank" class="fN gray" rel="nofollow">more></a>
				</h3>
				<?php if(count($brand)>0):?>
				<?php foreach ($brand as $key=>$item):?>
				<a href="javascript:;" class="h_brd" title="杜蕾斯" target="_blank">
					<img src="<?php echo $this->config->show_image_url('brand',$item['brand_logo']);?>" width="90" height="40" alt="<?php echo $item['brand_name'];?>"/>
				</a>
				<?php endforeach;?>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
<div class="hs_t" id="home_top">
	<div class="w">
		<a href="javascript:;" class="mt5 left">
			<img src="miaow/images/mcw2.png"/>
		</a>
		<div id="search" class="left home-search" style="margin:0 110px;">
			<form action="<?php echo site_url('goods/search');?>" method="get"  class="ov">
				<input type="text"  name="keyword" autocomplete="off" x-webkit-speech="" class="shl left" placeholder="想凉快吗？点我！" />
				<input type="submit" class="left shr" title="点击搜索" value="搜索">
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php $this->load->view('layout/footer');?>
