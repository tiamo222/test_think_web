<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_category_match
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_category_match.inc.php
 */

class  app_category_match{	
				
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
function app_category_match(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

app_category_match

match_id
system_id
category_id
data_id
option_order
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

$system_id = $input_array["system_id"];
$category_id = $input_array["category_id"];
$data_id = $input_array["data_id"];
$option_status = $input_array["option_status"];


//// sql command
if ($system_id != "") 						{ $sql_system_id 			=	" and		system_id = '$system_id' " ; }
if ($category_id != "")  					{ $sql_category_id 			=	" and		category_id = '$category_id' " ; }
if ($data_id != "") 							{ $sql_data_id 				=	" and		data_id = '$data_id' " ; }
if ($option_status != "")  					{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_category_match
where			system_delete = 'none'  

$sql_system_id
$sql_category_id
$sql_data_id
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



$system_id = $input_array["system_id"];
$data_id = $input_array["data_id"];
$category_id = $input_array["category_id"];
$option_status = $input_array["option_status"];

//// sql command
if ($system_id != "") 						{ $sql_system_id 			=	" and		system_id = '$system_id' " ; }
if ($category_id != "")  					{ $sql_category_id 			=	" and		category_id = '$category_id' " ; }
if ($data_id != "") 							{ $sql_data_id 				=	" and		data_id = '$data_id' " ; }
if ($option_status != "")  					{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 				app_category_match
where 			system_delete = 'none' 

$sql_system_id 
$sql_category_id
$sql_data_id 
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

$match_id = $input_array["match_id"];

//// sql command
if ($match_id != "") 		{$sql_match_id 	=	" and		match_id = '$match_id' " ; }

$sql_command = "
select 		* 
from			app_category_match
where		system_delete= 'none'

$sql_match_id

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
}


function function_viewbyid_sql($input_array){

$sql_other = $input_array["sql_other"];
//// sql command
if ($sql_other != "" ){ 

$sql_command = "
select 		* 
from			app_category_match
where		system_delete= 'none'

$sql_other

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;

}////if ($sql_other != "" ){ 
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
$match_id = $input_array["match_id"]; 
$system_id = $input_array["system_id"]; 
$category_id = $input_array["category_id"]; 
$data_id = $input_array["data_id"]; 
$match_des = $input_array["match_des"]; 


$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"]; 

$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];








$check_process = "insert" ; 
if ($match_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_category_match
where 		system_delete = 'none'
and			match_id = '$match_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$match_id = $result_array["match_id"];
} ///
} ///

/// print "check_record_process = $check_record_process <br>"; 


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_category_match ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "match" ;
$input_idnow =  $cmd_check_record + 1 ; 
$match_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_category_match ( 
match_id , 
system_id , 
category_id , 
data_id , 

option_order , 
option_status , 
system_delete , 
user_create , 
datetime_create 
)
				
values (
'$match_id'  , 
'$system_id'  , 
'$category_id'  , 
'$data_id'  , 

'$option_order'  , 
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


//// sql config
if ($option_order != "" )	{ $sql_option_order 	= " option_order = '$option_order'  , "; 		}
if ($option_status != "" )	{ $sql_option_status 	= " option_status = '$option_status' , "; 	}

/// update start
$sql_command="  
update   app_category_match  

set  
$sql_option_order
$sql_option_status
match_des = '$match_des' , 

user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			match_id = '$match_id'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"match_id"=>"$match_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$match_id = $input_array["match_id"]; 
$option_status = $input_array["option_status"]; 
$option_order = $input_array["option_order"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($option_status == "" ){ $option_status = "off"; }

if ($match_id != "" ) {  /// check id
$sql_command = "	
update  app_category_match   

set    
option_status = '$option_status' , 
option_order = '$option_order' , 
datetime_update = '$datetime_now'

where  	match_id = '$match_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"match_id"=>"$match_id" , 
);
return $result_return ;	
		
} /// 








/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$match_id = $input_array["match_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($match_id != "" ) { 
$sql_command = "	
update  	app_category_match   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
match_id = '$match_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"match_id"=>"$match_id" , 
);
return $result_return ;	
		
} ///  end function



/*

function  function_delete_byroot($input_array){	

$system_id = $input_array["system_id"]; 
$category_id = $input_array["category_id"]; 
$data_id = $input_array["data_id"]; 

$datetime_now = $input_array["datetime_now"]; 


/////////// sql config
if ($system_id != "" ) {
$sql_system_id = "  system_id = '$system_id'  "; 	
$option_run = "run"; 
}

if ($category_id != "" ) {
$sql_category_id = "  category_id = '$category_id'  "; 	
$option_run = "run"; 
}


if ($data_id != "" ) {
$sql_data_id = "  data_id = '$data_id'  "; 	
$option_run = "run"; 
}



if ($option_run == "run" ) { 
$sql_command = "	
update  	app_category_match   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
$sql_system_id
$sql_category_id
$sql_data_id

";		
$result_update = $this->db->Execute($sql_command);	
} //////if ($option_run == "run" ) { 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
);
return $result_return ;	
		
} ///  end function

*/

	
	
	

}///// class  eva_criteria{	
?>