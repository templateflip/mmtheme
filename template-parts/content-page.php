<article <?php post_class(); ?>>
  <div class="content-box">
    
    <?php if(!get_theme_mod('page_title_subheader', true)) : ?>
    <header class="entry-header">
      <?php get_template_part('template-parts/entry-header'); ?>
    </header>
    <?php endif; ?>
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
