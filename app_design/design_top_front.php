<link href="../app_design/css/style_web.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td style="background-image:url(../images/design_think/top2.gif)"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1" ><img src="../images/design_think/top2.gif" /></td>
        <td style="background-image:url(../images/design_think/top1.gif)"  >
        
        
        <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
          
          
          
              
<?
if ($option_status_lang1 == "on"){ 
?>
  <td width="1" align="center" valign="middle" style="padding:2px;"  ><a href="<?=$langurl?>lang=<?=$language_id_lang1 ?>"><?=$language_icon_lang1 ?></a></td>
  <?
}

if ($option_status_lang2 == "on"){ 
?>
  <td width="1" align="center" valign="middle" style="padding:2px;"   ><a href="<?=$langurl?>lang=<?=$language_id_lang2 ?>"><?=$language_icon_lang2 ?></a></td>
  <?
}

if ($option_status_lang3 == "on"){ 
?>
  <td width="1" align="center" valign="middle" style="padding:2px;"   ><a href="<?=$langurl?>lang=<?=$language_id_lang3 ?>"><?=$language_icon_lang3 ?></a></td>
  <?
}

if ($option_status_lang4 == "on"){ 
?>
  <td width="1" align="center" valign="middle" style="padding:2px;"   ><a href="<?=$langurl?>lang=<?=$language_id_lang4 ?>"><?=$language_icon_lang4 ?></a></td>
  <?
}

if ($option_status_lang5 == "on"){ 
?>
  <td width="1" align="center" valign="middle" style="padding:2px;"  ><a href="<?=$langurl?>lang=<?=$language_id_lang5 ?>"><?=$language_icon_lang5 ?></a></td>
  
  
                
  <?
}

?>

          
          
          
          
          
            <td align="left" valign="middle" class="bot1" style="padding-left:15px;">

<?

$menu_show = ""; 
$menu_by_set_data = $menu_by_set["menu_a"];
$menu_by_set_count = count($menu_by_set_data);
if ($menu_by_set_count > 0 ){
$loop_count = 0 ; 
foreach ($menu_by_set_data as $key1 => $rs1){
$loop_count = $loop_count + 1 ; 

$loop_menu_id = $rs1["menu_id"];
$loop_menu_name = $rs1["menu_name"];
$loop_menu_url = $rs1["menu_url"];
$loop_option_target = $rs1["option_target"];
$loop_menu_id_root = $rs1["menu_id_root"];

$menu_show = $menu_show . "<a href=\"$loop_menu_url\" target=\"_self\"><font color=\"#FFFFFF\">$loop_menu_name </font></a>&nbsp;&nbsp; ";

}///// loop
}///// count

print $menu_show ;

?>
             
              
              
              &nbsp;</td>
            </tr>
        </table>

  
          </td>
      </tr>
  </table></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="20" valign="top" style="background-image:url(../images/design_think/top3.gif)"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top"><img src="../images/design_think/top_dot1.gif" style="padding-left:15px;" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top" style="width:246px;"><a href="../home/"><img src="../images/design_think/logo1.gif" /></a></td>
    <td width="1" align="right" valign="top"><img src="../images/design_think/title3.jpg" width="744" height="150" /></td>
  </tr>
</table>
