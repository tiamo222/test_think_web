<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * system_user
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/system_user.inc.php
 */

class  system_user{	
				
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
function system_user(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

//////////////////////////////////////////

system_user
user_id
user_group_id
user_login
user_password
user_email
user_mobile
user_displayname
user_firstname
user_lastname
user_nickname

user_picture
option_loginby
option_status
option_confirm

login_datetime_now
login_datetime_last
login_ipaddress_now
login_ipaddress_last

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

$sql_other 			= $input_array["sql_other"];
$user_group_id 		= $input_array["user_group_id"];
$user_login 			= $input_array["user_login"];
$user_password 	= $input_array["user_password"];
$user_email 			= $input_array["user_email"];
$option_status 		= $input_array["option_status"];

//// sql command
if ($user_group_id != "") 				{ $sql_user_group_id 		=	" and		user_group_id = '$user_group_id' " ; }
if ($user_login != "") 						{ $sql_user_login 			=	" and		user_login = '$user_login' " ; }
if ($user_password != "") 				{ $sql_user_password 			=	" and		user_password = '$user_password' " ; }
if ($user_email != "") 						{ $sql_user_email 			=	" and		user_email = '$user_email' " ; }
if ($option_status != "")  					{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				system_user
where			system_delete = 'none'  

$sql_user_group_id
$sql_user_login
$sql_user_password
$sql_user_email
$sql_option_status
$sql_other

";	
$count_row = $this->db->GetOne($sql_command);
return $count_row ;
}




/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyset
*/
function function_viewbyset($input_array){

$set_pager_limit 	= $input_array["set_pager_limit"];
$set_pager_start 	= $input_array["set_pager_start"];
if ($set_pager_limit == "") {$set_pager_limit = 10000 ; }
if ($set_pager_start == "") {$set_pager_start = 0 ; }


$sql_other = $input_array["sql_other"];
$sql_orderby = $input_array["sql_orderby"];
if ($sql_orderby == "") { $sql_orderby =  " order by 	id  DESC " ; }


$user_group_id 		= $input_array["user_group_id"];
$user_login 			= $input_array["user_login"];
$user_password 	= $input_array["user_password"];
$user_email 			= $input_array["user_email"];
$option_status 		= $input_array["option_status"];

//// sql command
if ($user_group_id != "") 				{ $sql_user_group_id 		=	" and		user_group_id = '$user_group_id' " ; }
if ($user_login != "") 						{ $sql_user_login 			=	" and		user_login = '$user_login' " ; }
if ($user_password != "") 				{ $sql_user_password 	=	" and		user_password = '$user_password' " ; }
if ($user_email != "") 						{ $sql_user_email 			=	" and		user_email = '$user_email' " ; }
if ($option_status != "")  					{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			system_user
where 			system_delete = 'none' 

$sql_user_group_id 
$sql_user_login
$sql_user_password
$sql_user_email
$sql_option_status

$sql_other
$sql_orderby

";		

/// print "sql_command = $sql_command ";

$result_array = $this->db->SelectLimit($sql_command,$set_pager_limit,$set_pager_start );
return $result_array ;

} ///////////





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyid
*/
function function_viewbyid($input_array){

$user_id 			= $input_array["user_id"];
$user_login 		= $input_array["user_login"];
$user_password = $input_array["user_password"];

//// sql command
if ($user_id != "") 				{$sql_user_id 			=	" and		user_id = '$user_id' " ; }
if ($user_login != "") 			{$sql_user_login 		=	" and		user_login = '$user_login' " ; }
if ($user_password != "") 	{$sql_user_password 	=	" and		user_password = '$user_password' " ; }

$sql_command = "
select 		* 
from			system_user
where		system_delete= 'none'

$sql_user_id
$sql_user_login
$sql_user_password
";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;

}//////////




/*
#################################################### end view  +++
*/





/*
#################################################### start update  +++
*/


function function_update($input_array){		

//// request
$user_id = $input_array["user_id"]; 
$user_group_id = $input_array["user_group_id"]; 

$user_login = $input_array["user_login"]; 
$user_password = $input_array["user_password"]; 
$user_email = $input_array["user_email"]; 
$user_mobile = $input_array["user_mobile"]; 

$user_displayname = $input_array["user_displayname"]; 
$user_firstname = $input_array["user_firstname"]; 
$user_lastname = $input_array["user_lastname"]; 
$user_nickname = $input_array["user_nickname"]; 

$user_picture = $input_array["user_picture"]; 

$option_loginby = $input_array["option_loginby"]; 
$option_approve = $input_array["option_approve"]; 
$option_confirm = $input_array["option_confirm"]; 
$option_status = $input_array["option_status"];

$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];




//// sql config




$check_process = "insert" ; 
if ($user_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		system_user
where 		system_delete = 'none'
and			user_id = '$user_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$user_id = $result_array["user_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  system_user ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "userid" ;
$input_idnow =  $cmd_check_record + 1 ; 
$user_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  system_user ( 
user_id , 

option_status , 
system_delete , 
user_create , 
datetime_create 
)
				
values (
'$user_id'  , 

'on'  , 
'none'  , 
'$user_update'  , 
'$datetime_now'  
)									
 ";		
 
//// print $sql_command ; 
 
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 


if ($user_group_id != "" ){ $sql_user_group_id = " user_group_id = '$user_group_id' , "; }

/// update start
$sql_command="  
update   system_user  

set  
$sql_user_group_id

user_login = '$user_login' ,
user_password = '$user_password' ,
user_email = '$user_email' ,
user_mobile = '$user_mobile' ,

user_displayname = '$user_displayname'  , 
user_firstname = '$user_firstname'  , 
user_lastname = '$user_lastname'  , 
user_nickname = '$user_nickname'  , 
user_picture = '$user_picture'  , 

option_loginby = '$option_loginby'  , 
option_confirm = '$option_confirm'  , 
option_approve = '$option_approve' , 
option_status = '$option_status'  , 

user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			user_id = '$user_id'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"user_id"=>"$user_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$user_id = $input_array["user_id"]; 
$option_confirm = $input_array["option_confirm"];
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"]; 

$datetime_now = $input_array["datetime_now"]; 



if ($user_id != "" ) {  /// check id
$sql_command = "	
update  system_user   

set    
option_confirm = '$option_confirm' , 
option_approve = '$option_approve' , 
option_status = '$option_status' , 
datetime_update = '$datetime_now'

where  user_id = '$user_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"user_id"=>"$user_id" , 
);
return $result_return ;	
		
} /// 














/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$user_id = $input_array["user_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($user_id != "" ) { 
$sql_command = "	
update  	system_user   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
user_id = '$user_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"user_id"=>"$user_id" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>