<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_language_config
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_language_config.inc.php
 */


class  app_language_config{	
				
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
function app_language_config(){
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


$language_id = $input_array["language_id"];
$option_type = $input_array["option_type"];
$option_status = $input_array["option_status"];


if ($language_id != "")  			{ $sql_language_id 		=	" and		app_language_config.language_id = '$language_id' " ; }
if ($option_type != "")  		{ $sql_option_type 	=	" and		app_language_config.option_type = '$option_type' " ; }
if ($option_status != "")  			{ $sql_option_status 		=	" and		app_language_config.option_status = '$option_status' " ; }


$sql_command = "
select			count(*)  
from				app_language_config $sql_joint_table 
where			app_language_config.system_delete = 'none'  


$sql_language_id
$sql_option_type
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
if ($sql_orderby == "") 	{ $sql_orderby 	=  " order by 	app_language_config.id  DESC " ; }
$sql_joint_table = $input_array["sql_joint_table"];
$sql_joint_select = $input_array["sql_joint_select"];
$sql_joint_where = $input_array["sql_joint_where"];


$option_root = $input_array["option_root"];
$option_type = $input_array["option_type"];
$option_status = $input_array["option_status"];

if ($root_id != "") 				{ $sql_root_id 				=	" and		app_language_config.root_id = '$root_id' " ; }
if ($language_id != "")  				{ $sql_language_id 				=	" and		app_language_config.language_id = '$language_id' " ; }
if ($option_root != "")  		{ $sql_option_root 			=	" and		app_language_config.option_root = '$option_root' " ; }
if ($option_type != "")  		{ $sql_option_type 			=	" and		app_language_config.option_type = '$option_type' " ; }
if ($option_status != "")  		{ $sql_option_status 		=	" and		app_language_config.option_status = '$option_status' " ; }



$sql_command = "
select		* $sql_joint_select
from 			app_language_config $sql_joint_table
where 		app_language_config.system_delete = 'none' 

$sql_root_id
$sql_language_id
$sql_option_root
$sql_option_type
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
$lang_config_id = $input_array["lang_config_id"];
if ( $lang_config_id != "" ){
$sql_command = "
select 		* 
from			app_language_config
where		system_delete= 'none'
and		lang_config_id = '$lang_config_id'

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
}
}




function function_viewbyid_tag($input_array){
$lang_config_tag = $input_array["lang_config_tag"];
if ($lang_config_tag != "" ){ 
$sql_command = "
select 		* 
from			app_language_config
where		system_delete= 'none'
and			lang_config_tag = '$lang_config_tag'

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
} /// lang_config_tag
}




/*
#################################################### end view  +++
*/





/*
#################################################### start update  +++
*/


function function_update($input_array){		

//// request
$lang_config_id = $input_array["lang_config_id"]; 
$lang_config_tag = $input_array["lang_config_tag"]; 

$name_lang1 = $input_array["name_lang1"]; 
$name_lang2 = $input_array["name_lang2"]; 
$name_lang3 = $input_array["name_lang3"]; 
$name_lang4 = $input_array["name_lang4"]; 
$name_lang5 = $input_array["name_lang5"]; 

$detail_lang1 = $input_array["detail_lang1"]; 
$detail_lang2 = $input_array["detail_lang2"]; 
$detail_lang3 = $input_array["detail_lang3"]; 
$detail_lang4 = $input_array["detail_lang4"]; 
$detail_lang5 = $input_array["detail_lang5"]; 

$comment = $input_array["comment"]; 
$option_type = $input_array["option_type"]; 
$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"]; 


$check_process = "insert" ; 
if ($lang_config_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_language_config
where 		system_delete = 'none'
and			lang_config_id = '$lang_config_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
} ///
} ///



/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_language_config ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "config" ;
$input_idnow =  $cmd_check_record + 1 ; 
$lang_config_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command = "
insert into  app_language_config ( 
lang_config_id , 

option_type , 
option_order , 
option_status , 
option_fixed , 

system_delete , 
datetime_create 
)
				
values (
'$lang_config_id'  , 

'none'  , 
'0'  , 
'on'  , 
'none'  , 

'none'  , 
'$datetime_now'  

)									
 ";		
 
/// print $sql_command ;  
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 


if ($option_order != "" ){ $sql_option_order = " option_order = '$option_order'  ,  "; }


/// update start
$sql_command="  
update   
app_language_config  

set  
lang_config_tag = '$lang_config_tag'   , 

name_lang1 = '$name_lang1'   ,  
name_lang2 = '$name_lang2'   ,  
name_lang3 = '$name_lang3'   ,  
name_lang4 = '$name_lang4'   ,  
name_lang5 = '$name_lang5'   ,  

detail_lang1 = '$detail_lang1'   ,  
detail_lang2 = '$detail_lang2'   ,  
detail_lang3 = '$detail_lang3'   ,  
detail_lang4 = '$detail_lang4'   ,  
detail_lang5 = '$detail_lang5'   ,  

comment = '$comment'   ,  
option_type = '$option_type'   ,  
option_status = '$option_status'   ,  
$sql_option_order
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			lang_config_id = '$lang_config_id'
 "; 

//// print "$sql_command <br>"; 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"lang_config_id"=>"$lang_config_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$lang_config_id = $input_array["lang_config_id"]; 

$lang_config_tag = $input_array["lang_config_tag"];
$comment = $input_array["comment"];

///$option_type = $input_array["option_type"];
$option_order = $input_array["option_order"];
$option_status = $input_array["option_status"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($lang_config_tag != "" ) 		{ $sql_lang_config_tag = " lang_config_tag = '$lang_config_tag' , "; }
if ($comment != "" ) 				{ $sql_comment = " comment = '$comment' , "; }


if ($lang_config_id != "" ) {  /// check id
$sql_command = "	
update  app_language_config   

set    

$sql_lang_config_tag
$sql_comment

option_order = '$option_order' , 
option_status = '$option_status' , 
datetime_update = '$datetime_now'

where  
lang_config_id = '$lang_config_id'    

";		

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"lang_config_id"=>"$lang_config_id" , 
);
return $result_return ;	
		
} /// 













/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$lang_config_id = $input_array["lang_config_id"]; 
$datetime_now = $input_array["datetime_now"]; 

if ($lang_config_id != "" ){ 

$sql_command = "	
update  	app_language_config   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
lang_config_id = '$lang_config_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"lang_config_id"=>"$lang_config_id" , 
);
return $result_return ;	

} ///  end function




	
	

}///// class  eva_criteria{	
?>