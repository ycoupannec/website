<?php global $post; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('tile'); ?>>

	<div class="imageWrap">

		<?php $images = get_field('images'); ?>

		<?php if(isset($images[0]['image']['sizes']['700w'])): ?>

			<img src="<?php echo $images[0]['image']['sizes']['700w']; ?>" />

		<?php endif; ?>

	</div>	

	<div class="inner">

		<h2><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></h2>
		<p><?php echo $post->post_type; ?></p>

	</div>
	
</article>