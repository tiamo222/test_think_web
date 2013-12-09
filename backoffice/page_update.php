<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/backoffice/page_update.php";
include("../app_system/include/inc_checklogin_user.php"); 

include("../category/inc_array_category.php"); 



////////////////////////############## PROCESS UPDATE 
if (empty($_REQUEST["page_id"]) )  {  $page_id="";  } else { $page_id=$_REQUEST["page_id"];  }
if (empty($_REQUEST["page_appaction_update"]) )  {  $page_appaction_update="";  } else { $page_appaction_update=$_REQUEST["page_appaction_update"];  }
if (empty( $_REQUEST["show_status"] ) )  {  $show_status = "";  } else { $show_status = $_REQUEST["show_status"]; }



if ($page_appaction_update == "update_information") {
	

///////// check request
if (empty($_REQUEST["category_id_root"]) ) 	{  $category_id_root="";  } else { $category_id_root=$_REQUEST["category_id_root"];  }
if (empty($_REQUEST["page_url"]) )  				{  $page_url="";  } else { $page_url=$_REQUEST["page_url"];  }
if (empty($_REQUEST["page_name"]) )  			{  $page_name="";  } else { $page_name=$_REQUEST["page_name"];  }
if (empty($_REQUEST["page_des"]) )  				{  $page_des="";  } else { $page_des=$_REQUEST["page_des"];  }


if (empty($_REQUEST["option_show"]) )  			{  $option_show="";  } else { $option_show=$_REQUEST["option_show"];  }
if (empty($_REQUEST["option_order"]) )  		{  $option_order="";  } else { $option_order=$_REQUEST["option_order"];  }
if (empty($_REQUEST["option_status"]) )  		{  $option_status="";  } else { $option_status=$_REQUEST["option_status"];  }


///////// check input

$show_status = "success";


if ($page_name == "" ) {
$show_status = "error";
$array_report_error[] = "- กรุณากรอกชื่อ Page Name "; 
}

/// print "show_status = $show_status <br>";



///// config
list($category_id , $page_level  ) = split("#", $category_id_root );



if ($show_status == "success" ){ 

if ($option_status == "" ) { $option_status = "off"; }

$input_array = array(
"page_id"=>"$page_id" , 
"category_id"=>"$category_id" , 
"page_level"=>"$page_level" , 

"page_name"=>"$page_name" , 
"page_url"=>"$page_url" , 
"page_des"=>"$page_des" , 

"option_show"=>"$option_show" , 
"option_order"=>"$option_order" , 
"option_status"=>"$option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $system_auth_page->function_update( $input_array );
$show_status = $result_update["show_status"];
$page_id = $result_update["page_id"];

} ///if ($process_check_input == "success" ){ 

/// print "show_status = $show_status ";

if ($show_status == "success" ){ 
header("Location:page_update.php?page_id=$page_id&show_status=$show_status"); 
} 

} //// if ($appaction == "update_information") {
////////////////////////############## PROCESS UPDATE  END



////////////////////////############## PROCESS VIEW 
if ($page_id != "" ){ 

$input_array = array(
"page_id"=>"$page_id" , 
);
$rs_page = $system_auth_page->function_viewbyid( $input_array );
if ($rs_page ) {
$page_id = $rs_page["page_id"];
$category_id = $rs_page["category_id"];
$page_level = $rs_page["page_level"];

$page_name = $rs_page["page_name"];
$page_url = $rs_page["page_url"];
$page_des = $rs_page["page_des"];

$option_show  = $rs_page["option_show"];
$option_order = $rs_page["option_order"];
$option_status = $rs_page["option_status"];

$option_order = $option_order * 1 ; 


}///rs
} ///if ($id != "" ) { 


////////////////////////############## PROCESS VIEW  END





////////////////////////############## PROCESS CONFIG 
$show_pagetitle = "$show_content_pagename "; 

////////////////////////############## PROCESS CONFIG END



if ($page_id=="") {
$option_status= "on";
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Insert / Update  </title>



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


$page_topic_name = "เพิ่ม/แก้ไข ข้อมูลโครงสร้างระบบ   "; 
include("../app_system/include/inc_body_system_topic.php");





?>
    
    
    
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">

          <tr>
            <td height="30" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td >&nbsp;</td>
                <td width="300" align="right"><table border="0" cellpadding="0" cellspacing="5">
                  <tr>
                    <td width="60" align="center" valign="top"><a href="page_showall.php?system_id=<?=$system_id?>"><img src="../images/icon/icon_all.gif" width="164" height="35" hspace="0" /></a></td>
                 
                    
                    
<?
if ($page_id != ""  and  $option_fixed != "fixed" ) { 
?>
<td width="60" align="center" valign="top">
 <a href="page_showall.php?<? print "page_id=$page_id&option_delete=delete&system_id=$system_id" ; ?>"   onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')"  >
 <img src="../images/icon/design_icon_delete.gif" alt="ลบข้อมูลนี้ ..." width="164" height="35" hspace="0" border="0" />
 </a>
 </td>
<?
} /////////category_id
?>
   <td width="60" align="center" valign="top"><a href="page_update.php?system_id=<?=$system_id?>"><img src="../images/icon/design_icon_add.gif" alt="เพิ่ม" width="164" height="35" hspace="0" border="0" /></a></td>
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
              <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">เป็นเมนูย่อยของ <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
                
                
                
                
                
  <?




///print "category_count_row = $category_count_row <br>";

print "<select name=\"category_id_root\" id=\"category_id_root\" class=\"text_normal1\" style=\"width:350px;\">";
print "<option value=\"root#1\" selected >เป็นหมวดหมู่หลัก</option>";



///////////////////////////// level 1 
$input_array = array(
"category_id"=>"root" , 
"page_level"=>"1" , 
"sql_other"=>" and  page_id<>'$page_id' " , 
"sql_orderby"=>" ORDER BY option_order  ASC " ,
);
$category_count_row = $system_auth_page->function_countbyset( $input_array );



if ($category_count_row > 0 ){  //// count row
$category_rs = $system_auth_page->function_viewbyset( $input_array ); /// select ข้อมูล

$level1_loop = 0 ; 
while($rs = $category_rs->FetchRow()){ /////// loop 
$level1_loop = $level1_loop + 1; 

$level1_page_id = $rs["page_id"];
$level1_page_name = $rs["page_name"];

if ($level1_page_id == $category_id ) { $option_selected = "selected";  } else { $option_selected = ""; }

print "<option value=\"$level1_page_id#2\"   $option_selected >$level1_loop. อยู่ภายใต้ : $level1_page_name</option>";



///////////////////////////// level 2
$input_array = array(
"category_id"=>"$level1_page_id" , 
"page_level"=>"2" , 
"sql_other"=>" and  page_id<>'$page_id' " , 
"sql_orderby"=>" ORDER BY option_order  ASC " ,
);
$category_count_row2 = $system_auth_page->function_countbyset( $input_array );
if ($category_count_row2 > 0 ){  //// count row
$category_rs2 = $system_auth_page->function_viewbyset( $input_array ); /// select ข้อมูล

$level2_loop = 0 ; 
while($rs2 = $category_rs2->FetchRow()){ /////// loop 
$level2_loop = $level2_loop + 1; 

$loop2_page_id = $rs2["page_id"];
$loop2_page_name = $rs2["page_name"];

if ($loop2_page_id == $category_id ) { $option_selected = "selected";  } else { $option_selected = ""; }
print "<option value=\"$loop2_page_id#3\"  $option_selected >&nbsp;- $level1_loop.$level2_loop อยู่ภายใต้ : $loop2_page_name</option>";


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
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ลำดับ :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="option_order" type="text" id="option_order" value="<?=$option_order ?>" size="10" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle"  style="padding:5px; background-color:#E5E5E5">Page Name <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="page_name" type="text" id="page_name" value="<?=$page_name  ?>" size="80"  style="width:700px;" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle"  style="padding:5px; background-color:#E5E5E5">Page URL :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="page_url" type="text" id="page_url" value="<?=$page_url  ?>" size="80"  style="width:700px;" /></td>
              </tr>
            <tr>
              <td height="50" align="right" valign="top"  style="padding:5px; background-color:#E5E5E5">รายละเอียด :</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"page_des\" cols=\"80\" rows=\"5\" id=\"page_des\"  style=\"width:700px;\">$page_des</textarea>"; 

?></td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">สถานะ :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
  <?

if ( $option_show == "index" ) {  $option_checked = "checked"; } else  {  $option_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_show\" id=\"option_show\" value=\"index\"  $option_checked    />แสดงรายการที่หน้า Backoffice Index<br>"; 


if ($option_status == "on" ) {  $option_checked = "checked"; } else  {  $option_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_status\" id=\"option_status\" value=\"on\"  $option_checked    />ออนไลน์ข้อมูล"; 

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
  </tr>
  
  
  <input  type="hidden" name="page_appaction_update"  id="page_appaction_update" value="update_information" />
<input type="hidden" name="page_id"  id="page_id" value="<?=$page_id?>" />


</form>
</table>



<?
include("../app_design/design_bottom_system.php");
?>

</body>
</html>