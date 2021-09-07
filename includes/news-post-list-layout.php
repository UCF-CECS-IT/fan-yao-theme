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
					<!-- <a class="newsitem-link" href="<?php echo get_permalink( $item->ID ); ?>"> -->
						<div class="w-100 d-flex flex-row justify-content-between align-items-center pb-1">
							<h5 class="newsitem-heading mb-0"><?php echo $item->post_title; ?></h5>
							<div>
								<?php get_news_icon( $item->ID ); ?>
							</div>
						</div>
						<div class="w-100 d-flex flex-row justify-content-between align-items-center font-size-sm mb-1">
							<?php if ( get_field('news_article_link', $item->ID) ): ?>
								<a class="pl-1" href="<?php echo get_field('news_article_link', $item->ID); ?>" target="_blank"><i class="fas fa-external-link-alt"></i> Link</a>
							<?php else: ?>
								<span></span>
							<?php endif; ?>
							<span class="date text-muted letter-spacing-2"><?php the_time( 'F j, Y' ); ?></span>
						</div>
						<?php if ($content = ucfwp_get_excerpt( $item, 25 )): ?>
							<p class="pointer-events-none no-underline text-secondary" style="font-size: 85%;">
								<?php echo $content; ?>
							</p>
						<?php endif; ?>
					<!-- </a> -->
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
