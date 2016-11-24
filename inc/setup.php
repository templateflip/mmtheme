<?php
/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('mmtheme-style', get_template_directory_uri() . '/css/main.css', false, null);    
  if ( is_singular() && comments_open() && get_option('thread_comments') ) {
    wp_enqueue_script('comment-reply');
  }
}, 100);

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

	// Register navigation menus
	register_nav_menus( [
		'primary' => __('Primary', 'mmtheme')
  ]);

	// Enable HTML5 markup support
	add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  add_editor_style(get_template_directory_uri() . '/css/main.css');
});

/**
 * Register sidebars.
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'mmtheme'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'mmtheme'),
        'id'            => 'sidebar-footer'
    ] + $config);
});