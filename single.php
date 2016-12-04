<?php
get_header();

$post_layout = get_theme_mod('post_layout', 'n-s');
$content_style = get_theme_mod('content_style', 'm');
$has_sidebar = false;
$post_container = '';
$page_style_class = $content_style == 'm' ? 'minimal' : '';

if($post_layout == 'n-s') {
  $has_sidebar = true;
  if($content_style == 'm') {
    $post_container =  'container-readable';
    $page_style_class = 'minimal with-sidebar';
  }
}
else if($post_layout == 'n') {
  $post_container = 'container-readable';
}
else if($post_layout == 'w') {
  $post_container = 'container-content';
}

if ( $has_sidebar ) :
?>
  <div id="wrapper" class="container-content">
    <div id="content-wrapper">
      <div id="page-content">
<?php endif; ?>

	<div class="<?php echo $post_container; ?> <?php echo $page_style_class; ?>">
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
