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

	<header class="header" role="banner">
		<div class="container">
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
          <nav role="navigation">
             <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
          </nav>
          <div class="header-right">
            <?php dynamic_sidebar( 'header' ); ?>
          </div>
        </div>
      </div>
    </header>
	<?php
	if ( is_front_page() && is_home() ) :
		$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<div class="sub-header section-medium highlight text-center">
					<div class="container-content">
						<h2 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h2>
					</div>
				</div>
			<?php
			endif;
	endif; ?>

	<div class="animated fadeIn" id="content">
