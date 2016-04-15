<?php get_header(); ?>
<div class="pageTitles">
	<h1><?php the_title(); ?></h1>
</div>

	<?php

		$number_of_posts = 18;

		$args = array(
			'post_type' => 'video',
			'posts_per_page' => $number_of_posts
		);
		
		$records = get_posts($args);
		$counter = 0;
	
	?>

	<div class="grid-container">
	<?php if ( !empty($records) ):  ?>
		<?php foreach($records as $record): ?>
			<div class="grid-4 imageGallery">
				<a href='<?php echo get_permalink($record->ID); ?>'>
				<?php //print_r($record); 
					echo $record->post_title;
					$counter++;
				?>
				</a>
			</div>
			<?php if ( $counter % 3 == 0 && $counter != 18) : ?>
        		</div><div class='grid-container'>
        	<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
	</div>

<?php get_footer(); ?>
