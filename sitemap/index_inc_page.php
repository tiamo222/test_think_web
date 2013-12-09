<?
if ($config_design_page != "complete" ){
print "<meta http-equiv=\"Refresh\" content=\"0;URL=../index.php\" />";
} else {
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../app_design/css/style_web.css" rel="stylesheet" type="text/css">
<?
}//////if ($tag_for_code == "hide" ){
?>








<table width="950" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#FFF">
  <tr>
    <td align="left" valign="top"   style="padding-left:0px;padding-right:5px;" ><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td height="20" align="left" valign="middle" class="text_normal2"><font color="#666666">
          <?=$config_website_name?>
          &gt; <a href="../home"><font color="#666666">Home </font></a>&gt; <a href="../sitemap"><font color="#666666">Site Map </font></a></font></td>
        </tr>
      </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td bgcolor="#CCCCCC"><img src="../images/span.gif" width="100" height="1" /></td>
        </tr>
      </table>
      <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="1"><img src="../images/design_agency4/content_m1.gif" width="30" height="34" /></td>
          <td bgcolor="#23CBE0" class="text_big2" style="background-image: url(../images/design_agency4/content_bg_t.gif)"><font color="#FFFFFF">Site map</font></td>
          <td width="1"><img src="../images/design_agency4/content_m2.gif" width="36" height="34" /></td>
        </tr>
      </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="1"><img src="../images/design_agency4/content_m3.gif" width="15" height="15" /></td>
          <td style="background-image: url(../images/design_agency4/content_tbg.gif)" ><img src="../images/design_agency4/content_tbg.gif" width="15" height="15" /></td>
          <td width="1"><img src="../images/design_agency4/content_m4.gif" width="15" height="15" /></td>
        </tr>
      </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="1" align="left" valign="top" bgcolor="#23CBE0"><img src="../images/span.gif" width="2" height="50" /></td>
          <td height="550" align="left" valign="top" bgcolor="#FFFFFF"  style="padding-left:10px; padding-right:10px;"  class="text1">




          
          
          <table width="700" border="0" align="center" cellpadding="2" cellspacing="2">
            <tr>
              <td width="44" align="center" valign="middle" class="text1"><a href="../home"><img src="../images/icon/icon_home1.jpg" width="44" height="44" /></a></td>
              <td align="left" valign="middle" class="text1"><b><a href="../home"><?=$tag["#menu_home#"]["lang_info"] ?> Pompome.com</a></b></td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="text1"><a href="../longstay/"><img src="../images/icon/icon_forums.gif" width="32" height="32" /></a></td>
              <td align="left" valign="middle" class="text1"><a href="../longstay/"><?=$tag["#menu_TotalHolidayHome#"]["lang_info"] ?></a></td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="text1"><img src="../images/icon/icon_forums.gif" width="32" height="32" /></td>
              <td align="left" valign="middle" class="text1">Plan youy next break</td>
            </tr>
            

<?


$level1_result = $array_property_PlanYourNextBreak["root"];
$level1_count = count($level1_result);


////////////////////////////////////////////////////////////////////////////////////////// level1

$level1_result = $array_property_PlanYourNextBreak["root"];
$level1_count = count($level1_result);

if ($level1_count  > 0 ) {  //// count

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



?>
            <tr>
              <td align="right" valign="middle" class="text1">&nbsp;</td>
              <td align="left" valign="middle" class="text1">
<a href="../longstay/category.php?id=<?=$level1_category_id ?>">- <?=$level1_category_name?></a>
</td>
            </tr>
<?
} // loop
} /// count

?>
            
            
            <tr>
              <td align="right" valign="middle" class="text1">&nbsp;</td>
              <td align="left" valign="middle" class="text1">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="text1"><a href="../bidding"><img src="../images/icon/icon_forums.gif" width="32" height="32" /></a></td>
              <td align="left" valign="middle" class="text1"><a href="../bidding">Bidding Holiday Home</a></td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="text1"><img src="../images/icon/icon_forums.gif" width="32" height="32" /></td>
              <td align="left" valign="middle" class="text1"><a href="../information/advertise.php"><?=$tag["#menu_AddYourProperty#"]["lang_info"] ?></a></td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="text1"><a href="../information/howtopay.php"><img src="../images/icon/icon_forums.gif" width="32" height="32" /></a></td>
              <td align="left" valign="middle" class="text1"><a href="../information/howtopay.php"><?=$tag["#menu_HowToPayReserv#"]["lang_info"] ?></a></td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="text1"><a href="../populardestination/"><img src="../images/icon/icon_forums.gif" width="32" height="32" /></a></td>
              <td align="left" valign="middle" class="text1"><a href="../populardestination/">Popular Destination </a></td>
            </tr>
            


<?




////////////////////////////////////////////////////////////////////////////////////////// level1

$level1_result = $array_property_PlanYourNextBreak["root"];
$level1_count = count($level1_result);

if ($level1_count  > 0 ) {  //// count

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



?>
<?

} /// loop
} /// count

?>
            <tr>
              <td align="right" valign="middle" class="text1"><a href="../service/"><img src="../images/icon/icon_forums.gif" width="32" height="32" /></a></td>
              <td align="left" valign="middle" class="text1"><a href="../service/"><?=$tag["#menu_TravelService#"]["lang_info"] ?></a></td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="text1"><a href="../service/partner.php"><img src="../images/icon/icon_forums.gif" width="32" height="32" /></a></td>
              <td align="left" valign="middle" class="text1"><a href="../service/partner.php"><?=$tag["#menu_BecomeOurPartner#"]["lang_info"] ?></a></td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="text1"><a href="../member/register.php"><img src="../images/icon/icon_forums.gif" width="32" height="32" border="0" /></a></td>
              <td align="left" valign="middle" class="text1"><a href="../member/register.php">Member Register</a></td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="text1"><a href="../member/login.php"><img src="../images/icon/icon_forums.gif" width="32" height="32" border="0" /></a></td>
              <td align="left" valign="middle" class="text1"><a href="../member/login.php">Member Login</a></td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="text1"><a href="../information/aboutus.php"><img src="../images/icon/icon_forums.gif" width="32" height="32" /></a></td>
              <td align="left" valign="middle" class="text1"><a href="../information/aboutus.php"><?=$tag["#menu_aboutus#"]["lang_info"] ?></a></td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="text1"><a href="../contactus/"><img src="../images/icon/icon_forums.gif" width="32" height="32" /></a></td>
              <td align="left" valign="middle" class="text1"><a href="../contactus/">
                <?=$tag["#menu_ContactUs#"]["lang_info"] ?>
              </a></td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="text1"><a href="../information/termsconditions.php"><img src="../images/icon/icon_forums.gif" width="32" height="32" /></a></td>
              <td align="left" valign="middle" class="text1"><a href="../information/termsconditions.php"><?=$tag["#menu_TermsConditions#"]["lang_info"] ?></a></td>
            </tr>
          </table>
          <br />
          <br />
          <br /></td>
          <td width="1" align="center" valign="top" bgcolor="#23CBE0"><img src="../images/span.gif" width="2" height="50" /></td>
        </tr>
      </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="1"><img src="../images/design_agency4/content_m5.gif" width="15" height="15" /></td>
          <td style="background-image: url(../images/design_agency4/content_bg_bt.gif)" ><img src="../images/design_agency4/content_bg_bt.gif" width="15" height="15" /></td>
          <td width="1"><img src="../images/design_agency4/content_m6.gif" width="15" height="15" /></td>
        </tr>
      </table>
      <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table></td>
  </tr>
</table>






<?
} /// if ($config_design_page == "complete" ){
?>