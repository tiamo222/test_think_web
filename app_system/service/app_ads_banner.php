<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){
	

/**
 * app_ads_banner
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_ads_banner.inc.php
 */

class  app_ads_banner{	
				
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
function app_ads_banner(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

app_ads_banner

banner_id
banner_name
banner_des

banner_company
banner_company_contact
banner_position
banner_url
banner_code
banner_image
banner_type
datetime_start
datetime_end

stat_view
option_order
option_status
system_delete

user_create
user_update
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

$banner_type = $input_array["banner_type"];
$banner_position = $input_array["banner_position"];
$option_status = $input_array["option_status"];


//// sql command
if ($system_id != "") 						{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($section_id != "") 						{ $sql_section_id 					=	" and		section_id = '$section_id' " ; }

if ($banner_type != "")  					{ $sql_banner_type 				=	" and		banner_type = '$banner_type' " ; }
if ($banner_position != "")  				{ $sql_banner_position 			=	" and		banner_position = '$banner_position' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_ads_banner
where			system_delete = 'none'  

$sql_banner_type
$sql_banner_position
$sql_option_status
$sql_other

";	

///print " sql_command = $sql_command ";
 
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
$section_id = $input_array["section_id"];

$banner_type = $input_array["banner_type"];
$banner_position = $input_array["banner_position"];
$option_status = $input_array["option_status"];

//// sql command
if ($system_id != "") 						{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($section_id != "") 						{ $sql_section_id 					=	" and		section_id = '$section_id' " ; }

if ($banner_type != "")  					{ $sql_banner_type 				=	" and		banner_type = '$banner_type' " ; }
if ($banner_position != "")  				{ $sql_banner_position 			=	" and		banner_position = '$banner_position' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_ads_banner
where 			system_delete = 'none' 

$sql_banner_type
$sql_banner_position
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

$banner_id = $input_array["banner_id"];

//// sql command
if ($banner_id != "") 		{$sql_banner_id 	=	" and		banner_id = '$banner_id' " ; }

$sql_command = "
select 		* 
from			app_ads_banner
where		system_delete= 'none'

$sql_banner_id

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
$banner_id = $input_array["banner_id"]; 
$banner_name = $input_array["banner_name"]; 
$banner_des = $input_array["banner_des"]; 

$banner_company = $input_array["banner_company"]; 
$banner_company_contact = $input_array["banner_company_contact"]; 
$banner_position = $input_array["banner_position"]; 
$banner_url = $input_array["banner_url"]; 

$banner_type = $input_array["banner_type"]; 
$banner_code = $input_array["banner_code"]; 
$banner_image = $input_array["banner_image"]; 


$datetime_start = $input_array["datetime_start"]; 
$datetime_end = $input_array["datetime_end"]; 

$stat_view = $input_array["stat_view"]; 

$option_order = $input_array["option_order"]; 
$option_approve = $input_array["option_approve"]; 
$option_status = $input_array["option_status"];
$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];




//// sql config
if ($option_status != "" ) { $sql_option_status = " option_status = '$option_status ' "  ;  }




$check_process = "insert" ; 
if ($banner_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_ads_banner
where 		system_delete = 'none'
and			banner_id = '$banner_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$banner_id = $result_array["banner_id"];
} ///
} ///

/// print "check_record_process = $check_record_process <br>"; 


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_ads_banner ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "adsbanner" ;
$input_idnow =  $cmd_check_record + 1 ; 
$banner_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_ads_banner ( 
banner_id , 

option_status , 
system_delete , 
user_create , 
datetime_create 
)
				
values (
'$banner_id'  , 

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






/// update start
$sql_command="  
update   app_ads_banner  

set  
banner_name = '$banner_name' ,
banner_name = '$banner_name' ,
banner_des = '$banner_des' ,

banner_company = '$banner_company' ,
banner_company_contact = '$banner_company_contact' ,
banner_position = '$banner_position' ,
banner_url = '$banner_url'  , 

banner_type = '$banner_type'  , 
banner_code = '$banner_code'  , 
banner_image = '$banner_image'  , 

datetime_start = '$datetime_start'  , 
datetime_end = '$datetime_end'  , 


option_order = '$option_order'  , 
option_approve = '$option_approve'  , 
option_status = '$option_status'  , 

user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			banner_id = '$banner_id'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"banner_id"=>"$banner_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$banner_id = $input_array["banner_id"]; 
$option_order = $input_array["option_order"]; 
$option_approve = $input_array["option_approve"]; 
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 


//// sql


if ($banner_id != "" ) {  /// check id
$sql_command = "	
update  app_ads_banner   

set    
option_order = '$option_order' , 
option_approve = '$option_approve' , 
option_status = '$option_status' , 
datetime_update = '$datetime_now' 

where  banner_id = '$banner_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"banner_id"=>"$banner_id" , 
);
return $result_return ;	
		
} /// 














/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$banner_id = $input_array["banner_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($banner_id != "" ) { 
$sql_command = "	
update  	app_ads_banner   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
banner_id = '$banner_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"banner_id"=>"$banner_id" , 
);
return $result_return ;	
		
} ///  end function




}///// class  eva_criteria{	
?>