<?php include template("header");?>
<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="login">
    <div id="content" class="login-box">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>登录</h2><span>&nbsp;或者 <a href="/account/signup.php">注册</a></span></div>
                <div class="sect">
                    <form id="login-user-form" method="post" action="/account/login.php" class="validator">
                        <div class="field email">
                            <label for="login-email-address">Email／用户名</label>
                            <input type="text" size="30" name="email" id="login-email-address" class="f-input" value="" require="true" datatype="require|limit" min="2" /><?php if(($INI['sms']['login']=='1')){?><span class="lostpassword"><a href="javascript:;" onclick="alert('请输入手机登陆！');jQuery('#login-email-address').focus()">手机号可登陆</a></span><?php }?>
                        </div>
                        <div class="field password">
                            <label for="login-password">密码</label>
                            <input type="password" size="30" name="password" id="login-password" class="f-input" require="true" datatype="require" />
                            <span class="lostpassword"><a href="/account/repass.php">忘记密码？</a></span> 
                        </div>
                        <div class="field autologin">
                            <input type="checkbox" value="1" name="auto_login" id="autologin" class="f-check" checked />
                            <label for="autologin">下次自动登录</label>
                        </div>
                        <div class="act">
                            <p>
                              <input type="submit" value="登录" name="commit" id="login-submit" class="formbutton"/>
                                </p>
                            <p>&nbsp;</p>
                            <p><a href="/thirdpart/sina/login.php" target="_blank"><img src="/static/css/i/sina_button.png" width="126" height="24" /></a> <a href="/thirdpart/qq/index.php " target="_blank"><img src="/static/css/i/qq_button.png" alt="" width="126" height="24" /></a></p>
                        </div>
                  </form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
    <div id="sidebar">
        <div class="sbox">
            <div class="sbox-top"></div>
            <div class="sbox-content">
                <div class="side-tip">
                    <h2>还没有<?php echo $INI['system']['abbreviation']; ?>账户？</h2>
                    <p>立即<a href="/account/signup.php">注册</a>，仅需30秒！</p>
                </div>
            </div>
            <div class="sbox-bottom"></div>
        </div>
    </div>
</div>
    </div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>