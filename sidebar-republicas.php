        <aside id="republicas-sidebar" class="col-lg-3 col-md-4 col-sm-4 hidden-xs sidebars">
                <?php if(get_post_meta($post->ID, 'endereco', true)): ?>
                <h3>Endereço</h3>
                <p><?php echo get_post_meta($post->ID, 'endereco', true); ?></p>
                <?php endif; ?>
                <?php if(get_post_meta($post->ID, 'administracao', true)): ?>
                <h3>Administração</h3>
                <p><?php echo get_post_meta($post->ID, 'administracao', true); ?></p>
                <?php endif; ?>
                <?php if(get_post_meta($post->ID, 'telefone', true)): ?>
                <h3>Contato</h3>
                <p><?php echo get_post_meta($post->ID, 'telefone', true); ?></p>
                <?php endif; ?> 
                <?php if(get_post_meta($post->ID, 'guia', true)): ?>
                        <p class="pull-right text-right guia-download">
                                <a href="<?php echo get_post_meta($post->ID, 'guia', true); ?>"><span>Guia de Convivência</span> <i><img width="100%" src="<?php echo get_template_directory_uri(); ?>/assets/css/img/1497141597_icon-70-document-file-pdf.png" /></i></a>
                        </p>
                <?php endif; ?> 
                <?php if(has_tag()): ?>
                <span class="tags"> 
                <?php
                        $before = '';
                        $seperator = ''; // blank instead of comma
                        $after = '';

                        the_tags( $before, $seperator, $after );
                ?>
                </span>
                <?php endif; ?>
                <?php if ( is_active_sidebar( 'republicas' ) ) : ?>
                        <div id="widget-area" class="widget-area" role="complementary">
                        <?php dynamic_sidebar( 'republicas' ); ?>
                        </div><!-- .widget-area -->
                <?php endif; ?>
        </aside>