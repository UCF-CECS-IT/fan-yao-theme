<?php

function projects_post_type()
{
	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Projects', 'text_domain' ),
		'name_admin_bar'        => __( 'Projects', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Projects', 'text_domain' ),
		'labels'                => $labels,
		'menu_position'     	=> 5,
		'public'            	=> true,
		'has_archive'       	=> false,
		'supports'          	=> array('title', 'thumbnail', 'revisions')
	);
	register_post_type('projects', $args);
}
add_action( 'init', 'projects_post_type', 0 );

function publications_post_type()
{
	$labels = array(
		'name'                  => _x( 'Publications', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Publication', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Publications', 'text_domain' ),
		'name_admin_bar'        => __( 'Publications', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Publications', 'text_domain' ),
		'labels'                => $labels,
		'menu_position'     	=> 5,
		'public'            	=> true,
		'has_archive'       	=> false,
		'supports'          	=> array('title', 'thumbnail', 'revisions')
	);
	register_post_type('publications', $args);
}
add_action( 'init', 'publications_post_type', 0 );

function selected_publications_post_type()
{
	$labels = array(
		'name'                  => _x( 'Selected Publications', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Selected Publication', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Selected Publications', 'text_domain' ),
		'name_admin_bar'        => __( 'Selected Publications', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Selected Publications', 'text_domain' ),
		'labels'                => $labels,
		'menu_position'     	=> 5,
		'public'            	=> true,
		'has_archive'       	=> false,
		'supports'          	=> array('title', 'thumbnail', 'revisions')
	);
	register_post_type('selected', $args);
}
add_action( 'init', 'selected_publications_post_type', 0 );

// function add_custom_taxonomy()
// {
// 	$singular = 'Selected Publication';
// 	$plural = 'Selected Publications';

// 	$labels = array(
// 		'name'                       => _x( $plural, 'Taxonomy General Name', 'ucf_people' ),
// 		'singular_name'              => _x( $singular, 'Taxonomy Singular Name', 'ucf_people' ),
// 		'menu_name'                  => __( $plural, 'ucf_people' ),
// 		'all_items'                  => __( 'All ' . $plural, 'ucf_people' ),
// 		'parent_item'                => __( 'Parent ' . $singular, 'ucf_people' ),
// 		'parent_item_colon'          => __( 'Parent :' . $singular, 'ucf_people' ),
// 		'new_item_name'              => __( 'New ' . $singular . ' Name', 'ucf_people' ),
// 		'add_new_item'               => __( 'Add New ' . $singular, 'ucf_people' ),
// 		'edit_item'                  => __( 'Edit ' . $singular, 'ucf_people' ),
// 		'update_item'                => __( 'Update ' . $singular, 'ucf_people' ),
// 		'view_item'                  => __( 'View ' . $singular, 'ucf_people' ),
// 		'separate_items_with_commas' => __( 'Separate ' . strtolower( $plural ) . ' with commas', 'ucf_people' ),
// 		'add_or_remove_items'        => __( 'Add or remove ' . strtolower( $plural ), 'ucf_people' ),
// 		'choose_from_most_used'      => __( 'Choose from the most used', 'ucf_people' ),
// 		'popular_items'              => __( 'Popular ' . strtolower( $plural ), 'ucf_people' ),
// 		'search_items'               => __( 'Search ' . $plural, 'ucf_people' ),
// 		'not_found'                  => __( 'Not Found', 'ucf_people' ),
// 		'no_terms'                   => __( 'No items', 'ucf_people' ),
// 		'items_list'                 => __( $plural . ' list', 'ucf_people' ),
// 		'items_list_navigation'      => __( $plural . ' list navigation', 'ucf_people' ),
// 	);

// 	$args = array(
// 		'labels'                     => $labels,
// 		'hierarchical'               => true,
// 		'public'                     => true,
// 		'show_ui'                    => true,
// 		'show_admin_column'          => true,
// 		'show_in_nav_menus'          => true,
// 		'show_tagcloud'              => true,
// 		'rewrite'                    => array(
// 			'slug'         => 'selected-publications',
// 			'hierarchical' => true,
// 			'ep_mask'      => EP_PERMALINK | EP_PAGES
// 		)
// 	);

// 	register_taxonomy( 'selected_publications', array( 'publications' ), $args );
// }

// add_action( 'init', 'add_custom_taxonomy', 0 );

/**
 * Adds Talks CPT
 *
 * @since 1.0.0
 */
function talks_post_type()
{
	$singular = 'Talk';
	$plural = 'Talks';
	$taxonomies = array(
		'post_tag',
		'category',
	);
	$icon = 'dashicons-list-view';

	$labels = array(
		'name'                  => _x( $plural, 'Post Type General Name', 'fan-yao-theme' ),
		'singular_name'         => _x( $singular, 'Post Type Singular Name', 'fan-yao-theme' ),
		'menu_name'             => __( $plural, 'fan-yao-theme' ),
		'name_admin_bar'        => __( $singular, 'fan-yao-theme' ),
		'archives'              => __( $plural . ' Archives', 'fan-yao-theme' ),
		'parent_item_colon'     => __( 'Parent ' . $singular . ':', 'fan-yao-theme' ),
		'all_items'             => __( 'All ' . $plural, 'fan-yao-theme' ),
		'add_new_item'          => __( 'Add New ' . $singular, 'fan-yao-theme' ),
		'add_new'               => __( 'Add New', 'fan-yao-theme' ),
		'new_item'              => __( 'New ' . $singular, 'fan-yao-theme' ),
		'edit_item'             => __( 'Edit ' . $singular, 'fan-yao-theme' ),
		'update_item'           => __( 'Update ' . $singular, 'fan-yao-theme' ),
		'view_item'             => __( 'View ' . $singular, 'fan-yao-theme' ),
		'search_items'          => __( 'Search ' . $plural, 'fan-yao-theme' ),
		'not_found'             => __( 'Not found', 'fan-yao-theme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'fan-yao-theme' ),
		'featured_image'        => __( 'Featured Image', 'fan-yao-theme' ),
		'set_featured_image'    => __( 'Set featured image', 'fan-yao-theme' ),
		'remove_featured_image' => __( 'Remove featured image', 'fan-yao-theme' ),
		'use_featured_image'    => __( 'Use as featured image', 'fan-yao-theme' ),
		'insert_into_item'      => __( 'Insert into ' . $singular, 'fan-yao-theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this ' . $singular, 'fan-yao-theme' ),
		'items_list'            => __( $plural . ' list', 'fan-yao-theme' ),
		'items_list_navigation' => __( $plural . ' list navigation', 'fan-yao-theme' ),
		'filter_items_list'     => __( 'Filter ' . $plural . ' list', 'fan-yao-theme' ),
	);

	$args = array(
		'label'                 => __( $plural, 'fan-yao-theme' ),
		'description'           => __( $plural, 'fan-yao-theme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', ),
		'taxonomies'            => $taxonomies,
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 8,
		'menu_icon'             => $icon,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);

	register_post_type( 'talk', $args );
}
add_action( 'init', 'talks_post_type', 0 );
