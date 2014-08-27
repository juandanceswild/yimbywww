<?PHP

/*-----------------------------------------------------------------------------------*/
/*	Bootstrapn' Time!
/*-----------------------------------------------------------------------------------*/

function tcmcpop_init(){

	// Load Lang
	load_plugin_textdomain( 'tcmcpop', false, TCMCPOP_RELPATH . '/locale/' );

	// Make sure we are not in the admin section
	if (!is_admin()){

		// Start WordPress Libs
		if( get_option( 'tcmcpop-jquery-enabled') == 'true' ){
			wp_enqueue_script('jquery');
		}

		// Register JS
		wp_deregister_script('tcmcpop');
		wp_register_script('tcmcpop', TCMCPOP_LOCATION.'/js/jquery.mctp.js', false, '1.0', true);

		// Include them
		wp_enqueue_script('tcmcpop');

		// Flush, register, enque CSS
		wp_deregister_style('tcmcpop-css');
		wp_register_style('tcmcpop-css', TCMCPOP_LOCATION.'/css/mctp.css');
		wp_enqueue_style('tcmcpop-css');

	}

} // End jsloader function

/*-----------------------------------------------------------------------------------*/
/*	Current Page Function
/*-----------------------------------------------------------------------------------*/

function tcmcpop_current_page(){

	$pageURL = 'http';

	if ($_SERVER["HTTPS"] == "on"){$pageURL .= "s";}

	$pageURL .= "://";

	if ($_SERVER["SERVER_PORT"] != "80"){

		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];

	} else {

		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

	}

	return $pageURL;
}

/*-----------------------------------------------------------------------------------*/
/*	Create MailChimp Lists List ;)
/*-----------------------------------------------------------------------------------*/

function tcmcpop_mc_lists(){

	// Get User Settings
	global $tcmcpop_options;

	// If Key Entered
	if( trim( $tcmcpop_options['api-key'] ) != '' ){

		// Build array
		$return = array();
		$mailchimp = new MCAPI($tcmcpop_options['api-key']);
		$lists = $mailchimp->lists();
		if($lists) :
			foreach($lists['data'] as $key => $list) :
				$return[$list['id']] = $list['name'];
			endforeach;
		endif;
		return $return;

	} // end if api key

}

/*-----------------------------------------------------------------------------------*/
/* Build Pattern Array
/*-----------------------------------------------------------------------------------*/

function tcmcpop_backgrounds(){

	// Get Patterns
	$pattern_location = TCMCPOP_PATH.'/images/patterns/';
	$dir_handle = opendir($pattern_location) or die("Unable to open folder");
	$retrun = array();

	// Loop Through Patterns
	$i = 0; $files = array();
	while (false !== ($pattern = readdir($dir_handle))) {

		// Make Sure file is png image
		if(ereg("(.*)\.(png)", $pattern)){

			// Make sure no dupe / the high res is not double listed
			if( !preg_match('/_@/', $pattern) ){

				// Get file name for drop down
				$name =  htmlspecialchars(urldecode($pattern));
				$title = strtolower(str_replace(".png", "", $name));
				$title = ucwords(str_replace("_", ' ', $title));

				// Build Array
				$return[$title] = $pattern;

			} // end if double

		} // end if png

	} // end while

	return $return;

}

/*-----------------------------------------------------------------------------------*/
/*	Run Custom CSS For Popup
/*-----------------------------------------------------------------------------------*/

function tcmcpop_theme(){ global $tcmcpop_options; ?>

<style type="text/css">

#tcmcpop .tcmcpop-inner{
    background:url(<?PHP echo TCMCPOP_LOCATION.'/images/patterns/'.$tcmcpop_options['popup-background']; ?>) top left repeat #ffffff;
}

</style>

<?PHP }

/*-----------------------------------------------------------------------------------*/
/*	MCTP function for framework
/*-----------------------------------------------------------------------------------*/

function tcmcpop_popup(){

	// Define current post
	global $post;

	// Get options
	global $tcmcpop_options;

	// Delay check
	if( !isset( $tcmcpop_options['delay'] ) || $tcmcpop_options['delay'] == '' ){
		$tcmc_delay = '0';
	} else {
		$tcmc_delay = $tcmcpop_options['delay'];
	}

	// Only continue if the pop-up option is enabled...
	if($tcmcpop_options['enabled'] != 3){

		// If only to include in pages
		if($tcmcpop_options['page-selector'] == 1){

			$switch = false;

			// Check if page is in the array
			if(in_array($post->ID, $tcmcpop_options['pages'])){

				// set to true bc page is in selected array
				$switch = true;

			}

		// else check to exclude from pages
		} else if($tcmcpop_options['page-selector'] == 2){

			$switch = true;

			// disable if page is in array
			if( in_array( $post->ID, explode( ',', $tcmcpop_options['pages'] ) ) ){

				// disable
				$switch = false;

			}

		} // end selector check

		// Check if homepage should display STP
		if(is_home() && $tcmcpop_options['enabled'] == 1){

			$switch = true;

		} else if(is_home() && $tcmcpop_options['enabled'] == 2){

			$switch = false;

		}

		// Build Close Button
		$close = '';
		if( $tcmcpop_options['popup-close'] == 'true' ){
			$close = '<a href="#" onclick="tcmcpop_flush('.$tcmcpop_options['popup-close-cookie'].');"> - '.__('Or Close', 'tcmcpop').'</a>';
		}

		// only show if switch is on
		if($switch == true){ ?>

<!-- popup bg -->
<div id="tcmcpop-bg"></div>

<!-- start popup -->
<div id="tcmcpop">

	<!-- start background wrapper -->
	<div class="tcmcpop-inner">

    	<!-- start overlay -->
        <div class="tcmcpop-overlay">

            <h3 class="tcmcpop-title"><?PHP echo $tcmcpop_options['popup-title']; ?></h3>

            <div class="tcmcpop-message"><?PHP echo $tcmcpop_options['popup-message']; ?></div>

            <div class="tcmcpop-error"></div>

            <div id="tcmcpop-form-wrap">

                <?PHP if( $tcmcpop_options['api-key'] == '' || $tcmcpop_options['popup-list'] == '' ){

                    _e('You need to enter a valid API key and select a list in the MailChimp TrafficPop Settings panel.');

                } else { ?>

                    <form id="tcmcpop_mailchimp" name="tcmcpop_mailchimp" action="" method="post">
                    <?PHP if( $tcmcpop_options['first-name'] == 'true' ){ ?>
                        <div class="tcmcpop-section">
                            <label for="tcmcpop_first"><?php _e('Your First Name', 'tcmcpop'); ?></label>
                            <input class="tcmcpop-input" name="tcmcpop_first" id="tcmcpop_first" type="text" placeholder="<?php _e('First Name', 'tcmcpop'); ?>"/><br class="tcmcpop-clear" />
                        </div>
                    <?PHP } if( $tcmcpop_options['last-name'] == 'true' ){ ?>
                        <div class="tcmcpop-section">
                            <label for="tcmcpop_last"><?php _e('Your Last Name', 'tcmcpop'); ?></label>
                            <input class="tcmcpop-input" name="tcmcpop_last" id="tcmcpop_last" type="text" placeholder="<?php _e('Last Name', 'tcmcpop'); ?>"/><br class="tcmcpop-clear" />
                        </div>
                    <?PHP } // end if ?>
                        <div class="tcmcpop-section">
                            <label for="tcmcpop_email"><?php _e('Your Email Address', 'tcmcpop'); ?></label>
                            <input class="tcmcpop-input" name="tcmcpop_email" id="tcmcpop_email" type="text" placeholder="<?php _e('Email Address', 'tcmcpop'); ?>"/><br class="tcmcpop-clear" />
                        </div>
                        <div class="tcmcpop-section last">
                            <input type="hidden" name="action" value="tcmcpop_submit"/>
                            <input type="hidden" name="tcmcpop_listID" value="<?php echo $tcmcpop_options['popup-list']; ?>"/>
                            <input class="tcmcpop-submit" type="submit" value="<?php _e('Sign Up', 'tcmcpop'); ?>"/>
                            <div class="tcmcpop-counter"><!-- Or Wait <span id="tcmcpop-count"> </span> Seconds --> <?PHP echo $close; ?></div>
                        </div>

                        <br class="tcmcpop-clear" />

                    </div>

            </form>

    	</div><!-- end overlay -->

    </div><!-- end background wrapper -->

<?PHP } // end if ?>

</div><!-- end popup -->

<script language="javascript">

	jQuery(document).ready(function(){

        var mimicFade = function()
        {

            firstload = false;

            jQuery('div#tcmcpop').css({
                'top'     :  0,
                'left'    :  0,
                'right'   :  0,
                'bottom'  :  0,
                'margin'  :  'auto',
                'height'  :  400
            }).fadeIn();

            jQuery('div#tcmcpop-bg').css({
                'opacity'  :  0.8,
                'z-index'  :  9999
            }).fadeIn();

            jQuery('div.tcmcpop-counter a').attr('onclick', '').on('click', function(e)
            {
                e.preventDefault();

                jQuery('div#tcmcpop, div#tcmcpop-bg').fadeOut();
            });
        };

        if ( $.cookie('firstLoad') != '1' )
        {

            setTimeout(mimicFade, 60000);
            $.cookie('firstLoad', 1, {expires: 60});
        }

		jQuery("#tcmcpop_mailchimp").submit(function(){

			var thisForm = jQuery(this);
			var thisData = thisForm.serialize();
			var replaceArea = jQuery('#tcmcpop-form-wrap');
			var errorArea = jQuery('.tcmcpop-error');
			var submitTo = '<?PHP echo TCMCPOP_LOCATION; ?>/inc/submit.php';
			jQuery('input[type="submit"]',thisForm).val("Sending...");
			errorArea.empty();

			jQuery.ajax({
				type: "POST",
				url: submitTo,
				data: thisData,
				// callback handler that will be called on error
				error: function(jqXHR, textStatus, errorThrown){
					// log the error to the console
					console.log("The following error occured: "+textStatus+errorThrown);
					jQuery('input[type="submit"]',thisForm).val("Submit");
				},
				success:function(response){
					jQuery('input[type="submit"]',thisForm).val("Submit");
					if( response.error == 'true' ){
						errorArea.html(response.message);
						tcmcpop_recenter();
					} else {
						var autoClose = '<?PHP echo $tcmcpop_options['popup-auto-close']; ?>';
						if( autoClose == 'true' ){
							tcmcpop_flush(true);
						} else {
							replaceArea.html(response.message);
							tcmcpop_recenter();
						} // end if autoClose on
					} // end if error = true
				} // end onSuccess
			}); // and ajax

			return false;

		});

	}); // end on load

</script>

	<?PHP

		} // End if switch enabled

	} // End if enabled

} // End main function

/*-----------------------------------------------------------------------------------*/
/*	Start Running Hooks
/*-----------------------------------------------------------------------------------*/

// Start the plugin
add_action( 'init', 'tcmcpop_init' );
// Add hook to include settings CSS
add_action( 'admin_init', 'tcmcpop_settings_admin_css' );
// create custom plugin settings menu
add_action( 'admin_menu', 'tcmcpop_create_menu' );
// Add Custom CSS
add_action( 'wp_head', 'tcmcpop_theme' );
// Run Popup
add_action( 'wp_footer', 'tcmcpop_popup' );

?>
