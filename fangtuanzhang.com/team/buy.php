<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$id = abs(intval($_GET['id']));

$team = Table::Fetch('team', $id);
if ( !$team || $team['begin_time']>time() ) {
	Session::Set('error', '团购项目不存在');
	redirect( WEB_ROOT . '/index.php' );
}

/* 查询快递清单 */
if ($team['delivery'] == 'express') {
	$express_ralate = unserialize($team['express_relate']);
	foreach ($express_ralate as $k=>$v) {
		$express[$k] = Table::Fetch('category',$v['id']);
		$express[$k]['relate_data'] = $v['price'];
	}
}

//whether buy
$ex_con = array(
		'user_id' => $login_user_id,
		'team_id' => $team['id'],
		'state' => 'unpay',
		);
$order = DB::LimitQuery('order', array(
	'condition' => $ex_con,
	'one' => true,
));

//buyonce
if (strtoupper($team['buyonce'])=='Y') {
	$ex_con['state'] = 'pay';
	if ( Table::Count('order', $ex_con) ) {
		Session::Set('error', '您已经成功参加了本项目的团购，请勿重复参加，快去关注一下其他项目吧！');
		redirect( WEB_ROOT . "/team.php?id={$id}"); 
	}
}

//peruser buy count
if ($team['per_number']>0) {
	$now_count = Table::Count('order', array(
		'user_id' => $login_user_id,
		'team_id' => $id,
		'state' => 'pay',
	), 'quantity');
	$team['per_number'] -= $now_count;
	if ($team['per_number']<=0) {
		Session::Set('error', '您已经参加过了，快去关注一下其他项目吧！');
		redirect( WEB_ROOT . "/team.php?id={$id}"); 
	}
}
else {
	if ($team['max_number']>0) $team['per_number'] = $team['max_number'] - $team['now_number'];
}

if ( is_get() ) {
		Session::Set('loginpage', $_SERVER['REQUEST_URI']);
	}
//post buy
if ( $_POST ) {
	need_login();
	$express_price = (int) $_POST['express_price'];
	$express_id = (int) $_POST['express_id'];
	$condbuy = implode('@', $_POST['condbuy']);
	
	$table = new Table('order', $_POST);
	$table->quantity = abs(intval($table->quantity));

//	if ( $table->quantity == 0 ) {
//		Session::Set('error', '购买数量不能小于1份');
//		redirect( WEB_ROOT . "/team/buy.php?id={$team['id']}");
//	} 
//	elseif ( $team['per_number']>0 && $table->quantity > $team['per_number'] ) {
//		Session::Set('error', '您本次购买本单项目已超出限额！');
//		redirect( WEB_ROOT . "/team.php?id={$id}"); 
//	}

	if ($order && $order['state']=='unpay') {
		$table->SetPk('id', $order['id']);
	}

	$table->user_id = $login_user_id;
	$table->state = 'unpay';
	$table->allowrefund = $team['allowrefund'];
	$table->team_id = $team['id'];
	$table->city_id = $team['city_id'];
	$table->express = ($team['delivery']=='express') ? 'Y' : 'N';
	$table->fare = $table->express=='Y' ? $express_price : 0;
	$table->express_id = $table->express=='Y' ? $express_id : 0;
	$table->price = $team['team_price'];
	$table->credit = 0;
	$table->condbuy = $condbuy;

	if ( $table->id ) {
		$eorder = Table::Fetch('order', $table->id);
		if ($eorder['state']=='unpay' 
				&& $eorder['team_id'] == $id
				&& $eorder['user_id'] == $login_user_id
		   ) {
			$table->origin = team_origin($team, $table->quantity,$express_price);
			$table->origin -= $eorder['card'];
		} else {
			$eorder = null;
		}
	}
	if (!$eorder){
		$table->SetPk('id', null);
		$table->create_time = time();
		$table->origin = team_origin($team, $table->quantity,$express_price);
	}

	$insert = array(
			'user_id', 'team_id', 'city_id', 'state','allowrefund', 'express_id',
			'fare', 'express', 'origin', 'price',
			'address', 'zipcode', 'realname', 'mobile', 
			'quantity', 'create_time', 'remark', 'condbuy',
		);
	if ($flag = $table->update($insert)) {
		$order_id = abs(intval($table->id));
		
		/* 插入订单来源 */
		$data['order_id'] = $order_id;
		$data['user_id'] = $login_user_id;
		$data['referer'] = $_COOKIE['referer'];
		$data['create_time'] = time();
		DB::Insert('referer', $data);
		
		redirect(WEB_ROOT."/order/check.php?id={$order_id}");
	}
}

//each user per day per buy
if (!$order) { 
	$order = json_decode(Session::Get('loginpagepost'),true);
	settype($order, 'array');
	if ($order['mobile']) $login_user['mobile'] = $order['mobile'];
	if ($order['zipcode']) $login_user['zipcode'] = $order['zipcode'];
	if ($order['address']) $login_user['address'] = $order['address'];
	if ($order['realname']) $login_user['realname'] = $order['realname'];
        if ($team['permin_number']>1 && $team['permin_number']<$team['per_number']){
        $order['quantity'] = $team['permin_number'];
        }else{
        $order['quantity'] = 1;
        }
}
//end;

$order['origin'] = team_origin($team, $order['quantity']);

if ($team['max_number']>0 && $team['conduser']=='N') {
	$left = $team['max_number'] - $team['now_number'];
	if ($team['per_number']>0) {
		$team['per_number'] = min($team['per_number'], $left);
	} else {
		$team['per_number'] = $left;
	}
}

$team['condbuy'] = explode('@', $team['condbuy']);
foreach ($team['condbuy'] as $k=>$v) {
	$team['condbuy'][$k] = nanooption($v);
}

include template('team_buy');
