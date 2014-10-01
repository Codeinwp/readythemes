<?php

function theme_admin_edit()
{
	?>
	<h1>Edit Theme</h1>
	<p><a href="admin.php?page=theme-admin">Home</a> | <a href="admin.php?page=theme-admin-new">Add New Theme</a></p>
	<hr/>
	
	<?php
	
	$themeID = $_GET["ID"];
	
	$con = mysql_connect("localhost","readythe_1","aB123456");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	
	mysql_select_db("readythe_1", $con);
	
	if (array_key_exists('_submit_check', $_POST)) {
		$themename = $_REQUEST["themename"];
		$themedesc = $_REQUEST["themedesc"];
		$downloadURL = $_REQUEST["themeDownload"];
		$readmeURl = $_REQUEST["themeReadme"];
		$psdURL = $_REQUEST["themePSD"];
		$changelog = $_REQUEST["changelog"];
		$thumbURL = $_REQUEST["themeThumb"];
		$type = $_REQUEST["type"];
		
		mysql_query("UPDATE Themes SET themeName= '$themename',
					themeDesc = '$themedesc',
					themeDownload = '$downloadURL',
					themeReadme = '$readmeURl',
					themePSD = '$psdURL',
					changelog = '$changelog',
					themeThumb = '$thumbURL',
					type = '$type'
					 WHERE themeID= ".$themeID);
			
	}
	
	// Retrieve all the data from the "example" table
	$themeresult = mysql_query("SELECT * FROM Themes where themeID = ".$themeID)
	or die(mysql_error());  
	
	mysql_close($con);
	
	?>
    
	<form action="admin.php?page=theme-admin-edit&ID=<?php echo $themeID;?>" method="post">
		
		<?php while($row = mysql_fetch_assoc($themeresult)){ ?>
		<p><strong>Theme Name</strong><br><input type="text" name="themename" value="<?php echo $row['themeName']; ?>" style="width:500px; padding:5px;"></p>
		<p><strong>Theme Description</strong><br><textarea name="themedesc" style="width:500px; height:160px; padding:5px;"><?php echo $row['themeDesc']; ?></textarea></p>
		<p><strong>Download URL</strong><br><input type="text" name="themeDownload" value="<?php echo $row['themeDownload']; ?>" style="width:500px; padding:5px;"></p>
		<p><strong>Readme URL</strong><br><input type="text" name="themeReadme" value="<?php echo $row['themeReadme']; ?>" style="width:500px; padding:5px;"></p>
		<p><strong>PSD URL (if available)</strong><br><input type="text" name="themePSD" value="<?php echo $row['themePSD']; ?>" style="width:500px; padding:5px;"></p>
		<p><strong>Changelog</strong><br><textarea name="changelog" style="width:500px; height:160px; padding:5px;"><?php echo $row['changelog']; ?></textarea></p>
		<p><strong>Thumbnail URL</strong><br><input type="text" name="themeThumb" value="<?php echo $row['themeThumb']; ?>" style="width:500px; padding:5px;"></p>
		<p><strong>Type</strong><br>
		<select name="type" style="padding:5px;">
			<option value="t" <?php if($row['type'] == 't'){ ?>selected="selected"<?php } ?>>Theme</option>
			<option value="p" <?php if($row['type'] == 'p'){ ?>selected="selected"<?php } ?>>Plugin</option>
		</select>
		</p>
		<?php } ?>
		
		<input type="hidden" name="_submit_check" value="1"/>
		<p><input type="submit" value="Edit Theme"></p>
		
	</form>

	
	<?php
}
?>