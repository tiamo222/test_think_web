<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/backoffice/system_language_config.php";
include("../app_system/include/inc_checklogin_user.php"); 





////////////////////////############## PROCESS UPDATE 

if (empty($_REQUEST["appaction_config_language"]) ) {  $appaction_config_language = ""; } else { $appaction_config_language = $_REQUEST["appaction_config_language"];}

if ($appaction_config_language == "update_information"){


/*
language_id
option_order_
option_default_show_
option_status_
*/

///////// check request
if (empty($_REQUEST["lang_config_id"]) ) {  $lang_config_id= array();  } else { $lang_config_id=$_REQUEST["lang_config_id"];  }


$count_lang_config_id = count($lang_config_id);
if ($count_lang_config_id > 0 ) {  /// count 

$loop_id_start  =  0 ; 
foreach ($lang_config_id as $index => $loop_temp  ){ /// loop category
$loop_id_start ++ ;  
$loop_id = $loop_id_start  - 1 ;  

$get_lang_config_id = $lang_config_id["$loop_id"];
$get_lang_config_tag = $_REQUEST["lang_config_tag_$get_lang_config_id"];
$get_comment = $_REQUEST["comment_$get_lang_config_id"];
$get_option_order = $_REQUEST["option_order_$get_lang_config_id"];
$get_option_status = $_REQUEST["option_status_$get_lang_config_id"];

if ( $get_option_status == "" ){ $get_option_status = "off"; }


$input_array = array(
"lang_config_id"=>"$get_lang_config_id" , 
"lang_config_tag"=>"$get_lang_config_tag" , 
"comment"=>"$get_comment" , 

"option_order"=>"$get_option_order" , 
"option_status"=>"$get_option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $app_language_config->function_update_option( $input_array );
$show_status = $result_update["show_status"];


}///  loop
} /// count

header("Location:system_language_config.php?show_status=$show_status"); 


} //// if ($appaction == "update_information") {
////////////////////////############## PROCESS UPDATE  END






$input_array = array(
"sql_orderby"=>"  order by  option_order  ASC  " , 
);
$config_count_row = $app_language_config->function_countbyset( $input_array );



////////////////////////############## PROCESS CONFIG 
$show_pagetitle = " Setting Configuration   "; 
////////////////////////############## PROCESS CONFIG END

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$show_pagetitle ?></title>



<link href="../app_design/css/style_backoffice.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?
include("../app_design/design_top_system.php"); 
?>




<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7">
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <tr>
    <td height="500" align="left" valign="top" class="text1">
    
    
    
    
<?


$page_topic_name = " ปรับแต่ง ภาษาในหน้าต่างๆ "; 
include("../app_system/include/inc_body_system_topic.php");



/////////// status report
include("../app_system/include/inc_report_status.php");


?>



<table width="100%" border="0" cellpadding="0" cellspacing="4">
  <tr>
    <td align="right" valign="middle">

<a href="system_language_config_update.php"><img src="../images/icon/design_icon_add.gif" width="164" height="35" /></a>


<?
if ($config_count_row > 0 ){ 
?>
 &nbsp;  <input name="imageField" type="image" id="imageField" src="../images/icon/design_icon_save.gif" alt="บันทึกการแก้ไข..."  onclick="return confirm('กรุณายืนยันการบันทึกข้อมูล ... ')"  />
 <?
} ///config_count_row
 ?>
 
 
 
    </td>
  </tr>
</table>




<?



if ($config_count_row == 0 ){ 
?>

<table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="#999999">
  <tr>
    <td height="150" align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#EEEEEE"><span class="text_big2">ยังไม่มีรายการข้อมูล ...</span></td>
  </tr>
</table>


<?
} else {  

?>


<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
  <tr>
          <td height="50" align="left" valign="top" bgcolor="#FFFFFF" class="text_bot1"  style="padding:3px; background-color:#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="text_normal1">
          
   <tr>
     <td align="center" valign="middle" bgcolor="#999999"  style="padding:5px; background-color:#999999; width:30px;">#</td>
     <td align="center" valign="middle" bgcolor="#999999"  style="padding:5px; background-color:#999999; width:50px;">Order</td>
     <td align="center" valign="middle" bgcolor="#999999"  style="padding:5px; background-color:#999999;width:250px;">Tag</td>
     <td align="left" valign="middle" bgcolor="#999999"  style="padding:5px; background-color:#999999;">&nbsp;Comment</td>
     <td align="center" valign="middle" bgcolor="#999999"  style="padding:5px; background-color:#999999; width:100px;">Option</td>
     <td width="50" align="center" bgcolor="#999999" style="width:50px;"><b>แก้ไข</b></td>
     <td width="50" align="center" bgcolor="#999999" style="width:50px;"><b>ลบ</b></td>
     </tr>       

<?


$config_rs = $app_language_config->function_viewbyset( $input_array ); /// select ข้อมูล

if ($config_count_row > 0 ) { 

$lv1_count_loop = 0 ;
while($rs = $config_rs->FetchRow()){ /////// loop 
$lv1_count_loop = $lv1_count_loop + 1  ;


///////////////// set value
$lang_config_id = $rs["lang_config_id"];

$lang_config_tag = $rs["lang_config_tag"];
$name_lang1 = $rs["name_lang1"];
$detail_lang1 = $rs["detail_lang1"];

$comment = $rs["comment"];
$option_type = $rs["option_type"];
$option_order = $rs["option_order"];
$option_status = $rs["option_status"];



?>

<tr>
<td align="center" valign="middle" bgcolor="#FFFFFF"  style=""><?=$lv1_count_loop ?></td>
<td align="center" valign="middle" bgcolor="#FFFFFF"  style="" >

<?

print "<input   type=\"hidden\" name=\"lang_config_id[]\"  id=\"lang_config_id[]\" value=\"$lang_config_id\" />";
print "<input   type=\"text\"  name=\"option_order_$lang_config_id\" id=\"option_order_$lang_config_id\" value=\"$option_order\"  style=\"width:40px;text-align:center;\" />";

?>   
 
</td>
<td align="center" valign="middle" bgcolor="#FFFFFF"  style="">
<?

print "<input   type=\"text\"  name=\"lang_config_tag_$lang_config_id\" id=\"lang_config_tag_$lang_config_id\" value=\"$lang_config_tag\"  style=\"width:250px;text-align:left;\" />";

?>
 </td>
  <td align="left" valign="middle" bgcolor="#FFFFFF"  style="">
<?
print "<input   type=\"text\"  name=\"comment_$lang_config_id\" id=\"comment_$lang_config_id\" value=\"$comment\"  style=\"width:98%;text-align:left;\" />";
?>
    
  </td>
  <td align="center" valign="middle" bgcolor="#FFFFFF"  style="">
  
<?

if ($option_status == "on" ){ $option_checked = "checked";  } else { $option_checked = "";  }
print " <input type=\"checkbox\" name=\"option_status_$lang_config_id\" id=\"option_status_$lang_config_id\"  value=\"on\"  $option_checked /> ออนไลน์ ";

?>
    
  </td>
  <td  align="center" valign="top" style="padding:2px;" ><a href="system_language_config_update.php?<? print "lang_config_id=$lang_config_id"; ?>"><img src="../images/icon/icon_mini_update.gif" width="25" height="25" /></a></td>
  <td  align="center" valign="top" style="padding:2px;" ><?

if ($option_fixed != "fixed" ){
print "
<a href=\"system_language_config.php?lang_config_id=$lang_config_id&option_delete=delete\"   onclick=\"return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')\"  >
<img src=\"../images/icon/icon_mini_delete.gif\" width=\"25\" height=\"25\" border=\"0\"  /></a>
";
} else { ////option_fixed
print "fixed";
}
?></td>
  </tr>

                
<?

} ///if ($content_count_row == 0 ) {
} /// count

?>
            </table>
            <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td align="right">
                
                

                
                </td>
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
} ///config_count_row
?>
      
      
      
      
      </td>
  </tr>
  
<input  type="hidden" name="appaction_config_language"  id="appaction_config_language" value="update_information" />

</form>
</table>


<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>