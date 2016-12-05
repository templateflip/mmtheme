<?php
/**
* Theme includes
*/
$theme_includes = [
  'widgets/ads.php',
  'widgets/posts.php',
  'inc/svgicons.php',
  'inc/helpers.php',
  'inc/setup.php',
  'inc/filters.php',
  'inc/customizer.php'
];
array_walk($theme_includes, function ($file) {
    if (!locate_template($file, true, true)) {
        trigger_error(sprintf(__('Error locating %s', 'mmtheme'), $file), E_USER_ERROR);
    }
});