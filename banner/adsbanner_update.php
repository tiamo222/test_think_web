<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/banner/adsbanner_update.php";
include("../app_system/include/inc_checklogin_user.php"); 

$system_id = "app_ads_banner";

////////////////////////############## PROCESS UPDATE 

if (empty($_REQUEST["banner_id"]) )  		{  $banner_id="";  } else { $banner_id=$_REQUEST["banner_id"];  }
if (empty($_REQUEST["category_id"]) ) 		{  $category_id="";  } else { $category_id=$_REQUEST["category_id"];  }
if (empty( $_REQUEST["appaction"] ) )  		{  $appaction = "";  } else { $appaction = $_REQUEST["appaction"]; }


if ($appaction == "update_information"){
///////// check request


if (empty($_REQUEST["banner_name"]) )  					{  $banner_name="";  } else { $banner_name=$_REQUEST["banner_name"];  }
if (empty($_REQUEST["banner_des"]) )  						{  $banner_des="";  } else { $banner_des=$_REQUEST["banner_des"];  }
if (empty($_REQUEST["banner_company"]) )  				{  $banner_company="";  } else { $banner_company=$_REQUEST["banner_company"];  }
if (empty($_REQUEST["banner_company_contact"]) )  	{  $banner_company_contact="";  } else { $banner_company_contact=$_REQUEST["banner_company_contact"];  }

if (empty($_REQUEST["banner_position"]) )  				{  $banner_position="";  } else { $banner_position=$_REQUEST["banner_position"];  }
if (empty($_REQUEST["banner_type"]) )  						{  $banner_type="";  } else { $banner_type=$_REQUEST["banner_type"];  }
if (empty($_REQUEST["banner_position"]) )  				{  $banner_position="";  } else { $banner_position=$_REQUEST["banner_position"];  }
if (empty($_REQUEST["banner_code"]) )  				{  $banner_code="";  } else { $banner_code=$_REQUEST["banner_code"];  }

if (empty($_REQUEST["date_start"]) )  						{  $date_start="";  } else { $date_start=$_REQUEST["date_start"];  }
if (empty($_REQUEST["date_end"]) )  							{  $date_end="";  } else { $date_end=$_REQUEST["date_end"];  }

if (empty($_REQUEST["time_start_h"]) )  						{  $time_start_h="";  } else { $time_start_h=$_REQUEST["time_start_h"];  }
if (empty($_REQUEST["time_start_m"]) )  					{  $time_start_m="";  } else { $time_start_m=$_REQUEST["time_start_m"];  }
if (empty($_REQUEST["time_end_h"]) )  						{  $time_end_h="";  } else { $time_end_h=$_REQUEST["time_end_h"];  }
if (empty($_REQUEST["time_end_m"]) )  						{  $time_end_m="";  } else { $time_end_m=$_REQUEST["time_end_m"];  }

if (empty($_REQUEST["option_approve"]) )  					{  $option_approve="none";  } else { $option_approve=$_REQUEST["option_approve"];  }
if (empty($_REQUEST["option_status"]) )  					{  $option_status="off";  } else { $option_status=$_REQUEST["option_status"];  }



/*
if ( $date_start != "" ) {  
$get_day = substr($date_start,"0","2");	
$get_month=substr($date_start,"3","2");		
$get_year=substr($date_start,"6","4");
$get_year = $get_year - 543 ; 
$date_start = "$get_year-$get_month-$get_day" ; 
$datetime_start = "$date_start $time_start_h:$time_start_m:00" ;
} 

if ( $date_end != "" ) {  
$get_day = substr($date_end,"0","2");	 
$get_month=substr($date_end,"3","2"); 
$get_year=substr($date_end,"6","4"); 
$get_year = $get_year - 543 ; 
$date_end = "$get_year-$get_month-$get_day" ; 
$datetime_end = "$date_end $time_end_h:$time_end_m:00" ;
} 
*/






$show_status = "success";


if ($banner_name == "" ) {
$show_status = "error";
$array_report_error[] = "- กรุณากรอก เรื่อง/หัวข้อ   "; 
}


if ($show_status == "success" ){ 






////////////////////////////////////////////////////////////////////////////// upload config 
/// picture
if (empty($_REQUEST["delete_banner_image"]) ) 	{  $delete_banner_image = "none";  } else { $delete_banner_image=$_REQUEST["delete_banner_image"];  }
if (empty($_REQUEST["db_banner_image"]) )  		{  $db_banner_image = "";  } else { $db_banner_image=$_REQUEST["db_banner_image"];  }

$picture_path 				= $path_adsbanner  ; /// config 
$picture_update 			= $db_banner_image ; /// config 
$picture_option_delete 	= $delete_banner_image ; /// config 

$picture_fileupload = $_FILES["upload_banner_image"]["tmp_name"]; /// config 
$picture_fileupload_name = $_FILES["upload_banner_image"]["name"]; /// config 
$picture_name_new =  "adsb";  ///config

if ($picture_fileupload != "" or  $picture_option_delete =="delete" ) { //// check picture
$input_upload = array(
"picture_path"=>"$picture_path" , 
"picture_original"=>"$picture_update" , 
"picture_option_delete"=>"$picture_option_delete" , 
"picture_fileupload"=>"$picture_fileupload" , 
"picture_fileupload_name"=>"$picture_fileupload_name" , 
"picture_name_new"=>"$picture_name_new" , 
);
$result_fileupload_name = function_picture_upload_mix($input_upload);
$picture_update = $result_fileupload_name ;  //////// update image
} /////// check picture

$banner_image = $picture_update ;  //// config
////////////////////////////////////////////////////////////////////////////// upload config  end




$input_array = array(
"banner_id"=>"$banner_id" , 
"category_id"=>"$category_id" , 
"banner_type"=>"$banner_type" , 

"banner_name"=>"$banner_name" , 
"banner_des"=>"$banner_des" , 
"banner_company"=>"$banner_company" , 
"banner_company_contact"=>"$banner_company_contact" , 
"banner_position"=>"$banner_position" , 
"banner_url"=>"$banner_url" , 

"banner_type"=>"$banner_type" , 
"banner_code"=>"$banner_code" , 
"banner_image"=>"$banner_image" , 

"datetime_start"=>"$datetime_start" ,
"datetime_end"=>"$datetime_end" ,

"option_order"=>"$option_order" , 
"option_approve"=>"$option_approve" , 
"option_status"=>"$option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $app_ads_banner->function_update( $input_array );
$show_status = $result_update["show_status"];
$banner_id = $result_update["banner_id"];

} ///if ($process_check_input == "success" ){ 
/// print "show_status = $show_status ";




if (empty( $_REQUEST["loop_position_id"] ) )  {  $loop_position_id = array();  } else { $loop_position_id = $_REQUEST["loop_position_id"]; }
$count_loop_position_id = count($loop_position_id);


///////////////////// update match 
if ($count_loop_position_id > 0 ){  //// count

$loop_id_start  =  0 ; 
foreach ($loop_position_id as $index => $loop_temp  ){ /// loop 
$loop_id_start ++ ;  
$loop_id = $loop_id_start  - 1 ;  

$get_position_id = $loop_position_id["$loop_id"];
///$get_match_id = $_REQUEST["match_id_$get_position_id"];
$get_match_status = $_REQUEST["match_status_$get_position_id"];
if ($get_match_status == "" ){ $get_match_status = "off"; }


///////////// get
$input_array = array(
"sql_other"=>"
AND	 position_id = '$get_position_id' 
" , 

);
$result_banner = $app_ads_banner_match->function_viewbyid_sql( $input_array );

$loop_match_id = "";
if ($result_banner){
$loop_match_id = $result_banner["match_id"];
$loop_banner_id = $result_banner["banner_id"];
$loop_option_status = $result_banner["option_status"];
}/// result_banner


$process_status = "none"; 	

//// ถ้าเป็น การยกเลิกการเลือก
if ($loop_banner_id == $banner_id  and $loop_option_status == "on" and $get_match_status == "off"  ){
$process_status = "process_update_off"; 	
$set_option_status = "off";
}

//// ถ้าเป็น การเลือก
if ( $get_match_status == "on"  ){
$process_status = "process_update_on"; 	
$set_option_status = "on";
}


if ($process_status != "none" ){ 

///////////// update
$input_array = array(
"match_id"=>"$loop_match_id" , 
"position_id"=>"$get_position_id" , 
"banner_id"=>"$banner_id" , 
"option_status"=>"$set_option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $app_ads_banner_match->function_update( $input_array );


} ///


} ////  loop 
} //// count

///////////////////// update match  end
header("Location:adsbanner_update.php?banner_id=$banner_id&show_status=$show_status"); 


} //// if ($appaction == "update_information") {
////////////////////////############## PROCESS UPDATE  END


////////////////////////############## PROCESS VIEW 

/// form set

if ($banner_id != "" ) { 

$input_array = array(
"banner_id"=>"$banner_id" , 
);
$rs_banner = $app_ads_banner->function_viewbyid( $input_array );
if ($rs_banner ) {
	
$banner_id = $rs_banner["banner_id"];
$category_id = $rs_banner["category_id"];

$banner_name = $rs_banner["banner_name"];
$banner_des = $rs_banner["banner_des"];
$banner_company = $rs_banner["banner_company"];
$banner_company_contact = $rs_banner["banner_company_contact"];
$banner_position = $rs_banner["banner_position"];
$banner_url = $rs_banner["banner_url"];
$banner_type = $rs_banner["banner_type"];
$banner_code = $rs_banner["banner_code"];
$banner_image = $rs_banner["banner_image"];

$datetime_start = $rs_banner["datetime_start"];
$datetime_end = $rs_banner["datetime_end"];

$stat_view = $rs_banner["stat_view"];
$option_order = $rs_banner["option_order"];
$option_approve = $rs_banner["option_approve"];
$option_status = $rs_banner["option_status"];

$user_create = $rs_banner["user_create"];
$user_update = $rs_banner["user_update"];
$user_delete = $rs_banner["user_delete"];
$datetime_create = $rs_banner["datetime_create"];
$datetime_update = $rs_banner["datetime_update"];
$datetime_delete = $rs_banner["datetime_delete"];



$show_banner_image = "<img src=\"$path_adsbanner$banner_image\"  border=0 ><br>"; 


if ($datetime_start != "0000-00-00 00:00:00"  or  $datetime_start != "" ) {	
$get_year=substr($datetime_start,"0","4");
$get_month=substr($datetime_start,"5","2");			
$get_day = substr($datetime_start,"8","2");	
$get_year = $get_year + 543 ; 
$date_start = "$get_day/$get_month/$get_year" ; 
//// print "<br>xxx  datetime_action_date = $datetime_action_date <br>"; 

$time_start_h = substr($datetime_start,"11","2");	/// time_h
$time_start_m = substr($datetime_start,"14","2"); /// time_m

if ($date_start =="00/00/543"  or  $date_start=="" ) {
$date_start = "" ; 
}
} ////////// 


if ($datetime_end != "0000-00-00 00:00:00"  or  $datetime_end != "" ) {	
$get_year=substr($datetime_end,"0","4");
$get_month=substr($datetime_end,"5","2");			
$get_day = substr($datetime_end,"8","2");	
$get_year = $get_year + 543 ; 
$date_end = "$get_day/$get_month/$get_year" ; 

$time_end_h = substr($datetime_end,"11","2"); /// time_h
$time_end_m = substr($datetime_end,"14","2"); /// time_m

if ($date_end =="00/00/543"  or  $date_end=="" ) {
$date_end = "" ; 
}
} //////// 





}///rs_category
} ///if ($category_id != "" ) { 







if ($banner_id != "" ){ 

////////////// check select match
$input_array = array(
"banner_id"=>"$banner_id" ,
"sql_orderby"=>" ORDER BY option_order ASC " ,
);
$count_match = $app_ads_banner_match->function_countbyset( $input_array );
if ($count_match > 0 ){ 
$rs_match = $app_ads_banner_match->function_viewbyset( $input_array ); /// select ข้อมูล

$count_loop = 0 ;
while($rs = $rs_match->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;

///////////////// set value
$loop_match_id = $rs["match_id"];
$loop_position_id = $rs["position_id"];
$loop_option_status = $rs["option_status"];

$selected_position["$loop_position_id"]["match_id"] = $loop_match_id ;
$selected_position["$loop_position_id"]["position_id"] = $loop_position_id ;
$selected_position["$loop_position_id"]["option_status"] = $loop_option_status ;

} //// loop
} //// if ($count_match > 0 ){ 
} ///if ($banner_id != "" ){ 


////////////// check select match end

/*
$count_selected_position = count($selected_position);
print "count_selected_position = $count_selected_position <br><br>";
print "<pre>"; 
print_r ($selected_position);
print "</pre>"; 

*/



////////////////////////############## PROCESS VIEW  END





////////////////////////############## PROCESS CONFIG 
$show_pagetitle = "$show_content_pagename "; 

////////////////////////############## PROCESS CONFIG END



if ($banner_id=="") {
$option_confirm_email = "confirm";
$option_reply = "reply";
$option_approve = "approve";
$option_status = "on";
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Banner Update</title>


<link href="../app_design/css/style_backoffice.css" rel="stylesheet" type="text/css" />

<script language="javascript" src="../application/system_js/calendar.js"></script>

<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	width:500px;
	height:300px;
	z-index:10;
	overflow: auto;
}
-->
</style>
</head>

<body>

<?
include("../app_design/design_top_system.php"); 
?>



<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7"><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <tr>
    <td height="550" align="left" valign="top">
    
    
    
    
<?


$page_topic_name = "เพิ่ม/แก้ไข ข้อมูล ป้ายโฆษณา "; 
include("../app_system/include/inc_body_system_topic.php");





?>
    
    
    
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">

          <tr>
            <td height="30" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                
                <td align="right"><table border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="60" align="center"><a href="adsbanner_showall.php?category_id=<?=$category_id?>"><img src="../images/icon/design_showall.gif" width="164" height="35" hspace="5" /></a></td>
                    <?
if ($banner_id != "" ) { 
?>
                    <td width="60" align="center"><a href="../adsbanner/banner_showall.php?<? print "banner_id=$banner_id&option_delete=delete&category_id=$category_id" ; ?>"   onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')"  ><img src="../images/icon/design_icon_delete.gif" alt="ลบข้อมูลนี้ ..." width="164" height="35" hspace="5" border="0" /></a></td>
                    <?
} /// if ($content_id != "" ) { 
?>
                    <td width="60" align="center"><a href="adsbanner_update.php?category_id=<?=$category_id?>"><img src="../images/icon/design_icon_add.gif" alt="เพิ่ม" width="164" height="35" hspace="5" border="0" /></a></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>

      </table>
      <?

/////////// status report
include("../app_system/include/inc_report_status.php");


?>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
        <tr>
          <td height="50" align="center" valign="top" bgcolor="#FFFFFF" class="text_bot1"  style="padding:3px; background-color:#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="text_normal1">
            <tr>
              <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">เรื่อง/โฆษณา/ลูกค้า  <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
                <input name="banner_name" type="text" id="banner_name" value="<?=$banner_name ?>" size="80"  style="width:500px;" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">Link URL :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="banner_url" type="text" id="banner_url" value="<?=$banner_url ?>" size="80"  style="width:500px;" /></td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รูปประกอบ/รูปแบบเนอร์  :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
             
<?

print " <input  type=\"radio\"   name=\"banner_type\"  id=\"banner_type\"  value=\"banner_image\"  "; 
if ($banner_type=="banner_image") { print " checked "; } 
print "/>แสดงป้ายโฆษณา โดยรูปป้ายโฆษณาต่อไปนี้<br />";



if ($banner_image != "" ) { 
print $show_banner_image ;
print "<input  type=\"checkbox\"   	name=\"delete_banner_image\" 		id=\"delete_banner_image\" 	value=\"delete\"  $option_delete_checked    />Delete Picture <br>";
} ///gallery_image_mini

print "<input  type=\"file\"  				name=\"upload_banner_image\" 		id=\"upload_banner_image\"  	size=\"35\"   style=\"width:350px;\" />";
print "<input type=\"hidden\" 			name=\"db_banner_image\"  		id=\"db_banner_image\"  	value=\"$banner_image\" />   ";

?></td>
            </tr>
            <tr>
              <td height="50" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">Banner Code :</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
              
<?
				
				
print " <input  type=\"radio\"   name=\"banner_type\"  id=\"banner_type\"  value=\"banner_code\"  "; 
if ($banner_type=="banner_code") { print " checked "; } 
print "/>แสดงป้ายโฆษณา โดยโค๊ดต่อไปนี้<br />";


print "<textarea name=\"banner_code\" cols=\"80\" rows=\"5\" id=\"banner_code\"  style=\"width:500px;\">$banner_code</textarea>"; 

?></td>
            </tr>
            <tr>
              <td height="50" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">สถานะ :</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
                <?




if ($option_approve == "approve" ) {  $option_approve_checked = "checked"; } else  {  $option_approve_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_approve\" id=\"option_approve\" value=\"approve\"  $option_approve_checked    />ยืนยันการอนุมัติ (Approve)<br>"; 


if ($option_status == "on" ) {  $option_status_checked = "checked"; } else  {  $option_status_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_status\" id=\"option_status\" value=\"on\"  $option_status_checked    />ออนไลน์ข้อมูล (Online)<br>"; 

?>
                </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">&nbsp;</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input type="submit" name="button3" id="button3" value="บันทึกข้อมูล" />
                <input type="reset" name="button4" id="button4" value="รีเซต ..." /></td>
            </tr>
          </table>
            <table width="100%" border="0" cellspacing="5" cellpadding="0">
              <tr>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left"><span class="text_bot1" style="padding:3px; background-color:#FFFFFF">เลือกตำแหน่งที่จะแสดงป้ายโฆษณา</span></td>
              </tr>
              <tr>
                <td>
				
<?

$input_array = array(
/// "section_id"=>"$section_id" ,
"sql_orderby"=>" ORDER BY option_order ASC " ,
);
$count_row = $app_ads_banner_position->function_countbyset( $input_array );
if ($count_row > 0 ){ 
$banner_rs = $app_ads_banner_position->function_viewbyset( $input_array ); /// select ข้อมูล

?>
 
                  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#333333">
                    <tr>
                      <td  height="27" align="center" bgcolor="#999999" style="width:50px;"  class="text_normal1"><b>#</b></td>
                      <td align="center"  bgcolor="#999999" class="text_normal1"  style="width:350px;"  ><b>Page ID</b></td>
                      <td width="70" align="center" bgcolor="#999999"   style="width:150px;" class="text_normal1"><b>Position Code </b></td>
                      <td align="center"  bgcolor="#999999" class="text_normal1" ><b>&nbsp; ชื่อตำแหน่งโฆษณา</b></td>
                      <td width="130" align="center" bgcolor="#999999"   style="width:130px;" class="text_normal1"><b>ขนาด</b></td>
                      <td align="center"  bgcolor="#999999" class="text_normal1"  style="width:100px;">จำนวนป้าย</td>
                      <td align="center"  bgcolor="#999999" class="text_normal1"  style="width:70px;">สถานะ</td>
                      <td align="center"  bgcolor="#999999" class="text_normal1"  style="width:70px;">แก้ไข</td>
                      <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1" ><b>เลือก</b></td>
                      </tr>
                    <?









$count_loop = 0 ;
while($rs = $banner_rs->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;




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




////////////////////// count this position
$input_array = array(
"position_id"=>"$position_id" ,
"option_status"=>"on" ,
);
$loop_count_match = $app_ads_banner_match->function_countbyset( $input_array );
////////////////////// count this position end



$get_position_id = $selected_position["$position_id"]["position_id"];
$get_match_id = $selected_position["$position_id"]["match_id"];
$get_option_status = $selected_position["$position_id"]["option_status"];

if ($get_option_status == "on" ){
$set_bg_color = "  bgcolor=\"#99CC33\" ";
} else {
$set_bg_color = "  bgcolor=\"#FFCC99\"  ";
}


?>
                    <tr class="text_normal1">
                      <td height="30" align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?=$count_loop ?>.</td>
                      <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"  ><?=$page_id ?></td>
                      <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><b><?=$position_code ?></b>
                        &nbsp;</td>
                      <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"  ><b>
                        <?=$position_name ?>
                        </b>
                        <?=$position_des ?>
                        <br />
                        <?=$position_url ?></td>
                      <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><?=$position_w?>
                        x
                        <?=$position_h?></td>
                      <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"  >ใช้งาน <?=$loop_count_match ?> ป้าย</td>
                      <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"  ><b>
                        <?=$option_status?>
                      </b></td>
                      <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"  ><a href="adsbanner_position_update.php?position_id=<?=$position_id?>" target="_blank"><b>แก้ไข</b></a></td>
                      <td align="center" valign="top"  style="padding:4px;"  <?=$set_bg_color ?>><?

//// $selected_position["$position_id"]






if ($get_option_status == "on" ){ $option_checked = " checked ";  } else { $option_checked = "";  }

print "<input type=\"hidden\"  name=\"loop_position_id[]\"  id=\"loop_position_id[]\" value=\"$position_id\" />";
print "<input type=\"hidden\"  name=\"match_id_$position_id\"  id=\"match_id_$position_id\" value=\"$get_match_id\" />";
print "<input  type=\"checkbox\" name=\"match_status_$position_id\" id=\"match_status_$position_id\" value=\"on\"   $option_checked  />";




/// 
////print "<input  type=\"checkbox\" name=\"select_match_position[]\" id=\"select_match_position[]\" value=\"$position_id\"   $option_checked  />";
//// print $selected_position_check ;

?></td>
                      </tr>
                    <?


/////////////////////// level 1 end loop
} //////////// loop end

?>
                  </table>
<?
} ////if ($count_row > 0 ){ 
?>
</td>
              </tr>
              <tr>
                <td height="50" align="left" valign="middle">
                  <input type="submit" name="button" id="button" value="บันทึกข้อมูล" />
                  <input type="reset" name="button" id="button2" value="รีเซต ..." />
            </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr><input  type="hidden" name="appaction"  id="appaction" value="update_information" />
<input type="hidden" name="banner_id"  id="banner_id" value="<?=$banner_id?>" />

</form>
</table>


<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>