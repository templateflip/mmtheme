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
<?php if ($show_date) :
    $datetime = get_post_time('c', true);
    $modified_time = get_the_date();
    $modifed_text = __('Posted on ', 'mmtheme');
    if (get_the_time() != get_the_modified_time()) {
      $datetime = get_the_modified_time('c');
      $modified_time = get_the_modified_date();
      $modifed_text = __('Updated on ', 'mmtheme');
    }
?>
<time class="updated" datetime="<?= $datetime; ?>"><?= $modifed_text; ?><?= $modified_time; ?></time>
<?php endif; ?>

<?php if ($show_date) : ?>
<span class="dot">•</span>
<?php endif; ?>

<?php if ($show_author) : ?>
<?php 
  global $post;
  $author_id = get_post_field( 'post_author', $post->ID );
 ?>
 <span class="byline author vcard"><a href="<?= get_author_posts_url($author_id); ?>" rel="author" class="fn"><?= the_author_meta( 'display_name', $author_id ); ?></a></span>
<?php endif; ?>

<?php if ($show_categories) : ?>
<span class="meta-categories">
  <?php echo get_the_category_list( __( ', ', 'mmtheme' ) ); ?>
</span>
<?php endif; ?>

<?php
  edit_post_link(
    sprintf(
      /* translators: %s: Name of current post */
      esc_html__( 'Edit %s', 'mmtheme' ),
      the_title( '<span class="screen-reader-text">"', '"</span>', false )
    ),
    '<span class="dot">•</span><span class="edit-link entry-meta text-small">',
    '</span>'
  );
?>
