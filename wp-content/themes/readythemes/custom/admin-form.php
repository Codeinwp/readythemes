<div style="float:left; width:735px;">

<form method="post">
    
    <!-- General Settings Output -->
    <div class="headingoption"><a href="#" onclick="return false;">General Settings</a></div>
    <div class="headingoption"><a href="#" onclick="return false;">Home Page</a></div>
    <div class="headingoption"><a href="#" onclick="return false;">Sidebar</a></div>
    <div class="headingoption"><a href="#" onclick="return false;">Footer</a></div>
    <div class="headingdetails" style="display:block;">
    	
    <div class="detailleft">
    	 <p>General site settings</p>
    </div>
    
    <div class="detailright">
        <p class="submit">
            <input name="save" type="submit" value="Save changes" />
            <input type="hidden" name="action" value="save" />
        </p>
    </div>
    
    <div class="clear"></div>
    
    <table>
    
    <?php foreach ($options as $value) { ?>
    
		<?php if ($value['groupid'] == "1") { ?>
    
            <tr>
            	<td valign="top" width="240">
				<strong><?php echo $value['name']; ?></strong>
                </td>
                <td width="*">
                <?php if ($value['type'] == "text") { ?>
                <input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
                <?php if ($value['desc'] <> "") { ?><div class="optiondesc"><?php echo $value['desc']; ?></div><?php } ?>
				<?php } elseif ($value['type'] == "select") { ?>
                <select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select>
				<?php if ($value['desc'] <> "") { ?><div class="optiondesc"><?php echo $value['desc']; ?></div><?php } ?>
				<?php } elseif ($value['type'] == "textarea") { ?>
                <textarea name="<?php echo $value['id']; ?>" style="width:400px; height:100px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo $value['std']; } ?></textarea>
                <?php if ($value['desc'] <> "") { ?><div class="optiondesc"><?php echo $value['desc']; ?></div><?php } ?>
				<?php } elseif ($value['type'] == "checkbox") { ?>
                <? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                <?php if ($value['desc'] <> "") { ?><div class="optiondesc"><?php echo $value['desc']; ?></div><?php } ?>
				<?php } ?>
                </td>
            </tr>
        
        <?php } ?> 
    
    <?php } ?>
    
    </table> 
    
    </div>
    <!-- End General Settings Output -->

<p class="submit">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

</div>

<div style="float:left; width:210px; padding:20px; margin-top:5px; border:1px solid #ccc;">
	<h2 style="margin-top:0;">Ready Themes</h2>
    <p><strong>Affiliate Theme</strong></p>
    <p>For support, visit our site at readythemes.com</p>
</div>

<div class="clear"></div>