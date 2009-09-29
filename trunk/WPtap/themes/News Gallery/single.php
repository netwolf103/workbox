<?php get_header();?>
		<div id="content">
	<?php if(wptap_enable_ad() && wptap_enable_post_topAD()): ?>
		<div id="ad-code">
		<?php echo wptap_include_ad(); ?>
		</div><!-- #ad-code -->
	<?php endif; ?>
			<div class="border article">
			<?php
				while(have_posts()): the_post();
			?>
				<h1><?php the_title();?></h1>
				<p class="postdate"><?php the_date();?> by <?php the_author();?></p>
				<p class="gotocomments"><a href="<?php comments_link();?>">Skip to comments</a></p>
				<div class="entry">
					<?php the_content();?>
				</div>
				<div class="post-meta">
					<p><strong>Categories : </strong><?php the_category(",");?></p>
					<p><strong>Tags : </strong><?php the_tags(",");?></p>
				</div>
				<div class="social-networks">
					<div class="social-wrap">
						<a class="bookmark-it alignright" href="#">Bookmark it</a>
						<a class="mail-it alignright" href="mailto:?subject=<?php bloginfo('sitename');echo ' -  '; the_title();?>&body=Check out this post: <?php the_permalink(); ?>">Mail it</a>
						<ul id="sbookmarks">
							<li class="delicious"><a  href="http://del.icio.us/post?url=<?php the_permalink();?>&title=<?php the_title();?>" target="_blank">Del.icio.us</a></li>
							<li class="digg"><a href="http://digg.com/submit?phase=2&url=<?php the_permalink();?>&title=<?php the_title();?>" target="_blank">Digg</a></li>
							<li class="technorati"><a href="http://technorati.com/faves?add=<?php the_permalink();?>" target="_blank">Technorati</a></li>
							<li class="newsvine"><a href="http://www.newsvine.com/_wine/save?popoff=0&u=<?php the_permalink();?>&h=<?php the_title();?>" target="_blank">Newsvine</a></li>
							<li class="reddit"><a href="http://reddit.com/submit?url=<?php the_permalink();?>&title=<?php the_title();?>" target="_blank">Reddit</a></li>
						</ul>
					</div>
					<div class="left-top"></div>
					<div class="right-top"></div>
					<div class="left-bottom"></div>
					<div class="right-bottom"></div>
				</div>
			
				<div class="navigation post-nav">
					<div class="social-wrap">
					<div class="alignleft"><?php  previous_post_link('%link','Prev Post'); ?></div>
					<div class="alignright"><?php next_post_link('%link','Next Post'); ?></div>
										<div class="left-bottom"></div>
					<div class="right-bottom"></div>
					</div>
				</div>

	<?php if(wptap_enable_ad() && wptap_enable_post_bottomAD()): ?>
		<div id="ad-code">
		<?php echo wptap_include_ad(); ?>
		</div><!-- #ad-code -->
	<?php endif; ?>
	
				<?php comments_template();?>
			</div>			
			<?php endwhile;?>
		</div>
<?php get_footer();?>