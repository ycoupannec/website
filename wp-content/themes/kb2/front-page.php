<?php get_header(); ?>

<div class='grid-container'>

	<?php
		$args = array(
			'post_type' => 'still_image',
			'posts_per_page' => 1
		);
		$imagePost = get_posts( $args );
		//print_r($imagePost);

	?>
	
	<?php if( !empty( $imagePost ) ) : ?>
		
		<div class='grid-4'>
		<?php foreach( $imagePost as $image ) : ?>
			<a href='<?php echo get_permalink($image->ID); ?>'>
				<h3><?php echo $image->post_title; ?></h3>
			</a>
		<?php endforeach; ?> <!-- end foreach -->
		</div>

	<?php endif; ?> <!-- endif -->

	<?php
		$args = array(
			'post_type' => 'person',
			'posts_per_page' => 1
		);
		$personPost = get_posts( $args );
	?>

	<?php if( !empty( $personPost ) ) : ?>
		
		<div class='grid-4'>
		<?php foreach( $personPost as $person ) : ?>
			<a href='<?php echo get_permalink($person->ID); ?>'>
				<h3><?php echo $person->post_title; ?></h3>
			</a>
		<?php endforeach; ?> <!-- end foreach -->
		</div>
	
	<?php endif; ?> <!-- endif -->

	<?php
		$args = array(
			'post_type' => 'video',
			'posts_per_page' => 1
		);
		$videoPost = get_posts( $args );
	?>

	<?php if( !empty( $videoPost ) ) : ?>
		<div class='grid-4'>
			<?php foreach( $videoPost as $video ) : ?>
				<a href='<?php echo get_permalink($video->ID); ?>'>
				<h3><?php echo $video->post_title; ?></h3>
			</a>
			<?php endforeach; ?> 
		</div>
	<?php endif; ?>		

</div>


<?php get_footer(); ?>