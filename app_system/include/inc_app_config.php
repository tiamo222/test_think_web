<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


$lang_default = "thai"; 

/////////////////////////////////////////////////////////////////////////// app select lang
$input_array = array(
"option_status"=>"on" ,  
"sql_orderby"=>" order by  option_order  ASC " ,  
);
$lang_count = $app_language->function_countbyset( $input_array); 
if ($lang_count > 0 ) { 
$lang_result = $app_language->function_viewbyset( $input_array); 

$loop_lang = 0 ; 
while($lang_rs = $lang_result->FetchRow()){ /// section loop
$loop_lang  = $loop_lang + 1 ; 

$loop_language_key = $lang_rs["language_key"];
$loop_language_id = $lang_rs["language_id"];
$loop_language_name = $lang_rs["language_name"];
$loop_language_icon = $lang_rs["language_icon"];
$loop_option_default_show = $lang_rs["option_default_show"];
$loop_option_default_input = $lang_rs["option_default_input"];
$loop_option_status = $lang_rs["option_status"];

$loop_language_icon = "<img src=\"../images/icon/$loop_language_icon\" alt=\"$loop_language_name\">";

if ($loop_option_default_show == "yes" ){
$lang_default = "$loop_language_id"; 
}


$array_language["$loop_language_id"] = array(
"language_id"=>"$loop_language_id",
"language_key"=>"$loop_language_key",
"language_name"=>"$loop_language_name",
"language_icon"=>"$loop_language_icon",
"option_default_show"=>"$loop_option_default_show",
"option_default_input"=>"$loop_option_default_input",
"option_status"=>"$loop_option_status",
);

$array_language_bykey["$loop_language_key"]  = array(
"language_id"=>"$loop_language_id",
"language_key"=>"$loop_language_key",
"language_name"=>"$loop_language_name",
"language_icon"=>"$loop_language_icon",
"option_default_show"=>"$loop_option_default_show",
"option_default_input"=>"$loop_option_default_input",
"option_status"=>"$loop_option_status",
);

} /// loop
} /// count
/////////////////////////////////////////////////////////////////////////// app select lang end

/*

print "<pre>";
print_r ($array_language);
print "</pre>";


*/




//////////////////// language
///if (empty($_REQUEST["langurl"]) ) 	{  $langurl = "";  } 	else { $langurl = $_REQUEST["langurl"];  }
if (empty($_REQUEST["lang"]) ) 		{  $lang = "";  } 		else { $lang = $_REQUEST["lang"];  }
if (empty($_SESSION["langss"]) ) 	{  $langss = "";  } 	else { $langss = $_SESSION["langss"];  }

if ($langurl == ""){
$langurl = "../home/index.php?";
}


if ($langss == "" ){
$_SESSION["langss"] = $lang_default ;
$langss = $lang_default ;
}

if ($lang != "" ){
$_SESSION["langss"] = $lang ; 
$langss = $lang ; 
} 


/// print "langss = $langss <br>";











/////////////////////////////////////////////////////////////////////////// app_language_config

//////////************
$get_language_key = $array_language["$langss"]["language_key"];

$input_array = array(
"option_status"=>"on" ,  
"sql_orderby"=>" order by  option_order  ASC " ,  
);
$lang_config_count = $app_language_config->function_countbyset( $input_array); 
if ($lang_config_count > 0 ) { 
$lang_config_result = $app_language_config->function_viewbyset( $input_array); 

while($config_rs = $lang_config_result->FetchRow()){ /// section loop
$loop_lang_config_id = $config_rs["lang_config_id"];
$loop_lang_config_tag = $config_rs["lang_config_tag"];

$loop_name_lang1 = $config_rs["name_lang1"];
$loop_name_lang2 = $config_rs["name_lang2"];
$loop_name_lang3 = $config_rs["name_lang3"];
$loop_name_lang4 = $config_rs["name_lang4"];
$loop_name_lang5 = $config_rs["name_lang5"];

$loop_detail_lang1 = $config_rs["detail_lang1"];
$loop_detail_lang2 = $config_rs["detail_lang2"];
$loop_detail_lang3 = $config_rs["detail_lang3"];
$loop_detail_lang4 = $config_rs["detail_lang4"];
$loop_detail_lang5 = $config_rs["detail_lang5"];

$loop_option_type = $config_rs["option_type"];
$loop_option_order = $config_rs["option_order"];
$loop_option_status = $config_rs["option_status"];


$loop_lang_info1 = ""; 
$loop_lang_info2 = ""; 
$loop_lang_info3 = ""; 
$loop_lang_info4 = ""; 
$loop_lang_info5 = ""; 

if ($loop_option_type == "topic"){ 
$loop_lang_info1 = $loop_name_lang1 ; 
$loop_lang_info2 = $loop_name_lang2 ; 
$loop_lang_info3 = $loop_name_lang3 ; 
$loop_lang_info4 = $loop_name_lang4 ; 
$loop_lang_info5 = $loop_name_lang5 ; 
} 

if ($loop_option_type == "detail"){ 
$loop_lang_info1 = $loop_detail_lang1 ; 
$loop_lang_info2 = $loop_detail_lang2 ; 
$loop_lang_info3 = $loop_detail_lang3 ; 
$loop_lang_info4 = $loop_detail_lang4 ; 
$loop_lang_info5 = $loop_detail_lang5 ; 
} 


if ($get_language_key == 1 ){ $loop_lang_info = $loop_lang_info1 ; }
if ($get_language_key == 2 ){ $loop_lang_info = $loop_lang_info2 ; }
if ($get_language_key == 3 ){ $loop_lang_info = $loop_lang_info3 ; }
if ($get_language_key == 4 ){ $loop_lang_info = $loop_lang_info4 ; }
if ($get_language_key == 5 ){ $loop_lang_info = $loop_lang_info5 ; }


$tag["$loop_lang_config_tag"] = array(
"lang_tag"=>"$loop_lang_config_tag",	
"lang_info"=>"$loop_lang_info",
);


} /// loop
} /// count
/////////////////////////////////////////////////////////////////////////// app_language_config end


/*
print "<pre>";
print_r ($array_language_config);
print "</pre>";
*/






$language_id_lang1 = $array_language_bykey["1"]["language_id"];
$language_key_lang1 = $array_language_bykey["1"]["language_key"];
$option_status_lang1 = $array_language_bykey["1"]["option_status"];
$language_name_lang1 = $array_language_bykey["1"]["language_name"];
$language_icon_lang1 = $array_language_bykey["1"]["language_icon"];


$language_id_lang2 = $array_language_bykey["2"]["language_id"];
$language_key_lang2 = $array_language_bykey["2"]["language_key"];
$option_status_lang2 = $array_language_bykey["2"]["option_status"];
$language_name_lang2 = $array_language_bykey["2"]["language_name"];
$language_icon_lang2 = $array_language_bykey["2"]["language_icon"];


$language_id_lang3 = $array_language_bykey["3"]["language_id"];
$language_key_lang3 = $array_language_bykey["3"]["language_key"];
$option_status_lang3 = $array_language_bykey["3"]["option_status"];
$language_name_lang3 = $array_language_bykey["3"]["language_name"];
$language_icon_lang3 = $array_language_bykey["3"]["language_icon"];


$language_id_lang4 = $array_language_bykey["4"]["language_id"];
$language_key_lang4 = $array_language_bykey["4"]["language_key"];
$option_status_lang4 = $array_language_bykey["4"]["option_status"];
$language_name_lang4 = $array_language_bykey["4"]["language_name"];
$language_icon_lang4 = $array_language_bykey["4"]["language_icon"];


$language_id_lang5 = $array_language_bykey["5"]["language_id"];
$language_key_lang5 = $array_language_bykey["5"]["language_key"];
$option_status_lang5 = $array_language_bykey["5"]["option_status"];
$language_name_lang5 = $array_language_bykey["5"]["language_name"];
$language_icon_lang5 = $array_language_bykey["5"]["language_icon"];















/////////////////////////////////////////////////////////////////////////// config system_config


$input_array = array(
"option_status"=>"on" ,  
);
$config_count = $system_config->function_countbyset( $input_array); 
/// print "rate_config_count = $rate_config_count <br>";

if ($config_count > 0 ) { 
$config_result = $system_config->function_viewbyset( $input_array); 

while($config_rs = $config_result->FetchRow()){ /// section loop
$loop_config_id = $config_rs["config_id"];
$loop_config_name = $config_rs["config_name"];
$loop_config_des = $config_rs["config_des"];
$loop_config_value = $config_rs["config_value"];
$loop_option_autoload = $config_rs["option_autoload"];
$loop_option_order = $config_rs["option_order"];
$loop_option_status = $config_rs["option_status"];
/// print "loop_option_status = $loop_option_status <br>";

$app_system_config["$loop_config_name"] = array(
"option_order"=>"$loop_option_order",	
"config_id"=>"$loop_config_id",
"config_name"=>"$loop_config_name",
"config_des"=>"$loop_config_des",
"config_value"=>"$loop_config_value",
"option_autoload"=>"$loop_option_autoload",
"option_status"=>"$loop_option_status",
);


} /// loop
} /// count
///////////////////////////////////////////////////////////////////////////  config system_config end

/*

print "<pre>";
print_r ($app_system_config);
print "</pre>";

*/




/////////////////////////////////////////////////////////////////////////// config menu start
if ($langss != "" ){

$input_array = array(
"sql_other"=>" AND  language_id = '$langss' " ,
"sql_orderby"=>" ORDER BY option_order  ASC " ,
);
$menu_count = $system_appmenu->function_countbyset( $input_array); 
/// print "rate_config_count = $rate_config_count <br>";

if ($menu_count > 0 ) { 
$menu_result = $system_appmenu->function_viewbyset( $input_array); 
while($config_rs = $menu_result->FetchRow()){ /// section loop
$loop_menu_id = $config_rs["menu_id"];
$loop_menu_id_root = $config_rs["menu_id_root"];
$loop_menu_set = $config_rs["menu_set"];
$loop_menu_name = $config_rs["menu_name"];
$loop_menu_url = $config_rs["menu_url"];
$loop_option_target = $config_rs["option_target"];

$loop_option_order = $config_rs["option_order"];
$loop_option_status = $config_rs["option_status"];
/// print "loop_option_status = $loop_option_status <br>";

$menu_by_set["$loop_menu_set"][] = array(
"option_order"=>"$loop_option_order",	
"menu_id"=>"$loop_menu_id",
"menu_name"=>"$loop_menu_name",
"menu_set"=>"$loop_menu_set",
"menu_name"=>"$loop_menu_name",
"menu_url"=>"$loop_menu_url",
"option_target"=>"$loop_option_target",
"option_status"=>"$loop_option_status",
);


} /// loop
} /// count

}///if ($langss != "" ){
/////////////////////////////////////////////////////////////////////////// config menu end

/*
print "<pre>";
print_r ($menu_by_set);
print "</pre>";
*/


?>