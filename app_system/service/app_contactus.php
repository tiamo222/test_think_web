<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_contactus
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_contactus.inc.php
 */

class  app_contactus{	
				
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
function app_contactus(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

app_contactus

contact_id
content_name
content_des
content_detail
content_image_mini
content_source_name
content_source_url

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

$contact_type = $input_array["contact_type"];
$category_id = $input_array["category_id"];

$option_read = $input_array["option_read"];
$option_reply = $input_array["option_reply"];
$option_status = $input_array["option_status"];


//// sql command
if ($contact_type != "") 					{ $sql_contact_type 				=	" and		contact_type = '$contact_type' " ; }
if ($category_id != "") 					{ $sql_category_id 					=	" and		category_id = '$category_id' " ; }

if ($option_read != "")  					{ $sql_option_read 				=	" and		option_read = '$option_read' " ; }
if ($option_reply != "")  					{ $sql_option_reply 				=	" and		option_reply = '$option_reply' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_contactus
where			system_delete = 'none'  

$sql_contact_type
$sql_category_id

$sql_option_read
$sql_option_reply
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


$contact_type = $input_array["contact_type"];
$category_id = $input_array["category_id"];

$option_read = $input_array["option_read"];
$option_reply = $input_array["option_reply"];
$option_status = $input_array["option_status"];


//// sql command
if ($contact_type != "") 					{ $sql_contact_type 				=	" and		contact_type = '$contact_type' " ; }
if ($category_id != "") 					{ $sql_category_id 					=	" and		category_id = '$category_id' " ; }

if ($option_read != "")  					{ $sql_option_read 				=	" and		option_read = '$option_read' " ; }
if ($option_reply != "")  					{ $sql_option_reply 				=	" and		option_reply = '$option_reply' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_contactus
where 			system_delete = 'none' 

$sql_contact_type 
$sql_category_id 
$sql_option_read
$sql_option_reply
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

$contact_id = $input_array["contact_id"];

//// sql command
if ($contact_id != "") 		{$sql_contact_id 	=	" and		contact_id = '$contact_id' " ; }

$sql_command = "
select 		* 
from			app_contactus
where		system_delete= 'none'

$sql_contact_id

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
$contact_id = $input_array["contact_id"]; 
$category_id = $input_array["category_id"]; 
$contact_type = $input_array["contact_type"]; 

$contact_subject = $input_array["contact_subject"]; 
$contact_des = $input_array["contact_des"]; 
$contact_detail = $input_array["contact_detail"]; 

$contact_name = $input_array["contact_name"]; 
$contact_phone = $input_array["contact_phone"]; 
$contact_mobile = $input_array["contact_mobile"]; 
$contact_email = $input_array["contact_email"]; 
$contact_address  = $input_array["contact_address"]; 
$contact_by_member_id  = $input_array["contact_by_member_id"]; 

$ipaddress_post = $input_array["ipaddress_post"]; 
$ipaddress_update = $input_array["ipaddress_update"]; 
$ipaddress_delete = $input_array["ipaddress_delete"]; 

$option_read = $input_array["option_read"]; 
$option_reply = $input_array["option_reply"]; 
$option_status = $input_array["option_status"];

$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];




//// sql config




$check_process = "insert" ; 
if ($contact_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_contactus
where 		system_delete = 'none'
and			contact_id = '$contact_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
} ///
} ///



/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_contactus ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "contact" ;
$input_idnow =  $cmd_check_record + 1 ; 
$contact_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_contactus ( 
contact_id , 
contact_type , 

option_read , 
option_reply , 
option_status , 

ipaddress_post , 
system_delete , 
user_create , 
datetime_create 
)
				
values (
'$contact_id'  , 
'$contact_type'  , 

'none'  , 
'none'  , 
'on'  , 

'$ipaddress_post'  , 
'none'  , 
'$user_update'  , 
'$datetime_now'  
)									
 ";		
 
/// print $sql_command ; 
 
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 




/// update start
$sql_command="  
update   app_contactus  

set  
category_id = '$category_id' ,
contact_type = '$contact_type' ,

contact_subject = '$contact_subject' ,
contact_des = '$contact_des' ,
contact_detail = '$contact_detail' ,
contact_name = '$contact_name' ,
contact_phone = '$contact_phone' ,
contact_mobile = '$contact_mobile' ,
contact_email = '$contact_email' ,
contact_address = '$contact_address' ,
contact_by_member_id  = '$contact_by_member_id' ,


option_read  = '$option_read' ,
option_reply  = '$option_reply' ,
option_status = '$option_status'  , 

ipaddress_update  = '$ipaddress_update'  , 
user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			contact_id = '$contact_id'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"contact_id"=>"$contact_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$contact_id = $input_array["contact_id"]; 

$option_read = $input_array["option_read"];
$option_reply = $input_array["option_reply"];
$option_status = $input_array["option_status"]; 

$user_update = $input_array["user_update"]; 
$ipaddress_update = $input_array["ipaddress_update"]; 
$datetime_now = $input_array["datetime_now"]; 




if ($contact_id != "" ) {  /// check id
$sql_command = "	
update  app_contactus   

set    
option_read = '$option_read' , 
option_reply = '$option_reply' , 
option_status = '$option_status' , 

user_update = '$user_update' , 
ipaddress_update = '$ipaddress_update' , 
datetime_update = '$datetime_now'

where  contact_id = '$contact_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"contact_id"=>"$contact_id" , 
);
return $result_return ;	
		
} /// 







/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$contact_id = $input_array["contact_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($contact_id != "" ) { 
$sql_command = "	
update  	app_contactus   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
contact_id = '$contact_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"contact_id"=>"$contact_id" , 
);
return $result_return ;	
		
} ///  end function





function  function_delete_bycase($input_array){	

$category_id = $input_array["category_id"]; 
$contact_type = $input_array["contact_type"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($category_id != ""  or  $contact_type != ""  ) { 

if ($category_id != "" ) 	{ $sql_category_id = " category_id = '$category_id' "; }
if ($contact_type != "" ) 	{ $sql_contact_type = " contact_type = '$contact_type' "; }

$sql_command = "	
update  	app_contactus   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
$sql_category_id 
$sql_contact_type 

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