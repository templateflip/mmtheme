<?php
/**
* Add postMessage support for site title and description for the Theme Customizer.
*/
add_action('customize_register', function ( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
});

/**
* Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
*/
add_action( 'customize_preview_init', function () {
    wp_enqueue_script('mmtheme_customizer', asset_path('/js/customizer.js'), ['customize-preview'], null, true );
});