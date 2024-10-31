<?php

function proton_reviews_shortcode  (){
$option_proton_screen_choice = get_option('proton_screen_choice');

if ( $option_proton_screen_choice == "yes") {
add_action('wp_footer', 'proton_reviews_view');
} 

if ( $option_proton_screen_choice == "no") {	
add_action('proton_hook','proton_reviews_view');
do_action('proton_hook');
}
	
}

?>