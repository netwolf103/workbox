<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

if ( $_POST ) {
	verify_captcha('verifyregister', WEB_ROOT . '/account/signup.php');
	$u = array();
	$u['username'] = strval($_POST['username']);
	$u['password'] = strval($_POST['password']);
	$u['email'] = strval($_POST['email']);
	$u['city_id'] = isset($_POST['city_id']) 
		? abs(intval($_POST['city_id'])) : abs(intval($city['id']));
	$u['mobile'] = strval($_POST['mobile']);

	if ( $_POST['subscribe'] ) { 
		ZSubscribe::Create($u['email'], abs(intval($u['city_id']))); 
	}
	if ( ! Utility::ValidEmail($u['email'], true) ) {
		Session::Set('error', 'Email地址为无效地址');
		redirect( WEB_ROOT . '/account/signup.php');
	}
	if ($_POST['password2']==$_POST['password'] && $_POST['password']) {
		if ( option_yes('emailverify') ) { 
			$u['enable'] = 'N'; 
		}

		if ($INI['sms']['reg']=='1') {
			if (!Utility::IsMobile($u['mobile'])) {
				Session::Set('error', '手机号码不正确');
				redirect( WEB_ROOT . '/account/signup.php');
			}

			$exists = Table::Count('user', array(
					'mobile' => $u['mobile'],
				));

			if ($exists) {
				Session::Set('error', '注册失败，手机号已被使用');
				redirect( WEB_ROOT . '/account/signup.php');
			}

			if(empty($_POST['verifycode'])) {
				Session::Set('error', '注册失败，验证码不能为空');
				redirect( WEB_ROOT . '/account/signup.php');
			}

			//验证手机号验证码和IP
			$verify = Table::Count('verifycode', array(
				'status' => 1,
				'mobile' => $u['mobile'],
				'verifycode' => $_POST['verifycode'],
				'getip' => Utility::GetRemoteIp(),
				'dateline > '.(time()-84600).'',//验证码一天内有效
			));
				
			if (!$verify)
			{
				Session::Set('error', '注册失败，手机号和验证码不匹配');
				redirect( WEB_ROOT . '/account/signup.php');
			}
		}

		if ( $user_id = ZUser::Create($u) ) {
			ZCredit::Register($user_id);

			if ($INI['sms']['reg']=='1') {
				DB::GetQueryResult("UPDATE verifycode SET reguid=".$user_id.",regdateline='".time()."',status=2 WHERE mobile='".$u['mobile']."' AND verifycode='".$verifycode."' AND getip='".Utility::GetRemoteIp()."' AND status=1 AND dateline>'".(time()-86400)."'");//更新验证码记录表数据
			}

			if ( option_yes('emailverify') ) {
				mail_sign_id($user_id);
				Session::Set('unemail', $_POST['email']);
				redirect( WEB_ROOT . '/account/signuped.php');
			} else {
				ZLogin::Login($user_id);
				redirect(get_loginpage(WEB_ROOT . '/index.php'));
			}
		} else {
			$au = Table::Fetch('user', $_POST['email'], 'email');
			if ( $au ) {
				Session::Set('error', '注册失败，Email已被使用');
			} else {
				Session::Set('error', '注册失败，用户名已被使用');
			}
		}
	} else {
		Session::Set('error', '注册失败，密码设置有问题');
	}
}

$pagetitle = '注册';
include template('account_signup');
