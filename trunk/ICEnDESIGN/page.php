<?php get_header(); ?>

	<div id="content">

		<div id="page-container" <?php ice_post_container_class('page-container'); ?>>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class("post-item"); ?>>
					<h3 class="the_title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					
					<div class="page-content">
						<?php the_post_thumbnail('single-thumbnails'); ?>

						<?php the_content(); ?>
					</div>
				</div>

			<?php endwhile; else : ?>

			<?php endif; ?>

		</div>
		
		<?php get_sidebar(); ?>

		<br class="clear" />
	</div>

<?php get_footer(); ?>