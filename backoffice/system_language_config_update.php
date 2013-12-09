<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/backoffice/system_language_config_update.php";
include("../app_system/include/inc_checklogin_user.php"); 


////////////////////////############## PROCESS UPDATE 

if (empty($_REQUEST["lang_config_id"]) )  {  $lang_config_id="";  } else { $lang_config_id=$_REQUEST["lang_config_id"];  }


if (empty($_REQUEST["language_config_appaction_update"]) )  {  $language_config_appaction_update = "";  } else { $language_config_appaction_update = $_REQUEST["language_config_appaction_update"];  }
if (empty( $_REQUEST["show_status"] ) )  {  $show_status = "";  } else { $show_status = $_REQUEST["show_status"]; }


if ($language_config_appaction_update == "update_information") {
	

///////// check request

if (empty($_REQUEST["lang_config_tag"]) )  				{  $lang_config_tag="";  } else { $lang_config_tag=$_REQUEST["lang_config_tag"];  }

if (empty($_REQUEST["name_lang1"]) )  			{  $name_lang1 = "";  } else { $name_lang1 = $_REQUEST["name_lang1"];  }
if (empty($_REQUEST["name_lang2"]) )  			{  $name_lang2 = "";  } else { $name_lang2 = $_REQUEST["name_lang2"];  }
if (empty($_REQUEST["name_lang3"]) )  			{  $name_lang3 = "";  } else { $name_lang3 = $_REQUEST["name_lang3"];  }
if (empty($_REQUEST["name_lang4"]) )  			{  $name_lang4 = "";  } else { $name_lang4 = $_REQUEST["name_lang4"];  }
if (empty($_REQUEST["name_lang5"]) )  			{  $name_lang5 = "";  } else { $name_lang5 = $_REQUEST["name_lang5"];  }

if (empty($_REQUEST["detail_lang1"]) )  			{  $detail_lang1 = "";  } else { $detail_lang1 = $_REQUEST["detail_lang1"];  }
if (empty($_REQUEST["detail_lang2"]) )  			{  $detail_lang2 = "";  } else { $detail_lang2 = $_REQUEST["detail_lang2"];  }
if (empty($_REQUEST["detail_lang3"]) )  			{  $detail_lang3 = "";  } else { $detail_lang3 = $_REQUEST["detail_lang3"];  }
if (empty($_REQUEST["detail_lang4"]) )  			{  $detail_lang4 = "";  } else { $detail_lang4 = $_REQUEST["detail_lang4"];  }
if (empty($_REQUEST["detail_lang5"]) )  			{  $detail_lang5 = "";  } else { $detail_lang5 = $_REQUEST["detail_lang5"];  }

if (empty($_REQUEST["option_type"]) )  			{  $option_type="";  } 		else { $option_type=$_REQUEST["option_type"];  }
if (empty($_REQUEST["comment"]) )  				{  $comment="";  }			else { $comment=$_REQUEST["comment"];  }
if (empty($_REQUEST["option_order"]) )  		{  $option_order="0";  } 		else { $option_order=$_REQUEST["option_order"];  }
if (empty($_REQUEST["option_status"]) )  		{  $option_status="off";  } 	else { $option_status=$_REQUEST["option_status"];  }



$show_status = "success";


if ($lang_config_tag == "" ) {
$show_status = "error";
$array_report_error[] = "- กรุณากรอก Tag "; 
}



///// config
/// list($category_id_root , $category_level  ) = split("#", $category_id_root_select );



if ($show_status == "success" ){ 


$input_array = array(
"lang_config_id"=>"$lang_config_id" , 
"lang_config_tag"=>"$lang_config_tag" , 

"name_lang1"=>"$name_lang1" , 
"name_lang2"=>"$name_lang2" , 
"name_lang3"=>"$name_lang3" , 
"name_lang4"=>"$name_lang4" , 
"name_lang5"=>"$name_lang5" , 

"detail_lang1"=>"$detail_lang1" , 
"detail_lang2"=>"$detail_lang2" , 
"detail_lang3"=>"$detail_lang3" , 
"detail_lang4"=>"$detail_lang4" , 
"detail_lang5"=>"$detail_lang5" , 

"comment"=>"$comment" , 
"option_type"=>"$option_type" , 
/// "option_order"=>"$option_order" , 
"option_status"=>"$option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $app_language_config->function_update( $input_array );
$show_status = $result_update["show_status"];
$lang_config_id = $result_update["lang_config_id"];

} ///if ($process_check_input == "success" ){ 
/// print "show_status = $show_status ";

if ($show_status == "success" ){ 
header("Location:system_language_config_update.php?lang_config_id=$lang_config_id&show_status=$show_status"); 
} 

} //// if ($appaction == "update_information") {
////////////////////////############## PROCESS UPDATE  END


/*
print "<pre>"; 
print_r ($array_report_error);
print "</pre>"; 
*/


////////////////////////############## PROCESS VIEW 

/// form set
if ($lang_config_id != "" ){ 

$input_array = array(
"lang_config_id"=>"$lang_config_id" , 
);
$rs_config = $app_language_config->function_viewbyid( $input_array );
if ($rs_config ) {
	
$lang_config_id 	 = $rs_config["lang_config_id"];
$lang_config_tag = $rs_config["lang_config_tag"];

$name_lang1 = $rs_config["name_lang1"];
$name_lang2 = $rs_config["name_lang2"];
$name_lang3 = $rs_config["name_lang3"];
$name_lang4 = $rs_config["name_lang4"];
$name_lang5 = $rs_config["name_lang5"];

$detail_lang1 = $rs_config["detail_lang1"];
$detail_lang2 = $rs_config["detail_lang2"];
$detail_lang3 = $rs_config["detail_lang3"];
$detail_lang4 = $rs_config["detail_lang4"];
$detail_lang5 = $rs_config["detail_lang5"];

$comment = $rs_config["comment"];
$option_type = $rs_config["option_type"];
$option_order = $rs_config["option_order"];
$option_status = $rs_config["option_status"];

} /// rs
} /// if ($content_id != "" ) { 


////////////////////////############## PROCESS VIEW  END





////////////////////////############## PROCESS CONFIG 
$show_pagetitle = "$show_content_pagename "; 

////////////////////////############## PROCESS CONFIG END


if ($lang_config_id=="") {
$option_type= "topic";
$option_status= "on";
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Language Config Update</title>
<link href="../app_design/css/style_backoffice.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>


<script type="text/javascript" src="../app_application/system_js/jquery-1.2.6.js"></script>
<script type="text/javascript" src="../app_application/system_js/animatedcollapse.js"></script>

<script type="text/javascript">
animatedcollapse.addDiv('tap_01', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_02', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_03', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_04', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_05', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_06', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_07', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_08', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_09', 'fade=0,speed=300')
animatedcollapse.addDiv('tap_10', 'fade=0,speed=300')
animatedcollapse.init()
</script>

</head>
<body>
<?
include("../app_design/design_top_system.php"); 
?>




<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7"><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <tr>
    <td height="550" align="left" valign="top">
    
    
    
    
<?


$page_topic_name = "เพิ่ม/แก้ไข ภาษาในหน้าต่างๆ "; 
include("../app_system/include/inc_body_system_topic.php");





?>
    
    
    
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">

          <tr>
            <td height="30" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td align="right" ><table border="0" cellpadding="0" cellspacing="5">
                  <tr>
                    <td width="60" align="center" valign="top"><a href="system_language_config.php"><img src="../images/icon/icon_all.gif" width="164" height="35" hspace="0" vspace="0" /></a></td>
                    
                    
<?
if ($content_id != "" and  $option_fixed != "fixed" ) { 
?>
<td width="60" align="center" valign="top"><a href="system_language_config.php?<? print "lang_config_id=$lang_config_id&option_delete=delete" ; ?>"   onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')"  ><img src="../images/icon/design_icon_delete.gif" alt="ลบข้อมูลนี้ ..." width="164" height="35" hspace="0" vspace="0" border="0" /></a>
</td>
                    
<?
} /// if ($content_id != "" ) { 
?>
<td width="60" align="center" valign="top"><a href="system_language_config_update.php"><img src="../images/icon/design_icon_add.gif" alt="เพิ่ม" width="164" height="35" hspace="0" vspace="0" border="0" /></a></td>                    
                    </tr>
                </table></td>
                </tr>
            </table></td>
          </tr>

      </table>
      <table width="100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table>
<?

/////////// status report
include("../app_system/include/inc_report_status.php");


?>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
        <tr>
          <td height="50" align="left" valign="top" bgcolor="#FFFFFF"  style="padding:3px; background-color:#FFFFFF"  class="text1"><table width="100%" border="0" cellpadding="2" cellspacing="2">
            <tr bgcolor="#FFFFFF" class="text_normal1">
              <td align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ประเภทข้อมูล :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

if ($option_type == "topic" or  $option_type == "" ){ $option_checked = "checked"; } else {   $option_checked = ""; }
print "<input  type=\"radio\"  name=\"option_type\" id=\"radio\" value=\"topic\" $option_checked />ข้อความ<br />";

if ($option_type == "detail" ){ $option_checked = "checked"; } else {   $option_checked = ""; }
print "<input  type=\"radio\"  name=\"option_type\" id=\"radio\" value=\"detail\" $option_checked />รายละเอียด<br />";

?></td>
            </tr>
            <tr bgcolor="#FFFFFF" class="text_normal1">
              <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">Tag <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="lang_config_tag" type="text" id="lang_config_tag" value="<?=$lang_config_tag ?>" size="10" style="width:250px;" />
                รูปแบบ #tag_name#</td>
            </tr>
            <tr bgcolor="#FFFFFF" class="text_normal1">
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">Comment :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
              <input name="comment" type="text" id="comment" style="width:700px;" value="<?=$comment ?>" size="80" /></td>
            </tr>
          </table>


<br /><b>      
<?

$option_status_lang1 = $array_language_bykey["1"]["option_status"];
$language_name_lang1 = $array_language_bykey["1"]["language_name"];
$language_icon_lang1 = $array_language_bykey["1"]["language_icon"];


$option_status_lang2 = $array_language_bykey["2"]["option_status"];
$language_name_lang2 = $array_language_bykey["2"]["language_name"];
$language_icon_lang2 = $array_language_bykey["2"]["language_icon"];


$option_status_lang2 = $array_language_bykey["2"]["option_status"];
$language_name_lang2 = $array_language_bykey["2"]["language_name"];
$language_icon_lang2 = $array_language_bykey["2"]["language_icon"];


$option_status_lang3 = $array_language_bykey["3"]["option_status"];
$language_name_lang3 = $array_language_bykey["3"]["language_name"];
$language_icon_lang3 = $array_language_bykey["3"]["language_icon"];


$option_status_lang4 = $array_language_bykey["4"]["option_status"];
$language_name_lang4 = $array_language_bykey["4"]["language_name"];
$language_icon_lang4 = $array_language_bykey["4"]["language_icon"];


$option_status_lang5 = $array_language_bykey["5"]["option_status"];
$language_name_lang5 = $array_language_bykey["5"]["language_name"];
$language_icon_lang5 = $array_language_bykey["5"]["language_icon"];





print "
<a href=\"javascript:animatedcollapse.show('tap_01');javascript:animatedcollapse.hide([ 'tap_02',  'tap_03', 'tap_04', 'tap_05' ]);\">$language_icon_lang1 ภาษา $language_name_lang1</a>
";


if ($option_status_lang2 == "on" ){
print "
 | <a href=\"javascript:animatedcollapse.show('tap_02');javascript:animatedcollapse.hide([ 'tap_01',  'tap_03', 'tap_04', 'tap_05' ]);\">$language_icon_lang2 ภาษา $language_name_lang2</a>
";
} ///option_status_lang2


if ($option_status_lang3 == "on" ){
print "
 | <a href=\"javascript:animatedcollapse.show('tap_03');javascript:animatedcollapse.hide([ 'tap_01',  'tap_02', 'tap_04', 'tap_05' ]);\">$language_icon_lang3 ภาษา $language_name_lang3</a>
";
} ///option_status_lang3


if ($option_status_lang4 == "on" ){
print "
 | <a href=\"javascript:animatedcollapse.show('tap_04');javascript:animatedcollapse.hide([ 'tap_01',  'tap_02', 'tap_03', 'tap_05' ]);\">$language_icon_lang4 ภาษา $language_name_lang4</a>
";
} ///option_status_lang4


if ($option_status_lang5 == "on" ){
print "
 | <a href=\"javascript:animatedcollapse.show('tap_05');javascript:animatedcollapse.hide([ 'tap_01',  'tap_02', 'tap_03', 'tap_04' ]);\">$language_icon_lang5 ภาษา $language_name_lang5</a> 
";
} ///option_status_lang4




?>


</b><br /><br />




<?
print "<div id=\"tap_01\" style=\"width:100%; background:#FFFFFF;\">" ; 
?>
            <table width="100%" border="0" cellpadding="4" cellspacing="2" style="background-color:#09C" class="text1">
              <tr>
                <td><?=$language_icon_lang1 ?> <font color="#FFFFFF"><b>ข้อมูล ภาษา <?=$language_name_lang1 ?></b></font></td>
                </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:0px;"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="text1">
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ข้อความ :</td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="name_lang1" type="text" id="name_lang1" value="<?=$name_lang1 ?>" size="80"  style="width:700px;" /></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="50" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียด :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"detail_lang1\" cols=\"80\" rows=\"5\" id=\"detail_lang1\"  style=\"width:700px;\">$detail_lang1</textarea>"; 

?></td>
                  </tr>
                </table></td>
                </tr>
            </table>
            <br />
<?

print "</div>" ;
print "<div id=\"tap_02\" style=\"width:100%; background: #FFFFFF;display:none;\">" ; 

?>
            
            <table width="100%" border="0" cellpadding="4" cellspacing="2" style="background-color:#CC0000" class="text1">
              <tr>
                <td><?=$language_icon_lang2 ?> <font color="#FFFFFF"><b>ข้อมูล ภาษา <?=$language_name_lang2 ?></b></font></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:0px;"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="text1">
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ข้อความ :</td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="name_lang2" type="text" id="name_lang2" value="<?=$name_lang2 ?>" size="80"  style="width:700px;" /></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="50" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียด :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"detail_lang2\" cols=\"80\" rows=\"5\" id=\"detail_lang2\"  style=\"width:700px;\">$detail_lang2</textarea>"; 

?></td>
                  </tr>
                  </table></td>
              </tr>
            </table>
            <br />

<?

print "</div>" ;
print "<div id=\"tap_03\" style=\"width:100%; background: #FFFFFF;display:none;\">" ; 

?>
            
            <table width="100%" border="0" cellpadding="4" cellspacing="2" style="background-color:#009900" class="text1">
              <tr>
                <td><?=$language_icon_lang3 ?> <font color="#FFFFFF"><b>ข้อมูล ภาษา <?=$language_name_lang3 ?></b></font></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:0px;"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="text1">
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ข้อความ :</td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="name_lang3" type="text" id="name_lang3" value="<?=$name_lang3 ?>" size="80"  style="width:700px;" /></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="50" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียด :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"detail_lang3\" cols=\"80\" rows=\"5\" id=\"detail_lang3\"  style=\"width:700px;\">$detail_lang3</textarea>"; 

?></td>
                  </tr>
                  </table></td>
              </tr>
            </table>
            <br />
<?

print "</div>" ;
print "<div id=\"tap_04\" style=\"width:100%; background: #FFFFFF;display:none;\">" ; 

?>
            
            <table width="100%" border="0" cellpadding="4" cellspacing="2" style="background-color:#FF0099" class="text1">
              <tr>
                <td><?=$language_icon_lang4 ?> <font color="#FFFFFF"><b>ข้อมูล ภาษา <?=$language_name_lang4 ?></b></font></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:0px;"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="text1">
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ข้อความ :</td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="name_lang4" type="text" id="name_lang4" value="<?=$name_lang4 ?>" size="80"  style="width:700px;" /></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="50" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียด :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"detail_lang4\" cols=\"80\" rows=\"5\" id=\"detail_lang4\"  style=\"width:700px;\">$detail_lang4</textarea>"; 

?></td>
                  </tr>
                  </table>
                  <br /></td>
              </tr>
            </table>
            <br />
            
<?

print "</div>" ;
print "<div id=\"tap_05\" style=\"width:100%; background: #FFFFFF;display:none;\">" ; 

?>
            
            <table width="100%" border="0" cellpadding="4" cellspacing="2" style="background-color:#663399" class="text1">
              <tr>
                <td><?=$language_icon_lang5 ?> <font color="#FFFFFF"><b>ข้อมูล ภาษา <?=$language_name_lang5 ?></b></font></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF" style="padding:0px;"><table width="100%" border="0" cellpadding="2" cellspacing="2" class="text1">
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ข้อความ :</td>
                    <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="name_lang5" type="text" id="name_lang5" value="<?=$name_lang1 ?>" size="80"  style="width:700px;" /></td>
                  </tr>
                  <tr bgcolor="#FFFFFF" class="text_normal1">
                    <td height="50" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">รายละเอียด :</td>
                    <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"detail_lang5\" cols=\"80\" rows=\"5\" id=\"detail_lang5\"  style=\"width:700px;\">$detail_lang5</textarea>"; 

?></td>
                  </tr>
                  </table></td>
              </tr>
            </table>
            
<?

print "</div>" ;


?>
            
            
            
            <table width="100%" border="0" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF" class="text_normal1">
            <tr>
              <td width="200" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">สถานะ :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
                <?

if ($option_status == "on" ) {  $option_status_checked = "checked"; } else  {  $option_status_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_status\" id=\"option_status\" value=\"on\"  $option_status_checked    />ออนไลน์ข้อมูล (Online)<br>"; 

?>
                </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">&nbsp;</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input type="image" name="imageField" id="imageField" src="../images/icon/design_icon_save.gif" /></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table>
      </td>
  </tr>
  
<input  type="hidden" name="language_config_appaction_update"  id="language_config_appaction_update" value="update_information" />
<input type="hidden" name="lang_config_id"  id="lang_config_id" value="<?=$lang_config_id?>" />

</form>
</table>


<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>