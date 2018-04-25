<?php



function remove_menus(){



  



  remove_menu_page( 'index.php' );                  //Dashboard



  remove_menu_page( 'jetpack' );                    //Jetpack* 



//   remove_menu_page( 'edit.php' );                   //Posts



  // remove_menu_page( 'upload.php' );                 //Media



//   remove_menu_page( 'edit.php?post_type=page' );    //Pages



  remove_menu_page( 'edit-comments.php' );          //Comments



  // remove_menu_page( 'themes.php' );                 //Appearance



  // remove_menu_page( 'plugins.php' );                //Plugins



//   remove_menu_page( 'users.php' );                  //Users



//   remove_menu_page( 'tools.php' );                  //Tools



  // remove_menu_page( 'options-general.php' );        //Settings



  



}







function getrid() {



  remove_post_type_support( 'page', 'page-attributes' );



}







function df_terms_clauses($clauses, $taxonomy, $args) {



    if (!empty($args['post_type'])) {



        global $wpdb;



        $post_types = array();



        foreach($args['post_type'] as $cpt) {



            $post_types[] = "'".$cpt."'";



        }



        if(!empty($post_types)) {



            $clauses['fields'] = 'DISTINCT '.str_replace('tt.*', 'tt.term_taxonomy_id, tt.term_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields']).', COUNT(t.term_id) AS count';



            $clauses['join'] .= ' INNER JOIN '.$wpdb->term_relationships.' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN '.$wpdb->posts.' AS p ON p.ID = r.object_id';



            $clauses['where'] .= ' AND p.post_type IN ('.implode(',', $post_types).')';



            $clauses['orderby'] = 'GROUP BY t.term_id '.$clauses['orderby'];



        }



    }



    return $clauses;



}







// 



// function add_taxonomies_to_pages() {



//  register_taxonomy_for_object_type( 'category', 'page' );



//  }











// function category_and_tag_archives( $wp_query ) {



//     $my_post_array = array('post','page');



    



//     if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )



//        $wp_query->set( 'post_type', $my_post_array );



   



//    if ( $wp_query->get( 'tag' ) )



//        $wp_query->set( 'post_type', $my_post_array );



// }



// 







function themeslug_theme_customizer( $wp_customize ) {



    $wp_customize->add_panel( 'header', array(



        'priority' => 1,



        'capability' => 'edit_theme_options',



        'title' => __( 'Header')



    ));



    $wp_customize->add_panel( 'footer', array(



        'priority' => 1,



        'capability' => 'edit_theme_options',



        'title' => __( 'Footer')



    ));



    $wp_customize->add_section( 'logo-rodape' , array(



        'title'       => __( 'Logo', 'themeslug' ),



        'panel' => 'footer',



        'priority'    => 2



    ));



    $wp_customize->add_section( 'logo' , array(



        'title'       => __( 'Logo', 'themeslug' ),



        'panel' => 'header',



        'priority'    => 2



    ));



    $wp_customize->add_section( 'redes-sociais' , array(



        'title'       => __( 'Redes Sociais e Contato', 'themeslug' ),



        'panel' => 'footer',



        'priority'    => 2



    ));



    $wp_customize->add_setting( 'logo' );



    $wp_customize->add_setting( 'logo-interna' );



    $wp_customize->add_setting( 'logo-rodape' );



    $wp_customize->add_setting( 'facebook' );



    $wp_customize->add_setting( 'email' );



    $wp_customize->add_setting( 'telefone' );



    $wp_customize->add_control('facebook',  array(



        'label' => 'Facebook',



        'section' => 'redes-sociais',



        'type' => 'text',



        'settings' => 'facebook'



    ));



    $wp_customize->add_control('email',  array(



        'label' => 'Email',



        'section' => 'redes-sociais',



        'type' => 'text',



        'settings' => 'email'



    ));



    $wp_customize->add_control('telefone',  array(



        'label' => 'Telefone',



        'section' => 'redes-sociais',



        'type' => 'text',



        'settings' => 'telefone'



    ));



    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo-interna', array(



        'label'    => __( 'Logo Páginas Internas', 'themeslug' ),



        'section'  => 'logo',



        'settings' => 'logo-interna'



    )));   



    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(



        'label'    => __( 'Logo', 'themeslug' ),



        'section'  => 'logo',



        'settings' => 'logo'



    )));   



    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo-rodape', array(



        'label'    => __( 'Logo', 'themeslug' ),



        'section'  => 'logo-rodape',



        'settings' => 'logo-rodape'



    )));   



}







function remove_customizer_settings( $wp_customize ){



  $wp_customize->remove_panel('nav_menus');



  $wp_customize->remove_section('static_front_page');



}







function get_the_category_bytax( $id = false, $tcat = 'category' ) {



    $categories = get_the_terms( $id, $tcat );



    if ( ! $categories )



        $categories = array();



    $categories = array_values( $categories );



    foreach ( array_keys( $categories ) as $key ) {



        _make_cat_compat( $categories[$key] );



    }



    // Filter name is plural because we return alot of categories (possibly more than #13237) not just one



    return apply_filters( 'get_the_categories', $categories );



}







function get_custom_field_data($key, $echo = false) {



    global $post;



    $value = get_post_meta($post->ID, $key, true);



    if($echo == false) {



        return $value;



    } else {



        echo $value;



    }



}







function hide_admin_bar() {



    wp_add_inline_style('admin-bar', '<style> html { margin-top: 0 !important; } </style>');



    return false;



}







function menu() {



  register_nav_menus(



    array(



      'header' => __( 'Header' ),

      'lang' => __( 'Lang' ),

      'footer' => __( 'Footer' )



    )



  );



}







function updateNumbers() {



    global $wpdb;



    $querystr = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'post' ";



    $pageposts = $wpdb->get_results($querystr, OBJECT);



    $counts = 0 ;



    if ($pageposts):



    foreach ($pageposts as $post):



    setup_postdata($post);



    $counts++;



    add_post_meta($post->ID, 'incr_number', $counts, true);



    update_post_meta($post->ID, 'incr_number', $counts);



    endforeach;



    endif;



}







set_post_thumbnail_size( 600, 600 );







if (class_exists('MultiPostThumbnails')) {



    for ($i=1;$i<=15;$i++) {



        new MultiPostThumbnails(



            array(



                'label' => 'Imagem',



                'id' => 'featured-image-'.$i,



                'post_type' => 'page',



                'meta_key' => '_wp_page_template', 

                

                'meta_value' => 'republicas.php'



            )



        ); 



    }



}







// 







function query_post_type($query) {



  if(is_category() || is_tag()) {



    $post_type = get_query_var('post_type');



    if($post_type)



        $post_type = $post_type;



    else



        $post_type = array('nav_menu_item','post','articles');



    $query->set('post_type',$post_type);



    return $query;



    }



}







function custom_pagination($numpages = '', $pagerange = '', $paged='') {



  if (empty($pagerange)) {



    $pagerange = 2;



  }



  /**



   * This first part of our function is a fallback



   * for custom pagination inside a regular loop that



   * uses the global $paged and global $wp_query variables.



   * 



   * It's good because we can now override default pagination



   * in our theme, and use this function in default quries



   * and custom queries.



   */



  global $paged;



  if (empty($paged)) {



    $paged = 1;



  }



  if ($numpages == '') {



    global $wp_query;



    $numpages = $wp_query->max_num_pages;



    if(!$numpages) {



        $numpages = 1;



    }



  }



  /** 



   * We construct the pagination arguments to enter into our paginate_links



   * function. 



   */



  $pagination_args = array(



    'base'            => get_pagenum_link(1) . '%_%',



    'format'          => 'page/%#%',



    'total'           => $numpages,



    'current'         => $paged,



    'show_all'        => False,



    'end_size'        => 1,



    'mid_size'        => $pagerange,



    'prev_next'       => False,



    'prev_text'       => __('&laquo;'),



    'next_text'       => __('&raquo;'),



    'type'            => 'plain',



    'add_args'        => false,



    'add_fragment'    => ''



  );



  $paginate_links = paginate_links($pagination_args);



  if ($paginate_links) {



    echo "<nav class='custom-pagination'>";



      echo $paginate_links;



    echo "</nav>";



  }



}



function my_formatter($content) {



 $new_content = '';



 $pattern_full = '{(\[raw\].*?\[/raw\])}is';



 $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';



 $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);



 



 foreach ($pieces as $piece) {



 if (preg_match($pattern_contents, $piece, $matches)) {



 $new_content .= $matches[1];



 } else {



 $new_content .= wptexturize(wpautop($piece));



 }



 }



 



 return $new_content;



}







function regScripts() {



    wp_deregister_script('jquery');





    wp_enqueue_script('jquery', (get_bloginfo('stylesheet_directory')."/node_modules/jquery/dist/jquery.min.js"));



    wp_enqueue_script('materialize-css', (get_bloginfo('stylesheet_directory')."/node_modules/materialize-css/dist/js/materialize.min.js"));



    wp_enqueue_script('inview', (get_bloginfo('stylesheet_directory')."/assets/js/inview.js"));



    wp_enqueue_script('slider', (get_bloginfo('stylesheet_directory')."/node_modules/flexslider/jquery.flexslider-min.js"));



    wp_enqueue_script('transformicons', (get_bloginfo('stylesheet_directory')."/assets/js/transformicons.min.js"));



    wp_enqueue_script('jquery-mask-plugin', (get_bloginfo('stylesheet_directory')."/node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"));



    wp_enqueue_script('functions.js', (get_bloginfo('stylesheet_directory')."/assets/js/functions.js"));





    wp_enqueue_style('bootstrap', get_bloginfo('stylesheet_directory').'/node_modules/bootstrap/dist/css/bootstrap.min.css');



    wp_enqueue_style('materialize-css', get_bloginfo('stylesheet_directory').'/node_modules/materialize-css/dist/css/materialize.css');



    wp_enqueue_style('css-reset', get_bloginfo('stylesheet_directory').'/node_modules/css-reset/reset.min.css');



    wp_enqueue_style('slider', get_bloginfo('stylesheet_directory').'/node_modules/flexslider/flexslider.css');



    wp_enqueue_style('materialize-font', 'http://fonts.googleapis.com/icon?family=Material+Icons');



    wp_enqueue_style('style', get_bloginfo('stylesheet_directory').'/style.css');



}



// 



function maps_markup($object)

{

    wp_nonce_field(basename(__FILE__), "meta-box-nonce");



    ?>

        <div>

            <label for="botao_label">Botão Label</label><br/>

            <input style="width:100%;" name="botao_label" type="text" value="<?php echo get_post_meta($object->ID, "botao_label", true); ?>">

        </div>

        <div>

            <label for="botao_url">Botão URL</url><br/>

            <input style="width:100%;" name="botao_url" type="text" value="<?php echo get_post_meta($object->ID, "botao_url", true); ?>">

        </div>

        <div>

            <label for="maps">Maps</label><br/>

            <textarea style="width:100%;overflow:hidden;resize:none;height:90px;" name="maps" value="<?php echo get_post_meta($object->ID, "maps", true); ?>"><?php echo get_post_meta($object->ID, "maps", true); ?></textarea>

        </div>

    <?php  

}



function add_maps()

{

    global $post;

    if(!empty($post)) {

        $slug = basename( get_permalink( $post->ID ) );

        if($slug == "rrj"||$slug == ""||$slug == "home") {

            add_meta_box("maps-meta-box", "Home", "maps_markup", "page", "side", "high", null);

        }

    }

}



function save_maps($post_id, $post, $update)

{

    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))

        return $post_id;



    if(!current_user_can("edit_post", $post_id))

        return $post_id;



    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)

        return $post_id;



    $slug = "page";

    if($slug != $post->post_type)

        return $post_id;



    $maps = "";

    $botao_label = "";

    $botal_url = "";



    if(isset($_POST["maps"]))

    {

        $maps = $_POST["maps"];

    }   

    update_post_meta($post_id, "maps", $maps);



    if(isset($_POST["botao_label"]))

    {

        $botao_label = $_POST["botao_label"];

    }   

    update_post_meta($post_id, "botao_label", $botao_label);



    if(isset($_POST["botao_url"]))

    {

        $botao_url = $_POST["botao_url"];

    }   

    update_post_meta($post_id, "botao_url", $botao_url);

}



// 



function vagas_markup($object)

{

    wp_nonce_field(basename(__FILE__), "meta-box-nonce");



    ?>

        <div>

            <label for="vagas">Quantidade de Vagas</label><br/>

            <input style="width:100%;" name="vagas" type="number" value="<?php echo get_post_meta($object->ID, "vagas", true); ?>">

        </div>

        <div>

            <label for="administracao">Administração</label><br/>

            <input style="width:100%;" name="administracao" type="text" value="<?php echo get_post_meta($object->ID, "administracao", true); ?>">

        </div>

        <div>

            <label for="telefone">Telefone</label><br/>

            <textarea style="width:100%;overflow:hidden;resize:none;height:90px;" name="telefone" type="text" value="<?php echo get_post_meta($object->ID, "telefone", true); ?>"><?php echo get_post_meta($object->ID, "telefone", true); ?></textarea>

        </div>

        <div>

            <label for="guia">Guia</label><br/>

            <input style="width:100%;" name="guia" type="text" value="<?php echo get_post_meta($object->ID, "guia", true); ?>">

        </div>

        <div>

            <label for="endereco">Endereço</label><br/>

            <textarea style="width:100%;overflow:hidden;resize:none;height:90px;" name="endereco" value="<?php echo get_post_meta($object->ID, "endereco", true); ?>"><?php echo get_post_meta($object->ID, "endereco", true); ?></textarea>

        </div>

        <div>

            <label for="publico">Público</label><br/>

            <input style="width:100%;" name="publico" type="text" value="<?php echo get_post_meta($object->ID, "publico", true); ?>">

        </div>

        <div>

            <label for="maps">Maps</label><br/>

            <textarea style="width:100%;overflow:hidden;resize:none;height:90px;" name="maps" value="<?php echo get_post_meta($object->ID, "maps", true); ?>"><?php echo get_post_meta($object->ID, "maps", true); ?></textarea>

        </div>

    <?php  

}



function save_vagas($post_id, $post, $update)

{

    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))

        return $post_id;



    if(!current_user_can("edit_post", $post_id))

        return $post_id;



    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)

        return $post_id;



    $slug = "page";

    if($slug != $post->post_type)

        return $post_id;



    $vagas = "";

    $endereco = "";

    $publico = "";

    $guia = "";

    $administracao = "";

    $telefone = "";

    $maps = "";



    if(isset($_POST["maps"]))

    {

        $maps = $_POST["maps"];

    }   

    update_post_meta($post_id, "maps", $maps);



    if(isset($_POST["vagas"]))

    {

        $vagas = $_POST["vagas"];

    }   

    update_post_meta($post_id, "vagas", $vagas);



    if(isset($_POST["endereco"]))

    {

        $endereco = $_POST["endereco"];

    }   

    update_post_meta($post_id, "endereco", $endereco);



    if(isset($_POST["guia"]))

    {

        $guia = $_POST["guia"];

    }   

    update_post_meta($post_id, "guia", $guia);



    if(isset($_POST["administracao"]))

    {

        $administracao = $_POST["administracao"];

    }   

    update_post_meta($post_id, "administracao", $administracao);



    if(isset($_POST["telefone"]))

    {

        $telefone = $_POST["telefone"];

    }   

    update_post_meta($post_id, "telefone", $telefone);



    if(isset($_POST["publico"]))

    {

        $publico = $_POST["publico"];

    }   

    update_post_meta($post_id, "publico", $publico);



}



function add_vagas()

{

    global $post;

    if(!empty($post)) {

        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);



        if($pageTemplate == 'republicas.php' ) {

            add_meta_box("vagas-metabox", "A República", "vagas_markup", "page", "side", "high", null);

        }

    }

}



function my_add_excerpts_to_pages() {

     add_post_type_support( 'page', 'excerpt' );

}



// Register widgetized areas

if ( ! function_exists( 'the_widgets_init' ) ) {

    function the_widgets_init() {

    if ( ! function_exists( 'register_sidebars' ) )

    return;

        register_sidebar(

        array(

        'id'            => 'blog',

        'name'          => __( 'Blog Sidebar' ),

        'before_widget' => '<div id="%1$s" class="widget %2$s">',

        'after_widget'  => '</div>',

        'before_title'  => '<h3 class="widget-title">',

        'after_title'   => '</h3>',

        )

        );

        register_sidebar(

        array(

        'id'            => 'republicas',

        'name'          => __( 'Repúblicas Sidebar' ),

        'before_widget' => '<div id="%1$s" class="widget %2$s">',

        'after_widget'  => '</div>',

        'before_title'  => '<h3 class="widget-title">',

        'after_title'   => '</h3>',

        )

        );

    } // End the_widgets_init()

}



function my_vc_shortcode_blog_search( $atts ) {   

    echo '<form role="search" method="get" id="searchform" action="'.esc_url( home_url( "/" ) ).'">

    <input name="s" type="text" value="'.get_search_query().'" placeholder="digite uma palavra-chave" />

    <h3><i class="glyphicon glyphicon-list-alt"><!-- --></i> <strong>categorias-</strong></h3>

    <ul>';

        $categories = get_categories(array("hide_empty" => 0,"type"=> "post","orderby"=> "name"));

        foreach($categories as $category) { 

            echo "<li><div class='custom-checkbox'><div><input value='".strtolower($category->term_id)."' id='".$category->name."' name='cat[]' type='checkbox' /><label for='".$category->name."'><span></span>".$category->name."</label></div></div></li>";

        }  

    echo '</ul><p class="text-center">

        <button class="btn btn3">Buscar</button>

        <input type="hidden" name="post_type" value="post" />

        </p></form>';

}



function add_class_to_excerpt( $excerpt ) {

    return str_replace('<p', '<p class="excerpt"', $excerpt);

}



function add_taxonomies_to_pages() {

 register_taxonomy_for_object_type( 'post_tag', 'page' );

}



function menu_fix_on_search_page( $query ) {

    if(is_search()){

        $query->set( 'post_type', array('attachment', 'post', 'nav_menu_item'));

        return $query;

    }

}



add_shortcode( 'my_vc_php_output_blog_search', 'my_vc_shortcode_blog_search');



add_theme_support( 'post-thumbnails' );



if( !is_admin() ) add_filter( 'pre_get_posts', 'menu_fix_on_search_page' );

add_filter( 'wpcf7_validate_configuration', '__return_false' );
    

add_filter('the_content', 'my_formatter', 99);



add_filter('pre_get_posts', 'query_post_type');



add_filter( 'show_admin_bar', 'hide_admin_bar' );



add_filter('terms_clauses', 'df_terms_clauses', 10, 3);



add_filter( "the_excerpt", "add_class_to_excerpt" );



add_action( 'wp_enqueue_scripts', 'regScripts' );



add_action ( 'publish_post', 'updateNumbers' );



add_action ( 'deleted_post', 'updateNumbers' );



add_action ( 'edit_post', 'updateNumbers' );



add_action( 'init', 'menu' );



add_action( 'customize_register', 'remove_customizer_settings', 20 );



add_action( 'customize_register', 'themeslug_theme_customizer' );



// if ( ! is_admin() ) {



//    add_action( 'pre_get_posts', 'category_and_tag_archives' );



// }



// add_action( 'init', 'add_taxonomies_to_pages' );



add_action( 'admin_menu', 'remove_menus' );



add_action( 'init', 'getrid' );



add_action("add_meta_boxes", "add_vagas");



add_action("save_post", "save_vagas", 10, 3);



add_action("save_post", "save_maps", 10, 3);



add_action("add_meta_boxes", "add_maps");



add_action( 'init', 'my_add_excerpts_to_pages' );



add_action( 'init', 'the_widgets_init' );



add_action( 'init', 'add_taxonomies_to_pages' );



update_option( 'siteurl', 'http://www.republicasrj.com.br/' );



update_option( 'home', 'http://www.republicasrj.com.br/' );




?>