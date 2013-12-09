<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_comment_reply
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_comment_reply.inc.php
 */

class  app_comment_reply{	
				
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
function app_comment_reply(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

app_comment_reply

comment_id
system_id
data_id
member_id
comment_topic
comment_detail
comment_image_mini
stat_delete
option_reply_comment_id

option_order
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

$data_id = $input_array["data_id"];
$option_reply_comment_id = $input_array["option_reply_comment_id"];
$member_id = $input_array["member_id"];
$stat_delete = $input_array["stat_delete"];
$option_status = $input_array["option_status"];


//// sql command
if ($system_id != "") 								{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($section_id != "") 								{ $sql_section_id 					=	" and		section_id = '$section_id' " ; }

if ($data_id != "") 									{ $sql_data_id 								=	" and		data_id = '$data_id' " ; }
if ($option_reply_comment_id != "")  		{ $sql_option_reply_comment_id 	=	" and		option_reply_comment_id = '$option_reply_comment_id' " ; }
if ($member_id != "")  							{ $sql_member_id 						=	" and		member_id = '$member_id' " ; }
if ($stat_delete != "")  							{ $sql_stat_delete 						=	" and		stat_delete = '$stat_delete' " ; }
if ($option_status != "")  							{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_comment_reply
where			system_delete = 'none'  

$sql_system_id
$sql_section_id

$sql_data_id
$sql_option_reply_comment_id
$sql_member_id
$sql_stat_delete
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

$data_id = $input_array["data_id"];
$option_reply_comment_id = $input_array["option_reply_comment_id"];
$member_id = $input_array["member_id"];
$stat_delete = $input_array["stat_delete"];
$option_status = $input_array["option_status"];


//// sql command
if ($system_id != "") 								{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($section_id != "") 								{ $sql_section_id 					=	" and		section_id = '$section_id' " ; }

if ($data_id != "") 									{ $sql_data_id 								=	" and		data_id = '$data_id' " ; }
if ($option_reply_comment_id != "")  		{ $sql_option_reply_comment_id 	=	" and		option_reply_comment_id = '$option_reply_comment_id' " ; }
if ($member_id != "")  							{ $sql_member_id 						=	" and		member_id = '$member_id' " ; }
if ($stat_delete != "")  							{ $sql_stat_delete 						=	" and		stat_delete = '$stat_delete' " ; }
if ($option_status != "")  							{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_comment_reply
where 			system_delete = 'none' 

$sql_system_id
$sql_section_id

$sql_data_id
$sql_option_reply_comment_id
$sql_member_id
$sql_stat_delete
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

$comment_id = $input_array["comment_id"];

//// sql command
if ($comment_id != "") 		{$sql_comment_id 	=	" and		comment_id = '$comment_id' " ; }

$sql_command = "
select 		* 
from			app_comment_reply
where		system_delete= 'none'

$sql_comment_id

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
$comment_id = $input_array["comment_id"]; 
$system_id = $input_array["system_id"]; 
$section_id = $input_array["section_id"]; 

$data_id = $input_array["data_id"]; 
$member_id = $input_array["member_id"]; 
$comment_topic = $input_array["comment_topic"]; 
$comment_detail = $input_array["comment_detail"]; 
$comment_postname = $input_array["comment_postname"]; 

$comment_image = $input_array["comment_image"]; 
$comment_image_mini = $input_array["comment_image_mini"]; 

$stat_delete = $input_array["stat_delete"]; 
$option_reply_comment_id = $input_array["option_reply_comment_id"]; 

$option_order = $input_array["option_order"]; 
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"];

$user_post = $input_array["user_post"];
$ipaddress_post = $input_array["ipaddress_post"];
$datetime_now = $input_array["datetime_now"];



$check_process = "insert" ; 
if ($comment_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_comment_reply
where 		system_delete = 'none'
and			comment_id = '$comment_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$comment_id = $result_array["comment_id"];
} ///
} ///




/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_comment_reply ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "reply" ;
$input_idnow =  $cmd_check_record + 1 ; 
$comment_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_comment_reply ( 
comment_id , 
system_id , 
data_id , 
member_id , 
stat_delete , 
option_reply_comment_id , 

option_order , 
option_status , 
system_delete , 

user_create , 
ipaddress_post , 
datetime_create 
)
				
values (
'$comment_id'  , 
'$system_id'  , 
'$data_id'  , 
'$member_id'  , 
'0'  , 
'$option_reply_comment_id'  , 

'$option_order'  , 
'on'  , 
'none'  , 

'$user_post'  , 
'$ipaddress_post'  , 
'$datetime_now'  
)									
 ";		
 
//// print $sql_command ; 
 
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 





if ($option_approve != "" ) { $sql_option_approve = " option_approve = '$option_approve' ,   " ; }


/// update start
$sql_command="  
update   app_comment_reply  

set  
comment_topic = '$comment_topic' ,
comment_detail = '$comment_detail' ,
comment_postname = '$comment_postname' ,

comment_image_mini = '$comment_image_mini' ,
comment_image = '$comment_image' ,

$sql_option_approve

option_status = '$option_status'  , 

user_update = '$user_post'  , 
ipaddress_update = '$ipaddress_post'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			comment_id = '$comment_id'
 "; 
 
/// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"comment_id"=>"$comment_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$comment_id = $input_array["comment_id"]; 
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($comment_id != "" ) {  /// check id
$sql_command = "	
update  app_comment_reply   

set    
option_status = '$option_status' , 
datetime_update = '$datetime_now'

where  comment_id = '$comment_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"comment_id"=>"$comment_id" , 
);
return $result_return ;	
		
} /// 









/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$comment_id = $input_array["comment_id"]; 

$user_post = $input_array["user_post"];
$ipaddress_post = $input_array["ipaddress_post"];
$datetime_now = $input_array["datetime_now"];


if ($comment_id != "" ) { 
$sql_command = "	
update  	app_comment_reply   
set    	
system_delete = 'delete'   , 

user_delete = '$user_post'  , 
ipaddress_delete = '$ipaddress_post'  , 
datetime_delete = '$datetime_now'

where  
comment_id = '$comment_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"comment_id"=>"$comment_id" , 
);
return $result_return ;	
		
} ///  end function





function  function_delete_byroot($input_array){	

$category_id_root = $input_array["category_id_root"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($category_id_root != "" ) { 
$sql_command = "	
update  	app_comment_reply   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
category_id_root = '$category_id_root'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"category_id_root"=>"$category_id_root" , 
);
return $result_return ;	
		
} ///  end function

	
	
	

}///// class  eva_criteria{	
?>