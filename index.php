<?php
get_header(); 

$blog_layout = get_theme_mod('blog_layout', '3');
$index_post_class = 'one-full';
$index_container = '';
$has_sidebar = ($blog_layout == '1-s' || $blog_layout == '2-s');
if ($blog_layout == '1') {
  $index_container = 'container-readable';
}
elseif ($blog_layout == '2') {
  $index_post_class = 'one-half';
  $index_container = 'container-content';
}
elseif ($blog_layout == '2-s') {
  $index_post_class = 'one-half';
}
elseif ($blog_layout == '3') {
  $index_post_class = 'one-third';
  $index_container = 'container-content';
}
if ( $has_sidebar ) :
?>
  <div id="wrapper" class="container-content">
    <div id="content-wrapper">
      <div id="page-content">
<?php endif; ?>

	<div class="<?php echo $index_container; ?>">
		<main role="main">      
        <?php
          if(!get_theme_mod('index_title_subheader', true)) {
            get_template_part('template-parts/page-header');
          }
        ?>        
        <?php
          if ( have_posts() ) : ?>
          <div class="grid blogroll">
            <?php
            while ( have_posts() ) : the_post();  ?>
              <div class="<?php echo $index_post_class; ?>">
                <?php	get_template_part( 'template-parts/content', get_post_format()) ?>
              </div>
            <?php
            endwhile;
            ?>
          </div>
            <div class="section clearfix">
              <?php 
                /*the_posts_navigation(array(
                  'prev_text'          => __( 'Older Posts &rarr;', 'mmtheme' ),
                  'next_text'          => __( '&larr; Newer Posts', 'mmtheme' ),
                ));*/
                the_posts_pagination( array(
                  'mid_size'  => 1,
                  'prev_text' => __( '&larr; Previous', 'mmtheme' ),
                  'next_text' => __( 'Next &rarr;', 'mmtheme' ),
                ) );
              ?>
            </div>
          <?php else : ?>
            <p><?php esc_html_e( 'Sorry,  no results were found.', 'mmtheme' ); ?></p>
            <?php
              get_search_form();
        endif; ?>
		</main>
	</div>

<?php
if ( $has_sidebar ) :
?>
      </div>
    </div>
<?php endif; 

if( $has_sidebar ) {
  get_sidebar();
}

if ( $has_sidebar ) :
?>
  </div>
<?php endif; 

get_footer();