<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * system_application
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/system_application.inc.php
 */

class  system_application{	
				
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
function system_application(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

//////////////////////////////////////////

system_application
system_id_gen
system_id
system_id_key
system_name
system_des
system_path
option_order
option_status
option_manage
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
from				system_application
where			system_delete = 'none'  

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


$option_status 	= $input_array["option_status"];

//// sql command
if ($option_status != "")  					{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			system_application
where 			system_delete = 'none' 

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

$system_id_gen = $input_array["system_id_gen"];

//// sql command
if ($system_id_gen != "") 		{$sql_system_id_gen 	=	" and		system_id_gen = '$system_id_gen' " ; }

$sql_command = "
select 		* 
from			system_application
where		system_delete= 'none'

$sql_system_id_gen

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
$system_id_gen = $input_array["system_id_gen"]; 
$system_id = $input_array["system_id"]; 
$system_id_key = $input_array["system_id_key"]; 

$system_name = $input_array["system_name"]; 
$system_des = $input_array["system_des"]; 
$system_path = $input_array["system_path"]; 

$option_order = $input_array["option_order"]; 
$option_manage = $input_array["option_manage"]; 
$option_status = $input_array["option_status"];

$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];




//// sql config




$check_process = "insert" ; 
if ($system_id_gen != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		system_application
where 		system_delete = 'none'
and			system_id_gen = '$system_id_gen'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$system_id_gen = $result_array["system_id_gen"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  system_application ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "system_id_gen-" ;
$input_idnow =  $cmd_check_record + 1 ; 
$system_id_gen = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  system_application ( 
system_id_gen , 

option_status , 
system_delete , 
user_create , 
datetime_create 
)
				
values (
'$system_id_gen'  , 

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
update   system_application  

set  
system_id = '$system_id' ,
system_id_key = '$system_id_key' ,

system_name = '$system_name' ,
system_des = '$system_des' ,
system_path = '$system_path' ,

option_order = '$option_order'  , 
option_manage = '$option_manage'  , 
option_status = '$option_status'  , 

user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			system_id_gen = '$system_id_gen'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"system_id_gen"=>"$system_id_gen" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$system_id_gen = $input_array["system_id_gen"]; 
$system_id = $input_array["system_id"]; 
$system_id_key = $input_array["system_id_key"]; 
$system_name = $input_array["system_name"];
$system_des = $input_array["system_des"];
$system_path = $input_array["system_path"];

$option_order = $input_array["option_order"];
$option_manage = $input_array["option_manage"];
$option_status = $input_array["option_status"]; 

$datetime_now = $input_array["datetime_now"]; 



if ($system_id_gen != "" ) {  /// check id
$sql_command = "	
update  system_application   

set    
system_id = '$system_id' , 
system_id_key = '$system_id_key' , 
system_name = '$system_name' , 
system_des = '$system_des' , 
system_path = '$system_path' , 

option_order = '$option_order' , 
option_manage = '$option_manage' , 
option_status = '$option_status' , 
datetime_update = '$datetime_now'

where  system_id_gen = '$system_id_gen'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"system_id_gen"=>"$system_id_gen" , 
);
return $result_return ;	
		
} /// 














/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$system_id_gen = $input_array["system_id_gen"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($system_id_gen != "" ) { 
$sql_command = "	
update  	system_application   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
system_id_gen = '$system_id_gen'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"system_id_gen"=>"$system_id_gen" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>