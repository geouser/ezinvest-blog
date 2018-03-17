<?php 
/**
 * Template name: Blog archive page
 *
 * @package WordPress
 * @subpackage EZInvest_Blog
 * @since EZInvest Blog 1.0
 */
    
    get_header();

?>


        <?php global $wp_query; ?>


        <?php get_template_part('template-parts/content', 'heading'); ?>
        


        <div class="news-grid">
            
            <div class="container">

                <?php get_template_part('template-parts/content', 'loop'); ?>

            </div>

        </div> <!-- end news-grid -->



<?php get_footer(); ?>