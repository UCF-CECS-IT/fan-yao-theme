<?php get_header();
the_post(); ?>

<article class="<?php echo $post->post_status; ?> post-list-item">
	<div class="container mt-4 mt-sm-5 mb-5 pb-sm-4">
		<div class="row">
			<div class="col-lg-2 col-md-4 d-flex flex-column justify-content-center">
				<img class="img-fluid w-100 rounded-circle box-shadow-soft" src="<?php echo get_the_post_thumbnail_url($post) ?: THEME_STATIC_URL . '/img/person-no-photo.png'; ?>">
			</div>

			<div class="col-lg-10 col-md-8">
				<div class="row">
					<div class="col-lg-5">
						<h2 class=""><?php echo ucfwp_get_person_name($post); ?></h2>
						<?php if (get_field('person_role', $post->ID)) : ?>
							<h5 class="text-muted letter-spacing-1 font-weight-normal">
								<?php echo get_field('person_role', $post->ID); ?>
							</h5>
							<p class="text-muted text-uppercase font-85">
								Department of Electrical and Computer Engineering<br>University of Central Florida
							</p>
						<?php endif; ?>

						<div class="row">
							<div class="col-lg-7">
								<div class="row">
									<?php if (get_field('person_email', $post->ID)) : ?>
										<div class="col-3 small">
											<a href="mailto:<?php echo get_field('person_email', $post->ID); ?>">
												<span class="fa-stack fa-2x hover-parent">
													<i class="text-primary fas fa-circle fa-stack-2x text-shadow-soft"></i>
													<i class="text-white fas fa-envelope fa-stack-1x fa-inverse "></i>
												</span>
											</a>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<?php if (get_field('person_bio', $post->ID)) : ?>
							<h5>Bio</h5>
							<hr>
							<p class="">
								<?php echo get_field('person_bio', $post->ID); ?>
							</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>

<?php get_footer(); ?>
