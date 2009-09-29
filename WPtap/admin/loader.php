<?php
/** 
 * 
 *
 * @package WPtap
 * @subpackage admin
 */
if(defined('WPTAP_PLUGIN_ADMIN_INCLUDE_PATH')) {
	require(WPTAP_PLUGIN_ADMIN_INCLUDE_PATH . DS . 'action.php');
} else {
	require('./include/action.php');
}
?>