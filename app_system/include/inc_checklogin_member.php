<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){



if (empty( $_SESSION["ss_member_sessionid"]  ) )  {  $ss_member_sessionid = "";  } 	else { $ss_member_sessionid = $_SESSION["ss_member_sessionid"]; }
if (empty( $_SESSION["ss_member_id"] ) ) 				{  $ss_member_id = "";  } 				else { $ss_member_id = $_SESSION["ss_member_id"]; }
if (empty( $_SESSION["ss_member_login"] ) )  		{  $ss_member_login = "";  } 			else { $ss_member_login = $_SESSION["ss_member_login"]; }
if (empty( $_SESSION["ss_member_password"]) ) 	{  $ss_member_password = "";  } 	else { $ss_member_password = $_SESSION["ss_member_password"]; }
if (empty( $_SESSION["ss_member_checked"] ) )  	{  $ss_member_checked = "";  } 		else { $ss_member_checked = $_SESSION["ss_member_checked"]; }

///  $ss_user_sessionid != session_id()  or

if (  $ss_member_sessionid != session_id()  or  $ss_member_id == ""   or   $ss_member_login == "" or  $ss_member_password == ""   or  $ss_member_checked != "success"  ) {
header("Location:../member/login.php?report=pleaselogin");
exit();  
} /// 


/*

print "

ss_member_sessionid = $ss_member_sessionid<br />
<br />

ss_member_id = $ss_member_id <br />
ss_member_login = $ss_member_login <br />
ss_member_password = $ss_member_password <br />
ss_member_checked = $ss_member_checked <br />
";

*/





$input_array = array(
"member_login"=>"$ss_member_login" , 
"member_password"=>"$ss_member_password" , 
"datetime_now"=>"$datetime_now" , 
);
$result_count_member = $app_member_myaccount->function_countbyset( $input_array );
//// print "result_count_user = $result_count_user ";

if ($result_count_member == 0 ) {
header("Location:../member/login.php?report=pleaselogin");
exit();  
} /// 



if ($result_count_member > 0 ) { 

////////////////////////////////////// member account
$input_array = array(
"member_id"=>"$ss_member_id" , 
);
$myaccount_rs = $app_member_myaccount->function_viewbyid( $input_array );
if ($myaccount_rs){
$profile_member_id = $myaccount_rs["member_id"];
$profile_member_login = $myaccount_rs["member_login"];
$profile_member_password = $myaccount_rs["member_password"];

$profile_member_option_confirm = $myaccount_rs["option_confirm"];
$profile_member_option_approve = $myaccount_rs["option_approve"];
$profile_member_option_status = $myaccount_rs["option_status"];

$user_post  = $profile_member_id ; 
}///// result_rs	


////////////////////////////////////// member profile
$input_array = array(
"member_id"=>"$ss_member_id" , 
);
$myprofile_rs = $app_member_myprofile->function_viewbyid( $input_array );
if ($myprofile_rs){
$profile_member_firstname = $myprofile_rs["member_firstname"];
$profile_member_lastname = $myprofile_rs["member_lastname"];
$profile_member_nickname = $myprofile_rs["member_nickname"];
$profile_member_picture = $myprofile_rs["member_picture"];
$profile_member_displayname = $myprofile_rs["member_displayname"];
$profile_member_myprofile_email = $myprofile_rs["myprofile_email"];
$profile_option_level = $myprofile_rs["option_level"];



$profile_option_level_name = "Member";
if ($profile_option_level == "member_vip" ){
$profile_option_level_name = "Member VIP";
}

if ($profile_option_level == "agency" ){
$profile_option_level_name = "Agency";
}

//// print " profile_option_level = $profile_option_level ";
//// print "profile_member_myprofile_email = $profile_member_myprofile_email <br>";
//// $session_option_confirm = $mprofile_rs["option_confirm"];
//// $session_option_approve = $mprofile_rs["option_approve"];
//// $session_option_status = $mprofile_rs["option_status"];

}///// result_rs	


} /// if ($result_count_user > 0 ) { 
/// } /////if ($ss_user_id != "" ) {

//// print "profile_member_picture = $profile_member_picture "; 
	
if ($profile_member_picture == "" ) {
$profile_member_picture = "$config_picture_member";
} else {
$profile_member_picture = "$path_myprofile$profile_member_picture";
}



?>