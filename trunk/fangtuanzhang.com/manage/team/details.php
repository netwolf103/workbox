<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
require_once(dirname(__FILE__) . '/current.php');

need_manager();
need_auth('team');

$id = abs(intval($_GET['id']));
$details = Table::Fetch('details', $id, 'team_id');

if ( is_post() ) {
	$insert = array(
		'price', 'telephone', 'checkin', 'wylb', 
		'hxwz', 'build_type', 'wydz', 'kpsj', 
		'traffic', 'rjl', 'wyf','bzcmj','developers', 'xmts','sldz','decoration', 'business_circle', 'zlhx', 'greenrate', 'wygs',
		'ysxkz'
		);

	$data = $_POST;
	$data['team_id'] = $id;
	unset($data['commit']);
	
	if( !$details ) {
		DB::Insert('details', $data);
	} else {
		DB::Update('details', $id, $data, 'team_id');
	}

	Session::Set('notice', '户型图上传成功');
	redirect( WEB_ROOT . "/manage/team/details.php?id={$id}");
}

$selector = 'edit';
include template('manage_team_details.html');
?>