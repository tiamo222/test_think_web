<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_payment_log
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_payment_log.inc.php
 */

class  app_payment_log{	
				
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
function app_payment_log(){
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
$booking_id =  $input_array["booking_id"]; 
$member_id = $input_array["member_id"]; 

$payment_type = $input_array["payment_type"]; 
$payment_status = $input_array["payment_status"]; 
$payment_approve = $input_array["payment_approve"]; 
$option_status = $input_array["option_status"]; 


//// sql command
if ($booking_session_id != "") 				{ $sql_booking_session_id 		=	" and		booking_session_id = '$booking_session_id' " ; }
if ($booking_id != "") 							{ $sql_booking_id 					=	" and		booking_id = '$booking_id' " ; }
if ($member_id != "") 						{ $sql_member_id 					=	" and		member_id = '$member_id' " ; }

if ($payment_type != "") 						{ $sql_payment_type 				=	" and		payment_type = '$payment_type' " ; }
if ($payment_status != "") 					{ $sql_payment_status 			=	" and		payment_status = '$payment_status' " ; }
if ($payment_approve != "") 				{ $sql_payment_approve 		=	" and		payment_approve = '$payment_approve' " ; }
if ($option_status != "")  						{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_payment_log
where			system_delete = 'none'  


$sql_booking_session_id
$sql_booking_id
$sql_member_id

$sql_payment_type
$sql_payment_status
$sql_payment_approve
$sql_option_status

$sql_other

";	

/// print "sql_command = $sql_command <br><br>";

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
$booking_id =  $input_array["booking_id"]; 
$member_id = $input_array["member_id"]; 

$payment_type = $input_array["payment_type"]; 
$payment_status = $input_array["payment_status"]; 
$payment_approve = $input_array["payment_approve"]; 
$option_status = $input_array["option_status"]; 


//// sql command
if ($booking_session_id != "") 				{ $sql_booking_session_id 		=	" and		booking_session_id = '$booking_session_id' " ; }
if ($booking_id != "") 							{ $sql_booking_id 					=	" and		booking_id = '$booking_id' " ; }
if ($member_id != "") 						{ $sql_member_id 					=	" and		member_id = '$member_id' " ; }

if ($payment_type != "") 						{ $sql_payment_type 				=	" and		payment_type = '$payment_type' " ; }
if ($payment_status != "") 					{ $sql_payment_status 			=	" and		payment_status = '$payment_status' " ; }
if ($payment_approve != "") 				{ $sql_payment_approve 		=	" and		payment_approve = '$payment_approve' " ; }
if ($option_status != "")  						{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }




$sql_command = "
select			*
from 			app_payment_log
where 		system_delete = 'none' 

$sql_booking_session_id
$sql_booking_id
$sql_member_id

$sql_payment_type
$sql_payment_status
$sql_payment_approve
$sql_option_status

$sql_other
$sql_orderby

";		

///print "sql_command = $sql_command <br><br>";

$result_array = $this->db->SelectLimit($sql_command,$set_pager_limit,$set_pager_start );
return $result_array ;

} ///////////






function function_viewbyid($input_array){
$payment_log_id = $input_array["payment_log_id"];
if ($payment_log_id != "" ){ 
$sql_command = "
select 		* 
from			app_payment_log
where		system_delete= 'none'
and			payment_log_id = '$payment_log_id'

";	

/// print "sql_command = $sql_command <br>";

$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;

} 
} /// end function






function function_viewbyid_sql($input_array){
$sql_other = $input_array["sql_other"];
if ($sql_other != "" ){ 
$sql_command = "
select 		* 
from			app_payment_log
where		system_delete= 'none'

$sql_other
";	

//// print "sql_command = $sql_command <br>";

$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
} /// sql_other
} /// end function








function function_update($input_array){		

//// request
$payment_log_id = $input_array["payment_log_id"]; 
$booking_session_id = $input_array["booking_session_id"]; 
$booking_id = $input_array["booking_id"]; 
$member_id = $input_array["member_id"]; 

$payment_type = $input_array["payment_type"]; 
$payment_status = $input_array["payment_status"]; 
$payment_approve = $input_array["payment_approve"]; 
$payment_comment = $input_array["payment_comment"]; 

$payment_ipaddress = $input_array["payment_ipaddress"]; 
$paysbuy_PaymentResult = $input_array["paysbuy_PaymentResult"]; 
$paysbuy_PaymentApCode = $input_array["paysbuy_PaymentApCode"]; 
$paysbuy_PaymentAmt = $input_array["paysbuy_PaymentAmt"]; 
$paysbuy_PaymentMethod = $input_array["paysbuy_PaymentMethod"];

$paysbuy_PaymentDate = $input_array["paysbuy_PaymentDate"]; 
$paysbuy_PaymentInvoice = $input_array["paysbuy_PaymentInvoice"]; 
$paysbuy_PaymentStatus = $input_array["paysbuy_PaymentStatus"]; 

$datetime_payment = $input_array["datetime_payment"]; 
$datetime_payment_approve = $input_array["datetime_payment_approve"]; 
$datetime_payment_postback = $input_array["datetime_payment_postback"]; 
$option_status = $input_array["option_status"]; 



//// sql config
$check_process = "insert" ; 
if ($payment_log_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_payment_log
where 		system_delete = 'none'
and			payment_log_id = '$payment_log_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$payment_log_id = $result_array["payment_log_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_payment_log ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "log" ;
$input_idnow =  $cmd_check_record + 1 ; 
$payment_log_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_payment_log ( 
payment_log_id , 
booking_session_id , 
member_id , 

option_status , 
system_delete , 
datetime_create 
)

values (
'$payment_log_id'  , 
'$booking_session_id'  , 
'$member_id'  , 

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
if ($booking_id != "" )								{ $sql_booking_id 							= " booking_id = '$booking_id' ,  "; }
if ($member_id != "" ) 							{ $sql_member_id 							= " member_id = '$member_id' ,  "; }

if ($payment_type != "" )							{ $sql_payment_type 						= " payment_type = '$payment_type' ,  "; }
if ($payment_price != "" )						{ $sql_payment_price 					= " payment_price = '$payment_price' ,  "; }
if ($payment_status != "" )						{ $sql_payment_status 					= " payment_status = '$payment_status' ,  "; }
if ($payment_approve != "" )					{ $sql_payment_approve 				= " payment_approve = '$payment_approve' ,  "; }
if ($payment_comment != "" )					{ $sql_payment_comment 				= " payment_comment = '$payment_comment' ,  "; }
if ($payment_ipaddress != "" )					{ $sql_payment_ipaddress 				= " payment_ipaddress = '$payment_ipaddress' ,  "; }
if ($option_status != "" )							{ $sql_option_status 						= " option_status = '$option_status' ,  "; }

if ($paysbuy_PaymentResult != "" )			{ $sql_paysbuy_PaymentResult 		= " paysbuy_PaymentResult = '$paysbuy_PaymentResult' ,  "; }
if ($paysbuy_PaymentApCode != "" )		{ $sql_paysbuy_PaymentApCode 		= " paysbuy_PaymentApCode = '$paysbuy_PaymentApCode' ,  "; }
if ($paysbuy_PaymentAmt != "" )				{ $sql_paysbuy_PaymentAmt 			= " paysbuy_PaymentAmt = '$paysbuy_PaymentAmt' ,  "; }
if ($paysbuy_PaymentMethod != "" )			{ $sql_paysbuy_PaymentMethod 		= " paysbuy_PaymentMethod = '$paysbuy_PaymentMethod' ,  "; }

if ($paysbuy_PaymentDate != "" )				{ $sql_paysbuy_PaymentDate 			= " paysbuy_PaymentDate = '$paysbuy_PaymentDate' ,  "; }
if ($paysbuy_PaymentInvoice != "" )			{ $sql_paysbuy_PaymentInvoice 		= " paysbuy_PaymentInvoice = '$paysbuy_PaymentInvoice' ,  "; }
if ($paysbuy_PaymentStatus != "" )			{ $sql_paysbuy_PaymentStatus 		= " paysbuy_PaymentStatus = '$paysbuy_PaymentStatus' ,  "; }

////date
if ($datetime_payment != "" ) 					{ $sql_datetime_payment 				= " datetime_payment = '$datetime_payment' ,  "; }
if ($datetime_payment_approve != "" )		{ $sql_datetime_payment_approve	= " datetime_payment_approve = '$datetime_payment_approve' ,  "; }
if ($datetime_payment_postback != "" ) 	{ $sql_datetime_payment_postback 	= " datetime_payment_postback = '$datetime_payment_postback' ,  "; }




/// update start
$sql_command="  
update   
app_payment_log  

set  
$sql_booking_session_id
$sql_booking_id
$sql_payment_type
$sql_payment_price
$sql_payment_status
$sql_payment_approve
$sql_payment_comment
$sql_payment_ipaddress
$sql_option_status
$sql_paysbuy_PaymentResult
$sql_paysbuy_PaymentApCode
$sql_paysbuy_PaymentAmt
$sql_paysbuy_PaymentMethod
$sql_paysbuy_PaymentDate
$sql_paysbuy_PaymentInvoice
$sql_paysbuy_PaymentStatus
$sql_datetime_payment
$sql_datetime_payment_approve
$sql_datetime_payment_postback

datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			payment_log_id = '$payment_log_id'

"; 

/// print "$sql_command <br>";
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }
$result_return = array(
"show_status"=>"$show_status" , 
"payment_log_id"=>"$payment_log_id" , 
);
return $result_return ;	

} //// end




function  function_update_bysql($input_array){	

$sql_update = $input_array["sql_update"]; 
$sql_where = $input_array["sql_where"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($sql_update != ""  and  $sql_where  ) { 
$sql_command = "	
update  app_payment_log   

set    
$sql_update
datetime_update = '$datetime_now'  

where  
$sql_where

";		
//// print "sql_command = $sql_command <br>";
$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }
$result_return = array(
"show_status"=>"$show_status" , 
);
return $result_return ;	

}












function  function_update_option($input_array){	

//// request
$payment_log_id = $input_array["payment_log_id"]; 

$booking_status = $input_array["booking_status"]; 
$booking_approve = $input_array["booking_approve"]; 
$datetime_now = $input_array["datetime_now"];


if ($booking_status != "" )		{ $sql_booking_status			= " booking_status = '$booking_status' ,  "; }
if ($booking_approve != "" )	{ $sql_booking_approve		= " booking_approve = '$booking_approve' ,  "; }
if ($booking_comment != "" )	{ $sql_booking_comment	= " booking_comment = '$booking_comment' ,  "; }


if ($payment_log_id != "" ) {  /// check id
$sql_command = "	
update  app_payment_log   

set    
$sql_order_code

$sql_booking_status
$sql_option_status

$sql_datetime_order
$sql_datetime_approve
$sql_datetime_payment
$sql_datetime_payment_approve

datetime_update = '$datetime_now'  

where  
payment_log_id = '$payment_log_id'    

";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"payment_log_id"=>"$payment_log_id" , 
);
return $result_return ;	
		
} /// 













/*
#################################################### start delete  +++
*/
function  function_delete($input_array){	

$payment_log_id = $input_array["payment_log_id"]; 
$sql_other = $input_array["sql_other"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($payment_log_id != "" ) { 
$sql_command = "	
update  	app_payment_log   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
payment_log_id = '$payment_log_id'  
$sql_other

";		

//// print $sql_command ; 

$result_update = $this->db->Execute($sql_command);	


} ////// input

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"payment_log_id"=>"$payment_log_id" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>