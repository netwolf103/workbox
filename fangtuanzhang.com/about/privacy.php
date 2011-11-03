<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$page = Table::Fetch('page', 'about_privacy');
$pagetitle = '服务声明';
include template('about_privacy');
