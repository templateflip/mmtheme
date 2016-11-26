<?php

/**
 * Add "… Read more" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <p><a class="more-link" href="' . get_permalink() . '">' . __('Read more', 'mmtheme') . '</a></p>';
});

/**
 * Filter the except length to 15 words
 */
add_filter( 'excerpt_length', function($length) {
  return 15;
} , 999 );

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