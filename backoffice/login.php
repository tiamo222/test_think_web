<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 


$system_id = "app_login";



////////////////////////############## PROCESS UPDATE 
if (empty($_REQUEST["appaction"]) )  		{  $appaction = "";  } else { $appaction = $_REQUEST["appaction"];  }
if (empty($_REQUEST["username"]) )  	{  $username = "";  } else { $username = $_REQUEST["username"];  }
if (empty($_REQUEST["password"]) ) 		{  $password = "";  } else { $password = $_REQUEST["password"];  }

if (empty($_REQUEST["report"]) )  {  $report="";  } else { $report=$_REQUEST["report"];  }
if (empty($_REQUEST["id"]) )  {  $id="";  } else { $id=$_REQUEST["id"];  }

$user_username = $username ; 
$user_password	= $password ; 

if ($appaction == "systemlogin" ) { 


if ($user_username=="" or  $user_password=="") { //// input
header("Location:login.php?report=tryagain"); 
exit();  
}  else { //// input





$input_array = array(
"user_login"=>"$user_username" , 
"user_password"=>"$user_password" , 
"datetime_now"=>"$datetime_now" , 
);
$result_count_user = $system_user->function_countbyset( $input_array );






if ( $result_count_user == 0) { ////// count user
header("Location:login.php?report=tryagain"); 
///// echo "<center><br><br><br><br><h3> ERROR : Username or  Password incorrect ....</h3></center>";
} else {
	
	
$input_array = array(
"user_login"=>"$user_username" , 
"user_password"=>"$user_password" , 
);
$result_rs = $system_user->function_viewbyid( $input_array );
if ($result_rs){
$user_id = $result_rs["user_id"];
$user_login = $result_rs["user_login"];
$user_password = $result_rs["user_password"];
$user_displayname = $result_rs["user_displayname"];
$user_picture = $result_rs["user_picture"];

$option_confirm = $result_rs["option_confirm"];
$option_approve = $result_rs["option_approve"];
$option_status = $result_rs["option_status"];
}///// result_rs


if ($option_confirm != "confirm" ) 	{ $report = "not_confirm"; }
if ($option_approve != "approve" ) 	{ $report = "not_approve"; }
if ($option_status != "on" ) 				{ $report = "not_status_on"; }


if ($option_confirm == "confirm"  and  $option_approve == "approve"  and  $option_status == "on" ) { //// check status
$_SESSION["ss_user_sessionid"] = session_id() ;
$_SESSION["ss_user_id"] = $user_id ;
$_SESSION["ss_user_login"] = $user_login ;
$_SESSION["ss_user_password"] = $user_password ;
$_SESSION["ss_user_checked"] = "success";
header("Location:../backoffice/backoffice_main.php?report=welcome"); 
} else {
$report = "not_approve";
}

} ////  ////// count user
} //// check input
} ////// if ($appaction=="systemlogin") { 








$text_show_status_login = "" ;

if ($report=="tryagain") {
$text_status_login = "<font color=#333333>Username or  Password incorrect  , please try again ....</font>" ;
} 

if ($report=="pleaselogin") {
$text_status_login = "<font color=#333333>Please login again ....</font>" ;
} 

if ($report=="not_approve") {
$text_status_login = "<font color=#333333>ยังไม่อนุญาติให้เข้าใช้งานระบบ ....</font>" ;
} 

if ($report=="logout") {
$report = ""; 
} 








////////////////////////############## PROCESS CONFIG 


$show_content_pagename = "หน้าหลักระบบจัดการ"; 
$show_content_header = ""; 
$show_content_center = ""; 




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>System ::</title>
<style type="text/css">
<!--
.style2 {	font-weight: bold
}
-->
</style>
</head>


<link href="../app_design/css/style_web.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>


<body  style="background-color:#CCCCCC;">




<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7"><form id="form1" name="form1" method="post" action="">
  <tr>
    <td height="550" align="left" valign="middle" bgcolor="#CCCCCC"><table width="550" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#999999">
      <tr>
      <td  bgcolor="#003399"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="1" align="left"><img src="../images/icon/Key_16x16.png" width="16" height="16" hspace="4" vspace="0" /></td>
          <td align="left" valign="middle" class="bot1"><b><a href="#"><font color="#FFFFFF">เข้าใช้งานระบบ </font></a></b></td>
          </tr>
        </table></td>
      </tr>
    <tr>
      <td align="left" valign="top" bgcolor="#FFFFFF" class="text1">
	  
<?


if ($appaction == "" and  $report =="" ) { 
?>
        <table width="100%" border="0" cellspacing="2" cellpadding="10">
          <tr>
            <td bgcolor="#E1E1E1" class="bot1"><font color="#333333">กรุณา Login เพื่อเข้าใช้งานระบบ</font></td>
            </tr>
          </table>
        <?
} //// 


if ($report != "") { 
?>
        <table width="100%" border="0" cellspacing="2" cellpadding="10">
          <tr>
            <td bgcolor="#D3BEE9" class="bot1"><font color="#000000"><?=$text_status_login ?></font></td>
            </tr>
          </table>
<?
} //// 
?>



        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="100" align="left" valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#FFFFFF">
              <tr class="bot1">
                <td align="right"><span class="style2">username 
                  : </span></td>
                <td width="90%" align="left"><input name="username" type="text" id="username" size="40" /></td>
              </tr>
              <tr class="bot1">
                <td align="right"><span class="style2">password 
                  : </span></td>
                <td align="left"><input name="password" type="password" id="password" size="40" /></td>
                </tr>
              <tr class="bot1">
                <td width="100"><img src="../images/span.gif" width="100" height="10" /></td>
                <td align="left"><input type="submit" name="Submit3" value="Login ..." class="bot1" />
                  <input type="reset" name="Reset" id="button" value="Reset" />
                  <input name="appaction" type="hidden" id="appaction" value="systemlogin" />
                  <input name="page_where" type="hidden" id="page_where" value="<?=$page_where ?>" /></td>
                </tr>
              </table></td>
            </tr>
          </table>
        <br />
        
<center>
<font color="#FF0000"><b>กรุณาใช้ระบบจัดการเว็บไซต์ด้วย FireFox 3.0 ขึ้นไป</b></font>
</center>
        
        
        <br /></td>
      </tr>
  </table></td>
    </tr>
  


</form>
</table>





</body>
</html>



