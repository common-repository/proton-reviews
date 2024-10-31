<?php 

// Register admin scripts

function proton_admin_init() {
	 
	wp_register_style('proton_reviews_admin', plugins_url('css/admin-style.css',__FILE__ ));
    
	wp_enqueue_style('proton_reviews_admin' );
	
	}

add_action( 'admin_enqueue_scripts', 'proton_admin_init' );


// Reister settings

function register_proton_setting() {

	add_settings_field(
		'proton_google',
		'proton_google',
		'proton_google_callback_function',
		'proton'
	);	
	
    add_settings_field(
		'proton_display_google',
		'proton_display_google',
		'proton_display_google_callback_function',
		'proton'
	);	
	
	add_settings_field(
		'proton_google_position',
		'proton_google_position',
		'proton_google_position_callback_function',
		'proton'
	);	
	
	add_settings_field(
		'proton_google_places',
		'proton_google_places',
		'proton_google_places_callback_function',
		'proton'
	);	

	add_settings_field(
		'proton_yelp',
		'proton_yelp',
		'proton_yelp_callback_function',
		'proton'
	);
	
    add_settings_field(
		'proton_display_yelp',
		'proton_display_yelp',
		'proton_display_yelp_callback_function',
		'proton'
	);	
	
	add_settings_field(
		'proton_yelp_position',
		'proton_yelp_position',
		'proton_yelp_position_callback_function',
		'proton'
	);			
	
	add_settings_field(
		'proton_logo',
		'proton_logo',
		'proton_logo_callback_function',
		'proton'
	);
	
	add_settings_field(
		'proton_template',
		'proton_template',
		'proton_template_callback_function',
		'proton'
	);
	
	add_settings_field(
		'proton_company_name',
		'proton_company_name',
		'proton_company_name_callback_function',
		'proton'
	);
	
	add_settings_field(
		'proton_screen_choice',
		'proton_screen_choice',
		'proton_screen_choice_callback_function',
		'proton'
	);
	
	add_settings_field(
		'proton_site_key',
		'proton_site_key',
		'proton_site_key_callback_function',
		'proton'
	);
	
	add_settings_field(
		'proton_secret_key',
		'proton_secret_key',
		'proton_secret_key_callback_function',
		'proton'
	);
	
	add_settings_field(
		'proton_location_id',
		'proton_location_id',
		'proton_location_id_callback_function',
		'proton'
	);	
	
	add_settings_field(
		'proton_yelp_id',
		'proton_yelp_id',
		'proton_yelp_id_callback_function',
		'proton'
	);	
	
	add_settings_field(
		'proton_google_api_key',
		'proton_google_api_key',
		'proton_google_api_key_callback_function',
		'proton'
	);	
	
	add_settings_field(
		'proton_mail_to',
		'proton_mail_to',
		'proton_mail_to_callback_function',
		'proton'
	);
	
	add_settings_field(
		'proton_negative_heading',
		'proton_negative_heading',
		'proton_negative_heading_callback_function',
		'proton'
	);
			
	add_settings_field(
		'proton_negative_message',
		'proton_negative_message',
		'proton_negative_message_callback_function',
		'proton'
	);
	
	add_settings_field(
		'proton_recommend',
		'proton_recommend',
		'proton_recommend_callback_function',
		'proton'
	);
	
	register_setting('proton_default', 'proton_google'); 
	register_setting('proton_default', 'proton_display_google'); 
	register_setting('proton_default', 'proton_google_places'); 
	register_setting('proton_default', 'proton_yelp'); 
	register_setting('proton_default', 'proton_display_yelp'); 
	register_setting('proton_default', 'proton_google_position'); 
	register_setting('proton_default', 'proton_yelp_position'); 	
	register_setting('proton_default', 'proton_logo'); 
	register_setting('proton_default', 'proton_company_name');
	register_setting('proton_default', 'proton_screen_choice');
	register_setting('proton_default', 'proton_site_key');
	register_setting('proton_default', 'proton_secret_key');
	register_setting('proton_default', 'proton_location_id');
	register_setting('proton_default', 'proton_google_api_key');
	register_setting('proton_default', 'proton_yelp_id');
	register_setting('proton_default', 'proton_template');
	register_setting('proton_google', 'proton_google_array1');	
	register_setting('proton_default', 'proton_mail_to');
	register_setting('proton_default', 'proton_negative_heading');
	register_setting('proton_default', 'proton_negative_message');
	register_setting('proton_default', 'proton_recommend');
	
	} 


add_action( 'admin_init', 'register_proton_setting' );

// Cerate settings page

function proton_settings_page_html() {

	if (!current_user_can('manage_options')) {
	wp_die('You do not have sufficient permissions to access this page');
	}

// WP media 

if(function_exists( 'wp_enqueue_media' )){
    wp_enqueue_media();
	} else {
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
	}

// Put settings in to variables 

$option_google_position =  get_option('proton_google_position');
$option_proton_display_google =  get_option('proton_display_google');
$option_proton_google_places =  get_option('proton_google_places');
$option_yelp_position = get_option('proton_yelp_position');
$option_proton_display_yelp = get_option('proton_display_yelp');
$option_proton_logo = get_option('proton_logo');
$option_company_name = get_option('proton_company_name');
$option_proton_screen_choice = get_option('proton_screen_choice');
$option_proton_site_key = get_option('proton_site_key');
$option_proton_secret_key = get_option('proton_secret_key');
$option_proton_location_id1 = get_option('proton_location_id');
$option_proton_google_api_key = 'AIzaSyD8AVLU0Br2uehRD_Ckbmj5g0hKQuxVTS0';
$option_proton_yelp_id = get_option('proton_yelp_id');
$proton_google_array1 = get_option('proton_google_array1');
$option_proton_template = get_option('proton_template');
$option_proton_mail_to = get_option('proton_mail_to');
$option_proton_negative_heading = get_option('proton_negative_heading');
$option_proton_negative_message = get_option('proton_negative_message');
$option_proton_recommend = get_option('proton_recommend');

// Define other variables

$proton_domain = get_site_url();
$option_proton_settings_page_url = $proton_domain . '/wp-admin/options-general.php?page=proton';
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

 if ($option_google_position == "" || $option_google_position == null ) {
	$option_google_position = "first";
	}

if ($option_yelp_position == "" || $option_yelp_position == null ) {
	$option_yelp_position = "second";
	}

if ($option_proton_logo == "" || $option_proton_logo == null ) {
	$option_proton_logo = plugins_url('images/logo_blank.png',__FILE__ ) ;
	}

if ($option_company_name == "" || $option_company_name == null ) {
	$option_company_name = get_bloginfo();
	} 

if ($option_proton_screen_choice == "" || $option_proton_screen_choice == null ) {
	$option_proton_screen_choice = "no";
	}

if ($option_proton_template == "" || $option_proton_template == null ) {
	$option_proton_template = "list";
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

// Store Google Reviews

	$proton_url1= 'https://maps.googleapis.com/maps/api/place/details/json?placeid='. $option_proton_location_id1 .'&key='. $option_proton_google_api_key;
    $proton_file1 = file_get_contents($proton_url1);
    $proton_google_array = json_decode($proton_file1,true);
	update_option('proton_google_array1', $proton_google_array);
	
?>

<div class="wrap">
   <h2>Proton Reviews Settings</h2>
   <p>Please define all settings below or complete the <a class="wizzard" href="#">Proton Reviews setup wizard</a></p>
   <form method="post" action="options.php" id="protonSettingsForm">
      <?php settings_fields('proton_default');?>
      <div class="form-table-wrapper table1">
         <div class="form-outer-wrapper">
            <div class="form-table one">
               <h3>Display settings</h3>
               <div class="info-box display-settings info1"></div>
               <div class="wizzard-controlls hidde"> <span class="wizzard-next">next</span></div>
               <div class="row">
                  <div class="row-heading">Show in fullscreen view?</div>
                  <div class="row-content"><label style="padding-right: 10px;"><input type="radio" id="proton_screen_choice" name="proton_screen_choice" value="yes" <?php echo ($option_proton_screen_choice == 'yes') ? 'checked' : 'unchecked'; ?> >Yes</label><label style="padding-right: 10px;"><input type="radio" id="proton_screen_choice" name="proton_screen_choice" value="no" <?php echo ($option_proton_screen_choice == 'no') ? 'checked' : 'unchecked'; ?> >No</label></div>
               </div>
               <div class="row">
                  <div class="row-heading">Display reviews as list or tabs?</div>
                  <div class="row-content"><label style="padding-right: 10px;"><input type="radio" id="proton_template" name="proton_template" value="list" <?php echo ($option_proton_template == 'list') ? 'checked' : 'unchecked'; ?> >List</label><label style="padding-right: 10px;"><input type="radio" id="proton_template" name="proton_template" value="tabs" <?php echo ($option_proton_template == 'tabs') ? 'checked' : 'unchecked'; ?> >Tabs</label></div>
               </div>
               <div class="form-table-info infotable1 hidde">
                  <p><strong>Show in fullscreen view?</strong> - Decide whether or not to show the Proton Reviews panel in full screen or embedded in the layout of your website. The recommended setting is Yes (show in full screen) as it increases the chances of user interaction and makes it easier. 
                     <br/>
                     <br/>
                     <strong>Display reviews as a list or tabs?</strong> - You can showcase your reviews in two different layouts <strong>a) list</strong> where reviews are displayed in the continuous unobstructed list or <strong>b) tabs</strong> where reviews display is tabbed according to the source of the reviews.
               </div>
            </div>
         </div>
      </div>
      <div class="form-table-wrapper table2">
         <div class="form-outer-wrapper">
            <div class="form-table two">
               <h3>Business info</h3>
               <div class="info-box business-info info2"></div>
               <div class="wizzard-controlls hidde"> <span class="wizzard-prev">previous</span><span class="wizzard-next">next</span></div>
			   	<div class="row">
                  <div class="row-heading">"Would you recommend us" heading:</div>
                  <div class="row-content"><input type="text" id="proton_recommend" name="proton_recommend" value="<?php echo $option_proton_recommend; ?>" /></div>
               </div>
               <div class="row">
                  <div class="row-heading">Company Name:</div>
                  <div class="row-content"><input type="text" id="proton_company_name" name="proton_company_name" value="<?php echo $option_company_name; ?>" /></div>
               </div>
               <div class="row">
                  <div class="row-heading">Company Email:</div>
                  <div class="row-content"><input type="text" id="proton_mail_to" name="proton_mail_to" value="<?php echo $option_proton_mail_to; ?>" /></div>
               </div>
               <div class="row">
                  <div class="row-heading">Company Logo:</div>
                  <div class="row-content">
                     <div>
                        <input type="text" name="proton_logo" id="proton_logo"  value="<?php echo $option_proton_logo; ?>" class="regular-text">
                        <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
                     </div>
                  </div>
               </div>
               <div class="form-table-info infotable2 hidde">
                  <p><strong>Company Name</strong> - Enter the name of your business which you want to be displayed if you leave it blank Site Title will be displayed instead. 
                     <br />
                     <br />
                     <strong>Company Logo</strong> - Upload your logo image. Make sure you are uploading the logo of the correct size, which is whatever works best for you. We recommend a logo size of about 200px in width or height.
                  </p>
               </div>
            </div>
         </div>
      </div>
      <div class="form-table-wrapper table3">
         <div class="form-outer-wrapper">
            <div class="form-table three">
               <h3>Recaptcha settings</h3>
               <div class="info-box recaptcha-settings info3"></div>
               <div class="wizzard-controlls hidde"> <span class="wizzard-prev">previous</span><span class="wizzard-next">next</span></div>
               <div class="row">
                  <div class="row-heading">Recaptcha Site Key:</div>
                  <div class="row-content"><input type="text" id="proton_site_key" name="proton_site_key" value="<?php echo $option_proton_site_key; ?>" /></div>
               </div>
               <div class="row">
                  <div class="row-heading">Recaptcha Secret Key:</div>
                  <div class="row-content"><input type="text" id="proton_secret_key" name="proton_secret_key" value="<?php echo $option_proton_secret_key ?>" /></div>
               </div>
               <div class="logo-box recaptcha-box"> <a href="https://www.google.com/recaptcha/admin" target="_blank" > </a></div>
               <div class="form-table-info infotable3 hidde">
                  <p>Please <a href="https://www.google.com/recaptcha/admin" target="_blank" > click here </a> to get reCAPTCHA settings. reCAPTCHA is needed to protect you from spam. This plugin has one simple form which allows an unsatisfied customer to contact you first. You will need to obtain reCAPTCHA Site Key and reCAPTCHA Secret Key to protect this form from spam. Please make sure you choose Recaptcha V2 as your choice of the type of reCAPTCHA.</p>
               </div>
            </div>
         </div>
      </div>
      <div class="form-table-wrapper table4">
         <div class="form-outer-wrapper">
            <div class="form-table four">
               <h3>Google settings</h3>
               <div class="info-box google-settings info4"></div>
               <div class="wizzard-controlls hidde"> <span class="wizzard-prev">previous</span><span class="wizzard-next">next</span></div>
               <div class="row">
                  <div class="row-heading">Display Google Reviews?</div>
                  <div class="row-content"><label style="padding-right: 10px;"><input type="radio" id="proton_display_google" name="proton_display_google" value="yes" <?php echo ($option_proton_display_google == 'yes') ? 'checked' : 'unchecked'; ?> >Yes</label><label style="padding-right: 10px;"><input type="radio" id="proton_display_google" name="proton_display_google" value="no" <?php echo ($option_proton_display_google == 'no') ? 'checked' : 'unchecked'; ?> >No</label></div>
               </div>
               <div class="row">
                  <div class="row-heading">Google Maps Location ID:</div>
                  <div class="row-content"><input type="text"  class="google-place-id" id="proton_location_id" name="proton_location_id" value="<?php echo $option_proton_location_id1 ?>" /></div>
               </div>
               <div class="row hidde add-buttons"><a class="button-secondary" id="add-place" >Add Place</a> <a class="button-secondary" id="remove-place" >Remove Place</a></div>
               <div class="logo-box google-box"><a href="https://developers.google.com/places/place-id" target="_blank"> </a></div>
               <div class="form-table-info infotable4 hidde"><strong>Display Google Reviews?</strong> - Choose whether or not to show your business reviews from Google Places. 
                  <br />
                  <br />
                  <strong>Google Maps Location ID</strong> - You will need to enter google map location ID for Google place you wish to obtain reviews from and to which you wish to direct your website visitors to leave a review for you. You can get your Google Maps Location ID <a href="https://developers.google.com/places/place-id" target="_blank">here</a>. Just type your business name in the input field on the linked form. 
               </div>
            </div>
         </div>
      </div>
	  <div class="form-table-wrapper table8">
         <div class="form-outer-wrapper">
            <div class="form-table eight">
			 <h3>Form Settings</h3>
			    <div class="row">
                  <div class="row-heading">Negative Review Form Heading:</div>
                  <div class="row-content"><input type="text" id="proton_negative_heading" name="proton_negative_heading" value="<?php echo $option_proton_negative_heading ?>" /></div>
               </div>
			   	<div class="row">
                  <div class="row-heading">Negative Review Form Submisson Message:</div>
                  <div class="row-content"><textarea id="proton_negative_message" name="proton_negative_message" /><?php echo $option_proton_negative_message ?></textarea></div>
               </div>
			</div>
         </div>
		</div>
      <div class="form-table-wrapper table5">
         <div class="form-outer-wrapper">
            <div class="form-table five">
               <h3>Yelp settings</h3>
               <div class="info-box yelp-settings info5"></div>
               <div class="wizzard-controlls hidde"> <span class="wizzard-prev">previous</span><span class="wizzard-next">next</span></div>
               <div class="row">
                  <div class="row-heading">Display Yelp reviews?</div>
                  <div class="row-content"><label style="padding-right: 10px;"><input type="radio" id="proton_display_yelp" name="proton_display_yelp" value="yes" <?php echo ($option_proton_display_yelp == 'yes') ? 'checked' : 'unchecked'; ?> >Yes</label><label style="padding-right: 10px;"><input type="radio" id="proton_display_yelp" name="proton_display_yelp" value="no" <?php echo ($option_proton_display_yelp == 'no') ? 'checked' : 'unchecked'; ?> >No</label></div>
               </div>
               <div class="row">
                  <div class="row-heading">Yelp Businesses ID:</div>
                  <div class="row-content"><input type="text" id="proton_yelp_id" name="proton_yelp_id" value="<?php echo $option_proton_yelp_id ?>" /></div>
               </div>
               <div class="logo-box yelp-box"><a href="https://www.yelp.com" target="_blank"> </a></div>
               <div class="form-table-info infotable5 hidde">
                  <strong>Display Yelp reviews?</strong> - Choose whether or not to show your business reviews from Yelp.
                  <br />
                  <br />
                  <strong>Yelp Businesses ID</strong> - You can find Yelp Businesses ID as part of your Yelp listing URL: https://www.yelp.com/biz/<strong>your-yelp-business-id</strong>  (for example https://www.yelp.com/biz/<strong>ocean-eye-optometry-summerville</strong>).
               </div>
            </div>
         </div>
      </div>
      <div style="position: relative; max-width: 1060px" >
         <div class="form-table-wrapper table6" >
            <div class="form-outer-wrapper">
               <div class="info-box reorder-settings info6"></div>
               <div class="info-wrapper">
                  <h4>Reorder review screens</h4>
                  <p>Please drag and drop to reorder front end review screens.</p>
                  <div class="wizzard-controlls hidde"> <span class="wizzard-prev">previous</span><span class="wizzard-finish">finish</span></div>
                  <div class="form-table-info infotable6 hidde">
                     <p>Front end review screens will prompt the user to leave the review either on Google Places or Yelp page in the order you choose here.</p>
                  </div>
               </div>
               <div class="form-table six" id="dragable">
                  <div class="row target google <?php echo $option_google_position; ?>">
                     <div class="row-heading">Google Review URL:</div>
                     <div class="row-content"><input type="text" id="proton_google" name="proton_google" value="<?php echo $option_google_url; ?>" readonly />
                        <input type="hidden" id="proton_google_position" name="proton_google_position" class="object" value="<?php echo $option_google_position; ?>" />
                     </div>
                  </div>
                  <div class="row target yelp <?php echo $option_yelp_position; ?>">
                     <div class="row-heading">Yelp Review URL:</div>
                     <div class="row-content"><input type="text" id="proton_yelp" name="proton_yelp" value="<?php echo $option_yelp_url; ?>" readonly />
                        <input type="hidden" id="proton_yelp_position" name="proton_yelp_position" class="object" value="<?php echo $option_yelp_position; ?>" />
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="row-heading">&nbsp;</div>
         <div class="row-content"><?php submit_button('Save / Refresh Reviews');?></div>
      </div>
      <div id="serialize_output2"></div>
   </form>
</div>

<script>

<?php 
for ($y = 1; $y <= 6; $y++) {
		 
  echo 'jQuery(".info'. $y .'").on("click touch", function () {
		jQuery(".table'. $y .'").toggleClass("poped");
		jQuery(".form-table-info.infotable'. $y .'").toggleClass("hidde");
		});';
	}

?>
	jQuery('.form-outer-wrapper').on('click touch', function() {
	 var self = jQuery(this).parent();
	 self.toggleClass("poped");
	 jQuery(this).find(".form-table-info").toggleClass("hidde");
	 jQuery(this).find(".wizzard-controlls").addClass("hidde");
	 }).children().click(function(e) {
	 e.stopPropagation();
	});

	jQuery('.wizzard').on('click touch', function() {
	 jQuery('.table1').toggleClass('poped');
	 jQuery('.table1 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table1 .form-table-info').toggleClass('hidde');	 
	});
 
  jQuery('.table1 .wizzard-next').on('click touch', function(){
	 jQuery('.table1').toggleClass('poped');
	 jQuery('.table2').toggleClass('poped');
	 jQuery('.table1 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table1 .form-table-info').toggleClass('hidde');
	 jQuery('.table2 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table2 .form-table-info').toggleClass('hidde');	 
	 
 });
 
   jQuery('.table2 .wizzard-next').on('click touch', function(){
	 jQuery('.table2').toggleClass('poped');
	 jQuery('.table3').toggleClass('poped');
	 jQuery('.table2 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table2 .form-table-info').toggleClass('hidde');
	 jQuery('.table3 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table3 .form-table-info').toggleClass('hidde');	 
	 
 });
 
    jQuery('.table2 .wizzard-prev').on('click touch', function(){
	 jQuery('.table2').toggleClass('poped');
	 jQuery('.table1').toggleClass('poped');
	 jQuery('.table2 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table2 .form-table-info').toggleClass('hidde');
	 jQuery('.table1 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table1 .form-table-info').toggleClass('hidde');	 
	 
 });
 
    jQuery('.table3 .wizzard-next').on('click touch', function(){
	 jQuery('.table3').toggleClass('poped');
	 jQuery('.table4').toggleClass('poped');
	 jQuery('.table3 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table3 .form-table-info').toggleClass('hidde');
	 jQuery('.table4 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table4 .form-table-info').toggleClass('hidde');	 
	 
 });
 
     jQuery('.table3 .wizzard-prev').on('click touch', function(){
	 jQuery('.table3').toggleClass('poped');
	 jQuery('.table2').toggleClass('poped');
	 jQuery('.table3 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table3 .form-table-info').toggleClass('hidde');
	 jQuery('.table2 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table2 .form-table-info').toggleClass('hidde');	 
	 
 });
 
     jQuery('.table4 .wizzard-next').on('click touch', function(){
	 jQuery('.table4').toggleClass('poped');
	 jQuery('.table5').toggleClass('poped');
	 jQuery('.table4 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table4 .form-table-info').toggleClass('hidde');
	 jQuery('.table5 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table5 .form-table-info').toggleClass('hidde');	 
	 
 });
 
     jQuery('.table4 .wizzard-prev').on('click touch', function(){
	 jQuery('.table4').toggleClass('poped');
	 jQuery('.table3').toggleClass('poped');
	 jQuery('.table4 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table4 .form-table-info').toggleClass('hidde');
	 jQuery('.table3 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table3 .form-table-info').toggleClass('hidde');	 
	 
 });
 
 
     jQuery('.table5 .wizzard-next').on('click touch', function(){
	 jQuery('.table5').toggleClass('poped');
	 jQuery('.table6').toggleClass('poped');
	 jQuery('.table5 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table5 .form-table-info').toggleClass('hidde');
	 jQuery('.table6 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table6 .form-table-info').toggleClass('hidde');	 
	 
 });
 
     jQuery('.table5 .wizzard-prev').on('click touch', function(){
	 jQuery('.table5').toggleClass('poped');
	 jQuery('.table4').toggleClass('poped');
	 jQuery('.table5 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table5 .form-table-info').toggleClass('hidde');
	 jQuery('.table4 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table4 .form-table-info').toggleClass('hidde');	 
	 
 }); 
     jQuery('.table6 .wizzard-next').on('click touch', function(){
	 jQuery('.table6').toggleClass('poped');
	 jQuery('.table7').toggleClass('poped');
	 jQuery('.table6 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table6 .form-table-info').toggleClass('hidde');
	 jQuery('.table7 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table7 .form-table-info').toggleClass('hidde');	 
	 
 });
     jQuery('.table6 .wizzard-prev').on('click touch', function(){
	 jQuery('.table6').toggleClass('poped');
	 jQuery('.table5').toggleClass('poped');
	 jQuery('.table6 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table6 .form-table-info').toggleClass('hidde');
	 jQuery('.table5 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table5 .form-table-info').toggleClass('hidde');	 
	 
 });
 
     jQuery('.table7 .wizzard-prev').on('click touch', function(){
	 jQuery('.table7').toggleClass('poped');
	 jQuery('.table6').toggleClass('poped');
	 jQuery('.table7 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table7 .form-table-info').toggleClass('hidde');
	 jQuery('.table6 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table6 .form-table-info').toggleClass('hidde');	 
	 
 });
 
     jQuery('.table6 .wizzard-finish ').on('click touch', function(){
	 jQuery('.table6').toggleClass('poped');
	 jQuery('.table6 .wizzard-controlls').toggleClass('hidde');	 
	 jQuery('.table6 .form-table-info').toggleClass('hidde');  
	 jQuery('input#submit').trigger('click');
	 
 });
 
	jQuery(document).ready(function($) {
	  $('#upload-btn').click(function(e) {
	    e.preventDefault();
	    var image = wp.media({
	        title: 'Upload Image',
	        multiple: false
	      }).open()
	      .on('select', function(e) {
	        var uploaded_image = image.state().get('selection').first();
	        console.log(uploaded_image);
	        var image_url = uploaded_image.toJSON().url;
	        $('#proton_logo').val(image_url);
	      });
	  });

	  // Sort By Class
	  var array = ['first', 'second'];
	  $.each(array, function(index, value) {
	    $('.six').append($('.' + value));
	  });

	  // Make links dragable

	  $('#dragable').sortable();
	  $('#dragable').sortable().bind('sortupdate', function() {
	    var classes = ['first', 'second'];

	    $(function() {

	      if ($('.row').hasClass('first')) {
	        $('.row').removeClass('first')
	      }

	      if ($('.row').hasClass('second')) {
	        $('.row').removeClass('second')
	      }

	      var target = $('.target');
	      var object = $('.object');
	      target.each(function(index) {
	        $(this).addClass(classes[index % 3]);
	      });

	      object.each(function(index) {
	        $(this).val(classes[index % 3]);
	      });
	    });

	  });

	});
</script>

<?php
}
?>
