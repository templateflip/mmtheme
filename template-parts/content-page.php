<article <?php post_class(); ?>>
  <div class="content-box">
    <header class="entry-header">
      <?php get_template_part('template-parts/entry-header'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages( array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mmtheme' ),
          'after'  => '</div>',
        ) ); ?>
    </footer>
  </div>
</article>
