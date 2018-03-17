<?php 
/**
 * Basic template to display single post
 *
 * @package WordPress
 * @subpackage EZInvest_Blog
 * @since EZInvest Blog 1.0
 */
    
    get_header();

?>


        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : ?>
                <?php the_post(); ?>

                    <div class="blog-header" style="background: <?php the_field('featured_color'); ?> url(<?php the_post_thumbnail_url( 'blog_thumbnail' ); ?>) no-repeat center bottom;">
                        <div class="container">
                            <div class="bh-title">
                                <h1 class="wow fadeIn" style="visibility:hidden" data-wow-duration="2s" data-wow-delay=".2s"><?php the_title(); ?></h1>
                                <?php 
                                    $is_author = get_field('show_author');
                                    $is_date = get_field('show_date');

                                    $sub_title = '';

                                    if ( $is_author && $is_date ) {
                                        $sub_title = get_the_author_meta( 'display_name' ) . ' | ' . get_the_date('F j, Y');
                                    } else if ( $is_author ) {
                                        $sub_title = get_the_author_meta( 'display_name' );
                                    } else if ( $is_date ) {
                                        $sub_title = get_the_date('F j, Y');
                                    }
                                ?>
                                <?php if ($sub_title) : ?>
                                    <span class="sub-title wow fadeInUp" style="visibility:hidden" data-wow-duration="1s" data-wow-delay=".4s"><?php echo $sub_title; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div> <!-- end blog-header -->


                    <style>
                        .article>p:first-child:first-letter {
                            color: <?php the_field('featured_color'); ?>;
                        }
                    </style>
   

                    <section class="post-content" id="post-content">
                        <div class="container-small">
                            
                            <?php get_template_part('template-parts/content', 'share'); ?>

                            <article class="article wow fadeIn" data-wow-duration="2s" data-wow-delay="1s" style="visibility:hidden">

                                <?php the_content(); ?>

                            </article>  
                        </div>
                    </section>

            <?php endwhile; ?>
        <?php endif; ?>

        
        <?php /* ?>
        <section class="related-articles">
            <div class="container-small">
                <div class="ra-title">
                    <span>RECOMMENDED ARTICLES</span>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="blog-inner.html" class="news-item">
                            <figure class="ni-image">
                                <img src="images/1-4-01.png" alt="">
                            </figure>
                            <div class="ni-text">
                                <span class="ni-category">Product</span>
                                <h2 class="ni-title">5 Ways Your Small Business Can Impress First-Time Customers</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="blog-inner.html" class="news-item">
                            <figure class="ni-image">
                                <img src="images/1-4-01.png" alt="">
                            </figure>
                            <div class="ni-text">
                                <span class="ni-category">Product</span>
                                <h2 class="ni-title">5 Ways Your Small Business Can Impress First-Time Customers</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="blog-inner.html" class="news-item">
                            <figure class="ni-image">
                                <img src="images/1-4-01.png" alt="">
                            </figure>
                            <div class="ni-text">
                                <span class="ni-category">Product</span>
                                <h2 class="ni-title">5 Ways Your Small Business Can Impress First-Time Customers</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="blog-inner.html" class="news-item">
                            <figure class="ni-image">
                                <img src="images/1-4-01.png" alt="">
                            </figure>
                            <div class="ni-text">
                                <span class="ni-category">Product</span>
                                <h2 class="ni-title">5 Ways Your Small Business Can Impress First-Time Customers</h2>
                            </div>
                        </a>
                    </div>
                </div>    
            </div>
            
        </section> <!-- end related-articles -->


        <section class="related-articles">
            <div class="container-small">
                <div class="ra-title">
                    <span>MOST POPULAR</span>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="blog-inner.html" class="news-item">
                            <figure class="ni-image">
                                <img src="images/1-4-01.png" alt="">
                            </figure>
                            <div class="ni-text">
                                <span class="ni-category">Product</span>
                                <h2 class="ni-title">5 Ways Your Small Business Can Impress First-Time Customers</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="blog-inner.html" class="news-item">
                            <figure class="ni-image">
                                <img src="images/1-4-01.png" alt="">
                            </figure>
                            <div class="ni-text">
                                <span class="ni-category">Product</span>
                                <h2 class="ni-title">5 Ways Your Small Business Can Impress First-Time Customers</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="blog-inner.html" class="news-item">
                            <figure class="ni-image">
                                <img src="images/1-4-01.png" alt="">
                            </figure>
                            <div class="ni-text">
                                <span class="ni-category">Product</span>
                                <h2 class="ni-title">5 Ways Your Small Business Can Impress First-Time Customers</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="blog-inner.html" class="news-item">
                            <figure class="ni-image">
                                <img src="images/1-4-01.png" alt="">
                            </figure>
                            <div class="ni-text">
                                <span class="ni-category">Product</span>
                                <h2 class="ni-title">5 Ways Your Small Business Can Impress First-Time Customers</h2>
                            </div>
                        </a>
                    </div>
                </div>   
            </div>
            
        </section> <!-- end related-articles -->

        <?php */ ?>


        
        <?php $post_author = get_the_author_meta( 'ID' ); ?>

        <?php if ( get_field('show_author') ) : ?>
            <section class="about-author">
                <div class="container-small">
                    <div class="author-info">
                        <?php $author_image = get_field('author_picture', 'user_' . $post_author ); ?>
                        <figure class="ai-image">
                            <img src="<?php echo $author_image['sizes']['thumbnail']; ?>" alt="">
                        </figure>
                        <div class="ai-content">
                            <?php the_field( 'author_info', 'user_' . $post_author ); ?>
                        </div>
                    </div>
                </div>
            </section> <!-- end about-author -->
        <?php endif; ?>



        <?php get_template_part('template-parts/content', 'promo'); ?>



<?php get_footer(); ?>