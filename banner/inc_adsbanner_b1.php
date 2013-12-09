<?

$input_array = array(
"option_status"=>"on" ,
//// "sql_other"=>"  and  member_picture<>''   " ,
);
$count_banner = $app_ads_banner->function_countbyset( $input_array );

if ($count_banner > 0 ){ 

$input_array = array(
/// "set_pager_limit"=>"15" , 
/// "set_pager_start"=>"0" , 
"option_status"=>"on" ,
//// "sql_other"=>"  and  member_picture<>''   " ,
);
$rs_banner = $app_ads_banner->function_viewbyset( $input_array ); /// select ¢éÍÁÙÅ

$loop_adsbanner = 0 ;
while($rs_ads = $rs_banner->FetchRow()){ /////// loop 
$loop_adsbanner = $loop_adsbanner + 1  ;

///////////////// set value
$banner_type = $rs_ads["banner_type"];
$banner_url = $rs_ads["banner_url"];
$banner_code = $rs_ads["banner_code"];
$banner_image = $rs_ads["banner_image"];

$banner_type = "banner"; 
if ($banner_type == "banner" and $banner_image != "" ) {
$banner_code_show = "<img src=\"$path_adsbanner$banner_image\" border=0 >"; 
if ($banner_url != "" ) { $banner_code_show = "<a href=\"$banner_url\" target=_blank>$banner_code_show</a>";  }
}

if ($banner_type == "code"  ) {
$banner_code_show = "$banner_code"; 
}/// 


$array_adsbanner["test"]["$loop_adsbanner"] = $banner_code_show ; 

//// print "banner_code_show = $banner_code_show <br><br>";

} //// loop
} ///if ($count_banner == 0 ){ 

/*
<img src="../images/banner/banner_728x90.jpg" width="728" height="90" />
*/

?>