<?php
get_header(); ?>
<div class="container-readable">
  <main role="main">    
    <?php get_template_part('template-parts/page-header'); ?>     

    <div>
      <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'mmtheme' ); ?></p>
      <?php
        get_search_form();
      ?>
    </div>
  </main>
</div>
<?php
get_footer();
