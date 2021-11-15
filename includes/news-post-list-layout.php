<?php

if ( ! function_exists( 'ucfwp_post_list_display_news_before' ) ) {
	function ucfwp_post_list_display_news_before( $content, $items, $atts ) {
		ob_start();
	?>
	<div class="">
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_news_before', 'ucfwp_post_list_display_news_before', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_news_title' ) ) {
	function ucfwp_post_list_display_news_title( $content, $items, $atts ) {
		$formatted_title = '';
		if ( $atts['list_title'] ) {
			$formatted_title = '<h2 class="">' . $atts['list_title'] . '</h2>';
		}
		return $formatted_title;
	}
}

add_filter( 'ucf_post_list_display_news_title', 'ucfwp_post_list_display_news_title', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_news' ) ) {
	function ucfwp_post_list_display_news( $content, $items, $atts ) {
		if ( ! is_array( $items ) && $items !== false ) { $items = array( $items ); }
		ob_start();
	?>
		<?php if ( $items ): ?>
		<ul class="list-group list-group-flush">
			<?php foreach ( $items as $item ): ?>
				<li class="list-group-item">
					<div class="w-100 d-flex flex-row justify-content-between align-items-top font-size-sm mb-1">
						<div class="pointer-events-none no-underline text-secondary pr-2">
							<?php echo $item->post_content; ?>
						</div>
						<div>
							<?php get_news_icon( $item->ID ); ?>
						</div>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php else: ?>
		<div class="ucf-post-list-error mb-4">No results found.</div>
		<?php endif; ?>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_news', 'ucfwp_post_list_display_news', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_news_after' ) ) {
	function ucfwp_post_list_display_news_after( $content, $items, $atts ) {
		ob_start();
	?>
	</div>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_news_after', 'ucfwp_post_list_display_news_after', 10, 3 );
