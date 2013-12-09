<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){
	
	

function function_picture_upload_mix($input_array){	

$picture_path			 					= $input_array["picture_path"]; 

//// original
$picture_original							= $input_array["picture_original"]; 
$picture_option_delete				= $input_array["picture_option_delete"]; 

//// new
$picture_fileupload 					= $input_array["picture_fileupload"]; 
$picture_fileupload_name 			= $input_array["picture_fileupload_name"]; 
$picture_name_new					= $input_array["picture_name_new"]; 




//////////////////////////////////////////////////////////// upload 
if ($picture_fileupload_name != "" ) { 
$input_upload = array(
"picture_path"=>"$picture_path" , 
"picture_fileupload"=>"$picture_fileupload" , 
"picture_fileupload_name"=>"$picture_fileupload_name" , 
"picture_name_new"=>"$picture_name_new" , 
);
$result_picture_upload = function_picture_upload($input_upload) ;

if ($result_picture_upload != "" ) {
$picture_new = $result_picture_upload ;  /// edit
$picture_option_delete = "delete";
}
}  



//////////////////////////////////////////////////////////// delete 
if ($picture_option_delete == "delete"  and  $picture_original != "" ) {  
$input_delete = array(
"picture_path"=>"$picture_path" , 
"picture_delete"=>"$picture_original" ,  
);
$result_picture_delete = function_picture_delete($input_delete);
} /////


return $picture_new ; 

}//////function_picture_upload_mix






function function_picture_upload($input_array){	

$picture_path = $input_array["picture_path"]; 
$picture_fileupload = $input_array["picture_fileupload"]; 
$picture_fileupload_name = $input_array["picture_fileupload_name"]; 
$picture_name_new = $input_array["picture_name_new"]; 
///$image1_fileupload_size = $input_array[image1_fileupload_size]; 
///$image1_fileupload_type = $input_array[image1_fileupload_type]; 


$config_date = date("Ymd");  ///// 
$config_time = date("His");  ///// 

///////////////// input
$input_config_path 		= $picture_path ; 
$input_fileupload			= $picture_fileupload ; 
$input_fileupload_name 	= $picture_fileupload_name ;

$input_idnow					= rand(0,999);
$input_genid 					= function_genid( $input_idname , $input_idnow );

$input_name_new 			= "$picture_name_new" . "$config_date$config_time" . "$input_genid" ; 
/// $input_name_new 			= "$input_name_new" ;



$result_upload_picture = "" ; 


/// UPLOAD
if ($input_fileupload)  {

$array_last=explode(".",$input_fileupload_name) ; 
$c=count($array_last)-1 ;
$file_lastname=strtolower($array_last[$c]);

if  ($file_lastname=="gif"  or  $file_lastname=="png"   or $file_lastname=="jpg" or  $file_lastname=="jpeg"   ) {
$result_upload_picture =  "$input_name_new.$file_lastname"  ; 
copy($input_fileupload, $input_config_path . $result_upload_picture) ;
}  
unlink($input_fileupload);
}  


return $result_upload_picture ; 


///////////////// picture end
}





function function_picture_delete($input_array){	

$picture_path = $input_array["picture_path"]; 
$picture_delete = $input_array["picture_delete"]; 

if ($picture_delete != "" ) {
$delete_picture_value = "$picture_path$picture_delete" ;
if(file_exists("$delete_picture_value")){
unlink($delete_picture_value); 
} /// exists
}

} ///







////############################################ upload video

function function_video_upload_mix($input_array){	

$picture_path			 					= $input_array["picture_path"]; 

//// original
$picture_original							= $input_array["picture_original"]; 
$picture_option_delete				= $input_array["picture_option_delete"]; 

//// new
$picture_fileupload 					= $input_array["picture_fileupload"]; 
$picture_fileupload_name 			= $input_array["picture_fileupload_name"]; 
$picture_name_new					= $input_array["picture_name_new"]; 




//////////////////////////////////////////////////////////// upload 
if ($picture_fileupload_name != "" ) { 
$input_upload = array(
"picture_path"=>"$picture_path" , 
"picture_fileupload"=>"$picture_fileupload" , 
"picture_fileupload_name"=>"$picture_fileupload_name" , 

"picture_name_new"=>"$picture_name_new" , 
);
$result_picture_upload = function_video_upload($input_upload) ;

if ($result_picture_upload != "" ) {
$picture_new = $result_picture_upload ;  /// edit
$picture_option_delete = "delete";
}
}  



//////////////////////////////////////////////////////////// delete 
if ($picture_option_delete == "delete"  and  $picture_original != "" ) {  
$input_delete = array(
"picture_path"=>"$picture_path" , 
"picture_delete"=>"$picture_original" ,  
);
$result_picture_delete = function_video_delete($input_delete);
} /////


return $picture_new ; 

}//////function_picture_upload_mix







function function_video_upload($input_array){	

$picture_path = $input_array["picture_path"]; 
$picture_fileupload = $input_array["picture_fileupload"]; 
$picture_fileupload_name = $input_array["picture_fileupload_name"]; 
$picture_name_new = $input_array["picture_name_new"]; 
///$image1_fileupload_size = $input_array[image1_fileupload_size]; 
///$image1_fileupload_type = $input_array[image1_fileupload_type]; 


$config_date = date("Ymd");  ///// 
$config_time = date("His");  ///// 

///////////////// input
$input_config_path 		= $picture_path ; 
$input_fileupload			= $picture_fileupload ; 
$input_fileupload_name 	= $picture_fileupload_name ;

$input_idnow					= rand(0,999);
$input_genid 					= function_genid( $input_idname , $input_idnow );

$input_name_new 			= "$picture_name_new" . "$config_date$config_time" . "$input_genid" ; 
/// $input_name_new 			= "$input_name_new" ;



$result_upload_picture = "" ; 


/// UPLOAD
if ($input_fileupload)  {

$array_last=explode(".",$input_fileupload_name) ; 
$c=count($array_last)-1 ;
$file_lastname=strtolower($array_last[$c]);

if  ($file_lastname=="flv"  or  $file_lastname=="wma"     ) {
$result_upload_picture =  "$input_name_new.$file_lastname"  ; 
copy($input_fileupload, $input_config_path . $result_upload_picture) ;
}  
unlink($input_fileupload);
}  


return $result_upload_picture ; 


///////////////// picture end
}



function function_video_delete($input_array){	

$picture_path = $input_array["picture_path"]; 
$picture_delete = $input_array["picture_delete"]; 

if ($picture_delete != "" ) {
$delete_picture_value = "$picture_path$picture_delete" ;
if(file_exists("$delete_picture_value")){
unlink($delete_picture_value); 
} /// exists
}

} ///












?>