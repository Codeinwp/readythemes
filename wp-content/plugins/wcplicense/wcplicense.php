<?php 
/* 
	Plugin Name: WickedCoolPlugins License Key
	Plugin URI: http://WickedCoolPlugins.com
	Description: This plugin enables the entering of one "Universal License Key" for possibly multiple plugins purchased from http://WickedCoolPlugins.com
	Author: Veena Prashanth & Ravi Jayagopal
	Author URI: http://WickedCoolPlugins.com
	Version: 1.0
*/

	
// Add the options page
function wcp_options_link() {
	add_options_page('Setup Options - WickedCoolPlugins','WickedCoolPlugins License Key', 8, 'wcp-manage','mywcp');
}


function register_wcpsettings() { // whitelist options
  register_setting( 'wcp-options-group', 'wcp_licenseKey' );
}

function mywcp() {
	?>
<div class="wrap">
<h2><?php _e( 'Wicked Cool Plugins' ); ?></h2>
<h3>Created by: <a href="http://WickedCoolPlugins.com" target="_blank">Veena Prashanth</a>
</h3>
<form method="post" action="options.php">
        <table class="form-table">
          <tr valign="top">
            <th scope="row">License Key</th>
            <td><input name="wcp_licenseKey" type="text" id="wcp_licenseKey" value="<?php echo get_option('wcp_licenseKey'); ?>"></td>
          </tr>
        </table>  

		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="wcp_licenseKey" />

        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
<?php settings_fields( 'wcp-options-group' ); ?>   
</form>
</div>
<?php 
}  

if ( is_admin() ){ // admin actions
	add_action('admin_menu','wcp_options_link');
	add_action( 'admin_init', 'register_wcpsettings' );
} 


?>