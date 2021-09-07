<?php get_header(); the_post(); ?>

<article class="<?php echo $post->post_status; ?> post-list-item">
	<div class="container mt-4 mt-sm-5 mb-5 pb-sm-4">
		<div class="row">
			<?php if ($url = get_the_post_thumbnail_url($post->ID)): ?>
				<div class="col-lg-4 col-md-5">
					<img class="img-fluid rounded box-shadow-soft" src="<?php echo $url; ?>">
				</div>
			<?php endif; ?>
			<div class="col">
				<h2 class="h3">
					<?php the_title(); ?>
				</h2>
				<div class="mb-1">
					<?php get_news_icon( $post->ID ); ?>
				</div>
				<div class="meta">
					<span class="date text-muted text-uppercase letter-spacing-3"><?php the_time( 'F j, Y' ); ?></span>
				</div>
				<?php if ( get_field('news_article_link', $post->ID) ): ?>
					<a class="pl-1" href="<?php echo get_field('news_article_link', $item->ID); ?>" target="_blank"><i class="fas fa-external-link-alt"></i> External Article Link</a>
				<?php endif; ?>
				<hr>
				<?php the_content(); ?>
			</div>
	</div>
</article>

<?php get_footer(); ?>
