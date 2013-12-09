<?
/// header("Location:../"); 



/*###Include ##########################################*/
include("../app_system/system_connection.php"); 
include("../home/inc_category_select.php"); 
/// inc_category_select.php


$system_page = "home" ;
$search_type = "property";


///////////////////////////////////////////////////////// banner 
/// ##################################### banner

$input_page_id = "/home/index.php"; 
$input_sql_other = ""; 
include("../banner/inc_adsbanner.php"); 


$ads_banner_banner_top = $show_banner["banner_top"]["banner_data"]; 
/// print  "ads_banner_banner_top = $ads_banner_banner_top"; 

$ads_banner_a1 = $show_banner["home_a1"]["banner_data"]; 

$ads_banner_a2 = $show_banner["home_a2"]["banner_data"]; 

$ads_banner_a3 = $show_banner["home_a3"]["banner_data"]; 

$ads_banner_a4 = $show_banner["home_a4"]["banner_data"]; 

$ads_banner_a5 = $show_banner["home_a5"]["banner_data"]; 


/// ##################################### banner end

























$content_id_name = "aboutus";
include("../content/inc_content_viewbyid.php"); 
$aboutus_content_des = $content_des ;
if ($show_content_image_mini != ""){
$aboutus_content_image_mini = $show_content_image_mini . "<br>"; ;
}///

////////// config by process

$config_inc_page_content = "index_inc_page.php"; 

////////// config by page
$config_sitetitle = "$config_sitetitle"; 



$langurl = "../home/index.php?"; 

////////// output
include("$path_app_design/page_content.php"); 


$db->Close();
 
?>