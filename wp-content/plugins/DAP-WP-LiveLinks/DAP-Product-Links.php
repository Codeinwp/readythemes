<?php 

class DAP_ProductLinks extends WP_Widget {

	function DAP_ProductLinks() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'DAP_ProductLinks', 'description' => 'DAP Product Links' );
		
		/* Widget control settings. */
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'dap-productlinks-widget' );
		
		/* Create the widget. */
		$this->WP_Widget( 'dap-productlinks-widget', 'DAP ProductLinks', $widget_ops, $control_ops );
	}


	function widget( $args, $instance ) {
		global $lldocroot;
		include ($lldocroot . "/dap/dap-config.php");
		
		extract( $args );
		
		/* User-selected settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		
		/* Before widget (defined by themes). */
		echo $before_widget;
		
		/* Title of widget (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;
		
		if(Dap_Session::isLoggedIn()) { //Logged in
			$session = Dap_Session::getSession();
			$user = $session->getUser();
			$userProducts = Dap_UsersProducts::loadProducts($user->getId());
			if( isset($userProducts) && (userProducts != null) && ( sizeof($userProducts) > 0 ) ) {
				$output = '<ul>';
		
				foreach ($userProducts as $userProduct) { 
					$product = Dap_Product::loadProduct($userProduct->getProduct_id());
					$output .= '<li><a href="'.$product->getLogged_in_url().'">'. $product->getName() . '</a></li>';
				}
				
				$output .= '</ul>';
			}
			
		} //End Logged In

		echo $output;
		
		/* After widget (defined by themes). */
		//logToFile("Output: $output"); 
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
		$defaults = array( 'title' => 'Your Products' );
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