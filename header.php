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
          <div class="<?php echo $menu_class?>">
            <nav role="navigation">
              <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            </nav>
            <?php if ($header_layout == 'c') : ?>
              <div class="expandable-search">
                <?php get_search_form(); ?>
              </div>
            <?php endif; ?>
          </div>
          <?php if ($display_header_sidebar && is_active_sidebar( 'header' )) : ?>
          <div class="header-right">
            <?php dynamic_sidebar( 'header' ); ?>
            <div class="expandable-search">
              <?php get_search_form(); ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </header>
  <?php 
    get_template_part('template-parts/subheader');
  
    if (is_active_sidebar( 'below-header' )) :
  ?>
  <aside class="widget-area below-header">
    <?php dynamic_sidebar( 'below-header' ); ?>
  </aside>
  <?php endif; ?>
	<div class="animated fadeIn" id="content">
