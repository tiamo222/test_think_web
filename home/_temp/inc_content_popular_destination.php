<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="../images/span.gif" width="100" height="20" /></td>
      </tr>
    </table>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1"><img src="../images/design_agency3/box2m1.gif" width="56" height="43" /></td>
        <td style="background-image:url(../images/design_agency3/box2bg.gif)">&nbsp;</td>
        <td width="1"><img src="../images/design_agency3/box2m2.gif" width="47" height="43" /></td>
      </tr>
    </table>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1" align="left" valign="top" style="background-image:url(../images/design_agency3/box2h1.gif)"><img src="../images/design_agency3/box2h1.gif" width="3" height="4" /></td>
        <td height="100" align="left" valign="top"  style="background-color:#FBFBFB;"><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="left" valign="top" ><a href="../populardestination" target="_self"><img src="../images/design_agency4/boxpop_text.gif" width="448" height="47" vspace="5" border="0" /></a></td>
          </tr>
        </table>
          <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="1"><img src="../images/design_agency4/boxpop_m1.gif" width="11" height="3" /></td>
              <td style="background-image:url(../images/design_agency4/boxpop_top_bg.gif)"><img src="../images/design_agency4/boxpop_top_bg.gif" width="4" height="3" /></td>
              <td width="1"><img src="../images/design_agency4/boxpop_m2.gif" width="11" height="3" /></td>
            </tr>
          </table>
          <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="1" valign="top" style="background-image:url(../images/design_agency4/boxpop_h1.gif)"><img src="../images/design_agency4/boxpop_h1.gif" width="3" height="6" /></td>
              <td height="100" align="left" valign="top"  style="background-color:#F8F6F4; padding-top:15px; padding-bottom:15px;"><?

///////////////// content

$lv1_category_id = "cat09090709442200020";
$input_array = array(
"sql_orderby"=>" ORDER BY option_order  ASC " ,
"category_id"=>"$lv1_category_id" , 
"option_status"=>"on" , 
"option_highlight"=>"highlight" , 
);
$content_count_row = $app_content->function_countbyset( $input_array );
$content_result = $app_content->function_viewbyset( $input_array ); /// select ข้อมูล

if ($content_count_row > 0){ 

$content_loop = 0 ;
while($content_rs = $content_result->FetchRow()){ /////// loop 
$content_loop = $content_loop + 1  ;

///////////////// set value
$content_id = $content_rs["content_id"];

$content_name = $content_rs["content_name"];
$content_des = $content_rs["content_des"];

if($get_language_key == 2 ){
$content_name = $content_rs["content_name_lang2"];
$content_des = $content_rs["content_des_lang2"];
}

if($get_language_key == 3 ){
$content_name = $content_rs["content_name_lang3"];
$content_des = $content_rs["content_des_lang3"];
}

if($get_language_key == 4 ){
$content_name = $content_rs["content_name_lang4"];
$content_des = $content_rs["content_des_lang4"];
}

if($get_language_key == 5 ){
$content_name = $content_rs["content_name_lang5"];
$content_des = $content_rs["content_des_lang5"];
}


$content_image_mini = $content_rs["content_image_mini"];



$count_content_des = strlen("$content_des");
if ($count_content_des > 250 ) {
$content_des = substr("$content_des", 0, 250 ); 	
$content_des = "$content_des ...";
}


$content_image_mini_show = ""; 	
////$content_image_mini_show = "<img src=\"../images/design_agency/pic3.jpg\"  width=\"108\" height=\"94\" border=0 />"; 	
if ($content_image_mini != "" ){
$content_image_mini_show = "<img src=\"$path_content$content_image_mini\"   border=0  width=\"100\"  height=\"60\" />"; 	
}



if ($content_loop > 1 ){ 
?>
                <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td ><img src="../images/span.gif" width="100" height="5" /></td>
                  </tr>
                  <tr>
                    <td style="background-image:url(../images/design_agency4/linedot_bg.gif)"><img src="../images/design_agency4/linedot_bg.gif" width="76" height="5" /></td>
                  </tr>
                  <tr>
                    <td ><img src="../images/span.gif" width="100" height="5" /></td>
                  </tr>
                </table>
<?
} ///content_loop > 1
?>
                
                
                <table width="100%" border="0" cellspacing="5" cellpadding="0" >
                  <tr>
                    <?
if ($content_image_mini_show != "" ){ 
?>
                    <td width="50" align="center" valign="top" style="padding:2px"><table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" style="background-color:#E7E2D5;">
                      <tr>
                        <td bgcolor="#FFFFFF"><a href="../populardestination/detail.php?id=<?=$content_id ?>"><?=$content_image_mini_show?></a></td>
                      </tr>
                    </table></td>
                    <?
} ////level1_category_image_mini
?>
                    <td align="left" valign="top" class="text2" style="padding-top:5px;"><a href="../populardestination/detail.php?id=<?=$content_id ?>"> <font color="#3F3F3F"> <b>
                      <?=$content_name ?>
                      </b><br />
                      <?=$content_des ?>
                    </font></a></td>
                  </tr>
                </table>
              <?

} /// content loop
} //////////////////// content_count_row

?>&nbsp;</td>
              <td width="1" valign="top" style="background-image:url(../images/design_agency4/boxpop_h1.gif)"><img src="../images/design_agency4/boxpop_h2.gif" width="3" height="6" /></td>
            </tr>
          </table>
          <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="1"><img src="../images/design_agency4/boxpop_m1.gif" width="11" height="3" /></td>
              <td style="background-image:url(../images/design_agency4/boxpop_top_bg.gif)"><img src="../images/design_agency4/boxpop_top_bg.gif" width="4" height="3" /></td>
              <td width="1"><img src="../images/design_agency4/boxpop_m2.gif" width="11" height="3" /></td>
            </tr>
          </table>
          <table width="97%" border="0" align="center" cellpadding="0" cellspacing="5">
            <tr>
              <td height="35" align="right" valign="middle"  class="text2"> <a href="../populardestination/"><font color="#DA3C3C">อ่านต่อ </font><img src="../images/design_agency4/boxpop_more.gif" width="9" height="12" border="0" align="absmiddle" /></a></td>
            </tr>
          </table>
 </td>
        <td width="1" style="background-image:url(../images/design_agency3/box2h2.gif)"><img src="../images/design_agency3/box2h2.gif" width="3" height="6" /></td>
      </tr>
    </table>
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1"><img src="../images/design_agency3/box2m3.gif" width="7" height="3" /></td>
        <td style="background-image:url(../images/design_agency3/box2bgbt.gif)"><img src="../images/design_agency3/box2bgbt.gif" width="2" height="3" /></td>
        <td width="1"><img src="../images/design_agency3/box2m4.gif" width="7" height="3" /></td>
      </tr>
    </table>
    <?

/// include("inc_content_category_show_index.php"); 

?>
    