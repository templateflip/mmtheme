<?php
if ( ! is_active_sidebar( 'sidebar-primary' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area section-medium" role="complementary">
	<?php dynamic_sidebar( 'sidebar-primary' ); ?>
</aside>
