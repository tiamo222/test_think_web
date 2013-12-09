<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){
	
	
/**
 * app_bidding_payment
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_bidding_payment.inc.php
 */


class  app_bidding_payment{	
				
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
function app_bidding_payment(){
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
$item_id = $input_array["item_id"];
$option_status = $input_array["option_status"];


//// sql command
if ($bidding_id != "")			{ $sql_bidding_id		=	" and		app_bidding_payment.bidding_id = '$bidding_id' " ; }
if ($item_id != "")				{ $sql_item_id 			=	" and		app_bidding_payment.item_id = '$item_id' " ; }
if ($option_status != "")		{ $sql_option_status	=	" and		app_bidding_payment.option_status = '$option_status' " ; }



//// recommend
$sql_command = "
select			count(*)  
from				app_bidding_payment $sql_joint_table 
where			app_bidding_payment.system_delete = 'none'  


$sql_bidding_id
$sql_item_id
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
if ($sql_orderby == "") 	{ $sql_orderby 	=  " order by 	app_bidding_payment.id  DESC " ; }
$sql_joint_table = $input_array["sql_joint_table"];
$sql_joint_select = $input_array["sql_joint_select"];
$sql_joint_where = $input_array["sql_joint_where"];



$bidding_id = $input_array["bidding_id"];
$item_id = $input_array["item_id"];
$option_status = $input_array["option_status"];


//// sql command
if ($bidding_id != "")			{ $sql_bidding_id		=	" and		app_bidding_payment.bidding_id = '$bidding_id' " ; }
if ($item_id != "")				{ $sql_item_id 			=	" and		app_bidding_payment.item_id = '$item_id' " ; }
if ($option_status != "")		{ $sql_option_status	=	" and		app_bidding_payment.option_status = '$option_status' " ; }



$sql_command = "
select		* $sql_joint_select
from 			app_bidding_payment $sql_joint_table
where 		app_bidding_payment.system_delete = 'none' 


$sql_bidding_id
$sql_item_id
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
$bidpay_id = $input_array["bidpay_id"];

//// sql command
if ($bidpay_id != "") {
$sql_command = "
select 		* 
from			app_bidding_payment
where		system_delete= 'none'
 and		bidpay_id = '$bidpay_id'

";	
//// print "sql_command = $sql_command <br>";
$result_array = $this->db->GetRow($sql_command);
}

return 	 $result_array ;
}




function function_viewbyid_sql($input_array){
$sql_other = $input_array["sql_other"];
//// sql command
if ($sql_other != "") {
$sql_command = "
select 		* 
from			app_bidding_payment
where		system_delete= 'none'
$sql_other
";	
//// print "sql_command = $sql_command <br>";
$result_array = $this->db->GetRow($sql_command);
} /// sql_other

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
$bidpay_id = $input_array["bidpay_id"]; 
$bidding_id = $input_array["bidding_id"]; 
$item_id = $input_array["item_id"]; 
$member_id = $input_array["member_id"]; 
$product_id = $input_array["product_id"]; 

$sql_update = $input_array["sql_update"]; 
$datetime_now = $input_array["datetime_now"];





$check_process = "insert" ; 
if ($bidpay_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_bidding_payment
where 		system_delete = 'none'
and			bidpay_id = '$bidpay_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
} ///
} ///



/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_bidding_payment ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "inv-" ;
$input_idnow =  $cmd_check_record + 1 ; 
$bidpay_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command = "
insert into  app_bidding_payment ( 
bidpay_id , 
bidding_id , 
item_id , 
member_id , 
product_id , 

system_delete , 
datetime_create 
)
				
values (
'$bidpay_id'  , 
'$bidding_id'  , 
'$item_id'  , 
'$member_id'  , 
'$product_id'  , 

'none'  , 
'$datetime_now'  

)									
 ";		
 
/// print $sql_command ;  
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 




/// update start
$sql_command="  
update   app_bidding_payment  

set  
$sql_update
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			bidpay_id = '$bidpay_id'
 "; 
//// print "$sql_command <br>"; 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"bidpay_id"=>"$bidpay_id" , 
);
return $result_return ;	


} //// end







function  function_update_bysql($input_array){	

$sql_update = $input_array["sql_update"]; 
$sql_where = $input_array["sql_where"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($sql_update != ""  and  $sql_where  ) { 
$sql_command = "	
update  app_bidding_payment   

set    
$sql_update
datetime_update = '$datetime_now'  

where   system_delete = 'none'
$sql_where

";		

/// print "sql_command = $sql_command <br>";

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

$bidpay_id = $input_array["bidpay_id"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($bidpay_id != "" ){ 

$sql_command = "	
update  	app_bidding_payment   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
bidpay_id = '$bidpay_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"bidpay_id"=>"$bidpay_id" , 
);
return $result_return ;	

} ///  end function




	
	

}///// class  eva_criteria{	
?>