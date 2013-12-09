<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 
include("../app_system/include/inc_checklogin_user.php"); 

$system_id = "app_contactus";

////////////////////////############## PROCESS UPDATE 

if (empty($_REQUEST["calendar_id"]) )  		{  $calendar_id="";  } else { $calendar_id=$_REQUEST["calendar_id"];  }
if (empty($_REQUEST["category_id"]) ) 		{  $category_id="";  } else { $category_id=$_REQUEST["category_id"];  }


if (empty($_REQUEST["contactus_appaction_update"]) )  {  $contactus_appaction_update="";  } else { $contactus_appaction_update=$_REQUEST["contactus_appaction_update"];  }
if (empty( $_REQUEST["show_status"] ) )  {  $show_status = "";  } else { $show_status = $_REQUEST["show_status"]; }

if ($contactus_appaction_update == "update_information") {
	


///////// check request

if (empty($_REQUEST["calendar_type"]) )  					{  $calendar_type="";  } else { $calendar_type=$_REQUEST["calendar_type"];  }
if (empty($_REQUEST["calendar_topic"]) )  					{  $calendar_topic="";  } else { $calendar_topic=$_REQUEST["calendar_topic"];  }
if (empty($_REQUEST["calendar_des"]) )  					{  $calendar_des="";  } else { $calendar_des=$_REQUEST["calendar_des"];  }
if (empty($_REQUEST["calendar_detail"]) )  					{  $calendar_detail="";  } else { $calendar_detail=$_REQUEST["calendar_detail"];  }

if (empty($_REQUEST["date_start"]) )  						{  $date_start="";  } else { $date_start=$_REQUEST["date_start"];  }
if (empty($_REQUEST["date_end"]) )  							{  $date_end="";  } else { $date_end=$_REQUEST["date_end"];  }

if (empty($_REQUEST["time_start_h"]) )  						{  $time_start_h="";  } else { $time_start_h=$_REQUEST["time_start_h"];  }
if (empty($_REQUEST["time_start_m"]) )  					{  $time_start_m="";  } else { $time_start_m=$_REQUEST["time_start_m"];  }
if (empty($_REQUEST["time_end_h"]) )  						{  $time_end_h="";  } else { $time_end_h=$_REQUEST["time_end_h"];  }
if (empty($_REQUEST["time_end_m"]) )  						{  $time_end_m="";  } else { $time_end_m=$_REQUEST["time_end_m"];  }

if (empty($_REQUEST["option_confirm_email"]) )  		{  $option_confirm_email="0";  } else { $option_confirm_email=$_REQUEST["option_confirm_email"];  }
if (empty($_REQUEST["option_reply"]) )  						{  $option_reply="none";  } else { $option_reply=$_REQUEST["option_reply"];  }
if (empty($_REQUEST["option_recommend"]) )  			{  $option_recommend="none";  } else { $option_recommend=$_REQUEST["option_recommend"];  }
if (empty($_REQUEST["option_approve"]) )  					{  $option_approve="none";  } else { $option_approve=$_REQUEST["option_approve"];  }
if (empty($_REQUEST["option_status"]) )  					{  $option_status="off";  } else { $option_status=$_REQUEST["option_status"];  }




if ( $date_start != "" ) {  
$get_day = substr($date_start,"0","2");	
$get_month=substr($date_start,"3","2");		
$get_year=substr($date_start,"6","4");
$get_year = $get_year - 543 ; 
$date_start = "$get_year-$get_month-$get_day" ; 
/// $datetime_action = "$datetime_action_date $datetime_action_time_h:$datetime_action_time_m:00" ;
} 

if ( $date_end != "" ) {  
$get_day = substr($date_end,"0","2");	
$get_month=substr($date_end,"3","2");		
$get_year=substr($date_end,"6","4");
$get_year = $get_year - 543 ; 
$date_end = "$get_year-$get_month-$get_day" ; 
/// $datetime_action_end = "$datetime_action_end_date $datetime_action_end_time_h:$datetime_action_end_time_m:00" ;
} 

$time_start = "$time_start_h:$time_start_m:00" ;
$time_end = "$time_end_h:$time_end_m:00" ;




$show_status = "success";


if ($category_id == "none" ) {
$show_status = "error";
$array_report_error[] = "- س͡ Ǵ   "; 
}

if ($calendar_topic == "" ) {
$show_status = "error";
$array_report_error[] = "- سҡ͡ ͧ/Ǣ   "; 
}


if ($show_status == "success" ){ 


$input_array = array(
"calendar_id"=>"$calendar_id" , 
"category_id"=>"$category_id" , 
"calendar_type"=>"$calendar_type" , 

"calendar_topic"=>"$calendar_topic" , 
"calendar_des"=>"$calendar_des" , 
"calendar_detail"=>"$calendar_detail" , 
"calendar_image_mini"=>"$calendar_image_mini" , 

"date_start"=>"$date_start" ,
"date_end"=>"$date_end" ,
"time_start"=>"$time_start" ,
"time_end"=>"$time_end" ,


"option_confirm_email"=>"$option_confirm_email" , 
"option_reply"=>"$option_reply" , 
"option_recommend"=>"$option_recommend" , 
"option_approve"=>"$option_approve" , 
"option_status"=>"$option_status" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $app_calendar->function_update( $input_array );
$show_status = $result_update["show_status"];
$calendar_id = $result_update["calendar_id"];

} ///if ($process_check_input == "success" ){ 

/// print "show_status = $show_status ";

if ($show_status == "success" ){ 
header("Location:calendar_update.php?calendar_id=$calendar_id&show_status=$show_status"); 
} 

} //// if ($appaction == "update_information") {
////////////////////////############## PROCESS UPDATE  END


////////////////////////############## PROCESS VIEW 

/// form set

if ($calendar_id != "" ) { 

$input_array = array(
"calendar_id"=>"$calendar_id" , 
);
$rs_calendar = $app_calendar->function_viewbyid( $input_array );
if ($rs_calendar ) {
	
$calendar_id = $rs_calendar["calendar_id"];
$category_id = $rs_calendar["category_id"];

$calendar_topic = $rs_calendar["calendar_topic"];
$calendar_des = $rs_calendar["calendar_des"];
$calendar_detail = $rs_calendar["calendar_detail"];
$calendar_image_mini = $rs_calendar["calendar_image_mini"];

$date_start = $rs_calendar["date_start"];
$date_end = $rs_calendar["date_end"];
$time_start = $rs_calendar["time_start"];
$time_end = $rs_calendar["time_end"];


$stat_view = $rs_calendar["stat_view"];
$stat_reply = $rs_calendar["stat_reply"];
$stat_delete = $rs_calendar["stat_delete"];


$option_reply = $rs_calendar["option_reply"];
$option_recommend = $rs_calendar["option_recommend"];
$option_approve = $rs_calendar["option_approve"];
$option_status = $rs_calendar["option_status"];

$user_create = $rs_calendar["user_create"];
$user_update = $rs_calendar["user_update"];
$user_delete = $rs_calendar["user_delete"];
$datetime_create = $rs_calendar["datetime_create"];
$datetime_update = $rs_calendar["datetime_update"];
$datetime_delete = $rs_calendar["datetime_delete"];




if ($date_start != "0000-00-00 00:00:00"  or  $date_start != "" ) {	
$get_year=substr($date_start,"0","4");
$get_month=substr($date_start,"5","2");			
$get_day = substr($date_start,"8","2");	
$get_year = $get_year + 543 ; 
$date_start = "$get_day/$get_month/$get_year" ; 
//// print "<br>xxx  datetime_action_date = $datetime_action_date <br>"; 

if ($date_start =="00/00/543"  or  $date_start=="" ) {
$date_start = "" ; 
}
} ////////// 


if ($date_end != "0000-00-00 00:00:00"  or  $date_end != "" ) {	
$get_year=substr($date_end,"0","4");
$get_month=substr($date_end,"5","2");			
$get_day = substr($date_end,"8","2");	
$get_year = $get_year + 543 ; 
$date_end = "$get_day/$get_month/$get_year" ; 
	


if ($date_end =="00/00/543"  or  $date_end=="" ) {
$date_end = "" ; 
}
} //////// 



$time_start_h = substr($time_start,"0","2");	/// time_h
$time_start_m = substr($time_start,"3","2"); /// time_m
$time_end_h = substr($time_end,"0","2");	/// time_h
$time_end_m = substr($time_end,"3","2"); /// time_m



}///rs_category
} ///if ($category_id != "" ) { 




////////////////////////############## PROCESS VIEW  END





////////////////////////############## PROCESS CONFIG 
$show_pagetitle = "$show_content_pagename "; 

////////////////////////############## PROCESS CONFIG END



if ($calendar_id=="") {
$option_confirm_email = "confirm";
$option_reply = "reply";
$option_approve = "approve";
$option_status = "on";
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>calendar Update</title>



<link href="../app_design/css/style_backoffice.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../system/system_js/calendar.js"></script>

</head>

<body>
<?
include("../app_design/design_top_system.php"); 
?>




<table width="100%" border="0" align="center" cellpadding="0" cellspacing="7" style="background-color:#FFF"><form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <tr>
    <td height="550" align="left" valign="top">
    
    
    
    
<?


$page_topic_name = "/  calendar "; 
include("../app_system/include/inc_body_system_topic.php");





?>
    
    
    
    
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#999999">

          <tr>
            <td height="30" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td >&nbsp;</td>
                <td align="right"><table border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="60" align="center"><a href="contactus_showall.php?category_id=<?=$category_id?>"><img src="../images/icon/design_showall.gif" width="164" height="35" hspace="5" /></a></td>
                
             

<?
if ($contact_id != "" ) { 
?>
<td width="60" align="center">

<a href="contactus_showall.php?<? print "contac_id=$contac_id&option_delete=delete&contact_type=$type_contact" ; ?>"   onclick="return confirm('سͧź ?')"  >
<img src="../images/icon/design_icon_delete.gif" alt="źŹ ..." width="164" height="35" hspace="5" border="0" /></a>

</td>
<?
} /// if ($content_id != "" ) { 
?>
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
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5"> Ǵ <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
                
                
                
                
                
<?


if ($contact_type == "" ) { $contact_type = "type_contact"; } 
if ($contact_type == "type_contact" ) { $option_type_contact = "checked"; } 
if ($contact_type == "type_complain" ) { $option_type_complain = "checked"; }

print "
<select name=\"select_category\" id=\"select_category\" class=\"text_bot1\" style=\"width:300px;\"  onchange=\"MM_jumpMenu('parent',this,0)\"  >
<option  value=\"calendar_showall.php?contact_type=\"   selected >س͡Ǵ ... </option>
";


print "<option  value=\"calendar_showall.php?contact_type=type_contactus\"  $option_type_contact  >- Դͺ</option>"; 
print "<option  value=\"calendar_showall.php?contact_type=type_complain\"  $option_type_complain  >- Ѻͧͧء</option>"; 

print "</select>"; 


?>
                
                
                </td>
            </tr>
            <tr>
              <td width="200" align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ͧ/Ǣ  <font color="#FF0000">*</font> :</td>
              <td align="left" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
                <input name="calendar_topic" type="text" id="calendar_topic" value="<?=$calendar_topic ?>" size="80"  style="width:700px;" /></td>
            </tr>
            <tr>
              <td height="50" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">´ҧ :</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"calendar_des\" cols=\"80\" rows=\"5\" id=\"calendar_des\"  style=\"width:700px;\">$calendar_des</textarea>"; 

?></td>
            </tr>
            <tr>
              <td height="70" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">´ :</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><?

print "<textarea name=\"calendar_detail\" cols=\"80\" rows=\"15\" id=\"calendar_detail\"  style=\"width:700px;\">$calendar_detail</textarea>"; 

?></td>
            </tr>
            <tr>
              <td height="50" align="right" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">ʶҹ :</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF">
  <?


if ($option_reply == "reply" ) {  $option_reply_checked = "checked"; } else  {  $option_reply_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_reply\" id=\"option_reply\" value=\"reply\"  $option_reply_checked    />ʴԴ (Reply Comment)<br>"; 



if ($option_recommend == "recommend" ) {  $option_recommend_checked = "checked"; } else  {  $option_recommend_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_recommend\" id=\"option_recommend\" value=\"recommend\"  $option_recommend_checked    />¡й (Recommend)<br>"; 



if ($option_approve == "approve" ) {  $option_approve_checked = "checked"; } else  {  $option_approve_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_approve\" id=\"option_approve\" value=\"approve\"  $option_approve_checked    />׹ѹ͹ѵԺ (Approve)<br>"; 


if ($option_status == "on" ) {  $option_status_checked = "checked"; } else  {  $option_status_checked = ""; }
print "<input  type=\"checkbox\"   name=\"option_status\" id=\"option_status\" value=\"on\"  $option_status_checked    />͹Ź (Online)<br>"; 

?>
                </td>
            </tr>
            <tr>
              <td align="right" valign="middle" bgcolor="#FFFFFF"  style="padding:5px; background-color:#E5E5E5">&nbsp;</td>
              <td align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFFFFF"><input type="submit" name="button3" id="button3" value="ѹ֡" />
                <input type="reset" name="button4" id="button4" value="૵ ..." /></td>
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
  </tr><input  type="hidden" name="contactus_appaction_update"  id="contactus_appaction_update" value="update_information" />
<input type="hidden" name="calendar_id"  id="calendar_id" value="<?=$calendar_id?>" />

</form>
</table>


<?
include("../app_design/design_bottom_system.php");
?>
</body>
</html>