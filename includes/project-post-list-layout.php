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

		$stringLimit = 10000;

		if ( is_front_page() ) {
			$stringLimit = 200;
		}
	?>
		<?php if ( $items ): ?>
			<div class="py-2">
				<?php foreach ( $items as $item ):
					$publications = get_field( 'project_publications', $item->ID );
					$team = get_field( 'project_team_members', $item->ID );
					?>
					<a class="wrapper-link" href="<?php echo get_permalink($item->ID); ?>">
						<div class="row justify-content-center mb-4">
							<div class="col-lg-4 col-md-8">
								<?php if (get_field('project_photo', $item->ID)): ?>
									<img class="img-fluid rounded" src="<?php echo get_field('project_photo', $item->ID); ?>">
								<?php endif; ?>
							</div>

							<div class="col-lg-8">
								<h4 class="wrapper-heading pt-3 pt-lg-0"><?php echo get_field('project_name', $item->ID); ?></h4>
								<hr>
								<div class="font-size-sm text-secondary">
									<?php
										if ( get_field('project_summary', $item->ID) ) {
											echo get_field('project_summary', $item->ID);
										} else {
											$description = substr(get_field('project_description', $item->ID), 0, $stringLimit);

											if ($stringLimit == 200) {
												$description .= '...';
											}
											echo $description;
										}

									?>
								</div>

								<?php if ( $team ): ?>
									<div class="font-size-sm mb-1">
										<div class="d-inline text-secondary">Team Members:</div>
										<?php foreach ( $team as $index => $member ): ?>
											<span class="text-secondary">
												<?php echo $member->post_title; ?>
												<?php if ($index != ( count($team) - 1 ) ): ?>
													,
												<?php endif; ?>
											</span>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
								<?php if ( $publications ): ?>
									<div class="font-size-sm text-secondary mb-3">
										<p class="font-weight-bold mb-1">Related Publications:</p>
										<div class="pl-3 w-75">
											<?php foreach ( $publications as $index => $publication ): ?>
												<div class="small">
													<span class=""><?php echo get_field('publication_title', $publication->ID); ?></span>,
													<span class="font-italic"><?php echo get_field('publication_authors', $publication->ID); ?></span>,
													<span>
														<span class="d-inline"><?php echo get_field('publication_journal', $publication->ID); ?></span>
														<?php if (get_field('publication_month', $publication->ID)): ?>
															<?php echo get_field('publication_month', $publication->ID); ?>
														<?php endif; ?>
														<?php if (get_field('publication_year', $publication->ID)): ?>
															<?php echo get_field('publication_year', $publication->ID); ?>
														<?php endif; ?>
													</span>
												</div>
												<?php if ($index != ( count($publications) - 1 ) ): ?>
													<hr class="my-1">
												<?php endif; ?>
											<?php endforeach; ?>
										</div>
									</div>
								<?php endif; ?>
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