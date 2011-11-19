<?php get_header(); ?>

	<div id="content">

		<div id="blog-container" <?php ice_post_container_class('blog-container'); ?>>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h3 class="the_title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					<div class="post-meta">
						Posted by <?php the_author(); ?>
						at <?php the_date(); ?>
					</div>
					
					<div class="page-content">
						<?php the_post_thumbnail('single-thumbnails'); ?>

						<?php the_excerpt(); ?>

						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
					</div>
				</div>

			<?php endwhile; else : ?>

			<?php endif; ?>

		</div>
		
		<?php get_sidebar(); ?>

		<br class="clear" />
	</div>

<?php get_footer(); ?>