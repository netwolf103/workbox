<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$Price_type = isset($_GET['Price'])?trim($_GET['Price']):'';

if($Price_type=='0'){
	$Price_qu='4000元/㎡ 以下';
	$Price_zhi='team_price<4000';
}elseif($Price_type=='1'){
	$Price_qu='4000-5000元/㎡';
	$Price_zhi='team_price>=4000 and team_price<=5000';
}elseif($Price_type=='2'){
	$Price_qu='5000-6000元/㎡';
	$Price_zhi='team_price>=5000 and team_price<=6000';
}elseif($Price_type=='3'){
	$Price_qu='6000-7000元/㎡';
	$Price_zhi='team_price>=6000 and team_price<=7000';
}elseif($Price_type=='4'){
	$Price_qu='7000-8000元/㎡';
	$Price_zhi='team_price>=7000 and team_price<=8000';
}elseif($Price_type=='5'){
	$Price_qu='8000-9000元/㎡';
	$Price_zhi='team_price>=8000 and team_price<=9000';
}elseif($Price_type=='6'){
	$Price_qu='9000-10000元/㎡';
	$Price_zhi='team_price>=9000 and team_price<=10000';
}elseif($Price_type=='7'){
	$Price_qu='10000元/㎡ 以上';
	$Price_zhi='team_price>10000';
}else {
	$Price_qu='全部';
	$Price_zhi='';
};
$daytime = time();
$condition = array( 
		'team_type' => 'normal',
		"begin_time <= '{$daytime}'",
		);
$city_id = abs(intval($city['id']));
$condition[] = "(city_ids like '%@{$city_id}@%' or city_ids like '%@0@%') or (city_ids = '' and city_id in(0,{$city_id}))";

/* filter */
$group_id = abs(intval($_GET['gid']));
if ($group_id) $condition['group_id'] = $group_id;

$count = Table::Count('team', $Price_zhi);
list($pagesize, $offset, $pagestring) = pagestring($count, 20);
$goods = DB::LimitQuery('team', array(
	'condition' => $Price_zhi,
	'order' => 'ORDER BY begin_time DESC, id DESC',
	'size' => $pagesize,
	'offset' => $offset,
));

$pagetitle = '根据价格' . $Price_qu .'筛选结果';
include template('team_Price_fl');




function current_teamcategory($gid='0') {
	global $city;
	$a = array(
			'/team/Price_fl.php' => '所有',
			);
	foreach(option_hotcategory('group') AS $id=>$name) {
		$a["/team/Price_fl.php?gid={$id}"] = $name;
	}
	$l = "/team/Price_fl.phpgid={$gid}";
	if (!$gid) $l = "/team/Price_fl.php";
	return current_link($l, $a, true);
}


