<?php 

function proton_reviews_view (){
	
// Put settings in to variables 

$option_google_position =  get_option('proton_google_position');
$option_proton_display_google =  get_option('proton_display_google');
$option_yelp_position = get_option('proton_yelp_position');
$option_proton_display_yelp = get_option('proton_display_yelp');
$option_proton_logo = get_option('proton_logo');
$option_company_name = get_option('proton_company_name');
$option_home_url = get_site_url();
$option_proton_screen_choice = get_option('proton_screen_choice');
$option_proton_site_key = get_option('proton_site_key');
$option_proton_secret_key = get_option('proton_secret_key');
$option_proton_location_id1 = get_option('proton_location_id');
$option_proton_google_api_key = 'AIzaSyDWnjY03V-6yaysfEaAmpJAggrkBU5yVVw';
$option_proton_yelp_id = get_option('proton_yelp_id');
$option_proton_yelp_client_id  = 'Yv5z62QJ1Gwc3WWealjXxw';
$option_proton_yelp_client_secret =  'ipoeYWrdC_HvQYEqr3_yVD0dA-PbHLv48E24YxOLS92SN2VpSpHhRkp19sYijZzmD4jfCYi5sYgCstqCy92vSOrZGPm1VZHCvfCi8klpEmatvgb8DUOb4AUbYq3gWXYx';
$option_proton_template = get_option('proton_template');
$option_proton_mail_to = get_option('proton_mail_to');
$option_proton_negative_heading = get_option('proton_negative_heading');
$option_proton_negative_message = get_option('proton_negative_message');
$option_proton_recommend = get_option('proton_recommend');


// Get the domain

$proton_domain = get_site_url(); //or home
$proton_domain = str_replace('http://', '', $proton_domain);
$proton_domain = str_replace('www', '', $proton_domain); //add the . after the www if you don't want it
$proton_domain = strstr($proton_domain, '/', true); //PHP5 only, this is in case WP is not root


// Defaine URLs 

$option_google_url =  'https://search.google.com/local/writereview?placeid=' . $option_proton_location_id1;
$option_yelp_url = 'https://www.yelp.com/biz/' . $option_proton_yelp_id ;


// Asign default values if empty

if ($option_google_url == "" || $option_google_url == null ) {
	$option_google_url = "https://google.com";
}

if ($option_proton_display_google == "" || $option_proton_display_google == null ) {
	$option_proton_display_google = "yes";
}

if ($option_yelp_url == "" || $option_yelp_url == null ) {
	$option_yelp_url = "https://yelp.com";
}

if ($option_proton_display_yelp == "" || $option_proton_display_yelp == null ) {
	$option_proton_display_yelp = "yes";
}

if ($option_facebook_link == "" || $option_facebook_link == null ) {
	$option_facebook_link = $option_facebook_url;
}

if ($option_proton_display_facebook == "" || $option_proton_display_facebook == null ) {
	$option_proton_display_facebook = "yes";
}

if ($option_google_position == "" || $option_google_position == null ) {
	$option_google_position = "first";
}

if ($option_yelp_position == "" || $option_yelp_position == null ) {
	$option_yelp_position = "second";
}

if ($option_facebook_position == "" || $option_facebook_position == null ) {
	$option_facebook_position = "third";
}

if ($option_proton_logo == "" || $option_proton_logo == null ) {
	$option_proton_logo = plugins_url('images/logo_blank.png',__FILE__ ) ;
}

if ($option_company_name == "" || $option_company_name == null ) {
	$option_company_name = get_bloginfo();
} 

if ($option_proton_mail_to == "" || $option_proton_mail_to == null ) {
	$option_proton_mail_to = get_option( 'admin_email' );
}

if ($option_proton_negative_heading == "" || $option_proton_negative_heading == null ) {
	$option_proton_negative_heading = "We apologize that your experience was unsatisfactory. How can we improve?";
	}

if ($option_proton_negative_message == "" || $option_proton_negative_message == null ) {
	$option_proton_negative_message = "Thank you for your feedback! " . $option_company_name . " is committed to your complete satisfaction. We will contact you as soon as possible to address your concerns. Sincerely, thank you for being an " . $option_company_name . " customer, we appreciate you!";
	}

if ($option_proton_recommend == "" || $option_proton_recommend == null ) {
	$option_proton_recommend ='Would you recommend ' . $option_company_name . '?';
	} 

if ($proton_json1 == "" || $proton_json1 == null ) {
	$proton_json1 = array();
	} 

/* Define active tab */

$proton_google_tab = " active";
$proton_yelp_tab = " ";
$proton_google_tab_order ="tab1";
$proton_yelp_tab_order ="tab2";

if( $option_proton_display_yelp == "yes" && $option_proton_display_google == "no") { 
$proton_google_tab = " ";
$proton_yelp_tab = " active";
$proton_google_tab_order ="tab2";
$proton_yelp_tab_order ="tab1";
} 
 
if( $option_proton_display_yelp == "no" && $option_proton_display_google == "no") { 
$proton_google_tab = " ";
$proton_yelp_tab = " ";
$proton_google_tab_order ="tab3";
$proton_yelp_tab_order ="tab2";
} 

?>

<div id="proton-review-widget" class="<?php echo $option_proton_screen_choice; ?>">
<div id="question" class="x static">
<div class="proton-content">
<div class="first-slide" >
<div class="proton-logo"> <img  src="<?php echo  $option_proton_logo?>"></div>
<h3 class="proton-question"><?php echo $option_proton_recommend; ?></h3>
<div class="proton-buttons">
   <p> <a class="yes-button proton-btn qn"> Yes </a></p>
   <p> <a class="no-button proton-btn qn"> No </a></p>
</div>
<div id="business-reviews" class="<?php echo $option_proton_template; ?>">

<?php

if ($option_proton_template == 'tabs') {
    echo '
     <ul class="proton-tab-links">
        <li class="' . $option_proton_display_google . $proton_google_tab . '"><a href="#' . $proton_google_tab_order . '">Google</a></li>
        <li class="' . $option_proton_display_yelp .  $proton_yelp_tab . '"><a href="#' . $proton_yelp_tab_order . '">Yelp</a></li>
     </ul> 
	<div class="tab-content">
	';
}

// Get Google reviews

$proton_json1 = get_option('proton_google_array1');


// Display Google Reviews
if ($option_proton_display_google == 'yes') {
    if ($option_proton_template == 'tabs') {
        echo ' <div id="' . $proton_google_tab_order . '" class="tab ' . $proton_google_tab . '">';
    }
	if (isset($proton_json1['result'])) {
		foreach ($proton_json1['result']['reviews'] as $proton_review) {
			$proton_fullname =  $proton_review['author_name'] ;
			$proton_google_stars = $proton_review['rating'];
			echo '<div class="proton-review" >';
			echo '<h3 class="google-review">' . $proton_fullname . '</h3>';
			echo '<p class="google-review">' . $proton_review['text'] . '</p>';

			$x = 0;
			echo '<p class="stars google-review">';
			for ($x = 1; $x <= $proton_google_stars; $x++) {
				echo '<span>&#9733;</span>';
			}
			echo '</p>';
			$proton_time = $proton_review['time'];
			$proton_time = new DateTime("@$proton_time");
			echo '<p> <i class="google-review"></i>' . $proton_time->format('Y-m-d') . '</p>';
			echo '</div>';
		}
	}
    if ($option_proton_template == 'tabs') {
        echo '</div>';
    }
}

// Yelp Reviews

        $proton_yelp_api_URL = 'https://api.yelp.com/v3/businesses/' . $option_proton_yelp_id . '/reviews';
		
        $proton_yelp_args = array(
            'headers' => array(
			    'user-agent' => '',
                'Authorization' => 'Bearer ' . $option_proton_yelp_client_secret,
            )
        );
		
        $proton_yelp_response = wp_remote_get($proton_yelp_api_URL, $proton_yelp_args);
        $proton_http_code = wp_remote_retrieve_response_code($proton_yelp_response);
        $proton_yelp_body = wp_remote_retrieve_body($proton_yelp_response);
        $proton_yelp_body = utf8_encode($proton_yelp_body);
        $proton_jsonYELP  = json_decode($proton_yelp_body, true);

// Display Yelp Reviews
	
	if ($option_proton_display_yelp == 'yes') {
		if ($option_proton_template == 'tabs') {
			echo ' <div id="' . $proton_yelp_tab_order . '" class="tab' . $proton_yelp_tab . '">';
		}
	if (isset($proton_jsonYELP['reviews'])) {	
		foreach ($proton_jsonYELP['reviews'] as $proton_review) {
			$proton_yelpurl = $proton_review['url'];
			$proton_yelpurlID = explode("=", $proton_yelpurl);
			$proton_yelpurlID = explode("&", $proton_yelpurlID[1]);
			$proton_yelpurlID = $proton_yelpurlID[0];

			// Display as feed
			$proton_stars = $proton_review['rating'];
			echo '<div class="proton-review">';
			echo '<h3 class="yelp-review" >' . $proton_review['user']['name'] . '</h3>';
			echo '<p class="yelp-review" >' . $proton_review['text'] . '<a href="' . $proton_yelpurl . '" target="_blank"> Read a full review </a>' . '</p>';
			$x = 0;
			echo '<p class="stars yelp-review"  >';
			for ($x = 1; $x <= $proton_stars; $x++) {
				echo '<span>&#9733;</span>';
			}
			$proton_time = $proton_review['time_created'];
			$proton_time = explode(" ", $proton_time);
			echo '<br/><i class="yelp-review"></i>' . $proton_time[0];
			echo '</p>';
			echo '</div>';
		}
	}

    if ($option_proton_template == 'tabs') {
        echo '</div>';
    }
}

?>
</div>
<?php 	if ($option_proton_template == 'tabs') { echo '</div>'; } ?>
</div>
</div>
</div>
<div id="no-form" class="hidden  staticsec">
<div class="proton-content">
<div class="form-content">
<h3><?php echo $option_proton_negative_heading; ?></h3>
<form action="<?php echo esc_url( $_SERVER['REQUEST_URI'] );?>" method="post" name="frmReview" enctype="multipart/form-data" id="theform">
   <input type="text" name="client-name"  id="client-name" placeholder="<?php _e('Your Name')?>"  required="required" class="proton-form-field">
   <input type="email" name="client-email"  id="client-email" placeholder="<?php _e('Your Email')?>"  required="required" class="proton-form-field">
   <textarea name="comment" placeholder="<?php _e('Comments (please be specific)')?>" min-word-count="5" required="required" class="proton-form-field"></textarea>
   <div class="g-recaptcha" data-sitekey="<?php echo $option_proton_site_key ?>"></div>
   <input class="proton-btn no-button" name="btnSend" type="submit" value="<?php _e('Send')?>" />
</form>                   
     
<?php

if(isset($_POST['g-recaptcha-response'])) { 

$proton_captcha = $_POST['g-recaptcha-response'];

$proton_rc_response = wp_remote_get("https://www.google.com/recaptcha/api/siteverify?secret=". $option_proton_secret_key ."&response=". $proton_captcha);

$proton_rc_response = json_decode($proton_rc_response["body"], true);

if (true == $proton_rc_response["success"])
{
    // Success
    // if the submit button is clicked, send the email
    if (isset($_POST['btnSend']))
    {
		// sanitize form values
        $proton_name = sanitize_text_field($_POST["client-name"]);
        $proton_email = sanitize_email($_POST["client-email"]);
        $proton_comment = sanitize_textarea_field($_POST["comment"]);
		
		// validate name, comment and recaptcha
		
		 if ( empty($proton_name) ) {
			return false;
			echo '<p>Name field can not be empty.</p>';
			}		 
		
		 if ( empty($proton_comment) ) {
			return false;
			echo '<p>Comment field can not be empty.</p>';
			}
			
		 if( empty( $_POST['g-recaptcha-response'])) { 
		 return false;
		 echo '<p>Please check the captcha box.</p>';
		 }
		 
		// validate and require email
		if ( is_email($proton_email) ) {
		
        $proton_client_name = $option_company_name;
        $proton_client_email = "website@" . $proton_domain;
        $proton_client_subject = "Negative review from " . $proton_name;
        $proton_client_message = 'Name: ' . $proton_name . '<br> Email: ' . $proton_email . '<br> Comment:<br> ' . $proton_comment;

        // get the blog administrator's email address
        $proton_client_to = $option_proton_mail_to;

        $proton_client_headers = "Content-Type: text/html; charset=UTF-8; From: $name <$email>" . "\r\n";

        // If email has been process for sending, display a success message
			if (wp_mail($proton_client_to, $proton_client_subject, $proton_client_message, $proton_client_headers))
			{
            echo '<div id="popup-frame">';
            echo '<div><img src="' . $option_proton_logo . ' " ><p>' . $option_proton_negative_message . '</p></div>';
            echo '</div>
			<script>   jQuery("#no-form").toggleClass("hidden");</script>
			';
			}
			else
			{
            echo '<p>An unexpected error occurred.</p>';
			}
			}
		else {
			return false;
			echo '<p>Please resubmit with a proper email address.</p>';
		}
			
    }

}
}
else
{

    if (isset($_POST['btnSend']))
    {
        echo '<p>Please check the captcha box</p><script>   jQuery("#no-form").toggleClass("hidden");</script>';
    }
}
?>

</div>
</div>
</div>  
<div id="google" class="hidden <?php echo $option_google_position ?>">
   <svg class = "svg-bg" expanded = "true" height = "100%" width = "100%">
      <circle class = "expandCircle" cx = "50%" cy = "50%" r = "0%"  stroke = "#fff" stroke-width = "1%" fill = "#34a853">
      </circle>
   </svg>
   <div class="question-wrapp">
      <div id="goog-logo" class="site-logo">    <img src="<?php echo plugins_url('images/google.png',__FILE__ ) ; ?>"></div>
      <div class="proton-content">
         <div class="first-slide">
			<h3><?php _e('Do you have a Google account?')?></h3>
			<p> <a class="yes-button proton-btn gg"><?php _e('Yes')?></a></p>
			<p> <a class="no-button proton-btn gg"><?php _e('No')?></a></p>
         </div>
         <div class="second-slide hidden">
            <h3><?php _e('Hold tight while we take you to <br /> Google to leave a review...')?></h3>
         </div>
      </div>
   </div>
</div>
<div id="yelp" class="hidden <?php echo $option_yelp_position ?>">
   <svg class = "svg-bg" expanded = "true" height = "100%" width = "100%">
      <circle class = "expandCircle" cx = "50%" cy = "50%" r = "0%"  stroke = "#fff" stroke-width = "1%" fill = "#ce2200">
      </circle>
   </svg>
   <div class="question-wrapp">
      <div id="yp-logo" class="site-logo">    <img src="<?php echo plugins_url('images/yelp.png',__FILE__ ) ; ?>"></div>
      <div class="proton-content">
         <div class="first-slide">
			<h3><?php _e('Do you have a Yelp account?')?></h3>
			<p> <a class="yes-button proton-btn yp"><?php _e('Yes')?></a></p>
			<p> <a class="no-button proton-btn yp"><?php _e('No')?></a></p>
         </div>
         <div class="second-slide hidden">
            <h3><?php _e('Hold tight while we take you to <br /> Yelp to leave a review...')?></h3>
         </div>
      </div>
   </div>
</div>
</div>
    
<script>

jQuery("a.yes-button.yp").click(function(){
	jQuery("#yelp circle.expandCircle").addClass("click");
	jQuery("#yelp .first-slide").toggleClass("hidden");
	jQuery("#yelp .second-slide").toggleClass("hidden");
	setTimeout(function() {
	window.location.href = "<?php echo $option_yelp_url ;?>";
	}, 2000);
});

jQuery("a.yes-button.gg").click(function(){
   jQuery("#google circle.expandCircle").addClass("click");
   jQuery("#google .first-slide").toggleClass("hidden");
   jQuery("#google .second-slide").toggleClass("hidden");
  setTimeout(function() {
  window.location.href = "<?php echo $option_google_url ; ?> ";
  }, 2000);  
});

jQuery(".second a.no-button").click(function(){
	setTimeout(function() {
	window.location.href = "<?php echo $option_home_url ; ?>";
}, 500); 
});

jQuery(".first a.no-button").click(function(){
	jQuery(".first").toggleClass("hidden");
	jQuery(".second").toggleClass("hidden");  
});

jQuery("a.no-button.qn").click(function(){
	jQuery("#question").toggleClass("hidden");
	jQuery("#no-form").toggleClass("hidden");
});

jQuery("a.yes-button.qn").click(function(){
	jQuery("#question").toggleClass("hidden");
	jQuery(".first").toggleClass("hidden"); 
});

jQuery('body').addClass('proton_full_screen_<?php echo $option_proton_screen_choice ?>');
	
jQuery('.tabs .proton-tab-links a').on('click', function(e){
	var currentAttrValue = jQuery(this).attr('href');
	// Show/Hide Tabs
	jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
	// Change/remove current tab to active
	jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
	e.preventDefault();
});
	
</script>

<?php 
}