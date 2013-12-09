<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_member_myprofile
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_member_myprofile.inc.php
 */

class  app_member_myprofile{	
				
/**
* Public Variable
**/			
	var $db;
	var $username;
	var $usertype;
	var $model_data = array();		

	
/**
* Constructor
*
**/					
function app_member_myprofile(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

//////////////////////////////////////////

app_member_myprofile
profile_id

member_id
member_firstname
member_lastname
member_nickname
member_displayname
member_picture
member_picture_mini

member_birthday
member_sex
member_sex_option
country_id
province_id
city_id
member_facebook
member_hi5
member_email
member_website
member_address
member_des
member_hobby
member_interest

option_recommend
option_approve
option_status
system_delete

user_create
user_update
user_delete

datetime_create
datetime_update
datetime_delete

//////////////////////////////////////////

*/




/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_countbyset
*/
function function_countbyset($input_array){

$sql_other 		= $input_array["sql_other"];
$option_status 	= $input_array["option_status"];

//// sql command
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_member_myprofile
where			system_delete = 'none'  

$sql_option_status
$sql_other

";	

/// print "sql_command = $sql_command ";

$count_row = $this->db->GetOne($sql_command);
return $count_row ;
}




/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyset
*/
function function_viewbyset($input_array){

$set_pager_limit   = $input_array["set_pager_limit"];
$set_pager_start   = $input_array["set_pager_start"];
if ($set_pager_limit == "") {$set_pager_limit = 10000 ; }
if ($set_pager_start == "") {$set_pager_start = 0 ; }


$sql_other = $input_array["sql_other"];
$sql_orderby = $input_array["sql_orderby"];
if ($sql_orderby == "") { $sql_orderby =  " order by 	id  DESC " ; }



$option_status 	= $input_array["option_status"];

//// sql command
if ($option_status != "")  					{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 				app_member_myprofile
where 			system_delete = 'none' 

$sql_option_status

$sql_other
$sql_orderby

";		

/// print "<br>sql_command = $sql_command ";

$result_array = $this->db->SelectLimit($sql_command,$set_pager_limit,$set_pager_start );
return $result_array ;

} ///////////





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyid
*/
function function_viewbyid222($input_array){

$profile_id = $input_array["profile_id"];
$member_id = $input_array["member_id"];

//// sql command
if ($profile_id != "") 			{ $sql_profile_id 	=	" and		profile_id = '$profile_id' " ; }
if ($member_id != "") 		{ $sql_member_id 	=	" and		member_id = '$member_id' " ; }

if ($profile_id != "" or $member_id != ""  ) { 

$sql_command = "
select 		* 
from			app_member_myprofile
where		system_delete= 'none'

$sql_profile_id
$sql_member_id

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;

} ////

}



function function_viewbyid($input_array){

$profile_id = $input_array["profile_id"];
$member_id = $input_array["member_id"];

//// sql command
if ($profile_id != "") 			{ $sql_profile_id 	=	" and		profile_id = '$profile_id' " ; $check_id = "yes"; }
if ($member_id != "") 		{ $sql_member_id 	=	" and		member_id = '$member_id' " ;  $check_id = "yes"; }

if ($check_id == "yes" ){ 
$sql_command = "
select 		* 
from			app_member_myprofile
where		system_delete= 'none'

$sql_profile_id
$sql_member_id

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;

} 
}




/*
#################################################### end view  +++
*/





/*
#################################################### start update  +++
*/


function function_update($input_array){		

//// request
$profile_id = $input_array["profile_id"]; 
$member_id = $input_array["member_id"]; 
$category_id = $input_array["category_id"]; 

$member_firstname = $input_array["member_firstname"]; 
$member_lastname = $input_array["member_lastname"]; 
$member_nickname = $input_array["member_nickname"]; 
$member_displayname = $input_array["member_displayname"]; 

$member_picture = $input_array["member_picture"]; 
$member_picture_mini = $input_array["member_picture_mini"]; 

$member_birthday = $input_array["member_birthday"]; 
$member_sex = $input_array["member_sex"]; 

$member_mobile = $input_array["member_mobile"]; 
$member_phone = $input_array["member_phone"]; 
$member_fax = $input_array["member_fax"]; 
$member_address = $input_array["member_address"]; 
$member_city = $input_array["member_city"]; 
$member_place = $input_array["member_place"]; 
$member_des = $input_array["member_des"]; 

$country_id = $input_array["country_id"]; 
$country_name  = $input_array["country_name"]; 
$province_id = $input_array["province_id"]; 
$city_id = $input_array["city_id"]; 


$option_level = $input_array["option_level"]; 
$option_confirm_email = $input_array["option_confirm_email"]; 
$option_confirm_phone = $input_array["option_confirm_phone"]; 
$option_confirm_address = $input_array["option_confirm_address"]; 



$option_recommend = $input_array["option_recommend"]; 
$option_approve = $input_array["option_approve"]; 
$option_status = $input_array["option_status"];

$stat_view = $input_array["stat_view"]; 
$stat_reply = $input_array["stat_reply"]; 

$ipaddress_update = $input_array["ipaddress_update"];
$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];



//// sql config

$check_process = "insert" ; 
if ($profile_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_member_myprofile
where 		system_delete = 'none'
and			profile_id = '$profile_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$profile_id = $result_array["profile_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_member_myprofile ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "profile" ;
$input_idnow =  $cmd_check_record + 1 ; 
$profile_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_member_myprofile ( 
profile_id , 
member_id , 

option_recommend , 
option_approve , 
option_status , 
system_delete , 

ipaddress_post , 
user_create , 
datetime_create 
)
				
values (
'$profile_id'  , 
'$member_id'  , 

'none'  , 
'approve'  , 
'on'  , 
'none'  , 

'$ipaddress_update'  , 
'$user_update'  , 
'$datetime_now'  
)									
 ";		
 
//// print $sql_command ; 
 
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 





if ($option_recommend != "" ) 	{ $sql_option_recommend = "  option_recommend = '$option_recommend'  ,   "; } else { $sql_option_recommend = ""; }
if ($option_approve != "" ) 			{ $sql_option_approve = "  option_approve = '$option_approve'  ,   "; } else { $sql_option_approve = ""; }
if ($option_status != "" ) 				{ $sql_option_status = "  option_status = '$option_status'  ,   "; } else { $sql_option_status = ""; }

if ($option_level != "" ) 						{ $sql_option_level = "  option_level = '$option_level'  ,   "; } else { $sql_option_level = ""; }
if ($option_confirm_email != "" ) 			{ $sql_option_confirm_email = "  option_confirm_email = '$option_confirm_email'  ,   "; } else { $sql_option_confirm_email = ""; }
if ($option_confirm_phone != "" ) 		{ $sql_option_confirm_phone = "  option_confirm_phone = '$option_confirm_phone'  ,   "; } else { $sql_option_confirm_phone = ""; }
if ($option_confirm_address != "" ) 		{ $sql_option_confirm_address = "  option_confirm_address = '$option_confirm_address'  ,   "; } else { $sql_option_confirm_address = ""; }



/// update start
$sql_command="  
update   app_member_myprofile  

set  
member_firstname = '$member_firstname' ,
member_lastname = '$member_lastname' ,
member_nickname = '$member_nickname' ,
member_displayname = '$member_displayname' ,

member_picture = '$member_picture' ,
member_picture_mini = '$member_picture_mini' ,
member_birthday = '$member_birthday' ,
member_sex = '$member_sex' ,

member_mobile = '$member_mobile' ,
member_phone = '$member_phone' ,
member_fax = '$member_fax' ,
member_address = '$member_address' ,
member_city = '$member_city' ,
member_place = '$member_place' ,
member_des = '$member_des' ,

country_id = '$country_id' ,
country_name  = '$country_name' ,
province_id = '$province_id' ,
city_id = '$city_id' ,
category_id = '$category_id' ,

$sql_option_level
$sql_option_confirm_email
$sql_option_confirm_phone
$sql_option_confirm_address


$sql_option_approve
$sql_option_status

ipaddress_update = '$ipaddress_update'  , 
user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			profile_id = '$profile_id'

"; 
 
///  print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	
if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"profile_id"=>"$profile_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
/// $profile_id = $input_array["profile_id"]; 
$member_id = $input_array["member_id"]; 

$option_level  = $input_array["option_level"]; 
$option_approve = $input_array["option_approve"]; 
$option_status = $input_array["option_status"]; 
$option_confirm_email = $input_array["option_confirm_email"]; 
$option_confirm_phone = $input_array["option_confirm_phone"]; 
$option_confirm_address = $input_array["option_confirm_address"]; 

$datetime_now = $input_array["datetime_now"];


if ($member_id != "" ) {  /// check id
$sql_command = "	
update  app_member_myprofile   

set    

option_level = '$option_level' , 
option_approve = '$option_approve' , 
option_status = '$option_status' , 
option_confirm_email = '$option_confirm_email' , 
option_confirm_phone = '$option_confirm_phone' , 
option_confirm_address = '$option_confirm_address' , 
datetime_update = '$datetime_now'

where  member_id = '$member_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"member_id"=>"$member_id" , 
);
return $result_return ;	
		
} /// 






/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_datetime_login($input_array){	

$member_id = $input_array["member_id"]; 
$datetime_now = $input_array["datetime_now"];

if ($member_id != "" ) {  /// check id

//// check
$sql_command = " 
select  		*
from  		app_member_myprofile
where 		system_delete = 'none'
and			member_id = '$member_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$datetime_login_last = $result_array["datetime_login_update"];
} ///


//// update
$sql_command = "	
update  app_member_myprofile   

set    
datetime_login_update = '$datetime_now' , 
datetime_login_session = '$datetime_now' , 
datetime_login_last = '$datetime_login_last' 

where  member_id = '$member_id'    
";		
$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"member_id"=>"$member_id" , 
);
return $result_return ;	
		
} /// 







function  function_update_stat($input_array){	

$member_id = $input_array["member_id"];
$stat_view = $input_array["stat_view"];
$stat_reply = $input_array["stat_reply"];
$datetime_now = $input_array["datetime_now"]; 


if ($member_id != "" ) { 
/////////////// stat_view
if ($stat_view == ""  or  $stat_view == "0"  ) {
$sql_command = "
select 		stat_view 
from			app_member_myprofile
where		member_id = '$member_id'  
";	
$result_array = $this->db->GetRow($sql_command);
$stat_view = $result_array["stat_view"];
}


$stat_view = $stat_view + 1 ; 

$sql_command = "	
update 	 	app_member_myprofile   
set    	
stat_view = '$stat_view'   , 
stat_reply = '$stat_reply'   , 
datetime_view = '$datetime_now'

where  
member_id = '$member_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
/// "show_status"=>"$show_status" , 
"member_id"=>"$member_id" , 
"stat_view"=>"$stat_view" , 
);
return $result_return ;	
		
} ///  end function








/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$profile_id = $input_array["profile_id"]; 
$ipaddress_delete = $input_array["ipaddress_delete"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($profile_id != "" ) { 
$sql_command = "	
update  	app_member_myprofile   
set    	
system_delete = 'delete'   , 
ipaddress_delete = '$ipaddress_delete'   , 
datetime_delete = '$datetime_now'

where  
profile_id = '$profile_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"profile_id"=>"$profile_id" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>