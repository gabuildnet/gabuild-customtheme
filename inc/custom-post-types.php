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

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_stories-additionnal-fields',
    'title' => 'Stories Additionnal fields',
    'fields' => array (
      array (
        'key' => 'field_584a0a435e266',
        'label' => 'Story Project',
        'name' => 'story_project',
        'type' => 'relationship',
        'required' => 1,
        'return_format' => 'object',
        'post_type' => array (
          0 => 'projects',
        ),
        'taxonomy' => array (
          0 => 'all',
        ),
        'filters' => array (
          0 => 'search',
        ),
        'result_elements' => array (
          0 => 'post_type',
          1 => 'post_title',
        ),
        'max' => 1,
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'stories',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
  register_field_group(array (
    'id' => 'acf_version-additional-fields',
    'title' => 'Version Additional fields',
    'fields' => array (
      array (
        'key' => 'field_584a061fa532b',
        'label' => 'Version Project',
        'name' => 'version_project',
        'type' => 'relationship',
        'required' => 1,
        'return_format' => 'object',
        'post_type' => array (
          0 => 'projects',
        ),
        'taxonomy' => array (
          0 => 'all',
        ),
        'filters' => array (
          0 => 'search',
        ),
        'result_elements' => array (
          0 => 'post_type',
          1 => 'post_title',
        ),
        'max' => 1,
      ),
      array (
        'key' => 'field_584a08f5a50fc',
        'label' => 'BOM list',
        'name' => 'bom_list',
        'type' => 'wysiwyg',
        'default_value' => '',
        'toolbar' => 'full',
        'media_upload' => 'yes',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'versions',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' => array (
        0 => 'featured_image',
      ),
    ),
    'menu_order' => 0,
  ));
}


?>