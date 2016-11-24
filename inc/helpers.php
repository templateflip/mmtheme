<?php

/**
 * @param $filename
 * @return string
 */
function asset_path($filename)
{
   return get_template_directory_uri() . $filename;
}