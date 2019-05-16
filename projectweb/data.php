<?php
$user = @$_POST['user'];
//$user = "ENO";
if($user != "")
	{
	$objConnect = mysql_connect("103.13.231.13","carpark","utcc_cpe")or die("Error Connect to Database");
	$objDB = mysql_select_db("carpark");
	// Search By Name or Email
	$strSQL = "SELECT  * FROM carpark WHERE (user LIKE '$user')";
	$objQuery = mysql_query($strSQL) or die ("Error Query ['$strSQL']");
	if($objResult = mysql_fetch_array($objQuery)){
		/*
		echo'{%20"user"%20:%20"';
		echo $objResult["user"];
		echo '"%20,%20"fistname"%20:%20"';
		echo $objResult["fistname"];
		echo '"%20,%20"lastname"%20:%20"';
		echo $objResult["lastname"];
		echo '"%20,%20"status"%20:%20"';
		echo $objResult["status"];
		echo '%20"%20}';
		*/
	
		echo $objResult["user"];
		echo ',';
		echo $objResult["fistname"];
		echo ',';
		echo $objResult["lastname"];
		echo ',';
		echo $objResult["status"];
	
}
	mysql_close($objConnect);
}
?>
