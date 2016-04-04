<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="grid-container">
				<div class='grid-6'>
				<!-- post title -->
				

				
					<?php 
						$file = get_field( 'audio' );
						if( !empty($file) ): ?>
							<h1>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</h1>
							<audio controls>
								<source src="<?php echo $file['url']; ?>" type="<?php echo $file['mime_type']; ?>">
							</audio>
						<?php endif; ?>
				</div>
					
				<div class='grid-3'>
					<?php 
						$collections = get_field( 'collections' );
						if( !empty( $collections ) ): ?>
							<h3>Collections</h3>
							<?php foreach( $collections as $collection ):
								echo $collection->name; ?>
							<?php endforeach; 
						endif; 
					?>

					<?php
						$tags = get_field( 'tags' );
						if( !empty( $tags ) ): ?>
							<h3>Tags</h3>
							<?php foreach( $tags as $tag ):
								echo $tag->name; ?>
							<?php endforeach; 
						endif;
					?>

					<?php 
						$subjects = get_field( 'subjects' );
						if( !empty( $subjects) ): ?>
							<h3>Subjects</h3>
							<?php foreach( $subjects as $subject ):
								echo $subject->name; ?> 
							<?php endforeach;
						endif;
					?>
				</div>
					
				<div class='grid-3'>

					<?php 
						$originalFormat = get_field( 'format_original' );
						if( !empty( $originalFormat ) ): ?>
							<h3>Original Format</h3><?php echo $originalFormat; ?>
						<?php endif;
					?> 

					<?php
						$original_digital_file = get_field( 'master' );
						if( !empty($original_digital_file) ): ?>
							<h3>Original Digital File</h3><p><?php echo $original_digital_file['title']; ?></p> 
						<?php endif; 
					?>

					<?php 
						$accessionNumber = get_field( 'accession_number' );
						if( !empty( $accessionNumber ) ): ?>
							<h3>Accession Number</h3><?php echo $accessionNumber; ?>
						<?php endif;
					?>
	
			</div>
			</div>

			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); // Fullsize image for the single post ?>
				</a>
			<?php endif; ?>
			<!-- /post thumbnail -->

			

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