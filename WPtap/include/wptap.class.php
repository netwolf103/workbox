<?php
/**
 * WPtap core file.
 *
 * @package WPtap
 * @subpackage libary
 */
class WPtapPlugin
{
	var $applemobile;
	var $output_started;

	function WPtapPlugin()
	{
		$this->applemobile = false;
		//$wptap_setting = wptap_get_settings();

		add_action('plugins_loaded', array(&$this, 'detectAppleMobile'));

		add_filter('stylesheet', array(&$this, 'get_stylesheet'));
		add_filter('theme_root', array(&$this, 'theme_root'));
		add_filter('theme_root_uri', array(&$this, 'theme_root_uri'));
		add_filter('template', array(&$this, 'get_template'));
	}

	function detectAppleMobile($query = '') {
		$container = $_SERVER['HTTP_USER_AGENT'];

		$useragents = array(
//developer mode		
		"Safari",
		"iPhone", 
		"iPod", 
		"aspen", 
		"dream",
		"incognito", 
		"webmate", 
		"BlackBerry9500", 
		"BlackBerry9530");
		$this->applemobile = false;

		foreach ($useragents as $useragent) {
			if (eregi($useragent, $container)) {
				$this->applemobile = true;
			}
		}

		/*if(true){
			$this->applemobile = true;
		}*/
		
		if(!is_admin()) {
			$this->wptap_filter_iphone();
		}
	}

	function wptap_filter_iphone()
	{
		$key = 'wptap_mobile_' . md5(get_option('siteurl'));

		if(isset($_COOKIE[$key])) {
			if($_COOKIE[$key] == 'mobile') {
				$this->applemobile = true;
			} elseif($_COOKIE[$key] == 'normal') {
				$this->applemobile = false;
			}
		}

		if(isset($_GET['wptap_view'])) {
			if($_GET['wptap_view'] == 'mobile') {
				setcookie($key, 'mobile', 0);
			} elseif ($_GET['wptap_view'] == 'normal') {
				setcookie($key, 'normal', 0);
			}

			header('Location: ' . get_option('siteurl'));
			die;
		}

	}

	function get_template($template) {
		$wptap_setting = wptap_get_settings();

		if ($this->applemobile) {
			return $wptap_setting['theme'];
		} else {	   
			return $template;
		}
	}

	function get_stylesheet($stylesheet) {
		$wptap_setting = wptap_get_settings();

		if ($this->applemobile) {
			return $wptap_setting['theme'];
		} else {
			return $stylesheet;
		}
	}

	function theme_root($path) {
		if ($this->applemobile) {
			return WPTAP_PLUGIN_PATH . '/themes';
		} else {
			return $path;
		}
	}

	function theme_root_uri($url) {
		global $wptap_plugin_dir_name;

		if ($this->applemobile || is_admin()) {
			$dir = get_bloginfo('wpurl') . "/wp-content/" . $wptap_plugin_dir_name . "/" .WPTAP_PLUGIN_NAME. "/themes";
			return $dir;
		} else {
			return $url;
		}
	}
}
?>