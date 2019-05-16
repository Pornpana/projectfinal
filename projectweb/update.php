<?PHP
$objConnect = mysql_connect("103.13.231.13","carpark","utcc_cpe")or die("Error Connect to Database");
	$objDB = mysql_select_db("carpark");
	$strSQL ="SELECT COUNT(*) AS NumberOfProducts FROM paycarpark";
	$objQuery = mysql_query($strSQL) or die ("Error Query ['$strSQL']");

 echo $strSQL;
mysql_close($objConnect);

?>