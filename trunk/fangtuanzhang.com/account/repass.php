<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

if (is_post()) {
	if ($INI['sms']['getpwd']=='1') {
		if (empty($_POST['email']) && empty($_POST['mobile'])) {
			Session::Set('error', 'Email和手机号必须输入其中一个');
			redirect( WEB_ROOT . '/account/repass.php');
		} else {
			if (!empty($_POST['email'])) {
				$user = Table::Fetch('user', strval($_POST['email']), 'email');
				if ( $user ) {
					$user['recode'] = $user['recode'] ? $user['recode'] : md5(json_encode($user));
					Table::UpdateCache('user', $user['id'], array(
						'recode' => $user['recode'],
					));
					mail_repass($user);
					Session::Set('reemail', $user['email']);
					redirect( WEB_ROOT .'/account/repass.php?action=ok');
				}
				Session::Set('error', '你的Email没有在本站注册');
				redirect( WEB_ROOT . '/account/repass.php');
			} elseif (!empty($_POST['mobile'])) {
				if(!Utility::IsMobile($_POST['mobile'])) {
					Session::Set('error', '手机号码不正确');
					redirect( WEB_ROOT . '/account/repass.php');
				} else {
					$sended = DB::GetQueryResult("SELECT mobile FROM verifycode WHERE mobile='".$_POST['mobile']."' AND status=3 AND getip='".Utility::GetRemoteIp()."' AND dateline>'".(time()-3600)."'");
		
					if ($sended) {
						Session::Set('error', '每IP每手机号每小时只能找回一次密码');
						redirect( WEB_ROOT . '/account/repass.php');
					} else {
						$user = Table::Fetch('user', strval($_POST['mobile']), 'mobile');
						if ( $user ) {
							//设置6位随机数字密码
							$new_password = Utility::VerifyCode();

							$content = $INI['system']['sitename']." 您的用户名：".$user['username']." 新密码：".$new_password." 请及时修改密码。";//长度不能超过70个字符

							$ret = sms_send($_POST['mobile'], $content);
							if($ret===true)
							{
								//插入获取验证码数据记录
								$verifycode_data = array(
								'mobile' => $_POST['mobile'],
								'getip' => Utility::GetRemoteIp(),
								'verifycode' => $new_password,
								'dateline' => time(),
								'reguid' => $user['id'],
								'regdateline' => time(),
								'status' => 3,
								);
								
								$table = new Table('verifycode', $verifycode_data);
								$table->insert(array(
									'mobile', 'getip', 'verifycode', 'dateline', 'reguid', 'regdateline', 'status',
								));

								$password = ZUser::GenPassword($new_password);
								Table::UpdateCache('user', $user['id'], array(
									'password' => $password,
									'recode' => '',
								));

								Session::Set('notice', '成功发送找回密码短信到手机号：'.$_POST['mobile'].' 请稍候查看短信及时修改密码');
								redirect( WEB_ROOT .'/account/repass.php');
							}
							else
							{
								Session::Set('error', '找回密码短信发送失败，错误码：'.$ret.'');
								redirect( WEB_ROOT . '/account/repass.php');
							}
						}
						Session::Set('error', '你的手机号没有在本站注册');
						redirect( WEB_ROOT . '/account/repass.php');
					}
				}
			}
		}
	} else {
		if (empty($_POST['email'])) {
			Session::Set('error', 'Email不能为空');
			redirect( WEB_ROOT . '/account/repass.php');
		} else {
			$user = Table::Fetch('user', strval($_POST['email']), 'email');
			if ( $user ) {
				$user['recode'] = $user['recode'] ? $user['recode'] : md5(json_encode($user));
				Table::UpdateCache('user', $user['id'], array(
					'recode' => $user['recode'],
				));
				mail_repass($user);
				Session::Set('reemail', $user['email']);
				redirect( WEB_ROOT .'/account/repass.php?action=ok');
			}
			Session::Set('error', '你的Email没有在本站注册');
			redirect( WEB_ROOT . '/account/repass.php');
		}
	}
}

$action = strval($_GET['action']);
if ( $action == 'ok') {
	die(include template('account_repass_ok'));
}
$pagetitle = '重设密码';
include template('account_repass');
