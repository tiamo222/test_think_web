<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_webboard
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_webboard.inc.php
 */

class  app_webboard{	
				
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
function app_webboard(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

//////////////////////////////////////////

app_webboard

topic_id
category_id
member_id
topic_rate

topic_name
topic_des
topic_detail
topic_image_mini
topic_image
stat_view
stat_reply
stat_delete

option_recommend
option_reply
option_approve
option_status
system_delete
post_ipaddress
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
///$system_id 		= $input_array["system_id"];
$category_id 		= $input_array["category_id"];
$option_highlight 	= $input_array["option_highlight"];
$option_recommend 	= $input_array["option_recommend"];
$option_approve 	= $input_array["option_approve"];
$option_status 	= $input_array["option_status"];

//// sql command
///if ($system_id != "") 						{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($category_id != "") 					{ $sql_category_id 					=	" and		category_id = '$category_id' " ; }
if ($option_highlight != "")  				{ $sql_option_highlight 			=	" and		option_highlight = '$option_highlight' " ; }
if ($option_recommend != "")  		{ $sql_option_recommend 		=	" and		option_recommend = '$option_recommend' " ; }
if ($option_approve != "")  				{ $sql_option_approve 			=	" and		option_approve = '$option_approve' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_webboard
where			system_delete = 'none'  

$sql_category_id
$sql_option_highlight
$sql_option_recommend
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


$system_id 		= $input_array["system_id"];
$category_id 		= $input_array["category_id"];
$option_highlight 	= $input_array["option_highlight"];
$option_recommend 	= $input_array["option_recommend"];
$option_approve 	= $input_array["option_approve"];
$option_status 	= $input_array["option_status"];

//// sql command
if ($system_id != "") 						{ $sql_system_id 			=	" and		system_id = '$system_id' " ; }
if ($category_id != "") 					{ $sql_category_id 			=	" and		category_id = '$category_id' " ; }
if ($option_highlight != "")  				{ $sql_option_highlight 			=	" and		option_highlight = '$option_highlight' " ; }
if ($option_recommend != "")  		{ $sql_option_recommend 			=	" and		option_recommend = '$option_recommend' " ; }
if ($option_approve != "")  				{ $sql_option_approve 	=	" and		option_approve = '$option_approve' " ; }
if ($option_status != "")  					{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_webboard
where 			system_delete = 'none' 

$sql_category_id 
$sql_option_highlight
$sql_option_recommend
$sql_option_approve
$sql_option_status

$sql_other
$sql_orderby

";		

///  print "sql_command = $sql_command ";

$result_array = $this->db->SelectLimit($sql_command,$set_pager_limit,$set_pager_start );
return $result_array ;

} ///////////





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyid
*/
function function_viewbyid($input_array){

$topic_id = $input_array["topic_id"];

//// sql command
if ($topic_id != "") 		{$sql_topic_id 	=	" and		topic_id = '$topic_id' " ; }

$sql_command = "
select 		* 
from			app_webboard
where		system_delete= 'none'

$sql_topic_id

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
$topic_id = $input_array["topic_id"]; 
$category_id = $input_array["category_id"]; 
$member_id = $input_array["member_id"]; 
$topic_rate = $input_array["topic_rate"]; 

$topic_name = $input_array["topic_name"]; 
$topic_des = $input_array["topic_des"]; 
$topic_detail = $input_array["topic_detail"]; 
$topic_postname = $input_array["topic_postname"]; 


$topic_image_mini = $input_array["topic_image_mini"]; 
$topic_image = $input_array["topic_image"]; 

$stat_view = $input_array["stat_view"]; 
$stat_reply = $input_array["stat_reply"]; 
$stat_delete = $input_array["stat_delete"]; 

$option_highlight = $input_array["option_highlight"]; 
$option_recommend = $input_array["option_recommend"]; 
$option_reply = $input_array["option_reply"]; 
$option_approve = $input_array["option_approve"]; 
$option_status = $input_array["option_status"];

$user_post = $input_array["user_post"];
$ipaddress_post = $input_array["ipaddress_post"];
$datetime_now = $input_array["datetime_now"];


//// sql config




$check_process = "insert" ; 
if ($topic_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_webboard
where 		system_delete = 'none'
and			topic_id = '$topic_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$topic_id = $result_array["topic_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_webboard ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "topic" ;
$input_idnow =  $cmd_check_record + 1 ; 
$topic_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_webboard ( 
topic_id , 
member_id , 

stat_view , 
stat_reply , 
stat_delete , 

option_recommend , 
option_reply , 
option_approve , 
option_status , 

system_delete , 
user_create , 
ipaddress_post , 
datetime_create 
)
				
values (
'$topic_id'  , 
'$member_id'  , 

'0'  , 
'0'  , 
'0'  , 

'none'  , 
'reply'  , 
'approve'  , 
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



if ($option_highlight != "" ) 			{ $sql_option_highlight 		= " option_highlight = '$option_highlight'  ,  "; } 
if ($option_recommend != "" ) 	{ $sql_option_recommend 	= " option_recommend = '$option_recommend'  ,   "; } 
if ($option_approve != "" ) 			{ $sql_option_approve 		= " option_approve = '$option_approve'  ,  "; } 




/// update start
$sql_command="  
update   app_webboard  

set  
category_id = '$category_id' ,
member_id = '$member_id' ,
topic_rate = '$topic_rate' ,

topic_name = '$topic_name' ,
topic_des = '$topic_des' ,
topic_detail = '$topic_detail' ,
topic_postname = '$topic_postname' ,

topic_image_mini = '$topic_image_mini' ,
topic_image = '$topic_image' ,

$sql_option_highlight
$sql_option_recommend
$sql_option_approve

option_reply = '$option_reply'  , 
option_status = '$option_status'  , 

user_update = '$user_post'  , 
ipaddress_update = '$ipaddress_post'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			topic_id = '$topic_id'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"topic_id"=>"$topic_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$topic_id = $input_array["topic_id"]; 
///$topic_name = $input_array["topic_name"]; 
///$topic_des = $input_array["topic_des"]; 

$option_highlight = $input_array["option_highlight"]; 
$option_recommend = $input_array["option_recommend"];
$option_reply = $input_array["option_reply"];
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"]; 


$user_post = $input_array["user_post"];
$ipaddress_post = $input_array["ipaddress_post"];
$datetime_now = $input_array["datetime_now"]; 


if ($option_highlight != "" ) 			{ $sql_option_highlight 		= " option_highlight = '$option_highlight'  ,  "; } 
if ($option_recommend != "" ) 	{ $sql_option_recommend 	= " option_recommend = '$option_recommend'  ,   "; } 
if ($option_approve != "" ) 			{ $sql_option_approve 		= " option_approve = '$option_approve'  ,  "; } 


if ($topic_id != "" ) {  /// check id
$sql_command = "	
update  app_webboard   

set    
$sql_option_highlight
$sql_option_approve 
$sql_option_recommend

option_reply = '$option_reply' , 
option_status = '$option_status' , 

user_update = '$user_post'  , 
ipaddress_update = '$ipaddress_post'  , 
datetime_update = '$datetime_now'

where  topic_id = '$topic_id'    
";		

//// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"topic_id"=>"$topic_id" , 
);
return $result_return ;	
		
} /// 










function  function_update_stat($input_array){	

$topic_id = $input_array["topic_id"];
$stat_view = $input_array["stat_view"];
$stat_reply = $input_array["stat_reply"];
$datetime_now = $input_array["datetime_now"]; 


if ($topic_id != "" ) { 
/////////////// stat_view
if ($stat_view == ""  or  $stat_view == "0"  ) {
$sql_command = "
select 		stat_view 
from			app_webboard
where		topic_id = '$topic_id'  
";	
$result_array = $this->db->GetRow($sql_command);
$stat_view = $result_array["stat_view"];
}


$stat_view = $stat_view + 1 ; 

$sql_command = "	
update 	 	app_webboard   
set    	
stat_view = '$stat_view'   , 
stat_reply = '$stat_reply'   , 
datetime_view = '$datetime_now'

where  
topic_id = '$topic_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
/// "show_status"=>"$show_status" , 
"topic_id"=>"$topic_id" , 
"stat_view"=>"$stat_view" , 
);
return $result_return ;	
		
} ///  end function

























/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$topic_id = $input_array["topic_id"]; 

$user_post = $input_array["user_post"];
$ipaddress_post = $input_array["ipaddress_post"];
$datetime_now = $input_array["datetime_now"]; 


if ($topic_id != "" ) { 
$sql_command = "	
update  	app_webboard   
set    	
system_delete = 'delete'   , 

user_delete = '$user_post'  , 
ipaddress_delete = '$ipaddress_post'  , 
datetime_delete = '$datetime_now'

where  
topic_id = '$topic_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"topic_id"=>"$topic_id" , 
);
return $result_return ;	
		
} ///  end function




function  function_delete_bycase($input_array){	

$category_id = $input_array["category_id"]; 

$user_post = $input_array["user_post"];
$ipaddress_post = $input_array["ipaddress_post"];
$datetime_now = $input_array["datetime_now"]; 


if ($category_id != "" ) { 
$sql_command = "	
update  	app_webboard   
set    	
system_delete = 'delete'   , 

user_delete = '$user_post'  , 
ipaddress_delete = '$ipaddress_post'  , 
datetime_delete = '$datetime_now'

where  
category_id = '$category_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"category_id"=>"$category_id" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>