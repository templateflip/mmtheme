<?php
get_header(); 

$index_post_class = '';
$index_container = 'container-content';
if (get_theme_mod('blog_layout') == '1') {
  $index_container = 'container-readable';
}
elseif (get_theme_mod('blog_layout') == '2' || get_theme_mod('blog_layout') == '2-s') {
  $index_post_class = 'one-half';
}
elseif (get_theme_mod('blog_layout') == '3') {
  $index_post_class = 'one-third';
}
?>

	<div class="<?php echo $index_container; ?>">
		<main role="main">      
        <?php get_template_part('template-parts/page-header'); ?>        
        <?php
          if ( have_posts() ) : ?>
          <div class="grid">
            <?php
            while ( have_posts() ) : the_post();  ?>
              <div class="<?php echo $index_post_class; ?>">
                <?php	get_template_part( 'template-parts/content', get_post_format()) ?>
              </div>
            <?php
            endwhile;
            ?>
          </div>
            <div class="section clearfix text-small">
              <?php the_posts_navigation(array(
                'prev_text'          => __( 'Older Posts &rarr;', 'mmtheme' ),
                'next_text'          => __( '&larr; Newer Posts', 'mmtheme' ),
              )); ?>
            </div>
          <?php else : ?>
            <p><?php esc_html_e( 'Sorry,  no results were found.', 'mmtheme' ); ?></p>
            <?php
              get_search_form();
        endif; ?>
		</main>
	</div>

<?php
get_sidebar();
get_footer();
