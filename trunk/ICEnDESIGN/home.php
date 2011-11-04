<?php get_header(); ?>

	<div id="content">

		<div class="posts">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" class="post-item">
				<h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<div class="post-thumbnail">
					<a class="thumbnail-frame" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
				</div>
			</div>

		<?php endwhile; else: ?>

		<?php endif; ?>
		
		<div class="clear"></div>

		</div>

	</div>

<?php get_footer(); ?>