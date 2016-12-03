<?php

// Show Date & Author by defalt
$show_date = true;
$show_author = true;
$show_dot = true;
$show_categories = false;
if(!is_single()) {
  $post_meta_setting = get_theme_mod('post_meta_setting', '1');
  
  if($post_meta_setting == '2') { // Show Date & Categories
    $show_author = false;
    $show_categories = true;
  }
  else if($post_meta_setting == '3') { // Show only Categories
    $show_date = false;
    $show_dot = false;
    $show_author = false;
    $show_categories = true;
  }
}

?>
<?php if ($show_date) : ?>
<time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time>
<?php endif; ?>

<?php if ($show_date) : ?>
<span class="dot">•</span>
<?php endif; ?>

<?php if ($show_author) : ?>
<span class="byline author vcard"><a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?= get_the_author(); ?></a></span>
<?php endif; ?>

<?php if ($show_categories) : ?>
<span class="meta-categories">
  <?php echo get_the_category_list( __( ', ', 'mmtheme' ) ); ?>
</span>
<?php endif; ?>
