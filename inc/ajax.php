<?php 
// =============================================================================
// ajax.php
// -----------------------------------------------------------------------------

/**
 * @package Sunset Theme
 * @author Sergio Pomárico
 * @version 1.0.0
 */

add_action( 'wp_ajax_nopriv_sunset_load_more', 'sunset_load_more'); //No logger users 
add_action( 'wp_ajax_sunset_load_more', 'sunset_load_more'); //Logger Users 

function sunset_load_more(){
	
	$paged = $_POST["page"]+1;

	$query = new WP_Query( array(
		'post_type' => 'post',
		'paged' => $paged
	));

	if($query->have_posts()):			
		while($query->have_posts()): $query->the_post();
			get_template_part('partials/content', get_post_format());	
		endwhile;
	endif;
	die;
}

?>