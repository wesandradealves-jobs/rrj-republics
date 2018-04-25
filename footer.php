    </div>
    <footer>
        <div id="footer">
            <div class="container v-center">
                <div class="col-lg-4 col-md-4 com-sm-6 col-xs-12">
                    <nav>
                        <ul class="clearfix">
                            <?php wp_nav_menu( array( 'container' => false, 'menu' => 'footer', 'items_wrap' => '%3$s' ) ); ?>
                        </ul>                    
                    </nav>
                </div>
                <div class="col-lg-4 col-md-4 com-sm-6 col-xs-12 text-center">
                <?php 
                if ( get_theme_mod( 'logo-rodape' ) ) :
                echo "<img src='".esc_url( get_theme_mod( 'logo-rodape' ) )."' alt='".esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description')."'>";
                else :
                echo "<p>".esc_attr( get_bloginfo( 'name', 'display' ) )."</p>";
                endif;
                ?>
                </div>
                <div class="col-lg-4 col-md-4 com-sm-12 col-xs-12 text-right">
                    <?php if ( get_theme_mod('facebook') || get_theme_mod('email') ) : ?>
                    <p>Contate-nos por... 
                        <?php if ( get_theme_mod('facebook') ) : ?>
                        <a target="_blank" href="<?php echo get_theme_mod('facebook'); ?>"><i class="zocial-facebook"></i></a>
                        <?php endif; ?>
                        <?php if ( get_theme_mod('email') ) : ?>
                        <a target="_blank" href="mailto:<?php echo get_theme_mod('email'); ?>"><i class="zocial-email"></i></a>
                        <?php endif; ?>
                    </p>
                    <?php endif; ?>
                </div>
            </div>        
        </div>
        <div id="copyright">
            <div class="container">
                <p class="pull-left">© <?php echo get_bloginfo('name').", ".date('Y'); ?></p>
                <?php if ( get_theme_mod('facebook') ) : ?>
                <div class="pull-right fb-like">
                    <div class="fb-like" data-href="<?php echo get_theme_mod('facebook'); ?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="fals" data-share="true"></div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </footer>
    <div id="fb-root"></div>
    <script>
    transformicons.add('.tcon')
    </script>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9&appId=599384393561456";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <?php wp_footer(); ?> 
    <?php $blog_check = new WP_Query( array( 'post_type' => 'post', 'order' => 'ASC') ); ?>
    <?php if($blog_check->have_posts()!="1") : ?>
    <script type="text/javascript">
        blogCheck();
    </script>
    <?php endif; ?>
</body>
</html>