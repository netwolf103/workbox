<?php
/**
 * WPtap manage page js and css
 *
 * @package WPtap
 * @subpackage admin
 */
function wptap_admin_include_js()
{
	$script = '';

	$script .= '<script type="text/javascript" src="' . wptap_get_plugins_uri() . '/admin/js/jquery-1.3.2.min.js' . "\"></script>\n";
	//$script .= '<script type="text/javascript" src="' . wptap_get_plugins_uri() . '/admin/js/farbtastic.js' . "\"></script>\n";
	$script .= '<script type="text/javascript" src="' . wptap_get_plugins_uri() . '/admin/js/tab.js' . "\"></script>\n";
	$script .= '<script type="text/javascript" src="' . wptap_get_plugins_uri() . '/admin/js/wptap-admin.js' . "\"></script>\n";

	echo $script;
}

function wptap_admin_include_css()
{
	echo "\n<link rel='stylesheet' href='" . get_template_directory_uri() . "/css/farbtastic.css' type='text/css' media='all' />\n";
	echo "<link rel='stylesheet' href='" . wptap_get_plugins_uri() . "/admin/css/wptap-admin.css' type='text/css' media='all' />\n\n";
}
?>