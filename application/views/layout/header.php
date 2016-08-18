<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta name="title"  content="<?php echo isset($headTittle) ? $headTittle : '妙处网,成人用品玩具-男根增大延迟性保健品-夫妻情趣用品-(全国货到付款 保密配送)';?>" />
<meta name="keywords" content="<?php echo isset($headTittle) ? $headTittle : '妙处网.成人用品,情趣用品,成人用具,性用品,性保健品,性生活用品,性爱用品,成人保健,夫妻保健品';?>" />
<meta name="description"  content="<?php echo isset($headTittle)?$headTittle : '妙处网,成人用品商城专业销售各类成人玩具、性保健品、情趣用品、情趣内衣、避孕套、成人玩具等高档情趣性用品,订购热线888-8888-888!';?>" />
<title><?php echo isset($headTittle)?$headTittle:'妙处网,性用品,性保健品,正品成人用品网站';?></title> 
<base href="<?php echo $this->config->skins_url;?>"/>
<link type="image/x-icon" rel="shortcut icon" href="miaow/images/logo.png"/>
<?php css('common','common', '20160415');?>
<?php css('miaow', 'reset', '20160415');?>
<?php css('miaow', 'style', '20160415');?>

<?php js('miaow', 'jquery-1.10.2');?>
<?php js('miaow', 'layer/layer');?>
<?php js('miaow', 'image.slide')?>
<?php js('miaow', 'jquery.validate.min');?>
<?php js('miaow', 'jquery.validate.messages_zh');?>

<?php js('common','common', '20160415');?>
<?php js('miaow', 'index');?>
<!--[if lt IE 10]>
<?php //js('passport', 'placeholder');?>
<![endif]-->
</head>
<body>
<?php if (!empty($cms_block['homepage_advert'])):?>
<div class="top-active">
	<?php echo $cms_block['homepage_advert'];?>
</div>
<?php endif;?>
<div id="top">
    <div class="w">
        <div class="left c8">
            <?php if($this->uid):?>
                                         你好：<a class="c3" title="会员等级v1" href="<?php echo $this->config->ucenter_url;?>"><?php echo $this->userName;?></a>
			   <span class="vline">|</span>
			   <a class="c8" href="<?php echo $this->config->passport_url.'login/logout.html';?>">退出</a>
            <?php else:?>
               <a rel="nofollow" class="c9" href="<?php echo $this->config->passport_url;?>">你好，请登录</a>
	           <span class="vline">|</span>
	           <a rel="nofollow" title="注册就送10元优惠券" class="c9" href="<?php echo $this->config->passport_url.'register.html';?>">
	            	免费注册<em class="c9 pl10"><i class="org">送10元优惠券</i></em>
	           </a>                        
            <?php endif;?>
        </div>
        <ul id="tul" class="tul right">
            <li class="nbt"> 
                <a rel="nofollow" href="<?php echo $this->config->ucenter_url;?>" target="_blank">
                	我的妙处网<em class="rdop"></em>
                </a>
                <div class="tuln">
                	<a rel="nofollow" href="<?php echo $this->config->ucenter_url.'ucenter/user_info';?>" target="_blank">个人信息</a>
                	<a rel="nofollow" href="<?php echo $this->config->ucenter_url.'enshrine';?>" target="_blank">我的收藏</a>
                	<a rel="nofollow" href="<?php echo $this->config->ucenter_url.'user_coupon';?>" target="_blank">我的优惠券</a>
                	<a rel="nofollow" href="<?php echo $this->config->ucenter_url.'address';?>" target="_blank">收货地址</a>
                </div>
            </li>
            <li>
            	<a href="<?php echo $this->config->ucenter_url;?>" rel="nofollow">
            		<em class="f f14 mr5 iconfont red">&#xe60c;</em>我的订单
            	</a>
            </li>
            <li class="nbt">
                <a href="javascript:;" rel="nofollow">
                	<em class="f mt1 iconfont">&#xe608;</em>手机版
                	<em class="rdop"></em>
                </a>
                <div class="tuln">
                	<img src="help/images/tm31.png" width="188" height="124"/>
                </div>
            </li>
            <li class="nbt">
                <a href="<?php echo $this->config->help_url;?>" rel="nofollow">客户服务<em class="rdop"></em></a>
                <div class="tuln">
                	<a href="<?php echo $this->config->help_url;?>" rel="nofollow" target="_blank">如何订购</a>
                	<a href="<?php echo $this->config->help_url;?>" rel="nofollow" target="_blank">在线支付</a>
                	<a href="<?php echo $this->config->help_url;?>" rel="nofollow" target="_blank">物流查询</a>
                </div>
            </li>
            <li><a href="<?php echo $this->config->help_url;?>" rel="nofollow" class="pr5" target="_blank">商家服务</a></li>
            <li>
            	<a rel="nofollow" href="javascript:;" class="contact-kf">
            		<em class="f f14 iconfont mr5">&#xe605;</em>联系客服
            	</a>
            </li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<div id="header" class="miao-header">
    <div class="w">
        <div class="rel left" >
            <a href="<?php echo site_url();?>" title="妙处网,乐享生活" class="logo" rel="nofollow">
            	<img src="miaow/images/mcw1.png"/>
            </a>
        </div>
        <div id="search" class="search left">
            <form action="<?php echo site_url('goods/search');?>" method="get" class="ov" />
                <input type="text" name="keyword" autocomplete="off" x-webkit-speech="" class="shl left" placeholder="想凉快吗？点我！" />
                <input type="submit" class="left shr" title="点击搜索" value="搜索" />
                <div class="clear"></div>
                <p class="hotw">
                    <?php echo $cms_block['home_keyword'];?>
                </p>
            </form>
            <div id="s_box"></div>
        </div>
        <div class="tr_c right" id="tcar">
            <a class="t_c" href="<?php echo site_url('cart/grid');?>" rel="nofollow">
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
        <div class="lcat" <?php if(isset($head_menu)):?>id="bignav"<?php endif;?>>
            <p class="nall hand">全部商品分类</p>
            <ul class="lnav" id="lnav">
                <?php foreach ($allCategory as $key=>$item):?>
                <li>
                   <em class="f">&nbsp;</em>
                   <a class="lma" href="<?php echo site_url('goods/search?cid='.$item['cat_id']);?>">
                   	    <?php echo $item['cat_name'];?>
                   </a>
                   <?php if (!empty($item['childCat'])):?>
                   <div class="lra" >
                        <div class="lh3">
                            <b class="left"><?php echo $item['cat_name'];?></b>
                            <a href="<?php echo site_url('goods/search?cid='.$item['cat_id']);?>" class="right" rel="nofollow">更多>></a>
                        </div>
                        <p class="boa">
                            <?php foreach ($item['childCat'] as $i=>$val):?>
                            <a href="<?php echo site_url('goods/search?cid='.$val['cat_id']);?>"><?php echo $val['cat_name'];?></a>
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
            <li><a href="<?php echo site_url();?>" rel="nofollow">首页</a></li>
            <li><a href="<?php echo site_url('goods/femal');?>">女性用品</a></li>
            <li><a href="<?php echo site_url('goods/femal');?>">男性用品</a></li>
            <li><a href="<?php echo site_url('goods/femal');?>">延时助情</a></li>
            <li><a href="<?php echo site_url('goods/femal');?>">情趣内衣</a></li>
            <li><a href="<?php echo site_url('goods/femal');?>">飞机杯</a></li>
            <li><a href="<?php echo site_url('goods/femal');?>">G点棒</a></li>
            <li><a href="<?php echo site_url('goods/femal');?>">仿真阳具</a></li>
            <li><a href="<?php echo site_url('goods/femal');?>">土豪天堂</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
