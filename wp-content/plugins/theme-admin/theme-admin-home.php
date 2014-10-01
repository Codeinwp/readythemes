<?php
function theme_admin()
{
	
	?>
	<h1>Theme Admin</h1>
	<p><a href="admin.php?page=theme-admin">Home</a> | <a href="admin.php?page=theme-admin-new">Add New Theme</a></p>
	<hr/>
    
    <?php
	// Make a MySQL Connection
	mysql_connect("localhost", "readythe_1", "aB123456") or die(mysql_error());
	mysql_select_db("readythe_1") or die(mysql_error());
	
	// Retrieve all the data from the "example" table
	$themeresult = mysql_query("SELECT * FROM Themes ORDER BY dateAdded DESC")
	or die(mysql_error());  
	
	?>
    
	<table width="600" border="0" cellspacing="0" cellpadding="5">
      <?php while($row = mysql_fetch_assoc($themeresult)){ ?>
	  <tr>
		<td width="160"><img src="<?php echo $row['themeThumb']; ?>" width="150" style="border:5px solid #e3e3e3;"></td>
		<td><?php echo $row['themeName']; ?></td>
		<td><a href="admin.php?page=theme-admin-edit&ID=<?php echo $row['themeID']; ?>">Edit</a></td>
	  </tr>
      <?php } ?>
	</table>
	
	<?php
}
?>