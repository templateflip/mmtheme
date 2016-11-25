<?php
get_header(); ?>

	<div class="container-readable">
		<main role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'mmtheme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>

			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main>
	</section>

<?php
get_sidebar();
get_footer();
