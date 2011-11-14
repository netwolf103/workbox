<?php
if ( ! function_exists( 'ice_post_container_class' ) )
{
	function ice_post_container_class( $class = '' )
	{
		echo 'class="' . join( ' ', ice_get_post_container_class( $class ) ) . '"';
	}
}

if ( ! function_exists( 'ice_get_post_container_class' ) )
{
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
}

if ( ! function_exists( 'the_post_other_thumbnail' ) )
{
	function the_post_other_thumbnail( $size = 'post-thumbnail', $attr = '' )
	{
		echo get_the_post_other_thumbnail( NULL, $size, $attr );
	}
}

if ( ! function_exists( 'get_the_post_other_thumbnail' ) )
{
	function get_the_post_other_thumbnail( $post_id = NULL, $size = 'post-thumbnail', $attr = '' )
	{
		global $post;
		$post_id = ( NULL === $post_id ) ? $post->ID : $post_id;

		$attachments = get_children('post_parent=' .$post_id . '&post_type=attachment&post_mime_type=image');
		$html = '';

		foreach($attachments as $attachment) {
			$html .= '<a href="'. wp_get_attachment_url($attachment->ID) .'" class="lightbox" rel="flowers">' . wp_get_attachment_image($attachment->ID, $size, false, $attr) . '</a>';
		}

		return $html;
	}
}

if ( ! function_exists( 'ice_setup' ) )
{
	function ice_setup() {

		// This theme uses post thumbnails
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size(175, 108, true);

		add_image_size('featured-thumbnails', 226, 151, true);
		add_image_size('single-thumbnails', 706, 435, true);
		add_image_size('grid-thumbnails', 331, 331, true);

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
}

if ( ! function_exists( 'ice_theme_js' ) )
{
	function ice_theme_js() {
		if (is_admin()) return;
		wp_enqueue_script('jquery');
	}
}

if ( ! function_exists( 'ice_logo' ) )
{
	function ice_logo( $echo = true )
	{
		$sitelogo = ice_option_value('sitelogo');

		if( file_exists( dirname(dirname(__FILE__)) . '/images/' . $sitelogo) ) {
			$sitelogo = get_bloginfo('template_url') .'/images/'. $sitelogo;
		} else {
			$sitelogo = get_bloginfo('template_url') . '/images/default-logo.png';
		}

		if( $echo )
			echo $sitelogo;

		return $sitelogo;
	}
}

if ( ! function_exists( 'ice_option_value' ) )
{
	function ice_option_value( $key, $default = '', $echo = false )
	{
		$options = get_option( 'ice-theme-options' );

		$value = isset($options[$key]) ? $options[$key] : $default;

		if($echo) {
			echo $value;
		}

		return $value;
	}
}

?>