<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/banner/adsbanner_showall.php";
include("../app_system/include/inc_checklogin_user.php"); 


$system_id = "app_ads_banner";

if (empty( $_REQUEST["appaction_showall_banner"] ) )  {  $appaction_showall_banner = "";  } else { $appaction_showall_banner = $_REQUEST["appaction_showall_banner"]; }
if (empty( $_REQUEST["banner_id"] ) )  {  $banner_id = "";  } else { $banner_id = $_REQUEST["banner_id"]; }
if (empty( $_REQUEST["category_id"] ) )  {  $category_id = "";  } else { $category_id = $_REQUEST["category_id"]; }
if (empty( $_REQUEST["option_delete"] ) )  {  $option_delete = "none";  } else { $option_delete = $_REQUEST["option_delete"]; }



////////////////////////############## PROCESS UPDATE 

//// delete
if ($option_delete == "delete" and $banner_id != "" ) {

$input_array = array(
"banner_id"=>"$banner_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $app_ads_banner->function_delete( $input_array );
$show_status = $result_delete["show_status"];

header("Location:adsbanner_showall.php?category_id=$category_id&id_pager=$id_pager&show_status=success"); 

}
//// delete end




//// update information
if ($appaction_showall_banner == "update_information") {
if (empty( $_REQUEST["array_banner_id"] ) )  {  $array_banner_id = array();  } else { $array_banner_id = $_REQUEST["array_banner_id"]; }

$count_array_banner_id = count($array_banner_id);
if ($count_array_banner_id > 0 ) {  /// count 

$loop_id_start  =  0 ; 
foreach ($array_banner_id as $index => $loop_temp  ){ /// loop category
$loop_id_start ++ ;  
$loop_id = $loop_id_start  - 1 ;  

$get_banner_id = $array_banner_id["$loop_id"];

$get_option_order = $_REQUEST["option_order_$get_banner_id"];
$get_option_approve = $_REQUEST["option_approve_$get_banner_id"];
$get_option_status = $_REQUEST["option_status_$get_banner_id"];
$get_option_delete = $_REQUEST["option_delete_$get_banner_id"];


if ($get_option_order == "" ) { $get_option_order= "0"; }
if ($get_option_approve == "" ) { $get_option_approve= "none"; }
if ($get_option_status == "" ) { $get_option_status= "off"; }


if ($get_banner_id != "" ) { 
$input_array = array(
"banner_id"=>"$get_banner_id" , 
"option_order"=>"$get_option_order" , 
"option_approve"=>"$get_option_approve" , 
"option_status"=>"$get_option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $app_ads_banner->function_update_option( $input_array );
} //// get_category_id




////////////// get_option_delete
if ($get_option_delete=="delete"){ 

$input_array = array(
"banner_id"=>"$get_banner_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $app_ads_banner->function_delete( $input_array );
///$show_status = $result_delete["show_status"];


} //// delete



} //// loop
} //// count

header("Location:adsbanner_showall.php?category_id=$category_id&id_pager=$id_pager&show_status=success"); 

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
<title>Banner Showall</title>
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


$page_topic_name = "แสดงรายการข้อมูล ป้ายโฆษณา  ทั้งหมด "; 
include("../app_system/include/inc_body_system_topic.php");







?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF" ><table border="0" cellpadding="0" cellspacing="5">
      <tr>
        <td width="164" align="center" valign="top"><a href="adsbanner_showall.php?category_id=<?=$category_id?>"><img src="../images/icon/icon_all.gif" width="164" height="35" hspace="0" vspace="0" /></a></td>
        <td width="164" align="center" valign="top"><input name="imageField" type="image" id="imageField" src="../images/icon/design_icon_save.gif" alt="บันทึกการแก้ไข..."  onclick="return confirm('กรุณายืนยันการบันทึกข้อมูล ... ')"  /></td>
        <td width="60" align="center" valign="top" style=""><a href="adsbanner_update.php?category_id=<?=$category_id?>"><img src="../images/icon/design_icon_add.gif" alt="เพิ่ม" width="164" height="35" border="0" /></a></td>
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
"category_id"=>"$category_id" ,
);
$content_count_row = $app_ads_banner->function_countbyset( $input_array );



if ($content_count_row == 0 ) { 

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
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"  ><b>ลำดับ</b></td>
          <td  bgcolor="#999999" class="text_normal1" ><b>&nbsp;รายการ banner</b></td>
          <td width="100" align="center" bgcolor="#999999"   style="width:250px;" class="text_normal1"><b>Option</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"><b>แก้ไข</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"><b>ลบ</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1" ><b>ลบ</b></td>
          </tr>
        

<?




///////////////////////////////////////////////////////////////////////////// pager
$set_pager_limit = 10 ; //// จำนวนต่อหน้า
$set_pager_start =  0 ; //// เริ่มต้นที่ id ลำดับที่

$set_pager_count_data = $content_count_row ; /// edit
$set_pager_total  =  ( $set_pager_count_data /  $set_pager_limit ); 
$set_pager_total = ceil($set_pager_total); 

if ($id_pager == ""  or $id_pager == 0  ) { $id_pager = 1 ;  } /// lower
if ($id_pager > $set_pager_total   ) { $id_pager = $set_pager_total ;  } /// heigher

if ($id_pager > 1 ) {
$number_n = $id_pager - 1 ; 
$set_pager_start =  $set_pager_limit * $number_n  ; 
}

$set_pager_url = "adsbanner_showall.php?category_id=$category_id&" ;
/// $set_pager_value = "category_id=$category_id&" ;  
///////////////////////////////////////////////////////////////////////////// pager end


$input_array = array(
"set_pager_limit"=>"$set_pager_limit" , 
"set_pager_start"=>"$set_pager_start" , 

"category_id"=>"$category_id" ,
);
$banner_rs = $app_ads_banner->function_viewbyset( $input_array ); /// select ข้อมูล


$count_loop = 0 ;
while($rs = $banner_rs->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;

/*
//// row style 1
if ($id_pager > 0 ) { 
$count_row_number = $lv1_count_loop ; /// edit
$show_number = $set_pager_count_data - ( $set_pager_start + $count_row_number )  ; 
$show_number = $show_number + 1 ; 
}
*/


if ($id_pager > 0 ) { 
$count_row_number = $count_loop ; /// edit
$show_number =  ( $set_pager_start + $count_row_number ) - 1  ; 
$show_number = $show_number + 1 ; 
}


///////////////// set value
$banner_id = $rs["banner_id"];
$category_id = $rs["category_id"];

$banner_name = $rs["banner_name"];
$banner_des = $rs["banner_des"];

$banner_company = $rs["banner_company"];
$banner_company_contact = $rs["banner_company_contact"];
$banner_position = $rs["banner_position"];
$banner_url = $rs["banner_url"];
$banner_type = $rs["banner_type"];
$banner_code = $rs["banner_code"];
$banner_code = $rs["banner_code"];
$banner_image = $rs["banner_image"];




$datetime_start = $rs["datetime_start"];
$datetime_end = $rs["datetime_end"];


$stat_view = $rs["stat_view"];

$option_order = $rs["option_order"];
$option_approve = $rs["option_approve"];
$option_status = $rs["option_status"];

$datetime_create = $rs["datetime_create"];
$datetime_update = $rs["datetime_update"];


if ($banner_des != "" ) { $banner_des = "<br> <font color=#666666>$banner_des </font>";}
if ($option_status == "on" ) {$option_status_text = "ออนไลน์"; }
if ($option_status == "off" ) {$option_status_text = "ออฟไลน์"; }


if ($banner_url != "" ){ $banner_url = "<br>URL : $banner_url "; }

$show_banner_image = ""; 
if ($banner_image != "" ){
$show_banner_image = "<br><a href=\"$path_adsbanner$banner_image\"  target=_blank ><img src=\"$path_adsbanner$banner_image\"  border=0  border=0 ></a><br>"; 
}///banner_image

print " <input type=\"hidden\"  name=\"array_banner_id[]\"  id=\"array_banner_id[]\" value=\"$banner_id\" />";
?>
        
        <tr class="text_normal1">
          <td height="30" align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?=$show_number ?>.</td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?
print "<input  type=\"text\"  name=\"option_order_$banner_id\"  id=\"option_order_$banner_id\" style=\"width:35px;text-align:center\" value=\"$option_order\" size=\"25\" />";
?></td>
          <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"  >
            
            <b><?=$banner_name ?></b>
            <?=$banner_des ?>
  <?=$banner_url ?>
            
  <?=$show_banner_image ; ?>
            
          </td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >
            
            <?





if ($option_approve == "approve" ) { $option_approve_checked = "checked"; }  else { $option_approve_checked = ""; }
print "<input type=\"checkbox\" name=\"option_approve_$banner_id\" id=\"option_approve_$banner_id\"  $option_approve_checked     value=\"approve\"  />อนุมัติโดย Admin (Approve)<br />";



if ($option_status == "on" ) { $option_status_checked = "checked"; }  else { $option_status_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$banner_id\" id=\"option_status_$banner_id\"  $option_status_checked  value=\"on\"  />";

?>
            <font color="#009900"><b><?=$option_status_text ?>           
            </b></font></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><a href="adsbanner_update.php?<? print "banner_id=$banner_id"; ?>"><img src="../images/icon/icon_mini_update.gif" width="25" height="25" /></a></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >
            
            
  <a href="adsbanner_showall.php?<? print "banner_id=$banner_id&option_delete=delete&category_id=$category_id" ; ?>"   onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')"  ><img src="../images/icon/icon_mini_delete.gif" width="25" height="25" border="0"  /></a>
            
</td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?

print "<input  type=\"checkbox\" name=\"option_delete_$banner_id\" id=\"option_delete_$banner_id\" value=\"delete\" />";

?></td>
          </tr>
        
<?


/////////////////////// level 1 end loop
} //////////// loop end
?>

      </table>
      <table width="100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table>



<?

if ($set_pager_total > 1 ){ 
include("../app_system/include/inc_pager.php"); 
}
?>


      <table width="100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table>
      
      
      
      
<?

} ////////////// end 



?>
      
      
      
    </td>
  </tr>
  <input type="hidden" name="category_id"  id="category_id" value="<?=$category_id?>" />
<input  type="hidden" name="appaction_showall_banner"  id="appaction_showall_banner" value="update_information" />

<input type="hidden" name="id_pager"  id="id_pager" value="<?=$id_pager?>" />

</form>
</table>




<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>



