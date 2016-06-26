<?php if(isset($cart_goods) && ($cart_goods->num_rows() >0)):?>
<ul class="acar">
<?php foreach ($cart_goods->result() as $key=>$item):?>
    <li>
		<a href="goods-5503.html">
			<img class="left" width="60" height="60" alt="妙网商城" src="http://s.qw.cc/images/201606/thumb_img/5503_thumb_P220_1466563846841-60x60.jpg" />
			<p>琦莎HAPPY两用口阴互换舌震免提飞机杯</p>
			<p class="red">205.02<b class="c5"> X </b>1</p>
		</a>
	</li>
<?php endforeach;?>
</ul>
<div class="ac_t alR clearfix">
	<p>
		共<b id="a_num" class="red">2</b>件商品，总计
		<b id="a_sum" class="red">498.04</b>元
	</p>
	<p class="gray">在线支付满199包邮</p>
	<p><a class="srbtn mt5 right" href="/flow.php">去购物车结算>></a></p>
</div>
<?php else:?>
<div class="ac_t alR clearfix">
	您的购物车是空的,赶紧选购吧！
</div>
<?php endif;?>
