<?php
$sub_header_text = "";
$sub_header_class = "";
if(is_front_page() && is_home() && get_theme_mod('site_tagline_visiblity', true)) {
  $sub_header_text = get_bloginfo( 'description', 'display' );
  $sub_header_class = "h2 site-description";
}
else if(((is_archive() || is_search()) && get_theme_mod('index_title_subheader', true))
  || (is_single() && get_theme_mod('post_title_subheader', false))
  || (is_page() && get_theme_mod('page_title_subheader', true))
) {
  $sub_header_text = mmtheme_title();
  $sub_header_class = "h2 entry-title";
}

if ( !empty($sub_header_text) ) : ?>
  <div class="sub-header section-medium highlight text-center">
    <div class="container-readable">
      <?php if( is_single() ): ?>          
        <?php get_template_part('template-parts/single-header'); ?> 
      <?php elseif(is_home() && is_front_page()) : ?>
        <h2 class="<?php echo $sub_header_class; ?>"><?php echo $sub_header_text; ?></h2>
      <?php else : ?>
        <h1 class="<?php echo $sub_header_class; ?>"><?php echo $sub_header_text; ?></h1>
      <?php endif; ?>
    </div>
  </div>
<?php
endif; ?>
