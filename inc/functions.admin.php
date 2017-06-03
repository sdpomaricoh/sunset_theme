<?php

// =============================================================================
// functions.admin.php
// -----------------------------------------------------------------------------

/**
 * @package Sunet Theme
 * @author Sergio Pomárico
 * @version 1.0.0
 */


// 1. Add Admin custom page for the theme
// -----------------------------------------------------------------------------

/**
 * add a custom admin page for the theme
 */
function sunset_add_admin_page(){

    // add menu page
    add_menu_page(
        'Sunset Theme Options', //Title
        'Sunset', //Menu name shown
        'manage_options', //Capability
        'sunset_theme', //Page slug
        'sunset_create_admin_page', // Callback function
        get_template_directory_uri().'/img/sunset-icon.png', // Icon
        110 //Order
    );

    // add general menu page (is the same page as the main menu)
    add_submenu_page(
        'sunset_theme', //Page
        'Sunset Theme Options', //Title
        'General', //Submenu name shown
        'manage_options', //Capability
        'sunset_theme', //menu slug
        'sunset_create_admin_page' //Callback function
    );

    // add css menu page
    add_submenu_page(
        'sunset_theme', //Page
        'Sunset CSS Options',//Title
        'Custom CSS',//Submenu name shown
        'manage_options', //Capability
        'sunset_theme_css', //menu slug
        'sunset_theme_css_setting' //Callback function
    );

    //activate custon Settings (Should wait for the menus to be created)
    add_action('init_admin','sunset_custom_settings');
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


// 2. Add Custom setting for the theme
// -----------------------------------------------------------------------------

/**
 * register the custom settings group on database
 */
function sunset_custom_settings(){

}

//
function sunset_sidebar_options(){

}

function sunset_sidebar_name(){

}

// -----------------------------------------------------------------------------

// load theme menu on admin wordpress hook
add_action('admin_menu', 'sunset_add_admin_page');
