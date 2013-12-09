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
    <td  align="left" valign="top"   ><table width="100%" border="0" cellspacing="5" cellpadding="0">
      <tr>
        <td height="20" align="left" valign="middle" class="text_normal2"><font color="#666666"><a href="../home"><font color="#666666">Home</font></a> &gt; <a href="../contactus"><font color="#666666">Contact Us</font></a></font></td>
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
              <td align="left" valign="top" class="bot1" style="background-image:url(../images/design_think/barm2.gif); padding-left:10px;padding-right:10px; padding-top:8px;"><font color="#FFFFFF">
                Contact Us
                </font></td>
              <td width="1" valign="top" style="background-image:url(../images/design_think/barm2.gif)"><img src="../images/design_think/barm1.gif" width="24" height="39" /></td>
              </tr>
          </table></td>
        </tr>
      </table>
      <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="5" /></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#029DB3;">
        <form action="" method="post" name="form1" id="form1">
          <tr>
            <td height="700" valign="top" bgcolor="#FFFFFF" style="padding:10px;"><?
if ($show_status == "error" ){ 
include("../app_system/include/inc_report_status.php");
} ///if ($contact_status != "complete" ){ 

if ($show_status == "success" ){ 
?>
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="5" style="background-color:#029DB3;">
                <tr>
                  <td height="100" align="left" valign="top" bgcolor="#EEEEEE"  class="text_normal1" style="padding:10px;">
                    
                    
                    <font color="#333333"> <b>Sent Contact Status :: </b><br />
                      
                    Your Message Has Been Sent ...<br />
                    <br />
                    <b><br />
                    </b></font> <br />
                    
                    
                    </td>
                </tr>
              </table>
              <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><img src="../images/span.gif" width="100" height="10" /></td>
                </tr>
              </table>
              <?
} ////if ($show_status == "success" ){ 


if ($show_status != "success" ){ 
?>
              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="260" valign="top" class="bot1" style="padding-top:25px;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="30" align="right" valign="middle" class="bot1" style="padding-right:20px;"><font color="#333333">Company Address : </font></td>
                      </tr>
                    </table>
                    <table width="100" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><img src="../images/span.gif" width="260" height="10" /></td>
                      </tr>
                    </table></td>
                  <td height="101" align="left" valign="top" class="text1"  style="padding-top:30px; padding-right:50px;"   ><?=$content_detail ?>
                    &nbsp;</td>
                </tr>
              </table>
              <br />
              <br />
              <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="260" align="left" valign="top" class="bot1" style="background-image:url(../images/design_pompome/contact_m1_bg.gif)"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="left" valign="top" style="background-image:url(../images/design_pompome/contact_m11.gif); width:257px; height:314px;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="30" align="right" valign="middle" class="bot1" style="padding-right:20px;"><font color="#333333">Your Name<font color="#FF0000">*</font> : </font></td>
                          </tr>
                        <tr>
                          <td align="right" valign="middle" class="bot1" style="padding-right:20px;"><img src="../images/span.gif" width="100" height="12" /></td>
                          </tr>
                        <tr>
                          <td height="30" align="right" valign="middle" class="bot1" style="padding-right:20px;"><font color="#333333"> Phone <font color="#FF0000">*</font> :</font></td>
                          </tr>
                        <tr>
                          <td align="right" valign="middle" class="bot1" style="padding-right:20px;"><img src="../images/span.gif" width="100" height="10" /></td>
                          </tr>
                        <tr>
                          <td height="30" align="right" valign="middle" class="bot1" style="padding-right:20px;"><font color="#333333">Email <font color="#FF0000">*</font> : </font> </td>
                          </tr>
                        <tr>
                          <td align="right" valign="middle" class="bot1" style="padding-right:20px;"><img src="../images/span.gif" width="100" height="12" /></td>
                          </tr>
                        <tr>
                          <td height="30" align="right" valign="middle" class="bot1" style="padding-right:20px;"><font color="#333333">Contact Subject <font color="#FF0000">*</font> : </font></td>
                          </tr>
                        <tr>
                          <td align="right" valign="middle" class="bot1" style="padding-right:20px;"><img src="../images/span.gif" width="100" height="12" /></td>
                          </tr>
                        <tr>
                          <td height="30" align="right" valign="middle" class="bot1" style="padding-right:20px;"><font color="#333333"> Detail <font color="#FF0000">*</font> : </font></td>
                          </tr>
                        </table>
                        <table width="100" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><img src="../images/span.gif" width="260" height="10" /></td>
                            </tr>
                        </table></td>
                      </tr>
                    </table>
                    <br />
                    <br />
                    <br />
                    <br /></td>
                  <td align="left" valign="top" class="text1"   ><table width="95%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="30" align="left" valign="middle" class="bot1" style="padding-right:20px;"><span style="padding:5px; background-color:#FFFFFF">
                        <input name="contact_name" type="text" id="member_login" value="<?=$contact_name ?>" size="80"  style="width:250px;" />
                        </span></td>
                      </tr>
                    <tr>
                      <td align="left" valign="middle" class="bot1" style="padding-right:20px;"><img src="../images/span.gif" width="100" height="12" /></td>
                      </tr>
                    <tr>
                      <td height="30" align="left" valign="middle" class="bot1" style="padding-right:20px;"><span style="padding:5px; background-color:#FFFFFF">
                        <input name="contact_phone" type="text" id="contact_phone" value="<?=$contact_phone ?>" size="80"  style="width:250px;" />
                        </span></td>
                      </tr>
                    <tr>
                      <td align="left" valign="middle" class="bot1" style="padding-right:20px;"><img src="../images/span.gif" width="100" height="10" /></td>
                      </tr>
                    <tr>
                      <td height="30" align="left" valign="middle" class="bot1" style="padding-right:20px;"><span style="padding:5px; background-color:#FFFFFF">
                        <input name="contact_email" type="text" id="contact_email" value="<?=$contact_email ?>" size="80"  style="width:250px;" />
                        </span></td>
                      </tr>
                    <tr>
                      <td align="left" valign="middle" class="bot1" style="padding-right:20px;"><img src="../images/span.gif" width="100" height="12" /></td>
                      </tr>
                    <tr>
                      <td height="30" align="left" valign="middle" class="bot1" style="padding-right:20px;"><span style="padding:5px; background-color:#FFFFFF">
                        <input name="contact_subject" type="text" id="contact_subject" value="<?=$contact_subject ?>" size="80"  style="width:450px;" />
                        </span></td>
                      </tr>
                    <tr>
                      <td align="left" valign="middle" class="bot1" style="padding-right:20px;"><img src="../images/span.gif" width="100" height="12" /></td>
                      </tr>
                    <tr>
                      <td height="100" align="left" valign="top" class="bot1" style="padding-right:20px;"><span style="padding:5px; background-color:#FFFFFF">
                        <?
print "
<textarea name=\"contact_detail\" cols=\"100\" rows=\"15\" id=\"contact_detail\" style=\"width:450px;\">$contact_detail</textarea>
"; 
?>
                        </span></td>
                      </tr>
                    <tr>
                      <td align="left" valign="top" class="bot1" style="padding-right:20px;"><span class="bot1" style="padding-right:20px;"><img src="../images/span.gif" width="100" height="12" /></span></td>
                      </tr>
                    <tr>
                      <td height="30" align="left" valign="top" class="bot1" style="padding-right:20px;"><span style="padding:5px; background-color:#FFFFFF">
                        <input type="submit" name="button" id="button" value="Sent Contact ... " />
                        <input type="reset" name="button2" id="button2" value="Reset" />
                        <input type="hidden" name="appaction" id="appaction"  value="submit" />
                        </span></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              <?
} /// if ($show_status != "success" ){ 
?>
              
              
            </td>
          </tr>
        </form>
      </table>
      <br />
    <br /></td>







  </tr>
</table>
<?
} /// if ($config_design_page == "complete" ){
?>
