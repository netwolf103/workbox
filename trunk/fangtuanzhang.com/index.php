<?php
require_once(dirname(__FILE__) . '/app.php');

if(!$INI['db']['host']) redirect( WEB_ROOT . '/install.php' );
if($city&&option_yes('rewritecity')){
	redirect(WEB_ROOT."/{$city['ename']}");
}

$cityid=abs(intval($city['id']));
$request_uri = 'index';

//分类
$group_id = abs(intval($_GET['gid']));
$oc=array();
if ($group_id){
	$oc['group_id']=$group_id;
	$group = Table::Fetch('category', $group_id);
}
	$now = time();
	$size = abs(intval($INI['system']['sideteam']));
	$oc['team_type'] = 'normal';
	$oc[]=	"begin_time < '".$now."'";
	$oc[]=	"end_time > '".$now."'";
	
	$oc[] = "(city_id=0) or (city_id =$cityid) or (city_ids like '%@".$cityid."@%')";
	$team=$teams = DB::LimitQuery('team', array(
				'condition' => $oc,
				'order' => 'ORDER BY `sort_order` DESC, `id` DESC',
				'size' => $size,
				));


if ($team && $team['id']) {
	$_GET['id'] = abs(intval($team['id']));
	die(require_once( dirname(__FILE__) . '/team.php'));
}
elseif ($teams) {
	$disable_multi = true;
	die(require_once( dirname(__FILE__) . '/multi.php'));
}

include template('subscribe');

