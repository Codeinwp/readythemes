<?php

class fb_template_helper{
	var $caller;
	
	function __construct($caller) {
		$this->caller = $caller;
	}
	
	/**
	 * Create a Checkbox input field
	 */
	function checkbox($id) {
		$options = $this->caller->options[$id];
		return '<input type="checkbox" id="'.$id.'" name="'.$id.'"'. checked($options,true,false).'/>';
	}
	
	/**
	 * Create a Text input field
	 */
	function textinput($id) {
		$options = $this->caller->options[$id];
		return '<input class="text" type="text" id="'.$id.'" name="'.$id.'" size="30" value="'.$options.'"/>';
	}
	
	/**
	 * Create a dropdown field
	 */
	function select($id, $options, $multiple = false) {
		$opt = $this->caller->options;
		$output = '<select class="select" name="'.$id.'" id="'.$id.'">';
		foreach ($options as $val => $name) {
			$sel = '';
			if ($opt[$id] == $val)
				$sel = ' selected="selected"';
			if ($name == '')
				$name = $val;
			$output .= '<option value="'.$val.'"'.$sel.'>'.$name.'</option>';
		}
		$output .= '</select>';
		return $output;
	}
	
	/**
	 * Create a potbox widget
	 */
	function postbox($id, $title, $content) {
		echo <<<end
		<div id="{$id}" class="postbox">
			<div class="handlediv" title="Click to toggle"><br /></div>
			<h3 class="hndle"><span>{$title}</span></h3>
			<div class="inside">
				{$content}
			</div>
		</div>
end;
	}	
	
	/**
	 * Create a form table from an array of rows
	 */
	function form_table($rows) {
		$content = '<table class="form-table">';
		$i = 1;
		foreach ($rows as $row) {
			$class = '';
			if ($i > 1) {
				$class .= 'bws_row';
			}
			if ($i % 2 == 0) {
				$class .= ' even';
			}
			$content .= '<tr id="'.$row['id'].'_row" class="'.$class.'"><th valign="top" scrope="row">';
			if (isset($row['id']) && $row['id'] != '')
				$content .= '<label for="'.$row['id'].'">'.$row['label'].':</label>';
			else
				$content .= $row['label'];
			$content .= '</th><td valign="top">';
			$content .= $row['content'];
			$content .= '</td></tr>'; 
			if ( isset($row['desc']) && !empty($row['desc']) ) {
				$content .= '<tr class="'.$class.'"><td colspan="2" class="bws_desc"><small>'.$row['desc'].'</small></td></tr>';
			}
				
			$i++;
		}
		$content .= '</table>';
		return $content;
	}
	
	/**
	 * Create a "plugin like" box.
	 */
	function plugin_like() {
		$content = '<p>'.__('Why not do any or all of the following:','ivanplugin').'</p>';
		$content .= '<ul>';
		$content .= '<li><a href="'.$this->caller->plugin['plugin-uri'].'">'.__('Link to it so other folks can find out about it.','ivanplugin').'</a></li>';
		$content .= '<li><a href="'.$this->caller->plugin['wordpress-uri'].'">'.__('Let other people know that it works with your WordPress setup.','ivanplugin').'</a></li>';
		$content .= '<li><a href="http://www.ivankristianto.com/internet/blogging/guide-to-improve-your-wordpress-blog-performance-for-free/1471/">'.__('Guide To Improve Your WordPress Blog Performance For Free.','ivanplugin').'</a></li>';
		$content .= '</ul>';
		$this->postbox($hook.'like', 'Like this plugin?', $content);
	}

	/**
	 * Info box with link to the bug tracker.
	 */
	function plugin_support() {
		$content = '<p>If you\'ve found a bug in this plugin, please submit it in the <a href="http://www.ivankristianto.com/about/">IvanKristianto.com Contact Form</a> with a clear description.</p>';
		$this->postbox($this->caller->plugin['pagenice'].'support', __('Found a bug?',$this->caller->plugin['pagenice']), $content);
	}

	/**
	 * Box with latest news from IvanKristianto.com
	 */
	function news() {
		include_once(ABSPATH . WPINC . '/feed.php');
		$rss = fetch_feed('http://feeds2.feedburner.com/ivankristianto');
		$rss_items = $rss->get_items( 0, $rss->get_item_quantity(5) );
		$content = '<ul>';
		if ( !$rss_items ) {
			$content .= '<li class="ivankristianto">no news items, feed might be broken...</li>';
		} else {
			foreach ( $rss_items as $item ) {
				$content .= '<li class="ivankristianto">';
				$content .= '<a class="rsswidget" href="'.esc_url( $item->get_permalink(), $protocolls=null, 'display' ).'">'. htmlentities($item->get_title()) .'</a> ';
				$content .= '</li>';
			}
		}						
		$content .= '<li class="rss"><a href="http://feeds2.feedburner.com/ivankristianto">Subscribe with RSS</a></li>';
		//$content .= '<li class="email"><a href="http://ivankristianto.com/email-blog-updates/">Subscribe by email</a></li>';
		$content .= '</ul>';
		$this->postbox('ivankristiantolatest', 'Latest from IvanKristianto.com', $content);
	}

	function text_limit( $text, $limit, $finish = ' [&hellip;]') {
		if( strlen( $text ) > $limit ) {
			$text = substr( $text, 0, $limit );
			$text = substr( $text, 0, - ( strlen( strrchr( $text,' ') ) ) );
			$text .= $finish;
		}
		return $text;
	}
}
?>