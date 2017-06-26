<?php

// =============================================================================
// custom.posts.type.php
// -----------------------------------------------------------------------------

/**
 * @package sunset_theme
 * @author Sergio Pomárico
 * @version 1.0.0
 */


// 1. Contact Custom Post Type
// -----------------------------------------------------------------------------

$contact = get_option('activate_form');
if(!empty($contact) && $contact == 1){
    add_action('init','sunset_custom_contact_post_type');
    add_filter('manage_sunset-contact_posts_columns','sunset_set_contact_columns');
    add_action('manage_sunset-contact_posts_custom_column','sunset_contact_custom_columns', 10,2);
    add_action('add_meta_boxes','sunset_contact_metabox');
    add_action('save_post', 'sunset_save_email_data');
}

/**
 * create the contact post type
 */
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

/**
 * Define the custom columns for custom post type
 */
function sunset_set_contact_columns($input){
    $newColumns = array();
    $newColumns['title'] = 'Full Name';
    $newColumns['message'] = 'Message';
    $newColumns['email'] = 'Email';
    $newColumns['date'] = 'Date';

    return $newColumns;
}

/**
 * Populate the custom columns
 */
function sunset_contact_custom_columns($column,$post_id){
    switch ($column) {
        case 'message':
            echo get_the_excerpt();
            break;

        case 'email':
            $email =  esc_attr(get_post_meta($post_id,'_contact_email_value_key',true));
            echo '<a href="mailto:'.$email.'">'.$email.'</a>';
            break;

        default:
            # code...
            break;
    }
}

//Add metabox
function sunset_contact_metabox(){
    add_meta_box('contact_email', 'User email', 'sunset_contact_email_callback','sunset-contact','side','default');
}

/**
 * generate the input field to email user
 * @param [Object] $post post object of Wordpress
 */
function sunset_contact_email_callback($post){
    wp_nonce_field( 'sunset_save_email_data', "sunset_contact_email_meta_box");
    $value = get_post_meta($post->ID,'_contact_email_value_key', true);
    echo '<label for="sunset_contact_email_field">User Email Address </label>';
    echo '<input type="email" id="sunset_contact_email_field" name="sunset_contact_email_field" value="'.esc_attr( $value ).'" size="25">';
}

/**
 * Save the email when the post be saved
 * @param [integer] $post_id post unique identifier
 */
function sunset_save_email_data($post_id){

    if(!isset($_POST['sunset_contact_email_meta_box'])) return; //metabox exist
    if(!wp_verify_nonce($_POST['sunset_contact_email_meta_box'] , 'sunset_save_email_data' )) return; //nonce exist
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return; //if no autosave
    if(!current_user_can('edit_post',$post_id)) return; //if user can edit
    if(!isset($_POST['sunset_contact_email_field'])) return; //if email will send

    $my_email = sanitize_text_field($_POST['sunset_contact_email_field']); //Sanitize the email data

    update_post_meta( $post_id, '_contact_email_value_key',$my_email);
}
