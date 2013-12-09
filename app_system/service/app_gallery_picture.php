<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_gallery_picture
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_gallery_picture.inc.php
 */

class  app_gallery_picture{	
				
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
function app_gallery_picture(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

//////////////////////////////////////////

app_gallery_picture

picture_id
gallery_id
category_id

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

$system_id 		= $input_array["system_id"];
$gallery_id 		= $input_array["gallery_id"];
$category_id 		= $input_array["category_id"];
$ref_id 				= $input_array["ref_id"];

$option_status 	= $input_array["option_status"];

//// sql command
if ($system_id != "") 						{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($gallery_id != "") 						{ $sql_gallery_id 					=	" and		gallery_id = '$gallery_id' " ; }
if ($category_id != "") 					{ $sql_category_id 					=	" and		category_id = '$category_id' " ; }
if ($ref_id != "") 							{ $sql_ref_id 							=	" and		ref_id = '$ref_id' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_gallery_picture
where			system_delete = 'none'  

$sql_system_id
$sql_gallery_id
$sql_category_id
$sql_ref_id
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
$gallery_id 		= $input_array["gallery_id"];
$category_id 		= $input_array["category_id"];
$ref_id 				= $input_array["ref_id"];
$option_status 	= $input_array["option_status"];

//// sql command
if ($system_id != "") 						{ $sql_system_id 			=	" and		system_id = '$system_id' " ; }
if ($gallery_id != "") 						{ $sql_gallery_id 			=	" and		gallery_id = '$gallery_id' " ; }
if ($category_id != "") 					{ $sql_category_id 			=	" and		category_id = '$category_id' " ; }
if ($ref_id != "") 							{ $sql_ref_id 					=	" and		ref_id = '$ref_id' " ; }
if ($option_status != "")  					{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_gallery_picture
where 			system_delete = 'none' 

$sql_system_id 
$sql_gallery_id
$sql_category_id
$sql_ref_id
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
from			app_gallery_picture
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
$gallery_id = $input_array["gallery_id"]; 
$category_id = $input_array["category_id"]; 
$ref_id = $input_array["ref_id"]; 

$picture_name = $input_array["picture_name"]; 
$picture_des = $input_array["picture_des"]; 

$picture_image_mini = $input_array["picture_image_mini"]; 
$picture_image = $input_array["picture_image"]; 

$post_ipaddress = $input_array["post_ipaddress"]; 
$stat_view = $input_array["stat_view"]; 
$stat_reply = $input_array["stat_reply"]; 

$option_approve  = $input_array["option_approve"]; 
$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"];

$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];




//// sql config




$check_process = "insert" ; 
if ($picture_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_gallery_picture
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
$sql_command = " select  count(*) from  app_gallery_picture ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "pic" ;
$input_idnow =  $cmd_check_record + 1 ; 
$picture_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_gallery_picture ( 
picture_id , 
ref_id , 

stat_view , 
stat_reply , 
stat_delete , 

option_status , 
system_delete , 
user_create , 
datetime_create 
)
				
values (
'$picture_id'  , 
'$ref_id'  , 

'0'  , 
'0'  , 
'0'  , 

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


if ( $option_order != "" ) 			{ $sql_option_order = " option_order = '$option_order' , "; }

/*
if ( $picture_image_mini != "" )	{ $sql_picture_image_mini = "  picture_image_mini = '$picture_image_mini' ,  "; }
if ( $picture_image != "" )			{ $sql_picture_image = "  picture_image = '$picture_image' ,  "; }
*/



/// update start
$sql_command="  
update   app_gallery_picture  

set  
gallery_id = '$gallery_id' ,
category_id = '$category_id' ,
picture_name = '$picture_name' ,
picture_des = '$picture_des' ,

picture_image_mini = '$picture_image_mini' , 
 picture_image = '$picture_image' ,

$sql_option_order
option_approve = '$option_approve'  , 
option_status = '$option_status'  , 

datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			picture_id = '$picture_id'
 "; 
 
//// print "$sql_command <br>";
 
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
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"]; 

$datetime_now = $input_array["datetime_now"]; 



if ($picture_id != "" ) {  /// check id
$sql_command = "	
update  app_gallery_picture   

set    
picture_name = '$picture_name' , 
picture_des = '$picture_des' , 

option_order = '$option_order' , 
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














/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$picture_id = $input_array["picture_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($picture_id != "" ) { 
$sql_command = "	
update  	app_gallery_picture   
set    	
system_delete = 'delete'   , 
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