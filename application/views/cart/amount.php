<b class="red right" id="amount">¥<?php echo bcadd($actual_price,0,2);?></b>
<em class="gray right">实付款：</em>
<em class="right ml10 pr10"> = </em>
<div class="right" id="computer">
    <span class="right">满减<b class="red" id="computer_discount">¥0.00</b></span><i class="o_cut right"></i>
</div>
<?php if(count($coupon)>0):?>
<div class="right free" id="favourable">
	<select name="coupon" class="right <?php if(!$couponId):?>hid<?php endif;?> select-free" style="width:100px;">
		<option value="0" <?php if($couponId==0):?>selected="selected"<?php endif;?>>选择优惠券</option>
		<?php foreach ($coupon as $key=>$val):?>
		<option value="<?php echo $val->coupon_get_id;?>" <?php if($couponId==$val->coupon_get_id):?>selected="selected"<?php endif;?> ><?php echo $val->coupon_name;?>[¥<?php echo $val->amount;?>]</option>
		<?php endforeach;?>
	</select>
    <label class="pr10 right">
        <input type="checkbox" name="youhuiquan" class="youhuiquan" <?php if($couponId):?>checked="checked"<?php endif;?>/>
                      使用优惠券(<em class="red"><?php echo count($coupon);?></em>张可用)
    </label>
    <i class="right o_cut"></i>
</div>
<?php endif;?>
<span class="right">邮费<b class="red" id="yf">¥<?php echo bcadd($transport_cost,0,2);?></b></span>
<i class="o_add right"></i>
<span class="right">商品总价<b class="red" id="zj">¥<?php echo bcadd($total,0,2);?></b></span>
<script type="text/javascript">

$('.free').on('click','.youhuiquan',function(e){ //优惠券
   var selectFlag = $(this).parents('.free').find('.select-free');
   if ($(this).is(':checked')) {
  	 selectFlag.removeClass('hid');
   } else {
  	 selectFlag.find('option').eq(0).attr('selected','selected');
  	 selectFlag.addClass('hid'); 
  	 $('.select-free').trigger('change');// 触发选择事件
   }
})

$('.free').on('change','.select-free',function(e){
	var area = $('select[name="province_id"]').find("option:selected").attr('province');
	var coupon = $(this).val();
	$.ajax({
		type: 'post',
        async: false,
        dataType : 'json',
        data:{area:area,coupon:coupon},
        url: hostUrl()+'/cart/main',
        success: function(json) {
           $('.pay-order').html(json.amount);
           $('.cart-content').html(json.html);
           $('img.lazy').lazyload();
        }
	})
})

</script>