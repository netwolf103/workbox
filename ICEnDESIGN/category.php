<?php get_header(); ?>

	<div id="content">

		<div id="post-container" <?php ice_post_container_class(); ?>>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class("post-item"); ?>>
					<h3 class="the_title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
				</div>

			<?php endwhile; else : ?>

			<?php endif; ?>

			<br class="clear" />
		</div>

		<div id="nav-below" class="clear">
			<?php next_posts_link( __( '<span class="meta-nav ">&larr; Older posts</span>', 'twentyten' ) ); ?>
			<span class="meta-nav-spacing" /></span>
			<?php previous_posts_link( __( '<span class="meta-nav">Newer posts &rarr;</span>', 'twentyten' ) ); ?>
		</div>

	</div>

<?php get_footer(); ?>