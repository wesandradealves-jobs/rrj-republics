<?php /* Template Name: Repúblicas */ ?>
<?php get_header(); ?>
    <div id="banner" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>);"><!----></div>
</header>
<main>
    <div class="container">
        <?php get_sidebar('republicas'); ?>
        <section id="content" class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
            <article id="post_<?php echo get_the_id(); ?>" class="clearfix blog--post">
                <?php if ( have_posts () ) : while (have_posts()):the_post(); ?>
                <?php the_excerpt(); ?>
                <?php the_content(); ?>    
                <?php if(get_post_meta($post->ID, 'maps', true)): ?>
                <h2>Como Chegar</h2>
                <div class="intrinsic-container">
                <iframe src="<?php echo get_post_meta($post->ID, 'maps', true); ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <?php endif; ?> 
                <?php endwhile; endif; ?>
                <?php if(wp_get_attachment_image_src( MultiPostThumbnails::get_post_thumbnail_id( get_post_type(), 'featured-image-1', $post->ID ), 'full' )[0]): ?>
                <h2>Galeria</h2>
                <div class="flexslider galeria">
                    <ul class="slides">
                    <?php 
                        for ($i = 1; $i <= 15; $i++):if(wp_get_attachment_image_src( MultiPostThumbnails::get_post_thumbnail_id( get_post_type(), 'featured-image-'.$i, $post->ID ), 'full' )[0]):
                                echo '<li><img width="100%" src="'. wp_get_attachment_image_src( MultiPostThumbnails::get_post_thumbnail_id( get_post_type(), 'featured-image-'.$i, $post->ID ), 'full' )[0].'" alt="'.get_the_title().'"></li>';
                        endif;endfor;
                    ?>
                    </ul>
                    <?php if ( get_theme_mod('email') || get_theme_mod('telefone') ) : ?>
                    <p class="contato hidden-xs hidden-sm">
                        <a target="_blank" href="mailto:<?php echo get_theme_mod('email'); ?>"><i class="material-icons">email</i> <?php echo get_theme_mod('email'); ?></a>    
                        <span><i class="material-icons">hearing</i> <?php echo get_theme_mod('telefone'); ?></span>
                    </p>   
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </article>
        </section>
    </div>
</main>
<?php get_footer(); ?>