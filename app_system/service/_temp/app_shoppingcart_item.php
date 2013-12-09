<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_shoppingcart_item
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_shoppingcart_item.inc.php
 */

class  app_shoppingcart_item{	
				
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
function app_shoppingcart_item(){
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
$shopping_id = $input_array["shopping_id"]; 
$cart_session_id =  $input_array["cart_session_id"]; 
$member_id = $input_array["member_id"]; 
$product_id = $input_array["product_id"]; 
$product_type = $input_array["product_type"]; 



$order_code = $input_array["order_code"]; 
$shopping_status = $input_array["shopping_status"]; 
$shopping_approve = $input_array["shopping_approve"]; 
$payment_type = $input_array["payment_type"]; 

$payment_status = $input_array["payment_status"]; 
$payment_approve = $input_array["payment_approve"]; 
$option_status = $input_array["option_status"]; 


//// sql command
if ($shopping_id != "") 						{ $sql_shopping_id 			=	" and		shopping_id = '$shopping_id' " ; }
if ($cart_session_id != "") 					{ $sql_cart_session_id 			=	" and		cart_session_id = '$cart_session_id' " ; }
if ($member_id != "") 						{ $sql_member_id 					=	" and		member_id = '$member_id' " ; }
if ($order_code != "") 						{ $sql_order_code 					=	" and		order_code = '$order_code' " ; }
if ($shopping_status != "") 					{ $sql_shopping_status 			=	" and		shopping_status = '$shopping_status' " ; }
if ($shopping_approve != "") 				{ $sql_shopping_approve 			=	" and		shopping_approve = '$shopping_approve' " ; }
if ($payment_type != "") 						{ $sql_payment_type 				=	" and		payment_type = '$payment_type' " ; }

if ($payment_status != "") 					{ $sql_payment_status 				=	" and		payment_status = '$payment_status' " ; }
if ($payment_approve != "") 				{ $sql_payment_approve 			=	" and		payment_approve = '$payment_approve' " ; }
if ($option_status != "")  						{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_shoppingcart_item
where			system_delete = 'none'  

$sql_shopping_id
$sql_cart_session_id
$sql_member_id
$sql_order_code
$sql_shopping_status
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

$shopping_id = $input_array["shopping_id"]; 
$cart_session_id =  $input_array["cart_session_id"]; 
$member_id = $input_array["member_id"]; 
$order_code = $input_array["order_code"]; 
$shopping_status = $input_array["shopping_status"]; 
$shopping_approve = $input_array["shopping_approve"]; 
$payment_type = $input_array["payment_type"]; 

$payment_status = $input_array["payment_status"]; 
$payment_approve = $input_array["payment_approve"]; 
$option_status = $input_array["option_status"]; 



//// sql command
if ($shopping_id != "") 						{ $sql_shopping_id 			=	" and		shopping_id = '$shopping_id' " ; }
if ($cart_session_id != "") 					{ $sql_cart_session_id 			=	" and		cart_session_id = '$cart_session_id' " ; }
if ($member_id != "") 						{ $sql_member_id 					=	" and		member_id = '$member_id' " ; }
if ($order_code != "") 						{ $sql_order_code 					=	" and		order_code = '$order_code' " ; }
if ($shopping_status != "") 					{ $sql_shopping_status 			=	" and		shopping_status = '$shopping_status' " ; }
if ($shopping_approve != "") 				{ $sql_shopping_approve 			=	" and		shopping_approve = '$shopping_approve' " ; }
if ($payment_type != "") 						{ $sql_payment_type 				=	" and		payment_type = '$payment_type' " ; }

if ($payment_status != "") 					{ $sql_payment_status 				=	" and		payment_status = '$payment_status' " ; }
if ($payment_approve != "") 				{ $sql_payment_approve 			=	" and		payment_approve = '$payment_approve' " ; }
if ($option_status != "")  						{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }



$sql_command = "
select			*
from 			app_shoppingcart_item
where 		system_delete = 'none' 

$sql_shopping_id
$sql_cart_session_id
$sql_member_id
$sql_order_code
$sql_shopping_status
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





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyid
*/
function function_viewbyid($input_array){

$item_id = $input_array["item_id"];

$sql_command = "
select 		* 
from			app_shoppingcart_item
where		system_delete= 'none'
and			item_id = '$item_id'

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
}



function function_viewbyid_sql($input_array){

$sql_other = $input_array["sql_other"];

if ($sql_other != "" ){ 

$sql_command = "
select 		* 
from			app_shoppingcart_item
where		system_delete= 'none'

$sql_other

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;

} /// sql_other
} /// function




/*
#################################################### end view  +++
*/





/*
#################################################### start update  +++
*/


function function_update($input_array){		

//// request
$item_id = $input_array["item_id"]; 
$cart_session_id = $input_array["cart_session_id"]; 
$shopping_id = $input_array["shopping_id"]; 
$member_id = $input_array["member_id"]; 
$product_id = $input_array["product_id"]; 
$product_type = $input_array["product_type"]; 

$shopping_option1 = $input_array["shopping_option1"]; 
$shopping_option2 = $input_array["shopping_option2"]; 
$shopping_option3 = $input_array["shopping_option3"]; 
$shopping_unit = $input_array["shopping_unit"]; 
$shopping_unit_person = $input_array["shopping_unit_person"]; 
$shopping_unit_kid = $input_array["shopping_unit_kid"]; 
$shopping_unit_room = $input_array["shopping_unit_room"]; 
$shopping_unit_day = $input_array["shopping_unit_day"]; 

$shopping_date_start = $input_array["shopping_date_start"]; 
$shopping_date_end = $input_array["shopping_date_end"]; 
$shopping_comment = $input_array["shopping_comment"]; 

$price_cost = $input_array["price_cost"]; 
$price_normal = $input_array["price_normal"]; 
$price_special = $input_array["price_special"]; 
$price_confirm = $input_array["price_confirm"]; 

$price_fix_option_person = $input_array["price_fix_option_person"]; 
$price_fix_option_kid = $input_array["price_fix_option_kid"]; 
$price_week = $input_array["price_week"]; 
$price_week_option_person = $input_array["price_week_option_person"]; 
$price_week_option_kid = $input_array["price_week_option_kid"]; 

$price_month = $input_array["price_month"]; 
$price_month_option_person = $input_array["price_month_option_person"]; 
$price_month_option_kid = $input_array["price_month_option_kid"]; 

$option_reserve_cal = $input_array["option_reserve_cal"]; 
$option_priceby_month = $input_array["option_priceby_month"]; 
$option_priceby_week = $input_array["option_priceby_week"]; 
$option_priceby_day = $input_array["option_priceby_day"]; 

$unit_month = $input_array["unit_month"]; 
$unit_week = $input_array["unit_week"]; 
$unit_day = $input_array["unit_day"]; 
$unit_person = $input_array["unit_person"]; 
$unit_person_option = $input_array["unit_person_option"]; 
$unit_kid = $input_array["unit_kid"]; 
$unit_kid_option = $input_array["unit_kid_option"]; 


$shopping_status = $input_array["shopping_status"]; 
$shopping_approve = $input_array["shopping_approve"]; 
$payment_approve = $input_array["payment_approve"]; 
$option_status = $input_array["option_status"]; 

$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"];




//// sql config
$check_process = "insert" ; 
if ($item_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_shoppingcart_item
where 		system_delete = 'none'
and			item_id = '$item_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$item_id = $result_array["item_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_shoppingcart_item ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "item" ;
$input_idnow =  $cmd_check_record + 1 ; 
$item_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_shoppingcart_item ( 
item_id , 
cart_session_id , 
shopping_id , 
member_id , 

product_id , 
product_type , 
shopping_status , 
shopping_approve , 
payment_status , 
payment_approve , 

option_status , 
system_delete , 
datetime_create 
)

values (
'$item_id'  , 
'$cart_session_id'  , 
'$shopping_id'  , 
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
//// print $sql_command ;  
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 


if ($cart_session_id != "" ) 						{ $sql_cart_session_id 					= " cart_session_id = '$cart_session_id' ,  "; }
if ($shopping_id != "" ) 							{ $sql_shopping_id 						= " shopping_id = '$shopping_id' ,  "; }
if ($member_id != "" ) 							{ $sql_member_id 							= " member_id = '$member_id' ,  "; }

if ($product_id != "" )								{ $sql_product_id 							= " product_id = '$product_id' ,  "; }
if ($product_type != "" )							{ $sql_product_type 						= " product_type = '$product_type' ,  "; }
if ($shopping_option1 != "" )					{ $sql_shopping_option1 				= " shopping_option1 = '$shopping_option1' ,  "; }
if ($shopping_option2 != "" )					{ $sql_shopping_option2 				= " shopping_option2 = '$shopping_option2' ,  "; }
if ($shopping_option3 != "" )					{ $sql_shopping_option3 				= " shopping_option3 = '$shopping_option3' ,  "; }

if ($shopping_unit != "" )							{ $sql_shopping_unit 						= " shopping_unit = '$shopping_unit' ,  "; }
if ($shopping_unit_person != "" )				{ $sql_shopping_unit_person 			= " shopping_unit_person = '$shopping_unit_person' ,  "; }
if ($shopping_unit_kid != "" )					{ $sql_shopping_unit_kid 				= " shopping_unit_kid = '$shopping_unit_kid' ,  "; }
if ($shopping_unit_room != "" )				{ $sql_shopping_unit_room 			= " shopping_unit_room = '$shopping_unit_room' ,  "; }
if ($shopping_unit_day != "" )					{ $sql_shopping_unit_day 				= " shopping_unit_day = '$shopping_unit_day' ,  "; }
if ($shopping_date_start != "" )				{ $sql_shopping_date_start 			= " shopping_date_start = '$shopping_date_start' ,  "; }
if ($shopping_date_end != "" )					{ $sql_shopping_date_end 				= " shopping_date_end = '$shopping_date_end' ,  "; }
if ($shopping_comment != "" )					{ $sql_shopping_comment 				= " shopping_comment = '$shopping_comment' ,  "; }

if ($price_cost != "" )								{ $sql_price_cost 							= " price_cost = '$price_cost' ,  "; }
if ($price_normal != "" )							{ $sql_price_normal 						= " price_normal = '$price_normal' ,  "; }
if ($price_special != "" )							{ $sql_price_special 						= " price_special = '$price_special' ,  "; }
if ($price_confirm != "" )							{ $sql_price_confirm 						= " price_confirm = '$price_confirm' ,  "; }

////
if ($price_fix_option_person != "" )			{ $sql_price_fix_option_person 		= " price_fix_option_person = '$price_fix_option_person' ,  "; }
if ($price_fix_option_kid != "" )				{ $sql_price_fix_option_kid 				= " price_fix_option_kid = '$price_fix_option_kid' ,  "; }
if ($price_week != "" )							{ $sql_price_week 							= " price_week = '$price_week' ,  "; }
if ($price_week_option_person != "" )		{ $sql_price_week_option_person 	= " price_week_option_person = '$price_week_option_person' ,  "; }
if ($price_week_option_kid != "" )			{ $sql_price_week_option_kid 			= " price_week_option_kid = '$price_week_option_kid' ,  "; }
if ($price_month != "" )							{ $sql_price_month 						= " price_month = '$price_month' ,  "; }
if ($price_month_option_person != "" )		{ $sql_price_month_option_person 	= " price_month_option_person = '$price_month_option_person' ,  "; }
if ($price_month_option_kid != "" )			{ $sql_price_month_option_kid 		= " price_month_option_kid = '$price_month_option_kid' ,  "; }


if ($option_reserve_cal != "" )					{ $sql_option_reserve_cal 			= " option_reserve_cal = '$option_reserve_cal' ,  "; }
if ($option_priceby_month != "" )				{ $sql_option_priceby_month 			= " option_priceby_month = '$option_priceby_month' ,  "; }
if ($option_priceby_week != "" )				{ $sql_option_priceby_week 			= " option_priceby_week = '$option_priceby_week' ,  "; }
if ($option_priceby_day != "" )					{ $sql_option_priceby_day 				= " option_priceby_day = '$option_priceby_day' ,  "; }


if ($unit_month != "" )								{ $sql_unit_month 							= " unit_month = '$unit_month' ,  "; }
if ($unit_week != "" )								{ $sql_unit_week 							= " unit_week = '$unit_week' ,  "; }
if ($unit_day != "" )									{ $sql_unit_day 								= " unit_day = '$unit_day' ,  "; }
if ($unit_person != "" )							{ $sql_unit_person 							= " unit_person = '$unit_person' ,  "; }
if ($unit_person_option != "" )					{ $sql_unit_person_option 				= " unit_person_option = '$unit_person_option' ,  "; }
if ($unit_kid != "" )									{ $sql_unit_kid 								= " unit_kid = '$unit_kid' ,  "; }
if ($unit_kid_option != "" )						{ $sql_unit_kid_option 					= " unit_kid_option = '$unit_kid_option' ,  "; }



if ($shopping_status != "" )						{ $sql_shopping_status 					= " shopping_status = '$shopping_status' ,  "; }
if ($shopping_approve != "" )					{ $sql_shopping_approve 				= " shopping_approve = '$shopping_approve' ,  "; }
if ($payment_status != "" )						{ $sql_payment_status 					= " payment_status = '$payment_status' ,  "; }
if ($payment_approve != "" )					{ $sql_payment_approve 				= " payment_approve = '$payment_approve' ,  "; }
if ($option_status != "" )							{ $sql_option_status 						= " option_status = '$option_status' ,  "; }

/*
if ($datetime_order != "" ) 						{ $sql_datetime_order 					= " datetime_order = '$datetime_order' ,  "; }
if ($datetime_approve != "" ) 					{ $sql_datetime_approve					= " datetime_approve = '$datetime_approve' ,  "; }
if ($datetime_payment != "" ) 					{ $sql_datetime_payment 				= " datetime_payment = '$datetime_payment' ,  "; }
if ($datetime_payment_approve != "" ) 	{ $sql_datetime_payment_approve 	= " datetime_payment_approve = '$datetime_payment_approve' ,  "; }
*/




/// update start
$sql_command="  
update   app_shoppingcart_item  

set  
$sql_cart_session_id
$sql_shopping_id
$sql_member_id

$sql_product_id
$sql_product_type
$sql_shopping_option1
$sql_shopping_option2
$sql_shopping_option3

$sql_shopping_unit
$sql_shopping_unit_person
$sql_shopping_unit_kid
$sql_shopping_unit_room

$sql_shopping_unit_day
$sql_shopping_date_start
$sql_shopping_date_end
$sql_shopping_comment

$sql_price_cost
$sql_price_normal
$sql_price_special
$sql_price_confirm

$sql_price_fix_option_person
$sql_price_fix_option_kid
$sql_price_week
$sql_price_week_option_person
$sql_price_week_option_kid
$sql_price_month
$sql_price_month_option_person
$sql_price_month_option_kid

$sql_option_reserve_cal
$sql_option_priceby_month
$sql_option_priceby_week
$sql_option_priceby_day

$sql_unit_month
$sql_unit_week
$sql_unit_day
$sql_unit_person
$sql_unit_person_option
$sql_unit_kid
$sql_unit_kid_option


$sql_shopping_status
$sql_shopping_approve
$sql_payment_status
$sql_payment_approve
$sql_option_status


datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			item_id = '$item_id'

"; 

/// print "$sql_command <br>";

$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }
$result_return = array(
"show_status"=>"$show_status" , 
"item_id"=>"$item_id" , 
);
return $result_return ;	

} //// end




function  function_update_bysql($input_array){	

$sql_update = $input_array["sql_update"]; 
$sql_where = $input_array["sql_where"]; 

if ($sql_update != ""  and  $sql_where  ) { 
$sql_command = "	
update  app_shoppingcart_item   

set    
$sql_update
datetime_update = '$datetime_now'  

where  
$sql_where

";		
/// print "$sql_command <br><br>"; 
$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
);
return $result_return ;	

}






/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$item_id = $input_array["item_id"]; 

$order_code = $input_array["order_code"]; 

$shopping_status = $input_array["shopping_status"]; 
$shopping_approve = $input_array["shopping_approve"]; 
$shopping_comment = $input_array["shopping_comment"]; 
$payment_type = $input_array["payment_type"]; 
$payment_status = $input_array["payment_status"]; 
$payment_approve = $input_array["payment_approve"]; 

$option_status = $input_array["option_status"]; 
$datetime_order = $input_array["datetime_order"]; 
$datetime_approve = $input_array["datetime_approve"]; 
$datetime_payment = $input_array["datetime_payment"]; 
$datetime_payment_approve = $input_array["datetime_payment_approve"]; 
$datetime_now = $input_array["datetime_now"];


if ($shopping_status != "" )						{ $sql_shopping_status 					= " shopping_status = '$shopping_status' ,  "; }
if ($shopping_approve != "" )					{ $sql_shopping_approve 				= " shopping_approve = '$shopping_approve' ,  "; }
if ($shopping_comment != "" )					{ $sql_shopping_comment 				= " shopping_comment = '$shopping_comment' ,  "; }
if ($payment_type != "" )							{ $sql_payment_type 						= " payment_type = '$payment_type' ,  "; }
if ($payment_status != "" )						{ $sql_payment_status 					= " payment_status = '$payment_status' ,  "; }
if ($payment_approve != "" )					{ $sql_payment_approve 				= " payment_approve = '$payment_approve' ,  "; }
if ($option_status != "" )							{ $sql_option_status 						= " option_status = '$option_status' ,  "; }

if ($datetime_order != "" ) 						{ $sql_datetime_order 					= " datetime_order = '$datetime_order' ,  "; }
if ($datetime_approve != "" ) 					{ $sql_datetime_approve					= " datetime_approve = '$datetime_approve' ,  "; }
if ($datetime_payment != "" ) 					{ $sql_datetime_payment 				= " datetime_payment = '$datetime_payment' ,  "; }
if ($datetime_payment_approve != "" ) 	{ $sql_datetime_payment_approve 	= " datetime_payment_approve = '$datetime_payment_approve' ,  "; }



if ($item_id != "" ) {  /// check id
$sql_command = "	
update  app_shoppingcart_item   

set    
$sql_order_code

$sql_shopping_status
$sql_shopping_approve
$sql_shopping_comment
$sql_payment_type
$sql_payment_status
$sql_payment_approve
$sql_option_status

$sql_datetime_order
$sql_datetime_approve
$sql_datetime_payment
$sql_datetime_payment_approve

datetime_update = '$datetime_now'  

where  
item_id = '$item_id'    

";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"item_id"=>"$item_id" , 
);
return $result_return ;	
		
} /// 






/*
#################################################### start delete  +++
*/
function  function_delete($input_array){	

$item_id = $input_array["item_id"]; 
$sql_other = $input_array["sql_other"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($item_id != "" or $sql_other != "" ) { 
$sql_command = "	
update  	app_shoppingcart_item   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
item_id = '$item_id'  
$sql_other

";		

//// print $sql_command ; 

$result_update = $this->db->Execute($sql_command);	


} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"item_id"=>"$item_id" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>