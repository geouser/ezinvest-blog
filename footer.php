		<?php /* ?>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <?php
                                if ( function_exists('dynamic_sidebar') ) :
                                    dynamic_sidebar('footer-sidebar');
                                endif;
                            ?>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="blog-identity">
                            <a href="<?php echo home_url(); ?>" class="blog-logo"><img src="<?php echo get_template_directory_uri(); ?>/images/ezinvest_logo_grey.png" alt=""></a>
                            <p class="blog-moto">European regulated, and trusted by over 100,000 traders</p>
                            <div class="socials">
                                <a class="twitter" href="#" target="_blank" title="">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-285.9 385.7 26.5 22" style="enable-background:new -285.9 385.7 26.5 22" xml:space="preserve">
                                        <path fill="#8d98a1" d="M-269.3,386c-2.4,0.9-3.9,3.1-3.7,5.6l0.1,0.9l-1-0.1c-3.5-0.4-6.5-2-9.1-4.5l-1.3-1.3l-0.3,0.9c-0.7,2.1-0.2,4.3,1.2,5.7 c0.8,0.8,0.6,0.9-0.7,0.4c-0.5-0.2-0.9-0.3-0.9-0.2c-0.1,0.1,0.3,1.9,0.7,2.6c0.5,1,1.5,1.9,2.6,2.5l0.9,0.4l-1.1,0 c-1.1,0-1.1,0-1,0.4c0.4,1.3,1.9,2.6,3.6,3.2l1.2,0.4l-1,0.6c-1.5,0.9-3.3,1.4-5.1,1.4c-0.9,0-1.6,0.1-1.6,0.2 c0,0.2,2.3,1.3,3.7,1.7c4.1,1.3,8.9,0.7,12.6-1.4c2.6-1.5,5.2-4.6,6.4-7.5c0.7-1.6,1.3-4.4,1.3-5.8c0-0.9,0.1-1,1.1-2.1 c0.6-0.6,1.2-1.3,1.3-1.5c0.2-0.4,0.2-0.4-0.8,0c-1.6,0.6-1.9,0.5-1.1-0.4c0.6-0.6,1.3-1.7,1.3-2.1c0-0.1-0.3,0-0.6,0.2 c-0.3,0.2-1.1,0.5-1.7,0.7l-1,0.3l-0.9-0.6c-0.5-0.3-1.2-0.7-1.6-0.9C-266.9,385.6-268.4,385.7-269.3,386z"></path>
                                    </svg>
                                </a>
                                <a href="#" class="facebook" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 430.113 430.114" style="enable-background:new 0 0 430.113 430.114;" xml:space="preserve">
                                        <path id="Facebook" d="M158.081,83.3c0,10.839,0,59.218,0,59.218h-43.385v72.412h43.385v215.183h89.122V214.936h59.805   c0,0,5.601-34.721,8.316-72.685c-7.784,0-67.784,0-67.784,0s0-42.127,0-49.511c0-7.4,9.717-17.354,19.321-17.354   c9.586,0,29.818,0,48.557,0c0-9.859,0-43.924,0-75.385c-25.016,0-53.476,0-66.021,0C155.878-0.004,158.081,72.48,158.081,83.3z" fill="#8d98a1"/>
                                    </svg>
                                </a>
                            </div>
                            <p class="copyright">© 2018 EZinvest</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer> <!-- end footer -->
        <?php */ ?>

        <footer class="footer-dark">
            <div class="footer-dark__top">
                <div class="container">
                    <div class="row">
                        <?php
                            if ( function_exists('dynamic_sidebar') ) :
                                dynamic_sidebar('footer-sidebar');
                            endif;
                        ?>
                    </div>       
                </div>
                 
            </div>
            
            <div class="footer-dark__middle">
                <div class="container">
                    <div class="socials">
                        <?php 

                            $socials = array(
                                'facebook' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 430.113 430.114" style="enable-background:new 0 0 430.113 430.114;" xml:space="preserve">
                                <path id="Facebook" d="M158.081,83.3c0,10.839,0,59.218,0,59.218h-43.385v72.412h43.385v215.183h89.122V214.936h59.805   c0,0,5.601-34.721,8.316-72.685c-7.784,0-67.784,0-67.784,0s0-42.127,0-49.511c0-7.4,9.717-17.354,19.321-17.354   c9.586,0,29.818,0,48.557,0c0-9.859,0-43.924,0-75.385c-25.016,0-53.476,0-66.021,0C155.878-0.004,158.081,72.48,158.081,83.3z" fill="#8d98a1"/>
                            </svg>',

                                'gplus' => '<svg width="23" height="14" viewBox="0 0 23 14" xmlns="http://www.w3.org/2000/svg"><path d="M7.006 6v2.4h3.97c-.16 1.03-1.2 3.02-3.97 3.02-2.39 0-4.34-1.98-4.34-4.42s1.95-4.42 4.34-4.42c1.36 0 2.27.58 2.79 1.08l1.9-1.83c-1.22-1.14-2.8-1.83-4.69-1.83-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.72-2.84 6.72-6.84 0-.46-.05-.81-.11-1.16h-6.61zm15 0h-2v-2h-2v2h-2v2h2v2h2v-2h2v-2z"></path></svg>',

                                'twitter' => '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-285.9 385.7 26.5 22" style="enable-background:new -285.9 385.7 26.5 22" xml:space="preserve">
                                <path fill="#8d98a1" d="M-269.3,386c-2.4,0.9-3.9,3.1-3.7,5.6l0.1,0.9l-1-0.1c-3.5-0.4-6.5-2-9.1-4.5l-1.3-1.3l-0.3,0.9c-0.7,2.1-0.2,4.3,1.2,5.7 c0.8,0.8,0.6,0.9-0.7,0.4c-0.5-0.2-0.9-0.3-0.9-0.2c-0.1,0.1,0.3,1.9,0.7,2.6c0.5,1,1.5,1.9,2.6,2.5l0.9,0.4l-1.1,0 c-1.1,0-1.1,0-1,0.4c0.4,1.3,1.9,2.6,3.6,3.2l1.2,0.4l-1,0.6c-1.5,0.9-3.3,1.4-5.1,1.4c-0.9,0-1.6,0.1-1.6,0.2 c0,0.2,2.3,1.3,3.7,1.7c4.1,1.3,8.9,0.7,12.6-1.4c2.6-1.5,5.2-4.6,6.4-7.5c0.7-1.6,1.3-4.4,1.3-5.8c0-0.9,0.1-1,1.1-2.1 c0.6-0.6,1.2-1.3,1.3-1.5c0.2-0.4,0.2-0.4-0.8,0c-1.6,0.6-1.9,0.5-1.1-0.4c0.6-0.6,1.3-1.7,1.3-2.1c0-0.1-0.3,0-0.6,0.2 c-0.3,0.2-1.1,0.5-1.7,0.7l-1,0.3l-0.9-0.6c-0.5-0.3-1.2-0.7-1.6-0.9C-266.9,385.6-268.4,385.7-269.3,386z"></path>
                            </svg>',

                                'youtube' => '<svg width="21" height="17" viewBox="0 0 21 17" xmlns="http://www.w3.org/2000/svg"><path d="M20.783 3.487s-.218-1.564-.833-2.254c-.797-.91-1.702-.91-2.1-.946C14.917.07 10.5.033 10.5.033S6.083.07 3.15.287c-.398.036-1.303.073-2.1.946-.652.69-.833 2.254-.833 2.254S0 5.342 0 7.197v1.708c0 1.855.217 3.673.217 3.673s.218 1.564.833 2.255c.797.91 1.847.872 2.317.98 1.666.183 7.133.22 7.133.22s4.417 0 7.35-.255c.398-.036 1.303-.073 2.1-.945.616-.69.833-2.255.833-2.255S21 10.723 21 8.905v-1.71c0-1.853-.217-3.708-.217-3.708zm-12.847.855v7.86l6.854-3.84-6.854-4.02z" fill-rule="evenodd"></path></svg>',
                                
                                'linkedin' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 12" width="13px" height="12px"><path d="M3.344 11.996V3.898H.664v8.098h2.68zm-1.34-9.204c.935 0 1.516-.62 1.516-1.4C3.503.6 2.94-.005 2.022-.005 1.105-.005.506.6.506 1.395c0 .776.58 1.397 1.48 1.397h.018zm2.823 9.204h2.68V7.474c0-.242.017-.484.088-.657.194-.484.635-.984 1.375-.984.97 0 1.358.742 1.358 1.83v4.333h2.68V7.353c0-2.488-1.323-3.645-3.086-3.645-1.446 0-2.08.812-2.433 1.364h.01V3.898H4.82c.035.76 0 8.098 0 8.098z"></path></svg>'
                            );

                            foreach ($socials as $key => $svg) {
                                if ( get_field('social_'.$key, 'options') ) {
                                    echo '<a href="'.get_field('social_'.$key, 'options').'" class="'.$key.'" target="_blank">'.$svg.'</a>';
                                }
                            }
                        ?>
                        
                    </div>    
                </div>
                
            </div>
            

            <div class="footer-dark__bottom">
                <div class="container">
                    <?php the_field('footer_text', 'options'); ?>
                    <p class="text-center"><?php the_field('copyright', 'options'); ?><br>
                        <?php 
                            $links = get_field('footer_links', 'options');
                            $links_string = array();

                            foreach ($links as $link) {
                                $links_string[] = '<a href="'.$link['link'].'" target="_blank">'.$link['label'].'</a>';
                            }
                            echo join(' | ', $links_string );
                        ?>
                    </p>
                </div>
            </div>
        </footer> <!-- end footer -->

        <div class="sticky-footer text-center">
            <div class="container">
                <p><?php the_field('risk_warning', 'options'); ?></p>
            </div>
        </div>

        <div id="modal-popup-subscribe" class="s-popup">
            <div class="popup-body">
                <p class="s-popup__title">Join <strong>76,547 subscribers</strong> &amp; get two articles delivered to your inbox each week.</p>

                <form action="#" class="s-popup__form">
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" required="" placeholder="Email Address">
                    </div>
                    <div class="form-group mb-0">
                        <button class="btn btn-blue d-block">Sign Up</button>
                    </div>
                </form>

                <a href="#" class="js-dismise-subscribe no-thanks">No thanks</a>
            </div>
        </div>  	    

        <?php wp_footer(); ?>
    </body>
</html>