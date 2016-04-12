<?php get_header();  ?>

<div class="grid-container">
		
	<?php
		$landingpages = get_field('content_landing_pages');

		if(!empty($landingpages)):

			foreach($landingpages as $page): ?>

				<div class="grid-4">
					<a href="<?php echo get_permalink($page['landing_page']->ID); ?>"><img src="<?php echo $page['image']['sizes']['300w']; ?>" alt="<?php echo $page['image']['alt'] ?>" /></a>	
					<h3><?php echo $page['landing_page']->post_title; ?></h3>
					<p><?php echo $page['blurb']; ?></p>						
				</div>

	<?php
			endforeach;

		endif;
		
	?>

</div>


<?php get_footer(); ?>