<?php

/**
 * Add "… Read more" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <p><a class="more-link" href="' . get_permalink() . '">' . __('Read more', 'mmtheme') . '</a></p>';
});

/**
 * Filter the except length to 20 words
 */
add_filter( 'excerpt_length', function($length) {
  return 20;
} , 999 );