<?php
get_header(); ?>

	<div class="container-content">
		<main role="main">      
        <?php get_template_part('template-parts/page-header'); ?>        
        <?php get_template_part('template-parts/post-loop'); ?>
		</main>
	</div>

<?php
get_sidebar();
get_footer();
