<?php
/**
* Theme includes
*
* $theme_includes contains libraries included in the theme. Loaded via locate_template using require_once
*/
$theme_includes = [
  'inc/helpers.php',
  'inc/setup.php',
  'inc/filters.php',
  'inc/customizer.php',
  'inc/jetpack.php'
];
array_walk($theme_includes, function ($file) {
    if (!locate_template($file, true, true)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'mmtheme'), $file), E_USER_ERROR);
        }
});