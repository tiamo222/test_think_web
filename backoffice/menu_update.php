<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/backoffice/menu_update.php";
include("../app_system/include/inc_checklogin_user.php"); 

///include("../category/inc_array_category.php"); 



////////////////////////############## PROCESS UPDATE 

if (empty($_REQUEST["appaction_menu_update"]) )  {  $appaction_menu_update="";  } else { $appaction_menu_update=$_REQUEST["appaction_menu_update"];  }
if (empty( $_REQUEST["show_status"] ) )  {  $show_status = "";  } else { $show_status = $_REQUEST["show_status"]; }

if (empty($_REQUEST["menu_id"]) )  			{  $menu_id="";  } else { $menu_id=$_REQUEST["menu_id"];  }
if (empty( $_REQUEST["language_id"] ) )  	{  $language_id="";   } else { $language_id = $_REQUEST["language_id"]; }
if (empty($_REQUEST["menu_set"]) )			{  $menu_set="";  } else { $menu_set=$_REQUEST["menu_set"];  }





if ($appaction_menu_update == "update_information") {

///////// check request
if (empty($_REQUEST["menu_id_root"]) )		{  $menu_id_root="";  } else { $menu_id_root=$_REQUEST["menu_id_root"];  }
if (empty($_REQUEST["menu_url"]) )			{  $menu_url="";  } else { $menu_url=$_REQUEST["menu_url"];  }
if (empty($_REQUEST["menu_name"]) )			{  $menu_name="";  } else { $menu_name=$_REQUEST["menu_name"];  }
if (empty($_REQUEST["option_target"]) )		{  $option_target="";  } else { $option_target=$_REQUEST["option_target"];  }
if (empty($_REQUEST["option_order"]) )		{  $option_order="";  } else { $option_order=$_REQUEST["option_order"];  }
if (empty($_REQUEST["option_status"]) )		{  $option_status="";  } else { $option_status=$_REQUEST["option_status"];  }


///////// check input
/// system_id
/// category_id_root
/// category_name


$show_status = "success";

if ($language_id == "" ) {
$show_status = "error";
$array_report_error[] = "- กรุณาเลือก language_id "; 
}

if ($menu_set == "" ) {
$show_status = "error";
$array_report_error[] = "- กรุณาเลือก menu_set "; 
}


if ($menu_name == "" ) {
$show_status = "error";
$array_report_error[] = "- กรุณากรอกชื่อ menu_name "; 
}

/// print "show_status = $show_status <br>";




if ($show_status == "success" ){ 


$input_array = array(
"language_id"=>"$language_id" , 
"menu_set"=>"$menu_set" , 

"menu_id"=>"$menu_id" , 
"menu_id_root"=>"$menu_id_root" , 
"menu_name"=>"$menu_name" , 
"menu_url"=>"$menu_url" , 

"option_target"=>"$option_target" , 
"option_order"=>"$option_order" , 
"option_status"=>"$option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $system_appmenu->function_update( $input_array );
$show_status = $result_update["show_status"];
$menu_id = $result_update["menu_id"];

} ///if ($process_check_input == "success" ){ 
/// print "show_status = $show_status ";

if ($show_status == "success" ){ 
header("Location:menu_update.php?menu_id=$menu_id&show_status=$show_status"); 
} 

} //// if ($appaction == "update_information") {
////////////////////////############## PROCESS UPDATE  END







if ($option_delete == "delete" and $menu_id != "" ){ 

$input_array = array(
"menu_id"=>"$menu_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $system_appmenu->function_delete( $input_array );
$show_status = $result_update["show_status"];

header("Location:menu_showall.php?language_id=$language_id&show_status=$show_status"); 

} //// if ($option_delete == "delete" ){ 
////////////////////////############## PROCESS UPDATE  END












/*
print "<pre>"; 
print_r ($array_report_error);
print "</pre>"; 
*/


////////////////////////############## PROCESS VIEW 

/// form set

if ($menu_id != "" ) { 

$input_array = array(
"menu_id"=>"$menu_id" , 
);
$rs_menu = $system_appmenu->function_viewbyid( $input_array );
if ($rs_menu ) {

$language_id = $rs_menu["language_id"];
$menu_set = $rs_menu["menu_set"];

$menu_id = $rs_menu["menu_id"];
$menu_id_root = $rs_menu["menu_id_root"];
$menu_name = $rs_menu["menu_name"];
$menu_url = $rs_menu["menu_url"];

$option_target = $rs_menu["option_target"];
$option_order = $rs_menu["option_order"];
$option_status = $rs_menu["option_status"];
	
}///rs_menu
} ///if ($menu_id != "" ) { 




////////////////////////############## PROCESS VIEW  END



$option_order = $option_order * 1 ; 
if ($language_id == "" ){ $language_id = "thai"; }
if ($menu_id == "" ){ $option_status = "on"; }



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert / Update Menu </title>



<link href="../app_design/css/style_backoffice.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>


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


$page_topic_name = "เพิ่ม/แก้ไข ข้อมูลเมนูเว็บไซต์  "; 
include("../app_system/include/inc_body_system_topic.php");





?>
    
    
    
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">

          <tr>
            <td height="30" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td >&nbsp;</td>
                <td width="300" align="right"><table border="0" cellpadding="0" cellspacing="5">
                  <tr>
                    <td width="60" align="center" valign="top"><a href="menu_showall.php?language_id=<?=$language_id?>"><img src="../images/icon/icon_all.gif" width="164" height="35" hspace="0" /></a></td>
                 
                    
                    
<?
if ($menu_id != ""  ) { 
?>
<td width="60" align="center" valign="top">
 <a href="menu_update.php?<? print "menu_id=$menu_id&option_delete=delete&language_id=$language_id" ; ?>"   onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')"  >
 <img src="../images/icon/design_icon_delete.gif" alt="ลบข้อมูลนี้ ..." width="164" height="35" hspace="0" border="0" />
 </a>
 </td>
<?
} /////////category_id
?>
   <td width="60" align="center" valign="top"><a href="menu_update.php?<? print "language_id=$language_id&menu_set=$menu_set"; ?>"><img src="../images/icon/design_icon_add.gif" alt="เพิ่ม" width="164" height="35" hspace="0" border="0" /></a></td>
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
          <td height="50" align="left" valign="top" bgcolor="#FFFFFF"  style="padding:3px; background-color:#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="text_normal1">
            <tr>
              <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">MENU LEVEL <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
                
                
                
                
                
<?

print "<select name=\"menu_id_root\" id=\"menu_id_root\" class=\"text_normal1\" style=\"width:350px;\">";
print "<option value=\"root\" selected >เป็นเมนูหลัก</option>";


///////////////////////////// level 1 
$input_array = array(
"sql_other"=>" 
and  menu_set='$menu_set' 
and  language_id='$language_id' 
and  menu_id_root='root' 
and	 menu_id_root<>'$menu_id'
and	 menu_id<>'$menu_id'
" , 
"sql_orderby"=>" ORDER BY option_order  ASC " ,
);
$menu_count_row = $system_appmenu->function_countbyset( $input_array );
if ($menu_count_row > 0 ){  //// count row
$menu_rs = $system_appmenu->function_viewbyset( $input_array ); /// select ข้อมูล

$level1_loop = 0 ; 
while($rs = $menu_rs->FetchRow()){ /////// loop 
$level1_loop = $level1_loop + 1; 
$loop_menu_id = $rs["menu_id"];
$loop_menu_name = $rs["menu_name"];


if ($loop_menu_id == $menu_id_root ) { $option_selected = "selected";  } else { $option_selected = ""; }

print "<option value=\"$loop_menu_id\"   $option_selected >$level1_loop. เป็นเมนูย่อยของ : $loop_menu_name</option>";


///////////////////////////// level 2
$input_array2 = array(
"sql_other"=>" 
and  menu_set='$menu_set' 
and  language_id='$language_id' 
and  menu_id_root='$loop_menu_id' 
and	 menu_id_root<>'$menu_id'
and	 menu_id<>'$menu_id'
" , 
"sql_orderby"=>" ORDER BY option_order  ASC " ,
);
$menu_count_row2 = $system_appmenu->function_countbyset( $input_array2 );
if ($menu_count_row2 > 0 ){  //// count row
$menu_rs2 = $system_appmenu->function_viewbyset( $input_array2 ); /// select ข้อมูล
$level2_loop = 0 ; 
while($rs2 = $menu_rs2->FetchRow()){ /////// loop 
$level2_loop = $level2_loop + 1; 
$loop2_menu_id = $rs2["menu_id"];
$loop2_menu_name = $rs2["menu_name"];

if ($loop2_menu_id == $menu_id_root ) { $option_selected = "selected";  } else { $option_selected = ""; }
print "<option value=\"$loop2_menu_id\"  $option_selected >$level1_loop.$level2_loop เป็นเมนูย่อยของ : $loop2_menu_name</option>";


} //// loop
} //// count row
///////////////////////////// level 2 end


} //// loop
} //// count row
///////////////////////////// level 1 end

print "</select>"; 



?>
                
                
  </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">RANK/ORDER :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="option_order" type="text" id="option_order" value="<?=$option_order ?>" size="10" /></td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">MENU NAME <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="menu_name" type="text" id="menu_name" value="<?=$menu_name ?>" size="70" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">MENU URL <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="menu_url" type="text" id="menu_url" value="<?=$menu_url ?>" size="70" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">option_target :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">สถานะ :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
                <?

if ($option_status == "on" ) {  $option_status_checked = "checked"; } else  {  $option_status_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_status\" id=\"option_status\" value=\"on\"  $option_status_checked    />ออนไลน์ข้อมูล"; 

?>
                </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">&nbsp;</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input type="image" name="imageField" id="imageField" src="../images/icon/design_icon_save.gif" /></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table>
      </td>
  </tr><input  type="hidden" name="appaction_menu_update"  id="appaction_menu_update" value="update_information" />
<input type="hidden" 	name="menu_id"  		id="menu_id" 		value="<?=$menu_id?>" />
<input type="hidden" 	name="language_id"  	id="language_id" 	value="<?=$language_id?>" />
<input type="hidden" 	name="menu_set"  		id="menu_set" 		value="<?=$menu_set?>" />


</form>
</table>



<?
include("../app_design/design_bottom_system.php");
?>

</body>
</html>