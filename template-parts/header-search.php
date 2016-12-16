<?php

$search_header_visiblity = get_theme_mod('search_header_visiblity', '2');
if($search_header_visiblity == 1) {
  return;
}
$search_class = $search_header_visiblity == '2' ? 'expandable-search' : '';
?>

<div class="<?= $search_class; ?>">
  <?php get_search_form(); ?>
</div>