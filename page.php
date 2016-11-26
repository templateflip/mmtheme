<?php
get_header();

$page_layout = get_theme_mod('page_layout');
$has_sidebar = $page_layout == 'n-s';
$page_container = $page_layout == 'w' ? 'container-content' : 'container-readable';;

if ( $has_sidebar ) :
?>
  <div id="wrapper" class="container-content">
    <div id="content-wrapper">
      <div id="page-content">
<?php endif; ?>

	<div class="<?php echo $page_container; ?>">
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
