<?php
/*
	Template Name: Image Page
*/
?>

<?php get_header(); ?>

	<h1><?php the_title(); ?></h1>

	<?php

		$subjects = $wpdb->get_results(
			"
			SELECT DISTINCT t.term_id, t.name 
			FROM `wp_term_taxonomy` tt 
			LEFT JOIN `wp_term_relationships` tr ON tt.term_taxonomy_id = tr.term_taxonomy_id 
			LEFT JOIN `wp_posts` p ON tr.object_id = p.ID 
			LEFT JOIN `wp_terms` t ON t.term_id = tt.term_id 
			WHERE p.post_type = 'still_image' 
			AND tt.taxonomy = 'subject'
			ORDER BY tt.term_id ASC
			"
		);

		if( !empty($subjects)):
			foreach($subjects as $subject) : ?>
				<?php 
					//Not sure where I'm going wrong here. As I understand it,
					//we need to get the ID of a term(in our case $subject)
					//and pass it as an argument to get_term_link(). If this works
					//we should get a string to echo out in our <a href="">
					$termLinks = get_term_link($subject->term_id);
					print_r($termLinks);
					echo $subject->name; 
				?>
			<?php endforeach;
		endif;
		
	?>

	<?php 
		$args = array(
			'post_type' => 'still_image',
			'posts_per_page' => 20,
		);
		
		$records = get_posts($args);
	?>
	<div class="grid-container">
	<?php if ( !empty($records) ):  ?>

		<?php foreach($records as $record): ?>

			<?php //print_r($record); ?>
			<a href='<?php echo get_permalink($record->ID); ?>'>
			<h3><?php echo $record->post_title; ?></h3>
			</a>

			<?php 

				$images = get_field('images',$record->ID);

				if(!empty($images)): ?>

					<div class="grid-3 imageGallery">

						<?php foreach($images as $image): ?>

								<?php //print_r($image); ?>

								<?php if(isset($image['image']['sizes']['thumbnail'])): ?>

									<img src="<?php echo $image['image']['sizes']['thumbnail']; ?>" alt="<?php echo $image['image']['alt'] ?>" />		

								<?php endif; ?>


						<?php endforeach; ?>

					</div><!-- .imageGallery -->
			<?php

				endif;

			?>
				
			<hr style="clear:both;" />

		<?php endforeach; ?>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>
