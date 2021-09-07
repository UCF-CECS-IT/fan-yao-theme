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

		<main class="site-main">
			<div class="site-content" id="content" tabindex="-1">
