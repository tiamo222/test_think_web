<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * system_auth_page
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/system_auth_page.inc.php
 */

class  system_auth_page{	
				
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
function system_auth_page(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

system_auth_page

page_id
system_id
section_id
page_id_root
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

$category_id = $input_array["category_id"];
$page_level = $input_array["page_level"];
$option_show  = $input_array["option_show"];
$option_status = $input_array["option_status"];


//// sql command
if ($category_id != "") 					{ $sql_category_id 					=	" and		category_id = '$category_id' " ; }
if ($page_level != "") 						{ $sql_page_level 					=	" and		page_level = '$page_level' " ; }
if ($option_show != "")  					{ $sql_option_show 				=	" and		option_show = '$option_show' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				system_auth_page
where			system_delete = 'none'  

$sql_category_id
$sql_page_level
$sql_option_show
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



$category_id = $input_array["category_id"];
$page_level = $input_array["page_level"];
$option_show  = $input_array["option_show"];
$option_status = $input_array["option_status"];

//// sql command
if ($category_id != "") 					{ $sql_category_id 					=	" and		category_id = '$category_id' " ; }
if ($page_level != "") 						{ $sql_page_level 					=	" and		page_level = '$page_level' " ; }
if ($option_show != "")  					{ $sql_option_show 				=	" and		option_show = '$option_show' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			system_auth_page
where 			system_delete = 'none' 

$sql_category_id 
$sql_page_level 
$sql_option_show
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
$page_id = $input_array["page_id"];
//// sql command
if ($page_id != ""){
$sql_command = "
select 		* 
from			system_auth_page
where		system_delete= 'none'
and			page_id = '$page_id'

";	
$result_array = $this->db->GetRow($sql_command);
} 

return 	 $result_array ;
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
from			system_auth_page
where		system_delete= 'none'
$sql_other
";	

//// print "sql_command = $sql_command ";

$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
} /// if ($sql_other != "" ){ 
} /// function_viewbyid_sql




/*
#################################################### end view  +++
*/





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update
*/

function function_update($input_array){		

//// request
$page_id = $input_array["page_id"]; 
$category_id = $input_array["category_id"]; 
$page_level = $input_array["page_level"]; 

$page_name = $input_array["page_name"]; 
$page_url = $input_array["page_url"]; 

$option_show = $input_array["option_show"]; 
$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"];

$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];



$check_process = "insert" ; 
if ($page_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		system_auth_page
where 		system_delete = 'none'
and			page_id = '$page_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$page_id = $result_array["page_id"];
} ///
} ///


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  system_auth_page ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "page" ;
$input_idnow =  $cmd_check_record + 1 ; 
$page_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  system_auth_page ( 
page_id , 
category_id , 
page_level , 
option_status , 
system_delete , 
datetime_create 
)
				
values (
'$page_id'  , 
'$category_id'  , 
'$page_level'  , 
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
update   system_auth_page  

set  
category_id = '$category_id' ,
page_level = '$page_level' ,

page_url = '$page_url' ,
page_name = '$page_name' ,
page_des = '$page_des' ,

option_show  = '$option_show'  , 
option_order = '$option_order'  , 
option_status = '$option_status'  , 

datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			page_id = '$page_id'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"page_id"=>"$page_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$page_id = $input_array["page_id"]; 

$page_name = $input_array["page_name"]; 
$page_url = $input_array["page_url"]; 

$option_order = $input_array["option_order"]; 
$option_show = $input_array["option_show"]; 
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 


//// datetime
$config_date = date("Y-m-d");  /// 
$config_time = date("H:i:s");  /// 
$datetime_update = "$config_date $config_time" ; 

if ($page_id != "" ) {  /// check id
$sql_command = "	
update  system_auth_page   

set    
page_name = '$page_name' , 
page_url = '$page_url' , 
option_show = '$option_show' , 
option_order = '$option_order' , 
option_status = '$option_status' , 
datetime_update = '$datetime_update'

where  page_id = '$page_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"page_id"=>"$page_id" , 
);
return $result_return ;	
		
} /// 














/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$page_id = $input_array["page_id"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($page_id != "" ){
	
$sql_command = "	
update  	system_auth_page   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
page_id = '$page_id'  
";		
$result_update = $this->db->Execute($sql_command);	

} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"page_id"=>"$page_id" , 
);
return $result_return ;	
		
} ///  end function





function  function_delete_bycategory($input_array){	

$category_id = $input_array["category_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($category_id != "" ) { 
$sql_command = "	
update  	system_auth_page   
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