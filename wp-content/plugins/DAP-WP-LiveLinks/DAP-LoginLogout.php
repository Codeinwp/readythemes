<?php 

class DAP_LoginLogout extends WP_Widget {

	function DAP_LoginLogout() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'DAP', 'description' => 'Login/Logout Widget from DigitalAccessPass.com' );
		
		/* Widget control settings. */
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'dap-loginlogout-widget' );
		
		/* Create the widget. */
		$this->WP_Widget( 'dap-loginlogout-widget', 'DAP Login/Logout Widget', $widget_ops, $control_ops );
	}


	function widget( $args, $instance ) {
		global $lldocroot;
		include_once ($lldocroot . "/dap/dap-config.php");	
		$output = "";
		extract( $args );
		
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		
		/* Before widget (defined by themes). */
		echo $before_widget;
		
		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
		
		if( isset($_GET['msg']) ) {
		$output .= "<div align='center'><font color='#CC0000'>" . stripslashes($_GET['msg']) . "</font></div>";
		}
		
		if(!Dap_Session::isLoggedIn()) { //Not logged in
			$loginFormFilepath = "/DAP-WP-LiveLinks/DAP-WP-LoginForm-LoginLogout.html";
			if( file_exists(WP_PLUGIN_DIR . "/DAP-WP-LiveLinks/customDAP-WP-LoginForm-LoginLogout.html") ) {
				$loginFormFilepath = "/DAP-WP-LiveLinks/customDAP-WP-LoginForm-LoginLogout.html";
			}
			
			$redirectURL = "";
			
			$output .= replaceFillers(WP_PLUGIN_DIR . $loginFormFilepath,"%%LOGIN_URL%%",Dap_Config::get("LOGIN_URL"));
			$output = str_replace("%%REQUEST%%",$redirectURL,$output);
			//$output = str_replace("%%SIGNUP_PAGE%%",$signup_page,$output);
			//$output = str_replace("%%LOGGED_IN_URL%%",Dap_Config::get("LOGGED_IN_URL"),$output);
			
			echo $output;
		} //End Not Logged In
		
		else if(Dap_Session::isLoggedIn()) { //Logged in
			$logoutHTMLFilepath = "/DAP-WP-LiveLinks/DAP-WP-LogoutHTML.html";
			if( file_exists(WP_PLUGIN_DIR . "/DAP-WP-LiveLinks/customDAP-WP-LogoutHTML.html") ) {
				$logoutHTMLFilepath = "/DAP-WP-LiveLinks/customDAP-WP-LogoutHTML.html";
			}
			
			$output = file_get_contents(WP_PLUGIN_DIR . $logoutHTMLFilepath);
			echo $output;
		} //End Not Logged In
		
		/* After widget (defined by themes). */
		echo $after_widget;
	}	
	

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		
		return $instance;
	}
	

	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Member Login' );
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>
		
		<p>
		  <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
		  <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" size="10" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<?php
	}

}

?>