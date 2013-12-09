<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * system_log
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/system_log.inc.php
 */

class  system_appmenu{	
				
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
function system_appmenu(){
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
$option_status = $input_array["option_status"];

//// sql command
if ($option_status != "")	{ $sql_option_status	=	" and		option_status = '$option_status' " ; }

//// recommend
$sql_command = "
select	count(*)  
from	system_appmenu
where	system_delete = 'none'  

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

$set_pager_limit = $input_array["set_pager_limit"];
$set_pager_start = $input_array["set_pager_start"];
if ($set_pager_limit == "") {$set_pager_limit = 10000 ; }
if ($set_pager_start == "") {$set_pager_start = 0 ; }


$sql_other = $input_array["sql_other"];
$sql_orderby = $input_array["sql_orderby"];
if ($sql_orderby == "") { $sql_orderby =  " order by 	id  DESC " ; }


$option_status = $input_array["option_status"];
//// sql command
if ($option_status != "")	{ $sql_option_status	=	" and		option_status = '$option_status' " ; }


$sql_command = "
select	*
from	system_appmenu
where	system_delete = 'none' 

$sql_option_status
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
$menu_id = $input_array["menu_id"];

//// sql command
if ($menu_id != ""){
$sql_command = "
select 		* 
from			system_appmenu
where		system_delete = 'none'
and			menu_id = '$menu_id'
";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;

} /// if ($menu_id != ""){
}





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyid
*/
function function_viewbyid_sql($input_array){
$sql_other = $input_array["sql_other"];
if ($sql_other != "" ){ 

//// sql command
$sql_command = "
select 		* 
from		system_appmenu
where		system_delete= 'none'
$sql_other
";	

//// print "sql_command = $sql_command ";

$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
} /// if ($sql_other != "" ){ 
}




/*
#################################################### end view  +++
*/





/*
#################################################### start update  +++
*/


function function_update($input_array){		

//// request
$menu_id = $input_array["menu_id"]; 
$menu_id_root = $input_array["menu_id_root"]; 
$menu_level = $input_array["menu_level"]; 
$menu_set = $input_array["menu_set"]; 
$language_id = $input_array["language_id"]; 
$menu_url = $input_array["menu_url"];
$menu_name = $input_array["menu_name"];

$option_target = $input_array["option_target"]; 
$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"];

$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];






$check_process = "insert" ; 
if ($menu_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		system_appmenu
where 		system_delete = 'none'
and			menu_id = '$menu_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$menu_id = $result_array["menu_id"];
} ///
} ///

/// print "check_record_process = $check_record_process <br>"; 


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  system_appmenu ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "menu" ;
$input_idnow =  $cmd_check_record + 1 ; 
$menu_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  system_appmenu ( 
menu_id , 
menu_set , 
language_id , 

option_status , 
system_delete , 
datetime_create 
)
				
values (
'$menu_id'  , 
'$menu_set'  , 
'$language_id'  , 

'on'  , 
'none'  , 
'$datetime_now'  
)									
 ";		
 
//// print "$sql_command <br><br>";
 
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 




/// update start
$sql_command="  
update   system_appmenu  

set  
menu_id_root = '$menu_id_root' ,
menu_level = '$menu_level' ,
menu_url = '$menu_url' ,
menu_name = '$menu_name' ,

option_target = '$option_target'  , 
option_order = '$option_order'  , 
option_status = '$option_status'  , 

datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			menu_id = '$menu_id'
 "; 
 //// print "$sql_command <br>"; 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"menu_id"=>"$menu_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$menu_id = $input_array["menu_id"]; 
$option_target = $input_array["option_target"]; 
$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 


//// sql
if ($option_target != "")	{ $sql_option_target	=	" 	option_target = '$option_target' , " ; }
if ($option_order != "")	{ $sql_option_order		=	" 	option_order = '$option_order' , " ; }
if ($option_status != "")	{ $sql_option_status	=	" 	option_status = '$option_status'  , " ; }

//// datetime
$config_date = date("Y-m-d");  /// 
$config_time = date("H:i:s");  /// 
$datetime_update = "$config_date $config_time" ; 

if ($menu_id != "" ) {  /// check id
$sql_command = "	
update  system_appmenu   

set    
$sql_option_order 
$sql_option_status 
datetime_update = '$datetime_update'

where  menu_id = '$menu_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"menu_id"=>"$menu_id" , 
);
return $result_return ;	
		
} /// 














/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$menu_id = $input_array["menu_id"]; 
$sql_other = $input_array["sql_other"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($menu_id != "" ){ $sql_menu_id = "   menu_id = '$menu_id'    "; }

if ($menu_id != ""  or $sql_other != "" ) { 
$sql_command = "	
update  	
system_appmenu   

set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where 
$sql_menu_id
$sql_other

";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"menu_id"=>"$menu_id" , 
);
return $result_return ;	
		
} ///  end function



	
	

}///// class  end{	
?>