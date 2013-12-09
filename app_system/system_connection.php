<?
session_start();
set_time_limit ( 3600 ) ;


if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){
	





include("system_config.php");
include("system_config_path.php");
include("adodb/adodb.inc.php");


	
	
	$db = ADONewConnection($sysconfig["db"]['driver']); 
	$db->debug = $debug;	

	
	if (!$db->Connect($cfg["db"]['host'], $sysconfig["db"]['user'], $sysconfig["db"]['pws'], $sysconfig["db"]['name'])) 
	die("Cann't Connect to Database");
	$db->SetFetchMode(ADODB_FETCH_BOTH); 
	$db->Execute("SET NAMES ".$sysconfig['db']['char_set']);





include("function/plugin_function.php");
include("service/plugin_service.php");
include("class/plugin_class.php");
include("application_control.php");

include("include/inc_app_config.php");


?>