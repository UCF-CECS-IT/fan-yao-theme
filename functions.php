<?php

include_once 'includes/config.php';
include_once 'includes/navbar.php';
include_once 'includes/post-types.php';
include_once 'includes/utilities.php';

// Custom Post List layouts
include_once 'includes/code-post-list-layout.php';
include_once 'includes/news-post-list-layout.php';
include_once 'includes/project-post-list-layout.php';
include_once 'includes/publication-post-list-layout.php';
include_once 'includes/person-post-list-layout.php';

// Add Options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

add_theme_support( 'post-thumbnails' );

define('THEME_DIR', plugin_dir_path( __FILE__ ) );

function my_acf_json_save_point( $path ) {
    // update path
    $path = THEME_DIR . '/json';

    // return
    return $path;
}

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
