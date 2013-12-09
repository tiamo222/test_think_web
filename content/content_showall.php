<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/content/content_showall.php";
include("../app_system/include/inc_checklogin_user.php"); 




$system_id = "app_content";

if (empty($_REQUEST["content_appaction_showall"]) )  {  $content_appaction_showall="";  } else { $content_appaction_showall=$_REQUEST["content_appaction_showall"];  }
if (empty( $_REQUEST["show_status"] ) )  {  $show_status = "";  } else { $show_status = $_REQUEST["show_status"]; }


if (empty( $_REQUEST["content_id"] ) )  {  $content_id = "";  } else { $content_id = $_REQUEST["content_id"]; }
if (empty( $_REQUEST["category_id"] ) )  {  $category_id = "";  } else { $category_id = $_REQUEST["category_id"]; }
if (empty( $_REQUEST["option_delete"] ) )  {  $option_delete = "none";  } else { $option_delete = $_REQUEST["option_delete"]; }



////////////////////////############## PROCESS UPDATE 

//// delete
if ($option_delete == "delete" and $content_id != "" ) {

$input_array = array(
"content_id"=>"$content_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $app_content->function_delete( $input_array );
$show_status = $result_delete["show_status"];

header("Location:content_showall.php?system_id=$system_id&id_pager=$id_pager&show_status=success"); 

}
//// delete end




//// update information
if ($content_appaction_showall == "update_information") {
	
if (empty( $_REQUEST["array_content_id"] ) )  {  $array_content_id = array();  } else { $array_content_id = $_REQUEST["array_content_id"]; }

$count_content_id = count($array_content_id);
if ($count_content_id > 0 ) {  /// count 

$loop_id_start  =  0 ; 
foreach ($array_content_id as $index => $loop_temp  ){ /// loop category
$loop_id_start ++ ;  
$loop_id = $loop_id_start  - 1 ;  

$get_content_id = $array_content_id["$loop_id"];

$get_content_name = $_REQUEST["content_name_$get_content_id"];
$get_content_des = $_REQUEST["content_des_$get_content_id"];

$get_option_order = $_REQUEST["option_order_$get_content_id"];
$get_option_reply = $_REQUEST["option_reply_$get_content_id"];
$get_option_highlight = $_REQUEST["option_highlight_$get_content_id"];
$get_option_recommend = $_REQUEST["option_recommend_$get_content_id"];
$get_option_approve = $_REQUEST["option_approve_$get_content_id"];
$get_option_status = $_REQUEST["option_status_$get_content_id"];
$get_option_delete = $_REQUEST["option_delete_$get_content_id"];

$get_option_lang1 = $_REQUEST["option_lang1_$get_content_id"];
$get_option_lang2 = $_REQUEST["option_lang2_$get_content_id"];
$get_option_lang3 = $_REQUEST["option_lang3_$get_content_id"];
$get_option_lang4 = $_REQUEST["option_lang4_$get_content_id"];
$get_option_lang5 = $_REQUEST["option_lang5_$get_content_id"];



if ($get_option_order == "" ) { $get_option_order = "0"; }
if ($get_option_highlight == "" ) { $get_option_highlight = "none"; }
if ($get_option_reply == "" ) { $get_option_reply = "none"; }
if ($get_option_recommend == "" ) { $get_option_recommend = "none"; }
if ($get_option_approve == "" ) { $get_option_approve = "none"; }
if ($get_option_status == "" ) { $get_option_status = "off"; }





//// print "get_option_recommend = $get_option_recommend <br>";



if ($get_content_id != "" ) { 
$input_array = array(
"content_id"=>"$get_content_id" , 
"content_name"=>"$get_content_name" , 

"option_order"=>"$get_option_order" , 
"option_reply"=>"$get_option_reply" , 
"option_highlight"=>"$get_option_highlight" , 
"option_recommend"=>"$get_option_recommend" , 
"option_approve"=>"$get_option_approve" , 
"option_status"=>"$get_option_status" , 

"option_lang1"=>"$get_option_lang1" , 
"option_lang2"=>"$get_option_lang2" , 
"option_lang3"=>"$get_option_lang3" , 
"option_lang4"=>"$get_option_lang4" , 
"option_lang5"=>"$get_option_lang5" , 

"datetime_now"=>"$datetime_now" , 
);


/*
print "<pre>"; 
print_r ($input_array);
print "</pre>"; 
*/

$result_update = $app_content->function_update_option( $input_array );

} //// get_category_id




////////////// get_option_delete
if ($get_option_delete=="delete"){ 

$input_array = array(
"content_id"=>"$get_content_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $app_content->function_delete( $input_array );
///$show_status = $result_delete["show_status"];


} //// delete



} //// loop
} //// count

header("Location:content_showall.php?category_id=$category_id&id_pager=$id_pager&show_status=success"); 

}/////////
//// update information end





////////////////////////############## PROCESS VIEW 
////////// config by process







////////////////////////############## PROCESS CONFIG 


$show_content_pagename = "หน้าหลักระบบจัดการ"; 
$show_content_header = ""; 
$show_content_center = ""; 




$option_status_lang1 = $array_language_bykey["1"]["option_status"];
$language_name_lang1 = $array_language_bykey["1"]["language_name"];
$language_icon_lang1 = $array_language_bykey["1"]["language_icon"];


$option_status_lang2 = $array_language_bykey["2"]["option_status"];
$language_name_lang2 = $array_language_bykey["2"]["language_name"];
$language_icon_lang2 = $array_language_bykey["2"]["language_icon"];


$option_status_lang2 = $array_language_bykey["2"]["option_status"];
$language_name_lang2 = $array_language_bykey["2"]["language_name"];
$language_icon_lang2 = $array_language_bykey["2"]["language_icon"];


$option_status_lang3 = $array_language_bykey["3"]["option_status"];
$language_name_lang3 = $array_language_bykey["3"]["language_name"];
$language_icon_lang3 = $array_language_bykey["3"]["language_icon"];


$option_status_lang4 = $array_language_bykey["4"]["option_status"];
$language_name_lang4 = $array_language_bykey["4"]["language_name"];
$language_icon_lang4 = $array_language_bykey["4"]["language_icon"];


$option_status_lang5 = $array_language_bykey["5"]["option_status"];
$language_name_lang5 = $array_language_bykey["5"]["language_name"];
$language_icon_lang5 = $array_language_bykey["5"]["language_icon"];







?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Content Showall</title>
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
    <td height="550" align="left" valign="top">
    

<?


$page_topic_name = "แสดงรายการข้อมูล เนื้อหาบทความ ทั้งหมด "; 
include("../app_system/include/inc_body_system_topic.php");






if ($system_id != ""  and  $system_id != "none" ) { 

?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF" ><table border="0" cellpadding="0" cellspacing="5">
      <tr>
        <td width="164" align="center" valign="top"><a href="content_showall.php?category_id=<?=$category_id?>"><img src="../images/icon/icon_all.gif" width="164" height="35" hspace="0" vspace="0" /></a></td>
        <td width="164" align="center" valign="top">
          <input name="imageField" type="image" id="imageField" src="../images/icon/design_icon_save.gif" alt="บันทึกการแก้ไข..."  onclick="return confirm('กรุณายืนยันการบันทึกข้อมูล ... ')"  /></td>
        <td width="60" align="center" valign="top" ><a href="content_update.php?category_id=<?=$category_id?>"><img src="../images/icon/design_icon_add.gif" alt="เพิ่ม" width="164" height="35" hspace="0" vspace="0" border="0" /></a></td>
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
          <td  align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#EEEEEE"><table border="0" cellpadding="0" cellspacing="4">
            <tr>
              <td width="145" align="right"><span class="text_normal1">ค้นหาข้อมูลจาก :</span></td>
              <td>
                
                
<?

$category_system_id = "app_content"; 

print "
<select name=\"select_category\" id=\"select_category\" class=\"text_bot1\" style=\"width:300px;\"  onchange=\"MM_jumpMenu('parent',this,0)\"  >
<option  value=\"content_showall.php?category_id=\"   selected >กรุณาเลือกหมวดหมู่ ... </option>
<option  value=\"content_showall.php?category_id=\"    >- แสดงรายการทั้งหมด ... </option>
";
  

////////////////////////////////////////////////////////////////////////////////////////// level1
$level1_input_array = array(
"system_id"=>"$category_system_id" , 
"category_level"=>"1" , 
"category_id_root"=>"root" , 
"sql_orderby"=>" ORDER BY  option_order  ASC " ,
);
$level1_count_category = $app_category->function_countbyset( $level1_input_array );
$level1_result_category = $app_category->function_viewbyset( $level1_input_array ); /// select ข้อมูล

if ($level1_count_category > 0 ){ 


$level1_loop = 0 ;
while($rs1 = $level1_result_category->FetchRow()){ /////// loop 
$level1_loop = $level1_loop + 1  ;

///////////////// set value
$level1_category_id 		= $rs1["category_id"];
$level1_category_name 	= $rs1["category_name"];
$level1_category_des 		= $rs1["category_des"];
$level1_option_order 		= $rs1["option_order"];
$level1_option_status 		= $rs1["option_status"];

if ($level1_category_id == $category_id ) { $category_select = "selected"; } else { $category_select = ""; }
print "<option  value=\"content_showall.php?category_id=$level1_category_id\"  $category_select  >$level1_loop. $level1_category_name</option>"; 
//// loop level 1 end sub




////////////////////////////////////////////////////////////////////////////////////////// level 2
$level2_input_array = array(
"system_id"=>"$category_system_id" , 
"category_level"=>"2" , 
"category_id_root"=>"$level1_category_id" , 
"sql_orderby"=>" ORDER BY  option_order  ASC " ,
);
$level2_count_category = $app_category->function_countbyset( $level2_input_array );
$level2_result_category = $app_category->function_viewbyset( $level2_input_array ); /// select ข้อมูล

if ($level2_count_category > 0 ){ 

$level2_loop = 0 ;
while($rs2 = $level2_result_category->FetchRow()){ /////// loop 
$level2_loop = $level2_loop + 1  ;

///////////////// set value
$level2_category_id 		= $rs2["category_id"];
$level2_category_name 	= $rs2["category_name"];
$level2_category_des 		= $rs2["category_des"];
$level2_option_order 		= $rs2["option_order"];
$level2_option_status 		= $rs2["option_status"];

if ($level2_category_id == $category_id ) { $category_select = "selected"; } else { $category_select = ""; }
print "<option  value=\"content_showall.php?category_id=$level2_category_id\"  $category_select  >$level1_loop.$level2_loop $level2_category_name</option>"; 



////////////////////////////////////////////////////////////////////////////////////////// level 3
$level3_input_array = array(
"system_id"=>"$category_system_id" , 
"category_level"=>"3" , 
"category_id_root"=>"$level2_category_id" , 
"sql_orderby"=>" ORDER BY  option_order  ASC " ,
);
$level3_count_category = $app_category->function_countbyset( $level3_input_array );
$level3_result_category = $app_category->function_viewbyset( $level3_input_array ); /// select ข้อมูล

if ($level3_count_category > 0 ){ 

$level3_loop = 0 ;
while($rs3 = $level3_result_category->FetchRow()){ /////// loop 
$level3_loop = $level3_loop + 1  ;

///////////////// set value
$level3_category_id 		= $rs3["category_id"];
$level3_category_name 	= $rs3["category_name"];
$level3_category_des 		= $rs3["category_des"];
$level3_option_order 		= $rs3["option_order"];
$level3_option_status 		= $rs3["option_status"];

if ($level3_category_id == $category_id ) { $category_select = "selected"; } else { $category_select = ""; }
print "<option  value=\"content_showall.php?category_id=$level3_category_id\"  $category_select  >$level1_loop.$level2_loop.$level3_loop $level3_category_name</option>"; 


} //// loop level 3 end
} //// count level 3 end
////////////////////////////////////////////////////////////////////////////////////////// level 3 end


} //// loop level 2 end
} //// count level 2 end
////////////////////////////////////////////////////////////////////////////////////////// level 2 end



} //// loop level 1 end
} ////if ($category_count_row > 0 ){ 
////////////////////////////////////////////////////////////////////////////////////////// level 1 end

print "</select>"; 

?>
                
                
                
                
                
                
                </td>
              <td><input name="textfield7" type="text" id="textfield3" size="45" /></td>
              <td><span class="text_normal1">
                <input type="submit" name="button6" id="button5" value="ค้นหาข้อมูล ..." />
                </span></td>
              <td><span class="text_normal1">
                <input type="submit" name="button5" id="button6" value="ยกเลิก ..." />
                </span></td>
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


$input_array = array(
"sql_orderby"=>" ORDER BY  option_order  ASC " ,
"system_id"=>"$system_id" , 
"category_id"=>"$category_id" ,
);
$content_count_row = $app_content->function_countbyset( $input_array );



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
          <td  bgcolor="#999999" class="text_normal1" ><b>&nbsp;Topic</b></td>
          <td width="200" align="center" bgcolor="#999999"   style="width:150px;" class="text_normal1"><b>สถานะ</b></td>
          <td width="200" align="center" bgcolor="#999999"   style="width:120px;" class="text_normal1"><b>ภาษา</b></td>
          <td width="50" align="center" bgcolor="#999999"   style="width:50px;" class="text_normal1"><b>เปิด</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"><b>แก้ไข</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"><b>ลบ</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1" ><b>ลบ</b></td>
          </tr>
        

<?




///////////////////////////////////////////////////////////////////////////// pager
$set_pager_limit = 20 ; //// จำนวนต่อหน้า
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

$set_pager_url = "content_showall.php?category_id=$category_id&" ;
/// $set_pager_value = "category_id=$category_id&" ;  
///////////////////////////////////////////////////////////////////////////// pager end


$input_array = array(
"set_pager_limit"=>"$set_pager_limit" , 
"set_pager_start"=>"$set_pager_start" , 
"sql_orderby"=>" ORDER BY  option_order  ASC " ,

"system_id"=>"$system_id" , 
"category_id"=>"$category_id" ,
);
$content_rs = $app_content->function_viewbyset( $input_array ); /// select ข้อมูล


$lv1_count_loop = 0 ;
while($rs = $content_rs->FetchRow()){ /////// loop 
$lv1_count_loop = $lv1_count_loop + 1  ;

/*
//// row style 1
if ($id_pager > 0 ) { 
$count_row_number = $lv1_count_loop ; /// edit
$show_number = $set_pager_count_data - ( $set_pager_start + $count_row_number )  ; 
$show_number = $show_number + 1 ; 
}
*/


if ($id_pager > 0 ) { 
$count_row_number = $lv1_count_loop ; /// edit
$show_number =  ( $set_pager_start + $count_row_number ) - 1  ; 
$show_number = $show_number + 1 ; 
}


///////////////// set value
$content_id = $rs["content_id"];
$content_name = $rs["content_name"];
$content_des = $rs["content_des"];

$content_image_mini = $rs["content_image_mini"];

$option_order = $rs["option_order"];
$option_reply = $rs["option_reply"];
$option_highlight = $rs["option_highlight"];
$option_recommend = $rs["option_recommend"];
$option_approve = $rs["option_approve"];
$option_status = $rs["option_status"];
$option_fixed = $rs["option_fixed"];


$option_lang1 = $rs["option_lang1"];
$option_lang2 = $rs["option_lang2"];
$option_lang3 = $rs["option_lang3"];
$option_lang4 = $rs["option_lang4"];
$option_lang5 = $rs["option_lang5"];



if ($option_status == "on" ) {$option_status_text = "ออนไลน์"; }
if ($option_status == "off" ) {$option_status_text = "ออฟไลน์"; }

$show_content_image_mini = ""; 
if ($content_image_mini != "" ) {
$show_content_image_mini = "<img src=\"$path_content$content_image_mini\" width=120  align=\"right\" style=\"padding-right:5px;\" >";
}


print " <input type=\"hidden\"  name=\"array_content_id[]\"  id=\"array_content_id[]\" value=\"$content_id\" />";
?>
        
        <tr class="text_normal1">
          <td height="30" align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?=$show_number ?>.</td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;">
            
  <?
print "<input  type=\"text\"  name=\"option_order_$content_id\"  id=\"option_order_$content_id\" style=\"width:35px;text-align:center\" value=\"$option_order\" size=\"25\" />";
?>
            
</td>
          <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"  >
<?
print "
$show_content_image_mini
<b>$content_name</b><br>
<font color=#666666 >$content_des </font>
";
?>
            
          </td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;"  >
            
            
            
  <?
if ($option_highlight == "highlight" ) { $option_highlight_checked = "checked"; }  else { $option_highlight_checked = ""; }
print "<input  type=\"checkbox\" name=\"option_highlight_$content_id\" id=\"option_highlight_$content_id\"   $option_highlight_checked    value=\"highlight\"  />รายการ Highlight <br>";





/*
if ($option_recommend == "recommend" ) { $option_recommend_checked = "checked"; }  else { $option_recommend_checked = ""; }
print "<input  type=\"checkbox\" name=\"option_recommend_$content_id\" id=\"option_recommend_$content_id\"   $option_recommend_checked    value=\"recommend\"  />รายการแนะนำ (Recommend)<br>";

if ($option_reply == "reply" ) { $option_reply_checked = "checked"; }  else { $option_reply_checked = ""; }
print "<input type=\"checkbox\" name=\"option_reply_$content_id\" id=\"option_reply_$content_id\"  $option_reply_checked    value=\"reply\"  />แสดงความคิดเห็น (Reply)<br>";
*/



if ($option_approve == "approve" ) { $option_approve_checked = "checked"; }  else { $option_approve_checked = ""; }
print "<input type=\"checkbox\" name=\"option_approve_$content_id\" id=\"option_approve_$content_id\"  $option_approve_checked     value=\"approve\"  /> อนุมัติโดย Admin <br>";


if ($option_status == "on" ) { $option_status_checked = "checked"; }  else { $option_status_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$content_id\" id=\"option_status_$content_id\"  $option_status_checked  value=\"on\"  />";

?>
            
<font color="#009900"><b><?=$option_status_text ?>
              
            </b></font></td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;"  >

<?



if ($option_lang1 == "on" ) {  $option_checked = "checked"; } else  {  $option_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_lang1_$content_id\" id=\"option_lang1_$content_id\" value=\"on\"  $option_checked    />   $language_icon_lang1 $language_name_lang1 <br>"; 



if ($option_status_lang2 == "on" ){
if ($option_lang2 == "on" ) {  $option_checked = "checked"; } else  {  $option_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_lang2_$content_id\" id=\"option_lang2_$content_id\" value=\"on\"  $option_checked    />  $language_icon_lang2 $language_name_lang2<br>"; 
}////if ($option_status_lang2 == "on" ){
	
	
if ($option_status_lang3 == "on" ){
if ($option_lang3 == "on" ) {  $option_checked = "checked"; } else  {  $option_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_lang3_$content_id\" id=\"option_lang3_$content_id\" value=\"on\"  $option_checked    />  $language_icon_lang3 $language_name_lang3 <br>"; 
}////if ($option_status_lang3 == "on" ){


if ($option_status_lang4 == "on" ){
if ($option_lang4 == "on" ) {  $option_checked = "checked"; } else  {  $option_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_lang4_$content_id\" id=\"option_lang4_$content_id\" value=\"on\"  $option_checked    />  $language_icon_lang4 $language_name_lang4 <br>"; 
}////if ($option_status_lang4 == "on" ){
	

if ($option_status_lang5 == "on" ){
if ($option_lang5 == "on" ) {  $option_checked = "checked"; } else  {  $option_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_lang5_$content_id\" id=\"option_lang5_$content_id\" value=\"on\"  $option_checked    />  $language_icon_lang5 $language_name_lang5 <br>"; 
}////if ($option_status_lang5 == "on" ){



?>
          
          </td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><img src="../images/icon/icon_mini_preview.gif" width="25" height="25" /></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><a href="content_update.php?<? print "content_id=$content_id"; ?>"><img src="../images/icon/icon_mini_update.gif" width="25" height="25" /></a></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >
            

<?

if ($option_fixed != "fixed" ){
print "
<a href=\"content_showall.php?content_id=$content_id&option_delete=delete&category_id=$category_id\"   onclick=\"return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')\"  >
<img src=\"../images/icon/icon_mini_delete.gif\" width=\"25\" height=\"25\" border=\"0\"  /></a>
";
} else { ////option_fixed
print "fixed";
}
?>  
  
            
</td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?
if ($option_fixed != "fixed" ){
print "<input  type=\"checkbox\" name=\"option_delete_$content_id\" id=\"option_delete_$content_id\" value=\"delete\" />";
} else { ////option_fixed
print "fixed";
}

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
<input  type="hidden" name="content_appaction_showall"  id="content_appaction_showall" value="update_information" />
<input type="hidden" name="id_pager"  id="id_pager" value="<?=$id_pager?>" />

</form>
</table>




<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>



