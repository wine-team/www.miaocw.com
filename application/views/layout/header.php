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

<?php js('miaow', 'jquery-1.10.2');?>
<?php js('miaow', 'image.slide')?>
<?php js('miaow', 'jquery.validate.min');?>
<?php js('miaow', 'jquery.validate.messages_zh');?>

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
            <?php if($this->uid):?>
                                         您好：<a class="c3" title="会员等级v1" href="<?php $this->config->ucenter_url;?>"><?php echo $this->userName;?></a>
               <a class="pl5 c8" target="_blank" href="<?php $this->config->help_url;?>">（VIP折扣：9.8折）</a>
			   <span class="vline">|</span>
			   <a class="c8" href="<?php echo $this->config->passport_url.'login/logout.html';?>">退出</a>
            <?php else:?>
               <a rel="nofollow" class="c9" href="<?php echo $this->config->passport_url;?>">登录</a>
	           <span class="vline">|</span>
	           <a rel="nofollow" title="注册就送10元优惠券" class="c9" href="<?php echo $this->config->passport_url;?>">
	            	注册<em class="c9 pl10"><i class="org">送10元优惠券</i></em>
	           </a>                        
            <?php endif;?>
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
    <?php $allCategory =  getAllCategory();?>
    <div class="w">
        <div class="lcat">
            <p class="nall hand">全部商品分类</p>
            <ul class="lnav" id="lnav">
                <?php foreach ($allCategory as $key=>$item): ?>
                <li>
                   <em class="f">&#xe64c;</em>
                   <a class="lma" href="<?php echo site_url('goods/mallgoods/search?cid='.$item['cat_id']);?>">
                   	    <?php echo $item['cat_name'];?>
                   </a>
                   <?php if (!empty($item['childCat'])):?>
                   <div class="lra">
                        <div class="lh3">
                            <b class="left"><?php echo $item['cat_name'];?></b>
                            <a href="<?php echo site_url('goods/mallgoods/search?cid='.$item['cat_id']);?>" class="right" rel="nofollow">更多>></a>
                        </div>
                        <p class="boa">
                            <?php foreach ($item['childCat'] as $i=>$val):?>
                            <a href="<?php echo site_url('goods/mallgoods/search?cid='.$val['cat_id']);?>"><?php echo $val['cat_name'];?></a>
                            <?php endforeach;?>
                        </p>
                        <?php if(!empty($item['keyword'])):?>
                        <div class="lh3"><b class="left">本类热搜</b></div>
                        <p class="bom">
                            <?php echo $item['keyword'];?>
                        </p>
                        <?php endif;?>
                   </div>
                   <?php endif;?>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
        <ul class="navs left">
            <li><a href="<?php echo site_url('goods/mallgoods/search');?>" rel="nofollow">首页</a></li>
            <li><a href="<?php echo site_url('goods/mallgoods/search');?>"  >女性用品</a></li>
            <li><a href="<?php echo site_url('goods/mallgoods/search');?>"  >男性用品</a></li>
            <li><a href="<?php echo site_url('goods/mallgoods/search');?>"  >延时助情</a></li>
            <li><a href="<?php echo site_url('goods/mallgoods/search');?>"  >情趣内衣</a></li>
            <li><a href="<?php echo site_url('goods/mallgoods/search');?>"  >飞机杯</a></li>
            <li><a href="<?php echo site_url('goods/mallgoods/search');?>"  >G点棒</a></li>
            <li><a href="<?php echo site_url('goods/mallgoods/search');?>"  >仿真阳具</a></li>
            <li><a href="<?php echo site_url('goods/mallgoods/search');?>"  >土豪天堂</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
