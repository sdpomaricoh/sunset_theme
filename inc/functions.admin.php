<?php

// =============================================================================
// functions.admin.php
// -----------------------------------------------------------------------------

/**
 * @package Sunet Theme
 * @author Sergio Pomárico
 * @version 1.0.0
 */


/**
 * add a custom admin page for the theme
 */
function sunset_add_admin_page(){
    add_menu_page('Sunset Theme Options','Sunset','manage_options','sunset','sunset_create_admin_page', get_template_directory_uri().'/img/sunset-icon.png', 110);
    // add_action();
}

/**
 * generate admin page for the theme
 */
function sunset_create_admin_page(){}

add_action('admin_menu', 'sunset_add_admin_page');