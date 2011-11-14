<?php
require_once( dirname(__FILE__) . '/ice-includes/ice-loader.php' );

if( is_admin() )
{
	add_action('admin_head', 'ice_admin_head');
	add_action('admin_menu', 'ice_admin_menu');

	function ice_admin_head()
	{
		echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/ice-admin/style.css" type="text/css" media="screen" />';
	}

	function ice_admin_menu()
	{
		add_theme_page( __('Theme Options', 'ICE'), __('Theme Options', 'ICE'), 8, 'ice-admin-menu', 'ice_theme_options' );
	}

	function ice_theme_options()
	{
		$title = __( 'Theme Options', 'ice' );

		if( $_POST ) {
			$data['copyright'] = $_POST['copyright'];

			if ( isset( $_FILES['sitelogo'] ) ) {
				$f = $_FILES['sitelogo'];
				if( $f['error'] == 0 ) {
					$ext = substr($f['name'], -3);

					@move_uploaded_file( $f['tmp_name'], dirname(__FILE__) . "/images/logo." . $ext );
					$data['sitelogo'] = 'logo.'.$ext;
				}

			}

			update_option( 'ice-theme-options', $data );
		}

?>
<div class="wrap">
	<?php screen_icon('options-ice'); ?>
	<h2><?php echo esc_html( $title ); ?></h2>
	
	<form id="ice-option-form" enctype="multipart/form-data" method="post">

	<div id="ice-options">
		<div class="ice-title"><?php _e('Global Option', 'ice'); ?></div>

		<div class="ice-content">

			<table class="form-table">

				<tr>
					<th scope="row"><label for="sitelogo"><?php _e('Site Logo', 'ice'); ?></label></th>
					<td><input type="file" id="sitelogo" name="sitelogo"></td>
				</tr>

				<tr>
					<th scope="row"><label for="copyright"><?php _e('Copyright', 'ice'); ?></label></th>
					<td><textarea rows="5" class="large-text code" id="copyright" name="copyright"><?php ice_option_value('copyright', '', true); ?></textarea></td>
				</tr>

			</table>

		</div>

	</div>

	<p class="submit"><input type="submit" value="<?php _e('Save Changes'); ?>" class="button-primary" id="submit" name="submit"></p>

	</form>

	<div id="about">
		<div class="ice-title"><?php _e('Help & Support', 'ice'); ?></div>
		<div class="ice-content">
			<p><?php _e('You can contact me via the following ways:', 'ice'); ?></p>
			<ul>
				<li><?php _e('E-mail: netwolf103@gmail.com:', 'ice'); ?></li>
				<li><?php _e('Skype: netwolf103', 'ice'); ?></li>
				<li><?php _e('QQ: 303685256', 'ice'); ?></li>
			</ul>

			<form method="post" action="https://www.paypal.com/cgi-bin/webscr">
					<?php _e('PayPal Donation:', 'ice'); ?>
					<input type="hidden" value="_s-xclick" name="cmd">
					<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
					<input type="image" border="0" alt="PayPal - The safer, easier way to pay online!" name="submit" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif">
					<img width="1" height="1" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" alt="">
			</form>
		</div>
	</div>
</div>
<?php
	}
}
?>