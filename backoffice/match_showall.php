<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 
include("../app_system/include/inc_checklogin_user.php"); 




$system_id = "system_user";

if (empty( $_REQUEST["user_id"] ) )  {  $user_id = "";  } else { $user_id = $_REQUEST["user_id"]; }
if (empty( $_REQUEST["category_id"] ) )  {  $category_id = "";  } else { $category_id = $_REQUEST["category_id"]; }
if (empty( $_REQUEST["option_delete"] ) )  {  $option_delete = "none";  } else { $option_delete = $_REQUEST["option_delete"]; }


if (empty($_REQUEST["user_appaction_showall"]) )  {  $user_appaction_showall="";  } else { $user_appaction_showall=$_REQUEST["user_appaction_showall"];  }
if (empty( $_REQUEST["show_status"] ) )  {  $show_status = "";  } else { $show_status = $_REQUEST["show_status"]; }



////////////////////////############## PROCESS UPDATE 

//// delete
if ($option_delete == "delete"  and   $user_id != "" ) {

$input_array = array(
"user_id"=>"$user_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $system_user->function_delete( $input_array );
$show_status = $result_delete["show_status"];

header("Location:system_user_showall.php?system_id=$system_id&id_pager=$id_pager&show_status=success"); 

}
//// delete end




//// update information
if ($user_appaction_showall == "update_information") {
if (empty( $_REQUEST["array_user_id"] ) )  {  $array_user_id = array();  } else { $array_user_id = $_REQUEST["array_user_id"]; }

$count_user_id = count($array_user_id);
if ($count_user_id > 0 ) {  /// count 

$loop_id_start  =  0 ; 
foreach ($array_user_id as $index => $loop_temp  ){ /// loop category
$loop_id_start ++ ;  
$loop_id = $loop_id_start  - 1 ;  

$get_user_id = $array_user_id["$loop_id"];


$get_option_confirm = $_REQUEST["option_confirm_$get_user_id"];
$get_option_approve = $_REQUEST["option_approve_$get_user_id"];
$get_option_status = $_REQUEST["option_status_$get_user_id"];
$get_option_delete = $_REQUEST["option_delete_$get_user_id"];


if ($get_option_confirm == "" ) { $get_option_confirm= "none"; }
if ($get_option_approve == "" ) { $get_option_approve= "none"; }
if ($get_option_status == "" ) { $get_option_status= "off"; }


//// print "get_option_recommend = $get_option_recommend <br>";



if ($get_user_id != "" ) { 
$input_array = array(
"user_id"=>"$get_user_id" , 
"option_confirm"=>"$get_option_confirm" , 
"option_approve"=>"$get_option_approve" , 
"option_status"=>"$get_option_status" , 
"datetime_now"=>"$datetime_now" , 
);


/*
print "<pre>"; 
print_r ($input_array);
print "</pre>"; 
*/


$result_update = $system_user->function_update_option( $input_array );
} //// get_category_id




////////////// get_option_delete
if ($get_option_delete=="delete"){ 

$input_array = array(
"content_id"=>"$get_content_id" , 
"datetime_now"=>"$datetime_now" , 
);
$result_delete = $system_user->function_delete( $input_array );
///$show_status = $result_delete["show_status"];


} //// delete



} //// loop
} //// count

header("Location:system_user_showall.php?category_id=$category_id&id_pager=$id_pager&show_status=success"); 

}/////////
//// update information end





////////////////////////############## PROCESS VIEW 
////////// config by process







////////////////////////############## PROCESS CONFIG 


$show_content_pagename = "˹ѡкѴ"; 
$show_content_header = ""; 
$show_content_center = ""; 




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>System User  Showall</title>
</head>


<link href="../app_design/css/style_web.css" rel="stylesheet" type="text/css" />

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




<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7">

<form id="form1" name="form1" method="post" action="">
  <tr>
    <td height="550" align="left" valign="top">
    

<?


$page_topic_name = "ʴ¡â Administrator   "; 
include("../app_system/include/inc_body_system_topic.php");







?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF" ><table border="0" cellpadding="0" cellspacing="5">
      <tr>
        <td width="164" align="center" valign="top"><a href="system_user_showall.php?category_id=<?=$category_id?>"><img src="../images/icon/icon_all.gif" width="164" height="35" hspace="0" vspace="0" /></a></td>
        <td width="164" align="center" valign="top"><input name="imageField" type="image" id="imageField" src="../images/icon/design_icon_save.gif" alt="ѹ֡..."  onclick="return confirm('س׹ѹúѹ֡ ... ')"  /></td>
        <td width="60" align="center" valign="top" style=""><a href="system_user_update.php?category_id=<?=$category_id?>"><img src="../images/icon/design_icon_add.gif" alt="" width="164" height="35" border="0" /></a></td>
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


//// $show_status = "success"; 
include("../app_system/include/inc_report_status.php");

?>
      
      
      
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#999999">
        <tr>
          <td height="50" align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#EEEEEE"><table border="0" cellpadding="0" cellspacing="2">
            <tr>
              <td width="145" align="right">&nbsp;</td>
              <td><span class="text_normal1"><b>Ҫԡ</b></span></td>
              <td><span class="text_normal1">Ҫԡ ,  , login , ὧ</span></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td align="right"><span class="text_normal1">ҢŨҡ :</span></td>
              <td><select name="select" id="select">
                <option>͡Ҫԡ ......</option>
              </select></td>
              <td><input name="textfield7" type="text" id="textfield3" size="45" /></td>
              <td><span class="text_normal1">
                <input type="submit" name="button6" id="button5" value="Ң ..." />
              </span></td>
              <td><span class="text_normal1">
                <input type="submit" name="button5" id="button6" value="¡ԡ ..." />
              </span></td>
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


$input_array = array(
"category_id"=>"$category_id" ,
);
$user_count_row = $system_user->function_countbyset( $input_array );



if ($user_count_row == 0 ) { 

?>





      <table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="#999999">
        <tr>
          <td height="150" align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#EEEEEE">
          
<span class="text_big2">ѧ¡â ...</span>
          
          
          </td>
        </tr>
      </table>
      <table width="100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table>

<?

} else { ///////if ($main_count_row == 0 ) { 

?>
      
      
      <table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#333333">
        <tr>
          <td  height="27" align="center" bgcolor="#999999" style="width:50px;"  class="text_normal1"><b>#</b></td>
          <td width="60" align="center" bgcolor="#999999" style="width:60px;" class="text_normal1"  ><b>ٻҾ</b></td>
          <td  bgcolor="#999999" class="text_normal1" ><b>&nbsp;Ҫԡ</b></td>
          <td width="300" align="center" bgcolor="#999999"   style="width:300px;" class="text_normal1"><b>user Option</b></td>
          <td width="50" align="center" bgcolor="#999999"   style="width:50px;" class="text_normal1"><b>Դ</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"><b></b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1"><b>ź</b></td>
          <td width="50" align="center" bgcolor="#999999" style="width:50px;" class="text_normal1" ><b>ź</b></td>
          </tr>
        

<?




///////////////////////////////////////////////////////////////////////////// pager
$set_pager_limit = 10 ; //// ӹǹ˹
$set_pager_start =  0 ; //// 鹷 id ӴѺ

$set_pager_count_data = $user_count_row ; /// edit
$set_pager_total  =  ( $set_pager_count_data /  $set_pager_limit ); 
$set_pager_total = ceil($set_pager_total); 

if ($id_pager == ""  or $id_pager == 0  ) { $id_pager = 1 ;  } /// lower
if ($id_pager > $set_pager_total   ) { $id_pager = $set_pager_total ;  } /// heigher

if ($id_pager > 1 ) {
$number_n = $id_pager - 1 ; 
$set_pager_start =  $set_pager_limit * $number_n  ; 
}

$set_pager_url = "system_user_showall.php?category_id=$category_id&" ;
/// $set_pager_value = "category_id=$category_id&" ;  
///////////////////////////////////////////////////////////////////////////// pager end


$input_array = array(
"set_pager_limit"=>"$set_pager_limit" , 
"set_pager_start"=>"$set_pager_start" , 

"category_id"=>"$category_id" ,
);
$user_rs = $system_user->function_viewbyset( $input_array ); /// select 


$count_loop = 0 ;
while($rs = $user_rs->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;

/*
//// row style 1
if ($id_pager > 0 ) { 
$count_row_number = $lv1_count_loop ; /// edit
$show_number = $set_pager_count_data - ( $set_pager_start + $count_row_number )  ; 
$show_number = $show_number + 1 ; 
}
*/


if ($id_pager > 0 ) { 
$count_row_number = $count_loop ; /// edit
$show_number =  ( $set_pager_start + $count_row_number ) - 1  ; 
$show_number = $show_number + 1 ; 
}


///////////////// set value
$user_id = $rs["user_id"];
$user_group_id = $rs["user_group_id"];
$user_login = $rs["user_login"];
$user_email = $rs["user_email"];
$user_mobile = $rs["user_mobile"];

$user_firstname = $rs["user_firstname"];
$user_lastname = $rs["user_lastname"];
$user_nickname = $rs["user_nickname"];
$user_displayname = $rs["user_displayname"];
$user_picture = $rs["user_picture"];

$option_confirm = $rs["option_confirm"];
$option_approve = $rs["option_approve"];
$option_status = $rs["option_status"];


if ($option_status == "on" ) {$option_status_text = "͹Ź"; }
if ($option_status == "off" ) {$option_status_text = "ͿŹ"; }



if ($user_picture != "" ) { 
$show_user_picture = "<img src=\"$path_system_user$user_picture\"  border=0  width=\"60\" >"; 
} else {
$show_user_picture = "<img src=\"$config_picture_member\" width=\"60\"  /><br><br>"; 
}




print " <input type=\"hidden\"  name=\"array_user_id[]\"  id=\"array_user_id[]\" value=\"$user_id\" />";
?>
        
        <tr class="text_normal1">
          <td height="30" align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?=$show_number ?>.</td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:0px; width:60px;"><?=$show_user_picture ?></td>
          <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"  >
           
            
<?
print "
ID : $user_id <br>
-ʡ : <b>$user_firstname &nbsp;$user_lastname  $user_nickname</b><br>
ὧ : <b>$user_displayname</b><br />
Email : <b>$user_email </b><br />
";

?>

            
          </td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;width:300px;" >

<?

if ($option_confirm == "confirm" ) { $option_confirm_checked = "checked"; }  else { $option_confirm_checked = ""; }
print "<input  type=\"checkbox\" name=\"option_confirm_$user_id\" id=\"option_confirm_$user_id\"   $option_confirm_checked    value=\"confirm\"  />
ʶҹ׹ѹǵͧҪԡ (User Confirm)<br>
";


if ($option_approve == "approve" ) { $option_approve_checked = "checked"; }  else { $option_approve_checked = ""; }
print "<input type=\"checkbox\" name=\"option_approve_$user_id\" id=\"option_approve_$user_id\"  $option_approve_checked     value=\"approve\"  />
׹ѹ͹ѵ  Admin <br>";



if ($option_status == "on" ) { $option_status_checked = "checked"; }  else { $option_status_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$user_id\" id=\"option_status_$user_id\"  $option_status_checked  value=\"on\"  />";

?>
            
            <font color="#009900"><b><?=$option_status_text ?>
              
            </b></font></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><img src="../images/icon/icon_mini_preview.gif" width="25" height="25" /></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><a href="system_user_update.php?<? print "user_id=$user_id"; ?>"><img src="../images/icon/icon_mini_update.gif" width="25" height="25" /></a></td>
          <td  align="center" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >
            
            

  <a href="system_user_showall.php?<? print "user_id=$user_id&option_delete=delete&category_id=$category_id" ; ?>"   onclick="return confirm('سͧź ?')"  ><img src="../images/icon/icon_mini_delete.gif" width="25" height="25" border="0"  /></a>
            
</td>
          <td align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?

print "<input  type=\"checkbox\" name=\"option_delete_$content_id\" id=\"option_delete_$user_id\" value=\"delete\" />";

?></td>
          </tr>
        
<?


/////////////////////// level 1 end loop
} //////////// loop end
?>

      </table>
      <table width="100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table>



<?

if ($set_pager_total > 1 ){ 
include("../app_system/include/inc_pager.php");
}
?>


      <table width="100" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="7" /></td>
        </tr>
      </table>
      
      
      
      
<?

} ////////////// end 



?>
      
      
      
    </td>
  </tr>
  
<input type="hidden" name="category_id"  id="category_id" value="<?=$category_id?>" />
<input  type="hidden" name="user_appaction_showall"  id="user_appaction_showall" value="update_information" />
<input type="hidden" name="id_pager"  id="id_pager" value="<?=$id_pager?>" />
</form>
</table>




<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>