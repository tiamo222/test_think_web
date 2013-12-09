<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/backoffice/menu_showall.php";
include("../app_system/include/inc_checklogin_user.php"); 

/// include("../category/inc_array_category.php"); 


if (empty( $_REQUEST["show_status"] ) )  {  $show_status = "";  } else { $show_status = $_REQUEST["show_status"]; }
if (empty( $_REQUEST["appaction_menu_showall"] ) )  {  $appaction_menu_showall = "";  } else { $appaction_menu_showall = $_REQUEST["appaction_menu_showall"]; }

if (empty( $_REQUEST["menu_set"] ) )  {  $menu_set = "";  } else { $menu_set = $_REQUEST["menu_set"]; }
if (empty( $_REQUEST["language_id"] ) )  {  $language_id = "";  } else { $language_id = $_REQUEST["language_id"]; }
if ($language_id == "" ){ $language_id = "thai"; }
/// language_id





////////////////////////############## PROCESS UPDATE 
if (empty( $_REQUEST["menu_id"] ) )  	{  $menu_id = "";  } else { $menu_id = $_REQUEST["menu_id"]; }
if (empty( $_REQUEST["option_delete"] ) ) 	{  $option_delete = "";  } else { $option_delete = $_REQUEST["option_delete"]; }







//// update information
if ($appaction_menu_showall=="update_information") {
	
if (empty( $_REQUEST["menu_id"] ) )  {  $menu_id = array();  } else { $menu_id = $_REQUEST["menu_id"]; }

$count_menu_id = count($menu_id);
if ($count_menu_id > 0 ) {  /// count 

$loop_id_start  =  0 ; 
foreach ($menu_id as $index => $loop_temp  ){ /// loop category
$loop_id_start ++ ;  
$loop_id = $loop_id_start  - 1 ;  

$get_menu_id = $menu_id["$loop_id"];
$get_option_order = $_REQUEST["option_order_$get_menu_id"];
$get_option_status = $_REQUEST["option_status_$get_menu_id"];
$get_option_delete = $_REQUEST["option_delete_$get_menu_id"];
$get_option_show_index = $_REQUEST["option_show_index_$get_menu_id"];


if ($get_option_status == "" )		{ $get_option_status= "off"; }
if ($get_option_order == "" )		{ $get_option_order= "0"; }
if ($get_option_show_index == "" )	{ $get_option_show_index= "none"; }



if ($get_menu_id != "" ) { 
$input_array = array(
"menu_id"=>"$get_menu_id" , 
"option_status"=>"$get_option_status" , 
"option_order"=>"$get_option_order" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $system_appmenu->function_update_option( $input_array );
} //// get_category_id






////////////// get_option_delete
if ($get_option_delete=="delete" ){ 

$input_array = array(
"menu_id"=>"$get_menu_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $system_appmenu->function_delete( $input_array );


$input_array = array(
"sql_other"=>" menu_id_root = '$menu_id'   " , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $system_appmenu->function_delete( $input_array );


} //// delete


} //// loop
} //// count

header("Location:menu_showall.php?language_id=$language_id&show_status=success"); 

}/////////
//// update information end



/// print "language_id = $language_id <br>";

////////////////////////############## PROCESS VIEW 
if ($language_id == "" ){ $language_id = "thai"; }

$menu_set_array["menu_a"] = array(
"menu_set"=>"menu_a" ,
"menu_set_name"=>"Position Top" ,
"menu_set_des"=>"ด้านบนของเว็บ ทุกหน้า" ,
);

$menu_set_array["menu_b"] = array(
"menu_set"=>"menu_b" ,
"menu_set_name"=>"Position Column B1" ,
"menu_set_des"=>"ด้านข้างของเว็บ ทุกหน้า" ,
);



/*
print "<pre>";
print_r ($menu_set_array);
print "</pre>";

*/




if ($language_id != "" ){

$input_array = array(
"sql_other"=>" AND  language_id = '$language_id' " ,
"sql_orderby"=>" ORDER BY option_order  ASC " ,
);
$appmenu_count_row = $system_appmenu->function_countbyset( $input_array );
$appmenu_rs = $system_appmenu->function_viewbyset( $input_array ); /// select ข้อมูล

}///language_id



////////////////////////############## PROCESS CONFIG 

/// print "language_id = $language_id <br>";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Showall</title>
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


$page_topic_name = "แสดงรายการ ข้อมูลเมนูเว็บไซต์ ทั้งหมด "; 
include("../app_system/include/inc_body_system_topic.php");





?>
      
      
      
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
        <tr>
          <td height="30" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#EEEEEE"><table width="100%" border="0" cellpadding="0" cellspacing="4">
            <tr>
              <td width="150" align="right" valign="top"><span class="text_normal1"><b>กรุณาเลือกภาษา :</b></span></td>
              <td valign="top" class="text1">
               <a href="menu_showall.php?language_id=thai"><b>- รายการเมนูในเวอร์ชั่น Thai</b> </a><br>
             <a href="menu_showall.php?language_id=eng"><b>- รายการเมนูในเวอร์ชั่น Eng </b></a>
                &nbsp;</td>
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





/////////////// start loop
$count_menu_set_array = count($menu_set_array);
if ($count_menu_set_array > 0 ){

$loop_count = 0 ; 
foreach ($menu_set_array as $key1 => $rs){
$loop_count = $loop_count + 1 ; 

$menu_set = $rs["menu_set"];
$menu_set_name = $rs["menu_set_name"];
$menu_set_des = $rs["menu_set_des"];

?>
<table width="100%" border="0" cellpadding="4" cellspacing="1" bgcolor="#333333">
  <tr>
          <td height="20" align="left" valign="top" bgcolor="#999999"  style="background-color:#999999; padding-left:10px;" class="big1">Menu Set : <?=$menu_set_name?>&nbsp;</td>
          </tr>
  </table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF" ><table border="0" cellpadding="0" cellspacing="5">
      <tr>
        <td width="164" align="center" valign="top"><a href="menu_showall.php?language_id=<?=$language_id?>"><img src="../images/icon/icon_all.gif" width="164" height="35" hspace="0" vspace="0" /></a></td>
        <td width="164" align="center" valign="top"><input name="imageField" type="image" id="imageField" src="../images/icon/design_icon_save.gif" alt="บันทึกการแก้ไข..."  onclick="return confirm('กรุณายืนยันการบันทึกข้อมูล ... ')"  /></td>
  
        <td width="60" align="center" valign="top" ><a href="menu_update.php?<? print "language_id=$language_id&menu_set=$menu_set"; ?>"><img src="../images/icon/design_icon_add.gif" alt="เพิ่ม" width="164" height="35" border="0" /></a></td>
     
      </tr>
    </table></td>
  </tr>
</table>
<?



$input_array1 = array(
"sql_other"=>" 
AND language_id='$language_id'  
AND menu_set='$menu_set'  
AND menu_id_root='root'  
" ,
"sql_orderby"=>" ORDER BY option_order  ASC " ,
);
$menu_count_row1 = $system_appmenu->function_countbyset( $input_array1 );
/// print "menu_count_row1 = $menu_count_row1 <br>";

if ($menu_count_row1 == 0 ){  //// count row
?>





      <table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="#999999">
        <tr>
          <td height="100" align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#EEEEEE">
          
<span class="text_big2">ยังไม่มีข้อมูล ...</span>
          
          
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
          <td bgcolor="#999999" class="text_normal1" style="width:250px;" ><b>&nbsp;Menu  </b></td>
          <td bgcolor="#999999" class="text_normal1" >&nbsp;</td>
          <td width="100" align="center" bgcolor="#999999"   style="width:150px;" class="text_normal1"><b>สถานะ</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"><b>แก้ไข</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1" ><b>ลบ</b></td>
          </tr>
        

<?




$menu_rs1 = $system_appmenu->function_viewbyset( $input_array1 ); /// select ข้อมูล
$lv1_count_loop = 0 ;
while($rs1 = $menu_rs1->FetchRow()){ /////// loop 
$lv1_count_loop = $lv1_count_loop + 1  ;

///////////////// set value
$lv1_menu_id = $rs1["menu_id"];
/// $lv1_menu_id_root = $rs1["menu_id_root"];
$lv1_menu_name = $rs1["menu_name"];
$lv1_menu_url = $rs1["menu_url"];

$lv1_option_order = $rs1["option_order"];
$lv1_option_status = $rs1["option_status"];

$lv1_option_order = $lv1_option_order * 1 ; 


if ($lv1_option_status == "on" ) {$lv1_option_status_text = "ออนไลน์"; }
if ($lv1_option_status == "off" ) {$lv1_option_status_text = "ออฟไลน์"; }


print " <input type=\"hidden\"  name=\"menu_id[]\"  id=\"menu_id[]\" value=\"$lv1_menu_id\" />";
?>
        
        <tr class="text_normal1">
          <td height="30" align="center" valign="top" bgcolor="#D4D4D4"  style="padding:4px;"><?=$lv1_count_loop ?>.</td>
          <td align="center" valign="top" bgcolor="#D4D4D4"  style="padding:4px;">
            
            <?
print "<input  type=\"text\"  name=\"option_order_$lv1_menu_id\"  id=\"option_order_$lv1_menu_id\" style=\"width:35px;text-align:center\" value=\"$lv1_option_order\" size=\"25\" />";
?>
            
</td>
          <td align="left" valign="top" bgcolor="#D4D4D4" style="padding:4px;">
            
<?

print "<b>$lv1_menu_name </b>";

///print "<input  type=\"text\"  name=\"category_des_$lv1_category_id\"  id=\"category_des_$lv1_category_id\" style=\"width:98%;\" value=\"$lv1_category_des\" size=\"50\" />";
?>
            
</td>
          <td align="left" valign="top" bgcolor="#D4D4D4" style="padding:4px;"><?=$lv1_menu_url?>&nbsp;</td>
          <td  align="left" valign="top" bgcolor="#D4D4D4" style="padding:2px;" >
            
<?

if ($lv1_option_status == "on" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$lv1_menu_id\" id=\"option_status_$lv1_menu_id\"  $option_checked  value=\"on\"  /> $lv1_option_status_text <br> ";


?>
            
            
            
          </td>
          <td  align="center" valign="top" bgcolor="#D4D4D4" style="padding:2px;" ><a href="menu_update.php?<? print "menu_id=$lv1_menu_id"; ?>"><img src="../images/icon/icon_mini_update.gif" width="25" height="25" /></a></td>
          <td align="center" valign="top" bgcolor="#D4D4D4"  style="padding:4px;"><?

print "<input  type=\"checkbox\" name=\"option_delete_$lv1_menu_id\" id=\"option_delete_$lv1_menu_id\" value=\"delete\" />";


?></td>
          </tr>
        

<?
/////////////////////// level 2

$input_array2 = array(
"sql_other"=>" 
AND language_id='$language_id'  
AND menu_set='$menu_set'  
AND menu_id_root='$lv1_menu_id'  
" ,
"sql_orderby"=>" ORDER BY option_order  ASC " ,
);
$menu_count_row2 = $system_appmenu->function_countbyset( $input_array2 );
if ($menu_count_row2 > 0 ){  //// count row
$menu_rs2 = $system_appmenu->function_viewbyset( $input_array2 ); /// select ข้อมูล

$lv2_count_loop = 0 ; 
while($rs2 = $menu_rs2->FetchRow()){ /////// loop 
$lv2_count_loop = $lv2_count_loop + 1  ;

$lv2_menu_id = $rs2["menu_id"];
$lv2_menu_name = $rs2["menu_name"];
$lv2_menu_url = $rs2["menu_url"];
$lv2_option_target = $rs2["option_target"];
$lv2_option_order = $rs2["option_order"];
$lv2_option_status = $rs2["option_status"];


$lv2_option_order = $lv2_option_order * 1 ; 
$lv2_count_loop_show = "$lv1_count_loop.$lv2_count_loop";
if ($lv2_option_status == "on" ) {$lv2_option_status_text = "ออนไลน์"; }
if ($lv2_option_status == "off" ) {$lv2_option_status_text = "ออฟไลน์"; }


print " <input type=\"hidden\"  name=\"menu_id[]\"  id=\"menu_id[]\" value=\"$\" />";

?>
        <tr class="text_normal1">
          <td height="30" align="center" valign="top" bgcolor="#E1E1E1"  style="padding:4px;"><?=$lv2_count_loop_show ?></td>
          <td align="center" valign="top" bgcolor="#E1E1E1"  style="padding:4px;">
            
            <?
print "<input  type=\"text\"  name=\"option_order_$lv2_menu_id\"  id=\"option_order_$lv2_menu_id\" style=\"width:35px;text-align:center\" value=\"$lv2_option_order\" size=\"25\" />";
?>
            
          </td>
          <td align="left" valign="top" bgcolor="#E1E1E1" style="padding:4px;">
            
<?

print "<b>$lv2_menu_name</b><br>"; 

?>
            
            
          </td>
          <td align="left" valign="top" bgcolor="#E1E1E1" style="padding:4px;"><?=$lv2_menu_url?>&nbsp;</td>
          <td  align="left" valign="top" bgcolor="#E1E1E1" style="padding:2px;" >
            
            <?

if ($lv2_option_status == "on" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$lv2_menu_id\" id=\"option_status_$lv2_menu_id\"   $option_checked   value=\"on\"   /> $lv2_option_status_text <br>";




?>
            
            
</td>
          <td  align="center" valign="top" bgcolor="#E1E1E1" style="padding:2px;" ><a href="menu_update.php?<? print "menu_id=$lv2_menu_id"; ?>"><img src="../images/icon/icon_mini_update.gif" width="25" height="25" /></a></td>
          <td align="center" valign="top" bgcolor="#E1E1E1"  style="padding:4px;">
<?

print "<input  type=\"checkbox\" name=\"option_delete_$lv2_menu_id\" id=\"option_delete_$lv2_menu_id\"  value=\"delete\" />";


?>
            
</td>
</tr>
<?
/////////////////////// level 2 end


/////////////////////// level 3

$input_array3 = array(
"sql_other"=>" 
AND language_id='$language_id'  
AND menu_set='$menu_set'  
AND menu_id_root='$lv2_menu_id'  
" ,
"sql_orderby"=>" ORDER BY option_order  ASC " ,
);
$menu_count_row3 = $system_appmenu->function_countbyset( $input_array3 );
if ($menu_count_row3 > 0 ){  //// count row
$menu_rs3 = $system_appmenu->function_viewbyset( $input_array3 ); /// select ข้อมูล

$lv3_count_loop = 0 ; 
while($rs3 = $menu_rs3->FetchRow()){ /////// loop 
$lv3_count_loop = $lv3_count_loop + 1  ;

$lv3_menu_id = $rs3["menu_id"];
$lv3_menu_name = $rs3["menu_name"];
$lv3_menu_url = $rs3["menu_url"];
$lv3_menu_url = $rs3["menu_url"];

$lv3_option_order = $rs3["option_order"];
$lv3_option_status = $rs3["option_status"];
$lv3_option_fixed = $rs3["option_fixed"];

$lv3_option_show_index = $rs3["option_show_index"];

$lv3_option_order = $lv3_option_order * 1 ; 
$lv3_count_loop_show = "$lv1_count_loop.$lv2_count_loop.$lv3_count_loop";
if ($lv3_option_status == "on" ) {$lv3_option_status_text = "ออนไลน์"; }
if ($lv3_option_status == "off" ) {$lv3_option_status_text = "ออฟไลน์"; }




print " <input type=\"hidden\"  name=\"menu_id[]\"  id=\"menu_id[]\" value=\"$lv3_menu_id\" />";

?>
        <tr class="text_normal1">
          <td height="30" align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?=$lv3_count_loop_show ?></td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;">
            
            
<?
print "<input  type=\"text\"  name=\"option_order_$lv3_menu_id\"  id=\"option_order_$lv3_menu_id\" style=\"width:35px;text-align:center\" value=\"$lv3_option_order\" size=\"25\" />";
?>
            
</td>
          <td align="left" valign="top" bgcolor="#FFFFFF" style="padding:4px;">
            
            
<?
print "<b>$lv3_menu_name</b>";

?>
            
            
            
            
          </td>
          <td align="left" valign="top" bgcolor="#FFFFFF" style="padding:4px;"><?=$lv3_menu_url ?>&nbsp;</td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >
            
            <?


if ($lv3_option_status == "on" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$lv3_menu_id\" id=\"option_status_$lv3_menu_id\"  $option_checked  value=\"on\"  /> $lv3_option_status_text <br>";




?>
            
            
            
            
          </td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><a href="menu_update.php?<? print "menu_id=$lv3_menu_id"; ?>"><img src="../images/icon/icon_mini_update.gif" width="25" height="25" /></a></td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?

print "<input  type=\"checkbox\" name=\"option_delete_$lv3_menu_id\" id=\"option_delete_$lv3_menu_id\" value=\"delete\" />";


?>
</td></tr>
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
    
      
      
      
      
<?

} ////////////// end 

print "<br><br>";

} //// loop
}////////////////// end  loop


?>
      
      
      
    </td>
  </tr>
  
<input type="hidden" name="language_id"  id="language_id" value="<?=$language_id?>" />
<input  type="hidden" name="appaction_menu_showall"  id="appaction_menu_showall" value="update_information" />

</form>

</table>


<?
include("../app_design/design_bottom_system.php");
?>

</body>
</html>



