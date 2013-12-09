<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_booking_detail
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_booking_detail.inc.php
 */

class  app_booking_detail{	
				
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
function app_booking_detail(){
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

$sql_other	= $input_array["sql_other"];

$booking_session_id =  $input_array["booking_session_id"]; 
$member_id = $input_array["member_id"]; 
$product_id = $input_array["product_id"]; 
$product_type = $input_array["product_type"]; 

$booking_status = $input_array["booking_status"]; 
$booking_approve = $input_array["booking_approve"]; 

$payment_type = $input_array["payment_type"]; 
$payment_status = $input_array["payment_status"]; 
$payment_approve = $input_array["payment_approve"]; 
$option_status = $input_array["option_status"]; 


//// sql command
if ($booking_session_id != "") 				{ $sql_booking_session_id 		=	" and		booking_session_id = '$booking_session_id' " ; }
if ($member_id != "") 						{ $sql_member_id 					=	" and		member_id = '$member_id' " ; }
if ($product_id != "") 							{ $sql_product_id 					=	" and		product_id = '$product_id' " ; }

if ($booking_status != "") 					{ $sql_booking_status 			=	" and		booking_status = '$booking_status' " ; }
if ($booking_approve != "") 				{ $sql_booking_approve 			=	" and		booking_approve = '$booking_approve' " ; }

if ($payment_type != "") 						{ $sql_payment_type 				=	" and		payment_type = '$payment_type' " ; }
if ($payment_status != "") 					{ $sql_payment_status 			=	" and		payment_status = '$payment_status' " ; }
if ($payment_approve != "") 				{ $sql_payment_approve 		=	" and		payment_approve = '$payment_approve' " ; }
if ($option_status != "")  						{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_booking_detail
where			system_delete = 'none'  


$sql_booking_session_id
$sql_member_id
$sql_product_id

$sql_booking_status
$sql_booking_approve

$sql_payment_type
$sql_payment_status
$sql_payment_approve
$sql_option_status

$sql_other

";	

///print "sql_command = $sql_command <br>";

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

$booking_session_id =  $input_array["booking_session_id"]; 
$member_id = $input_array["member_id"]; 
$product_id = $input_array["product_id"]; 
$product_type = $input_array["product_type"]; 

$booking_status = $input_array["booking_status"]; 
$booking_approve = $input_array["booking_approve"]; 

$payment_type = $input_array["payment_type"]; 
$payment_status = $input_array["payment_status"]; 
$payment_approve = $input_array["payment_approve"]; 
$option_status = $input_array["option_status"]; 


//// sql command
if ($booking_session_id != "") 				{ $sql_booking_session_id 		=	" and		booking_session_id = '$booking_session_id' " ; }
if ($member_id != "") 						{ $sql_member_id 					=	" and		member_id = '$member_id' " ; }
if ($product_id != "") 							{ $sql_product_id 					=	" and		product_id = '$product_id' " ; }

if ($booking_status != "") 					{ $sql_booking_status 			=	" and		booking_status = '$booking_status' " ; }
if ($booking_approve != "") 				{ $sql_booking_approve 			=	" and		booking_approve = '$booking_approve' " ; }

if ($payment_type != "") 						{ $sql_payment_type 				=	" and		payment_type = '$payment_type' " ; }
if ($payment_status != "") 					{ $sql_payment_status 			=	" and		payment_status = '$payment_status' " ; }
if ($payment_approve != "") 				{ $sql_payment_approve 		=	" and		payment_approve = '$payment_approve' " ; }
if ($option_status != "")  						{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }




$sql_command = "
select			*
from 			app_booking_detail
where 		system_delete = 'none' 

$sql_booking_session_id
$sql_member_id
$sql_product_id

$sql_booking_status
$sql_booking_approve

$sql_payment_type
$sql_payment_status
$sql_payment_approve
$sql_option_status

$sql_other
$sql_orderby

";		

///print "sql_command = $sql_command <br>";

$result_array = $this->db->SelectLimit($sql_command,$set_pager_limit,$set_pager_start );
return $result_array ;

} ///////////






function function_viewbyid($input_array){
$booking_id = $input_array["booking_id"];
if ($booking_id != "" ){ 
$sql_command = "
select 		* 
from			app_booking_detail
where		system_delete= 'none'
and			booking_id = '$booking_id'

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;

} 
} /// end function





/*
#################################################### end view  +++
*/





/*
#################################################### start update  +++
*/


function function_update($input_array){		

//// request
$booking_id = $input_array["booking_id"]; 
$booking_session_id = $input_array["booking_session_id"]; 
$member_id = $input_array["member_id"]; 
$product_id = $input_array["product_id"]; 
$product_type = $input_array["product_type"]; 

$booking_type_room = $input_array["booking_type_room"]; 
$booking_type_bed = $input_array["booking_type_bed"]; 
$booking_option1 = $input_array["booking_option1"]; 
$booking_option2 = $input_array["booking_option2"]; 
$booking_option3 = $input_array["booking_option3"]; 

$booking_unit_room = $input_array["booking_unit_room"]; 
$booking_date_start = $input_array["booking_date_start"]; 
$booking_date_end = $input_array["booking_date_end"]; 
$booking_unit_day = $input_array["booking_unit_day"]; 
$unit_month = $input_array["unit_month"]; 
$unit_day = $input_array["unit_day"]; 
$unit_week = $input_array["unit_week"]; 
$unit_person = $input_array["unit_person"]; 
$unit_person_option = $input_array["unit_person_option"]; 
$unit_kid = $input_array["unit_kid"]; 
$unit_kid_option = $input_array["unit_kid_option"]; 
$booking_comment = $input_array["booking_comment"]; 



///summary
$summary_price = $input_array["summary_price"]; 
$summary_price_confirm = $input_array["summary_price_confirm"]; 
$summary_comment = $input_array["summary_comment"]; 

$booking_status = $input_array["booking_status"]; 
$booking_approve = $input_array["booking_approve"]; 
$payment_type = $input_array["payment_type"]; 
$payment_status = $input_array["payment_status"]; 
$payment_approve = $input_array["payment_approve"]; 
$option_status = $input_array["option_status"]; 


$datetime_now = $input_array["datetime_now"];
$datetime_booking = $input_array["datetime_booking"];
$datetime_booking_approve = $input_array["datetime_booking_approve"];
$datetime_payment = $input_array["datetime_payment"];
$datetime_payment_approve = $input_array["datetime_payment_approve"];



//// sql config
$check_process = "insert" ; 
if ($booking_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_booking_detail
where 		system_delete = 'none'
and			booking_id = '$booking_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$booking_id = $result_array["booking_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_booking_detail ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "booking" ;
$input_idnow =  $cmd_check_record + 1 ; 
$booking_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_booking_detail ( 
booking_id , 
booking_session_id , 
member_id , 

product_id , 
product_type , 

booking_status , 
booking_approve , 
payment_status , 
payment_approve , 

option_status , 
system_delete , 
datetime_create 
)

values (
'$booking_id'  , 
'$booking_session_id'  , 
'$member_id'  , 

'$product_id'  , 
'$product_type'  , 

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


if ($booking_session_id != "" ) 				{ $sql_booking_session_id 				= " booking_session_id = '$booking_session_id' ,  "; }
if ($member_id != "" ) 							{ $sql_member_id 							= " member_id = '$member_id' ,  "; }
if ($product_id != "" )								{ $sql_product_id 							= " product_id = '$product_id' ,  "; }
if ($product_type != "" )							{ $sql_product_type 						= " product_type = '$product_type' ,  "; }

if ($booking_type_room != "" )					{ $sql_booking_type_room 				= " booking_type_room = '$booking_type_room' ,  "; }
if ($booking_type_bed != "" )					{ $sql_booking_type_bed 				= " booking_type_bed = '$booking_type_bed' ,  "; }
if ($booking_option1 != "" )						{ $sql_booking_option1 					= " booking_option1 = '$booking_option1' ,  "; }
if ($booking_option2 != "" )						{ $sql_booking_option2 					= " booking_option2 = '$booking_option2' ,  "; }
if ($booking_option3 != "" )						{ $sql_booking_option3 					= " booking_option3 = '$booking_option3' ,  "; }

if ($booking_unit_room != "" )					{ $sql_booking_unit_room				= " booking_unit_room = '$booking_unit_room' ,  "; }
if ($booking_date_start != "" )					{ $sql_booking_date_start				= " booking_date_start = '$booking_date_start' ,  "; }
if ($booking_date_end != "" )					{ $sql_booking_date_end				= " booking_date_end = '$booking_date_end' ,  "; }
if ($booking_unit_day != "" )					{ $sql_booking_unit_day					= " booking_unit_day = '$booking_unit_day' ,  "; }
if ($unit_month != "" )								{ $sql_unit_month							= " unit_month = '$unit_month' ,  "; }
if ($unit_day != "" )									{ $sql_unit_day								= " unit_day = '$unit_day' ,  "; }
if ($unit_week != "" )								{ $sql_unit_week							= " unit_week = '$unit_week' ,  "; }
if ($unit_person != "" )							{ $sql_unit_person							= " unit_person = '$unit_person' ,  "; }
if ($unit_person_option != "" )					{ $sql_unit_person_option				= " unit_person_option = '$unit_person_option' ,  "; }
if ($unit_kid != "" )									{ $sql_unit_kid								= " unit_kid = '$unit_kid' ,  "; }
if ($unit_kid_option != "" )						{ $sql_unit_kid_option						= " unit_kid_option = '$unit_kid_option' ,  "; }

if ($booking_comment != "" )					{ $sql_booking_comment				= " booking_comment = '$booking_comment' ,  "; }


///summary
if ($summary_price != "" )						{ $sql_summary_price 					= " summary_price = '$summary_price' ,  "; }
if ($summary_price_confirm != "" )			{ $sql_summary_price_confirm		= " summary_price_confirm = '$summary_price_confirm' ,  "; }
if ($summary_comment != "" )				{ $sql_summary_comment 				= " summary_comment = '$summary_comment' ,  "; }

if ($booking_status != "" )						{ $sql_booking_status 					= " booking_status = '$booking_status' ,  "; }
if ($booking_approve != "" )					{ $sql_booking_approve 					= " booking_approve = '$booking_approve' ,  "; }
if ($payment_type != "" )							{ $sql_payment_type 						= " payment_type = '$payment_type' ,  "; }
if ($payment_status != "" )						{ $sql_payment_status 					= " payment_status = '$payment_status' ,  "; }
if ($payment_approve != "" )					{ $sql_payment_approve 				= " payment_approve = '$payment_approve' ,  "; }
if ($option_status != "" )							{ $sql_option_status 						= " option_status = '$option_status' ,  "; }


////date
if ($datetime_booking != "" ) 					{ $sql_datetime_booking 				= " datetime_booking = '$datetime_booking' ,  "; }
if ($datetime_booking_approve != "" )		{ $sql_datetime_booking_approve	= " datetime_booking_approve = '$datetime_booking_approve' ,  "; }
if ($datetime_payment != "" ) 					{ $sql_datetime_payment 				= " datetime_payment = '$datetime_payment' ,  "; }
if ($datetime_payment_approve != "" ) 	{ $sql_datetime_payment_approve 	= " datetime_payment_approve = '$datetime_payment_approve' ,  "; }





/// update start
$sql_command="  
update   app_booking_detail  

set  
$sql_booking_session_id
$sql_member_id
$sql_product_id
$sql_product_type


booking_type_room = '$booking_type_room' , 
booking_type_bed = '$booking_type_bed' , 
booking_option1 = '$booking_option1' , 
booking_option2 = '$booking_option2' , 
booking_option3 = '$booking_option3' , 

booking_unit_room = '$booking_unit_room' , 
booking_date_start = '$booking_date_start' , 
booking_date_end = '$booking_date_end' , 
booking_unit_day = '$booking_unit_day' ,
unit_month = '$unit_month' , 
unit_day = '$unit_day' , 
unit_week = '$unit_week' ,
unit_person = '$unit_person' , 
unit_person_option = '$unit_person_option' ,
unit_kid = '$unit_kid' , 
unit_kid_option = '$unit_kid_option' ,

summary_price_confirm = '$summary_price_confirm' ,
summary_price_confirm = '$summary_price_confirm' ,

$sql_booking_comment
$sql_summary_comment
$sql_booking_status
$sql_booking_approve
$sql_payment_type
$sql_payment_status
$sql_payment_approve
$sql_option_status

$sql_datetime_booking
$sql_datetime_booking_approve
$sql_datetime_payment
$sql_datetime_payment_approve

datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			booking_id = '$booking_id'

"; 

/// print "$sql_command <br>";

$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }
$result_return = array(
"show_status"=>"$show_status" , 
"booking_id"=>"$booking_id" , 
);
return $result_return ;	

} //// end




function  function_update_bysql($input_array){	

$sql_update = $input_array["sql_update"]; 
$sql_where = $input_array["sql_where"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($sql_update != ""  and  $sql_where  ) { 
$sql_command = "	
update  app_booking_detail   

set    
$sql_update
datetime_update = '$datetime_now'  

where  
$sql_where

";		
////  print "$sql_command <br><br>"; 
$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
);
return $result_return ;	

}












/*
#################################################### start delete  +++
*/
function  function_delete($input_array){	

$booking_id = $input_array["booking_id"]; 
$sql_other = $input_array["sql_other"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($booking_id != "" or $sql_other != "" ) { 
$sql_command = "	
update  	app_booking_detail   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
booking_id = '$booking_id'  
$sql_other

";		

//// print $sql_command ; 

$result_update = $this->db->Execute($sql_command);	


} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"booking_id"=>"$booking_id" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>