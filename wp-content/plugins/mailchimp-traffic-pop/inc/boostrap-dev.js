	jQuery(document).ready(function(){		

		jQuery().mailchimpTrafficPop({
			timeout:'<?PHP echo $tcmcpop_options['popup-timeout']; ?>', 
			delay:'<?PHP echo $tcmcpop_options['popup-delay']; ?>', 
			title:'<?PHP echo $tcmcpop_options['popup-title']; ?>', 
			message:'<?PHP echo $tcmcpop_options['popup-message']; ?>', 
			wait:'<?PHP echo $tcmcpop_options['popup-wait']; ?>', 
			opacity:'<?PHP echo $tcmcpop_options['popup-opacity']; ?>', 
			advancedClose:<?PHP echo $tcmcpop_options['advanced-close']; ?>, 
			closeable:<?PHP echo $tcmcpop_options['popup-close']; ?>,
			onClick:'<?PHP echo $tcmcpop_options['popup-onclick']; ?>',
			onLoad:<?PHP echo $tcmcpop_options['popup-onload']; ?>,
			wpLocation:'<?PHP echo TCMCPOP_LOCATION; ?>'
		});	

		jQuery("#tcmcpop_mailchimp").submit(function(){
							
			var thisForm = jQuery(this);
			var thisData = thisForm.serialize();
			var replaceArea = jQuery('#tcmcpop-form-wrap');
			var errorArea = jQuery('.tcmcpop-error');
			var submitTo = <?PHP echo TCMCPOP_LOCATION; ?>'/inc/submit.php';
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
