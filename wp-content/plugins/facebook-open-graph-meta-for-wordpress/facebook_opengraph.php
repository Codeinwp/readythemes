<?php
/**
 * Plugin Name: Facebook Open Graph Meta For WordPress
 * Short Name: facebook_opengraph
 * Description: Add Facebook Open Graph protocol to turn your web pages into graph objects and enables you to integrate your Web pages into the social graph.
 * Author: Ivan Kristianto
 * Version: 1.0
 * Requires at least: 3.0
 * Tested up to: 3.1.3
 * Tags: facebook, open graph, social graph, helper
 * Contributors: Ivan Kristianto
 * WordPress URI: http://wordpress.org/extend/plugins/facebook-open-graph-meta-for-wordpress/
 * Author URI: http://resume.ivankristianto.com
 * Donate URI: http://www.ivankristianto.com/portfolio/
 * Plugin URI: http://www.ivankristianto.com/wordpress-series/facebook-open-graph-meta-for-wordpress/1891/
 *
 *
 * facebook_opengraph - Facebook Open Graph Meta For WordPress
 * Copyright (C) 2011	IvanKristianto.com
 *
 * This program is free software - you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.	See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.	If not, see <http://www.gnu.org/licenses/>.
 */
 
 // exit if add_action or plugins_url functions do not exist
if (!function_exists('add_action') || !function_exists('plugins_url')) exit;

// function to replace wp_die if it doesn't exist
if (!function_exists('wp_die')) : function wp_die ($message = 'wp_die') { die($message); } endif;

//if (!function_exists('has_post_thumbnail')) : function has_post_thumbnail ($id = '0') { return false; } endif; //It even doesn't have the function

// define some definitions if they already are not
!defined('WP_CONTENT_DIR') && define('WP_CONTENT_DIR', ABSPATH . 'wp-content');
!defined('WP_PLUGIN_DIR') && define('WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins');
!defined('WP_CONTENT_URL') && define('WP_CONTENT_URL', get_option('siteurl') . '/wp-content');
!defined('WP_PLUGIN_URL') && define('WP_PLUGIN_URL', WP_CONTENT_URL . '/plugins');
!defined('FB_OG_PATH') && define('FB_OG_PATH', dirname( __FILE__ ));

// don't load directly
!defined('ABSPATH') && exit;


/**
 * facebook_opengraph
 * 
 * @package   
 * @author Ivan Kristianto
 * @version 2011
 * @access public
 */
 
require_once FB_OG_PATH.'/includes/template_helper.php';

class facebook_opengraph{
	var $options = array();	// an array of options and values
	var $plugin = array();	// array to hold plugin information
	
	var $template_helper = null;
	
	/**
	 * Defined blank for loading optimization
	 */
	function __construct() {}
	
	//Engine start
	function execute(){		
		register_activation_hook(__FILE__,  array( &$this, 'activationCallback'));
		register_deactivation_hook(__FILE__,  array( &$this, 'deactivationCallback'));
		
		add_action('init', array(&$this, 'init'));
	}
	
	public function activationCallback(){
		$this->default_options();
	}
	
	/**
     * A callback called whenever plugin deactivating
     */
    public function deactivationCallback()
    {
		$this->DeleteOptions();
    }
	
	/**
	 * Loads options named by opts array into correspondingly named class vars
	 */
	function LoadOptions($opts=array('options', 'plugin')){
		foreach ($opts as $pn) $this->{$pn} = get_option("facebook_opengraph_{$pn}");
	}
	
	/**
	 * Saves options from class vars passed in by opts array and the adsense key and api key
	 */
	function SaveOptions($opts=array('options','plugin'))	{
		foreach ($opts as $pn) {
			update_option("facebook_opengraph_{$pn}", $this->{$pn});
			//var_dump($this->{$pn});
		}
	}
	
	/**
	 * Saves options from class vars passed in by opts array and the adsense key and api key
	 */
	function DeleteOptions($opts=array('options','plugin'))	{
		foreach ($opts as $pn) delete_option("facebook_opengraph_{$pn}", $this->{$pn});
	}
	
	/**
	 * Gets and sets the default values for the plugin options, then saves them
	 */
	function default_options()	{
		
		// get all the plugin array data
		$this->plugin = $this->get_plugin_data();	
		
		// default options
		$this->options = array(
			'enabled'			 => 0,
			'fb_admins'			 => '',
			'og_title' 	 		 => '%post_title%',
			'og_type' 	 		 => 'article',
			'og_url' 	 		 => '%post_url%',
			'og_image' 	 		 => '',
			'og_site_name' 	 	 => '%blog_title%',
		);
		
		// Save all these variables to database
		$this->SaveOptions();
	}
	
	/**
	 * Loads the options into the class vars.  
	 * Adds this plugins 'load' function to the 'load-plugin' hook.
	 * Adds this plugins 'admin_print_styles' function to the 'admin_print_styles-plugin' hook. 
	 */
	function init()
	{
		$this->LoadOptions();
		
		$this->template_helper = new fb_template_helper($this);
		
		add_action("load-{$this->plugin['hook']}", array(&$this, 'load'));
		add_action('admin_print_scripts-'.$this->plugin['hook'], array(&$this,'admin_page_scripts'));
		add_action('admin_print_styles-'.$this->plugin['hook'], array(&$this,'admin_page_styles'));
		add_action('admin_menu', array(&$this,'adminMenuCallback'));
		add_action('wp_head', array(&$this,'headerCallback'));
		
		wp_register_script($this->plugin['pagenice'], plugins_url('/static/js/facebook_opengraph.js',__FILE__), array('jquery'),$this->plugin['version']);	
	}
	
	/**
	 * Enqueue javascript in FWP-Search Admin page.
	 * Enqueue required javascript.
	 * Run in admin_print_scripts hook
	 */
	function admin_page_scripts() {
		wp_enqueue_script('postbox');
		wp_enqueue_script('dashboard');
		wp_enqueue_script('thickbox');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-dialog');
		wp_enqueue_script($this->plugin['pagenice']);
		//wp_enqueue_script($this->plugin['pagenice'], plugins_url('/static/js/facebook_opengraph.js',__FILE__),array('jquery'),$this->plugin['version']);
	}
	
	/**
	 * Enqueue css styles in FWP-Search Admin page.
	 * Enqueue required css styles.
	 * Run in admin_print_styles hook
	 */
	function admin_page_styles() {
		wp_enqueue_style('dashboard');
		wp_enqueue_style('thickbox');
		wp_enqueue_style('global');
		wp_enqueue_style('wp-admin');
		wp_register_style('jquery-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.css', true);
		wp_enqueue_style('jquery-style');
        wp_enqueue_style(' jquery-template');
		wp_enqueue_style($this->plugin['pagenice'], plugins_url('/static/css/admin.css',__FILE__));
	}
	
	/**
     * A callback to make admin menu
     */
	function adminMenuCallback(){
		add_options_page('Facebook Open Graph', 'Facebook Open Graph', 9, $this->plugin['pagenice'], array(&$this, 'options_page'));
	}
	
	/**
     * A callback to hook into wp_head
     */
	function headerCallback(){
		$this->addMeta();
	}
	
	/**
     * Add facebook Open graph protocol meta into wp_head
     */
	function addMeta(){
		global $post;
		if ( !is_singular()) return;
		
		if(!$this->options['enabled']) return;
		
		$title = str_replace('%post_title%', get_the_title(), $this->options['og_title']);
		$url = str_replace('%post_url%', get_permalink(), $this->options['og_url']);
		if(function_exists('has_post_thumbnail'))
			$has_thumb = has_post_thumbnail( $post->ID )? true : false;
		else
			$has_thumb = false;
		$thumbs = null;
		if($has_thumb){
			$thumbs = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
			$thumbs = $thumbs[0];
		}
		else{
			$thumbs = get_post_meta($post->ID, "thumb", $single = true);
			
			if($thumbs==""){
				$thumbs = get_post_meta($post->ID, "thumbnail", $single = true);
				if($thumbs!=""){
					$has_thumb = true;
				}
			}
			else{
				$has_thumb = true;
			}				
		}
		
		$image = $has_thumb?  $thumbs : $this->options['og_image'];
		
		if(strpos($image, 'http://') === false){
			$image = get_bloginfo('wpurl') . '/'.$image;
			
		}
		
		$sitename = str_replace('%blog_title%', get_bloginfo('name'), $this->options['og_site_name']);
		
		echo '<meta property="fb:admins" content="'.$this->options[fb_admins].'"/>';
        echo '<meta property="og:title" content="' . $title . '"/>';
        echo '<meta property="og:type" content="'.$this->options[og_type].'"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="'.$sitename.'"/>';
		echo '<meta property="og:image" content="' . $image . '"/>';
	}
	
	function options_page(){
		if(!current_user_can('administrator')) wp_die('<strong>ERROR</strong>: Not an Admin!');
		$pluginurl = plugin_dir_url(__FILE__).'includes/getfacebookid.php';
		echo <<<JS
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".fade").fadeIn(1000).fadeTo(1000, 1).fadeOut(1000);
			});
			var pluginurl = "{$pluginurl}";
		</script>
JS;
?>
		<div class="wrap">
			<a href="http://www.ivankristianto.com/">
				<div id="facebook-icon" style="background: url(<?php echo plugin_dir_url(__FILE__) ?>static/images/facebook-icon.png) no-repeat;" class="icon32"><br /></div>
			</a>
			<h2><?php echo $this->plugin['plugin-name']; ?></h2>
			<?php if(isset($_POST['_wpnonce'])) {
				echo '<div class="updated fade" id="message"><p>'.__('Configuration', $this->plugin['pagenice']).' <strong>'.__('SAVED', $this->plugin['pagenice']).'</strong></p></div>';
			} ?>
			<div class="postbox-container" style="width:70%;">
				<div class="metabox-holder">	
					<div class="meta-box-sortables">
						<form action="<?php echo admin_url($this->plugin['action']); ?>" method="post" id="form">
							<?php
								wp_nonce_field($this->plugin['nonce']);
								
								//General Settings
								$rows = array();
								$pre_content = '<p>Facebook Open Graph Meta For WordPress: Add Facebook Open Graph protocol to turn your web pages into graph objects and enables you to integrate your Web pages into the social graph.</p>';
								$content = '';
								
								$rows[] = array(
									'id' => 'enabled',
									'label' => 'Enable/Disable plugin',
									'desc' => 'Enable or disable this plugin',
									'content' =>  $this->template_helper->checkbox('enabled'),
								);
								
								$rows[] = array(
									'id' => 'fb_admins',
									'label' => 'Facebook ID',
									'desc' => 'This is your Facebook Admin ID, use the helper button if you don\'t know your Facebook ID. Your facebook username is like http://www.facebook.com/<username>',
									'content' =>  $this->template_helper->textinput('fb_admins') . ' <button id="getfacebookid" onclick="return false;">Get Facebook ID</button>',
								);
								
								$rows[] = array(
									'id' => 'og_site_name',
									'label' => 'Your Site title',
									'desc' => 'This is your Website title that you set under Settings -> General -> Site Title. You can add more words to the template, and include %blog_title% in it.',
									'content' =>  $this->template_helper->textinput('og_site_name'),
								);
								
								$rows[] = array(
									'id' => 'og_title',
									'label' => 'Your title',
									'desc' => 'This is your page title, the plugin will use your post title. You can add more words to the template, and include %post_title% in it.',
									'content' =>  $this->template_helper->textinput('og_title'),
								);
								
								$rows[] = array(
									'id' => 'og_type',
									'label' => 'Select Content Type',
									'desc' => 'Choose your best descibed content type, if you use it on blog, article type is recommended',
									'content' =>  $this->template_helper->select('og_type', array(
											'article' => 'Article (Recommend)',
											'website' => 'Website',
											'blog' => 'Blog',
											'movie' => 'Movie', 
											'song' => 'Song',
											'product' => 'Product',
											'book' => 'Book',
											'food' => 'Food',
											'drink' => 'Drink',
											'activity' => 'Activity',
											'sport' => 'Sport',
											)),
								);
								
								$rows[] = array(
									'id' => 'og_image',
									'label' => 'Default image',
									'desc' => 'This is your default image. If you not use thumbnail support in your theme, it will search for thumb/thumbnail custom field value, if no thumb supplied it will use this default image instead. Blank will use no image.',
									'content' =>  $this->template_helper->textinput('og_image'),
								);

								$this->template_helper->postbox('generalsettings','General Settings',$pre_content.$this->template_helper->form_table($rows).$this->save_button());
							?>
						</form>
						<form action="<?php echo admin_url($this->plugin['action']); ?>" method="post" onsubmit="javascript:return(confirm('Do you really want to reset all settings?'))">
							<?php wp_nonce_field('reset_nonce'); ?>
							<input type="hidden" name="reset" value="true"/>
							<div class="submit"><input type="submit" value="Reset All Settings &raquo;" /></div>
						</form>
					</div>
				</div>
				<div id="dialog-form" title="Get your Facebook ID">
					<p class="validateTips">Input your Facebook username.</p>
					<form>
					<fieldset>
						<label for="fbusername">FB Username</label>
						<input type="text" name="fbusername" id="fbusername" class="text ui-widget-content ui-corner-all" />
					</fieldset>
					</form>
				</div>
			</div>
			
			<div class="postbox-container side" style="width:25%;">
				<div class="metabox-holder">	
					<div class="meta-box-sortables">
						<?php
							$this->template_helper->plugin_like();
							$this->template_helper->postbox('donate','<strong class="red">Donate $10, $20 or $50!</strong>','<p>This plugin has cost me countless hours of work, if you use it, please donate a token of your appreciation!</p><br/><form style="margin-left:50px;" action="https://www.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="hosted_button_id" value="G463UW5KA8EZ6">
							<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
							</form>');
							$this->template_helper->plugin_support();
							$this->template_helper->news(); 
						?>
					</div>
					<br/><br/><br/>
				</div>
			</div>
		</div>
<?php
	}
	
	
	/**
	 * Run in every TweetFB-Search admin page load.
	 * Handle Post Request and update the wp_option.
	 * Run in load_ hook
	 */
	function load()
	{
		// parse and handle post requests to plugin
		if('POST' == $_SERVER['REQUEST_METHOD']) $this->handle_post();
  	}
	
	/**
	 * this plugin has to protect the code as it is displayed live on error pages, a prime target for malicious crackers and spammers
	 * and update the wp_options value
	 * @return
	 */
	function handle_post()
	{
		// if current user does not have administrator rights, then DIE
		if(!current_user_can('administrator')) wp_die('<strong>ERROR</strong>: Not an Admin!');
		
		// verify nonce, if not verified, then DIE
		if(isset($_POST["_{$this->plugin['nonce']}"])) wp_verify_nonce($_POST["_{$this->plugin['nonce']}"], $this->plugin['nonce']) || wp_die('<strong>ERROR</strong>: Incorrect Form Submission, please try again.');
		elseif(isset($_POST["reset"])) wp_verify_nonce($_POST["reset"], 'reset_nonce') || wp_die('<strong>ERROR</strong>: Incorrect Form Submission, please try again.');
		
		// resets options to default values
		if(isset($_POST["reset"])) return $this->default_options();
		
		// load up the current options from the database
		$this->LoadOptions();
		// process absolute integer options
		/*foreach (array('search_num', 'search_length') as $k) {
			$this->options[$k] = ((isset($_POST["{$k}"])) ? absint($_POST["{$k}"]) : absint($this->options[$k]));
		}*/
		
		foreach (array('fb_admins', 'og_site_name','og_title', 'og_image', 'og_type') as $k) {
			$this->options[$k] = ((isset($_POST["{$k}"])) ? $_POST["{$k}"] : $this->options[$k]);
		}
		
		//Process Checkbox
		foreach (array('enabled') as $k) {
			$this->options[$k] = ((!isset($_POST["{$k}"])) ? '0' : '1');
		}

		// Save code and options arrays to database
		$this->SaveOptions();
	}
	
	/**
	 * A souped-up function that reads the plugin file __FILE__ and based on the plugin data (commented at very top of file) creates an array of vars
	 *
	 * @return array
	 */
	function get_plugin_data()
	{
		$data = $this->_readfile(__FILE__, 1500);
		$mtx = $plugin = array();
		preg_match_all('/[^a-z0-9]+((?:[a-z0-9]{2,25})(?:\ ?[a-z0-9]{2,25})?(?:\ ?[a-z0-9]{2,25})?)\:[\s\t]*(.+)/i', $data, $mtx, PREG_SET_ORDER);
		foreach ($mtx as $m) $plugin[trim(str_replace(' ', '-', strtolower($m[1])))] = str_replace(array("\r", "\n", "\t"), '', trim($m[2]));

		$plugin['title'] = '<a href="' . $plugin['plugin-uri'] . '" title="' . __('Visit plugin homepage') . '">' . $plugin['plugin-name'] . '</a>';
		$plugin['author'] = '<a href="' . $plugin['author-uri'] . '" title="' . __('Visit author homepage') . '">' . $plugin['author'] . '</a>';
		$plugin['pb'] = preg_replace('|^' . preg_quote(WP_PLUGIN_DIR, '|') . '/|', '', __FILE__);
		$plugin['page'] = basename(__FILE__);
		$plugin['pagenice'] = str_replace('.php', '', $plugin['page']);
		$plugin['nonce'] = 'form_' . $plugin['pagenice'];
		$plugin['hook'] = 'settings_page_' . $plugin['pagenice'];
		$plugin['action'] = 'options-general.php?page=' . $plugin['page'];

		if (preg_match_all('#(?:([^\W_]{1})(?:[^\W_]*?\W+)?)?#i', $plugin['pagenice'] . '.' . $plugin['version'], $m, PREG_SET_ORDER))$plugin['op'] = '';
		foreach($m as $k) sizeof($k == 2) && $plugin['op'] .= $k[1];
		$plugin['op'] = substr($plugin['op'], 0, 3) . '_';

		return $plugin;
	}
	
	/**
	 * Reads a file with fopen and fread for a binary-safe read.  $f is the file and $b is how many bytes to return, useful when you dont want to read the whole file (saving mem)
	 *
	 * @return string - the content of the file or fread return
	 */
	function _readfile($f, $b = false)
	{
		$fp = NULL;
		$d = '';
		!$b && $b = @filesize($f);
		if (!($b > 0) || !file_exists($f) || !false === ($fp = @fopen($f, 'r')) || !is_resource($fp)) return false;
		if ($b > 4096) while (!feof($fp) && strlen($d) < $b)$d .= @fread($fp, 4096);
		else $d = @fread($fp, $b);
		@fclose($fp);
		return $d;
	}
	
	/**
	 * Create a save button
	 */
	function save_button($text='') {
		if($text=='') $text = "Update Facebook Open Graph &raquo;";
		return '<div class="alignright"><input type="submit" class="button-primary" name="submit" value="'.$text.'" /></div><br class="clear"/>';
	}
}

//Let the magic show, shall we?
$facebook_opengraph = new facebook_opengraph();
$facebook_opengraph->execute();
?>