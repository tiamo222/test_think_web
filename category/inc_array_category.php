<?

/*

$system_data[0]["system_id"] = "app_content"; 
$system_data[1]["system_id"] = "cat_property"; 
$system_data[4]["system_id"] = "cat_destinations"; 
$system_data[4]["system_id"] = "cat_destinations"; 
$system_data[2]["system_id"] = "cat_property_facilities"; 
$system_data[3]["system_id"] = "cat_services"; 





$system_info["app_content"]["id"] = "app_content"; 
$system_info["app_content"]["name_th"] = "หมวดหมู่ ระบบเนื้อหาเว็บไซต์"; 
$system_info["app_content"]["name_en"] = "Web Content"; 



$system_info["cat_property"]["id"] = "cat_property"; 
$system_info["cat_property"]["name_th"] = "หมวดหมู่ Property"; 
$system_info["cat_property"]["name_en"] = "Property Category "; 


$system_info["cat_property_facilities"]["id"] = "cat_property_facilities"; 
$system_info["cat_property_facilities"]["name_th"] = "หมวดหมู่ Property Facilities"; 
$system_info["cat_property_facilities"]["name_en"] = "Property Facilities "; 




$system_info["cat_services"]["id"] = "cat_services"; 
$system_info["cat_services"]["name_th"] = "หมวดหมู่ บริการ"; 
$system_info["cat_services"]["name_en"] = "Services Category "; 


$system_info["cat_destinations"]["id"] = "cat_destinations"; 
$system_info["cat_destinations"]["name_th"] = "หมวดหมู่ Popular Destinations"; 
$system_info["cat_destinations"]["name_en"] = "Popular Destinations "; 
*/





$input_array = array(
"system_id"=>"app_category" , 
"category_level"=>"1" , 
"sql_orderby"=>" ORDER BY  option_order  ASC " ,
);
$category_count_row = $app_category->function_countbyset( $input_array );
$category_rs = $app_category->function_viewbyset( $input_array ); /// select ข้อมูล
if ($category_count_row > 0 ){ 

$level1_count_loop = 0 ;
while($rs = $category_rs->FetchRow()){ /////// loop 
$level1_count_loop = $level1_count_loop + 1  ;
$level1_id = $level1_count_loop - 1 ; 

///////////////// set value
$level1_category_id = $rs["category_id"];
$level1_category_id_name = $rs["category_id_name"];
$level1_category_name = $rs["category_name"];
$level1_category_des = $rs["category_des"];


$system_data["$level1_id"]["system_id"] = "$level1_category_id_name"; 

$system_info["$level1_category_id_name"]["id"] = "$level1_category_id_name"; 
$system_info["$level1_category_id_name"]["name_th"] = "หมวดหมู่สำหรับ $level1_category_name"; 
$system_info["$level1_category_id_name"]["name_en"] = "หมวดหมู่สำหรับ $level1_category_name"; 

} /// loop
} /// category_count_row












?>