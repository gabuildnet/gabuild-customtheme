<?php 
/*
 * Adds shortcodes functions to wordpress.
 */

function gabuild_code_shortcode ($atts, $content = null) {
	return '<code>' . do_shortcode($content) . '</code>';
}
add_shortcode('gacode', 'gabuild_code_shortcode');

function gabuild_projects_shortcode($atts, $content = null) {
	$result = '';

	$args = array (
		'post_type' => 'projects',
		'post_status' => 'publish',
		'post_per_page' => 6,
		'orderby' => 'date',
		'order' => 'DESC'
	);

	$the_query = new WP_Query($args);

	//The loop
	if ($the_query->have_posts()) {
		$result .= '<div class="gashortcode">';
		$result .= '<h3 class="center">'. __('Latest projects', 'gabuild') . '</h3>';
		$result .= '<div class="projects grid-x grid-margin-x grid-padding-x grid-padding-y grid-margin-y medium-up-2 large-up-3">';
		while ($the_query->have_posts()) {
			$the_query->the_post();
			$result .= '<div class="gaproject cell">';
			$result .= '<a href="' . get_permalink() . '">';
			$result .= '<h4>' . get_the_title() . '</h4>';
			$result .= '</a>';
			$result .= '<div class="gaproject-featured-img">';
			if (has_post_thumbnail()){
				$result .= get_the_post_thumbnail( null, 'post-thumbnail');
			} else {
				$result .= '<div class="thumbnail-filler"></div>';
			}
			$result .= '</div>';
			$result .= '<div class="gaproject-content">';
			$result .= get_the_excerpt();
			$result .= '</div>';
			$result .= '</div>';
		}
		$result .= '</div>';
		$result .= '</div>';
	}

	wp_reset_postdata();

	return $result;
}
add_shortcode('gaprojects', 'gabuild_projects_shortcode');

 ?>