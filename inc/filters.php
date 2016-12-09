<?php

/**
 * Custom exceprt more
 */
function mmtheme_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'mmtheme_excerpt_more' );

/**
 * Don't count pingbacks or trackbacks when determining
 * the number of comments on a post.
 */
add_filter( 'get_comments_number', function ( $count ) {
	global $id;
	$comment_count = 0;
	$comments = get_approved_comments( $id );
	foreach ( $comments as $comment ) {
		if ( $comment->comment_type === '' ) {
			$comment_count++;
		}
	}
	return $comment_count;
}, 0 );

/**
 * Styles for next posts links
 */
add_filter('next_posts_link_attributes', function () {
    return 'class="button button-ghost alignright"';
});


/**
 * Styles for previous posts links
 */
add_filter('previous_posts_link_attributes', function () {
    return 'class="button button-ghost alignleft"';
});

/**
 * Styles for tag cloug
 */
add_filter( 'widget_tag_cloud_args', function ($args) {
	$args['number'] = 20;
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
  $args['format'] = 'list';
	return $args;
});

/**
 * Checks if icon class is applied to menu and insert equivalent icon to nav menu text
 */
function mmtheme_nav_menu_icons( $atts, $item, $args ) {
  if(count($item->classes) >= 1) {
		if(substr($item->classes[0], 0, 5) === "icon-") {
      $icon = $item->classes[0];
      $text = '';
      if(count($item->classes) >= 2 && $item->classes[1] === 'icon-text') {
        $text = ' ' . $item->title;
      }
      $item->title = mmtheme_get_svg_icon($icon) . $text;
		}
	}
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'mmtheme_nav_menu_icons', 10, 4);

/**
 * Wrap embeds in custom class
 */
function mmtheme_wrap_embed_with_div($html, $url, $attr) {
 if(strpos($url, '//www.youtube.com/') 
    || strpos($url, '//youtu.be/') 
    || strpos($url, '//vimeo.com/')
    || strpos($url, '//player.vimeo.com/')) {
    return '<div class="video-container">' . $html . '</div>';
 }
 else {
    return '<div class="embed-container">' . $html . '</div>';
 }
}
add_filter('embed_oembed_html', 'mmtheme_wrap_embed_with_div', 10, 3);