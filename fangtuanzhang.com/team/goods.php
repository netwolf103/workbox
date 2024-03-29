<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$daytime = time();
$condition = array( 
		'team_type' => 'goods',
		"begin_time <= '{$daytime}'",
		);
$city_id = abs(intval($city['id']));
$condition[] = "(city_ids like '%@{$city_id}@%' or city_ids like '%@0@%') or (city_ids = '' and city_id in(0,{$city_id}))";

/* filter */
$group_id = abs(intval($_GET['gid']));
if ($group_id) $condition['group_id'] = $group_id;

$count = Table::Count('team', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
$goods = DB::LimitQuery('team', array(
	'condition' => $condition,
	'order' => 'ORDER BY begin_time DESC, id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

$pagetitle = '热销楼盘';
include template('team_goods');

function current_teamcategory($gid='0') {
	global $city;
	$a = array(
			'/team/goods.php' => '所有',
			);
	foreach(option_hotcategory('group') AS $id=>$name) {
		$a["/team/goods.php?gid={$id}"] = $name;
	}
	$l = "/team/goods.php?gid={$gid}";
	if (!$gid) $l = "/team/goods.php";
	return current_link($l, $a, true);
}
