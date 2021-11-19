<?php

if ( ! function_exists( 'ucfwp_post_list_display_project_before' ) ) {
	function ucfwp_post_list_display_project_before( $content, $items, $atts ) {
		ob_start();
	?>
	<div class="">
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_project_before', 'ucfwp_post_list_display_project_before', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_project_title' ) ) {
	function ucfwp_post_list_display_project_title( $content, $items, $atts ) {
		$formatted_title = '';
		if ( $atts['list_title'] ) {
			$formatted_title = '<h2 class="">' . $atts['list_title'] . '</h2>';
		}
		return $formatted_title;
	}
}

add_filter( 'ucf_post_list_display_project_title', 'ucfwp_post_list_display_project_title', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_project' ) ) {
	function ucfwp_post_list_display_project( $content, $items, $atts ) {
		if ( ! is_array( $items ) && $items !== false ) { $items = array( $items ); }
		ob_start();
	?>
		<?php if ( $items ):
			usort($items, function ($a, $b) {
				$first = get_field( 'project_order', $a->ID ) ?: 9999;
				$second = get_field( 'project_order', $b->ID ) ?: 9999;

				return $first <=> $second;
			});

			?>
			<div class="py-2">
				<?php foreach ( $items as $item ):
					?>
					<a class="wrapper-link" href="<?php echo get_permalink($item->ID); ?>">
						<div class="row justify-content-center mb-5">
							<div class="col-lg-3 col-md-8">
								<?php if (get_field('project_photo', $item->ID)): ?>
									<img class="img-fluid rounded" src="<?php echo get_field('project_photo', $item->ID); ?>">
								<?php endif; ?>
							</div>

							<div class="col-lg-9">
								<h4 class="wrapper-heading pt-3 pt-lg-0"><?php echo get_field('project_name', $item->ID); ?></h4>
								<hr>
								<div class="font-size-sm text-secondary">
									<?php
										if ( get_field('project_summary', $item->ID) ) {
											echo get_field('project_summary', $item->ID);
										} else {
											$originalDescription = get_field('project_description', $item->ID);
											$stringLimit = 400;

											$description = substr( $originalDescription, 0, $stringLimit);

											if ( strlen($originalDescription) > $stringLimit) {
												$description .= '...';
											}

											echo $description;
										}
									?>
								</div>

								<div class="text-center mt-2">
									<button class="btn btn-sm btn-secondary">View More</button>
								</div>
							</div>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		<?php else: ?>
		<div class="ucf-post-list-error mb-4">No results found.</div>
		<?php endif; ?>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_project', 'ucfwp_post_list_display_project', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_project_after' ) ) {
	function ucfwp_post_list_display_project_after( $content, $items, $atts ) {
		ob_start();
	?>
	</div>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_project_after', 'ucfwp_post_list_display_project_after', 10, 3 );
