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
    // add menu page
    add_menu_page('Sunset Theme Options','Sunset','manage_options','sunset','sunset_create_admin_page', get_template_directory_uri().'/img/sunset-icon.png', 110);

    // add general menu page (is the same page as the main menu)
    add_submenu_page('sunset','Sunset Theme Options','General','manage_options','sunset','sunset_create_admin_page');

    // add css menu page
    add_submenu_page('sunset','Sunset CSS Options','Custom CSS','manage_options','sunset-css','sunset_theme_css_setting');
}

/**
 * generate admin page for the theme
 */
function sunset_create_admin_page(){
    require_once(get_template_directory().'/inc/templates/sunset-admin.php');
}

/**
 * generate setting page for the theme
 */
function sunset_theme_css_setting(){}

// load theme menu on admin wordpress hook
add_action('admin_menu', 'sunset_add_admin_page');
