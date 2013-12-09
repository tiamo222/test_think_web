<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_bidding
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_bidding.inc.php
 */


class  app_bidding{	
				
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
function app_bidding(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


function function_countbyset($input_array){

$sql_other = $input_array["sql_other"];
$sql_joint_table = $input_array["sql_joint_table"];
$sql_joint_select = $input_array["sql_joint_select"];
$sql_joint_where = $input_array["sql_joint_where"];

$category_id = $input_array["category_id"];
$option_highlight = $input_array["option_highlight"];
$option_recommend = $input_array["option_recommend"];
$option_approve = $input_array["option_approve"];
$option_reply = $input_array["option_reply"];
$option_price = $input_array["option_price"];
$option_status = $input_array["option_status"];


//// sql command
if ($category_id != "") 					{ $sql_category_id 					=	" and		app_bidding.category_id = '$category_id' " ; }

if ($option_highlight != "")  				{ $sql_option_highlight 			=	" and		app_bidding.option_highlight = '$option_highlight' " ; }
if ($option_recommend != "")  		{ $sql_option_recommend 		=	" and		app_bidding.option_recommend = '$option_recommend' " ; }
if ($option_approve != "")  				{ $sql_option_approve 			=	" and		app_bidding.option_approve = '$option_approve' " ; }
if ($option_reply != "")  					{ $sql_option_reply 				=	" and		app_bidding.option_reply = '$option_reply' " ; }
if ($option_price != "")  					{ $sql_option_price 				=	" and		app_bidding.option_price = '$option_price' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		app_bidding.option_status = '$option_status' " ; }



//// recommend
$sql_command = "
select			count(*)  
from				app_bidding $sql_joint_table 
where			app_bidding.system_delete = 'none'  


$sql_category_id
$sql_option_highlight
$sql_option_recommend
$sql_option_approve
$sql_option_reply
$sql_option_price
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
if ($sql_orderby == "") 	{ $sql_orderby 	=  " order by 	app_bidding.id  DESC " ; }
$sql_joint_table = $input_array["sql_joint_table"];
$sql_joint_select = $input_array["sql_joint_select"];
$sql_joint_where = $input_array["sql_joint_where"];



$category_id = $input_array["category_id"];

$option_highlight = $input_array["option_highlight"];
$option_recommend = $input_array["option_recommend"];
$option_approve = $input_array["option_approve"];
$option_reply = $input_array["option_reply"];
$option_price = $input_array["option_price"];
$option_status = $input_array["option_status"];



//// sql command
if ($category_id != "") 					{ $sql_category_id 					=	" and		app_bidding.category_id = '$category_id' " ; }

if ($option_highlight != "")  				{ $sql_option_highlight 			=	" and		app_bidding.option_highlight = '$option_highlight' " ; }
if ($option_recommend != "")  		{ $sql_option_recommend 		=	" and		app_bidding.option_recommend = '$option_recommend' " ; }
if ($option_approve != "")  				{ $sql_option_approve 			=	" and		app_bidding.option_approve = '$option_approve' " ; }
if ($option_reply != "")  					{ $sql_option_reply 				=	" and		app_bidding.option_reply = '$option_reply' " ; }
if ($option_price != "")  					{ $sql_option_price 				=	" and		app_bidding.option_price = '$option_price' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		app_bidding.option_status = '$option_status' " ; }

$sql_command = "
select		* $sql_joint_select
from 			app_bidding $sql_joint_table
where 		app_bidding.system_delete = 'none' 


$sql_category_id
$sql_option_highlight
$sql_option_recommend
$sql_option_approve
$sql_option_reply
$sql_option_price
$sql_option_status

$sql_joint_where
$sql_other
$sql_orderby

";		

/// print "sql_command = $sql_command <br>";

$result_array = $this->db->SelectLimit($sql_command,$set_pager_limit,$set_pager_start );
return $result_array ;

} ///////////





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyid
*/

function function_viewbyid($input_array){
$bidding_id = $input_array["bidding_id"];

//// sql command
if ($bidding_id != "") { $sql_bidding_id 	=	" and		bidding_id = '$bidding_id' " ; }

$sql_command = "
select 		* 
from			app_bidding
where		system_delete= 'none'

$sql_bidding_id

";	

//// print "sql_command = $sql_command <br>";

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
$bidding_id = $input_array["bidding_id"]; 
$member_id = $input_array["member_id"]; 
$category_id = $input_array["category_id"]; 
$product_id = $input_array["product_id"]; 

$bidding_name = $input_array["bidding_name"]; 
$bidding_code = $input_array["bidding_code"]; 
$bidding_des = $input_array["bidding_des"]; 
$bidding_detail = $input_array["bidding_detail"]; 

$bidding_image = $input_array["bidding_image"]; 
$bidding_image_mini = $input_array["bidding_image_mini"]; 
$bidding_room_type = $input_array["bidding_room_type"]; 
$bidding_bed_type = $input_array["bidding_bed_type"]; 
$shopping_option3 = $input_array["shopping_option3"]; 

$bidding_unit_room = $input_array["bidding_unit_room"]; 
$bidding_unit_day = $input_array["bidding_unit_day"]; 
$bidding_amount_day  = $input_array["bidding_amount_day"]; 
$bidding_date_option = $input_array["bidding_date_option"]; 
$bidding_date_start = $input_array["bidding_date_start"]; 
$bidding_date_end = $input_array["bidding_date_end"];


$bidding_payment  = $input_array["bidding_payment"]; 
$bidding_payment_a  = $input_array["bidding_payment_a"]; 
$bidding_payment_b  = $input_array["bidding_payment_b"]; 
$bidding_limit_contact_day  = $input_array["bidding_limit_contact_day"]; 
$bidding_limit_contact_time  = $input_array["bidding_limit_contact_time"]; 
$bidding_limit_option  = $input_array["bidding_limit_option"]; 


$price_step  = $input_array["price_step"]; 
$price_start = $input_array["price_start"]; 
$price_top = $input_array["price_top"]; 
$price_present  = $input_array["price_present"]; 

$stat_bidding = $input_array["stat_bidding"]; 
$stat_rateing = $input_array["stat_rateing"]; 
$stat_view = $input_array["stat_view"]; 
$stat_reply = $input_array["stat_reply"]; 
$stat_delete = $input_array["stat_delete"]; 


$option_date_checkin = $input_array["option_date_checkin"];
$option_price = $input_array["option_price"];
$option_bidding = $input_array["option_bidding"];

$option_order = $input_array["option_order"]; 
$option_highlight = $input_array["option_highlight"]; 
$option_recommend = $input_array["option_recommend"]; 
$option_approve = $input_array["option_approve"]; 
$option_reply = $input_array["option_reply"]; 
$option_status = $input_array["option_status"];
$option_price = $input_array["option_price"];

$datetime_start = $input_array["datetime_start"];
$datetime_end = $input_array["datetime_end"];
$datetime_bidding_last = $input_array["datetime_bidding_last"];
$datetime_view = $input_array["datetime_view"];

$datetime_now = $input_array["datetime_now"];





$check_process = "insert" ; 
if ($bidding_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_bidding
where 		system_delete = 'none'
and			bidding_id = '$bidding_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
} ///
} ///



/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_bidding ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "bidding" ;
$input_idnow =  $cmd_check_record + 1 ; 
$bidding_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command = "
insert into  app_bidding ( 
bidding_id , 
member_id , 
category_id , 
product_id , 

stat_bidding , 
stat_rateing , 
stat_view , 
stat_reply , 
stat_delete , 
option_order , 

option_date_checkin , 
option_price , 
option_highlight , 
option_recommend , 
option_approve , 
option_reply , 
option_bidding , 
option_bidding_close , 
option_bidding_complete , 
option_status , 


system_delete , 
datetime_create 
)
				
values (
'$bidding_id'  , 
'$member_id'  , 
'$category_id'  , 
'$product_id'  , 

'0'  , 
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
'none'  , 
'none'  , 
'none'  , 
'none'  , 
'on'  , 


'none'  , 
'$datetime_now'  

)									
 ";		
 
/// print $sql_command ;  
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 



if ($category_id != "" )					{ $sql_category_id = " category_id = '$category_id' ,  "; }
if ($product_id != "" )						{ $sql_product_id = " product_id = '$product_id' ,  "; }
if ($bidding_name != "" )					{ $sql_bidding_name = " bidding_name = '$bidding_name' ,  "; }
if ($bidding_code != "" )					{ $sql_bidding_code = " bidding_code = '$bidding_code' ,  "; }
if ($bidding_des != "" )					{ $sql_bidding_des = " bidding_des = '$bidding_des' ,  "; }
if ($bidding_detail != "" )					{ $sql_bidding_detail = " bidding_detail = '$bidding_detail' ,  "; }

if ($bidding_image != "" )				{ $sql_bidding_image = " bidding_image = '$bidding_image' ,  "; }
if ($bidding_image_mini != "" )		{ $sql_bidding_image_mini = " bidding_image_mini = '$bidding_image_mini' ,  "; }


if ($bidding_room_type != "" )			{ $sql_bidding_room_type = " bidding_room_type = '$bidding_room_type' ,  "; }
if ($bidding_bed_type != "" )			{ $sql_bidding_bed_type = " bidding_bed_type = '$bidding_bed_type' ,  "; }
if ($bidding_unit_room != "" )			{ $sql_bidding_unit_room = " bidding_unit_room = '$bidding_unit_room' ,  "; }
if ($bidding_unit_day != "" )				{ $sql_bidding_unit_day = " bidding_unit_day = '$bidding_unit_day' ,  "; }
if ($bidding_amount_day != "" )		{ $sql_bidding_amount_day = " bidding_amount_day = '$bidding_amount_day' ,  "; }

if ($bidding_date_option != "" )		{ $sql_bidding_date_option = " bidding_date_option = '$bidding_date_option' ,  "; }
if ($bidding_date_start != "" )			{ $sql_bidding_date_start = " bidding_date_start = '$bidding_date_start' ,  "; }
if ($bidding_date_end != "" )			{ $sql_bidding_date_end = " bidding_date_end = '$bidding_date_end' ,  "; }


if ($price_step != "" )						{ $sql_price_step = " price_step = '$price_step' ,  "; }
if ($price_start != "" )						{ $sql_price_start = " price_start = '$price_start' ,  "; }
if ($price_top != "" )						{ $sql_price_top = " price_top = '$price_top' ,  "; }
if ($price_present != "" )					{ $sql_price_present = " price_present = '$price_present' ,  "; }


if ($bidding_payment != "" )				{ $sql_bidding_payment = " bidding_payment = '$bidding_payment' ,  "; }
if ($bidding_payment_a != "" )				{ $sql_bidding_payment_a = " bidding_payment_a = '$bidding_payment_a' ,  "; }
if ($bidding_payment_b != "" )				{ $sql_bidding_payment_b = " bidding_payment_b = '$bidding_payment_b' ,  "; }
if ($bidding_limit_contact_day != "" )	{ $sql_bidding_limit_contact_day = " bidding_limit_contact_day = '$bidding_limit_contact_day' ,  "; }
if ($bidding_limit_contact_time != "" )	{ $sql_bidding_limit_contact_time = " bidding_limit_contact_time = '$bidding_limit_contact_time' ,  "; }
if ($bidding_limit_option != "" )			{ $sql_bidding_limit_option = " bidding_limit_option = '$bidding_limit_option' ,  "; }



if ($stat_bidding != "" )					{ $sql_stat_bidding = " stat_bidding = '$stat_bidding' ,  "; }
if ($stat_rateing != "" )					{ $sql_stat_rateing = " stat_rateing = '$stat_rateing' ,  "; }
if ($stat_view != "" )						{ $sql_stat_view = " stat_view = '$stat_view' ,  "; }
if ($stat_reply != "" )						{ $sql_stat_reply = " stat_reply = '$stat_reply' ,  "; }
if ($stat_delete != "" )						{ $sql_stat_delete = " stat_delete = '$stat_delete' ,  "; }


if ($option_date_checkin != "" )		{ $sql_option_date_checkin = " option_date_checkin = '$option_date_checkin' ,  "; }
if ($option_price != "" )					{ $sql_option_price = " option_price = '$option_price' ,  "; }
if ($option_bidding != "" )				{ $sql_option_bidding = " option_bidding = '$option_bidding' ,  "; }

if ($option_order != "" )					{ $sql_option_order = " option_order = '$option_order' ,  "; }
if ($option_highlight != "" )				{ $sql_option_highlight = " option_highlight = '$option_highlight' ,  "; }
if ($option_recommend != "" )			{ $sql_option_recommend = " option_recommend = '$option_recommend' ,  "; }
if ($option_reply != "" )					{ $sql_option_reply = " option_reply = '$option_reply' ,  "; }
if ($option_approve != "" )				{ $sql_option_approve = " option_approve = '$option_approve' ,  "; }
if ($option_status != "" )					{ $sql_option_status = " option_status = '$option_status' ,  "; }

if ($datetime_start != "" )				{ $sql_datetime_start = " datetime_start = '$datetime_start' ,  "; }
if ($datetime_end != "" )					{ $sql_datetime_end = " datetime_end = '$datetime_end' ,  "; }
if ($datetime_bidding_last != "" )		{ $sql_datetime_bidding_last = " datetime_bidding_last = '$datetime_bidding_last' ,  "; }
if ($datetime_view != "" )				{ $sql_datetime_view = " datetime_view = '$datetime_view' ,  "; }



/// update start
$sql_command="  
update   app_bidding  

set  
	
	$sql_category_id
	$sql_product_id
	$sql_bidding_name
	$sql_bidding_code
	$sql_bidding_des
	$sql_bidding_detail
	
	$sql_bidding_image
	$sql_bidding_image_mini
	
	$sql_bidding_room_type
	$sql_bidding_bed_type
	
	$sql_bidding_unit_room
	$sql_bidding_unit_day
	$sql_bidding_amount_day
	$sql_bidding_date_option
	$sql_bidding_date_start
	$sql_bidding_date_end
	
	$sql_price_step
	$sql_price_start
	$sql_price_top
	$sql_price_present
	
	$sql_stat_bidding
	$sql_stat_rateing
	$sql_stat_view
	$sql_stat_reply
	$sql_stat_delete
	
	
	$sql_bidding_payment
	$sql_bidding_payment_a
	$sql_bidding_payment_b
	$sql_bidding_limit_contact_day
	$sql_bidding_limit_option
	
	
	$sql_option_date_checkin
	$sql_option_price
	$sql_option_bidding
	
	$sql_option_order
	$sql_option_highlight
	$sql_option_recommend
	$sql_option_reply
	$sql_option_approve
	$sql_option_status
	

	$sql_datetime_start
	$sql_datetime_end
	$sql_datetime_bidding_last
	$sql_datetime_view


datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			bidding_id = '$bidding_id'
 "; 

//// print "$sql_command <br>"; 

$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"bidding_id"=>"$bidding_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/


function  function_update_option($input_array){	

//// request
$bidding_id = $input_array["bidding_id"]; 

$option_order = $input_array["option_order"];
$option_bidding = $input_array["option_bidding"];
$option_highlight  = $input_array["option_highlight"];
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 



if ($bidding_id != "" ) {  /// check id
$sql_command = "	
update  app_bidding   

set    
option_order = '$option_order' , 
option_bidding = '$option_bidding' , 
option_highlight = '$option_highlight' , 
option_status = '$option_status' , 

datetime_update = '$datetime_now'

where  bidding_id = '$bidding_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"bidding_id"=>"$bidding_id" , 
);
return $result_return ;	
		
} /// 







function  function_update_bysql($input_array){	

//// request
///$bidding_id = $input_array["bidding_id"]; 
$sql_where = $input_array["sql_where"];
$sql_update = $input_array["sql_update"];
$datetime_now = $input_array["datetime_now"]; 


if ($sql_where != "" ) {  /// check id
$sql_command = "	
update   app_bidding   

set    
$sql_update
datetime_update = '$datetime_now'

where  
system_delete = 'none'
$sql_where
";		
//// print "$sql_command <br><br>"; 
$result_update = $this->db->Execute($sql_command);	
}  /// sql_where


if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"bidding_id"=>"$bidding_id" , 
);
return $result_return ;	
		
} /// 










function  function_update_stat($input_array){	

$bidding_id = $input_array["bidding_id"];
$stat_view = $input_array["stat_view"];
$stat_reply = $input_array["stat_reply"];
$datetime_now = $input_array["datetime_now"]; 


if ($bidding_id != "" ) { 
/////////////// stat_view
if ($stat_view == ""  or  $stat_view == "0"  ) {
$sql_command = "
select 		stat_view 
from			app_bidding
where		bidding_id = '$bidding_id'  
";	
$result_array = $this->db->GetRow($sql_command);
$stat_view = $result_array["stat_view"];
}


$stat_view = $stat_view + 1 ; 

$sql_command = "	
update 	 	app_bidding   
set    	
stat_view = '$stat_view'   , 
stat_reply = '$stat_reply'   , 
datetime_view = '$datetime_now'

where  
bidding_id = '$bidding_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
/// "show_status"=>"$show_status" , 
"bidding_id"=>"$bidding_id" , 
"stat_view"=>"$stat_view" , 
);
return $result_return ;	
		
} ///  end function











/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$bidding_id = $input_array["bidding_id"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($bidding_id != "" ){ 

$sql_command = "	
update  	app_bidding   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
bidding_id = '$bidding_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"bidding_id"=>"$bidding_id" , 
);
return $result_return ;	

} ///  end function




	
	

}///// class  eva_criteria{	
?>