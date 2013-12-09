<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_member_myaccount
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_member_myaccount.inc.php
 */

class  app_member_myaccount{	
				
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
function app_member_myaccount(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

//////////////////////////////////////////

app_member_myaccount

member_id
member_password
member_login
member_email
member_mobile
option_confirm
option_confirm_type
option_confirm_datetime
option_approve
option_status
system_delete
user_create
user_update
user_delete
datetime_login_update
datetime_login_last
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
$member_login 	= $input_array["member_login"];
$member_password 	= $input_array["member_password"];
$option_confirm_key 	= $input_array["option_confirm_key"];

$option_status 	= $input_array["option_status"];





//// sql command
if ($system_id != "") 						{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($member_login != "")  				{ $sql_member_login 				=	" and		member_login = '$member_login' " ; }
if ($member_password != "")  		{ $sql_member_password 		=	" and		member_password = '$member_password' " ; }
if ($option_confirm_key != "")  		{ $sql_option_confirm_key 		=	" and		option_confirm_key = '$option_confirm_key' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_member_myaccount
where			system_delete = 'none'  

$sql_member_login
$sql_member_password
$sql_option_confirm_key
$sql_option_status

$sql_other

";	

/// print "<pre> $sql_command </pre>"; 

$count_row = $this->db->GetOne($sql_command);
return $count_row ;
}




/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyset
*/
function function_viewbyset($input_array){

$set_pager_limit 		= $input_array["set_pager_limit"];
$set_pager_start 		= $input_array["set_pager_start"];
if ($set_pager_limit == "") {$set_pager_limit = 10000 ; }
if ($set_pager_start == "") {$set_pager_start = 0 ; }


$sql_other = $input_array["sql_other"];
$sql_orderby = $input_array["sql_orderby"];
if ($sql_orderby == "") { $sql_orderby =  " order by 	id  DESC " ; }


$system_id 		= $input_array["system_id"];
$member_login 	= $input_array["member_login"];
$member_password 	= $input_array["member_password"];
$option_confirm_key 	= $input_array["option_confirm_key"];
$option_status 	= $input_array["option_status"];

//// sql command
if ($system_id != "") 						{ $sql_system_id 			=	" and		system_id = '$system_id' " ; }
if ($member_login != "")  				{ $sql_member_login 				=	" and		member_login = '$member_login' " ; }
if ($member_password != "")  		{ $sql_member_password 		=	" and		member_password = '$member_password' " ; }
if ($option_confirm_key != "")  		{ $sql_option_confirm_key 		=	" and		option_confirm_key = '$option_confirm_key' " ; }
if ($option_status != "")  					{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_member_myaccount
where 			system_delete = 'none' 

$sql_member_login
$sql_member_password
$sql_option_confirm_key
$sql_option_status

$sql_other
$sql_orderby

";		

////  print "sql_command = $sql_command ";

$result_array = $this->db->SelectLimit($sql_command,$set_pager_limit,$set_pager_start );
return $result_array ;

} ///////////





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyid
*/
function function_viewbyid($input_array){

$member_id = $input_array["member_id"];
$member_login = $input_array["member_login"];
$member_password = $input_array["member_password"];

//// sql command
if ($member_id != "") 		{$sql_member_id 	=	" and		member_id = '$member_id' " ; }
if ($member_login != "") 		{$sql_member_login 	=	" and		member_login = '$member_login' " ; }
if ($member_password != "") 		{$sql_member_password 	=	" and		member_password = '$member_password' " ; }

$sql_command = "
select 		* 
from			app_member_myaccount
where		system_delete= 'none'

$sql_member_id
$sql_member_login
$sql_member_password

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
}




/*
#################################################### end view  +++
*/





/*
#################################################### start update  +++
*/


function function_update($input_array){		

//// request
$member_id = $input_array["member_id"]; 

$member_password = $input_array["member_password"]; 
$member_login = $input_array["member_login"]; 
$member_email = $input_array["member_email"]; 
$member_mobile = $input_array["member_mobile"]; 

$option_confirm = $input_array["option_confirm"]; 
$option_confirm_type = $input_array["option_confirm_type"]; 
$option_confirm_key = $input_array["option_confirm_key"]; 
$option_confirm_key_input = $input_array["option_confirm_key_input"]; 
$option_confirm_datetime = $input_array["option_confirm_datetime"]; 

$option_recommend = $input_array["option_recommend"]; 
$option_approve = $input_array["option_approve"]; 
$option_status = $input_array["option_status"]; 

$ipaddress_update = $input_array["ipaddress_update"];
$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];




//// sql config

$check_process = "insert" ; 
if ($member_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_member_myaccount
where 		system_delete = 'none'
and			member_id = '$member_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$member_id = $result_array["member_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_member_myaccount ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "member" ;
$input_idnow =  $cmd_check_record + 1 ; 
$member_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_member_myaccount ( 
member_id , 

option_status , 
system_delete , 

ipaddress_post , 
user_create , 
datetime_create 
)
				
values (
'$member_id'  , 

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




/// update start
$sql_command="  
update   app_member_myaccount  

set  
member_password = '$member_password' ,
member_login = '$member_login' ,
member_email = '$member_email' ,
member_mobile = '$member_mobile' ,

option_confirm = '$option_confirm'  , 
option_confirm_type = '$option_confirm_type'  , 
option_confirm_key = '$option_confirm_key'  , 
option_confirm_key_input = '$option_confirm_key_input'  , 
option_confirm_datetime = '$option_confirm_datetime'  , 

option_recommend = '$option_recommend'  , 
option_approve = '$option_approve'  , 
option_status = '$option_status'  , 

ipaddress_update = '$ipaddress_update'  , 
user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			member_id = '$member_id'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"member_id"=>"$member_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$member_id = $input_array["member_id"]; 

$option_confirm = $input_array["option_confirm"]; 
$option_recommend = $input_array["option_recommend"]; 
$option_approve = $input_array["option_approve"]; 
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 



if ($member_id != "" ) {  /// check id
$sql_command = "	
update  app_member_myaccount   

set    
option_confirm = '$option_confirm' , 
option_recommend = '$option_recommend' , 
option_approve = '$option_approve' , 
option_status = '$option_status' , 
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





function  function_update_myaccount($input_array){	

//// request
$member_id = $input_array["member_id"]; 
$member_password = $input_array["member_password"]; 
$member_mobile = $input_array["member_mobile"]; 

$ipaddress_update = $input_array["ipaddress_update"];
$datetime_now = $input_array["datetime_now"]; 



if ($member_id != "" ) {  /// check id
$sql_command = "	
update  app_member_myaccount   

set    
member_password = '$member_password' , 
member_mobile = '$member_mobile' , 
ipaddress_update = '$ipaddress_update' , 
datetime_update = '$datetime_now'

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












function  function_update_confirm_email($input_array){	

//// request
$member_id = $input_array["member_id"]; 
$option_confirm = $input_array["option_confirm"]; 
$option_confirm_type = $input_array["option_confirm_type"]; 
$option_confirm_key_input = $input_array["option_confirm_key_input"];
$option_confirm_datetime = $input_array["option_confirm_datetime"];

$option_status = $input_array["option_status"];
$option_approve = $input_array["option_approve"];

$datetime_now = $input_array["datetime_now"]; 

/// if ($option_status != "" ) { $sql_option_status = "  option_status = '$option_status' ,  "; }

if ($member_id != "" ) {  /// check id
$sql_command = "	
update  app_member_myaccount   

set    
option_confirm = '$option_confirm' , 
option_confirm_type = '$option_confirm_type' , 
option_confirm_key_input = '$option_confirm_key_input' , 
option_status = '$option_status' , 
option_approve = '$option_approve' , 

option_confirm_datetime = '$datetime_now' , 
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
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$member_id = $input_array["member_id"]; 
$ipaddress_delete = $input_array["ipaddress_delete"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($member_id != "" ) { 
$sql_command = "	
update  	app_member_myaccount   
set    	
system_delete = 'delete'   , 
ipaddress_delete = '$ipaddress_delete'   , 
datetime_delete = '$datetime_now'

where  
member_id = '$member_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"member_id"=>"$member_id" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>