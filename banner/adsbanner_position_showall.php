<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/banner/adsbanner_position_showall.php";
include("../app_system/include/inc_checklogin_user.php"); 


$system_id = "app_ads_banner";

if (empty($_REQUEST["appaction_showall_banner"]) ) {  $appaction_showall_banner="";  } else { $appaction_showall_banner=$_REQUEST["appaction_showall_banner"];  }
if (empty( $_REQUEST["position_id"] ) )  {  $position_id = "";  } else { $position_id = $_REQUEST["position_id"]; }
if (empty( $_REQUEST["section_id"] ) )  {  $section_id = "";  } else { $section_id = $_REQUEST["section_id"]; }
if (empty( $_REQUEST["category_id"] ) )  {  $category_id = "";  } else { $category_id = $_REQUEST["category_id"]; }
if (empty( $_REQUEST["option_delete"] ) )  {  $option_delete = "none";  } else { $option_delete = $_REQUEST["option_delete"]; }


if (empty( $_REQUEST["search_submit"] ) )  {  $search_submit = "";  } else { $search_submit = $_REQUEST["search_submit"]; }
if (empty( $_REQUEST["search_keyword"] ) )  {  $search_keyword = "";  } else { $search_keyword = $_REQUEST["search_keyword"]; }


/// print "search_submit = $search_submit <br>";


////////////////////////############## PROCESS UPDATE 

//// delete
if ($option_delete == "delete" and $position_id != "" ) {

$input_array = array(
"position_id"=>"$position_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $app_ads_banner_position->function_delete( $input_array );
$show_status = $result_delete["show_status"];

header("Location:adsbanner_position_showall.php?section_id=$section_id&id_pager=$id_pager&show_status=success"); 

}
//// delete end




//// update information
if ($appaction_showall_banner == "update_information"   and  $search_submit != "search") {
if (empty( $_REQUEST["array_position_id"] ) )  {  $array_position_id = array();  } else { $array_position_id = $_REQUEST["array_position_id"]; }

$count_array_position_id = count($array_position_id);
if ($count_array_position_id > 0 ) {  /// count 

$loop_id_start  =  0 ; 
foreach ($array_position_id as $index => $loop_temp  ){ /// loop category
$loop_id_start ++ ;  
$loop_id = $loop_id_start  - 1 ;  

$get_position_id = $array_position_id["$loop_id"];

$get_page_id = $_REQUEST["page_id_$get_position_id"];
$get_position_code = $_REQUEST["position_code_$get_position_id"];
$get_position_name = $_REQUEST["position_name_$get_position_id"];
$get_option_order = $_REQUEST["option_order_$get_position_id"];
$get_option_status = $_REQUEST["option_status_$get_position_id"];
$get_option_delete = $_REQUEST["option_delete_$get_position_id"];


if ($get_option_order == "" ) { $get_option_order= "0"; }
if ($get_option_status == "" ) { $get_option_status= "off"; }


if ($get_position_id != "" ) { 
$input_array = array(
"position_id"=>"$get_position_id" , 
"page_id"=>"$get_page_id" , 
"position_code"=>"$get_position_code" , 
"position_name"=>"$get_position_name" , 
"option_order"=>"$get_option_order" , 
"option_status"=>"$get_option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $app_ads_banner_position->function_update_option( $input_array );
} //// get_category_id




////////////// get_option_delete
if ($get_option_delete=="delete"){ 

$input_array = array(
"position_id"=>"$get_position_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $app_ads_banner_position->function_delete( $input_array );
///$show_status = $result_delete["show_status"];


} //// delete



} //// loop
} //// count

header("Location:adsbanner_position_showall.php?section_id=$section_id&id_pager=$id_pager&show_status=success"); 

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
<title>Banner Position</title>
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


$page_topic_name = "แสดงรายการข้อมูล ตำแหน่งโฆษณา ทั้งหมด "; 
include("../app_system/include/inc_body_system_topic.php");







?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF" ><table border="0" cellpadding="0" cellspacing="5">
      <tr>
        <td width="60" align="center"><a href="adsbanner_position_showall.php?section_id=<?=$section_id ?>"><img src="../images/icon/design_showall.gif" width="164" height="35" hspace="5" /></a></td>
        <td width="164" align="center" valign="top"><input name="imageField" type="image" id="imageField" src="../images/icon/design_icon_save.gif" alt="บันทึกการแก้ไข..."  onclick="return confirm('กรุณายืนยันการบันทึกข้อมูล ... ')"  /></td>
        <td width="60" align="center" valign="top" style=""><a href="adsbanner_position_update.php?category_id=<?=$category_id?>"><img src="../images/icon/design_icon_add.gif" alt="เพิ่ม" width="164" height="35" border="0" /></a></td>
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

///
include("../app_system/include/inc_report_status.php");

?>
      
      
      
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#EEEEEE"><table border="0" cellpadding="0" cellspacing="2">
            <tr>
              <td width="145" align="right"><span class="text_normal1">ค้นหาข้อมูลจาก :</span></td>
              <td><input name="search_keyword" type="text" id="search_keyword" size="45"  value="<?=$search_keyword ?>"/></td>
              <td>
                <input type="submit" name="search_submit" id="search_submit" value="search" />
                </td>
              <td>
                <input type="reset" name="button5" id="button6" />
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

/// print "search_submit = $search_submit ";

if ($search_submit == "search" ){
$sql_other = "

AND ( 
position_code 			LIKE  '%$search_keyword%'
OR	page_id		 		LIKE  '%$search_keyword%'
OR	position_name 	LIKE  '%$search_keyword%'
OR	position_des 		LIKE  '%$search_keyword%'
)

"; 
}


$input_array = array(
"section_id"=>"$section_id" ,
"sql_other"=>"$sql_other" ,
);
$count_row = $app_ads_banner_position->function_countbyset( $input_array );



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
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"  ><b>ลำดับ</b></td>
          <td align="center"  bgcolor="#999999" class="text_normal1"  style="width:250px;"  ><b>page_id</b></td>
          <td width="70" align="center" bgcolor="#999999"   style="width:150px;" class="text_normal1"><b>position_code </b></td>
          <td  bgcolor="#999999" class="text_normal1" ><b>&nbsp;ชื่อตำแหน่งโฆษณา </b></td>
          <td width="130" align="center" bgcolor="#999999"   style="width:130px;" class="text_normal1"><b>ขนาด</b></td>
          <td width="130" align="center" bgcolor="#999999"   style="width:130px;" class="text_normal1"><b>Option</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"><b>แก้ไข</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"><b>ลบ</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1" ><b>ลบ</b></td>
          </tr>
        

<?




///////////////////////////////////////////////////////////////////////////// pager
$set_pager_limit = 100 ; //// จำนวนต่อหน้า
$set_pager_start =  0 ; //// เริ่มต้นที่ id ลำดับที่

$set_pager_count_data = $count_row ; /// edit
$set_pager_total  =  ( $set_pager_count_data /  $set_pager_limit ); 
$set_pager_total = ceil($set_pager_total); 

if ($id_pager == ""  or $id_pager == 0  ) { $id_pager = 1 ;  } /// lower
if ($id_pager > $set_pager_total   ) { $id_pager = $set_pager_total ;  } /// heigher

if ($id_pager > 1 ) {
$number_n = $id_pager - 1 ; 
$set_pager_start =  $set_pager_limit * $number_n  ; 
}

$set_pager_url = "adsbanner_position_showall.php?section_id=$section_id&" ;
/// $set_pager_value = "category_id=$category_id&" ;  
///////////////////////////////////////////////////////////////////////////// pager end





$input_array = array(
"set_pager_limit"=>"$set_pager_limit" , 
"set_pager_start"=>"$set_pager_start" , 

"section_id"=>"$section_id" ,
"sql_other"=>"$sql_other" ,
"sql_orderby"=>" ORDER BY option_order ASC " ,
);
$banner_rs = $app_ads_banner_position->function_viewbyset( $input_array ); /// select ข้อมูล


$count_loop = 0 ;
while($rs = $banner_rs->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;



if ($id_pager > 0 ) { 
$count_row_number = $count_loop ; /// edit
$show_number =  ( $set_pager_start + $count_row_number ) - 1  ; 
$show_number = $show_number + 1 ; 
}


///////////////// set value
$position_id = $rs["position_id"];
$loop_section_id = $rs["section_id"];
$category_id = $rs["category_id"];
$page_id = $rs["page_id"];

$position_code = $rs["position_code"];
$position_name = $rs["position_name"];
$position_des = $rs["position_des"];
$position_url = $rs["position_url"];

$position_loop = $rs["position_loop"];
$position_w = $rs["position_w"];
$position_h = $rs["position_h"];

$option_order = $rs["option_order"];
$option_status = $rs["option_status"];

$datetime_create = $rs["datetime_create"];
$datetime_update = $rs["datetime_update"];



if ($position_code != "" ) { $position_code = "$position_code";}
if ($position_des != "" ) { $position_des = "<br> <font color=#333333>$position_des </font>";}
if ($option_status == "on" ) {$option_status_text = "ออนไลน์"; }
if ($option_status == "off" ) {$option_status_text = "ออฟไลน์"; }





print " <input type=\"hidden\"  name=\"array_position_id[]\"  id=\"array_position_id[]\" value=\"$position_id\" />";
?>
        
        <tr class="text_normal1">
          <td height="30" align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?=$show_number ?>.</td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?
print "<input  type=\"text\"  name=\"option_order_$position_id\"  id=\"option_order_$position_id\" style=\"width:35px;text-align:center\" value=\"$option_order\" size=\"25\" />";
?></td>
          <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"  >
<?
print "<input  type=\"text\"  name=\"page_id_$position_id\"  id=\"page_id_$position_id\" style=\"width:250px;\" value=\"$page_id\" size=\"25\"  />";
?>
          </td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >
<?
print "<input  type=\"text\"  name=\"position_code_$position_id\"  id=\"position_code_$position_id\" style=\"width:200px;\" value=\"$position_code\" size=\"25\"  />";
?>
</td>
          <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"  >
<?
print "<input  type=\"text\"  name=\"position_name_$position_id\"  id=\"position_name_$position_id\" style=\"width:200px;\" value=\"$position_name\" size=\"25\"  />";
?>

            
          </td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><?=$position_w?> x <?=$position_h?></td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >
            
            <?




if ($option_status == "on" ) { $option_status_checked = "checked"; }  else { $option_status_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$position_id\" id=\"option_status_$position_id\"  $option_status_checked  value=\"on\"  />";

?>
            <font color="#009900"><b><?=$option_status_text ?>           
            </b></font></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><a href="adsbanner_position_update.php?<? print "position_id=$position_id"; ?>"><img src="../images/icon/icon_mini_update.gif" width="25" height="25" /></a></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><a href="adsbanner_position_showall.php?<? print "position_id=$position_id&option_delete=delete&category_id=$category_id" ; ?>"   onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')"  ><img src="../images/icon/icon_mini_delete.gif" width="25" height="25" border="0"  /></a></td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?

print "<input  type=\"checkbox\" name=\"option_delete_$position_id\" id=\"option_delete_$position_id\" value=\"delete\" />";

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
include("../gears/include/inc_pager.php"); 
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



