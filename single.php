<?php
get_header();

$post_layout = get_theme_mod('post_layout', 'n-s');
$has_sidebar = $post_layout == 'n-s';
$post_container = $post_layout == 'n' ? 'container-readable' : '';
$post_container = $post_layout == 'w' ? 'container-content' : $post_container;

if ( $has_sidebar ) :
?>
  <div id="wrapper" class="container-content">
    <div id="content-wrapper">
      <div id="page-content">
<?php endif; ?>

	<div class="<?php echo $post_container; ?>">
		<main role="main">
		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content-single', get_post_format() );
      $post_nav_visiblity = get_theme_mod('post_nav_visiblity', '2');
      if( $post_nav_visiblity == '2') {
        echo '<div class="content-box">';
          the_post_navigation();
        echo '</div>';
      }
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile;
		?>
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
