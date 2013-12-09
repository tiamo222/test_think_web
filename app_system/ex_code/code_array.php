<?


//////////////// geade
$input_array = array(
"id_config_base"=>"$id_config_base" , 
);
$config_grade_rs = $eva_config_grade->function_viewbyset_array($input_array);
$config_grade_count = count($config_grade_rs);

if ($config_grade_count > 0 ) { 
rsort($config_grade_rs);

$count_loop_grade =0;
for( $i =0 ; $i < $config_grade_count ; $i++){ /// start loop
$count_loop_grade = $count_loop_grade+1 ;

/////// grade 
$config_point = $config_grade_rs["$i"]["config_point"];
$id_config_grade = $config_grade_rs["$i"]["id_config_grade"];
$config_grade_name = $config_grade_rs["$i"]["config_grade_name"];
$config_grade_detail = $config_grade_rs["$i"]["config_grade_detail"];

} /// end loop
} //if ($config_grade_count > 0 ) { 
//////////////// geade end




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>