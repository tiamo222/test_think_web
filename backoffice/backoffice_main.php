<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "backoffice_main";
include("../app_system/include/inc_checklogin_user.php"); 

$system_id = "BackOffice";


////////////////////////############## PROCESS CONFIG 


$show_content_pagename = "หน้าหลักระบบจัดการ"; 
$show_content_header = ""; 
$show_content_center = ""; 




/*

///////////////////////// count member
$input_array = array(
"system_id"=>"app_member_myaccount" , 
);
$count_member = $app_member_myaccount->function_countbyset( $input_array );


///////////////////////// count app_property
$input_array = array(
"option_status"=>"on" , 
);
$count_app_property= $app_property->function_countbyset( $input_array );




///////////////////////// count app_bidding
$input_array = array(
"option_status"=>"on" , 
);
$count_app_bidding = $app_bidding->function_countbyset( $input_array );



///////////////////////// count app_shoppingcart
$input_array = array(
"option_status"=>"on" , 
"booking_status"=>"booking_confirm" , 
);
$count_app_booking = $app_booking->function_countbyset( $input_array );

///////////////////////// count Online
*/




if (empty( $_REQUEST["report"] ) )  {  $report = "";  } else { $report = $_REQUEST["report"]; }

//// print "report = $report <br>";

///$show_status = "error"; 
if ($report == "access_deny" ){
$show_status = "error"; 
$show_status_detail = "- คุณไม่ได้สิทธิให้เข้าถึงระบบดังกล่าว ... <br>"; 
} //// show_status



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Backoffice Main ::</title>
</head>

<link href="../app_design/css/style_backoffice.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>


<body>
<?
include("../app_design/design_top_system.php"); 
?>



<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7"><form id="form1" name="form1" method="post" action="">
  <tr>
    <td height="550" align="left" valign="top">
      
      
      
  <?


$page_topic_name = "หน้าหลักระบบ และรายการ Application ทั้งหมด "; 
include("../app_system/include/inc_body_system_topic.php");




/////////// status report
include("../app_system/include/inc_report_status.php");



?>
      
      
      
      <table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="#999999">
        <tr>
          <td height="150" align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#eeeeee"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top">
              
              
              
              
              
              
              
              
              
<?





////////////////////////############## match
if ($session_user_group_id != "" ){

$input_array = array(
"group_id"=>"$session_user_group_id" ,
);
$match_count = $system_auth_match->function_countbyset( $input_array );
if ($match_count > 0 ){ /// count
$match_result = $system_auth_match->function_viewbyset( $input_array ); /// select ข้อมูล



$level1_count = 0 ;
while($match_rs = $match_result->FetchRow()){ /////// loop 
$level1_count = $level1_count + 1  ;

///////////////// set value
$level1_match_id = $match_rs["match_id"];
$level1_page_id = $match_rs["page_id"];
$level1_option_status = $match_rs["option_status"];
///////////// match end

$array_match["$level1_page_id"]["match_id"] = "$level1_match_id"; 
if ($level1_option_status == "" ){ $level1_option_status = "off"; }
$array_match["$level1_page_id"]["option_status"] = "$level1_option_status"; 


} //// loop
} //// count

}/// if ($session_user_group_id != "" ){
////////////////////////############## match end











$input_array = array(
"category_id"=>"root" ,
"page_level"=>"1" ,
);
$level1_count = $system_auth_page->function_countbyset( $input_array );

if ($level1_count > 0 ){ 

$level1_count_td = 3 ; 
if ($level1_count < 2 ){ 
$level1_count_td = $level1_count / 2 ; 
$level1_count_td = floor($level1_count_td);
}


$level1_input_array = array(
"category_id"=>"root" ,
"page_level"=>"1" ,
"option_show"=>"index" ,
"option_status"=>"on" ,
"sql_orderby"=>" order by option_order ASC " ,
);
$level1_result = $system_auth_page->function_viewbyset( $level1_input_array ); /// select ข้อมูล


$level1_loop = 0 ;
while($level1_rs = $level1_result->FetchRow()){ /////// loop 
$level1_loop = $level1_loop + 1  ;


///////////////// set value
$level1_page_id = $level1_rs["page_id"];
$level1_category_id = $level1_rs["category_id"];
$level1_page_name = $level1_rs["page_name"];
$level1_page_url = $level1_rs["page_url"];

$level1_option_show = $level1_rs["option_show"];
$level1_option_order = $level1_rs["option_order"];
$level1_option_status = $level1_rs["option_status"];

$option_status_match = $array_match["$level1_page_id"]["option_status"]; 
if ($option_status_match == "on" ){ 

?>
<table width="100%" border="0" cellpadding="0" cellspacing="5" class="text_normal1">
<tr>
<td colspan="2" align="left" valign="middle" bgcolor="#CCCCCC" style="padding:5px;"><b> <?=$level1_page_name ?></b></td>
</tr>


<?

//// ################################### level 2
$level2_input_array = array(
"category_id"=>"$level1_page_id" ,
"page_level"=>"2" ,
"option_show"=>"index" ,
"option_status"=>"on" ,
"sql_orderby"=>" order by option_order ASC " ,
);

$level2_count = $system_auth_page->function_countbyset( $input_array );

if ($level2_count > 0){ /// count
$level2_result = $system_auth_page->function_viewbyset( $level2_input_array ); /// select ข้อมูล


$level2_loop = 0 ;
while($level2_rs = $level2_result->FetchRow()){ /////// loop 
$level2_loop = $level2_loop + 1  ;

///////////////// set value
$level2_page_id = $level2_rs["page_id"];
$level2_category_id = $level2_rs["category_id"];
$level2_page_name = $level2_rs["page_name"];
$level2_page_url = $level2_rs["page_url"];

$level2_option_show = $level2_rs["option_show"];
$level2_option_order = $level2_rs["option_order"];
$level2_option_status = $level2_rs["option_status"];

$level_show_menu = "<a href=\"..$level2_page_url\">$level2_page_name</a>"; 


$option_status_match = $array_match["$level2_page_id"]["option_status"]; 
if ($option_status_match == "on" ){ 

?>
<tr>
<td width="1%" align="left" valign="middle" style="width:1%;"><a href="..<?=$level2_page_url ?>"><img src="../images/icon/icon_box1.gif" width="36" height="36" /></a></td>
<td align="left" valign="middle"><?=$level_show_menu ?></td>
</tr>
<?

} ///if ($option_status_match == "on" ){ 

} //// loop
} /// count
//// ################################### level 2 end

?>
</table>
<table width="100" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="../images/span.gif" width="300" height="5" /></td>
  </tr>
</table>
<?


if ($level1_loop == $level1_count_td ){
 print "</td><td  valign=\"top\">";	
}

} ///if ($option_status_match == "on" ){  

} /////  loop level 1
} ///if ($count_row > 0 ){ 




?>
                
                
                
                
                
                
                
                
                
                
                
                </td>
              <td width="200" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="5" class="text_normal1">
                <tr>
                  <td align="left" valign="middle" bgcolor="#CCCCCC" style="padding:5px;"><b>Stat Report</b></td>
                  </tr>
                <tr>
                  <td height="25" align="left" valign="middle">มีสมาชิก  <b><?=$count_member?></b> รายการ</td>
                  </tr>
                </table>
                <table width="100" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><img src="../images/span.gif" width="220" height="5" /></td>
                  </tr>
                </table></td>
              <td width="250" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="5" class="text_normal1">
                <tr>
                  <td colspan="2" align="left" valign="middle" bgcolor="#CCCCCC" style="padding:5px;"><b> ข้อมูลผู้ใช้งานระบบ </b></td>
                </tr>
                <tr>
                  <td colspan="2" align="center" valign="top" bgcolor="#FFFFFF" style="padding:5px;">
<?

print "<img src=\"$session_user_picture\" width=\"200\" />";
?>
                    <table width="100" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td><img src="../images/span.gif" width="200" height="5" /></td>
                      </tr>
                    </table>
                    <table width="100%" border="0" cellspacing="0" cellpadding="5">
                      <tr>
                        <td align="left" bgcolor="#E1E1E1">
Welcome<br />
<b><?=$session_user_firstname?> <?=$session_user_lastname?></b>
<br><br>
User Group : <br>
<b><?=$session_user_group_name ?></b>

</td>
                      </tr>
                    </table></td>
                  </tr>
                <tr>
                  <td width="1%" align="left" valign="middle"><a href="../backoffice/update_profile.php"><img src="../images/icon/icon_b_preview.gif" width="36" height="36" /></a></td>
                  <td align="left" valign="middle"><a href="../backoffice/update_profile.php">แก้ไข ข้อมูลผู้ใช้งานระบบ </a></td>
                </tr>
                <tr>
                  <td align="left" valign="middle"><a href="logout.php"><img src="../images/icon/icon_b_preview.gif" width="36" height="36" /></a></td>
                  <td align="left" valign="middle"><a href="logout.php">ออกจากระบบ</a></td>
                </tr>
              </table>
                <table width="100" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><img src="../images/span.gif" width="250" height="5" /></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
      </table></td>
    </tr>
  
  <input type="hidden" name="category_id"  id="category_id" value="<?=$category_id?>" />
<input  type="hidden" name="appaction_showall_directory"  id="appaction_showall_directory" value="update_information" />
<input type="hidden" name="id_pager"  id="id_pager" value="<?=$id_pager?>" />

</form>
</table>




<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>