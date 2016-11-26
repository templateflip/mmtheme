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

    // array to hold color settings that can be customized by user
    $colors = array();
    $colors[] = array(
      'slug'=>'primary_color', 
      'default' => '#4078c0',
      'label' => __('Primary Color', 'mmtheme')
    );

    foreach( $colors as $color ) {
      $wp_customize->add_setting($color['slug'], array('default' => $color['default']));
      $wp_customize->add_control(
        new WP_Customize_Color_Control(
          $wp_customize,
          $color['slug'], 
          array('label' => $color['label'], 
          'section' => 'colors',
          'settings' => $color['slug'])
        )
      );
    }

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

/**
* Enqueues front-end CSS for color scheme.
*/
add_action( 'wp_enqueue_scripts', function () {
  $inline_css = mmtheme_get_inline_css();

  if(!empty($inline_css)) {
	  wp_add_inline_style( 'mmtheme-style', $inline_css );
  }
});

/**
 * Returns CSS for customized styles.
 */
function mmtheme_get_inline_css() {
  $primary_color = get_theme_mod('primary_color');

  if( $primary_color == '#4078c0' ) {
    return '';
  }

	return <<<CSS
	a,
  nav .current-menu-item a, 
  .entry-title a:hover {
		color: {$primary_color};
	}

  .label.label-primary {
    background-color: {$primary_color};
  }

  .button.button-primary,
  button.button-primary,
  input[type="button"].button-primary,
  input[type="reset"].button-primary,
  input[type="submit"].button-primary {
    background-color: {$primary_color};
    border-color: {$primary_color};
  }

  input[type="email"]:focus,
  input[type="number"]:focus,
  input[type="password"]:focus,
  input[type="search"]:focus,
  input[type="tel"]:focus,
  input[type="text"]:focus,
  input[type="url"]:focus,
  select:focus,
  textarea:focus {
    border: 1px solid {$primary_color};
  }
CSS;
}