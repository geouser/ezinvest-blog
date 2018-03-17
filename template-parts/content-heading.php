<div class="archive-header">
    <div class="container">
        <div class="ah-title">
        	<?php 
        		$page_title = '';

        		if ( is_home() ) {
        			$page_title = get_the_title( get_option('page_for_posts') );
        		} elseif ( is_category() ) {
        			$category = get_category( get_query_var( 'cat' ) );
					$cat_id = $category->cat_ID;
        			$page_title = get_cat_name( $cat_id );
        		} elseif ( is_search() ) {
        			$page_title = 'Search results for: ' . get_search_query();
        		}
        	?>
            <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"><span><?php echo $page_title; ?></span></h1>

            <?php if ( $wp_query->max_num_pages > 0 ) : ?>
            	<span class="pre-title wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" style="display: block;">Showing page <?php echo max( 1, get_query_var('paged') ); ?> of <?php echo $wp_query->max_num_pages; ?></span>
        	<?php endif; ?>
        </div>
    </div>
</div> <!-- end blog-header -->