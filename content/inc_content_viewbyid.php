<?

/*
if (empty($_REQUEST["content_id"]) )  {  $content_id="";  } else { $content_id=$_REQUEST["content_id"];  }
if (empty($_REQUEST["content_id"]) )  {  $content_id="";  } else { $content_id=$_REQUEST["content_id"];  }

*/




if ($content_id != ""  or  $content_id_name != "" ) { 

//// content_id

$input_array = array(
"content_id"=>"$content_id" , 
"content_id_name"=>"$content_id_name" , 
);
$rs_content = $app_content->function_viewbyid( $input_array );
if ($rs_content ) {	

$content_id = $rs_content["content_id"];
$content_id_name = $rs_content["content_id_name"];

$category_id = $rs_content["category_id"];
$system_id = $rs_content["system_id"];
$ref_id = $rs_content["ref_id"];

$content_code = $rs_content["content_code"];


$content_name_lang1 = $rs_content["content_name"];
$content_des_lang1 = $rs_content["content_des"];
$content_detail_lang1 = $rs_content["content_detail"];

$content_name_lang2 = $rs_content["content_name_lang2"];
$content_des_lang2 = $rs_content["content_des_lang2"];
$content_detail_lang2 = $rs_content["content_detail_lang2"];

$content_name_lang3 = $rs_content["content_name_lang3"];
$content_des_lang3 = $rs_content["content_des_lang3"];
$content_detail_lang3 = $rs_content["content_detail_lang3"];

$content_name_lang4 = $rs_content["content_name_lang4"];
$content_des_lang4 = $rs_content["content_des_lang4"];
$content_detail_lang4 = $rs_content["content_detail_lang4"];

$content_name_lang5 = $rs_content["content_name_lang5"];
$content_des_lang5 = $rs_content["content_des_lang5"];
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

$user_create = $rs_content["user_create"];
$user_update = $rs_content["user_update"];
$user_delete = $rs_content["user_delete"];
$datetime_create = $rs_content["datetime_create"];
$datetime_update = $rs_content["datetime_update"];
$datetime_delete = $rs_content["datetime_delete"];



if($get_language_key == 1 ){
$content_name = $content_name_lang1 ;
$content_des = $content_des_lang1 ;
$content_detail = $content_detail_lang1 ;
}///get_language_key = 1


if($get_language_key == 2 ){
$content_name = $content_name_lang2 ;
$content_des = $content_des_lang2 ;
$content_detail = $content_detail_lang2 ;
}///get_language_key = 2


if($get_language_key == 3 ){
$content_name = $content_name_lang3 ;
$content_des = $content_des_lang3 ;
$content_detail = $content_detail_lang3 ;
}///get_language_key = 3


if($get_language_key == 4 ){
$content_name = $content_name_lang4 ;
$content_des = $content_des_lang4 ;
$content_detail = $content_detail_lang4 ;
}///get_language_key = 4


if($get_language_key == 5 ){
$content_name = $content_name_lang5 ;
$content_des = $content_des_lang5 ;
$content_detail = $content_detail_lang5 ;
}///get_language_key = 4



if ($content_detail == "" ){
/// $content_detail = "<font color=#666666>อยู่ในระหว่างจัดทำข้อมูล ... </font>";
}

if ($option_status == "off" or $option_approve != "approve" ){
$content_detail = "อยู่ในระหว่างจัดทำข้อมูล ... ";
}




if ($content_image_mini != "" ) { 
$show_content_image_mini = "<img src=\"$path_content$content_image_mini\"  border=0 >"; 
}

if ($content_image != "" ) { 
$show_content_image = "<img src=\"$path_content$content_image\"  border=0 >"; 
} ///gallery_image_mini


}///rs
} ///if ($content_id != "" ) { 


?>