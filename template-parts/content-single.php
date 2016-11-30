<article <?php post_class(); ?>>
  <div class="content-box">
    <header class="entry-header">    
      <?php get_template_part('template-parts/entry-header'); ?>
      <div class="entry-meta">
        <?php get_template_part('template-parts/entry-meta'); ?>
      </div>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <div class="entry-meta">
    <?php
      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list( __( ', ', 'mmtheme' ) );
      
      /* translators: used between list items, there is a space after the comma */
      $tag_list = get_the_tag_list( '', __( ', ', 'mmtheme' ) );

      $footer_meta = '';
      if ( '' != $categories_list ) {
         $footer_meta .= sprintf(__( 'Posted in: %1$s <br>', 'mmtheme' ), $categories_list);
      } 

      if ( '' != $tag_list ) {
        $footer_meta .= sprintf(__( 'Tags: %1$s', 'mmtheme' ), $tag_list);
      }

      if( '' != $footer_meta) {
        echo '<p>' . $footer_meta . '</p>';
      }
    ?>
    </div>
    <footer>
      <?php wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mmtheme' ),
          'after'  => '</div>',
        ) ); ?>
    </footer>
  </div>
</article>