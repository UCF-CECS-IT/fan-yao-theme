<?php
get_header();
the_post();

$background = get_field( 'background_image', $post->ID );

?>

<article class="<?php echo $post->post_status; ?> post-list-item">
	<!-- Photo background heading -->
	<div class="bg-inverse">

	<?php if ( $background ): ?>
		<div class="media-background-container">
			<img class="media-background object-fit-cover reduce-brightness" src="<?php echo $background; ?>">
	<?php endif; ?>

			<div class="container py-5 text-shadow-soft">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<?php the_content(); ?>
					</div>
				</div>
			</div>

	<?php if ( $background ): ?>
		</div>
	<?php endif; ?>

	</div>

	<!-- Automated items -->
	<div class="container mt-4 mt-sm-5 mb-5 pb-sm-4">
		<h3 class="text-center mb-2">Talks and Demos</h3>
		<hr class="bg-primary mt-1 mb-4">
		<?php echo do_shortcode( '[ucf-post-list layout="talk" post_type="talk" posts_per_page="-1" order="ASC" orderby="meta_value" meta_key="talk_display_order"]' ); ?>

		<div class="row mt-4">
			<div class="col-lg-6 mb-4">
				<div class="" id="selected-publications">
					<h3 class="mb-2">Selected Publications</h3>
					<hr class="bg-primary">
					<?php echo do_shortcode( '[ucf-post-list layout="selected_publication" post_type="publications" taxonomy="selected-publications" tax_selected_publications__field="slug" tax_selected_publications="selected" posts_per_page="-1" order="ASC"][/ucf-post-list]' ); ?>
				</div>
			</div>

			<div class="col-lg-6 mb-4">
				<h3 class="mb-2">News</h3>
				<hr class="bg-primary">
				<?php echo do_shortcode( '[ucf-post-list layout="news" post_type="post" posts_per_page="6"][/ucf-post-list]' ); ?>
				<p class="text-center">
					<a href="news" class="btn btn-complementary btn-sm box-shadow rounded">More</a>
				</p>
			</div>
		</div>
	</div>
</article>

<?php get_footer(); ?>
