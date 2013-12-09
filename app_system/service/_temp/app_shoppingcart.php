<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_shoppingcart
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_shoppingcart.inc.php
 */

class  app_shoppingcart{	
				
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
function app_shoppingcart(){
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

$sql_other 		= $input_array["sql_other"];

$cart_session_id = $input_array["cart_session_id"]; 
$member_id = $input_array["member_id"]; 

$order_code = $input_array["order_code"]; 
$shopping_status = $input_array["shopping_status"]; 
$shopping_approve = $input_array["shopping_approve"]; 
$payment_type = $input_array["payment_type"]; 

$payment_status = $input_array["payment_status"]; 
$payment_approve = $input_array["payment_approve"]; 
$option_status = $input_array["option_status"]; 


//// sql command
if ($cart_session_id != "") 					{ $sql_cart_session_id 			=	" and		cart_session_id = '$cart_session_id' " ; }
if ($member_id != "") 						{ $sql_member_id 					=	" and		member_id = '$member_id' " ; }
if ($order_code != "") 						{ $sql_order_code 					=	" and		order_code = '$order_code' " ; }
if ($shopping_status != "") 					{ $sql_shopping_status 			=	" and		shopping_status = '$shopping_status' " ; }
if ($shopping_approve != "") 				{ $sql_shopping_approve 		=	" and		shopping_approve = '$shopping_approve' " ; }
if ($payment_type != "") 						{ $sql_payment_type 				=	" and		payment_type = '$payment_type' " ; }

if ($payment_status != "") 					{ $sql_payment_status 			=	" and		payment_status = '$payment_status' " ; }
if ($payment_approve != "") 				{ $sql_payment_approve 		=	" and		payment_approve = '$payment_approve' " ; }
if ($option_status != "")  						{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_shoppingcart
where			system_delete = 'none'  

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

/// print "sql_command = $sql_command <br>";

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

$cart_session_id = $input_array["cart_session_id"]; 
$member_id = $input_array["member_id"]; 
$order_code = $input_array["order_code"]; 
$shopping_status = $input_array["shopping_status"]; 
$shopping_approve = $input_array["shopping_approve"]; 
$payment_type = $input_array["payment_type"]; 

$payment_status = $input_array["payment_status"]; 
$payment_approve = $input_array["payment_approve"]; 
$option_status = $input_array["option_status"]; 



//// sql command
if ($cart_session_id != "") 					{ $sql_cart_session_id 			=	" and		cart_session_id = '$cart_session_id' " ; }
if ($member_id != "") 						{ $sql_member_id 					=	" and		member_id = '$member_id' " ; }
if ($order_code != "") 						{ $sql_order_code 					=	" and		order_code = '$order_code' " ; }
if ($shopping_status != "") 					{ $sql_shopping_status 			=	" and		shopping_status = '$shopping_status' " ; }
if ($shopping_approve != "") 				{ $sql_shopping_approve 		=	" and		shopping_approve = '$shopping_approve' " ; }
if ($payment_type != "") 						{ $sql_payment_type 				=	" and		payment_type = '$payment_type' " ; }

if ($payment_status != "") 					{ $sql_payment_status 			=	" and		payment_status = '$payment_status' " ; }
if ($payment_approve != "") 				{ $sql_payment_approve 		=	" and		payment_approve = '$payment_approve' " ; }
if ($option_status != "")  						{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }



$sql_command = "
select			*
from 			app_shoppingcart
where 		system_delete = 'none' 

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

//// print "sql_command = $sql_command <br>";

$result_array = $this->db->SelectLimit($sql_command,$set_pager_limit,$set_pager_start );
return $result_array ;

} ///////////





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyid
*/
function function_viewbyid($input_array){

$shopping_id = $input_array["shopping_id"];

$sql_command = "
select 		* 
from			app_shoppingcart
where		system_delete= 'none'
and			shopping_id = '$shopping_id'

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
}



function function_viewbyid_sql($input_array){

$sql_other = $input_array["sql_other"];

if ($sql_other != "" ){ 

$sql_command = "
select 		* 
from			app_shoppingcart
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
$shopping_id = $input_array["shopping_id"]; 

$cart_session_id = $input_array["cart_session_id"]; 
$member_id = $input_array["member_id"]; 
$order_code = $input_array["order_code"]; 
$summary_price = $input_array["summary_price"]; 
$summary_price_confirm = $input_array["summary_price_confirm"]; 

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




//// sql config

$check_process = "insert" ; 
if ($shopping_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_shoppingcart
where 		system_delete = 'none'
and			shopping_id = '$shopping_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$shopping_id = $result_array["shopping_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_shoppingcart ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "shopping" ;
$input_idnow =  $cmd_check_record + 1 ; 
$shopping_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_shoppingcart ( 
shopping_id , 
cart_session_id , 
member_id , 

shopping_status , 
shopping_approve , 
payment_type , 
payment_status , 
payment_approve , 

option_status , 
system_delete , 
datetime_create 
)
				
values (
'$shopping_id'  , 
'$cart_session_id'  , 
'$member_id'  , 

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
//// print $sql_command ;  
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 


if ($cart_session_id != "" ) 						{ $sql_cart_session_id 					= " cart_session_id = '$cart_session_id' ,  "; }
if ($member_id != "" ) 							{ $sql_member_id 							= " member_id = '$member_id' ,  "; }

if ($order_code != "" ) 							{ $sql_order_code 							= " order_code = '$order_code' ,  "; }
if ($summary_price != "" ) 						{ $sql_summary_price 					= " summary_price = '$summary_price' ,  "; }
if ($summary_price_confirm != "" )			{ $sql_summary_price_confirm 		= " summary_price_confirm = '$summary_price_confirm' ,  "; }

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



/// update start
$sql_command="  
update   app_shoppingcart  

set  
$sql_cart_session_id
$sql_member_id

$sql_order_code
$sql_summary_price
$sql_summary_price_confirm

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

where		system_delete = 'none'
and			shopping_id = '$shopping_id'

"; 
 
//// print "$sql_command <br>"; 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"shopping_id"=>"$shopping_id" , 
);
return $result_return ;	

} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$shopping_id = $input_array["shopping_id"]; 

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



if ($shopping_id != "" ) {  /// check id
$sql_command = "	
update  app_shoppingcart   

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
shopping_id = '$shopping_id'    

";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"shopping_id"=>"$shopping_id" , 
);
return $result_return ;	
		
} /// 






/*
#################################################### start delete  +++
*/
function  function_delete($input_array){	

$shopping_id = $input_array["shopping_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($shopping_id != "" ) { 
$sql_command = "	
update  	app_shoppingcart   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
shopping_id = '$shopping_id'  

";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"shopping_id"=>"$shopping_id" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>