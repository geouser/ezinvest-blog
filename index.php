<?php 
/**
 * Template name: Front page
 *
 * @package WordPress
 * @subpackage EZInvest_Blog
 * @since EZInvest Blog 1.0
 */
    
    get_header();

?>


        
        <?php

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 1,
                'meta_query'    => array(
                    array(
                        'key'       => 'is_featured',
                        'value'     => '1',
                        'compare'   => '=',
                    ),
                ),
            );

            $query = new WP_Query($args);

        ?>

        <?php if ( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : ?>
                <?php $query->the_post(); ?>
                <div class="blog-header" style="background: <?php the_field('featured_color'); ?> url(<?php the_post_thumbnail_url( 'blog_thumbnail' ); ?>) no-repeat center bottom;">
                    <div class="container">
                        <a href="<?php echo get_permalink(); ?>" class="bh-title link">
                            <span style="visibility:hidden" class="pre-title wow fadeInDown" data-wow-duration="1s">Featured article</span>
                            <h1 style="visibility:hidden" class="wow fadeIn" data-wow-duration="2s" data-wow-delay=".2s"><span><?php the_title(); ?></span></h1>
                        </a>
                    </div>
                </div> <!-- end blog-header -->
            <?php endwhile; ?>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>



        <?php /* ?>
        <div class="categories-menu"></div> <!-- end categories menu -->
        <?php */ ?>


        
        <div class="tv-widget-ticker disabled">

            <!-- TradingView Widget BEGIN -->
            <style>
                .tv-widget-ticker {
                    border-bottom: 1px solid #e4e6ea;
                    background-color: #FFF;
                }
                .tv-widget-ticker > div > span {
                    display: none!important;
                }
                .tv-widget-ticker > div {
                    height: auto!important;
                }

                .tv-widget-ticker > div iframe {
                    height: 70px!important;
                    display: block!important;
                }
            </style>
            <span id="tradingview-copyright" style="display: none;">
                <a ref="nofollow noopener" target="_blank" href="http://www.tradingview.com" style="color: rgb(173, 174, 176); font-family: &quot;Trebuchet MS&quot;, Tahoma, Arial, sans-serif; font-size: 13px;">Quotes by <span style="color: #3BB3E4">TradingView</span>
                </a>
            </span>
            <script src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js">{
              "symbols": [
                {
                  "description": "BTC/USD",
                  "proName": "BITSTAMP:BTCUSD"
                },
                {
                  "description": "XRP/USD",
                  "proName": "BITSTAMP:XRPUSD"
                },
                {
                  "description": "EUR/USD",
                  "proName": "FX_IDC:EURUSD"
                },
                {
                  "description": "GBP/USD",
                  "proName": "FX_IDC:GBPUSD"
                },
                {
                  "description": "DAX",
                  "proName": "INDEX:DAX"
                },
                {
                  "description": "S&P 500",
                  "proName": "SP:SPX"
                },
                {
                  "description": "Gold",
                  "proName": "FX_IDC:XAUUSD"
                },
                {
                  "description": "Crude Oil",
                  "proName": "TVC:UKOIL"
                }
              ],
              "locale": "en"
            }</script>
            <!-- TradingView Widget END -->

        </div> <!-- end tv-widget-ticker -->
        
        

        <?php 
            $args = array(
                'post_type' => 'post'
            );

            $p_query = new WP_Query($args);
        ?>
        <div class="news-grid">
            
            <div class="container">

                <?php if ( $p_query->have_posts() ) : $count = 0;?>
                    <div class="row news-row">
                        <?php while ( $p_query->have_posts() ) : ?>
                            <?php $p_query->the_post(); ?>
                            <div style="visibility:hidden" class="col-12 col-sm-6 col-xl-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".<? echo $count;?>s">
                                
                                <?php get_template_part('template-parts/content', 'post'); ?>
                                
                            </div>
                        <?php if ($count===2) {$count = 0;} else {$count++;} endwhile; ?>
                    </div> <!-- end news-row --> 
                <?php endif; ?>

                <div class="simple-pagination wow fadeIn">
                    <?php if ( $p_query->max_num_pages > 1 ) : ?>
                        <?php 
                            $archive_url = get_permalink( get_option('page_for_posts') );
                            $archive_url_paged = add_query_arg( array(
                                'paged' => 2
                            ), $archive_url );
                        ?>
                        <a href="<?php echo $archive_url_paged; ?>" class="btn btn-default">Older posts</a>
                    <?php endif; ?>
                    <a href="<?php echo $archive_url; ?>" class="btn btn-default">All posts</a>
                </div>
                
            </div>

        </div> <!-- end news-grid -->

        <?php wp_reset_postdata(); ?>



<?php get_footer(); ?>