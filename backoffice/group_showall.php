<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/backoffice/group_showall.php";
include("../app_system/include/inc_checklogin_user.php"); 



if (empty( $_REQUEST["group_id"] ) )  {  $group_id = "";  } else { $group_id = $_REQUEST["group_id"]; }
if (empty( $_REQUEST["option_delete"] ) )  {  $option_delete = "none";  } else { $option_delete = $_REQUEST["option_delete"]; }

if (empty($_REQUEST["group_appaction_showall"]) )  {  $group_appaction_showall="";  } else { $group_appaction_showall=$_REQUEST["group_appaction_showall"];  }
if (empty( $_REQUEST["show_status"] ) )  {  $show_status = "";  } else { $show_status = $_REQUEST["show_status"]; }



////////////////////////############## PROCESS UPDATE 

//// delete
if ($option_delete == "delete"  and   $group_id != "" ) {

$input_array = array(
"group_id"=>"$group_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $system_auth_group->function_delete( $input_array );
$show_status = $result_delete["show_status"];

header("Location:group_showall.php?show_status=success"); 

}
//// delete end




//// update information
if ($group_appaction_showall == "update_information" ){
	
if (empty( $_REQUEST["array_group_id"] ) )  {  $array_group_id = array();  } else { $array_group_id = $_REQUEST["array_group_id"]; }

$count_group_id = count($array_group_id);
if ($count_group_id > 0 ) {  /// count 

$loop_id_start  =  0 ; 
foreach ($array_group_id as $index => $loop_temp  ){ /// loop category
$loop_id_start ++ ;  
$loop_id = $loop_id_start  - 1 ;  

$get_group_id = $array_group_id["$loop_id"];
$get_option_status = $_REQUEST["option_status_$get_group_id"];
$get_option_delete = $_REQUEST["option_delete_$get_group_id"];

if ($get_option_status == "" ) { $get_option_status= "off"; }

///print "get_group_id = $get_group_id <br>";

if ($get_group_id != "" ) { 
$input_array = array(
"group_id"=>"$get_group_id" , 
"option_status"=>"$get_option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $system_auth_group->function_update_option( $input_array );

} //// get_category_id



////////////// get_option_delete
if ($get_option_delete=="delete"){ 
$input_array = array(
"group_id"=>"$get_group_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $system_auth_group->function_delete( $input_array );
///$show_status = $result_delete["show_status"];

} //// delete



} //// loop
} //// count

header("Location:group_showall.php?show_status=success"); 

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
<title>Group  Showall</title>
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


$page_topic_name = "แสดงรายการข้อมูล กลุ่มดูแลระบบ  ทั้งหมด "; 
include("../app_system/include/inc_body_system_topic.php");







?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF" ><table border="0" cellpadding="0" cellspacing="5">
      <tr>
        <td width="164" align="center" valign="top"><a href="../backoffice/group_showall.php?category_id=<?=$category_id?>"><img src="../images/icon/icon_all.gif" width="164" height="35" hspace="0" vspace="0" /></a></td>
        <td width="164" align="center" valign="top"><input name="imageField" type="image" id="imageField" src="../images/icon/design_icon_save.gif" alt="บันทึกการแก้ไข..."  onclick="return confirm('กรุณายืนยันการบันทึกข้อมูล ... ')"  /></td>
        <td width="60" align="center" valign="top" style=""><a href="../backoffice/group_update.php"><img src="../images/icon/design_icon_add.gif" alt="เพิ่ม" width="164" height="35" border="0" /></a></td>
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
"none"=>"none" ,
);
$count_row = $system_auth_group->function_countbyset( $input_array );

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
          <td height="27" align="center"  bgcolor="#999999" class="text_normal1" style="width:50px;"  ><b>ลำดับที่</b></td>
          <td  bgcolor="#999999" class="text_normal1" ><b>&nbsp;Group Name</b></td>
          <td width="300" align="center" bgcolor="#999999"   style="width:50px;" class="text_normal1"><b>Online</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:200px;" class="text_normal1"><b>แก้ไขและกำหนดสิทธิ</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"><b>ลบ</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1" ><b>ลบ</b></td>
          </tr>
        

<?
///###################################### level 1


$level1_input_array = array(
"none"=>"none" ,
"sql_orderby"=>" order by option_order ASC " ,
);
$level1_result = $system_auth_group->function_viewbyset( $level1_input_array ); /// select ข้อมูล


$count_loop = 0 ;
while($level1_rs = $level1_result->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;


///////////////// set value
$level1_group_id = $level1_rs["group_id"];
$level1_group_code = $level1_rs["group_code"];
$level1_group_name = $level1_rs["group_name"];
$level1_group_des = $level1_rs["group_des"];
$level1_option_order = $level1_rs["option_order"];
$level1_option_status = $level1_rs["option_status"];
$level1_option_delete = $level1_rs["option_not_delete"];

if ($level1_option_status == "on" ) {$option_status_text = "ON"; }
if ($level1_option_status == "off" ) {$option_status_text = "<font color=\"#666666\">OFF</font>"; }


print " <input type=\"hidden\"  name=\"array_group_id[]\"  id=\"array_group_id[]\" value=\"$level1_group_id\" />";
?>
        
        <tr class="text_normal1">
          <td height="25" align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:1px;"  >
  <?
print $level1_option_order ; 
?>
            
          </td>
          <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:1px;"  ><b><?
		  
print $level1_group_name ; 

?></b></td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;width:50px;" ><?



if ($level1_option_status == "on" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$level1_group_id\" id=\"option_status_$level1_group_id\"  $option_checked  value=\"on\"  />";

?>
            <font color="#009900"><b>
              <?=$option_status_text ?>
            </b></font></td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><a href="group_update.php?<? print "group_id=$level1_group_id"; ?>"><img src="../images/icon/icon_mini_update.gif" width="25" height="25" align="absmiddle" /><b> แก้ไขและกำหนดสิทธิ</b></a></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >
            
            
<?
if ($level1_option_delete != "not_delete"){ 
?>
  <a href="group_showall.php?<? print "group_id=$level1_group_id&option_delete=delete" ; ?>"   
  onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')"  ><img src="../images/icon/icon_mini_delete.gif" width="25" height="25" border="0"  /></a>
 <?
} /// not_delete
 ?>
            
</td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?

if ($level1_option_delete != "not_delete"){ 
print "<input  type=\"checkbox\" name=\"option_delete_$level1_group_id\" id=\"option_delete_$level1_group_id\" value=\"delete\" />";
}


?></td>
          </tr>
        


<?



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
  

<input  type="hidden" name="group_appaction_showall"  id="group_appaction_showall" value="update_information" />

</form>
</table>




<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>



