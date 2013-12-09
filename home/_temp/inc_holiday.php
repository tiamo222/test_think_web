<?
	$option_show = "show";
    if ($option_show =="show"){
	?>
    <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="../images/span.gif" width="100" height="7" /></td>
      </tr>
    </table>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1"><img src="../images/design_agency3/box1m1.gif" width="46" height="70" /></td>
        <td width="250" align="center" valign="top" style="background-image:url(../images/design_agency3/box1bgtext.gif)"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" valign="middle" style="height:42px;"><img src="../images/design_agency4/text_holiday.gif" width="316" height="27" hspace="10" vspace="0" /></td>
          </tr>
          <tr>
            <td align="left" valign="middle"  class="text1" style="height:28px; vertical-align:middle; padding-left:15px;"><font  color="#3f3f3f" >เลือกบ้านพักตากอากาศตามสไตล์การตกแต่ง</font></td>
          </tr>
        </table></td>
        <td style="background-image:url(../images/design_agency3/box1bgtop.gif)">&nbsp;</td>
        <td width="1"><img src="../images/design_agency3/box1m2.gif" width="46" height="70" /></td>
      </tr>
    </table>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1" style="background-image:url(../images/design_agency3/box1h1.gif)"><img src="../images/design_agency3/box1h1.gif" width="17" height="15" /></td>
        <td align="left" valign="top" style=" background-image:url(../images/design_agency3/box1bgcontent.gif); padding-left:5px; padding-right:5px;"><?


////////////////////////////////////////////////////////////////////////////////////////// level1

$level1_result = $array_property_HolidayHomeStyle["root"];
$level1_count = count($level1_result);

if ($level1_count  > 0 ) {  //// count


print "<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">";
print "<tr>";
print "<td>";

$level1_loop = 0 ; 
$level1_loop_row = 0 ; 
foreach ($level1_result as $level1_key => $level1_rs) { //// loop
$level1_loop = $level1_loop + 1 ; 
$level1_loop_row = $level1_loop_row + 1 ; 


///////////////// set value
$level1_category_id 		= $level1_rs["category_id"];
$level1_category_name 	= $level1_rs["category_name"];
$level1_category_des 		= $level1_rs["category_des"];
$level1_option_order 		= $level1_rs["option_order"];
$level1_category_image_mini 		= $level1_rs["category_image_mini"];
$level1_option_status 		= $level1_rs["option_status"];


if ($level1_category_image_mini != "" ){
$level1_category_image_mini ="<img src=\"$path_category$level1_category_image_mini\"  width=\"100\" >";	
}


/////////////////  loop tr
$option_new_row = "none";
if ($level1_loop_row == 2 ){
$level1_loop_row = 0 ; 
$option_new_row = "new";
}





?>
          <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <tr class="text1">
              <td align="left" valign="middle"><a href="../longstay/category.php?id=<?=$level1_category_id ?>"><font color="#660000"><b>
                <?=$level1_category_name ?>
              </b></font></a></td>
              <td width="50" align="right" class="text2"><a href="../longstay/category.php?id=<?=$level1_category_id ?>"> <font color="#660000">more</font><img src="../images/design_agency3/icon_more1.gif" width="9" height="12" hspace="4" align="absmiddle" /></a></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="3" cellpadding="0" style="background-color:#FFF">
            <tr>
              <td bgcolor="#BB9986"><img src="../images/span.gif" width="100" height="1" /></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <tr class="text1">
            
            
<?
if ($level1_category_image_mini != "" ){ 
?>
<td width="50" align="center" valign="top" style="padding:0px; padding-top:4px;">
              

<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" style="background-color:#E7E2D5;">
<tr><td align="center" valign="top" bgcolor="#FFFFFF"><a href="../longstay/category.php?id=<?=$level1_category_id ?>"><?=$level1_category_image_mini?></a></td>
</tr>
</table>

              
</td>
<?
} ////level1_category_image_mini
?>


<td  align="left" valign="top" class="text2">
<a href="../longstay/category.php?id=<?=$level1_category_id ?>"><font color="#666666">
<?=$level1_category_des ?>
</font></a></td>
            </tr>
          </table>
          <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><img src="../images/span.gif" width="270" height="5"  border="0" /></td>
            </tr>
          </table>
<?

if ($option_new_row != "new" ){
print "</td><td>";
}

if ($option_new_row == "new" ){
print "</td></tr><tr><td>";
}
} ///  loop


print "</table>";

}//// count

?></td>
        <td width="1" style="background-image:url(../images/design_agency3/box1h2.gif)"><img src="../images/design_agency3/box1h2.gif" width="17" height="15" /></td>
      </tr>
    </table>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1"><img src="../images/design_agency3/box1m3.gif" width="43" height="53" /></td>
        <td align="right" valign="bottom" style="background-image:url(../images/design_agency3/box1bg_bt.gif)"><a href="#"><img src="../images/design_agency3/box1bt_bot.gif" width="87" height="26" /></a></td>
        <td width="1"><img src="../images/design_agency3/box1m4.gif" width="43" height="53" /></td>
      </tr>
    </table>
<?
	}///
?>