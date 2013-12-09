<?

$config_banner_728x90 = "<img src=\"../images/banner/banner_728x90_pro.jpg\" width=\"728\" height=\"90\" />"; 
$config_banner_300x300 = "<img src=\"../images/banner/banner_300x300.jpg\" width=\"300\" height=\"300\" />"; 
$config_banner_160x120 = "<img src=\"../images/banner/banner_160x120.jpg\" width=\"160\" height=\"120\" />"; 


/*
position
match
banner
*/


////////////////////////////////// position

$sql_banner_position = ""; 

$input_array = array(
"section_id"=>"$set_section_id" ,
"category_id"=>"$set_category_id" ,
"page_id"=>"$set_page_id" ,
"position_code"=>"$set_position_code" ,
"option_status"=>"on" ,
"sql_other"=>"$set_sql_other" ,
);
$count_row = $app_ads_banner_position->function_countbyset( $input_array );
//// print "count_row pos = $count_row <br><br>"; 

if ($count_row > 0 ){ 
$rs_posi = $app_ads_banner_position->function_viewbyset( $input_array ); /// select ¢éÍÁÙÅ

$set_sql_position = " and ( ";
						   
$count_loop = 0 ;
while($rs = $rs_posi->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;

///////////////// set value
$loop_position_id = $rs["position_id"];
$loop_section_id = $rs["section_id"];
$loop_category_id = $rs["category_id"];
$loop_page_id = $rs["page_id"];
$loop_position_code = $rs["position_code"];

$loop_position_name = $rs["position_name"];
$loop_position_des = $rs["position_des"];
///$loop_position_url = $rs["position_url"];

if ($count_loop != $count_row ){
$set_sql_position = $set_sql_position . " position_id = '$loop_position_id'  or  "; 
} else {
$set_sql_position = $set_sql_position . " position_id = '$loop_position_id' )   "; 
}


/// step 1
$array_position_id[] = "$loop_position_id";
$array_position["$loop_position_code"]["position_id"] = "$loop_position_id";
$array_position["$loop_position_code"]["position_code"] = "$position_code";


$array_position_data["$loop_position_id"] = array(
"position_id" =>"$loop_position_id" , 
"section_id" =>"$loop_section_id" , 
"category_id" =>"$loop_category_id" , 
"page_id" =>"$loop_page_id" , 
"position_code" =>"$loop_position_code" , 
);


} //// loop
} //// if ($count_row > 0 ){ 
////////////////////////////////// position end





////////////////////////////////// match
$input_array = array(
"option_status"=>"on" , 
"sql_other"=>"
$set_sql_position
"
);
$count_match = $app_ads_banner_match->function_countbyset($input_array);
if ($count_match){

$set_sql_banner = " and ( ";

$result_match = $app_ads_banner_match->function_viewbyset($input_array);

$count_loop = 0 ;
while($rs = $result_match ->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;

$loop_position_id = $rs["position_id"];
$loop_banner_id = $rs["banner_id"];

$loop_position_code = $array_position_data["$loop_position_id"]["position_code"];

$show_banner["$loop_position_code"]["position_code"] = "$loop_position_code";
$show_banner["$loop_position_code"]["position_id"] = "$loop_position_id";
$show_banner["$loop_position_code"]["banner_id"] = "$loop_banner_id";
$show_banner["$loop_position_code"]["banner_data"] = "";

if ($count_loop != $count_row ){
$set_sql_banner = $set_sql_position . " banner_id = '$loop_banner_id'  or  "; 
} else {
$set_sql_banner = $set_sql_position . " banner_id = '$loop_banner_id' )   "; 
}




///////////////////////////////////////////////////////////////////////////// banner 
if ($loop_banner_id != "" ){
$input_array = array("banner_id"=>"$loop_banner_id");
$rs_banner = $app_ads_banner->function_viewbyid($input_array); /// select ¢éÍÁÙÅ
if ($rs_banner){

///////////////// set value
$loop_banner_id = $rs_banner["banner_id"];
$loop_banner_type = $rs_banner["banner_type"];
$loop_banner_url = $rs_banner["banner_url"];
$loop_banner_code = $rs_banner["banner_code"];
$loop_banner_image = $rs_banner["banner_image"];

//// $banner_type = "banner"; 
if ($loop_banner_type == "banner_image" and $loop_banner_image != "" ) {
$banner_code_show = "<img src=\"$path_adsbanner$loop_banner_image\" border=0 >"; 
if ($loop_banner_url != "" ) { 
$banner_code_show = "<a href=\"$loop_banner_url\" target=_blank>$banner_code_show</a>";  }
}

if ($loop_banner_type == "banner_code"  ) {
$banner_code_show = "$loop_banner_code"; 
}///

/////////// ++++++++++++++
//// $array_banner["$loop_banner_id"] =  $banner_code_show ; 
$show_banner["$loop_position_code"]["banner_data"] = "$banner_code_show";


} //// if ($rs_banner){
} ///loop_banner_id
///////////////////////////////////////////////////////////////////////////// banner  end




} //// loop
} //// count





///////////////////////////////////////////////////////////////////////////// How to use


/*
$config_position_code = "A1";
$banner_data = $show_banner["$config_position_code"]["banner_data"]; 
*/


/*
$config_position_code = "A1";
$ads_banner_show = $show_banner["$config_position_code"]["banner_data"]; 
if ($ads_banner_show == "" ){
$ads_banner_show = $config_banner_728x90 ; 
}
print $ads_banner_show ; 	
*/


/// $show_banner["$loop_position_code"]["position_code"] = "$loop_position_code";
/// $this_banner_id = $show_banner["$config_banner_code"]["banner_id"]; 
///////////////////////////////////////////////////////////////////////////// How to use end




















/*
/// àÍÒä»´Ö§ ¢éÍÁÙÅ Banner ¨Ò¡ DB
$array_banner_match["$loop_banner_id"] = array(
"banner_id" =>"$loop_banner_id",
"position_code" =>"$loop_position_code",
);
$array_position["$loop_position_code"]["banner_id"] = "$loop_banner_id";
*/








/*

////////////////////////////////// banner

/// print "<br><br><br>";

$count_array_banner = count($array_banner_match);
if ($count_array_banner > 0 ){ 
foreach( $array_banner_match   as $index=>$rs_banner){  ////////// loop 

$loop_banner_id = $rs_banner["banner_id"];


$input_array = array("banner_id"=>"$loop_banner_id");
$rs_banner = $app_ads_banner->function_viewbyid($input_array); /// select ¢éÍÁÙÅ
if ($rs_banner){

///////////////// set value
$loop_banner_id = $rs_banner["banner_id"];
$loop_banner_type = $rs_banner["banner_type"];
$loop_banner_url = $rs_banner["banner_url"];
$loop_banner_code = $rs_banner["banner_code"];
$loop_banner_image = $rs_banner["banner_image"];


///print "loop_banner_type = $loop_banner_type <br>";

//// $banner_type = "banner"; 
if ($loop_banner_type == "banner_image" and $loop_banner_image != "" ) {
$banner_code_show = "<img src=\"$path_adsbanner$loop_banner_image\" border=0 >"; 
if ($loop_banner_url != "" ) { 
$banner_code_show = "<a href=\"$loop_banner_url\" target=_blank>$banner_code_show</a>";  }
}

if ($loop_banner_type == "banner_code"  ) {
$banner_code_show = "$loop_banner_code"; 
}///



/////////// ++++++++++++++
$array_banner["$loop_banner_id"] =  $banner_code_show ; 


} //// if ($rs_match){


} //// loop
} ///if ($count_array_banner_position > 0 ){ 
////////////////////////////////// banner end
*/






















//////////////// Ex
/// A1
/*
$banner_id_this = $array_position["A1"]["banner_id"];
$ads_banner_show = $array_banner["$banner_id_this"];
if ($ads_banner_show == "" ){
$ads_banner_show = $config_banner_728x90 ; 
}
print $ads_banner_show ; 	
*/


//////////////// Ex End


/*
print "<pre>";
print_r ($array_position);
print "</pre>";
*/


?>