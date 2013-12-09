<?



$this_year =  date("Y");
$this_month =  date("m");
$this_day =  date("d");
$id_date = "$this_year-$this_month-$this_day" ; 


///////// config
$today_date = "" ; 

if ( $id_date != "" ) {
$today_date = function_date_dbtoshow_full($id_date) ; 
//// $today_date = str_replace("น.", "", "$today_date");
$today_date_show = "$today_date"; 
}


?>
<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#22777B">
                    <tr bgcolor="#22777B">
                      <td align="left" valign="top"    bgcolor="#008001" class="text1">

<font color="#FFFFFF">      
<b>::  กิจกรรมในวันที่  
<?=$today_date_show ?>  </b>
</font>

</td>
                    </tr>
                    <tr>
                      <td height="100" align="center" valign="middle" bgcolor="#FFFFFF" style="padding:0px;"><table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><img src="../images/span.gif" width="100" height="5" /></td>
                          </tr>
                        </table>
<?


$input_array = array(
"sql_whereother"=>"  and  ( datetime_action LIKE '%$id_date%'  ) " , 
"option_status_byuser"=>"on" , 
"option_status"=>"on" , 
);
$data_count_row = $sys_calendar->function_countbyset($input_array);




///////////////////////////////////////////////////////////////////////////// pager
$set_pager_limit = 10 ; //// จำนวนต่อหน้า
$set_pager_start =  0 ; //// เริ่มต้นที่ id ลำดับที่

$set_pager_count_data = $data_count_row ; 
$set_pager_total  =  ( $set_pager_count_data /  $set_pager_limit ); 
$set_pager_total = ceil($set_pager_total); 

if ($id_pager == ""  or  $id_pager == 0  ) { $id_pager = 1 ;  } /// lower
if ($id_pager > $set_pager_total   ) { $id_pager = $set_pager_total ;  } /// heigher

if ($id_pager > 1 ) {
$number_n = $id_pager - 1 ; 
$set_pager_start =  $set_pager_limit * $number_n  ; 
}

$set_pager_url = "calendar_bydate.php?id_date=$id_date&" ;
$set_pager_value = "" ;  
///////////////////////////////////////////////////////////////////////////// pager end




$input_array = array(
"sql_whereother"=>"  and  ( datetime_action LIKE '%$id_date%'  ) " , 
"option_status_byuser"=>"on" , 
"option_status"=>"on" , 
"set_pager_limit"=>"$set_pager_limit" , 
"set_pager_start"=>"$set_pager_start" , 
);
$data_rs = $sys_calendar->function_viewbyset($input_array); /// select ข้อมูล


if ($data_count_row > 0 ) { 

$count_row_number = 0 ; 
foreach( $data_rs   as $index=>$rs){ 
$count_row_number = $count_row_number + 1 ; 

$loop_id_system = $rs["id_system"];
$loop_id_calendar = $rs["id_calendar"];
$loop_id_category = $rs["id_category"];
$loop_id_card_person = $rs["id_card_person"];

$loop_calendar_name = $rs["calendar_name"];
$loop_calendar_des = $rs["calendar_des"];
$loop_calendar_place  = $rs["calendar_place"];
$loop_calendar_writer_name = $rs["calendar_writer_name"];

$loop_datetime_action = $rs["datetime_action"];
$loop_datetime_action_end = $rs["datetime_action_end"];
$loop_datetime_update = $rs["datetime_update"];



/*
data_count_row
*/
/// $show_number = 0 ; 
if ($id_pager > 0 ) { 
$show_number = $set_pager_count_data - ( $set_pager_start + $count_row_number )  ; 
$show_number = $show_number + 1 ; 
}





$loop_id_system_text = "" ; 
if ($loop_id_system == "hrdleader" ) {
$loop_id_system_text = "<font color=\"#333399\"><b>ภารกิจของ รองอธิการฝ่ายทรัพยากรบุคคล</b></font><br>" ; 
}


if ($loop_calendar_name != "" ) {
$loop_calendar_name = "$loop_calendar_name <br>";  
}

if ($loop_calendar_des != "" ) {
$loop_calendar_des = "$loop_calendar_des <br>";  
}

if ($loop_calendar_place != "" ) {
$loop_calendar_place = "<br>สถานที่ : $loop_calendar_place <br>"; 
}


if ($loop_calendar_writer_name != "" ) {
$loop_calendar_writer_name = "โดย : $loop_calendar_writer_name<br>";  
}

$loop_datetime_action_show = "" ; 
if ($loop_datetime_action != ""  and  $loop_datetime_action != "0000-00-00 00:00:00" ) {

$loop_datetime_action_show = function_datetime_dbtoshow_full($loop_datetime_action) ; 
$loop_datetime_action_show = "<br>วันที่ : $loop_datetime_action_show "; 
}

$loop_datetime_action_end_show = "" ; 
if ($loop_datetime_action_end != ""  and  $loop_datetime_action_end != "0000-00-00 00:00:00" ) {
$loop_datetime_action_end_show = function_datetime_dbtoshow_full($loop_datetime_action_end) ; 
$loop_datetime_action_end_show = " - $loop_datetime_action_end_show "; 
}


?>

                            
                            
                            
                    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="5" bgcolor="#EEEEEE">
                              <tr>
<td align="left" valign="top" style="padding-left:0px;">
  
  
  <a href="../calendar/calendar_detail.php?id_calendar=<?=$loop_id_calendar?>">
  <font color="#333333">
กิจกรรมรายการที่ <?=$count_row_number ?>. <br>
  
  <?=$loop_id_system_text ?>
  <b><?=$loop_calendar_name ?></b>
  <?=$loop_calendar_des ?>
  <?=$loop_datetime_action_show ?><?=$loop_datetime_action_end_show ?>
  <?=$loop_calendar_place ?>
  <?=$loop_calendar_writer_name ?>
  </font>
  </a>
  
  
  
</td>
                              </tr>
                            </table>
                            <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><img src="../images/span.gif" width="100" height="5" /></td>
                              </tr>
                        </table>
                            
                            

<?
} ///loop

?>



<?

} ///if ($news_count_row > 0 ) { 


if ($data_count_row==0 ) {
print "<font color=#999999><b>ไม่มีข้อมูลกิจกรรมในวันนี้ ...</b></font> "; 	
}

?>








</td>
                    </tr>
                  </table>