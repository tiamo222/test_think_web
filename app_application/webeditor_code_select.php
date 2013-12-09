<?
if ($config_design_page != "complete" ){
print "<meta http-equiv=\"Refresh\" content=\"0;URL=../index.php\" />";
} else {

if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../app_design/css/style_web.css" rel="stylesheet" type="text/css">
<?
}//////if ($tag_for_code == "hide" ){



// START WYSIWYG PRO CODE ///////////////// 

// include the config file and editor class: 
//include_once ('../editor_files/config.php'); 
//include_once ('../editor_files/editor_class.php'); 

include_once ('../app_webeditor/config.php'); 
include_once ('../app_webeditor/editor_class.php'); 

$editor_config_name = "editor1" ;
$editor_config_w= 650;
$editor_config_h= 550;


}/// if ($config_design_page == "complete" ){
?>