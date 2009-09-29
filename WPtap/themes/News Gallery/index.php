<?php $wptap_setting = wptap_get_settings(); ?>
<?php get_header(); ?>
		<div id="content">
			<!--<div id="roll">
				<a id="roll-left" href="#"></a>
				<a id="roll-right" href="#"></a>
				<ul>
					<li><img src="<?php bloginfo('template_url')?>/images/1.png" alt="title"/></li>
					<li><img src="<?php bloginfo('template_url')?>/images/2.png" alt="title"/></li>
					<li><img src="<?php bloginfo('template_url')?>/images/3.png" alt="title"/></li>
					<li><img src="<?php bloginfo('template_url')?>/images/4.png" alt="title"/></li>
				</ul>
				<div class="roll-border"></div>
			</div>-->

<?php if(wptap_show_slider()&&is_home()): ?>
    <div class="featured">
    <?php 
	$query = 'cat=' . $wptap_setting['cat_id'] . '&showposts=' . $wptap_setting['slider_number'];
	//echo $query;
	$q = new WP_Query( $query );
	?> 
    	<div id="controls" onclick="location.href='<?php the_permalink(); ?>';">
			<a href="" class="prev"><?php _e('Prev', 'arras') ?></a>
			<a href="" class="next"><?php _e('Next', 'arras') ?></a>
        </div>
    	<div id="featured-slideshow" onclick="location.href='<?php the_permalink(); ?>';">
        	<?php $count = 0; $w=300; $h=128;?>
    		<?php if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post(); ?>
    		<div <?php if ($count != 0) echo 'style="display:blocl;width:100%;min-width:100%;max-width:100%;"'; ?> style="width:100%;min-width:100%;max-width:100%;">
    			
            	<a class="featured-article" href="<?php the_permalink(); ?>" rel="bookmark" style="background: url(<?php echo wptap_post_thumb($w, $h); ?>) no-repeat center center;">
                <span class="featured-entry">
                    <!--<span class="entry-title"><?php the_title(); ?></span>-->
					<span class="entry-title"><?php echo wptap_strip_title(get_the_title(), 5); ?></span>
                    <!--<span class="entry-summary"><?php echo wptap_strip_content(get_the_excerpt(), 10); ?></span>-->
				
					<span class="progress"></span>
                </span>
            	</a>
        	</div>
    		<?php $count++; endwhile; endif; ?>
    	</div>
    </div>
<?php endif; ?>
			
			<?php
				while(have_posts()): the_post();
				$wp_title=get_the_title();
				$t_length=40;
				if($wp_title!=substr($wp_title,0,$t_length)) $wp_title=substr($wp_title,0,$t_length)."...";
				
			?>
			<div class="article index">
				<!--<a class="extra" href="#">Shwo post detals</a>-->
			<?php if(wptap_show_thumb()): ?><!-- Show Post Thumb -->
				<span class="extra">Shwo post detals</span>
				<?php if ($post->comment_count > 0) { ?>
					<span class="unread-comments"><span class="left-border"></span><span class="comments-num"><?php comments_number('0','1','%'); ?></span></span>
				<?php }?>
				<div class="imgwraper">
				<?php
					if(wptap_post_thumb()) {
						$w = isset($wptap_setting['thumb_width']) ? $wptap_setting['thumb_width'] : 50;
						$h = isset($wptap_setting['thumb_height']) ? $wptap_setting['thumb_height'] : 50;

						$postheader = '<a href="' . get_permalink() . '"><img src="' . wptap_post_thumb($w,$h) . '" alt="' . get_the_title() . '" title="' . get_the_title()	. '" width="'.$w.'" height="'.$h.'" /></a>';
						echo $postheader;
					}
				?>
				</div>
			<?php endif; ?>

					<h2><a href="<?php the_permalink();?>"><?php echo $wp_title; ?></a></h2>
				<div class="article-details">
				<?php if(wptap_show_author()): ?><!-- Post Date -->
					<p class="author">Author : <?php the_author();?></p>
				<?php endif; ?>

				<?php if(wptap_show_date()): ?><!-- Post Date -->
					<p>Date: <?php the_time('F jS, Y') ?></p>
				<?php endif; ?>
				
				<?php if(wptap_show_cat()): ?>
					<p class="categories">Categories : <?php the_category(',');?></p>
				<?php endif; ?>

				<?php if(wptap_show_tag()): ?><!-- Post Tag -->
					<p class="tags">Tags : <?php the_tags(',');?></p>
				<?php endif; ?>
				</div>
				<div class="entry">
					<?php //the_content("Read more ...");
						//the_excerpt();
						echo wptap_strip_content(get_the_excerpt(), 20);
					?>
				</div>
				
			</div>
			<?php endwhile;?>
			<div class="navi-index">
				<div class="alignright"><?php next_posts_link('Older Entries') ?></div>
				<div class="alignleft"><?php previous_posts_link('Newer Entries') ?></div>	
			</div>
		</div>
<?php get_footer();?>