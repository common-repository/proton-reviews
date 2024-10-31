<?php /**
 * @package Proton_Reviews
 * @version 1.04
 */
/*
Plugin Name: Proton Reviews
Plugin URI: https://protonreviews.com/
Description: This is the best review management system for Wordpress. Manage how people review your business better.
Version: 1.05
Author: Predrag Alimpic
Author Email: palimpic@advyon.com
Author URI: https://advyon.com
Organisation: Advyon LLC
License: GPL-2.0-or-later
*/


function proton_load_scripts() {	
	wp_register_style('proton_reviews', plugins_url('css/style.css',__FILE__ ));
	wp_enqueue_style('proton_reviews');
	wp_register_script( 'proton_reviews_rc', 'https://www.google.com/recaptcha/api.js');
	wp_enqueue_script('proton_reviews_rc');
	wp_enqueue_script( 'jquery' );
}

add_action( 'wp_enqueue_scripts','proton_load_scripts');


// Create the reviews page

define( 'PROTON_REVIEWS_FILE', __FILE__ );

register_activation_hook( PROTON_REVIEWS_FILE, 'proton_reviews_activation' );

function proton_reviews_activation() {
  
  if ( ! current_user_can( 'activate_plugins' ) ) return;
  
  global $wpdb;
  
  if ( null === $wpdb->get_row( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name = 'reviews'", 'ARRAY_A' ) ) {
     
    $current_user = wp_get_current_user();
    
    // create post object
    $page = array(
      'post_title'  => __( 'Reviews' ),
      'post_status' => 'publish',
      'post_author' => $current_user->ID,
      'post_type'   => 'page',
      'post_content'   => '[proton-reviews]',
    );
    
    // insert the post into the database
    wp_insert_post( $page );
  }
}



function proton_settings_page()
{
  $protonsp =  add_submenu_page(
        'options-general.php',
        'Proton Reviews',
        'Proton Reviews',
        'manage_options',
        'proton',
		'proton_settings_page_html'
    );
}

add_action('admin_menu', 'proton_settings_page');


require plugin_dir_path( __FILE__ ) . 'proton_reviews_settings.php';
require plugin_dir_path( __FILE__ ) . 'proton_reviews_view.php';
require plugin_dir_path( __FILE__ ) . 'proton_reviews_shortcode.php';


add_shortcode('proton-reviews', 'proton_reviews_shortcode');


function proton_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=proton">Settings</a>'; 
  $documentation_link = '<a href="https://protonreviews.com/documentation/" target="_blank">Documentation</a>';  
  array_unshift($links, $settings_link, $documentation_link); 
  return $links; 
}

$plugin = plugin_basename(__FILE__); 

add_filter("plugin_action_links_$plugin", 'proton_settings_link' );




