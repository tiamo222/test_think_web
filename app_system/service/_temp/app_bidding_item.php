<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_bidding_item
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_bidding_item.inc.php
 */


class  app_bidding_item{	
				
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
function app_bidding_item(){
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


$bidding_id = $input_array["bidding_id"];
$product_id = $input_array["product_id"];
$member_id = $input_array["member_id"];
$option_bidding = $input_array["option_bidding"];
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"];

//// sql command
if ($bidding_id != "") 						{ $sql_bidding_id 			=	" and		app_bidding_item.bidding_id = '$bidding_id' " ; }
if ($product_id != "")  						{ $sql_product_id 			=	" and		app_bidding_item.product_id = '$product_id' " ; }
if ($member_id != "")  					{ $sql_member_id 			=	" and		app_bidding_item.member_id = '$member_id' " ; }
if ($option_bidding != "")  				{ $sql_option_bidding 		=	" and		app_bidding_item.option_bidding = '$option_bidding' " ; }
if ($option_approve != "")  				{ $sql_option_approve 	=	" and		app_bidding_item.option_approve = '$option_approve' " ; }
if ($option_status != "")  					{ $sql_option_status 		=	" and		app_bidding_item.option_status = '$option_status' " ; }



//// recommend
$sql_command = "
select			count(*)  
from				app_bidding_item $sql_joint_table 
where			app_bidding_item.system_delete = 'none'  

$sql_bidding_id
$sql_product_id
$sql_member_id
$sql_option_bidding
$sql_option_approve
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
if ($sql_orderby == "") 	{ $sql_orderby 	=  " order by 	app_bidding_item.id  DESC " ; }
$sql_joint_table = $input_array["sql_joint_table"];
$sql_joint_select = $input_array["sql_joint_select"];
$sql_joint_where = $input_array["sql_joint_where"];



$bidding_id = $input_array["bidding_id"];
$product_id = $input_array["product_id"];
$member_id = $input_array["member_id"];
$option_bidding = $input_array["option_bidding"];
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"];



//// sql command
if ($bidding_id != "") 						{ $sql_bidding_id 			=	" and		app_bidding_item.bidding_id = '$bidding_id' " ; }
if ($product_id != "")  						{ $sql_product_id 			=	" and		app_bidding_item.product_id = '$product_id' " ; }
if ($member_id != "")  					{ $sql_member_id 			=	" and		app_bidding_item.member_id = '$member_id' " ; }
if ($option_bidding != "")  				{ $sql_option_bidding 		=	" and		app_bidding_item.option_bidding = '$option_bidding' " ; }
if ($option_approve != "")  				{ $sql_option_approve 	=	" and		app_bidding_item.option_approve = '$option_approve' " ; }
if ($option_status != "")  					{ $sql_option_status 		=	" and		app_bidding_item.option_status = '$option_status' " ; }


$sql_command = "
select		* $sql_joint_select
from 			app_bidding_item $sql_joint_table
where 		app_bidding_item.system_delete = 'none' 


$sql_bidding_id
$sql_product_id
$sql_member_id
$sql_option_bidding
$sql_option_approve
$sql_option_status

$sql_joint_where
$sql_other
$sql_orderby

";		

/// print "sql_command = $sql_command ";

$result_array = $this->db->SelectLimit($sql_command,$set_pager_limit,$set_pager_start );
return $result_array ;

} ///////////





function function_viewbyset_bydistinct($input_array){

$set_pager_limit = $input_array["set_pager_limit"];
$set_pager_start = $input_array["set_pager_start"];
if ($set_pager_limit == "") {$set_pager_limit = 10000 ; }
if ($set_pager_start == "") {$set_pager_start = 0 ; }


$sql_other = $input_array["sql_other"];
$sql_orderby = $input_array["sql_orderby"];
if ($sql_orderby == "") 	{ $sql_orderby 	=  " order by 	app_bidding_item.id  DESC " ; }


$bidding_id = $input_array["bidding_id"];
$product_id = $input_array["product_id"];
$member_id = $input_array["member_id"];
$option_bidding = $input_array["option_bidding"];
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"];



//// sql command
if ($bidding_id != "") 						{ $sql_bidding_id 			=	" and		app_bidding_item.bidding_id = '$bidding_id' " ; }
if ($product_id != "")  						{ $sql_product_id 			=	" and		app_bidding_item.product_id = '$product_id' " ; }
if ($member_id != "")  					{ $sql_member_id 			=	" and		app_bidding_item.member_id = '$member_id' " ; }
if ($option_bidding != "")  				{ $sql_option_bidding 		=	" and		app_bidding_item.option_bidding = '$option_bidding' " ; }
if ($option_approve != "")  				{ $sql_option_approve 	=	" and		app_bidding_item.option_approve = '$option_approve' " ; }
if ($option_status != "")  					{ $sql_option_status 		=	" and		app_bidding_item.option_status = '$option_status' " ; }


$sql_command = "
select		DISTINCT  app_bidding_item.bidding_id 
from 			app_bidding_item
where 		app_bidding_item.system_delete = 'none' 

$sql_bidding_id
$sql_product_id
$sql_member_id
$sql_option_bidding
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
$item_id = $input_array["item_id"];

//// sql command
if ($item_id != "") { 
$sql_command = "
select 		* 
from			app_bidding_item
where		system_delete= 'none'
and		item_id = '$item_id' 

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;

}
} //// end function_viewbyid



function function_viewbyid_sql($input_array){
$sql_other = $input_array["sql_other"];

//// sql command
if ($sql_other != "") { 
$sql_command = "
select 		* 
from			app_bidding_item
where		system_delete= 'none'

$sql_other

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;

}
}////  end function_viewbyid_sql



/*
#################################################### end view  +++
*/





/*
#################################################### start update  +++
*/


function function_update($input_array){		

//// request
$item_id = $input_array["item_id"]; 
$bidding_id = $input_array["bidding_id"]; 
$product_id = $input_array["product_id"]; 
$member_id = $input_array["member_id"]; 

$price_bidding = $input_array["price_bidding"]; 
$bidding_note = $input_array["bidding_note"]; 

$option_order = $input_array["option_order"]; 
$option_bidding = $input_array["option_bidding"];
$option_approve = $input_array["option_approve"]; 
$option_status = $input_array["option_status"];

$datetime_bidding = $input_array["datetime_bidding"];
$datetime_now = $input_array["datetime_now"];


$check_process = "insert" ; 
if ($item_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_bidding_item
where 		system_delete = 'none'
and			item_id = '$item_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
} ///
} ///



/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_bidding_item ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "item" ;
$input_idnow =  $cmd_check_record + 1 ; 
$item_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command = "
insert into  app_bidding_item ( 
item_id , 
bidding_id , 
product_id , 
member_id , 

option_order , 
option_bidding , 
option_approve , 
option_status , 
system_delete , 

datetime_create 
)
				
values (
'$item_id'  , 
'$bidding_id'  , 
'$product_id'  , 
'$member_id'  , 

'0'  , 
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



if ($price_bidding != "" )					{ $sql_price_bidding = " price_bidding = '$price_bidding' ,  "; }
if ($bidding_note != "" )					{ $sql_bidding_note = " bidding_note = '$bidding_note' ,  "; }
if ($option_bidding != "" )				{ $sql_option_bidding = " option_bidding = '$option_bidding' ,  "; }
if ($option_approve != "" )				{ $sql_option_approve = " option_approve = '$option_approve' ,  "; }
if ($option_status != "" )					{ $sql_option_status = " option_status = '$option_status' ,  "; }

if ($datetime_bidding != "" )			{ $sql_datetime_bidding = " datetime_bidding = '$datetime_bidding' ,  "; }



/// update start
$sql_command="  
	update   
	app_bidding_item  

	set  
	$sql_price_bidding
	$bidding_note
	$sql_option_approve
	$sql_option_bidding
	$sql_option_status

	$sql_datetime_bidding
	datetime_update = '$datetime_now'  

	where		system_delete = 'none'
	and			item_id = '$item_id'
 "; 

//// print "$sql_command <br>"; 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"item_id"=>"$item_id" , 
);
return $result_return ;	


} //// end







/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/


function  function_update_option($input_array){	

//// request
$item_id = $input_array["item_id"]; 

$option_bidding = $input_array["option_bidding"];
$option_order = $input_array["option_order"];
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 




if ($item_id != "" ) {  /// check id
$sql_command = "	
update  app_bidding_item   

set    
option_bidding = '$option_bidding' , 
option_order = '$option_order' , 
option_approve = '$option_approve' , 
option_status = '$option_status' , 

datetime_update = '$datetime_now'

where  system_delete = 'none' 
AND  item_id = '$item_id'    
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




function  function_update_winner($input_array){	

//// request
$item_id = $input_array["item_id"]; 
$option_bidding_winner = $input_array["option_bidding_winner"];
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($item_id != "" ) {  /// check id
$sql_command = "	
update  app_bidding_item   

set    
option_bidding_winner = '$option_bidding_winner' , 
option_status = '$option_status' , 
datetime_update = '$datetime_now'

where  system_delete = 'none' 
AND  item_id = '$item_id'    
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




function  function_update_winner_confirm($input_array){	

//// request
$item_id = $input_array["item_id"]; 
$option_winner_confirm = $input_array["option_winner_confirm"];
$datetime_now = $input_array["datetime_now"]; 

if ($option_winner_confirm == "" ){ $option_winner_confirm = "none"; }

if ($item_id != "" ) {  /// check id
$sql_command = "	
update  app_bidding_item   

set    
option_winner_confirm = '$option_winner_confirm' , 
datetime_update = '$datetime_now'

where  system_delete = 'none' 
AND  item_id = '$item_id'    
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
$datetime_now = $input_array["datetime_now"]; 

if ($item_id != "" ){ 

$sql_command = "	
update  	app_bidding_item   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
item_id = '$item_id'  
";		
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