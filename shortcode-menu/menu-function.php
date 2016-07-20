<?php

/*
Plugin Name: Jaycob's Menu Shortcode
Description: This was designed to be able to pull a menu in from a shortcode.
Version: 1.0
Author: Jaycob
Author URI: mailto:jonesjaycob@gmail.com
*/



// Function that will return our WordPress menu
function list_menu($atts, $content = null) {
	extract(shortcode_atts(array(  
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => '', 
		'container_id'    => '', 
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 0,
		'walker'          => '',
		'theme_location'  => ''), 
		$atts));

	return wp_nav_menu( array( 
		'menu'            => $menu, 
		'container'       => $container, 
		'container_class' => $container_class, 
		'container_id'    => $container_id, 
		'menu_class'      => $menu_class, 
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location));
}
//Create the shortcode
add_shortcode("jaycobs_menu", "list_menu");


function info_styles()
{

    wp_enqueue_style( 'menu-style',  plugin_dir_url(__FILE__) . 'css/style.css' );
    //wp_enqueue_script('infographicjs', plugin_dir_url(__FILE__) . '/js/info-js.js');

}
add_action('wp_enqueue_scripts', 'info_styles');