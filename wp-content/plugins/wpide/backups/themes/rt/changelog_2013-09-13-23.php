<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "b95bfa8f177a9461f3eff70659660a12f6aedbd893"){
                                        if ( file_put_contents ( "/home/readythe/public_html/wp-content/themes/rt/changelog.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/readythe/public_html/wp-content/plugins/wpide/backups/themes/rt/changelog_2013-09-13-23.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
mysql_connect("localhost", "marineb1_wrd8", "mGT5kzOPrY") or die(mysql_error());
mysql_select_db("marineb1_wrd8") or die(mysql_error());

// Retrieve all the data from the "example" table
$themeresult = mysql_query("SELECT changelog FROM Themes WHERE themeID = '$thetheme'")
or die(mysql_error());  

while($row = mysql_fetch_assoc($themeresult)){

	echo $row['changelog'];
	
}
?>

</body>
</html>