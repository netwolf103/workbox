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
	<?php screen_icon('options-general'); ?>
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
</div>
<?php
	}
}
?>