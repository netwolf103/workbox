<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<!-- page titles -->
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' | '; } ?><?php bloginfo('name'); if(is_home()) { echo ' | '; bloginfo('description'); } ?></title>
	
	<!-- meta tags -->
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<!--[if IE 6]>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style-ie6.css" type="text/css" media="screen" />
	<![endif]-->

	<script type='text/javascript' src='<?php bloginfo('wpurl') ?>/wp-includes/js/jquery/jquery.js'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url') ?>/javascript/jquery.easing.1.3.js'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url') ?>/javascript/jquery.vgrid.0.1.4-mod.js'></script>
	<script type='text/javascript' src='<?php bloginfo('template_url') ?>/javascript/init.js'></script>
	
	<!-- pingback url -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">

	<div id="header">
		<h1 id="logo">ICEnDESIGN</h1>
		
		<?php wp_nav_menu(array('theme_location' => 'main_menu', 'container_class' => 'main-navigation')); ?>
	</div>