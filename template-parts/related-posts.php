<?php 
$related_posts_setting = get_theme_mod('related_posts_setting', '3');

$after_query = '';
if($related_posts_setting == '1') {
  return;
}
else if($related_posts_setting == '2') {
  $after_query = date( 'Y-m-d', strtotime('-2 year') );
}
else if($related_posts_setting == '3') {
  $after_query = date( 'Y-m-d', strtotime('0') );
}

$orig_post = $post;
global $post;
$categories = get_the_category($post->ID);
if ($categories) {
    $category_ids = array();
    foreach($categories as $individual_category) {
      $category_ids[] = $individual_category->term_id;
    }
    $args=array(
    'category__in' => $category_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=> 4, // Number of related posts that will be shown.
    'orderby' => 'rand',
    'ignore_sticky_posts'=>1,
    'date_query'     => array(
        'after' => $after_query
      )
    );
    $my_query = new wp_query( $args );
    if( $my_query->have_posts() ) {
        echo '<div class="related-posts content-box section"><h3 class="h4 section-title">'.__('Related', 'mmtheme').'</h3><div class="grid">';
        while( $my_query->have_posts() ) {
            $my_query->the_post();?>
  <div class="one-half">
    <div class="media media-left">
      <div class="thumbnail">
        <a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
          <?php the_post_thumbnail('thumbnail'); ?>
        </a>
      </div>
      <div class="media-body">
        <h4 class="h5 entry-title"><a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
        <div class="entry-meta"><?php the_time('M j, Y'); ?></div>
      </div>
    </div>
  </div>
  <?php
        }
        echo '</div></div>';
    }
}
$post = $orig_post;
wp_reset_query(); ?>