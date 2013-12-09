<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_member_mygallery_picture
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_member_mygallery_picture.inc.php
 */

class  app_member_mygallery_picture{	
				
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
function app_member_mygallery_picture(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

//////////////////////////////////////////
app_member_mygallery_picture

picture_id
gallery_id
member_id
picture_name
picture_des
picture_image_mini
picture_image
post_ipaddress
stat_view
stat_reply
option_cover
option_order
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

$gallery_id 		= $input_array["gallery_id"];
$member_id 		= $input_array["member_id"];
$option_approve = $input_array["option_approve"];
$option_status 	= $input_array["option_status"];

//// sql command
if ($gallery_id != "") 						{ $sql_gallery_id 					=	" and		gallery_id = '$gallery_id' " ; }
if ($member_id != "") 					{ $sql_member_id 					=	" and		member_id = '$member_id' " ; }
if ($option_approve != "")  				{ $sql_option_approve 				=	" and		option_approve = '$option_approve' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_member_mygallery_picture
where			system_delete = 'none'  

$sql_gallery_id
$sql_member_id
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

$set_pager_limit 		= $input_array["set_pager_limit"];
$set_pager_start 		= $input_array["set_pager_start"];
if ($set_pager_limit == "") {$set_pager_limit = 10000 ; }
if ($set_pager_start == "") {$set_pager_start = 0 ; }


$sql_other = $input_array["sql_other"];
$sql_orderby = $input_array["sql_orderby"];
if ($sql_orderby == "") { $sql_orderby =  " order by 	id  DESC " ; }


$gallery_id 		= $input_array["gallery_id"];
$member_id 		= $input_array["member_id"];
$option_approve = $input_array["option_approve"];
$option_status 	= $input_array["option_status"];

//// sql command
if ($gallery_id != "") 						{ $sql_gallery_id 					=	" and		gallery_id = '$gallery_id' " ; }
if ($member_id != "") 					{ $sql_member_id 					=	" and		member_id = '$member_id' " ; }
if ($option_approve != "")  				{ $sql_option_approve 				=	" and		option_approve = '$option_approve' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_member_mygallery_picture
where 			system_delete = 'none' 

$sql_gallery_id
$sql_member_id
$sql_option_approve
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

$picture_id = $input_array["picture_id"];

//// sql command
if ($picture_id != "") 		{$sql_picture_id 	=	" and		picture_id = '$picture_id' " ; }

$sql_command = "
select 		* 
from			app_member_mygallery_picture
where		system_delete= 'none'

$sql_picture_id

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
$picture_id = $input_array["picture_id"]; 
$category_id = $input_array["category_id"]; 
$gallery_id = $input_array["gallery_id"]; 
$member_id = $input_array["member_id"]; 

$picture_name = $input_array["picture_name"]; 
$picture_des = $input_array["picture_des"]; 
$picture_image_mini = $input_array["picture_image_mini"]; 
$picture_image = $input_array["picture_image"]; 


$stat_view = $input_array["stat_view"]; 
$stat_reply = $input_array["stat_reply"]; 
$stat_delete = $input_array["stat_delete"]; 

$option_new = $input_array["option_new"]; 
$option_cover = $input_array["option_cover"]; 
$option_recommend = $input_array["option_recommend"]; 
$option_order = $input_array["option_order"]; 
$option_reply = $input_array["option_reply"]; 
$option_approve = $input_array["option_approve"]; 
$option_status = $input_array["option_status"];

$ipaddress_post = $input_array["ipaddress_post"]; 
$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];


//// sql config

$check_process = "insert" ; 
if ($picture_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_member_mygallery_picture
where 		system_delete = 'none'
and			picture_id = '$picture_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$picture_id = $result_array["picture_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_member_mygallery_picture ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "mypic" ;
$input_idnow =  $cmd_check_record + 1 ; 
$picture_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_member_mygallery_picture ( 
picture_id , 
member_id , 

stat_view , 
stat_reply , 
stat_delete , 


option_new , 
option_approve , 
option_status , 

ipaddress_post , 
system_delete , 
user_create , 
datetime_create 
)
				
values (
'$picture_id'  , 
'$member_id'  , 

'0'  , 
'0'  , 
'0'  , 

'new'  , 
'approve'  , 
'on'  , 

'$ipaddress_post'  , 
'none'  , 
'$user_update'  , 
'$datetime_now'  
)									
 ";		
 
//// print $sql_command ; 
 
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 




if ($gallery_id != "" ) 					{ $sql_gallery_id = "  gallery_id = '$gallery_id' ,    "; }
if ($picture_image != "" ) 			{ $sql_picture_image = "  picture_image = '$picture_image'  ,     "; }
if ($picture_image_mini != "" )		{ $sql_picture_image_mini = "  picture_image_mini = '$picture_image_mini'  ,    "; }

if ($option_new != "" ) 				{ $sql_option_new = "  option_new = '$option_new'  ,    "; }
if ($option_order != "" ) 				{ $sql_option_order = "  option_order = '$option_order'  ,    "; }
if ($option_cover != "" )				{ $sql_option_cover = "  option_cover = '$option_cover'  ,    "; }
if ($option_status != "" ) 				{ $sql_option_status = "  option_status = '$option_status'  ,    "; }

if ($option_recommend != "" )		{ $sql_option_recommend = "  option_recommend = '$option_recommend'  ,   "; }
if ($option_reply != "" ) 				{ $sql_option_reply = "  option_reply = '$option_reply'  ,  "; }
if ($option_approve != "" ) 			{ $sql_option_approve = "  option_approve = '$option_approve'  ,   "; }

/// update start
$sql_command="  
update   app_member_mygallery_picture  

set  
$sql_gallery_id
category_id = '$category_id' ,

picture_name = '$picture_name' ,
picture_des = '$picture_des' ,

$sql_picture_image
$sql_picture_image_mini

$sql_option_new
$sql_option_order
$sql_option_cover
$sql_option_status

$sql_option_recommend
$sql_option_reply
$sql_option_approve


ipaddress_update = '$ipaddress_post'  , 
user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			picture_id = '$picture_id'
 "; 

//// print $sql_command ; 

$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"picture_id"=>"$picture_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$picture_id = $input_array["picture_id"]; 
$picture_name = $input_array["picture_name"]; 
$picture_des = $input_array["picture_des"]; 

$option_order = $input_array["option_order"];
$option_cover = $input_array["option_cover"];
$option_recommend = $input_array["option_recommend"];
$option_reply = $input_array["option_reply"];
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"]; 

$datetime_now = $input_array["datetime_now"]; 



if ($picture_id != "" ) {  /// check id
$sql_command = "	
update  app_member_mygallery_picture   

set    
picture_name = '$picture_name' , 
picture_des = '$picture_des' , 

option_order = '$option_order' , 
option_cover = '$option_cover' , 
option_recommend = '$option_recommend' , 
option_reply = '$option_reply' , 
option_approve = '$option_approve' , 
option_status = '$option_status' , 
datetime_update = '$datetime_now'

where  picture_id = '$picture_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"picture_id"=>"$picture_id" , 
);
return $result_return ;	
		
} /// 







function  function_update_stat($input_array){	

$picture_id = $input_array["picture_id"];
$stat_reply = $input_array["stat_reply"];
$datetime_now = $input_array["datetime_now"]; 


if ($picture_id != "" ) { 

/////////////// stat_view
$sql_command = "
select 		stat_view 
from			app_member_mygallery_picture
where		picture_id = '$picture_id'  
";	
$result_array = $this->db->GetRow($sql_command);
$stat_view = $result_array["stat_view"];


$stat_view = $stat_view + 1 ; 

$sql_command = "	
update  		app_member_mygallery_picture   
set    	
stat_view = '$stat_view'   , 
stat_reply = '$stat_reply'   , 
datetime_view = '$datetime_now'

where  
picture_id = '$picture_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
/// "show_status"=>"$show_status" , 
"picture_id"=>"$picture_id" , 
"stat_view"=>"$stat_view" , 
);
return $result_return ;	
		
} ///  end function









/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$picture_id = $input_array["picture_id"]; 
$ipaddress_post = $input_array["ipaddress_post"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($picture_id != "" ) { 
$sql_command = "	
update  	app_member_mygallery_picture   
set    	
system_delete = 'delete'   , 
ipaddress_delete = '$ipaddress_post'   , 
datetime_delete = '$datetime_now'

where  
picture_id = '$picture_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"picture_id"=>"$picture_id" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>