<?

///////////////// content

$lv1_category_id = "cat09090114184600006";
$input_array = array(
"sql_orderby"=>" ORDER BY option_order  ASC " ,
"category_id"=>"$lv1_category_id" , 
"option_highlight"=>"highlight" , 
"option_status"=>"on" , 
);
$content_count_row = $app_content->function_countbyset( $input_array );
$content_result = $app_content->function_viewbyset( $input_array ); /// select ข้อมูล

if ($content_count_row > 0){ 



?>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="1"><img src="../images/design_agency4/boxnew_m1.gif" width="11" height="31" border="0" /></td>
          <td height="31" align="left" valign="middle" class="bot1" style="background-image:url(../images/design_agency4/boxnew_bg.gif);"> <font color="#A03209"><?=$tag["#text_news#"]["lang_info"] ?></font></td>
          <td width="1" align="left" valign="middle" class="bot1" style="background-image:url(../images/design_agency4/boxnew_bg.gif);"><img src="../images/span.gif" width="2" height="31" /></td>
          <td width="100" align="right" valign="middle" class="text1" style="background-image:url(../images/design_agency4/boxnew_bg.gif);">
		  <a href="../news/index.php"><font color="#A03209"><?=$tag["#text_more#"]["lang_info"] ?></font><img src="../images/design_agency4/boxnew_more.gif" width="10" height="12" align="absmiddle" border="0" /></a></td>
          <td width="1"><img src="../images/design_agency4/boxnew_m2.gif" width="11" height="31" border="0" /></td>
        </tr>
      </table>
      

      
      
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="10" style="background-color:#F1DA9B">

<?


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

$content_image_mini_show = ""; 	
////$content_image_mini_show = "<img src=\"../images/design_agency/pic3.jpg\"  width=\"108\" height=\"94\" border=0 />"; 	
if ($content_image_mini != "" ){
$content_image_mini_show = "<img src=\"$path_content$content_image_mini\"   border=0 />"; 	
}

?>
      
      
        <tr>
          <td height="100" align="left" valign="top" style="background-color:#F8F2E4"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color:#F1DA9B">
            <tr>
              <td class="bot1"><font color="#A85719"><?=$content_name ?></font></td>
            </tr>
            <tr>
              <td class="bot1"><img src="../images/span.gif" width="100" height="5" /></td>
            </tr>
          </table>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
              <tr>
              

<?
if ($content_image_mini_show != "" ){ 
?>
                <td width="1" rowspan="2" align="left" valign="top"><table width="100" border="0" align="center" cellpadding="4" cellspacing="1" style="background-color:#E7E2D5;">
                  <tr>
                    <td bgcolor="#FFFFFF"><a href="../information/detail.php?id=<?=$content_id ?>"><?=$content_image_mini_show ?></a></td>
                  </tr>
                </table></td>
<?
} ////
?>
                
                <td align="left" valign="top" class="text2"><a href="../information/detail.php?id=<?=$content_id ?>"><font color="#666666"><?=$content_des ?></font></a></td>
              </tr>
              <tr>
                <td height="1%" align="right" valign="bottom"><a href="../news/detail.php?id=<?=$content_id ?>"><img src="../images/design_agency3/icon_more3.gif" width="53" height="22" border="0" /></a></td>
              </tr>
          </table></td>
        </tr>

 <?

} /// content loop

?>
        
      </table>

<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><img src="../images/span.gif" width="100" height="10" /></td>
</tr>
</table>
<?
} //////////////////// content_count_row

?>