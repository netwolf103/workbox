<?php
function sms_send($phone, $content) {
	global $INI;
	if (mb_strlen($content, 'UTF-8') < 20) {
		return '短信长度低于20汉字？长点吧～';
	}

	/* include customsms function */
	$smsowner_file = dirname(__FILE__) . '/smsowner.php';
	if (file_exists($smsowner_file)) { 
		require_once( $smsowner_file);
		if(function_exists('sms_send_owner')) {
			return sms_send_owner($phone, $content);
		}
	}
	/* end include */

	$user = strval($INI['sms']['user']); 
	$pass = strtolower(md5($INI['sms']['pass']));
	if(null==$user) return true;
	$content = urlEncode($content);
	$api = "http://notice.zuitu.com/sms?user={$user}&pass={$pass}&phones={$phone}&content={$content}";
	$res = Utility::HttpRequest($api);
	return trim(strval($res))=='+OK' ? true : strval($res);
}

function sms_secret($mobile, $secret, $enable=true) {
	global $INI;
	$funccode = $enable ? '订阅' : '退订';
	$content = "{$INI['system']['sitename']}，您的手机号：{$mobile} 短信{$funccode}功能认证码：{$secret}。";
	sms_send($mobile, $content);
}

function sms_bind($mobile, $secret) {
	global $INI;
	$content = "{$INI['system']['sitename']}，您的手机号：{$mobile} 绑定码：{$secret}。";
	sms_send($mobile, $content);
}

function sms_usecoupon($coupon, $mobile=null) {
	global $INI;
	$user = Table::Fetch('user', $coupon['user_id']);
	$order = Table::Fetch('order', $coupon['order_id']);
	if (!Utility::IsMobile($mobile)) {
		$mobile = $order['mobile'];
		if (!Utility::IsMobile($mobile)) {
			$mobile= $user['mobile'];
		}
	}
	$team = Table::Fetch('team', $coupon['team_id']);
	$coupon['use'] = date('m月d日 H时i分');
	$coupon['name'] = $team['product'];
	$content = render('manage_tpl_usecoupon', array(
				'coupon' => $coupon,
				'user' => $user,
				));
	sms_send($mobile, $content);
}

function sms_coupon($coupon, $mobile=null) {
	global $INI;
	if ( $coupon['consume'] == 'Y' 
			|| $coupon['expire_time'] < strtotime(date('Y-m-d'))) {
		return $INI['system']['couponname'] . '已失效';
	}

	$user = Table::Fetch('user', $coupon['user_id']);
	$order = Table::Fetch('order', $coupon['order_id']);

	if (!Utility::IsMobile($mobile)) {
		$mobile = $order['mobile'];
		if (!Utility::IsMobile($mobile)) {
			$mobile= $user['mobile'];
		}
	}
	if (!Utility::IsMobile($mobile)) {
		return '请设置合法的手机号码，以便接受短信';
	}
	$team = Table::Fetch('team', $coupon['team_id']);
	$partner = Table::Fetch('partner', $coupon['partner_id']);

	$coupon['end'] = date('Y-n-j', $coupon['expire_time']);
	$coupon['name'] = $team['product'];
	$content = render('manage_tpl_smscoupon', array(
				'partner' => $partner,
				'coupon' => $coupon,
				'user' => $user,
				));

	if (true===($code=sms_send($mobile, $content))) {
		Table::UpdateCache('coupon', $coupon['id'], array(
					'sms' => array('`sms` + 1'),
					'sms_time' => time(),
					));
		return true;
	}
	return $code;
}

function sms_voucher($voucher, $mobile=null) {
	global $INI;
	$user = Table::Fetch('user', $voucher['user_id']);
	$order = Table::Fetch('order', $voucher['order_id']);

	if (!Utility::IsMobile($mobile)) {
		$mobile = $order['mobile'];
		if (!Utility::IsMobile($mobile)) {
			$mobile= $user['mobile'];
		}
	}
	if (!Utility::IsMobile($mobile)) {
		return '请设置合法的手机号码，以便接受短信';
	}

	$team = Table::Fetch('team', $voucher['team_id']);
	$partner = Table::Fetch('partner', $team['partner_id']);

	$voucher['end'] = date('Y-n-j', $team['expire_time']);
	$voucher['name'] = $team['product'];
	$content = render('manage_tpl_smsvoucher', array(
				'partner' => $partner,
				'voucher' => $voucher,
				'user' => $user,
				));

	if (true===($code=sms_send($mobile, $content))) {
		Table::UpdateCache('voucher', $voucher['id'], array(
					'sms' => array('`sms` + 1'),
					'sms_time' => time(),
					));
		return true;
	}
	return $code;
}

function sms_express($id, &$flag=null) {
	$order = Table::Fetch('order', $id);
	$team = Table::Fetch('team', $order['team_id']);
	if (!$order['express_id']) {
		$flag = 'No express';
		return false;
	}
	$express = Table::Fetch('category', $order['express_id']);
	$html = render('manage_tpl_smsexpress', array(
				'team' => $team,
				'express_name' => $express['name'],
				'express_no' => $order['express_no'],
				));
	$phone = $order['mobile'];
	if ( true === ($flag = sms_send($phone, $html)) ) {
		Table::UpdateCache('order', $id, array(
			'sms_express' => 'Y',
		));
		return true;
	}
	return false;
}
