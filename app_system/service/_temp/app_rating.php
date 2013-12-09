<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_rating
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_rating.inc.php
 */

class  app_rating{	
				
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
function app_rating(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


function function_countbyset($input_array){

$sql_other = $input_array["sql_other"];

$ref_id = $input_array["ref_id"];
$member_id = $input_array["member_id"];
$topic_id = $input_array["topic_id"];
$option_status = $input_array["option_status"];


//// sql command
if ($ref_id != "") 							{ $sql_ref_id 						=	" and		ref_id = '$ref_id' " ; }
if ($member_id != "") 					{ $sql_member_id 				=	" and		member_id = '$member_id' " ; }
if ($topic_id != "")  							{ $sql_topic_id 					=	" and		topic_id = '$topic_id' " ; }
if ($option_status != "")  					{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_rating
where			system_delete = 'none'  

$sql_ref_id
$sql_member_id
$sql_topic_id
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



$ref_id = $input_array["ref_id"];
$member_id = $input_array["member_id"];
$topic_id = $input_array["topic_id"];
$option_status = $input_array["option_status"];


//// sql command
if ($ref_id != "") 							{ $sql_ref_id 						=	" and		ref_id = '$ref_id' " ; }
if ($member_id != "") 					{ $sql_member_id 				=	" and		member_id = '$member_id' " ; }
if ($topic_id != "")  							{ $sql_topic_id 					=	" and		topic_id = '$topic_id' " ; }
if ($option_status != "")  					{ $sql_option_status 		=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_rating
where 			system_delete = 'none' 

$sql_ref_id
$sql_member_id
$sql_topic_id
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

$rating_id = $input_array["rating_id"];

//// sql command
if ($rating_id != "") 		{$sql_rating_id 	=	" and		rating_id = '$rating_id' " ; }

$sql_command = "
select 		* 
from			app_rating
where		system_delete= 'none'

$sql_rating_id

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
}




function function_viewbyid_sql($input_array){

$sql_other = $input_array["sql_other"];

if ($sql_other != "" ){ 
$sql_command = "
select 		* 
from			app_rating
where		system_delete= 'none'

$sql_other

";	
$result_array = $this->db->GetRow($sql_command);

} ///sql_other

return 	 $result_array ;
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
$rating_id = $input_array["rating_id"]; 
$ref_id = $input_array["ref_id"]; 
$member_id = $input_array["member_id"]; 
$topic_id = $input_array["topic_id"]; 
$rating_point = $input_array["rating_point"]; 

$option_status = $input_array["option_status"];
$datetime_now = $input_array["datetime_now"];




//// sql config
if ($option_status != "" ) { $sql_option_status = " option_status = '$option_status ' "  ;  }




$check_process = "insert" ; 
if ($rating_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_rating
where 		system_delete = 'none'
and			rating_id = '$rating_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$rating_id = $result_array["rating_id"];
} ///
} ///

/// print "check_record_process = $check_record_process <br>"; 


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_rating ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "rating" ;
$input_idnow =  $cmd_check_record + 1 ; 
$rating_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_rating ( 
rating_id , 
ref_id , 
member_id , 
topic_id , 

option_status , 
system_delete , 
datetime_create 
)
				
values (
'$rating_id'  , 
'$ref_id'  , 
'$member_id'  , 
'$topic_id'  , 

'on'  , 
'none'  , 
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
update   app_rating  

set  
rating_point = '$rating_point' ,
option_status = '$option_status'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			rating_id = '$rating_id'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"rating_id"=>"$rating_id" , 
);
return $result_return ;	


} //// end


















/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$rating_id = $input_array["rating_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($rating_id != "" ) { 
$sql_command = "	
update  	app_rating   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
rating_id = '$rating_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"rating_id"=>"$rating_id" , 
);
return $result_return ;	
		
} ///  end function












	

}///// class  eva_criteria{	
?>