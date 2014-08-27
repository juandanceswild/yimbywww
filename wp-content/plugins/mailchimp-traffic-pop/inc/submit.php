<?PHP

/*-----------------------------------------------------------------------------------*/
/*	Start Form Submit
/*-----------------------------------------------------------------------------------*/

header("Content-type: application/json");

// Boostrap WP
$wp_include = "../wp-load.php";
$i = 0;
while (!file_exists($wp_include) && $i++ < 10) {
  $wp_include = "../$wp_include";
}

// let's load WordPress
require($wp_include);

// Get options
global $tcmcpop_options;
$return_error = 'false';

// If our form is submitted
if(isset($_POST['action']) && $_POST['action'] == 'tcmcpop_submit'){
	
	// get form vars
	$first_name = isset($_POST['tcmcpop_first']) ? strip_tags($_POST['tcmcpop_first']) : '';
	$last_name = isset($_POST['tcmcpop_last']) ? strip_tags($_POST['tcmcpop_last']) : '';
	$email = strip_tags($_POST['tcmcpop_email']);
	
	// Valid email check
	if(!is_email($email)){
		$return_msg = __('Please enter a valid email address!', 'tcmcpop');
		$return_error = 'true';
	}
	
	// Check for empty names
	if(isset($_POST['tcmcpop_first']) && $first_name == ''){
		$return_msg = __('Please enter your name!', 'tcmcpop');
		$return_error = 'true';
	} if(isset($_POST['tcmcpop_last']) && $last_name == ''){
		$return_msg = __('Please enter your name!', 'tcmcpop');
		$return_error = 'true';
	}
					
	// send this email to campaign_monitor
	if( !isset($tcmcpop_options['api-key']) || $tcmcpop_options['api-key'] == '' || $tcmcpop_options['popup-list'] == ''){
		
		$return_msg = __('Make sure you have entered a valid MailChimp API Key and have selected a list!', 'tcmcpop');
		$return_error = 'true';
			
	} else {
		
		// Only continue if there are no errors
		if($return_error != 'true'){
		
			// MailChimp Needed
			if(!class_exists('MCAPI')){require_once(TCMCPOP_LOCATION.'/inc/MCAPI.class.php');}
			
			// Start API
			$mailchimp = new MCAPI($tcmcpop_options['api-key']);
			
			// Send To MC
			if($mailchimp->listSubscribe( 
				$tcmcpop_options['popup-list'], 
				$email, 
				array(
					'FNAME' => $first_name,
					'LNAME' => $last_name
				),
				'html',
				$tcmcpop_settings['double-optin']
			) === true){
				
				// Return Success
				$return_msg = '<span class="tcmcpop-success">'.$tcmcpop_options['success-message'].' <a href="#" onclick="tcmcpop_flush(true);">'.__('Close', 'tcmcpop').'</a></span>';
				$return_error = 'false';
				
			} else {
				
				// Check to see if user already subscribes
				if( $mailchimp->errorCode == '214' ){
					
					$return_msg = '<span class="tcmcpop-success">'.__('We noticed you have already subscribed and lost your cookies, you will not be double subscribed or anything like that!', 'tcmcpop').' <a href="#" onclick="tcmcpop_flush(true);">'.__('Close', 'tcmcpop').'</a></span>';
					$return_error = 'false';
					
				} else {
					
					$return_msg = __('There was an error contacting mailchimp: ', 'tcmcpop').$mailchimp->errorMessage.'( Code '.$mailchimp->errorCode.' )';
					$return_error = 'true';
					
				}
								
			} // end if MC sent
		
		} // end if no errors
	
	} // end if API set

	// Return JSON Response
	$return = array('message' => $return_msg, 'error' => $return_error);
	echo json_encode($return);

} // end form submit
	
?>
