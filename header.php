<?php $lang = substr(get_language_attributes(), -6, 5); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php if (is_front_page()) { echo get_bloginfo('title')." - ".get_bloginfo('description'); } else { echo get_bloginfo('title')." - ".get_the_title(); } ?></title>
    <?php wp_meta(); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/php;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="DC.title" content="<?php echo get_bloginfo('title'); ?>" />
    <meta name="DC.creator " content="Wesley Andrade - http://www.github.com/wesandradealves - wesandradealves@gmail.com" />
    <meta name="DC.creator.address" content="http://www.github.com/wesandradealves" />
    <meta name="DC.description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta name="DC.publisher" content="Wesley Andrade - http://www.github.com/wesandradealves - wesandradealves@gmail.com" />
    <meta name="DC.Identifier" content="<?php echo site_url(); ?>">
    <!--cache-->
    <meta http-equiv="cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
    <!---->
    <meta http-equiv="content-language" content="<?php echo $lang; ?>" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="audience" content="all" />
    <meta name="author" content="Wesley Andrade - http://www.github.com/wesandradealves - wesandradealves@gmail.com" />
    <meta name="copyright" content="Wesley Andrade - http://www.github.com/wesandradealves - wesandradealves@gmail.com" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <meta name="robots" content="index, follow, ALL" />
    <meta name="GOOGLEBOT" content="index, follow" />
    <meta name="rating" content="General" />
    <meta name="revisit-after" content="2 Days" />
    <meta name="language" content="<?php echo $lang; ?>" />
    <meta property="og:locale" content="<?php echo $lang; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo get_bloginfo('title'); ?>" />
    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta property="og:url" content="<?php echo site_url(); ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('title'); ?>" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
    <link rel="canonical" href="<?php echo site_url(); ?>" />
    <?php wp_head(); ?>
</head>
<body 
    <?php
    global $post;
    if (is_front_page()) {
      echo 'class="pg-home"';
    } else if(is_archive()){
      echo 'class="pg-archive pg-interna"';
    } else if(is_category()){
      echo 'class="pg-category pg-interna"';
    } else if(is_search()){
      echo 'class="pg-search pg-interna"';
    } else if(is_single()){
      echo 'class="pg-single pg-interna"';
    } else {
      echo 'class="pg-interna page_id_'.$post->ID.'"';
    }
    ?>>
    <div id="wrap">
        <nav>
            <ul class="clearfix">
                <?php wp_nav_menu( array( 'container' => false, 'menu' => 'footer', 'items_wrap' => '%3$s' ) ); ?>
            </ul>                    
        </nav>
        <header>
            <div class="container v-center">
                <a id="logo" class="col-lg-3 col-md-2 col-sm-5 col-xs-5" href="<?php echo site_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description'); ?>">
                    <?php 
                    if ( is_front_page() ) :
                        if ( get_theme_mod( 'logo' ) ) :
                        echo "<img src='".esc_url( get_theme_mod( 'logo' ) )."' alt='".esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description')."'>";
                        else :
                        echo esc_attr( get_bloginfo( 'name', 'display' ) );
                        endif;
                    else:
                        if ( get_theme_mod( 'logo-interna' ) ) :
                        echo "<img src='".esc_url( get_theme_mod( 'logo-interna' ) )."' alt='".esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description')."'>";
                        else :
                        echo esc_attr( get_bloginfo( 'name', 'display' ) );
                        endif;
                    endif;
                    ?>
                </a>
                <nav class="text-right col-lg-9 col-md-10 col-sm-7 col-xs-7">
                    <ul id="lang" class="text-right">
                        <?php wp_nav_menu( array( 'container' => false, 'menu' => 'lang', 'items_wrap' => '%3$s' ) ); ?>
                    </ul>
                    <ul id="menu" class="text-right hidden-md hidden-sm hidden-xs">
                        <?php wp_nav_menu( array( 'container' => false, 'menu' => 'header', 'items_wrap' => '%3$s' ) ); ?>             
                    </ul>
                    <button onclick="mobileNavigation()" type="button" class="tcon tcon-menu--xbutterfly visible-md visible-sm visible-xs pull-right" aria-label="toggle menu">
                        <span class="tcon-menu__lines" aria-hidden="true"></span>
                        <span class="tcon-visuallyhidden">toggle menu</span>
                    </button>
                </nav>
            </div>
            <!--Fim Header Default-->