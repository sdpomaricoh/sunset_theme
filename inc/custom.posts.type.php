<?php

// =============================================================================
// custom.posts.type.php
// -----------------------------------------------------------------------------

/**
 * @package Sunet Theme
 * @author Sergio Pomárico
 * @version 1.0.0
 */


// 1. Contact Custom Post Type
// -----------------------------------------------------------------------------

$contact = get_option('activate_form');
if(!empty($contact) && $contact == 1){
    add_action('init','sunset_custom_contact_post_type');
}

function sunset_custom_contact_post_type(){

    $labels = array(
        'name' => 'Message',
        'singular_name' => 'Message',
        'menu_name' => 'Message',
        'name_admin_bar'  => 'Message'
    );

    $args = array(
        'labels'          => $labels,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierarchical'    => false,
        'menu_icon'       => 'dashicons-email-alt',
        'menu_position'   => 26,
        'supports'        => array('title','editor','author')
    );

    register_post_type( 'sunset-contact', $args);
}
