<?php get_header(); ?>
<div class="pageTitles">
	<h1><?php the_title(); ?></h1>
</div>
<?php $args = array(
	'post_type' => 'still_image',
	'tax_query' => array(
		array(
			'taxonomy' => 'subject',
			'field'    => 'subjects',
			'terms'    => 'Maps',
		),
	),
);

  $posts = get_posts($args);
  print_r($posts);
?>

<?php

		$maps = $wpdb->get_results(
			"
			SELECT DISTINCT t.term_id, t.name 
			FROM `wp_term_taxonomy` tt 
			LEFT JOIN `wp_term_relationships` tr ON tt.term_taxonomy_id = tr.term_taxonomy_id 
			LEFT JOIN `wp_posts` p ON tr.object_id = p.ID 
			LEFT JOIN `wp_terms` t ON t.term_id = tt.term_id 
			WHERE p.post_type = 'still_image' 
			AND tt.taxonomy = 'subject'
			AND tt.term_taxonomy_name = 'Maps'
			ORDER BY tt.term_id ASC
			"
		);

		print_r($maps); ?>

<?php get_footer(); ?>
