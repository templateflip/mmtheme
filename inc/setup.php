<?php
/**
* Theme assets
*/
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('mmtheme-style', mmtheme_asset_path('/css/main.css'), false, null);
    if ( is_singular() && comments_open() && get_option('thread_comments') ) {
        wp_enqueue_script('comment-reply');
    }
});

/**
* Theme setup
*/
add_action('after_setup_theme', function () {
    load_theme_textdomain('mmtheme', get_template_directory() . '/languages');
    
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title.
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    add_image_size('small_thumb', 500, 0 );
    add_image_size('large_thumb', 800, 0 );

    // add theme support for custom logos
    add_theme_support( 'custom-logo', array(
      'height'      => 104,
      'width'       => 300,
      'flex-width' => true,
    ) );
    
    // Register navigation menus
    register_nav_menus( [
    'primary' => __('Primary', 'mmtheme'),    
    'footer' => __('Footer', 'mmtheme')
    ]);
    
    // Enable HTML5 markup support
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'mmtheme_custom_background_args', array(
      'default-color' => 'ffffff'
    ) ) );
    
    // Use main stylesheet for visual editor
    add_editor_style(mmtheme_asset_path('/css/main.css'));
});

/**
* Register sidebars.
*/
add_action('widgets_init', function () {
    $config = [
      'before_widget' => '<section class="widget %1$s %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h3 class="h4 widget-title">',
      'after_title'   => '</h3>'
    ];
    register_sidebar([
      'name'          => __('Header', 'mmtheme'),
      'id'            => 'header'
    ] + $config);
    register_sidebar([
      'name'          => __('Below Header', 'mmtheme'),
      'id'            => 'below-header'
    ] + $config);
    register_sidebar([
      'name'          => __('Sidebar', 'mmtheme'),
      'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
      'name'          => __('Post Footer', 'mmtheme'),
      'id'            => 'post-footer'
    ] + $config);
    register_sidebar([
      'name'          => __('Below Post', 'mmtheme'),
      'id'            => 'below-post'
    ] + $config);
    register_sidebar([
      'name'          => __('Footer 1', 'mmtheme'),
      'id'            => 'sidebar-footer-1'
    ] + $config);
    register_sidebar([
      'name'          => __('Footer 2', 'mmtheme'),
      'id'            => 'sidebar-footer-2'
    ] + $config);
    register_sidebar([
      'name'          => __('Footer 3', 'mmtheme'),
      'id'            => 'sidebar-footer-3'
    ] + $config);
    register_sidebar([
      'name'          => __('Footer 4', 'mmtheme'),
      'id'            => 'sidebar-footer-4'
    ] + $config);

    // Register widgets
    register_widget('MMtheme_Ads_Widget');
});