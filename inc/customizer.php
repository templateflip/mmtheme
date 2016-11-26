<?php
/**
* Add postMessage support for site title and description for the Theme Customizer.
*/
add_action('customize_register', function ( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    $wp_customize->add_section('layout' , array(
        'title' => __('Layout','mmtheme'),
    ));

    $wp_customize->add_setting('blog_layout', array('default' => '3'));
    $wp_customize->add_control('blog_layout', array(
      'label'      => __('Blog Layout', 'mmtheme'),
      'section'    => 'layout',
      'settings'   => 'blog_layout',
      'type'       => 'radio',
      'choices'    => array(
        '3'   => '3 Columns, No Sidebar',
        '2-s' => '2 Columns with Sidebar',
        '2'   => '2 Columns, No Sidebar',
        '1-s' => '1 Column with Sidebar',
        '1'   => '1 Column, No sidebar'
      ),
    ));

    $wp_customize->add_setting('post_layout', array('default' => 'n'));
    $wp_customize->add_control('post_layout', array(
      'label'      => __('Post Layout', 'mmtheme'),
      'section'    => 'layout',
      'settings'   => 'post_layout',
      'type'       => 'radio',
      'choices'    => array(
        'n-s' => 'Narrow with Sidebar',
        'n'   => 'Narrow without Sidebar',
        'w'   => 'Wide without Sidebar'
      ),
    ));

    $wp_customize->add_setting('page_layout', array('default' => 'n'));
    $wp_customize->add_control('page_layout', array(
      'label'      => __('Page Layout', 'mmtheme'),
      'section'    => 'layout',
      'settings'   => 'page_layout',
      'type'       => 'radio',
      'choices'    => array(
        'n-s' => 'Narrow with Sidebar',
        'n'   => 'Narrow without Sidebar',
        'w'   => 'Wide without Sidebar'
      ),
    ));
});

/**
* Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
*/
add_action( 'customize_preview_init', function () {
    wp_enqueue_script('mmtheme_customizer', mmtheme_asset_path('/js/customizer.js'), ['customize-preview'], null, true );
});