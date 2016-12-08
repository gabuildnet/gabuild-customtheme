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
      'taxonomy' => 'project-ypes'
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
    )
  );

  register_post_type( 'BOM',
    array(
      'labels' => array(
        'name' => __( 'BOMs' ),
        'singular_name' => __( 'BOM' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );

  register_post_type( 'products-needed',
    array(
      'labels' => array(
        'name' => __( 'Products Needed' ),
        'singular_name' => __( 'Product Needed' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );

  register_post_type( 'products',
    array(
      'labels' => array(
        'name' => __( 'Products' ),
        'singular_name' => __( 'Products' )
      ),
      'public' => true,
      'has_archive' => true,
      'taxonomy' => 'product-type'
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

  register_taxonomy('product-types', 'products', array(
		'labels' => array(
        	'name' => __( 'Product Types' ),
        	'singular_name' => __( 'Product type' )
      		),
		'public' => true,
		'hierarchical' => true
		)
	);
}

?>