<?php

// =============================================================================
// enqueue.php
// -----------------------------------------------------------------------------

/**
 * @package Sunset Theme
 * @author Sergio Pomárico
 * @version 1.0.0
 */


// 1. Backend
// -----------------------------------------------------------------------------

/**
 * Load styles and scripts for the admin settings
 */
function sunset_load_admin_scripts($hook){

    //no load the registered styles and scripts (toplevel_page+page_name)
    if ('toplevel_page_sunset_theme' === $hook) {

		wp_enqueue_style(
            'sunset_admin_style',
            get_template_directory_uri().'/css/sunset.admin.css',
            array(),
            '1.0.0',
            'all'
        );

		wp_enqueue_media();

		wp_enqueue_script(
			'sunset_admin_scripts',
			get_template_directory_uri().'/js/sunset.admin.js' ,
			array('jquery'),
			'1.0.0',
			true
		);

	}else if('sunset_page_sunset_theme_css' === $hook){
		
        wp_enqueue_script(
            'ace',
            get_template_directory_uri().'/js/ace/ace.js',
            array('jquery'),
            '1.2.7',
            true
        );
       
        wp_enqueue_script(
            'sunset_custom_css',
            get_template_directory_uri().'/js/sunset.customize.css.js',
            array('jquery'),
            '1.0.0',
            true
        );

        wp_enqueue_style(
            'sunset_ace_style',
            get_template_directory_uri().'/css/sunset.ace.css',
            array(),
            '1.0.0',
            'all'
        );

    }else{
		return;
	}
}

add_action('admin_enqueue_scripts' , 'sunset_load_admin_scripts');

// 2. Frontend
// -----------------------------------------------------------------------------

/**
 * Load styles and scripts for the website
 */
function sunset_load_scripts(){
    
    wp_enqueue_style(
        'bootstrap',
        get_template_directory_uri().'/css/bootstrap.min.css',
        array(),
        '3.3.7',
        'all'
    );

    wp_enqueue_style(
        'animate',
        get_template_directory_uri().'/css/animate.min.css',
        array(),
        '3.3.7',
        'all'
    );

    wp_enqueue_style(
        'bootstrap-dropdownhover',
        get_template_directory_uri().'/css/bootstrap-dropdownhover.min.css',
        array(),
        '3.3.7',
        'all'
    );   

    wp_enqueue_style(
        'sunset',
        get_template_directory_uri().'/css/sunset.css',
        array(),
        '1.0.0',
        'all'
    );

    wp_enqueue_style(
        'raleway',
        'https://fonts.googleapis.com/css?family=Raleway:200,300,400,500',
        array(),
        false,
        'all'
    );

    wp_deregister_script('jquery');

    wp_register_script(
        'jquery',
        get_template_directory_uri().'/js/jquery.min.js',
        array(),
        '3.2.1',
        true
    );

    wp_enqueue_script('jquery');

    wp_enqueue_script(
        'bootstrap',
        get_template_directory_uri().'/js/bootstrap.min.js',
        array('jquery'),
        '3.3.7',
        true
    );

    wp_enqueue_script(
        'bootstrap-dropdownhover',
        get_template_directory_uri().'/js/bootstrap-dropdownhover.min.js',
        array('jquery','bootstrap'),
        '1.0.0',
        true
    );
}

add_action( 'wp_enqueue_scripts','sunset_load_scripts');