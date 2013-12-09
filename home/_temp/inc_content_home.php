<?
$input_array = array(
"system_id"=>"app_content" , 
"option_orderby"=>"option_order" ,
///"category_id"=>"$category_id" ,
"option_approve"=>"approve" ,
"option_status"=>"on" ,
);
$content_count_row = $app_content->function_countbyset( $input_array );

if ($content_count_row > 0 ) { 

print "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" >";


$input_array = array(
"set_pager_limit"=>"14" , 
"set_pager_start"=>"0" , 

"system_id"=>"app_content" , 
/// "option_orderby"=>" order by 	id  DESC " ,
/// "category_id"=>"$category_id" ,
"option_approve"=>"approve" ,
"option_status"=>"on" ,
);
$content_rs = $app_content->function_viewbyset( $input_array ); /// select ข้อมูล

$count_loop = 0 ;
$count_loop_column = 0 ;

print "<tr>"; 

while($rs = $content_rs->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;
$count_loop_column = $count_loop_column + 1  ;


///////////////// set value
$content_id = $rs["content_id"];
$content_name = $rs["content_name"];
$content_des = $rs["content_des"];
$content_image_mini = $rs["content_image_mini"];
//// $option_order = $rs["option_order"];
$option_reply = $rs["option_reply"];
$option_highlight = $rs["option_highlight"];
$option_recommend = $rs["option_recommend"];
//// $option_approve = $rs["option_approve"];



$show_content_image_mini = ""; 
if ($content_image_mini != "" ) {
$show_content_image_mini = "<img src=\"$path_content$content_image_mini\" width=80 height=\"50\"   >";
}


print "<td align=\"left\" valign=\"top\" style=\"padding-right:10px;\">"; 


if ($count_loop > 2 ){ 
?>    
    
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>
<td><img src="../images/span.gif" width="280" height="5" /></td>
</tr>
              
<tr>
<td bgcolor="#CCCCCC"><img src="../images/span.gif" width="100" height="1" /></td>
</tr>


<tr>
<td><img src="../images/span.gif" width="100" height="5" /></td>
</tr>

</table>
<?
} ///if ($count_loop > 2 ){ 
?>




<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50" align="center" valign="top"><a href="../magazine/detail.php?id=<?=$content_id ?>"><?=$show_content_image_mini?></a></td>
    <td align="left" valign="top"  style="padding-left:10px;" class="text_normal1">
    
    
    
<a href="../magazine/detail.php?id=<?=$content_id ?>">
<?=$content_name ?>
</a>
    
    
    
    </td>
  </tr>
</table>

    
    
    
   
  


<?

print "</td>"; 	

if ($count_loop_column == 2 ) {
print "</tr><tr>"; 	
$count_loop_column = 0 ; 
}

//// print " </td></tr>";


} ////////// loop


print "</table>";

} //////////// if ($content_count_row > 0 ) { 
?>