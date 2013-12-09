<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="../images/span.gif" width="100" height="20" /></td>
      </tr>
    </table>
    <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="../images/design_agency3/bar_plannextbreak.gif" width="612" height="103" /></td>
      </tr>
    </table>
    <table width="612" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1" align="center" valign="top"><img src="../images/span.gif" width="4" height="4" /></td>
        <td height="250" align="center" valign="top" bgcolor="#F6F3EF">
          
          
          
          
          
          
          
          
          <?


////////////////////////////////////////////////////////////////////////////////////////// level1

$level1_result = $array_property_PlanYourNextBreak["root"];
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
              <td width="50" align="right" class="text2"><a href="../longstay/category.php?id=<?=$level1_category_id ?>"> <font color="#660000">more</font><img src="../images/design_agency3/icon_more1.gif" width="9" height="12" hspace="4" align="absmiddle" /> </a></td>
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
          
          

          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="10">
            <tr>
              <td align="right"><img src="../images/design_agency4/plan_more.gif" width="72" height="22" /></td>
            </tr>
          </table></td>
        <td width="1" align="center" valign="top"><img src="../images/span.gif" width="3" height="4" /></td>
        </tr>
    </table>