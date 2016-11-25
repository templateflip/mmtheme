<?php if ( get_edit_post_link() ) : ?>
  <div class="clearfix">
    <h1 class="entry-title">
      <?php the_title(); ?>
      <?php
        edit_post_link(
          sprintf(
            /* translators: %s: Name of current post */
            esc_html__( 'Edit %s', 'mmtheme' ),
            the_title( '<span class="screen-reader-text">"', '"</span>', false )
          ),
          '<p class="edit-link alignright entry-meta text-small">',
          '</p>'
        );
      ?>
    </h1>
  </div>
<?php else : ?>
  <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
<?php endif; ?>