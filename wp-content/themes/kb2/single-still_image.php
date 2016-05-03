<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>

	<!-- In the page-still_image.php, we get out posts by using an $args array with 'post_type' as 
	an argument. Not entirely sure whether we want to do the same here, or whether WP will
	know the post_type, from the naming convention of the template, i.e. single-still_image. -->
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="grid-container">
				
				<div class='grid-6'>
					<h2><?php the_title(); ?></h2>
					
					<?php if( have_rows('images') ): ?>
						<?php while( have_rows('images') ): the_row(); 
						// vars
							$image = get_sub_field('image');
						?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
						<?php endwhile; ?>
					<?php endif; ?>
				
				</div>

				<div class='grid-3'>

					<h3>Collections</h3>

					<ul>
						<?php 
							
							$collections = get_field( 'collections' ); 
							//print_r($collections); 

							if( !empty($collections) ):
								foreach($collections as $collection): ?>

									<li><a href="<?php echo get_term_link($collection->term_id); ?>" class="term collection"><?php echo $collection->name; ?></a></li>

							<?php
								endforeach;
							endif;
						?>
					</ul>


					<h3>Tags</h3>
					
					<ul>
						<?php 
							
							$tags = get_field( 'tags' ); 
							//print_r($tags); 

							if( !empty($tags) ):
								foreach($tags as $tag): ?>

									<li><a href="<?php echo get_term_link($tag->term_id); ?>" class="term tag"><?php echo $tag->name; ?></a></li>

							<?php
								endforeach;
							endif;
						?>
					</ul>


					<h3>Subjects</h3>
					<?php
					//trying to echo out the subjects for an individual image.
					//Not sure where I'm going wrong here. I referenced
					//http://www.advancedcustomfields.com/resources/taxonomy/ 
						$subjects = get_field('subjects');
						if( !empty($subjects) ): ?>
							<ul>
							<?php foreach( $subjects as $subject ): ?>
								<li><a href="<?php echo get_term_link($subject->term_id); ?>" class="term subject"><?php echo $subject->name; ?></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					
				</div>
				<div class='grid-3'>
					<h3>Format of the original:</h3><p><?php the_field( 'format_original' ); ?></p>
					<h3>Location</h3><p><?php the_field( 'location' ); ?></p>
					<?php 
						$file = get_field('master');
						if( $file ): ?>	
					<h3>Original Data File</h3><a href="<?php echo $file['url']; ?>"><?php echo $file['filename']; ?></a>
					<?php endif; ?>
					<h3>Accession number</h3><p><?php the_field( 'accession_number' ); ?><p>
				</div>
			</div>	

			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); // Fullsize image for the single post ?>
				</a>
			<?php endif; ?>
			<!-- /post thumbnail -->

			<!-- post title -->
			<!-- <h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1> -->
			<!-- /post title -->

			<!-- post details -->
			<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
			<span class="author"><?php _e( 'Published by', 'kb2' ); ?> <?php the_author_posts_link(); ?></span>
			<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'kb2' ), __( '1 Comment', 'kb2' ), __( '% Comments', 'kb2' )); ?></span>
			<!-- /post details -->

			<?php the_content(); // Dynamic Content ?>

			<?php the_tags( __( 'Tags: ', 'kb2' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

			<p><?php _e( 'Categorised in: ', 'kb2' ); the_category(', '); // Separated by commas ?></p>

			<p><?php _e( 'This post was written by ', 'kb2' ); the_author(); ?></p>

			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

			<?php comments_template(); ?>

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'kb2' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
