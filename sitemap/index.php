<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 
include("../home/inc_category_select.php"); 



/// ##################################### banner
$input_page_id = "/sitemap/index.php"; 
$input_sql_other = ""; 
include("../banner/inc_adsbanner.php"); 
/// ##################################### banner end



////////// config by page
$config_sitetitle = "$config_sitetitle :: Site Map "; 

////////// config by process
$config_inc_page_content = "index_inc_page.php"; 


$langurl = "../sitemap/?"; 

////////// output
include("$path_app_design/page_content.php"); 


?>
<? $db->Close();?>