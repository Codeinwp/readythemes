<?php

function theme_admin_new()
{
	?>
	<h1>Add New Theme</h1>
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
		
		mysql_query("INSERT into Themes(themename,themeDesc,themeDownload,themeReadme,themePSD,changelog,themeThumb,type) VALUES ('$themename','$themedesc','$downloadURL','$readmeURl','$psdURL','$changelog','$thumbURL','$type')");
			
		echo "Theme added!";
	}
	
	mysql_close($con);
	
	?>
    
	<form action="admin.php?page=theme-admin-new" method="post">

		<p><strong>Theme Name</strong><br><input type="text" name="themename" value="" style="width:500px; padding:5px;"></p>
		<p><strong>Theme Description</strong><br><textarea name="themedesc" style="width:500px; height:160px; padding:5px;"></textarea></p>
		<p><strong>Download URL</strong><br><input type="text" name="themeDownload" value="" style="width:500px; padding:5px;"></p>
		<p><strong>Readme URL</strong><br><input type="text" name="themeReadme" value="" style="width:500px; padding:5px;"></p>
		<p><strong>PSD URL (if available)</strong><br><input type="text" name="themePSD" value="" style="width:500px; padding:5px;"></p>
		<p><strong>Changelog</strong><br><textarea name="changelog" style="width:500px; height:160px; padding:5px;"></textarea></p>
		<p><strong>Thumbnail URL</strong><br><input type="text" name="themeThumb" value="" style="width:500px; padding:5px;"></p>
		<p><strong>Type</strong><br>
		<select name="type" style="padding:5px;">
			<option value="t">Theme</option>
			<option value="p">Plugin</option>
		</select>
		</p>		
		<input type="hidden" name="_submit_check" value="1"/>
		<p><input type="submit" value="Edit Theme"></p>
		
	</form>

	
	<?php
}
?>