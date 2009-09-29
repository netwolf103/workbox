<?php
/**
 * WPtap global function.
 *
 * @package WPtap
 * @subpackage libary
 */

/**
 * If options does not exists, then use the default settings.
 *
 * @param array $settings submit options.
 */
function wptap_validate_settings(&$settings)
{
	global $wptap_default_settings;

	foreach($wptap_default_settings as $key => $value) {
		if(!isset($settings[$key])) {
			$settings[$key] = $value;
		}
	}
}


/**
 * get options
 *
 * @return array options array
 */
function wptap_get_settings()
{
	$v = get_option('wptap_iphone_pages');
	if (!$v) {
		$v = array();
	}
	
	if (!is_array($v)) {
		$v = unserialize($v);
	}

	wptap_validate_settings($v);

	return $v;
}

/**
 * get themes
 *
 * @return array themes array
 */
function wptap_get_themes()
{
	$theme_root = WPTAP_THEME_PATH;
	$themes = array();

	if(is_dir($theme_root)) {
		if($dh = opendir($theme_root)) {
			while(($file = readdir($dh)) != false) {
				if($file != '.' && $file != '..') {
					$theme = $theme_root . $file;
					if(wptap_is_themes_dir($theme)) {
						if(is_dir($theme)) {
							$themes[] = $file;
						}
					}
				}
			}
			closedir($dh);
		}
	}

	return $themes;
}

/**
 * Determine if dir is theme dir.
 *
 * @param string $theme_dir
 * @return boolean
 */
function wptap_is_themes_dir($theme_dir)
{
	//$is_theme = false;

	if(is_dir($theme_dir)) {
		if($dh = opendir($theme_dir)) {
			while(($file = readdir($dh)) != false) {
				if($file != '.' && $file != '..') {
					$file = $theme_dir .DS. $file;

					if($file == ($theme_dir .DS. 'style.css')) {
						return true;
					}
				}
			}
		}
	}

	return false;
}

/**
 * get icons
 *
 * @return array icons array
 */
function wptap_get_icons()
{
	$icon_root = WPTAP_ICON_PATH;
	$plugin_url = wptap_get_plugins_uri() . '/';
	$icons = array();

	if(is_dir($icon_root)) {
		if($dh = opendir($icon_root)) {
			while(false !== ($icon = readdir($dh))) {
				if(substr($icon, -4) == '.png') {
					$icons[substr($icon, 0, -4)] = $plugin_url . 'images/icons/' . $icon;
				}
			}
		}
	}

	return $icons;
}


/**
 * Determine if client is mobile phone.
 *
 * @return boolean
 */
function wptap_is_iphone() {
	global $wptap_plugin;
	return $wptap_plugin->applemobile;
}

/**
 * Plugin URL
 *
 * @return string
 */
function wptap_get_plugins_uri()
{
	global $wptap_plugin_dir_name;
	return WP_CONTENT_URL . '/' . $wptap_plugin_dir_name . '/' . 'WPtap';
}

/**
 * Switch mobile theme or PC theme
 */
function wptap_switch()
{
	if(wptap_is_iphone()) {
		echo '<div id="now_iphone">';
		echo '<h3><a href="'.get_option('siteurl').'?wptap_view=normal">'.'Switch Theme'.'</h3></a>';
		echo '</div>';
	} else {
		echo '<div id="now_pc">';
		echo '<h3><a href="'.get_option('siteurl').'?wptap_view=mobile">'.'Switch Theme'.'</a></h3>';
		echo '</div>';
	}
}

/**
 * Include WPtap switch css file.
 */
function wptap_switch_css()
{
	echo '<link rel="stylesheet" href="'.wptap_get_plugins_uri().'/css/switch-thems.css" type="text/css" media="screen" />';
}

/**
 * Get post thumb
 *
 * @param integer the thumb width
 * @param integer the thumb height
 * @return mixed
 */
function wptap_post_thumb($w = 630, $h = 250) {
	global $post;
	$thumbnail = get_post_meta($post->ID, 'thumb', true);
	
	if (!$thumbnail) {
		return false;
	} else {
		return wptap_get_plugins_uri() . '/include/timthumb.php?src=' . $thumbnail . '&amp;w=' . $w . '&amp;h=' . $h . '&amp;zc=1';
	}
}

/** 
 * Introduction for content
 *
 * @param string $content
 * @param integer $limit
 * @return string
 */
function wptap_strip_content($content, $limit) {
	$content = apply_filters('the_content', $content);
	
	$content = strip_tags($content);
	$content = str_replace(']]>', ']]&gt;', $content);
	
	$words = explode(' ', $content, ($limit + 1));
	if(count($words) > $limit) {
		array_pop($words);
		return implode(' ', $words) . '...'; 
	} else {
		return implode(' ', $words); 
	}
}

/**
 * Introduction for title
 *
 * @param string $title
 * @param integer $limit
 * @return string
 */
function wptap_strip_title($title, $limit) {
	//$title = apply_filters('the_title', $title);
	
	$title = strip_tags($title);
	$title = str_replace(']]>', ']]&gt;', $title);
	
	$words = explode(' ', $title, ($limit + 1));
	if(count($words) > $limit) {
		array_pop($words);
		return implode(' ', $words) . '...'; 
	} else {
		return implode(' ', $words); 
	}
}

/**
 * To select list or return to the directory list.
 *
 * @param boolean $echo
 * @return mixed
 */
function wptap_category_select($echo = false)
{
	$category_ids = get_all_category_ids();
	$wptap_setting = wptap_get_settings();
	$output = '';
	
	$output .= '<select name="cat_id">';
	foreach($category_ids as $cat_id) {
	  $cat_name = get_cat_name($cat_id);
	  if($wptap_setting['cat_id'] == $cat_id) {
		  $output .= "<option value=\"{$cat_id}\" selected>{$cat_name}</option>";
	  } else {
		  $output .= "<option value=\"{$cat_id}\">{$cat_name}</option>";
	  }
	}
	$output .= '</select>';

	if(is_bool($echo) && $echo) {
		echo $output;
		return true;
	}

	return $output;
}
?>