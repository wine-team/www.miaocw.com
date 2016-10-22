<div class="pbox hid denglu" id="denglu">
	<p class="g_b hand alC close">关闭</p>
	<form class="lh35 loginform" id="loginform">
		<h3 class="f16 c3">会员登录    <span class="goods-error hid">错误信息</span></h3>
		<table width="100%" border="0">
			<tbody>
				  <tr>
					 <td class="pt10">
					 	<input type="text" class="lpt u_zh left"  name="username" id="username" placeholder="手机/邮箱" />
					 </td>
				  </tr>
				  <tr>
				     <td class="pt10">
				     	<input type="password" id="password" autocomplete="off" class="lpt u_mm left" name="password" placeholder="登陆密码" />
				     </td>
				  </tr>
				  <tr>
					 <td>
						<p>&nbsp;</p>
						<input type="button"  class="wwbtn wwbtno hand close" value="返回并关闭" />
						<input type="submit" class="wwbtn ml10 hand d-login" value="登 录" name="submit" />
						<p><a href="<?php echo $this->config->passport_url.'register/index?backurl='.urlencode(site_url('goods/detail?goods_id='.$goods->goods_id));?>">还没帐户，免费注册</a></p>
					 </td>
				  </tr>
			 </tbody>
		</table>
	</form>
</div>
<p id="mask" class="mask hid"></p>







