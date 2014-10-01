<?php
/*  
Copyright 2010-2014 Arnan de Gans - AJdG Solutions (email : info@ajdg.net)
*/
?>
<?php if(!$group_edit_id) { 
	$action = "group_new";
	$edit_id = $wpdb->get_var("SELECT `id` FROM `".$wpdb->prefix."adrotate_groups` WHERE `name` = '' ORDER BY `id` DESC LIMIT 1;");
	if($edit_id == 0) {
		$wpdb->insert($wpdb->prefix.'adrotate_groups', array('name' => '', 'modus' => 0, 'fallback' => '0', 'sortorder' => 0, 'cat' => '', 'cat_loc' => 0, 'page' => '', 'page_loc' => 0, 'geo' => 0, 'wrapper_before' => '', 'wrapper_after' => '', 'gridrows' => 2, 'gridcolumns' => 2, 'admargin' => 1, 'admargin_bottom' => 1, 'admargin_left' => 1, 'admargin_right' => 1, 'adwidth' => '125', 'adheight' => '125', 'adspeed' => 6000));
	    $edit_id = $wpdb->insert_id;
	}
	$group_edit_id = $edit_id;
	?>
<?php } else { 
	$action = "group_edit";
}

$edit_group = $wpdb->get_row("SELECT * FROM `".$wpdb->prefix."adrotate_groups` WHERE `id` = '$group_edit_id';");
$groups		= $wpdb->get_results("SELECT * FROM `".$wpdb->prefix."adrotate_groups` WHERE `name` != '' ORDER BY `id` ASC;"); 
$ads 		= $wpdb->get_results("SELECT `id`, `title`, `tracker`, `weight` FROM `".$wpdb->prefix."adrotate` WHERE `type` = 'active' ORDER BY `id` ASC;");
$linkmeta	= $wpdb->get_results("SELECT `ad` FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `group` = '$group_edit_id' AND `block` = 0 AND `user` = 0;");

$meta_array = '';
foreach($linkmeta as $meta) {
	$meta_array[] = $meta->ad;
}
if(!is_array($meta_array)) $meta_array = array();
?>

<form name="editgroup" id="post" method="post" action="admin.php?page=adrotate-groups">
	<?php wp_nonce_field('adrotate_save_group','adrotate_nonce'); ?>
	<input type="hidden" name="adrotate_id" value="<?php echo $edit_group->id;?>" />
	<input type="hidden" name="adrotate_action" value="<?php echo $action;?>" />

	<?php if($edit_group->name == '') { ?>
		<h3><?php _e('New Group', 'adrotate'); ?></h3>
	<?php } else { ?> 
		<h3><?php _e('Edit Group', 'adrotate'); ?></h3>
	<?php } ?>

	<p><em><?php _e('These are required.', 'adrotate'); ?></em></p>
   	<table class="widefat" style="margin-top: .5em">
		<tbody>
	    <tr>
			<th width="15%"><?php _e('ID:', 'adrotate'); ?></th>
			<td colspan="3"><?php echo $edit_group->id; ?></td>
		</tr>
	    <tr>
			<th width="15%"><?php _e('Name:', 'adrotate'); ?></th>
			<td colspan="3">
				<label for="adrotate_groupname"><input tabindex="1" name="adrotate_groupname" type="text" class="search-input" size="80" value="<?php echo $edit_group->name; ?>" autocomplete="off" /></label>
			</td>
		</tr>
	    <tr>
			<th valign="top"><?php _e('Mode', 'adrotate'); ?></strong></th>
			<td width="35%">
		       	<select tabindex="2" name="adrotate_modus">
		        	<option value="0" <?php if($edit_group->modus == 0) { echo 'selected'; } ?>><?php _e('Default - Show one ad at a time', 'adrotate'); ?></option>
		        	<option value="1" <?php if($edit_group->modus == 1) { echo 'selected'; } ?>><?php _e('Dynamic Mode - Show a different ad every few seconds', 'adrotate'); ?></option>
		        	<option value="2" <?php if($edit_group->modus == 2) { echo 'selected'; } ?>><?php _e('Block Mode - Show a block of ads', 'adrotate'); ?></option>
		        </select> 
			</td>
			<td colspan="2">
		        <p><em><?php _e('\'Dynamic\' and \'Block\' mode require \'jQuery\' and \'jQuery Showoff\' to be loaded. You can enable this in AdRotate Settings.', 'adrotate'); ?></em></p>
			</td>
		</tr>
		</tbody>
	</table>

	<h3><?php _e('Dynamic and Block Mode', 'adrotate'); ?></h3>
	<p><em><?php _e('Only required if your group is in Dynamic or Block mode.', 'adrotate'); ?></em></p>
   	<table class="widefat" style="margin-top: .5em">
		<tbody>
	    <tr>
			<th width="15%"><?php _e('Block shape and border', 'adrotate'); ?></strong></th>
			<td width="35%">
				<label for="adrotate_gridrows"><input tabindex="4" name="adrotate_gridrows" type="text" class="search-input" size="3" value="<?php echo $edit_group->gridrows; ?>" autocomplete="off" /> <?php _e('rows', 'adrotate'); ?>,</label> <label for="adrotate_gridcolumns"><input tabindex="5" name="adrotate_gridcolumns" type="text" class="search-input" size="3" value="<?php echo $edit_group->gridcolumns; ?>" autocomplete="off" /> <?php _e('columns', 'adrotate'); ?>.</label>
			</td>
			<td colspan="2">
		        <p><em><?php _e('Block Mode', 'adrotate'); ?> - <?php _e('Make a grid for your ads. Filling in 3 and 2 makes a grid with 2 columns showing a maximum of 6 ads. Default: 2x2.', 'adrotate'); ?></em></p>
			</td>
		</tr>
	    <tr>
			<th valign="top"><?php _e('Automated refresh', 'adrotate'); ?></strong></th>
			<td>
		       	<label for="adrotate_adwidth"><select tabindex="3" name="adrotate_adspeed">
		        	<option value="3000" <?php if($edit_group->adspeed == 3000) { echo 'selected'; } ?>>3</option>
		        	<option value="4000" <?php if($edit_group->adspeed == 4000) { echo 'selected'; } ?>>4</option>
		        	<option value="5000" <?php if($edit_group->adspeed == 5000) { echo 'selected'; } ?>>5</option>
		        	<option value="6000" <?php if($edit_group->adspeed == 6000) { echo 'selected'; } ?>>6</option>
		        	<option value="7000" <?php if($edit_group->adspeed == 7000) { echo 'selected'; } ?>>7</option>
		        	<option value="8000" <?php if($edit_group->adspeed == 8000) { echo 'selected'; } ?>>8</option>
		        	<option value="9000" <?php if($edit_group->adspeed == 9000) { echo 'selected'; } ?>>9</option>
		        	<option value="10000" <?php if($edit_group->adspeed == 10000) { echo 'selected'; } ?>>10</option>
		        	<option value="12000" <?php if($edit_group->adspeed == 12000) { echo 'selected'; } ?>>12</option>
		        	<option value="15000" <?php if($edit_group->adspeed == 15000) { echo 'selected'; } ?>>15</option>
		        	<option value="20000" <?php if($edit_group->adspeed == 20000) { echo 'selected'; } ?>>20</option>
		        	<option value="25000" <?php if($edit_group->adspeed == 25000) { echo 'selected'; } ?>>25</option>
		        	<option value="35000" <?php if($edit_group->adspeed == 35000) { echo 'selected'; } ?>>35</option>
		        	<option value="45000" <?php if($edit_group->adspeed == 45000) { echo 'selected'; } ?>>45</option>
		        	<option value="60000" <?php if($edit_group->adspeed == 60000) { echo 'selected'; } ?>>60</option>
		        	<option value="90000" <?php if($edit_group->adspeed == 90000) { echo 'selected'; } ?>>90</option>
		        </select> <?php _e('seconds.', 'adrotate'); ?></label>
			</td>
			<td colspan="2">
		        <p><em><?php _e('Dynamic Mode', 'adrotate'); ?> - <?php _e('Load a new advert in this interval without reloading the page. Default: 6.', 'adrotate'); ?></em></p>
			</td>
		</tr>
	    <tr>
			<th valign="top"><?php _e('Advert Width and Height', 'adrotate'); ?></strong></th>
			<td>
				<label for="adrotate_adwidth"><input tabindex="6" name="adrotate_adwidth" type="text" class="search-input" size="3" value="<?php echo $edit_group->adwidth; ?>" autocomplete="off" /> <?php _e('pixel(s) wide', 'adrotate'); ?>,</label> <label for="adrotate_adheight"><input tabindex="7" name="adrotate_adheight" type="text" class="search-input" size="3" value="<?php echo $edit_group->adheight; ?>" autocomplete="off" /> <?php _e('pixel(s) high.', 'adrotate'); ?></label>
			</td>
			<td colspan="2">
		        <p><em><?php _e('Define the maximum size of the ads in pixels minus margin. Size can be \'auto\' (Not recommended). Default: 125/125.', 'adrotate'); ?></em></p>
			</td>
		</tr>
	    <tr>
			<th valign="top"><?php _e('Advert Margin', 'adrotate'); ?></strong></th>
			<td>
				<label for="adrotate_admargin"><input tabindex="8" name="adrotate_admargin" type="text" class="search-input" size="3" value="<?php echo $edit_group->admargin; ?>" autocomplete="off" /> <?php _e('pixel(s)', 'adrotate'); ?>.</label>
				</td>
			<td colspan="2">
		        <p><em><?php _e('A transparant border outside the advert in pixels. Default: 1.', 'adrotate'); ?></em></p>
			</td>
		</tr>
		</tbody>
	</table>

	<h3><?php _e('Advanced', 'adrotate'); ?></h3>
	<p><em><?php adrotate_pro_notice('t'); ?></em></p>
   	<table class="widefat" style="margin-top: .5em">
		<tbody>
	    <tr>
			<th width="15%"><?php _e('Geo Targeting', 'adrotate'); ?></th>
			<td width="35%"><label for="adrotate_geo"><input tabindex="9" type="checkbox" name="adrotate_geo" value="1" disabled="disabled" /> <?php _e('Enable.', 'adrotate'); ?></label></td>
			<td><p><em><?php _e('Do not forget to tell the adverts for which areas they should show.', 'adrotate'); ?></em></p></td>
		</tr>
	    <tr>
			<th><?php _e('Fallback group', 'adrotate'); ?></th>
			<td>
				<label for="adrotate_fallback"><select tabindex="10" name="adrotate_fallback" disabled="disabled">
		        	<option value="0"><?php _e('No', 'adrotate'); ?></option>
				</select></label>
			</td>
	        <td><em><?php _e('Select another group to fall back on when all ads are expired, not in the visitors geographic area or are otherwise unavailable.', 'adrotate'); ?></em></td>
		</tr>
      	<tr>
	        <th><?php _e('Sortorder:', 'adrotate'); ?></th>
	        <td><label for="adrotate_sortorder"><input tabindex="11" name="adrotate_sortorder" type="text" size="5" class="search-input" autocomplete="off" value="<?php echo $edit_group->sortorder;?>" /></label></td>
	        <td><em><?php _e('For administrative purposes set a sortorder.', 'adrotate'); ?> <?php _e('Leave empty or 0 to skip this. Will default to group id.', 'adrotate'); ?></em></td>
      	</tr>
		</tbody>
	</table>
	
   	<h3><?php _e('Post Injection', 'adrotate'); ?></h3>
   	<p><em>Insert ads to the begin or end of a post/page.</em></p>
   	<table class="widefat" style="margin-top: .5em">
      	<tr>
	        <th width="15%"><?php _e('Include ads in categories?', 'adrotate'); ?></th>
	        <td>
	        <label for="adrotate_cat_location">
		        <select tabindex="9" name="adrotate_cat_location">
		        	<option value="0" <?php if($edit_group->cat_loc == 0) { echo 'selected'; } ?>><?php _e('Do not use this feature', 'adrotate'); ?></option>
		        	<option value="1" <?php if($edit_group->cat_loc == 1) { echo 'selected'; } ?>><?php _e('Before the post content', 'adrotate'); ?></option>
		        	<option value="2" <?php if($edit_group->cat_loc == 2) { echo 'selected'; } ?>><?php _e('After the post content', 'adrotate'); ?></option>
		        	<option value="3" <?php if($edit_group->cat_loc == 3) { echo 'selected'; } ?>><?php _e('Before and after the content', 'adrotate'); ?></option>
		        </select> 
	        </td>
      	</tr>
      	<tr>
	        <th valign="top"><?php _e('Which categories?', 'adrotate'); ?></th>
	        <td>
	        <label for="adrotate_categories">
				<div class="adrotate-select">
		        <?php echo adrotate_select_categories($edit_group->cat, 0, 0, 0); ?>
				</div><em><?php _e('Click the categories posts you want the adverts to show in.', 'adrotate'); ?></em>
	        </label>
	        </td>
      	</tr>
      	<tr>
	        <th valign="top"><?php _e('Include ads in pages?', 'adrotate'); ?></th>
	        <td>
	        <label for="adrotate_page_location">
		        <select tabindex="10" name="adrotate_page_location">
		        	<option value="0" <?php if($edit_group->page_loc == 0) { echo 'selected'; } ?>><?php _e('Do not use this feature', 'adrotate'); ?></option>
		        	<option value="1" <?php if($edit_group->page_loc == 1) { echo 'selected'; } ?>><?php _e('Before the page content', 'adrotate'); ?></option>
		        	<option value="2" <?php if($edit_group->page_loc == 2) { echo 'selected'; } ?>><?php _e('After the page content', 'adrotate'); ?></option>
		        	<option value="3" <?php if($edit_group->page_loc == 3) { echo 'selected'; } ?>><?php _e('Before and after the content', 'adrotate'); ?></option>
		        </select>
			</label>
	        </td>
      	</tr>
      	<tr>
	        <th valign="top"><?php _e('Which pages?', 'adrotate'); ?></th>
	        <td>
	        <label for="adrotate_pages">
		        <div class="adrotate-select">
		        <?php echo adrotate_select_pages($edit_group->page, 0, 0, 0); ?>
				</div><em><?php _e('Click the pages you want the adverts to show in.', 'adrotate'); ?></em>
	        </label>
	        </td>
      	</tr>
		</tbody>
	</table>
	
   	<h3><?php _e('Wrapper code', 'adrotate'); ?></h3>
   	<p><em><?php _e('Wraps around each ad.', 'adrotate'); ?></em></p>
   	<table class="widefat" style="margin-top: .5em">
		<tbody>
	    <tr>
			<th width="15%" valign="top"><?php _e('Before ad', 'adrotate'); ?></strong></th>
			<td colspan="2"><textarea tabindex="12" name="adrotate_wrapper_before" cols="65" rows="3"><?php echo stripslashes($edit_group->wrapper_before); ?></textarea></td>
			<td width="35%">
		        <p><strong><?php _e('Example:', 'adrotate'); ?></strong> <em>&lt;span style="background-color:#aaa;"&gt;</em></p>
		        <p><strong><?php _e('Options:', 'adrotate'); ?></strong> <em>%id%</em></p>
				<p><em><?php _e('HTML/JavaScript allowed, use with care!', 'adrotate'); ?></em></p>
			</td>
		</tr>
	    <tr>
			<th valign="top"><?php _e('After ad', 'adrotate'); ?></strong></th>
			<td colspan="2"><textarea tabindex="13" name="adrotate_wrapper_after" cols="65" rows="3"><?php echo stripslashes($edit_group->wrapper_after); ?></textarea></td>
			<td>
				<p><strong><?php _e('Example:', 'adrotate'); ?></strong> <em>&lt;/span&gt;</em></p>
			</td>
		</tr>
		</tbody>
	</table>
	
	<h3><?php _e('Usage', 'adrotate'); ?></h3>
	<p><em><?php _e('Copy the shortcode in a post or page. The PHP code goes in a theme file where you want the advert to show up.', 'adrotate'); ?></em></p>
   	<table class="widefat" style="margin-top: .5em">
		<tbody>
      	<tr>
	        <th width="15%"><?php _e('In a post or page:', 'adrotate'); ?></th>
	        <td width="35%">[adrotate group="<?php echo $edit_group->id; ?>"]</td>
	        <th width="15%"><?php _e('Directly in a theme:', 'adrotate'); ?></th>
	        <td width="35%">&lt;?php echo adrotate_group(<?php echo $edit_group->id; ?>); ?&gt;</td>
      	</tr>
      	</tbody>
	</table>

	<p class="submit">
		<input tabindex="14" type="submit" name="adrotate_group_submit" class="button-primary" value="<?php _e('Save', 'adrotate'); ?>" />
		<a href="admin.php?page=adrotate-groups&view=manage" class="button"><?php _e('Cancel', 'adrotate'); ?></a>
	</p>

	<h3><?php _e('Select Ads', 'adrotate'); ?></h3>
   	<table class="widefat" style="margin-top: .5em">
		<thead>
		<tr>
			<th scope="col" class="manage-column column-cb check-column"><input type="checkbox" /></th>
			<th><?php _e('Choose the ads to use in this group', 'adrotate'); ?></th>
			<th width="5%"><center><?php _e('Impressions', 'adrotate'); ?></center></th>
			<th width="5%"><center><?php _e('Clicks', 'adrotate'); ?></center></th>
			<th width="5%"><center><?php _e('Weight', 'adrotate'); ?></center></th>
			<th width="15%"><?php _e('Visible until', 'adrotate'); ?></th>
		</tr>
		</thead>

		<tbody>
		<?php if($ads) {
			$class = '';
			foreach($ads as $ad) {
				$stats = adrotate_stats($ad->id);
				$stoptime = $wpdb->get_var("SELECT `stoptime` FROM `".$wpdb->prefix."adrotate_schedule`, `".$wpdb->prefix."adrotate_linkmeta` WHERE `ad` = '".$ad->id."' AND `schedule` = `".$wpdb->prefix."adrotate_schedule`.`id` ORDER BY `stoptime` DESC LIMIT 1;");

				$class = ('alternate' != $class) ? 'alternate' : ''; ?>
			    <tr class='<?php echo $class; ?>'>
					<th class="check-column" width="2%"><input type="checkbox" name="adselect[]" value="<?php echo $ad->id; ?>" <?php if(in_array($ad->id, $meta_array)) echo "checked"; ?> /></th>
					<td><?php echo $ad->id; ?> - <strong><?php echo stripslashes(html_entity_decode($ad->title)); ?></strong></td>
					<td><center><?php echo $stats['impressions']; ?></center></td>
					<td><center><?php if($ad->tracker == 'Y') { echo $stats['clicks']; } else { ?>--<?php } ?></center></td>
					<td><center><?php echo $ad->weight; ?></center></td>
					<td><span style="color: <?php echo adrotate_prepare_color($stoptime);?>;"><?php echo date_i18n("F d, Y", $stoptime); ?></span></td>
				</tr>
			<?php unset($stats);?>
 			<?php } ?>
		<?php } else { ?>
		<tr>
			<th class="check-column">&nbsp;</th>
			<td colspan="5"><em><?php _e('No ads created!', 'adrotate'); ?></em></td>
		</tr>
		<?php } ?>
		</tbody>					
	</table>

	<p class="submit">
		<input tabindex="15" type="submit" name="adrotate_group_submit" class="button-primary" value="<?php _e('Save', 'adrotate'); ?>" />
		<a href="admin.php?page=adrotate-groups&view=manage" class="button"><?php _e('Cancel', 'adrotate'); ?></a>
	</p>

</form>
