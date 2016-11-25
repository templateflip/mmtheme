<article <?php post_class(); ?>>
  <header class="entry-header">    
	  <?php get_template_part('template-parts/entry-header'); ?>
    <?php get_template_part('template-parts/entry-meta'); ?>
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
</article>