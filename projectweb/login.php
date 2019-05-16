<?PHP
$user = @$_POST['user'];
$password = @$_POST['password'];

/*
$user = "EN01";
$password = "123456789";
//$fistname = "พรพนา";
*/
if($user ==''){
	echo "no user";
	exit();
}
if($password ==''){
	echo "no password";
	exit();
}

$con = mysqli_connect("103.13.231.13","carpark","utcc_cpe","carpark");
$sql = "select * from carpark where user = '$user' and password = '$password' ";
$result = mysqli_query($con,$sql)or die(mysqli_error()."<hr/>Line: ".___line___."<br/>$sql");
$fistname = @$_POST['fistname'];
$rs =mysqli_fetch_array($result,MYSQLI_NUM);
if($rs[0]==0){
	echo"can't Login Error user or password";
}else{
	echo"OK_PASS";
	
}

mysqli_free_result($result);
mysqli_close($con);
?>