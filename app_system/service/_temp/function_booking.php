<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_booking
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_booking.inc.php
 */

class  function_booking{	
				
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
function function_booking(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}









/// ########################################
function  function_booking_summary($input_array){	

$booking_id = $input_array["booking_id"]; 
$booking_process = $input_array["booking_process"]; 
$option_showbug = $input_array["option_showbug"]; 

/*
/// booking_process
booking_preorder
booking_confirm
booking_update
*/


if ($booking_id != ""  ){ 
$sql_command = " 
select  		*
from  		app_booking
where 		system_delete = 'none'
and			booking_id = '$booking_id'
 ";
$rs_booking = $this->db->GetRow($sql_command);
if ($rs_booking){ 

$booking_id = $rs_booking["booking_id"];
$booking_session_id = $rs_booking["booking_session_id"];
$member_id = $rs_booking["member_id"];
$product_id = $rs_booking["product_id"];

$booking_type_room = $rs_booking["booking_type_room"];
$booking_type_bed = $rs_booking["booking_type_bed"];
$booking_option1 = $rs_booking["booking_option1"];
$booking_option2 = $rs_booking["booking_option2"];
$booking_option3 = $rs_booking["booking_option3"];

$booking_unit_room = $rs_booking["booking_unit_room"];
$booking_date_start = $rs_booking["booking_date_start"];
$booking_date_end = $rs_booking["booking_date_end"];
$booking_unit_day = $rs_booking["booking_unit_day"];
$unit_month = $rs_booking["unit_month"];
$unit_day = $rs_booking["unit_day"];
$unit_week = $rs_booking["unit_week"];

$unit_person = $rs_booking["unit_person"];
$unit_person_option = $rs_booking["unit_person_option"];
$unit_kid = $rs_booking["unit_kid"];
$unit_kid_option = $rs_booking["unit_kid_option"];

$booking_comment = $rs_booking["booking_comment"];
/// $summary_price = $rs_booking["summary_price"];
$booking_status = $rs_booking["booking_status"];
} ///if ($rs_booking){ 





if ($product_id != ""  ){ 

/// booking_preorder
/// booking_confirm
if ($booking_process =="booking_preorder" or  $booking_process =="booking_confirm" ){ 

$sql_command = " 
select  		*
from  		app_property
where 		system_delete = 'none'
and			property_id = '$product_id'
 ";
$rs_property = $this->db->GetRow($sql_command);
} ///



/// booking_update
if ($booking_process =="booking_update"  ){ 
$sql_command = " 
select  		*
from  		app_booking_detail
where 		system_delete = 'none'
and			booking_id = '$booking_id'
 ";
$rs_property = $this->db->GetRow($sql_command);
} 


if ($rs_property){ 
$property_id = $rs_property["property_id"];
$property_code = $rs_property["property_code"];
$property_name = $rs_property["property_name"];
$property_des = $rs_property["property_des"];
$property_address = $rs_property["property_address"];

$property_amount_room = $rs_property["property_amount_room"];
$option_reserve = $rs_property["option_reserve"];
$option_reserve_atleast = $rs_property["option_reserve_atleast"];

$option_price = $rs_property["option_price"];
$price_normal = $rs_property["price_normal"];
$price_special = $rs_property["price_special"];
$price_fix_option_person  = $rs_property["price_fix_option_person"];
$price_fix_option_kid  = $rs_property["price_fix_option_kid"];
$price_week = $rs_property["price_week"];
$price_week_option_person = $rs_property["price_week_option_person"];
$price_week_option_kid = $rs_property["price_week_option_kid"];
$price_month = $rs_property["price_month"];
$price_month_option_person = $rs_property["price_month_option_person"];
$price_month_option_kid = $rs_property["price_month_option_kid"];

$price_rank_start = $rs_property["price_rank_start"];
$price_rank_top = $rs_property["price_rank_top"];

/// update
$option_reserve_cal  = $rs_property["option_reserve_cal"];
$option_reserveby_amount_room = $rs_property["option_reserveby_amount_room"];
$option_reserveby_amount_person = $rs_property["option_reserveby_amount_person"];
$option_reserveby_amount_kid = $rs_property["option_reserveby_amount_kid"];
$option_reserveby_typeroom = $rs_property["option_reserveby_typeroom"];
$option_reserveby_typebed = $rs_property["option_reserveby_typebed"];

$amount_limit_person = $rs_property["amount_limit_person"];
$amount_limit_kid = $rs_property["amount_limit_kid"];
$amount_limit_option_person = $rs_property["amount_limit_option_person"];
$amount_limit_option_kid = $rs_property["amount_limit_option_kid"];
$property_reserve_atleast_day = $rs_property["property_reserve_atleast_day"];
$property_reserve_atleast_month = $rs_property["property_reserve_atleast_month"];
$property_reserve_atleast_year = $rs_property["property_reserve_atleast_year"];
$option_reserve_cal = $rs_property["option_reserve_cal"];

//// check by day role
$option_priceby_day = $rs_property["option_priceby_day"];
$option_priceby_week = $rs_property["option_priceby_week"];
$option_priceby_month = $rs_property["option_priceby_month"];

$option_reserve_atleast  = $rs_property["option_reserve_atleast"];
$option_reserve_atleast_case  = $rs_property["option_reserve_atleast_case"];
$property_reserve_atleast_day  = $rs_property["property_reserve_atleast_day"];
$property_reserve_atleast_week  = $rs_property["property_reserve_atleast_week"];
$property_reserve_atleast_month  = $rs_property["property_reserve_atleast_month"];

/// update end
$option_calendar  = $rs_property["option_calendar"];
$option_reply = $rs_property["option_reply"];
$option_highlight = $rs_property["option_highlight"];
$option_recommend = $rs_property["option_recommend"];
$option_approve = $rs_property["option_approve"];
$option_order = $rs_property["option_order"];
$option_status = $rs_property["option_status"];

$price_calculate = $price_normal ; 
if ($price_special > 0 ){
$price_calculate = $price_special ; 
}


} ///rs_property
} /// if ($product_id != "" ){ 








///////////////// date booking
if ($booking_unit_room == "" or $booking_unit_room == 0 ) { $booking_unit_room = 1 ; }
if ($booking_unit_day == "" ){ $booking_unit_day = 0 ; }

$now_y = date("Y");
$now_m = date("m");
$now_d = date("d");

$date_start = "";
$date_end = "";

if ($booking_date_start != "" ){
$booking_date_start = substr("$booking_date_start", 0 , 10 );
list ($date_start_year , $date_start_month , $date_start_day )=split('-', $booking_date_start);	
$date_start = "$date_start_day/$date_start_month/$date_start_year";
}

if ($booking_date_end != "" ){
$booking_date_end = substr("$booking_date_end", 0 , 10 );
list ($date_end_year , $date_end_month , $date_end_day )=split('-', $booking_date_end);	
$date_end = "$date_end_day/$date_end_month/$date_end_year";
}













/// ################################## option_reserve_atleast 
/// à§×èÍ¹ä¢¢Í§¨Ó¹Ç¹ÇÑ¹

$process_check_atleast_day = "none" ; 
$process_check_calendar = "none";


$reserve_atleast_day_count = 0 ; 
$text_reserve_atleast_case = "";
$text_reserve_atleast_case_booking = "$booking_unit_day ÇÑ¹"; 


if ($booking_unit_day > 30 ){
$show_day_m = $booking_unit_day / 30 ; 
$show_day_m = floor($show_day_m);
$show_day_d = $booking_unit_day - ($show_day_m * 30 ); 	
$text_reserve_atleast_case_booking = "$show_day_m à´×Í¹  $show_day_d ÇÑ¹"; 
}



if ($option_reserve_atleast == "reserve_atleast" ){

/// day
if ($option_reserve_atleast_case == "day" ){
$reserve_atleast_day_count  =  $property_reserve_atleast_day ; 
$text_reserve_atleast_case = "µéÍ§¨Í§ÍÂèÒ§¹éÍÂ $property_reserve_atleast_day ÇÑ¹";
}///day end


/// week
if ($option_reserve_atleast_case == "week" ){
$reserve_atleast_day_count  =  $property_reserve_atleast_week * 7 ; 
$text_reserve_atleast_case =  "µéÍ§¨Í§ÍÂèÒ§¹éÍÂ $property_reserve_atleast_week ÊÑ»´ÒËì";

if ($booking_unit_day < 7 ){
$text_reserve_atleast_case_booking = "$booking_unit_day ÇÑ¹"; 
}

if ($booking_unit_day > 7 ){
$show_day_w = $booking_unit_day / 7 ; 
$show_day_w = floor($show_day_w);
$show_day_d = $booking_unit_day - ($show_day_w * 7 ); 	
$text_reserve_atleast_case_booking = "$show_day_w ÊÑ»´ÒËì  $show_day_d ÇÑ¹"; 
}
}  /// week end


/// month
if ($option_reserve_atleast_case == "month" ){
$reserve_atleast_day_count  =  $property_reserve_atleast_month * 30 ; 
$text_reserve_atleast_case =  "µéÍ§¨Í§ÍÂèÒ§¹éÍÂ $property_reserve_atleast_month à´×Í¹";

if ($booking_unit_day < 30 ){
$text_reserve_atleast_case_booking = "$booking_unit_day ÇÑ¹"; 
}

if ($booking_unit_day > 30 ){
$show_day_m = $booking_unit_day / 30 ; 
$show_day_m = floor($show_day_m);
$show_day_d = $booking_unit_day - ($show_day_m * 30 ); 	
$text_reserve_atleast_case_booking = "$show_day_m à´×Í¹  $show_day_d ÇÑ¹"; 
}

} 
/// month end


/// check error
if ($reserve_atleast_day_count > $booking_unit_day ){
$process_check_atleast_day = "error"; 	
}



}
/// à§×èÍ¹ä¢¢Í§¨Ó¹Ç¹ÇÑ¹
/// ################################## option_reserve_atleast end




/// à§×èÍ¹ä¢ ÇÑ¹·ÕèÇèÒ§ process_option_calendar
/// ################################## Calendar end

if ($option_calendar == "calendar" ){


$sql_command = " 
select  		*
from  		app_calendar_info
where 		system_delete = 'none'
AND			option_status = 'off'
AND			ref_id = '$property_id'
AND   		calendar_date >= '$booking_date_start'
AND  	 	calendar_date <= '$booking_date_end'
 ";
$calendar_count = $this->db->GetOne($sql_command);


/// check error
if ($calendar_count > 0 ){
$process_check_calendar = "error";
}

} /// if ($option_calendar == "calendar" ){
/// à§×èÍ¹ä¢ ÇÑ¹·ÕèÇèÒ§ process_option_calendar
/// ################################## Calendar end






/// à§×èÍ¹ä¢ áºè§¨Ó¹Ç¹ day/week/month
/// ##################################  day/week/month

$price_result_day = 0 ;
$price_result_week = 0 ;
$price_result_month = 0 ;

$setcal_day = 0 ; 
$setcal_week = 0 ; 
$setcal_month = 0 ; 



if ($option_priceby_day == "priceby_day" ){
$setcal_day = 0 ; 
$setcal_week = 0 ; 
$setcal_month = 0 ; 
$setcal_day = $booking_unit_day ; 
}



if ($option_priceby_week == "priceby_week" ){
$setcal_day = 0 ; 
$setcal_week = 0 ; 
$setcal_month = 0 ; 
$setcal_day_temp =  $booking_unit_day ; 

/// temp>7 
if ( $setcal_day_temp >= 7  ){
$setcal_week = $setcal_day_temp / 7 ; 
$setcal_week = floor($setcal_week);
/// ÇÑ¹·ÕèàËÅ×Í¨Ò¡ÊÑ»´ÒËì
$setcal_day_temp1 =  floor($setcal_week * 7) ;
$setcal_day_temp =  $setcal_day_temp - $setcal_day_temp1 ;
}///   > 7 

if ($option_priceby_day == "priceby_day"  ){
$setcal_day = $setcal_day_temp ; 
}


} //// if ($option_priceby_day == "priceby_week" ){


if ($option_priceby_month == "priceby_month" ){

$setcal_day = 0 ; 
$setcal_week = 0 ; 
$setcal_month = 0 ; 

$setcal_day_temp = $booking_unit_day ; 

if ($setcal_day_temp >= 30 ){
$setcal_month = $setcal_day_temp / 30 ; 
$setcal_month = floor($setcal_month);
/// ÇÑ¹·ÕèàËÅ×Í¨Ò¡à´×Í¹
$setcal_day_temp1 =  floor($setcal_month * 30);
$setcal_day_temp =  $setcal_day_temp - $setcal_day_temp1 ;

}/// > 30


/// temp>7 
if ($option_priceby_week == "priceby_week" and $setcal_day_temp >= 7  ){
$setcal_week = $setcal_day_temp / 7 ; 
$setcal_week = floor($setcal_week);
/// ÇÑ¹·ÕèàËÅ×Í¨Ò¡ÊÑ»´ÒËì
$setcal_day_temp1 =  floor($setcal_week * 7);
$setcal_day_temp =  $setcal_day_temp - $setcal_day_temp1 ;
}///   > 7 

if ($option_priceby_day == "priceby_day"  ){
$setcal_day = $setcal_day_temp ; 
}



} /// priceby_month /// if ($option_priceby_month == "priceby_month" ){
	
/// à§×èÍ¹ä¢ áºè§¨Ó¹Ç¹ day/week/month
/// ##################################  day/week/month end




/// ##################################  byroom
if ($option_reserve_cal == "byroom" ){
if ($option_priceby_day == "priceby_day" ){ //// price price_notshow_price_rank and other
if ($option_price == "price_notshow_price_rank" or  $option_price == "price_notshow_price_fix"  or  $option_price == "none"  or  $option_price == "" ){
$text_show_priceby_unit  = "<center>ÃÍàªê¤ÃÒ¤Ò</center>"; 
$text_show_priceby_row_sum = "<center>ÃÍàªê¤ÃÒ¤Ò</center>"; 
$option_show_summary = "pleasecall"; 
}


/// price_rank
if ($option_price == "price_rank"  ){
$text_show_priceby_unit  = "<center>ÃÍàªê¤ÃÒ¤Ò</center>"; 
$text_show_priceby_row_sum = "<center>ÃÍàªê¤ÃÒ¤Ò</center>"; 
$option_show_summary = "pleasecall"; 
}


/// price_fix
if ($option_price == "price_fix"  ){	
$price_day = $price_normal ; 
if ($price_special > 0 ){
$price_day = $price_special ; 
}
$price_result_day = $price_day * $booking_unit_room  * $setcal_day  ; 
} /// price_fix end
} /// if ($option_priceby_day == "priceby_day" ){


if ($option_priceby_week == "priceby_week" ){
$price_result_week = $price_week * $booking_unit_room  * $setcal_week  ; 
}

if ($option_priceby_month == "priceby_month" ){
$price_result_month = $price_month * $booking_unit_room  * $setcal_month  ; 
}



$price_result_row = $price_result_day +  $price_result_week + $price_result_month ; 
$show_price_result_row = number_format($price_result_row, 2, '.', ',');

/// ¼ÅÃÇÁ 
$summary_price =  $price_result_row ; 

	
} /// byroom
/// ##################################  end  byroom








/// ##################################  byperson
if ($option_reserve_cal == "byperson" ){

//// ¤¹
$setcal_person = 0 ; 
$setcal_kid = 0 ; 
$setcal_option_person = 0 ; 
$setcal_option_kid = 0 ; 

$booking_unit_room = 1 ; 


//// ´ÙàÃ×èÍ§»ÃÐàÀ·¼Ùéà¢éÒ¾Ñ¡¡èÍ¹
$setcal_person = $unit_person ; 
$setcal_kid = $unit_kid ; 
$setcal_option_person = $unit_person_option ; 
$setcal_option_kid = $unit_kid_option ; 





if ($option_priceby_day == "priceby_day" ){
//// price price_notshow_price_rank and other
if ($option_price == "price_notshow_price_rank" or  $option_price == "price_notshow_price_fix"  or  $option_price == "none"  or  $option_price == "" ){
$text_show_priceby_unit  = "<center>ÃÍàªê¤ÃÒ¤Ò</center>"; 
$text_show_priceby_row_sum = "<center>ÃÍàªê¤ÃÒ¤Ò</center>"; 
$option_show_summary = "pleasecall"; 
}


/// price_rank
if ($option_price == "price_rank"  ){
$text_show_priceby_unit  = "<center>ÃÍàªê¤ÃÒ¤Ò</center>"; 
$text_show_priceby_row_sum = "<center>ÃÍàªê¤ÃÒ¤Ò</center>"; 
$option_show_summary = "pleasecall"; 
}

/// price_fix
if ($option_price == "price_fix"  ){	
$price_day = $price_normal ; 
if ($price_special > 0 ){
$price_day = $price_special ; 
}

$price_result_day = $price_day  * $setcal_day  * $booking_unit_room  ; 


$price_result_by_optionperson = 0 ; 
$price_result_by_optionkid = 0 ; 
if ($setcal_option_person > 0 ){
$price_result_by_optionperson = $setcal_day  *  $price_fix_option_person * $setcal_option_person ; 
}
if ($setcal_option_kid > 0 ){
$price_result_by_optionkid = $setcal_day  *  $price_fix_option_kid * $setcal_option_kid ; 
}
$price_result_day = $price_result_day + $price_result_by_optionperson + $price_result_by_optionkid ; 

} /// price_fix end
} /// if ($option_priceby_day == "priceby_day" ){


if ($option_priceby_week == "priceby_week" ){
$price_result_week = $setcal_week * $price_week * $booking_unit_room   ; 
$price_result_by_optionperson = 0 ; 
$price_result_by_optionkid = 0 ; 
if ($setcal_option_person > 0 ){
$price_result_by_optionperson = $setcal_week * $setcal_option_person  *  $price_week_option_person ; 
}
if ($setcal_option_kid > 0 ){
$price_result_by_optionkid = $setcal_week * $setcal_option_kid  *  $price_week_option_kid ; 
}
$price_result_week = $price_result_week + $price_result_by_optionperson + $price_result_by_optionkid ; 
} /// week


/// month
if ($option_priceby_month == "priceby_month" ){
$price_result_month = $setcal_month * $price_month * $booking_unit_room ; 

$price_result_by_optionperson = 0 ; 
$price_result_by_optionkid = 0 ; 

if ($setcal_option_person > 0 ){
$price_result_by_optionperson = $setcal_month * $setcal_option_person  *  $price_week_option_person ; 
}
if ($setcal_option_kid > 0 ){
$price_result_by_optionkid = $setcal_month * $setcal_option_kid  *  $price_week_option_kid ; 
}
$price_result_month = $price_result_month + $price_result_by_optionperson + $price_result_by_optionkid ; 
} /// month


$price_result_row = $price_result_day +  $price_result_week + $price_result_month ; 
$show_price_result_row = number_format($price_result_row, 2, '.', ',');

/// ¼ÅÃÇÁã¹ Row
$summary_price = $price_result_row ; 

}/// if ($option_reserve_cal == "byperson" ){
/// ##################################  end byperson









//////// booking_type_room
$booking_type_room_text = "";

if ($booking_type_room == "superior" ){ 
$booking_type_room_text = "Superior";
}


if ($booking_type_room == "deluxe" ){ 
$booking_type_room_text = "Deluxe";
}


if ($booking_type_room == "suite" ){ 
$booking_type_room_text = "Suite";
}


//// booking_type_bed
$booking_type_bed_text = "";

if ($booking_type_bed == "single_1person" ){
$booking_type_bed_text = "Single (1 Person)";
} 

if ($booking_type_bed == "twindouble_2adults" ){ 
$booking_type_bed_text = "Twin/Double (2 Adults)";
}

if ($booking_type_bed == "twindouble_2adults1kid" ){ 
$booking_type_bed_text = "Twin/Double (2 Adults+1 Kid)";
}

if ($booking_type_bed == "triple_3person" ){ 
$booking_type_bed_text = "Triple (3 Person)";
}












/// ###################################################### text_email start
///text_email_booking
$text_email_booking = "
Booking ID : $booking_id
Property Name : $property_name  (Code : $property_code , Property ID $property_id)
Property Address : $property_address
Check in : $date_start
Check out : $date_end
($booking_unit_day Day)

"; 

///############################byperson
if ($option_reserve_cal == "byperson" ){ 
if ($option_reserveby_amount_person == "yes" ){ 
$text_email_booking =  $text_email_booking . " 
Guests $unit_person Person ";
if ($amount_limit_option_person > 0 ){
$text_email_booking =  $text_email_booking ." , Option $unit_person_option Person  ";
}///
}

if ($option_reserveby_amount_kid == "yes" ){ 
$text_email_booking =  $text_email_booking . " 
Child $unit_kid  Person  ";
if ($amount_limit_option_kid > 0 ){
$text_email_booking =  $text_email_booking ." , Option  $unit_kid_option  Person  ";
}///
} ///option_reserveby_amount_kid
} /// if ($option_reserve_cal == "byperson" ){ 
///############################byperson end 



///############################byroom
 if ($option_reserve_cal == "byroom" ){ 
$text_email_booking =  $text_email_booking ." 
Unit  $booking_unit_room Rooms  ";

if ($option_reserveby_typeroom == "yes" ){ 
$text_email_booking =  $text_email_booking . " 
Room Type $booking_type_room_text  ";
}

if ($option_reserveby_typeroom == "yes" ){ 
$text_email_booking =  $text_email_booking . " 
Bed Type $booking_type_bed_text  ";
} 

} 
///############################byroom end


$text_email_booking =  $text_email_booking . "

Summary Price  $summary_price  THB
";

/// ###################################################### text_email end




$sql_command = "	
update  app_booking   

set    
summary_price = '$summary_price' , 
text_email_booking = '$text_email_booking' , 
datetime_update = '$datetime_now'  

where  
booking_id = '$booking_id'

";		
$result_update = $this->db->Execute($sql_command);	



} ////////////////////// if ($booking_id != ""  ){ 



if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"booking_id"=>"$booking_id" , 
"summary_price"=>"$summary_price" , 
"process_check_atleast_day"=>"$process_check_atleast_day" , 
"process_check_calendar"=>"$process_check_calendar" , 

"text_email_booking"=>"$text_email_booking" , 
"show_status"=>"$show_status" , 
);
return $result_return ;


} ///
////function  function_booking_summary($input_array){	
/// ########################################





















/// ######################################## function_booking_confirm
function  function_booking_confirm($input_array){	


//// request
$booking_id = $input_array["booking_id"]; 
$member_id = $input_array["member_id"]; 
$sql_update_log = $input_array["sql_update_log"]; 
$datetime_now = $input_array["datetime_now"];



if ($booking_id != "" ){  /// check input booking_id

$sql_command = "	
update  app_booking   

set    
booking_status = 'booking_confirm'   , 
option_status = 'on'   , 
datetime_booking = '$datetime_now'   , 
datetime_update = '$datetime_now'  

where  
booking_id = '$booking_id'    

";		
$result_update = $this->db->Execute($sql_command);	



///##################################### update log
//// get property_id
$sql_command = " 
select  		*
from  		app_booking
where 		system_delete = 'none'
and			booking_id = '$booking_id'
 ";
$result_array = $this->db->GetRow($sql_command);
$product_id = $result_array["product_id"];

//// print "product_id = $product_id <br>";

//// get property info
$sql_update_log = ""; 
if ($product_id != "" ){
$sql_command = " 
select  		*
from  		app_property
where 		system_delete = 'none'
and			property_id = '$product_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){
$property_id = $result_array["property_id"];
$property_type  = $result_array["property_type"];
$property_code  = $result_array["property_code"];
$property_name  = $result_array["property_name"];
$property_des  = $result_array["property_des"];
$property_address  = $result_array["property_address"];
$property_amount_room  = $result_array["property_amount_room"];
$price_normal  = $result_array["price_normal"];
$price_special  = $result_array["price_special"];
$amount_limit_person  = $result_array["amount_limit_person"];
$amount_limit_kid  = $result_array["amount_limit_kid"];
$amount_limit_option_person  = $result_array["amount_limit_option_person"];
$amount_limit_option_kid  = $result_array["amount_limit_option_kid"];
$property_reserve_atleast_day  = $result_array["property_reserve_atleast_day"];
$property_reserve_atleast_week  = $result_array["property_reserve_atleast_week"];
$property_reserve_atleast_month  = $result_array["property_reserve_atleast_month"];
$property_reserve_atleast_year  = $result_array["property_reserve_atleast_year"];

$option_priceby_day  = $result_array["option_priceby_day"];
$option_priceby_week  = $result_array["option_priceby_week"];
$option_priceby_month  = $result_array["option_priceby_month"];
$price_fix_option_person  = $result_array["price_fix_option_person"];
$price_fix_option_kid  = $result_array["price_fix_option_kid"];
$price_week  = $result_array["price_week"];
$price_week_option_person  = $result_array["price_week_option_person"];
$price_week_option_kid  = $result_array["price_week_option_kid"];
$price_month  = $result_array["price_month"];
$price_month_option_person  = $result_array["price_month_option_person"];
$price_month_option_kid  = $result_array["price_month_option_kid"];
$option_reserveby_amount_room  = $result_array["option_reserveby_amount_room"];
$option_reserveby_amount_person  = $result_array["option_reserveby_amount_person"];
$option_reserveby_amount_kid  = $result_array["option_reserveby_amount_kid"];
$option_reserveby_typeroom  = $result_array["option_reserveby_typeroom"];
$option_reserveby_typebed  = $result_array["option_reserveby_typebed"];
$option_reserve_cal  = $result_array["option_reserve_cal"];
$option_price  = $result_array["option_price"];
$option_reserve  = $result_array["option_reserve"];
$option_reserve_atleast  = $result_array["option_reserve_atleast"];
$option_reserve_atleast_case  = $result_array["option_reserve_atleast_case"];
$datetime_update  = $result_array["datetime_update"];

$sql_update_log = "
property_id = '$property_id' , 
property_type  = '$property_type' , 
property_code = '$property_code' , 
property_name = '$property_name' , 
property_des = '$property_des' , 
property_address = '$property_address' , 
property_amount_room = '$property_amount_room' , 
price_normal = '$price_normal' , 
price_special = '$price_special' , 
amount_limit_person = '$amount_limit_person' , 
amount_limit_kid = '$amount_limit_kid' , 
amount_limit_option_person = '$amount_limit_option_person' , 
amount_limit_option_kid = '$amount_limit_option_kid' , 
property_reserve_atleast_day = '$property_reserve_atleast_day' , 
property_reserve_atleast_week = '$property_reserve_atleast_week' , 
property_reserve_atleast_month = '$property_reserve_atleast_month' , 
property_reserve_atleast_year = '$property_reserve_atleast_year' , 
option_priceby_day = '$option_priceby_day' , 
option_priceby_week = '$option_priceby_week' , 
option_priceby_month = '$option_priceby_month' , 
price_fix_option_person = '$price_fix_option_person' , 
price_fix_option_kid = '$price_fix_option_kid' , 
price_week = '$price_week' , 
price_week_option_person = '$price_week_option_person' , 
price_week_option_kid = '$price_week_option_kid' , 
price_month = '$price_month' , 
price_month_option_person = '$price_month_option_person' , 
price_month_option_kid = '$price_month_option_kid' , 
option_reserveby_amount_room = '$option_reserveby_amount_room' , 
option_reserveby_amount_person = '$option_reserveby_amount_person' , 
option_reserveby_amount_kid = '$option_reserveby_amount_kid' , 
option_reserveby_typeroom = '$option_reserveby_typeroom' , 
option_reserveby_typebed = '$option_reserveby_typebed' , 
option_reserve_cal = '$option_reserve_cal' , 
option_price = '$option_price' , 
option_reserve = '$option_reserve' , 
option_reserve_atleast = '$option_reserve_atleast' , 
option_reserve_atleast_case = '$option_reserve_atleast_case' , 
"; 


} ///result_array
}//// product_id



$log_id = "";
$sql_command = " 
select  		*
from  		app_booking_detail
where 		system_delete = 'none'
and			booking_id = '$booking_id'
 ";
$result_array = $this->db->GetRow($sql_command);
$log_id = $result_array["log_id"];


/// insert
if ($log_id == "" ){ 
$sql_command = " select  count(*) from  app_booking_detail ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "bookinglog" ;
$input_idnow =  $cmd_check_record + 1 ; 
$log_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_booking_detail ( 
log_id ,   
booking_id , 
option_status , 
system_delete , 
datetime_create 
)

values (
'$log_id'  ,
'$booking_id'  , 
'on'  , 
'none'  , 
'$datetime_now'  
)									

";	
/// print $sql_command ;  
$result_array = $this->db->Execute($sql_command);	
}/// insert
	

//// update
$sql_command = "	
update  
app_booking_detail   

set    
$sql_update_log
datetime_update = '$datetime_now'  

where  
log_id = '$log_id'    

";		
$result_update = $this->db->Execute($sql_command);	

///##################################### update log end





} /// check input booking_id


if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"booking_id"=>"$booking_id" , 
);
return $result_return ;	




} 
/// ######################################## function_booking_confirm end









	
	

}///// class  eva_criteria{	
?>