<?php
add_action( 'after_setup_theme', 'ice_setup' );

if ( ! function_exists( 'ice_setup' ) ):
function ice_setup() {

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size(175, 108, true);
    add_image_size('featured', 560, 315, true);
    add_image_size('category', 80, 80, true);

	add_image_size('grid-thumbnails', 331, 331, true);

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

function ice_theme_js() {
	if (is_admin()) return;
	wp_enqueue_script('jquery');
}
add_action('init', 'ice_theme_js');

function ice_menu_items($classes)
{
	static $colors = array(
		'border1',
		'border2',
		'border3',
		'border4',
		'border5',
		'border6',
		'border7',
	);

	$key = array_rand($colors);
	array_push($classes, 'border', $colors[$key]);
	unset($colors[$key]);

	return $classes;
}
//add_filter( 'nav_menu_css_class', 'ice_menu_items' )

function ice_post_container_class( $class = '' )
{
	echo 'class="' . join( ' ', ice_get_post_container_class( $class ) ) . '"';
}

function ice_get_post_container_class( $class = '' )
{
	global $wp_query;

	$classes = array();
	
	if ( is_category() ) {
		$cat = $wp_query->get_queried_object();
		$classes[] = 'post-container';
		$classes[] = 'post-container-' . sanitize_html_class( $cat->slug, $cat->cat_ID );
	}

	if ( !empty( $class ) ) {
		if ( !is_array( $class ) )
			$class = preg_split( '#\s+#', $class );
		$classes = array_merge( $classes, $class );
	}

	return $classes;
}
?>