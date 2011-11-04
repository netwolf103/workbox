<?php get_header(); ?>

	<div id="content">

		<div id="grid-wrapper">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" class="grid-item">

				<div class="grid-image">
					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('home1'); ?></a>
				</div>
			</div>

		<?php endwhile; else: ?>

		<?php endif; ?>

		</div>

	</div>

<?php get_footer(); ?>