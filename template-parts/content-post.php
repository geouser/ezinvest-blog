<a href="<?php echo get_permalink(); ?>" class="news-item">
    <figure class="ni-image" style="background-color: <?php the_field('featured_color'); ?>">
        <img src="<?php the_post_thumbnail_url( 'blog_thumbnail' ); ?>" alt="">
    </figure>
    <?php 
    	$categories = wp_get_post_terms(get_the_ID(), 'category');
    	$cat_names = array();
    	foreach ($categories as $category) {
    		$cat_names[] = $category->name;
    	}
   	?>
    <div class="ni-text">
    	<?php if ( !empty($cat_names) ) : ?>
        	<span class="ni-category"><?php echo join(', ', $cat_names); ?></span>
    	<?php endif; ?>
        <h2 class="ni-title"><?php the_title(); ?></h2>
    </div>
</a>