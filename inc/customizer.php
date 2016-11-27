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

    $wp_customize->add_setting('content_style', array('default' => 'm'));
    $wp_customize->add_control('content_style', array(
      'label'      => __('Content Display Style', 'mmtheme'),
      'section'    => 'layout',
      'settings'   => 'content_style',
      'type'       => 'radio',
      'choices'    => array(
        'm'   => 'Minimal',
        'b'   => 'Cards with Borders',
        's'   => 'Cards with Shadows'
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
  $custom_css = '';
  $custom_color_css = mmtheme_get_custom_color_css();
  $custom_layout_css = mmtheme_get_custom_layout_css();

  $custom_css = $custom_color_css . $custom_layout_css;

  if(!empty($custom_css)) {
	  wp_add_inline_style( 'mmtheme-style', $custom_css );
  }
});

/**
 * Returns CSS for customized colors.
 */
function mmtheme_get_custom_color_css() {
  $primary_color = get_theme_mod('primary_color');

  // Return blank for default values
  if( $primary_color == '#4078c0' ) {
    return '';
  }

	return <<<CSS
	a,
  nav .current-menu-item a, 
  .entry-title a:hover,  
  .button.button-text:focus, .button.button-text:hover,
  button.button-text:focus,
  button.button-text:hover,
  input[type="button"].button-text:focus,
  input[type="button"].button-text:hover,
  input[type="reset"].button-text:focus,
  input[type="reset"].button-text:hover,
  input[type="submit"].button-text:focus,
  input[type="submit"].button-text:hover {
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


  .button.button-primary:focus, .button.button-primary:hover,
  button.button-primary:focus,
  button.button-primary:hover,
  input[type="button"].button-primary:focus,
  input[type="button"].button-primary:hover,
  input[type="reset"].button-primary:focus,
  input[type="reset"].button-primary:hover,
  input[type="submit"].button-primary:focus,
  input[type="submit"].button-primary:hover {
    background-color: {$primary_color};
    border-color: {$primary_color};
    opacity: 0.9;
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


/**
 * Returns CSS for custom layouts.
 */
function mmtheme_get_custom_layout_css() {
  $content_style = get_theme_mod('content_style');
  $border_color = 'transparent';
  $box_shadow = 'none';
  // Return blank for default values
  if( $content_style == 'm' ) {
    return '';
  }
  if( $content_style == 'b') {
    $border_color = '#f2f2f2';
  }
  elseif ( $content_style == 's' ) {
    $box_shadow = '0 1px 2px 0 rgba(0,0,0,0.08);';
  }

	return <<<CSS
  .entry-image-wrapper {
    margin: -1.5rem -1.5rem 0;
  }
  .content-box {
    background-color: #fff;
    height: 100%;
    width: 100%;
    padding: 1.5rem 1.5rem 0;
    border: 1px solid {$border_color};
    border-radius: 3px;
    box-shadow: {$box_shadow};
    margin-bottom: 20px;
    transition: box-shadow .25s ease-out;
  }
  
  .blogroll article {  
    height: 100%;
    width: 100%;
    margin-bottom: 0;
    padding-bottom: 2.5rem;
  }
  .blogroll .content-box:hover {
    box-shadow: 0 10px 20px 0 rgba(0,0,0,0.08);
  }
  .single main .content-box {
    padding: 1.5rem 2rem 2rem;
    margin-bottom: 2rem;
  }
CSS;
}