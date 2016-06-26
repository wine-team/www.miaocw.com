<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta name="title"  content="<?php echo isset($headTittle) ? $headTittle : '成人用品玩具-男根增大延迟性保健品-夫妻情趣用品-秒网商城(全国货到付款 保密配送)';?>" />
<meta name="keywords" content="<?php echo isset($headTittle) ? $headTittle : '成人用品,情趣用品,成人用具,性用品,性保健品,性生活用品,性爱用品,成人保健,夫妻保健品,妙网商城';?>" />
<meta name="description"  content="<?php echo isset($headTittle)?$headTittle : '成人用品商城专业销售各类成人玩具、性保健品、情趣用品、情趣内衣、避孕套、成人玩具等高档情趣性用品。货到付款、全国保密配送，订购热线888-8888-888!';?>" />
<title><?php echo isset($headTittle)?$headTittle:'【妙网商城】成人用品_情趣用品_成人用具_性用品_性保健品_正品成人用品网站';?></title> 
<base href="<?php echo $this->config->skins_url;?>"/>
<link type="image/x-icon" rel="shortcut icon" href="passport/images/logo02.png"/>
<?php css('common', 'common', '20160415');?>
<?php css('miaow', 'reset', '20160415');?>

<?php js('help', 'jquery-1.10.2');?>
<?php js('help', 'jquery.validate.min');?>
<?php js('help', 'jquery.validate.messages_zh');?>

<?php js('common','common', '20160415');?>
<?php js('miaow', 'index');?>

<!--[if lt IE 10]>
<?php //js('passport', 'placeholder');?>
<![endif]-->
<!--[if lt IE 9]>
  var qwid=screen.width;
  if(qwid <= 1220) {
     document.write('<?php css('common', 'w9', '20160415');?>');
  }
<![endif]-->

</head>
<body>
<div id="top">
    <div class="w">
        <div class="left c8">
            <a rel="nofollow" href="<?php echo site_url('home/home/grid');?>" class="c9">
            	<em class="f mt1 iconfont">&#xe60a;</em>首页
            </a>
            <span class="vline">|</span>
            <a rel="nofollow" class="c9" href="<?php echo $this->config->passport_url;?>">登录</a>
            <span class="vline">|</span>
            <a rel="nofollow" title="注册就送10元优惠券" class="c9" href="<?php echo $this->config->passport_url;?>">
            	注册<em class="c9 pl10"><i class="org">送10元优惠券</i></em>
            </a>
        </div>
        <ul id="tul" class="tul right">
            <li>
            	<a href="<?php echo $this->config->ucenter_url;?>" rel="nofollow">
            		<em class="f f14 mr5 iconfont red">&#xe60c;</em>查询订单
            	</a>
            </li>
            <li class="nbt">
                <a href="javascript:;" rel="nofollow">
                	<em class="f mt1 iconfont">&#xe608;</em>手机版
                	<em class="rdop"></em>
                </a>
                <div class="tuln">
                	<img src="help/images/tm31.png" width="188" height="124" />
                </div>
            </li>
            <li class="nbt">
                <a rel="nofollow" href="<?php echo $this->config->ucenter_url;?>" target="_blank">
                	会员中心<em class="rdop"></em>
                </a>
                <div class="tuln">
                	<a rel="nofollow" href="<?php echo $this->config->ucenter_url;?>" target="_blank">个人信息</a>
                	<a rel="nofollow" href="<?php echo $this->config->ucenter_url;?>" target="_blank">我的收藏</a>
                	<a rel="nofollow" href="<?php echo $this->config->ucenter_url;?>" target="_blank">我的优惠券</a>
                	<a rel="nofollow" href="<?php echo $this->config->ucenter_url;?>" target="_blank">收货地址</a>
                </div>
            </li>
            <li class="nbt">
                <a href="<?php echo $this->config->help_url;?>" rel="nofollow">帮助中心<em class="rdop"></em></a>
                <div class="tuln">
                	<a href="<?php echo $this->config->help_url;?>" rel="nofollow" target="_blank">如何订购</a>
                	<a href="<?php echo $this->config->help_url;?>" rel="nofollow" target="_blank">货到付款</a>
                	<a href="<?php echo $this->config->help_url;?>" rel="nofollow" target="_blank">在线支付</a>
                	<a href="<?php echo $this->config->help_url;?>" rel="nofollow" target="_blank">电话订购</a>
                </div>
            </li>
            <li><a href="<?php echo $this->config->help_url;?>" rel="nofollow" class="pr5" target="_blank">正品保障</a></li>
            <li>
            	<a rel="nofollow" href="javascript:;" class="contact-kf">
            		<em class="f f14 iconfont mr5">&#xe605;</em>联系客服
            	</a>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<div id="header">
    <div class="w">
        <div class="rel left">
            <a href="<?php echo site_url('home/home/grid');?>" title="妙网商城,百变情趣,乐享生活" class="logo" rel="nofollow" target="_blank">
            	<img src="help/images/logo_01.png" width="296" height="44" />
            </a>
        </div>
        <div id="search" class="search left">
            <form action="<?php echo site_url('goods/mallgoods/search');?>" method="get" class="ov" />
                <input type="text" name="keyword" autocomplete="off" x-webkit-speech="" class="shl left" placeholder="商品名称/货号" />
                <input type="submit" class="left shr" title="点击搜索" value="搜索" />
                <div class="clear"></div>
                <p class="hotw">
                    <?php echo $cms_block['home_keyword'];?>
                </p>
            </form>
            <div id="s_box"></div>
        </div>
        <div class="tr_c right" id="tcar">
            <a class="t_c" href="<?php echo site_url('cart/cart/grid');?>" rel="nofollow">
                                               我的购物车
                 <p id="qcar"><?php echo isset($cart_num) ? $cart_num : '0';?></p><i class="ci_r">&gt;</i>
            </a>
            <div id="acar"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="navq" id="nav">
    <div class="w">
        <div class="lcat" id="bignav">
            <p class="nall hand">全部商品分类</p>
            <ul class="lnav" id="lnav">
                <li>
                   <em class="f">&#xe64c;</em>
                   <a class="lma" href="<?php echo $this->config->main_base_url;?>">
                   	      男性用品
                   </a>
                   <div class="lra">
                        <div class="lh3"><b class="left">男性用品</b><a href="<?php echo $this->config->main_base_url;?>" class="right" rel="nofollow">更多>></a></div>
                        <p class="boa">
                            <a href="<?php echo $this->config->main_base_url;?>">自慰飞机杯</a>
                            <a href="<?php echo $this->config->main_base_url;?>">女优名器</a>
                            <a href="<?php echo $this->config->main_base_url;?>">臀胸倒模</a>
                            <a href="<?php echo $this->config->main_base_url;?>">助勃增大器</a>
                            <a href="<?php echo $this->config->main_base_url;?>">延时喷剂</a>
                            <a href="<?php echo $this->config->main_base_url;?>">前列腺刺激</a>
                            <a href="<?php echo $this->config->main_base_url;?>">充气娃娃</a>
                            <a href="<?php echo $this->config->main_base_url;?>">锁精套环</a>
                            <a href="<?php echo $this->config->main_base_url;?>">实体玩偶</a>
                        </p>
                        <div class="lh3"><b class="left">本类热搜</b></div>
                        <p class="bom">
                            <a href="<?php echo $this->config->main_base_url;?>">藏帝延时喷剂</a>	
                            <a href="<?php echo $this->config->main_base_url;?>">电动增大器</a>
                            <a href="<?php echo $this->config->main_base_url;?>">波多野结衣系列</a>
                            <a href="<?php echo $this->config->main_base_url;?>">冰冰版娃娃</a>
                            <a href="<?php echo $this->config->main_base_url;?>">自动抽插飞机杯</a>
                            <a href="<?php echo $this->config->main_base_url;?>">大屁股倒模</a>
                        </p>
                   </div>
                </li>
                <li><em class="f">&#xe64f;</em><a class="lma" href="<?php echo $this->config->main_base_url;?>">女性用品</a>
                    <div class="lra">
                        <div class="lh3"><b class="left">女性用品</b><a href="<?php echo $this->config->main_base_url;?>" class="right" rel="nofollow">更多>></a></div>
                        <p class="boa">
                            <a href="<?php echo $this->config->main_base_url;?>">多点按摩棒</a>
                            <a href="<?php echo $this->config->main_base_url;?>">仿真阳具</a>
                            <a href="<?php echo $this->config->main_base_url;?>">转珠棒</a>
                            <a href="<?php echo $this->config->main_base_url;?>">G点震动棒</a>
                            <a href="<?php echo $this->config->main_base_url;?>">性爱机器</a>
                            <a href="<?php echo $this->config->main_base_url;?>">跳蛋</a>
                            <a href="<?php echo $this->config->main_base_url;?>">情欲提升</a>
                            <a href="<?php echo $this->config->main_base_url;?>">AV震动棒</a>
                            <a href="<?php echo $this->config->main_base_url;?>">双乳刺激</a>
                            <a href="<?php echo $this->config->main_base_url;?>">后庭拉珠</a>
                            <a href="<?php echo $this->config->main_base_url;?>">充气男人</a>
                            <a href="<?php echo $this->config->main_base_url;?>">私处挑逗</a>
                        </p>
                        <div class="lh3"><b class="left">本类热搜</b></div>
                            <p class="bom">
                            <a href="<?php echo $this->config->main_base_url;?>">自动抽插阳具</a>
                            <a href="<?php echo $this->config->main_base_url;?>">抽插震动棒</a>
                            <a href="<?php echo $this->config->main_base_url;?>">炮机</a>
                            <a href="<?php echo $this->config->main_base_url;?>">强震跳蛋</a>
                            <a href="<?php echo $this->config->main_base_url;?>">土豪级男根</a>
                            <a href="<?php echo $this->config->main_base_url;?>">乳房增大</a>
                        </p>
                    </div>
                </li>
                <li><em class="f">&#xe643;</em><a class="lma" href="<?php echo $this->config->main_base_url;?>">延时助情</a>
                    <div class="lra">
                        <div class="lh3"><b class="left">延时助情</b><a href="<?php echo $this->config->main_base_url;?>" class="right" rel="nofollow">更多>></a></div>
                        <p class="boa">
                            <a href="<?php echo $this->config->main_base_url;?>">延时喷剂</a>
                            <a href="<?php echo $this->config->main_base_url;?>">情欲提升</a>
                            <a href="<?php echo $this->config->main_base_url;?>">助勃增大器</a>
                        </p>
                        <div class="lh3"><b class="left">本类热搜</b></div>
                        <p class="bom">
                            <a href="<?php echo $this->config->main_base_url;?>">纯植物延时</a>
                            <a href="<?php echo $this->config->main_base_url;?>">催欲香水</a>
                            <a href="<?php echo $this->config->main_base_url;?>">高潮液</a>
                            <a href="<?php echo $this->config->main_base_url;?>">乳头兴奋霜</a>
                        </p>
                    </div>
                </li>
                <li><em class="f">&#xe644;</em><a class="lma" href="<?php echo $this->config->main_base_url;?>">情趣服饰</a>
                    <div class="lra">
                    <div class="lh3"><b class="left">情趣服饰</b><a href="<?php echo $this->config->main_base_url;?>" class="right" rel="nofollow">更多>></a></div>
                    <p class="boa">
                        <a href="<?php echo $this->config->main_base_url;?>">性感裙装</a>
                        <a href="<?php echo $this->config->main_base_url;?>">制服诱惑</a>
                        <a href="<?php echo $this->config->main_base_url;?>">三点激情</a>
                        <a href="<?php echo $this->config->main_base_url;?>">情趣内裤</a>
                        <a href="<?php echo $this->config->main_base_url;?>">连体网衣</a>
                        <a href="<?php echo $this->config->main_base_url;?>">情趣丝袜</a>
                        <a href="<?php echo $this->config->main_base_url;?>">男士内衣</a>
                    </p>
                    <div class="lh3"><b class="left">本类热搜</b></div>
                    <p class="bom">
                        <a href="<?php echo $this->config->main_base_url;?>">无缝包臀裙</a>
                        <a href="<?php echo $this->config->main_base_url;?>">女仆装</a>
                        <a href="<?php echo $this->config->main_base_url;?>">三点式</a>
                        <a href="<?php echo $this->config->main_base_url;?>">开档连身网衣</a>
                        <a href="<?php echo $this->config->main_base_url;?>">黑色丝袜</a>
                        <a href="<?php echo $this->config->main_base_url;?>">男用丁字裤</a>
                    </p>
                    </div>
                </li>
                <li><em class="f">&#xe64e;</em><a class="lma" href="<?php echo $this->config->main_base_url;?>">双人情趣</a>
                    <div class="lra">
                    <div class="lh3"><b class="left">双人情趣</b><a href="<?php echo $this->config->main_base_url;?>" class="right" rel="nofollow">更多>></a></div>
                    <p class="boa">
                        <a href="<?php echo $this->config->main_base_url;?>">体位道具</a>
                        <a href="<?php echo $this->config->main_base_url;?>">男女共振器</a>
                        <a href="<?php echo $this->config->main_base_url;?>">捆绑束缚</a>
                        <a href="<?php echo $this->config->main_base_url;?>">手脚拷环</a>
                        <a href="<?php echo $this->config->main_base_url;?>">项圈脖套</a>
                        <a href="<?php echo $this->config->main_base_url;?>">乳夹口塞</a>
                        <a href="<?php echo $this->config->main_base_url;?>">贞操裤</a>
                        <a href="<?php echo $this->config->main_base_url;?>">头套眼罩</a>
                        <a href="<?php echo $this->config->main_base_url;?>">同性用品</a>
                        <a href="<?php echo $this->config->main_base_url;?>">鞭打</a>
                        <a href="<?php echo $this->config->main_base_url;?>">另类调教工具</a>
                    </p>
                    <div class="lh3"><b class="left">本类热搜</b></div>
                    <p class="bom">
                        <a href="/goods-7142.html">SM套装</a>
                        <a href="/goods-4307.html">体位道具</a>
                        <a href="/goods-5088.html">一起震</a>
                        <a href="/goods-7247.html">滴蜡</a>
                    </p>
                    </div>
                </li>
                <li><em class="f">&#xe63f;</em><a class="lma" href="/runhuaye/">润滑液</a>
                    <div class="lra">
                    <div class="lh3"><b class="left">润滑液</b><a href="/runhuaye/" class="right" rel="nofollow">更多>></a></div>
                    <p class="boa">
                        <a href="/runhuaye/rtrhy/">人体润滑液</a>
                        <a href="/runhuaye/cxrhy/">唇吸润滑液</a>
                        <a href="/runhuaye/htrh/">后庭润滑液</a>
                        <a href="/runhuaye/fgmrhy/">防过敏润滑液</a>
                        <a href="/runhuaye/wjqxy/">玩具清洗液</a>
                    </p>
                    <div class="lh3"><b class="left">本类热搜</b></div>
                    <p class="bom">
                        <a href="/goods-4951.html">杜蕾斯牌</a>
                        <a href="/runhuaye/cxrhy/">水果味</a>
                        <a href="/goods-5175.html">高级润滑液</a>
                        <a href="/goods-5174.html">进口品牌</a>
                    </p>
                    </div>
                </li>
                <li><em class="f">&#xe632;</em><a class="lma" href="/biyuntao/">避孕套</a>
                    <div class="lra">
                        <div class="lh3"><b class="left">避孕套</b><a href="/biyuntao/" class="right" rel="nofollow">更多>></a></div>
                        <p class="boa">
                            <a href="/biyuntao/chaobao/">超薄体贴</a>
                            <a href="/biyuntao/luowen/">螺纹刺激</a>
                            <a href="/biyuntao/chijiu/">超凡持久</a>
                            <a href="/biyuntao/fudian/">浮点颗粒</a>
                            <a href="/biyuntao/guowei/">冰火果味</a>
                            <a href="/biyuntao/nybyt/">女用特色</a>
                            <a href="/biyuntao/jinzhi/">紧致贴合</a>
                            <a href="/biyuntao/beishuang/">倍爽润滑</a>
                            <a href="/biyuntao/shishang/">创意时尚</a>
                            <a href="/biyuntao/chaozhi/">超值组合</a>
                        </p>
                        <div class="lh3"><b class="left">本类热搜</b></div>
                        <p class="bom">
                            <a href="/brand/durex/">杜蕾斯</a>
                            <a href="/brand/gangben/">冈本</a>
                            <a href="/brand/dx/">大象</a>
                            <a href="/brand/MIO/">米奥</a>
                        </p>
                    </div>
                </li>
                <li><em class="f">&#xe637;</em><a class="lma" href="/fengqing/">丰胸缩阴</a>
                    <div class="lra">
                        <div class="lh3"><b class="left">丰胸缩阴</b><a href="/fengqing/" class="right" rel="nofollow">更多>></a></div>
                        <p class="boa">
                            <a href="/fengqing/suoyin/">缩阴养颜</a>
                            <a href="/fengqing/fxmx/">丰胸美胸</a>
                            <a href="/fengqing/scxf/">私处护理</a>
                        </p>
                        <div class="lh3"><b class="left">本类热搜</b></div>
                        <p class="bom">
                            <a href="/goods-5752.html">缩阴球</a>
                            <a href="/goods-7212.html">私处变粉嫩</a>
                            <a href="/goods-7697.html">乳房坚挺</a>
                        </p>
                    </div>
                </li>
                <li><em class="f">&#xe633;</em><a class="lma" href="/brand/" rel="nofollow">情趣品牌</a>
                    <div class="lra">
                        <div class="lh3"><b class="left">情趣品牌</b><a href="/brand/" class="right" rel="nofollow">更多>></a></div>
                        <p class="boa">
                            <a href="/brand/esther/">以诗萜</a>
                            <a href="/brand/ibzan/">以比赞</a>
                            <a href="/brand/lelo/">LELO</a>
                            <a href="/brand/funfactory/">FunFactory</a>
                            <a href="/brand/omysky/">私享玩趣</a>
                            <a href="/brand/gangben/">冈本</a>
                            <a href="/brand/ailv/">爱侣</a>
                            <a href="/brand/durex/">杜蕾斯</a>
                            <a href="/brand/npg/">NPG</a>
                            <a href="/brand/toughage/">TOUGHAGE</a>
                            <a href="/brand/beilile/">倍力乐</a>
                            <a href="/brand/baile/">百乐</a>
                            <a href="/brand/tenga/">TENGA</a>
                            <a href="/brand/shaki/">夏奇</a>
                            <a href="/brand/jizhimei/">积之美</a>
                            <a href="/brand/zhaobang/">兆邦NMC</a>
                        </p>
                    </div>
                </li>
                <li><em class="f">&#xe63a;</em><a class="lma" href="/topic/" rel="nofollow">专题活动</a>
                    <div class="lra">
                        <div class="lh3"><b class="left">专题活动</b><a href="/topic/" class="right" rel="nofollow">更多>></a></div>
                        <p class="boa">
                            <a target="_blank" rel="nofollow" href="<?php echo $this->config->main_base_url;?>">每周上新</a>
                            <a target="_blank" rel="nofollow" href="<?php echo $this->config->main_base_url;?>">特价抢购</a>
                            <a target="_blank" rel="nofollow" href="<?php echo $this->config->main_base_url;?>">AV女优倒模</a>
                            <a target="_blank" rel="nofollow" href="<?php echo $this->config->main_base_url;?>">成人用品排行</a>
                            <a target="_blank" rel="nofollow" href="<?php echo $this->config->main_base_url;?>">火爆情趣内衣</a>
                            <a target="_blank" rel="nofollow" href="<?php echo $this->config->main_base_url;?>">火爆延时喷剂</a>
                            <a target="_blank" rel="nofollow" href="<?php echo $this->config->main_base_url;?>">女性仿真倒模</a>
                            <a target="_blank" rel="nofollow" href="<?php echo $this->config->main_base_url;?>">女用自慰器</a>
                            <a target="_blank" rel="nofollow" href="<?php echo $this->config->main_base_url;?>">飞机杯自慰器</a>
                            <a target="_blank" rel="nofollow" href="<?php echo $this->config->main_base_url;?>">男根增大</a>
                            <a target="_blank" rel="nofollow" href="<?php echo $this->config->main_base_url;?>">安全套-避孕套</a>
                            <a target="_blank" rel="nofollow" href="<?php echo $this->config->main_base_url;?>">延时喷剂</a>
                            <a target="_blank" rel="nofollow" href="<?php echo $this->config->main_base_url;?>">火爆热销</a>
                            <a target="_blank" rel="nofollow" href="<?php echo $this->config->main_base_url;?>">能否给我个家</a>
                        </p>
                    </div>
                </li>
                <li><em class="f">&#xe650;</em><a class="lma" href="<?php echo $this->config->main_base_url;?>" rel="nofollow">视频专区</a></li>
            </ul>
        </div>
        <ul class="navs left">
            <li><a href="<?php echo $this->config->main_base_url;?>" rel="nofollow">首页</a></li>
            <li><a href="<?php echo $this->config->main_base_url;?>"  >女性用品</a></li>
            <li><a href="<?php echo $this->config->main_base_url;?>"  >男性用品</a></li>
            <li><a href="<?php echo $this->config->main_base_url;?>"  >延时助情</a></li>
            <li><a href="<?php echo $this->config->main_base_url;?>"  >情趣内衣</a></li>
            <li><a href="<?php echo $this->config->main_base_url;?>"  >飞机杯</a></li>
            <li><a href="<?php echo $this->config->main_base_url;?>"  >G点棒</a></li>
            <li><a href="<?php echo $this->config->main_base_url;?>"  >仿真阳具</a></li>
            <li><a href="<?php echo $this->config->main_base_url;?>"  >土豪天堂</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
