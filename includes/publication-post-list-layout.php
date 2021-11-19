<?php

/**
 *
 * PUBLICATION layout
 *
 */
if ( ! function_exists( 'ucfwp_post_list_display_publication_before' ) ) {
	function ucfwp_post_list_display_publication_before( $content, $items, $atts ) {
		ob_start();
	?>
	<div class="">
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_publication_before', 'ucfwp_post_list_display_publication_before', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_publication_title' ) ) {
	function ucfwp_post_list_display_publication_title( $content, $items, $atts ) {
		$formatted_title = '';
		if ( $atts['list_title'] ) {
			$formatted_title = '<h2 class="">' . $atts['list_title'] . '</h2>';
		}
		return $formatted_title;
	}
}

add_filter( 'ucf_post_list_display_publication_title', 'ucfwp_post_list_display_publication_title', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_publication' ) ) {
	function ucfwp_post_list_display_publication( $content, $items, $atts ) {
		if ( ! is_array( $items ) && $items !== false ) { $items = array( $items ); }
		ob_start();
	?>
		<?php if ( $items ): ?>
			<?php
				// Set current year
				$currentYear = intval( date('Y') );

				// Group publications by year
				$grouped = [];

				foreach ( $items as $item ) {
					if ( get_field('publication_is_pending', $item->ID ) == 'Pending' ) {
						$grouped['Archive'][] = $item;
					} else {
						$year = get_field('publication_year', $item->ID);
						$grouped[$year][] = $item;
					}
				}

				$ordered = [];

				// Begin by sorting by date - newest to oldest
				foreach($grouped as $year => $yearItems) {
					usort($yearItems, function($a, $b) {
						$first = get_field('publication_month', $a->ID);
						$second = get_field('publication_month', $b->ID);

						return strtotime($second) - strtotime($first);
					});

					$ordered[$year] = $yearItems;
				}

				// re-sort by keys ascending to ensure the Archives display first
				uksort($ordered, function($a, $b) {
					if ($a == 'Archive') return 1;

					if ($b == 'Archive') return 1;

					return -($a <=> $b);
				});

				// Re-sort by display order
				foreach($ordered as $year => $yearItems) {
					usort($yearItems, function($a, $b) {
						/**
						 * Comparison uses Elvis operator because the result may return an empty string,
						 * so a null coalescing check will miss it.
						 */
						$first = get_field('publication_display_order', $a->ID) ?: 9999;
						$second = get_field('publication_display_order', $b->ID) ?: 9999;

						return ($first <=> $second);
					});

					$ordered[$year] = $yearItems;
				}
			?>
			<?php foreach($ordered as $year => $yearItems): ?>

				<?php if ( $yearItems ): ?>
					<!-- Display Individual Date Years -->
					<h4><?php echo $year; ?></h4>
					<hr class="mt-1">

					<div class="mb-4">
						<?php foreach ( $yearItems as $index => $item ): ?>
							<div class="pl-3 d-flex flex-column align-content-start mb-2">
								<div class="w-100">
									<div class="text-primary font-weight-bold" style="font-size: 110%"><?php echo get_field('publication_title', $item->ID); ?></div>
									<div class="font-size-sm font-italic"><?php echo get_field('publication_authors', $item->ID); ?></div>
									<div>
										<h6 class="d-inline"><?php echo get_field('publication_journal', $item->ID); ?></h6>
										<?php if (get_field('publication_month', $item->ID)): ?>
											<?php echo get_field('publication_month', $item->ID); ?>
										<?php endif; ?>
										<?php if (get_field('publication_year', $item->ID)): ?>
											<?php echo get_field('publication_year', $item->ID); ?>
										<?php endif; ?>
									</div>
								</div>
								<div class="w-100 pl-3 pb-1 text-left">
									<?php if (get_field('publication_pdf', $item->ID)): ?>
										<a class="btn btn-sm small text-transform-none btn-outline-secondary rounded py-1 px-2" href="<?php echo get_field('publication_pdf', $item->ID); ?>"><small>PDF</small></a>
									<?php endif; ?>

									<?php if (get_field('publication_slides', $item->ID)): ?>
										<a class="btn btn-sm small text-transform-none btn-outline-secondary rounded py-1 px-2" href="<?php echo get_field('publication_slides', $item->ID); ?>"><small>Slides</small></a>
									<?php endif; ?>

									<?php if (get_field('publication_talk', $item->ID)): ?>
										<a class="btn btn-sm small text-transform-none btn-outline-secondary rounded py-1 px-2" href="<?php echo get_field('publication_talk', $item->ID); ?>"><small>Talk</small></a>
									<?php endif; ?>

									<?php if (get_field('publication_code', $item->ID)): ?>
										<a class="btn btn-sm small text-transform-none btn-outline-secondary rounded py-1 px-2" href="<?php echo get_field('publication_code', $item->ID); ?>"><small>Code</small></a>
									<?php endif; ?>

									<?php if (get_field('publication_other_label', $item->ID) && get_field('publication_other_link', $item->ID)): ?>
										<a class="btn btn-sm small text-transform-none btn-outline-secondary rounded py-1 px-2" href="<?php echo get_field('publication_other_link', $item->ID); ?>"><small><?php echo get_field('publication_other_label', $item->ID); ?></small></a>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

			<?php endforeach; ?>
		<?php endif; ?>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_publication', 'ucfwp_post_list_display_publication', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_publication_after' ) ) {
	function ucfwp_post_list_display_publication_after( $content, $items, $atts ) {
		ob_start();
	?>
	</div>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_publication_after', 'ucfwp_post_list_display_publication_after', 10, 3 );

/**
 *
 * SELECTED PUBLICATION layout
 *
 */

if ( ! function_exists( 'ucfwp_post_list_display_selected_publication_before' ) ) {
	function ucfwp_post_list_display_selected_publication_before( $content, $items, $atts ) {
		ob_start();
	?>
	<div class="">
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_selected_publication_before', 'ucfwp_post_list_display_selected_publication_before', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_selected_publication_title' ) ) {
	function ucfwp_post_list_display_selected_publication_title( $content, $items, $atts ) {
		$formatted_title = '';
		if ( $atts['list_title'] ) {
			$formatted_title = '<h2 class="">' . $atts['list_title'] . '</h2>';
		}
		return $formatted_title;
	}
}

add_filter( 'ucf_post_list_display_selected_publication_title', 'ucfwp_post_list_display_selected_publication_title', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_selected_publication' ) ) {
	function ucfwp_post_list_display_selected_publication( $content, $items, $atts ) {
		if ( ! is_array( $items ) && $items !== false ) { $items = array( $items ); }
		ob_start();
	?>
		<?php if ( $items ): ?>
			<?php
				// Sort each Year group by date
				usort($items, function($a, $b) {
					$first = get_field('publication_month', $a->ID) . ' ' . get_field( 'publication_year', $a->ID );
					$second = get_field('publication_month', $b->ID) . ' ' . get_field( 'publication_year', $b->ID );

					return strtotime($second) <=> strtotime($first);
				});

				// Re-sort by Display Order
				usort($items, function($a, $b) {
					$first = get_field( 'selected_display_order', $a->ID ) ?: 9999;
					$second = get_field( 'selected_display_order', $b->ID ) ?: 9999;

					return ($first <=> $second);
				});
			?>
			<?php foreach ( $items as $index => $item ): ?>
				<div class="row mb-3">
					<div class="col-lg-2 col-md-3 d-flex flex-row justify-content-center align-items-center">
						<div class="font-weight-bold">
							<?php echo get_field( 'publication_journal_abbreviation', $item->ID ); ?>
						</div>
					</div>
					<div class="col-lg-9 col-md-8">
						<div class="w-100">
							<div class="text-primary font-weight-bold" style="font-size: 110%"><?php echo get_field('publication_title', $item->ID); ?></div>
							<div class="font-size-sm font-italic"><?php echo get_field('publication_authors', $item->ID); ?></div>
							<div>
								<h6 class="d-inline"><?php echo get_field('publication_journal', $item->ID); ?></h6>
								<?php if (get_field('publication_month', $item->ID)): ?>
									<?php echo get_field('publication_month', $item->ID); ?>
								<?php endif; ?>
								<?php if (get_field('publication_year', $item->ID)): ?>
									<?php echo get_field('publication_year', $item->ID); ?>
								<?php endif; ?>
							</div>
						</div>
						<div class="w-100 pl-3 pt-1 text-left">
							<?php if (get_field('publication_pdf', $item->ID)): ?>
								<a class="btn btn-sm small text-transform-none btn-outline-secondary rounded py-1 px-2" href="<?php echo get_field('publication_pdf', $item->ID); ?>">PDF</a>
							<?php endif; ?>

							<?php if (get_field('publication_slides', $item->ID)): ?>
								<a class="btn btn-sm small text-transform-none btn-outline-secondary rounded py-1 px-2" href="<?php echo get_field('publication_slides', $item->ID); ?>">Slides</a>
							<?php endif; ?>

							<?php if (get_field('publication_talk', $item->ID)): ?>
								<a class="btn btn-sm small text-transform-none btn-outline-secondary rounded py-1 px-2" href="<?php echo get_field('publication_talk', $item->ID); ?>">Talk</a>
							<?php endif; ?>

							<?php if (get_field('publication_code', $item->ID)): ?>
								<a class="btn btn-sm small text-transform-none btn-outline-secondary rounded py-1 px-2" href="<?php echo get_field('publication_code', $item->ID); ?>">Code</a>
							<?php endif; ?>

							<?php if (get_field('publication_other_label', $item->ID) && get_field('publication_other_link', $item->ID)): ?>
								<a class="btn btn-sm small text-transform-none btn-outline-secondary rounded py-1 px-2" href="<?php echo get_field('publication_other_link', $item->ID); ?>"><?php echo get_field('publication_other_label', $item->ID); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php else: ?>
		<div class="ucf-post-list-error mb-4">No results found.</div>
		<?php endif; ?>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_selected_publication', 'ucfwp_post_list_display_selected_publication', 10, 3 );


if ( ! function_exists( 'ucfwp_post_list_display_selected_publication_after' ) ) {
	function ucfwp_post_list_display_selected_publication_after( $content, $items, $atts ) {
		ob_start();
	?>
	</div>
	<?php
		return ob_get_clean();
	}
}

add_filter( 'ucf_post_list_display_selected_publication_after', 'ucfwp_post_list_display_selected_publication_after', 10, 3 );
