<?php
  if ( have_posts() ) : ?>
  <div class="grid">
    <?php
    while ( have_posts() ) : the_post();  ?>
      <div class="one-third">
        <?php	get_template_part( 'template-parts/content', get_post_format()) ?>
      </div>
    <?php
    endwhile;
    ?>
  </div>
  <?php
    the_posts_navigation();
  else : ?>
    <p><?php esc_html_e( 'Sorry,  no results were found.', 'mmtheme' ); ?></p>
    <?php
      get_search_form();
endif; ?>