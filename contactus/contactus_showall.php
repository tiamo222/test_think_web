<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/contactus/contactus_showall.php";
include("../app_system/include/inc_checklogin_user.php"); 

$system_id = "app_contactus";

if (empty( $_REQUEST["contact_id"] ) )  {  $contact_id = "";  } else { $contact_id = $_REQUEST["contact_id"]; }
if (empty( $_REQUEST["category_id"] ) )  {  $category_id = "";  } else { $category_id = $_REQUEST["category_id"]; }
if (empty( $_REQUEST["contact_type"] ) )  {  $contact_type = "";  } else { $contact_type = $_REQUEST["contact_type"]; }
if (empty( $_REQUEST["option_delete"] ) )  {  $option_delete = "none";  } else { $option_delete = $_REQUEST["option_delete"]; }


if (empty($_REQUEST["contactus_appaction_showall"]) )  {  $contactus_appaction_showall="";  } else { $contactus_appaction_showall=$_REQUEST["contactus_appaction_showall"];  }
if (empty( $_REQUEST["show_status"] ) )  {  $show_status = "";  } else { $show_status = $_REQUEST["show_status"]; }



if (empty( $_REQUEST["search_submit"] ) )  {  $search_submit = "";  } else { $search_submit = $_REQUEST["search_submit"]; }
if (empty( $_REQUEST["search_keyword"] ) )  {  $search_keyword = "";  } else { $search_keyword = $_REQUEST["search_keyword"]; }

//// print "search_submit = $search_submit ";

////////////////////////############## PROCESS UPDATE 

//// delete
if ($option_delete == "delete" and $contact_id != "" ) {

$input_array = array(
"contact_id"=>"$contact_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $app_contactus->function_delete( $input_array );
$show_status = $result_delete["show_status"];

header("Location:contactus_showall.php?category_id=$category_id&id_pager=$id_pager&show_status=success"); 

}
//// delete end




//// update information
if ($contactus_appaction_showall == "update_information"  and  $search_submit != "search" ) {
if (empty( $_REQUEST["array_contact_id"] ) )  {  $array_contact_id = array();  } else { $array_contact_id = $_REQUEST["array_contact_id"]; }

$count_array_contact_id = count($array_contact_id);
if ($count_array_contact_id > 0 ) {  /// count 

$loop_id_start  =  0 ; 
foreach ($array_contact_id as $index => $loop_temp  ){ /// loop category
$loop_id_start ++ ;  
$loop_id = $loop_id_start  - 1 ;  

$get_contact_id = $array_contact_id["$loop_id"];

$get_option_confirm_email = $_REQUEST["option_confirm_email_$get_contact_id"];
$get_option_reply = $_REQUEST["option_reply_$get_contact_id"];
$get_option_recommend = $_REQUEST["option_recommend_$get_contact_id"];
$get_option_approve = $_REQUEST["option_approve_$get_contact_id"];
$get_option_status = $_REQUEST["option_status_$get_contact_id"];
$get_option_delete = $_REQUEST["option_delete_$get_contact_id"];


if ($get_option_confirm_email == "" ) { $get_option_confirm_email= "none"; }
if ($get_option_reply == "" ) { $get_option_reply= "none"; }
if ($get_option_recommend == "" ) { $get_option_recommend= "none"; }
if ($get_option_approve == "" ) { $get_option_approve= "none"; }
if ($get_option_status == "" ) { $get_option_status= "off"; }


if ($get_contact_id != "" ) { 
$input_array = array(
"contact_id"=>"$get_contact_id" , 
"option_confirm_email"=>"$get_option_confirm_email" , 
"option_reply"=>"$get_option_reply" , 
"option_recommend"=>"$get_option_recommend" , 
"option_approve"=>"$get_option_approve" , 
"option_status"=>"$get_option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $app_contactus->function_update_option( $input_array );
} //// get_category_id




////////////// get_option_delete
if ($get_option_delete=="delete"){ 

$input_array = array(
"contact_id"=>"$get_contact_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $app_contactus->function_delete( $input_array );
///$show_status = $result_delete["show_status"];


} //// delete



} //// loop
} //// count

header("Location:contactus_showall.php?category_id=$category_id&id_pager=$id_pager&show_status=success"); 

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
<title>Contact Us Showall</title>
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





<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7" style="background-color:#FFF">
<form id="form1" name="form1" method="post" action="">
  <tr>
    <td height="550" align="left" valign="top">
    

<?


$page_topic_name = "แสดงรายการข้อมูล ติดต่อสอบถาม  ทั้งหมด "; 
include("../app_system/include/inc_body_system_topic.php");






?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF" ><table border="0" cellpadding="0" cellspacing="5">
      <tr>
        <td width="164" align="center" valign="top"><a href="contactus_showall.php?category_id=<?=$category_id?>"><img src="../images/icon/icon_all.gif" width="164" height="35" hspace="0" vspace="0" /></a></td>
        <td width="164" align="center" valign="top"><input name="imageField" type="image" id="imageField" src="../images/icon/design_icon_save.gif" alt="บันทึกการแก้ไข..."  onclick="return confirm('กรุณายืนยันการบันทึกข้อมูล ... ')"  /></td>
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
      
      
      
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
        <tr>
          <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#EEEEEE"><table border="0" cellpadding="0" cellspacing="2">
            <tr>
              <td width="145" align="right"><span class="text_normal1">ค้นหาข้อมูลจาก :</span></td>
              <td>
                
                
  <?







print "
<select name=\"select_category\" id=\"select_category\" class=\"text_bot1\" style=\"width:300px;\"  onchange=\"MM_jumpMenu('parent',this,0)\"  >
<option  value=\"contactus_showall.php?contact_type=\"   selected >กรุณาเลือกหมวดหมู่ ... </option>
";

if ( $contact_type == "type_contactus"  ) { $option_selected = "selected"; }  else { $option_selected = ""; }
print "<option  value=\"contactus_showall.php?contact_type=type_contactus\"  $option_selected  >- ติดต่อสอบถามทั่วไป</option>"; 

if ( $contact_type == "type_ads" ) { $option_selected = "selected"; } else { $option_selected = ""; }
print "<option  value=\"contactus_showall.php?contact_type=type_ads\"  $option_selected  >- ติดต่อโฆษณา</option>"; 

print "</select>"; 



?>
                
                
                
                
                
                
                </td>
              <td><input name="search_keyword" type="text" id="search_keyword" size="45" value="<?=$search_keyword ?>" /></td>
              <td><span class="text_normal1">
                <input type="submit" name="search_submit" id="button5" value="search" />
                </span></td>
              <td><span class="text_normal1">
                <input type="reset" name="button5" id="button6" />
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

$sql_other = ""; 
if ($search_submit == "search" ){
$sql_other = "
AND	( 	contact_subject 		LIKE  '%$search_keyword%'
OR		contact_des 			LIKE  '%$search_keyword%'
OR		contact_detail 		LIKE  '%$search_keyword%'
OR		contact_name 		LIKE  '%$search_keyword%'

OR		contact_name 		LIKE  '%$search_keyword%'
OR		contact_phone 		LIKE  '%$search_keyword%'
OR		contact_mobile 		LIKE  '%$search_keyword%'
OR		contact_email 		LIKE  '%$search_keyword%'
OR		contact_address 	LIKE  '%$search_keyword%'
)
"; 
} /// if ($search_submit == "search" ){



$input_array = array(
"contact_type"=>"$contact_type" ,
"sql_other"=>"$sql_other" ,
);
$content_count_row = $app_contactus->function_countbyset( $input_array );

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
          <td align="center"  bgcolor="#999999" class="text_normal1" style="width:150px;" ><b>ประเภทการติดต่อ</b></td>
          <td  bgcolor="#999999" class="text_normal1" style="width:300px;" ><b>&nbsp;ผู้ติดต่อ </b></td>
          <td  align="left" bgcolor="#999999"    class="text_normal1"><b>&nbsp;รายละเอียด</b></td>
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

$set_pager_url = "contactus_showall.php?category_id=$category_id&" ;
/// $set_pager_value = "category_id=$category_id&" ;  
///////////////////////////////////////////////////////////////////////////// pager end


$input_array = array(
"set_pager_limit"=>"$set_pager_limit" , 
"set_pager_start"=>"$set_pager_start" , 

"sql_other"=>"$sql_other" ,
"contact_type"=>"$contact_type" ,
);
$calendar_rs = $app_contactus->function_viewbyset( $input_array ); /// select ข้อมูล


$count_loop = 0 ;
while($rs = $calendar_rs->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;


if ($id_pager > 0 ) { 
$count_row_number = $count_loop ; /// edit
$show_number =  ( $set_pager_start + $count_row_number ) - 1  ; 
$show_number = $show_number + 1 ; 
}


////////////////////////////////////////////////////////////// set value
$contact_id = $rs["contact_id"];
$category_id = $rs["category_id"];
$contact_type = $rs["contact_type"];


$contact_subject = $rs["contact_subject"];
$contact_des = $rs["contact_des"];
$contact_detail = $rs["contact_detail"];

$contact_name = $rs["contact_name"];
$contact_phone = $rs["contact_phone"];
$contact_mobile = $rs["contact_mobile"];
$contact_email = $rs["contact_email"];
$contact_address = $rs["contact_address"];
$contact_by_member_id = $rs["contact_by_member_id"];



$option_read = $rs["option_read"];
$option_reply = $rs["option_reply"];
$option_reply = $rs["option_reply"];

$datetime_create = $rs["datetime_create"];
$datetime_update = $rs["datetime_update"];
$ipaddress_post = $rs["ipaddress_post"];

if ($calendar_des != "" ) { $calendar_des = "<br> <font color=#666666>$calendar_des </font>";}
if ($option_status == "on" ) {$option_status_text = "ออนไลน์"; }
if ($option_status == "off" ) {$option_status_text = "ออฟไลน์"; }


$contact_type_text = ""; 
if ($contact_type == "type_contactus" ){ $contact_type_text = "ติดต่อสอบถามทั่วไป"; }
if ($contact_type == "type_ads" ){ $contact_type_text = "ติดต่อโฆษณา"; }

print " <input type=\"hidden\"  name=\"array_contact_id[]\"  id=\"array_contact_id[]\" value=\"$contact_id\" />";
?>
        
        <tr class="text_normal1">
          <td height="30" align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?=$show_number ?>.</td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"  ><b><?=$contact_type_text ?></b></td>
          <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"  >

<b>ผู้ติดต่อ : </b><?=$contact_name ?>
<b><br />
เบอร์โทรศัพท์ : </b><?=$contact_phone ?> <br>
<b>ที่อยู่  : </b><?=$contact_address ?>
<br />
<b>อีเมล์ : </b><?=$contact_email ?><br />
            

           
            
          </td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >
  <b>วันที่ติดต่อ : </b><?=$datetime_create ?> <br>
            <b>เรื่องที่ติดต่อ : </b><b>
              <?=$contact_subject ?>
              </b> <br />
            <b>รายละเอียด : </b><br />
            <?=$contact_detail ?>
          </td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?

print "<input  type=\"checkbox\" name=\"option_delete_$contact_id\" id=\"option_delete_$contact_id\" value=\"delete\" />";

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
include("../system/include/inc_pager.php"); 
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
<input  type="hidden" name="contactus_appaction_showall"  id="contactus_appaction_showall" value="update_information" />

<input type="hidden" name="id_pager"  id="id_pager" value="<?=$id_pager?>" />

</form>
</table>




<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>



