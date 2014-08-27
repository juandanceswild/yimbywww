<?php 

/*
Plugin Name: MailChimp Traffic Pop for WordPress
Plugin Script: mailchimp-traffic-pop.php
Plugin URI: http://tyler.tc
Description: TrafficPop now takes your MailChimp email lists to the next level, use your sites traffic to generate huge email lists worth big bucks.
Version: 1.0.0
Author: Tyler Colwell
Author URI: http://tyler.tc

--- THIS PLUGIN AND ALL FILES INCLUDED ARE COPYRIGHT © TYLER COLWELL 2011-2013. 
YOU MAY NOT MODIFY, RESELL, DISTRIBUTE, OR COPY THIS CODE IN ANY WAY. ---

*/

/*-----------------------------------------------------------------------------------*/
/*	Define Anything Needed
/*-----------------------------------------------------------------------------------*/

define('TCMCPOP_LOCATION', WP_PLUGIN_URL . '/'.basename(dirname(__FILE__)));
define('TCMCPOP_PATH', plugin_dir_path(__FILE__));
define('TCMCPOP_RELPATH', dirname( plugin_basename( __FILE__ ) ) );
define('TCMCPOP_ABS', ABSPATH);
require_once('inc/tcf_settings_page.php');
require_once('inc/tcf_bootstrap.php');
// MailChimp
if(!class_exists('MCAPI')){require_once(TCMCPOP_PATH.'/inc/MCAPI.class.php');}		

?>
