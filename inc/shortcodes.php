<?php 
/*
 * Adds shortcodes functions to wordpress.
 */

function gabuild_code_shortcode ($atts, $content = null) {
	return '<code>' . do_shortcode($content) . '</code>';
}
add_shortcode('gacode', 'gabuild_code_shortcode');

 ?>