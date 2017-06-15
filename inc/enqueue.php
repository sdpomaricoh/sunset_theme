<?php

// =============================================================================
// enqueue.php
// -----------------------------------------------------------------------------

/**
 * @package Sunet Theme
 * @author Sergio Pomárico
 * @version 1.0.0
 */

/**
 * Load styles and scripts for the admin settings
 */
function sunset_load_admin_scripts($hook){

    //no load the registered styles and scripts (toplevel_page+page_name)
    if ('toplevel_page_sunset_theme' !== $hook) {
        return;
    }

    wp_register_style(
        'sunset_admin_style', //Custom Id
        get_template_directory_uri().'/css/sunset.admin.css', //directory
        array(), //Dependencies
        '1.0.0' // Version
    );

    wp_enqueue_media();

    // load sunset_admin styles
    wp_enqueue_style('sunset_admin_style');

    wp_register_script(
        'sunset_admin_scripts',
        get_template_directory_uri().'/js/sunset.admin.js' ,
        array('jquery'),
        '1.0.0',
		true
    );

    wp_enqueue_script('sunset_admin_scripts');
}

add_action('admin_enqueue_scripts' , 'sunset_load_admin_scripts');