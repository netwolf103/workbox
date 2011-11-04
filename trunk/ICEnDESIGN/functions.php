<?php
add_action( 'after_setup_theme', 'ice_setup' );

if ( ! function_exists( 'ice_setup' ) ):
function ice_setup() {

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size(187, 108, true);
    add_image_size('featured', 560, 315, true);
    add_image_size('category', 80, 80, true);

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'icen-design', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'main_menu'		=> __( 'Main Navigation', 'icen-design' ),
		'footer_menu'	=> __( 'Footer Navigation', 'icen-design' ),
	) );
}
endif;
?>