<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * system_auth_match
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/system_auth_match.inc.php
 */

class  system_auth_match{	
				
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
function system_auth_match(){
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

$sql_other = $input_array["sql_other"];
$group_id = $input_array["group_id"];
$page_id = $input_array["page_id"];
$option_status = $input_array["option_status"];

//// sql command
if ($group_id != "") 						{ $sql_group_id 			=	" and		group_id = '$group_id' " ; }
if ($page_id != "")  						{ $sql_page_id 			=	" and		page_id = '$page_id' " ; }
if ($option_status != "")  					{ $sql_option_status 	=	" and		option_status = '$option_status' " ; }

//// recommend
$sql_command = "
select			count(*)  
from				system_auth_match
where			system_delete = 'none'  

$sql_group_id
$sql_page_id
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

$set_pager_limit = $input_array["set_pager_limit"];
$set_pager_start = $input_array["set_pager_start"];
if ($set_pager_limit == "") {$set_pager_limit = 10000 ; }
if ($set_pager_start == "") {$set_pager_start = 0 ; }


$sql_other = $input_array["sql_other"];

$group_id = $input_array["group_id"];
$page_id = $input_array["page_id"];
$option_status = $input_array["option_status"];

//// sql command
if ($group_id != "") 						{ $sql_group_id 				=	" and		group_id = '$group_id' " ; }
if ($page_id != "") 							{ $sql_page_id 				=	" and		page_id = '$page_id' " ; }
if ($option_status != "")  					{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			system_auth_match
where 			system_delete = 'none' 

$sql_group_id 
$sql_page_id 
$sql_option_status
$sql_other


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
$match_id = $input_array["match_id"];
if ($match_id != ""){
$sql_command = "
select 		* 
from			system_auth_match
where		system_delete= 'none'
AND			match_id = '$match_id'

";	
} ///
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
}





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyid
*/
function function_viewbyid_sql($input_array){
$sql_other = $input_array["sql_other"];
if ($sql_other != "" ){ 

//// sql command
$sql_command = "
select 		* 
from			system_auth_match
where		system_delete= 'none'
$sql_other
";	
//// print "sql_command = $sql_command ";
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
} /// if ($sql_other != "" ){ 
} /// function_viewbyid_sql




/*
#################################################### end view  +++
*/




function function_update($input_array){		

//// request
$match_id = $input_array["match_id"]; 
$group_id = $input_array["group_id"]; 
$page_id = $input_array["page_id"]; 
$option_status = $input_array["option_status"];

$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];

//// sql config
if ($option_status != "" ) { $sql_option_status = " option_status = '$option_status ' "  ;  }



$check_process = "insert" ; 
if ($match_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		system_auth_match
where 		system_delete = 'none'
and			match_id = '$match_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$match_id = $result_array["match_id"];
} ///
} ///

/// print "check_record_process = $check_record_process <br>"; 


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  system_auth_match ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "match" ;
$input_idnow =  $cmd_check_record + 1 ; 
$match_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  system_auth_match ( 
match_id , 
group_id , 
page_id , 

option_status , 
system_delete , 
datetime_create 
)
				
values (
'$match_id'  , 
'$group_id'  , 
'$page_id'  , 

'on'  , 
'none'  , 
'$datetime_now'  
)									
 ";		 
//// print "$sql_command <br><br>"; 
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 



/// update start
$sql_command="  
update   system_auth_match  

set  
option_status = '$option_status'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			match_id = '$match_id'
 "; 
 //// print "$sql_command <br>"; 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"match_id"=>"$match_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$match_id = $input_array["match_id"]; 
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 

//// sql
if ($option_status != "") 				{ $sql_option_status 			=	" 	option_status = '$option_status'  , " ; }




//// datetime
$config_date = date("Y-m-d");  /// 
$config_time = date("H:i:s");  /// 
$datetime_update = "$config_date $config_time" ; 

if ($match_id != "" ) {  /// check id
$sql_command = "	
update  system_auth_match   

set    
$sql_option_status 
datetime_update = '$datetime_update'

where  match_id = '$match_id'    
";		

/// print "$sql_command <br><br>"; 
$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"match_id"=>"$match_id" , 
);
return $result_return ;	
		
} /// 








/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$match_id = $input_array["match_id"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($match_id != "" ) { 

$sql_command = "	
update  	system_auth_match   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
match_id = '$match_id'  
";		
$result_update = $this->db->Execute($sql_command);	

} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"match_id"=>"$match_id" , 
);
return $result_return ;	
		
} ///  end function




	
	

}///// class  eva_criteria{	
?>