<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_exchange_rate
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_exchange_rate.inc.php
 */

class  app_exchange_rate{	
				
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
function app_exchange_rate(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

app_exchange_rate

exchange_id
system_id
section_id
exchange_id_root
category_level
category_name
category_des
category_detail

category_image_mini
category_image

stat_view
stat_reply
option_order
option_status
system_delete

user_create
user_update
user_delete

datetime_create
datetime_update
datetime_delete
*/




/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_countbyset
*/
function function_countbyset($input_array){

$sql_other = $input_array["sql_other"];
$option_status = $input_array["option_status"];


//// sql command
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_exchange_rate
where			system_delete = 'none'  

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
if ($sql_orderby == "") { $sql_orderby =  " order by 	id  DESC " ; }


$option_status = $input_array["option_status"];

//// sql command
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_exchange_rate
where 			system_delete = 'none' 

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
$exchange_id = $input_array["exchange_id"];

//// sql command
if ($exchange_id != ""){

$sql_command = "
select 		* 
from			app_exchange_rate
where		system_delete= 'none'
and			exchange_id = '$exchange_id'

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;

}
}




/*
#################################################### end view  +++
*/





/*
#################################################### start update  +++
*/




/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update
*/

function function_update($input_array){		

//// request
$exchange_id = $input_array["exchange_id"]; 

$exchange_name = $input_array["exchange_name"]; 
$exchange_des = $input_array["exchange_des"]; 
$exchange_rate_baht = $input_array["exchange_rate_baht"]; 
$exchange_rate = $input_array["exchange_rate"]; 
$exchange_image = $input_array["exchange_image"]; 
$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"];

$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];




//// sql config
if ($option_status != "" ) { $sql_option_status = " option_status = '$option_status ' "  ;  }




$check_process = "insert" ; 
if ($exchange_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_exchange_rate
where 		system_delete = 'none'
and			exchange_id = '$exchange_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$exchange_id = $result_array["exchange_id"];
} ///
} ///

/// print "check_record_process = $check_record_process <br>"; 


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_exchange_rate ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "ex" ;
$input_idnow =  $cmd_check_record + 1 ; 
$exchange_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_exchange_rate ( 
exchange_id , 
option_status , 
system_delete , 
user_create , 
datetime_create 
)
				
values (
'$exchange_id'  , 
'on'  , 
'none'  , 
'$user_update'  , 
'$datetime_now'  
)									
 ";		
 
//// print $sql_command ; 
//// print "$sql_command <br><br>";
 
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 




if ($exchange_image != "" ){ 
$sql_exchange_image = " exchange_image = '$exchange_image' , "; 
}


/// update start
$sql_command="  
update   app_exchange_rate  

set  
exchange_name = '$exchange_name' ,
exchange_des = '$exchange_des' ,
exchange_rate_baht = '$exchange_rate_baht'  , 
exchange_rate = '$exchange_rate'  , 
$sql_exchange_image
option_order = '$option_order'  , 
option_status = '$option_status'  , 
user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			exchange_id = '$exchange_id'
 "; 
 
//// print "$sql_command <br>"; 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"exchange_id"=>"$exchange_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$exchange_id = $input_array["exchange_id"]; 

$exchange_rate_baht = $input_array["exchange_rate_baht"]; 
$exchange_rate = $input_array["exchange_rate"]; 
$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($option_status == "" ) {$option_status = "off" ; }


//// sql
if ($option_order != "")	{ $sql_option_order	=	" 	option_order = '$option_order' , " ; }
if ($option_status != "")	{ $sql_option_status	=	" 	option_status = '$option_status'  , " ; }


//// datetime
$config_date = date("Y-m-d");  /// 
$config_time = date("H:i:s");  /// 
$datetime_update = "$config_date $config_time"; 


if ($exchange_id != "" ) {  /// check id
$sql_command = "	
update  app_exchange_rate   

set    
exchange_rate_baht = '$exchange_rate_baht' , 
exchange_rate = '$exchange_rate' , 
$sql_option_order 
$sql_option_status 
datetime_update = '$datetime_update'

where  exchange_id = '$exchange_id'    
";		

/// print "$sql_command <br><br>"; 
$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"exchange_id"=>"$exchange_id" , 
);
return $result_return ;	
		
} /// 














/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$exchange_id = $input_array["exchange_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($exchange_id != "" ) { 
$sql_command = "	
update  	app_exchange_rate   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
exchange_id = '$exchange_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"exchange_id"=>"$exchange_id" , 
);
return $result_return ;	
		
} ///  end function




	
	

}///// class  eva_criteria{	
?>