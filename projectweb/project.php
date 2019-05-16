<html>
<head>
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
    <td colspan="3" align="left" valign="top" bgcolor="#47F4FF"><?php require_once('connect.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO carpark (user,password, fistname, lastname,status) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['user'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['fistname'], "text"),
                       GetSQLValueString($_POST['lastname'], "text"),
					   GetSQLValueString($_POST['status'], "text"));

  mysql_select_db($database_connect, $connect);
  $Result1 = mysql_query($insertSQL, $connect) or die(mysql_error());
}
?><?php header("Content-type:text/html; charset=UTF-8"); ?>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">

<br>
<br>
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">User:</td>
      <td><input type="text" name="user" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Password:</td>
      <td><input type="password" name="password" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fistname:</td>
      <td><input type="text" name="fistname" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Lastname:</td>
      <td><input type="text" name="lastname" value="" size="32" /></td>
    </tr>
    
    <tr valign="baseline">
      <td align="center" valign="baseline" nowrap="nowrap">Status</td>
      <td valign="top"><label for="select" name="status" value="" size="32" ></label>
        <select name="status" id="status">
          <option valuse="student">student</option>
    <option valuse="professor">professor</option>
    <option valuse="officer">officer</option>
	
    </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="center">&nbsp;</td>
      <td align="center"><input type="submit"  value="Add" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form></td>
  </tr>
  <tr>
    <td colspan="3" align="left"><img src="images/project_09.gif" width="1280" height="48"></td>
  </tr>
</table>
</body>
</html>