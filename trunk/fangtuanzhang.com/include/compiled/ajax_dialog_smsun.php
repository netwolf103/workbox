<div id="order-pay-dialog" class="order-pay-dialog-c" style="width:380px;">
<h3><span id="order-pay-dialog-close" class="close" onclick="return X.boxClose();">关闭</span>取消短信订阅</h3>
	<p class="info" id="smssub-dialog-display-id">请您输入手机号及验证码<br/>获取取消订阅认证码</p>
	<p class="notice">手机号：<input id="smssub-dialog-input-mobile" type="text" name="mobile" class="f-input" style="text-transform:uppercase;" maxLength="12" value="<?php echo $_GET['mobile']; ?>" /></p>
	<p class="notice">验证码：<input id="smssub-dialog-input-verifycode" type="text" name="captchacode" style="text-transform:uppercase;" class="f-input" maxLength="6" /></p>
	<p class="notice" style="margin-left:4em;"><img id="img-captcha-id" src="/captcha.php?<?php echo microtime(true); ?>" style="margin-bottom:-4px;" /><a href="javascript:;" style="margin:5px; font-size:12px;" onclick="jQuery('#img-captcha-id').attr('src',WEB_ROOT+'/captcha.php?'+Math.random());" >看不清楚？换一张</a></p>
	<p class="notice" style="margin:10px 4em;" ><input id="smssub-dialog-query" class="formbutton" value="发送认证码" name="query" type="submit" onclick="smssub_submit();"/></p>
</div>

<script type="text/javascript">
function smssub_submit() {
	var mobile = trim(jQuery('#smssub-dialog-input-mobile').val());
	var verifycode = trim(jQuery('#smssub-dialog-input-verifycode').val());
	if(mobile == '') {
		alert('手机号不能为空');
		jQuery('#smssub-dialog-input-mobile').focus();
	} else if(verifycode == '') {
		alert('验证码不能为空');
		jQuery('#smssub-dialog-input-verifycode').focus();
	} else {
		X.get(WEB_ROOT + "/ajax/sms.php?action=unsubscribecheck&mobile="+mobile+"&verifycode="+verifycode+"&r="+ Math.random());
	}
}

function captcha_again() {
	alert('验证码错误，请重新输入！');
	jQuery('#smssub-dialog-input-verifycode').val('');
	jQuery('#smssub-dialog-input-verifycode').focus();
	jQuery('#img-captcha-id').attr('src',WEB_ROOT+'/captcha.php?'+Math.random());
}

function trim(str) {
	return str.replace(/^\s*(.*?)[\s\n]*$/g, '$1');
}
</script>
