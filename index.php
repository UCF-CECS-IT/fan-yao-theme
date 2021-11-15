<?php get_header(); ?>

<div class="container mt-4 mb-5 pb-sm-4">
	<?php if ( have_posts() ): ?>
		<div class="list-group list-group-flush">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="<?php echo $post->post_status; ?> post-list-item list-group-item ">
					<div class="row">
						<div class="col">
							<div class="w-100 d-flex flex-row justify-content-between align-items-top font-size-sm mb-1">
								<div class="pointer-events-none no-underline text-secondary pr-2" style="font-size: 85%;">
									<?php echo $post->post_content; ?>
								</div>
								<div>
									<?php get_news_icon( $post->ID ); ?>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-4">
							<?php if ($url = get_the_post_thumbnail_url($post->ID)): ?>
								<img class="img-fluid rounded box-shadow-soft" src="<?php echo $url; ?>">
							<?php endif; ?>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
	<?php else: ?>
		<p>No results found.</p>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
