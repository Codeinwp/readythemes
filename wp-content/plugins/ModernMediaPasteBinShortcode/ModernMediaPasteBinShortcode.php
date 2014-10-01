<?php
/*
Plugin Name: PasteBin Code Snippet Shortcode
Plugin URI: http://miloguide.com/2010/07/23/pastebin-com-code-snippet-shortcode-plugin/
Description: Enables a shortcode "pbcode" to embed code that you have pasted to http://pastebin.com/
Version: 1.0
Author: Chris Carson
Author URI: http://miloguide.com/
*/

class ModernMediaPasteBinShortcode {
	var $plugin_namespace;
	
	function __construct(){
		$this->plugin_namespace = "pbcode";
		add_action("plugins_loaded", array($this,  "_action_plugins_loaded"));
	}
	function _action_plugins_loaded(){
		add_shortcode($this->plugin_namespace, array($this, "_shortcode"));
	}
	
	function _shortcode($args, $content = null){
		$id = $args["id"];
		if (empty($id)) return;
		$html = "<div class=\"$this->plugin_namespace\">";
		$html .= "<script src=\"http://pastebin.com/embed_js.php?i=";
		$html .= $id;
		$html .= "\"></script></div>";
		return $html;
	}
}
new ModernMediaPasteBinShortcode();
