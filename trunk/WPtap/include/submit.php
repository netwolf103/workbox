<?php
/**
 * WPtap submit.
 *
 * @package WPtap
 * @subpackage libary
 */

if(isset($_POST['submit'])) {
	unset($_POST['submit']);
	$menus = array();
	$i = 1;
	$a = array();
	
	/* Global Setting Start */
	if(isset($_POST['sitename']) && !empty($_POST['sitename'])) {
		$a['name'] = $_POST['sitename'];
	}

	if(isset($_POST['theme'])) {
		$a['theme'] = $_POST['theme'];
	}

	if(isset($_POST['show_slider']) && $_POST['show_slider'] == 'on') {
		$a['show_slider'] = 1;
	} else {
		$a['show_slider'] = 0;
	}

	if(isset($_POST['slider_number']) && !empty($_POST['slider_number'])) {
		$a['slider_number'] = $_POST['slider_number'];
	}

	if(isset($_POST['cat_id'])) {
		$a['cat_id'] = $_POST['cat_id'];
	}

	if(isset($_POST['site_icon']) && !empty($_POST['site_icon'])) {
		$a['site_icon'] = $_POST['site_icon'];
	}
	/* Global Setting End */

	/* Header Settings Start */
	if(isset($_POST['enable_home']) && $_POST['enable_home'] == 'on') {
		$a['enable_home'] = 1;
	} else {
		$a['enable_home'] = 0;
	}

	if(isset($_POST['enable_category']) && $_POST['enable_category'] == 'on') {
		$a['enable_category'] = 1;

		if(isset($_POST['order_category']) && !empty($_POST['order_category'])) {
			$menus[(int)$_POST['order_category']] = 'enable_category';
		} else {
			$menus[] = 'enable_category';
		}
	} else {
		$a['enable_category'] = 0;
	}

	if(isset($_POST['enable_pages']) && $_POST['enable_pages'] == 'on') {
		$a['enable_pages'] = 1;

		if(isset($_POST['order_pages']) && !empty($_POST['order_pages'])) {
			$menus[(int)$_POST['order_pages']] = 'enable_pages';
		} else {
			$menus[] = 'enable_pages';
		}
	} else {
		$a['enable_pages'] = 0;
	}

	if(isset($_POST['enable_search']) && $_POST['enable_search'] == 'on') {
		$a['enable_search'] = 1;

		if(isset($_POST['order_search']) && !empty($_POST['order_search'])) {
			$menus[(int)$_POST['order_search']] = 'enable_search';
		} else {
			$menus[] = 'enable_search';
		}
	} else {
		$a['enable_search'] = 0;
	}

	if(isset($_POST['enable_login']) && $_POST['enable_login'] == 'on') {
		$a['enable_login'] = 1;

		if(isset($_POST['order_login']) && !empty($_POST['order_login'])) {
			$menus[(int)$_POST['order_login']] = 'enable_login';
		} else {
			$menus[] = 'enable_login';
		}
	} else {
		$a['enable_login'] = 0;
	}

	$a['menus'] = $menus;
	/* Header Settings End */

	/* Post Settings Start */
	if(isset($_POST['show_author']) && $_POST['show_author'] == 'on') {
		$a['show_author'] = 1;
	} else {
		$a['show_author'] = 0;
	}

	if(isset($_POST['show_date']) && $_POST['show_date'] == 'on') {
		$a['show_date'] = 1;
	} else {
		$a['show_date'] = 0;
	}

	if(isset($_POST['enable_comment']) && $_POST['enable_comment'] == 'on') {
		$a['enable_comment'] = 1;
	} else {
		$a['enable_comment'] = 0;
	}

	if(isset($_POST['show_tag']) && $_POST['show_tag'] == 'on') {
		$a['show_tag'] = 1;
	} else {
		$a['show_tag'] = 0;
	}

	if(isset($_POST['show_cat']) && $_POST['show_cat'] == 'on') {
		$a['show_cat'] = 1;
	} else {
		$a['show_cat'] = 0;
	}

	if(isset($_POST['show_thumb']) && $_POST['show_thumb'] == 'on') {
		$a['show_thumb'] = 1;
	} else {
		$a['show_thumb'] = 0;
	}

	// set thumb width
	if(isset($_POST['thumb_width']) && !empty($_POST['thumb_width'])) {
		$a['thumb_width'] = $_POST['thumb_width'];
	}

	// set thumb height
	if(isset($_POST['thumb_height']) && !empty($_POST['thumb_height'])) {
		$a['thumb_height'] = $_POST['thumb_height'];
	}
	/* Post Settings End*/

	/* Style/Color Settings Start*/
	/*if(isset($_POST['header_background_color']) && !empty($_POST['header_background_color'])) {
		$a['header_background_color'] = $_POST['header_background_color'];
	}*/

	if(isset($_POST['header_font_color']) && !empty($_POST['header_font_color'])) {
		$a['header_font_color'] = $_POST['header_font_color'];
	}

	/*if(isset($_POST['footer_background_color']) && !empty($_POST['footer_background_color'])) {
		$a['footer_background_color'] = $_POST['footer_background_color'];
	}

	if(isset($_POST['footer_font_color']) && !empty($_POST['footer_font_color'])) {
		$a['footer_font_color'] = $_POST['footer_font_color'];
	}

	if(isset($_POST['page_background_color']) && !empty($_POST['page_background_color'])) {
		$a['page_background_color'] = $_POST['page_background_color'];
	}

	if(isset($_POST['page_background_image']) && !empty($_POST['page_background_image'])) {
		$a['page_background_image'] = $_POST['page_background_image'];
	}

	if(isset($_POST['post_background_color']) && !empty($_POST['post_background_color'])) {
		$a['post_background_color'] = $_POST['post_background_color'];
	}*/
	/* Style/Color Settings End */

	/* Advertisement Settings Start */
	if(isset($_POST['enable_ad']) && $_POST['enable_ad'] == 'on') {
		$a['enable_ad'] = 1;
	}

	if(isset($_POST['ad_class'])) {
		$a['ad_class'] = $_POST['ad_class'];
	}
	
	if(isset($_POST['ad_position'])) {
		$a['ad_position'] = $_POST['ad_position'];
	}

	if(isset($_POST['ad_post_position'])) {
		$a['ad_post_position'] = $_POST['ad_post_position'];
	}

	if(isset($_POST['ad_code'])) {
		$a['ad_code'] = $_POST['ad_code'];
	}

	if(isset($_POST['ad_type'])) {
		$a['ad_type'] = $_POST['ad_type'];
	}

	if(isset($_POST['ad_id']) && !empty($_POST['ad_id'])) {
		$a['ad_id'] = $_POST['ad_id'];
	}
	/* Advertisement Settings End */

	$values = serialize($a);
	update_option('wptap_iphone_pages', $values);
}

global $wptap_setting;
$wptap_setting = wptap_get_settings();

?>