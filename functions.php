<?php 

// =========================================================================
// Remove wordpress adminbar
// =========================================================================
add_filter('show_admin_bar', '__return_false');

// =========================================================================
// Write to debug.log - http://www.stumiller.me/sending-output-to-the-wordpress-debug-log/
// =========================================================================
if ( ! function_exists('antiekuitleen_after_setup_theme') ) {
    
    // Write Log
    function write_log ( $log )  {
        if ( true === WP_DEBUG ) {
            if ( is_array( $log ) || is_object( $log ) ) {
                error_log( print_r( $log, true ) );
            } else {
                error_log( $log );
            }
        }
    }
    
}


// =========================================================================
// Init
// =========================================================================
if ( ! function_exists('antiekuitleen_after_setup_theme') ) {

    // Init
    function antiekuitleen_init() {

        // Register navigation menu's
        register_nav_menus(array(
            'primary' => __( 'Header Navigation', 'antiekuitleen' ),
            'sidebar' => __( 'Sidebar Navigation', 'antiekuitleen' ),
            'footer' => __( 'Footer Navigation', 'antiekuitleen' ),
        ));
        
    }
    add_action('init', 'antiekuitleen_init');

}

// =========================================================================
// Cleaner WordPress
// =========================================================================
if ( ! function_exists('antiekuitleen_cleaner_wordpress') ) {
    
    // Cleaner WordPress
    function antiekuitleen_cleaner_wordpress() {
    
        // Remove WordPress header junk - https://scotch.io/tutorials/removing-wordpress-header-junk
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
        remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );

        // Remove Emoji - http://wordpress.stackexchange.com/questions/185577/disable-emojicons-introduced-with-wp-4-2
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    
    }    
    add_action( 'init', 'antiekuitleen_cleaner_wordpress' );

}


// =========================================================================
// Enqueue scripts
// =========================================================================
if ( ! function_exists('antiekuitleen_enqueue_scripts') ) {
    
    // Enqueue scripts
    function antiekuitleen_enqueue_scripts() {

        wp_enqueue_script('antiekuitleen_html5shiv', get_template_directory_uri() . '/js/vendor/html5shiv.min.js', array(), '3.7.3', true);
        wp_enqueue_script('antiekuitleen_console', get_template_directory_uri() . '/js/console.min.js', array(), false, true);
        wp_enqueue_script('antiekuitleen_main', get_template_directory_uri() . '/js/main.js', array('jquery'), false, true);

    }
    add_action('wp_enqueue_scripts', 'antiekuitleen_enqueue_scripts');
    
}


// =========================================================================
// Enqueue styles
// =========================================================================
if ( ! function_exists('antiekuitleen_enqueue_styles') ) {
    
    // Enqueue styles
    function antiekuitleen_enqueue_styles() {

        wp_enqueue_style('antiekuitleen_normalize', get_template_directory_uri() . '/css/normalize.min.css', array(), '3.0.3', 'all');
        wp_enqueue_style('antiekuitleen_wp', get_template_directory_uri() . '/css/vendor/wp.min.css', array(), false, 'all');
        wp_enqueue_style('antiekuitleen_style', get_stylesheet_uri(), array('antiekuitleen_normalize'), false, 'all');

    }
    add_action('wp_enqueue_scripts', 'antiekuitleen_enqueue_styles');
    
}


// =========================================================================
// After setup theme
// =========================================================================
if ( ! function_exists('antiekuitleen_after_setup_theme') ) {

    // After setup theme
    function antiekuitleen_after_setup_theme()  {

        // Add theme support for Automatic Feed Links
        add_theme_support( 'automatic-feed-links' );

        // Add theme support for Post Formats
        add_theme_support( 'post-formats', array( 'gallery', 'video' ) );

        // Add theme support for Featured Images
        add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

        // Add theme support for HTML5 Semantic Markup
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

        // Add theme support for document Title tag
        add_theme_support( 'title-tag' );

        // Add theme support for custom CSS in the TinyMCE visual editor
        add_editor_style();

        // Add theme support for Translation
        load_theme_textdomain( 'antiekuitleen', get_template_directory() . '/languages' );
    
    }
    add_action( 'after_setup_theme', 'antiekuitleen_after_setup_theme' );

}

// =========================================================================
// Register custom post types
// =========================================================================
function antiekuitleen_register_custom_post_types() {

    $labels = array(
        'name'                  => _x( 'Antiek Objecten', 'Post Type General Name', 'antiekuitleen' ),
        'singular_name'         => _x( 'Antiek Object', 'Post Type Singular Name', 'antiekuitleen' ),
        'menu_name'             => __( 'Antiek Objecten', 'antiekuitleen' ),
        'name_admin_bar'        => __( 'Antiek Objecten', 'antiekuitleen' ),
        'archives'              => __( 'Antiek Objecten archieven', 'antiekuitleen' ),
        'parent_item_colon'     => __( 'Parent Item', 'antiekuitleen' ),
        'all_items'             => __( 'Alle objecten', 'antiekuitleen' ),
        'add_new_item'          => __( 'Voeg nieuw object toe', 'antiekuitleen' ),
        'add_new'               => __( 'Nieuw object toevoegen', 'antiekuitleen' ),
        'new_item'              => __( 'Nieuw object', 'antiekuitleen' ),
        'edit_item'             => __( 'Bewerk object', 'antiekuitleen' ),
        'update_item'           => __( 'Update object', 'antiekuitleen' ),
        'view_item'             => __( 'Bekijk object', 'antiekuitleen' ),
        'search_items'          => __( 'Zoek objecten', 'antiekuitleen' ),
        'not_found'             => __( 'Niet gevonden', 'antiekuitleen' ),
        'not_found_in_trash'    => __( 'Niet gevonden in de prullenbak', 'antiekuitleen' ),
        'featured_image'        => __( 'Uitgelichte afbeelding', 'antiekuitleen' ),
        'set_featured_image'    => __( 'Uitgelichte afbeelding instellen', 'antiekuitleen' ),
        'remove_featured_image' => __( 'Verwijder uitgelichte afbeelding', 'antiekuitleen' ),
        'use_featured_image'    => __( 'Gebruik als uitgelichte afbeelding', 'antiekuitleen' ),
        'insert_into_item'      => __( 'Invoegen in object', 'antiekuitleen' ),
        'uploaded_to_this_item' => __( 'Uploaded naar dit object', 'antiekuitleen' ),
        'items_list'            => __( 'Antiek objecten lijst', 'antiekuitleen' ),
        'items_list_navigation' => __( 'Antiek objecten lijst navigatie', 'antiekuitleen' ),
        'filter_items_list'     => __( 'Filter antiek objecten', 'antiekuitleen' ),
    );
    $args = array(
        'label'                 => __( 'Antiek object', 'antiekuitleen' ),
        'description'           => __( 'Antiek objecten post type', 'antiekuitleen' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-store',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,        
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'antiek objecten', $args );

}
add_action( 'init', 'antiekuitleen_register_custom_post_types', 0 ); 
?>