<?php
/*  
Copyright 2010-2014 Arnan de Gans - AJdG Solutions (email : info@ajdg.net)
*/
?>
<h3><?php _e('Edit Block', 'adrotate'); ?></h3>
<?php 
$action = "block_edit";
$edit_block = $wpdb->get_row("SELECT * FROM `".$wpdb->prefix."adrotate_blocks` WHERE `id` = '$block_edit_id';");
$groups		= $wpdb->get_results("SELECT * FROM `".$wpdb->prefix."adrotate_groups` WHERE `name` != '' ORDER BY `id` ASC;"); 

// And for adverts
list($adborderpx, $adbordercolor, $adborderstyle) = explode(" ", $edit_block->adborder, 3);
$adborderpx = rtrim($adborderpx, "px");
if($adbordercolor == '') $adbordercolor = '#fff';
?>

<form name="editblock" id="post" method="post" action="admin.php?page=adrotate-blocks">

   	<table class="widefat" style="margin-top: .5em">
   	
			<thead>
			<tr>
			<th colspan="4"><?php _e('The basics', 'adrotate'); ?></th>
		</tr>
			</thead>
			
		<tbody>
	    <tr>
			<th width="15%"><?php _e('ID:', 'adrotate'); ?></th>
			<td colspan="3"><?php echo $edit_block->id; ?></td>
		</tr>
	    <tr>
			<th width="15%"><?php _e('Name / Reference:', 'adrotate'); ?></th>
			<td colspan="3"><?php echo $edit_block->name; ?></td>
		</tr>
		</tbody>

			<thead>
			<tr>
			<th colspan="4"><?php _e('Block shape  and border (Required) - Define the shape and size of the block', 'adrotate'); ?></th>
		</tr>
			</thead>
			
		<tbody>
	    <tr>
			<th valign="top"><?php _e('Rows and Columns', 'adrotate'); ?></strong></th>
			<td>
				<label for="adrotate_gridrows"><?php echo $edit_block->rows; ?> <?php _e('rows', 'adrotate'); ?>,</label> <label for="adrotate_gridcolumns"><?php echo $edit_block->columns; ?> <?php _e('columns', 'adrotate'); ?>.</label>
			</td>
			<td colspan="2">
		        <p><em><?php _e('Make a grid for your ads. Filling in 2 and 2 makes a 2x2 grid. (Default: 2/2)', 'adrotate'); ?></em></p>
			</td>
		</tr>
	    <tr>
			<th valign="top"><?php _e('Block Padding', 'adrotate'); ?></strong></th>
			<td>
				<label for="adrotate_gridpadding"><?php echo $edit_block->gridpadding; ?> <?php _e('pixel(s)', 'adrotate'); ?>.</label>
				</td>
			<td colspan="2">
		        <p><em><?php _e('An invisible border inside the block in pixels. (Default: 1)', 'adrotate'); ?></em></p>
			</td>
		</tr>
		</tbody>

			<thead>
			<tr>
			<th colspan="4"><?php _e('Advert shape and border (Required) - Define the shape and size of the adverts', 'adrotate'); ?></th>
		</tr>
			</thead>
			
		<tbody>
	    <tr>
			<th valign="top"><?php _e('Width and Height', 'adrotate'); ?></strong></th>
			<td>
				<label for="adrotate_adwidth"><?php echo $edit_block->adwidth; ?> <?php _e('pixel(s) wide', 'adrotate'); ?>,</label> <label for="adrotate_adheight"><?php echo $edit_block->adheight; ?> <?php _e('pixel(s) high.', 'adrotate'); ?></label>
			</td>
			<td colspan="2">
		        <p><em><?php _e('Define the maximum size of the ads in pixels. Height can be \'auto\' (Default: 125/125)', 'adrotate'); ?></em></p>
			</td>
		</tr>
	    <tr>
			<th valign="top"><?php _e('Advert Margin', 'adrotate'); ?></strong></th>
			<td>
				<label for="adrotate_admargin"><?php echo $edit_block->admargin; ?> <?php _e('pixel(s) margin', 'adrotate'); ?>.</label>
				</td>
			<td colspan="2">
		        <p><em><?php _e('An invisible border outside the advert in pixels. (Default: 1)', 'adrotate'); ?></em></p>
			</td>
		</tr>
	    <tr>
			<th valign="top"><?php _e('Advert Border', 'adrotate'); ?></strong></th>
			<td>
		        <label for="adrotate_adborderstyle"><?php _e('Style', 'adrotate'); ?> <?php echo $adborderstyle; ?></label> 
				<label for="adrotate_adborderpx"><?php _e('Width', 'adrotate'); ?> <?php echo $adborderpx; ?> <?php _e('pixel(s). Color', 'adrotate'); ?> </label>
				<label for="adrotate_adbordercolor"><?php echo $adbordercolor; ?></label>  
			</td>
			<td colspan="2">
				<p><em><?php _e('Set the border width to 0 to disable. Color must be a valid hex value. (Default: none/0/#fff)', 'adrotate'); ?></em></p>
			</td>
		</tr>
		</tbody>

			<thead>
			<tr>
			<th colspan="4"><?php _e('Wrapper code (Optional) - Wraps around each ad', 'adrotate'); ?></th>
		</tr>
			</thead>
			
		<tbody>
	    <tr>
			<th valign="top"><?php _e('Before ad', 'adrotate'); ?></strong></th>
			<td colspan="2"><?php echo stripslashes($edit_block->wrapper_before); ?></td>
			<td>
		        <p><strong><?php _e('Example:', 'adrotate'); ?></strong></p>
		        <p><em>&lt;span style="margin: 2px;"&gt;</em></p>
			</td>
		</tr>
	    <tr>
			<th valign="top"><?php _e('After ad', 'adrotate'); ?></strong></th>
			<td colspan="2"><?php echo stripslashes($edit_block->wrapper_after); ?></td>
			<td>
				<p><strong><?php _e('Example:', 'adrotate'); ?></strong></p>
				<p><em>&lt;/span&gt;</em></p>
			</td>
		</tr>
		</tbody>

		<thead>
		<tr valign="top">
			<th colspan="4"><?php _e('Usage', 'adrotate'); ?></th>
		</tr>
		</thead>

	</table>
	
	<h3><?php _e('Select Groups', 'adrotate'); ?></h3>

   	<table class="widefat" style="margin-top: .5em">
			<thead>
			<tr>
			<th scope="col" class="manage-column column-cb check-column"><input type="checkbox" /></th>
			<th colspan="2"><?php _e('Choose the groups to use in this block', 'adrotate'); ?></th>
		</tr>
			</thead>

		<tbody>
		<?php if($groups) {
			$class = '';
			foreach($groups as $group) {
				$ads_in_group = $wpdb->get_var("SELECT COUNT(*) FROM `".$wpdb->prefix."adrotate_linkmeta` WHERE `group` = ".$group->id." AND `block` = 0;");
				$class = ('alternate' != $class) ? 'alternate' : ''; ?>
			    <tr class='<?php echo $class; ?>'>
					<th class="check-column" width="2%">&nbsp;</th>
					<td><?php echo $group->id; ?> - <strong><?php echo $group->name; ?></strong></td>
					<td width="10%"><?php echo $ads_in_group; ?> <?php _e('Ads', 'adrotate'); ?></td>
				</tr>
 			<?php } ?>
		<?php } else { ?>
		<tr>
			<th class="check-column">&nbsp;</th>
			<td colspan="2"><em><?php _e('No groups created!', 'adrotate'); ?></em></td>
		</tr>
		<?php } ?>
		</tbody>					
	</table>

</form>