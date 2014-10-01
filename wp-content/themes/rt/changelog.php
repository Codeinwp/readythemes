<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Log</title>
</head>

<body style="font-family:Arial, Helvetica, sans-serif; font-size:13px;">

<?php
$thetheme = $_REQUEST["tid"];
//$themeresult = $wpdb->get_results( "SELECT ChangeLog FROM $wpdb->Themes WHERE themeID = ".$thetheme );

// Make a MySQL Connection
mysql_connect("localhost", "readythe_1", "aB123456") or die(mysql_error());
mysql_select_db("readythe_1") or die(mysql_error());

// Retrieve all the data from the "example" table
$themeresult = mysql_query("SELECT changelog FROM Themes WHERE themeID = '$thetheme'")
or die(mysql_error());  

while($row = mysql_fetch_assoc($themeresult)){

	echo $row['changelog'];
	
}
?>

</body>
</html>