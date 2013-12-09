<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

if (empty($_REQUEST["id"]) )  {  $id="";  } else { $id=$_REQUEST["id"];  }

$content_id = $id ;
include("../content/inc_content_viewbyid.php"); 



if ($category_id != ""  ) { 
$input_array = array(
"category_id"=>"$category_id" , 
);
$rs_category1 = $app_category->function_viewbyid( $input_array );
if ($rs_category1 ) {	
$category_id = $rs_category1["category_id"];
$category_name = $rs_category1["category_name"];
$category_name_lang2 = $rs_category1["category_name_lang2"];
$category_name_lang3 = $rs_category1["category_name_lang3"];
$category_name_lang4 = $rs_category1["category_name_lang4"];
$category_name_lang5 = $rs_category1["category_name_lang5"];

if($get_language_key == 2 ){
$category_name = $category_name_lang2 ; 
}///get_language_key = 2

if($get_language_key == 3 ){
$category_name = $category_name_lang3 ;
}///get_language_key = 3

if($get_language_key == 4 ){
$category_name = $category_name_lang4 ;
}///get_language_key = 4

if($get_language_key == 5 ){
$category_name = $category_name_lang5 ;
}///get_language_key = 5



}////
}////if ($category_code != ""  ) { 

$category_id_this = $category_id ;





////////// config by page
$config_sitetitle = "$config_sitetitle :: $content_name  "; 

////////// config by process
$config_inc_page_content = "../content/contentby_id_inc_page.php"; 

$langurl = "detail.php?id=$id&"; 

////////// output
include("$path_app_design/page_content.php"); 

$db->Close();
?>
