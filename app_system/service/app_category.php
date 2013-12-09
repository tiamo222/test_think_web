<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * app_category
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/app_category.inc.php
 */

class  app_category{	
				
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
function app_category(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/


/*

app_category

category_id
system_id
section_id
category_id_root
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

$system_id = $input_array["system_id"];
$section_id = $input_array["section_id"];

$category_id_root = $input_array["category_id_root"];
$category_level = $input_array["category_level"];
$option_status = $input_array["option_status"];


//// sql command
if ($system_id != "") 						{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($section_id != "") 						{ $sql_section_id 					=	" and		section_id = '$section_id' " ; }
if ($category_id_root != "")  			{ $sql_category_id_root 			=	" and		category_id_root = '$category_id_root' " ; }
if ($category_level != "")  				{ $sql_category_level 				=	" and		category_level = '$category_level' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				app_category
where			system_delete = 'none'  

$sql_system_id
$sql_section_id
$sql_category_id_root
$sql_category_level
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
$section_id = $input_array["section_id"];
$category_id_root = $input_array["category_id_root"];
$category_level = $input_array["category_level"];
$option_status = $input_array["option_status"];

//// sql command
if ($system_id != "") 						{ $sql_system_id 					=	" and		system_id = '$system_id' " ; }
if ($section_id != "") 						{ $sql_section_id 					=	" and		section_id = '$section_id' " ; }
if ($category_id_root != "")  			{ $sql_category_id_root 			=	" and		category_id_root = '$category_id_root' " ; }
if ($category_level != "")  				{ $sql_category_level 				=	" and		category_level = '$category_level' " ; }
if ($option_status != "")  					{ $sql_option_status 				=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			app_category
where 			system_delete = 'none' 

$sql_system_id 
$sql_section_id 
$sql_category_id_root
$sql_category_level
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

$category_id = $input_array["category_id"];

//// sql command
if ($category_id != "") 		{$sql_category_id 	=	" and		category_id = '$category_id' " ; }

$sql_command = "
select 		* 
from			app_category
where		system_delete= 'none'

$sql_category_id

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
}





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyid
*/
function function_viewbyid_sql($input_array){
	
$sql_other = $input_array["sql_other"];
////print "sql_other = $sql_other <br>";

if ($sql_other != "" ){ 

//// sql command
$sql_command = "
select 		* 
from			app_category
where		system_delete= 'none'
$sql_other
";	

/// print "sql_command = $sql_command ";

$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
} /// if ($sql_other != "" ){ 
} /// function_viewbyid_sql




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
$category_id = $input_array["category_id"]; 
$system_id = $input_array["system_id"]; 
$section_id = $input_array["section_id"]; 

$category_id_root = $input_array["category_id_root"]; 
$category_level = $input_array["category_level"]; 

$category_code = $input_array["category_code"]; 


$category_name = $input_array["category_name"]; 
$category_des = $input_array["category_des"]; 
$category_detail = $input_array["category_detail"]; 

$category_name_lang2 = $input_array["category_name_lang2"]; 
$category_des_lang2 = $input_array["category_des_lang2"]; 
$category_detail_lang2 = $input_array["category_detail_lang2"]; 

$category_name_lang3 = $input_array["category_name_lang3"]; 
$category_des_lang3 = $input_array["category_des_lang3"]; 
$category_detail_lang3 = $input_array["category_detail_lang3"]; 

$category_name_lang4 = $input_array["category_name_lang4"]; 
$category_des_lang4 = $input_array["category_des_lang4"]; 
$category_detail_lang4 = $input_array["category_detail_lang4"]; 

$category_name_lang5 = $input_array["category_name_lang5"]; 
$category_des_lang5 = $input_array["category_des_lang5"]; 
$category_detail_lang5 = $input_array["category_detail_lang5"]; 


$category_image_mini = $input_array["category_image_mini"]; 
$category_image = $input_array["category_image"]; 

$stat_view = $input_array["stat_view"]; 
$stat_reply = $input_array["stat_reply"]; 

$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"];

$user_update = $input_array["user_update"];
$datetime_now = $input_array["datetime_now"];




//// sql config
if ($option_status != "" ) { $sql_option_status = " option_status = '$option_status ' "  ;  }




$check_process = "insert" ; 
if ($category_id != "" ) {  /////<--- id_information
$sql_command = " 
select  		*
from  		app_category
where 		system_delete = 'none'
and			category_id = '$category_id'
 ";
$result_array = $this->db->GetRow($sql_command);
if ($result_array){ 
$check_process = "update" ; 
$category_id = $result_array["category_id"];
} ///
} ///

/// print "check_record_process = $check_record_process <br>"; 


/// insert start 
if ($check_process == "insert" ) { 
$sql_command = " select  count(*) from  app_category ";
$cmd_check_record = $this->db->GetOne($sql_command);	
$input_idname = "cat" ;
$input_idnow =  $cmd_check_record + 1 ; 
$category_id = function_genid( $input_idname , $input_idnow ) ;


//////////// sql command 
$sql_command ="
insert into  app_category ( 
category_id , 
system_id , 
section_id , 
option_status , 
system_delete , 
user_create , 
datetime_create 
)
				
values (
'$category_id'  , 
'$system_id'  , 
'$section_id'  , 
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
update   app_category  

set  
category_id_root = '$category_id_root' ,
category_level = '$category_level' ,

category_code = '$category_code' ,

category_name = '$category_name' ,
category_des = '$category_des' ,
category_detail = '$category_detail'  , 

category_name_lang2 = '$category_name_lang2' ,
category_des_lang2 = '$category_des_lang2' ,
category_detail_lang2 = '$category_detail_lang2'  , 

category_name_lang3 = '$category_name_lang3' ,
category_des_lang3 = '$category_des_lang3' ,
category_detail_lang3 = '$category_detail_lang3'  , 

category_name_lang4 = '$category_name_lang4' ,
category_des_lang4 = '$category_des_lang4' ,
category_detail_lang4 = '$category_detail_lang4'  , 

category_name_lang5 = '$category_name_lang5' ,
category_des_lang5 = '$category_des_lang5' ,
category_detail_lang5 = '$category_detail_lang5'  , 




category_image_mini = '$category_image_mini'  , 
category_image = '$category_image'  , 

option_order = '$option_order'  , 
option_status = '$option_status'  , 

$sql_category_image_mini
$sql_category_image

user_update = '$user_update'  , 
datetime_update = '$datetime_now'  

where		system_delete = 'none'
and			category_id = '$category_id'
 "; 
 
//// print "$sql_command <br>";
 
$result_update = $this->db->Execute($sql_command);	

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"category_id"=>"$category_id" , 
);
return $result_return ;	


} //// end





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_update_option
*/
function  function_update_option($input_array){	

//// request
$category_id = $input_array["category_id"]; 
$option_order = $input_array["option_order"]; 
$option_status = $input_array["option_status"]; 
$option_show_index = $input_array["option_show_index"]; 
$datetime_now = $input_array["datetime_now"]; 


//// config
/// if ($option_status_byuser == "" ) {$option_status_byuser = "off"; }
/// if ($option_status == "" ) {$option_status = "off" ; }


//// sql
if ($option_order != "") 				{ $sql_option_order 			=	" 	option_order = '$option_order' , " ; }
if ($option_status != "") 				{ $sql_option_status 			=	" 	option_status = '$option_status'  , " ; }
if ($option_show_index != "") 		{ $sql_option_show_index 	=	" 	option_show_index = '$option_show_index'  , " ; }



//// datetime
$config_date = date("Y-m-d");  /// 
$config_time = date("H:i:s");  /// 
$datetime_update = "$config_date $config_time" ; 

if ($category_id != "" ) {  /// check id
$sql_command = "	
update  app_category   

set    
$sql_option_order 
$sql_option_status 
$sql_option_show_index
datetime_update = '$datetime_update'

where  category_id = '$category_id'    
";		

/// print "$sql_command <br><br>"; 

$result_update = $this->db->Execute($sql_command);	
} 

if (!$result_update) {$show_status = "error" ; } else { $show_status = "success" ;  }

$result_return = array(
"show_status"=>"$show_status" , 
"category_id"=>"$category_id" , 
);
return $result_return ;	
		
} /// 














/*
#################################################### start delete  +++
*/


function  function_delete($input_array){	

$category_id = $input_array["category_id"]; 
$datetime_now = $input_array["datetime_now"]; 


/*
//// datetime
$config_date = date("Y-m-d");  /// 
$config_time = date("H:i:s");  /// 
$datetime_now = "$config_date $config_time" ; 
*/



if ($category_id != "" ) { 
$sql_command = "	
update  	app_category   
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





function  function_delete_byroot($input_array){	

$category_id_root = $input_array["category_id_root"]; 
$datetime_now = $input_array["datetime_now"]; 


/*
//// datetime
$config_date = date("Y-m-d");  /// 
$config_time = date("H:i:s");  /// 
$datetime_now = "$config_date $config_time" ; 
*/



if ($category_id_root != "" ) { 
$sql_command = "	
update  	app_category   
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