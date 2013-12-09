<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/backoffice/system_setting.php";
include("../app_system/include/inc_checklogin_user.php"); 





////////////////////////############## PROCESS UPDATE 

if (empty($_REQUEST["setting_appaction_update"]) )  {  $setting_appaction_update="";  } else { $setting_appaction_update=$_REQUEST["setting_appaction_update"];  }
if (empty($_REQUEST["system_id"]) )  {  $system_id="";  } else { $system_id=$_REQUEST["system_id"];  }
if ($system_id == "" ){ $system_id = "config_website"; }


//// update information
if ($setting_appaction_update == "update_information" ) {
if (empty( $_REQUEST["array_config_id"] ) )  {  $array_config_id = array();  } else { $array_config_id = $_REQUEST["array_config_id"]; }


$count_array_config_id = count($array_config_id);
if ($count_array_config_id > 0 ) {  /// count 

$loop_id_start  =  0 ; 
foreach ($array_config_id as $index => $loop_temp  ){ /// loop category
$loop_id_start ++ ;  
$loop_id = $loop_id_start  - 1 ;  

$get_config_id = $array_config_id["$loop_id"];
$get_config_value = $_REQUEST["config_value_$get_config_id"];
$get_option_autoload = $_REQUEST["option_autoload_$get_config_id"];
$get_option_order = $_REQUEST["option_order_$get_config_id"];
$get_option_status = $_REQUEST["option_status_$get_config_id"];

if ($get_option_order == "" ) { $get_option_order= "0"; }
if ($get_option_status == "" ) { $get_option_status= "off"; }

/// print "get_config_id = $get_config_id <br>";


if ($get_config_id != "" ) { 
$input_array = array(
"config_id"=>"$get_config_id" , 
"config_value"=>"$get_config_value" , 
"option_order"=>"$get_option_order" , 
"option_autoload"=>"$get_option_autoload" , 
"option_status"=>"$get_option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $system_config->function_update_option( $input_array );
///$show_status = $result_update["show_status"];
} //// get_config_id



} //// loop
} //// count


header("Location:system_setting.php?system_id=$system_id&show_status=success"); 

}/////////
//// update information end


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
    <td height="650" align="left" valign="top">
    
    
    
    
<?


$page_topic_name = " Setting Configuration  "; 
include("../app_system/include/inc_body_system_topic.php");






?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right"><table border="0" cellpadding="0" cellspacing="5">
      <tr>
        <td width="60" align="center" valign="top"><input type="image" name="imageField2" id="imageField2" src="../images/icon/design_icon_save.gif"  onclick="return confirm('คุณต้องการบันทึกข้อมูล ใช่หรือไม่ ?')" /></td>

      </tr>
    </table></td>
  </tr>
</table>
<table width="100" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="../images/span.gif" width="100" height="7" /></td>
  </tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#EEEEEE"><table border="0" cellpadding="0" cellspacing="2">
      <tr>
        <td width="145" align="right"><span class="text_normal1">เลือกประเภท :</span></td>
        <td><?

print "<select name=\"select\" id=\"select\"  onchange=\"MM_jumpMenu('parent',this,0)\">";
print "<option  value=\"system_setting.php?system_id=config_website\" >เลือกประเภท ......</option>";

if ($system_id == "" or $system_id == "config_website" ) { $option_select = "selected"; } else  { $option_select = ""; }
print "<option  value=\"system_setting.php?system_id=config_website\"  $option_select  >- Config Website</option>";


/*
if ( $system_id == "config_email" ) { $option_select = "selected"; } else  { $option_select = ""; }
print "<option  value=\"system_setting.php?system_id=config_email\"  $option_select  >- Config Email </option>";

if ( $system_id == "config_email_template" ) { $option_select = "selected"; } else  { $option_select = ""; }
print "<option  value=\"system_setting.php?system_id=config_email_template\"  $option_select  >- Config Email Template </option>";
*/



print "</select>";

?></td>
      </tr>
    </table>

      
      </td>
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
          <td height="50" align="right" valign="top" bgcolor="#FFFFFF" class="text_bot1"  style="padding:3px; background-color:#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="text_normal1">
            
            <tr>
     <td align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#CCCCCC; width:50px;"><b>#</b></td>
     <td align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#CCCCCC; width:50px;"><b>Order</b></td>
     <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#CCCCCC;width:200px;"><b>config_name</b></td>
  <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#CCCCCC;"><b>config_value</b></td>
  <td align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#CCCCCC;width:70px;"><b>Auto</b></td>
  <td align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#CCCCCC;width:70px;"><b>Status</b></td>
  </tr>       

<?

$input_array = array(
"sql_other"=>"  
AND  system_id = '$system_id'
" , 
"sql_orderby"=>"  order by  option_order  ASC  " , 
);
$config_count_row = $system_config->function_countbyset( $input_array );
$config_rs = $system_config->function_viewbyset( $input_array ); /// select ข้อมูล

if ($config_count_row > 0 ) { 

$lv1_count_loop = 0 ;
while($rs = $config_rs->FetchRow()){ /////// loop 
$lv1_count_loop = $lv1_count_loop + 1  ;


///////////////// set value
$config_id = $rs["config_id"];
$system_id = $rs["system_id"];
$config_name = $rs["config_name"];
$config_des = $rs["config_des"];

$config_value = $rs["config_value"];
$option_autoload = $rs["option_autoload"];
$option_order = $rs["option_order"];
$option_status = $rs["option_status"];

$option_form_type = $rs["option_form_type"];



print " <input type=\"hidden\"  name=\"array_config_id[]\"  id=\"array_config_id[]\" value=\"$config_id\" />";

?>


<tr>
  <td align="center" valign="top" bgcolor="#E5E5E5"  style=""><b><?=$lv1_count_loop ?>.</b></td>
  <td align="center" valign="top" bgcolor="#E5E5E5"  style="">
    
<?
print "<input   type=\"text\"  name=\"option_order_$config_id\" id=\"option_order_$config_id\" value=\"$option_order\"  style=\"width:40px;\" />";
?>
    
  </td>
  <td align="left" valign="top" bgcolor="#E5E5E5" style="width:200px;" >
    
<?
print  "<b>$config_name</b>" ;
?>
    
    
</td>
<td align="left" valign="top" bgcolor="#E5E5E5"  style="padding:5px; ">
  
<?


if ($option_form_type == "form_text" ){
 print "<input   type=\"text\"  name=\"config_value_$config_id\" id=\"config_value_$config_id\" value=\"$config_value\"  style=\"width:400px;\" />";
}/// option_form_type


if ($option_form_type == "form_des" ){
print "<textarea  name=\"config_value_$config_id\"   id=\"config_value_$config_id\"   cols=\"80\" rows=\"3\"  style=\"width:98%;\">$config_value</textarea>"; 
}/// option_form_type


if ($option_form_type == "form_detail" ){
print "<textarea name=\"config_value_$config_id\"   id=\"config_value_$config_id\"   cols=\"80\" rows=\"10\"  style=\"width:98%;\">$config_value</textarea>"; 
}/// option_form_type



?>
  
</td>
<td align="left" valign="top" bgcolor="#E5E5E5"  style="padding:5px;">

<?

if ($option_autoload == "autoload" ){ $option_checked = "checked"; } else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_autoload_$config_id\" id=\"option_autoload_$config_id\"   value=\"autoload\"  $option_checked />";
?>

  Auto</td>
<td align="left" valign="top" bgcolor="#E5E5E5"  style="padding:5px;">

<?

if ($option_status == "on" ){ $option_checked = "checked"; } else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$config_id\" id=\"option_status_$config_id\"   value=\"on\"  $option_checked />";
?>

  Online</td>
</tr>

                
<?

} ///if ($content_count_row == 0 ) {
} /// count

?><tr>
  <td align="center" valign="middle" bgcolor="#FFFFFF"  style=""><img src="../images/span.gif" width="50" height="7" /></td>
  <td align="right" valign="middle" bgcolor="#FFFFFF"  style=""><img src="../images/span.gif" width="50" height="7" /></td>
  <td align="left" valign="middle" bgcolor="#FFFFFF"  style="background-color:#FFFFFF"><img src="../images/span.gif" width="230" height="7" /></td>
  <td align="left" valign="middle" bgcolor="#FFFFFF"  style="background-color:#FFFFFF"><img src="../images/span.gif" width="150" height="7" /></td>
  <td align="left" valign="middle" bgcolor="#FFFFFF"  style="background-color:#FFFFFF"><img src="../images/span.gif" width="70" height="7" /></td>
  <td align="left" valign="middle" bgcolor="#FFFFFF"  style="background-color:#FFFFFF"><img src="../images/span.gif" width="70" height="7" /></td>
  </tr>
            </table></td>
          </tr>
      </table>
      <table width="100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="right"><table border="0" cellpadding="0" cellspacing="5">
            <tr>
              <td width="60" align="center" valign="top"><input type="image" name="imageField" id="imageField" src="../images/icon/design_icon_save.gif" onclick="return confirm('คุณต้องการบันทึกข้อมูล ใช่หรือไม่ ?')"  /></td>
              <?
if ($property_id != "" ) { 
?>
              <?
} /// if ($property_id != "" ) { 
?>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  
<input  type="hidden" name="setting_appaction_update"  id="setting_appaction_update" value="update_information" />
<input  type="hidden" name="system_id"  id="system_id" value="<?=$system_id ?>" />

</form>
</table>


<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>