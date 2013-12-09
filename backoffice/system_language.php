<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/backoffice/system_language.php";
include("../app_system/include/inc_checklogin_user.php"); 





////////////////////////############## PROCESS UPDATE 

if (empty($_REQUEST["appaction_language"]) ) {  $appaction_language = ""; } else { $appaction_language = $_REQUEST["appaction_language"];}

if ($appaction_language == "update_information"){


/*
language_id
option_order_
option_default_show_
option_status_
*/

///////// check request
if (empty($_REQUEST["language_id"]) ) {  $language_id= array();  } else { $language_id=$_REQUEST["language_id"];  }
if (empty($_REQUEST["option_default_show"]) ) {  $option_default_show= "";  } else { $option_default_show=$_REQUEST["option_default_show"];  }


$count_language_id = count($language_id);
if ($count_language_id > 0 ) {  /// count 

$loop_id_start  =  0 ; 
foreach ($language_id as $index => $loop_temp  ){ /// loop category
$loop_id_start ++ ;  
$loop_id = $loop_id_start  - 1 ;  

$get_language_id = $language_id["$loop_id"];
$get_option_order = $_REQUEST["option_order_$get_language_id"];
$get_option_status = $_REQUEST["option_status_$get_language_id"];

if ( $get_option_status == "" ){ $get_option_status = "off"; }
if ( $option_default_show == "$get_language_id" ) { $get_option_default_show = "yes"; } else  { $get_option_default_show = "none"; } 


$input_array = array(
"language_id"=>"$get_language_id" , 
"option_order"=>"$get_option_order" , 
"option_default_show"=>"$get_option_default_show" , 
"option_status"=>"$get_option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $app_language->function_update_option( $input_array );
$show_status = $result_update["show_status"];


}///  loop
} /// count

header("Location:system_language.php?show_status=$show_status"); 

} //// if ($appaction == "update_information") {
////////////////////////############## PROCESS UPDATE  END
















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
    <td height="650" align="left" valign="top">
    
    
    
    
<?


$page_topic_name = " ปรับแต่ง ตัวเลือกภาษา  "; 
include("../app_system/include/inc_body_system_topic.php");



/////////// status report
include("../app_system/include/inc_report_status.php");


?>
<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
  <tr>
          <td height="50" align="left" valign="top" bgcolor="#FFFFFF" class="text_bot1"  style="padding:3px; background-color:#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="text_normal1">
          
   <tr>
     <td align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#CCCCCC; width:50px;"><b>#</b></td>
     <td align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#CCCCCC; width:50px;"><b>Order</b></td>
     <td align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#CCCCCC; width:50px;"><b>Icon</b></td>
     <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#CCCCCC;">&nbsp;<b>Name</b></td>
  <td align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#CCCCCC; width:150px;"><b>Input</b></td>
  <td align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#CCCCCC;width:150px;"><b>Show</b></td>
  <td align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#CCCCCC;width:100px;"><b>Status</b></td>
  </tr>       

<?

$input_array = array(
"sql_orderby"=>"  order by  option_order  ASC  " , 
);
$config_count_row = $app_language->function_countbyset( $input_array );
$config_rs = $app_language->function_viewbyset( $input_array ); /// select ข้อมูล

if ($config_count_row > 0 ) { 

$lv1_count_loop = 0 ;
while($rs = $config_rs->FetchRow()){ /////// loop 
$lv1_count_loop = $lv1_count_loop + 1  ;


///////////////// set value
$language_id = $rs["language_id"];
$language_icon = $rs["language_icon"];
$language_name = $rs["language_name"];
$option_default_input = $rs["option_default_input"];
$option_default_show = $rs["option_default_show"];
$option_order = $rs["option_order"];
$option_status = $rs["option_status"];


if ($option_default_input == "yes" ) { 
$text_option_default_input = "Default Input"; 
} else {
$text_option_default_input = ""; 
}


/// 
if ($language_icon != "" ){
$show_language_icon = "<img src=\"../images/icon/$language_icon\">"; 	
} else {
$show_language_icon = ""; 	
}



?>


<tr>
  <td align="center" valign="middle" bgcolor="#E5E5E5"  style=""><?=$lv1_count_loop ?></td>
  <td align="center" valign="middle" bgcolor="#E5E5E5"  style="" >
  
<?

print "<input   type=\"hidden\" name=\"language_id[]\"  id=\"language_id[]\" value=\"$language_id\" />";
print "<input   type=\"text\"  name=\"option_order_$language_id\" id=\"option_order_$language_id\" value=\"$option_order\"  style=\"width:40px;text-align:center;\" />";


?>
  
  </td>
  <td align="center" valign="middle" bgcolor="#E5E5E5"  style=""><?=$show_language_icon?></td>
  <td align="left" valign="middle" bgcolor="#E5E5E5"  style=""> &nbsp; <b><?=$language_name ?></b>
  

  
  </td>
<td align="center" valign="middle" bgcolor="#E5E5E5"  style="">
<b><?=$text_option_default_input ?></b>
</td>
<td align="center" valign="middle" bgcolor="#E5E5E5"  style="padding:5px;">



<?

if ($option_default_show == "yes" ) { $option_checked = "checked"; } else { $option_checked = ""; }
print "<input type=\"radio\" name=\"option_default_show\" id=\"option_default_show\"  value=\"$language_id\"  $option_checked />  Default Show "; 

?>


</td>
<td align="center" valign="middle" bgcolor="#E5E5E5"  style="padding:5px;">

<?

if ($option_status == "on" ) { $option_checked = "checked"; } else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$language_id\" id=\"option_status_$language_id\"  value=\"on\"  $option_checked  />  Online"; 

?>
</td>
</tr>

                
<?

} ///if ($content_count_row == 0 ) {
} /// count

?><tr>
  <td align="center" valign="middle" bgcolor="#FFFFFF"  style=""><img src="../images/span.gif" width="50" height="7" /></td>
  <td align="right" valign="middle" bgcolor="#FFFFFF"  style=""><img src="../images/span.gif" width="50" height="7" /></td>
  <td align="right" valign="middle" bgcolor="#FFFFFF"  style="">&nbsp;</td>
  <td align="right" valign="middle" bgcolor="#FFFFFF"  style=""><img src="../images/span.gif" width="100" height="7" /></td>
  <td align="right" valign="middle" bgcolor="#FFFFFF"  style=""><img src="../images/span.gif" width="100" height="7" /></td>
  <td align="left" valign="middle" bgcolor="#FFFFFF"  style="background-color:#FFFFFF"><img src="../images/span.gif" width="70" height="7" /></td>
  <td align="left" valign="middle" bgcolor="#FFFFFF"  style="background-color:#FFFFFF"><img src="../images/span.gif" width="70" height="7" /></td>
  </tr>
            </table>
            <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td align="right">
                
                
<input name="imageField" type="image" id="imageField" src="../images/icon/design_icon_save.gif" alt="บันทึกการแก้ไข..."  onclick="return confirm('กรุณายืนยันการบันทึกข้อมูล ... ')"  />
                
                </td>
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
  
<input  type="hidden" name="appaction_language"  id="appaction_language" value="update_information" />

</form>
</table>


<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>