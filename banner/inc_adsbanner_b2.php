<?

$config_banner_728x90 = "<img src=\"../images/banner/banner_728x90.jpg\" width=\"728\" height=\"90\" />"; 
$config_banner_300x300 = "<img src=\"../images/banner/banner_300x300.jpg\" width=\"300\" height=\"300\" />"; 
$config_banner_160x120 = "<img src=\"../images/banner/banner_160x120.jpg\" width=\"160\" height=\"120\" />"; 



$input_array = array(
"section_id"=>"$section_id" ,
"category_id"=>"$category_id" ,
"page_id"=>"$page_id" ,
"option_status"=>"on" ,
);
$count_banner = $app_ads_banner_match->function_countbyset( $input_array );



if ($count_banner > 0 ){ 
$input_array = array(
"section_id"=>"$section_id" ,
"category_id"=>"$category_id" ,
"page_id"=>"$page_id" ,
"option_status"=>"on" ,
);
$rs_match = $app_ads_banner_match->function_viewbyset( $input_array ); /// select ¢éÍÁÙÅ

$loop_banner = 0 ;
while($rs = $rs_match->FetchRow()){ /////// loop 
$loop_banner = $loop_banner + 1  ;

$banner_id = $rs["banner_id"];
$position_id = $rs["position_id"];
$position_code = $rs["position_code"];
$option_order = $rs["option_order"];


if ($banner_id != ""){ 

$input_array2 = array("banner_id"=>"$banner_id" ,);
$rs_banner = $app_ads_banner->function_viewbyid( $input_array2 ); /// select ¢éÍÁÙÅ
///////////////// set value
$banner_type = $rs_banner["banner_type"];
$banner_url = $rs_banner["banner_url"];
$banner_code = $rs_banner["banner_code"];
$banner_image = $rs_banner["banner_image"];

$banner_type = "banner"; 
if ($banner_type == "banner" and $banner_image != "" ) {
$banner_code_show = "<img src=\"$path_adsbanner$banner_image\" border=0 >"; 
if ($banner_url != "" ) { $banner_code_show = "<a href=\"$banner_url\" target=_blank>$banner_code_show</a>";  }
}

if ($banner_type == "code"  ) {
$banner_code_show = "$banner_code"; 
}///
$ads_banner["$position_code"] = $banner_code_show ; 


} ////if ($banner_id != ""){ 








} //// loop
} ///if ($count_banner == 0 ){ 

/*
<img src="../images/banner/banner_728x90.jpg" width="728" height="90" />
*/

?>