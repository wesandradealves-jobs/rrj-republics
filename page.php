<?php 
    get_header(); 
    $query = new WP_Query( array( 'post_type' => 'page', 'meta_key' => '_wp_page_template', 'meta_value' => 'republicas.php', 'order' => 'ASC') );
?>
<!--Header da home e das páginas internas-->
  <?php if ( is_front_page() ) : ?>
    <?php if ( have_posts () ) : while (have_posts()):the_post(); ?>
        <div id="header">
            <div class="container text-center">
                <h1><?php echo get_the_title(); ?></h1>
                <?php the_content(); ?>
                <a href="<?php echo get_post_meta($post->ID, 'botao_url', true); ?>" class="btn btn1" title="<?php echo get_post_meta($post->ID, 'botao_label', true); ?>"><?php echo get_post_meta($post->ID, 'botao_label', true); ?></a>
                <?php if($query->have_posts()=="1") : ?>
                    <div id="featurette" class="clearfix text-left">
                        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 featurette--box">
                            <div class="featurette--boxThumbnail" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>);"></div>
                            <div>
                                <div class="v-center clearfix">
                                    <h2 class="pddl0 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <a href="<?php echo get_the_permalink(); ?>" target="_blank" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
                                    </h2>
                                    <?php if(get_post_meta($post->ID, 'vagas', true)!="0"&&get_post_meta($post->ID, 'vagas', true)!="") : ?>
                                    <span class="col-lg-3 col-md-6 col-sm-6 col-xs-12"><span class="btn btn2">Há Vagas (<?php echo get_post_meta($post->ID, 'vagas', true); ?>)</span></span>
                                    <span class="col-lg-3 col-md-6 col-sm-6 col-xs-12 pddr0"><a href="./contato" class="btn btn2 inverse">Agendar Visita</a></span>
                                    <?php else: ?>
                                    <span class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><span class="btn btn2 inverse">Não Há Vagas</span></span>
                                    <?php endif; ?>
                                </div>
                                <p class="clearfix">
                                    <span class="pddl0 col-lg-6 col-md-6 col-sm-6 col-xs-12"><?php if(get_post_meta($post->ID, 'endereco', true)): ?><i class="material-icons">location_on</i> <?php echo get_post_meta($post->ID, 'endereco', true); ?> <?php endif; ?> </span>
                                    <span class="pddr0 text-right col-lg-6 col-md-6 col-sm-6 col-xs-12"><?php if(get_post_meta($post->ID, 'publico', true)): ?><i class="material-icons">perm_identity</i> <?php echo get_post_meta($post->ID, 'publico', true); ?> <?php endif; ?> </span>
                                </p>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        <?php                                        
                            endwhile; 
                            wp_reset_query();  
                        ?>
                    </div>
                <?php endif; ?>
            </div> 
        </div>
    <?php endwhile; endif; ?>
  <?php else: ?>
  <div id="banner" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>);"><!----></div>
  <?php endif; ?>
</header>
<main>
  <!--Conteúdo da home e das páginas internas-->
  <?php if ( ! is_front_page() ){ ?>
  <div class="container">
     <?php if ( have_posts () ) : while (have_posts()):the_post(); ?>
        <article>
            <?php the_content(); ?> 
        </article>    
    <?php endwhile; endif; ?>
    <?php if ( get_theme_mod('email') || get_theme_mod('telefone') ) : ?>
    <p class="contato">
        <a target="_blank" href="mailto:<?php echo get_theme_mod('email'); ?>"><i class="material-icons">email</i> <?php echo get_theme_mod('email'); ?></a>    
        <span><i class="material-icons">hearing</i> <?php echo get_theme_mod('telefone'); ?></span>
    </p>   
    <?php endif; ?>
  </div>
  <?php } else { ?>
    <?php include(get_template_directory()."/".get_post( $post )->post_name.".php"); ?>
  <?php } ?>
</main>
<?php get_footer(); ?>



