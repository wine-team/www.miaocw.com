<div class="pbox hid denglu" id="denglu">
    <p class="g_b hand alC close">关闭</p>
    <form class="lh35 loginform" id="loginform">
        <h3 class="f16 c3">会员登录    <span class="goods-error hid">错误信息</span></h3>
        <table width="100%" border="0">
            <tr>
                <td class="pt10">
                    <input type="hidden" name="backUrl" value="<?php echo current_url(); ?>"/>
                    <input type="hidden" name="act" value="1">
                    <input type="text" name="username" id="username" class="lpt u_zh left" placeholder="手机/邮箱"/>
                </td>
            </tr>
            <tr>
                <td class="pt10">
                    <input type="password" name="password" id="password" class="lpt u_mm left" autocomplete="off" placeholder="登陆密码" />
                    <input type="hidden" name="captcha" placeholder="验证码">
                </td>
            </tr>
            <tr>
                <td>
                    <p>&nbsp;</p>
                    <input type="button" value="返回并关闭" class="wwbtn wwbtno hand close"/><input type="submit" name="submit" value="登 录" class="wwbtn ml10 hand d-login"/>
                    <p><a href="<?php echo $this->config->passport_url.'register/index.html?backurl='.current_url() ?>">还没帐户，免费注册</a></p>
                </td>
            </tr>
        </table>
    </form>
</div>
<p id="mask" class="mask hid"></p>