<?php include template("manage_header");?>

<div id="bdw" class="bdw">
<div id="bd" class="cf">
<div id="user">
	<div class="dashboard" id="dashboard">
		<ul><?php echo mcurrent_user(null); ?><li class="current"><a href="/manage/user/edit.php?id=<?php echo $user['id']; ?>">编辑用户</a><span></span></li></ul>
	</div>
	<div id="content" class="clear mainwide">
        <div class="clear box">
            <div class="box-top"></div>
            <div class="box-content">
                <div class="head"><h2>编辑用户</h2><b style="margin-left:20px;font-size:16px;">（<?php echo $user['email']; ?>/<?php echo $user['username']; ?>）</b></div>
                <div class="sect">
                    <form id="login-user-form" method="post" action="/manage/user/edit.php?id=<?php echo $user['id']; ?>">
					<input type="hidden" name="id" value="<?php echo $user['id']; ?>" />
						<div class="wholetip clear"><h3>1、身份信息</h3></div>
                        <div class="field">
                            <label>用户Email</label>
                            <input type="text" size="30" name="email" id="user-edit-email" class="f-input f-hint" value="<?php echo $user['email']; ?>" />
						</div>
						<div class="field">
                            <label>用户名</label>
                            <input type="text" size="30" name="username" id="user-edit-username" class="f-input f-hint" value="<?php echo $user['username']; ?>" />
                        </div>
						<div class="field">
                            <label>真实姓名</label>
                            <input type="text" size="30" name="realname" id="user-edit-realname" class="f-input f-hint" value="<?php echo $user['realname']; ?>" />
                        </div>
						<div class="field">
                            <label>QQ号码</label>
                            <input type="text" size="30" name="qq" id="user-edit-qq" class="number" value="<?php echo $user['qq']; ?>" />
                        </div>
                        <div class="field password">
                            <label>登录密码</label>
                            <input type="text" size="30" name="password" id="settings-password" class="f-input f-hint" />
                            <span class="hint">如果不想修改密码，请保持空白</span>
                        </div>
						<div class="wholetip clear"><h3>2、基本信息</h3></div>
                        <div class="field">
                            <label>邮政编码</label>
                            <input type="text" size="30" name="zipcode" id="user-edit-zipcode" class="f-input f-hint" value="<?php echo $user['zipcode']; ?>"/>
                        </div>
                        <div class="field">
                            <label>配送地址</label>
                            <input type="text" size="30" name="address" id="user-edit-address" class="f-input f-hint" value="<?php echo $user['address']; ?>"/>
						</div>
                        <div class="field">
                            <label>手机号码</label>
                            <input type="text" size="30" name="mobile" id="user-edit-mobile" class="number" value="<?php echo $user['mobile']; ?>" maxLength="11" />
						</div>
						<div class="wholetip clear"><h3>3、附加信息</h3></div>
                        <div class="field">
                            <label>邮件验证</label>
                            <input type="text" size="30" name="secret" id="user-edit-secret" class="f-input f-hint" value="<?php echo $user['secret']; ?>"/>
                            <span class="hint">通过验证，请清空该字段</span>
                        </div>
						<?php if($login_user_id==1&&$user['id']>1){?>
                        <div class="field">
                            <label>管理员</label>
                            <input type="text" size="30" name="manager" id="user-edit-manager" class="number" value="<?php echo $user['manager']; ?>" maxLength="1" require="true" datatype="require" style="text-transform:uppercase;" /><span class="inputtip">Y:是 N:否</span>
						</div>
						<?php }?>
                        <div class="act">
                            <input type="submit" value="编辑" name="commit" id="user-submit" class="formbutton"/>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-bottom"></div>
        </div>
	</div>

<div id="sidebar">
</div>

</div>
</div> <!-- bd end -->
</div> <!-- bdw end -->

<?php include template("manage_footer");?>
