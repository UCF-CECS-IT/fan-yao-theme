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
					$year = get_field('publication_year', $item->ID);
					$grouped[$year][] = $item;
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

				<?php if ( ( $currentYear - $year ) < 3) :?>

					<!-- Display Individual Date Years -->
					<h4><?php echo $year; ?></h4>
					<hr class="mt-1">

					<div class="mb-4">
						<?php foreach ( $yearItems as $index => $item ): ?>
							<div class="pl-3 d-flex flex-column align-content-start mb-2">
								<div class="w-100">
									<div class="text-primary"><?php echo get_field('publication_title', $item->ID); ?></div>
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
										<a class="text-complementary px-1" href="<?php echo get_field('publication_pdf', $item->ID); ?>">
											<i class="far fa-file-pdf fa-1x text-shadow-soft"></i>
										</a>
									<?php endif; ?>

									<?php if (get_field('publication_slides', $item->ID)): ?>
										<a class="text-complementary px-1" href="<?php echo get_field('publication_slides', $item->ID); ?>">
											<i class="fas fa-file-powerpoint fa-1x text-shadow-soft"></i>
										</a>
									<?php endif; ?>

									<?php if (get_field('publication_talk', $item->ID)): ?>
										<a class="text-complementary px-1" href="<?php echo get_field('publication_talk', $item->ID); ?>">
											<i class="fab fa-youtube-square fa-1x text-shadow-soft"></i>
										</a>
									<?php endif; ?>

									<?php if (get_field('publication_code', $item->ID)): ?>
										<a class="text-complementary px-1" href="<?php echo get_field('publication_code', $item->ID); ?>">
											<i class="fab fa-github-square fa-1x text-shadow-soft"></i>
										</a>
									<?php endif; ?>

									<?php if (get_field('publication_other_label', $item->ID) && get_field('publication_other_link', $item->ID)): ?>
										<a class="text-complementary px-1" href="<?php echo get_field('publication_other_link', $item->ID); ?>">
											<i class="fas fa-external-link-alt fa-1x text-shadow-soft"></i> <?php echo get_field('publication_other_label', $item->ID); ?>
										</a>
									<?php endif; ?>
								</div>
							</div>
						<?php endforeach; ?>
					</div>

				<?php else: ?>

					<!-- Display within archive block -->
					<?php if ( $currentYear - $year == 3): // Display Archive header on first archive year ?>
						<h4>Archived Papers</h4>
						<hr class="mt-1">
					<?php endif; ?>

					<?php foreach ( $yearItems as $index => $item ): ?>
						<div class="pl-3 d-flex flex-column align-content-start mb-2">
							<div class="w-100">
								<div class="text-primary"><?php echo get_field('publication_title', $item->ID); ?></div>
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
									<a class="text-complementary px-1" href="<?php echo get_field('publication_pdf', $item->ID); ?>">
										<i class="far fa-file-pdf fa-1x text-shadow-soft"></i>
									</a>
								<?php endif; ?>

								<?php if (get_field('publication_slides', $item->ID)): ?>
									<a class="text-complementary px-1" href="<?php echo get_field('publication_slides', $item->ID); ?>">
										<i class="fas fa-file-powerpoint fa-1x text-shadow-soft"></i>
									</a>
								<?php endif; ?>

								<?php if (get_field('publication_talk', $item->ID)): ?>
									<a class="text-complementary px-1" href="<?php echo get_field('publication_talk', $item->ID); ?>">
										<i class="fab fa-youtube-square fa-1x text-shadow-soft"></i>
									</a>
								<?php endif; ?>

								<?php if (get_field('publication_code', $item->ID)): ?>
									<a class="text-complementary px-1" href="<?php echo get_field('publication_code', $item->ID); ?>">
										<i class="fab fa-github-square fa-1x text-shadow-soft"></i>
									</a>
								<?php endif; ?>

								<?php if (get_field('publication_other_label', $item->ID) && get_field('publication_other_link', $item->ID)): ?>
									<a class="text-complementary px-1" href="<?php echo get_field('publication_other_link', $item->ID); ?>">
										<i class="fas fa-external-link-alt fa-1x text-shadow-soft"></i> <?php echo get_field('publication_other_label', $item->ID); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>

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
				<div class="pl-3 d-flex flex-column align-content-start mb-3">
					<div class="w-100">
						<div class="text-primary"><?php echo get_field('publication_title', $item->ID); ?></div>
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
							<a class="text-complementary px-1" href="<?php echo get_field('publication_pdf', $item->ID); ?>">
								<i class="far fa-file-pdf fa-1x text-shadow-soft"></i>
							</a>
						<?php endif; ?>

						<?php if (get_field('publication_slides', $item->ID)): ?>
							<a class="text-complementary px-1" href="<?php echo get_field('publication_slides', $item->ID); ?>">
								<i class="fas fa-file-powerpoint fa-1x text-shadow-soft"></i>
							</a>
						<?php endif; ?>

						<?php if (get_field('publication_talk', $item->ID)): ?>
							<a class="text-complementary px-1" href="<?php echo get_field('publication_talk', $item->ID); ?>">
								<i class="fab fa-youtube-square fa-1x text-shadow-soft"></i>
							</a>
						<?php endif; ?>

						<?php if (get_field('publication_code', $item->ID)): ?>
							<a class="text-complementary px-1" href="<?php echo get_field('publication_code', $item->ID); ?>">
								<i class="fab fa-github-square fa-1x text-shadow-soft"></i>
							</a>
						<?php endif; ?>

						<?php if (get_field('publication_other_label', $item->ID) && get_field('publication_other_link', $item->ID)): ?>
							<a class="text-complementary px-1" href="<?php echo get_field('publication_other_link', $item->ID); ?>">
								<i class="fas fa-external-link-alt fa-1x text-shadow-soft"></i> <?php echo get_field('publication_other_label', $item->ID); ?>
							</a>
						<?php endif; ?>
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
