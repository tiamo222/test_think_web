<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/content/content_update.php";
include("../app_system/include/inc_checklogin_user.php"); 

$system_id = "app_content";

////////////////////////############## PROCESS UPDATE 

if (empty($_REQUEST["content_id"]) )  {  $content_id="";  } else { $content_id=$_REQUEST["content_id"];  }
if (empty($_REQUEST["category_id"]) )  {  $category_id="";  } else { $category_id=$_REQUEST["category_id"];  }


if (empty($_REQUEST["content_appaction_update"]) )  {  $content_appaction_update = "";  } else { $content_appaction_update = $_REQUEST["content_appaction_update"];  }
if (empty( $_REQUEST["show_status"] ) )  {  $show_status = "";  } else { $show_status = $_REQUEST["show_status"]; }


if ($content_appaction_update == "update_information") {
	

///////// check request

if (empty($_REQUEST["content_name"]) )  				{  $content_name="";  } else { $content_name=$_REQUEST["content_name"];  }
if (empty($_REQUEST["content_name_lang2"]) )  		{  $content_name_lang2="";  } else { $content_name_lang2=$_REQUEST["content_name_lang2"];  }
if (empty($_REQUEST["content_name_lang3"]) )  		{  $content_name_lang3="";  } else { $content_name_lang3=$_REQUEST["content_name_lang3"];  }
if (empty($_REQUEST["content_name_lang4"]) )  		{  $content_name_lang4="";  } else { $content_name_lang4=$_REQUEST["content_name_lang4"];  }
if (empty($_REQUEST["content_name_lang5"]) )  		{  $content_name_lang5="";  } else { $content_name_lang5=$_REQUEST["content_name_lang5"];  }


if (empty($_REQUEST["content_des"]) )  					{  $content_des="";  } else { $content_des=$_REQUEST["content_des"];  }
if (empty($_REQUEST["content_des_lang2"]) )			{  $content_des_lang2="";  } else { $content_des_lang2=$_REQUEST["content_des_lang2"];  }
if (empty($_REQUEST["content_des_lang3"]) )			{  $content_des_lang3="";  } else { $content_des_lang3=$_REQUEST["content_des_lang3"];  }
if (empty($_REQUEST["content_des_lang4"]) )			{  $content_des_lang4="";  } else { $content_des_lang4=$_REQUEST["content_des_lang4"];  }
if (empty($_REQUEST["content_des_lang5"]) )			{  $content_des_lang5="";  } else { $content_des_lang5=$_REQUEST["content_des_lang5"];  }


if (empty($_REQUEST["content_detail"]) )  				{  $content_detail="";  } else { $content_detail=$_REQUEST["content_detail"];  }
if (empty($_REQUEST["content_detail_lang2"]) )		{  $content_detail_lang2="";  } else { $content_detail_lang2=$_REQUEST["content_detail_lang2"];  }
if (empty($_REQUEST["content_detail_lang3"]) )		{  $content_detail_lang3="";  } else { $content_detail_lang3=$_REQUEST["content_detail_lang3"];  }
if (empty($_REQUEST["content_detail_lang4"]) )		{  $content_detail_lang4="";  } else { $content_detail_lang4=$_REQUEST["content_detail_lang4"];  }
if (empty($_REQUEST["content_detail_lang5"]) )		{  $content_detail_lang5="";  } else { $content_detail_lang5=$_REQUEST["content_detail_lang5"];  }


if (empty($_REQUEST["content_source_name"]) )  	{  $category_detail="";  } else { $category_detail=$_REQUEST["content_source_name"];  }
if (empty($_REQUEST["content_source_url"]) )  		{  $content_source_url="";  } else { $content_source_url=$_REQUEST["content_source_url"];  }


if (empty($_REQUEST["option_approve"]) )  				{  $option_approve="none";  } else { $option_approve=$_REQUEST["option_approve"];  }
if (empty($_REQUEST["option_reply"]) )  					{  $option_reply="none";  } else { $option_reply=$_REQUEST["option_reply"];  }
if (empty($_REQUEST["option_highlight"]) )  			{  $option_highlight="none";  } else { $option_highlight=$_REQUEST["option_highlight"];  }
if (empty($_REQUEST["option_recommend"]) )  		{  $option_recommend="none";  } else { $option_recommend=$_REQUEST["option_recommend"];  }
if (empty($_REQUEST["option_order"]) )  				{  $option_order="0";  } else { $option_order=$_REQUEST["option_order"];  }

if (empty($_REQUEST["option_lang1"]) )  				{  $option_lang1="none";  } else { $option_lang1=$_REQUEST["option_lang1"];  }
if (empty($_REQUEST["option_lang2"]) )  				{  $option_lang2="none";  } else { $option_lang2=$_REQUEST["option_lang2"];  }
if (empty($_REQUEST["option_lang3"]) )  				{  $option_lang3="none";  } else { $option_lang3=$_REQUEST["option_lang3"];  }
if (empty($_REQUEST["option_lang4"]) )  				{  $option_lang4="none";  } else { $option_lang4=$_REQUEST["option_lang4"];  }
if (empty($_REQUEST["option_lang5"]) )  				{  $option_lang5="none";  } else { $option_lang5=$_REQUEST["option_lang5"];  }
if (empty($_REQUEST["option_status"]) )  				{  $option_status="off";  } else { $option_status=$_REQUEST["option_status"];  }


///////// check input
/// system_id
/// category_id_root
/// category_name



$show_status = "success";


if ($content_name == "" ) {
$show_status = "error";
$array_report_error[] = "- กรุณากรอก เรื่อง/หัวข้อ "; 
}



///// config
/// list($category_id_root , $category_level  ) = split("#", $category_id_root_select );



if ($show_status == "success" ){ 






/// content_image_mini
////////////////////////////////////////////////////////////////////////////// upload config 
/// picture
if (empty($_REQUEST["db_content_image_mini"]) )  		{  $db_content_image_mini = "";  } else { $db_content_image_mini=$_REQUEST["db_content_image_mini"];  }
if (empty($_REQUEST["delete_content_image_mini"]) ) 	{  $delete_content_image_mini = "none";  } else { $delete_content_image_mini=$_REQUEST["delete_content_image_mini"];  }

$picture_path 				= $path_content  ; /// config 
$picture_original 			= $db_content_image_mini ; /// config 
$picture_option_delete 	= $delete_content_image_mini ; /// config 
$picture_update 			= $picture_original ;

$picture_fileupload 			= $_FILES["upload_content_image_mini"]["tmp_name"]; /// config 
$picture_fileupload_name 	= $_FILES["upload_content_image_mini"]["name"]; /// config 
$picture_name_new =  "contentm-";  ///config

if ($picture_fileupload != "" or  $picture_option_delete =="delete" ) { //// check picture
$input_upload = array(
"picture_path"=>"$picture_path" , 
"picture_original"=>"$picture_original" , 
"picture_option_delete"=>"$picture_option_delete" , 
"picture_fileupload"=>"$picture_fileupload" , 
"picture_fileupload_name"=>"$picture_fileupload_name" , 
"picture_name_new"=>"$picture_name_new" , 
);
$result_fileupload_name = function_picture_upload_mix($input_upload);
$picture_update = $result_fileupload_name ;  //////// config
} /////// check picture

$content_image_mini = $picture_update ;  //// config
////////////////////////////////////////////////////////////////////////////// upload config  end




/// content_image
////////////////////////////////////////////////////////////////////////////// upload config 
/// picture
if (empty($_REQUEST["db_content_image"]) )  		{  $db_content_image = "";  } else { $db_content_image=$_REQUEST["db_content_image"];  }
if (empty($_REQUEST["delete_content_image"]) ) 	{  $delete_content_image = "none";  } else { $delete_content_image=$_REQUEST["delete_content_image"];  }

$picture_path 				= $path_content  ; /// config 
$picture_original 			= $db_content_image ; /// config 
$picture_option_delete 	= $delete_content_image ; /// config 
$picture_update 			= $picture_original ;

$picture_fileupload = $_FILES["upload_content_image"]["tmp_name"]; /// config 
$picture_fileupload_name = $_FILES["upload_content_image"]["name"]; /// config 
$picture_name_new =  "contentb-";  ///config

if ($picture_fileupload != "" or  $picture_option_delete =="delete" ) { //// check picture
$input_upload = array(
"picture_path"=>"$picture_path" , 
"picture_original"=>"$picture_original" , 
"picture_option_delete"=>"$picture_option_delete" , 
"picture_fileupload"=>"$picture_fileupload" , 
"picture_fileupload_name"=>"$picture_fileupload_name" , 
"picture_name_new"=>"$picture_name_new" , 
);
$result_fileupload_name = function_picture_upload_mix($input_upload);
$picture_update = $result_fileupload_name ;  //////// config
} /////// check picture

$content_image = $picture_update ;  //// config
////////////////////////////////////////////////////////////////////////////// upload config  end






$input_array = array(
"content_id"=>"$content_id" , 
"category_id"=>"$category_id" , 
"system_id"=>"$system_id" , 

"content_name"=>"$content_name" , 
"content_name_lang2"=>"$content_name_lang2" , 
"content_name_lang3"=>"$content_name_lang3" , 
"content_name_lang4"=>"$content_name_lang4" , 
"content_name_lang5"=>"$content_name_lang5" , 
"content_code"=>"$content_code" , 

"content_des"=>"$content_des" , 
"content_des_lang2"=>"$content_des_lang2" , 
"content_des_lang3"=>"$content_des_lang3" , 
"content_des_lang4"=>"$content_des_lang4" , 
"content_des_lang5"=>"$content_des_lang5" , 

"content_detail"=>"$content_detail" , 
"content_detail_lang2"=>"$content_detail_lang2" , 
"content_detail_lang3"=>"$content_detail_lang3" , 
"content_detail_lang4"=>"$content_detail_lang4" , 
"content_detail_lang5"=>"$content_detail_lang5" , 

"content_source_name"=>"$content_source_name" , 
"content_source_url"=>"$content_source_url" , 

"content_image_mini"=>"$content_image_mini" , 
"content_image"=>"$content_image" , 

"option_reply"=>"$option_reply" , 
"option_highlight"=>"$option_highlight" , 
"option_recommend"=>"$option_recommend" , 
"option_approve"=>"$option_approve" , 
"option_order"=>"$option_order" , 

"option_lang1"=>"$option_lang1" , 
"option_lang2"=>"$option_lang2" , 
"option_lang3"=>"$option_lang3" , 
"option_lang4"=>"$option_lang4" , 
"option_lang5"=>"$option_lang5" , 

"option_status"=>"$option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $app_content->function_update( $input_array );
$show_status = $result_update["show_status"];
$content_id = $result_update["content_id"];

} ///if ($process_check_input == "success" ){ 

/// print "show_status = $show_status ";

if ($show_status == "success" ){ 
header("Location:content_update.php?content_id=$content_id&show_status=$show_status"); 
} 

} //// if ($appaction == "update_information") {
////////////////////////############## PROCESS UPDATE  END


/*
print "<pre>"; 
print_r ($array_report_error);
print "</pre>"; 
*/


////////////////////////############## PROCESS VIEW 

/// form set

if ($content_id != "" ) { 

$input_array = array(
"content_id"=>"$content_id" , 
);
$rs_content = $app_content->function_viewbyid( $input_array );
if ($rs_content ) {
	
$content_id = $rs_content["content_id"];
$content_id_name = $rs_content["content_id_name"];

$category_id = $rs_content["category_id"];
$system_id = $rs_content["system_id"];

$content_code = $rs_content["content_code"];
$content_name = $rs_content["content_name"];
$content_name_lang2 = $rs_content["content_name_lang2"];
$content_name_lang3 = $rs_content["content_name_lang3"];
$content_name_lang4 = $rs_content["content_name_lang4"];
$content_name_lang5 = $rs_content["content_name_lang5"];

$content_des = $rs_content["content_des"];
$content_des_lang2 = $rs_content["content_des_lang2"];
$content_des_lang3 = $rs_content["content_des_lang3"];
$content_des_lang4 = $rs_content["content_des_lang4"];
$content_des_lang5 = $rs_content["content_des_lang5"];

$content_detail = $rs_content["content_detail"];
$content_detail_lang2 = $rs_content["content_detail_lang2"];
$content_detail_lang3 = $rs_content["content_detail_lang3"];
$content_detail_lang4 = $rs_content["content_detail_lang4"];
$content_detail_lang5 = $rs_content["content_detail_lang5"];


$content_source_name = $rs_content["content_source_name"];
$content_source_url = $rs_content["content_source_url"];

$content_image_mini = $rs_content["content_image_mini"];
$content_image = $rs_content["content_image"];

$stat_view = $rs_content["stat_view"];
$stat_reply = $rs_content["stat_reply"];
$stat_delete = $rs_content["stat_delete"];


$option_reply = $rs_content["option_reply"];
$option_highlight = $rs_content["option_highlight"];
$option_recommend = $rs_content["option_recommend"];
$option_approve = $rs_content["option_approve"];
$option_order = $rs_content["option_order"];
$option_status = $rs_content["option_status"];
$option_fixed  = $rs_content["option_fixed"];

$option_lang1 = $rs_content["option_lang1"];
$option_lang2 = $rs_content["option_lang2"];
$option_lang3 = $rs_content["option_lang3"];
$option_lang4 = $rs_content["option_lang4"];
$option_lang5 = $rs_content["option_lang5"];

$user_create = $rs_content["user_create"];
$user_update = $rs_content["user_update"];
$user_delete = $rs_content["user_delete"];
$datetime_create = $rs_content["datetime_create"];
$datetime_update = $rs_content["datetime_update"];
$datetime_delete = $rs_content["datetime_delete"];


if ($content_image_mini != "" ) { 
$show_content_image_mini = "<img src=\"$path_content$content_image_mini\"  border=0 ><br>
<input  type=\"checkbox\"   	name=\"delete_content_image_mini\" 	id=\"delete_content_image_mini\"   value=\"delete\"  $option_delete_checked    />Delete Picture <br>"; 
}

if ($content_image != "" ) { 
$show_content_image = "<img src=\"$path_content$content_image\"  border=0 ><br>
<input  type=\"checkbox\"   	name=\"delete_content_image\" 	id=\"delete_content_image\"   value=\"delete\"  $option_delete_checked    />Delete Picture <br>
"; 
} ///gallery_image_mini


}///rs
} ///if ($content_id != "" ) { 




////////////////////////############## PROCESS VIEW  END





////////////////////////############## PROCESS CONFIG 
$show_pagetitle = "$show_content_pagename "; 

////////////////////////############## PROCESS CONFIG END


if ($system_id=="") {$system_id= "none";}
if ($content_id=="") {
$option_approve= "approve";
$option_status= "on";
}


 include("../app_application/webeditor_code_select.php"); 




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
<title>Content Update</title>
<link href="../app_design/css/style_backoffice.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>


<script type="text/javascript" src="../app_application/system_js/jquery-1.2.6.js"></script>
<script type="text/javascript" src="../app_application/system_js/animatedcollapse.js"></script>

<script type="text/javascript">
animatedcollapse.addDiv('tap_01', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_02', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_03', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_04', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_05', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_06', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_07', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_08', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_09', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_10', 'fade=0,speed=300')
animatedcollapse.init()
</script>

</head>
<body>
<?
include("../app_design/design_top_system.php"); 
?>




<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7"><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <tr>
    <td height="550" align="left" valign="top">
    
    
    
    
<?


$page_topic_name = "เพิ่ม/แก้ไข ข้อมูลเนื้อหาบทความ "; 
include("../app_system/include/inc_body_system_topic.php");





?>
    
    
    
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">

          <tr>
            <td height="30" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td align="right" ><table border="0" cellpadding="0" cellspacing="5">
                  <tr>
                    <td width="60" align="center" valign="top"><a href="content_showall.php?category_id=<?=$category_id?>"><img src="../images/icon/icon_all.gif" width="164" height="35" hspace="0" vspace="0" /></a></td>
                    
                    
<?
if ($content_id != "" and  $option_fixed != "fixed" ) { 
?>
<td width="60" align="center" valign="top"><a href="content_showall.php?<? print "content_id=$content_id&option_delete=delete&category_id=$category_id" ; ?>"   onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')"  ><img src="../images/icon/design_icon_delete.gif" alt="ลบข้อมูลนี้ ..." width="164" height="35" hspace="0" vspace="0" border="0" /></a>
</td>
                    
<?
} /// if ($content_id != "" ) { 
?>
<td width="60" align="center" valign="top"><a href="content_update.php?category_id=<?=$category_id?>"><img src="../images/icon/design_icon_add.gif" alt="เพิ่ม" width="164" height="35" hspace="0" vspace="0" border="0" /></a></td>                    
                    </tr>
                </table></td>
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

/////////// status report
include("../app_system/include/inc_report_status.php");


?>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
        <tr>
          <td height="50" align="left" valign="top" bgcolor="#FFFFFF"  style="padding:3px; background-color:#FFFFFF"  class="text1"><table width="100%" border="0" cellpadding="2" cellspacing="2">
            <tr bgcolor="#FFFFFF" class="text_normal1">
              <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5"> หมวดหมู่ <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

/// print_r ($app_category);


if ($system_id == "none") {

print "<select name=\"category_id\" id=\"category_id\" class=\"text_normal1\" style=\"width:350px;\" disabled=\"disabled\">";
print "<option value=\"none\" selected >กรุณาเลือกระบบ ก่อนค่ะ</option>";
print "</select>"; 

} else { 






print "<select name=\"category_id\" id=\"category_id\" class=\"text_normal1\" style=\"width:350px;\">";
print "<option value=\"none\" selected >- กรุณาเลือกหมวดหมู่</option>";


///////////////////////////// level 1 
$input_array1 = array(
"sql_orderby"=>" ORDER BY option_order  ASC " ,
"system_id"=>"$system_id" , 
"category_id_root"=>"root" , 
"category_level"=>"1" , 
);
$category_count_row = $app_category->function_countbyset( $input_array1 );
if ($category_count_row > 0 ){  //// count row
$category_rs = $app_category->function_viewbyset( $input_array1 ); /// select ข้อมูล

$level1_loop = 0 ; 
while($rs = $category_rs->FetchRow()){ /////// loop 
$level1_loop = $level1_loop + 1 ; 

$loop_category_id = $rs["category_id"];
$loop_category_name = $rs["category_name"];


if ($loop_category_id == $category_id ) { $category_id_selected = "selected";  } else { $category_id_selected = ""; }

print "<option value=\"$loop_category_id\"   $category_id_selected >$level1_loop. อยู่ในหมวดหมู่ : $loop_category_name</option>";


///////////////////////////// level 2
$input_array2 = array(
"sql_orderby"=>" ORDER BY option_order  ASC " ,
"system_id"=>"$system_id" , 
"category_id_root"=>"$loop_category_id" , 
"category_level"=>"2" , 
);
$category_count_row2 = $app_category->function_countbyset( $input_array2 );
if ($category_count_row2 > 0 ){  //// count row
$category_rs2 = $app_category->function_viewbyset( $input_array2 ); /// select ข้อมูล

$level2_loop = 0 ; 
while($rs2 = $category_rs2->FetchRow()){ /////// loop 
$level2_loop = $level2_loop + 1 ; 

$loop2_category_id = $rs2["category_id"];
$loop2_category_name = $rs2["category_name"];

if ($loop2_category_id == $category_id ) { $category_id_selected = "selected";  } else { $category_id_selected = ""; }

print "<option value=\"$loop2_category_id\"  $category_id_selected >$level1_loop.$level2_loop อยู่ในหมวดหมู่ : $loop2_category_name</option>";



///////////////////////////// level 3
$input_array3 = array(
"sql_orderby"=>" ORDER BY option_order  ASC " ,
"system_id"=>"$system_id" , 
"category_id_root"=>"$loop2_category_id" , 
"category_level"=>"3" , 
);
$category_count_row3 = $app_category->function_countbyset( $input_array3 );
if ($category_count_row3 > 0 ){  //// count row
$category_rs3 = $app_category->function_viewbyset( $input_array3 ); /// select ข้อมูล

$level3_loop = 0 ; 
while($rs3 = $category_rs3->FetchRow()){ /////// loop 
$level3_loop = $level3_loop + 1 ; 


$loop3_category_id = $rs3["category_id"];
$loop3_category_name = $rs3["category_name"];

if ($loop3_category_id == $category_id ) { $category_id_selected = "selected";  } else { $category_id_selected = ""; }

print "<option value=\"$loop3_category_id\"  $category_id_selected >$level1_loop.$level2_loop.$level3_loop อยู่ในหมวดหมู่ : $loop3_category_name</option>";




} //// loop
} //// count row
///////////////////////////// level 3 end


} //// loop
} //// count row
///////////////////////////// level 2 end


} //// loop
} //// count row
///////////////////////////// level 1 end

print "</select>"; 

} ///

?></td>
            </tr>
            <tr bgcolor="#FFFFFF" class="text_normal1">
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ลำดับ :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="option_order" type="text" id="option_order" value="<?=$option_order ?>" size="10" /></td>
            </tr>
            <tr bgcolor="#FFFFFF" class="text_normal1">
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รหัส :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="content_code" type="text" id="content_code" value="<?=$content_code ?>" size="10" /></td>
            </tr>
            <tr bgcolor="#FFFFFF" class="text_normal1">
              <td align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ตัวเลือกเกี่ยวกับภาษา :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
              
<?



if ($option_lang1 == "on" ) {  $option_checked = "checked"; } else  {  $option_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_lang1\" id=\"option_lang1\" value=\"on\"  $option_checked    /> แสดงข้อมูลในเวอร์ชั่น  $language_icon_lang1 $language_name_lang1 <br>"; 



if ($option_status_lang2 == "on" ){
if ($option_lang2 == "on" ) {  $option_checked = "checked"; } else  {  $option_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_lang2\" id=\"option_lang2\" value=\"on\"  $option_checked    /> แสดงข้อมูลในเวอร์ชั่น $language_icon_lang2 $language_name_lang2<br>"; 
}////if ($option_status_lang2 == "on" ){
	
	
if ($option_status_lang3 == "on" ){
if ($option_lang3 == "on" ) {  $option_checked = "checked"; } else  {  $option_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_lang3\" id=\"option_lang3\" value=\"on\"  $option_checked    /> แสดงข้อมูลในเวอร์ชั่น $language_icon_lang3 $language_name_lang3 <br>"; 
}////if ($option_status_lang3 == "on" ){


if ($option_status_lang4 == "on" ){
if ($option_lang4 == "on" ) {  $option_checked = "checked"; } else  {  $option_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_lang4\" id=\"option_lang4\" value=\"on\"  $option_checked    /> แสดงข้อมูลในเวอร์ชั่น $language_icon_lang4 $language_name_lang4 <br>"; 
}////if ($option_status_lang4 == "on" ){
	

if ($option_status_lang5 == "on" ){
if ($option_lang5 == "on" ) {  $option_checked = "checked"; } else  {  $option_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_lang5\" id=\"option_lang5\" value=\"on\"  $option_checked    /> แสดงข้อมูลในเวอร์ชั่น $language_icon_lang5 $language_name_lang5 <br>"; 
}////if ($option_status_lang5 == "on" ){


?>


    </td>
            </tr>
            </table>


<br /><b>      
<?




print "
<a href=\"javascript:animatedcollapse.show('tap_01');javascript:animatedcollapse.hide([ 'tap_02',  'tap_03', 'tap_04', 'tap_05' ]);\">$language_icon_lang1 ภาษา $language_name_lang1</a>
";


if ($option_status_lang2 == "on" ){
print "
 | <a href=\"javascript:animatedcollapse.show('tap_02');javascript:animatedcollapse.hide([ 'tap_01',  'tap_03', 'tap_04', 'tap_05' ]);\">$language_icon_lang2 ภาษา $language_name_lang2</a>
";
} ///option_status_lang2


if ($option_status_lang3 == "on" ){
print "
 | <a href=\"javascript:animatedcollapse.show('tap_03');javascript:animatedcollapse.hide([ 'tap_01',  'tap_02', 'tap_04', 'tap_05' ]);\">$language_icon_lang3 ภาษา $language_name_lang3</a>
";
} ///option_status_lang3


if ($option_status_lang4 == "on" ){
print "
 | <a href=\"javascript:animatedcollapse.show('tap_04');javascript:animatedcollapse.hide([ 'tap_01',  'tap_02', 'tap_03', 'tap_05' ]);\">$language_icon_lang4 ภาษา $language_name_lang4</a>
";
} ///option_status_lang4


if ($option_status_lang5 == "on" ){
print "
 | <a href=\"javascript:animatedcollapse.show('tap_05');javascript:animatedcollapse.hide([ 'tap_01',  'tap_02', 'tap_03', 'tap_04' ]);\">$language_icon_lang5 ภาษา $language_name_lang5</a> 
";
} ///option_status_lang4




?>


</b><br /><br />




<?
print "<div id=\"tap_01\" style=\"width:100%; background:#FFFFFF;\">" ; 
?>
            <table width="100%" border="0" cellpadding="4" cellspacing="2" style="background-color:#09C" class="text1">
              <tr>
                <td><?=$language_icon_lang1 ?> <font color="#FFFFFF"><b>ข้อมูล ภาษา <?=$language_name_lang1 ?></b></font></td>
                </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:0px;"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="text1">
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">เรื่อง/หัวข้อ <font color="#FF0000">*</font> :</td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="content_name" type="text" id="content_name" value="<?=$content_name ?>" size="80"  style="width:700px;" /></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="50" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียดอย่างย่อ :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"content_des\" cols=\"80\" rows=\"5\" id=\"content_des\"  style=\"width:700px;\">$content_des</textarea>"; 

?></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="100" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียด :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
					
<?





/// print "<textarea name=\"content_detail\" cols=\"80\" rows=\"20\" id=\"content_detail\"  style=\"width:700px;\">$content_detail</textarea>"; 
$editor_show_information = $content_detail ;
$editor_config_name = "content_detail" ;
$editor_config_w= 800;
$editor_config_h= 550;
include("../app_application/webeditor_code_a.php");





/*
print "<textarea id=\"content_detail\" name=\"content_detail\" rows=\"20\" cols=\"80\" >$content_detail</textarea>";
 <script type="text/javascript">
CKEDITOR.replace('content_detail',
{
filebrowserBrowseUrl : '<?=$path_ckfinder?>ckfinder.html',
filebrowserImageBrowseUrl : '<?=$path_ckfinder?>ckfinder.html?Type=Images',
filebrowserFlashBrowseUrl : '<?=$path_ckfinder?>ckfinder.html?Type=Flash',
filebrowserUploadUrl : '<?=$path_ckfinder?>core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?=$path_ckfinder?>core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?=$path_ckfinder?>core/connector/php/connector.php?command=QuickUpload&type=Flash'
}
);
</script>
*/

 


 ?>




 
 </td>
                  </tr>
                </table></td>
                </tr>
            </table>
            <br />
<?

print "</div>" ;
print "<div id=\"tap_02\" style=\"width:100%; background: #FFFFFF;display:none;\">" ; 

?>
            
            <table width="100%" border="0" cellpadding="4" cellspacing="2" style="background-color:#CC0000" class="text1">
              <tr>
                <td bgcolor="#CC0000"><?=$language_icon_lang2 ?> <font color="#FFFFFF"><b>ข้อมูล ภาษา <?=$language_name_lang2 ?></b></font></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:0px;"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="text1">
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">เรื่อง/หัวข้อ <font color="#FF0000">*</font> :</td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input  type="text"  name="content_name_lang2" id="content_name_lang2" value="<?=$content_name_lang2 ?>" size="80"  style="width:700px;" /></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="50" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียดอย่างย่อ :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"content_des_lang2\"  id=\"content_des_lang2\" cols=\"80\" rows=\"5\"  style=\"width:700px;\">$content_des_lang2</textarea>"; 

?></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="100" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียด :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
					
<?


$editor_show_information = $content_detail_lang2 ;
$editor_config_name = "content_detail_lang2" ;
$editor_config_w= 800;
$editor_config_h= 550;
include("../app_application/webeditor_code_a.php");

/*
print "<textarea id=\"content_detail_lang2\" name=\"content_detail_lang2\" rows=\"20\" cols=\"80\" >$content_detail_lang2</textarea>";
<script type="text/javascript">
CKEDITOR.replace('content_detail_lang2',
{
filebrowserBrowseUrl : '<?=$path_ckfinder?>ckfinder.html',
filebrowserImageBrowseUrl : '<?=$path_ckfinder?>ckfinder.html?Type=Images',
filebrowserFlashBrowseUrl : '<?=$path_ckfinder?>ckfinder.html?Type=Flash',
filebrowserUploadUrl : '<?=$path_ckfinder?>core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?=$path_ckfinder?>core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?=$path_ckfinder?>core/connector/php/connector.php?command=QuickUpload&type=Flash'
}				
);
</script>
*/



 ?>


              
              
              </td>
                  </tr>
                </table></td>
              </tr>
            </table>
            <br />

<?

print "</div>" ;
print "<div id=\"tap_03\" style=\"width:100%; background: #FFFFFF;display:none;\">" ; 

?>
            
            <table width="100%" border="0" cellpadding="4" cellspacing="2" style="background-color:#009900" class="text1">
              <tr>
                <td bgcolor="#009900"><?=$language_icon_lang3 ?> <font color="#FFFFFF"><b>ข้อมูล ภาษา <?=$language_name_lang3 ?></b></font></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:0px;"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="text1">
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">เรื่อง/หัวข้อ <font color="#FF0000">*</font> :</td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
                    <input type="text" name="content_name_lang3"  id="content_name_lang3" value="<?=$content_name_lang3 ?>" size="80"  style="width:700px;" /></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="50" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียดอย่างย่อ :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"content_des_lang3\" id=\"content_des_lang3\" cols=\"80\" rows=\"5\"  style=\"width:700px;\">$content_des_lang3</textarea>"; 

?></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="100" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียด :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
					
					
<?


$editor_show_information = $content_detail_lang3 ;
$editor_config_name = "content_detail_lang3" ;
$editor_config_w= 800;
$editor_config_h= 550;
include("../app_application/webeditor_code_a.php");

/*
print "<textarea id=\"content_detail_lang3\" name=\"content_detail_lang3\" rows=\"20\" cols=\"80\" >$content_detail_lang3</textarea>";
<script type="text/javascript">
CKEDITOR.replace('content_detail_lang3',
{
filebrowserBrowseUrl : '<?=$path_ckfinder?>ckfinder.html',
filebrowserImageBrowseUrl : '<?=$path_ckfinder?>ckfinder.html?Type=Images',
filebrowserFlashBrowseUrl : '<?=$path_ckfinder?>ckfinder.html?Type=Flash',
filebrowserUploadUrl : '<?=$path_ckfinder?>core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?=$path_ckfinder?>core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?=$path_ckfinder?>core/connector/php/connector.php?command=QuickUpload&type=Flash'
}				
);
</script>
*/




 ?>




</td>
                  </tr>
                </table></td>
              </tr>
            </table>
            <br />
<?

print "</div>" ;
print "<div id=\"tap_04\" style=\"width:100%; background: #FFFFFF;display:none;\">" ; 

?>
            
            <table width="100%" border="0" cellpadding="4" cellspacing="2" style="background-color:#FF0099" class="text1">
              <tr>
                <td bgcolor="#FF0099"><?=$language_icon_lang4 ?> <font color="#FFFFFF"><b>ข้อมูล ภาษา <?=$language_name_lang4 ?></b></font></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:0px;"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="text1">
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">เรื่อง/หัวข้อ <font color="#FF0000">*</font> :</td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
                    
                    <input type="text" name="content_name_lang4"  id="content_name_lang4" value="<?=$content_name_lang4 ?>" size="80"  style="width:700px;" /></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="50" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียดอย่างย่อ :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"content_des_lang4\"  id=\"content_des_lang4\"  cols=\"80\" rows=\"5\" style=\"width:700px;\">$content_des_lang4</textarea>"; 

?></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="100" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียด :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
					
<?


$editor_show_information = $content_detail_lang4 ;
$editor_config_name = "content_detail_lang4" ;
$editor_config_w= 800;
$editor_config_h= 550;
include("../app_application/webeditor_code_a.php");

/*
print "<textarea id=\"content_detail_lang4\" name=\"content_detail_lang4\" rows=\"20\" cols=\"80\" >$content_detail_lang4</textarea>";
<script type="text/javascript">
CKEDITOR.replace('content_detail_lang4',
{
filebrowserBrowseUrl : '<?=$path_ckfinder?>ckfinder.html',
filebrowserImageBrowseUrl : '<?=$path_ckfinder?>ckfinder.html?Type=Images',
filebrowserFlashBrowseUrl : '<?=$path_ckfinder?>ckfinder.html?Type=Flash',
filebrowserUploadUrl : '<?=$path_ckfinder?>core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?=$path_ckfinder?>core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?=$path_ckfinder?>core/connector/php/connector.php?command=QuickUpload&type=Flash'
}				
);
</script>
*/



 ?>





</td>
                  </tr>
                </table>
                  <br /></td>
              </tr>
            </table>
            <br />
            
<?

print "</div>" ;
print "<div id=\"tap_05\" style=\"width:100%; background: #FFFFFF;display:none;\">" ; 

?>
            
            <table width="100%" border="0" cellpadding="4" cellspacing="2" style="background-color:#663399" class="text1">
              <tr>
                <td bgcolor="#663399"><?=$language_icon_lang5 ?> <font color="#FFFFFF"><b>ข้อมูล ภาษา <?=$language_name_lang5 ?></b></font></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:0px;"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="text1">
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">เรื่อง/หัวข้อ <font color="#FF0000">*</font> :</td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="content_name5" type="text" id="content_name5" value="<?=$content_name ?>" size="80"  style="width:700px;" /></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="50" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียดอย่างย่อ :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"content_des_lang5\" cols=\"80\" rows=\"5\" id=\"content_des_lang5\"  style=\"width:700px;\">$content_des_lang5</textarea>"; 

?></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="100" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียด :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
					
					
<?


$editor_show_information = $content_detail_lang5 ;
$editor_config_name = "content_detail_lang5" ;
$editor_config_w= 800;
$editor_config_h= 550;
include("../app_application/webeditor_code_a.php");






/*
print "<textarea id=\"content_detail_lang5\" name=\"content_detail_lang5\" rows=\"20\" cols=\"80\" ></textarea>";
<script type="text/javascript">
CKEDITOR.replace('content_detail_lang5',
{
filebrowserBrowseUrl : '<?=$path_ckfinder?>ckfinder.html',
filebrowserImageBrowseUrl : '<?=$path_ckfinder?>ckfinder.html?Type=Images',
filebrowserFlashBrowseUrl : '<?=$path_ckfinder?>ckfinder.html?Type=Flash',
filebrowserUploadUrl : '<?=$path_ckfinder?>core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl : '<?=$path_ckfinder?>core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl : '<?=$path_ckfinder?>core/connector/php/connector.php?command=QuickUpload&type=Flash'
}				
);
</script>
*/




 ?>





</td>
                  </tr>
                </table></td>
              </tr>
            </table>
            
<?

print "</div>" ;


?>
            
            
            
            <table width="100%" border="0" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF" class="text_normal1">
              

              
              <tr>
              <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">&nbsp;</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ผู้เขียน/ที่มา  :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="content_source_name" type="text" id="content_source_name" value="<?=$content_source_name ?>" size="80"  style="width:350px;" /></td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รูปประกอบ ขนาดเล็ก :</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print 	$show_content_image_mini ; 
print "<input  type=\"file\"  				name=\"upload_content_image_mini\" 		id=\"upload_content_image_mini\"  	size=\"35\"   style=\"width:350px;\" />";
print "<input type=\"hidden\" 			name=\"db_content_image_mini\"  		id=\"db_content_image_mini\"  	value=\"$content_image_mini\" />   ";

?></td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รูปประกอบ ขนาดใหญ่ :</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print 	$show_content_image ; 
print "<input  type=\"file\"  				name=\"upload_content_image\" 		id=\"upload_content_image\"  	size=\"35\"   style=\"width:350px;\" />";
print "<input type=\"hidden\" 			name=\"db_content_image\"  			id=\"db_content_image\"  	value=\"$content_image\" />   ";

?>
                &nbsp;</td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">สถานะ :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
  <?
if ($option_highlight == "highlight" ) {  $option_highlight_checked = "checked"; } else  {  $option_highlight_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_highlight\" id=\"option_highlight\" value=\"highlight\"  $option_highlight_checked    />เป็นหัวข้อไฮท์ไลน์ (Highlight) <br>"; 

/*

if ($option_recommend == "recommend" ) {  $option_recommend_checked = "checked"; } else  {  $option_recommend_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_recommend\" id=\"option_recommend\" value=\"recommend\"  $option_recommend_checked    />เป็นหัวข้อแนะนำ (Recommend)<br>"; 


if ($option_reply == "reply" ) {  $option_reply_checked = "checked"; } else  {  $option_reply_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_reply\" id=\"option_reply\" value=\"reply\"  $option_reply_checked    />แสดงความคิดเห็นได้ (Reply Comment)<br>"; 

*/







if ($option_approve == "approve" ) {  $option_approve_checked = "checked"; } else  {  $option_approve_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_approve\" id=\"option_approve\" value=\"approve\"  $option_approve_checked    />ยืนยันการอนุมัติบทความ (Approve)<br>"; 


if ($option_status == "on" ) {  $option_status_checked = "checked"; } else  {  $option_status_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_status\" id=\"option_status\" value=\"on\"  $option_status_checked    />ออนไลน์ข้อมูล (Online)<br>"; 

?>
  </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">&nbsp;</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input type="image" name="imageField" id="imageField" src="../images/icon/design_icon_save.gif" /></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table>
      </td>
  </tr><input  type="hidden" name="content_appaction_update"  id="content_appaction_update" value="update_information" />
<input type="hidden" name="content_id"  id="content_id" value="<?=$content_id?>" />

</form>
</table>


<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>