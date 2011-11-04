<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/app.php');

need_manager();
need_auth('admin');

$action = strval($_GET['action']);
$id = abs(intval($_GET['id']));

$r = udecode($_GET['r']);
$tid = strval($_GET['tid']);
$cate = strval($_GET['cate']);
$like = strval($_GET['like']);

if ( $action == 'r' ) {
	Table::UpdateCache('order',$id,array('comment_content'=>'******'));
	redirect($r);
}

$condition = array("comment_time > 0 AND comment_content <> '******'");
if ($tid) { $condition['team_id'] = $tid; }
if ($cate) { $condition['comment_grade'] = $cate; }
if ($like) { 
	$condition[] = "commnet_content like '%".mysql_escape_string($like)."%'";
}

$count = Table::Count('order', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);

$orders = DB::LimitQuery('order', array(
	'condition' => $condition,
	'order' => 'ORDER BY id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

$user_ids = Utility::GetColumn($orders, 'user_id');
$users = Table::Fetch('user', $user_ids);

include template('manage_misc_comment');
