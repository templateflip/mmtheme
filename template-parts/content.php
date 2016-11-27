<article <?php post_class(); ?>>
  <div class="content-box">
    <header class="entry-header">
      <?php
        $thumb_type = "";
        if ( has_post_thumbnail() ) {
          $blog_layout = get_theme_mod('blog_layout');
          if( $blog_layout == "1" || $blog_layout == "1-s" ) {
            $thumb_type = "large_thumb";
          }
          else {
            $thumb_type = "small_thumb";
          }
        }

        if (!empty($thumb_type)) :
        ?>
          <a href="<?= esc_url(get_permalink()) ?>">
            <div class="entry-image" style="background-image: url(<?=the_post_thumbnail_url()?>)">
              <?php the_post_thumbnail($thumb_type); ?>
            </div>
          </a>
        <?php endif;

        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

        if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
          <?php get_template_part('template-parts/entry-meta'); ?>
        </div>
        <?php
        endif; ?>
    </header>

    <div class="entry-content">
      <?php
          the_excerpt();
      ?>
    </div>
  </div>
</article>
