<?php
get_header();

$post_layout = get_theme_mod('post_layout');
$has_sidebar = $post_layout == 'n-s';
$post_container = $post_layout == 'n' ? 'container-readable' : 'container-content';

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
