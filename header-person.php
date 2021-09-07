<!DOCTYPE html>
<html lang="en-us">

<head>
	<?php wp_head(); ?>
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
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav ml-auto">
					<a class="nav-item nav-link" href="<?php echo get_bloginfo('url'); ?>">Home</a>
					<a class="nav-item nav-link" href="<?php echo get_bloginfo('url'); ?>#projects">Projects</a>
					<a class="nav-item nav-link" href="<?php echo get_bloginfo('url'); ?>#publications">Publications</a>
					<a class="nav-item nav-link" href="<?php echo get_bloginfo('url'); ?>#team">Team</a>
					<a class="nav-item nav-link" href="<?php echo get_bloginfo('url'); ?>/news">News</a>
				</div>
			</div>
		</div>
	</nav>

	<main class="site-main">
		<div class="site-content" id="content" tabindex="-1">

