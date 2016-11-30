<?php
/**
* Add postMessage support for site title and description for the Theme Customizer.
*/
add_action('customize_register', function ( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

    // Colors section
    $colors = mmtheme_get_custom_colors();

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

    // Layout section
    $wp_customize->add_section('layout' , array(
        'title' => __('Layout','mmtheme'),
    ));

    
    $wp_customize->add_setting('header_layout', array('default' => 'f'));
    $wp_customize->add_control('header_layout', array(
      'label'      => __('Header Layout', 'mmtheme'),
      'section'    => 'layout',
      'settings'   => 'header_layout',
      'type'       => 'select',
      'choices'    => array(
        'f'   => 'Full Width',
        'c'   => 'Conaitner width'
      ),
    ));

    $wp_customize->add_setting('blog_layout', array('default' => '3'));
    $wp_customize->add_control('blog_layout', array(
      'label'      => __('Blog Layout', 'mmtheme'),
      'section'    => 'layout',
      'settings'   => 'blog_layout',
      'type'       => 'select',
      'choices'    => array(
        '3'   => '3 Columns, No Sidebar',
        '2-s' => '2 Columns with Sidebar',
        '2'   => '2 Columns, No Sidebar',
        '1-s' => '1 Column with Sidebar',
        '1'   => '1 Column, No sidebar'
      ),
    ));

    $wp_customize->add_setting('content_style', array('default' => 'm'));
    $wp_customize->add_control('content_style', array(
      'label'      => __('Content Display Style', 'mmtheme'),
      'section'    => 'layout',
      'settings'   => 'content_style',
      'type'       => 'select',
      'choices'    => array(
        'm'   => 'Minimal',
        'b'   => 'Cards with Borders',
        's'   => 'Cards with Shadows'
      ),
    ));

    $wp_customize->add_setting('post_layout', array('default' => 'n'));
    $wp_customize->add_control('post_layout', array(
      'label'      => __('Post Layout', 'mmtheme'),
      'section'    => 'layout',
      'settings'   => 'post_layout',
      'type'       => 'select',
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
      'type'       => 'select',
      'choices'    => array(
        'n-s' => 'Narrow with Sidebar',
        'n'   => 'Narrow without Sidebar',
        'w'   => 'Wide without Sidebar'
      ),
    ));

    $wp_customize->add_setting('footer_layout', array('default' => '1'));
    $wp_customize->add_control('footer_layout', array(
      'label'      => __('Footer Layout', 'mmtheme'),
      'section'    => 'layout',
      'settings'   => 'footer_layout',
      'type'       => 'select',
      'choices'    => array(
        '1'   => 'Single Cloumn',
        '2'   => 'Two Columns',
        '3'   => 'Three Columns',
        '4'   => 'Four Columns'
      ),
    ));

    
    // Dimensions section
    $wp_customize->add_section('dimension' , array(
        'title' => __('Dimensions','mmtheme'),
    ));

    $wp_customize->add_setting('header_height', array('default' => '72'));
    $wp_customize->add_control( 'header_height', array(
      'type' => 'number',
      'section' => 'dimension',
      'label' => __( 'Header Height (in px)' ),
      'input_attrs' => array(
        'min' => 52,
        'max' => 720,
        'step' => 1,
      ),
    ) );

    
    $wp_customize->add_setting('featured_image_height', array('default' => '250'));
    $wp_customize->add_control( 'featured_image_height', array(
      'type' => 'number',
      'section' => 'dimension',
      'label' => __( 'Featured Image Height (in px)' ),
      'input_attrs' => array(
        'min' => 0,
        'max' => 720,
        'step' => 1,
      ),
    ) );

    // Modules section
    $wp_customize->add_section('elements' , array(
        'title' => __('Page Elements','mmtheme'),
    ));

    
    $wp_customize->add_setting('site_tagline_visiblity', array('default' => '2'));
    $wp_customize->add_control('site_tagline_visiblity', array(
      'label'      => __('Site Tagline', 'mmtheme'),
      'section'    => 'elements',
      'settings'   => 'site_tagline_visiblity',
      'type'       => 'select',
      'choices'    => array(
        '1'   => 'Hide',
        '2'   => 'Show on Homepage',
        '3'   => 'Show on All pages'
      ),
    ));

    $wp_customize->add_setting('about_author_visiblity', array('default' => '2'));
    $wp_customize->add_control('about_author_visiblity', array(
      'label'      => __('About the Author', 'mmtheme'),
      'section'    => 'elements',
      'settings'   => 'about_author_visiblity',
      'type'       => 'select',
      'choices'    => array(
        '1'   => 'Hide',
        '2'   => 'Show on Posts'
      ),
    ));

    // Advanced section
    $wp_customize->add_section('advanced' , array(
        'title' => __('Advanced Settings','mmtheme'),
    ));

    $wp_customize->add_setting('custom_theme_css', array('default' => ''));
    $wp_customize->add_control('custom_theme_css', array(
      'label'      => __('Custom Theme CSS', 'mmtheme'),
      'section'    => 'advanced',
      'settings'   => 'custom_theme_css',
      'type'       => 'textarea'
    ));

    $wp_customize->add_setting('custom_head_code', array('default' => ''));
    $wp_customize->add_control('custom_head_code', array(
      'label'      => __('Custom Head Code', 'mmtheme'),
      'section'    => 'advanced',
      'settings'   => 'custom_head_code',
      'type'       => 'textarea'
    ));
    
    $wp_customize->add_setting('custom_copyright', array('default' => ''));
    $wp_customize->add_control('custom_copyright', array(
      'label'      => __('Custom copyright text in footer', 'mmtheme'),
      'section'    => 'advanced',
      'settings'   => 'custom_copyright',
      'type'       => 'textarea'
    ));
    
    $wp_customize->add_setting('credit_display', array('default' => true));
    $wp_customize->add_control('credit_display', array(
      'label'      => __('Display credit in footer', 'mmtheme'),
      'section'    => 'advanced',
      'settings'   => 'credit_display',
      'type'       => 'checkbox'
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
  $custom_color_css = '';
  $colors = mmtheme_get_custom_colors();
  foreach( $colors as $color ) {
    $value = get_theme_mod($color['slug']);
    if( $value != $color['default'] ) {
      $custom_color_css = $custom_color_css . mmtheme_get_custom_color_css($color['slug'], $value);
    }
  }
  $custom_dimension_css = mmtheme_get_custom_dimension_css();
  $custom_layout_css = mmtheme_get_custom_layout_css();
  $custom_user_css = get_theme_mod('custom_theme_css');

  $custom_css = $custom_color_css . $custom_dimension_css . $custom_layout_css . $custom_user_css;

  if(!empty($custom_css)) {
	  wp_add_inline_style( 'mmtheme-style', $custom_css );
  }
});


/**
* Enqueues custom code in heade.
*/
add_action( 'wp_head', function () {

  $custom_head_code = get_theme_mod('custom_head_code');
  
  if(!empty($custom_head_code)) {
	  echo  $custom_head_code;
  }
});

/**
 * Returns array containing settings for customizable colors.
 */
function mmtheme_get_custom_colors() {
  $colors = array();
  $colors[] = array(
    'slug'=>'primary_color', 
    'default' => '#2196f3',
    'label' => __('Primary Color', 'mmtheme')
  );
  $colors[] = array(
    'slug'=>'header_background_color', 
    'default' => '#ffffff',
    'label' => __('Header Background Color', 'mmtheme')
  );
  $colors[] = array(
    'slug'=>'header_text_color', 
    'default' => '#444444',
    'label' => __('Header Text Color', 'mmtheme')
  );  
  $colors[] = array(
    'slug'=>'subheader_background_color', 
    'default' => '#fafafa',
    'label' => __('Sub-Header Background Color', 'mmtheme')
  );
  $colors[] = array(
    'slug'=>'subheader_text_color', 
    'default' => '#444444',
    'label' => __('Sub-Header Text Color', 'mmtheme')
  );
  $colors[] = array(
    'slug'=>'footer_background_color', 
    'default' => '#fafafa',
    'label' => __('Footer Background Color', 'mmtheme')
  );
  $colors[] = array(
    'slug'=>'footer_text_color', 
    'default' => '#919191',
    'label' => __('Footer Text Color', 'mmtheme')
  );
  $colors[] = array(
    'slug'=>'footer_link_color', 
    'default' => '#5e5e5e',
    'label' => __('Footer Links Color', 'mmtheme')
  );
  return $colors;
}

/**
 * Returns CSS for customized colors.
 */
function mmtheme_get_custom_color_css($type, $value) {
  if( $type == 'primary_color') {
    return <<<CSS
    a,
    nav .current-menu-item > a, 
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
      color: {$value};
    }

    .label.label-primary {
      background-color: {$value};
    }

    .button.button-primary,
    button.button-primary,
    input[type="button"].button-primary,
    input[type="reset"].button-primary,
    input[type="submit"].button-primary {
      background-color: {$value};
      border-color: {$value};
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
      background-color: {$value};
      border-color: {$value};
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
      border: 1px solid {$value};
    }
CSS;
  }
  elseif ($type == 'header_background_color') {
     return <<<CSS
     .header {
       background-color: {$value};
     }
CSS;
  }
  elseif ($type == 'header_text_color') {
     return <<<CSS
     .header,
     .header nav .current-menu-item > a {
       color: {$value};
       border: 0;
     }
CSS;
  }
  elseif ($type == 'subheader_background_color') {
     return <<<CSS
     .sub-header {
       background-color: {$value};
     }
CSS;
  }
  elseif ($type == 'subheader_text_color') {
     return <<<CSS
     .sub-header {
       color: {$value};
     }
CSS;
  }
  elseif ($type == 'footer_background_color') {
     return <<<CSS
     .footer {
       background-color: {$value};
     }
CSS;
  }
  elseif ($type == 'footer_text_color') {
     return <<<CSS
     .footer {
       color: {$value};
     }
CSS;
  }
  elseif ($type == 'footer_link_color') {
     return <<<CSS
     .footer a {
       color: {$value};
     }
CSS;
  }
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
  .single main .content-box, .page main .content-box {
    padding: 1.5rem 2rem 2rem;
    margin-bottom: 2rem;
  }
CSS;
}

/**
 * Returns CSS for custom layouts.
 */
function mmtheme_get_custom_dimension_css() {
  $header_height = get_theme_mod('header_height');
  $featured_image_height = get_theme_mod('featured_image_height');

  $menu_margin = ($header_height - 42) / 2;
  $css = '';
  if ($header_height != 72) {
    $css = <<<CSS
    .header,
    .site-branding img,
    .site-branding .title {
      line-height: {$header_height}px;
      height: {$header_height}px;
    }
    .menu-toggle label {
      margin-top: {$menu_margin}px;
    }
CSS;
  }
  
  if ($featured_image_height != 250) {
    $css .= <<<CSS
    .blogroll .entry-image {
      height: {$featured_image_height}px;
    }
CSS;
  }

  return $css;
}