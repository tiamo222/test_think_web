<?

$input_array = array(
"system_id"=>"app_content" , 
"option_orderby"=>"option_order" ,
"option_status"=>"on" ,
"category_level"=>"1" , 
);
$category_count_row = $app_category->function_countbyset( $input_array );

if ($category_count_row > 0 ){  //// count 
$category_rs = $app_category->function_viewbyset( $input_array ); /// select ข้อมูล

?>


      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top">

<?
while($rs = $category_rs->FetchRow()){ /////// loop 
$lv1_count_loop = $lv1_count_loop + 1  ;

///////////////// set value
$loop_category_id = $rs["category_id"];
$category_name = $rs["category_name"];
$category_des = $rs["category_des"];
$option_order = $rs["option_order"];
$option_status = $rs["option_status"];

$category_image_mini = $rs["category_image_mini"];

print "<a href=\"../magazine/category.php?id=$loop_category_id\">
<img src=\"$path_category$category_image_mini\" width=\"133\" height=\"100\"  style=\"padding-right:5px;padding-bottom:10px;\" alt=\"$category_name\" border=0></a><wbr>"; 

} ////// loop
?>
          
          </td>
        </tr>
    </table>

<?
} //////if ($category_count_row > 0 ){  //// count 
?>