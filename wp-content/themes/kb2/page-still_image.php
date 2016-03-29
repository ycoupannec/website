<?php
/*
	Template Name: Image Page
*/
?>

<?php get_header(); ?>

	<h1><?php the_title(); ?></h1>

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
