<?php
/*
	Template Name: Image Page
*/
?>

<?php get_header(); ?>

	<h1><?php the_title(); ?></h1>

	<?php 
		$args = array(
			'post_type' => 'still_image'
		);
		$query = new WP_Query( $args );
	?>
	<div class="grid-container">
	<?php if ( $query->have_posts()): while ( $query->have_posts()) : $query->the_post(); ?>
		<?php if( have_rows('images') ): ?>
			<?php while( have_rows('images') ): the_row(); 
				// vars
				$image = get_sub_field('image');
			?>
			<div class="grid-3 imageGallery">
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />		
			</div>
			<?php endwhile; ?>
		<?php endif; ?>
	<?php endwhile; endif; wp_reset_postdata(); ?>
	</div>

<?php get_footer(); ?>
