<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connect = "103.13.231.13";
$database_connect = "carpark";
$username_connect = "carpark";
$password_connect = "utcc_cpe";
$connect = mysql_pconnect($hostname_connect, $username_connect, $password_connect) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_db_query($database_connect, "SET NAMES utf8 "); 
?>