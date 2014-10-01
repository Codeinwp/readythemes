<?php
/*
Plugin Name: Theme Admin
Version: 1.0
Plugin URI: http://www.readythemes.com/plugins
Description: Admin for editing and adding themes for members to see in their dashboards.
Author: Ready Themes
Author URI: http://www.readythemes.com
License: None
*/

add_action( 'admin_menu', 'theme_admin_menu' );

function theme_admin_menu() 
{
	add_menu_page( 'Theme Admin', "Theme Admin", 0, "theme-admin", "theme_admin"); 
	
	$page = add_submenu_page( "hidden", "Add New Theme", "Add New Theme", 0, "theme-admin-new", "theme_admin_new"); 
	
	$page = add_submenu_page( "hidden", "Edit Theme", "Edit Theme", 0, "theme-admin-edit", "theme_admin_edit"); 

    //$page = add_submenu_page( "hidden", "Options", "Options", 0, "theme-admin", "theme_admin"); 

	//$page = add_submenu_page( "hidden", "Theme Admin FAQ", "Theme Admin FAQ", 0, "theme-admin-faq", "theme_admin_faq"); 

	//$page = add_submenu_page( "hidden", "Theme Admin Tutorial", "Theme Admin Tutorial", 0, "theme-admin-tutorial", "theme_admin_tutorial"); 

}

add_action( 'wp_enqueue_scripts', 'ta_add_stylesheet' );
function ta_add_stylesheet() 
{
	// Respects SSL, Style.css is relative to the current file
    wp_register_style( 'ta-style', plugins_url('style.css', __FILE__) );
    wp_enqueue_style( 'ta-style' );
}

require_once(dirname(__FILE__)."/theme-admin-home.php");
require_once(dirname(__FILE__)."/theme-admin-new.php");
require_once(dirname(__FILE__)."/theme-admin-edit.php");
?>