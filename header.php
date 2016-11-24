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
        <a class="site-branding" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <?php if ( is_front_page() && is_home() ) : ?>
            <h1 class="title"><?php bloginfo( 'name' ); ?></h1>
				  <?php else : ?>
            <span class="title"><?php bloginfo( 'name' ); ?></span>
				  <?php endif; ?>
        </a>
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
          </nav><!-- #site-navigation -->
          <div class="header-right">
            <?php get_search_form( true ); ?>
          </div>
        </div>
		</div><!-- .container -->
	</header><!-- #header -->
	<?php
	if ( is_front_page() && is_home() ) :
		$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<div class="sub-header section-medium highlight text-center">
					<div class="container-content">
						<h2 class="site-description h1"><?php echo $description; /* WPCS: xss ok. */ ?></h2>
					</div>
				</div>
			<?php
			endif;
	endif; ?>

	<div id="content">
