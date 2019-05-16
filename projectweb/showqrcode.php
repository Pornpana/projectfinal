<?PHP
$user = @$_POST['user'];
$password = @$_POST['password'];
$fistname =@$_POST['fistname'];
$lastname = @$_POST['lastname'];
$localtion = @$_POST['localtion'];
/*
$user = "EN10";
$password = "1234";
*/
if($user ==''){
	echo "no user";
	exit();
}


$con = mysqli_connect("localhost","root","1234","project");
$sql = "select * from test where user = '$user' ";
$result = mysqli_query($con,$sql)or die(mysqli_error()."<hr/>Line: ".___line___."<br/>$sql");

$rs = mysqli_fetch_array($result,MYSQLI_NUM);
if($rs[0]==0){
	echo"can't user ";
}else{
	echo "OK" ;
	
?>
	<img src="https://chart.googleapis.com/chart?cht=qr&chs=100x100&chl=<?php echo $user;?>" alt="">
<?PHP
}

mysqli_free_result($result);
mysqli_close($con);
?>