<?php get_header(); ?>
<div class="pageTitles">
	<h1><?php the_title(); ?></h1>
	<h3>Latest Publications</h3>
</div>

<?php 
	$args = array(
		'post_type' => 'text',
		'posts_per_page' => 5
	);

	$latest_posts = get_posts($args);
?>

<div class="grid-container">

	<?php if(!empty ($latest_posts) ) :
		
		foreach($latest_posts as $latest) : 
			
			$images = get_field('images', $latest->ID); ?>

				<div class="grid-1-5">
					
					<?php if(isset($images[0]['image']['sizes']['700w'])): ?>

						<a href='<?php echo get_permalink( $latest->ID ); ?>'> 
						
							<img src="<?php echo $images[0]['image']['sizes']['700w']; ?>">
			
						</a>

					<?php endif; ?>

				</div>

		<?php endforeach; 

	endif; ?>

</div>

<div class="pageTitles">
	
	<h3>Browse our publications by subject</h3>

</div>

<div class="grid-container">

	<?php

		$subjects = $wpdb->get_results(
			"
			SELECT DISTINCT t.term_id, t.name 
			FROM `wp_term_taxonomy` tt 
			LEFT JOIN `wp_term_relationships` tr ON tt.term_taxonomy_id = tr.term_taxonomy_id 
			LEFT JOIN `wp_posts` p ON tr.object_id = p.ID 
			LEFT JOIN `wp_terms` t ON t.term_id = tt.term_id 
			WHERE p.post_type = 'text' 
			AND tt.taxonomy = 'subject'
			ORDER BY tt.term_id ASC
			"
		);

		$counter = 0; //used to keep track of loop iterations so styling is correct
		$number_of_subjects = count($subjects); //used to keep track of loop iterations so styling is correct

		if( !empty($subjects)):
			foreach($subjects as $subject) : ?>

				<?php 
					//Not entirely sure that this is correct. 
					//I couldn't get it to work last night, but it's going now??
					//Also, I tried applying the post type filter but it doesn't seem 
					//to work.
					$termID = $subject->term_id;
					$termLinks = get_term_link($termID, 'subject');
					$postTypeLink = "?post_type=text";
					$subjectPermalink = $termLinks . $postTypeLink;
					$counter++;
				?>
				<div class="grid-4 image-subjects-links">
					<a href="<?php echo $subjectPermalink; ?>">	
						<?php echo $subject->name; ?>
					</a> 
				</div>
				
      			<?php if ( $counter % 3 == 0 && $counter != $number_of_subjects) : ?>
        			</div><div class="grid-container">
        		<?php endif; ?>

			<?php endforeach;
		endif;
		
	?>

</div><!-- .grid-container -->

<?php get_footer(); ?>
