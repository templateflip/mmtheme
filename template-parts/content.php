<article <?php post_class(); ?>>
  <div class="content-box">
    <header class="entry-header">
      <?php
        $thumb_type = "";
        if ( has_post_thumbnail() ) {
          $blog_layout = get_theme_mod('blog_layout', '3');
          if( $blog_layout == "1" || $blog_layout == "1-s" ) {
            $thumb_type = "large_thumb";
          }
          else {
            $thumb_type = "small_thumb";
          }
        }

        if (!empty($thumb_type)) :
        ?>
          <a class="entry-image-wrapper" href="<?= esc_url(get_permalink()) ?>">
            <div class="entry-image" style="background-image: url(<?=the_post_thumbnail_url($thumb_type)?>)">
              <?php the_post_thumbnail($thumb_type); ?>
            </div>
          </a>
        <?php else : ?>
          <a class="entry-image-wrapper" href="<?= esc_url(get_permalink()) ?>">
            <div class="entry-image">
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
        $post_excerpt_setting = get_theme_mod('post_excerpt_setting', '2');
        $show_read_more = get_theme_mod('read_more_visiblity', '2') == '2';
        if($post_excerpt_setting == '2') {
          echo '<p>'.mmtheme_get_excerpt(get_the_content()).'</p>';
        }
        if($post_excerpt_setting == '3') {
          the_excerpt();
        }
        else if($post_excerpt_setting == '4') {
          the_content();
          $show_read_more = false;
        }
        
        if($show_read_more) {
          echo '<p><a class="more-link" href="' . get_permalink() . '">' . __('Read more', 'mmtheme') . '</a></p>'; 
        }
      ?>
    </div>
  </div>
</article>
