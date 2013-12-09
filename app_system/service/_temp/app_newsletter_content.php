<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_newsletter_content
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_newsletter_content.inc.php
 */

class  app_newsletter_content{	
				
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
function app_newsletter_content(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


function function_countbyset($input_array){

$sql_other 					= $input_array["sql_other"];

$category_id 					= $input_array["category_id"];
$option_process				= $input_array["option_process"];
$option_status 				= $input_array["option_status"];

//// sql command
if ($category_id != "") 			{ $sql_category_id 			=	" and		category_id = '$category_id' " ; }
if ($option_process != "") 		{ $sql_option_process 	=	" and		option_process = '$option_process' " ; }
if ($option_status != "")  			{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_newsletter_content
where			system_delete = 'none'  

$sql_category_id 
$sql_option_process
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



$category_id 			= $input_array["category_id"];
$option_process		= $input_array["option_process"];
$option_status 		= $input_array["option_status"];

//// sql command
if ($category_id != "") 			{ $sql_category_id 			=	" and		category_id = '$category_id' " ; }
if ($option_process != "") 		{ $sql_option_process 	=	" and		option_process = '$option_process' " ; }
if ($option_status != "")  			{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }




$sql_command = "
select			*
from 				app_newsletter_content
where 			system_delete = 'none' 

$sql_category_id 
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

$newsletter_id = $input_array["newsletter_id"];

//// sql command
if ($newsletter_id != "" ){ 
$sql_command = "
select 		* 
from			app_newsletter_content
where		system_delete= 'none'
and			newsletter_id = '$newsletter_id' 

";	
$result_array = $this->db->GetRow($sql_command);
} ///if ($newsletter_id != "" ){ 

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
$newsletter_id 			= $input_array["newsletter_id"]; 
$category_id 				= $input_array["category_id"]; 
$newsletter_name 		= $input_array["newsletter_name"]; 
$newsletter_des 		= $input_array["newsletter_des"]; 
$newsletter_detail 		= $input_array["newsletter_detail"]; 

$newsletter_email 		= $input_array["newsletter_email"]; 
$newsletter_author 	= $input_array["newsletter_author"]; 


$option_bymember 	= $input_array["option_bymember"]; 
$option_byregis 			= $input_array["option_byregis"]; 
$option_process 		= $input_array["option_process"]; 
$option_status 		= $input_array["option_status"]; 

$datetime_now 		= $input_array["datetime_now"];



$check_process = "insert" ; 
if ($newsletter_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_newsletter_content
where 		system_delete = 'none'
and			newsletter_id = '$newsletter_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$newsletter_id = $result_array["newsletter_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_newsletter_content ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "news" ;
$input_idnow =  $cmd_check_record + 1 ; 
$newsletter_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_newsletter_content ( 
newsletter_id , 

option_order , 
option_status , 

system_delete , 
datetime_create 
)
				
values (
'$newsletter_id'  , 

'0'  , 
'on'  , 

'none'  , 
'$datetime_now'  
)									
 ";		
 
//// print $sql_command ;  
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 




/// update start
$sql_command="  
update   app_newsletter_content  

set  
newsletter_name = '$newsletter_name'  , 
newsletter_des = '$newsletter_des'  , 
newsletter_detail = '$newsletter_detail'  , 

newsletter_email = '$newsletter_email'  , 
newsletter_author = '$newsletter_author'  , 
option_bymember = '$option_bymember'  , 
option_byregis = '$option_byregis'  , 
option_process = '$option_process'  , 
option_status = '$option_status'  , 

datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			newsletter_id = '$newsletter_id'
 "; 
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }
$result_return = array(
"show_status"=>"$show_status" , 
"newsletter_id"=>"$newsletter_id" , 
);
return $result_return ;	

} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$newsletter_id = $input_array["newsletter_id"]; 
$email_address = $input_array["email_address"]; 
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 


$sql_command = "	
update  app_newsletter_content   

set    
email_address  = '$email_address' , 
option_status = '$option_status' , 
datetime_update = '$datetime_now'

where  
newsletter_id = '$newsletter_id'

";		
$result_update = $this->db->Execute($sql_command);	


if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }
$result_return = array(
"show_status"=>"$show_status" , 
"newsletter_id"=>"$newsletter_id" , 
);
return $result_return ;	
		
} /// 






/*
#################################################### start delete  +++
*/
function  function_delete($input_array){	
$newsletter_id = $input_array["newsletter_id"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($newsletter_id != "" ) { 
$sql_command = "	
update  	app_newsletter_content   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
newsletter_id = '$newsletter_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////


if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }
$result_return = array(
"show_status"=>"$show_status" , 
"newsletter_id"=>"$newsletter_id" , 
);
return $result_return ;	
		
} ///  end function


	

}///// class  eva_criteria{	
?>