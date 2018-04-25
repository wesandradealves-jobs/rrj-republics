<?php /* Template Name: Blog */ ?>
<?php get_header();  $blog = new WP_Query( array( 'post_type' => 'post', 'order' => 'ASC') ); ?>
  <div id="banner" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>);"><!----></div>
</header>
<main>
    <div class="container">
        <section id="content" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 blog--posts">
            <?php if($blog->have_posts()=="1") : while ( $blog->have_posts() ) : $blog->the_post(); $category = get_the_category(); ?>
            <article id="post_<?php echo get_the_id(); ?>" class="clearfix blog--posts-post">
                <?php if(wp_get_attachment_url(get_post_thumbnail_id($post->ID), full)) : ?>
                    <div class="blog--posts-thumbnail" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>)"></div>
                <?php endif; ?>
                <div>
                    <h4><span><?php echo $category[0]->cat_name; ?></span></h4>
                    <a title="<?php echo get_the_title(); ?>" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                </div>
                <p class="clearfix">
                    <span class="pull-left">postado em<?php echo get_the_date()." por ".get_the_author(); ?></span>
                    <?php if(has_tag()): ?>
                    <span class="pull-right"><i class=" material-icons">label</i> <b>Tags:</b> 
                    <?php the_tags(); ?>
                    </span>
                    <?php endif; ?>
                </p>
            </article>
            <?php endwhile; else : ?>
                <p class="text-center">Não encontramos nenhuma postagem ainda.</p>
            <?php endif; ?>
        </section>
        <?php get_sidebar('blog'); ?>
    </div>
</main>
<?php get_footer(); ?>