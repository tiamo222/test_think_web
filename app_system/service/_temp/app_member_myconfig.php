<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_member_myconfig
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_member_myconfig.inc.php
 */

class  app_member_myconfig{	
				
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
function app_member_myconfig(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

//////////////////////////////////////////
app_member_myconfig
myconfig_id_gen
myconfig_id
myconfig_name
myconfig_des
option_order
option_autoload
option_status
system_delete
user_create
user_update
user_delete
datetime_create
datetime_update
datetime_delete

//////////////////////////////////////////

*/




/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_countbyset
*/
function function_countbyset($input_array){

$sql_other 		= $input_array["sql_other"];
$system_id 		= $input_array["system_id"];
$option_status 	= $input_array["option_status"];

//// sql command
if ($system_id != "") 						{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_member_myconfig
where			system_delete = 'none'  

$sql_system_id
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

$set_pager_limit 		= $input_array["set_pager_limit"];
$set_pager_start 		= $input_array["set_pager_start"];
if ($set_pager_limit == "") {$set_pager_limit = 10000 ; }
if ($set_pager_start == "") {$set_pager_start = 0 ; }


$sql_other = $input_array["sql_other"];
$sql_orderby = $input_array["sql_orderby"];
if ($sql_orderby == "") { $sql_orderby =  " order by 	id  DESC " ; }

$system_id 		= $input_array["system_id"];
$option_status 	= $input_array["option_status"];

//// sql command
if ($system_id != "") 						{ $sql_system_id 			=	" and		system_id = '$system_id' " ; }
if ($option_status != "")  					{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_member_myconfig
where 			system_delete = 'none' 

$sql_system_id 
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

$myconfig_id_gen = $input_array["myconfig_id_gen"];

//// sql command
if ($myconfig_id_gen != "") 		{$sql_myconfig_id_gen 	=	" and		myconfig_id_gen = '$myconfig_id_gen' " ; }

$sql_command = "
select 		* 
from			app_member_myconfig
where		system_delete= 'none'

$sql_myconfig_id_gen

";	
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
$myconfig_id_gen = $input_array["myconfig_id_gen"]; 
$myconfig_id = $input_array["myconfig_id"]; 
$system_id = $input_array["system_id"]; 

$myconfig_name = $input_array["myconfig_name"]; 
$myconfig_des = $input_array["myconfig_des"]; 

$option_order = $input_array["option_order"]; 
$option_autoload = $input_array["option_autoload"]; 
$option_status = $input_array["option_status"];

$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];




//// sql config

$check_process = "insert" ; 
if ($myconfig_id_gen != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_member_myconfig
where 		system_delete = 'none'
and			myconfig_id_gen = '$myconfig_id_gen'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$myconfig_id_gen = $result_array["myconfig_id_gen"];
$db_video_image_mini  = $result_array["video_image_mini"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_member_myconfig ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "myconfig-" ;
$input_idnow =  $cmd_check_record + 1 ; 
$myconfig_id_gen = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_member_myconfig ( 
myconfig_id_gen , 
system_id , 

option_status , 
system_delete , 
user_create , 
datetime_create 
)
				
values (
'$myconfig_id_gen'  , 
'$system_id'  , 

'on'  , 
'none'  , 
'$user_update'  , 
'$datetime_now'  
)									
 ";		
 
//// print $sql_command ; 
 
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 




/// update start
$sql_command="  
update   app_member_myconfig  

set  
myconfig_id = '$myconfig_id' ,
system_id = '$system_id' ,
myconfig_name = '$myconfig_name' ,
myconfig_des = '$myconfig_des' ,

option_order = '$option_order' ,
option_autoload = '$option_autoload' ,
option_status = '$option_status'  , 

user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			myconfig_id_gen = '$myconfig_id_gen'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"myconfig_id_gen"=>"$myconfig_id_gen" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$myconfig_id_gen = $input_array["myconfig_id_gen"]; 
$myconfig_name = $input_array["myconfig_name"]; 
$myconfig_des = $input_array["myconfig_des"]; 
$option_autoload = $input_array["option_autoload"];
$option_order = $input_array["option_order"];
$option_status = $input_array["option_status"]; 

$datetime_now = $input_array["datetime_now"]; 



if ($myconfig_id_gen != "" ) {  /// check id
$sql_command = "	
update  app_member_myconfig   

set    
myconfig_name = '$myconfig_name' , 
myconfig_des = '$myconfig_des' , 
option_autoload = '$option_autoload' , 
option_order = '$option_order' , 
option_status = '$option_status' , 
datetime_update = '$datetime_now'

where  myconfig_id_gen = '$myconfig_id_gen'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"myconfig_id_gen"=>"$myconfig_id_gen" , 
);
return $result_return ;	
		
} /// 














/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$myconfig_id_gen = $input_array["myconfig_id_gen"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($myconfig_id_gen != "" ) { 
$sql_command = "	
update  	app_member_myconfig   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
myconfig_id_gen = '$myconfig_id_gen'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"myconfig_id_gen"=>"$myconfig_id_gen" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  eva_criteria{	
?>