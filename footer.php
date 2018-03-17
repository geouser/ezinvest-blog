        <?php 

            $footer_style = get_field('footer_style', 'options');

            get_template_part( 'template-parts/footer', $footer_style );

        ?>

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