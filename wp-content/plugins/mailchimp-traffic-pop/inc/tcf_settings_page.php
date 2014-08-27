<?PHP

/*-----------------------------------------------------------------------------------*/
/*	Menu Creation
/*-----------------------------------------------------------------------------------*/

function tcmcpop_create_menu() {
	
	// Adds the tab into the options panel in WordPress Admin area
	$page = add_options_page( __("MailChimp Traffic Pop Settings", "tcmcpop"), __("MailChimp TrafficPop", "tcmcpop"), 'administrator', __FILE__, 'tcmcpop_settings_page');

	//call register settings function
	add_action( 'admin_init', 'tcmcpop_register_settings' );
	
	// Hook style sheet loading
	add_action( 'admin_print_styles-' . $page, 'tcmcpop_admin_cssloader' );

}
		
/*-----------------------------------------------------------------------------------*/
/*	Add Admin CSS
/*-----------------------------------------------------------------------------------*/

// Add style sheet for plugin settings
function tcmcpop_settings_admin_css(){
				
	/* Register our stylesheet. */
	wp_register_style( 'tcmcpopSettings', TCMCPOP_LOCATION.'/css/tc_framework.css' );
							
} function tcmcpop_admin_cssloader(){
	
	// It will be called only on your plugin admin page, enqueue our stylesheet here
	wp_enqueue_style( 'tcmcpopSettings' );
	   
} // End admin style CSS

/*-----------------------------------------------------------------------------------*/
/*	Define Settings
/*-----------------------------------------------------------------------------------*/

global $tcmcpop_settings;

$tcmcpop_settings = array(
	// General
	'enabled' 				=> '3',
	'jquery-enabled'		=> 'true',
	'double-optin'			=> 'true',
	// MailChimp
	'api-key'				=>	'',
	'popup-list'			=>	'',
	'first-name'			=>	'',
	'last-name'				=>	'',
	// Page Settings
	'page-selector'			=>	'2',
	'pages'					=>	'',
	// Popup Settings
	'popup-timeout'			=>	'25',
	'popup-delay'			=>	'0',
	'popup-title'			=>	'Hey there bud, check out our Newsletter!',
	'popup-message'			=>	'Sign up to our newsletter to get the our latest and greatest updates. Once you subscribe you will no longer see this box!',
	'popup-wait'			=>	'0',
	'popup-opacity'			=>	'90',
	'advanced-close'		=>	'false',
	'popup-close'			=>	'true',
	'popup-close-cookie'	=>	'false',
	'popup-auto-close'		=>	'false',
	'popup-onload'			=>	'true',
	'popup-onclick'			=>	'tcmcpop-open',
	'popup-background'		=>	'grey.png',
	// Templates
	'success-message'		=> 	"Thank's for subscribing! Note that we don't spam, ever, and you will only recieve occasional updates from us :)"
);

/*-----------------------------------------------------------------------------------*/
/*	Register Settings
/*-----------------------------------------------------------------------------------*/

function tcmcpop_register_settings(){
	global $tcmcpop_settings;
	$prefix = 'tcmcpop';
	foreach($tcmcpop_settings as $setting => $value){
		// Define
		$thisSetting = $prefix.'-'.$setting;
		// Register setting
		register_setting( $prefix.'-settings-group', $thisSetting );
		// Apply default
		add_option( $thisSetting, $value );
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Get Settings
/*-----------------------------------------------------------------------------------*/

function tcmcpop_get_settings(){
	// Get Settings	
	global $tcmcpop_settings;
	$prefix = 'tcmcpop';
	$new_settings = array();
	foreach($tcmcpop_settings as $setting => $default){
		// Define
		$thisSetting = $prefix.'-'.$setting;
		$value = get_option( $thisSetting );
		if( !isset($value) ) : $value = ''; endif;
		$new_settings[$setting] = $value;
	}
	return $new_settings;
}

global $tcmcpop_options;
$tcmcpop_options = tcmcpop_get_settings();

/*-----------------------------------------------------------------------------------*/
/*	Ajax save callback
/*-----------------------------------------------------------------------------------*/

add_action('wp_ajax_tcmcpop_tc_settings_save', 'tcmcpop_tc_settings_save');

function tcmcpop_tc_settings_save(){

	// Setup
	global $tcmcpop_settings;
	$prefix = 'tcmcpop';
	check_ajax_referer( $prefix.'_settings_secure', 'security' );
	
	// Loop through settings
	foreach($tcmcpop_settings as $setting => $value){
		
		// Define
		$thisSetting = $prefix.'-'.$setting;
					
		// Register setting
		update_option( $thisSetting, $_POST[$thisSetting] );
		
	}
				
}

/*-----------------------------------------------------------------------------------*/
/*	New framework settings page
/*-----------------------------------------------------------------------------------*/

function tcmcpop_settings_page(){
	
?>

<style>

#ssp-order-list{
	width:570px;
	margin:0px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:18px !important;
}

#ssp-order-list .order-list-default{
	width:570px;
	float:none !important;
	border-left:1px solid #E3E3E3;
	border-right:1px solid #E3E3E3;
	border-bottom:1px solid #E3E3E3;
	border-top:1px solid #eeeeee;
	padding:9px !important;
	background:#fff !important;
	cursor:pointer;
}

#ssp-order-list .order-list-default img{
	float:left;
	margin-right:10px;
}

#ssp-order-list .order-list-highlight{
	float:none !important;
	height:45px;
	width:583px;
	background:#E3E3E3 !important;
}

.ssp-clear{
	clear:both;
}

.tcmcpop-admin{
	background:url(<?PHP echo TCMCPOP_LOCATION; ?>/images/tchover.png) no-repeat transparent;
	display:block;
	height:24px;
	line-height:24px !important;
	float:left;
	margin:0 5px 0 0;
	border:0px !important;
	outline:none !important;
	padding:0 0 0 30px;
	width:100%;
}

.tcmcpop-admin.facebook{background-position:0 0;}
.tcmcpop-admin.facebook:hover{background-position:0 -25px;}
.tcmcpop-admin.twitter{background-position:0 -50px;}
.tcmcpop-admin.twitter:hover{background-position:0 -75px;}
.tcmcpop-admin.pinterest{background-position:0 -100px;}
.tcmcpop-admin.pinterest:hover{background-position:0 -125px;}
.tcmcpop-admin.google{background-position:0 -150px;}
.tcmcpop-admin.google:hover{background-position:0 -175px;}
.tcmcpop-admin.linkedin{background-position:0 -200px;}
.tcmcpop-admin.linkedin:hover{background-position:0 -225px;}
.tcmcpop-admin.flickr{background-position:0 -250px;}
.tcmcpop-admin.flickr:hover{background-position:0 -275px;}
.tcmcpop-admin.dribbble{background-position:0 -300px;}
.tcmcpop-admin.dribbble:hover{background-position:0 -325px;}
.tcmcpop-admin.youtube{background-position:0 -400px;}
.tcmcpop-admin.youtube:hover{background-position:0 -425px;}
.tcmcpop-admin.vimeo{background-position:0 -450px;}
.tcmcpop-admin.vimeo:hover{background-position:0 -475px;}
.tcmcpop-admin.wordpress{background-position:0 -500px;}
.tcmcpop-admin.wordpress:hover{background-position:0 -525px;}
.tcmcpop-admin.vk{background-position:0 -550px;}
.tcmcpop-admin.vk:hover{background-position:0 -575px;}

</style>

<script>
	
jQuery(document).ready(function(){

/*-----------------------------------------------------------------------------------*/
/*	Options Pages & Layout
/*-----------------------------------------------------------------------------------*/
	  
	jQuery('.options_pages li').click(function(){
		
		var tab_page = 'div#' + jQuery(this).attr('id');
		var old_page = 'div#' + jQuery('.options_pages li.active').attr('id');
		
		// Change button class
		jQuery('.options_pages li.active').removeClass('active');
		jQuery(this).addClass('active');
				
		// Set active tab page
		jQuery(old_page).fadeOut('slow', function(){
			
			jQuery(tab_page).fadeIn('slow');
			
		});
		
	});
		
/*-----------------------------------------------------------------------------------*/
/*	Form Submit
/*-----------------------------------------------------------------------------------*/
	
	jQuery('form#plugin-options').submit(function(){
		
		// Update MCE
		tinyMCE.triggerSave();
			
		var data = jQuery(this).serialize();
		
		jQuery.post(ajaxurl, data, function(response){
			
			if(response == 0){
				
				// Flash success message and shadow
				var success = jQuery('#success-save');
				var bg = jQuery("#message-bg");
				success.css("position","fixed");
				success.css("top", ((jQuery(window).height() - 65) / 2) + jQuery(window).scrollTop() + "px");
				success.css("left", ((jQuery(window).width() - 257) / 2) + jQuery(window).scrollLeft() + "px");
				bg.css({"height": jQuery(window).height()});
				bg.css({"opacity": .45});
				bg.fadeIn("slow", function(){
					success.fadeIn('slow', function(){
						success.delay(1500).fadeOut('fast', function(){
							bg.fadeOut('fast');
						});
					});
				});
								
			} else {
				
				//error out
				
			}
		
		});
				  
		return false;
	
	});	
	
	
/*-----------------------------------------------------------------------------------*/
/*	Finished
/*-----------------------------------------------------------------------------------*/
	
});

</script>

<div class="wrap">

    <div id="icon-options-general" class="icon32"><br/></div>
    <h2 class="tc-heading"><?PHP _e('MailChimp Traffic Pop', 'tcmcpop'); ?> <span id="version">V1.0.0</span> <a href="<?PHP echo TCMCPOP_LOCATION; ?>/documentation" target="_blank">&raquo; <?PHP _e('View Plugin Documentation', 'tcmcpop'); ?></a></h2>

</div>

<div id="message-bg"></div>
<div id="success-save"></div>

<div id="tc_framework_wrap">

    <div id="content_wrap">
        
    	<form id="plugin-options" name="plugin-options" action="/">
        <?php settings_fields( 'tcmcpop-settings-group' ); ?>
        <input type="hidden" name="action" value="tcmcpop_tc_settings_save" />
        <input type="hidden" name="security" value="<?php echo wp_create_nonce('tcmcpop_settings_secure'); ?>" />
        <!-- Checkbox Fall Backs -->
        <input type="hidden" name="tcmcpop-jquery-enabled" id="tcmcpop-jquery-enabled" value="false" />
        <input type="hidden" name="tcmcpop-double-optin" id="tcmcpop-double-optin" value="false" />
        <input type="hidden" name="tcmcpop-first-name" id="tcmcpop-first-name" value="false" />
        <input type="hidden" name="tcmcpop-last-name" id="tcmcpop-last-name" value="false" />
        <input type="hidden" name="tcmcpop-popup-close" id="tcmcpop-popup-close" value="false" />
        <input type="hidden" name="tcmcpop-popup-close-cookie" id="tcmcpop-popup-close-cookie" value="false" />
        <input type="hidden" name="tcmcpop-popup-auto-close" id="tcmcpop-popup-auto-close" value="false" />
        <input type="hidden" name="tcmcpop-advanced-close" id="tcmcpop-advanced-close" value="false" />
        <input type="hidden" name="tcmcpop-popup-onload" id="tcmcpop-popup-onload" value="false" />

        	<div id="sub_header" class="info">
            
                <input type="submit" name="settingsBtn" id="settingsBtn" class="button-framework save-options" value="<?php _e('Save All Changes', 'tcmcpop') ?>" />
                <span><?PHP _e('Options Page', 'tcmcpop') ?></span>
                
            </div>
            
            <div id="content">
            
            	<div id="options_content">
                
                	<ul class="options_pages">
                    	<li id="general_options" class="active"><a href="#"><?php _e('General Settings', 'tcmcpop') ?></a><span></span></li>
                    	<li id="popup_options"><a href="#"><?php _e('Popup Settings', 'tcmcpop') ?></a><span></span></li>
                    	<li id="template_options"><a href="#"><?php _e('Template Settings', 'tcmcpop') ?></a><span></span></li>
                    </ul>
                    
                    <div id="general_options" class="options_page">
                    
                    	<div class="option">
                        	<h3><?php _e('Enable MailChimp Traffic Pop', 'tcmcpop') ?></h3>
                            <div class="section">
                            	<div class="element">
                                    <select name="tcmcpop-enabled" id="tcmcpop-enabled" class="textfield">
                                        <option value="1" <?PHP if(get_option('tcmcpop-enabled') == '1'){echo 'selected="selected"';} ?>><?php _e('Enabled and Show on Home Page', 'tcmcpop') ?></option>
                                        <option value="2" <?PHP if(get_option('tcmcpop-enabled') == '2'){echo 'selected="selected"';} ?>><?php _e('Enabled and Do Not Show on Home Page', 'tcmcpop') ?></option>
                                        <option value="3" <?PHP if(get_option('tcmcpop-enabled') == '3'){echo 'selected="selected"';} ?>><?php _e('Disabled ( Off )', 'tcmcpop') ?></option>
                                    </select>                                    
                                    <div class="tc-radio-group">
                                        <p><label><input name="tcmcpop-jquery-enabled" type="checkbox" class="tc-checkbox" id="tcmcpop-jquery-enabled" value="true" <?PHP if(get_option('tcmcpop-jquery-enabled') == 'true'){?>checked="checked"<?PHP } ?> /><?PHP _e('Enable jQuery Loading', 'tcmcpop'); ?></label></p>
                                    </div>
                                </div>
                                <div class="description"><?php _e('Disable / Enable MailChimp Traffic Pop easily. You can also configure which side of the page the panel will come from, and pick your backgroung pattern here. Make sure you read the docs defore turning off jQuery.', 'tcmcpop') ?></div>
                            </div>
                        </div>  

                    
                    	<div class="option">
                        	<h3><?php _e('MailChimp Setup', 'tcmcpop') ?></h3>
                            <div class="section">
                            	<div class="element">
                                    <input class="textfield" name="tcmcpop-api-key" type="text" id="tcmcpop-api-key" value="<?php echo get_option('tcmcpop-api-key'); ?>" />
                                    <p>Select MailChimp List</p>
                                    <?PHP if( get_option('tcmcpop-api-key') == '' ){
										_e('You need to enter your API key before selecting a list!', 'tcmcpop');
									} else { ?>
                                    <select name="tcmcpop-popup-list" id="tcmcpop-popup-list" class="textfield">
                                    <?PHP
										$tcmclists = tcmcpop_mc_lists();
										if( count($tcmclists) < 1 ){
											_e('You need to create at least one email list on MailChimp before you can use the plugin.');
										} else {
											foreach($tcmclists as $list => $name){ ?>
                                                <option value="<?PHP echo $list; ?>" <?PHP if(get_option('tcmcpop-popup-list') == $list){echo 'selected="selected"';} ?>><?php echo $name; ?></option><?PHP
											} // end for each
										} // end if else
									?>                                    
                                    </select>
                                    <?PHP } // end if ?>   
                                    <div class="tc-radio-group">
                                        <p><label><input name="tcmcpop-first-name" type="checkbox" class="tc-checkbox" id="tcmcpop-first-name" value="true" <?PHP if(get_option('tcmcpop-first-name') == 'true'){?>checked="checked"<?PHP } ?> /><?PHP _e('Enable First Name Field', 'tcmcpop'); ?></label></p>
                                        <p><label><input name="tcmcpop-last-name" type="checkbox" class="tc-checkbox" id="tcmcpop-last-name" value="true" <?PHP if(get_option('tcmcpop-last-name') == 'true'){?>checked="checked"<?PHP } ?> /><?PHP _e('Enable Last Name Field', 'tcmcpop'); ?></label></p>
                                    </div>
                                </div>
                                <div class="description"><?php _e('Enter your MailChimp API Key. This is required for the plugin to work! (Note that your Lists will not appear until a key is saved and the page is re-loaded)', 'tcmcpop') ?></div>
                            </div>
                        </div>
                        
                        
                    	<div class="option">
                        	<h3><?php _e('Page Setup', 'tcmcpop') ?></h3>
                            <div class="section">
                            	<div class="element">
                                	<p><?php _e('Page Selector', 'tcmcpop') ?></p>
                                    <select name="tcmcpop-page-selector" id="tcmcpop-page-selector" class="textfield">
                                        <option value="1" <?PHP if(get_option('tcmcpop-page-selector') == '1'){echo 'selected="selected"';} ?>><?php _e('Show Only on Selected Pages', 'tcmcpop') ?></option>
                                        <option value="2" <?PHP if(get_option('tcmcpop-page-selector') == '2'){echo 'selected="selected"';} ?>><?php _e('Show on All Pages But Selected Pages', 'tcmcpop') ?></option>
                                    </select>
                                    <p><?php _e('Selected Pages', 'tcmcpop') ?></p>
                                    	<input name="tcmcpop-pages" id="tcmcpop-pages" class="textfield" type="text" value="<?php echo get_option('tcmcpop-pages'); ?>" /><small>Ex: 4354,223,908,5567</small>
                                        
                                    <div class="tc-radio-group">
                                        <p><label><input name="tcmcpop-popup-onload" type="checkbox" class="tc-checkbox" id="tcmcpop-popup-onload" value="true" <?PHP if(get_option('tcmcpop-popup-onload') == 'true'){?>checked="checked"<?PHP } ?> /><?PHP _e('Show Popup on Page Load', 'tcmcpop'); ?></label></p>
                                    </div>
                                        
                                </div>
                                <div class="description"><?php _e('First, choose how you want to use selected pages by either showing the popup on all pagees except for the ones you choose, or showing the popup on only the pages you choose. Then enter a comma seperated list of page / post / custom pot type IDs in the selected pages box. You can also choose to show the popup on page load, this is handy if you only want to show the popup with a click event.', 'tcmcpop') ?></div>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    <div id="popup_options" class="options_page hide">
        
                    	<div class="option">
                        	<h3><?php _e('Close Options', 'tcmcpop') ?></h3>
                            <div class="section">
                            	<div class="element">
                                    <div class="tc-radio-group">
                                        <p><label><input name="tcmcpop-popup-close" type="checkbox" class="tc-checkbox" id="tcmcpop-popup-close" value="true" <?PHP if(get_option('tcmcpop-popup-close') == 'true'){?>checked="checked"<?PHP } ?> /><?PHP _e('Enable Close Button', 'tcmcpop'); ?></label></p>
                                        <p><label><input name="tcmcpop-popup-close-cookie" type="checkbox" class="tc-checkbox" id="tcmcpop-popup-close-cookie" value="true" <?PHP if(get_option('tcmcpop-popup-close-cookie') == 'true'){?>checked="checked"<?PHP } ?> /><?PHP _e('Enable Close Cookie', 'tcmcpop'); ?></label></p>
                                        <p><label><input name="tcmcpop-advanced-close" type="checkbox" class="tc-checkbox" id="tcmcpop-advanced-close" value="true" <?PHP if(get_option('tcmcpop-advanced-close') == 'true'){?>checked="checked"<?PHP } ?> /><?PHP _e('Enable Advanced Close', 'tcmcpop'); ?></label></p>
                                        <p><label><input name="tcmcpop-popup-auto-close" type="checkbox" class="tc-checkbox" id="tcmcpop-popup-auto-close" value="true" <?PHP if(get_option('tcmcpop-popup-auto-close') == 'true'){?>checked="checked"<?PHP } ?> /><?PHP _e('Auto Close On Successful Subscription', 'tcmcpop'); ?></label></p>
                                    </div>
                                </div>
                                <div class="description"><?php _e('Here you can enable/disable the close button and choose to use the advanced close features. If enabled they allow you to close the popup using the escape key or clicking anywhere outside of the popup. If auto close is enabled, the popup will close and fade out if a successful form submit is completed. You can also enable the Close Cookie so that the popup will no longer open after the user clicks close.', 'tcmcpop') ?></div>
                            </div>
                        </div>  


                    	<div class="option">
                        	<h3><?php _e('Countdown Timer', 'tcmcpop') ?></h3>
                            <div class="section">
                            	<div class="element">
                                    <input class="textfield" name="tcmcpop-popup-timeout" type="text" id="tcmcpop-popup-timeout" value="<?php echo get_option('tcmcpop-popup-timeout'); ?>" />
                                </div>
                                <div class="description"><?php _e('Enter how long the countdown timer should run (in seconds) before the popup closes.', 'tcmcpop') ?></div>
                            </div>
                        </div>
                        

                    	<div class="option">
                        	<h3><?php _e('Popup Delay Timer', 'tcmcpop') ?></h3>
                            <div class="section">
                            	<div class="element">
                                    <input class="textfield" name="tcmcpop-popup-delay" type="text" id="tcmcpop-popup-delay" value="<?php echo get_option('tcmcpop-popup-delay'); ?>" />
                                </div>
                                <div class="description"><?php _e('Here you can enter a number of seconds the page will wait before the popup shows once the page is loaded. Enter 0 to show the popup as soon as the page is loaded.', 'tcmcpop') ?></div>
                            </div>
                        </div>
                        
                        
                    	<div class="option">
                        	<h3><?php _e('Frequency (Wait) Timer', 'tcmcpop') ?></h3>
                            <div class="section">
                            	<div class="element">
                                    <input class="textfield" name="tcmcpop-popup-wait" type="text" id="tcmcpop-popup-wait" value="<?php echo get_option('tcmcpop-popup-wait'); ?>" />
                                </div>
                                <div class="description"><?php _e('Here you can enter the number of minutes the user will wait between seeing the popup. If you enter 0, the popup will show every page load until the user subscribes. If you entered 5 for example, the user will only see the popup once every 5 minutes they are on your site.', 'tcmcpop') ?></div>
                            </div>
                        </div>
                        

                    	<div class="option">
                        	<h3><?php _e('Background Opacity', 'tcmcpop') ?></h3>
                            <div class="section">
                            	<div class="element">
                                    <input class="textfield" name="tcmcpop-popup-opacity" type="text" id="tcmcpop-popup-opacity" value="<?php echo get_option('tcmcpop-popup-opacity'); ?>" />
                                </div>
                                <div class="description"><?php _e('Here you can set the opacity of the background shadow used. Because the shadow for MailChimp Traffic Pop is white, its suggested you use a high value around the default of 90.', 'tcmcpop') ?></div>
                            </div>
                        </div>
                        

                    	<div class="option">
                        	<h3><?php _e('On-Click Class', 'tcmcpop') ?></h3>
                            <div class="section">
                            	<div class="element">
                                    <input class="textfield" name="tcmcpop-popup-onclick" type="text" id="tcmcpop-popup-onclick" value="<?php echo get_option('tcmcpop-popup-onclick'); ?>" />
                                </div>
                                <div class="description"><?php _e('Here you can enter a class that will open the popup when clicked. Any element with this class will open the popup when clicked.', 'tcmcpop') ?></div>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    <div id="template_options" class="options_page hide">
                    
                    	<div class="option">
                        	<h3><?php _e('Background Pattern', 'tcmcpop') ?></h3>
                            <div class="section">
                            	<div class="element">
                                    <select name="tcmcpop-popup-background" id="tcmcpop-popup-background" class="textfield">
                                    <?PHP
										// Get Patterns
										$patterns = tcmcpop_backgrounds();
										print_r($patterns);
										foreach($patterns as $pattern => $file){ ?>
                                            <option value="<?PHP echo $file; ?>" <?PHP if(get_option('tcmcpop-popup-background') == $file){echo 'selected="selected"';} ?>><?php echo $pattern; ?></option>
										<?PHP } // end for each ?>
                                    </select>                                    
                                </div>
                                <div class="description"><?php _e('Here you can select the background pattern to use in your popup.', 'tcmcpop') ?></div>
                            </div>
                        </div>
                        
                        
                    	<div class="option">
                        	<h3><?php _e('Popup Title', 'tcmcpop') ?></h3>
                            <div class="section">
                            	<div class="element">
                                    <input class="textfield" name="tcmcpop-popup-title" type="text" id="tcmcpop-popup-title" value="<?php echo get_option('tcmcpop-popup-title'); ?>" />
                                </div>
                                <div class="description"><?php _e('Enter the title text for your popup.', 'tcmcpop') ?></div>
                            </div>
                        </div>
                        
    
                    	<div class="option">
                        	<h3><?php _e('Popup Message', 'tcmcpop') ?></h3>
                            <div class="section">
                            	<div class="tc-editor" style="min-height:200px;">
								<?PHP wp_editor( stripslashes(get_option('tcmcpop-popup-message')), 'tcmcpop-message-pro', array( 'textarea_name' => 'tcmcpop-popup-message', 'media_buttons' => true, 'tinymce' => array( 'theme_advanced_buttons1' => 'formatselect,forecolor,|,bold,italic,underline,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,spellchecker,wp_fullscreen,wp_adv' ) ) ); ?>
								</div>    
                                <div class="tc-editor-description"><?php _e('Here you can enter the message that will appear in the popup. Keep in mind the forum will be taller if you are using the name fields.', 'tcmcpop') ?></div>
                            </div>
                        </div> 


                    	<div class="option">
                        	<h3><?php _e('Success Message', 'tcmcpop') ?></h3>
                            <div class="section">
                            	<div class="tc-editor" style="min-height:200px;">
								<?PHP wp_editor( stripslashes(get_option('tcmcpop-success-message')), 'tcmcpop-success-message-pro', array( 'textarea_name' => 'tcmcpop-success-message', 'media_buttons' => true, 'tinymce' => array( 'theme_advanced_buttons1' => 'formatselect,forecolor,|,bold,italic,underline,|,bullist,numlist,blockquote,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,spellchecker,wp_fullscreen,wp_adv' ) ) ); ?>
								</div>    
                                <div class="tc-editor-description"><?php _e('Here you can enter the message that will appear in the popup. Keep in mind the forum will be taller if you are using the name fields.', 'tcmcpop') ?></div>
                            </div>
                        </div> 

					</div>  
                                                               
            		<br class="clear" />
                    
            </div>
            
            <div class="info bottom">
            
                <input type="submit" name="settingsBtn" id="settingsBtn" class="button-framework save-options" value="<?php _e('Save All Changes', 'tcmcpop') ?>" />
            
            </div>
            
        </form>
        
    </div>

</div>

<?php } ?>
