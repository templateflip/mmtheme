<?php

/**
 * @param $filename
 * @return string
 */
function asset_path($filename)
{
   return get_template_directory_uri() . $filename;
}

/* Custom function to limit post content words */
if (!function_exists('mmtheme_get_excerpt')):
    function mmtheme_get_excerpt($content, $length = 75)
{
    $excerpt = '';
    if (has_excerpt()) {
        $excerpt = get_the_excerpt();
    } else {
        $excerpt = strip_tags($content);
        if (!empty($excerpt)) {
            $excerpt = strtok($excerpt, "\n"); //first para
            if(strlen($excerpt) > $length) {
                $excerpt = preg_replace('/\s+?(\S+)?$/', '', substr($excerpt, 0, ($length + 1))) . '…';
            }
        }
    }
    return $excerpt;
}
endif;