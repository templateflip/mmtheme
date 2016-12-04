<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body id="top" <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mmtheme' ); ?></a>
  <?php
    $header_layout = get_theme_mod('header_layout', 'c');
    $header_container = $header_layout == 'f' ? 'container' : 'container-content';
    $menu_class = $header_layout == 'f' ? '' : 'header-right';
    $display_header_sidebar = $header_layout == 'f';
  ?>
	<header class="header" role="banner">
		<div class="<?php echo $header_container; ?>">
			<div class="header-left">
        <?php mmtheme_site_branding(); ?>        
			</div>
      <div class="menu-toggle">
        <input type="checkbox" id="menu-toggle">
        <label class="header-right" for="menu-toggle">
          <span class="css-icon-hamburger">
            <span><?php esc_html_e( 'Toggle', 'mmtheme' ); ?></span>
          </span>
          <span><?php esc_html_e( 'Menu', 'mmtheme' ); ?></span>
        </label>
        <div class="menu-toggle-content">
          <nav class="<?php echo $menu_class?>" role="navigation">
             <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
          </nav>
          <?php if ($display_header_sidebar && is_active_sidebar( 'header' )) : ?>
          <div class="header-right">
            <?php dynamic_sidebar( 'header' ); ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </header>
	<?php
  $sub_header_text = "";
  $sub_header_class = "";
  if(is_front_page() && is_home() && get_theme_mod('site_tagline_visiblity', true)) {
    $sub_header_text = get_bloginfo( 'description', 'display' );
    $sub_header_class = "h2 site-description";
  }
  else if(((is_archive() || is_search()) && get_theme_mod('index_title_subheader', true))
    || (is_single() && get_theme_mod('post_title_subheader', false))
    || (is_page() && get_theme_mod('page_title_subheader', true))
  ) {
    $sub_header_text = mmtheme_title();
    $sub_header_class = "entry-title";
  }

	if ( !empty($sub_header_text) ) : ?>
    <div class="sub-header section-medium highlight text-center">
      <div class="container-readable">
        <h1 class="<?php echo $sub_header_class; ?>"><?php echo $sub_header_text; /* WPCS: xss ok. */ ?></h1>
      </div>
    </div>
  <?php
	endif; ?>

  <?php 
    if (is_active_sidebar( 'below-header' )) :
  ?>
  <aside class="widget-area below-header">
    <?php dynamic_sidebar( 'below-header' ); ?>
  </aside>
  <?php endif; ?>
	<div class="animated fadeIn" id="content">
