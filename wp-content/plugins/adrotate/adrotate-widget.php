<?php
/*  
Copyright 2010-2014 Arnan de Gans - AJdG Solutions (email : info@ajdg.net)
*/

/*-------------------------------------------------------------
 Name:      adrotate_widget

 Purpose:   Unlimited widgets for the sidebar
 Receive:   -none-
 Return:    -none-
 Since:		0.8
-------------------------------------------------------------*/
class adrotate_widgets extends WP_Widget {

	/*-------------------------------------------------------------
	 Purpose:   Construct the widget
	-------------------------------------------------------------*/
	function adrotate_widgets() {

        parent::WP_Widget(false, 'AdRotate', array('description' => "Show unlimited ads in the sidebar."));	

	}

	/*-------------------------------------------------------------
	 Purpose:   Display the widget
	-------------------------------------------------------------*/
	function widget($args, $instance) {
		global $adrotate_config;

		extract($args);
        $title = apply_filters('widget_title', $instance['title']);
		if(empty($instance['id'])) $instance['id'] = 0;

		echo $before_widget;
		if($title) {
			echo $before_title . $title . $after_title;
		}
		
		if($adrotate_config['widgetalign'] == 'Y') echo '<ul><li>';
		if($adrotate_config['w3caching'] == 'Y') echo '<!-- mfunc -->';
		
		if($instance['type'] == "single") {
			if($adrotate_config['supercache'] == "Y") echo '<!--mfunc echo adrotate_ad('.$instance['id'].', true, 0, 0) -->';
			echo adrotate_ad($instance['id'], true, 0, 0);
			if($adrotate_config['supercache'] == "Y") echo '<!--/mfunc-->';
		}

		if($instance['type'] == "group") {
			if($adrotate_config['supercache'] == "Y") echo '<!--mfunc echo adrotate_group('.$instance['id'].', 0, 0) -->';
			echo adrotate_group($instance['id'], 0, 0);
			if($adrotate_config['supercache'] == "Y") echo '<!--/mfunc-->';
		}
		
		if($instance['type'] == "block") {
			if($adrotate_config['supercache'] == "Y") echo '<!--mfunc echo adrotate_block('.$instance['id'].') -->';
			echo adrotate_block($instance['id']);
			if($adrotate_config['supercache'] == "Y") echo '<!--/mfunc-->';
		}
		
		if($adrotate_config['w3caching'] == 'Y') echo '<!-- /mfunc -->';
		if($adrotate_config['widgetalign'] == 'Y') echo '</li></ul>';
		
		echo $after_widget;

	}

	/*-------------------------------------------------------------
	 Purpose:   Save the widget options per instance
	-------------------------------------------------------------*/
	function update($new_instance, $old_instance) {
		$new_instance['title'] = strip_tags($new_instance['title']);
		$new_instance['description'] = strip_tags($new_instance['description']);
		$new_instance['type'] = strip_tags($new_instance['type']);	
		$new_instance['id'] = strip_tags($new_instance['id']);
		$new_instance['siteid'] = 0;

		$instance = wp_parse_args($new_instance, $old_instance);

		return $instance;

	}

	/*-------------------------------------------------------------
	 Purpose:   Display the widget options for admins
	-------------------------------------------------------------*/
	function form($instance) {

		$defaults = array();
		$instance = wp_parse_args( (array) $instance, $defaults );
		
		$title = $description = $type = $id = $siteid = '';
		extract($instance);
		$title = esc_attr( $title );
		$description = esc_attr( $description );
		$type = esc_attr( $type );
		$id = esc_attr( $id );
		$siteid = esc_attr( $siteid );
?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title (optional):', 'adrotate' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			<br />
			<small><?php _e( 'HTML will be stripped out.', 'adrotate' ); ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e( 'Description (optional):', 'adrotate' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" type="text" value="<?php echo $description; ?>" />
			<br />
			<small><?php _e( 'What is this widget used for? (Not parsed, HTML will be stripped out.)', 'adrotate' ); ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('type'); ?>"><?php _e( 'Type:', 'adrotate' ); ?></label>
			<select class="widefat" id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>" class="postform">
			    <option value="single" <?php if($type == "single") { echo 'selected'; } ?>><?php _e( 'Single Ad - Use Ad ID', 'adrotate' ); ?></option>
		        <option value="group" <?php if($type == "group") { echo 'selected'; } ?>><?php _e( 'Group of Ads - Use group ID', 'adrotate' ); ?></option>
			    <option value="block" <?php if($type == "block") { echo 'selected'; } ?>><?php _e( 'Block of Ads - Use Block ID', 'adrotate' ); ?></option>
			</select>
			<br />
			<small><?php _e( 'Choose what you want to use this widget for', 'adrotate' ); ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('id'); ?>"><?php _e( 'ID:', 'adrotate' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo $id; ?>" />
			<br />
			<small><?php _e( 'Fill in the ID of the type you want to display!', 'adrotate' ); ?></small>
		</p>
<?php
	}

}
?>