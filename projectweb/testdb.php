<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
         
header("Content-type:text/html; charset=UTF8");
$connect =mysql_connect("localhost","root","1234");
mysql_select_db("project");     
mysql_query("set character set utf8");   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="file:///C|/xampp/htdocs/phpqrcode/bootstrap/css/bootstrap.css">
</head>
<body>
  <br>
  <div style="margin:auto;width:80%;">
  <table class="table table-bordered" border="1">
    <tr class="active">
        <th width="100" height="50">Number</th>
        <th width="500" height="50" >Data</th>
        <th width="100" height="50">QRcode</th>
    </tr>
    <?php 
            $query ="SELECT * FROM test  ";
            $result=mysql_query($query);
     while($data=mysql_fetch_assoc($result)){
		 $id_num =$data['id_num'];
      $user = $data['user'];
	  $password = $data['password'];
      $fistname =$data['fistname'];
      $lastname = $data['lastname'];
	  $localtion = $data['localtion'];
    ?>
      <tr>
        <td align="center">
          <?php   
                  echo   $id_num =$data['id_num'];
                   // echo $switch;
          ?>
          </td>
          <td>   Userid :: <?php echo $switch=$data['user']; ?> <br>
			   Fistname :: <?php echo   $switch=$data['fistname']; ?> <br>
               Lastname :: <?php echo   $switch=$data['lastname']; ?> <br>
               Localtion :: <?php echo   $switch=$data['localtion']; ?> <br>
				  <?php $alltext ="หมายเลขที่ :: ".$id_num." User :: ".$user." Password  ".$password." fistname ".$lastname." lastname ".$localtion." localtion ";
                  //echo $switch;
				  
          ?>
          </td>
          <td>
          		<img src="https://chart.googleapis.com/chart?cht=qr&chs=100x100&chl=<?php echo $alltext;?>" alt="">
              
          </td>
      </tr>
    <?php
      }
    ?>
  </table> 
  </div>
</body>
</html>
</body>
</html>