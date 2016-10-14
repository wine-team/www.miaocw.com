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
	<?php if (!empty($cms_block['head_right_advert'])):?>
	<a class="h_pre" href="javascript:;">&lt;</a>
	<a class="h_nxt" href="javascript:;">&gt;</a>
	<p id="hr_a" class="ov">
	    <?php echo $cms_block['head_right_advert'];?>
	</p>
	<?php endif;?>
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
	<div class="chosen-box clf">
        <div class="chosen-menu fl">
	        <h2 class="chosen-title chosen-title-biyuntao">
				<i class="chosen-title-floor">1</i>
				<span>避孕套</span>
			</h2>
			<ul class="chosen-aside">
				<li class="chosen-aside-item clf current">
					<span class="serial-number">1</span>
					<a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-3539.html">
						<img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/a6d18918b03e67b8527a0460bdd4c531.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt="">
					</a>
					<a class="chosen-aside-name" target="_blank" href="/goods-3539.html">
						【新品】尚牌 泰国进口至尊超薄003 20片装避孕套
					</a>
					<p class="chosen-aside-price hide">￥49.00</p>
				</li>
				<li class="chosen-aside-item clf">
	                <span class="serial-number">2</span>
	                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-2044.html">
	                	<img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/ca251a4c270c7bd428c355a328808ac6.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt="">
	                </a>
	                <a class="chosen-aside-name" target="_blank" href="/goods-2044.html">
	                	冈本 世界最薄0.01安全套 红色/黑色限量包装 日本原装进口
	                </a>
	                <p class="chosen-aside-price hide">￥69.00</p>
              	</li>
				<li class="chosen-aside-item clf">
                	<span class="serial-number">3</span>
	                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-405.html">
	                	<img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/f84d401463dcbf9fe6214b2bcb6f40b9.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/>
	                </a>
                	<a class="chosen-aside-name" target="_blank" href="/goods-405.html">
                		【包邮】杜蕾斯 紧型装安全套12只装送2只紧型超薄 小号延迟持久套
                	</a>
                	<p class="chosen-aside-price hide">￥45.00</p>
              	</li>
              	<li class="chosen-aside-item clf">
                	<span class="serial-number">4</span>
                	<a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-492.html">
                		<img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/ac4f69c95c2d3b74f890ab476d3f35f8.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/>
                	</a>
                	<a class="chosen-aside-name" target="_blank" href="/goods-492.html">
                		【新品】大象 超薄/紧致/延时 28只装 多样组合装避孕套
                	</a>
                	<p class="chosen-aside-price hide">￥29.00</p>
              	</li>
              	<li class="chosen-aside-item clf">
                	<span class="serial-number">5</span>
                	<a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-1567.html">
                		<img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/70d47cf4dda53c7cd99d1b3c7daa8de4.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/>
                	</a>
                	<a class="chosen-aside-name" target="_blank" href="/goods-1567.html">
                		杜蕾斯 激爽四合一超值32只 买套餐低至1元/片
                	</a>
                	<p class="chosen-aside-price hide">￥59.00</p>
              	</li>
              	<li class="chosen-aside-item clf  ">
                	<span class="serial-number">6</span>
                	<a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-23.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/f471b2e693ae7bae55b2a0d26856ac02.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                	<a class="chosen-aside-name" target="_blank" href="/goods-23.html">杜蕾斯 51只装AIR超薄组合装避孕套 超值量贩超薄套</a>
                	<p class="chosen-aside-price hide">￥79.00</p>
              	</li>
              	<li class="chosen-aside-item clf  ">
                	<span class="serial-number">7</span>
                	<a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-2046.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/88a47b8d0a2477f16e03ae89e8dc322d.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
               		<a class="chosen-aside-name" target="_blank" href="/goods-2046.html">【包邮】相模Sagami进口002安全套超薄3只装/6只装</a>
                	<p class="chosen-aside-price hide">￥39.00</p>
              	</li>
              	<li class="chosen-aside-item clf">
                	<span class="serial-number">8</span>
                	<a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-3389.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/f0afd25b40ce9b792d935e9a31ec22a8.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                	<a class="chosen-aside-name" target="_blank" href="/goods-3389.html">尚牌 004超薄避孕套86只超值组合装 送好礼</a>
                	<p class="chosen-aside-price hide">￥65.00</p>
              	</li>
              	<li class="chosen-aside-item clf  ">
                	<span class="serial-number">9</span>
                	<a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-816.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/cb44b934bbc1f3d4b3a67480f094114c.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                	<a class="chosen-aside-name" target="_blank" href="/goods-816.html">【送扑克】名流 粒螺纹带刺组合40只装避孕套 冰火/颗粒/螺纹套装</a>
                	<p class="chosen-aside-price hide">￥25.00</p>
              	</li>
              	<li class="chosen-aside-item clf  ">
                	<span class="serial-number">10</span>
                	<a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-562.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/e17df25f93233f8284f6a6e10714f292.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                	<a class="chosen-aside-name" target="_blank" href="/goods-562.html">【最多加送5片】包邮 杜蕾斯 持久3/8/12装避孕套苯佐卡因延迟射精</a>
                	<p class="chosen-aside-price hide">￥39.00</p>
              	</li>
			</ul>
        </div>
        <div class="chosen-list-box fl">
        	<div class="chosen-list-cate relative">
        		 <ul>
	              	<li>
	                  <a href="/list/cbiyuntao-a2.0-oweight_desc.html" target="_blank" title="极致超薄">极致超薄</a>
	                </li>
	                <li>
	                  <a href="/list/cbiyuntao-a59.0-oweight_desc.html" target="_blank" title="持久紧绷">持久紧绷</a>
	                </li>
	                <li>
	                  <a href="/list/cbiyuntao-a1.0-oweight_desc.html" target="_blank" title="加倍润滑">加倍润滑</a>
	                </li>
	                <li>
	                  <a href="/list/cbiyuntao-a3.0-oweight_desc.html" target="_blank" title="螺纹颗粒">螺纹颗粒</a>
	                </li>
	                <li>
	                  <a href="/list/cbiyuntao-a63.0-oweight_desc.html" target="_blank" title="原装进口">原装进口</a>
	                </li>
	                <li>
	                  <a href="/list/cbiyuntao-a60.0-oweight_desc.html" target="_blank" title="超值组合">超值组合</a>
	                </li>
	                <li>
	                  <a href="/list/cbiyuntao-a99.0-oweight_desc.html" target="_blank" title="芳香果味">芳香果味</a>
	                </li>
	                <li>
	                  <a href="/list/cbiyuntao-a62.0-oweight_desc.html" target="_blank" title="女性专用">女性专用</a>
	                </li>
	              </ul>
	              <a href="/biyuntao.html" target="_blank" class="chosen-list-more">所有<i class="chosen-list-arrow"></i></a>
        	</div>
        	<ul class="chosen-list relative clf">
	             <li class="chosen-item" style="left: 0px; top: 0px; width: 558px; height: 460px;">
	                <a href="http://www.taqu.cn/list/cbiyuntao-a3.0-oweight_desc.html" target="_blank" title="螺纹颗粒避孕套专题">
	                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/4953bd7c78510df4bf2562f0f99edeb1.jpg" alt="螺纹颗粒避孕套专题" rel="nofollow" />
	                </a>
	             </li>
	             <li class="chosen-item" style="left: 558px; top: 0px; width: 418px; height: 230px;">
	                <a href="http://www.taqu.cn/goods-1567.html" target="_blank" title="杜蕾斯激爽四合一32只 · 低至0.9元/片">
	                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/c8b20c0b952836a295f70ca300251624.jpg" alt="杜蕾斯激爽四合一32只 · 低至0.9元/片" rel="nofollow" />
	                </a>
	             </li>
	             <li class="chosen-item" style="left: 558px; top: 230px; width: 210px; height: 230px;">
	                <a href="http://www.taqu.cn/goods-1874.html" target="_blank" title="冈本激薄/纯/酷玩27只 · 全网最低2元/片">
	                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/8756e9d8b3e5444bcee19b03c65a7d8d.jpg" alt="冈本激薄/纯/酷玩27只 · 全网最低2元/片" rel="nofollow" />
	                </a>
	             </li>
	             <li class="chosen-item" style="left: 768px; top: 230px; width: 208px; height: 230px;">
	                <a href="http://www.taqu.cn/goods-2055.html" target="_blank" title="陌陌铁罐38只超值装 · 马口铁盒精致高端">
	                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/51699650d0c4f23b7c0522b00165cf35.jpg" alt="陌陌铁罐38只超值装 · 马口铁盒精致高端" rel="nofollow" />
	                </a>
	              </li>
              </ul>
        </div>
    </div>
	 <div class="chosen-box clf">
        <div class="chosen-menu fl">
          <h2 class="chosen-title chosen-title-neiyi"><i class="chosen-title-floor">2</i><span>情趣内衣</span></h2>
          <ul class="chosen-aside">
            <li class="chosen-aside-item clf current ">
                <span class="serial-number">1</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-3242.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/8bc17c51dc7977e0c870130434358b19.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-3242.html">【买1送6】包邮 海德娜娜小清新和果子印花日系和服浴衣春秋款罩衫</a>
                <p class="chosen-aside-price hide">￥99.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">2</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-2280.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/0edb44727c8ec0d79f03ce2f5c4f652a.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-2280.html">中国古典肚兜性感挂脖绑带情趣诱惑肚兜T裤 2件套</a>
                <p class="chosen-aside-price hide">￥19.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">3</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-185.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/0ea2d9017c984e540ad99f2b6e8cb5ae.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-185.html">性感薄纱透明蕾丝睡衣诱惑内衣T裤睡裙 2件套</a>
                <p class="chosen-aside-price hide">￥19.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">4</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-3174.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/cb26716fe9ca4266826a487c737d05b1.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-3174.html">【买1送3】包邮海德娜娜 雪纺浴袍情趣睡衣日式和服薄纱睡裙套装</a>
                <p class="chosen-aside-price hide">￥49.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">5</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-2855.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/130b27b5d38de9d9c1017ed56d02dae7.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-2855.html">【包邮】艾丝葵 甜蜜习惯 蕾丝刺绣透明网眼丁字开档T裤内裤</a>
                <p class="chosen-aside-price hide">￥29.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">6</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-2518.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/a830b947d89e86bf75ee491817862722.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-2518.html">【包邮】学生空姐女警职业OL修身短裙制服诱惑 4件套</a>
                <p class="chosen-aside-price hide">￥45.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">7</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-2522.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/239fedaeb158d13323ff58682b05f3f9.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-2522.html">学生校服蝴蝶结清纯学生妹分体制服 两色</a>
                <p class="chosen-aside-price hide">￥29.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">8</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-311.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/gallery/TB2QI.CcFXXXXcrXXXXXXXXXXXX468359490.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-311.html">免脱四面开裆镂空性感黑色丝袜</a>
                <p class="chosen-aside-price hide">￥15.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">9</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-2708.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/1b81e7dbeda1f153055548dc723c6a01.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-2708.html">【买1送6】selebritee 诱惑复古孔雀羽纹吊袜带旗袍3件套</a>
                <p class="chosen-aside-price hide">￥79.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">10</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-1467.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/751cf1c29e21b39d33d1c58b4d97fe24.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-1467.html">selebritee 进口超薄性感爽滑长筒袜吊袜带套装</a>
                <p class="chosen-aside-price hide">￥29.00</p>
              </li>          </ul>
        </div>
        <div class="chosen-list-box fl">
          <div class="chosen-list-cate relative">
            <ul>
              <li>
                  <a href="/list/cneiyi-a36.0-oweight_desc.html" target="_blank" title="性感睡裙">性感睡裙</a>
                </li><li>
                  <a href="/list/cneiyi-a37.0-oweight_desc.html" target="_blank" title="制服诱惑">制服诱惑</a>
                </li><li>
                  <a href="/list/cneiyi-a38.0-oweight_desc.html" target="_blank" title="三点/文胸">三点/文胸</a>
                </li><li>
                  <a href="/list/cneiyi-a39.0-oweight_desc.html" target="_blank" title="连身袜/网衣">连身袜/网衣</a>
                </li><li>
                  <a href="/list/cneiyi-a40.0-oweight_desc.html" target="_blank" title="丝袜/网袜">丝袜/网袜</a>
                </li><li>
                  <a href="/list/cneiyi-a41.0-oweight_desc.html" target="_blank" title="情趣内裤">情趣内裤</a>
                </li><li>
                  <a href="/list/cneiyi-a42.0-oweight_desc.html" target="_blank" title="马甲束腰">马甲束腰</a>
                </li><li>
                  <a href="/list/cneiyi-a43.0-oweight_desc.html" target="_blank" title="男士内衣裤">男士内衣裤</a>
                </li>            </ul>
            <a href="/neiyi.html" target="_blank" class="chosen-list-more">所有<i class="chosen-list-arrow"></i></a>
          </div>
          <ul class="chosen-list relative clf">
            <li class="chosen-item" style="left: 0px; top: 0px; width: 346px; height: 460px;">
                <a href="http://www.taqu.cn/goods-3174.html" target="_blank" title="雪纺浴袍情趣睡衣3件套 · 若隐若现的性感">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/e39c4087084610e410cb3d1c4cfec78f.jpg" alt="雪纺浴袍情趣睡衣3件套 · 若隐若现的性感" rel="nofollow" />
                </a>
              </li><li class="chosen-item" style="left: 346px; top: 0px; width: 309px; height: 234px;">
                <a href="http://www.taqu.cn/goods-2342.html" target="_blank" title="艾丝葵精致刺绣T裤 · 透视诱惑免脱开干">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/ac42b72e88a19518adc170c615e6a625.jpg" alt="艾丝葵精致刺绣T裤 · 透视诱惑免脱开干" rel="nofollow" />
                </a>
              </li><li class="chosen-item" style="left: 346px; top: 234px; width: 309px; height: 226px;">
                <a href="http://www.taqu.cn/goods-2139.html" target="_blank" title="薄款过膝长筒丝袜 · 极致肤感防勾丝">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/5238a476d2812dbfe5d00eed1fe11b04.jpg" alt="薄款过膝长筒丝袜 · 极致肤感防勾丝" rel="nofollow" />
                </a>
              </li><li class="chosen-item" style="left: 655px; top: 0px; width: 321px; height: 460px;">
                <a href="http://www.taqu.cn/goods-2518.html" target="_blank" title="空姐女警职业装制服 · 性感修身爆乳诱惑">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/ed879175550421c692812137e05ccc09.jpg" alt="空姐女警职业装制服 · 性感修身爆乳诱惑" rel="nofollow" />
                </a>
              </li>          </ul>
        </div>
      </div><div class="chosen-box clf">
        <div class="chosen-menu fl">
          <h2 class="chosen-title chosen-title-man"><i class="chosen-title-floor">3</i><span>男用玩具</span></h2>
          <ul class="chosen-aside">
            <li class="chosen-aside-item clf current ">
                <span class="serial-number">1</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-1929.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/b55651f5c1f1220e3c67cf7d5383dec8.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-1929.html">日本Rends双穴贯通 真阴夹吸双钻飞机杯</a>
                <p class="chosen-aside-price hide">￥99.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">2</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-3387.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/f40fa29fbea42849f4e1072732ca8930.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-3387.html">伊娃 女优少妇名器系列 仿真名器</a>
                <p class="chosen-aside-price hide">￥39.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">3</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-3425.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/ba7310900d7a546b034e1aa047d5ec7e.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-3425.html">【新品】妙音叫床 全自动活塞 双震动呻吟发音飞机杯</a>
                <p class="chosen-aside-price hide">￥189.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">4</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-1593.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/854907aad200f303c742e7b0289a16a1.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-1593.html">琦莎HAPPY免提飞机杯二合一阴口互换杯</a>
                <p class="chosen-aside-price hide">￥138.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">5</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-3536.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/a0f29339b39f275979422cafdba015d6.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-3536.html">key电动飞机杯 男用自慰器全自动抽插免提飞机杯</a>
                <p class="chosen-aside-price hide">￥99.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">6</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-1535.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/899025f6bf87d4c057f41ce0a768b731.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-1535.html">撸撸杯 会夹吸飞机杯 男用飞机杯</a>
                <p class="chosen-aside-price hide">￥79.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">7</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-3076.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/c377f97111f1fb5c7b797c42a0514509.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-3076.html">EVO 仿真肉感名穴倒模名器 伊娃系列少女萝莉学妹名器</a>
                <p class="chosen-aside-price hide">￥39.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">8</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-2398.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/00c6fb6dac331c2a954932a46620fa13.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-2398.html">【69元疯抢】Nano男用处女真阴夹吸飞机杯 自慰器</a>
                <p class="chosen-aside-price hide">￥69.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">9</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-1179.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/17a8eb4e53fb46e99d2107d1ce36c966.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-1179.html">EVO豪华版阴茎增大器助勃器电动训练神器</a>
                <p class="chosen-aside-price hide">￥199.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">10</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-3457.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/bb17718a54dab897a17273efdfc712e4.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-3457.html">贵美人 跪姿大屁股 真人夹吸自慰名器倒模</a>
                <p class="chosen-aside-price hide">￥189.00</p>
              </li>          </ul>
        </div>
        <div class="chosen-list-box fl">
          <div class="chosen-list-cate relative">
            <ul>
              <li>
                  <a href="/list/cman-a9.0-oweight_desc.html" target="_blank" title="手动飞机杯">手动飞机杯</a>
                </li><li>
                  <a href="/list/cman-a8.0-oweight_desc.html" target="_blank" title="电动飞机杯">电动飞机杯</a>
                </li><li>
                  <a href="/list/cman-a10.0-oweight_desc.html" target="_blank" title="女优名器">女优名器</a>
                </li><li>
                  <a href="/list/cman-a11.0-oweight_desc.html" target="_blank" title="增大助勃器">增大助勃器</a>
                </li><li>
                  <a href="/list/cman-a16.0-oweight_desc.html" target="_blank" title="前列腺刺激">前列腺刺激</a>
                </li><li>
                  <a href="/list/cman-a12.0-oweight_desc.html" target="_blank" title="延时锁精">延时锁精</a>
                </li><li>
                  <a href="/list/cman-a14.0-oweight_desc.html" target="_blank" title="包茎矫正">包茎矫正</a>
                </li><li>
                  <a href="/list/cman-a13.0-oweight_desc.html" target="_blank" title="水晶套">水晶套</a>
                </li><li>
                  <a href="/list/cman-a134.0-oweight_desc.html" target="_blank" title="充气娃娃">充气娃娃</a>
                </li>            </ul>
            <a href="/man.html" target="_blank" class="chosen-list-more">所有<i class="chosen-list-arrow"></i></a>
          </div>
          <ul class="chosen-list relative clf">
            <li class="chosen-item" style="left: 0px; top: 0px; width: 558px; height: 460px;">
                <a href="http://www.taqu.cn/goods-2911.html" target="_blank" title="BKK智能飞机杯">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/0730466c344455f988ebed80478ddc8e.jpg" alt="BKK智能飞机杯" rel="nofollow" />
                </a>
              </li><li class="chosen-item" style="left: 558px; top: 0px; width: 418px; height: 230px;">
                <a href="http://www.taqu.cn/goods-2938.html" target="_blank" title="日本Rends 负压语音男用自慰器飞机杯">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/d1869d0701a4c54ee43f4f88c97dd21a.jpg" alt="日本Rends 负压语音男用自慰器飞机杯" rel="nofollow" />
                </a>
              </li><li class="chosen-item" style="left: 558px; top: 230px; width: 210px; height: 230px;">
                <a href="http://www.taqu.cn/goods-1179.html" target="_blank" title="EVO豪华版阴茎增大器助勃器电动训练神器">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/aeb24c4ef34eb907c45bbf86500fa2ae.jpg" alt="EVO豪华版阴茎增大器助勃器电动训练神器" rel="nofollow" />
                </a>
              </li><li class="chosen-item" style="left: 768px; top: 230px; width: 208px; height: 230px;">
                <a href="http://www.taqu.cn/goods-135.html" target="_blank" title="日本AVSTAR波多野结衣名器倒模">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/1428617c2453de482ef71cfc99b85e53.jpg" alt="日本AVSTAR波多野结衣名器倒模" rel="nofollow" />
                </a>
              </li>          </ul>
        </div>
      </div><div class="chosen-box clf">
        <div class="chosen-menu fl">
          <h2 class="chosen-title chosen-title-woman"><i class="chosen-title-floor">4</i><span>女用玩具</span></h2>
          <ul class="chosen-aside">
            <li class="chosen-aside-item clf current ">
                <span class="serial-number">1</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-1118.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/87a645ff5692188338007c6747922a93.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-1118.html">私享玩趣 桑巴丽影 强力变频防水静音跳蛋</a>
                <p class="chosen-aside-price hide">￥49.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">2</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-289.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/53d86495247dfd599aa74e5003289e89.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-289.html">杜蕾斯 V焕觉 多速G点振动棒</a>
                <p class="chosen-aside-price hide">￥89.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">3</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-401.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/028da6caaac4ed4106b5987b7bebdc02.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-401.html">品色伸缩转珠震动按摩AV棒</a>
                <p class="chosen-aside-price hide">￥49.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">4</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-2210.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/gallery/TB2ZTpwdFXXXXbOXpXXXXXXXXXX468359490.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-2210.html">EVO加温火焰无线充电智能遥控加热恒温跳蛋</a>
                <p class="chosen-aside-price hide">￥138.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">5</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-3146.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/d5902d47af36e11934c2e44f1d5b8073.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-3146.html">EVO 多娜G点外阴双刺激震动按摩棒女性奢华双震棒</a>
                <p class="chosen-aside-price hide">￥169.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">6</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-3472.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/af5a4e54608e173b818159e077994a04.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-3472.html">【新品】百乐仿真舌头 电动旋转震动口交魔舌 女用自慰器震动棒</a>
                <p class="chosen-aside-price hide">￥69.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">7</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-3364.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/aeabde570d48eb3a679fb5280dabbd8b.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-3364.html">【新品】名流震动棒 女用自慰器自动抽插高潮激情用具跳蛋</a>
                <p class="chosen-aside-price hide">￥69.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">8</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-861.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/e6b26fc4d589caf433c01f62147638b2.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-861.html">百乐派蒂菈双重震动棒 静音防水</a>
                <p class="chosen-aside-price hide">￥69.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">9</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-3494.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/3ae627b976590c9c53e6609813125e34.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-3494.html">【新品】蒂贝 萌萌兔 嬉皮兔 防水跳蛋阴蒂刺激按摩震动器</a>
                <p class="chosen-aside-price hide">￥88.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">10</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-2322.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/5244c096adbecd6b36e4dd9f507550f7.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-2322.html">EVO皇冠静音女用性自慰器强力振动棒</a>
                <p class="chosen-aside-price hide">￥79.00</p>
              </li>          </ul>
        </div>
        <div class="chosen-list-box fl">
          <div class="chosen-list-cate relative">
            <ul>
              <li>
                  <a href="/list/cwoman-a24.0-oweight_desc.html" target="_blank" title="G点刺激">G点刺激</a>
                </li><li>
                  <a href="/list/cwoman-a22.0-oweight_desc.html" target="_blank" title="AV棒">AV棒</a>
                </li><li>
                  <a href="/list/cwoman-a21.0-oweight_desc.html" target="_blank" title="转珠棒">转珠棒</a>
                </li><li>
                  <a href="/list/cwoman-a25.0-oweight_desc.html" target="_blank" title="情趣跳蛋">情趣跳蛋</a>
                </li><li>
                  <a href="/list/cwoman-a23.0-oweight_desc.html" target="_blank" title="缩阴丰胸">缩阴丰胸</a>
                </li><li>
                  <a href="/list/cwoman-a29.0-oweight_desc.html" target="_blank" title="仿真阳具">仿真阳具</a>
                </li><li>
                  <a href="/list/cwoman-a27.0-oweight_desc.html" target="_blank" title="后庭玩具">后庭玩具</a>
                </li><li>
                  <a href="/list/cwoman-a120.0-oweight_desc.html" target="_blank" title="女同拉拉">女同拉拉</a>
                </li>            </ul>
            <a href="/woman.html" target="_blank" class="chosen-list-more">所有<i class="chosen-list-arrow"></i></a>
          </div>
          <ul class="chosen-list relative clf">
            <li class="chosen-item" style="left: 0px; top: 0px; width: 558px; height: 460px;">
                <a href="http://www.taqu.cn/goods-3312.html" target="_blank" title="怪兽趴智能健康震蛋 健康版（智能APP遥控）">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/da5689c28751ff966f909a2b4dd61e8e.jpg" alt="怪兽趴智能健康震蛋 健康版（智能APP遥控）" rel="nofollow" />
                </a>
              </li><li class="chosen-item" style="left: 558px; top: 0px; width: 418px; height: 230px;">
                <a href="http://www.taqu.cn/goods-2300.html" target="_blank" title="雷霆Lucy(露西)四叶草i智能震动棒女用穿戴震蝴蝶">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/a912a68a3c1947e1623977d2d10d4328.jpg" alt="雷霆Lucy(露西)四叶草i智能震动棒女用穿戴震蝴蝶" rel="nofollow" />
                </a>
              </li><li class="chosen-item" style="left: 558px; top: 230px; width: 210px; height: 230px;">
                <a href="http://www.taqu.cn/goods-3327.html" target="_blank" title="【新品】iogle 大白智能震动棒">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/5891f513723001da185f857af9fbd696.jpg" alt="【新品】iogle 大白智能震动棒" rel="nofollow" />
                </a>
              </li><li class="chosen-item" style="left: 768px; top: 230px; width: 208px; height: 230px;">
                <a href="http://www.taqu.cn/goods-3146.html" target="_blank" title="EVO 多娜G点外阴双刺激震动按摩棒女性奢华双震棒">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/a6b9f203121adf735cd0c6c702a3d3f7.jpg" alt="EVO 多娜G点外阴双刺激震动按摩棒女性奢华双震棒" rel="nofollow" />
                </a>
              </li>          </ul>
        </div>
      </div><div class="chosen-box clf">
        <div class="chosen-menu fl">
          <h2 class="chosen-title chosen-title-cuiqing"><i class="chosen-title-floor">5</i><span>延时催情</span></h2>
          <ul class="chosen-aside">
            <li class="chosen-aside-item clf current ">
                <span class="serial-number">1</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-3379.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/37f2c6c36f6b92360a73e2062d7bebda.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-3379.html">【包邮】丸奈 男性外用久战喷剂 持久不麻木外用喷剂 15ml</a>
                <p class="chosen-aside-price hide">￥89.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">2</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-593.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/f3d31e5769c2d327334cd37867b95401.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-593.html">倍耐力 男用持久喷剂二代纯植物提取15ml 年度激动价</a>
                <p class="chosen-aside-price hide">￥39.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">3</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-2923.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/7ebd87a00b4d4eec7ea64039ff936923.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-2923.html">【包邮】德国 树志机宜 男仕活力外用喷剂 15Ml</a>
                <p class="chosen-aside-price hide">￥98.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">4</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-968.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/1d2cfe92102503a6763de4c363e72a53.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-968.html">Tatai 强效助情女用兴奋液 进口高潮凝露 10ml</a>
                <p class="chosen-aside-price hide">￥49.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">5</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-292.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/gallery/4f99e28520dc89640dec180b203069de.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-292.html">【包邮】美国KEYO 女用快感增强液 激发性欲助情助兴15ml</a>
                <p class="chosen-aside-price hide">￥109.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">6</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-1469.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/3574d2d57e607e59692359ef2982de89.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-1469.html">【包邮】藏帝 纯植物男用喷剂 藏药秘方男用喷剂 15ml</a>
                <p class="chosen-aside-price hide">￥198.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">7</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-3378.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/f2202b24d7df92ca0b1b613c4d0bba9f.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-3378.html">【新品】丸奈 男用喷剂房事外用 延长喷雾夫妻成人情趣用品 10ml</a>
                <p class="chosen-aside-price hide">￥79.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">8</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-109.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/22d9bed1752f3dc7a83f9c981e564cff.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-109.html">【包邮】日本JOKER一代男用持久喷剂 延缓射精不麻木 8ml</a>
                <p class="chosen-aside-price hide">￥79.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">9</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-2890.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/e5e9f7f72a306ed38cdd00085c858a0a.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-2890.html">【包邮】人初油 金装加强版男用喷剂 外用气雾剂</a>
                <p class="chosen-aside-price hide">￥39.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">10</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-1878.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/gallery/fabb4685e29dd701eea69975803d4414.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-1878.html">人初油 湿巾10片装 持久防早泄不麻木</a>
                <p class="chosen-aside-price hide">￥35.00</p>
              </li>          </ul>
        </div>
        <div class="chosen-list-box fl">
          <div class="chosen-list-cate relative">
            <ul>
              <li>
                  <a href="/list/ccuiqing-a46.0-oweight_desc.html" target="_blank" title="延时喷剂">延时喷剂</a>
                </li><li>
                  <a href="/list/ccuiqing-a47.0-oweight_desc.html" target="_blank" title="延时湿巾">延时湿巾</a>
                </li><li>
                  <a href="/list/ccuiqing-a48.0-oweight_desc.html" target="_blank" title="女用催情">女用催情</a>
                </li><li>
                  <a href="/list/ccuiqing-a49.0-oweight_desc.html" target="_blank" title="私处养护">私处养护</a>
                </li><li>
                  <a href="/list/ccuiqing-a50.0-oweight_desc.html" target="_blank" title="消毒清洗">消毒清洗</a>
                </li><li>
                  <a href="/list/ccuiqing-a51.0-oweight_desc.html" target="_blank" title="保健食品">保健食品</a>
                </li>            </ul>
            <a href="/cuiqing.html" target="_blank" class="chosen-list-more">所有<i class="chosen-list-arrow"></i></a>
          </div>
          <ul class="chosen-list relative clf">
            <li class="chosen-item" style="left: 500px; top: 1px; width: 475px; height: 230px;">
                <a href="http://www.taqu.cn/goods-2923.html" target="_blank" title="德国 树志机宜 男仕活力外用喷剂 15Ml">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/135031e541e88a1848f7e7d5ae33d739.jpg" alt="德国 树志机宜 男仕活力外用喷剂 15Ml" rel="nofollow" />
                </a>
              </li><li class="chosen-item" style="left: 500px; top: 231px; width: 238px; height: 230px;">
                <a href="http://www.taqu.cn/goods-292.html" target="_blank" title="美国KEYO 女用快感增强液 激发性欲助情助兴15ml">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/01c590846f2f724a3b742c200c5eed07.jpg" alt="美国KEYO 女用快感增强液 激发性欲助情助兴15ml" rel="nofollow" />
                </a>
              </li><li class="chosen-item" style="left: 738px; top: 231px; width: 237px; height: 230px;">
                <a href="http://www.taqu.cn/goods-520.html" target="_blank" title="美国Sensuva女用活力唤醒凝胶 提升性欲敏感度 5ml">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/08c62439640c40fe79c7d419957087e4.jpg" alt="美国Sensuva女用活力唤醒凝胶 提升性欲敏感度 5ml" rel="nofollow" />
                </a>
              </li><li class="chosen-item" style="left: 0px; top: 0px; width: 501px; height: 460px;">
                <a href="http://www.taqu.cn/goods-1469.html" target="_blank" title="藏帝 纯植物男用喷剂 藏药秘方男用喷剂 15ml">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/75619146988bef0e7b08cb5c2bac543e.jpg" alt="藏帝 纯植物男用喷剂 藏药秘方男用喷剂 15ml" rel="nofollow" />
                </a>
              </li>          </ul>
        </div>
      </div><div class="chosen-box clf">
        <div class="chosen-menu fl">
          <h2 class="chosen-title chosen-title-tiaoqing"><i class="chosen-title-floor">6</i><span>调情助兴</span></h2>
          <ul class="chosen-aside">
            <li class="chosen-aside-item clf current ">
                <span class="serial-number">1</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-17.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/d1155f60d8badf409142e96643ad2728.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-17.html">【包邮】杜蕾斯 冰火快感人体润滑液 快感/热感 50ml</a>
                <p class="chosen-aside-price hide">￥39.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">2</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-1465.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/2225bc7a58210e5c6a2dcb00b34b3090.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-1465.html">【包邮】德国EROS 伊露丝 高级莹润水基润滑液 50ml</a>
                <p class="chosen-aside-price hide">￥39.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">3</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-169.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/e4cdaf114984bda8e331012fb15466fb.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-169.html">杜蕾斯缓怡情按摩润滑油 芦荟/依兰花香可选 200ml</a>
                <p class="chosen-aside-price hide">￥55.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">4</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-2894.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/ada997b42089f1641b143669a3714b7c.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-2894.html">【超值】独爱 费洛蒙信息素香水 助情调情香水 29ml</a>
                <p class="chosen-aside-price hide">￥68.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">5</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-60.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/gallery/T2YztaXv8aXXXXXXXX468359490.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-60.html">德国EROS 润滑喷雾剂 冰凉感受 肛门松弛 轻松扩肛 拒绝疼痛</a>
                <p class="chosen-aside-price hide">￥129.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">6</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-2189.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/0a5611fe53ef54f4fba7052b5320298f.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-2189.html">【包邮】美国MOVO 挑逗型费洛蒙男女香水 80ml</a>
                <p class="chosen-aside-price hide">￥198.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">7</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-9.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/gallery/T2TERpXchOXXXXXXXX468359490.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-9.html">【超值】美国骇客夫妻合欢无重力性爱椅 性爱辅助性多功能家具</a>
                <p class="chosen-aside-price hide">￥258.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">8</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-1468.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/565c5ffce90c44fe45b6175fff3ea1e5.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-1468.html">杜蕾斯 水润芦荟润滑液 50ml</a>
                <p class="chosen-aside-price hide">￥39.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">9</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-572.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/gallery/TB2PDXvdFXXXXbiXpXXXXXXXXXX468359490.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-572.html">Hotkiss 可食用果味润滑 香蕉味/草莓味/樱桃味可选</a>
                <p class="chosen-aside-price hide">￥10.00</p>
              </li><li class="chosen-aside-item clf  ">
                <span class="serial-number">10</span>
                <a class="chosen-aside-img hide" rel="nofollow" target="_blank" href="/goods-1990.html"><img class="lazy" data-original="http://mallimg01.touchcdn.com/goods-gallery/ab7646a18934875a66ef44349f9ce7aa.jpg?imageView/2/w/70/interlace/1" src="http://static.taqu.cn/img/p.gif" alt=""/></a>
                <a class="chosen-aside-name" target="_blank" href="/goods-1990.html">骇客 高潮坡道 情趣家具沙发性交椅 送电动充气泵</a>
                <p class="chosen-aside-price hide">￥199.00</p>
              </li>          </ul>
        </div>
        <div class="chosen-list-box fl">
          <div class="chosen-list-cate relative">
            <ul>
              <li>
                  <a href="/list/ctiaoqing-a52.0-oweight_desc.html" target="_blank" title="情趣润滑">情趣润滑</a>
                </li><li>
                  <a href="/list/ctiaoqing-a54.0-oweight_desc.html" target="_blank" title="SM调教">SM调教</a>
                </li><li>
                  <a href="/list/ctiaoqing-a55.0-oweight_desc.html" target="_blank" title="调情香水">调情香水</a>
                </li><li>
                  <a href="/list/ctiaoqing-a56.0-oweight_desc.html" target="_blank" title="性爱家具">性爱家具</a>
                </li><li>
                  <a href="/list/ctiaoqing-a133.0-oweight_desc.html" target="_blank" title="情趣礼盒">情趣礼盒</a>
                </li>            </ul>
            <a href="/tiaoqing.html" target="_blank" class="chosen-list-more">所有<i class="chosen-list-arrow"></i></a>
          </div>
          <ul class="chosen-list relative clf">
            <li class="chosen-item" style="left: 0px; top: 0px; width: 558px; height: 460px;">
                <a href="http://www.taqu.cn/goods-17.html" target="_blank" title="杜蕾斯 冰火快感人体润滑液 快感/热感 50ml">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/65ef3bd8583b89f1361274b73dd0c7b1.jpg" alt="杜蕾斯 冰火快感人体润滑液 快感/热感 50ml" rel="nofollow" />
                </a>
              </li><li class="chosen-item" style="left: 558px; top: 0px; width: 418px; height: 230px;">
                <a href="http://www.taqu.cn/goods-2189.html" target="_blank" title="美国MOVO 挑逗型费洛蒙男女香水 80ml">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/3c4141ae0fa6a3bee1cca2179f868c37.jpg" alt="美国MOVO 挑逗型费洛蒙男女香水 80ml" rel="nofollow" />
                </a>
              </li><li class="chosen-item" style="left: 768px; top: 230px; width: 208px; height: 230px;">
                <a href="http://www.taqu.cn/goods-249.html" target="_blank" title="骇客 SM多功能激情十件套 超值套装 SM情趣挑逗必备">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/89f039f3c411a7434951df68070357e9.jpg" alt="骇客 SM多功能激情十件套 超值套装 SM情趣挑逗必备" rel="nofollow" />
                </a>
              </li><li class="chosen-item" style="left: 558px; top: 230px; width: 210px; height: 230px;">
                <a href="http://www.taqu.cn/goods-1964.html" target="_blank" title="韩国ZINI 伊斯顿男用自慰乳膏 润滑按摩兴奋膏 200ml">
                  <img src="http://static.taqu.cn/img/p.gif" class="lazy" data-original="http://miscimg01.touchcdn.com/homepage-floor-window/6792f5c998afde78d0fa939194c7f01a.jpg" alt="韩国ZINI 伊斯顿男用自慰乳膏 润滑按摩兴奋膏 200ml" rel="nofollow" />
                </a>
              </li>         
           </ul>
        </div>
	</div>
</div>
<div class="clear"></div>
<div class="hs_t" id="home_top">
	<div class="w">
		<a class="mt5 left">
			<img src="miaow/images/mcw2.png"/>
		</a>
		<div id="search" class="left home-search">
			<form action="<?php echo site_url('goods/search');?>" method="get"  class="ov">
				<input type="text"  name="keyword" autocomplete="off" x-webkit-speech="" class="shl left" placeholder="想凉快吗？点我！" />
				<input type="submit" class="left shr" title="点击搜索" value="搜索">
			</form>
		</div>
		<div class="clear"></div>
	</div>
</div>
<script>
$(function(){
	$(".chosen-aside").find("li").hover(function () {
        $(this).addClass("current").find('.chosen-aside-img').removeClass('hide');
        $(this).siblings().removeClass("current").find('.chosen-aside-img').addClass('hide');
    })

	
})
</script>
<?php $this->load->view('layout/footer');?>
