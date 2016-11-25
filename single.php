<?php
get_header(); ?>
	<div class="<?php echo get_theme_mod('post_layout') == 'w' ? 'container-content' : 'container-readable'; ?>">
		<main role="main">
		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content-single', get_post_format() );
			// the_post_navigation();
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile;
		?>
		</main>
	</div>
<?php
get_sidebar();
get_footer();
