<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$action = strval($_GET['action']);

if ( 'unsubscribe' == $action ) {
	$html = render('ajax_dialog_smsun');
	json($html, 'dialog');
}
elseif ( 'unsubscribecheck' == $action ) {
	$mobile = trim(strval($_GET['mobile']));
	$verifycode= trim(strval($_GET['verifycode']));
	if ( Utility::CaptchaCheck($verifycode) ) {
		$sms = Table::Fetch('smssubscribe', $mobile, 'mobile');
		if ( !$sms ) {
			$html = render('ajax_dialog_smsunsuc');
		} else if ( $sms['enable'] == 'N' ) {
			ZSMSSubscribe::UnSubscribe($mobile);
			$html = render('ajax_dialog_smsunsuc');
		} else {
			$secret = ZSMSSubscribe::Secret($mobile);
			$html = render('ajax_dialog_smscode');
			sms_secret($mobile, $secret, false);
		}
		json($html, 'dialog');
	} else {
		json( 'captcha_again();', 'eval' );
	}
}
else if ( 'subscribe' == $action ) {
	$html = render('ajax_dialog_smssub');
	json($html, 'dialog');
} 
elseif ( 'subscribecheck' == $action ) {
	$mobile = trim(strval($_GET['mobile']));
	$verifycode= trim(strval($_GET['verifycode']));
	$city_id = abs(intval($_GET['city_id']));
	$secret = Utility::VerifyCode();
	if ( Utility::CaptchaCheck($verifycode) ) {
		if ( ZSMSSubscribe::Create($mobile, $city_id, $secret) === true ) {
			$html = render('ajax_dialog_smssuc');
		} else {
			$html = render('ajax_dialog_smscode');
			sms_secret($mobile, $secret, true);
		}
		json($html, 'dialog');
	} else {
		json( 'captcha_again();', 'eval' );
	}
}
else if ( 'codeyes' == $action ) {
	$mobile = trim(strval($_GET['mobile']));
	$secretcode= trim(strval($_GET['secretcode']));
	$sms = Table::Fetch('smssubscribe', $mobile, 'mobile');
	if ( !$sms ) {
		json(array(
					array('data' => '非法访问！', 'type'=>'alert'),
					array('data' => 'X.boxClose();', 'type'=>'eval'),
				  ), 'mix');
	}

	if ($sms['secret'] != $secretcode) {
		json('短信认证码不正确，请重新输入！', 'alert');
	}

	if ($sms['enable'] == 'Y') {
		ZSMSSubscribe::Unsubscribe($mobile);
		$html = render('ajax_dialog_smsunsuc');
		json($html, 'dialog');
	}
	else {
		ZSMSSubscribe::Enable($mobile, true);
		$html = render('ajax_dialog_smssuc');
		json($html, 'dialog');
	}
}
else if ( 'getverifycode1' == $action ) {
	$mobile = strval($_GET['mobile']);
	
	if(!Utility::IsMobile($mobile)) {
		json('手机号码不正确', 'alert');
	}
	else {
		$interval = time()-3600;
		$sendcount = Table::Count('verifycode', array(
			'status' => 1,
			'getip' => Utility::GetRemoteIp(),
			'dateline > '.(time()-3600).'',
		));
		
		if ($sendcount >= 1)
		{
			json('每IP每手机号每小时只能获取一次验证码', 'alert');
		}
		else
		{
			$exists = Table::Count('user', array(
				'mobile' => $mobile,
			));

			if($exists >= 1) {
				json('手机号已经存在', 'alert');
			} else {
				//设置6位随机数字验证码
				$verifycode = Utility::VerifyCode();

				//发送验证码短信到手机
				$content = " 您的验证码为：".$verifycode." 一天内提交有效，感谢您的注册。[".$INI['system']['sitename']."]400-009-0517";
				
				$ret = sms_send($mobile, $content);
				if($ret===true)
				{
					//插入获取验证码数据记录
					$verifycode_data = array(
					'mobile' => $mobile,
					'getip' => Utility::GetRemoteIp(),
					'verifycode' => $verifycode,
					'dateline' => time(),
					);

					$table = new Table('verifycode', $verifycode_data);
					$table->insert(array(
						'mobile', 'getip', 'verifycode', 'dateline',
					));

					json('成功发送短信验证码到手机号：'.$mobile.' 请稍候把收到的短信验证码填写提交', 'alert');
				}
				else
				{
					json('验证码短信发送失败，错误码：'.$ret.'', 'alert');
				}
			}
		}
	}
} 
else if ( 'bindmobile' == $action ) {
	$html = render('ajax_dialog_bindmobile');
	json($html, 'dialog');
} 
else if ( 'getverifycode2' == $action ) {
	$mobile = strval($_GET['mobile']);

	if(empty($mobile)) {
		json('手机号不能为空', 'alert');
	}

	if(!Utility::IsMobile($mobile)) {
		json('手机号码不正确', 'alert');
	}

	$exists = Table::Count('user', array(
		'mobile' => $mobile,
	));

	if ($exists >= 1) {
		json('此手机号已有会员绑定', 'alert');
	}

	$sended = DB::GetQueryResult("SELECT mobile FROM verifycode WHERE (status=4 or status=5) AND getip='".Utility::GetRemoteIp()."' AND dateline>'".(time()-3600)."'");
	
	if ($sended)
	{
		json('每IP每手机号每小时只能获取一次验证码', 'alert');
	}
	else
	{
		//设置6位随机数字验证码
		$verifycode = Utility::VerifyCode();

		//发送验证码短信到手机
		$content = $INI['system']['sitename']." 您的手机号：".$mobile." 绑定验证码：".$verifycode." 一天内提交绑定有效。";//长度不能超过70个字符

		$ret = sms_send($mobile, $content);
		if($ret===true)
		{
			//插入获取验证码数据记录
			$verifycode_data = array(
			'mobile' => $mobile,
			'getip' => Utility::GetRemoteIp(),
			'verifycode' => $verifycode,
			'dateline' => time(),
			'status' => 4,
			);

			$table = new Table('verifycode', $verifycode_data);
			$table->insert(array(
				'mobile', 'getip', 'verifycode', 'dateline', 'status',
			));

			json('绑定验证码短信成功发送到手机号：'.$mobile.'', 'alert');
		}
		else
		{
			json('绑定验证码短信发送失败，错误码：'.$ret.'', 'alert');
		}
	}
} elseif ( 'bindmobile_submit' == $action ) {
	$mobile = strval($_GET['mobile']);
	$verifycode = strval($_GET['verifycode']);

	if(empty($mobile)) {
		json('手机号不能为空', 'alert');
	}

	if(!Utility::IsMobile($mobile)) {
		json('手机号码不正确', 'alert');
	}

	if(empty($verifycode)) {
		json('绑定验证码不能为空', 'alert');
	}

	$exists = Table::Count('user', array(
		'mobile' => $mobile,
	));

	if ($exists >= 1) {
		json('此手机号已有会员绑定', 'alert');
	}

	//验证手机号验证码和IP
	$verify = DB::GetQueryResult("SELECT mobile FROM verifycode WHERE mobile='".$mobile."' AND verifycode='".$verifycode."' AND getip='".Utility::GetRemoteIp()."' AND status=4 AND dateline>'".(time()-86400)."'");//验证码一天内有效
		
	if (!$verify)
	{
		json('手机号和绑定验证码不匹配', 'alert');
	}
	else
	{
		DB::GetQueryResult("UPDATE user SET mobile='".$mobile."' WHERE id=".$login_user['id']."");//更新会员手机号数据

		DB::GetQueryResult("UPDATE verifycode SET reguid=".$login_user['id'].",regdateline='".time()."',status=5 WHERE mobile='".$mobile."' AND verifycode='".$verifycode."' AND getip='".Utility::GetRemoteIp()."' AND status=4 AND dateline>'".(time()-86400)."'");//更新验证码记录表数据
	}

	json('手机号：'.$mobile.' 绑定成功', 'alert');

}