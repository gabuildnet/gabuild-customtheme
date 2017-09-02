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
		'post_per_page' => 8,
		'orderby' => 'date',
		'order' => 'DESC'
	);

	$the_query = new WP_Query($args);

	//The loop
	if ($the_query->have_posts()) {
		$result .= '<div class="projects flex-grid">';
		while ($the_query->have_posts()) {
			$the_query->the_post();
			$result .= '<div class="gaproject">';
			$result .= '<h3>' . get_the_title() . '</h3>';
			$result .= '</div>';
		}
		$result .= '</div>';
	}

	wp_reset_postdata();

	return $result;
}
add_shortcode('gaprojects', 'gabuild_projects_shortcode');

 ?>