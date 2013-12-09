<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 


$system_page = "home" ;



/// print "77777777 <br>";
$section_id = "home";
$category_id = "none";
$page_id = "index.php";
$position_code = "";
include("../banner/inc_adsbanner.php"); 







////////// config by process

$config_inc_page_content = "content_inc_page.php"; 

////////// config by page
$config_sitetitle = "$config_sitetitle :: Welcome "; 


////////// output
include("$path_app_design/page_content.php"); 


?>
<? $db->Close();?>