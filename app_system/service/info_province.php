<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


/**
 * info_province
 *
 * @service	
 * @author		jack
 * @link			
 * @since		Version 1.0
 * @filesource   /service/info_province.inc.php
 */

class  info_province{	
				
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
function info_province(){
$this->db=$GLOBALS['db'];
$this->username=$_SESSION["ses_username"];
$this->usertype=$_SESSION["ses_type"];		
}





/*
#################################################### start view  +++
*/




/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_countbyset
*/
function function_countbyset($input_array){

$sql_other 		= $input_array["sql_other"];
$option_status 	= $input_array["option_status"];

//// sql command
if ($option_status != "") { $sql_option_status = " and		option_status = '$option_status' " ; }


//// recommend
$sql_command = "
select			count(*)  
from				info_province
where			system_delete = 'none'  

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

$set_pager_limit 	= $input_array["set_pager_limit"];
$set_pager_start 	= $input_array["set_pager_start"];
if ($set_pager_limit == "") {$set_pager_limit = 10000 ; }
if ($set_pager_start == "") {$set_pager_start = 0 ; }


$sql_other = $input_array["sql_other"];
$sql_orderby = $input_array["sql_orderby"];
if ($sql_orderby == "") { $sql_orderby =  " order by 	id  DESC " ; }



$option_status 	= $input_array["option_status"];

//// sql command

if ($option_status != "")  { $sql_option_status 		=	" and		option_status = '$option_status' " ; }


$sql_command = "
select			*
from 			info_province

Where  system_delete = 'none'

$sql_option_status

$sql_other 
$sql_orderby

";		

///  print "sql_command = $sql_command ";

$result_array = $this->db->SelectLimit($sql_command,$set_pager_limit,$set_pager_start );
return $result_array ;

} ///////////





/*
+++++++++++++++++++++++++++++++++++++++++++++++++++++
start  function_viewbyid
*/
function function_viewbyid($input_array){

$province_id = $input_array["province_id"];

//// sql command
if ($province_id != "") 		{$sql_province_id 	=	" and		province_id = '$province_id' " ; }

$sql_command = "
select 		* 
from			info_province
where		system_delete= 'none'

$sql_province_id

";	
$result_array = $this->db->GetRow($sql_command);
return 	 $result_array ;
}




/*
#################################################### end view  +++
*/







	
	

}///// class  eva_criteria{	
?>