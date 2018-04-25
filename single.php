<?php get_header(); ?>
    <div id="banner" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>);"><!----></div>
</header>
<main>
    <div class="container">
        <section id="content" class="col-lg-9 col-md-9 col-sm-9 col-xs-12 the_post">
            <?php if ( have_posts () ) : while (have_posts()):the_post(); $category = get_the_category(); ?>
            <article id="post_<?php echo get_the_id(); ?>" class="clearfix">
                <p>postado em<?php echo get_the_date()." por ".get_the_author(); ?></p>
                <h1><?php echo get_the_title(); ?></h1>
                <?php if(wp_get_attachment_url(get_post_thumbnail_id($post->ID), full)) : ?>
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>" alt="<?php echo get_the_title(); ?>" />
                <?php endif; ?>
                <?php the_content(); ?>
            </article>
            <?php endwhile; endif; ?>
        </section>
        <?php get_sidebar('blog'); ?>
    </div>
</main>
<?php get_footer(); ?>

