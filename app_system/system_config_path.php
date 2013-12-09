<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


	$config_sitetitle	= "Thinksoft Co.,Ltd. "; 
	$config_website_name	= "Thinksoft.co.th"; 
	$config_website_url	= "http://www.Thinksoft.co.th"; 
	$config_website_email	= "info@thinksoft.co.th"; 
	$config_design_page	= "complete"; /// 
	
	
		
	////date
	date_default_timezone_set("Asia/Bangkok");
	$config_date = date("Y-m-d");  /// 
	$config_time = date("H:i:s");  /// 
	$datetime_now = "$config_date $config_time"; 


	
///	$ipaddress_post = @$REMOTE_ADDR ; 
	$ipaddress_post = $_SERVER["REMOTE_ADDR"];

	/////// app path
	$path_app_design			= "../app_design";
 	$path_app_application 		= "../app_application";	
	
	
	/////// picture path
	
	///$config_editor_part = "/thinksoft"; /// 
	///$config_editor_part = "/var/www/html/thinksoft"; /// 
	///$config_editor_part = "/var/www/html/thinksoft"; /// 
	$config_editor_part = ""; /// 
	
	
	$path_gallery	= "../upload/gallery/"; 
	$path_category	= "../upload/category/"; 
	$path_content	= "../upload/content/"; 
	$path_calendar	= "../upload/calendar/"; 
	$path_video	= "../upload/video/"; 
	$path_chatlist	= "../upload/chatlist/"; 
	$path_picpost	= "../upload/picpost/"; 
	$path_webboard	= "../upload/webboard/";
	$path_directory	= "../upload/directory/";
	
	$path_adsbanner	= "../upload/adsbanner/"; 
	$path_adspage	= "../upload/adspage/"; 
	
	$path_system_user	= "../upload/user_admin/"; 
	$path_myprofile	= "../upload/user_member/"; 
	

	

	/////// config
	$config_picture_user		= "../images/icon/member_pic.gif"; 
	$config_picture_member  	= "../images/icon/member_pic.gif"; 



	$path_services		= "../upload/services/";

	
	// property
	

	
	
	

//// user
if (empty( $_SESSION["ss_user_sessionid"]  ) ) 		{  $ss_user_sessionid="";  } 			else { $ss_user_sessionid=$_SESSION["ss_user_sessionid"]; }
if (empty( $_SESSION["ss_user_id"] ) )  					{  $ss_user_id="";  } 						else { $ss_user_id=$_SESSION["ss_user_id"]; }
if (empty( $_SESSION["ss_user_login"] ) )  				{  $ss_user_login="";  } 					else { $ss_user_login=$_SESSION["ss_user_login"]; }
if (empty( $_SESSION["ss_user_password"]) )  		{  $ss_user_password="";  } 			else { $ss_user_password=$_SESSION["ss_user_password"]; }
if (empty( $_SESSION["ss_user_checked"] ) )  			{  $ss_user_checked="";  } 			else { $ss_user_checked=$_SESSION["ss_user_checked"]; }


//// member
if (empty( $_SESSION["ss_member_sessionid"]  ) )	{  $ss_member_sessionid = "";  } 	else { $ss_member_sessionid = $_SESSION["ss_member_sessionid"]; }
if (empty( $_SESSION["ss_member_id"] ) ) 				{  $ss_member_id = "";  } 				else { $ss_member_id = $_SESSION["ss_member_id"]; }
if (empty( $_SESSION["ss_member_login"] ) )  		{  $ss_member_login = "";  } 			else { $ss_member_login = $_SESSION["ss_member_login"]; }
if (empty( $_SESSION["ss_member_password"]) ) 	{  $ss_member_password = "";  } 	else { $ss_member_password = $_SESSION["ss_member_password"]; }
if (empty( $_SESSION["ss_member_checked"] ) )  	{  $ss_member_checked = "";  } 		else { $ss_member_checked = $_SESSION["ss_member_checked"]; }





?>