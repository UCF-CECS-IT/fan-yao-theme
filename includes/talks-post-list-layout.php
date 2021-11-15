<?php

if ( ! function_exists( 'ucfwp_post_list_display_talk_before' ) ) {
	function ucfwp_post_list_display_talk_before( $content, $items, $atts ) {
		ob_start();
	?>
	<div class="">
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_talk_before', 'ucfwp_post_list_display_talk_before', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_talk_title' ) ) {
	function ucfwp_post_list_display_talk_title( $content, $items, $atts ) {
		$formatted_title = '';
		if ( $atts['list_title'] ) {
			$formatted_title = '<h2 class="">' . $atts['list_title'] . '</h2>';
		}
		return $formatted_title;
	}
}

add_filter( 'ucf_post_list_display_talk_title', 'ucfwp_post_list_display_talk_title', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_talk' ) ) {
	function ucfwp_post_list_display_talk( $content, $items, $atts ) {
		if ( ! is_array( $items ) && $items !== false ) { $items = array( $items ); }
		ob_start();
	?>
		<?php if ( $items ): ?>
			<div class="row justify-content-center">
				<?php foreach ( $items as $item ): ?>
					<?php
					$talkUrl = get_field( 'talk_video_url', $item->ID );
					$talkImg = get_field( 'talk_image', $item->ID );
					?>

					<?php if ( $talkUrl || $talkImg ): ?>

						<div class="col-lg-4 col-md-6 col-11 mb-4">
							<h5 class="font-weight-light text-center">
								<?php echo $item->post_title; ?>
							</h5>

							<?php if ( $talkUrl ): ?>
								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" src="<?php echo $talkUrl; ?>?" allowfullscreen></iframe>
								</div>
							<?php else: ?>
								<div class="aspect-ratio-box">
									<img class="img-fluid" src="<?php echo $talkImg; ?>">
								</div>
							<?php endif; ?>

						</div>

					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_talk', 'ucfwp_post_list_display_talk', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_talk_after' ) ) {
	function ucfwp_post_list_display_talk_after( $content, $items, $atts ) {
		ob_start();
	?>
	</div>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_talk_after', 'ucfwp_post_list_display_talk_after', 10, 3 );
