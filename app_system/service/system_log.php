<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * system_log
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/system_log.inc.php
 */

class  system_log{	
				
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
function system_log(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

//////////////////////////////////////////

system_log
log_id
system_id
member_id
member_login
member_password
process_name
process_des
process_data_id
process_action

process_url_action
process_url_ref
process_ipaddress
process_datetime
process_comment
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

$sql_other 					= $input_array["sql_other"];
$system_id 					= $input_array["system_id"];
$member_id 					= $input_array["member_id"];
$member_login 				= $input_array["member_login"];
$process_name 				= $input_array["process_name"];
$process_action 			= $input_array["process_action"];
$process_ipaddress 		= $input_array["process_ipaddress"];
$option_status 				= $input_array["option_status"];

//// sql command
if ($system_id != "") 				{ $sql_system_id 			=	" and		system_id = '$system_id' " ; }
if ($member_id != "") 			{ $sql_member_id 			=	" and		member_id = '$member_id' " ; }
if ($member_login != "") 		{ $sql_member_login 			=	" and		member_login = '$member_login' " ; }
if ($process_name != "") 		{ $sql_process_name 			=	" and		process_name = '$process_name' " ; }
if ($process_action != "") 		{ $sql_process_action 			=	" and		process_action = '$process_action' " ; }
if ($process_ipaddress != "") 	{ $sql_process_ipaddress 			=	" and		process_ipaddress = '$process_ipaddress' " ; }
if ($option_status != "")  			{ $sql_sql_option_status 		=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				system_log
where			system_delete = 'none'  

$sql_system_id
$sql_member_id
$sql_member_login
$sql_process_name
$sql_process_action
$sql_process_ipaddress
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


$system_id 					= $input_array["system_id"];
$member_id 					= $input_array["member_id"];
$member_login 				= $input_array["member_login"];
$process_name 				= $input_array["process_name"];
$process_action 			= $input_array["process_action"];
$process_ipaddress 		= $input_array["process_ipaddress"];
$option_status 				= $input_array["option_status"];

//// sql command
if ($system_id != "") 				{ $sql_system_id 			=	" and		system_id = '$system_id' " ; }
if ($member_id != "") 			{ $sql_member_id 			=	" and		member_id = '$member_id' " ; }
if ($member_login != "") 		{ $sql_member_login 			=	" and		member_login = '$member_login' " ; }
if ($process_name != "") 		{ $sql_process_name 			=	" and		process_name = '$process_name' " ; }
if ($process_action != "") 		{ $sql_process_action 			=	" and		process_action = '$process_action' " ; }
if ($process_ipaddress != "") 	{ $sql_process_ipaddress 			=	" and		process_ipaddress = '$process_ipaddress' " ; }
if ($option_status != "")  			{ $sql_sql_option_status 		=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			system_log
where 			system_delete = 'none' 

$sql_system_id
$sql_member_id
$sql_member_login
$sql_process_name
$sql_process_action
$sql_process_ipaddress
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

$log_id = $input_array["log_id"];

//// sql command
if ($log_id != "") 		{$sql_log_id 	=	" and		log_id = '$log_id' " ; }

$sql_command = "
select 		* 
from			system_log
where		system_delete= 'none'

$sql_log_id

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
$log_id = $input_array["log_id"]; 
$system_id = $input_array["system_id"]; 

$member_id = $input_array["member_id"]; 
$member_login = $input_array["member_login"]; 
$member_password = $input_array["member_password"]; 
$process_name = $input_array["process_name"]; 

$process_des = $input_array["process_des"]; 
$process_data_id = $input_array["process_data_id"]; 
$process_action = $input_array["process_action"]; 

$process_url_action = $input_array["process_url_action"]; 
$process_url_ref = $input_array["process_url_ref"]; 
$process_ipaddress = $input_array["process_ipaddress"]; 
$process_comment = $input_array["process_comment"]; 

$option_status = $input_array["option_status"];
$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];




//// sql config




$check_process = "insert" ; 
if ($log_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		system_log
where 		system_delete = 'none'
and			log_id = '$log_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$log_id = $result_array["log_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  system_log ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "logid" ;
$input_idnow =  $cmd_check_record + 1 ; 
$log_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  system_log ( 
log_id , 

option_status , 
system_delete , 
user_create , 
datetime_create 
)
				
values (
'$log_id'  , 

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




/// update start
$sql_command="  
update   system_log  

set  
system_id = '$system_id' ,
member_id = '$member_id' ,
member_login = '$member_login' ,
member_password = '$member_password' ,
process_name = '$process_name' ,

process_des = '$process_des'  , 
process_data_id = '$process_data_id'  , 
process_action = '$process_action'  , 

process_url_action = '$process_url_action'  , 
process_url_ref = '$process_url_ref'  , 
process_ipaddress = '$process_ipaddress'  , 
process_comment = '$process_comment'  , 

option_status = '$option_status'  , 
user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			log_id = '$log_id'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"log_id"=>"$log_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$log_id = $input_array["log_id"]; 
$option_status = $input_array["option_status"]; 

$datetime_now = $input_array["datetime_now"]; 



if ($log_id != "" ) {  /// check id
$sql_command = "	
update  system_log   

set    
option_status = '$option_status' , 
datetime_update = '$datetime_now'

where  log_id = '$log_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"log_id"=>"$log_id" , 
);
return $result_return ;	
		
} /// 














/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$log_id = $input_array["log_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($log_id != "" ) { 
$sql_command = "	
update  	system_log   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
log_id = '$log_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"log_id"=>"$log_id" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>