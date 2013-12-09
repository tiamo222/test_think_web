<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/backoffice/exchange_rate_update.php";
include("../app_system/include/inc_checklogin_user.php"); 



////////////////////////############## PROCESS UPDATE 
if (empty($_REQUEST["appaction_exchange"]) ) 	{  $appaction_exchange = ""; } else { $appaction_exchange = $_REQUEST["appaction_exchange"];}
if (empty($_REQUEST["show_status"]) ) 				{  $show_status = ""; } else { $show_status = $_REQUEST["show_status"];}
if ($appaction_exchange == "update_information"){

/*
language_id
option_order_
option_default_show_
option_status_
*/

///////// check request
if (empty($_REQUEST["exchange_id"]) ) {  $exchange_id= array();  } else { $exchange_id=$_REQUEST["exchange_id"];  }


$count_exchange_id = count($exchange_id);
if ( $count_exchange_id > 0 ) {  /// count 

$loop_id_start  =  0 ; 
foreach ($exchange_id as $index => $loop_temp  ){ /// loop category
$loop_id_start ++ ;  
$loop_id = $loop_id_start  - 1 ;  

$get_exchange_id = $exchange_id["$loop_id"];
$get_exchange_rate_baht = $_REQUEST["exchange_rate_baht_$get_exchange_id"];
$get_exchange_rate = $_REQUEST["exchange_rate_$get_exchange_id"];
$get_option_order = $_REQUEST["option_order_$get_exchange_id"];
$get_option_status = $_REQUEST["option_status_$get_exchange_id"];

if ( $get_option_status == "" ){ $get_option_status = "off"; }

if ($get_exchange_id != "" ){ 

$input_array = array(
"exchange_id"=>"$get_exchange_id" , 
"exchange_rate_baht"=>"$get_exchange_rate_baht" , 
"exchange_rate"=>"$get_exchange_rate" , 

"option_order"=>"$get_option_order" , 
"option_status"=>"$get_option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $app_exchange_rate->function_update_option( $input_array );
$show_status = $result_update["show_status"];

} ///if ($get_exchange_id != "" ){ 


}///  loop
} /// count

header("Location:exchange_rate_update.php?show_status=$show_status"); 


} //// if ($appaction == "update_information") {
////////////////////////############## PROCESS UPDATE  END




$input_array = array(
"sql_orderby"=>"  order by  option_order  ASC  " , 
);
$exchange_count_row = $app_exchange_rate->function_countbyset( $input_array );


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


$page_topic_name = " บันทึก/แก้ไข อัตราแลกเปลี่ยน "; 
include("../app_system/include/inc_body_system_topic.php");



/////////// status report
include("../app_system/include/inc_report_status.php");


?>



<table width="100%" border="0" cellpadding="0" cellspacing="4">
  <tr>
    <td align="right" valign="middle"><?
if ($exchange_count_row > 0 ){ 
?>
 &nbsp;  <input name="imageField" type="image" id="imageField" src="../images/icon/design_icon_save.gif" alt="บันทึกการแก้ไข..."  onclick="return confirm('กรุณายืนยันการบันทึกข้อมูล ... ')"  />
 <?
} ///config_count_row
 ?>
 
 
 
    </td>
  </tr>
</table>






<?



if ($exchange_count_row == 0 ){ 
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
     <td align="center" valign="middle" bgcolor="#999999"  style="padding:5px; background-color:#999999;width:200px;">Name</td>
     <td align="left" valign="middle" bgcolor="#999999"  style="padding:5px; background-color:#999999;">&nbsp;Des</td>
     <td align="center" valign="middle" bgcolor="#999999"  style="padding:5px; background-color:#999999; width:100px;">Baht</td>
     <td align="center" valign="middle" bgcolor="#999999"  style="padding:5px; background-color:#999999; width:100px;">Rate</td>
     <td align="center" valign="middle" bgcolor="#999999"  style="padding:5px; background-color:#999999; width:100px;">Option</td>
     </tr>       

<?


$exchange_rs = $app_exchange_rate->function_viewbyset( $input_array ); /// select ข้อมูล

if ($exchange_count_row > 0 ) { 

$lv1_count_loop = 0 ;
while($rs = $exchange_rs->FetchRow()){ /////// loop 
$lv1_count_loop = $lv1_count_loop + 1  ;

///////////////// set value
$exchange_id = $rs["exchange_id"];
$exchange_name = $rs["exchange_name"];
$exchange_des = $rs["exchange_des"];
$exchange_rate_baht = $rs["exchange_rate_baht"];
$exchange_rate = $rs["exchange_rate"];

$exchange_image = $rs["exchange_image"];
$exchange_rate = $rs["exchange_rate"];
$exchange_rate = $rs["exchange_rate"];
$option_order = $rs["option_order"];
$option_status = $rs["option_status"];



?>

<tr>
<td align="center" valign="middle" bgcolor="#FFFFFF"  style=""><?=$lv1_count_loop ?></td>
<td align="center" valign="middle" bgcolor="#FFFFFF"  style="" >

<?

print "<input   type=\"hidden\" name=\"exchange_id[]\"  id=\"exchange_id[]\" value=\"$exchange_id\" />";
print "<input   type=\"text\"  name=\"option_order_$exchange_id\" id=\"option_order_$lang_config_id\" value=\"$option_order\"  style=\"width:40px;text-align:center;\" />";

?>   
 
</td>
<td align="center" valign="middle" bgcolor="#FFFFFF"  style="">
<?

print "<b>$exchange_name</b>";

?>
 </td>
  <td align="left" valign="middle" bgcolor="#FFFFFF"  style="">
<?
print "&nbsp; $exchange_des";
?>
    
  </td>
  <td align="center" valign="middle" bgcolor="#FFFFFF"  style="">
<?
print "<input   type=\"text\"  name=\"exchange_rate_baht_$exchange_id\" id=\"exchange_rate_baht_$lang_config_id\" value=\"$exchange_rate_baht\"  style=\"width:70px;text-align:center;\" />";
?>
  </td>
  <td align="center" valign="middle" bgcolor="#FFFFFF"  style="">
<?
print "<input   type=\"text\"  name=\"exchange_rate_$exchange_id\" id=\"exchange_rate_$lang_config_id\" value=\"$exchange_rate\"  style=\"width:70px;text-align:center;\" />";
?>
  </td>
  <td align="center" valign="middle" bgcolor="#FFFFFF"  style="">
    
  <?

if ($option_status == "on" ){ $option_checked = "checked";  } else { $option_checked = "";  }
print " <input type=\"checkbox\" name=\"option_status_$exchange_id\" id=\"option_status_$exchange_id\"  value=\"on\"  $option_checked /> ออนไลน์ ";

?>
    
  </td>
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
  
<input  type="hidden" name="appaction_exchange"  id="appaction_exchange" value="update_information" />

</form>
</table>


<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>