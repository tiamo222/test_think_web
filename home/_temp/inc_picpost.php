<?


$input_array = array(
//// "system_id"=>"app_gallery" , 
/// "sql_other"=>"  and  ( date_start  LIKE '$getby_y-$db_getby_m%'    )  " , 
////"sql_other"=>"$sql_other" , 
///"category_id"=>"$category_id" ,
"option_approve"=>"approve" ,
"option_status"=>"on" ,
"sql_other"=>" and  picpost_image<>'' " ,
);
$count_row_data = $app_picpost->function_countbyset( $input_array );



if ($count_row_data > 0 ) { 
$input_array = array(

"set_pager_limit"=>"20" , 
"set_pager_start"=>"0" , 

///"sql_other"=>"$sql_other" , 
///"category_id"=>"$category_id" ,
"option_approve"=>"approve" ,
"option_status"=>"on" ,
"sql_other"=>" and  picpost_image<>'' " ,
);
$rs_picpost = $app_picpost->function_viewbyset( $input_array ); /// select ข้อมูล


$count_loop = 0 ;
while($rs = $rs_picpost->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;

/*
if ($id_pager > 0 ) { 
$count_row_number = $count_loop ; /// edit
$show_number =  ( $set_pager_start + $count_row_number ) - 1  ; 
$show_number = $show_number + 1 ; 
}
*/


///////////////// set value
$picpost_id = $rs["picpost_id"];
$category_id = $rs["category_id"];

$picpost_name = $rs["picpost_name"];
$picpost_des = $rs["picpost_des"];
$picpost_postname = $rs["picpost_postname"];
$picpost_email = $rs["picpost_email"];

$picpost_image = $rs["picpost_image"];
$picpost_image_mini = $rs["picpost_image_mini"];

$stat_view = $rs["stat_view"];
$stat_reply = $rs["stat_reply"];
$stat_delete = $rs["stat_delete"];

$option_confirm_email = $rs["option_confirm_email"];
$option_recommend = $rs["option_recommend"];
$option_reply = $rs["option_reply"];
$option_approve = $rs["option_approve"];
$option_status = $rs["option_status"];
$post_ipaddress = $rs["post_ipaddress"];

$datetime_create = $rs["datetime_create"];
$datetime_update = $rs["datetime_update"];


if ($picpost_des != "" ) { $picpost_des = "<font color=#333333>$picpost_des </font><br>";}
if ($picpost_postname != "" ) { $picpost_postname = "<font color=#333333>By : $picpost_postname </font><br>";}
if ($picpost_email != "" ) { $picpost_email = "<font color=#333333>Email : $picpost_email </font><br>";}


if ($picpost_image != "" ) { 
$picpost_image_mini_show = "<img src=\"$path_picpost$picpost_image\"   width=\"80\"     border=0 >"; 

if ($picpost_image_mini != "" ) { 
$picpost_image_mini_show = "<img src=\"$path_picpost$picpost_image_mini\"   width=\"80\"  border=0  >"; 
}

} else {
$picpost_image_mini_show = "<img src=\"$config_picture_member\"  width=80   /><br><br>"; 
}



$show_datetime_create = ""; 
if ($datetime_create != "" or $datetime_create != "0000-00-00 00:00:00"   ){
$show_datetime_create = function_datetime_dbtoshow_mini($datetime_create);
$show_datetime_create = " เมื่อ $show_datetime_create ";
}


?>
        

<table width="100%" border="0" cellspacing="0" cellpadding="0">

<?
if ($count_loop > 1 ) { 
?>
  <tr>
    <td colspan="2" align="left" valign="top"><span class="text_normal1"><img src="../images/span.gif" width="100" height="5" /></span></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" bgcolor="#333333"><span class="text_normal1"><img src="../images/span.gif" width="100" height="1" /></span></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top"><span class="text_normal1"><img src="../images/span.gif" width="100" height="5" /></span></td>
  </tr>
<?
} //// if ($count_loop > 1 ) { 
?>
  
  <tr>
    <td width="1" align="left" valign="top" class="text_normal1">
<a href="../picpost/picpost.php?id=<?=$picpost_id ?>">
<?=$picpost_image_mini_show ?>
</a>
</td>
    <td align="left" valign="middle" class="text_normal1" style="padding-left:10px;">



<a href="../picpost/picpost.php?id=<?=$picpost_id ?>">

<span class="text_normal1"><font color="#000000"> 
<b><?=$picpost_name ?></b><br />
<?=$picpost_des ?>
 </font></span>

<font color="#333333">
<?=$picpost_postname?><?=$picpost_email ?> 
<?=$show_datetime_create ?>  (อ่าน <?=$stat_view?> / ตอบ <?=$stat_reply?>) 
</font>


</a>



    
    </td>
  </tr>
</table>


<?


/////////////////////// level 1 end loop
} //////////// loop end


if ($set_pager_total > 1 ){ 
include("../app_system/include/inc_pager.php");
}


} ////////////// end 



?>
