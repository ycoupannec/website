<?php get_header();  ?>



<?php $slides = get_field('slider'); ?>

<?php if(!empty($slides)): ?>
	<div class="flexslider">

		<ul class="slides">

		<?php foreach($slides as $slide): ?>

			<li>

				<?php
					//get our href - it's either a permalink from a post object or a string from a text field, depending on what link_type is set to
					$link = ( $slide['link_type'] == 'internal' ? get_permalink($slide['internal']->ID) : $slide['external'] );
				?>

				<a href="<?php echo $link; ?>" <?php if($slide['new_window'] == 1) echo 'target="_blank"'; ?>>
					<img src="<?php echo $slide['image']['sizes']['1200w']; ?>" alt="<?php echo $slide['image']['alt'] ?>" />
					<?php if(!empty($slide['caption'])): ?>
					<div class="caption"><?php echo $slide['caption']; ?></div>
					<?php endif; ?>
				</a>

			</li>

		<?php endforeach; ?>

		</ul>

	</div>
<?php endif; ?>

<div class="grid-container bottom-margin top-padding">
		
	<?php
		$landingpages = get_field('content_landing_pages');

		if(!empty($landingpages)):

			foreach($landingpages as $page): ?>

				<div class="grid-3">
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