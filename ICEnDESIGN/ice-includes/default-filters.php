<?php

add_action( 'after_setup_theme', 'ice_setup' );

add_action('init', 'ice_theme_js');

if ( function_exists('register_sidebar') )
{
	register_sidebar(
		array
		(
			'name' => 'ice_sidebar',
			'before_widget' => '<div id="%1$s" class="widgetblock %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>',
		)
	);
}
?>