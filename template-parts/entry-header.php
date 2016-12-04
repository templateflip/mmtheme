<?php if ( get_edit_post_link() ) : ?>
  <div class="clearfix">
    <h1 class="entry-title">
      <?php the_title(); ?>
    </h1>
  </div>
<?php else : ?>
  <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
<?php endif; ?>