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








<table width="990" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#FFF">
  <tr>
    <td align="center" valign="top"  style="width:236px;"  ><table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
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
      </table></td>
    <td align="center" valign="top"  ><img src="../images/span.gif" width="10" height="10" /></td>
    <td align="left" valign="top"  ><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td height="20" align="left" valign="middle" class="text_normal2"><font color="#666666"><a href="../home"><font color="#666666">Home </font></a>&gt; <a href="index.php"><font color="#666666">
  <?=$category_name ?>
  </font></a></font></td>
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
<?

/// if ($category_code != "" ){

$category_code = $category_code ;
$this_config_path_index = "";
$this_config_path_detail = "detail.php";
$this_config_set_pager_limit1 = ""; 
$this_config_set_pager_limit2 = ""; 
include("inc_content_viewbycat.php");




if ($content_count_row == 0 ){
?>
      
      
      <table width="100%" border="0" cellpadding="0" cellspacing="1" style="background-color:#029DB3;">
        <tr>
          <td height="350" align="center" valign="middle" bgcolor="#FFFFFF"  class="text_normal1" style="padding:5px;"><font color="#666666"> <b>      Currently Not Have Information ...</b> </font></td>
        </tr>
      </table>
      
      <?
}///if ($content_count_row == 0 ){
?>
      
      
      
      
      
      
      
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