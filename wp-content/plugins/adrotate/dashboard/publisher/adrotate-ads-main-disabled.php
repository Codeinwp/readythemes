<?php
/*  
Copyright 2010-2014 Arnan de Gans - AJdG Solutions (email : info@ajdg.net)
*/
?>
<form name="disabled_banners" id="post" method="post" action="admin.php?page=adrotate-ads">
	<?php wp_nonce_field('adrotate_bulk_ads_disable','adrotate_nonce'); ?>
	
	<h3><?php _e('Disabled Ads', 'adrotate'); ?></h3>
	
	<div class="tablenav">
		<div class="alignleft actions">
			<select name="adrotate_disabled_action" id="cat" class="postform">
		        <option value=""><?php _e('Bulk Actions', 'adrotate'); ?></option>
		        <option value="activate"><?php _e('Activate', 'adrotate'); ?></option>
		        <option value="delete"><?php _e('Delete', 'adrotate'); ?></option>
		        <option value="reset"><?php _e('Reset stats', 'adrotate'); ?></option>
			</select>
			<input type="submit" id="post-action-submit" name="adrotate_disabled_action_submit" value="Go" class="button-secondary" />
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
				<th width="5%"><center><?php _e('Impressions', 'adrotate'); ?></center></th>
				<th width="5%"><center><?php _e('Clicks', 'adrotate'); ?></center></th>
				<th width="5%"><center><?php _e('CTR', 'adrotate'); ?></center></th>
			</tr>
			</thead>
			<tbody>
		<?php
		foreach($disabledbanners as $disbanner) {
			$stats = adrotate_stats($disbanner['id']);
			$grouplist = adrotate_ad_is_in_groups($disbanner['id']);
	
			// Prevent gaps in display
			$ctr = adrotate_ctr($stats['clicks'], $stats['impressions']);
			
			if($adrotate_debug['dashboard'] == true) {
				echo "<tr><td>&nbsp;</td><td><strong>[DEBUG]</strong></td><td colspan='9'><pre>";
				echo "Ad Specs: <pre>";
				print_r($disbanner); 
				echo "</pre>"; 
				echo "Stats: <pre>";
				print_r($stats); 
				echo "</pre></td></tr>"; 
			}
						
			$grouplist = adrotate_ad_is_in_groups($disbanner['id']);
			
			if($disbanner['type'] == 'disabled') {
				$errorclass = ' row_inactive';
			} else {
				$errorclass = '';
			}
			?>
		    <tr id='adrotateindex' class='<?php echo $errorclass; ?>'>
				<th class="check-column"><input type="checkbox" name="disabledbannercheck[]" value="<?php echo $disbanner['id']; ?>" /></th>
				<td><center><?php echo $disbanner['id'];?></center></td>
				<td><?php echo date_i18n("F d, Y", $disbanner['firstactive']);?></td>
				<td><span style="color: <?php echo adrotate_prepare_color($disbanner['lastactive']);?>;"><?php echo date_i18n("F d, Y", $disbanner['lastactive']);?></span></td>
				<td><strong><a class="row-title" href="<?php echo admin_url('/admin.php?page=adrotate-ads&view=edit&ad='.$disbanner['id']);?>" title="<?php _e('Edit', 'adrotate'); ?>"><?php echo stripslashes(html_entity_decode($disbanner['title']));?></a></strong> - <a href="<?php echo admin_url('/admin.php?page=adrotate-ads&view=report&ad='.$disbanner['id']);?>" title="<?php _e('Stats', 'adrotate'); ?>"><?php _e('Stats', 'adrotate'); ?></a><span style="color:#999;"><?php if(strlen($grouplist) > 0) echo '<br /><span style="font-weight:bold;">Groups:</span> '.$grouplist; ?></td>
				<td><center><?php echo $stats['impressions']; ?></center></td>
				<?php if($disbanner['tracker'] == "Y") { ?>
				<td><center><?php echo $stats['clicks']; ?></center></td>
				<td><center><?php echo $ctr; ?> %</center></td>
				<?php } else { ?>
				<td><center>--</center></td>
				<td><center>--</center></td>
				<?php } ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	
</form>
