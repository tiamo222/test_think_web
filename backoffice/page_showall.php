<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/backoffice/page_showall.php";
include("../app_system/include/inc_checklogin_user.php"); 




$system_id = "system_user";

if (empty( $_REQUEST["page_id"] ) )  {  $page_id = "";  } else { $page_id = $_REQUEST["page_id"]; }
if (empty( $_REQUEST["option_delete"] ) )  {  $option_delete = "none";  } else { $option_delete = $_REQUEST["option_delete"]; }

if (empty($_REQUEST["page_appaction_showall"]) )  {  $page_appaction_showall="";  } else { $page_appaction_showall=$_REQUEST["page_appaction_showall"];  }
if (empty( $_REQUEST["show_status"] ) )  {  $show_status = "";  } else { $show_status = $_REQUEST["show_status"]; }



////////////////////////############## PROCESS UPDATE 

//// delete
if ($option_delete == "delete"  and   $page_id != "" ) {

$input_array = array(
"page_id"=>"$page_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $system_auth_page->function_delete( $input_array );
$show_status = $result_delete["show_status"];

header("Location:page_showall.php?show_status=success"); 

}
//// delete end




//// update information
if ($page_appaction_showall == "update_information" ){
	
if (empty( $_REQUEST["array_page_id"] ) )  {  $array_page_id = array();  } else { $array_page_id = $_REQUEST["array_page_id"]; }

$count_page_id = count($array_page_id);
if ($count_page_id > 0 ) {  /// count 

$loop_id_start  =  0 ; 
foreach ($array_page_id as $index => $loop_temp  ){ /// loop category
$loop_id_start ++ ;  
$loop_id = $loop_id_start  - 1 ;  

$get_page_id = $array_page_id["$loop_id"];

$get_page_name = $_REQUEST["page_name_$get_page_id"];
$get_page_url = $_REQUEST["page_url_$get_page_id"];

$get_option_show = $_REQUEST["option_show_$get_page_id"];
$get_option_order = $_REQUEST["option_order_$get_page_id"];
$get_option_status = $_REQUEST["option_status_$get_page_id"];
$get_option_delete = $_REQUEST["option_delete_$get_page_id"];

if ($get_option_show == "" ) { $get_option_show= "none"; }
if ($get_option_status == "" ) { $get_option_status= "off"; }

///print "get_page_id = $get_page_id <br>";

if ($get_page_id != "" ) { 
$input_array = array(
"page_id"=>"$get_page_id" , 
"page_name"=>"$get_page_name" , 
"page_url"=>"$get_page_url" , 
"option_show"=>"$get_option_show" , 
"option_order"=>"$get_option_order" , 
"option_status"=>"$get_option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $system_auth_page->function_update_option( $input_array );

} //// get_category_id



////////////// get_option_delete
if ($get_option_delete=="delete"){ 
$input_array = array(
"page_id"=>"$get_page_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $system_auth_page->function_delete( $input_array );
///$show_status = $result_delete["show_status"];

} //// delete



} //// loop
} //// count

header("Location:page_showall.php?show_status=success"); 

}/////////
//// update information end





////////////////////////############## PROCESS VIEW 
////////// config by process







////////////////////////############## PROCESS CONFIG 


$show_content_pagename = "หน้าหลักระบบจัดการ"; 
$show_content_header = ""; 
$show_content_center = ""; 




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>System User  Showall</title>
</head>


<link href="../app_design/css/style_backoffice.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>


<body>
<?
include("../app_design/design_top_system.php"); 
?>




<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7">

<form id="form1" name="form1" method="post" action="">
  <tr>
    <td height="550" align="left" valign="top">
    

<?


$page_topic_name = "แสดงรายการข้อมูล โครงสร้างระบบ  ทั้งหมด "; 
include("../app_system/include/inc_body_system_topic.php");







?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF" ><table border="0" cellpadding="0" cellspacing="5">
      <tr>
        <td width="164" align="center" valign="top"><a href="../backoffice/page_showall.php?category_id=<?=$category_id?>"><img src="../images/icon/icon_all.gif" width="164" height="35" hspace="0" vspace="0" /></a></td>
        <td width="164" align="center" valign="top"><input name="imageField" type="image" id="imageField" src="../images/icon/design_icon_save.gif" alt="บันทึกการแก้ไข..."  onclick="return confirm('กรุณายืนยันการบันทึกข้อมูล ... ')"  /></td>
        <td width="60" align="center" valign="top" style=""><a href="../backoffice/page_update.php?category_id=<?=$category_id?>"><img src="../images/icon/design_icon_add.gif" alt="เพิ่ม" width="164" height="35" border="0" /></a></td>
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


//// $show_status = "success"; 
include("../app_system/include/inc_report_status.php");

?>
<?


$input_array = array(
"category_id"=>"root" ,
"page_level"=>"1" ,
);
$count_row = $system_auth_page->function_countbyset( $input_array );



if ($count_row == 0 ) { 

?>





      <table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="#999999">
        <tr>
          <td height="150" align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#EEEEEE">
          
<span class="text_big2">ยังไม่มีรายการข้อมูล ...</span>
          
          
          </td>
        </tr>
      </table>
      <table width="100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table>

<?

} else { ///////if ($main_count_row == 0 ) { 

?>
      
      
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#333333">
        <tr>
          <td  height="27" align="center" bgcolor="#999999" style="width:50px;"  class="text_normal1"><b>#</b></td>
          <td align="center"  bgcolor="#999999" class="text_normal1" style="width:50px;"  ><b>ลำดับที่</b></td>
          <td  bgcolor="#999999" class="text_normal1" ><b>&nbsp;Name</b></td>
          <td width="300" align="center" bgcolor="#999999"   style="width:400px;" class="text_normal1"><b>URL</b></td>
          <td width="300" align="center" bgcolor="#999999"   style="width:50px;" class="text_normal1"><b>Online</b></td>
          <td width="50" align="center" bgcolor="#999999"   style="width:50px;" class="text_normal1"><b>Index</b></td>
          <td width="50" align="center" bgcolor="#999999"   style="width:50px;" class="text_normal1"><b>เปิด</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"><b>แก้ไข</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"><b>ลบ</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1" ><b>ลบ</b></td>
          </tr>
        

<?
///###################################### level 1


$level1_input_array = array(
"category_id"=>"root" ,
"page_level"=>"1" ,
"sql_orderby"=>" order by option_order ASC " ,
);
$level1_result = $system_auth_page->function_viewbyset( $level1_input_array ); /// select ข้อมูล


$count_loop = 0 ;
while($level1_rs = $level1_result->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;


///////////////// set value
$level1_page_id = $level1_rs["page_id"];
$level1_category_id = $level1_rs["category_id"];
$level1_page_name = $level1_rs["page_name"];
$level1_page_url = $level1_rs["page_url"];

$level1_option_show = $level1_rs["option_show"];
$level1_option_order = $level1_rs["option_order"];
$level1_option_status = $level1_rs["option_status"];

if ($level1_option_status == "on" ) {$option_status_text = "ON"; }
if ($level1_option_status == "off" ) {$option_status_text = "<font color=\"#666666\">OFF</font>"; }


$level1_option_order = $level1_option_order * 1 ; 


print " <input type=\"hidden\"  name=\"array_page_id[]\"  id=\"array_page_id[]\" value=\"$level1_page_id\" />";
?>
        
        
<?

if ($count_loop > 1){ 
?>
        <tr class="text_normal1">
          <td height="30" align="center" valign="top" bgcolor="#FFFFFF"  style="padding:2px;">&nbsp;</td>
          <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:1px;"  >&nbsp;</td>
          <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:1px;"  >&nbsp;</td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;width:400px;" >&nbsp;</td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;width:50px;" >&nbsp;</td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >&nbsp;</td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >&nbsp;</td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >&nbsp;</td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >&nbsp;</td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;">&nbsp;</td>
        </tr>
<?
} /// count_loop
?>
        
        <tr class="text_normal1">
          <td height="25" align="center" valign="top" bgcolor="#D1D1D1"  style="padding:2px;"><b>
            <?=$count_loop ?>.</b></td>
          <td align="left" valign="top" bgcolor="#D1D1D1"  style="padding:1px;"  >
<?
print "<input name=\"option_order_$level1_page_id\" type=\"text\" id=\"option_order_$level1_page_id\" size=\"3\"  value=\"$level1_option_order\"/>";
?>
          
          </td>
          <td align="left" valign="top" bgcolor="#D1D1D1"  style="padding:1px;"  ><?
print "<input name=\"page_name_$level1_page_id\" type=\"text\" id=\"page_name_$level1_page_id\" style=\"width:250px;\"   value=\"$level1_page_name\"/>";
?></td>
          <td  align="left" valign="top" bgcolor="#D1D1D1" style="padding:2px;width:400px;" ><?
print "<input name=\"page_url_$level1_page_id\" type=\"text\" id=\"page_url_$level1_page_id\" style=\"width:400px;\"  value=\"$level1_page_url\"/>";
?></td>
          <td  align="left" valign="top" bgcolor="#D1D1D1" style="padding:2px;width:50px;" >

<?



if ($level1_option_status == "on" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$level1_page_id\" id=\"option_status_$level1_page_id\"  $option_checked  value=\"on\"  />";

?><font color="#009900"><b><?=$option_status_text ?></b></font></td>
          <td  align="center" valign="top" bgcolor="#D1D1D1" style="padding:2px;" ><?

if ($level1_option_show == "index" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_show_$level1_page_id\" id=\"option_show_$level1_page_id\"  $option_checked  value=\"index\"  />";
		  
		  ?></td>
          <td  align="center" valign="top" bgcolor="#D1D1D1" style="padding:2px;" ><img src="../images/icon/icon_mini_preview.gif" width="25" height="25" /></td>
          <td  align="center" valign="top" bgcolor="#D1D1D1" style="padding:2px;" ><a href="page_update.php?<? print "page_id=$level1_page_id"; ?>"><img src="../images/icon/icon_mini_update.gif" width="25" height="25" /></a></td>
          <td  align="center" valign="top" bgcolor="#D1D1D1" style="padding:2px;" >
            
            


  <a href="page_showall.php?<? print "page_id=$level1_page_id&option_delete=delete&category_id=$category_id" ; ?>"   onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')"  ><img src="../images/icon/icon_mini_delete.gif" width="25" height="25" border="0"  /></a>
            
</td>
          <td align="center" valign="top" bgcolor="#D1D1D1"  style="padding:4px;"><?

print "<input  type=\"checkbox\" name=\"option_delete_$level1_page_id\" id=\"option_delete_$level1_page_id\" value=\"delete\" />";

?></td>
          </tr>
        

<?

///###################################### level 2

$input_array2 = array(
"category_id"=>"$level1_page_id" ,
"page_level"=>"2" ,
"sql_orderby"=>" order by option_order ASC " ,
);
$level2_count = $system_auth_page->function_countbyset( $input_array2 );
if ($level2_count > 0 ) {  //// count
$level2_result = $system_auth_page->function_viewbyset( $input_array2 ); /// select ข้อมูล


$count_loop2 = 0 ;
while($level2_rs = $level2_result->FetchRow()){ /////// loop 
$count_loop2 = $count_loop2 + 1  ;


///////////////// set value
$level2_page_id = $level2_rs["page_id"];
$level2_category_id = $level2_rs["category_id"];
$level2_page_name = $level2_rs["page_name"];
$level2_page_url = $level2_rs["page_url"];

$level2_option_show = $level2_rs["option_show"];
$level2_option_order = $level2_rs["option_order"];
$level2_option_status = $level2_rs["option_status"];

if ($level2_option_status == "on" ) {$option_status_text = "ON"; }
if ($level2_option_status == "off" ) {$option_status_text = "<font color=\"#666666\">OFF</font>"; }


$level2_option_order = $level2_option_order * 1 ; 

print " <input type=\"hidden\"  name=\"array_page_id[]\"  id=\"array_page_id[]\" value=\"$level2_page_id\" />";
?>
        
        <tr class="text_normal1">
          <td height="25" align="center" valign="top" bgcolor="#E2E2E2"  style="padding:4px;"><?=$count_loop ?>.<?=$count_loop2?></td>
          <td align="left" valign="top" bgcolor="#E2E2E2"  style="padding:1px;"  >
<?
print "<input name=\"option_order_$level2_page_id\" type=\"text\" id=\"option_order_$level2_page_id\" size=\"3\"  value=\"$level2_option_order\"/>";
?>
          
          </td>
          <td align="left" valign="top" bgcolor="#E2E2E2"  style="padding:1px;"  ><?
print "<input name=\"page_name_$level2_page_id\" type=\"text\" id=\"page_name_$level2_page_id\" style=\"width:250px;\"   value=\"$level2_page_name\"/>";
?></td>
          <td  align="left" valign="top" bgcolor="#E2E2E2" style="padding:2px;width:400px;" ><?
print "<input name=\"page_url_$level2_page_id\" type=\"text\" id=\"page_url_$level2_page_id\" style=\"width:400px;\"   value=\"$level2_page_url\"/>";
?></td>
          <td  align="left" valign="top" bgcolor="#E2E2E2" style="padding:2px;width:50px;" >

<?

if ($level2_option_status == "on" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$level2_page_id\" id=\"option_status_$level2_page_id\"  $option_checked  value=\"on\"  />";

?><font color="#009900"><b><?=$option_status_text ?></b></font></td>
          <td  align="center" valign="top" bgcolor="#E2E2E2" style="padding:2px;" ><?
		  
if ($level2_option_show == "index" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_show_$level2_page_id\" id=\"option_show_$level2_page_id\"  $option_checked  value=\"index\"  />";
		  
		  ?></td>
          <td  align="center" valign="top" bgcolor="#E2E2E2" style="padding:2px;" ><img src="../images/icon/icon_mini_preview.gif" width="25" height="25" /></td>
          <td  align="center" valign="top" bgcolor="#E2E2E2" style="padding:2px;" ><a href="page_update.php?<? print "page_id=$level2_page_id"; ?>"><img src="../images/icon/icon_mini_update.gif" width="25" height="25" /></a></td>
          <td  align="center" valign="top" bgcolor="#E2E2E2" style="padding:2px;" >
            
            

  <a href="page_showall.php?<? print "page_id=$level2_page_id&option_delete=delete&category_id=$category_id" ; ?>"   onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')"  ><img src="../images/icon/icon_mini_delete.gif" width="25" height="25" border="0"  /></a>
            
</td>
          <td align="center" valign="top" bgcolor="#E2E2E2"  style="padding:4px;"><?

print "<input  type=\"checkbox\" name=\"option_delete_$level2_page_id\" id=\"option_delete_$level2_page_id\" value=\"delete\" />";

?>

</td>
</tr>


<?
///###################################### level 3  loop

$input_array3 = array(
"category_id"=>"$level2_page_id" ,
"page_level"=>"3" ,
"sql_orderby"=>" order by option_order ASC " ,
);
$level3_count = $system_auth_page->function_countbyset( $input_array3 );
if ($level3_count > 0 ) {  //// count
$level3_result = $system_auth_page->function_viewbyset( $input_array3 ); /// select ข้อมูล


$count_loop3 = 0 ;
while($level3_rs = $level3_result->FetchRow()){ /////// loop 
$count_loop3 = $count_loop3 + 1  ;


///////////////// set value
$level3_page_id = $level3_rs["page_id"];
$level3_category_id = $level3_rs["category_id"];
$level3_page_name = $level3_rs["page_name"];
$level3_page_url = $level3_rs["page_url"];

$level3_option_show = $level3_rs["option_show"];
$level3_option_order = $level3_rs["option_order"];
$level3_option_status = $level3_rs["option_status"];

if ($level3_option_status == "on" ) {$option_status_text = "ON"; }
if ($level3_option_status == "off" ) {$option_status_text = "<font color=\"#666666\">OFF</font>"; }


$level3_option_order = $level3_option_order * 1 ; 

print " <input type=\"hidden\"  name=\"array_page_id[]\"  id=\"array_page_id[]\" value=\"$level3_page_id\" />";
?>
        
        <tr class="text_normal1">
          <td height="25" align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?=$count_loop ?>.<?=$count_loop2?>.<?=$count_loop3?></td>
          <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:1px;"  >
<?
print "<input name=\"option_order_$level3_page_id\" type=\"text\" id=\"option_order_$level3_page_id\" size=\"3\"  value=\"$level3_option_order\"/>";
?>
          
          </td>
          <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:1px;"  ><?
print "<input name=\"page_name_$level3_page_id\" type=\"text\" id=\"page_name_$level3_page_id\" style=\"width:250px;\"   value=\"$level3_page_name\"/>";
?></td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;width:400px;" ><?
print "<input name=\"page_url_$level3_page_id\" type=\"text\" id=\"page_url_$level3_page_id\" style=\"width:400px;\"   value=\"$level3_page_url\"/>";
?></td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;width:50px;" >

<?

if ($level3_option_status == "on" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$level3_page_id\" id=\"option_status_$level3_page_id\"  $option_checked  value=\"on\"  />";

?><font color="#009900"><b><?=$option_status_text ?></b></font></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><?
		  
if ($level3_option_show == "index" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_show_$level3_page_id\" id=\"option_show_$level3_page_id\"  $option_checked  value=\"index\"  />";
		  
		  ?></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><img src="../images/icon/icon_mini_preview.gif" width="25" height="25" /></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><a href="page_update.php?<? print "page_id=$level3_page_id"; ?>"><img src="../images/icon/icon_mini_update.gif" width="25" height="25" /></a></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >
            
            

  <a href="page_showall.php?<? print "page_id=$level3_page_id&option_delete=delete" ; ?>"   onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')"  ><img src="../images/icon/icon_mini_delete.gif" width="25" height="25" border="0"  /></a>
            
</td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?

print "<input  type=\"checkbox\" name=\"option_delete_$level3_page_id\" id=\"option_delete_$level3_page_id\" value=\"delete\" />";

?>

</td>
</tr>



<?

} //// loop 3 end
} //// count 3 end

///###################################### level 3 end loop


} //// loop 2 end
} //// count

///###################################### level 2 end


} //// level 1 end loop

?>




      </table>
      <table width="100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table>






      <table width="100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table>
      
      
      
      
<?

} ////////////// end  count leve 1



?>
      
      
      
    </td>
  </tr>
  

<input  type="hidden" name="page_appaction_showall"  id="page_appaction_showall" value="update_information" />

</form>
</table>




<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>



