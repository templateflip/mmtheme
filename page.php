<?php
get_header();

$page_layout = get_theme_mod('page_layout', 'n');
$content_style = get_theme_mod('content_style', 'm');
$has_sidebar = false;
$page_container = '';
$page_style_class = $content_style == 'm' ? 'minimal' : '';

if($page_layout == 'n-s') {
  $has_sidebar = true;
  if($content_style == 'm') {
    $page_container =  'container-readable';
    $page_style_class = 'minimal with-sidebar';
  }
}
else if($page_layout == 'n') {
  $page_container = 'container-readable';
}
else if($page_layout == 'w') {
  $page_container = 'container-content';
}

if ( $has_sidebar ) :
?>
  <div id="wrapper" class="container-content">
    <div id="content-wrapper">
      <div id="page-content">
<?php endif; ?>

	<div class="<?php echo $page_container; ?> <?php echo $page_content_class; ?>">
		<main role="main">
    <?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'page' );
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
