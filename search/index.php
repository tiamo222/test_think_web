<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 








////////// config by page
$config_sitetitle = "$config_sitetitle :: Services "; 

////////// config by process
$config_inc_page_content = "index_inc_page.php"; 

////////// output
include("$path_app_design/page_content.php"); 



$db->Close();

?>