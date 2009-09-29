<?php
/**
 * WPtap path define file
 *
 * @package WPtap
 */

define('WPTAP_VERSION', '1.0.0'); // define WPtap plugin version

// Define PATH constants

define('DS', DIRECTORY_SEPARATOR); // define directory separator

//if(!defined(WPTAP_PLUGIN_URL)) {
//	define('WPTAP_PLUGIN_URL', WP_CONTENT_URL . '/' . $wptap_plugin_dir_name . '/' . 'WPtap');
//}

if(!defined('WPTAP_PLUGIN_PATH')) {
	define('WPTAP_PLUGIN_PATH', dirname(__FILE__)); // define Plugin directory
}

if(!defined('WPTAP_INCLUDE_PATH')) {
	define('WPTAP_INCLUDE_PATH', WPTAP_PLUGIN_PATH . DS . 'include' . DS); // define include directory
}

if(!defined('WPTAP_HTML_PATH')) {
	define('WPTAP_HTML_PATH', WPTAP_PLUGIN_PATH . DS . 'html' . DS); // define html directory
}

if(!defined('WPTAP_THEME_PATH')) {
	define('WPTAP_THEME_PATH', WPTAP_PLUGIN_PATH . 'themes' . DS); // define themes directory
}

if(!defined('WPTAP_IMAGE_PATH')) {
	define('WPTAP_IMAGE_PATH', WPTAP_PLUGIN_PATH . DS . 'images' . DS); // define images directory
}

if(!defined('WPTAP_ICON_PATH')) {
	define('WPTAP_ICON_PATH', WPTAP_IMAGE_PATH . DS . 'icons' . DS); // define icons directory
}

if(!defined('WPTAP_PLUGIN_ADMIN_PATH')) {
	define('WPTAP_PLUGIN_ADMIN_PATH', WPTAP_PLUGIN_PATH . DS . 'admin' . DS); // define plugin admin directory
}

if(!defined('WPTAP_PLUGIN_ADMIN_INCLUDE_PATH')) {
	define('WPTAP_PLUGIN_ADMIN_INCLUDE_PATH', WPTAP_PLUGIN_ADMIN_PATH . DS . 'include' . DS); // define plugin admin include directory
}

if(!defined('WPTAP_PLUGIN_ADMIN_JS_PATH')) {
	define('WPTAP_PLUGIN_ADMIN_JS_PATH', WPTAP_PLUGIN_ADMIN_PATH . DS . 'js' . DS); // define plugin admin js directory
}
?>