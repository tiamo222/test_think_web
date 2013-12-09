<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_video
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_video.inc.php
 */

class  app_video{	
				
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
function app_video(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

//////////////////////////////////////////

app_video

video_id
category_id
video_name
video_des
video_detail

video_keyword
video_type
video_code
video_filename
video_image_mini
stat_view
stat_reply
stat_delete

option_order
option_recommend
option_reply
option_approve
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

$sql_other 		= $input_array["sql_other"];

$system_id 		= $input_array["system_id"];
$ref_id 				= $input_array["ref_id"];
$category_id 		= $input_array["category_id"];
$option_recommend 	= $input_array["option_recommend"];
$option_status 	= $input_array["option_status"];



//// sql command
if ($system_id != "") 						{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($ref_id != "") 							{ $sql_ref_id 							=	" and		ref_id = '$ref_id' " ; }
if ($category_id != "") 					{ $sql_category_id 					=	" and		category_id = '$category_id' " ; }
if ($option_recommend != "")  		{ $sql_option_recommend 		=	" and		option_recommend = '$option_recommend' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_video
where			system_delete = 'none'  

$sql_ref_id
$sql_category_id
$sql_option_recommend
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

$set_pager_limit 		= $input_array["set_pager_limit"];
$set_pager_start 		= $input_array["set_pager_start"];
if ($set_pager_limit == "") {$set_pager_limit = 10000 ; }
if ($set_pager_start == "") {$set_pager_start = 0 ; }


$sql_other = $input_array["sql_other"];
$sql_orderby = $input_array["sql_orderby"];
if ($sql_orderby == "") { $sql_orderby =  " order by 	id  DESC " ; }


$system_id 		= $input_array["system_id"];
$ref_id 				= $input_array["ref_id"];
$category_id 		= $input_array["category_id"];
$option_recommend 	= $input_array["option_recommend"];
$option_status 	= $input_array["option_status"];

//// sql command
if ($system_id != "") 						{ $sql_system_id 			=	" and		system_id = '$system_id' " ; }
if ($ref_id != "") 							{ $sql_ref_id 					=	" and		ref_id = '$ref_id' " ; }
if ($category_id != "") 					{ $sql_category_id 			=	" and		category_id = '$category_id' " ; }
if ($option_recommend != "")  		{ $sql_option_recommend 		=	" and		option_recommend = '$option_recommend' " ; }
if ($option_status != "")  					{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_video
where 			system_delete = 'none' 

$sql_ref_id
$sql_category_id 
$sql_option_recommend
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

$video_id = $input_array["video_id"];

//// sql command
if ($video_id != "") 		{$sql_video_id 	=	" and		video_id = '$video_id' " ; }

$sql_command = "
select 		* 
from			app_video
where		system_delete= 'none'

$sql_video_id

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
$video_id = $input_array["video_id"]; 
$ref_id = $input_array["ref_id"]; 
$category_id = $input_array["category_id"]; 

$video_name = $input_array["video_name"]; 
$video_des = $input_array["video_des"]; 
$video_detail = $input_array["video_detail"]; 

$video_keyword = $input_array["video_keyword"]; 
$video_source_name = $input_array["video_source_name"]; 
$video_source_url = $input_array["video_source_url"]; 


$video_type = $input_array["video_type"]; 
$video_code = $input_array["video_code"]; 
$video_filename = $input_array["video_filename"]; 
$video_filename_ftp = $input_array["video_filename_ftp"]; 
$video_image_mini = $input_array["video_image_mini"]; 

$stat_view = $input_array["stat_view"]; 
$stat_reply = $input_array["stat_reply"]; 
$stat_delete = $input_array["stat_delete"]; 

$option_order = $input_array["option_order"]; 
$option_recommend = $input_array["option_recommend"]; 
$option_reply = $input_array["option_reply"]; 
$option_approve = $input_array["option_approve"]; 
$option_status = $input_array["option_status"];

$ipaddress_update = $input_array["ipaddress_update"]; 
$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];




//// sql config

$check_process = "insert" ; 
if ($video_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_video
where 		system_delete = 'none'
and			video_id = '$video_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$video_id = $result_array["video_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_video ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "video" ;
$input_idnow =  $cmd_check_record + 1 ; 
$video_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_video ( 
video_id , 
ref_id , 

stat_view , 
stat_reply , 
stat_delete , 

option_status , 
system_delete , 
ipaddress_post , 
user_create , 
datetime_create 
)
				
values (
'$video_id'  , 
'$ref_id'  , 

'0'  , 
'0'  , 
'0'  , 

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
update   app_video  

set  
category_id = '$category_id' ,

video_name = '$video_name' ,
video_des = '$video_des' ,
video_detail = '$video_detail' ,
video_keyword = '$video_keyword' ,
video_source_name = '$video_source_name' ,
video_source_url = '$video_source_url' ,


video_type = '$video_type' ,
video_code = '$video_code' ,
video_filename_ftp = '$video_filename_ftp' ,
video_filename = '$video_filename' ,
video_image_mini = '$video_image_mini' ,


option_order = '$option_order'  , 
option_recommend = '$option_recommend'  , 
option_reply = '$option_reply'  , 
option_approve = '$option_approve'  , 
option_status = '$option_status'  , 

ipaddress_update = '$ipaddress_update'  , 
user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			video_id = '$video_id'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"video_id"=>"$video_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$video_id = $input_array["video_id"]; 

$option_order = $input_array["option_order"];
$option_recommend = $input_array["option_recommend"];
$option_reply = $input_array["option_reply"];
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"]; 

$datetime_now = $input_array["datetime_now"]; 



if ($video_id != "" ) {  /// check id
$sql_command = "	
update  app_video   

set    
option_order = '$option_order' , 
option_recommend = '$option_recommend' , 
option_reply = '$option_reply' , 
option_approve = '$option_approve' , 
option_status = '$option_status' , 
datetime_update = '$datetime_now'

where  video_id = '$video_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"video_id"=>"$video_id" , 
);
return $result_return ;	
		
} /// 








function  function_update_stat($input_array){	

$video_id = $input_array["video_id"];
$stat_view = $input_array["stat_view"];
$stat_reply = $input_array["stat_reply"];
$datetime_now = $input_array["datetime_now"]; 


if ($video_id != "" ) { 
/////////////// stat_view
if ($stat_view == ""  or  $stat_view == "0"  ) {
$sql_command = "
select 		stat_view 
from			app_video
where		video_id = '$video_id'  
";	
$result_array = $this->db->GetRow($sql_command);
$stat_view = $result_array["stat_view"];
}


$stat_view = $stat_view + 1 ; 

$sql_command = "	
update 	 	app_video   
set    	
stat_view = '$stat_view'   , 
stat_reply = '$stat_reply'   , 
datetime_view = '$datetime_now'

where  
video_id = '$video_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"video_id"=>"$video_id" , 
"stat_view"=>"$stat_view" , 
);
return $result_return ;	
		
} ///  end function









/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$video_id = $input_array["video_id"]; 
$ipaddress_delete = $input_array["ipaddress_delete"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($video_id != "" ) { 
$sql_command = "	
update  	app_video   
set    	
system_delete = 'delete'   , 
ipaddress_delete = '$ipaddress_delete'   , 
datetime_delete = '$datetime_now'

where  
video_id = '$video_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"video_id"=>"$video_id" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>