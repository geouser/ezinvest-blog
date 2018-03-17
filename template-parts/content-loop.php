<?php if ( have_posts() ) : $count = 0;?>
    <div class="row news-row">
        <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>
            <div style="visibility:hidden" class="col-12 col-sm-6 col-xl-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".<? echo $count;?>s">
                
                <?php get_template_part('template-parts/content', 'post'); ?>
                
            </div>
        <?php if ($count===2) {$count = 0;} else {$count++;} endwhile; ?>
    </div> <!-- end news-row --> 
                
    <?php if ( get_next_posts_link() || get_previous_posts_link() ) : ?>
        <div class="pagination wow fadeIn">
            <?php 
                
                $big = 999999999; // need an unlikely integer

                echo paginate_links( array(
                    'base'              => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format'            => '?paged=%#%',
                    'current'           => max( 1, get_query_var('paged') ),
                    'total'             => $wp_query->max_num_pages,
                    'prev_text'         => ez__('Previous'),
                    'next_text'         => ez__('Next'),
                ) );
            ?>
        </div>
    <?php endif; ?>

<?php else: ?>

    <?php get_template_part('template-parts/content', 'noposts'); ?>
    
<?php endif; ?>