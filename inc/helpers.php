<?php

/**
 * @param $filename
 * @return string
 */
function mmtheme_asset_path($filename)
{
   return get_template_directory_uri() . $filename;
}

/**
 * Site Branding
 */
function mmtheme_site_branding() {
  if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
  ?>
    <span class="site-branding">
		  <?php the_custom_logo(); ?>  
    </span>
  <?php
	}
  else {
  ?>
  <a class="site-branding" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
    <?php if ( is_front_page() && is_home() ) : ?>
      <h1 class="title"><?php bloginfo( 'name' ); ?></h1>
    <?php else : ?>
      <span class="title"><?php bloginfo( 'name' ); ?></span>
    <?php endif; ?>
  </a>
  <?php
  }
}

/**
 * Page titles
 * @return string
 */
function mmtheme_title()
{
    if (is_home()) {
        if ($home = get_option('page_for_posts', true)) {
            return get_the_title($home);
        }
        return ''; //__('Latest Posts', 'mmtheme')
    }
    if (is_archive()) {
        return get_the_archive_title();
    }
    if (is_search()) {
        return sprintf(__('Search Results for %s', 'mmtheme'), get_search_query());
    }
    if (is_404()) {
        return __('Not Found', 'mmtheme');
    }
    return get_the_title();
}

/**
 * Comments
 */
function mmtheme_comment($comment, $args, $depth) {
  if ( 'div' === $args['style'] ) {
      $tag       = 'div';
      $add_below = 'comment';
  } else {
      $tag       = 'li';
      $add_below = 'div-comment';
  }
  ?>
  <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
  <?php if ( 'div' != $args['style'] ) : ?>
      <div id="div-comment-<?php comment_ID() ?>" class="section">
  <?php endif; ?>
  
  <div class="media media-left">
    <div class="thumbnail thumbnail-small thumbnail-rounded">
      <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    </div>
    <div class="media-body">
      <div class="comment-author vcard">
          <?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
      </div>
      <?php if ( $comment->comment_approved == '0' ) : ?>
          <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
          <br />
      <?php endif; ?>

      <div class="comment-meta entry-meta text-small commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
          <?php
          /* translators: 1: date, 2: time */
          printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
          ?>
      </div>

      <div class="comment-body">
        <?php comment_text(); ?>
      </div>

      <div class="reply entry-meta">
          <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
      </div>      
    </div>
  </div>
  <?php if ( 'div' != $args['style'] ) : ?>
  </div>
  <?php endif; ?>
  <?php
}

/**
 * Share buttons
 */
function mmtheme_share_button($is_mini = false) {
  global $post;

  $post_URL = urlencode(get_permalink());
  $post_title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
  $post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

  $facebook_URL = 'https://www.facebook.com/sharer/sharer.php?u='.$post_URL;
  $twitter_URL = 'https://twitter.com/intent/tweet?text='.$post_title.'&amp;url='.$post_URL;
  $google_URL = 'https://plus.google.com/share?url='.$post_URL;
  $pinterest_URL = 'https://pinterest.com/pin/create/button/?url='.$post_URL.'&amp;media='.$post_thumbnail[0].'&amp;description='.$post_title;
  $linkedIn_URL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$post_URL.'&amp;title='.$post_title;

   $content = '';
  if(!$is_mini) {
    $content .= '<div class="robots-nocontent social-share-buttons">';
  }
  else {
    $content .= '<div class="robots-nocontent social-share-buttons share-mini">';
  }
  $content .= '<a class="button button-facebook" style="background: #3B5997;" href="'.$facebook_URL.'" target="_blank">';
  $content .= mmtheme_get_svg_icon('icon-facebook');
  //if(!$is_mini) {
    $content .= '<span>'.__( 'Share', 'mmtheme' ).'</span>';
  //}
  $content .= '</a>';
  $content .= '<a class="button button-twitter" style="background: #00aced;" href="'. $twitter_URL .'" target="_blank">';
  $content .= mmtheme_get_svg_icon('icon-twitter');
  //if(!$is_mini) {
    $content .= '<span>'.__( 'Tweet', 'mmtheme' ).'</span></a>';
  //}
  if(!$is_mini) {
    $content .= '</a>';$content .= '<a class="button button-googleplus" style="background: #D64937;" href="'.$google_URL.'" target="_blank">'.mmtheme_get_svg_icon('icon-google-plus').'</a>';
    $content .= '<a class="button button-linkedin" style="background: #0074A1;" href="'.$linkedIn_URL.'" target="_blank">'.mmtheme_get_svg_icon('icon-linkedin').'</a>';
    $content .= '<a class="button button-pinterest" style="background: #bd081c;" href="'.$pinterest_URL.'" target="_blank">'.mmtheme_get_svg_icon('icon-pinterest').'</a>';
  }
  $content .= '</div>';

  echo $content;
}