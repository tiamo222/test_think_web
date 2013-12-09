<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_newsletter_email
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_newsletter_email.inc.php
 */

class  app_newsletter_email{	
				
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
function app_newsletter_email(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/




/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_countbyset
*/
function function_countbyset($input_array){

$sql_other 		= $input_array["sql_other"];

$option_remove_byuser 		= $input_array["option_remove_byuser"];
$option_confirm_byuser 		= $input_array["option_confirm_byuser"];
$option_approve 				= $input_array["option_approve"];
$option_status 					= $input_array["option_status"];

//// sql command
if ($option_remove_byuser != "") 		{ $sql_option_remove_byuser 			=	" and		option_remove_byuser = '$option_remove_byuser' " ; }
if ($option_confirm_byuser != "") 		{ $sql_option_confirm_byuser 			=	" and		option_confirm_byuser = '$option_confirm_byuser' " ; }
if ($option_approve != "") 					{ $sql_option_approve 					=	" and		option_approve = '$option_approve' " ; }
if ($option_status != "")  						{ $sql_option_status 						=	" and		option_status = '$option_status' " ; }



//// recommend
$sql_command = "
select			count(*)  
from				app_newsletter_email
where			system_delete = 'none'  

$sql_option_remove_byuser 
$sql_option_confirm_byuser
$sql_option_approve
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



$option_remove_byuser 		= $input_array["option_remove_byuser"];
$option_confirm_byuser 		= $input_array["option_confirm_byuser"];
$option_approve 				= $input_array["option_approve"];
$option_status 					= $input_array["option_status"];

//// sql command
if ($option_remove_byuser != "") 		{ $sql_option_remove_byuser 			=	" and		option_remove_byuser = '$option_remove_byuser' " ; }
if ($option_confirm_byuser != "") 		{ $sql_option_confirm_byuser 			=	" and		option_confirm_byuser = '$option_confirm_byuser' " ; }
if ($option_approve != "") 					{ $sql_option_approve 					=	" and		option_approve = '$option_approve' " ; }
if ($option_status != "")  						{ $sql_option_status 						=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_newsletter_email
where 			system_delete = 'none' 

$sql_option_remove_byuser 
$sql_option_confirm_byuser
$sql_option_approve
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

$email_id = $input_array["email_id"];
$email_address = $input_array["email_address"];

//// sql command


if ($email_id != "" ){ 
$sql_command = "
select 		* 
from			app_newsletter_email
where		system_delete= 'none'
and		email_id = '$email_id' 

";	
$result_array = $this->db->GetRow($sql_command);
} ///if ($email_id != "" ){ 



if ($email_address != "" ){ 
$sql_command = "
select 		* 
from			app_newsletter_email
where		system_delete= 'none'
and			email_address = '$email_address' 

";	
$result_array = $this->db->GetRow($sql_command);
} ///if ($email_id != "" ){ 


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
$email_id = $input_array["email_id"]; 
$email_address = $input_array["email_address"]; 
$email_name = $input_array["email_name"]; 
$email_des = $input_array["email_des"]; 

$stat_sent = $input_array["stat_sent"]; 
$option_remove_byuser = $input_array["option_remove_byuser"]; 
$option_confirm_byuser = $input_array["option_confirm_byuser"]; 
$option_approve = $input_array["option_approve"]; 
$option_status = $input_array["option_status"]; 

$datetime_remove = $input_array["datetime_remove"]; 
$datetime_now = $input_array["datetime_now"];





$check_process = "insert" ; 
if ($email_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_newsletter_email
where 		system_delete = 'none'
and			email_id = '$email_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$email_id = $result_array["email_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_newsletter_email ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "mail" ;
$input_idnow =  $cmd_check_record + 1 ; 
$email_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_newsletter_email ( 
email_id , 
email_address , 


option_remove_byuser , 
option_confirm_byuser , 
option_approve , 
option_status , 

stat_sent , 
system_delete , 
datetime_create 
)
				
values (
'$email_id'  , 
'$email_address'  , 

'none'  , 
'none'  , 
'none'  , 
'on'  , 

'0'  , 
'none'  , 
'$datetime_now'  
)									
 ";		
 
//// print $sql_command ;  
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 


if ($email_address != "" )				{ $sql_email_address = " email_address = '$email_address' ,  "; }
if ($stat_sent != "" )						{ $sql_stat_sent = " stat_sent = '$stat_sent' ,  "; }
if ($option_remove_byuser != "" )	{ $sql_option_remove_byuser = " option_remove_byuser = '$option_remove_byuser' ,  "; }
if ($option_confirm_byuser != "" )	{ $sql_option_confirm_byuser = " option_confirm_byuser = '$option_confirm_byuser' ,  "; }

if ($option_approve != "" )				{ $sql_option_approve = " option_approve = '$option_approve' ,  "; }
if ($option_status != "" )					{ $sql_option_status = " option_status = '$option_status' ,  "; }
if ($datetime_remove != "" )			{ $sql_datetime_remove = " datetime_remove = '$datetime_remove' ,  "; }



/// update start
$sql_command="  
update   app_newsletter_email  

set  
$sql_email_address
$sql_stat_sent
$sql_option_remove_byuser
$sql_option_confirm_byuser
$sql_option_approve
$sql_option_status
$sql_datetime_remove
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			email_id = '$email_id'
 "; 
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }
$result_return = array(
"show_status"=>"$show_status" , 
"email_id"=>"$email_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option11($input_array){	

//// request
$email_id = $input_array["email_id"]; 
$email_address  = $input_array["email_address"]; 

$stat_sent = $input_array["stat_sent"];
$option_remove_byuser = $input_array["option_remove_byuser"];
$option_confirm_byuser = $input_array["option_confirm_byuser"];
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"]; 

$datetime_remove = $input_array["datetime_remove"]; 
$datetime_now = $input_array["datetime_now"]; 



if ($email_id != "" ){ $sql_data_id = "  email_id = '$email_id'  "; }
if ($email_address != "" ){ $sql_data_id = "  email_address = '$email_address'  "; }


if ($sql_data_id != "" ) {  /// check id

if ($stat_sent != "" )						{ $sql_stat_sent = " stat_sent = '$stat_sent' ,  "; }
if ($option_remove_byuser != "" )	{ $sql_option_remove_byuser = " option_remove_byuser = '$option_remove_byuser' ,  "; }
if ($option_confirm_byuser != "" )	{ $sql_option_confirm_byuser = " option_confirm_byuser = '$option_confirm_byuser' ,  "; }

if ($option_approve != "" )				{ $sql_option_approve = " option_approve = '$option_approve' ,  "; }
if ($option_status != "" )					{ $sql_option_status = " option_status = '$option_status' ,  "; }
if ($datetime_remove != "" )			{ $sql_datetime_remove = " datetime_remove = '$datetime_remove' ,  "; }


$sql_command = "	
update  app_newsletter_email   

set    
$sql_stat_sent
$sql_option_remove_byuser
$sql_option_confirm_byuser
$sql_option_approve
$sql_option_status
$sql_datetime_remove

datetime_update = '$datetime_now'

where  
$sql_data_id

";		

print "$sql_command <br><br>"; 
$result_update = $this->db->Execute($sql_command);	
} ////sql_data_id

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"email_id"=>"$email_id" , 
);
return $result_return ;	
		
} /// 






function  function_update_option($input_array){	

//// request
$email_id = $input_array["email_id"]; 
$email_address  = $input_array["email_address"]; 
$option_approve  = $input_array["option_approve"]; 
$option_status  = $input_array["option_status"]; 
$datetime_now  = $input_array["datetime_now"]; 


if ($email_id != "" ){
$sql_command = "	
update  app_newsletter_email   

set    
email_address = '$email_address'  , 
option_approve = '$option_approve'  , 
option_status = '$option_status'  , 
datetime_update = '$datetime_now'

where  
email_id = '$email_id' 
";		

/// print "$sql_command <br><br>"; 
$result_update = $this->db->Execute($sql_command);	

} ///if ($email_id != "" ){

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"email_id"=>"$email_id" , 
);
return $result_return ;	
		
} /// 









/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$email_id = $input_array["email_id"]; 
$email_address = $input_array["email_address"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($email_id != "" ) { 
$sql_command = "	
update  	app_newsletter_email   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
email_id = '$email_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////



if ($email_address != "" ) { 
$sql_command = "	
update  	app_newsletter_email   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
email_address = '$email_address'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////


if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"email_id"=>"$email_id" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>