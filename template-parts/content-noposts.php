<div class="empty">

	<?php if ( is_404() ) : ?>
		<p class="code">404</p>
	<?php endif; ?>

	<img src="<?php echo get_template_directory_uri(); ?>/images/illo--search-empty.svg" alt="">
	<p><?php ez__e('It seems we can\'t find what you\'re looking for.'); ?></p>

</div>