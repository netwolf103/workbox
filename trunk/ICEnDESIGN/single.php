<?php get_header(); ?>

	<div id="content">

		<div id="single-container" <?php ice_post_container_class('single-container'); ?>>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class("post-item"); ?>>
					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="single-left"><?php the_post_thumbnail('single-thumbnails'); ?></a>
					
					<div class="single-right">
						<h3 class="the_title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<div class="single-content"><?php the_content(); ?></div>
					</div>

					<br class="clear" />
				</div>

				<div class="featured">
					<?php the_post_other_thumbnail('featured-thumbnails') ?>
				</div>

			<?php endwhile; else : ?>

			<?php endif; ?>
			
			<br class="clear" />

		</div>

	</div>

<?php get_footer(); ?>