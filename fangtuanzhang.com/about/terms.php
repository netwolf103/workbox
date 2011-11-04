<?php
require_once(dirname(dirname(__FILE__)) . '/app.php');

$page = Table::Fetch('page', 'about_terms');
$pagetitle = '代理招商';
include template('about_terms');
