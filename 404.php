<?php
get_header(); ?>
  <main role="main">
    <header>
      <h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mmtheme' ); ?></h1>
    </header><!-- .page-header -->

    <div>
      <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'mmtheme' ); ?></p>

      <?php
        get_search_form();
      ?>

    </div><!-- .page-content -->
  </main><!-- #main -->

<?php
get_footer();
