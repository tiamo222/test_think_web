<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){
	



/**
 * app_ads_banner_match
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_ads_banner_match.inc.php
 */

class  app_ads_banner_match{	
				
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
function app_ads_banner_match(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

app_ads_banner_match

match_id
banner_id
position_id
position_code
section_id
category_id
page_id
stat_view
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
$banner_id = $input_array["banner_id"];
$position_id = $input_array["position_id"];
$section_id = $input_array["section_id"];
$category_id = $input_array["category_id"];
$page_id = $input_array["page_id"];
$option_status = $input_array["option_status"];


//// sql command
if ($banner_id != "") 				{ $sql_banner_id 		=	" and		banner_id = '$banner_id' " ; }
if ($position_id != "") 				{ $sql_position_id 		=	" and		position_id = '$position_id' " ; }
if ($section_id != "")  				{ $sql_section_id 		=	" and		section_id = '$section_id' " ; }
if ($category_id != "")  			{ $sql_category_id 		=	" and		category_id = '$category_id' " ; }
if ($page_id != "")  				{ $sql_page_id 			=	" and		page_id = '$page_id' " ; }
if ($option_status != "")  			{ $sql_option_status 	=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_ads_banner_match
where			system_delete = 'none'  

$sql_banner_id
$sql_position_id
$sql_section_id
$sql_category_id
$sql_page_id
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


$banner_id = $input_array["banner_id"];
$position_id = $input_array["position_id"];
$section_id = $input_array["section_id"];
$category_id = $input_array["category_id"];
$page_id = $input_array["page_id"];
$option_status = $input_array["option_status"];


//// sql command
if ($banner_id != "") 				{ $sql_banner_id 		=	" and		banner_id = '$banner_id' " ; }
if ($position_id != "") 				{ $sql_position_id 		=	" and		position_id = '$position_id' " ; }
if ($section_id != "")  				{ $sql_section_id 		=	" and		section_id = '$section_id' " ; }
if ($category_id != "")  			{ $sql_category_id 		=	" and		category_id = '$category_id' " ; }
if ($page_id != "")  				{ $sql_page_id 			=	" and		page_id = '$page_id' " ; }
if ($option_status != "")  			{ $sql_option_status 	=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_ads_banner_match
where 			system_delete = 'none' 

$sql_banner_id
$sql_position_id
$sql_section_id
$sql_category_id
$sql_page_id
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
if ($banner_id != ""){
$sql_command = "
select 		* 
from			app_ads_banner_match
where		system_delete = 'none'
and			banner_id = '$banner_id'
";	
$result_array = $this->db->GetRow($sql_command);

} ////

return 	 $result_array ;

}




function function_viewbyid_sql($input_array){
$sql_other = $input_array["sql_other"];

//// sql command
if ($sql_other != ""){
$sql_command = "
select 		* 
from			app_ads_banner_match
where		system_delete = 'none'
$sql_other
";	
$result_array = $this->db->GetRow($sql_command);

} ////

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
$match_id = $input_array["match_id"]; 
$banner_id = $input_array["banner_id"]; 
$position_id = $input_array["position_id"]; 
$position_code = $input_array["position_code"]; 
$section_id = $input_array["section_id"]; 

$category_id = $input_array["category_id"]; 
$page_id = $input_array["page_id"]; 
$stat_view = $input_array["stat_view"]; 
$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"]; 

$datetime_now = $input_array["datetime_now"];


//// sql config
/// if ($option_status != "" ) { $sql_option_status = " option_status = '$option_status ' "  ;  }




$check_process = "insert" ; 
if ($match_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_ads_banner_match
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
$sql_command = " select  count(*) from  app_ads_banner_match ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "matchid" ;
$input_idnow =  $cmd_check_record + 1 ; 
$match_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_ads_banner_match ( 
match_id , 
banner_id , 
position_id , 

option_status , 
system_delete , 
datetime_create 
)
				
values (
'$match_id'  , 
'$banner_id'  , 
'$position_id'  , 

'on'  , 
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
update   app_ads_banner_match  

set  
position_code = '$position_code' ,

banner_id = '$banner_id' ,
page_id = '$page_id' ,
stat_view = '$stat_view'  , 

option_order = '$option_order'  , 
option_status = '$option_status'  , 
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
$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 


//// sql
if ($match_id != "" ) {  /// check id
$sql_command = "	

update  app_ads_banner_match   

set    
option_order = '$option_order' , 
option_status = '$option_status'  , 
datetime_update = '$datetime_now' 
where  match_id = '$match_id'    

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
update  	app_ads_banner_match   
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




function  function_delete_bycase($input_array){	

$banner_id = $input_array["banner_id"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($banner_id != "" ) { 
$sql_command = "	
update  	app_ads_banner_match   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
banner_id = '$banner_id'  

";		

////print $sql_command ; 

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