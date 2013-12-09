<?
$input_array = array(
"system_id"=>"app_content" , 
"option_orderby"=>"option_order" ,
"category_id"=>"$category_id" ,
"option_approve"=>"approve" ,
"option_status"=>"on" ,
);
$content_count_row = $app_content->function_countbyset( $input_array );

if ($content_count_row > 0 ) { 
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>
<td><img src="../images/span.gif" width="100" height="10" /></td>
</tr>
              
<?



$input_array = array(
"set_pager_limit"=>"4" , 
"set_pager_start"=>"0" , 

"system_id"=>"app_content" , 
"option_orderby"=>"option_order" ,
"category_id"=>"$category_id" ,
"option_approve"=>"approve" ,
"option_status"=>"on" ,
);
$content_rs = $app_content->function_viewbyset( $input_array ); /// select ¢ÈÕ¡Ÿ≈
$lv1_count_loop = 0 ;
while($rs = $content_rs->FetchRow()){ /////// loop 
$lv1_count_loop = $lv1_count_loop + 1  ;



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



if ($option_status == "on" ) {$option_status_text = "ÕÕπ‰≈πÏ"; }
if ($option_status == "off" ) {$option_status_text = "ÕÕø‰≈πÏ"; }

$show_content_image_mini = ""; 
if ($content_image_mini != "" ) {
$show_content_image_mini = "<img src=\"$path_content$content_image_mini\" width=80 height=\"50\"    align=\"left\" style=\"padding-right:5px;\" >";
}

if ($lv1_count_loop > 1) { 
?>
<tr>
<td bgcolor="#CCCCCC"><img src="../images/span.gif" width="100" height="1" /></td>
</tr>
<?
} //// lv1_count_loop
?>

              <tr>
                <td><img src="../images/span.gif" width="100" height="10" /></td>
              </tr>
              <tr>
<td align="left" valign="top" class="text_normal1">

<a href="../magazine/detail.php?id=<?=$content_id ?>">
<?=$show_content_image_mini?>
<?=$content_name ?>
</a>

 </td>
              </tr>
              <tr>
                <td><span class="text_normal1"><img src="../images/span.gif" width="100" height="10" /></span></td>
              </tr>
<?
} ////////// loop
?>
            </table>
            
            
            
<?
} //////////// if ($content_count_row > 0 ) { 
?>