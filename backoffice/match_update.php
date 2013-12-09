<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 
include("../app_system/include/inc_checklogin_user.php"); 

include("../category/inc_array_category.php"); 



////////////////////////############## PROCESS UPDATE 

if (empty($_REQUEST["category_appaction_update"]) )  {  $category_appaction_update="";  } else { $category_appaction_update=$_REQUEST["category_appaction_update"];  }
if (empty( $_REQUEST["show_status"] ) )  {  $show_status = "";  } else { $show_status = $_REQUEST["show_status"]; }


if (empty($_REQUEST["category_id"]) )  {  $category_id="";  } else { $category_id=$_REQUEST["category_id"];  }
if (empty( $_REQUEST["system_id"] ) )  {  $system_id = array();  } else { $system_id = $_REQUEST["system_id"]; }

$show_set_categoryname = ""; 
if ($system_id != "" ){ 
$show_set_categoryname = $system_info["$system_id"]["name_th"];
}



if ($category_appaction_update == "update_information") {
	

///////// check request
if (empty($_REQUEST["section_id"]) ) 				{  $section_id="";  } else { $section_id=$_REQUEST["section_id"];  }
if (empty($_REQUEST["category_id_root_select"]) )  	{  $category_id_root_select="";  } else { $category_id_root_select=$_REQUEST["category_id_root_select"];  }

if (empty($_REQUEST["category_code"]) )  		{  $category_code="";  } else { $category_code=$_REQUEST["category_code"];  }

if (empty($_REQUEST["category_name"]) )  		{  $category_name="";  } else { $category_name=$_REQUEST["category_name"];  }
if (empty($_REQUEST["category_des"]) )  		{  $category_des="";  } else { $category_des=$_REQUEST["category_des"];  }
if (empty($_REQUEST["category_detail"]) )  		{  $category_detail="";  } else { $category_detail=$_REQUEST["category_detail"];  }

if (empty($_REQUEST["category_name_lang2"]) )  	{  $category_name_lang2="";  } else { $category_name_lang2=$_REQUEST["category_name_lang2"];  }
if (empty($_REQUEST["category_des_lang2"]) )  		{  $category_des_lang2="";  } else { $category_des_lang2=$_REQUEST["category_des_lang2"];  }
if (empty($_REQUEST["category_detail_lang2"]) )  	{  $category_detail_lang2="";  } else { $category_detail_lang2=$_REQUEST["category_detail_lang2"];  }

if (empty($_REQUEST["category_name_lang3"]) )  	{  $category_name_lang3="";  } else { $category_name_lang3=$_REQUEST["category_name_lang3"];  }
if (empty($_REQUEST["category_des_lang3"]) )  		{  $category_des_lang3="";  } else { $category_des_lang3=$_REQUEST["category_des_lang3"];  }
if (empty($_REQUEST["category_detail_lang3"]) )  	{  $category_detail_lang3="";  } else { $category_detail_lang3=$_REQUEST["category_detail_lang3"];  }

if (empty($_REQUEST["category_name_lang4"]) )  	{  $category_name_lang4="";  } else { $category_name_lang4=$_REQUEST["category_name_lang4"];  }
if (empty($_REQUEST["category_des_lang4"]) )  		{  $category_des_lang4="";  } else { $category_des_lang4=$_REQUEST["category_des_lang4"];  }
if (empty($_REQUEST["category_detail_lang4"]) )  	{  $category_detail_lang4="";  } else { $category_detail_lang4=$_REQUEST["category_detail_lang4"];  }

if (empty($_REQUEST["category_name_lang5"]) )  	{  $category_name_lang5="";  } else { $category_name_lang5=$_REQUEST["category_name_lang5"];  }
if (empty($_REQUEST["category_des_lang5"]) )  		{  $category_des_lang5="";  } else { $category_des_lang5=$_REQUEST["category_des_lang5"];  }
if (empty($_REQUEST["category_detail_lang5"]) )  	{  $category_detail_lang5="";  } else { $category_detail_lang5=$_REQUEST["category_detail_lang5"];  }


if (empty($_REQUEST["option_order"]) )  		{  $option_order="";  } else { $option_order=$_REQUEST["option_order"];  }
if (empty($_REQUEST["option_status"]) )  		{  $option_status="";  } else { $option_status=$_REQUEST["option_status"];  }


///////// check input
/// system_id
/// category_id_root
/// category_name


$show_status = "success";

if ($system_id == "none" ) {
$show_status = "error";
$array_report_error[] = "- س͡к "; 
}

if ($category_id_root_select == "" ) {
$show_status = "error";
$array_report_error[] = "- س͡Ǵѡ "; 
}

if ($category_name == "" ) {
$show_status = "error";
$array_report_error[] = "- سҡ͡Ǵ "; 
}

/// print "show_status = $show_status <br>";



///// config
list($category_id_root , $category_level  ) = split("#", $category_id_root_select );









if ($show_status == "success" ){ 



/// category_image_mini
////////////////////////////////////////////////////////////////////////////// upload config 
/// picture
if (empty($_REQUEST["db_category_image_mini"]) )  		{  $db_category_image_mini = "";  } else { $db_category_image_mini=$_REQUEST["db_category_image_mini"];  }
if (empty($_REQUEST["delete_category_image_mini"]) ) 	{  $delete_category_image_mini = "none";  } else { $delete_category_image_mini=$_REQUEST["delete_category_image_mini"];  }

$picture_path 				= $path_category  ; /// config 
$picture_original 			= $db_category_image_mini ; /// config 
$picture_option_delete 	= $delete_category_image_mini ; /// config 
$picture_update 			= $picture_original ;

$picture_fileupload 			= $_FILES["upload_category_image_mini"]["tmp_name"]; /// config 
$picture_fileupload_name 	= $_FILES["upload_category_image_mini"]["name"]; /// config 
$picture_name_new =  "categorym-";  ///config

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

$category_image_mini = $picture_update ;  //// config
////////////////////////////////////////////////////////////////////////////// upload config  end




/// category_image
////////////////////////////////////////////////////////////////////////////// upload config 
/// picture
if (empty($_REQUEST["db_category_image"]) )  		{  $db_category_image = "";  } else { $db_category_image=$_REQUEST["db_category_image"];  }
if (empty($_REQUEST["delete_category_image"]) ) 	{  $delete_category_image = "none";  } else { $delete_category_image=$_REQUEST["delete_category_image"];  }

$picture_path 				= $path_category  ; /// config 
$picture_original 			= $db_category_image ; /// config 
$picture_option_delete 	= $delete_category_image ; /// config 
$picture_update 			= $picture_original ;

$picture_fileupload = $_FILES["upload_category_image"]["tmp_name"]; /// config 
$picture_fileupload_name = $_FILES["upload_category_image"]["name"]; /// config 
$picture_name_new =  "categoryb-";  ///config

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

$category_image = $picture_update ;  //// config
////////////////////////////////////////////////////////////////////////////// upload config  end






$input_array = array(
"category_id"=>"$category_id" , 
"system_id"=>"$system_id" , 
"section_id"=>"$section_id" , 
"category_id_root"=>"$category_id_root" , 
"category_level"=>"$category_level" , 

"category_code"=>"$category_code" , 

"category_name"=>"$category_name" , 
"category_des"=>"$category_des" , 
"category_detail"=>"$category_detail" , 

"category_name_lang2"=>"$category_name_lang2" , 
"category_des_lang2"=>"$category_des_lang2" , 
"category_detail_lang2"=>"$category_detail_lang2" , 

"category_name_lang3"=>"$category_name_lang3" , 
"category_des_lang3"=>"$category_des_lang3" , 
"category_detail_lang3"=>"$category_detail_lang3" , 

"category_name_lang4"=>"$category_name_lang4" , 
"category_des_lang4"=>"$category_des_lang4" , 
"category_detail_lang4"=>"$category_detail_lang4" , 

"category_name_lang5"=>"$category_name_lang5" , 
"category_des_lang5"=>"$category_des_lang5" , 
"category_detail_lang5"=>"$category_detail_lang5" , 

"category_image_mini"=>"$category_image_mini" , 
"category_image"=>"$category_image" , 

"stat_view"=>"$stat_view" , 
"stat_reply"=>"$stat_reply" , 

"option_order"=>"$option_order" , 
"option_status"=>"$option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $app_category->function_update( $input_array );

$show_status = $result_update["show_status"];
$category_id = $result_update["category_id"];

} ///if ($process_check_input == "success" ){ 

/// print "show_status = $show_status ";

if ($show_status == "success" ){ 
header("Location:category_update.php?category_id=$category_id&show_status=$show_status"); 
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

if ($category_id != "" ) { 

$input_array = array(
"category_id"=>"$category_id" , 
);
$rs_category = $app_category->function_viewbyid( $input_array );
if ($rs_category ) {
$category_id = $rs_category["category_id"];
$system_id = $rs_category["system_id"];
$section_id = $rs_category["section_id"];
$category_id_root = $rs_category["category_id_root"];
$category_level = $rs_category["category_level"];

$category_code = $rs_category["category_code"];


$category_name = $rs_category["category_name"];
$category_des = $rs_category["category_des"];
$category_detail = $rs_category["category_detail"];

$category_name_lang2 = $rs_category["category_name_lang2"];
$category_des_lang2 = $rs_category["category_des_lang2"];
$category_detail_lang2 = $rs_category["category_detail_lang2"];

$category_name_lang3 = $rs_category["category_name_lang3"];
$category_des_lang3 = $rs_category["category_des_lang3"];
$category_detail_lang3 = $rs_category["category_detail_lang3"];

$category_name_lang4 = $rs_category["category_name_lang4"];
$category_des_lang4 = $rs_category["category_des_lang4"];
$category_detail_lang4 = $rs_category["category_detail_lang4"];

$category_name_lang5 = $rs_category["category_name_lang5"];
$category_des_lang5 = $rs_category["category_des_lang5"];
$category_detail_lang5 = $rs_category["category_detail_lang5"];


$category_image_mini = $rs_category["category_image_mini"];
$category_image = $rs_category["category_image"];

$stat_view = $rs_category["stat_view"];
$stat_reply = $rs_category["stat_reply"];
$option_order = $rs_category["option_order"];
$option_status = $rs_category["option_status"];
$option_fixed = $rs_category["option_fixed"];


$user_create = $rs_category["user_create"];
$user_update = $rs_category["user_update"];
$user_delete = $rs_category["user_delete"];
$datetime_create = $rs_category["datetime_create"];
$datetime_update = $rs_category["datetime_update"];
$datetime_delete = $rs_category["datetime_delete"];



if ($category_image_mini != "" ) { 
$show_category_image_mini = "<img src=\"$path_category$category_image_mini\"  border=0 ><br>
<input  type=\"checkbox\"   	name=\"delete_category_image_mini\" 	id=\"delete_category_image_mini\"   value=\"delete\"  $option_delete_checked    />Delete Picture <br>"; 
}

if ($category_image != "" ) { 
$show_category_image = "<img src=\"$path_category$category_image\"  border=0 ><br>
<input  type=\"checkbox\"   	name=\"delete_category_image\" 	id=\"delete_category_image\"   value=\"delete\"  $option_delete_checked    />Delete Picture <br>
"; 
} ///gallery_image_mini

	
}///rs_category
} ///if ($category_id != "" ) { 




/*
$main_count_row = $app_category->function_countbyset( $input_array );
$main_rs = $app_category->function_viewbyset( $input_array ); /// select 
*/

////////////////////////############## PROCESS VIEW  END





////////////////////////############## PROCESS CONFIG 
$show_pagetitle = "$show_content_pagename "; 

////////////////////////############## PROCESS CONFIG END


if ($system_id=="") {$system_id= "none";}
if ($category_id=="") {$option_status= "on";}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert / Update Category </title>



<link href="../app_design/css/style_backoffice.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>




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




<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7">

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <tr>
    <td height="550" align="left" valign="top">
    
    
    
    
<?


$page_topic_name = "/ Ǵ  "; 
include("../app_system/include/inc_body_system_topic.php");





?>
    
    
    
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">

          <tr>
            <td height="30" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td >&nbsp;</td>
                <td width="300" align="right"><table border="0" cellpadding="0" cellspacing="5">
                  <tr>
                    <td width="60" align="center" valign="top"><a href="../backoffice/category_showall.php?system_id=<?=$system_id?>"><img src="../images/icon/icon_all.gif" width="164" height="35" hspace="0" /></a></td>
                 
                    
                    
<?
if ($category_id != ""  and  $option_fixed != "fixed" ) { 
?>
<td width="60" align="center" valign="top">
 <a href="../backoffice/category_showall.php?<? print "category_id=$category_id&option_delete=delete&system_id=$system_id" ; ?>"   onclick="return confirm('سͧź ?')"  >
 <img src="../images/icon/design_icon_delete.gif" alt="źŹ ..." width="164" height="35" hspace="0" border="0" />
 </a>
 </td>
<?
} /////////category_id
?>
   <td width="60" align="center" valign="top"><a href="../backoffice/x_system_auth_page_update.php?system_id=<?=$system_id?>"><img src="../images/icon/design_icon_add.gif" alt="" width="164" height="35" hspace="0" border="0" /></a></td>
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
    <td height="30" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#EEEEEE"><table width="100%" border="0" cellpadding="0" cellspacing="4">
      <tr>
        <td align="left"  class="text_big2" >&nbsp;
          <?=$show_set_categoryname ?></td>
        <td width="200" align="right"><span class="text_normal1">س͡к :</span></td>
        <td width="1"><?

/////////////////////////// select


$count_system_data = count($system_data);
if ($count_system_data > 0 ){ 

print "<select name=\"select_system\" id=\"select_system\" onchange=\"MM_jumpMenu('parent',this,0)\"  class=\"text_normal1\" style=\"width:250px;\">"; 
print "<option value=\"category_showall.php\" selected>س͡к ... </option>"; 

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
?></td>
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
          <td height="50" align="left" valign="top" bgcolor="#FFFFFF"  style="padding:3px; background-color:#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="text_normal1">
            <tr>
              <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5"> Ǵѡ <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
                
                
                
                
                
  <?

/// print_r ($app_category);


if ($system_id == "none") {

print "<select name=\"category_id_root_select\" id=\"category_id_root_select\" class=\"text_normal1\" style=\"width:350px;\" disabled=\"disabled\">";
print "<option value=\"none\" selected >س͡к ͹</option>";
print "</select>"; 

} else { 






print "<select name=\"category_id_root_select\" id=\"category_id_root_select\" class=\"text_normal1\" style=\"width:350px;\">";
print "<option value=\"root#1\" selected >Ǵѡ</option>";


///////////////////////////// level 1 
$input_array = array(
"system_id"=>"$system_id" , 
"category_id_root"=>"root" , 
"category_level"=>"1" , 
"sql_other"=>" and  category_id<>'$category_id' " , 
"sql_orderby"=>" ORDER BY option_order  ASC " ,
);
$category_count_row = $app_category->function_countbyset( $input_array );
if ($category_count_row > 0 ){  //// count row
$category_rs = $app_category->function_viewbyset( $input_array ); /// select 

$level1_loop = 0 ; 
while($rs = $category_rs->FetchRow()){ /////// loop 
$level1_loop = $level1_loop + 1; 

$loop_category_id = $rs["category_id"];
$loop_category_name = $rs["category_name"];


if ($loop_category_id == $category_id_root ) { $category_id_root_selected = "selected";  } else { $category_id_root_selected = ""; }

print "<option value=\"$loop_category_id#2\"   $category_id_root_selected >$level1_loop. Ǵ¢ͧ : $loop_category_name</option>";


///////////////////////////// level 2
$input_array = array(
"system_id"=>"$system_id" , 
"category_id_root"=>"$loop_category_id" , 
"category_level"=>"2" , 
"sql_other"=>" and  category_id<>'$category_id' " , 
"sql_orderby"=>" ORDER BY option_order  ASC " ,
);
$category_count_row2 = $app_category->function_countbyset( $input_array );
if ($category_count_row2 > 0 ){  //// count row
$category_rs2 = $app_category->function_viewbyset( $input_array ); /// select 

$level2_loop = 0 ; 
while($rs2 = $category_rs2->FetchRow()){ /////// loop 
$level2_loop = $level2_loop + 1; 


$loop2_category_id = $rs2["category_id"];
$loop2_category_name = $rs2["category_name"];

if ($loop2_category_id == $category_id_root ) { $category_id_root_selected = "selected";  } else { $category_id_root_selected = ""; }

print "<option value=\"$loop2_category_id#3\"  $category_id_root_selected >$level1_loop.$level2_loop Ǵ¢ͧ : $loop2_category_name</option>";


} //// loop
} //// count row
///////////////////////////// level 2 end


} //// loop
} //// count row
///////////////////////////// level 1 end

print "</select>"; 

} ///

?>
                
                
  </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ӴѺ :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="option_order" type="text" id="option_order" value="<?=$option_order ?>" size="10" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5"> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="category_code" type="text" id="category_code" value="<?=$category_code ?>" size="10" /></td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">´ :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><b>      
<?

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





print "
<a href=\"javascript:animatedcollapse.show('tap_01');javascript:animatedcollapse.hide([ 'tap_02',  'tap_03', 'tap_04', 'tap_05' ]);\">$language_icon_lang1  $language_name_lang1</a>
";


if ($option_status_lang2 == "on" ){
print "
 | <a href=\"javascript:animatedcollapse.show('tap_02');javascript:animatedcollapse.hide([ 'tap_01',  'tap_03', 'tap_04', 'tap_05' ]);\">$language_icon_lang2  $language_name_lang2</a>
";
} ///option_status_lang2


if ($option_status_lang3 == "on" ){
print "
 | <a href=\"javascript:animatedcollapse.show('tap_03');javascript:animatedcollapse.hide([ 'tap_01',  'tap_02', 'tap_04', 'tap_05' ]);\">$language_icon_lang3  $language_name_lang3</a>
";
} ///option_status_lang3


if ($option_status_lang4 == "on" ){
print "
 | <a href=\"javascript:animatedcollapse.show('tap_04');javascript:animatedcollapse.hide([ 'tap_01',  'tap_02', 'tap_03', 'tap_05' ]);\">$language_icon_lang4  $language_name_lang4</a>
";
} ///option_status_lang4


if ($option_status_lang5 == "on" ){
print "
 | <a href=\"javascript:animatedcollapse.show('tap_05');javascript:animatedcollapse.hide([ 'tap_01',  'tap_02', 'tap_03', 'tap_04' ]);\">$language_icon_lang5  $language_name_lang5</a> 
";
} ///option_status_lang4




?>


</b><br /><br />




<?
print "<div id=\"tap_01\" style=\"width:100%; background:#FFFFFF;\">" ; 
?>
            <table width="100%" border="0" cellpadding="4" cellspacing="2" style="background-color:#09C" class="text1">
              <tr>
                <td><?=$language_icon_lang1 ?> <font color="#FFFFFF"><b>  <?=$language_name_lang1 ?></b></font></td>
                </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:0px;"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="text1">
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td width="200" align="right" valign="middle"  style="padding:5px; background-color:#E5E5E5">Ǵ <font color="#FF0000">*</font> :</td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="category_name" type="text" id="category_name" value="<?=$category_name  ?>" size="80"  style="width:700px;" /></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="50" align="right" valign="top"  style="padding:5px; background-color:#E5E5E5">´ :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"category_des\" cols=\"80\" rows=\"5\" id=\"category_des\"  style=\"width:700px;\">$category_des</textarea>"; 

?></td>
                  </tr>
                </table></td>
                </tr>
            </table>
            <?

print "</div>" ;
print "<div id=\"tap_02\" style=\"width:100%; background: #FFFFFF;display:none;\">" ; 

?>
            
            <table width="100%" border="0" cellpadding="4" cellspacing="2" style="background-color:#CC0000" class="text1">
              <tr>
                <td><?=$language_icon_lang2 ?> <font color="#FFFFFF"><b>  <?=$language_name_lang2 ?></b></font></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:0px;"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="text1">
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td width="200" align="right" valign="middle"  style="padding:5px; background-color:#E5E5E5">Ǵ <font color="#FF0000">*</font> :</td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="category_name_lang2" type="text" id="category_name_lang2" value="<?=$category_name_lang2  ?>" size="80"  style="width:700px;" /></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="50" align="right" valign="top"  style="padding:5px; background-color:#E5E5E5">´ :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"category_des_lang2\" cols=\"80\" rows=\"5\" id=\"category_des_lang2\"  style=\"width:700px;\">$category_des_lang2</textarea>"; 

?></td>
                  </tr>
                  </table></td>
              </tr>
            </table>
            <?

print "</div>" ;
print "<div id=\"tap_03\" style=\"width:100%; background: #FFFFFF;display:none;\">" ; 

?>
            
            <table width="100%" border="0" cellpadding="4" cellspacing="2" style="background-color:#009900" class="text1">
              <tr>
                <td><?=$language_icon_lang3 ?> <font color="#FFFFFF"><b>  <?=$language_name_lang3 ?></b></font></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:0px;"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="text1">
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td width="200" align="right" valign="middle"  style="padding:5px; background-color:#E5E5E5">Ǵ <font color="#FF0000">*</font> :</td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="category_name_lang3" type="text" id="category_name_lang3" value="<?=$category_name_lang3  ?>" size="80"  style="width:700px;" /></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="50" align="right" valign="top"  style="padding:5px; background-color:#E5E5E5">´ :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"category_des_lang3\" cols=\"80\" rows=\"5\" id=\"category_des_lang3\"  style=\"width:700px;\">$category_des_lang3</textarea>"; 

?></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            <?

print "</div>" ;
print "<div id=\"tap_04\" style=\"width:100%; background: #FFFFFF;display:none;\">" ; 

?>
            
            <table width="100%" border="0" cellpadding="4" cellspacing="2" style="background-color:#FF0099" class="text1">
              <tr>
                <td><?=$language_icon_lang4 ?> <font color="#FFFFFF"><b>  <?=$language_name_lang4 ?></b></font></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:0px;"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="text1">
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td width="200" align="right" valign="middle"  style="padding:5px; background-color:#E5E5E5">Ǵ <font color="#FF0000">*</font> :</td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="category_name_lang4" type="text" id="category_name_lang4" value="<?=$category_name_lang4  ?>" size="80"  style="width:700px;" /></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="50" align="right" valign="top"  style="padding:5px; background-color:#E5E5E5">´ :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"category_des_lang4\" cols=\"80\" rows=\"5\" id=\"category_des_lang4\"  style=\"width:700px;\">$category_des_lang4</textarea>"; 

?></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            <?

print "</div>" ;
print "<div id=\"tap_05\" style=\"width:100%; background: #FFFFFF;display:none;\">" ; 

?>
            
            <table width="100%" border="0" cellpadding="4" cellspacing="2" style="background-color:#663399" class="text1">
              <tr>
                <td><?=$language_icon_lang5 ?> <font color="#FFFFFF"><b>  <?=$language_name_lang5 ?></b></font></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:0px;"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="text1">
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td width="200" align="right" valign="middle"  style="padding:5px; background-color:#E5E5E5">Ǵ <font color="#FF0000">*</font> :</td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="category_name_lang5" type="text" id="category_name_lang5" value="<?=$category_name_lang5  ?>" size="80"  style="width:700px;" /></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="50" align="right" valign="top"  style="padding:5px; background-color:#E5E5E5">´ :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"category_des_lang5\" cols=\"80\" rows=\"5\" id=\"category_des_lang5\"  style=\"width:700px;\">$category_des_lang5</textarea>"; 

?></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            
<?

print "</div>" ;


?>              
              
              
</td>
            </tr>
            <tr>
              <td align="right" valign="top"  style="padding:5px; background-color:#E5E5E5">ٻСͺ Ҵ :</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
                
                <?

print 	$show_category_image_mini ; 
print "<input  type=\"file\"  				name=\"upload_category_image_mini\" 		id=\"upload_category_image_mini\"  	size=\"35\"   style=\"width:350px;\" />";
print "<input type=\"hidden\" 			name=\"db_category_image_mini\"  		id=\"db_category_image_mini\"  	value=\"$category_image_mini\" />   ";

?>
                
  </td>
            </tr>
            <tr>
              <td align="right" valign="top"  style="padding:5px; background-color:#E5E5E5">ٻСͺ Ҵ˭ :</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
                
                
                
                
  <?

print 	$show_category_image ; 
print "<input  type=\"file\"  				name=\"upload_category_image\" 		id=\"upload_category_image\"  	size=\"35\"   style=\"width:350px;\" />";
print "<input type=\"hidden\" 			name=\"db_category_image\"  			id=\"db_category_image\"  	value=\"$category_image\" />   ";

?>
                
                
                
                
                &nbsp;</td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ʶҹ :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
<?

if ($option_status == "on" ) {  $option_status_checked = "checked"; } else  {  $option_status_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_status\" id=\"option_status\" value=\"on\"  $option_status_checked    />͹Ź"; 

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
  </tr><input  type="hidden" name="category_appaction_update"  id="category_appaction_update" value="update_information" />
<input type="hidden" name="category_id"  id="category_id" value="<?=$category_id?>" />
<input type="hidden" name="system_id"  id="system_id" value="<?=$system_id?>" />

</form>
</table>



<?
include("../app_design/design_bottom_system.php");
?>

</body>
</html>