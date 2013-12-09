<?

$array_property_PopularDestination = "";
$category_set_system_id = "property_PopularDestination"; 
/// $category_set_url = "property_showall.php"; 

///////////////////////////////////////////////////////////// get to array 
$level1_input_array = array(
"option_status"=>"on" , 
"system_id"=>"$category_set_system_id" , 
"sql_orderby"=>" ORDER BY  option_order  ASC " ,
);
$level1_count_category = $app_category->function_countbyset( $level1_input_array );
$level1_result_category = $app_category->function_viewbyset( $level1_input_array ); /// select ข้อมูล
if ($level1_count_category > 0 ){ 


$level1_loop = 0 ;
while($rs1 = $level1_result_category->FetchRow()){ /////// loop 
$level1_loop = $level1_loop + 1  ;

///////////////// set value
$level1_category_id 			= $rs1["category_id"];
$level1_category_level 		= $rs1["category_level"];
$level1_category_id_root 	= $rs1["category_id_root"];

if($get_language_key == 1 ){
$level1_category_name		= $rs1["category_name"];
$level1_category_des 			= $rs1["category_des"];
}

if($get_language_key == 2 ){
$level1_category_name		= $rs1["category_name_lang2"];
$level1_category_des 			= $rs1["category_des_lang2"];
}

if($get_language_key == 3 ){
$level1_category_name		= $rs1["category_name_lang3"];
$level1_category_des 			= $rs1["category_des_lang3"];
}

if($get_language_key == 4 ){
$level1_category_name		= $rs1["category_name_lang4"];
$level1_category_des 			= $rs1["category_des_lang4"];
}

if($get_language_key == 5 ){
$level1_category_name		= $rs1["category_name_lang5"];
$level1_category_des 			= $rs1["category_des_lang5"];
}


$level1_category_image_mini	= $rs1["category_image_mini"];
$level1_category_image 			= $rs1["category_image"];

$level1_option_order 			= $rs1["option_order"];
$level1_option_status 			= $rs1["option_status"];
$level1_option_fixed 			= $rs1["option_fixed"];




$array_property_PopularDestination["$level1_category_id_root"][] = array(
"option_order"=>"$level1_option_order" , 
"category_id"=>"$level1_category_id" , 
"category_level"=>"$level1_category_level" , 
"category_id_root"=>"$level1_category_id_root" , 

"category_name"=>"$level1_category_name" , 
"category_des"=>"$level1_category_des" , 
"category_image_mini"=>"$level1_category_image_mini" , 
"category_image"=>"$level1_category_image" , 

"option_status"=>"$level1_option_status" , 
"option_fixed"=>"$level1_option_fixed" , 

);



} /// loop
} /// count

///////////////////////////////////////////////////////////// get to array end  
 
 /*
print "<pre>";
print_r ($array_category);
print "</pre>"; 
 
 */











$array_property_type = ""; 
$category_set_system_id = "property_type"; 
/// $category_set_url = "property_showall.php"; 

///////////////////////////////////////////////////////////// get to array 
$level1_input_array = array(
"option_status"=>"on" , 
"system_id"=>"$category_set_system_id" , 
"sql_orderby"=>" ORDER BY  option_order  ASC " ,
);
$level1_count_category = $app_category->function_countbyset( $level1_input_array );
$level1_result_category = $app_category->function_viewbyset( $level1_input_array ); /// select ข้อมูล

if ($level1_count_category > 0 ){ 
$level1_loop = 0 ;
while($rs1 = $level1_result_category->FetchRow()){ /////// loop 
$level1_loop = $level1_loop + 1  ;

///////////////// set value
$level1_category_id 			= $rs1["category_id"];
$level1_category_level 		= $rs1["category_level"];
$level1_category_id_root 	= $rs1["category_id_root"];

if($get_language_key == 1 ){
$level1_category_name		= $rs1["category_name"];
$level1_category_des 			= $rs1["category_des"];
}

if($get_language_key == 2 ){
$level1_category_name		= $rs1["category_name_lang2"];
$level1_category_des 			= $rs1["category_des_lang2"];
}

if($get_language_key == 3 ){
$level1_category_name		= $rs1["category_name_lang3"];
$level1_category_des 			= $rs1["category_des_lang3"];
}

if($get_language_key == 4 ){
$level1_category_name		= $rs1["category_name_lang4"];
$level1_category_des 			= $rs1["category_des_lang4"];
}

if($get_language_key == 5 ){
$level1_category_name		= $rs1["category_name_lang5"];
$level1_category_des 			= $rs1["category_des_lang5"];
}




$level1_category_image_mini 	= $rs1["category_image_mini"];
$level1_category_image 			= $rs1["category_image"];

$level1_option_order 			= $rs1["option_order"];
$level1_option_status 			= $rs1["option_status"];
$level1_option_fixed 			= $rs1["option_fixed"];


$array_property_type["$level1_category_id_root"][] = array(
"option_order"=>"$level1_option_order" , 
"category_id"=>"$level1_category_id" , 
"category_level"=>"$level1_category_level" , 
"category_id_root"=>"$level1_category_id_root" , 

"category_name"=>"$level1_category_name" , 
"category_des"=>"$level1_category_des" , 
"category_image_mini"=>"$level1_category_image_mini" , 
"category_image"=>"$level1_category_image" , 

"option_status"=>"$level1_option_status" , 
"option_fixed"=>"$level1_option_fixed" , 
);


} /// loop
} /// count

///////////////////////////////////////////////////////////// get to array end  
 
 /*
print "<pre>";
print_r ($array_category);
print "</pre>"; 
 
 */








$array_property_HolidayHomeStyle = ""; 
$category_set_system_id = "property_HolidayHomeStyle"; 
/// $category_set_url = "property_showall.php"; 

///////////////////////////////////////////////////////////// get to array 
$level1_input_array = array(
"option_status"=>"on" , 
"system_id"=>"$category_set_system_id" , 
"sql_orderby"=>" ORDER BY  option_order  ASC " ,
);
$level1_count_category = $app_category->function_countbyset( $level1_input_array );
$level1_result_category = $app_category->function_viewbyset( $level1_input_array ); /// select ข้อมูล

if ($level1_count_category > 0 ){ 


$level1_loop = 0 ;
while($rs1 = $level1_result_category->FetchRow()){ /////// loop 
$level1_loop = $level1_loop + 1  ;

///////////////// set value
$level1_category_id 			= $rs1["category_id"];
$level1_category_level 		= $rs1["category_level"];
$level1_category_id_root 	= $rs1["category_id_root"];

if($get_language_key == 1 ){
$level1_category_name		= $rs1["category_name"];
$level1_category_des 			= $rs1["category_des"];
}

if($get_language_key == 2 ){
$level1_category_name		= $rs1["category_name_lang2"];
$level1_category_des 			= $rs1["category_des_lang2"];
}

if($get_language_key == 3 ){
$level1_category_name		= $rs1["category_name_lang3"];
$level1_category_des 			= $rs1["category_des_lang3"];
}

if($get_language_key == 4 ){
$level1_category_name		= $rs1["category_name_lang4"];
$level1_category_des 			= $rs1["category_des_lang4"];
}

if($get_language_key == 5 ){
$level1_category_name		= $rs1["category_name_lang5"];
$level1_category_des 			= $rs1["category_des_lang5"];
}



$level1_category_image_mini 			= $rs1["category_image_mini"];

$level1_option_order 			= $rs1["option_order"];
$level1_option_status 			= $rs1["option_status"];
$level1_option_fixed 			= $rs1["option_fixed"];



$array_property_HolidayHomeStyle["$level1_category_id_root"][] = array(
"option_order"=>"$level1_option_order" , 
"category_id"=>"$level1_category_id" , 
"category_level"=>"$level1_category_level" , 
"category_id_root"=>"$level1_category_id_root" , 

"category_name"=>"$level1_category_name" , 
"category_des"=>"$level1_category_des" , 
"category_image_mini"=>"$level1_category_image_mini" , 
"category_image"=>"$level1_category_image" , 

"option_status"=>"$level1_option_status" , 
"option_fixed"=>"$level1_option_fixed" , 
);



} /// loop
} /// count

/// $array_property_HolidayHomeStyle = $array_category ; 
///////////////////////////////////////////////////////////// get to array end  
 
 /*
print "<pre>";
print_r ($array_category);
print "</pre>"; 
 
 */




$array_property_style = ""; 
/// empty($array_property_style);
$category_set_system_id = "property_style"; 
/// $category_set_url = "property_showall.php"; 

///////////////////////////////////////////////////////////// get to array 
$level1_input_array = array(
"option_status"=>"on" , 
"system_id"=>"$category_set_system_id" , 
"sql_orderby"=>" ORDER BY  option_order  ASC " ,
);
$level1_count_category = $app_category->function_countbyset( $level1_input_array );
$level1_result_category = $app_category->function_viewbyset( $level1_input_array ); /// select ข้อมูล

if ($level1_count_category > 0 ){ 


$level1_loop = 0 ;
while($rs1 = $level1_result_category->FetchRow()){ /////// loop 
$level1_loop = $level1_loop + 1  ;

///////////////// set value
$level1_category_id 			= $rs1["category_id"];
$level1_category_level 		= $rs1["category_level"];
$level1_category_id_root 	= $rs1["category_id_root"];

if($get_language_key == 1 ){
$level1_category_name		= $rs1["category_name"];
$level1_category_des 			= $rs1["category_des"];
}

if($get_language_key == 2 ){
$level1_category_name		= $rs1["category_name_lang2"];
$level1_category_des 			= $rs1["category_des_lang2"];
}

if($get_language_key == 3 ){
$level1_category_name		= $rs1["category_name_lang3"];
$level1_category_des 			= $rs1["category_des_lang3"];
}

if($get_language_key == 4 ){
$level1_category_name		= $rs1["category_name_lang4"];
$level1_category_des 			= $rs1["category_des_lang4"];
}

if($get_language_key == 5 ){
$level1_category_name		= $rs1["category_name_lang5"];
$level1_category_des 			= $rs1["category_des_lang5"];
}



$level1_category_image_mini 	= $rs1["category_image_mini"];
$level1_category_image 		= $rs1["category_image"];

$level1_option_order 			= $rs1["option_order"];
$level1_option_status 			= $rs1["option_status"];
$level1_option_fixed 			= $rs1["option_fixed"];


$array_property_style["$level1_category_id_root"][] = array(
"option_order"=>"$level1_option_order" , 
"category_id"=>"$level1_category_id" , 
"category_level"=>"$level1_category_level" , 
"category_id_root"=>"$level1_category_id_root" , 

"category_name"=>"$level1_category_name" , 
"category_des"=>"$level1_category_des" , 
"category_image_mini"=>"$level1_category_image_mini" , 
"category_image"=>"$level1_category_image" , 

"option_status"=>"$level1_option_status" , 
"option_fixed"=>"$level1_option_fixed" , 
);



} /// loop
} /// count

///////////////////////////////////////////////////////////// get to array end  
 
 
 
 
 

 
 
 
$array_property_facilities = ""; 
$category_set_system_id = "property_facilities"; 
/// $category_set_url = "property_showall.php"; 

///////////////////////////////////////////////////////////// get to array 
$level1_input_array = array(
"option_status"=>"on" , 
"system_id"=>"$category_set_system_id" , 
"sql_orderby"=>" ORDER BY  option_order  ASC " ,
);
$level1_count_category = $app_category->function_countbyset( $level1_input_array );
$level1_result_category = $app_category->function_viewbyset( $level1_input_array ); /// select ข้อมูล

if ($level1_count_category > 0 ){ 
$level1_loop = 0 ;
while($rs1 = $level1_result_category->FetchRow()){ /////// loop 
$level1_loop = $level1_loop + 1  ;

///////////////// set value
$level1_category_id 			= $rs1["category_id"];
$level1_category_level 		= $rs1["category_level"];
$level1_category_id_root 	= $rs1["category_id_root"];

if($get_language_key == 1 ){
$level1_category_name		= $rs1["category_name"];
$level1_category_des 			= $rs1["category_des"];
}

if($get_language_key == 2 ){
$level1_category_name		= $rs1["category_name_lang2"];
$level1_category_des 			= $rs1["category_des_lang2"];
}

if($get_language_key == 3 ){
$level1_category_name		= $rs1["category_name_lang3"];
$level1_category_des 			= $rs1["category_des_lang3"];
}

if($get_language_key == 4 ){
$level1_category_name		= $rs1["category_name_lang4"];
$level1_category_des 			= $rs1["category_des_lang4"];
}

if($get_language_key == 5 ){
$level1_category_name		= $rs1["category_name_lang5"];
$level1_category_des 			= $rs1["category_des_lang5"];
}



$level1_category_image_mini 	= $rs1["category_image_mini"];
$level1_category_image 		= $rs1["category_image"];

$level1_option_order 			= $rs1["option_order"];
$level1_option_status 			= $rs1["option_status"];
$level1_option_fixed 			= $rs1["option_fixed"];


///$array_property_facilities["$level1_category_id_root"][] = array(
$array_property_facilities["$level1_category_id"] = array(
"option_order"=>"$level1_option_order" , 
"category_id"=>"$level1_category_id" , 
"category_level"=>"$level1_category_level" , 
"category_id_root"=>"$level1_category_id_root" , 

"category_name"=>"$level1_category_name" , 
"category_des"=>"$level1_category_des" , 
"category_image_mini"=>"$level1_category_image_mini" , 
"category_image"=>"$level1_category_image" , 

"option_status"=>"$level1_option_status" , 
"option_fixed"=>"$level1_option_fixed" , 
);



} /// loop
} /// count

///////////////////////////////////////////////////////////// get to array end  
 
 
 
 
 
 
 
$array_travel_service = ""; 
$category_set_system_id = "travel_service"; 
/// $category_set_url = "property_showall.php"; 

///////////////////////////////////////////////////////////// get to array 
$level1_input_array = array(
"option_status"=>"on" , 
"system_id"=>"$category_set_system_id" , 
"sql_orderby"=>" ORDER BY  option_order  ASC " ,
);
$level1_count_category = $app_category->function_countbyset( $level1_input_array );
$level1_result_category = $app_category->function_viewbyset( $level1_input_array ); /// select ข้อมูล

if ($level1_count_category > 0 ){ 


$level1_loop = 0 ;
while($rs1 = $level1_result_category->FetchRow()){ /////// loop 
$level1_loop = $level1_loop + 1  ;

///////////////// set value
$level1_category_id 			= $rs1["category_id"];
$level1_category_level 		= $rs1["category_level"];
$level1_category_id_root 	= $rs1["category_id_root"];

if($get_language_key == 1 ){
$level1_category_name		= $rs1["category_name"];
$level1_category_des 			= $rs1["category_des"];
}

if($get_language_key == 2 ){
$level1_category_name		= $rs1["category_name_lang2"];
$level1_category_des 			= $rs1["category_des_lang2"];
}

if($get_language_key == 3 ){
$level1_category_name		= $rs1["category_name_lang3"];
$level1_category_des 			= $rs1["category_des_lang3"];
}

if($get_language_key == 4 ){
$level1_category_name		= $rs1["category_name_lang4"];
$level1_category_des 			= $rs1["category_des_lang4"];
}

if($get_language_key == 5 ){
$level1_category_name		= $rs1["category_name_lang5"];
$level1_category_des 			= $rs1["category_des_lang5"];
}



$level1_category_image_mini 	= $rs1["category_image_mini"];
$level1_category_image 		= $rs1["category_image"];

$level1_option_order 			= $rs1["option_order"];
$level1_option_status 			= $rs1["option_status"];
$level1_option_fixed 			= $rs1["option_fixed"];


$array_travel_service["$level1_category_id_root"][] = array(
"option_order"=>"$level1_option_order" , 
"category_id"=>"$level1_category_id" , 
"category_level"=>"$level1_category_level" , 
"category_id_root"=>"$level1_category_id_root" , 

"category_name"=>"$level1_category_name" , 
"category_des"=>"$level1_category_des" , 
"category_image_mini"=>"$level1_category_image_mini" , 
"category_image"=>"$level1_category_image" , 

"option_status"=>"$level1_option_status" , 
"option_fixed"=>"$level1_option_fixed" , 
);



} /// loop
} /// count


///////////////////////////////////////////////////////////// get to array end  
 
 
 
 
 
 

 
 
 
 
 
 /*
print "<pre>";
print_r ($array_category);
print "</pre>"; 
 
 */
 
 /*
print "<pre>";
print_r ($array_property_facilities);
print "</pre>"; 
 */





?>