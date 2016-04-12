<?php get_header(); ?>

<div class='grid-container'>

	<?php

		$args = array(
			'post_type' => 'home_page'
		);
		$front_page = get_posts( $args );

	?>

	<?php foreach($front_page as $post) : ?> 
		
		<?php
			$images = get_field( 'images' ); ?>
			<div class='grid-4'>
			 <a href="<?php echo get_permalink(51366); ?>">
			 <img src="<?php echo $images[0]['images_thumbnail']['sizes']['thumbnail']; ?>" alt="<?php echo $images[0]['images_thumbnail']['alt'] ?>" />
			 <p><?php echo $images[0]['images_blurb']; ?></p>
			 </a>
			</div>
	

		<?php 
			$publications = get_field( 'publications' ); ?>
			<div class='grid-4'>
			<a href="<?php echo get_permalink(113036); ?>">
				<img src="<?php echo $publications[0]['publications_image']['sizes']['thumbnail']; ?>" alt="<?php echo $publications[0]['publications_image']['alt'] ?>" />
		 		<p><?php echo $publications[0]['publications_blurb']; ?></p>
		 	</a>
			</div>

		<?php 
			$people = get_field('people'); ?>
			<div class='grid-4'>
			<a href="<?php echo get_permalink(51040); ?>">
				<img src="<?php echo $people[0]['people_image']['sizes']['thumbnail']; ?>" alt="<?php echo $people[0]['people_image']['alt'] ?>" />
		 		<p><?php echo $people[0]['people_blurb']; ?></p>
		 	</a>
			</div>
			
		</div><div class='grid-container'>

		<?php 
			$films = get_field('films'); ?>
			<div class='grid-4'>
			<a href="<?php echo get_permalink(113038); ?>">
				<img src="<?php echo $films[0]['films_image']['sizes']['thumbnail']; ?>" alt="<?php echo $films[0]['films_image']['alt'] ?>" />
		 		<p><?php echo $films[0]['films_blurb']; ?></p>
		 	</a>
			</div>
		
		<?php 
			$audio = get_field('audio'); ?>
			
			<div class='grid-4'>
				<img src="<?php echo $audio[0]['audio_image']['sizes']['thumbnail']; ?>" alt="<?php echo $audio[0]['audio_image']['alt'] ?>" />
		 		<p><?php echo $audio[0]['audio_blurb']; ?></p>
			</div>
			
			
	
	<?php endforeach; ?>


</div>


<?php get_footer(); ?>