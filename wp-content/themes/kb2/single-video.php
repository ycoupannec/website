<?php get_header(); ?>

	<main role="main">
		<!-- section -->
			<section>

			<?php if (have_posts()): 

				while (have_posts()) : the_post(); ?>

					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<div class="grid-container">
							<div class='grid-6'>
								<!-- post title -->
								<h1><?php the_title(); ?></h1>
								<!-- /post title -->
								<?php 
									$video = get_field( 'youtube_id' ); //Make a youtube embed
									//print_r($video);
									if( !empty( $video ) ): ?>
										<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video; ?>" frameborder="0" allowfullscreen></iframe>
									<!-- post thumbnail -->
									<?php elseif ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> -->
											<?php the_post_thumbnail(); // Fullsize image for the single post ?>
										</a>
									<?php endif; 
								?>
									<!-- /post thumbnail -->

							</div>
							<div class="grid-3">
								
								<?php //Collections
									$collections = get_field( 'collections' );
									//print_r($collections);
									if( !empty( $collections ) ): ?>
										<h3>Collections</h3>
										<ul>
											<?php foreach( $collections as $collection ): ?>
												<li><a href="<?php echo get_term_link($collection->term_id); ?>" class="term collection"><?php echo $collection->name; ?></a></li>
											<?php endforeach; ?>
										</ul>
									<?php endif;
								?>

								<?php
									$tags = get_field( 'tags' );
									//print_r($tags);
									if( !empty($tags) ): ?>
									<h3>Tags</h3>
									<ul>
										<?php foreach ($tags as $tag): ?>
											<li><a href="<?php echo get_term_link($tag->term_id); ?>" class="term tag"><?php echo $tag->name; ?></a></li>
										<?php endforeach; ?>
									</ul>
									<?php endif;
								?>

								<?php //Subjects
									$subjects = get_field( 'subjects' );
									//print_r($subjects);
									if( !empty( $subjects ) ): ?>
									<h3>Subjects</h3>
									<ul>
										<?php foreach ( $subjects as $subject ): ?> 
											<li><a href="<?php echo get_term_link($subject->term_id); ?>" class="term subject"><?php echo $subject->name; ?></a></li>
										<?php endforeach; ?>
									</ul>
									<?php endif;
								?>


							</div>
							<div class="grid-3">

								<?php
									$originalFormat = get_field( 'format_original' );
									//print_r($originalFormat);
									if( !empty($originalFormat) ): ?>
										<h3>Original Format</h3>
										<?php echo $originalFormat; ?>
									<?php endif; 
								?>

								<?php //Original File
									$file = get_field('master');
									if( $file ): ?>	
										<h3>Original Data File</h3><a href="<?php echo $file['url']; ?>"><?php echo $file['filename']; ?></a>
									<?php endif; 
								?>

								<?php //Accession number
									$accessionNumber = get_field( 'accession_number' );
									if( !empty( $accessionNumber ) ): ?>
										<h3>Accession Number</h3><?php echo $accessionNumber; ?>
									<?php endif;
								?>

							</div>

						</div>



					</article>
					<!-- /article -->

				<?php endwhile; ?>

			<?php endif; ?>

			</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
