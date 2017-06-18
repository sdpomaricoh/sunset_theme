<?php

// =============================================================================
// theme.support.php
// -----------------------------------------------------------------------------

/**
 * @package Sunet Theme
 * @author Sergio Pomárico
 * @version 1.0.0
 */

 // 1. Theme Support Options
 // -----------------------------------------------------------------------------

$options = get_option('post_formats');
$postFormats = array('aside','gallery','link','image','quote','status','video','audio','chat');
$output = array();

foreach ($postFormats as $format) {
    $output[] = (@$options[$format] == 1 ? $format : '');
}
if(!empty($options)){
    add_theme_support('post-formats',$output);
}