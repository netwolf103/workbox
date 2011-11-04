<?php include template("header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="settings">
	<div class="dashboard" id="dashboard">
		<ul><?php echo current_account('/account/settings.php'); ?></ul>
	</div>
    <div id="content" class="clear settings-box">
		<div class="box clear">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head">
					<h2>账户设置</h2>
					<ul class="filter">
						<li class="current"><a href="/account/settings.php">帐户设置</a></li>
						<li><a href="/credit/index.php">帐户余额</a></li>
						<li><a href="/account/myask.php">我的问答</a></li>
					</ul>
				</div>
                <div class="sect">
                    <form id="settings-form" method="post" action="/account/settings.php" enctype="multipart/form-data" class="validator">
						<div class="wholetip clear"><h3>1、基本信息</h3></div>
                        <div class="field email">
                            <label>Email</label>
                            <input type="text" size="30" name="email" id="settings-email-address" class="f-input <?php echo $readonly['email']; ?>" <?php echo $readonly['email']; ?> value="<?php echo $login_user['email']; ?>" />
                        </div>
                        <div class="field">
                            <label>头像</label>
							<?php if($login_user['avatar']){?>
							<img src="<?php echo user_image($login_user['avatar']); ?>" style="float:left;margin-top:-10px;margin-right:10px;"/>
							<?php }?>
                            <input type="file" size="30" name="upload_image" id="settings-avatar" class="f-input" />
                            <span class="hint">请上传 512KB 以内的个人肖像图片</span>
                        </div>
                        <div class="field username">
                            <label>用户名</label>
                            <input type="text" size="30" name="username" id="settings-username" class="f-input <?php echo $readonly['username']; ?>" value="<?php echo $login_user['username']; ?>" require="true" datatype="limit" min="2" max="16" maxLength="16" <?php echo $readonly['username']; ?> />
                        </div>
                        <div class="field password">
                            <label>当前密码</label>
                            <input type="password" size="30" name="oldpassword" id="settings-password-old" class="f-input" require="true" datatype="require" />
                            <span class="hint">修改帐户设置请输入当前密码</span>
                        </div>
                        <div class="field password">
                            <label>更改密码</label>
                            <input type="password" size="30" name="password" id="settings-password" class="f-input" />
                            <span class="hint">如果您不想修改密码，请保持空白</span>
                        </div>
                        <div class="field password">
                            <label>确认密码</label>
                            <input type="password" size="30" name="password2" id="settings-password-confirm" class="f-input" />
                        </div>
                        <div class="field password">
                            <label>性别</label>
							<select name="gender" class="f-city"><?php echo Utility::Option($option_gender, $login_user['gender']); ?></select>
                        </div>
						<div class="wholetip clear"><h3>2、联系信息</h3></div>
						<?php if(($INI['sms']['bind']=='1')){?>
						<div class="field mobile">
							<label>手机号码</label>
							<input type="text" size="30" name="mobile" id="settings-mobile" class="number" value="<?php echo $login_user['mobile']; ?>" readonly="readonly" /><span class="inputtip" require="true"><a href="javascript:;" onclick="bindmobile();"><font color="red"><b><?php if(!empty($login_user['mobile'])){?>重新绑定<?php } else { ?>绑定手机<?php }?></b></font></a>&nbsp;&nbsp;&nbsp;&nbsp;手机号码是我们联系你的最重要的联系方式</span>
						</div>
						<script type="text/javascript">
						function bindmobile() {
							var mobile = trim(jQuery('#settings-mobile').val());
							X.get(WEB_ROOT + '/ajax/sms.php?action=bindmobile&mobile='+mobile+'&r='+ Math.random());
						}

						function trim(str) {
							return str.replace(/^\s*(.*?)[\s\n]*$/g, '$1');
						}
						</script>
						<?php } else { ?>
						<div class="field mobile">
                            <label>手机号码</label>
                            <input type="text" size="30" name="mobile" id="settings-mobile" class="number" value="<?php echo $login_user['mobile']; ?>" require="<?php echo option_yes('needmobile')?'true':'require'; ?>" datatype="mobile|ajax" url="<?php echo $WEB_ROOT; ?>/ajax/validator.php" vname="signupmobile"  msg="手机格式不对|手机号码已经被使用" /><span class="inputtip">手机号码是我们联系您最重要的方式，请准确填写</span>
                        </div>
						<?php }?>
                        
                        <div class="field password">
                            <label>QQ</label>
                            <input type="text" size="30" name="qq" id="settings-qq" class="number" value="<?php echo $login_user['qq']; ?>" />
                        </div>
						<div class="field city">
                            <label>所在城市</label>
							<select name="city_id" class="f-city"><?php echo Utility::Option(Utility::OptionArray($allcities, 'id', 'name'), $login_user['city_id']); ?><option value='0'>其他</option></select>
                        </div>
						<div class="wholetip clear"><h3>3、派送信息</h3></div>
                        <div class="field username">
                            <label>真实姓名</label>
                            <input type="text" size="30" name="realname" id="settings-realname" class="f-input" value="<?php echo $login_user['realname']; ?>" />
							<span class="hint">真实姓名请与有效证件姓名保持一致，便于收取物品</span>
                        </div>
                        <div class="field username">
                            <label>收件地址</label>
                            <input type="text" size="30" name="address" id="settings-address" class="f-input" value="<?php echo $login_user['address']; ?>" />
                            <span class="hint">为了能及时收到物品，请按照格式填写：_省_市_县（区）_</span>
                        </div>
						                        <div class="field">
                            <label>邮政编码</label>
                            <input type="text" maxLength=6 size="10" name="zipcode" id="settings-zipcode" class="f-input number" value="<?php echo $login_user['zipcode']; ?>" />
                        </div>
                        <div class="clear"></div>
                        <div class="act">
                            <input type="submit" value="更改" name="commit" id="settings-submit" class="formbutton"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
    </div>
    <div id="sidebar" class="rail">
		<?php include template("block_side_credit");?>
		<?php include template("block_side_credittip");?>
    </div>
</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("footer");?>
