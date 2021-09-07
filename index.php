<?php get_header(); ?>

<div class="container mt-4 mb-5 pb-sm-4">
	<?php if ( have_posts() ): ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<article class="<?php echo $post->post_status; ?> post-list-item mb-4">
			<div class="row">
				<div class="col">
					<div class="d-flex flex-row justify-content-between">
						<h2 class="h3">
							<?php the_title(); ?>
							<!-- <a href="<?php the_permalink(); ?>"></a> -->
						</h2>
						<div>
							<?php get_news_icon( $post->ID ); ?>
						</div>
					</div>
					<div class="w-100 d-flex flex-row justify-content-between align-items-center mb-1">
							<?php if ( get_field('news_article_link', $item->ID) ): ?>
								<a class="pl-1" href="<?php echo get_field('news_article_link', $item->ID); ?>" target="_blank"><i class="fas fa-external-link-alt"></i> External Article Link</a>
							<?php else: ?>
								<span></span>
							<?php endif; ?>
						<div class="meta">
							<span class="date text-muted text-uppercase letter-spacing-3"><?php the_time( 'F j, Y' ); ?></span>
						</div>
					</div>
					<div class="summary">
						<?php the_content(); ?>
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
	<?php else: ?>
		<p>No results found.</p>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
