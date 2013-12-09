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








<table width="990" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#FFF"><tr>
<td align="center" valign="top" width="360"  style="width:236px;"  ><table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="../images/span.gif" width="236" height="38" /></td>
  </tr>
</table>
  <?php /// include("../home/inc_recommend_product.php"); ?>
      <br />
  <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><img src="../images/span.gif" width="236" height="10" /></td>
    </tr>
  </table>
  
  
  
  </td>
<td align="center" valign="top" width="10"  ><img src="../images/span.gif" width="10" height="10" /></td>
<td align="left" valign="top"  ><table width="100%" border="0" cellspacing="5" cellpadding="0">
  <tr>
    <td height="20" align="left" valign="middle" class="text_normal2"><font color="#666666"><a href="../home"><font color="#666666">Home </font></a>&gt; <a href="index.php"><font color="#666666">
  <?=$category_name ?>
  </font></a> &gt; Detail ...
      
      
      </font></td>
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
      <td align="left" valign="top" style="background-image:url(../images/design_think/barm3.gif)"><table border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="1"  style="background-image:url(../images/design_think/barm2.gif)"><img src="../images/design_think/barm2.gif" width="2" height="39" /></td>
          <td align="left" valign="top" class="bot1" style="background-image:url(../images/design_think/barm2.gif); padding-left:10px;padding-right:10px; padding-top:8px;"><font color="#FFFFFF"><?=$content_name ?>          </font></td>
          <td width="1" valign="top" style="background-image:url(../images/design_think/barm2.gif)"><img src="../images/design_think/barm1.gif" width="24" height="39" /></td>
          </tr>
        </table></td>
      </tr>
  </table>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="400" align="left" valign="top" bgcolor="#FFFFFF"  style="padding-left:10px; padding-right:10px;" >
        
        
        
        <span class="text_normal1" >
          <?=$content_detail?>
          </span>
        
        
        
        
        
        
        &nbsp;</td>
      </tr>
    </table>
  <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td><img src="../images/span.gif" width="744" height="2" /></td>
      </tr>
  </table></td>
    </tr>
</table>






<?
} /// if ($config_design_page == "complete" ){
?>