<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_property
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_property.inc.php
 */


class  app_property{	
				
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
function app_property(){
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
$sql_joint_table = $input_array["sql_joint_table"];
$sql_joint_select = $input_array["sql_joint_select"];
$sql_joint_where = $input_array["sql_joint_where"];

$property_type = $input_array["property_type"];
$member_id = $input_array["member_id"];

$category_id = $input_array["category_id"];
$category_id_set1 = $input_array["category_id_set1"];
$category_id_set2 = $input_array["category_id_set2"];
$category_id_set3 = $input_array["category_id_set3"];


$property_province_id = $input_array["property_province_id"];


$option_highlight = $input_array["option_highlight"];
$option_recommend = $input_array["option_recommend"];
$option_approve = $input_array["option_approve"];
$option_reply = $input_array["option_reply"];
$option_price = $input_array["option_price"];
$option_status = $input_array["option_status"];



//// sql command
if ($property_type != "") 					{ $sql_property_type 				=	" and		app_property.property_type = '$property_type' " ; }
if ($member_id != "") 					{ $sql_member_id 					=	" and		app_property.member_id = '$member_id' " ; }

if ($category_id != "") 					{ $sql_category_id 					=	" and		app_property.category_id = '$category_id' " ; }
if ($category_id_set1 != "") 			{ $sql_category_id_set1 			=	" and		app_property.category_id_set1 = '$category_id_set1' " ; }
if ($category_id_set2 != "") 			{ $sql_category_id_set2 			=	" and		app_property.category_id_set2 = '$category_id_set2' " ; }
if ($category_id_set3 != "") 			{ $sql_category_id_set3 			=	" and		app_property.category_id_set3 = '$category_id_set3' " ; }

if ($property_province_id != "") 		{ $sql_property_province_id 	=	" and		app_property.property_province_id = '$property_province_id' " ; }


if ($option_highlight != "")  				{ $sql_option_highlight 			=	" and		app_property.option_highlight = '$option_highlight' " ; }
if ($option_recommend != "")  		{ $sql_option_recommend 		=	" and		app_property.option_recommend = '$option_recommend' " ; }
if ($option_approve != "")  				{ $sql_option_approve 			=	" and		app_property.option_approve = '$option_approve' " ; }
if ($option_reply != "")  					{ $sql_option_reply 				=	" and		app_property.option_reply = '$option_reply' " ; }
if ($option_price != "")  					{ $sql_option_price 				=	" and		app_property.option_price = '$option_price' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		app_property.option_status = '$option_status' " ; }



//// recommend
$sql_command = "
select			count(*)  
from				app_property $sql_joint_table 
where			app_property.system_delete = 'none'  

$sql_property_type
$sql_member_id
$sql_category_id
$sql_category_id_set1
$sql_category_id_set2
$sql_category_id_set3

$sql_property_province_id

$sql_option_highlight
$sql_option_recommend
$sql_option_approve
$sql_option_reply
$sql_option_price
$sql_option_status

$sql_joint_where
$sql_other

";	

/*
print "
<br><br>
////////////////////////////////////////////////////
<br>
sql_command = $sql_command 
<br>
////////////////////////////////////////////////////
<br><br>
";

*/




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
if ($sql_orderby == "") 	{ $sql_orderby 	=  " order by 	app_property.id  DESC " ; }
$sql_joint_table = $input_array["sql_joint_table"];
$sql_joint_select = $input_array["sql_joint_select"];
$sql_joint_where = $input_array["sql_joint_where"];


$property_type = $input_array["property_type"];
$member_id = $input_array["member_id"];
$category_id = $input_array["category_id"];
$category_id_set1 = $input_array["category_id_set1"];
$category_id_set2 = $input_array["category_id_set2"];
$category_id_set3 = $input_array["category_id_set3"];

$property_province_id = $input_array["property_province_id"];


$option_highlight = $input_array["option_highlight"];
$option_recommend = $input_array["option_recommend"];
$option_approve = $input_array["option_approve"];
$option_reply = $input_array["option_reply"];
$option_price = $input_array["option_price"];
$option_status = $input_array["option_status"];



//// sql command
if ($property_type != "") 					{ $sql_property_type 				=	" and		app_property.property_type = '$property_type' " ; }
if ($member_id != "") 					{ $sql_member_id 					=	" and		app_property.member_id = '$member_id' " ; }

if ($category_id != "") 					{ $sql_category_id 					=	" and		app_property.category_id = '$category_id' " ; }
if ($category_id_set1 != "") 			{ $sql_category_id_set1 			=	" and		app_property.category_id_set1 = '$category_id_set1' " ; }
if ($category_id_set2 != "") 			{ $sql_category_id_set2 			=	" and		app_property.category_id_set2 = '$category_id_set2' " ; }
if ($category_id_set3 != "") 			{ $sql_category_id_set3 			=	" and		app_property.category_id_set3 = '$category_id_set3' " ; }

if ($property_province_id != "") 		{ $sql_property_province_id 	=	" and		app_property.property_province_id = '$property_province_id' " ; }


if ($option_highlight != "")  				{ $sql_option_highlight 			=	" and		app_property.option_highlight = '$option_highlight' " ; }
if ($option_recommend != "")  		{ $sql_option_recommend 		=	" and		app_property.option_recommend = '$option_recommend' " ; }
if ($option_approve != "")  				{ $sql_option_approve 			=	" and		app_property.option_approve = '$option_approve' " ; }
if ($option_reply != "")  					{ $sql_option_reply 				=	" and		app_property.option_reply = '$option_reply' " ; }
if ($option_price != "")  					{ $sql_option_price 				=	" and		app_property.option_price = '$option_price' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		app_property.option_status = '$option_status' " ; }

$sql_command = "
select		* $sql_joint_select
from 			app_property $sql_joint_table
where 		app_property.system_delete = 'none' 

$sql_property_type
$sql_member_id
$sql_category_id
$sql_category_id_set1
$sql_category_id_set2
$sql_category_id_set3

$sql_property_province_id

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

/*
print "
sql_command = $sql_command 
<br><br>
////////////////////////////////////////////////////
<br><br>
";
*/


$result_array = $this->db->SelectLimit($sql_command,$set_pager_limit,$set_pager_start );
return $result_array ;

} ///////////





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyid
*/
function function_viewbyid($input_array){

$id = $input_array["id"];
$property_id = $input_array["property_id"];
$property_id_name = $input_array["property_id_name"];

//// sql command
if ($id != "")							{ $sql_id 							=	" and		id = '$id' " ; }
if ($property_id != "")				{ $sql_property_id 				=	" and		property_id = '$property_id' " ; }
if ($property_id_name != "") 	{ $sql_property_id_name 	=	" and		property_id_name = '$property_id_name' " ; }

if ( $sql_id != ""  or  $property_id != ""  or  $property_id_name != ""   ){ 

$sql_command = "
select 		* 
from			app_property
where		system_delete = 'none'

$sql_id
$sql_property_id
$sql_property_id_name

";	
$result_array = $this->db->GetRow($sql_command);

} /// input 

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
$property_id = $input_array["property_id"]; 
$property_id_name_show = $input_array["property_id_name_show"]; 
$property_type = $input_array["property_type"]; 
$member_id = $input_array["member_id"]; 

$category_id = $input_array["category_id"]; 
$category_id_set1 = $input_array["category_id_set1"]; 
$category_id_set2 = $input_array["category_id_set2"]; 
$category_id_set3 = $input_array["category_id_set3"]; 


$property_name = $input_array["property_name"]; 
$property_name_lang2 = $input_array["property_name_lang2"]; 
$property_name_lang3 = $input_array["property_name_lang3"]; 
$property_name_lang4 = $input_array["property_name_lang4"]; 
$property_name_lang5 = $input_array["property_name_lang5"]; 

$property_code = $input_array["property_code"]; 
$property_code_agency = $input_array["property_code_agency"]; 

$property_des = $input_array["property_des"]; 
$property_des_lang2 = $input_array["property_des_lang2"]; 
$property_des_lang3 = $input_array["property_des_lang3"]; 
$property_des_lang4 = $input_array["property_des_lang4"]; 
$property_des_lang5 = $input_array["property_des_lang5"]; 

$property_detail = $input_array["property_detail"]; 
$property_detail_lang2 = $input_array["property_detail_lang2"]; 
$property_detail_lang3 = $input_array["property_detail_lang3"]; 
$property_detail_lang4 = $input_array["property_detail_lang4"]; 
$property_detail_lang5 = $input_array["property_detail_lang5"]; 


$property_source_name = $input_array["property_source_name"]; 
$property_source_url = $input_array["property_source_url"]; 

$property_maps_code = $input_array["property_maps_code"]; 
$property_maps_des = $input_array["property_maps_des"]; 
$property_maps_des_lang2 = $input_array["property_maps_des_lang2"]; 
$property_maps_des_lang3 = $input_array["property_maps_des_lang3"]; 
$property_maps_des_lang4 = $input_array["property_maps_des_lang4"]; 
$property_maps_des_lang5 = $input_array["property_maps_des_lang5"]; 


$property_amount_room = $input_array["property_amount_room"]; 
$option_reserve = $input_array["option_reserve"]; 
$option_reserve_atleast = $input_array["option_reserve_atleast"]; 

$property_image = $input_array["property_image"]; 
$property_image2 = $input_array["property_image2"]; 
$property_image_mini = $input_array["property_image_mini"]; 

$property_province_id = $input_array["property_province_id"];
$property_address = $input_array["property_address"];
$property_address_lang2 = $input_array["property_address_lang2"];
$property_address_lang3 = $input_array["property_address_lang3"];
$property_address_lang4 = $input_array["property_address_lang4"];
$property_address_lang5 = $input_array["property_address_lang5"];

$option_price = $input_array["option_price"]; 
$price_normal = $input_array["price_normal"]; 
$price_special = $input_array["price_special"]; 
$price_rank_start = $input_array["price_rank_start"]; 
$price_rank_top = $input_array["price_rank_top"]; 
$point_rating_avg = $input_array["point_rating_avg"]; 


$stat_rateing = $input_array["stat_rateing"]; 
$stat_view = $input_array["stat_view"]; 
$stat_reply = $input_array["stat_reply"]; 
$stat_delete = $input_array["stat_delete"]; 



///// update
$amount_limit_person = $input_array["amount_limit_person"]; 
$amount_limit_kid = $input_array["amount_limit_kid"]; 
$amount_limit_option_person = $input_array["amount_limit_option_person"]; 
$amount_limit_option_kid = $input_array["amount_limit_option_kid"]; 

$property_reserve_atleast_day = $input_array["property_reserve_atleast_day"]; 
$property_reserve_atleast_month = $input_array["property_reserve_atleast_month"]; 
$property_reserve_atleast_year = $input_array["property_reserve_atleast_year"]; 

$option_priceby_day = $input_array["option_priceby_day"]; 
$option_priceby_week = $input_array["option_priceby_week"]; 
$option_priceby_month = $input_array["option_priceby_month"]; 

$price_fix_option_person = $input_array["price_fix_option_person"]; 
$price_fix_option_kid = $input_array["price_fix_option_kid"]; 

$price_week = $input_array["price_week"]; 
$price_week_option_person = $input_array["price_week_option_person"]; 
$price_week_option_kid = $input_array["price_week_option_kid"]; 

$price_month = $input_array["price_month"]; 
$price_month_option_person = $input_array["price_month_option_person"]; 
$price_month_option_kid = $input_array["price_month_option_kid"]; 

$option_reserveby_amount_room = $input_array["option_reserveby_amount_room"]; 
$option_reserveby_typeroom = $input_array["option_reserveby_typeroom"]; 
$option_reserveby_typebed = $input_array["option_reserveby_typebed"]; 
$option_reserveby_amount_person = $input_array["option_reserveby_amount_person"]; 
$option_reserveby_amount_kid = $input_array["option_reserveby_amount_kid"]; 
$option_reserve_cal = $input_array["option_reserve_cal"]; 

$option_reserve_atleast_case = $input_array["option_reserve_atleast_case"]; 
$property_reserve_atleast_week = $input_array["property_reserve_atleast_week"]; 


///// update end




$option_calendar = $input_array["option_calendar"]; 
$option_rating = $input_array["option_rating"]; 
$option_highlight = $input_array["option_highlight"]; 
$option_recommend = $input_array["option_recommend"]; 
$option_approve = $input_array["option_approve"]; 
$option_reply = $input_array["option_reply"]; 
$option_order = $input_array["option_order"]; 
$option_price = $input_array["option_price"];

$option_lang1 = $input_array["option_lang1"];
$option_lang2 = $input_array["option_lang2"];
$option_lang3 = $input_array["option_lang3"];
$option_lang4 = $input_array["option_lang4"];
$option_lang5 = $input_array["option_lang5"];
$option_status = $input_array["option_status"];


$ipaddress_post = $input_array["ipaddress_post"];
$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];



//// sql config




$check_process = "insert" ; 
if ($property_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_property
where 		system_delete = 'none'
and			property_id = '$property_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
} ///
} ///



/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_property ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "";
$input_idnow =  $cmd_check_record + 1 ; 
$property_id = function_genid_mini( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command = "
insert into  app_property ( 
property_id , 
property_type , 
member_id , 

stat_rateing , 
stat_view , 
stat_reply , 
stat_delete , 
option_order , 

option_rating , 
option_highlight , 
option_recommend , 
option_approve , 
option_reply , 
option_price , 
option_status , 

option_lang1 ,
option_lang2 ,
option_lang3 ,
option_lang4 ,
option_lang5 ,

system_delete , 
user_create , 
ipaddress_post , 
datetime_create 
)
				
values (
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
'none'  , 
'on'  , 

'none'  , 
'none'  , 
'none'  , 
'none'  , 
'none'  , 

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


$property_id_name = ""; 
if ($property_id_name_show != "" ){
$property_id_name = strtolower($property_id_name_show);	
}

if ($member_id != "" ){ $sql_member_id = " member_id = '$member_id' ,  "; }


/// update start
$sql_command="  
update   app_property  

set  
property_id_name_show = '$property_id_name_show' ,
property_id_name = '$property_id_name' ,

category_id = '$category_id' ,
category_id_set1 = '$category_id_set1' ,
category_id_set2 = '$category_id_set2' ,
category_id_set3 = '$category_id_set3' ,

property_name = '$property_name' ,
property_name_lang2 = '$property_name_lang2' ,
property_name_lang3 = '$property_name_lang3' ,
property_name_lang4 = '$property_name_lang4' ,
property_name_lang5 = '$property_name_lang5' ,

property_code = '$property_code' ,
property_code_agency = '$property_code_agency' ,

property_des = '$property_des' ,
property_des_lang2 = '$property_des_lang2' ,
property_des_lang3 = '$property_des_lang3' ,
property_des_lang4 = '$property_des_lang4' ,
property_des_lang5 = '$property_des_lang5' ,

property_detail = '$property_detail' ,
property_detail_lang2 = '$property_detail_lang2' ,
property_detail_lang3 = '$property_detail_lang3' ,
property_detail_lang4 = '$property_detail_lang4' ,
property_detail_lang5 = '$property_detail_lang5' ,

property_source_name = '$property_source_name' ,
property_source_url = '$property_source_url' ,

property_maps_code = '$property_maps_code' ,
property_maps_des = '$property_maps_des' ,
property_maps_des_lang2 = '$property_maps_des_lang2' ,
property_maps_des_lang3 = '$property_maps_des_lang3' ,
property_maps_des_lang4 = '$property_maps_des_lang4' ,
property_maps_des_lang5 = '$property_maps_des_lang5' ,

property_amount_room = '$property_amount_room' ,
option_reserve = '$option_reserve' ,
option_reserve_atleast = '$option_reserve_atleast' ,
property_image_mini = '$property_image_mini' ,
property_image = '$property_image' ,
property_image2 = '$property_image2' ,

property_address = '$property_address' ,
property_address_lang2 = '$property_address_lang2' ,
property_address_lang3 = '$property_address_lang3' ,
property_address_lang4 = '$property_address_lang4' ,
property_address_lang5 = '$property_address_lang5' ,

property_province_id = '$property_province_id' ,
option_price = '$option_price'  , 
price_normal = '$price_normal'  , 
price_special = '$price_special'  , 
price_rank_start = '$price_rank_start'  , 
price_rank_top = '$price_rank_top'  , 


amount_limit_person = '$amount_limit_person'  , 
amount_limit_kid = '$amount_limit_kid'  , 
amount_limit_option_person = '$amount_limit_option_person'  , 
amount_limit_option_kid = '$amount_limit_option_kid'  , 
property_reserve_atleast_day = '$property_reserve_atleast_day'  , 
property_reserve_atleast_month = '$property_reserve_atleast_month'  , 
property_reserve_atleast_year = '$property_reserve_atleast_year'  , 
option_priceby_day = '$option_priceby_day'  , 
option_priceby_week = '$option_priceby_week'  , 

option_priceby_month = '$option_priceby_month'  , 
price_fix_option_person = '$price_fix_option_person'  , 
price_fix_option_kid = '$price_fix_option_kid'  , 
price_week = '$price_week'  , 
price_week_option_person = '$price_week_option_person'  , 
price_week_option_kid = '$price_week_option_kid'  , 
price_month = '$price_month'  , 
price_month_option_person = '$price_month_option_person'  , 
price_month_option_kid = '$price_month_option_kid'  , 

option_reserveby_amount_room = '$option_reserveby_amount_room'  , 
option_reserveby_typeroom = '$option_reserveby_typeroom'  , 
option_reserveby_typebed = '$option_reserveby_typebed'  , 
option_reserveby_amount_person = '$option_reserveby_amount_person'  , 
option_reserveby_amount_kid = '$option_reserveby_amount_kid'  , 
option_reserve_cal = '$option_reserve_cal'  , 
option_reserve_atleast_case = '$option_reserve_atleast_case'  , 
property_reserve_atleast_week = '$property_reserve_atleast_week'  , 


option_calendar = '$option_calendar'  , 
option_rating = '$option_rating'  , 
option_highlight = '$option_highlight'  , 
option_recommend = '$option_recommend'  , 
option_order = '$option_order'  , 
option_reply = '$option_reply'  , 
option_approve = '$option_approve'  , 
option_price = '$option_price'  , 

option_lang1 = '$option_lang1'  , 
option_lang2 = '$option_lang2'  , 
option_lang3 = '$option_lang3'  , 
option_lang4 = '$option_lang4'  , 
option_lang5 = '$option_lang5'  , 
option_status = '$option_status'  , 


$sql_member_id


ipaddress_update =  '$ipaddress_update'  , 
user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			property_id = '$property_id'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"property_id"=>"$property_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/


function  function_update_option($input_array){	

//// request
$property_id = $input_array["property_id"]; 

$option_highlight = $input_array["option_highlight"];
$option_recommend = $input_array["option_recommend"];
$option_approve = $input_array["option_approve"];
$option_order = $input_array["option_order"];
$option_reply = $input_array["option_reply"];
$option_price = $input_array["option_price"];
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 


if ( $option_price != "" ) { $sql_option_price = " option_price = '$option_price' ,  "; }


if ($property_id != "" ) {  /// check id
$sql_command = "	
update  app_property   

set    
option_highlight = '$option_highlight' , 
option_recommend = '$option_recommend' , 
option_order = '$option_order' , 
option_reply = '$option_reply' , 

$sql_option_price

option_approve = '$option_approve' , 
option_status = '$option_status' , 
datetime_update = '$datetime_now'

where  property_id = '$property_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"property_id"=>"$property_id" , 
);
return $result_return ;	
		
} /// 













function  function_update_rating($input_array){	

//// request
$property_id = $input_array["property_id"]; 
$point_rating_avg = $input_array["point_rating_avg"];



if ($property_id != "" ) {  /// check id
$sql_command = "	
update  app_property   

set    
point_rating_avg = '$point_rating_avg' 

where  
property_id = '$property_id'    
";		

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"property_id"=>"$property_id" , 
);
return $result_return ;	
		
} /// 














function  function_update_stat($input_array){	

$property_id = $input_array["property_id"];
$stat_view = $input_array["stat_view"];
$stat_reply = $input_array["stat_reply"];
$datetime_now = $input_array["datetime_now"]; 


if ($property_id != "" ) { 
/////////////// stat_view
if ($stat_view == ""  or  $stat_view == "0"  ) {
$sql_command = "
select 		stat_view 
from			app_property
where		property_id = '$property_id'  
";	
$result_array = $this->db->GetRow($sql_command);
$stat_view = $result_array["stat_view"];
}


$stat_view = $stat_view + 1 ; 

$sql_command = "	
update 	 	app_property   
set    	
stat_view = '$stat_view'   , 
stat_reply = '$stat_reply'   , 
datetime_view = '$datetime_now'

where  
property_id = '$property_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
/// "show_status"=>"$show_status" , 
"property_id"=>"$property_id" , 
"stat_view"=>"$stat_view" , 
);
return $result_return ;	
		
} ///  end function











/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$property_id = $input_array["property_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($property_id != "" ){ 

$sql_command = "	
update  	app_property   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
property_id = '$property_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"property_id"=>"$property_id" , 
);
return $result_return ;	


} ///  end function





function  function_delete_bycase($input_array){	

$category_id = $input_array["category_id"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($category_id != "" ) { 
$sql_command = "	
update  	app_property   
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