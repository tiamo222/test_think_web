<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_content
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_content.inc.php
 */

class  app_content{	
				
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
function app_content(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

app_content

content_id
content_name
content_des
content_detail
content_image_mini
content_source_name
content_source_url

stat_view
stat_reply
stat_delete
option_order
option_reply
option_recommend
option_approve
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

$system_id = $input_array["system_id"];
$ref_id = $input_array["ref_id"];
$section_id = $input_array["section_id"];
$category_id = $input_array["category_id"];
$option_highlight = $input_array["option_highlight"];
$option_recommend = $input_array["option_recommend"];
$option_status = $input_array["option_status"];


//// sql command
if ($system_id != "") 						{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($ref_id != "") 							{ $sql_ref_id 							=	" and		ref_id = '$ref_id' " ; }
if ($section_id != "") 						{ $sql_section_id 					=	" and		section_id = '$section_id' " ; }
if ($category_id != "") 					{ $sql_category_id 					=	" and		category_id = '$category_id' " ; }
if ($option_highlight != "")  				{ $sql_option_highlight 			=	" and		option_highlight = '$option_highlight' " ; }
if ($option_recommend != "")  		{ $sql_option_recommend 		=	" and		option_recommend = '$option_recommend' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_content
where			system_delete = 'none'  

$sql_system_id
$sql_ref_id
$sql_section_id
$sql_category_id

$sql_option_highlight
$sql_option_recommend
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
$ref_id = $input_array["ref_id"];
$section_id = $input_array["section_id"];
$category_id = $input_array["category_id"];
$option_highlight = $input_array["option_highlight"];
$option_recommend = $input_array["option_recommend"];
$option_status = $input_array["option_status"];

//// sql command
if ($system_id != "") 						{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($ref_id != "") 							{ $sql_ref_id 							=	" and		ref_id = '$ref_id' " ; }
if ($section_id != "") 						{ $sql_section_id 					=	" and		section_id = '$section_id' " ; }
if ($category_id != "") 					{ $sql_category_id 					=	" and		category_id = '$category_id' " ; }
if ($option_highlight != "")  				{ $sql_option_highlight 				=	" and		option_highlight = '$option_highlight' " ; }
if ($option_recommend != "")  		{ $sql_option_recommend 				=	" and		option_recommend = '$option_recommend' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_content
where 			system_delete = 'none' 

$sql_system_id 
$sql_ref_id
$sql_section_id 
$sql_category_id 
$sql_option_highlight
$sql_option_recommend
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

$content_id 			= $input_array["content_id"];
$content_id_name 	= $input_array["content_id_name"];

if ($content_id != ""  or $content_id_name != "" ){ /// id

//// sql command
if ($content_id != "") 				{$sql_content_id 			=	" and		content_id = '$content_id' " ; }
if ($content_id_name != "") 	{$sql_content_id_name 	=	" and		content_id_name = '$content_id_name' " ; }


$sql_command = "
select 		* 
from			app_content
where		system_delete= 'none'

$sql_content_id
$sql_content_id_name

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;

} //// id

}




/*
#################################################### end view  +++
*/





/*
#################################################### start update  +++
*/


function function_update($input_array){		

//// request
$content_id = $input_array["content_id"]; 
$system_id = $input_array["system_id"]; 
$ref_id = $input_array["ref_id"]; 
$category_id = $input_array["category_id"]; 

$content_name = $input_array["content_name"]; 
$content_name_lang2 = $input_array["content_name_lang2"]; 
$content_name_lang3 = $input_array["content_name_lang3"]; 
$content_name_lang4 = $input_array["content_name_lang4"]; 
$content_name_lang5 = $input_array["content_name_lang5"]; 

$content_des = $input_array["content_des"]; 
$content_des_lang2 = $input_array["content_des_lang2"]; 
$content_des_lang3 = $input_array["content_des_lang3"]; 
$content_des_lang4 = $input_array["content_des_lang4"]; 
$content_des_lang5 = $input_array["content_des_lang5"]; 

$content_detail = $input_array["content_detail"]; 
$content_detail_lang2 = $input_array["content_detail_lang2"]; 
$content_detail_lang3 = $input_array["content_detail_lang3"]; 
$content_detail_lang4 = $input_array["content_detail_lang4"]; 
$content_detail_lang5 = $input_array["content_detail_lang5"]; 


$content_source_name = $input_array["content_source_name"]; 
$content_source_url = $input_array["content_source_url"]; 
$content_image_mini = $input_array["content_image_mini"]; 
$content_image = $input_array["content_image"]; 

/*
$category_id_root = $input_array["category_id_root"]; 
$category_id_root = $input_array["category_id_root"]; 
$category_id_root = $input_array["category_id_root"]; 
$category_id_root = $input_array["category_id_root"]; 
*/



$stat_view = $input_array["stat_view"]; 
$stat_reply = $input_array["stat_reply"]; 
$stat_delete = $input_array["stat_delete"]; 

$option_highlight = $input_array["option_highlight"]; 
$option_recommend = $input_array["option_recommend"]; 
$option_approve = $input_array["option_approve"]; 
$option_reply = $input_array["option_reply"]; 
$option_order = $input_array["option_order"]; 

$option_lang1 = $input_array["option_lang1"];
$option_lang2 = $input_array["option_lang2"];
$option_lang3 = $input_array["option_lang3"];
$option_lang4 = $input_array["option_lang4"];
$option_lang5 = $input_array["option_lang5"];
$option_status = $input_array["option_status"];

$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];




//// sql config
if ($option_lang1 == "" ) { $option_lang1 = "none"; }
if ($option_lang2 == "" ) { $option_lang2 = "none"; }
if ($option_lang3 == "" ) { $option_lang3 = "none"; }
if ($option_lang4 == "" ) { $option_lang4 = "none"; }
if ($option_lang5 == "" ) { $option_lang5 = "none"; }



$check_process = "insert" ; 
if ($content_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_content
where 		system_delete = 'none'
and			content_id = '$content_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
} ///
} ///

/// print "check_record_process = $check_record_process <br>"; 


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_content ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "content" ;
$input_idnow =  $cmd_check_record + 1 ; 
$content_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_content ( 
content_id , 
system_id , 
ref_id , 

stat_view , 
stat_reply , 
stat_delete , 

option_order , 
option_reply , 
option_recommend , 
option_approve , 
option_status , 
option_lang1 ,
option_lang2 ,
option_lang3 ,
option_lang4 ,
option_lang5 ,

system_delete , 
user_create , 
datetime_create 
)
				
values (
'$content_id'  , 
'$system_id'  , 
'$ref_id'  , 

'0'  , 
'0'  , 
'0'  , 

'$option_order'  , 
'none'  , 
'none'  , 
'approve'  , 
'on'  , 
'none'  , 
'none'  , 
'none'  , 
'none'  , 
'none'  , 

'none'  , 
'$user_update'  , 
'$datetime_now'  
)									
 ";		
 
/// print $sql_command ; 
 
$result_array = $this->db->Execute($sql_command);	

} //if ($check_record_same == 0 ) { 
/// insert end 




/// update start
$sql_command="  
update   app_content  

set  
category_id = '$category_id' ,
content_name = '$content_name' ,
content_name_lang2 = '$content_name_lang2' ,
content_name_lang3 = '$content_name_lang3' ,
content_name_lang4 = '$content_name_lang4' ,
content_name_lang5 = '$content_name_lang5' ,

content_des = '$content_des' ,
content_des_lang2 = '$content_des_lang2' ,
content_des_lang3 = '$content_des_lang3' ,
content_des_lang4 = '$content_des_lang4' ,
content_des_lang5 = '$content_des_lang5' ,

content_detail = '$content_detail' ,
content_detail_lang2 = '$content_detail_lang2' ,
content_detail_lang3 = '$content_detail_lang3' ,
content_detail_lang4 = '$content_detail_lang4' ,
content_detail_lang5 = '$content_detail_lang5' ,

content_source_name = '$content_source_name' ,
content_source_url = '$content_source_url' ,

content_image_mini = '$content_image_mini' ,
content_image = '$content_image' ,

option_order = '$option_order'  , 
option_reply = '$option_reply'  , 
option_highlight = '$option_highlight'  , 
option_recommend = '$option_recommend'  , 
option_approve = '$option_approve'  , 

option_lang1 = '$option_lang1'  , 
option_lang2 = '$option_lang2'  , 
option_lang3 = '$option_lang3'  , 
option_lang4 = '$option_lang4'  , 
option_lang5 = '$option_lang5'  , 
option_status = '$option_status'  , 

$sql_content_image_mini

user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			content_id = '$content_id'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"content_id"=>"$content_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$content_id = $input_array["content_id"]; 
$content_name = $input_array["content_name"]; 
/// $content_des = $input_array["content_des"]; 

$option_order = $input_array["option_order"];
$option_reply = $input_array["option_reply"];
$option_highlight = $input_array["option_highlight"];
$option_recommend = $input_array["option_recommend"];
$option_approve = $input_array["option_approve"];
$option_status = $input_array["option_status"]; 

$option_lang1 = $input_array["option_lang1"]; 
$option_lang2 = $input_array["option_lang2"]; 
$option_lang3 = $input_array["option_lang3"]; 
$option_lang4 = $input_array["option_lang4"]; 
$option_lang5 = $input_array["option_lang5"]; 

$datetime_now = $input_array["datetime_now"]; 


if ($option_lang1 == "" ) { $option_lang1 = "none"; }
if ($option_lang2 == "" ) { $option_lang2 = "none"; }
if ($option_lang3 == "" ) { $option_lang3 = "none"; }
if ($option_lang4 == "" ) { $option_lang4 = "none"; }
if ($option_lang5 == "" ) { $option_lang5 = "none"; }


if ($content_id != "" ) {  /// check id
$sql_command = "	
update  app_content   

set    
option_order = '$option_order' , 
option_reply = '$option_reply' , 
option_highlight = '$option_highlight' , 
option_recommend = '$option_recommend' , 
option_approve = '$option_approve' , 
option_status = '$option_status' , 

option_lang1 = '$option_lang1' , 
option_lang2 = '$option_lang2' , 
option_lang3 = '$option_lang3' , 
option_lang4 = '$option_lang4' , 
option_lang5 = '$option_lang5' , 

datetime_update = '$datetime_now'

where  content_id = '$content_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"content_id"=>"$content_id" , 
);
return $result_return ;	
		
} /// 












function  function_update_stat($input_array){	

$content_id = $input_array["content_id"];
$stat_view = $input_array["stat_view"];
$stat_reply = $input_array["stat_reply"];
$datetime_now = $input_array["datetime_now"]; 


if ($content_id != "" ) { 
/////////////// stat_view
if ($stat_view == ""  or  $stat_view == "0"  ) {
$sql_command = "
select 		stat_view 
from			app_content
where		content_id = '$content_id'  
";	
$result_array = $this->db->GetRow($sql_command);
$stat_view = $result_array["stat_view"];
}


$stat_view = $stat_view + 1 ; 

$sql_command = "	
update 	 	app_content   
set    	
stat_view = '$stat_view'   , 
stat_reply = '$stat_reply'   , 
datetime_view = '$datetime_now'

where  
content_id = '$content_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
/// "show_status"=>"$show_status" , 
"content_id"=>"$content_id" , 
"stat_view"=>"$stat_view" , 
);
return $result_return ;	
		
} ///  end function











/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$content_id = $input_array["content_id"]; 
$datetime_now = $input_array["datetime_now"]; 


if ($content_id != "" ) { 
$sql_command = "	
update  	app_content   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
content_id = '$content_id'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"content_id"=>"$content_id" , 
);
return $result_return ;	
		
} ///  end function





function  function_delete_bycase($input_array){	

$datetime_now = $input_array["datetime_now"]; 


if ($category_id_root != "" ) { 
$sql_command = "	
update  	app_content   
set    	
system_delete = 'delete'   , 
datetime_delete = '$datetime_now'

where  
category_id_root = '$category_id_root'  
";		
$result_update = $this->db->Execute($sql_command);	
} //////

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"category_id_root"=>"$category_id_root" , 
);
return $result_return ;	
		
} ///  end function

	
	
	

}///// class  eva_criteria{	
?>