<?php
get_header(); ?>
<div class="container-readable">
  <main role="main">
    <header>
      <h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mmtheme' ); ?></h1>
    </header>

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
