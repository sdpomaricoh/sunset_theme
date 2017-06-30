<?php

// =============================================================================
// theme.support.php
// -----------------------------------------------------------------------------

/**
 * @package sunset_theme
 * @author Sergio Pomárico
 * @version 1.0.0
 */

 // 1. Theme Support Options
 // -----------------------------------------------------------------------------

// Add customs post types support
$options = get_option('post_formats');
$postFormats = array('aside','gallery','link','image','quote','status','video','audio','chat');
$output = array();

foreach ($postFormats as $format) {
    $output[] = (@$options[$format] == 1 ? $format : '');
}
if(!empty($options)){
    add_theme_support('post-formats',$output);
}

//add custom header support
$header = get_option('custom_header');
if (!empty($header)) {
	add_theme_support('custom-header');
}
// Add custom background support
$background = get_option('custom_background');
if (!empty($header)) {
	add_theme_support('custom-background');
}

// Add Menu support 
function sunset_register_nav_menu(){
	register_nav_menu( 'primary', 'Header navigation menu' );
}
add_action('after_setup_theme', 'sunset_register_nav_menu');