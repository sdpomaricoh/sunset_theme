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

//load theme menu on admin wordpress hook
add_action( 'admin_menu', 'sunset_add_admin_page' );

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

//Activate custom settings
add_action( 'admin_init', 'sunset_custom_settings' );

/**
 * register the custom settings group on database
 */
function sunset_custom_settings() {

    //Register the settings group
	register_setting('sunset-settings-group', 'first_name');
	register_setting('sunset-settings-group', 'last_name');
    register_setting('sunset-settings-group', 'twitter_handler', 'sunset_sanitize_twitter_handler');
    register_setting('sunset-settings-group', 'facebook_handler');
    register_setting('sunset-settings-group', 'github_handler');

    // add section of the page
	add_settings_section(
        'sunset-sidebar-options', //Custom Id
        'Sidebar Option', // Title
        'sunset_sidebar_options', // Callback function
        'sunset_theme' // Page
    );

    //add first name field
    add_settings_field(
        'sidebar-name', //Custom Id
        'Full Name', // Title
        'sunset_sidebar_name', // Callback fuction
        'sunset_theme', // Page
        'sunset-sidebar-options' // Setting section
    );

    add_settings_field(
        'sidebar-twitter',
        'Twitter Handler',
        'sunset_sidebar_twitter',
        'sunset_theme',
        'sunset-sidebar-options'
    );

    add_settings_field(
        'sidebar-facebook',
        'Facebook Handler',
        'sunset_sidebar_facebook',
        'sunset_theme',
        'sunset-sidebar-options'
    );

    add_settings_field(
        'sidebar-github',
        'Github Handler',
        'sunset_sidebar_github',
        'sunset_theme',
        'sunset-sidebar-options'
    );
}

/**
 * Generate the section description
 */
function sunset_sidebar_options() {
	echo 'Customize your Sidebar Information';
}

/**
 * Generate the first name field
 */
function sunset_sidebar_name(){
    $firstName = get_option('first_name');
    $lastName = get_option('last_name');
    echo "<input type='text' name='first_name' value='".$firstName."' placeholder='First Name' ><input type='text' name='last_name' value='".$lastName."' placeholder='Last Name' >";
}

/**
 * Generate the twitter input field
 */
function sunset_sidebar_twitter(){
    $twitterHandler= get_option('twitter_handler');
echo "<input type='text' name='twitter_handler' value='".$twitterHandler."' placeholder='Twitter Username'><p class='description'>Input your twitter username without the @ character</p>";
}


/**
 * Generate the twitter input field
 */
function sunset_sidebar_facebook(){
    $facebookHandler = get_option('facebook_handler');
    echo "<input type='url' name='facebook_handler' value='".$facebookHandler."' placeholder='Facebook Url'>";
}

/**
 * Generate the twitter input field
 */
function sunset_sidebar_github(){
    $githubHandler= get_option('github_handler');
    echo "<input type='url' name='github_handler' value='".$githubHandler."' placeholder='Github Url'>";
}

// 3. Sanitization Settings
// -----------------------------------------------------------------------------


/**
 * sanitize the input field removing the special characters
 * @param [Objet] $input setting input field
 */
function sunset_sanitize_twitter_handler($input){
    $output = sanitize_text_field($input);
    $output = str_replace('@','',$output);
    return $output;
}