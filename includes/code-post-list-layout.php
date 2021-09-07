<?php

if ( ! function_exists( 'ucfwp_post_list_display_code_before' ) ) {
	function ucfwp_post_list_display_code_before( $content, $items, $atts ) {
		ob_start();
	?>
	<div class="">
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_code_before', 'ucfwp_post_list_display_code_before', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_code_title' ) ) {
	function ucfwp_post_list_display_code_title( $content, $items, $atts ) {
		$formatted_title = '';
		if ( $atts['list_title'] ) {
			$formatted_title = '<h2 class="">' . $atts['list_title'] . '</h2>';
		}
		return $formatted_title;
	}
}

add_filter( 'ucf_post_list_display_code_title', 'ucfwp_post_list_display_code_title', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_code' ) ) {
	function ucfwp_post_list_display_code( $content, $items, $atts ) {
		if ( ! is_array( $items ) && $items !== false ) { $items = array( $items ); }
		ob_start();
	?>
		<?php if ( $items ): ?>
		<ul class="">
			<?php foreach ( $items as $item ): ?>

			<?php endforeach; ?>
		</ul>
		<?php else: ?>
		<div class="ucf-post-list-error mb-4">No results found.</div>
		<?php endif; ?>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_code', 'ucfwp_post_list_display_code', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_code_after' ) ) {
	function ucfwp_post_list_display_code_after( $content, $items, $atts ) {
		ob_start();
	?>
	</div>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_code_after', 'ucfwp_post_list_display_code_after', 10, 3 );
