<?php  get_header(); ?>

		<div class="pageTitles">
			<h1><?php the_title(); ?></h1>
		</div>
		
		<section class="tiles years">

			<?php 

				$years = get_terms( array(
				    'taxonomy' => 'collections',    
				    'child_of' => 968,
				    'hide_empty' => false,
				) );

				if(!empty($years)) :

					foreach($years as $year): ?>

						<div <?php post_class('tile'); ?>>

							<div class="imageWrap">

								<?php $image = get_field('image','collections_' . $year->term_id); ?>

								<?php if(isset($image['sizes']['700w'])): ?>

									<img src="<?php echo $image['sizes']['700w']; ?>" />

								<?php endif; ?>

							</div>	

							<div class="inner">

								<h2><a href="<?php echo get_term_link($year->term_id); ?>"><?php echo $year->name; ?></a></h2>								

							</div>
							
						</div>

			<?php
					endforeach;
			?>

			<?php endif; ?>



		</section>




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
