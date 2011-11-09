<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');
require_once(dirname(__FILE__) . '/current.php');

need_manager();
need_auth('team');

$id = abs(intval($_GET['id']));
$team = $eteam = Table::Fetch('team', $id);

$action = isset($_GET['action']) ? $_GET['action'] : '';

if($action == 'remove') {
	$image_id = abs(intval($_GET['image_id']));

	DB::Query( "DELETE FROM huxing WHERE id='{$image_id}'" );
	Session::Set('notice', '删除成功');
	redirect( WEB_ROOT . "/manage/team/huxing.php?id={$id}");
}

if ( is_get() && empty($team) ) {
	redirect( WEB_ROOT . '/manage/team/edit.php' );
}
else if ( is_post() ) {
	$data['image'] = upload_image('upload_image', null,'team',true);
	$data['team_id'] = $id;

	$table = DB::Insert('huxing', $data);

	Session::Set('notice', '户型图上传成功');
	redirect( WEB_ROOT . "/manage/team/huxing.php?id={$id}");
}

/* huxing list */
$condition = array('team_id' => $id );
$huxing_list = DB::LimitQuery('huxing', array(
	'condition' => $condition,
));

$users = Table::Fetch('user', Utility::GetColumn($vouchers, 'user_id'));

$selector = 'edit';
include template('manage_team_huxing.html');
?>