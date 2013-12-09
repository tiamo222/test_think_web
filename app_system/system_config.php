<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){



///ini_set("register_globals", "On");
ini_set("register_globals", "Off");
	
///	extract($_POST);
///	extract($_GET);
///	extract($_REQUEST);


	$sysconfig["db"]["driver"] 		= "mysql";
	$sysconfig["db"]["debug"] 		= false;
	$sysconfig["db"]["char_set"]	= "utf8";
	$sysconfig["db"]["collation"]	= "utf8_general_ci";
	
	///$sysconfig["db"]["char_set"]	= "tis620";
///	$sysconfig["db"]["collation"]	= "tis620_thai_ci";

	

	
	
/////////// server
	$sysconfig["db"]["host"] 		= "localhost";	
	$sysconfig["db"]["name"]		= "thinksoft_web2011";
	$sysconfig["db"]["user"] 		= "thinkroot";
	$sysconfig["db"]["pws"] 		= "devthink2011";
	
	

/*



/////////// jack
	$sysconfig["db"]["host"] 		= "localhost";	
	$sysconfig["db"]["name"]		= "db_think2011";
	$sysconfig["db"]["user"] 		= "root";
	$sysconfig["db"]["pws"] 		= "1234";


/////////// server
	$sysconfig["db"]["host"] 		= "localhost";	
	$sysconfig["db"]["name"]		= "db_thinksoft_2011";
	$sysconfig["db"]["user"] 		= "thinkAdmin";
	$sysconfig["db"]["pws"] 		= "think@db@2010";

*/
	

?>