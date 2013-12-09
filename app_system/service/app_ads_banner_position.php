<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){
	
	
	
/**
 * app_ads_banner_position
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_ads_banner_position.inc.php
 */

class  app_ads_banner_position{	
				
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
function app_ads_banner_position(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

app_ads_banner_position

position_id
section_id
category_id
page_id

position_code
position_name
position_loop

position_w
position_h
position_des
position_url
option_order
option_status
system_delete
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
$section_id = $input_array["section_id"];
$category_id = $input_array["category_id"];
$page_id = $input_array["page_id"];
$option_status = $input_array["option_status"];


//// sql command
if ($section_id != "") 						{ $sql_section_id 					=	" and		section_id = '$section_id' " ; }
if ($category_id != "")  					{ $sql_category_id 					=	" and		category_id = '$category_id' " ; }
if ($page_id != "")  						{ $sql_page_id 						=	" and		page_id = '$page_id' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_ads_banner_position
where			system_delete = 'none'  

$sql_section_id
$sql_category_id
$sql_page_id
$sql_option_status

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


$section_id = $input_array["section_id"];
$category_id = $input_array["category_id"];
$page_id = $input_array["page_id"];
$option_status = $input_array["option_status"];


//// sql command
if ($section_id != "") 						{ $sql_section_id 					=	" and		section_id = '$section_id' " ; }
if ($category_id != "")  					{ $sql_category_id 					=	" and		category_id = '$category_id' " ; }
if ($page_id != "")  						{ $sql_page_id 						=	" and		page_id = '$page_id' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }




$sql_command = "
select			*
from 			app_ads_banner_position
where 		system_delete = 'none' 

$sql_section_id
$sql_category_id
$sql_page_id
$sql_option_status

$sql_other
$sql_orderby

";		

//// print "sql_command = $sql_command ";

$result_array = $this->db->SelectLimit($sql_command,$set_pager_limit,$set_pager_start );
return $result_array ;

} ///////////





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyid
*/
function function_viewbyid($input_array){

$position_id = $input_array["position_id"];

//// sql command
if ($position_id != "") 		{$sql_position_id 	=	" and		position_id = '$position_id' " ; }

$sql_command = "
select 		* 
from			app_ads_banner_position
where		system_delete= 'none'

$sql_position_id

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
$position_id = $input_array["position_id"]; 
$section_id = $input_array["section_id"]; 
$category_id = $input_array["category_id"]; 
$page_id = $input_array["page_id"]; 

$position_code = $input_array["position_code"]; 
$position_name = $input_array["position_name"]; 
$position_des = $input_array["position_des"]; 
$position_url = $input_array["position_url"]; 

$position_loop = $input_array["position_loop"]; 
$position_w = $input_array["position_w"]; 
$position_h = $input_array["position_h"]; 

$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"];
$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];


//// sql config
/// if ($option_status != "" ) { $sql_option_status = " option_status = '$option_status ' "  ;  }




$check_process = "insert" ; 
if ($position_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_ads_banner_position
where 		system_delete = 'none'
and			position_id = '$position_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$position_id = $result_array["position_id"];
} ///
} ///

/// print "check_record_process = $check_record_process <br>"; 


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_ads_banner_position ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "position" ;
$input_idnow =  $cmd_check_record + 1 ; 
$position_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_ads_banner_position ( 
position_id , 

option_status , 
system_delete , 
datetime_create 
)
				
values (
'$position_id'  , 

'on'  , 
'none'  , 
'$datetime_now'  
)									
 ";		
 
//// print $sql_command ; 
 
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 



/// update start
$sql_command="  
update   app_ads_banner_position  

set  
section_id = '$section_id' ,
category_id = '$category_id' ,
page_id = '$page_id' ,

position_code = '$position_code' ,
position_name = '$position_name' ,
position_des = '$position_des'  , 
position_url = '$position_url'  , 

position_loop = '$position_loop' ,
position_w = '$position_w'  , 
position_h = '$position_h'  , 

option_order = '$option_order'  , 
option_status = '$option_status'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			position_id = '$position_id'
 "; 
 
///  print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"position_id"=>"$position_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$position_id = $input_array["position_id"]; 
$page_id = $input_array["page_id"]; 
$position_code = $input_array["position_code"]; 
$position_name = $input_array["position_name"]; 

$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 


//// sql


if ($position_id != "" ) {  /// check id
$sql_command = "	
update  app_ads_banner_position   

set    
page_id = '$page_id' , 
position_code = '$position_code' , 
position_name = '$position_name' , 
option_order = '$option_order' , 
option_status = '$option_status' , 
datetime_update = '$datetime_now' 

where  position_id = '$position_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"position_id"=>"$position_id" , 
);
return $result_return ;	
		
} /// 














/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$position_id = $input_array["position_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($position_id != "" ) { 
$sql_command = "	
update  	app_ads_banner_position   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
position_id = '$position_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"position_id"=>"$position_id" , 
);
return $result_return ;	
		
} ///  end function




}///// class  eva_criteria{	
?>