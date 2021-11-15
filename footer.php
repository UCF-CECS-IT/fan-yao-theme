</div>
		</main>

		<?php if ( is_front_page() ): ?>
			<footer>
				<div class="container text-center">
					<!-- <h3 class="bg-primary text-white p-3 mb-2 rounded box-shadow-soft">Research Supported By</h3> -->
					<h3>Research Supported By</h3>
					<hr>
					<p>Our research is funded by the generous support from:</p>
					<div style="height: 7rem;">
						<img height="100%" width="auto" class="d-inline mr-3" src="<?php echo THEME_IMG_URL . '/NSF.png'; ?>">
						<img height="100%" width="auto" class="d-inline " src="<?php echo THEME_IMG_URL . '/amazon.png'; ?>">
					</div>
				</div>
			</footer>
		<?php endif; ?>

		<?php wp_footer(); ?>
		<script>
			$('body').scrollspy({ target: '#sticky-nav' });
		</script>
	</body>
</html>
