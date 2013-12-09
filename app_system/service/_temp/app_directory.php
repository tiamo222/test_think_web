<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_directory
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_directory.inc.php
 */

class  app_directory{	
				
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
function app_directory(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

app_directory

directory_id
category_id
directory_type
directory_name
directory_des
directory_detail
directory_keyword
directory_url_website
directory_url_linkback
directory_location
directory_map_code
directory_image_mini
suggest_comment

contact_company
contact_name
contact_email
contact_phone
contact_address

stat_view
stat_reply
stat_delete
option_order
option_show_phone
option_show_email
option_recommend
option_reply
option_approve
option_status
system_delete

ipaddress_post
ipaddress_update
ipaddress_delete
user_create
user_update
user_delete
datetime_create
datetime_update
datetime_view
datetime_delete


*/




/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_countbyset
*/
function function_countbyset($input_array){

$sql_other = $input_array["sql_other"];
$sql_joint_table = $input_array["sql_joint_table"];
$sql_joint_select = $input_array["sql_joint_select"];
$sql_joint_where = $input_array["sql_joint_where"];


$category_id = $input_array["category_id"];
$directory_type = $input_array["directory_type"];
$option_recommend = $input_array["option_recommend"];
$option_reply = $input_array["option_reply"];
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"];


//// sql command
if ($category_id != "" ) 					{ $sql_category_id 					=	" and		app_directory.category_id = '$category_id' " ; }
if ($directory_type != "" ) 				{ $sql_directory_type 				=	" and		app_directory.directory_type = '$directory_type' " ; }
if ($option_recommend != "" )  		{ $sql_option_recommend 		=	" and		app_directory.option_recommend = '$option_recommend' " ; }
if ($option_reply != "" )  					{ $sql_option_reply 				=	" and		app_directory.option_reply = '$option_reply' " ; }
if ($option_approve != "" )  				{ $sql_option_approve 			=	" and		app_directory.option_approve = '$option_approve' " ; }
if ($option_status != "" )  				{ $sql_option_status 				=	" and		app_directory.option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_directory  $sql_joint_table 
where			app_directory.system_delete = 'none'  

$sql_category_id
$sql_directory_type
$sql_option_recommend
$sql_option_reply
$sql_option_approve
$sql_option_status

$sql_joint_where
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
if ($sql_orderby == "") 	{ $sql_orderby 	=  " order by 	app_directory.id  DESC " ; }
$sql_joint_table = $input_array["sql_joint_table"];
$sql_joint_select = $input_array["sql_joint_select"];
$sql_joint_where = $input_array["sql_joint_where"];


$category_id = $input_array["category_id"];
$directory_type = $input_array["directory_type"];
$option_recommend = $input_array["option_recommend"];
$option_reply = $input_array["option_reply"];
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"];


//// sql command
if ($category_id != "") 					{ $sql_category_id 					=	" and		app_directory.category_id = '$category_id' " ; }
if ($directory_type != "") 				{ $sql_directory_type 				=	" and		app_directory.directory_type = '$directory_type' " ; }
if ($option_recommend != "")  		{ $sql_option_recommend 		=	" and		app_directory.option_recommend = '$option_recommend' " ; }
if ($option_reply != "")  					{ $sql_option_reply 				=	" and		app_directory.option_reply = '$option_reply' " ; }
if ($option_approve != "")  				{ $sql_option_approve 			=	" and		app_directory.option_approve = '$option_approve' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		app_directory.option_status = '$option_status' " ; }


$sql_command = "
select			* $sql_joint_select
from 				app_directory		$sql_joint_table
where 			app_directory.system_delete = 'none' 

$sql_category_id
$sql_directory_type
$sql_option_recommend
$sql_option_reply
$sql_option_approve
$sql_option_status

$sql_joint_where
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

$directory_id = $input_array["directory_id"];

//// sql command
if ($directory_id != "" ){ 

$sql_command = "
select 		* 
from			app_directory
where		system_delete= 'none'
and			directory_id = '$directory_id'

";	
$result_array = $this->db->GetRow($sql_command);

} ///directory_id

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
$directory_id = $input_array["directory_id"]; 
$category_id = $input_array["category_id"]; 
$directory_type = $input_array["directory_type"]; 

$directory_name = $input_array["directory_name"]; 
$directory_des = $input_array["directory_des"]; 
$directory_detail = $input_array["directory_detail"]; 
$directory_keyword = $input_array["directory_keyword"]; 
$directory_location = $input_array["directory_location"]; 

$directory_name_lang2 = $input_array["directory_name_lang2"]; 
$directory_des_lang2 = $input_array["directory_des_lang2"]; 
$directory_detail_lang2 = $input_array["directory_detail_lang2"]; 
$directory_keyword_lang2 = $input_array["directory_keyword_lang2"]; 
$directory_location_lang2 = $input_array["directory_location_lang2"]; 

$directory_name_lang3 = $input_array["directory_name_lang3"]; 
$directory_des_lang3 = $input_array["directory_des_lang3"]; 
$directory_detail_lang3 = $input_array["directory_detail_lang3"]; 
$directory_keyword_lang3 = $input_array["directory_keyword_lang3"]; 
$directory_location_lang3 = $input_array["directory_location_lang3"]; 

$directory_name_lang4 = $input_array["directory_name_lang4"]; 
$directory_des_lang4 = $input_array["directory_des_lang4"]; 
$directory_detail_lang4 = $input_array["directory_detail_lang4"]; 
$directory_keyword_lang4 = $input_array["directory_keyword_lang4"]; 
$directory_location_lang4 = $input_array["directory_location_lang4"]; 

$directory_name_lang5 = $input_array["directory_name_lang5"]; 
$directory_des_lang5 = $input_array["directory_des_lang5"]; 
$directory_detail_lang5 = $input_array["directory_detail_lang5"]; 
$directory_keyword_lang5 = $input_array["directory_keyword_lang5"]; 
$directory_location_lang5 = $input_array["directory_location_lang5"]; 





$directory_url_website = $input_array["directory_url_website"]; 
$directory_url_linkback = $input_array["directory_url_linkback"]; 
$directory_map_code = $input_array["directory_map_code"]; 
$directory_image_mini = $input_array["directory_image_mini"]; 
$directory_image = $input_array["directory_image"]; 
$suggest_comment = $input_array["suggest_comment"]; 

$contact_company = $input_array["contact_company"]; 
$contact_name = $input_array["contact_name"]; 
$contact_email = $input_array["contact_email"]; 
$contact_phone = $input_array["contact_phone"]; 
$contact_address = $input_array["contact_address"]; 

$stat_view = $input_array["stat_view"]; 
$stat_reply = $input_array["stat_reply"]; 
$stat_delete = $input_array["stat_delete"]; 


$option_order = $input_array["option_order"]; 
$option_show_phone  = $input_array["option_show_phone"];
$option_show_email  = $input_array["option_show_email"];
$option_recommend  = $input_array["option_recommend"];
$option_reply = $input_array["option_reply"]; 
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"];

$ipaddress_update = $input_array["ipaddress_update"]; 
$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];




//// sql config




$check_process = "insert" ; 
if ($directory_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_directory
where 		system_delete = 'none'
and			directory_id = '$directory_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$directory_id = $result_array["directory_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_directory ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "dir" ;
$input_idnow =  $cmd_check_record + 1 ; 
$directory_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_directory ( 
directory_id , 
directory_type , 

stat_view , 
stat_reply , 
stat_delete , 
option_order ,

option_show_phone , 
option_show_email , 
option_recommend , 
option_reply , 
option_approve , 
option_status , 

system_delete , 
ipaddress_post , 
user_create , 
datetime_create 
)
				
values (
'$directory_id'  , 
'$directory_type'  , 

'0'  , 
'0'  , 
'0'  , 
'0'  , 

'none'  , 
'none'  , 
'none'  , 
'none'  , 
'none'  , 
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




/// str_replace($search,$replace,$string) 
/*
$vowels = array("", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$directory_name = str_replace($vowels, "", "Hello World of PHP")."<br>";
$directory_name = str_replace($search,$replace,$string) 
*/




/// update start
$sql_command="  
update   app_directory  

set  
category_id = '$category_id' ,
directory_type = '$directory_type' ,

directory_name = '$directory_name' ,
directory_des = '$directory_des' ,
directory_detail = '$directory_detail' ,
directory_keyword = '$directory_keyword' ,
directory_location = '$directory_location' ,

directory_name_lang2 = '$directory_name_lang2' ,
directory_des_lang2 = '$directory_des_lang2' ,
directory_detail_lang2 = '$directory_detail_lang2' ,
directory_keyword_lang2 = '$directory_keyword_lang2' ,
directory_location_lang2 = '$directory_location_lang2' ,

directory_name_lang3 = '$directory_name_lang3' ,
directory_des_lang3 = '$directory_des_lang3' ,
directory_detail_lang3 = '$directory_detail_lang3' ,
directory_keyword_lang3 = '$directory_keyword_lang3' ,
directory_location_lang3 = '$directory_location_lang3' ,

directory_name_lang4 = '$directory_name_lang4' ,
directory_des_lang4 = '$directory_des_lang4' ,
directory_detail_lang4 = '$directory_detail_lang4' ,
directory_keyword_lang4 = '$directory_keyword_lang4' ,
directory_location_lang4 = '$directory_location_lang4' ,

directory_name_lang5 = '$directory_name_lang5' ,
directory_des_lang5 = '$directory_des_lang5' ,
directory_detail_lang5 = '$directory_detail_lang5' ,
directory_keyword_lang5 = '$directory_keyword_lang5' ,
directory_location_lang5 = '$directory_location_lang5' ,



directory_url_website = '$directory_url_website' ,
directory_url_linkback = '$directory_url_linkback' ,
directory_map_code = '$directory_map_code' ,
directory_image_mini = '$directory_image_mini' ,
directory_image = '$directory_image' ,
suggest_comment = '$suggest_comment' ,

contact_company = '$contact_company' ,
contact_name = '$contact_name' ,
contact_email = '$contact_email' ,
contact_phone = '$contact_phone' ,
contact_address = '$contact_address'  ,  

option_order = '$option_order'  , 
option_show_phone = '$option_show_phone'  , 
option_show_email = '$option_show_email'  , 
option_recommend = '$option_recommend'  , 
option_reply = '$option_reply'  , 
option_approve = '$option_approve'  , 
option_status = '$option_status'  , 

ipaddress_update = '$ipaddress_update'  , 
user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			directory_id = '$directory_id'
 "; 
 
/// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }
$result_return = array(
"show_status"=>"$show_status" , 
"directory_id"=>"$directory_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$directory_id = $input_array["directory_id"]; 

$option_order = $input_array["option_order"];
$option_recommend  = $input_array["option_recommend"];
$option_reply = $input_array["option_reply"];
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($directory_id != "" ) {  /// check id
$sql_command = "	
update  app_directory   

set    
option_order = '$option_order' , 
option_recommend = '$option_recommend' , 
option_reply = '$option_reply' , 
option_approve = '$option_approve' , 
option_status = '$option_status' , 
datetime_update = '$datetime_now'

where  directory_id = '$directory_id'    
";		

/// print "$sql_command <br><br>"; 
$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }
$result_return = array(
"show_status"=>"$show_status" , 
"directory_id"=>"$directory_id" , 
);
return $result_return ;	
		
} /// 






function  function_update_stat($input_array){	

$directory_id = $input_array["directory_id"];
$stat_view = $input_array["stat_view"];
$stat_reply = $input_array["stat_reply"];
$datetime_now = $input_array["datetime_now"]; 


if ($directory_id != "" ) { 
/////////////// stat_view
if ($stat_view == ""  or  $stat_view == "0"  ) {
$sql_command = "
select 		stat_view 
from			app_directory
where		directory_id = '$directory_id'  
";	
$result_array = $this->db->GetRow($sql_command);
$stat_view = $result_array["stat_view"];
}


$stat_view = $stat_view + 1 ; 

$sql_command = "	
update 	 	app_directory   
set    	
stat_view = '$stat_view'   , 
stat_reply = '$stat_reply'   , 
datetime_view = '$datetime_now'

where  
directory_id = '$directory_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
/// "show_status"=>"$show_status" , 
"directory_id"=>"$directory_id" , 
"stat_view"=>"$stat_view" , 
);
return $result_return ;	
		
} ///  end function










/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$directory_id = $input_array["directory_id"]; 
$ipaddress_delete = $input_array["ipaddress_delete"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($directory_id != "" ) { 
$sql_command = "	
update  	app_directory   
set    	
system_delete = 'delete'  , 
ipaddress_delete = '$ipaddress_delete'   , 
datetime_delete = '$datetime_now'

where  
directory_id = '$directory_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"directory_id"=>"$directory_id" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>