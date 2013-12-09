<table width="318" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1"><img src="../images/design_agency4/boxsc_m1.gif" width="4" height="4" /></td>
    <td style="background-image:url(../images/design_agency4/boxsc_top1.gif)"><img src="../images/design_agency4/boxsc_top1.gif" width="5" height="4" /></td>
    <td width="1"><img src="../images/design_agency4/boxsc_m2.gif" width="4" height="4" /></td>
  </tr>
</table>

  <table width="318" border="0" align="center" cellpadding="0" cellspacing="0"><form id="form1" name="form1" method="post" action="">
    <tr>
      <td width="1" bgcolor="#C0EDF3"><img src="../images/span.gif" width="2" height="10" /></td>
      <td align="left" valign="top" bgcolor="#26CADF" style="padding:0px;"><table width="100" border="0" align="center" cellpadding="0" cellspacing="5">
        <tr>
          <td align="left" valign="middle" ><input name="keyword" type="text" class="text1" id="keyword" style="width:210px;height:18px; padding-left:5px;" value="<?=$keyword ?>" /></td>
          <td width="1" ><input type="image" name="imageField" id="imageField" src="../images/design_agency4/boxsc_bot.gif" /></td>
          </tr>
        <tr>
          <td class="text1" >
<?

if ($search_type == "property"  ) { $option_checked = "checked"; } else  { $option_checked = ""; }
print "<input  type=\"radio\" name=\"search_type\"  id=\"search_type\" value=\"property\"  $option_checked  /> Holiday Home ";

if ($search_type == "information" ) { $option_checked = "checked"; } else  { $option_checked = ""; }
print "<input  type=\"radio\" name=\"search_type\"  id=\"search_type\" value=\"information\"  $option_checked  /> Information ";

?>

            <input name="appaction_search" type="hidden" id="appaction_search" value="search" /></td>
          <td class="text1" style="padding-left:5px;">&nbsp;</td>
          </tr>
      </table>        </td>
      <td width="1" bgcolor="#C0EDF3"><img src="../images/span.gif" width="2" height="10" /></td>
    </tr></form>
  </table>

<table width="318" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1"><img src="../images/design_agency4/boxsc_m3.gif" width="4" height="4" /></td>
    <td style="background-image:url(../images/design_agency4/boxsc_bt.gif)"><img src="../images/design_agency4/boxsc_bt.gif" width="5" height="4" /></td>
    <td width="1"><img src="../images/design_agency4/boxsc_m4.gif" width="4" height="4" /></td>
  </tr>
</table>
