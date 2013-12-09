<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 


//// $content_id_name = "aboutus";
include("../content/inc_content_viewbyid.php"); 


/// ##################################### banner
/// $input_page_id = "/information/aboutus.php"; 
/// $input_sql_other = ""; 
include("../banner/inc_adsbanner.php"); 
/// ##################################### banner end

////////// config by page
$config_sitetitle = "$config_sitetitle  "; 

////////// config by process
$config_inc_page_content = "../content/contentby_id_inc_page.php"; 

////////// output
include("$path_app_design/page_content.php"); 

$db->Close();
?>
