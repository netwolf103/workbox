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
			$sitelogo = get_template_directory_uri() .'/images/'. $sitelogo;
		} else {
			$sitelogo = get_template_directory_uri() . '/images/default-logo.png';
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

if ( ! function_exists( 'ice_comment' ) )
{
	function ice_comment( $comment, $args, $depth )
	{
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '' :
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, 40 ); ?>
				<?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
			</div><!-- .comment-author .vcard -->
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
				<br />
			<?php endif; ?>

			<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
				?>
			</div><!-- .comment-meta .commentmetadata -->

			<div class="comment-body"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</div><!-- #comment-##  -->

		<?php
				break;
			case 'pingback'  :
			case 'trackback' :
		?>
		<li class="post pingback">
			<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
		<?php
				break;
		endswitch;
	}
}

if ( ! function_exists( 'ice_setup' ) )
{
	function ice_setup() {
		
		add_theme_support( 'automatic-feed-links' );
		// This theme uses post thumbnails
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size(175, 108, true);

		add_image_size('featured-thumbnails', 226, 151, true);
		add_image_size('single-thumbnails', 706, 435, true);
		add_image_size('grid-thumbnails', 331, 331, true);

		load_theme_textdomain( 'ice', TEMPLATEPATH . '/languages' );

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
?>