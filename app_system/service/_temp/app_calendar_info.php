<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_calendar_info
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_calendar_info.inc.php
 */

class  app_calendar_info{	
				
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
function app_calendar_info(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_countbyset
*/
function function_countbyset($input_array){

$sql_other = $input_array["sql_other"];
$ref_id = $input_array["ref_id"];
$option_status = $input_array["option_status"];

//// sql command
if ($ref_id != "") 				{ $sql_ref_id 				=	" and		ref_id = '$ref_id' " ; }
if ($option_status != "")  		{ $sql_option_status 	=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_calendar_info
where			system_delete = 'none'  

$sql_ref_id
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

$set_pager_limit = $input_array["set_pager_limit"];
$set_pager_start = $input_array["set_pager_start"];
if ($set_pager_limit == "") {$set_pager_limit = 10000 ; }
if ($set_pager_start == "") {$set_pager_start = 0 ; }


$sql_other = $input_array["sql_other"];
$sql_orderby = $input_array["sql_orderby"];
if ($sql_orderby == "") { $sql_orderby =  " order by 	id  DESC " ; }

$ref_id = $input_array["ref_id"];
$option_status = $input_array["option_status"];

//// sql command
if ($ref_id != "") 				{ $sql_ref_id 				=	" and		ref_id = '$ref_id' " ; }
if ($option_status != "")  		{ $sql_option_status 	=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_calendar_info
where 			system_delete = 'none' 

$sql_ref_id 
$sql_option_status

$sql_other
$sql_orderby

";		

////print "sql_command = $sql_command ";

$result_array = $this->db->SelectLimit($sql_command,$set_pager_limit,$set_pager_start );
return $result_array ;

} ///////////






/*
function function_countbyset_sql($input_array){

$sql_other = $input_array["sql_other"];

//// recommend
if ($sql_other != "" ){ 
$sql_command = " $sql_other ";	

print "sql_command = $sql_command ";

$count_row = $this->db->GetOne($sql_command);
return $count_row ;

} 
}
*/




function function_viewbyset_sql($input_array){
	
$set_pager_limit = $input_array["set_pager_limit"];
$set_pager_start = $input_array["set_pager_start"];
if ($set_pager_limit == "") {$set_pager_limit = 10000 ; }
if ($set_pager_start == "") {$set_pager_start = 0 ; }

$sql_other = $input_array["sql_other"];

if ($sql_other != "" ){ 
$sql_command = " $sql_other ";	
/// print "sql_command = $sql_command ";

$result_array = $this->db->SelectLimit($sql_command,$set_pager_limit,$set_pager_start );
return $result_array ;
} 
}











/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyid
*/
function function_viewbyid($input_array){

$calendar_id = $input_array["calendar_id"];

//// sql command
if ($calendar_id != "") 		{$sql_calendar_id 	=	" and		calendar_id = '$calendar_id' " ; }

$sql_command = "
select 		* 
from			app_calendar_info
where		system_delete= 'none'

$sql_calendar_id

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
$calendar_id = $input_array["calendar_id"]; 
$ref_id = $input_array["ref_id"]; 
$calendar_date = $input_array["calendar_date"]; 
$option_status = $input_array["option_status"];
$datetime_now = $input_array["datetime_now"];


//// sql config
if ($option_status != "" ) { $sql_option_status = " option_status = '$option_status ' "  ;  }


$check_process = "insert" ; 
if ($calendar_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_calendar_info
where 		system_delete = 'none'
and			calendar_id = '$calendar_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$calendar_id = $result_array["calendar_id"];
} ///
} ///


/// print "check_record_process = $check_record_process <br>"; 
/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_calendar_info ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "event" ;
$input_idnow =  $cmd_check_record + 1 ; 
$calendar_id = function_genid( $input_idname , $input_idnow ) ;

//////////// sql command 
$sql_command ="
insert into  app_calendar_info ( 
calendar_id , 
ref_id , 
option_status , 
system_delete , 
datetime_create 
)
				
values (
'$calendar_id'  , 
'$ref_id'  , 
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
update   app_calendar_info  

set  
calendar_date = '$calendar_date' ,
option_status = '$option_status'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			calendar_id = '$calendar_id'
 "; 
 
/// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"calendar_id"=>"$calendar_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$calendar_id = $input_array["calendar_id"]; 
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 



if ($calendar_id != "" ) {  /// check id
$sql_command = "	
update  app_calendar_info   

set    
option_status = '$option_status' , 
datetime_update = '$datetime_now'
where  calendar_id = '$calendar_id'    
";		

//// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"calendar_id"=>"$calendar_id" , 
);
return $result_return ;	
		
} /// 








/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$calendar_id = $input_array["calendar_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($calendar_id != "" ) { 
$sql_command = "	
update  	app_calendar_info   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
calendar_id = '$calendar_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"calendar_id"=>"$calendar_id" , 
);
return $result_return ;	
		
} ///  end function





function  function_delete_bycase($input_array){	

$ref_id = $input_array["ref_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($ref_id != "" ) { 
$sql_command = "	
update  	app_calendar_info   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
ref_id = '$ref_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"calendar_type"=>"$calendar_type" , 
);
return $result_return ;	
		
} ///  end function




	

}///// class  eva_criteria{	
?>