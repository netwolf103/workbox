<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="reset">
    <div id="content">
        <div class="box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>重设密码</h2></div>
                <div class="sect">
				<?php if($_POST){?>
				<?php } else { ?>
					<form method="post" action="/account/repass.php">
                    <div class="field email">
                        <label class="f-label" for="reset-email">Email</label>
                        <input type="text" name="email" class="f-input" id="reset-email" value="" />
                        <span class="hint">您用来登录的 Email 地址</span>
                    </div>
					<?php if(($INI['sms']['getpwd']=='1')){?>
					<div class="field mobile">
                        <label class="f-label" for="reset-mobile">手机号</label>
                        <input type="text" name="mobile" class="f-input" id="reset-email" value="" maxlength="12"/>
                        <span class="hint">您注册时候填写的手机号</span>
                    </div>
					<?php }?>
                    <div class="act">
                        <input type="submit" class="formbutton" value="重设密码" />
                    </div>
                    </form>
				</div>
				<?php }?>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
    <div id="sidebar">
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->
 
<?php include template("footer");?>
