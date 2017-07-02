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

add_theme_support('post-thumbnails');

// Add Menu support 
function sunset_register_nav_menu(){
	register_nav_menu( 'primary', 'Header navigation menu' );
}
add_action('after_setup_theme', 'sunset_register_nav_menu');

 // 2. Blog loop customs functions
 // -----------------------------------------------------------------------------

/**
 * Create html to display when the post has been published and the categories
 * @return [string] return the post meta data
 */
function sunset_posted_meta(){

	$posted_on = human_time_diff( get_the_time('U'), current_time('timestamp')).' ago / ';
	$categories = get_the_category();
	$separator = ', ';
	$output = '';
	$i = 1;

	if (!empty($categories)) {
		foreach ($categories as $category) {
			if ($i > 1) $output .= $separator;
			$output .= '<a href="'.get_category_link($category->term_id).'" alt="'.esc_attr('View all post in%s', $category->name).'">'.esc_html($category->name).'</a>';
			$i++;
		}
	}

	return '<span class="posted-on">Posted <a href="'.esc_url(get_the_permalink()).'">'.$posted_on.'</a></span><span class="posted-in">'.$output.'</span>';
}

/**
 * create html for the comments number and tags
 * @return [string] comments numbers and tags
 */
function sunset_posted_footer(){
	$comments_num = get_comments_number();
	if (comments_open()) {
		if ($comments_num == 0) {
			$comments = __('No comments');		
		}elseif($coments_num > 1){
			$comments = $comments_num.__('Comments');	
		}else{
			$comments = __('1 Comment');
		}
		$comments ='<a hrer="'.esc_url(get_comments_link()).'" class="comments-links">'.$comments.'<span class="sunset sunset-comment"></a>';
	}else{
		$comments = __('Comments are closed');
	}
	return '
		<div class="col-xs-12 col-sm-6">'.get_the_tag_list('<div class="tags"><span class="sunset sunset-tag"></span>',' ','</div>').'</div>
		<div class="col-xs-12 col-sm-6 text-right">'.$comments.'</div>';
}