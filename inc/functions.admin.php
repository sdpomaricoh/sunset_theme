<?php

// =============================================================================
// functions.admin.php
// -----------------------------------------------------------------------------

/**
 * @package sunset_theme
 * @author Sergio Pomárico
 * @version 1.0.0
 */


// 1. Add custom menu page for the theme
// -----------------------------------------------------------------------------

//load theme menu on admin wordpress hook
add_action( 'admin_menu', 'sunset_add_admin_page' );

/**
 * add a custom menu for the theme
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
        'Sunset Sidebar Options', //Title
        'Sidebar', //Submenu name shown
        'manage_options', //Capability
        'sunset_theme', //menu slug
        'sunset_create_admin_page' //Callback function
    );

	add_submenu_page(
		'sunset_theme',
		'Sunset Theme Options',
		'Options',
		'manage_options',
		'sunset_theme_options',
		'sunset_theme_suport_page'
	);

    // add css menu page
    add_submenu_page(
        'sunset_theme', //Page
        'Sunset CSS Options',//Title
        'CSS',//Submenu name shown
        'manage_options', //Capability
        'sunset_theme_css', //menu slug
        'sunset_theme_css_setting' //Callback function
    );

    // add contact menu page
    add_submenu_page(
        'sunset_theme',
        'Contact Options',
        'Contact',
        'manage_options',
        'sunset_theme_contact_options',
        'sunset_theme_contact_page'
    );
}

/**
 * generate admin page for the theme
 */
function sunset_create_admin_page(){
    require_once(get_template_directory().'/inc/templates/sunset-admin.php');
}

/**
 * generate css setting page for the theme
 */
function sunset_theme_css_setting(){
    require_once(get_template_directory().'/inc/templates/sunset.custom.css.php');
}

/**
 * generate setting suport theme page
 */
function sunset_theme_suport_page(){
    require_once(get_template_directory().'/inc/templates/sunset-support.php');
}

/**
 * generate contact form theme page
 */
function sunset_theme_contact_page(){
    require_once(get_template_directory().'/inc/templates/sunset.contact.php');
}

// 2. Add Custom setting for the theme
// -----------------------------------------------------------------------------

//Activate custom settings
add_action( 'admin_init', 'sunset_custom_settings' );

/**
 * register the custom settings group on database
 */
function sunset_custom_settings() {

// ------------------------------- Sidebar -------------------------------------

    //Register the settings group
    register_setting('sunset-sidebar-group', 'profile_picture');
	register_setting('sunset-sidebar-group', 'first_name');
	register_setting('sunset-sidebar-group', 'last_name');
    register_setting('sunset-sidebar-group', 'user_description');
    register_setting('sunset-sidebar-group', 'twitter_handler', 'sunset_sanitize_twitter_handler');
    register_setting('sunset-sidebar-group', 'facebook_handler');
    register_setting('sunset-sidebar-group', 'github_handler');

    // add section of the page
	add_settings_section(
        'sunset-sidebar-options', //Custom Id
        'Sidebar Option', // Title
        'sunset_sidebar_options', // Callback function
        'sunset_theme' // Page
    );

    //add button to load profile picture
    add_settings_field(
        'sidebar-profile-picture', //Custom Id
        'Profile Picture', // Title
        'sunset_profile_picture', // Callback fuction
        'sunset_theme', // Page
        'sunset-sidebar-options' // Setting section
    );

    //add full name field
    add_settings_field(
        'sidebar-name', //Custom Id
        'Full Name', // Title
        'sunset_sidebar_name', // Callback fuction
        'sunset_theme', // Page
        'sunset-sidebar-options' // Setting section
    );

    //add the description field
    add_settings_field(
        'sidebar-sunset-description',
        'Description Handler',
        'sunset_sidebar_description',
        'sunset_theme',
        'sunset-sidebar-options'
    );

    //add twitter username field
    add_settings_field(
        'sidebar-twitter',
        'Twitter Handler',
        'sunset_sidebar_twitter',
        'sunset_theme',
        'sunset-sidebar-options'
    );

    //add facebook url field
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

// -------------------------------   CSS   -------------------------------------

    register_setting( 'sunset-custom-css-options-group', 'sunset_css','sunset_sanitize_custom_css');

    add_settings_section(
        'sunset-custom-css-options-group',
        'Theme Custom CSS',
        'sunset_custom_css_section',
        'sunset_theme_css'
    );

    add_settings_field(
        'custom-css',
        'Insert your custom CSS',
        'sunset_custom_css_field',
        'sunset_theme_css',
        'sunset-custom-css-options-group'
    );

// -------------------------------- Support -----------------------------------

    register_setting( 'sunset-support-group', 'post_formats');
    register_setting( 'sunset-support-group', 'custom_header');
    register_setting( 'sunset-support-group', 'custom_background');
    register_setting( 'sunset-support-group', 'custom_background');
    register_setting( 'sunset-contact-options', 'activate_form');

    add_settings_section(
        'sunset-theme-options',
        'Theme Options',
        'sunset_theme_support_options',
        'sunset_theme_options'
    );

    add_settings_section(
        'sunset-contact-options',
        'Contact Options',
        'sunset_contact_options',
        'sunset_theme_contact_options'
    );

    add_settings_field(
        'post-format', //Custom id
        'Post Formats', //Title
        'sunset_post_format', //Callback function
        'sunset_theme_options', //Page
        'sunset-theme-options' //Section
    );

    add_settings_field(
        'custom-header', //Custom id
        'Custom Header', //Title
        'sunset_custom_header', //Callback function
        'sunset_theme_options', //Page
        'sunset-theme-options' //Section
    );

    add_settings_field(
        'custom-background', //Custom id
        'Custom Background', //Title
        'sunset_custom_background', //Callback function
        'sunset_theme_options', //Page
        'sunset-theme-options' //Section
    );

    add_settings_field(
        'activate-form', //Custom id
        'Activate Contact Form', //Title
        'sunset_activate_form', //Callback function
        'sunset_theme_contact_options', //Page
        'sunset-contact-options' //Section
    );

}

// ------------------------------- Sidebar -------------------------------------

/**
 * Generate the sidebar section description
 */
function sunset_sidebar_options() {
	echo 'Customize your Sidebar Information';
}

/**
 * create the upload button
 */
function sunset_profile_picture(){

    $picture = esc_attr(get_option('profile_picture'));

    if(empty($picture)){
        echo "<input type='hidden' name='profile_picture' id='profile-picture' value=''><input type='button' value='Upload Profile Picture' id='upload-button' class='button button-secondary'>";
    }else{
        echo "<input type='hidden' name='profile_picture' id='profile-picture' value='".$picture."'><input type='button' value='Replace Profile Picture' id='upload-button' class='button button-secondary'><input type='button' id='remove-picture' class='button button-secondary' value='Remove Profile Picture'>";
    }
}

/**
 * Generate the first name field
 */
function sunset_sidebar_name(){
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    echo "<input type='text' name='first_name' value='".$firstName."' placeholder='First Name' ><input type='text' name='last_name' value='".$lastName."' placeholder='Last Name' >";
}

/**
 * generate the description field
 */
function sunset_sidebar_description(){
    $userDescription= esc_attr(get_option('user_description'));
    echo "<input type='text' name='user_description' value='".$userDescription."' placeholder='Description'><p class='description'>write something smart</p>";
}

/**
 * Generate the twitter input field
 */
function sunset_sidebar_twitter(){
    $twitterHandler= esc_attr(get_option('twitter_handler'));
    echo "<input type='text' name='twitter_handler' value='".$twitterHandler."' placeholder='Twitter Username'><p class='description'>Input your twitter username without the @ character</p>";
}


/**
 * Generate the facebook input field
 */
function sunset_sidebar_facebook(){
    $facebookHandler = esc_attr(get_option('facebook_handler'));
    echo "<input type='url' name='facebook_handler' value='".$facebookHandler."' placeholder='Facebook Url'>";
}

/**
 * Generate the github input field
 */
function sunset_sidebar_github(){
    $githubHandler= esc_attr(get_option('github_handler'));
    echo "<input type='url' name='github_handler' value='".$githubHandler."' placeholder='Github Url'>";
}

// -------------------------------- Support ------------------------------------

/**
 * Generate the theme options description
 */
function sunset_theme_support_options(){
    echo 'Activate o deactivate specific theme support options';
}

/**
 * Generate the post options checkbox
 */
function sunset_post_format(){

    $postFormats = array('aside','gallery','link','image','quote','status','video','audio','chat');
    $output = '';
    $options = get_option('post_formats');

    foreach ($postFormats as $format) {
        $checked = (@$options[$format] == 1 ? 'checked' : '');
        $output .= '<label><input type="checkbox" name="post_formats['.$format.']" value="1" id="'.$format.'" '.$checked.'> '.$format.'</label><br/>';
    }

    echo $output;
}

/**
 * Generate the custom header checkbox
 */
function sunset_custom_header(){
    $options = get_option('custom_header');
    $checked = (@$options == 1 ? 'checked' : '');
    $output  = '<label><input type="checkbox" name="custom_header" value="1" id="custom_header" '.$checked.'> Activate custom header</label><br/>';
    echo $output;
}

/**
 * Generate the custom background checkbox
 */
function sunset_custom_background(){
    $options = get_option('custom_background');
    $checked = (@$options == 1 ? 'checked' : '');
    $output  = '<label><input type="checkbox" name="custom_background" value="1" id="custom_background" '.$checked.'> Activate custom background</label><br/>';
    echo $output;
}

function sunset_contact_options(){
    echo "Activate o deactivate the build-it contact form";
}

function sunset_activate_form(){
    $options = get_option('activate_form');
    $checked = (@$options == 1 ? 'checked' : '');
    $output  = '<input type="checkbox" name="activate_form" value="1" id="activate_form" '.$checked.'>';
    echo $output;
}


// -------------------------------   CSS   -------------------------------------

/**
 * [sunset_custom_css_section description]
 */
function sunset_custom_css_section(){
    echo 'Customize your theme with own CSS';
}

/**
 * [sunset_custom_css_field description]
 */
function sunset_custom_css_field(){
    $css = get_option('sunset_css');
    $css = (!empty($css) ? $css : '/* Sunset Theme Custom CSS*/');
    echo '<div id="customCSS">'.$css.'</div><textarea name="sunset_css" id="sunset_css" style="display:none;visibility:hidden">'.$css.'</textarea>';
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

/**
 * sanitize the custom css input field
 * @param [Objet] $input setting input field
 */
function sunset_sanitize_custom_css($input){
    $output = sanitize_textarea_field($input);
    return $output;
}