<?php
$user = @$_POST['user'];
//$user = "ENO";
if($user != "")
	{
	$objConnect = mysql_connect("103.13.231.13","carpark","utcc_cpe")or die("Error Connect to Database");
	$objDB = mysql_select_db("carpark");
	// Search By Name or Email
	$strSQL = "SELECT  * FROM paycarpark WHERE (user LIKE '$user')";
	$objQuery = mysql_query($strSQL) or die ("Error Query ['$strSQL']");
	if($objResult = mysql_fetch_array($objQuery)){
		
		echo $objResult["pay"];
	
}
	mysql_close($objConnect);
}
?>
