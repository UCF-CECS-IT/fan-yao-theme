<?php $menu = wp_nav_menu( array(
	'container'       => 'div',
	'container_class' => 'collapse navbar-collapse',
	'container_id'    => 'header-menu',
	'depth'           => 2,
	'echo'            => false,
	'fallback_cb'     => 'bs4Navwalker::fallback',
	'menu_class'      => 'nav navbar-nav ml-md-auto',
	'theme_location'  => 'header-menu',
	'walker'          => new bs4Navwalker()
) );

?>

<!DOCTYPE html>
<html lang="en-us">
	<head>
		<?php wp_head(); ?>
		<title><?php echo get_bloginfo( 'name' ); ?></title>
	</head>
	<body ontouchstart class="position-relative" data-spy="scroll" data-target="#sticky-nav">
		<!-- <a class="skip-navigation bg-complementary text-inverse box-shadow-soft" href="#content">Skip to main content</a> -->
		<div id="ucfhb"></div>
		<nav id="sticky-nav" class="navbar navbar-toggleable-lg sticky-top navbar-light bg-faded box-shadow-soft">
			<div class="container">
				<a class="navbar-brand" href="<?php echo get_bloginfo('url'); ?>">
					<?php echo get_bloginfo('name'); ?>
				</a>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<?php echo $menu; ?>
			</div>
		</nav>

		<?php if ( get_field( 'show_bio' ) ): ?>
			<header class="site-header" aria-label="Site header">
				<div class="container pt-3">
					<h2 class="">Principal Investigator</h2>
					<div class="row mb-3">
						<div class="col-lg-2 col-md-4 d-flex flex-column justify-content-center">
							<img class="img-fluid w-100 box-shadow-soft" src="<?php echo get_field('options_photo', 'option'); ?>">
						</div>

						<div class="col-lg-10 col-md-8">
							<div class="row">
								<div class="col-lg-6">
									<h3 class="">Fan Yao</h3>
									<?php if (get_field('options_position', 'option')): ?>
										<h5 class="text-muted letter-spacing-1 font-weight-normal">
											<?php echo get_field('options_position', 'option'); ?>
										</h5>
										<p class="text-muted text-uppercase font-85">
											Department of Electrical and Computer Engineering<br>University of Central Florida
										</p>
									<?php endif; ?>

									<div class="row">
										<div class="col-lg-6">
											<div class="row">
												<?php if (get_field('options_email', 'option')): ?>
													<div class="col-3 small">
														<a href="mailto:<?php echo get_field('options_email', 'option'); ?>">
															<span class="fa-stack fa-2x hover-parent">
																<i class="text-secondary fas fa-circle fa-stack-2x hover-child-dark-purple text-shadow-soft"></i>
																<i class="text-white fas fa-envelope fa-stack-1x fa-inverse "></i>
															</span>
														</a>
													</div>
												<?php endif; ?>

												<?php if (get_field('options_google_scholar', 'option')): ?>
													<div class="col-3 small">
														<a href="<?php echo get_field('options_google_scholar', 'option'); ?>" target="_blank">
															<span class="fa-stack fa-2x hover-parent">
																<i class="text-secondary fas fa-circle fa-stack-2x hover-child-dark-purple text-shadow-soft"></i>
																<i class="text-white fab fa-google fa-stack-1x fa-inverse "></i>
															</span>
														</a>
													</div>
												<?php endif; ?>

												<?php if (get_field('options_researchgate', 'option')): ?>
													<div class="col-3 small">
														<a href="<?php echo get_field('options_researchgate', 'option'); ?>" target="_blank">
															<span class="fa-stack fa-2x hover-parent">
																<i class="text-secondary fas fa-circle fa-stack-2x hover-child-dark-purple text-shadow-soft"></i>
																<i class="text-white fab fa-researchgate fa-stack-1x fa-inverse "></i>
															</span>
														</a>
													</div>
												<?php endif; ?>

												<?php if (get_field('options_github', 'option')): ?>
													<div class="col-3 small">
														<a href="<?php echo get_field('options_github', 'option'); ?>" target="_blank">
															<span class="fa-stack fa-2x hover-parent">
																<i class="text-secondary fas fa-circle fa-stack-2x hover-child-dark-purple text-shadow-soft"></i>
																<i class="text-white fab fa-github fa-stack-1x fa-inverse "></i>
															</span>
														</a>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-6">
									<?php if (get_field('options_short_bio', 'option')): ?>
										<p class="pt-3 font-85"><?php echo get_field('options_short_bio', 'option'); ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>

					<h4 class=""><?php echo get_field('options_lab_name', 'option'); ?></h4>
					<p class="mb-0 pb-0"><?php echo get_field('options_lab_description', 'option'); ?></p>
				</div>
			</header>
		<?php endif; ?>

			<main class="site-main">
				<div class="site-content" id="content" tabindex="-1">
