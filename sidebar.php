<?php
if ( ! is_active_sidebar( 'sidebar-primary' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-primary' ); ?>
  <?php if ( is_active_sidebar( 'sidebar-sticky' ) ) : ?>
    <div id="sticky-secondary">
      <?php dynamic_sidebar( 'sidebar-sticky' ); ?>
      <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function() {
        var el = document.getElementById('sticky-secondary');
        var elTop = el.getBoundingClientRect().top - document.body.getBoundingClientRect().top;

        window.addEventListener('scroll', function() {
            if (document.body.scrollTop > (elTop + 20)) {
                el.style.position = 'fixed';
                el.style.top = 0;
                el.style.paddingTop = '20px';
                el.style.width = '300px';
            }
            else {
                el.style.position = 'static';
                el.style.top = 'auto';
            }
        });
      });
      </script>
    </div>
  <?php endif; ?>
</aside>

