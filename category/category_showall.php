<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/category/category_showall.php";
include("../app_system/include/inc_checklogin_user.php"); 

include("../category/inc_array_category.php"); 


if (empty( $_REQUEST["show_status"] ) )  {  $show_status = "";  } else { $show_status = $_REQUEST["show_status"]; }
if (empty( $_REQUEST["category_appaction_showall"] ) )  {  $category_appaction_showall = "";  } else { $category_appaction_showall = $_REQUEST["category_appaction_showall"]; }

///if (empty( $_REQUEST["system_id"] ) )  {  $system_id = array();  } else { $system_id = $_REQUEST["system_id"]; }
if (empty( $_REQUEST["system_id"] ) )  {  $system_id = "";  } else { $system_id = $_REQUEST["system_id"]; }


///print "system_id = $system_id ";


$show_set_categoryname = ""; 
if ($system_id != "" ){ 
$show_set_categoryname = $system_info["$system_id"]["name_th"];
}





////////////////////////############## PROCESS UPDATE 

if (empty( $_REQUEST["category_id"] ) )  	{  $category_id = "";  } else { $category_id = $_REQUEST["category_id"]; }
if (empty( $_REQUEST["option_delete"] ) ) 	{  $option_delete = "";  } else { $option_delete = $_REQUEST["option_delete"]; }



//// delete
if ($option_delete == "delete" and $category_id != "" ) {

$input_array = array(
"category_id"=>"$category_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $app_category->function_delete( $input_array );
$show_status = $result_delete["show_status"];

$input_array = array(
"category_id_root"=>"$category_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $app_category->function_delete_byroot( $input_array );
$show_status = $result_delete["show_status"];

header("Location:category_showall.php?system_id=$system_id&show_status=success"); 

}
//// delete end




//// update information
if ($category_appaction_showall=="update_information") {
	
if (empty( $_REQUEST["category_id"] ) )  {  $category_id = array();  } else { $category_id = $_REQUEST["category_id"]; }

$count_category_id = count($category_id);
if ($count_category_id > 0 ) {  /// count 

$loop_id_start  =  0 ; 
foreach ($category_id as $index => $loop_temp  ){ /// loop category
$loop_id_start ++ ;  
$loop_id = $loop_id_start  - 1 ;  

$get_category_id = $category_id["$loop_id"];
$get_option_order = $_REQUEST["option_order_$get_category_id"];
$get_option_status = $_REQUEST["option_status_$get_category_id"];
$get_option_delete = $_REQUEST["option_delete_$get_category_id"];
$get_option_show_index = $_REQUEST["option_show_index_$get_category_id"];


if ($get_option_status == "" ) 				{ $get_option_status= "off"; }
if ($get_option_order == "" ) 				{ $get_option_order= "0"; }
if ($get_option_show_index == "" ) 		{ $get_option_show_index= "none"; }



if ($get_category_id != "" ) { 
$input_array = array(
"category_id"=>"$get_category_id" , 
"option_status"=>"$get_option_status" , 
"option_order"=>"$get_option_order" , 
"option_show_index"=>"$get_option_show_index" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $app_category->function_update_option( $input_array );
} //// get_category_id




////////////// get_option_delete
if ($get_option_delete=="delete"){ 

$input_array = array(
"category_id"=>"$get_category_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $app_category->function_delete( $input_array );
///$show_status = $result_delete["show_status"];

$input_array = array(
"category_id_root"=>"$get_category_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $app_category->function_delete_byroot( $input_array );
///$show_status = $result_delete["show_status"];

} //// delete



} //// loop
} //// count

header("Location:category_showall.php?system_id=$system_id&show_status=success"); 

}/////////
//// update information end





////////////////////////############## PROCESS VIEW 
////////// config by process
/// form set
$input_array = array(
"system_id"=>"$system_id" , 
"category_level"=>"1" , 
"sql_orderby"=>" ORDER BY option_order  ASC " ,
);
$category_count_row = $app_category->function_countbyset( $input_array );
$category_rs = $app_category->function_viewbyset( $input_array ); /// select ข้อมูล





////////////////////////############## PROCESS CONFIG 


$show_content_pagename = "หน้าหลักระบบจัดการ"; 
$show_content_header = ""; 
$show_content_center = ""; 

////////// config by page
$show_pagetitle = ":: $show_content_pagename "; 


$system_id_this  = $system_id ; 
/// print "system_id = $system_id ";


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category Showall</title>
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






<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7"><form id="form1" name="form1" method="post" action="">
  <tr>
    <td height="650" align="left" valign="top">
    

<?


$page_topic_name = "แสดงรายการ ข้อมูลหมวดหมู่(Category) ทั้งหมด "; 
include("../app_system/include/inc_body_system_topic.php");






if ($system_id != ""  and  $system_id != "none" ) { 

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF" ><table border="0" cellpadding="0" cellspacing="5">
      <tr>
        <td width="164" align="center" valign="top"><a href="category_showall.php?system_id=<?=$system_id?>"><img src="../images/icon/icon_all.gif" width="164" height="35" hspace="0" vspace="0" /></a></td>
        <td width="164" align="center" valign="top"><input name="imageField" type="image" id="imageField" src="../images/icon/design_icon_save.gif" alt="บันทึกการแก้ไข..."  onclick="return confirm('กรุณายืนยันการบันทึกข้อมูล ... ')"  /></td>
        
<?
if ($system_id != "" ){ 
?>   
        <td width="60" align="center" valign="top" ><a href="category_update.php?system_id=<?=$system_id?>"><img src="../images/icon/design_icon_add.gif" alt="เพิ่ม" width="164" height="35" border="0" /></a></td>
<?
} ///if ($system_id != "" ){ 
?>
        
        
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
} //////////////

//// $show_status = "success"; 
include("../app_system/include/inc_report_status.php");

?>
      
      
      
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
        <tr>
          <td height="30" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#EEEEEE"><table width="100%" border="0" cellpadding="0" cellspacing="4">
            <tr>
              <td align="left"  class="text_big2" >&nbsp;<?=$show_set_categoryname ?></td>
              <td width="200" align="right"><span class="text_normal1">กรุณาเลือกระบบ :</span></td>
              <td width="1">
                
                <?

/////////////////////////// select


$count_system_data = count($system_data);
if ($count_system_data > 0 ){ 

print "<select name=\"select_system\" id=\"select_system\" onchange=\"MM_jumpMenu('parent',this,0)\"  class=\"text_normal1\" style=\"width:250px;\">"; 
print "<option value=\"category_showall.php\" selected>กรุณาเลือกระบบ ... </option>"; 

foreach ($system_data as $key1 => $rs){

$loop_system_id = $rs["system_id"];
$loop_id = $system_info["$loop_system_id"]["id"];
$loop_name_th = $system_info["$loop_system_id"]["name_th"];
$loop_name_en = $system_info["$loop_system_id"]["name_en"];

if ($loop_system_id == $system_id  ){ $loop_selected = "selected"; } else { $loop_selected = ""; }
print "<option value=\"category_showall.php?system_id=$loop_system_id\"  $loop_selected > - $loop_name_th </option>"; 

}/// loop
print "</select>"; 
}/// count




/////////////////////////// select end
?>
                
                
                
                
                
                
                
                
                
                
                
                
                
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

/// print "system_id = $system_id ";

if ($system_id == ""  or  $system_id == "none" ) { 
?>
<table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="#999999">
<tr>
  <td height="150" align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#EEEEEE">
          
<span class="text_big2">กรุณาเลือกระบบ ที่ต้องการจัดการข้อมูลหมวดหมู่</span><br />
<br />


<?



$count_system_data = count($system_data);
if ($count_system_data > 0 ){ 


?>

<table width="700" border="1">
  <tr>
    <td width="50" height="30" align="center" bgcolor="#CCCCCC"><span class="text_bot1"><b>#</b></span></td>
    <td bgcolor="#CCCCCC"><span class="text_bot1"><b>ระบบ</b></span></td>
    <td width="80" align="center" bgcolor="#CCCCCC"><span class="text_bot1"><b>จัดการ</b></span></td>
  </tr>
<?

$loop_count = 0 ; 
foreach ($system_data as $key1 => $rs){
$loop_count = $loop_count + 1 ; 

$loop_system_id = $rs["system_id"];
$loop_id = $system_info["$loop_system_id"]["id"];
$loop_name_th = $system_info["$loop_system_id"]["name_th"];
$loop_name_en = $system_info["$loop_system_id"]["name_en"];


?>
  
  <tr>
    <td height="35" align="center" bgcolor="#FFFFFF"><span class="text_bot1">
      <?=$loop_count ?>
    </span></td>
    <td align="left" valign="middle" bgcolor="#FFFFFF"><span class="text_bot1">
      <?=$loop_name_th ?>
    </span></td>
    <td align="center" bgcolor="#FFFFFF"><a href="category_showall.php?system_id=<?=$loop_system_id ?>"><span class="text_bot1">จัดการ</span></a></td>
  </tr>
<?


}/// loop

}/// count



?>
</table>
<br />
<br /></td>
</tr>
</table>
      
<?

} else { ///if ($system_id == "" ) { 



if ($category_count_row == 0 ) { 

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
          <td bgcolor="#999999" class="text_normal1" ><b>&nbsp;Category Detail </b></td>
          <td width="100" align="center" bgcolor="#999999"   style="width:150px;" class="text_normal1"><b>สถานะ</b></td>
          <td width="50" align="center" bgcolor="#999999"   style="width:50px;" class="text_normal1"><b>เปิด</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"><b>แก้ไข</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"><b>ลบ</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1" ><b>ลบ</b></td>
          </tr>
        

<?

$lv1_count_loop = 0 ;
while($rs = $category_rs->FetchRow()){ /////// loop 
$lv1_count_loop = $lv1_count_loop + 1  ;

///////////////// set value
$lv1_category_id = $rs["category_id"];
$lv1_category_name = $rs["category_name"];
$lv1_category_des = $rs["category_des"];
$lv1_category_image_mini = $rs["category_image_mini"];

$lv1_option_order = $rs["option_order"];
$lv1_option_status = $rs["option_status"];
$lv1_option_fixed = $rs["option_fixed"];

$lv1_option_show_index = $rs["option_show_index"];



if ($lv1_category_image_mini != "" ){
$lv1_category_image_mini = "<img src=\"$path_category$lv1_category_image_mini\"  align=\"right\"  >";	
}

if ($lv1_option_status == "on" ) {$lv1_option_status_text = "ออนไลน์"; }
if ($lv1_option_status == "off" ) {$lv1_option_status_text = "ออฟไลน์"; }


print " <input type=\"hidden\"  name=\"category_id[]\"  id=\"category_id[]\" value=\"$lv1_category_id\" />";
?>
        
        <tr class="text_normal1">
          <td height="30" align="center" valign="top" bgcolor="#D4D4D4"  style="padding:4px;"><?=$lv1_count_loop ?>.</td>
          <td align="center" valign="top" bgcolor="#D4D4D4"  style="padding:4px;">
            
            <?
print "<input  type=\"text\"  name=\"option_order_$lv1_category_id\"  id=\"option_order_$lv1_category_id\" style=\"width:35px;text-align:center\" value=\"$lv1_option_order\" size=\"25\" />";
?>
            
</td>
          <td align="left" valign="top" bgcolor="#D4D4D4" style="padding:4px;">
            
<?

print "$lv1_category_image_mini<b>$lv1_category_name </b><br>";
print $lv1_category_des ; 
///print "<input  type=\"text\"  name=\"category_des_$lv1_category_id\"  id=\"category_des_$lv1_category_id\" style=\"width:98%;\" value=\"$lv1_category_des\" size=\"50\" />";
?>
            
</td>
          <td  align="left" valign="top" bgcolor="#D4D4D4" style="padding:2px;" >
            
            <?

if ($lv1_option_status == "on" ) { $lv1_option_status_checked = "checked"; }  else { $lv1_option_status_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$lv1_category_id\" id=\"option_status_$lv1_category_id\"  $lv1_option_status_checked  value=\"on\"  /> $lv1_option_status_text <br> ";


/*

if ($lv1_option_show_index == "index" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_show_index_$lv1_category_id\" id=\"option_show_index_$lv1_category_id\"   value=\"index\"     $option_checked  />show index";

*/

?>
            
            
            
          </td>
          <td  align="center" valign="top" bgcolor="#D4D4D4" style="padding:2px;" ><img src="../images/icon/icon_mini_preview.gif" width="25" height="25" /></td>
          <td  align="center" valign="top" bgcolor="#D4D4D4" style="padding:2px;" ><a href="category_update.php?<? print "category_id=$lv1_category_id"; ?>"><img src="../images/icon/icon_mini_update.gif" width="25" height="25" /></a></td>
          <td  align="center" valign="top" bgcolor="#D4D4D4" style="padding:2px;" >
            
<?
if ($lv1_option_fixed != "fixed" ){ 

print "
<a href=\"category_showall.php?category_id=$lv1_category_id&option_delete=delete&system_id=$system_id\"   onclick=\"return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')\"  >
<img src=\"../images/icon/icon_mini_delete.gif\" width=\"25\" height=\"25\" border=\"0\"  /></a>
";

} /// option_fixed

 ?>
            
</td>
          <td align="center" valign="top" bgcolor="#D4D4D4"  style="padding:4px;"><?

if ($lv1_option_fixed != "fixed" ){ 
print "<input  type=\"checkbox\" name=\"option_delete_$lv1_category_id\" id=\"option_delete_$lv1_category_id\" value=\"delete\" />";
} /// option_fixed

?></td>
          </tr>
        

<?
/////////////////////// level 2

$input_array2 = array(
"system_id"=>"$system_id" , 
"category_id_root"=>"$lv1_category_id" , 
"category_level"=>"2" , 
"sql_orderby"=>" ORDER BY option_order  ASC " ,
);
$category_count_row2 = $app_category->function_countbyset( $input_array2 );
if ($category_count_row2 > 0 ){  //// count row
$category_rs2 = $app_category->function_viewbyset( $input_array2 ); /// select ข้อมูล

$lv2_count_loop = 0 ; 
while($rs2 = $category_rs2->FetchRow()){ /////// loop 
$lv2_count_loop = $lv2_count_loop + 1  ;

$lv2_category_id = $rs2["category_id"];
$lv2_category_name = $rs2["category_name"];
$lv2_category_des = $rs2["category_des"];
$lv2_category_image_mini = $rs2["category_image_mini"];

$lv2_option_order = $rs2["option_order"];
$lv2_option_status = $rs2["option_status"];
$lv2_option_fixed = $rs2["option_fixed"];

$lv2_option_show_index = $rs2["option_show_index"];


$lv2_count_loop_show = "$lv1_count_loop.$lv2_count_loop";
if ($lv2_option_status == "on" ) {$lv2_option_status_text = "ออนไลน์"; }
if ($lv2_option_status == "off" ) {$lv2_option_status_text = "ออฟไลน์"; }


if ($lv2_category_image_mini != "" ){
$lv2_category_image_mini = "<img src=\"$path_category$lv2_category_image_mini\"  align=\"right\"  >";	
}


print " <input type=\"hidden\"  name=\"category_id[]\"  id=\"category_id[]\" value=\"$lv2_category_id\" />";

?>
        <tr class="text_normal1">
          <td height="30" align="center" valign="top" bgcolor="#E1E1E1"  style="padding:4px;"><?=$lv2_count_loop_show ?></td>
          <td align="center" valign="top" bgcolor="#E1E1E1"  style="padding:4px;">
            
            <?
print "<input  type=\"text\"  name=\"option_order_$lv2_category_id\"  id=\"option_order_$lv2_category_id\" style=\"width:35px;text-align:center\" value=\"$lv2_option_order\" size=\"25\" />";
?>
            
          </td>
          <td align="left" valign="top" bgcolor="#E1E1E1" style="padding:4px;">
            
            <?
print "
$lv2_category_image_mini<b>$lv2_category_name</b><br>
$lv2_category_des
"; 
/// print "<input  type=\"text\"  name=\"category_des_$lv2_category_id\"  id=\"category_des_$lv2_category_id\" style=\"width:98%;\" value=\"$lv2_category_des\" size=\"50\" />";
?>
            
            
          </td>
          <td  align="left" valign="top" bgcolor="#E1E1E1" style="padding:2px;" >
            
  <?

if ($lv2_option_status == "on" ) { $lv2_option_status_checked = "checked"; }  else { $lv2_option_status_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$lv2_category_id\" id=\"option_status_$lv2_category_id\"   $lv2_option_status_checked   value=\"on\"   /> $lv2_option_status_text <br>";


/*
if ($lv2_option_show_index == "index" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_show_index_$lv2_category_id\" id=\"option_show_index_$lv2_category_id\"   value=\"index\"     $option_checked  />show index";
*/


?>
            
            
</td>
          <td  align="center" valign="top" bgcolor="#E1E1E1" style="padding:2px;" ><img src="../images/icon/icon_mini_preview.gif" width="25" height="25" /></td>
          <td  align="center" valign="top" bgcolor="#E1E1E1" style="padding:2px;" ><a href="category_update.php?<? print "category_id=$lv2_category_id"; ?>"><img src="../images/icon/icon_mini_update.gif" width="25" height="25" /></a></td>
          <td  align="center" valign="top" bgcolor="#E1E1E1" style="padding:2px;" >
          
<?

if ($lv2_option_fixed != "fixed" ){ 
print "
<a href=\"category_showall.php?category_id=$lv2_category_id&option_delete=delete&system_id=$system_id\"   onclick=\"return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')\"  >
<img src=\"../images/icon/icon_mini_delete.gif\" width=\"25\" height=\"25\" border=\"0\"  /></a>
";
} /// option_fixed

?>

          
          
          </td>
          <td align="center" valign="top" bgcolor="#E1E1E1"  style="padding:4px;">
<?

if ($lv2_option_fixed != "fixed" ){ 
print "<input  type=\"checkbox\" name=\"option_delete_$lv2_category_id\" id=\"option_delete_$lv2_category_id\"  value=\"delete\" />";
}////

?>

</td>
          </tr>
<?
/////////////////////// level 2 end


/////////////////////// level 3

$input_array3 = array(
"system_id"=>"$system_id" , 
"category_id_root"=>"$lv2_category_id" , 
"category_level"=>"3" , 
"sql_orderby"=>" ORDER BY option_order  ASC " ,
);
$category_count_row3 = $app_category->function_countbyset( $input_array3 );
if ($category_count_row3 > 0 ){  //// count row
$category_rs3 = $app_category->function_viewbyset( $input_array3 ); /// select ข้อมูล

$lv3_count_loop = 0 ; 
while($rs3 = $category_rs3->FetchRow()){ /////// loop 
$lv3_count_loop = $lv3_count_loop + 1  ;

$lv3_category_id = $rs3["category_id"];
$lv3_category_name = $rs3["category_name"];
$lv3_category_des = $rs3["category_des"];
$lv3_category_image_mini = $rs3["category_image_mini"];

$lv3_option_order = $rs3["option_order"];
$lv3_option_status = $rs3["option_status"];
$lv3_option_fixed = $rs3["option_fixed"];

$lv3_option_show_index = $rs3["option_show_index"];


$lv3_count_loop_show = "$lv1_count_loop.$lv2_count_loop.$lv3_count_loop";
if ($lv3_option_status == "on" ) {$lv3_option_status_text = "ออนไลน์"; }
if ($lv3_option_status == "off" ) {$lv3_option_status_text = "ออฟไลน์"; }


if ($lv3_category_image_mini != "" ){
$lv3_category_image_mini = "<img src=\"$path_category$lv3_category_image_mini\"  align=\"right\"  >";	
}



print " <input type=\"hidden\"  name=\"category_id[]\"  id=\"category_id[]\" value=\"$lv3_category_id\" />";

?>
        <tr class="text_normal1">
          <td height="30" align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?=$lv3_count_loop_show ?></td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;">
            
            
            <?
print "<input  type=\"text\"  name=\"option_order_$lv3_category_id\"  id=\"option_order_$lv3_category_id\" style=\"width:35px;text-align:center\" value=\"$lv3_option_order\" size=\"25\" />";
?>
            
</td>
          <td align="left" valign="top" bgcolor="#FFFFFF" style="padding:4px;">
            
            
            <?
print "
$lv3_category_image_mini
<b>$lv3_category_name</b><br>
$lv3_category_des
";
////print "<input  type=\"text\"  name=\"category_des_$lv3_category_id\"  id=\"category_des_$lv3_category_id\" style=\"width:98%;\" value=\"$lv3_category_des\" size=\"50\" />";
?>
            
            
            
            
          </td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >
            
            <?


if ($lv3_option_status == "on" ) { $lv3_option_status_checked = "checked"; }  else { $lv3_option_status_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$lv3_category_id\" id=\"option_status_$lv3_category_id\"  $lv3_option_status_checked  value=\"on\"  /> $lv3_option_status_text <br>";

/*
if ($lv3_option_show_index == "index" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_show_index_$lv3_category_id\" id=\"option_show_index_$lv3_category_id\"   value=\"index\"     $option_checked  />show index";
*/



?>
            
            
            
            
          </td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><img src="../images/icon/icon_mini_preview.gif" width="25" height="25" /></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><a href="category_update.php?<? print "category_id=$lv3_category_id"; ?>"><img src="../images/icon/icon_mini_update.gif" width="25" height="25" /></a></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >

<?
if ($lv3_option_fixed != "fixed" ){ 
print "
<a href=\"category_showall.php?category_id=$lv3_category_id&option_delete=delete&system_id=$system_id\"   onclick=\"return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')\"  >
<img src=\"../images/icon/icon_mini_delete.gif\" width=\"25\" height=\"25\" border=\"0\"  /></a>
";
} /// option_fixed
?>

          </td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?

if ($lv3_option_fixed != "fixed" ){ 
print "<input  type=\"checkbox\" name=\"option_delete_$lv3_category_id\" id=\"option_delete_$lv3_category_id\" value=\"delete\" />";
}

?></td>
          </tr>
<?
/////////////////////// level 3 end

/////////////////////// level 3 end loop
} //////////// loop end
} /// count

/////////////////////// level 2 end loop
} //////////// loop end
} /// count

/////////////////////// level 1 end loop
} //////////// loop end
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

} ////////////// end 

} ///} else { ///if ($system_id == "" ) { 

?>
      
      
      
    </td>
  </tr>
  
  <input type="hidden" name="system_id"  id="system_id" value="<?=$system_id?>" />
<input  type="hidden" name="category_appaction_showall"  id="category_appaction_showall" value="update_information" />

</form>

</table>


<?
include("../app_design/design_bottom_system.php");
?>

</body>
</html>



