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

// function code_post_type()
// {
// 	$labels = array(
// 		'name'                  => _x( 'Code', 'Post Type General Name', 'text_domain' ),
// 		'singular_name'         => _x( 'Code', 'Post Type Singular Name', 'text_domain' ),
// 		'menu_name'             => __( 'Code', 'text_domain' ),
// 		'name_admin_bar'        => __( 'Code', 'text_domain' ),
// 	);
// 	$args = array(
// 		'label'                 => __( 'Code', 'text_domain' ),
// 		'labels'                => $labels,
// 		'menu_position'     	=> 5,
// 		'public'            	=> true,
// 		'has_archive'       	=> false,
// 		'supports'          	=> array('title', 'thumbnail', 'revisions')
// 	);
// 	register_post_type('code', $args);
// }
// add_action( 'init', 'code_post_type', 0 );

function add_custom_taxonomy()
{
	$singular = 'Selected Publication';
	$plural = 'Selected Publications';

	$labels = array(
		'name'                       => _x( $plural, 'Taxonomy General Name', 'ucf_people' ),
		'singular_name'              => _x( $singular, 'Taxonomy Singular Name', 'ucf_people' ),
		'menu_name'                  => __( $plural, 'ucf_people' ),
		'all_items'                  => __( 'All ' . $plural, 'ucf_people' ),
		'parent_item'                => __( 'Parent ' . $singular, 'ucf_people' ),
		'parent_item_colon'          => __( 'Parent :' . $singular, 'ucf_people' ),
		'new_item_name'              => __( 'New ' . $singular . ' Name', 'ucf_people' ),
		'add_new_item'               => __( 'Add New ' . $singular, 'ucf_people' ),
		'edit_item'                  => __( 'Edit ' . $singular, 'ucf_people' ),
		'update_item'                => __( 'Update ' . $singular, 'ucf_people' ),
		'view_item'                  => __( 'View ' . $singular, 'ucf_people' ),
		'separate_items_with_commas' => __( 'Separate ' . strtolower( $plural ) . ' with commas', 'ucf_people' ),
		'add_or_remove_items'        => __( 'Add or remove ' . strtolower( $plural ), 'ucf_people' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'ucf_people' ),
		'popular_items'              => __( 'Popular ' . strtolower( $plural ), 'ucf_people' ),
		'search_items'               => __( 'Search ' . $plural, 'ucf_people' ),
		'not_found'                  => __( 'Not Found', 'ucf_people' ),
		'no_terms'                   => __( 'No items', 'ucf_people' ),
		'items_list'                 => __( $plural . ' list', 'ucf_people' ),
		'items_list_navigation'      => __( $plural . ' list navigation', 'ucf_people' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => array(
			'slug'         => 'selected-publications',
			'hierarchical' => true,
			'ep_mask'      => EP_PERMALINK | EP_PAGES
		)
	);

	register_taxonomy( 'selected_publications', array( 'publications' ), $args );
}

add_action( 'init', 'add_custom_taxonomy', 0 );
