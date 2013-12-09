<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 

$access_page_id = "/backoffice/group_update.php";
include("../app_system/include/inc_checklogin_user.php"); 

include("../category/inc_array_category.php"); 



////////////////////////############## PROCESS UPDATE 
if (empty($_REQUEST["group_id"]) )  {  $group_id="";  } else { $group_id=$_REQUEST["group_id"];  }
if (empty($_REQUEST["group_appaction_update"]) )  {  $group_appaction_update="";  } else { $group_appaction_update=$_REQUEST["group_appaction_update"];  }
if (empty( $_REQUEST["show_status"] ) )  {  $show_status = "";  } else { $show_status = $_REQUEST["show_status"]; }



if ($group_appaction_update == "update_information" ){


///////// check request
if (empty($_REQUEST["group_name"]) )  			{  $group_name="";  } else { $group_name=$_REQUEST["group_name"];  }
if (empty($_REQUEST["group_code"]) )  				{  $group_code="";  } else { $group_code=$_REQUEST["group_code"];  }
if (empty($_REQUEST["group_des"]) )  				{  $group_des="";  } else { $group_des=$_REQUEST["group_des"];  }
if (empty($_REQUEST["option_order"]) )  		{  $option_order="";  } else { $option_order=$_REQUEST["option_order"];  }
if (empty($_REQUEST["option_status"]) )  		{  $option_status="";  } else { $option_status=$_REQUEST["option_status"];  }


///////// check input

$show_status = "success";


if ($group_name == "" ) {
$show_status = "error";
$array_report_error[] = "- กรุณากรอกชื่อ Group Name "; 
}

/// print "show_status = $show_status <br>";


if ($show_status == "success" ){ 
if ($option_status == "" ) { $option_status = "off"; }

$input_array = array(
"group_id"=>"$group_id" , 
"group_code"=>"$group_code" , 
"group_name"=>"$group_name" , 
"group_des"=>"$group_des" , 

"option_order"=>"$option_order" , 
"option_status"=>"$option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $system_auth_group->function_update( $input_array );
$show_status = $result_update["show_status"];
$group_id = $result_update["group_id"];


/////////////// update match 
if ($group_id != "" ){


if (empty( $_REQUEST["array_page_id"] ) )  {  $array_page_id = array();  } else { $array_page_id = $_REQUEST["array_page_id"]; }
$count_page_id = count($array_page_id);
if ($count_page_id > 0 ) {  /// count 

$loop_id_start  =  0 ; 
foreach ($array_page_id  as $index => $loop_temp  ){ /// loop 
$loop_id_start ++ ;  
$loop_id = $loop_id_start  - 1 ;  

$get_page_id = $array_page_id["$loop_id"];
$get_match_id = $_REQUEST["match_id_$get_page_id"];
$get_option_status = $_REQUEST["option_status_$get_page_id"];

if ($get_option_status == "" ) { $get_option_status= "off"; }

if ($get_page_id != "" ){ 
$input_array_match = array(
"match_id"=>"$get_match_id" , 
"group_id"=>"$group_id" , 
"page_id"=>"$get_page_id" , 
"option_status"=>"$get_option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $system_auth_match->function_update( $input_array_match );
} /// if ($get_page_id != "" ){ 


} /// loop
} /// count
} //// group_id


/// }////
/////////////// update match  end


} ///if ($process_check_input == "success" ){ 





if ($show_status == "success" ){ 
header("Location:group_update.php?group_id=$group_id&show_status=$show_status"); 
} 


} //// if ($appaction == "update_information") {
////////////////////////############## PROCESS UPDATE  END



////////////////////////############## PROCESS VIEW 
if ($group_id != "" ){ 

$input_array = array(
"group_id"=>"$group_id" , 
);
$rs_group = $system_auth_group->function_viewbyid( $input_array );
if ($rs_group ) {
$group_id = $rs_group["group_id"];
$group_code = $rs_group["group_code"];
$group_name = $rs_group["group_name"];
$group_des = $rs_group["group_des"];
$option_order = $rs_group["option_order"];
$option_status = $rs_group["option_status"];
	
}///rs
} ///if ($id != "" ) { 





////////////////////////############## match
if ($group_id != "" ){ 

$input_array = array(
"group_id"=>"$group_id" ,
);
$match_count = $system_auth_match->function_countbyset( $input_array );
if ($match_count > 0 ){ /// count
$match_result = $system_auth_match->function_viewbyset( $input_array ); /// select ข้อมูล



$level1_count = 0 ;
while($match_rs = $match_result->FetchRow()){ /////// loop 
$level1_count = $level1_count + 1  ;

/// print "loop 1 = $level1_count  <br>";

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

} ///if ($group_id != "" ){ 
////////////////////////############## match end



/*
print "<pre>";
print_r ($array_match);
print "</pre>";
*/




////////////////////////############## PROCESS VIEW  END



























////////////////////////############## PROCESS CONFIG 
$show_pagetitle = "$show_content_pagename "; 

////////////////////////############## PROCESS CONFIG END



if ($group_id=="") {
$option_status= "on";
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Insert / Update  </title>



<link href="../app_design/css/style_backoffice.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>




</head>
<body>
<?

include("../app_design/design_top_system.php"); 
?>




<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7">

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <tr>
    <td height="450" align="left" valign="top">
    
    
    
    
<?


$page_topic_name = "เพิ่ม/แก้ไข กลุ่มดูแลระบบ และกำหนดสิทธิ  "; 
include("../app_system/include/inc_body_system_topic.php");





?>
    
    
    
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">

          <tr>
            <td height="30" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td >&nbsp;</td>
                <td width="300" align="right"><table border="0" cellpadding="0" cellspacing="5">
                  <tr>
                    <td width="60" align="center" valign="top"><a href="group_showall.php"><img src="../images/icon/icon_all.gif" width="164" height="35" hspace="0" /></a></td>
                 
                    
                    
<?
if ($group_id != ""  and  $option_fixed != "fixed" ) { 
?>
<td width="60" align="center" valign="top">
 <a href="group_showall.php?<? print "group_id=$group_id&option_delete=delete&system_id=$system_id" ; ?>"   onclick="return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ?')"  >
 <img src="../images/icon/design_icon_delete.gif" alt="ลบข้อมูลนี้ ..." width="164" height="35" hspace="0" border="0" />
 </a>
 </td>
<?
} /////////category_id
?>
   <td width="60" align="center" valign="top"><a href="group_update.php?system_id=<?=$system_id?>"><img src="../images/icon/design_icon_add.gif" alt="เพิ่ม" width="164" height="35" hspace="0" border="0" /></a></td>
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
          <td height="50" align="left" valign="top" bgcolor="#FFFFFF"  style="padding:3px; background-color:#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF" class="text_normal1">
            <tr>
              <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ลำดับ :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="option_order" type="text" id="option_order" value="<?=$option_order ?>" size="10" /></td>
            </tr>
            <tr>
              <td align="right" valign="middle"  style="padding:5px; background-color:#E5E5E5">Group Name <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input name="group_name" type="text" id="group_name" value="<?=$group_name  ?>" size="80"  style="width:700px;" /></td>
            </tr>
            <tr>
              <td height="50" align="right" valign="top"  style="padding:5px; background-color:#E5E5E5">รายละเอียด :</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"group_des\" cols=\"80\" rows=\"5\" id=\"group_des\"  style=\"width:700px;\">$group_des</textarea>"; 

?></td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">สถานะ :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
  <?

if ($option_status == "on" ) {  $option_checked = "checked"; } else  {  $option_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_status\" id=\"option_status\" value=\"on\"  $option_checked    />ออนไลน์ข้อมูล"; 

?>
  </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">&nbsp;</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" valign="top" bgcolor="#FFCC99"  style="padding:5px; background-color:#FFCC99"><b>กำหนดสิทธิการเข้าถึงระบบ :</b></td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
              
              
              
              
              
              
              

<?


$input_array = array(
"category_id"=>"root" ,
"page_level"=>"1" ,
);
$count_row = $system_auth_page->function_countbyset( $input_array );


if ($count_row == 0 ) { 

?>





      <table width="100%" border="0" cellpadding="0" cellspacing="2" bgcolor="#999999">
        <tr>
          <td height="150" align="center" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#EEEEEE">
          
<span class="text_big2">ยังไม่มีรายการข้อมูล โครงสร้างระบบ ...</span>
          
          
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
          <td  bgcolor="#999999" class="text_normal1" style="padding:2px;width:250px;"  ><b>&nbsp;Page Name</b></td>
          <td align="center" bgcolor="#999999"  class="text_normal1"><b>URL</b></td>
          <td  align="center" bgcolor="#999999"   style="width:100px;" class="text_normal1"><b>เลือก</b></td>
          </tr>
        

<?
///###################################### level 1


$input_array = array(
"category_id"=>"root" ,
"page_level"=>"1" ,
"sql_orderby"=>" order by option_order ASC " ,
);
$level1_result = $system_auth_page->function_viewbyset( $input_array ); /// select ข้อมูล


$count_loop = 0 ;
while($level1_rs = $level1_result->FetchRow()){ /////// loop 
$count_loop = $count_loop + 1  ;


///////////////// set value
$level1_page_id = $level1_rs["page_id"];
$level1_category_id = $level1_rs["category_id"];
$level1_page_name = $level1_rs["page_name"];
$level1_page_url = $level1_rs["page_url"];

$level1_option_show = $level1_rs["option_show"];
$level1_option_order = $level1_rs["option_order"];
///$level1_option_status = $level1_rs["option_status"];

/*
if ($level1_option_status == "on" ) {$option_status_text = "อนุญาติ"; }
if ($level1_option_status == "off" ) {$option_status_text = "<font color=\"#666666\">ไม่อนุญาติ</font>"; }

*/





print " <input type=\"hidden\"  name=\"array_page_id[]\"  id=\"array_page_id[]\" value=\"$level1_page_id\" />";

if ($count_loop > 1){ 
?>

        <tr class="text_normal1">
          <td height="25" align="center" valign="top" bgcolor="#FFFFFF"  style="padding:2px;">&nbsp;</td>
          <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:2px;width:250px;"    >&nbsp;</td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >&nbsp;</td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >&nbsp;</td>
        </tr>
<?
} //// 

?>
        
        <tr class="text_normal1">
          <td height="25" align="center" valign="top" bgcolor="#D1D1D1"  style="padding:2px;"><?=$count_loop ?>.</td>
          <td align="left" valign="top" bgcolor="#D1D1D1"  style="padding:2px;width:250px;"    ><?
print "<input name=\"page_name_$level1_page_id\" type=\"text\" id=\"page_name_$level1_page_id\" style=\"width:250px;\"   value=\"$level1_page_name\"  readonly/>";
?>
           </td>
          <td  align="left" valign="top" bgcolor="#D1D1D1" style="padding:2px;" ><?
print "<input name=\"page_url_$level1_page_id\" type=\"text\" id=\"page_url_$level1_page_id\" style=\"width:98%;\"  value=\"$level1_page_url\"  readonly />";
?></td>
          <td  align="left" valign="top" bgcolor="#D1D1D1" style="padding:2px;" >
            
<?

$level1_match_id = $array_match["$level1_page_id"]["match_id"]; 
$level1_option_status = $array_match["$level1_page_id"]["option_status"]; 

print "<input type=\"hidden\" name=\"match_id_$level1_page_id\" id=\"match_id_$level1_page_id\"   value=\"$level1_match_id\"  />";

if ($level1_option_status == "on" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$level1_page_id\" id=\"option_status_$level1_page_id\"  $option_checked  value=\"on\"  />";

?><font color="#333333"><b>อนุญาติ</b></font></td>
</tr>
<?

///###################################### level 2

$input_array2 = array(
"category_id"=>"$level1_page_id" ,
"page_level"=>"2" ,
"sql_orderby"=>" order by option_order ASC " ,
);
$level2_count = $system_auth_page->function_countbyset( $input_array2 );
if ($level2_count > 0 ) {  //// count
$level2_result = $system_auth_page->function_viewbyset( $input_array2 ); /// select ข้อมูล


$count_loop2 = 0 ;
while($level2_rs = $level2_result->FetchRow()){ /////// loop 
$count_loop2 = $count_loop2 + 1  ;


///////////////// set value
$level2_page_id = $level2_rs["page_id"];
$level2_category_id = $level2_rs["category_id"];
$level2_page_name = $level2_rs["page_name"];
$level2_page_url = $level2_rs["page_url"];

$level2_option_show = $level2_rs["option_show"];
$level2_option_order = $level2_rs["option_order"];
///$level2_option_status = $level2_rs["option_status"];






print " <input type=\"hidden\"  name=\"array_page_id[]\"  id=\"array_page_id[]\" value=\"$level2_page_id\" />";
?>
        
        <tr class="text_normal1">
          <td height="25" align="center" valign="top" bgcolor="#E2E2E2"  style="padding:4px;"><?=$count_loop ?>.<?=$count_loop2?></td>
          <td align="left" valign="top" bgcolor="#E2E2E2"   style="padding:2px;width:250px;"   ><?
print "<input name=\"page_name_$level2_page_id\" type=\"text\" id=\"page_name_$level2_page_id\" style=\"width:250px;\"   value=\"$level2_page_name\" readonly/>";
?></td>
          <td  align="left" valign="top" bgcolor="#E2E2E2" style="padding:2px;" ><?
print "<input name=\"page_url_$level2_page_id\" type=\"text\" id=\"page_url_$level2_page_id\" style=\"width:98%;\"   value=\"$level2_page_url\" readonly/>";
?></td>
          <td  align="left" valign="top" bgcolor="#E2E2E2" style="padding:2px;" >
            
<?

$level2_match_id = $array_match["$level2_page_id"]["match_id"]; 
$level2_option_status = $array_match["$level2_page_id"]["option_status"]; 


print "<input type=\"hidden\" name=\"match_id_$level2_page_id\" id=\"match_id_$level2_page_id\"   value=\"$level2_match_id\"  />";

if ($level2_option_status == "on" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$level2_page_id\" id=\"option_status_$level2_page_id\"  $option_checked  value=\"on\"  />";

?><font color="#333333"><b>อนุญาติ</b></font></td>
          </tr>


<?
///###################################### level 3  loop

$input_array3 = array(
"category_id"=>"$level2_page_id" ,
"page_level"=>"3" ,
"sql_orderby"=>" order by option_order ASC " ,
);
$level3_count = $system_auth_page->function_countbyset( $input_array3 );
if ($level3_count > 0 ) {  //// count
$level3_result = $system_auth_page->function_viewbyset( $input_array3 ); /// select ข้อมูล


$count_loop3 = 0 ;
while($level3_rs = $level3_result->FetchRow()){ /////// loop 
$count_loop3 = $count_loop3 + 1  ;


///////////////// set value
$level3_page_id = $level3_rs["page_id"];
$level3_category_id = $level3_rs["category_id"];
$level3_page_name = $level3_rs["page_name"];
$level3_page_url = $level3_rs["page_url"];

$level3_option_show = $level3_rs["option_show"];
$level3_option_order = $level3_rs["option_order"];





print " <input type=\"hidden\"  name=\"array_page_id[]\"  id=\"array_page_id[]\" value=\"$level3_page_id\" />";
?>
        
        <tr class="text_normal1">
          <td height="25" align="center" valign="top" bgcolor="#FFFFFF"  style="padding:4px;"><?=$count_loop ?>.<?=$count_loop2?>.<?=$count_loop3?></td>
          <td align="left" valign="top" bgcolor="#FFFFFF"   style="padding:2px;width:250px;"   ><?
print "<input name=\"page_name_$level3_page_id\" type=\"text\" id=\"page_name_$level3_page_id\" style=\"width:250px;\"   value=\"$level3_page_name\" readonly />";
?></td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;" ><?
print "<input name=\"page_url_$level3_page_id\" type=\"text\" id=\"page_url_$level3_page_id\" style=\"width:98%;\"   value=\"$level3_page_url\" readonly />";
?></td>
          <td  align="left" valign="top" bgcolor="#FFFFFF" style="padding:2px;" >
            
            <?

if ($level3_option_status == "on" ) { $option_checked = "checked"; }  else { $option_checked = ""; }
print "<input type=\"checkbox\" name=\"option_status_$level3_page_id\" id=\"option_status_$level3_page_id\"  $option_checked  value=\"on\"  />";

?><font color="#333333"><b>อนุญาติ</b></font></td>
          </tr>



<?

} //// loop 3 end
} //// count 3 end

///###################################### level 3 end loop


} //// loop 2 end
} //// count

///###################################### level 2 end


} //// level 1 end loop

?>




      </table>






      
      
      
      
      
<?

} ////////////// end  count leve 1



?>
      
      
      
    
              
              
              
              
              
              
              
              
          </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">&nbsp;</td>
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
  
  
  <input  type="hidden" name="group_appaction_update"  id="group_appaction_update" value="update_information" />
<input type="hidden" name="group_id"  id="group_id" value="<?=$group_id?>" />


</form>
</table>




<?
include("../app_design/design_bottom_system.php");
?>

</body>
</html>