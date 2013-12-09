<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * system_language
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/system_language.inc.php
 */


class  app_language{	
				
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
function app_language(){
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


$option_status = $input_array["option_status"];
if ($option_status != "")  					{ $sql_option_status 				=	" and		app_language.option_status = '$option_status' " ; }

$sql_command = "
select			count(*)  
from				app_language 	$sql_joint_table 
where			app_language.system_delete = 'none'  

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
if ($sql_orderby == "") 	{ $sql_orderby 	=  " order by 	app_language.id  DESC " ; }
$sql_joint_table = $input_array["sql_joint_table"];
$sql_joint_select = $input_array["sql_joint_select"];
$sql_joint_where = $input_array["sql_joint_where"];


$option_status = $input_array["option_status"];
if ($option_status != "" ) 	{ $sql_option_status  = "  and		app_language.option_status = '$option_status' " ; }

$sql_command = "
select		* $sql_joint_select
from 			app_language  $sql_joint_table
where 		app_language.system_delete = 'none' 

$sql_option_status
$sql_joint_where
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
$language_id = $input_array["language_id"];
if ($language_id != "" ){
$sql_command = "
select 		* 
from			app_language
where		system_delete= 'none'
and			language_id = '$language_id'

";	
$result_array = $this->db->GetRow($sql_command);
}////
return 	 $result_array ;
}



function function_viewbyid_sql($input_array){
$sql_other = $input_array["sql_other"];
if ($sql_other != "" ){
$sql_command = "
select 		* 
from			app_language
where		system_delete= 'none'
$sql_other

";	
$result_array = $this->db->GetRow($sql_command);
}////sql_other
return 	 $result_array ;
}



/*
#################################################### end view  +++
*/







/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$language_id = $input_array["language_id"]; 
$option_default_show = $input_array["option_default_show"]; 
$option_default_input = $input_array["option_default_input"]; 
$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"]; 


if ( $option_default_show != "" )		{ $sql_option_default_show = " option_default_show = '$option_default_show' ,  "; }
if ( $option_default_input != "" ) 		{ $sql_option_default_input = " option_default_input = '$option_default_input' ,  "; }
if ( $option_order != "" ) 				{ $sql_option_order = " option_order = '$option_order' ,  "; }
if ( $option_status != "" ) 				{ $sql_option_status = " option_status = '$option_status' ,  "; }


if ($language_id != "" ) {  /// check id
$sql_command = "	
update  app_language   

set    
$sql_option_default_show
$sql_option_default_input
$sql_option_order
$sql_option_status
datetime_update = '$datetime_now'

where  language_id = '$language_id'    
";

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"language_id"=>"$language_id" , 
);
return $result_return ;	
		
} /// 











/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$language_id = $input_array["language_id"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($language_id != "" ){ 

$sql_command = "	
update  	app_language   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
language_id = '$language_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"language_id"=>"$language_id" , 
);
return $result_return ;

} ///  end function



	

}///// class  eva_criteria{	
?>