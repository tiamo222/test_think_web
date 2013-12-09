<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/backoffice/system_user_update.php";
include("../app_system/include/inc_checklogin_user.php"); 

$system_id = "system_user";

////////////////////////############## PROCESS UPDATE 

if (empty($_REQUEST["user_id"]) )  {  $user_id="";  } else { $user_id=$_REQUEST["user_id"];  }
if (empty($_REQUEST["category_id"]) )  {  $category_id="";  } else { $category_id=$_REQUEST["category_id"];  }

if (empty($_REQUEST["user_appaction_update"]) )  {  $user_appaction_update="";  } else { $user_appaction_update=$_REQUEST["user_appaction_update"];  }
if (empty( $_REQUEST["show_status"] ) )  {  $show_status = "";  } else { $show_status = $_REQUEST["show_status"]; }


if ($user_appaction_update == "update_information") {
	

///////// check request
if (empty($_REQUEST["user_group_id"]) )  				{  $user_group_id="";  } else { $user_group_id=$_REQUEST["user_group_id"];  }
if (empty($_REQUEST["user_login"]) )  				{  $user_login="";  } else { $user_login=$_REQUEST["user_login"];  }
if (empty($_REQUEST["user_password"]) )  		{  $user_password="";  } else { $user_password=$_REQUEST["user_password"];  }
if (empty($_REQUEST["user_email"]) )  				{  $user_email="";  } else { $user_email=$_REQUEST["user_email"];  }
if (empty($_REQUEST["user_mobile"]) )  			{  $user_mobile="";  } else { $user_mobile=$_REQUEST["user_mobile"];  }

///////// profile
if (empty($_REQUEST["user_firstname"]) )  		{  $user_firstname="";  } else { $user_firstname=$_REQUEST["user_firstname"];  }
if (empty($_REQUEST["user_lastname"]) )  		{  $user_lastname="";  } else { $user_lastname=$_REQUEST["user_lastname"];  }
if (empty($_REQUEST["user_nickname"]) )  		{  $user_nickname="";  } else { $user_nickname=$_REQUEST["user_nickname"];  }
if (empty($_REQUEST["user_displayname"]) )  	{  $user_displayname="";  } else { $user_displayname=$_REQUEST["user_displayname"];  }


if (empty($_REQUEST["option_confirm"]) )  				{  $option_confirm="none";  } else { $option_confirm=$_REQUEST["option_confirm"];  }
if (empty($_REQUEST["option_approve"]) )  				{  $option_approve="none";  } else { $option_approve=$_REQUEST["option_approve"];  }
if (empty($_REQUEST["option_status"]) )  				{  $option_status="off";  } else { $option_status=$_REQUEST["option_status"];  }







$show_status = "success";


if ($user_login == "" ) {
$show_status = "error";
$array_report_error[] = "- กรุณากรอก user Login "; 
}

if ($user_password == "" ) {
$show_status = "error";
$array_report_error[] = "- กรุณากรอก user Password "; 
}


///////// profile
if ($user_firstname == "" ) {
$show_status = "error";
$array_report_error[] = "- กรุณากรอก ชื่อ "; 
}

if ($user_lastname == "" ) {
$show_status = "error";
$array_report_error[] = "- กรุณากรอก นามสกุล  "; 
}

if ($user_displayname == "" ) {
$show_status = "error";
$array_report_error[] = "- กรุณากรอก ชื่อ/นามแฝง ที่แสดงใน Profile "; 
}




///// config
/// list($category_id_root , $category_level  ) = split("#", $category_id_root_select );



if ($show_status == "success" ){ 




/// user_picture
////////////////////////////////////////////////////////////////////////////// upload config 
/// picture
if (empty($_REQUEST["db_user_picture"]) )  		{  $db_category_image = "";  } else { $db_category_image=$_REQUEST["db_category_image"];  }
if (empty($_REQUEST["delete_user_picture"]) ) 	{  $delete_category_image = "none";  } else { $delete_category_image=$_REQUEST["delete_category_image"];  }

$picture_path 				= $path_system_user  ; /// config 
$picture_original 			= $db_user_picture ; /// config 
$picture_option_delete 	= $delete_user_picture ; /// config 
$picture_update 			= $picture_original ;

$picture_fileupload = $_FILES["upload_user_picture"]["tmp_name"]; /// config 
$picture_fileupload_name = $_FILES["upload_user_picture"]["name"]; /// config 
$picture_name_new =  "user-";  ///config

if ($picture_fileupload != "" or  $picture_option_delete =="delete" ) { //// check picture
$input_upload = array(
"picture_path"=>"$picture_path" , 
"picture_original"=>"$picture_original" , 
"picture_option_delete"=>"$picture_option_delete" , 
"picture_fileupload"=>"$picture_fileupload" , 
"picture_fileupload_name"=>"$picture_fileupload_name" , 
"picture_name_new"=>"$picture_name_new" , 
);
$result_fileupload_name = function_picture_upload_mix($input_upload);
$picture_update = $result_fileupload_name ;  //////// config
} /////// check picture

$user_picture = $picture_update ;  //// config
////////////////////////////////////////////////////////////////////////////// upload config  end





$user_email  =  $user_login ; 

$input_array = array(
"user_id"=>"$user_id" , 
"user_group_id"=>"$user_group_id" , 
"user_login"=>"$user_login" , 
"user_password"=>"$user_password" , 

"user_email"=>"$user_email" , 
"user_mobile"=>"$user_mobile" , 

"user_displayname"=>"$user_displayname" , 
"user_firstname"=>"$user_firstname" , 
"user_lastname"=>"$user_lastname" , 
"user_nickname"=>"$user_nickname" , 
"user_picture"=>"$user_picture" , 

"option_confirm"=>"$option_confirm" , 
"option_approve"=>"$option_approve" , 
"option_status"=>"$option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $system_user->function_update( $input_array );
$show_status = $result_update["show_status"];
$user_id = $result_update["user_id"];



} ///if ($process_check_input == "success" ){ 

/// print "show_status = $show_status ";

if ($show_status == "success" ){ 
header("Location:system_user_update.php?user_id=$user_id&show_status=$show_status"); 
} 

} //// if ($appaction == "update_information") {
////////////////////////############## PROCESS UPDATE  END


/*
print "<pre>"; 
print_r ($array_report_error);
print "</pre>"; 
*/


////////////////////////############## PROCESS VIEW 

/// form set

if ($user_id != "" ) { 

$input_array = array(
"user_id"=>"$user_id" , 
);
$rs_myaccount = $system_user->function_viewbyid( $input_array );
if ($rs_myaccount ) {
	
$user_id = $rs_myaccount["user_id"];
$user_group_id = $rs_myaccount["user_group_id"];
$user_login = $rs_myaccount["user_login"];
$user_password = $rs_myaccount["user_password"];
$user_email = $rs_myaccount["user_email"];
$user_mobile = $rs_myaccount["user_mobile"];

$user_displayname = $rs_myaccount["user_displayname"];
$user_firstname = $rs_myaccount["user_firstname"];
$user_lastname = $rs_myaccount["user_lastname"];
$user_nickname = $rs_myaccount["user_nickname"];
$user_picture = $rs_myaccount["user_picture"];

$option_confirm = $rs_myaccount["option_confirm"];
$option_approve = $rs_myaccount["option_approve"];
$option_status = $rs_myaccount["option_status"];

$user_create = $rs_myaccount["user_create"];
$user_update = $rs_myaccount["user_update"];
$user_delete = $rs_myaccount["user_delete"];
$datetime_create = $rs_myaccount["datetime_create"];
$datetime_update = $rs_myaccount["datetime_update"];
$datetime_delete = $rs_myaccount["datetime_delete"];


if ($user_picture != "" ) { 
$show_user_picture = "<img src=\"$path_system_user$user_picture\"  border=0  width=\"200\" ><br>
<input  type=\"checkbox\"   	name=\"delete_user_picture\" 	id=\"delete_user_picture\"   value=\"delete\"  $option_delete_checked    />Delete Picture <br>"; 
} else {
$show_user_picture = "<img src=\"$config_picture_user\" width=\"200\" height=\"250\" /><br><br>"; 
}
$show_user_picture = $show_user_picture . "
<input  type=\"file\"  				name=\"upload_user_picture\" 		id=\"upload_user_picture\"  	size=\"35\"   style=\"width:250px;\" />
<input type=\"hidden\" 			name=\"db_user_picture\"  		id=\"db_user_picture\"  	value=\"$user_picture\" />
";



}///rs
} ///if ($user_id != "" ) { 






////////////////////////############## PROCESS VIEW  END





////////////////////////############## PROCESS CONFIG 
$show_pagetitle = "$show_content_pagename "; 

////////////////////////############## PROCESS CONFIG END



if ($user_id=="") {
$option_approve= "approve";
$option_status= "on";
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>System User Update</title>



<link href="../app_design/css/style_backoffice.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?
include("../app_design/design_top_system.php"); 
?>




<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <tr>
    <td height="550" align="left" valign="top">
    
    
    
    
<?


$page_topic_name = "เพิ่ม/แก้ไข ข้อมูล Administrator  "; 
include("../app_system/include/inc_body_system_topic.php");





?>
    
    
    
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">

          <tr>
            <td height="30" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td >&nbsp;</td>
                <td width="300" align="right"><table border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="1"><a href="system_user_showall.php?category_id=<?=$category_id?>"><img src="../images/icon/design_showall.gif" width="164" height="35" hspace="5" /></a></td>
             

<?
if ($user_id != "" ) { 
?>
<td width="1"><a href="system_user_showall.php?<? print "user_id=$user_id&option_delete=delete&category_id=$category_id" ; ?>"   onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')"  ><img src="../images/icon/design_icon_delete.gif" alt="ลบข้อมูลนี้ ..." width="164" height="35" hspace="5" border="0" /></a>
</td>
<?
} /// if ($content_id != "" ) { 
?>

        <td width="60" align="center" valign="top"><a href="system_user_update.php?category_id=<?=$category_id?>"><img src="../images/icon/design_icon_add.gif" alt="เพิ่ม" width="164" height="35" hspace="5" border="0" /></a></td>

</tr>
                </table></td>
              </tr>
            </table></td>
          </tr>

      </table>
      <table width="100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table>
<?

/////////// status report
include("../app_system/include/inc_report_status.php");


?>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
  <tr>
          <td height="50" align="left" valign="top" bgcolor="#FFFFFF" class="text_bot1"  style="padding:3px; background-color:#FFFFFF">Administrator Account ::
            <table width="100" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="../images/span.gif" width="100" height="5" /></td>
                </tr>
              </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="text_normal1">
              <?
if ($user_id != "" ) { 
?>
              <tr>
                <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px;background-color:#E5E5E5;width:200px;">user ID :</td>
                <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?=$user_id ?>
                  &nbsp;</td>
                </tr>
              <?
} ////if ($user_id != "" ) { 
?>
              <tr>
                <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5;width:200px;">กำหนด กลุ่มดูแลระบบ :</td>
                <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
                



<?

$input_array = array(
"option_status"=>"on" ,
"sql_orderby"=>" order by option_order ASC " ,
);
$count_row = $system_auth_group->function_countbyset( $input_array );
if ($count_row > 0 ) {  //// count
$level1_result = $system_auth_group->function_viewbyset( $input_array ); /// select ข้อมูล


print "
<select name=\"user_group_id\" id=\"user_group_id\">
<option  value=\"none\" selected>กรุณาเลือกเพื่อกำหนดสิทธิ ...</option>
";

$count_loop = 0 ;
while($level1_rs = $level1_result->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;


///////////////// set value
$level1_group_id = $level1_rs["group_id"];
$level1_group_code = $level1_rs["group_code"];
$level1_group_name = $level1_rs["group_name"];

 if ($user_group_id == $level1_group_id ) { $option_selected = "selected";  }  else { $option_selected = "";  } 
 
print "<option value=\"$level1_group_id\"  $option_selected >- $level1_group_name</option>";

} //// loop

print "</select>";

}  //// count

?>
                
                
                
                </td>
              </tr>
              <tr>
                <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5;width:200px;"> Login <font color="#FF0000">*</font> :</td>
                <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="user_login" type="text" id="user_login" value="<?=$user_login ?>" size="80"  style="width:350px;" />
                  (อีเมล์)</td>
                </tr>
              <tr>
                <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">Password <font color="#FF0000">*</font> :</td>
                <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="user_password" type="password" id="user_password" value="<?=$user_password ?>" size="80"  style="width:350px;" /></td>
                </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">สถานะ :</td>
                <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?


if ($option_confirm == "confirm" ) {  $option_confirm_checked = "checked"; } else  {  $option_confirm_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_confirm\" id=\"option_confirm\" value=\"confirm\"  $option_confirm_checked    />สถานะการยืนยันตัวตนของสมาชิก (user Confirm)<br>"; 


if ($option_approve == "approve" ) {  $option_approve_checked = "checked"; } else  {  $option_approve_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_approve\" id=\"option_approve\" value=\"approve\"  $option_approve_checked    />ยืนยันการอนุมัติ โดย Admin (Approve)<br>"; 


if ($option_status == "on" ) {  $option_status_checked = "checked"; } else  {  $option_status_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_status\" id=\"option_status\" value=\"on\"  $option_status_checked    />ออนไลน์ข้อมูล (Online)<br>"; 

?></td>
              </tr>
              </table>
            <br />
            Administrator Profile ::
            <table width="100" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="../images/span.gif" width="100" height="5" /></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="text_normal1">
              <tr>
                <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5; width:200px;">ชื่อ <font color="#FF0000">*</font> :</td>
                <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="user_firstname" type="text" id="user_firstname" value="<?=$user_firstname ?>" size="80"  style="width:350px;" /></td>
              </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">นามสกุล <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="user_lastname" type="text" id="user_lastname" value="<?=$user_lastname ?>" size="80"  style="width:350px;" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ชื่อเล่น  :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="user_nickname" type="text" id="user_nickname" value="<?=$user_nickname?>" size="80"  style="width:350px;" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ชื่อ/นามแฝง ที่แสดงใน Profile <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="user_displayname" type="text" id="user_displayname" value="<?=$user_displayname ?>" size="80"  style="width:350px;" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">Mobile :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="user_mobile" type="text" id="user_mobile" value="<?=$user_mobile ?>" size="80"  style="width:350px;" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">&nbsp;</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input type="submit" name="button" id="button" value="บันทึกข้อมูล" />
                <input type="reset" name="button3" id="button3" value="Reset ..." /></td>
            </tr>
          </table></td>
          <td width="300" align="left" valign="top" bgcolor="#FFFFFF" class="text_bot1"  style="padding:3px; background-color:#E5E5E5">Administrator Picture ::
            <table width="100" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="../images/span.gif" width="100" height="5" /></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="1"  class="text_normal1">
              <tr>
                <td align="left" valign="middle"  style="padding:5px;"><?

print 	$show_user_picture ; 
///print "<input  type=\"file\"  				name=\"upload_user_picture\" 		id=\"upload_user_picture\"  	size=\"35\"   style=\"width:250px;\" />";
///print "<input type=\"hidden\" 			name=\"db_user_picture\"  		id=\"db_user_picture\"  	value=\"$user_picture\" />   ";

?>
                  &nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="top"  style="padding:5px;"><input type="submit" name="button2" id="button2" value="บันทึกข้อมูล" /></td>
              </tr>
            </table>
            <table width="100" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="../images/span.gif" width="100" height="10" /></td>
                </tr>
              </table></td>
        </tr>
      </table>
      <table width="100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table></td>
  </tr>
  
  <input  type="hidden" name="user_appaction_update"  id="user_appaction_update" value="update_information" />
<input type="hidden" name="user_id"  id="user_id" value="<?=$user_id?>" />
<input type="hidden" name="profile_id"  id="profile_id" value="<?=$profile_id?>" />
</form>
</table>


<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>