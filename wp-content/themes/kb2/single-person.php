<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="grid-container">
				<div class='grid-6'>
					<h2><?php the_title(); ?></h2>
					<h3>Name:</h3>
					
						<?php if( have_rows( 'name' ) ): ?>
							<?php while( have_rows( 'name' ) ) : the_row();
								//vars 
								$first_name = get_sub_field( 'first_name' );
								$middle_names = get_sub_field( 'middle_names' );
								$family_name = get_sub_field( 'family_name' );
							?>
							<p><?php echo $first_name . " " . $middle_names . " " . $family_name; ?></p>
						<?php endwhile; endif; ?>
					
					
					<?php $known_as = get_field('known_as');
					if($known_as): ?>
						<h3>Known as:</h3>
						<p><?php echo $known_as; ?></p>
					<?php endif; ?>
					
					
					<?php $military_identification = get_field('military_identification');
					if($military_identification): ?>
						<h3>Military identification:</h3> 
						<p><?php echo $military_identification; ?></p>
					<?php endif; ?>
				</div>

				<div class='grid-6'>
					<h3>Born:</h3><p><?php the_field( 'birthdate' ); ?></p>
					
					</div>
					<div class='grid-6'>
					<?php if( have_rows( 'children' ) ): ?>
						<h3>Children:</h3>
							<?php while( have_rows( 'children' ) ) : the_row();
								//vars 
								$first_name = get_sub_field( 'first_name' );
								$middle_names = get_sub_field( 'middle_names' );
								$family_name = get_sub_field( 'family_name' );
							?>
							<p class='children'><?php echo $first_name . " " . $middle_names . " " . $family_name; ?></p>
						<?php endwhile; endif; ?>
					</div>
					<h3>Related material:</h1><a href="#">Title of article</a>
				
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
