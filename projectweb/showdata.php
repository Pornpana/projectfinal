<html>
<head>
<meta charset="UTF-8">
<title>project</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="MM_preloadImages('images/project1_02.gif','images/project1_03.gif','images/project1_04.gif')">
<table width="1280" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><img src="images/project_01.gif" width="1280" height="233"></td>
  </tr>
  <tr>
    <td width="429" align="left" valign="top"><a href="project.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/project1_02.gif',1)"><img src="images/project_02.gif" width="430" height="67" id="Image3"></a></td>
    <td width="449" align="left" valign="top"><a href="showdata.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','images/project1_03.gif',1)"><img src="images/project_03.gif" width="448" height="67" id="Image4"></a></td>
    <td width="401" align="left" valign="top"><a href="report.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image5','','images/project1_04.gif',1)"><img src="images/project_04.gif" width="402" height="67" id="Image5"></a></td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="top" bgcolor="#47F4FF"><br><br><?php
         
header("Content-type:text/html; charset=UTF8");
$connect =mysql_connect("103.13.231.13","carpark","utcc_cpe");
mysql_select_db("carpark");     
mysql_query("set character set utf8"); 
$i = 1;  
?>
 <table class="table table-bordered" border="1">
    <tr class="active">
        <th width="100" height="50">Number</th>
        <th width="500" height="50" >Data</th>
        <th width="100" height="50" align="center">QRcode</th>
    </tr>
    <?php 
            $query ="SELECT * FROM carpark  ";
            $result=mysql_query($query);
     while($data=mysql_fetch_assoc($result)){
		 $id_num =$data['id_num'];
      $user = $data['user'];
	  $password = $data['password'];
      $fistname =$data['fistname'];
      $lastname = $data['lastname'];
	  $status = $data['status'];
	  
	  
    ?>
      <tr>
        <td align="center">
          <?php   
                  echo   $i++
                   // echo $switch;
          ?>
          </td>
          <td>   Userid :: <?php echo $switch=$data['user']; ?> <br>
			   Fistname :: <?php echo   $switch=$data['fistname']; ?> <br>
               Lastname :: <?php echo   $switch=$data['lastname']; ?> <br>
      			status :: <?php echo  $switch=$data['status'];?><br>
				  <?php $alltext = $user.$fistname.$lastname.$status;
                  //echo $switch;
				  
          ?>
          </td>
          <td align="center">
          		<img src="https://chart.googleapis.com/chart?cht=qr&chs=100x100&chl=<?php echo $alltext;?>" alt="">
              
          </td>
      </tr>
    <?php
      }
    ?>
  </table> </td>
  </tr>
  <tr>
    <td colspan="3" align="left"><img src="images/project_09.gif" width="1280" height="48"></td>
  </tr>
</table>
</body>
</html>