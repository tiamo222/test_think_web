<?
$input_array = array(
"option_orderby"=>"option_order" ,
"option_approve"=>"approve" ,
"option_status"=>"on" ,
);
$count_row_wb = $app_webboard->function_countbyset( $input_array );

if ($count_row_wb == 0 ) { 
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

} else { //// if ($content_count_row > 0 ) { 

?>




<table width="100%" border="0" cellspacing="0" cellpadding="0">  
            
<?



$input_array = array(
"set_pager_limit"=>"50" , 
"set_pager_start"=>"0" , 

"option_orderby"=>"id  DESC  " ,
"option_approve"=>"approve" ,
"option_status"=>"on" ,
);
$rs_topic = $app_webboard->function_viewbyset( $input_array ); /// select ข้อมูล
$count_loop_wb = 0 ;
while($rs = $rs_topic->FetchRow()){ /////// loop 
$count_loop_wb = $count_loop_wb + 1  ;



///////////////// set value
$topic_id = $rs["topic_id"];
$member_id = $rs["member_id"];
$topic_name = $rs["topic_name"];
$topic_des = $rs["topic_des"];
$stat_view = $rs["stat_view"];
$stat_reply = $rs["stat_reply"];
$datetime_create  = $rs["datetime_create"];




if ($topic_des != "" ) {
$topic_des = str_replace("\n", "<br>", "$topic_des");
}




$show_datetime_create = ""; 
if ($datetime_create != "" or $datetime_create != "0000-00-00 00:00:00"   ){
$show_datetime_create = function_datetime_dbtoshow_full($datetime_create);
}



/////////////////////////////////////// member , image
$member_displayname = ""; 
$member_picture = ""; 
$member_picture_mini = ""; 
$show_topic_image = ""; 

if ($member_id != "" ) {
///////////////////////////////////////// app_member_myprofile
$input_array = array("member_id"=>"$member_id" , );
$rs_myprofile = $app_member_myprofile->function_viewbyid( $input_array );
if ($rs_myprofile ) {
$member_displayname = $rs_myprofile["member_displayname"];
$member_picture = $rs_myprofile["member_picture"];
$member_picture_mini = $rs_myprofile["member_picture_mini"];
}///

	
if ($member_picture != "" ) {
$show_topic_image = "<img src=\"$path_myprofile$member_picture\" width=50  height=\"50\"   style=\"padding-right:5px;\"  border=0 >";

if ($member_picture_mini != "" ) { 
$show_topic_image = "<img src=\"$path_myprofile$member_picture_mini\"  width=50  height=\"50\"  style=\"padding-right:5px;\"  border=0  >"; 
}

}// member_picture

} /// if ($member_id != "" ) {


if ($show_topic_image == "" ){ 
$show_topic_image = "<img src=\"$config_picture_member\" width=\"50\" height=\"50\"  style=\"\"  border=0 />";
}///
/////////////////////////////////////// member , image end





if ($count_loop_wb > 1) { 
?>
  <tr>
<td colspan="2"><img src="../images/span.gif" width="100" height="5" /></td>
</tr>  
<tr>
<td colspan="2" bgcolor="#CCCCCC"><img src="../images/span.gif" width="100" height="1" /></td>
</tr>
 <tr>
                <td colspan="2"><img src="../images/span.gif" width="100" height="5" /></td>
              </tr>
<?
} //// count_loop_wb
?>

             
              <tr>
<td width="1" align="center" valign="middle" class="text_normal1">
<a href="../webboard/topic.php?id=<?=$topic_id ?>"  target="_blank">
<?=$show_topic_image?></a></td>
<td align="left" valign="middle" class="text_normal1">

<a href="../webboard/topic.php?id=<?=$topic_id ?>" target="_blank">
<font color="#333333"><b><?=$topic_name ?></b></font><br>
<font color="#666666"><span class="text_normal2">โดย <b><?=$member_displayname ?></b> , วันที่ <?=$show_datetime_create ?> &nbsp; (อ่าน <b><?=$stat_view?></b> ครั้ง / ตอบ <b><?=$stat_reply?></b> ข้อความ)</span>
</font>
</a>



</td>
              </tr>
              
<?
} ////////// loop
?>
            </table>
            
            
            
<?
} //////////// if ($content_count_row > 0 ) { 
?>