<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){



////// FUNCTION GEN ID
function function_genid( $input_idname , $input_idnow ) {
//// check input
if  ( empty($input_idname)) { $input_idname =  ""  ;  } else { $input_idname =  $input_idname  ; }
if  ( empty($input_idnow)) { $input_idnow = 99 ;  } else { $input_idnow =  $input_idnow  ; }

$id_data = substr( '0000' . $input_idnow  , strlen ('0000' . $input_idnow  ) -5 , 5 ) ;

///// SHOW DATE 
$gen_date = date("ymdHis");

///// GEN ID //// EX =category-05092517320044
$output_genid = $input_idname .  $gen_date  .  $id_data  ; 

return $output_genid ;
}  /// END fc_genid

//////////////////////////////////// HOW TO USE FUNCTION
/*
$input_idname = "category-" ;
$input_idnow =  $aid ; 
$gen_newid = fc_genid( $input_idname , $input_idnow ) ;
*/
////// GEN ID END




////// FUNCTION GEN ID
function function_genid_mini( $input_idname , $input_idnow ) {
//// check input
if  ( empty($input_idname)) { $input_idname =  ""  ;  } else { $input_idname =  $input_idname  ; }
if  ( empty($input_idnow)) { $input_idnow = 99 ;  } else { $input_idnow =  $input_idnow  ; }

$id_data = substr( '0000' . $input_idnow  , strlen ('0000' . $input_idnow  ) -5 , 5 ) ;

///// SHOW DATE 
$gen_date = date("ymd");

///// GEN ID //// EX =category-05092517320044
$output_genid = $input_idname .  $gen_date  .  $id_data  ; 

return $output_genid ;
}  /// END fc_genid

//////////////////////////////////// HOW TO USE FUNCTION
/*
$input_idname = "category-" ;
$input_idnow =  $aid ; 
$gen_newid = fc_genid( $input_idname , $input_idnow ) ;
*/
////// GEN ID END





///////////////////////////////////////// 
function function_shinktext($text){
$text = str_replace("<br>","",$text);
for($i=0;$i<=strlen($text)-1;$i++) {
print  substr($text,$i,1)."<wbr>"; 
} 
} 

/*
function shinktext($text){
$text=str_replace("<br>","",$text);
for($i=0;$i<=strlen($text)-1;$i++) {
echo substr($text,$i,1)."<wbr>";} 
} 
*/


///////////////////////////////////////// 













?>