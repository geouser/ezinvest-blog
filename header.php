<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" >
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php wp_head(); ?>
    </head>

    <body>

        <?php /* ?>
    	<header class="header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-4">
                        <div class="logo-box">
                            <a href="<?php echo home_url(); ?>" class="blog-logo"><img src="<?php echo get_template_directory_uri(); ?>/images/blog-logo.png" alt=""></a>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="header-actions">
                            <a href="#" target="_blank" class="btn btn-green">Open Live</a>
                            <a href="#" target="_blank" class="btn btn-grey">Open Demo</a>
                            <button class="search-btn js-open-search"><img src="<?php echo get_template_directory_uri(); ?>/images/search.svg" alt=""><span>Search</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </header> <!-- end header -->
        <?php */ ?>

        <header class="header header--menu">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="logo-box">
                            <a href="<?php echo home_url(); ?>" class="blog-logo">
                                <?php if ( $header_logo = get_field('header_logo', 'options') ) : ?>
                                    <img src="<?php echo $header_logo['sizes']['medium']; ?>" alt="<?php echo bloginfo('name'); ?>">
                                <?php else : ?>
                                    <?php echo bloginfo('name'); ?>
                                <?php endif; ?>
                            </a>
                        </div>
                    </div>

                    <div class="col-6 col-md-9 col-lg-10">
                        <div class="row row--nm justify-content-between-lg justify-content-end align-items-center">

                            <?php 
                                wp_nav_menu( array(
                                    'menu' => 'header_menu',
                                    'container_class' => 'header-menu',
                                    'theme_location' => 'header_menu',
                                    'container' => 'nav',
                                    'depth' => 2
                                ) )
                            ?>
                            <div class="header-actions">
                                <a href="<?php the_field('open_live_link', 'options'); ?>" class="btn btn-green"><?php ez__e('Open Live');  ?></a>
                                <a href="<?php the_field('open_demo_link', 'options'); ?>" class="btn btn-grey"><?php ez__e('Open Demo'); ?></a>
                                <button class="search-btn js-open-search"><img src="<?php echo get_template_directory_uri(); ?>/images/search.svg" alt=""><span><?php ez__e('Search');  ?></span></button>
                            </div>

                            <button class="hamburger hamburger--spin js-toggle-menu menu-button" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button> 
                        </div>
                    </div>
                </div>
            </div>
        </header> <!-- end header -->


        <div class="mobile-menu">
            <div class="container">
                <?php 
                    wp_nav_menu( array(
                        'menu' => 'header_menu',
                        'container_class' => 'header-menu',
                        'theme_location' => 'header_menu',
                        'container' => 'nav',
                        'depth' => 2
                    ) )
                ?>
                <div class="header-actions">
                    <a href="#" class="btn btn-green"><?php ez__e('Open Live');  ?></a>
                    <a href="#" class="btn btn-grey"><?php ez__e('Open Demo'); ?></a>
                    <button class="search-btn js-open-search"><img src="<?php echo get_template_directory_uri(); ?>/images/search.svg" alt=""><span><?php ez__e('Search');  ?></span></button>
                </div>   
            </div>
        </div>



        <div class="search-popup">
            <button class="close js-close-search">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 47.971 47.971" style="enable-background:new 0 0 47.971 47.971;" xml:space="preserve">
                    <path d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88
                        c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242
                        C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879
                        s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z"/>
                </svg>
            </button>

            <div class="search-container">
                
                <form action="<?php echo home_url(); ?>" class="search-form" method="get" value="<?php the_search_query(); ?>">
                    <input type="text" name="s" class="search-input js-search-input" placeholder="<?php ez__e('Search');  ?>">
                    <span class="reset-button js-reset-search-form" tabindex="-1">
                        <svg version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 24 24" data-reactid=".0.0.1.0.1.4.0"><path d="M12,21c5,0,9-4,9-9s-4-9-9-9s-9,4-9,9S7,21,12,21z M12,5c3.9,0,7,3.1,7,7s-3.1,7-7,7s-7-3.1-7-7S8.1,5,12,5z"></path><path d="M8.8,15.2c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l1.8-1.8l1.8,1.8c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3 c0.4-0.4,0.4-1,0-1.4L13.4,12l1.8-1.8c0.4-0.4,0.4-1,0-1.4s-1-0.4-1.4,0L12,10.6l-1.8-1.8c-0.4-0.4-1-0.4-1.4,0s-0.4,1,0,1.4 l1.8,1.8l-1.8,1.8C8.4,14.2,8.4,14.8,8.8,15.2z"></path></svg>
                    </span>
                </form>

                <div class="search-results">
                    <div class="search-empty">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/illo--search-empty.svg" alt="">
                        <p><?php ez__e('Start typing in the search field above'); ?></p>
                    </div>
                </div>

            </div>
        </div>