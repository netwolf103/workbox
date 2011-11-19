<?php get_header(); ?>

	<div id="content">

		<div id="single-container" <?php ice_post_container_class('single-container'); ?>>

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class("post-item"); ?>>
					<div class="single-left">
						<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('single-thumbnails'); ?></a>

						<div class="featured">
							<?php the_post_other_thumbnail('featured-thumbnails') ?>
						</div>

						<?php
							if ( function_exists('p75HasVideo') && p75HasVideo($post->ID) ) {
								echo '<div class="video-container">' . p75GetVideo($post->ID) . '</div>';
							}
						?>
					</div>
					
					<div class="single-right">
						<h3 class="the_title"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<div class="single-content"><?php the_content(); ?></div>

						<?php if( $store_link = get_post_meta(get_the_ID(), 'store_link', true) ): ?>
						<p class="store_link"><a href="<?php echo $store_link; ?>">Store ></a></p>
						<?php endif; ?>
					</div>

					<br class="clear" />
				</div>

			<?php endwhile; else : ?>

			<?php endif; ?>
			
			<br class="clear" />

			<?php //comments_template( '', true ); ?>

		</div>

	</div>

<?php get_footer(); ?>