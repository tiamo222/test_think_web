<?

$input_array = array(
"system_id"=>"app_content" , 
"option_orderby"=>"option_order" ,
"option_status"=>"on" ,
);
$gallery_count = $app_gallery->function_countbyset( $input_array );

if ($gallery_count == 0 ){  //// count 


?>


     <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
       <tr>
         <td width="1"><img src="../images/design_box/bg1_m1.gif" width="14" height="14" /></td>
         <td width="100%" style="background-image:url(../images/design_box/bg1_bg.gif);"><img src="../images/design_box/bg1_bg.gif" width="50" height="6" /></td>
         <td width="1"><img src="../images/design_box/bg1_m2.gif" width="14" height="14" /></td>
       </tr>
       <tr>
         <td height="50" colspan="3" align="center" valign="middle" style="background-image:url(../images/design_box/bg1_bg.gif);"><span class="text_big2"><font color="#333333">ยังไม่มีข้อมูล ... </font></span></td>
       </tr>
       <tr>
         <td><img src="../images/design_box/bg1_m3.gif" width="14" height="14" /></td>
         <td style="background-image:url(../images/design_box/bg1_bg.gif);"><img src="../images/design_box/bg1_bg.gif" width="50" height="6" /></td>
         <td><img src="../images/design_box/bg1_m4.gif" width="14" height="14" /></td>
       </tr>
     </table>
     

<?

} else { 
////////////////////////gallery_count

?>
     
     
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="top">

<?

$gallery_rs = $app_gallery->function_viewbyset( $input_array ); /// select ข้อมูล

while($rs = $gallery_rs->FetchRow()){ /////// loop 
$lv1_count_loop = $lv1_count_loop + 1  ;

///////////////// set value
$loop_gallery_id = $rs["gallery_id"];
$loop_gallery_name = $rs["gallery_name"];
$loop_gallery_des = $rs["gallery_des"];
$loop_gallery_image_mini = $rs["gallery_image_mini"];

$loop_stat_picture = $rs["stat_picture"];
$loop_stat_view = $rs["stat_view"];
$loop_stat_reply = $rs["stat_reply"];



print "<a href=\"../gallery/gallery.php?id=$loop_gallery_id\">
<img src=\"$path_gallery$loop_gallery_image_mini\" width=\"133\" height=\"100\"  style=\"padding-right:5px;padding-bottom:10px;\" alt=\"$loop_gallery_name\" border=0></a><wbr>"; 

} ////// loop
?>
          
          </td>
  </tr>
</table>

<?
} //////if ($gallery_count > 0 ){  //// count 
?>