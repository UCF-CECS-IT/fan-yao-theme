<?php

/**
 * Returns the post excerpt with an optional custom character count.
 * Handles necessary postdata setup.
 *
 * @since 0.5.2
 * @author Jo Dickson
 * @param object $post A WP_Post object
 * @param int $length Specify a custom length for the excerpt.
 * @return string Sanitized post excerpt
 */
function ucfwp_get_excerpt( $post, $length=0 ) {
	if ( ! ( $post instanceof WP_Post ) ) return '';

	if ( $length === 0 ) {
		$length = apply_filters( 'excerpt_length', $length );
	}

	// Allow custom excerpt modification short-circuit
	$excerpt = apply_filters( 'ucfwp_get_excerpt_before', '', $post, $length );
	if ( $excerpt ) {
		return $excerpt;
	}

	setup_postdata( $post );

	$custom_filter = function( $l ) use ( $length ) {
		return $length;
	};

	add_filter( 'excerpt_length', $custom_filter, 999 );
	$excerpt = wp_strip_all_tags( get_the_excerpt( $post ) );
	remove_filter( 'excerpt_length', $custom_filter, 999 );

	return apply_filters( 'ucfwp_get_excerpt', $excerpt, $post, $length );
}

function get_news_icon( int $postId ) {
	$categories = get_the_category( $postId );

	foreach($categories as $category) {
		switch ($category->slug) {
			case 'graduation':
				$color = 'success';
				$name = $category->name;
				$icon = '<i class="fas fa-graduation-cap"></i> &nbsp;';
				break;

			case 'award':
				$color = 'complementary';
				$name = $category->name;
				$icon = '<i class="fas fa-award"></i> &nbsp;';
				break;

			case 'paper':
				$color = 'info';
				$name = $category->name;
				$icon = '<i class="fas fa-book"></i> &nbsp;';
				break;

			default:
				$color = 'primary';
				$name = 'Other';
				$icon = '<i class="fas fa-rss"></i> &nbsp;';
				break;
		}

		echo '<span class="d-flex flex-row badge badge-' . $color . ' box-shadow-soft mb-1">' . $icon . $name . "</span>";
	}
}
