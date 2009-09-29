<?php
/**
 * WPtap template api.
 *
 * @package WPtap
 * @subpackage libary
 */

/*-------------------------- Template tags Function -------------------------*/

/**
 * Determine if thumb is enabled.
 *
 * @return boolan
 */
function wptap_show_thumb()
{
	$wptap_setting = wptap_get_settings();
	
	if(isset($wptap_setting['show_thumb']) && $wptap_setting['show_thumb'] === 1) {
		return true;
	}

	return false;
}

/**
 * Determine if slider is enabled.
 *
 * @return boolan
 */
function wptap_show_slider()
{
	$wptap_setting = wptap_get_settings();
	
	if(isset($wptap_setting['show_slider']) && $wptap_setting['show_slider'] === 1) {
		return true;
	}

	return false;
}

/**
 * Determine if comment in post is enabled.
 *
 * @return boolan
 */
function zmp_enable_comment()
{
	$wptap_setting = wptap_get_settings();
	
	if(isset($wptap_setting['enable_comment']) && $wptap_setting['enable_comment'] === 1) {
		return true;
	}

	return false;
}

/**
 * Determine if author in post is enabled.
 *
 * @return boolan
 */
function wptap_show_author()
{
	$wptap_setting = wptap_get_settings();
	
	if(isset($wptap_setting['show_author']) && $wptap_setting['show_author'] === 1) {
		return true;
	}	

	return false;
}

/**
 * Determine if author in post is enabled.
 *
 * @return boolan
 */
function wptap_show_date()
{
	$wptap_setting = wptap_get_settings();
	
	if(isset($wptap_setting['show_date']) && $wptap_setting['show_date'] === 1) {
		return true;
	}	

	return false;
}

/**
 * Determine if tag in post is enabled.
 *
 * @return boolan
 */
function wptap_show_tag()
{
	$wptap_setting = wptap_get_settings();
	
	if(isset($wptap_setting['show_tag']) && $wptap_setting['show_tag'] === 1) {
		return true;
	}	

	return false;
}

/**
 * Determine if Category enabled.
 *
 * @return boolan
 */
function wptap_show_cat()
{
	$wptap_setting = wptap_get_settings();
	
	if(isset($wptap_setting['show_cat']) && $wptap_setting['show_cat'] === 1) {
		return true;
	}	

	return false;
}

/**
 * Determine if AD enabled.
 *
 * @return boolan
 */
function wptap_enable_ad()
{
	$wptap_setting = wptap_get_settings();
	
	if(isset($wptap_setting['enable_ad']) && $wptap_setting['enable_ad'] === 1) {
		return true;
	}	

	return false;
}

/**
 * Determine if AD is on home page top.
 *
 * @return boolan
 */
function wptap_enable_topAD()
{
	$wptap_setting = wptap_get_settings();
	
	if($wptap_setting['ad_position'] == 'top') {
		return true;
	}	

	return false;	
}

/**
 * Determine if AD is on home page bottom.
 *
 * @return boolan
 */
function wptap_enable_bottomAD()
{
	$wptap_setting = wptap_get_settings();
	
	if($wptap_setting['ad_position'] == 'bottom') {
		return true;
	}	

	return false;	
}

/**
 * Determine if AD is on home page top.
 *
 * @return boolan
 */
function wptap_enable_post_topAD()
{
	$wptap_setting = wptap_get_settings();
	
	if($wptap_setting['ad_post_position'] == 'top') {
		return true;
	}	

	return false;	
}

/**
 * Determine if AD is on home page bottom.
 *
 * @return boolan
 */
function wptap_enable_post_bottomAD()
{
	$wptap_setting = wptap_get_settings();
	
	if($wptap_setting['ad_post_position'] == 'bottom') {
		return true;
	}	

	return false;	
}

/* --------------------------------------Header Start--------------------------------------- */

/**
 * Weather if home is on header.
 *
 * @return boolan
 */
function wptap_enable_home()
{
	$wptap_setting = wptap_get_settings();

	if(isset($wptap_setting['enable_home']) && ($wptap_setting['enable_home'] === 1)) {
		return true;
	}	

	return false;
}

/**
 * Determine if category is on header.
 *
 * @return boolan
 */
function wptap_enable_category()
{
	$wptap_setting = wptap_get_settings();
	
	if(($wptap_setting['enable_category'] === 1)) {
		return true;
	}	

	return false;
}

/**
 * Weather if pages is on header.
 *
 * @return boolan
 */
function wptap_enable_pages()
{
	$wptap_setting = wptap_get_settings();
	
	if(($wptap_setting['enable_pages'] === 1)) {
		return true;
	}	

	return false;
}

/**
 * Weather if search is on header.
 *
 * @return boolan
 */
function wptap_enable_search()
{
	$wptap_setting = wptap_get_settings();
	
	if(($wptap_setting['enable_search'] === 1)) {
		return true;
	}	

	return false;
}

/**
 * Determine if Login/Register is on header.
 *
 * @return boolan
 */
function wptap_enable_login()
{
	$wptap_setting = wptap_get_settings();

	if(($wptap_setting['enable_login'] === 1)) {
		return true;
	}	

	return false;
}

/* --------------------------------------Header End--------------------------------------- */

/**
 * Determine if menu is on header.
 *
 * @return boolan
 */
function wptap_show_menu()
{
	$wptap_setting = wptap_get_settings();
	
	if(isset($wptap_setting['show_menu']) && ($wptap_setting['show_menu'] === 1)) {
		return true;
	}	

	return false;
}

/**
 * Determine if rss is on Menu.
 *
 * @return boolan
 */
function wptap_include_rss()
{
	$wptap_setting = wptap_get_settings();
	
	if(($wptap_setting['include_rss'] === 1)) {
		return true;
	}	

	return false;
}

/**
 * Determine if email is on Menu.
 *
 * @return boolan
 */
function wptap_include_email()
{
	$wptap_setting = wptap_get_settings();
	
	if(($wptap_setting['include_email'] === 1)) {
		return true;
	}	

	return false;
}

/**
 * Determine if email is on Menu.
 *
 * @return boolan
 */
function wptap_include_pages()
{
	$wptap_setting = wptap_get_settings();
	
	if(($wptap_setting['include_pages'] === 1)) {
		return true;
	}	

	return false;
}

/**
 * Get current site icon
 *
 * @param boolan $echo
 * @return string
 */
function wptap_site_icon($echo = false)
{
	$wptap_setting = wptap_get_settings();
	$current_icon_url = '';

	if(isset($wptap_setting['site_icon'])) {
		$current_icon_url = wptap_get_plugins_uri().'/images/icons/'.$wptap_setting['site_icon'].'.png';
	}
	
	if(is_bool($echo) && $echo) {
		echo $current_icon_url;
		return true;
	}

	return $current_icon_url;
}

/**
 *
 */
function wptap_headers()
{
	$wptap_setting = wptap_get_settings();
	$menus = isset($wptap_setting['menus']) ? $wptap_setting['menus'] : array();
	unset($wptap_setting);
	$output = '';

	if(!is_array($menus)) {
		$menus = array($menus);
	}

	ksort($menus);

	foreach($menus as $menu) {
		switch($menu) {
			case 'enable_category':
				$output .= '<li id="categories"><a href="#">' . __( 'Categories' ) . '</a></li>'."\n";
			break;

			case 'enable_pages':
				$output .= '<li id="pages"><a href="#">' . __( 'Pages' ) . '</a> </li>'."\n";
			break;

			case 'enable_search':
				$output .= '<li id="search"><a href="#">' . __( 'Search' ) . '</a></li> '."\n";
			break;

			case 'enable_login':
				get_currentuserinfo();
				if (!current_user_can('edit_posts')) {
					$output .= ' <li id="login"><a href="#">' . __( 'Login' ) . '</a></li>'."\n";
				} else {
					$version = (float)get_bloginfo('version');
					if ($version >= 2.7) {
						$output .= '<li id="logout"><a href="' . wp_logout_url($_SERVER['REQUEST_URI']) . '">';
					} else {
						$output .= '<li id="logout"><a href="' . get_bloginfo('wpurl') . '/wp-login.php?action=logout&redirect_to=' . $_SERVER['REQUEST_URI'] . '">';
					}

					$output .=  __( 'Logout' ) . '</a></li>'."\n";
				}
			break;

			case 'enable_menu':
				//echo 'enable-menu';
			break;
		}
	}

	if(!empty($output)) {
		return $output;
	}

	return false;
}


/**
 * Returns the AD code.
 *
 * @return string ad code
 */
function wptap_include_ad()
{
	$wptap_setting = wptap_get_settings();
	$script = '';

	if(isset($wptap_setting['ad_class']) && !empty($wptap_setting['ad_class'])) {
		switch($wptap_setting['ad_class']) {
			case 'google':
				if($wptap_setting['ad_type'] == 2) {
					$script = "<script type=\"text/javascript\">\n";

					$script .= "google_ad_client = \"{$wptap_setting['ad_id']}\";\n";
					$script .= "google_ad_slot = \"1585574536\";\n";
					$script .= "google_ad_width = 234;\n";
					$script .= "google_ad_height = 60;\n";
					
					$script .= "</script>\n";

					$script .= "<script type=\"text/javascript\" src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\"></script>\n";
				}

				if($wptap_setting['ad_type'] == 1) {
					$script = stripslashes($wptap_setting['ad_code']);
				}
			break;

			case 'admob':
				if($wptap_setting['ad_type'] == 2) {
					$script = "<script type=\"text/javascript\">\n";

					$script .= "var admob_vars = {\n";
					$script .= "pubid: '{$wptap_setting['ad_id']}',\n";
					$script .= "bgcolor: '000000',\n";
					$script .= "text: 'FFFFFF',\n";
					$script .= "test: true\n";
					$script .= "};";
					
					$script .= "</script>\n";

					$script .= "<script type=\"text/javascript\" src=\"http://mm.admob.com/static/iphone/iadmob.js\"></script>\n";
				}

				if($wptap_setting['ad_type'] == 1) {
					$script = stripslashes($wptap_setting['ad_code']);
				}
			break;

			default:
				$script = stripslashes($wptap_setting['ad_code']);
			break;
		}
	}

	return $script;
}
/*--------------------- Templage tags End -------------------------*/
?>