<?php global $post; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('tile'); ?>>

	<div class="inner">

		<h2><a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a></h2>
		<p><?php echo $post->post_type; ?></p>
		<a class='view_button' href="<?php echo get_permalink($post->ID); ?>">View</a>
		<p class='lightbox_icon'></p>
	</div>
	
</article>