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
		$result .= '<h3 class="center">'. __('My Projects', 'gabuild') . '</h3>';
		$result .= '<div class="projects grid-x grid-margin-x grid-padding-x medium-up-2 large-up-3">';
		while ($the_query->have_posts()) {
			$the_query->the_post();
			$result .= '<div class="gaproject cell">';
			$result .= '<h4>' . get_the_title() . '</h3>';
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