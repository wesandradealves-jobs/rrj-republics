<?php 

    $blog = new WP_Query( array( 'post_type' => 'post', 'order' => 'ASC') );

?>



<?php if($blog->have_posts()=="1") : ?>

<section id="blog">

    <div class="container">

        <h1 class="text-center">Últimas Notícias</h1>

        <div class="flexslider noticias">

        <ul class="slides">

            <?php while ( $blog->have_posts() ) : $blog->the_post(); ?>

            <li>

                <div>

                <h3><?php echo get_the_title()."<small>postado em ".get_the_date()."</small>" ?></h3>

                <?php if(wp_get_attachment_url(get_post_thumbnail_id($post->ID), full)): ?>

                <div style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>)" class="noticias--thumbnail"><!----></div>

                <?php endif; ?>
                <p>
                <?php 
                        if(get_the_excerpt()):
                        echo get_the_excerpt();
                        else:
                        echo substr(get_the_content(), 0, 20);
                        endif;
                ?>
                </p>
                <a href="<?php echo get_the_permalink(); ?>" title="Saiba Mais">Saiba Mais</a>

                </div>

            </li>

            <?php                                        

                endwhile; 

                wp_reset_query();  

            ?>

        </ul>

        </div>

    </div>

</section>

<?php endif; ?>



<?php if(get_post_meta($post->ID, 'maps', true)): ?>

<section id="map">

    <div>

        <div>

            <?php if(get_theme_mod( 'logo' )): ?>

            <?php echo "<img src='".esc_url( get_theme_mod( 'logo' ) )."' alt='".esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description')."'>"; ?>

            <?php endif; ?>

            <h3>Conheça as Rotas<br/>e Conduções</h3>

            <a href="./como-chegar" class="btn btn3">Veja como chegar</a>                    

        </div>

    </div>

    <iframe src="<?php echo get_post_meta($post->ID, 'maps', true); ?>" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>

</section>

<?php endif; ?>

