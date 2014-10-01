<?php
/*  
Copyright 2010-2014 Arnan de Gans - AJdG Solutions (email : info@ajdg.net)
*/
?>

<?php if(!$ad_edit_id) {
	$edit_id = $wpdb->get_var("SELECT `id` FROM `".$wpdb->prefix."adrotate` WHERE `type` = 'empty' ORDER BY `id` DESC LIMIT 1;");
	if($edit_id == 0) {
	    $wpdb->insert($wpdb->prefix."adrotate", array('title' => '', 'bannercode' => '', 'thetime' => $now, 'updated' => $now, 'author' => $current_user->user_login, 'imagetype' => 'dropdown', 'image' => '', 'link' => '', 'tracker' => 'N', 'responsive' => 'N', 'timeframe' => '', 'timeframelength' => 0, 'timeframeclicks' => 0, 'timeframeimpressions' => 0, 'type' => 'empty', 'weight' => 6, 'sortorder' => 0, 'cbudget' => 0, 'ibudget' => 0, 'crate' => 0, 'irate' => 0, 'cities' => serialize(array()), 'countries' => serialize(array())));
	    $edit_id = $wpdb->insert_id;
		$wpdb->insert($wpdb->prefix.'adrotate_schedule', array('name' => 'Schedule for ad '.$edit_id, 'starttime' => $now, 'stoptime' => $in84days, 'maxclicks' => 0, 'maximpressions' => 0));
	    $schedule_id = $wpdb->insert_id;
		$wpdb->insert($wpdb->prefix.'adrotate_linkmeta', array('ad' => $edit_id, 'group' => 0, 'block' => 0, 'user' => 0, 'schedule' => $schedule_id));
	}
	$ad_edit_id = $edit_id;
}

$edit_banner = $wpdb->get_row("SELECT * FROM `".$wpdb->prefix."adrotate` WHERE `id` = '$ad_edit_id';");
$groups	= $wpdb->get_results("SELECT * FROM `".$wpdb->prefix."adrotate_groups` WHERE `name` != '' ORDER BY `id` ASC;"); 
$schedules = $wpdb->get_results("SELECT `starttime`, `stoptime`, `maxclicks`, `maximpressions` FROM `".$wpdb->prefix."adrotate_schedule`, `".$wpdb->prefix."adrotate_linkmeta` WHERE `ad` = '$ad_edit_id' AND `schedule` = `".$wpdb->prefix."adrotate_schedule`.`id` ORDER BY `".$wpdb->prefix."adrotate_schedule`.`id` ASC LIMIT 1;");
$linkmeta = $wpdb->get_results("SELECT `group` FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `ad` = '$edit_banner->id' AND `block` = 0 AND `user` = 0;");

wp_enqueue_media();
wp_enqueue_script('uploader-hook', WP_PLUGIN_URL.'/'.ADROTATE_FOLDER.'/library/uploader-hook.js', array('jquery'));

list($sday, $smonth, $syear, $shour, $sminute) = explode(" ", date("d m Y H i", $schedules[0]->starttime));
list($eday, $emonth, $eyear, $ehour, $eminute) = explode(" ", date("d m Y H i", $schedules[0]->stoptime));

$meta_array = '';
foreach($linkmeta as $meta) {
	$meta_array[] = $meta->group;
}

if(!is_array($meta_array)) $meta_array = array();

if($adrotate_debug['track'] == true) {
	$trackmeta = "$edit_banner->id,0,0,1";
} else {
	$trackmeta = base64_encode("$edit_banner->id,0,0,1");
}

if($ad_edit_id) {
	if($edit_banner->type != 'empty') {
		// Errors
		if(strlen($edit_banner->bannercode) < 1 AND $edit_banner->type != 'empty') 
			echo '<div class="error"><p>'. __('The AdCode cannot be empty!', 'adrotate').'</p></div>';

		if(!preg_match("/%image%/i", $edit_banner->bannercode) AND $edit_banner->image != '') 
			echo '<div class="error"><p>'. __('You didn\'t use %image% in your AdCode but did select an image!', 'adrotate').'</p></div>';

		if(preg_match("/%image%/i", $edit_banner->bannercode) AND $edit_banner->image == '') 
			echo '<div class="error"><p>'. __('You did use %image% in your AdCode but did not select an image!', 'adrotate').'</p></div>';
		
		if((($edit_banner->imagetype != '' AND $edit_banner->image == '') OR ($edit_banner->imagetype == '' AND $edit_banner->image != ''))) 
			echo '<div class="error"><p>'. __('There is a problem saving the image specification. Please reset your image and re-save the ad!', 'adrotate').'</p></div>';
		
		if((($edit_banner->crate > 0 AND $edit_banner->cbudget < 1) OR ($edit_banner->irate > 0 AND $edit_banner->ibudget < 1))) 
			echo '<div class="error"><p>'. __('This advert has run out of budget. Add more budget to the advert or reset the rate to zero!', 'adrotate').'</p></div>';
		
		// Ad Notices
		$adstate = adrotate_evaluate_ad($edit_banner->id);
		if($edit_banner->type == 'error' AND $adstate == 'normal')
			echo '<div class="error"><p>'. __('AdRotate cannot find an error but the ad is marked erroneous, try re-saving the ad!', 'adrotate').'</p></div>';

		if($adstate == 'expired')
			echo '<div class="error"><p>'. __('This ad is expired and currently not shown on your website!', 'adrotate').'</p></div>';

		if($adstate == 'expires2days')
			echo '<div class="updated"><p>'. __('The ad will expire in less than 2 days!', 'adrotate').'</p></div>';

		if($adstate == 'expires7days')
			echo '<div class="updated"><p>'. __('This ad will expire in less than 7 days!', 'adrotate').'</p></div>';

		if($edit_banner->type == 'disabled') 
			echo '<div class="updated"><p>'. __('This ad has been disabled and does not rotate on your site!', 'adrotate').'</p></div>';
	}
}

// Determine image field
if($edit_banner->imagetype == "field") {
	$image_field = $edit_banner->image;
	$image_dropdown = '';
} else if($edit_banner->imagetype == "dropdown") {
	$image_field = '';
	$image_dropdown = $edit_banner->image;
} else {
	$image_field = '';
	$image_dropdown = '';
}		
?>

	<form method="post" action="admin.php?page=adrotate-ads">
	<?php wp_nonce_field('adrotate_save_ad','adrotate_nonce'); ?>
	<input type="hidden" name="adrotate_username" value="<?php echo $userdata->user_login;?>" />
	<input type="hidden" name="adrotate_id" value="<?php echo $edit_banner->id;?>" />
	<input type="hidden" name="adrotate_type" value="<?php echo $edit_banner->type;?>" />

	<?php if($edit_banner->type == 'empty') { ?>
		<h3><?php _e('New Advert', 'adrotate'); ?></h3>
	<?php } else { ?> 
		<h3><?php _e('Edit Advert', 'adrotate'); ?></h3>
	<?php } ?>

	<p><em><?php _e('These are required.', 'adrotate'); ?></em></p>
	<table class="widefat" style="margin-top: .5em">
		<tbody>
      	<tr>
	        <th width="15%"><?php _e('Title:', 'adrotate'); ?></th>
	        <td colspan="2">
	        	<label for="adrotate_title"><input tabindex="1" name="adrotate_title" type="text" size="80" class="search-input" value="<?php echo stripslashes($edit_banner->title);?>" autocomplete="off" /></label>
	        </td>
      	</tr>
      	<tr>
	        <th valign="top"><?php _e('AdCode:', 'adrotate'); ?></th>
	        <td>
	        	<label for="adrotate_bannercode"><textarea tabindex="2" id="adrotate_bannercode" name="adrotate_bannercode" cols="65" rows="15"><?php echo stripslashes($edit_banner->bannercode); ?></textarea></label>
	        </td>
	        <td width="40%">
		        <p><strong><?php _e('Options:', 'adrotate'); ?></strong></p>
		        <p><em><a href="#" onclick="textatcursor('adrotate_bannercode','%id%');return false;">%id%</a>, <a href="#" onclick="textatcursor('adrotate_bannercode','%image%');return false;">%image%</a>, <a href="#" onclick="textatcursor('adrotate_bannercode','%random%');return false;">%random%</a>, <a href="#" onclick="textatcursor('adrotate_bannercode','target=&quot;_blank&quot;');return false;">target="_blank"</a>, <a href="#" onclick="textatcursor('adrotate_bannercode','rel=&quot;nofollow&quot;');return false;">rel="nofollow"</a></em><br />
		        <?php _e('Place the cursor where you want to add a tag and click to add it to your AdCode.', 'adrotate'); ?></p>
		        
		        <p><strong><?php _e('Basic Examples:', 'adrotate'); ?></strong></p>
		        <p>1. <em><a href="#" onclick="textatcursor('adrotate_bannercode','&lt;a href=&quot;http://www.ajdg.net&quot;&gt;This ad is great!&lt;/a&gt;');return false;">&lt;a href="http://www.ajdg.net"&gt;This ad is great!&lt;/a&gt;</a></em></p>
		        <p>2. <em><a href="#" onclick="textatcursor('adrotate_bannercode','&lt;a href=&quot;http://www.ajdg.net&quot;&gt;&lt;img src=&quot;%image%&quot; /&gt;&lt;/a&gt;');return false;">&lt;a href="http://www.ajdg.net"&gt;&lt;img src="%image%" /&gt;&lt;/a&gt;</a></em></p>
		        <p>3. <em><a href="#" onclick="textatcursor('adrotate_bannercode','&lt;span class=&quot;ad-%id%&quot;&gt;&lt;a href=&quot;http://www.ajdg.net&quot;&gt;Text Link Ad!&lt;/a&gt;&lt;/span&gt;');return false;">&lt;span class="ad-%id%"&gt;&lt;a href="http://www.ajdg.net"&gt;Text Link Ad!&lt;/a&gt;&lt;/span&gt;</a></em></p>
		        <p><?php _e('Click an example to add it to your AdCode.', 'adrotate'); ?></p>
	        </td>
      	</tr>
      	<tr>
	        <th><?php _e('Activate:', 'adrotate'); ?></th>
	        <td colspan="2">
		        <label for="adrotate_active">
			        <select tabindex="3" name="adrotate_active">
						<option value="active" <?php if($edit_banner->type == "active") { echo 'selected'; } ?>><?php _e('Yes, this ad will be used', 'adrotate'); ?></option>
						<option value="disabled" <?php if($edit_banner->type == "disabled") { echo 'selected'; } ?>><?php _e('No, do not show this ad anywhere', 'adrotate'); ?></option>
					</select>
				</label>
			</td>
      	</tr>
		</tbody>
	</table>

	<p class="submit">
		<input tabindex="0" type="submit" name="adrotate_ad_submit" class="button-primary" value="<?php _e('Save Advert', 'adrotate'); ?>" />
		<a href="admin.php?page=adrotate-ads&view=manage" class="button"><?php _e('Cancel', 'adrotate'); ?></a>
	</p>
		
	<?php if($edit_banner->type != 'empty') { ?>
	<h3><?php _e('Preview', 'adrotate'); ?></h3>
	<table class="widefat" style="margin-top: .5em">
		<tbody>
      	<tr>
	        <td>
	        	<div><?php echo adrotate_preview($edit_banner->id); ?></div>
		        <br /><em><?php _e('Note: While this preview is an accurate one, it might look different then it does on the website.', 'adrotate'); ?>
				<br /><?php _e('This is because of CSS differences. Your themes CSS file is not active here!', 'adrotate'); ?></em>
			</td>
      	</tr>
      	</tbody>
	</table>
	<?php } ?>

	<h3><?php _e('Usage', 'adrotate'); ?></h3>
	<p><em><?php _e('Copy the shortcode in a post or page. The PHP code goes in a theme file where you want the advert to show up.', 'adrotate'); ?></em></p>
	<table class="widefat" style="margin-top: .5em">
		<tbody>
      	<tr>
	        <th width="15%"><?php _e('In a post or page:', 'adrotate'); ?></th>
	        <td>[adrotate banner="<?php echo $edit_banner->id; ?>"]</td>
	        <th width="15%"><?php _e('Directly in a theme:', 'adrotate'); ?></th>
	        <td>&lt;?php echo adrotate_ad(<?php echo $edit_banner->id; ?>); ?&gt;</td>
      	</tr>
      	<tr>
	        <th width="15%"><?php _e('Email or Remote page:', 'adrotate'); ?></th>
	        <td colspan="3"><?php echo plugins_url(); ?>/adrotate/library/clicktracker.php?track=<?php echo $trackmeta; ?></td>
      	</tr>
      	</tbody>
	</table>

	<h3><?php _e('Advanced', 'adrotate'); ?></h3>
	<p><em><?php _e('Everything below is optional.', 'adrotate'); ?></em></p>
	<table class="widefat" style="margin-top: .5em">
		<tbody>
		<?php if($adrotate_config['enable_stats'] == 'Y') { ?>
      	<tr>
	        <th width="15%" valign="top"><?php _e('Clicktracking:', 'adrotate'); ?></th>
	        <td colspan="3">
	        	<label for="adrotate_tracker"><input tabindex="4" type="checkbox" name="adrotate_tracker" <?php if($edit_banner->tracker == 'Y') { ?>checked="checked" <?php } ?> /> <?php _e('Enable click tracking for this advert.', 'adrotate'); ?></label> <br />
		        <em><?php _e('The URL field is no longer required. Placing the URL in your adcode and enabling click tracking is sufficient.', 'adrotate'); ?></em><br />
		        <em><?php _e('jQuery must be active on your site for clicktracking to work.', 'adrotate'); ?></em></label>
	        </td>
      	</tr>
      	<tr>
	        <th valign="top"><?php _e('Remote usage:', 'adrotate'); ?></th>
	        <td colspan="3">
	        	<label for="adrotate_link"><input tabindex="5" name="adrotate_link" type="text" size="60" class="search-input" value="<?php echo $edit_banner->link;?>" /><br />
		        <em><?php _e('Enter the target url here if you intent to use this advert in mailings or on remote pages.', 'adrotate'); ?></label>
	        </td>
      	</tr>
		<?php } ?>
		<tr>
	        <th valign="top"><?php _e('Banner image:', 'adrotate'); ?></th>
			<td colspan="3">
				<label for="adrotate_image">
					<?php _e('Media:', 'adrotate'); ?> <input tabindex="7" id="adrotate_image" type="text" size="50" name="adrotate_image" value="<?php echo $image_field; ?>" /> <input tabindex="8" id="adrotate_image_button" class="button" type="button" value="<?php _e('Select Banner', 'adrotate'); ?>" />
				</label><br />
				<?php _e('- OR -', 'adrotate'); ?><br />
				<label for="adrotate_image_dropdown">
					<?php _e('Banner folder:', 'adrotate'); ?> <select tabindex="9" name="adrotate_image_dropdown" style="min-width: 200px;">
   						<option value=""><?php _e('No image selected', 'adrotate'); ?></option>
						<?php echo adrotate_folder_contents($image_dropdown); ?>
					</select><br />
				</label>
				<em><?php _e('Use %image% in the code. Accepted files are:', 'adrotate'); ?> jpg, jpeg, gif, png, swf and flv. <?php _e('Use either the text field or the dropdown. If the textfield has content that field has priority.', 'adrotate'); ?></em>
			</td>
		</tr>
      	<tr>
		    <th valign="top"><?php _e('Weight:', 'adrotate'); ?></th>
	        <td colspan="2">
	        	<label for="adrotate_weight">
	        	&nbsp;<input type="radio" name="adrotate_weight" value="2" disabled />&nbsp;&nbsp;&nbsp;2, <?php _e('Barely visible', 'adrotate'); ?><br />
	        	&nbsp;<input type="radio" name="adrotate_weight" value="4" disabled />&nbsp;&nbsp;&nbsp;4, <?php _e('Less than average', 'adrotate'); ?><br />
	        	&nbsp;<input type="radio" name="adrotate_weight" value="6" checked disabled />&nbsp;&nbsp;&nbsp;6, <?php _e('Normal coverage', 'adrotate'); ?><br />
	        	&nbsp;<input type="radio" name="adrotate_weight" value="8" disabled />&nbsp;&nbsp;&nbsp;8, <?php _e('More than average', 'adrotate'); ?><br />
	        	&nbsp;<input type="radio" name="adrotate_weight" value="10" disabled />&nbsp;&nbsp;&nbsp;10, <?php _e('Best visibility', 'adrotate'); ?>
				</label>
	        </td>
	        <td>
	        	<br /><?php adrotate_pro_notice(); ?>
			</td>
		</tr>
      	<tr>
	        <th><?php _e('Sortorder:', 'adrotate'); ?></th>
	        <td colspan="3">
		        <label for="adrotate_sortorder"><input tabindex="4" name="adrotate_sortorder" type="text" size="5" class="search-input" autocomplete="off" value="<?php echo $edit_banner->sortorder;?>" /> <em><?php _e('For administrative purposes set a sortorder.', 'adrotate'); ?> <?php _e('Leave empty or 0 to skip this. Will default to ad id.', 'adrotate'); ?></em></label>
			</td>
      	</tr>
		</tbody>
	</table>

	<p class="submit">
		<input tabindex="0" type="submit" name="adrotate_ad_submit" class="button-primary" value="<?php _e('Save Advert', 'adrotate'); ?>" />
		<a href="admin.php?page=adrotate-ads&view=manage" class="button"><?php _e('Cancel', 'adrotate'); ?></a>
	</p>
		
	<h3><?php _e('Geo Location', 'adrotate'); ?></h3>
	<p><em><?php _e('This works if you assign the advert to a group and enable that group to use Geo Targeting.', 'adrotate'); ?></em></p>
	<p><em>(<?php adrotate_pro_notice('t'); ?>)</em></p>
	<table class="widefat" style="margin-top: .5em">			
		<tbody>
	    <tr>
			<th width="15%" valign="top"><?php _e('Cities:', 'adrotate'); ?></strong></th>
			<td colspan="3"><textarea name="adrotate_geo_cities" cols="65" rows="3" disabled="disabled">New York, Amsterdam, Shanghai</textarea></td>
		</tr>
		<tr>
			<th valign="top">Countries:</th>
	        <td colspan="2">
		        <label for="adrotate_geo_countries">
			        <div class="adrotate-select">
				        <input type="checkbox" name="adrotate_geo_countries[]" value="AF" disabled="disabled">&nbsp;&nbsp;United States<br>
				        <input type="checkbox" name="adrotate_geo_countries[]" value="AL" disabled="disabled" checked>&nbsp;&nbsp;Netherlands<br>
				        <input type="checkbox" name="adrotate_geo_countries[]" value="DZ" disabled="disabled">&nbsp;&nbsp;Germany<br>
				        <input type="checkbox" name="adrotate_geo_countries[]" value="AD" disabled="disabled">&nbsp;&nbsp;France<br>
				        <input type="checkbox" name="adrotate_geo_countries[]" value="AO" disabled="disabled">&nbsp;&nbsp;Brazil
			        </div>
		        </label>
	        </td>
			<td>
		        <p><strong>Usage:</strong></p>
		        <p><em>Select the countries you want the adverts to show in.<br>Cities take priority and will be filtered first.</em></p>
			</td>
		</tr>
		</tbody>
	</table>
	
	<h3><?php _e('Advertiser & Budget', 'adrotate'); ?></h3>
	<p><em><?php _e('Link your ad to an Advertiser and optionally set a budget for clicks and impressions.', 'adrotate'); ?></em></p>
	<p><em>(<?php adrotate_pro_notice('t'); ?>)</em></p>
	<table class="widefat" style="margin-top: .5em">	
		<tbody>
      	<tr>
	        <th width="15%" valign="top">Advertiser:</th>
	        <td colspan="3">
	        	<label for="adrotate_tracker">
	        	<select tabindex="15" name="adrotate_advertiser" style="min-width: 200px;" disabled="disabled">
					<option value="0">Not specified</option>
				</select>
		        <em>Must be a registered user on your site with appropriate access roles.</em>
		        </label>
			</td>
      	</tr>
      	<tr>
	        <th width="15%">Ad Click Rate:</th>
	        <td><label for="adrotate_crate"><input tabindex="16" name="adrotate_crate" type="text" size="5" class="search-input" autocomplete="off" value="0.5" disabled="disabled"> <em>Cost per click</em></label></td>
	        <th width="15%">Ad Impression Rate:</th>
	        <td><label for="adrotate_irate"><input tabindex="17" name="adrotate_irate" type="text" size="5" class="search-input" autocomplete="off" value="0.001" disabled="disabled"> <em>Cost per impression</em></label></td>
      	</tr>
      	<tr>
	        <th width="15%">Ad Click Budget:</th>
	        <td><label for="adrotate_cbudget"><input tabindex="18" name="adrotate_cbudget" type="text" size="5" class="search-input" autocomplete="off" value="4095" disabled="disabled"></label></td>
	        <th width="15%">Ad Impression Budget:</th>
	        <td><label for="adrotate_ibudget"><input tabindex="19" name="adrotate_ibudget" type="text" size="5" class="search-input" autocomplete="off" value="3032" disabled="disabled"></label></td>
      	</tr>
      	</tbody>
	</table>

	<h3><?php _e('Usage', 'adrotate'); ?></h3>
	<p><em><?php _e('Copy the shortcode in a post or page. The PHP code goes in a theme file where you want the advert to show up.', 'adrotate'); ?></em></p>
	<table class="widefat" style="margin-top: .5em">
		<tbody>
      	<tr>
	        <th width="15%"><?php _e('In a post or page:', 'adrotate'); ?></th>
	        <td>[adrotate banner="<?php echo $edit_banner->id; ?>"]</td>
	        <th width="15%"><?php _e('Directly in a theme:', 'adrotate'); ?></th>
	        <td>&lt;?php echo adrotate_ad(<?php echo $edit_banner->id; ?>); ?&gt;</td>
      	</tr>
      	<tr>
	        <th width="15%"><?php _e('Email or Remote page:', 'adrotate'); ?></th>
	        <td colspan="3"><?php echo plugins_url(); ?>/adrotate/library/clicktracker.php?track=<?php echo $trackmeta; ?></td>
      	</tr>
      	</tbody>
	</table>

	<p class="submit">
		<input tabindex="10" type="submit" name="adrotate_ad_submit" class="button-primary" value="<?php _e('Save Advert', 'adrotate'); ?>" />
		<a href="admin.php?page=adrotate-ads&view=manage" class="button"><?php _e('Cancel', 'adrotate'); ?></a>
	</p>

	<h3><?php _e('Schedule', 'adrotate'); ?></h3>
	<p><em><?php _e('From when to when is the advert visible?', 'adrotate'); ?></em></p>
	<table class="widefat" style="margin-top: .5em">
		<tbody>
      	<tr>
	        <th width="15%"><?php _e('Start date (day/month/year):', 'adrotate'); ?></th>
	        <td>
	        	<label for="adrotate_sday">
	        	<input tabindex="11" name="adrotate_sday" class="search-input" type="text" size="4" maxlength="2" value="<?php echo $sday;?>" /> /
				<select tabindex="12" name="adrotate_smonth">
					<option value="01" <?php if($smonth == "01") { echo 'selected'; } ?>><?php _e('January', 'adrotate'); ?></option>
					<option value="02" <?php if($smonth == "02") { echo 'selected'; } ?>><?php _e('February', 'adrotate'); ?></option>
					<option value="03" <?php if($smonth == "03") { echo 'selected'; } ?>><?php _e('March', 'adrotate'); ?></option>
					<option value="04" <?php if($smonth == "04") { echo 'selected'; } ?>><?php _e('April', 'adrotate'); ?></option>
					<option value="05" <?php if($smonth == "05") { echo 'selected'; } ?>><?php _e('May', 'adrotate'); ?></option>
					<option value="06" <?php if($smonth == "06") { echo 'selected'; } ?>><?php _e('June', 'adrotate'); ?></option>
					<option value="07" <?php if($smonth == "07") { echo 'selected'; } ?>><?php _e('July', 'adrotate'); ?></option>
					<option value="08" <?php if($smonth == "08") { echo 'selected'; } ?>><?php _e('August', 'adrotate'); ?></option>
					<option value="09" <?php if($smonth == "09") { echo 'selected'; } ?>><?php _e('September', 'adrotate'); ?></option>
					<option value="10" <?php if($smonth == "10") { echo 'selected'; } ?>><?php _e('October', 'adrotate'); ?></option>
					<option value="11" <?php if($smonth == "11") { echo 'selected'; } ?>><?php _e('November', 'adrotate'); ?></option>
					<option value="12" <?php if($smonth == "12") { echo 'selected'; } ?>><?php _e('December', 'adrotate'); ?></option>
				</select> /
				<input tabindex="13" name="adrotate_syear" class="search-input" type="text" size="4" maxlength="4" value="<?php echo $syear;?>" />&nbsp;&nbsp;&nbsp; 
				</label>
	        </td>
	        <th width="15%"><?php _e('End date (day/month/year):', 'adrotate'); ?></th>
	        <td>
	        	<label for="adrotate_eday">
	        	<input tabindex="14" name="adrotate_eday" class="search-input" type="text" size="4" maxlength="2" value="<?php echo $eday;?>"  /> /
				<select tabindex="15" name="adrotate_emonth">
					<option value="01" <?php if($emonth == "01") { echo 'selected'; } ?>><?php _e('January', 'adrotate'); ?></option>
					<option value="02" <?php if($emonth == "02") { echo 'selected'; } ?>><?php _e('February', 'adrotate'); ?></option>
					<option value="03" <?php if($emonth == "03") { echo 'selected'; } ?>><?php _e('March', 'adrotate'); ?></option>
					<option value="04" <?php if($emonth == "04") { echo 'selected'; } ?>><?php _e('April', 'adrotate'); ?></option>
					<option value="05" <?php if($emonth == "05") { echo 'selected'; } ?>><?php _e('May', 'adrotate'); ?></option>
					<option value="06" <?php if($emonth == "06") { echo 'selected'; } ?>><?php _e('June', 'adrotate'); ?></option>
					<option value="07" <?php if($emonth == "07") { echo 'selected'; } ?>><?php _e('July', 'adrotate'); ?></option>
					<option value="08" <?php if($emonth == "08") { echo 'selected'; } ?>><?php _e('August', 'adrotate'); ?></option>
					<option value="09" <?php if($emonth == "09") { echo 'selected'; } ?>><?php _e('September', 'adrotate'); ?></option>
					<option value="10" <?php if($emonth == "10") { echo 'selected'; } ?>><?php _e('October', 'adrotate'); ?></option>
					<option value="11" <?php if($emonth == "11") { echo 'selected'; } ?>><?php _e('November', 'adrotate'); ?></option>
					<option value="12" <?php if($emonth == "12") { echo 'selected'; } ?>><?php _e('December', 'adrotate'); ?></option>
				</select> /
				<input tabindex="16" name="adrotate_eyear" class="search-input" type="text" size="4" maxlength="4" value="<?php echo $eyear;?>" />&nbsp;&nbsp;&nbsp; 
				</label>
			</td>
      	</tr>	
      	<tr>
	        <th><?php _e('Start time (hh:mm):', 'adrotate'); ?></th>
	        <td>
	        	<label for="adrotate_sday">
				<input tabindex="17" name="adrotate_shour" class="search-input" type="text" size="2" maxlength="4" value="<?php echo $shour;?>" /> :
				<input tabindex="18" name="adrotate_sminute" class="search-input" type="text" size="2" maxlength="4" value="<?php echo $sminute;?>" />
				</label>
	        </td>
	        <th><?php _e('End time (hh:mm):', 'adrotate'); ?></th>
	        <td>
	        	<label for="adrotate_eday">
				<input tabindex="19" name="adrotate_ehour" class="search-input" type="text" size="2" maxlength="4" value="<?php echo $ehour;?>" /> :
				<input tabindex="20" name="adrotate_eminute" class="search-input" type="text" size="2" maxlength="4" value="<?php echo $eminute;?>" />
				</label>
			</td>
      	</tr>	
		<?php if($adrotate_config['enable_stats'] == 'Y') { ?>
      	<tr>
      		<th><?php _e('Maximum Clicks:', 'adrotate'); ?></th>
	        <td><input tabindex="21" name="adrotate_maxclicks" type="text" size="5" class="search-input" autocomplete="off" value="<?php echo $schedules[0]->maxclicks;?>" /> <em><?php _e('Leave empty or 0 to skip this.', 'adrotate'); ?></em></td>
		    <th><?php _e('Maximum Impressions:', 'adrotate'); ?></th>
	        <td><input tabindex="22" name="adrotate_maxshown" type="text" size="5" class="search-input" autocomplete="off" value="<?php echo $schedules[0]->maximpressions;?>" /> <em><?php _e('Leave empty or 0 to skip this.', 'adrotate'); ?></em></td>
		</tr>
		<?php } ?>
      	<tr>
      		<th valign="top">Important:</th>
	        <td colspan="3"><em><?php _e('Time uses a 24 hour clock. When you\'re used to the AM/PM system keep this in mind: If the start or end time is after lunch, add 12 hours. 2PM is 14:00 hours. 6AM is 6:00 hours.', 'adrotate'); ?><br /><?php _e('The maximum clicks and impressions are measured over the set schedule only. Every schedule can have it\'s own limit!', 'adrotate'); ?></em></td>
		</tr>
		</tbody>					
	</table>

	<h3><?php _e('Current Schedules', 'adrotate'); ?></h3>
	<p><em>This advert could have multiple schedules... <?php adrotate_pro_notice(); ?></em></p>
	<table class="widefat" style="margin-top: .5em">
		<thead>
		<tr>
			<th scope="col" class="manage-column column-cb check-column"><input type="checkbox" disabled /></th>
	        <th width="2%"><?php _e('ID', 'adrotate'); ?></th>
	        <th width="17%"><?php _e('From / Until', 'adrotate'); ?></th>
	        <th>&nbsp;</th>
	        <th width="12%"><center><?php _e('Max Clicks', 'adrotate'); ?></center></th>
	        <th width="10%"><center><?php _e('This ad used', 'adrotate'); ?></center></th>
	        <th width="12%"><center><?php _e('Max Impressions', 'adrotate'); ?></center></th>
	        <th width="10%"><center><?php _e('This ad used', 'adrotate'); ?></center></th>
		</tr>
		</thead>

		<tbody>
		<tr id="schedule-0">
      		<th class="check-column"><input type="checkbox" disabled value="0"></th>
      		<td>32</td>
      		<td>December 01, 2013 - 00:00<br />February 01, 2014 - 00:00</td>
      		<td>Schedule for ads 2-8</td>
      		<td><center>unlimited</center></td>
      		<td><center>4</center></td>
      		<td><center>unlimited</center></td>
      		<td><center>893</center></td>
      	</tr>
		<tr id="schedule-1" class='alternate'>
      		<th class="check-column"><input type="checkbox" disabled value="0"></th>
      		<td>67</td>
      		<td>January 01, 2014 - 00:00<br />April 01, 2014 - 00:00</td>
      		<td>Winter Season</td>
      		<td><center>2200</center></td>
      		<td><center>1540</center></td>
      		<td><center>1000000</center></td>
      		<td><center>826374</center></td>
      	</tr>
		</tbody>

	</table>

	<p class="submit">
		<input tabindex="23" type="submit" name="adrotate_ad_submit" class="button-primary" value="<?php _e('Save Advert', 'adrotate'); ?>" />
		<a href="admin.php?page=adrotate-ads&view=manage" class="button"><?php _e('Cancel', 'adrotate'); ?></a>
	</p>


	<?php if($groups) { ?>
	<h3><?php _e('Select Groups', 'adrotate'); ?></h3>
	<p><em><?php _e('Optionally select the group(s) this ad belongs to.', 'adrotate'); ?></em></p>
	<table class="widefat" style="margin-top: .5em">
		<thead>
		<tr>
			<th scope="col" class="manage-column column-cb check-column"><input type="checkbox" /></th>
			<th><?php _e('ID - Name', 'adrotate'); ?></th>
			<th><?php _e('Ads in group', 'adrotate'); ?></th>
		</tr>
		</thead>

		<tbody>
		<?php 
		$class = '';
		foreach($groups as $group) {
			$ads_in_group = $wpdb->get_var("SELECT COUNT(*) FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `group` = ".$group->id." AND `block` = 0 AND `user` = 0 AND `schedule` = 0;");
			$class = ('alternate' != $class) ? 'alternate' : ''; ?>
		    <tr id='group-<?php echo $group->id; ?>' class=' <?php echo $class; ?>'>
				<th class="check-column" width="2%"><input type="checkbox" name="groupselect[]" value="<?php echo $group->id; ?>" <?php if(in_array($group->id, $meta_array)) echo "checked"; ?> /></th>
				<td><?php echo $group->id; ?> - <strong><?php echo $group->name; ?></strong></td>
				<td width="15%"><?php echo $ads_in_group; ?> <?php _e('Ads', 'adrotate'); ?></td>
			</tr>
		<?php } ?>
		</tbody>					
	</table>

	<p class="submit">
		<input tabindex="24" type="submit" name="adrotate_ad_submit" class="button-primary" value="<?php _e('Save Advert', 'adrotate'); ?>" />
		<a href="admin.php?page=adrotate-ads&view=manage" class="button"><?php _e('Cancel', 'adrotate'); ?></a>
	</p>
	<?php } ?>
</form>