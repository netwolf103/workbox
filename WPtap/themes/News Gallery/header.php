<?php $wptap_setting = wptap_get_settings(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="<?php bloginfo('template_url')?>/style.css" media="screen,projection,tv" rel="stylesheet" type="text/css" />
	<script src="<?php bloginfo('template_url')?>/scripts/jquery-1.3.2.min.js" type="text/javascript"></script>

<?php if(wptap_show_slider()): ?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/slide.css" type="text/css" media="screen" />
	<script src="<?php bloginfo('template_url'); ?>/scripts/jquery.cycle.all.min.js" type="text/javascript"></script>
<?php endif; ?>

	<meta name="viewport" content="maximum-scale=1.0; width=320 initial-scale=1.0; user-scalable=0" />
	<script src="<?php bloginfo('template_url')?>/scripts/global.js" type="text/javascript"></script>
	<?php wp_head();?>
</head>
<body>
	<div id="page">
		<div id="header">
			<?php if(isset($wptap_setting['site_icon']) && !empty($wptap_setting['site_icon'])): ?>
				<img src="<?php wptap_site_icon(true); ?>" alt="<?php if($wptap_setting['name']){ echo $wptap_setting['name']; } else{ bloginfo('name'); } ?>" class="logo"/>
			<?php endif; ?>
			<h1 title="<?php if($wptap_setting['name']){ echo $wptap_setting['name']; } else{ bloginfo('name'); } ?>"><a href="<?php bloginfo('siteurl');?>"><?php if($wptap_setting['name']){ echo $wptap_setting['name']; } else{ bloginfo('name'); } ?></a></h1>
			<ul class="nav">
				<?php if(wptap_enable_home()): ?>
					<li><a href="<?php bloginfo('url'); ?>"> <?php _e( 'Home', 'wptap' ); ?></a></li>
				<?php endif; ?>
				<?php
					if(wptap_headers()) {
						echo wptap_headers();
					}
				?>
			</ul>
			<div class="top-info">
				<a class="email" href="<?php bloginfo('rss2_url');?>" title="RSS">RSS</a>
				<a class="rss" href="mailto:<?php bloginfo('admin_email');?>" title="Email">Email</a>
			</div>
			<div class="extenstion">

			<?php if(wptap_enable_search()): ?><!-- Search Form -->
				<form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
					<input type="text" id="s" name="s" value="<?php the_search_query(); ?>" class="text-input"/>
					<input type="submit" value="Search" id="searchsubmit"/>
				</form>
			<?php endif; ?>
			
			<?php if(wptap_enable_category()): ?><!-- Category List -->
				<ul id="categoriesbox">
					<?php //wp_list_categories("title_li=");?>
					<?php echo preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)\<\/a>@i', '<li$1><a$2><span>$3</span></a></li>', wp_list_categories('echo=0&title_li=')); ?>
				</ul>
			<?php endif; ?>

			<?php if(wptap_enable_pages()): ?><!-- Pages List -->
				<ul id="pagesbox">
					<?php //wp_list_pages('echo=0&title_li=');?>
					<?php echo preg_replace('@\<li([^>]*)>\<a([^>]*)>(.*?)\<\/a>@i', '<li$1><a$2><span>$3</span></a></li>', wp_list_pages('echo=0&title_li=')); ?>
				</ul>
			<?php endif; ?>
			
			<?php if(wptap_enable_login()): ?><!-- Login/Logout Form -->
				<form action="<?php bloginfo('wpurl'); ?>/wp-login.php" id="loginform" method="post">
					<fieldset>					
						<input type="text" name="log" id="log" class="text-input" value="Username" onblur="if(this.value=='')this.value='Username';" onclick="if(this.value=='Username')this.value='';" />
						<input type="password" name="pwd" class="text-input" value="Password" onblur="if(this.value=='')this.value='Password';" onclick="if(this.value=='Password')this.value='';"/>
						<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
						<input type="submit" value="Login" name="submit" value="<?php _e('Login'); ?>" id="loginsubmit"/>
					</fieldset>
				</form>
			<?php endif; ?>

				<ul id="menubox">
					<li class="pages"><a href="#">Pages</a></li>
					<li class="rss"><a href="#">Rss Feed</a></li>
					<li class="email"><a href="mailto:abc@gmail.com">E-Mail</a></li>
				</ul>
	
			</div>

		</div>		
		
