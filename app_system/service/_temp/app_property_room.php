<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_property_room
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_property_room.inc.php
 */


class  app_property_room{	
				
/**
* Public Variable
**/			
	var $db ;
	var $username ;
	var $usertype ;
	var $model_data = array();	
	

	
/**
* Constructor
*
**/					
function app_property_room(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/



/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_countbyset
*/
function function_countbyset($input_array){

$sql_other = $input_array["sql_other"];

$property_id = $input_array["property_id"];
$property_type = $input_array["property_type"];
$member_id = $input_array["member_id"];

$category_id = $input_array["category_id"];
$category_id_set1 = $input_array["category_id_set1"];
$category_id_set2 = $input_array["category_id_set2"];
$category_id_set3 = $input_array["category_id_set3"];

$option_highlight = $input_array["option_highlight"];
$option_recommend = $input_array["option_recommend"];
$option_approve = $input_array["option_approve"];
$option_reply = $input_array["option_reply"];
$option_price = $input_array["option_price"];
$option_status = $input_array["option_status"];



//// sql command
if ($property_id != "") 					{ $sql_property_id 						=	" and		property_id = '$property_id' " ; }
if ($property_type != "") 					{ $sql_property_type 				=	" and		property_type = '$property_type' " ; }
if ($member_id != "") 					{ $sql_member_id 					=	" and		member_id = '$member_id' " ; }

if ($category_id != "") 					{ $sql_category_id 					=	" and		category_id = '$category_id' " ; }
if ($category_id_set1 != "") 			{ $sql_category_id_set1 			=	" and		category_id_set1 = '$category_id_set1' " ; }
if ($category_id_set2 != "") 			{ $sql_category_id_set2 			=	" and		category_id_set2 = '$category_id_set2' " ; }
if ($category_id_set3 != "") 			{ $sql_category_id_set3 			=	" and		category_id_set3 = '$category_id_set3' " ; }

if ($option_highlight != "")  				{ $sql_option_highlight 			=	" and		option_highlight = '$option_highlight' " ; }
if ($option_recommend != "")  		{ $sql_option_recommend 		=	" and		option_recommend = '$option_recommend' " ; }
if ($option_approve != "")  				{ $sql_option_approve 		=	" and		option_approve = '$option_approve' " ; }
if ($option_reply != "")  					{ $sql_option_reply 		=	" and		option_reply = '$option_reply' " ; }
if ($option_price != "")  					{ $sql_option_price 		=	" and		option_price = '$option_price' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }



//// recommend
$sql_command = "
select			count(*)  
from				app_property_room
where			system_delete = 'none'  

$sql_property_id
$sql_property_type
$sql_member_id
$sql_category_id
$sql_category_id_set1
$sql_category_id_set2
$sql_category_id_set3

$sql_option_highlight
$sql_option_recommend
$sql_option_approve
$sql_option_reply
$sql_option_price
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
if ($sql_orderby == "") 	{ $sql_orderby 	=  " order by 	id  DESC " ; }

$property_id = $input_array["property_id"];
$property_type = $input_array["property_type"];
$member_id = $input_array["member_id"];
$category_id = $input_array["category_id"];
$category_id_set1 = $input_array["category_id_set1"];
$category_id_set2 = $input_array["category_id_set2"];
$category_id_set3 = $input_array["category_id_set3"];

$option_highlight = $input_array["option_highlight"];
$option_recommend = $input_array["option_recommend"];
$option_approve = $input_array["option_approve"];
$option_reply = $input_array["option_reply"];
$option_price = $input_array["option_price"];
$option_status = $input_array["option_status"];



//// sql command
if ($property_id != "") 					{ $sql_property_id 						=	" and		property_id = '$property_id' " ; }
if ($property_type != "") 					{ $sql_property_type 				=	" and		property_type = '$property_type' " ; }
if ($member_id != "") 					{ $sql_member_id 					=	" and		member_id = '$member_id' " ; }

if ($category_id != "") 					{ $sql_category_id 					=	" and		category_id = '$category_id' " ; }
if ($category_id_set1 != "") 			{ $sql_category_id_set1 			=	" and		category_id_set1 = '$category_id_set1' " ; }
if ($category_id_set2 != "") 			{ $sql_category_id_set2 			=	" and		category_id_set2 = '$category_id_set2' " ; }
if ($category_id_set3 != "") 			{ $sql_category_id_set3 			=	" and		category_id_set3 = '$category_id_set3' " ; }

if ($option_highlight != "")  				{ $sql_option_highlight 			=	" and		option_highlight = '$option_highlight' " ; }
if ($option_recommend != "")  		{ $sql_option_recommend 		=	" and		option_recommend = '$option_recommend' " ; }
if ($option_approve != "")  				{ $sql_option_approve 		=	" and		option_approve = '$option_approve' " ; }
if ($option_reply != "")  					{ $sql_option_reply 		=	" and		option_reply = '$option_reply' " ; }
if ($option_price != "")  					{ $sql_option_price 		=	" and		option_price = '$option_price' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }

$sql_command = "
select			*
from 			app_property_room
where 		system_delete = 'none' 

$sql_property_id
$sql_property_type
$sql_member_id
$sql_category_id
$sql_category_id_set1
$sql_category_id_set2
$sql_category_id_set3

$sql_option_highlight
$sql_option_recommend
$sql_option_approve
$sql_option_reply
$sql_option_price
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

$room_id = $input_array["room_id"];

//// sql command
if ($room_id != "") 		{$sql_room_id 	=	" and		room_id = '$room_id' " ; }

if ($room_id != "" ){
$sql_command = "
select 		* 
from			app_property_room
where		system_delete= 'none'

$sql_room_id

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
}/// id

}////function




/*
#################################################### end view  +++
*/





/*
#################################################### start update  +++
*/


function function_update($input_array){		

//// request
$room_id = $input_array["room_id"]; 
$property_id = $input_array["property_id"]; 
$property_type = $input_array["property_type"]; 
$member_id = $input_array["member_id"]; 

$category_id = $input_array["category_id"]; 
$category_id_set1 = $input_array["category_id_set1"]; 
$category_id_set2 = $input_array["category_id_set2"]; 
$category_id_set3 = $input_array["category_id_set3"]; 


$room_name = $input_array["room_name"]; 
$room_code = $input_array["room_code"]; 
$room_des = $input_array["room_des"]; 
$room_detail = $input_array["room_detail"]; 
$room_source_name = $input_array["room_source_name"]; 
$room_source_url = $input_array["room_source_url"]; 

$room_maps_des = $input_array["room_maps_des"]; 
$room_maps_code = $input_array["room_maps_code"]; 
$room_amount_room = $input_array["room_amount_room"]; 
$option_reserve = $input_array["option_reserve"]; 
$option_reserve_atleast = $input_array["option_reserve_atleast"]; 

$room_image = $input_array["room_image"]; 
$room_image_mini = $input_array["room_image_mini"]; 



$option_price = $input_array["option_price"]; 
$price_normal = $input_array["price_normal"]; 
$price_special = $input_array["price_special"]; 
$price_rank_start = $input_array["price_rank_start"]; 
$price_rank_top = $input_array["price_rank_top"]; 


$stat_rateing = $input_array["stat_rateing"]; 
$stat_view = $input_array["stat_view"]; 
$stat_reply = $input_array["stat_reply"]; 
$stat_delete = $input_array["stat_delete"]; 



$option_highlight = $input_array["option_highlight"]; 
$option_recommend = $input_array["option_recommend"]; 
$option_approve = $input_array["option_approve"]; 
$option_reply = $input_array["option_reply"]; 
$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"];
$option_price = $input_array["option_price"];




$ipaddress_post = $input_array["ipaddress_post"];
$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];



//// sql config




$check_process = "insert" ; 
if ($room_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_property_room
where 		system_delete = 'none'
and			room_id = '$room_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
} ///
} ///



/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*)  from  app_property_room ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "room" ;
$input_idnow =  $cmd_check_record + 1 ; 
$room_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command = "
insert into  app_property_room ( 
room_id , 
property_id , 

property_type , 
member_id , 

stat_rateing , 
stat_view , 
stat_reply , 
stat_delete , 
option_order , 

option_highlight , 
option_recommend , 
option_approve , 
option_reply , 
option_price , 
option_status , 

system_delete , 
user_create , 
ipaddress_post , 
datetime_create 
)
				
values (
'$room_id'  , 
'$property_id'  , 

'$property_type'  , 
'$member_id'  , 


'0'  , 
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
'$user_update'  , 
'$ipaddress_post'  , 
'$datetime_now'  

)									
 ";		
 
/// print $sql_command ; 
 
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 



if ($member_id != "" ){ $sql_member_id = " member_id = '$member_id' ,  "; }


/// update start
$sql_command="  
update   app_property_room  

set  
category_id = '$category_id' ,
category_id_set1 = '$category_id_set1' ,
category_id_set2 = '$category_id_set2' ,
category_id_set3 = '$category_id_set3' ,


room_name = '$room_name' ,
room_code = '$room_code' ,
room_des = '$room_des' ,
room_detail = '$room_detail' ,
room_source_name = '$room_source_name' ,
room_source_url = '$room_source_url' ,

room_maps_des = '$room_maps_des' ,
room_maps_code = '$room_maps_code' ,
room_amount_room = '$room_amount_room' ,
option_reserve = '$option_reserve' ,
option_reserve_atleast = '$option_reserve_atleast' ,

room_image_mini = '$room_image_mini' ,
room_image = '$room_image' ,


option_price = '$option_price'  , 
price_normal = '$price_normal'  , 
price_special = '$price_special'  , 
price_rank_start = '$price_rank_start'  , 
price_rank_top = '$price_rank_top'  , 



option_highlight = '$option_highlight'  , 
option_recommend = '$option_recommend'  , 
option_order = '$option_order'  , 
option_reply = '$option_reply'  , 
option_approve = '$option_approve'  , 
option_price = '$option_price'  , 
option_status = '$option_status'  , 


$sql_member_id


ipaddress_update =  '$ipaddress_update'  , 
user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			room_id = '$room_id'
 "; 
 
//// print "$sql_command <br>";

 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"room_id"=>"$room_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$room_id = $input_array["room_id"]; 

$option_highlight = $input_array["option_highlight"];
$option_recommend = $input_array["option_recommend"];
$option_approve = $input_array["option_approve"];
$option_order = $input_array["option_order"];
$option_reply = $input_array["option_reply"];
$option_price = $input_array["option_price"];
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 


if ( $option_price != "" ) { $sql_option_price = " option_price = '$option_price' ,  "; }


if ($room_id != "" ) {  /// check id
$sql_command = "	
update  app_property_room   

set    
option_highlight = '$option_highlight' , 
option_recommend = '$option_recommend' , 
option_order = '$option_order' , 
option_reply = '$option_reply' , 

$sql_option_price

option_approve = '$option_approve' , 
option_status = '$option_status' , 
datetime_update = '$datetime_now'

where  room_id = '$room_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"room_id"=>"$room_id" , 
);
return $result_return ;	
		
} /// 












function  function_update_stat($input_array){	

$room_id = $input_array["room_id"];
$stat_view = $input_array["stat_view"];
$stat_reply = $input_array["stat_reply"];
$datetime_now = $input_array["datetime_now"]; 


if ($room_id != "" ) { 
/////////////// stat_view
if ($stat_view == ""  or  $stat_view == "0"  ) {
$sql_command = "
select 		stat_view 
from			app_property_room
where		room_id = '$room_id'  
";	
$result_array = $this->db->GetRow($sql_command);
$stat_view = $result_array["stat_view"];
}


$stat_view = $stat_view + 1 ; 

$sql_command = "	
update 	 	app_property_room   
set    	
stat_view = '$stat_view'   , 
stat_reply = '$stat_reply'   , 
datetime_view = '$datetime_now'

where  
room_id = '$room_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
/// "show_status"=>"$show_status" , 
"room_id"=>"$room_id" , 
"stat_view"=>"$stat_view" , 
);
return $result_return ;	
		
} ///  end function











/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$room_id = $input_array["room_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($room_id != "" ){ 

$sql_command = "	
update  	app_property_room   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
room_id = '$room_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"room_id"=>"$room_id" , 
);
return $result_return ;	


} ///  end function





function  function_delete_bycase($input_array){	

$category_id = $input_array["category_id"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($category_id != "" ) { 
$sql_command = "	
update  	app_property_room   
set    	
system_delete = 'delete'   , 
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