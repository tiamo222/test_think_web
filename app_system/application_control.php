<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){



//include("../category/plugin.php");

if (empty($_REQUEST["appaction_search"]) )  		{  $appaction_search="";  } 	else { $appaction_search=$_REQUEST["appaction_search"];  }
if (empty($_REQUEST["keyword"]) )  					{  $keyword="";  }					else { $keyword=$_REQUEST["keyword"];  }
if (empty($_REQUEST["search_type"]) )  				{  $search_type="";  } 			else { $search_type=$_REQUEST["search_type"];  }

if ($appaction_search == "search" ){

if ($search_type == "property" ){
 header("Location:../longstay/search.php?search_keyword=$keyword"); 
}

if ($search_type == "information" ){
 header("Location:../longstay/search.php?keyword=$keyword"); 
}


}/// if ($appaction_search == "search" ){
	




$lang_default = "thai"; 

$input_array = array(
"sql_other"=>"
AND   option_default_show = 'yes'
", 
);
$rs_language= $app_language->function_viewbyid_sql( $input_array );
if ($rs_language ){	
$language_id = $rs_language["language_id"];
$lang_default = $language_id ; 
}////

//// print "lang_default = $lang_default <br>";


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


//////////////////// language end


if (empty($_REQUEST["id_pager"]) ) 	{  $id_pager = "";  } 	else { $id_pager = $_REQUEST["id_pager"];  }






?>