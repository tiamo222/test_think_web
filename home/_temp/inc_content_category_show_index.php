<?

/////////////////////////////////////////////
  
$input_array = array(
"sql_orderby"=>" ORDER BY option_order  ASC " ,
"system_id"=>"app_content" , 
"category_id_root"=>"cat09090710174900023" , 
"category_level"=>"2" , 
"option_show_index"=>"index" , 
"option_status"=>"on" , 
);
$category_count_row = $app_category->function_countbyset( $input_array );
$category_rs = $app_category->function_viewbyset( $input_array ); /// select ข้อมูล

if ($category_count_row > 0 ){ 



print "
<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
<tr><td height=\"300\" align=\"left\" valign=\"top\" style=\"padding-right:10px;\">
";







$category_loop = 0 ;
while($rs = $category_rs->FetchRow()){ /////// loop 
$category_loop = $category_loop + 1  ;

///////////////// set value
$lv1_category_id = $rs["category_id"];
$lv1_category_name = $rs["category_name"];
$lv1_category_des = $rs["category_des"];
$lv1_category_image_mini = $rs["category_image_mini"];

$lv1_category_image_mini_show = ""; 	
if ($lv1_category_image_mini != "" ){
$lv1_category_image_mini_show = "<img src=\"$path_category$lv1_category_image_mini\" width=\"307\"  />"; 	
}

  
  ?>  
    
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td align="left" valign="middle" class="text_bot1" style="height:30px; background-color:#18BED3; padding-left:10px;"><font color="#FFFFFF"><?=$lv1_category_name ?> &nbsp;</font></td>
      </tr>

<?
if ($lv1_category_image_mini_show != "" ){ 
?>
<tr>
<td style="padding:0px;"><?=$lv1_category_image_mini_show?></td>
</tr>
<?
} ///lv1_category_image_mini_show

if ($lv1_category_des != "" ){ 
?>
<tr>
<td height="100" align="left" valign="top" class="text_normal1" style="padding:5px;"><font color="#666666"><?=$lv1_category_des ?></font></td>
</tr>
<?

} ////lv1_category_des

 ?>
      
      
    </table>
    
    
<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="5" /></td>
        </tr>
      </table>
    
    
    
<?

///////////////// content


$input_array = array(
"sql_orderby"=>" ORDER BY option_order  ASC " ,
"category_id"=>"$lv1_category_id" , 
"option_status"=>"on" , 
);
$content_count_row = $app_content->function_countbyset( $input_array );
$content_result = $app_content->function_viewbyset( $input_array ); /// select ข้อมูล

if ($content_count_row > 0){ 

$content_loop = 0 ;
while($content_rs = $content_result->FetchRow()){ /////// loop 
$content_loop = $content_loop + 1  ;

///////////////// set value
$content_id = $content_rs["content_id"];
$content_name = $content_rs["content_name"];
$content_des = $content_rs["content_des"];
$content_image_mini = $content_rs["content_image_mini"];

$content_image_mini_show = "<img src=\"../images/design_agency/pic3.jpg\"  width=\"108\" height=\"94\" border=0 />"; 	
if ($content_image_mini != "" ){
$content_image_mini_show = "<img src=\"$path_content$content_image_mini\"  width=\"108\" height=\"94\" border=0 />"; 	
}

?>
      
      

      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="1" align="left" valign="top"><a href="../information/detail.php?id=<?=$content_id ?>"><?=$content_image_mini_show ?></a></td>
          <td align="left" valign="middle" class="text_normal1" style="padding-left:5px;">

<a href="../information/detail.php?id=<?=$content_id ?>"><font color="#666666">
 <b><?=$content_name ?></b><br />
<?=$content_des ?>
</font></a>

</td>
        </tr>
      </table>
      
<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="5" /></td>
        </tr>
      </table>
      
<?

} /// content loop
} //////////////////// content_count_row

?>
      
      
      
      
      
      
      
<?

//////////////// category 
if ($category_loop == 3 ) { 
print "</td><td align=\"left\" valign=\"top\">";
}///



} //// loop category


print "
</td></tr></table>
";


} /// if ($category_count_row > 0 ){ 
///////////////////////////////////// 
?>
      
<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="307" height="10" /></td>
        </tr>
      </table>      
      
      

<?




?>



<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="../images/span.gif" width="100" height="10" /></td>
  </tr>
</table>
