<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){



/**
 * app_calendar
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_calendar.inc.php
 */

class  app_calendar{	
				
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
function app_calendar(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

app_calendar

calendar_id
calendar_type
calendar_topic
calendar_des
calendar_detail
calendar_image_mini

date_start
date_end
time_start
time_end
stat_view
stat_reply
option_reply
option_status
system_delete
user_create
user_update
user_delete
datetime_create
datetime_update
datetime_delete

*/




/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_countbyset
*/
function function_countbyset($input_array){

$sql_other = $input_array["sql_other"];

$system_id = $input_array["system_id"];
$section_id = $input_array["section_id"];
$calendar_type = $input_array["calendar_type"];
$option_status = $input_array["option_status"];


//// sql command
if ($system_id != "") 						{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($section_id != "") 						{ $sql_section_id 					=	" and		section_id = '$section_id' " ; }
if ($calendar_type != "")  				{ $sql_calendar_type 				=	" and		calendar_type = '$calendar_type' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_calendar
where			system_delete = 'none'  

$sql_system_id
$sql_section_id
$sql_calendar_type
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
$sql_orderby = $input_array["sql_orderby"];
if ($sql_orderby == "") { $sql_orderby =  " order by 	id  DESC " ; }


$system_id = $input_array["system_id"];
$section_id = $input_array["section_id"];
$calendar_type = $input_array["calendar_type"];
$option_status = $input_array["option_status"];

//// sql command
if ($system_id != "") 						{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($section_id != "") 						{ $sql_section_id 					=	" and		section_id = '$section_id' " ; }
if ($calendar_type != "")  				{ $sql_calendar_type 				=	" and		calendar_type = '$calendar_type' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_calendar
where 			system_delete = 'none' 

$sql_system_id 
$sql_section_id 
$sql_calendar_type
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

$calendar_id = $input_array["calendar_id"];

//// sql command
if ($calendar_id != "") 		{$sql_calendar_id 	=	" and		calendar_id = '$calendar_id' " ; }

$sql_command = "
select 		* 
from			app_calendar
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




/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update
*/

function function_update($input_array){		

//// request
$calendar_id = $input_array["calendar_id"]; 
$category_id = $input_array["category_id"]; 
$calendar_type = $input_array["calendar_type"]; 

$calendar_topic = $input_array["calendar_topic"]; 
$calendar_place = $input_array["calendar_place"]; 
$calendar_des = $input_array["calendar_des"]; 
$calendar_detail = $input_array["calendar_detail"]; 

$calendar_image_mini = $input_array["calendar_image_mini"]; 

$date_start = $input_array["date_start"]; 
$date_end = $input_array["date_end"]; 
$time_start = $input_array["time_start"]; 
$time_end = $input_array["time_end"]; 

$stat_view = $input_array["stat_view"]; 
$stat_reply = $input_array["stat_reply"]; 

$option_recommend = $input_array["option_recommend"]; 
$option_reply = $input_array["option_reply"]; 
$option_approve = $input_array["option_approve"]; 
$option_status = $input_array["option_status"];

$ipaddress_update = $input_array["ipaddress_update"]; 
$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];




//// sql config
if ($option_status != "" ) { $sql_option_status = " option_status = '$option_status ' "  ;  }




$check_process = "insert" ; 
if ($calendar_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_calendar
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
$sql_command = " select  count(*) from  app_calendar ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "event" ;
$input_idnow =  $cmd_check_record + 1 ; 
$calendar_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_calendar ( 
calendar_id , 
option_status , 
system_delete , 

ipaddress_post , 
user_create , 
datetime_create 
)
				
values (
'$calendar_id'  , 
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
update   app_calendar  

set  
category_id = '$category_id' ,
calendar_type = '$calendar_type' ,
calendar_topic = '$calendar_topic' ,
calendar_place = '$calendar_place' ,
calendar_des = '$calendar_des' ,
calendar_detail = '$calendar_detail' ,
calendar_image_mini = '$calendar_image_mini' ,

date_start = '$date_start' ,
date_end = '$date_end'  , 
time_start = '$time_start'  , 
time_end = '$time_end'  , 

stat_view = '$stat_view'  , 
stat_reply = '$stat_reply'  , 

option_recommend = '$option_recommend'  , 
option_reply = '$option_reply'  , 
option_approve = '$option_approve'  , 
option_status = '$option_status'  , 

ipaddress_update = '$ipaddress_update'  , 
user_update = '$user_update'  , 
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
$option_reply = $input_array["option_reply"]; 
$option_recommend = $input_array["option_recommend"]; 
$option_approve = $input_array["option_approve"]; 
$option_status = $input_array["option_status"]; 

$datetime_now = $input_array["datetime_now"]; 



if ($calendar_id != "" ) {  /// check id
$sql_command = "	
update  app_calendar   

set    
option_reply = '$option_reply' , 
option_recommend = '$option_recommend' , 
option_approve = '$option_approve' , 
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








function  function_update_stat($input_array){	

$calendar_id = $input_array["calendar_id"];
$stat_view = $input_array["stat_view"];
$stat_reply = $input_array["stat_reply"];
$datetime_now = $input_array["datetime_now"]; 


if ($calendar_id != "" ) { 
/////////////// stat_view
if ($stat_view == ""  or  $stat_view == "0"  ) {
$sql_command = "
select 		stat_view 
from			app_calendar
where		calendar_id = '$calendar_id'  
";	
$result_array = $this->db->GetRow($sql_command);
$stat_view = $result_array["stat_view"];
}


$stat_view = $stat_view + 1 ; 

$sql_command = "	
update 	 	app_calendar   
set    	
stat_view = '$stat_view'   , 
stat_reply = '$stat_reply'   , 
datetime_view = '$datetime_now'

where  
calendar_id = '$calendar_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
/// "show_status"=>"$show_status" , 
"calendar_id"=>"$calendar_id" , 
"stat_view"=>"$stat_view" , 
);
return $result_return ;	
		
} ///  end function







/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$calendar_id = $input_array["calendar_id"]; 
$ipaddress_delete = $input_array["ipaddress_delete"]; 
$datetime_now = $input_array["datetime_now"]; 



if ($calendar_id != "" ) { 
$sql_command = "	
update  	app_calendar   
set    	
system_delete = 'delete'   , 
ipaddress_delete = '$ipaddress_delete'   , 
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

$calendar_type = $input_array["calendar_type"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($calendar_type != "" ) { 
$sql_command = "	
update  	app_calendar   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
calendar_type = '$calendar_type'  
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