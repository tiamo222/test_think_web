<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_gallery
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_gallery.inc.php
 */

class  app_gallery{	
				
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
function app_gallery(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

app_gallery

gallery_id
system_id
category_id

gallery_name
gallery_des
gallery_detail
gallery_source_name
gallery_source_url
gallery_image_mini

stat_picture
stat_view
stat_reply
stat_delete

option_order
option_reply
option_recommend
option_approve
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
$category_id = $input_array["category_id"];
$option_status = $input_array["option_status"];


//// sql command
if ($system_id != "") 						{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($category_id != "") 					{ $sql_category_id 				=	" and		category_id = '$category_id' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_gallery
where			system_delete = 'none'  

$sql_category_id
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
$category_id = $input_array["category_id"];
$option_status = $input_array["option_status"];

//// sql command
if ($system_id != "") 						{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($category_id != "") 					{ $sql_category_id 					=	" and		category_id = '$category_id' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_gallery
where 			system_delete = 'none' 

$sql_category_id 
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

$gallery_id = $input_array["gallery_id"];

//// sql command
if ($gallery_id != "") 		{$sql_gallery_id 	=	" and		gallery_id = '$gallery_id' " ; }

$sql_command = "
select 		* 
from			app_gallery
where		system_delete= 'none'

$sql_gallery_id

";	

/// print " $sql_command <br><br> ";

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
$gallery_id = $input_array["gallery_id"]; 
$system_id = $input_array["system_id"]; 


$category_id = $input_array["category_id"]; 
$gallery_name = $input_array["gallery_name"]; 
$gallery_des = $input_array["gallery_des"]; 
$gallery_detail = $input_array["gallery_detail"]; 
$gallery_source_name = $input_array["gallery_source_name"]; 
$gallery_source_url = $input_array["gallery_source_url"]; 
$gallery_image_mini = $input_array["gallery_image_mini"]; 
$gallery_path = $input_array["gallery_path"]; 



$stat_picture = $input_array["stat_picture"]; 
$stat_view = $input_array["stat_view"]; 
$stat_reply = $input_array["stat_reply"]; 
$stat_delete = $input_array["stat_delete"]; 

$option_order = $input_array["option_order"]; 
$option_reply = $input_array["option_reply"]; 
$option_recommend = $input_array["option_recommend"]; 
$option_approve = $input_array["option_approve"]; 
$option_status = $input_array["option_status"];

$ipaddress_update = $input_array["ipaddress_update"]; 
$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];




//// sql config




$check_process = "insert" ; 
if ($gallery_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_gallery
where 		system_delete = 'none'
and			gallery_id = '$gallery_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$gallery_id = $result_array["gallery_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_gallery ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "gallery" ;
$input_idnow =  $cmd_check_record + 1 ; 
$gallery_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_gallery ( 
gallery_id , 

stat_picture , 
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
'$gallery_id'  , 

'0'  , 
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
update   app_gallery  

set  
category_id = '$category_id' ,
gallery_name = '$gallery_name' ,
gallery_des = '$gallery_des' ,
gallery_detail = '$gallery_detail' ,
gallery_source_name = '$gallery_source_name' ,
gallery_source_url = '$gallery_source_url' ,
gallery_image_mini = '$gallery_image_mini' ,
gallery_path = '$gallery_path' ,

option_order = '$option_order'  , 
option_reply = '$option_reply'  , 
option_recommend = '$option_recommend'  , 
option_approve = '$option_approve'  , 
option_status = '$option_status'  , 

ipaddress_update = '$ipaddress_update'  , 
user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			gallery_id = '$gallery_id'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"gallery_id"=>"$gallery_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$gallery_id = $input_array["gallery_id"]; 
$gallery_name = $input_array["gallery_name"]; 
$gallery_des = $input_array["gallery_des"]; 

$option_order = $input_array["option_order"];
$option_reply = $input_array["option_reply"];
$option_recommend = $input_array["option_recommend"];
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"]; 

$datetime_now = $input_array["datetime_now"]; 




if ($gallery_id != "" ) {  /// check id
$sql_command = "	
update  app_gallery   

set    
gallery_name = '$gallery_name' , 
gallery_des = '$gallery_des' , 


option_order = '$option_order' , 
option_reply = '$option_reply' , 
option_recommend = '$option_recommend' , 
option_approve = '$option_approve' , 
option_status = '$option_status' , 
datetime_update = '$datetime_now'

where  gallery_id = '$gallery_id'    
";		

//// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"gallery_id"=>"$gallery_id" , 
);
return $result_return ;	
		
} /// 









function  function_update_stat($input_array){	

$gallery_id = $input_array["gallery_id"];
$stat_view = $input_array["stat_view"];
$stat_reply = $input_array["stat_reply"];
$datetime_now = $input_array["datetime_now"]; 


if ($gallery_id != "" ) { 
/////////////// stat_view
if ($stat_view == ""  or  $stat_view == "0"  ) {
$sql_command = "
select 		stat_view 
from			app_gallery
where		gallery_id = '$gallery_id'  
";	
$result_array = $this->db->GetRow($sql_command);
$stat_view = $result_array["stat_view"];
}


$stat_view = $stat_view + 1 ; 

$sql_command = "	
update 	 	app_gallery   
set    	
stat_view = '$stat_view'   , 
stat_reply = '$stat_reply'   , 
datetime_view = '$datetime_now'

where  
gallery_id = '$gallery_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
/// "show_status"=>"$show_status" , 
"gallery_id"=>"$gallery_id" , 
"stat_view"=>"$stat_view" , 
);
return $result_return ;	
		
} ///  end function






/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$gallery_id = $input_array["gallery_id"]; 
$ipaddress_delete = $input_array["ipaddress_delete"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($gallery_id != "" ) { 
$sql_command = "	
update  	app_gallery   
set    	
system_delete = 'delete'   , 
ipaddress_delete = '$ipaddress_delete'   , 
datetime_delete = '$datetime_now'

where  
gallery_id = '$gallery_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"gallery_id"=>"$gallery_id" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>