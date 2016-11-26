<?php
get_header(); ?>
	<div class="<?php echo get_theme_mod('page_layout') == 'w' ? 'container-content' : 'container-readable'; ?>">
		<main role="main">
    <?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile;
    ?>
		</main>
	</div>
<?php
get_sidebar();
get_footer();
