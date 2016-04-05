<?php  get_header(); ?>


		<section class="tiles">


		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			

			<?php 

				//here we include a standard 'tile' template for each of our media types - tile-audio.php, tile-video.php
				//They all have the same structure, but include the different players for audio or video, or show a still image etc
				//We can use these tile templates wherever we want records shown as tiles, anywhere on the site.

				get_template_part('tile', $post->post_type);

			?>	

			

		<?php endwhile; ?>


		<?php 

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => 'Previous page',
				'next_text'          => 'Next Page',
				'before_page_number' => '',
			) );

		?>


		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'kb2' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>



<?php get_footer(); ?>
