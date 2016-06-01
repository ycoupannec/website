<?php  get_header(); ?>


		<section class="tiles tiles-4">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<?php get_template_part('tile', $post->post_type); ?>		
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
