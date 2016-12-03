</div><!-- #content -->
<?php
  $footer_layout = get_theme_mod('footer_layout', '1');
  $footer_class = 'one-full';
  if( $footer_layout == '2' ) {
    $footer_class = 'one-half';
  }
  else if( $footer_layout == '3' ) {
    $footer_class = 'one-third';
  }
  else if( $footer_layout == '4' ) {
    $footer_class = 'one-fourth';
  }
  ?> 
<footer id="footer" class="footer" role="contentinfo">
  <div class="container-content">
    <div class="grid">
    <?php
      if ( is_active_sidebar( 'sidebar-footer-1' ) ) : ?>
      <div class="<?php echo $footer_class; ?> widget-area">
        <?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
      </div>
    <?php endif;?>
    <?php
      if ( is_active_sidebar( 'sidebar-footer-2' ) ) : ?>
      <div class="<?php echo $footer_class; ?> widget-area">
        <?php dynamic_sidebar( 'sidebar-footer-2' ); ?>
      </div>
    <?php endif;?>
    <?php
      if ( is_active_sidebar( 'sidebar-footer-3' ) ) : ?>
      <div class="<?php echo $footer_class; ?> widget-area">
        <?php dynamic_sidebar( 'sidebar-footer-3' ); ?>
      </div>
    <?php endif;?>
    <?php
      if ( is_active_sidebar( 'sidebar-footer-4' ) ) : ?>
      <div class="<?php echo $footer_class; ?> widget-area">
        <?php dynamic_sidebar( 'sidebar-footer-4' ); ?>
      </div>
    <?php endif;?>
    </div>
    <?php if ( has_nav_menu( 'footer' ) ) : ?>
      <div class="section">
        <nav class="text-center">
          <?php  wp_nav_menu( array( 'theme_location' => 'footer', "menu_class" => 'menu footer-menu' ) ); ?>
        </nav>
      </div>
    <?php endif; ?>
  </div>
  <div class="footer-credit section">
    <div class="container-content">
      <div class="text-small text-center">
        <?php 
          $copyright = get_theme_mod('custom_copyright', '');
          if ( !empty($copyright) ) {
            echo $copyright.'<br>';
          }
          else {
        ?>
          Copyright &copy; <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>, All rights reserved.<br>
        <?php
          }
          if ( get_theme_mod('credit_display', true) ) {
            printf( esc_html__( 'Powered by %1$s. Theme by %2$s.', 'mmtheme' ), '<a href="https://wordpress.org" target="_blank">WordPress</a>', '<a href="https://templateflip.com/" target="_blank">TemplateFlip</a>' );
          }
        ?>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
