</div><!-- #content -->

<footer id="footer" class="footer section text-center" role="contentinfo">
  <div class="container-content">
  <?php
    if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
    <div class="widget-area">
      <?php dynamic_sidebar( 'sidebar-footer' ); ?>
    </div>
  <?php endif;?>

  <p class="text-small">    
    <?php 
      printf( esc_html__( 'Built with %1$s theme for %2$s.', 'mmtheme' ), '<a href="https://templateflip.com/wordpress/mmtheme/" target="_blank">Minimal Modern</a>', '<a href="https://wordpress.org" target="_blank">WordPress</a>' ); ?>
  </p>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
