<article <?php post_class(); ?>>
	<header class="entry-header">
		<?php
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
</article>
