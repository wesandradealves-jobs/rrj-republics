        <aside id="blog-sidebar" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 sidebars">
                <h3>Busca</h3>
                <?php echo do_shortcode('[my_vc_php_output_blog_search]'); ?>
                <?php if ( is_active_sidebar( 'blog' ) ) : ?>
                        <div id="widget-area" class="widget-area" role="complementary">
                        <?php dynamic_sidebar( 'blog' ); ?>
                        </div><!-- .widget-area -->
                <?php endif; ?>
        </aside>