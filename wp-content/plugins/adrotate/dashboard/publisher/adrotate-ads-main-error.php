<?php
/*  
Copyright 2010-2014 Arnan de Gans - AJdG Solutions (email : info@ajdg.net)
*/
?>
<h3><?php _e('Ads that need immediate attention', 'adrotate'); ?></h3>

<form name="errorbanners" id="post" method="post" action="admin.php?page=adrotate-ads">
	<?php wp_nonce_field('adrotate_bulk_ads_error','adrotate_nonce'); ?>
	<div class="tablenav">
		<div class="alignleft actions">
			<select name="adrotate_error_action" id="cat" class="postform">
		        <option value=""><?php _e('Bulk Actions', 'adrotate'); ?></option>
		        <option value="deactivate"><?php _e('Deactivate', 'adrotate'); ?></option>
		        <option value="delete"><?php _e('Delete', 'adrotate'); ?></option>
		        <option value="reset"><?php _e('Reset stats', 'adrotate'); ?></option>
		        <option value="" disabled><?php _e('-- Renew --', 'adrotate'); ?></option>
		        <option value="renew-31536000"><?php _e('For 1 year', 'adrotate'); ?></option>
		        <option value="renew-5184000"><?php _e('For 180 days', 'adrotate'); ?></option>
		        <option value="renew-2592000"><?php _e('For 30 days', 'adrotate'); ?></option>
		        <option value="renew-604800"><?php _e('For 7 days', 'adrotate'); ?></option>
			</select>
			<input type="submit" id="post-action-submit" name="adrotate_error_action_submit" value="Go" class="button-secondary" />
		</div>
	
		<br class="clear" />
	</div>
	
		<table class="widefat" style="margin-top: .5em">
			<thead>
				<tr>
				<th scope="col" class="manage-column column-cb check-column" style=""><input type="checkbox" /></th>
				<th width="2%"><center><?php _e('ID', 'adrotate'); ?></center></th>
				<th width="12%"><?php _e('Show from', 'adrotate'); ?></th>
				<th width="12%"><?php _e('Show until', 'adrotate'); ?></th>
				<th><?php _e('Title', 'adrotate'); ?></th>
			</tr>
			</thead>
			<tbody>
		<?php foreach($errorbanners as $errbanner) {
			$grouplist = adrotate_ad_is_in_groups($errbanner['id']);
			
			if($adrotate_debug['dashboard'] == true) {
				echo "<tr><td>&nbsp;</td><td><strong>[DEBUG]</strong></td><td colspan='9'>";
				echo "Ad Specs: <pre>";
				print_r($errbanner); 
				echo "</pre></td></tr>"; 
			}
			
			$errorclass = '';
			if($errbanner['type'] == 'error') $errorclass = ' row_error'; 
			if($errbanner['type'] == 'expired') $errorclass = ' row_inactive';
			if($errbanner['type'] == '2days') $errorclass = ' row_urgent';
			?>
		    <tr id='adrotateindex' class='<?php echo $errorclass; ?>'>
				<th class="check-column"><input type="checkbox" name="errorbannercheck[]" value="<?php echo $errbanner['id']; ?>" /></th>
				<td><center><?php echo $errbanner['id'];?></center></td>
				<td><?php echo date_i18n("F d, Y", $errbanner['firstactive']);?></td>
				<td><span style="color: <?php echo adrotate_prepare_color($errbanner['lastactive']);?>;"><?php echo date_i18n("F d, Y", $errbanner['lastactive']);?></span></td>
				<td><strong><a class="row-title" href="<?php echo admin_url("/admin.php?page=adrotate-ads&view=edit&ad=".$errbanner['id']);?>" title="<?php _e('Edit', 'adrotate'); ?>"><?php echo stripslashes(html_entity_decode($errbanner['title']));?></a></strong> - <a href="<?php echo admin_url("/admin.php?page=adrotate-ads&view=report&ad=".$errbanner['id']);?>" title="<?php _e('Stats', 'adrotate'); ?>"><?php _e('Stats', 'adrotate'); ?></a><span style="color:#999;"><?php if(strlen($grouplist) > 0) echo '<br /><span style="font-weight:bold;">Groups:</span> '.$grouplist; ?></span></td>
			</tr>
			<?php } ?>
		</tbody>

		<thead>
		<tr>
			<th colspan="5">
				<center>
					<span style="border: 1px solid #e6db55; height: 12px; width: 12px; background-color: #ffffe0">&nbsp;&nbsp;&nbsp;&nbsp;</span> <?php _e("Configuration errors.", "adrotate"); ?>
					&nbsp;&nbsp;&nbsp;&nbsp;<span style="border: 1px solid #c00; height: 12px; width: 12px; background-color: #ffebe8">&nbsp;&nbsp;&nbsp;&nbsp;</span> <?php _e("Expires soon.", "adrotate"); ?>
					&nbsp;&nbsp;&nbsp;&nbsp;<span style="border: 1px solid #466f82; height: 12px; width: 12px; background-color: #8dcede">&nbsp;&nbsp;&nbsp;&nbsp;</span> <?php _e("Has expired.", "adrotate"); ?>
				</center>
			</th>
		</tr>
		</thead>
	</table>
</form>
