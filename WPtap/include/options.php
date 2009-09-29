<?php
/**
 * WPtap option.
 *
 * @package WPtap
 * @subpackage admin
 */

function wptap_options_menu() {
	add_menu_page( __( 'WPtap Plugin', 'WPtap' ), 'WPtap', 8, 'wptap-options', 'wptap_set_page');
	add_submenu_page( 'wptap-options', __('Admin Panel', 'WPtap'), __('Admin Panel', 'WPtap'), 8, 'wptap-options', 'wptap_set_page' );
	//add_submenu_page( 'wptap-options', __('Themes Manage', 'WPtap'), __('Themes Manage', 'WPtap'), 8, 'themes-manage', 'wptap_themes_manage' );
}

function wptap_set_page()
{
	$wptap_setting = wptap_get_settings();

	echo '<div><h1>WPtap Admin Panel (version: '. WPTAP_VERSION .')</h1>';

	require_once( WPTAP_INCLUDE_PATH . 'submit.php' );
?>

<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="wptap-form">
<?php
	require_once( WPTAP_HTML_PATH . 'tab.php' );
	require_once( WPTAP_HTML_PATH . 'base_settings.php' );
	require_once( WPTAP_HTML_PATH . 'header_settings.php' );
	require_once( WPTAP_HTML_PATH . 'post_setttings.php' );
	require_once( WPTAP_HTML_PATH . 'ad_settings.php' );
	require_once( WPTAP_HTML_PATH . 'about.php' );
?>
<p><input type="submit" name="submit" value="<?php _e('Save Options', 'Wptap' ); ?>" id="wptap-submit" /></p>
</form>

<?php
echo '</div>'; }

function wptap_upload_icons()
{

}

function wptap_themes_manage()
{
	$themes = get_themes();
	$ct = current_theme_info();print_r($ct);
	unset($themes[$ct->name]);
}

?>
