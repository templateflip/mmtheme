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
    <div class="section clearfix text-small">
      <?php the_posts_navigation(array(
        'prev_text'          => __( 'Older Posts &rarr;', 'mmtheme' ),
        'next_text'          => __( '&larr; Newer Posts', 'mmtheme' ),
      )); ?>
    </div>
  <?php else : ?>
    <p><?php esc_html_e( 'Sorry,  no results were found.', 'mmtheme' ); ?></p>
    <?php
      get_search_form();
endif; ?>