<?php

/**
 * @param $filename
 * @return string
 */
function asset_path($filename)
{
   return get_template_directory_uri() . $filename;
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