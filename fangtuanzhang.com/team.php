<?php
require_once(dirname(__FILE__) . '/app.php');

$id = abs(intval($_GET['id']));
if (!$id || !$team = Table::FetchForce('team', $id) ) {
	redirect( WEB_ROOT . '/team/index.php');
}

/* refer */
if ($_rid = abs(intval($_GET['r']))) { 
	if($_rid) cookieset('_rid', abs(intval($_GET['r'])));
	redirect( WEB_ROOT . "/team.php?id={$id}");
}
$teamcity = Table::Fetch('category', $team['city_id']);
$city = $teamcity ? $teamcity : $city;
$city = $city ? $city : array('id'=>0, 'name'=>'全部');

$pagetitle = $team['title'];

$discount_price = $team['market_price'] - $team['team_price'];
$discount_rate = team_discount($team);

$left = array();
$now = time();

if($team['end_time']<$team['begin_time']){$team['end_time']=$team['begin_time'];}

$diff_time = $left_time = $team['end_time']-$now;
if ( $team['team_type'] == 'seconds' && $team['begin_time'] >= $now ) {
	$diff_time = $left_time = $team['begin_time']-$now;
}

$left_day = floor($diff_time/86400);
$left_time = $left_time % 86400;
$left_hour = floor($left_time/3600);
$left_time = $left_time % 3600;
$left_minute = floor($left_time/60);
$left_time = $left_time % 60;

/* progress bar size */
$bar_size = ceil(190*($team['now_number']/$team['min_number']));
$bar_offset = ceil(5*($team['now_number']/$team['min_number']));
$partner = Table::Fetch('partner', $team['partner_id']);
$team['state'] = team_state($team);

/* your order */
if ($login_user_id && 0==$team['close_time']) {
	$order = DB::LimitQuery('order', array(
				'condition' => array(
					'team_id' => $id,
					'user_id' => $login_user_id,
					'state' => 'unpay',
					),
				'one' => true,
				));
}
/* end order */

/*kxx team_type */
if ($team['team_type'] == 'seconds') {
	die(include template('team_view_seconds'));
}
if ($team['team_type'] == 'goods') {
	die(include template('team_view_goods'));
}
/*xxk*/

// 户型图
$condition = array('team_id' => $id );

$count = Table::Count('huxing', $condition);
list($pagesize, $offset, $pagestring) = pagestring($count, 50);

$huxing_list = DB::LimitQuery('huxing', array(
	'condition' => $condition,
));

// 楼盘详情
$details = Table::Fetch('details', $id, 'team_id');

/*seo*/
$seo_title = $team['seo_title'];
$seo_keyword = $team['seo_keyword'];
$seo_description = $team['seo_description'];
if($seo_title) $pagetitle = $seo_title;
/*end*/
include template('team_view');
