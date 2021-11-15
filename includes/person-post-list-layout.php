<?php

if ( ! function_exists( 'ucfwp_post_list_sc_atts' ) ) {
	function ucfwp_post_list_sc_atts( $atts, $layout ) {
		if ( $layout === 'news' ) {
			// Create new `show_subhead` attribute to
			// toggle the post's subhead text
			$atts['show_subhead'] = false;

			// Create new `show_excerpt` attribute that toggles
			// the post's excerpt display
			$atts['show_excerpt'] = true;

			// Force a sane posts_per_row value, since these
			// lists are more horizontal
			$atts['posts_per_row'] = 1;
		}

		return $atts;
	}
}

add_filter( 'ucf_post_list_get_sc_atts', 'ucfwp_post_list_sc_atts', 10, 2 );

if ( ! function_exists( 'ucfwp_get_person_name' ) ) {
	function ucfwp_get_person_name( $post ) {
		if ( ! $post->post_type == 'person' ) { return; }
		$prefix = get_field( 'person_title_prefix', $post->ID ) ?: '';
		$suffix = get_field( 'person_title_suffix', $post->ID ) ?: '';
		if ( $prefix ) {
			$prefix = trim( $prefix ) . ' ';
		}
		if ( $suffix && substr( $suffix, 0, 1 ) !== ',' ) {
			$suffix = ' ' . trim( $suffix );
		}
		return wptexturize( $prefix . $post->post_title . $suffix );
	}
}

if ( ! function_exists( 'ucfwp_get_person_thumbnail' ) ) {
	function ucfwp_get_person_thumbnail( $post, $css_classes='' ) {
		if ( ! $post->post_type == 'person' ) { return; }
		$thumbnail = get_the_post_thumbnail_url( $post ) ?: THEME_STATIC_URL . '/img/person-no-photo.png';
		// Account for attachment ID being returned by get_theme_mod_or_default():
		if ( is_numeric( $thumbnail ) ) {
			$thumbnail = wp_get_attachment_url( $thumbnail );
		}
		ob_start();
		if ( $thumbnail ):
	?>
		<div class="media-background-container person-photo mx-auto rounded <?php echo $css_classes; ?>">
			<img src="<?php echo $thumbnail; ?>" alt="" class="media-background object-fit-cover">
		</div>
	<?php
		endif;
		return ob_get_clean();
	}
}

function get_person_thumbnail_url( $post ) {
	if ( ! $post->post_type == 'person' ) { return; }

	$thumbnail = get_the_post_thumbnail_url( $post ) ?: THEME_STATIC_URL . '/img/person-no-photo.png';

	// Account for attachment ID being returned by get_theme_mod_or_default():
	if ( is_numeric( $thumbnail ) ) {
		$thumbnail = wp_get_attachment_url( $thumbnail );
	}

	return $thumbnail;
}

function get_alumni_thumbnail( $post ) {
	if ( ! $post->post_type == 'person' ) { return false; }

	$thumbnail = get_the_post_thumbnail_url( $post ) ?: false;

	return $thumbnail;
}

if (class_exists('UCF_People_PostType')) {

	if (!function_exists('ucfwp_post_list_display_people_before')) {
		function ucfwp_post_list_display_people_before($content, $items, $atts) {
			ob_start();
			?>
			<div class="ucf-post-list ucfwp-post-list-people">
			<?php
			return ob_get_clean();
		}
	}

	add_filter('ucf_post_list_display_people_before', 'ucfwp_post_list_display_people_before', 10, 3);


	if (!function_exists('ucfwp_post_list_display_people_title')) {
		function ucfwp_post_list_display_people_title($content, $items, $atts)
		{
			$formatted_title = '';
			if ($atts['list_title']) {
				$formatted_title = '<h2 class="ucf-post-list-title">' . $atts['list_title'] . '</h2>';
			}
			return $formatted_title;
		}
	}

	add_filter('ucf_post_list_display_people_title', 'ucfwp_post_list_display_people_title', 10, 3);


	if (!function_exists('ucfwp_post_list_display_people')) {
		function ucfwp_post_list_display_people($content, $items, $atts) {
			if (!is_array($items) && $items !== false) {
				$items = array($items);
			}

			$alumni = ($atts['tax_people_group'] == 'alumni');

			ob_start();
			?>
			<?php if ($items) :
				$categorized = [
					'PhD Student' => [],
					'Masters Student' => [],
					'Undergraduate Student' => [],
				];

				foreach( $items as $item ) {
					$role = get_field( 'person_role', $item->ID );
					$categorized[$role][] = $item;
				}

				// Alphabetize
				foreach( $categorized as $category => $people ) {
					usort($people, function($a, $b) {
						$first = get_field( 'person_last_name', $a->ID );
						$second = get_field( 'person_last_name', $b->ID );

						return $first <=> $second;
					});

					$categorized[$category] = $people;
				}

				// Display order
				foreach( $categorized as $category => $people ) {
					usort($people, function($a, $b) {
						$first = get_field( 'person_display_order', $a->ID) ?: '9999';
						$second = get_field( 'person_display_order', $b->ID) ?: '9999';

						return $first <=> $second;
					});

					$categorized[$category] = $people;
				}
				?>

				<?php foreach ($categorized as $category => $people) : ?>

					<?php if ( $people ): ?>

						<?php if ( ! $alumni ): ?>
							<!-- <h4 class="heading-underline text-transform-none letter-spacing-1"><?php echo $category; ?></h4> -->
						<?php endif; ?>

						<?php foreach($people as $person): ?>
							<div class="row mb-4">
								<div class="col-lg-2 col-md-3">
									<?php if ( $alumni ): ?>
										<?php if ($thumbnail = get_alumni_thumbnail( $person )): ?>
											<img class="rounded img-fluid" src="<?php echo $thumbnail; ?>">
										<?php endif; ?>
									<?php else: ?>
										<img class="rounded img-fluid" src="<?php echo get_person_thumbnail_url( $person ); ?>">
									<?php endif; ?>
								</div>
								<div class="col-lg-10 col-md-9 pt-2">
									<h4 class="mb-1"><?php echo ucfwp_get_person_name($person); ?></h4>
									<h6 class="text-muted letter-spacing-1 font-weight-normal">
										<?php echo get_field( 'person_role', $person->ID ); ?>
									</h6>
									<?php if ( $email = get_field( 'person_email', $person->ID )): ?>
										<div>
											<span class="fa-stack fa-sm small">
												<i class="text-secondary fas fa-circle fa-stack-2x"></i>
												<i class="text-white fas fa-envelope fa-stack-1x fa-inverse "></i>
											</span>
											<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
										</div>
									<?php endif; ?>

									<?php if ( $link = get_field( 'person_link', $person->ID )): ?>
										<div>
											<span class="fa-stack fa-xs ">
												<i class="text-secondary fas fa-circle fa-stack-2x"></i>
												<i class="text-white fas fa-link fa-stack-1x fa-inverse "></i>
											</span>
											<a href="mailto:<?php echo $link; ?>"><?php echo $link; ?></a>
										</div>
									<?php endif; ?>

									<?php if ($bio = get_field( 'person_bio', $person->ID )): ?>
										<div class="font-size-sm">
											<?php echo $bio; ?>
										</div>
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

				add_filter('ucf_post_list_display_people', 'ucfwp_post_list_display_people', 10, 3);


				if (!function_exists('ucfwp_post_list_display_people_after')) {
					function ucfwp_post_list_display_people_after($content, $items, $atts)
					{
						ob_start();
						?>
			</div>
<?php
			return ob_get_clean();
		}
	}

	add_filter('ucf_post_list_display_people_after', 'ucfwp_post_list_display_people_after', 10, 3);
}
