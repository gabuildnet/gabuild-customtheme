<?php
/**
 * Creating the custom post types for the theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package gabuid
 */

/**
 * Add custom posts types
 */
add_action( 'init', 'gabuild_create_post_types' );
function gabuild_create_post_types() {
  register_post_type( 'projects',
    array(
      'labels' => array(
        'name' => __( 'Projects' ),
        'singular_name' => __( 'Project' )
      ),
      'public' => true,
      'has_archive' => true,
      'taxonomy' => 'project-ypes',
      'menu_icon' => 'dashicons-category'
    )
  );

  register_post_type( 'stories',
    array(
      'labels' => array(
        'name' => __( 'Stories' ),
        'singular_name' => __( 'Story' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-book-alt'
    )
  );

  register_post_type( 'versions',
    array(
      'labels' => array(
        'name' => __( 'Versions' ),
        'singular_name' => __( 'Version' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-analytics'
    )
  );

  /*
  *	Register the taxonomies as well for the custom posts.
  */
  register_taxonomy('project-types', 'projects', array(
		'labels' => array(
        	'name' => __( 'Project Types' ),
        	'singular_name' => __( 'Project type' )
      		),
		'public' => true,
		)
	);
}
?>