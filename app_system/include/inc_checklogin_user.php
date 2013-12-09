<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){



if (empty( $_SESSION["ss_user_sessionid"]  ) )  {  $ss_user_sessionid="";  } else { $ss_user_sessionid=$_SESSION["ss_user_sessionid"]; }
if (empty( $_SESSION["ss_user_id"] ) )  {  $ss_user_id="";  } else { $ss_user_id=$_SESSION["ss_user_id"]; }
if (empty( $_SESSION["ss_user_login"] ) )  {  $ss_user_login="";  } else { $ss_user_login=$_SESSION["ss_user_login"]; }
if (empty( $_SESSION["ss_user_password"]) )  {  $ss_user_password="";  } else { $ss_user_password=$_SESSION["ss_user_password"]; }
if (empty( $_SESSION["ss_user_checked"] ) )  {  $ss_user_checked="";  } else { $ss_user_checked=$_SESSION["ss_user_checked"]; }

///  $ss_user_sessionid != session_id()  or

if (  $ss_user_sessionid != session_id()  or  $ss_user_id == ""   or   $ss_user_login == "" or  $ss_user_password == ""   or  $ss_user_checked != "success"  ) {
header("Location:../backoffice/login.php?report=pleaselogin");
exit();  
} /// 


/*

print "
ss_user_sessionid = $ss_user_sessionid<br />
session_id = $xxxx<br />
<br />

ss_user_id = $ss_user_id <br />
ss_user_login = $ss_user_login <br />
ss_user_password = $ss_user_password <br />
ss_user_checked = $ss_user_checked <br />

";
*/



$input_array = array(
"user_login"=>"$ss_user_login" , 
"user_password"=>"$ss_user_password" , 
"datetime_now"=>"$datetime_now" , 
);
$result_count_user = $system_user->function_countbyset( $input_array );

//// print "result_count_user = $result_count_user ";

if ($result_count_user == 0 ) {
header("Location:../backoffice/login.php?report=pleaselogin");
exit();  
} /// 



if ($result_count_user > 0 ) { 
$input_array = array(
"user_id"=>"$ss_user_id" , 
"user_login"=>"$ss_user_login" , 
"user_password"=>"$ss_user_password" , 
);
$result_rs = $system_user->function_viewbyid( $input_array );
if ($result_rs){
$session_user_id = $result_rs["user_id"];
$session_user_group_id= $result_rs["user_group_id"];

$session_user_login = $result_rs["user_login"];
$session_user_password = $result_rs["user_password"];
$session_user_displayname = $result_rs["user_displayname"];
$session_user_firstname = $result_rs["user_firstname"];
$session_user_lastname = $result_rs["user_lastname"];
$session_user_nickname = $result_rs["user_nickname"];

$session_user_picture = $result_rs["user_picture"];

$session_option_confirm = $result_rs["option_confirm"];
$session_option_approve = $result_rs["option_approve"];
$session_option_status = $result_rs["option_status"];


$user_post  = $session_user_id ; 

}///// result_rs	
} /// if ($result_count_user > 0 ) { 
/// } /////if ($ss_user_id != "" ) {
	
	
if ($session_user_picture == "" ) {
$session_user_picture = "$config_picture_user";
} else {
$session_user_picture = "$path_system_user$session_user_picture";
}


/*
if ($session_user_login == "fightforyouok@gmail.com" ){ 
$session_user_group_id = "group09122117094200001"; 
}
*/






////////////////////////############## match
if ( $access_page_id != "backofice_main" ){
	
if ( $access_page_id == ""  ){
$process_check_access = "access_deny"; 
} 

if ($session_user_group_id != ""  ){
	

if ($session_user_group_id != "" ){ 
$input_array = array(
"group_id"=>"$session_user_group_id" , 
);
$rs_group = $system_auth_group->function_viewbyid( $input_array );
if ($rs_group){
$session_user_group_name = $rs_group["group_name"];	
} /// rs_group
} /// if ($id != "" ) { 

/// print "session_user_group_name = $session_user_group_name <br>";


	
$input_array = array(
"group_id"=>"$session_user_group_id" ,
"page_id"=>"$access_page_id" ,
);
$match_rs = $system_auth_match->function_viewbyid( $input_array ); /// select ข้อมูล
if ($match_rs){ 
///////////////// set value
$level1_match_id = $match_result["match_id"];
$level1_page_id = $match_rs["page_id"];
$level1_option_status = $match_rs["option_status"];

if ($level1_option_status == "" ){ $level1_option_status = "off"; }
///////////// match end

if ($level1_option_status != "on"){ $process_check_access = "access_deny"; }///

} //// match_rs
} ///session_user_group_id 


if ( $process_check_access == "access_deny"  ){
header("Location:../backoffice/backoffice_main.php?report=access_deny");
exit();  
} 

} ///if ( $access_page_id != "backofice_main" ){

////////////////////////############## match end








?>