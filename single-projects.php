<?php get_header(); the_post(); ?>

<article class="<?php echo $post->post_status; ?> project">
	<div class="container mt-4 mt-sm-5 mb-5 pb-sm-4">
		<h1 class="mb-3"><?php echo get_field('project_name', $post->ID); ?></h1>

		<?php if (get_field('project_photo', $post->ID)): ?>
			<div class="hidden-lg-up">
				<img class="img-fluid mb-3 rounded box-shadow-soft" src="<?php echo get_field('project_photo', $post->ID); ?>">
			</div>

			<img class="float-right hidden-md-down rounded ml-3 mb-3 box-shadow-soft" style="width: 30%" src="<?php echo get_field('project_photo', $post->ID); ?>">
		<?php endif; ?>

		<div class="font-size-lg">
			<?php echo get_field('project_description', $post->ID); ?>
		</div>

		<?php if ( get_field('project_team_members', $post->ID)): ?>
			<div class="mt-5">
				<h3>Team Members</h3>
				<hr>
				<div class="ucf-post-list ucfwp-post-list-people">
					<ul class="list-unstyled row ucf-post-list-items">
						<?php foreach( get_field('project_team_members', $post->ID) as $item ): ?>
							<?php $is_content_empty = !get_field('person_bio', $item->ID); ?>
								<li class="col-6 col-sm-4 col-md-3 col-lg-2 mt-3 mb-2 ucf-post-list-item">
									<?php if (!$is_content_empty) { ?>
										<a class="person-link wrapper-link" href="<?php echo get_permalink($item->ID); ?>">
										<?php } ?>
										<?php echo ucfwp_get_person_thumbnail($item); ?>
										<div class="pl-2 pt-1">
											<h6 class="mb-1"><?php echo ucfwp_get_person_name($item); ?></h6>
											<?php if ($job_title = get_field('person_role', $item->ID)) : ?>
												<div class="font-italic font-85">
													<?php echo $job_title; ?>
												</div>
											<?php endif; ?>
											<?php if ($email = get_field('person_email', $item->ID)) : ?>
												<div class="font-85">
													<?php if ($is_content_empty) { ?>
														<a href="mailto:<?php echo $email; ?>">
														<?php } ?>
														<?php echo $email; ?>
														<?php if ($is_content_empty) { ?>
														</a>
													<?php } ?>
												</div>
											<?php endif; ?>
											<?php if ($phone = get_field('person_phone', $item->ID)) : ?>
												<div class="person-job-title">
													<?php echo $phone; ?>
												</div>
											<?php endif; ?>
										</div>
										<?php if (!$is_content_empty) { ?>
										</a>
									<?php } ?>
								</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( get_field('project_publications', $post->ID)): ?>
			<div class="mt-5">
				<h3>Publications</h3>
				<hr>
			<?php
				// Group publications by year
				$grouped = [];

				foreach ( get_field('project_publications', $post->ID) as $item ) {
					$year = get_field('publication_year', $item->ID);
					$grouped[$year][] = $item;
				}
			?>

			<?php foreach($grouped as $year => $yearItems): ?>
				<h4><?php echo $year; ?></h4>

				<div class="mb-4">
					<?php foreach ( $yearItems as $index => $item ): ?>
						<div class="pl-3 d-flex flex-column align-content-start">
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
							<div class="w-100 pl-3 text-left">
								<?php if (get_field('publication_pdf', $item->ID)): ?>
									<a class="text-complementary px-1" href="<?php echo get_field('publication_pdf', $item->ID); ?>">
										<i class="far fa-file-pdf fa-lg text-shadow-soft"></i>
									</a>
								<?php endif; ?>

								<?php if (get_field('publication_slides', $item->ID)): ?>
									<a class="text-complementary px-1" href="<?php echo get_field('publication_slides', $item->ID); ?>">
										<i class="fas fa-file-powerpoint fa-lg text-shadow-soft"></i>
									</a>
								<?php endif; ?>

								<?php if (get_field('publication_talk', $item->ID)): ?>
									<a class="text-complementary px-1" href="<?php echo get_field('publication_talk', $item->ID); ?>">
										<i class="fab fa-youtube-square fa-lg text-shadow-soft"></i>
									</a>
								<?php endif; ?>

								<?php if (get_field('publication_code', $item->ID)): ?>
									<a class="text-complementary px-1" href="<?php echo get_field('publication_code', $item->ID); ?>">
										<i class="fab fa-github-square fa-lg text-shadow-soft"></i>
									</a>
								<?php endif; ?>

								<?php if (get_field('publication_other_label', $item->ID) && get_field('publication_other_link', $item->ID)): ?>
									<a class="text-complementary px-1" href="<?php echo get_field('publication_other_link', $item->ID); ?>">
										<i class="fas fa-link text-shadow-soft"></i> <?php echo get_field('publication_other_label', $item->ID); ?>
									</a>
								<?php endif; ?>
							</div>
						</div>

						<?php if ($index != 0 && $index != (count($yearItems) - 1)): ?>
							<hr>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</article>

<?php get_footer(); ?>
