<?php get_header(); ?>
<div class="pageTitles">
	<h1><?php the_title(); ?></h1>
</div>
<?php $args = array(
	'post_type' => 'still_image',
	'tax_query' => array(
		array(
			'taxonomy' => 'subject',
			'field'    => 'term_id',
			'terms'    => array( 765 ),
			'operator' => 'IN',
		),
	),
);


$maps = get_posts($args);

print_r($maps);
?>

<?php get_footer(); ?>
