<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1"><img src="../images/design_v2/boxb1.gif" width="9" height="35" /></td>
    <td width="1"  style="background-image:url(../images/design_v2/boxbg1.gif)"><img src="../images/design_v2/box_icon_star.gif" width="45" height="35" /></td>
    <td align="left" valign="middle" class="big1" style="background-image:url(../images/design_v2/boxbg1.gif)"><font color="#FFFFFF">Top  LongStayAtThailand</font>&nbsp;</td>
    <td width="1"><img src="../images/design_v2/boxb2.gif" width="9" height="35" /></td>
  </tr>
</table>
<table width="612" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1" align="center" valign="top"><img src="../images/span.gif" width="4" height="4" /></td>
        <td height="250" align="center" valign="top" bgcolor="#F6F3EF">
          
          
          
          
          
          
          
          
<?

/*
 print "<pre>";
 print_r ($array_property_style);
 print "<pre>";
*/



////////////////////////////////////////////////////////////////////////////////////////// level1

$level1_result = $array_property_style["root"];
///$level1_result = $array_property_style;
$level1_count = count($level1_result);

print "level1_count = $level1_count <br>";

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
///if ($level1_loop_row ==2 ){
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
              <td width="50" align="right" class="text2"><a href="../longstay/category.php?id=<?=$level1_category_id ?>"> <font color="#660000">more</font> <img src="../images/design_agency5/pnb_more.gif" width="9" height="12" align="absmiddle" border="0" /> </a></td>
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
              <td width="50" align="center" valign="top" style="padding:2px">
                
                
                <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" style="background-color:#E7E2D5;">
                  <tr><td align="center" valign="top" bgcolor="#FFFFFF"><a href="../longstay/category.php?id=<?=$level1_category_id ?>"><?=$level1_category_image_mini?></a></td>
                    </tr>
                  </table>
                
                
                </td>
              <?
} ////level1_category_image_mini
?>
              
              
              
              <td  align="left" valign="top" class="text2"><a href="../longstay/category.php?id=<?=$level1_category_id ?>"><font color="#666666">
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

?>
          <br />
          <br />
          <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td style="background-image:url(../images/design_agency5/pnb_h3.gif)"><img src="../images/design_agency5/pnb_h3.gif" width="10" height="2" /></td>
            </tr>
          </table></td>
        <td width="1" align="center" valign="top" style="background-image:url(../images/design_agency5/pnb_h2.gif);"><img src="../images/design_agency5/pnb_h2.gif" width="2" height="10" vspace="1" /></td>
        <td width="1" align="center" valign="top"><img src="../images/span.gif" width="2" height="4" /></td>
        </tr>
    </table>