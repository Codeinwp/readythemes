<?php 

/*
Plugin Name: Social Media Page Lock
Plugin URI: http://www.WickedCoolPlugins.com
Description: Present a Social Media Popup. Lock content and release only when user completes atleast one form of Media Share (e.g. Facebook like, twitter, linkedIn, G+1).
Version: 1.0
Author: Veena Prashanth & Ravi Jayagopal
Author URI: http://www.WickedCoolPlugins.com
*/

// plugin root folder
$smpl_base_dir = WP_PLUGIN_URL . '/' . str_replace(basename( __FILE__), "" ,plugin_basename(__FILE__));
require_once(WP_PLUGIN_DIR . "/socialmediapagelock/_socialmediapagelock.php");

?>