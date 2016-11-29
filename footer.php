</div><!-- #content -->
<?php
  $footer_layout = get_theme_mod('footer_layout');
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
<footer id="footer" class="footer section" role="contentinfo">
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
    
    <p class="text-small text-center">    
      <?php 
        printf( esc_html__( '%1$s theme for %2$s.', 'mmtheme' ), '<a href="https://templateflip.com/wordpress/mmtheme/" target="_blank">Minimal Modern</a>', '<a href="https://wordpress.org" target="_blank">WordPress</a>' ); ?>
    </p>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
