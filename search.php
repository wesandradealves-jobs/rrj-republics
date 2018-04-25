<?php get_header(); ?>
  <div id="banner" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id(24), full); ?>);"><!----></div>
</header>
<main>
    <div class="container">
        <section id="content" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 blog--posts">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); $category = get_the_category(); ?>
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
            <?php endwhile; else :  ?>
                <article>
                    <h2 classs="text-center">Não encontramos nenhuma postagem com o termo <strong><?php echo $_GET["s"]; ?></strong></h2>
                </article>
            <?php endif; ?>
        </section>
        <?php get_sidebar('blog'); ?>
    </div>
</main>
<?php get_footer(); ?>