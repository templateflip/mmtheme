<header class="entry-header">    
  <?php get_template_part('template-parts/entry-header'); ?> 
  <div class="entry-meta">
    <?php get_template_part('template-parts/entry-meta'); ?>
  </div>
</header>
<?php 
    $share_top = get_theme_mod('share_top', '2');
    if($share_top != '1') {
      mmtheme_share_button($share_top === '2');
    }
?>