<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package gabuid
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gabuild_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'gabuild_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function gabuild_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'gabuild_pingback_header' );

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