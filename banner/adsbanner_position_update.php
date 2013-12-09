<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/banner/adsbanner_position_showall.php";
include("../app_system/include/inc_checklogin_user.php"); 

$system_id = "app_ads_banner";

////////////////////////############## PROCESS UPDATE 
if (empty($_REQUEST["appaction"]) ) 			{  $appaction="";  } else { $appaction=$_REQUEST["appaction"];  }
if (empty($_REQUEST["position_id"]) )  		{  $position_id="";  } else { $position_id=$_REQUEST["position_id"];  }
if (empty($_REQUEST["section_id"]) ) 			{  $section_id="";  } else { $section_id=$_REQUEST["section_id"];  }
if (empty($_REQUEST["category_id"]) ) 		{  $category_id="";  } else { $category_id=$_REQUEST["category_id"];  }


if ($appaction == "update_information") {
	


///////// check request

if (empty($_REQUEST["page_id"]) )  				{  $page_id="";  } else { $page_id=$_REQUEST["page_id"];  }
if (empty($_REQUEST["position_code"]) )  		{  $position_code="";  } else { $position_code=$_REQUEST["position_code"];  }
if (empty($_REQUEST["position_name"]) )  		{  $position_name="";  } else { $position_name=$_REQUEST["position_name"];  }
if (empty($_REQUEST["position_des"]) ) 		 	{  $position_des="";  } else { $position_des=$_REQUEST["position_des"];  }
if (empty($_REQUEST["position_url"]) ) 		 	{  $position_url="";  } else { $position_url=$_REQUEST["position_url"];  }

if (empty($_REQUEST["position_loop"]) ) 		 	{  $position_loop="";  } else { $position_loop=$_REQUEST["position_loop"];  }
if (empty($_REQUEST["position_w"]) ) 		 	{  $position_w="";  } else { $position_w=$_REQUEST["position_w"];  }
if (empty($_REQUEST["position_h"]) ) 		 		{  $position_h="";  } else { $position_h=$_REQUEST["position_h"];  }

if (empty($_REQUEST["option_order"]) ) 		 	{  $option_order="";  } else { $option_order=$_REQUEST["option_order"];  }
if (empty($_REQUEST["option_status"]) )  		{  $option_status="off";  } else { $option_status=$_REQUEST["option_status"];  }





////////////////////////////////////////////////////////////////////////////// check input
$show_status = "success";


/*
if ($section_id == "none" or $section_id==""  ) {
$show_status = "error";
$array_report_error[] = "- กรุณาเลือก ระบบ   "; 
}

*/



if ($position_code == "" ) {
$show_status = "error";
$array_report_error[] = "- กรุณากรอก position_code   "; 
}


if ($position_name == "" ) {
$show_status = "error";
$array_report_error[] = "- กรุณากรอก position_name    "; 
}



if ($show_status == "success" ){ 

$input_array = array(
"position_id"=>"$position_id" , 
"section_id"=>"$section_id" , 
"category_id"=>"$category_id" , 
"page_id"=>"$page_id" , 

"position_code"=>"$position_code" , 
"position_name"=>"$position_name" , 
"position_des"=>"$position_des" , 
"position_url"=>"$position_url" , 

"position_loop"=>"$position_loop" , 
"position_w"=>"$position_w" , 
"position_h"=>"$position_h" , 

"option_order"=>"$option_order" , 
"option_status"=>"$option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $app_ads_banner_position->function_update( $input_array );
$show_status = $result_update["show_status"];
$position_id = $result_update["position_id"];

} ///if ($process_check_input == "success" ){ 
/// print "show_status = $show_status ";

if ($show_status == "success" ){ 
header("Location:adsbanner_position_update.php?position_id=$position_id&show_status=$show_status"); 
} 

} //// if ($appaction == "update_information") {
////////////////////////############## PROCESS UPDATE  END


////////////////////////############## PROCESS VIEW 

/// form set

if ($position_id != "" ) { 

$input_array = array(
"position_id"=>"$position_id" , 
);
$rs_position = $app_ads_banner_position->function_viewbyid( $input_array );
if ($rs_position ) {
	
$position_id = $rs_position["position_id"];
$this_section_id = $rs_position["section_id"];
$category_id = $rs_position["category_id"];
$page_id = $rs_position["page_id"];

$position_code = $rs_position["position_code"];
$position_name = $rs_position["position_name"];
$position_des = $rs_position["position_des"];
$position_url = $rs_position["position_url"];

$position_loop = $rs_position["position_loop"];
$position_w = $rs_position["position_w"];
$position_h = $rs_position["position_h"];

$option_order = $rs_position["option_order"];
$option_status = $rs_position["option_status"];
$datetime_create = $rs_position["datetime_create"];
$datetime_update = $rs_position["datetime_update"];
$datetime_delete = $rs_position["datetime_delete"];


}///rs_category
} ///if ($category_id != "" ) { 




// print "this_section_id = $this_section_id <br>";

if ($section_id == "" ){
$section_id = $this_section_id ; 
}


////////////////////////############## PROCESS VIEW  END





////////////////////////############## PROCESS CONFIG 
$show_pagetitle = "$show_content_pagename "; 

////////////////////////############## PROCESS CONFIG END



if ($position_id=="") {
$option_status = "on";
/// $section_id = "none";
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Position</title>

<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>

<link href="../app_design/css/style_backoffice.css" rel="stylesheet" type="text/css" />

</head>

<body>
<?
include("../app_design/design_top_system.php"); 
?>



<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7"><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <tr>
    <td height="550" align="left" valign="top">
    
    
    
    
<?

$page_topic_name = "เพิ่ม/แก้ไข  ตำแหน่งโฆษณา "; 
include("../app_system/include/inc_body_system_topic.php");


?>
    
    
    
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">

          <tr>
            <td height="30" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td >&nbsp;</td>
                <td align="right"><table border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="60" align="center"><a href="adsbanner_position_showall.php?system_id=<?=$system_id?>"><img src="../images/icon/design_showall.gif" width="164" height="35" hspace="5" border="0" /></a></td>
                    <?
if ($position_id != "" ) { 
?>
                    <td width="60" align="center"><a href="adsbanner_position_showall.php?<? print "position_id=$position_id&option_delete=delete&system_id=$system_id" ; ?>"   onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')"  ><img src="../images/icon/design_icon_delete.gif" alt="ลบข้อมูลนี้ ..." width="164" height="35" hspace="5" border="0" /></a></td>
                    <?
} /// if ($position_id != "" ) { 
?>
                    <td width="60" align="center"><a href="adsbanner_position_update.php?system_id=<?=$system_id?>"><img src="../images/icon/design_icon_add.gif" alt="เพิ่ม" width="164" height="35" hspace="5" border="0" /></a></td>
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
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">Page ID <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="page_id" type="text" id="page_id" value="<?=$page_id ?>" size="80"  style="width:500px;" />
                ( Ex : /home/index.php )</td>
            </tr>
            <tr>
              <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">Position Code  <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
                <input name="position_code" type="text" id="position_code" value="<?=$position_code ?>" size="40"  style="width:200px;" /> 
                ( Ex : banner_top , banner_c1 , banner_c2 )</td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ชื่อตำแหน่งโฆษณา <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="position_name" type="text" id="position_name" value="<?=$position_name ?>" size="80"  style="width:500px;" /></td>
            </tr>
            <tr>
              <td height="50" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียด :</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"position_des\" cols=\"80\" rows=\"5\" id=\"position_des\"  style=\"width:500px;\">$position_des</textarea>"; 

?></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ลำดับที่ :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="option_order" type="text" id="option_order" value="<?=$option_order  ?>" size="20"  style="width:50px;" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">wight x height :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="position_w" type="text" id="position_w" value="<?=$position_w  ?>" size="20"  style="width:50px;" />
                x 
                  <input name="position_h" type="text" id="position_h" value="<?=$position_h  ?>" size="20"  style="width:50px;" /></td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">สถานะ :</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
  <?


if ($option_status == "on" ) {  $option_status_checked = "checked"; } else  {  $option_status_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_status\" id=\"option_status\" value=\"on\"  $option_status_checked    />ออนไลน์ข้อมูล (Online)<br>"; 

?>
                </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">&nbsp;</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input type="submit" name="button3" id="button3" value="บันทึกข้อมูล" />
                <input type="reset" name="button4" id="button4" value="รีเซต ..." /></td>
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
  </tr><input  type="hidden" name="appaction"  id="appaction" value="update_information" />
<input type="hidden" name="position_id"  id="position_id" value="<?=$position_id?>" />
<input type="hidden" name="section_id"  id="section_id" value="<?=$section_id?>" />

</form>
</table>


<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>