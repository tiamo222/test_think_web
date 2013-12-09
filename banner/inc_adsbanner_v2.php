<?

/*
$config_banner_728x90 = "<img src=\"../images/banner/banner_728x90_pro.jpg\" width=\"728\" height=\"90\" />"; 
$config_banner_300x300 = "<img src=\"../images/banner/banner_300x300.jpg\" width=\"300\" height=\"300\" />"; 
$config_banner_160x120 = "<img src=\"../images/banner/banner_160x120.jpg\" width=\"160\" height=\"120\" />"; 
*/



$config_banner_728x90 = ""; 
$config_banner_300x300 = ""; 
$config_banner_160x120 = ""; 


/*
1. position
2.match
3. banner
*/



/*
///////////////////////////////////// input
input_page_id
input_sql_other
*/

///######################### position [1]

$sql_banner_position = ""; 

$input_array = array(
"page_id"=>"$input_page_id" ,
"option_status"=>"on" ,
"sql_other"=>"$input_sql_other" ,
);
$count_row = $app_ads_banner_position->function_countbyset( $input_array );
if ($count_row > 0 ){ 
$rs_posi = $app_ads_banner_position->function_viewbyset( $input_array ); /// select ¢éÍÁÙÅ

$set_sql_position = " and ( ";
						   
$count_loop = 0 ;
while($rs = $rs_posi->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;

///////////////// set value
$loop_position_id = $rs["position_id"];
$loop_page_id = $rs["page_id"];
$loop_position_code = $rs["position_code"];
$loop_position_name = $rs["position_name"];
///$loop_position_des = $rs["position_des"];
///$loop_position_url = $rs["position_url"];


//// id
$array_position_id[] = "$loop_position_id";

//// data
$array_position_data["$loop_position_id"] = array(
"position_id" =>"$loop_position_id" , 
"page_id" =>"$loop_page_id" , 
"position_code" =>"$loop_position_code" , 
"position_name" =>"$loop_position_name" , 
);


} //// loop
} //// if ($count_row > 0 ){ 
////////////////////////////////// position end





/*
print "<pre>"; 
print_r ($array_position_id);
print "</pre>"; 
*/





/// set sql get match
$sql_get_position = ""; 

$count_array_position_id = count($array_position_id);
if ($count_array_position_id > 0 ){/// count 
$sql_get_position = $sql_get_position . " AND ( "; 
$count_loop = 0 ; 
foreach ($array_position_id as $value   ){ /// loop
$count_loop = $count_loop + 1 ; 
$loop_position_id = $value ;

if ($count_loop != $count_array_position_id ){
$sql_get_position = $sql_get_position . " position_id = '$loop_position_id'  or  "; 
} else {
$sql_get_position = $sql_get_position . " position_id = '$loop_position_id' )   "; 
}

} /// loop
} /// count 
/// set sql get match end
 

/// print "sql_get_position = $sql_get_position <br>";
///######################### position end [1]




///######################### match [2]

$input_array = array(
"option_status"=>"on" , 
"sql_other"=>"$sql_get_position"
);
$count_match = $app_ads_banner_match->function_countbyset($input_array);
if ($count_match){
$result_match = $app_ads_banner_match->function_viewbyset($input_array);

$sql_get_banner = " AND ( ";

$count_loop = 0 ;
while($rs = $result_match ->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;

$loop_position_id = $rs["position_id"];
$loop_banner_id = $rs["banner_id"];
$loop_position_code = $array_position_data["$loop_position_id"]["position_code"];

$array_banner_match[] = "$loop_position_code";

/*
// $array_banner_match_data["$loop_position_id"]["position_code"] = "$loop_position_code";
$array_banner_match_data["$loop_position_code"]["position_code"] = "$loop_position_code";
$array_banner_match_data["$loop_position_code"]["banner_id"] = "$loop_position_code";
$array_banner_match_data["$loop_position_code"]["position_code"] = "$loop_position_code";
*/



$show_banner["$loop_position_code"]["position_code"] = "$loop_position_code";
$show_banner["$loop_position_code"]["position_id"] = "$loop_position_id"; /// ###
$show_banner["$loop_position_code"]["banner_id"] = "$loop_banner_id";
$show_banner["$loop_position_code"]["banner_data"] = "";

if ($count_loop != $count_match ){
$sql_get_banner = $sql_get_banner . " banner_id = '$loop_banner_id'  or  "; 
} else {
$sql_get_banner = $sql_get_banner . " banner_id = '$loop_banner_id' )   "; 
}



} //// loop
} //// count
///######################### match end  [2]



/// print "sql_get_banner = $sql_get_banner ";










///######################### banner  [3]

$input_array = array(
"option_status"=>"on" , 
"sql_other"=>"$sql_get_banner"
);
$count_banner = $app_ads_banner->function_countbyset($input_array);
if ($count_banner){
$result_banner = $app_ads_banner->function_viewbyset($input_array);

/// $sql_get_banner = " AND ( ";

$count_loop = 0 ;
while($rs_banner = $result_banner ->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;

///////////////// set value
$loop_banner_id = $rs_banner["banner_id"];
$loop_banner_type = $rs_banner["banner_type"];
$loop_banner_url = $rs_banner["banner_url"];
$loop_banner_code = $rs_banner["banner_code"];
$loop_banner_image = $rs_banner["banner_image"];


/// print "loop_banner_id = $loop_banner_id <br>";

if ($loop_banner_type == "banner_image" and $loop_banner_image != "" ) {
$banner_code_show = "<img src=\"$path_adsbanner$loop_banner_image\" border=0 >"; 
if ($loop_banner_url != "" ) { 
$banner_code_show = "<a href=\"$loop_banner_url\" target=_blank>$banner_code_show</a>";  }
}

if ($loop_banner_type == "banner_code"  ) {
$banner_code_show = "$loop_banner_code"; 
}///

$array_banner_data["$loop_banner_id"]["banner_data"] = "$banner_code_show";

///$show_banner["$loop_position_code"]["banner_data"] = "$banner_code_show";


} //// loop
} //// count
///######################### banner end [3]


/*
print "<pre>";
print_r ($show_banner);
print "</pre>";
*/



///////////////// INPUT BANNER DATA to MATCH
$count_match = count($array_banner_match);
if ($count_match > 0 ){/// count 

$count_loop = 0 ; 
foreach ($array_banner_match as $value   ){ /// loop
$count_loop = $count_loop + 1 ; 
$loop_position_code = $value ;

$get_banner_id = $show_banner["$loop_position_code"]["banner_id"]; 
$get_banner_data = $array_banner_data["$get_banner_id"]["banner_data"]; 

/// update array
$show_banner["$loop_position_code"]["banner_data"] = "$get_banner_data";

} /// loop
} /// count 

///////////////// INPUT BANNER DATA to MATCH END
 










///////////////////////////////////////////////////////////////////////////// How to use
/*

///// Head File
$input_page_id = "/home/index.php"; 
$input_sql_other = ""; 
include("../banner/inc_adsbanner_v2.php"); 


///// position
$ads_banner_show = $show_banner["A1"]["banner_data"];
if ($ads_banner_show == "" ){
$ads_banner_show = $config_banner_728x90 ; 
}
print "$ads_banner_show <br>";
*/
///////////////////////////////////////////////////////////////////////////// How to use end

//// print_r ($show_banner);




?>