
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#999999" class="none">
<?

//////////////////////////////////// CAL

/*
///$today_date =  date("Y-m-d");

/// $this_year =  date("Y");
/// $this_month =  date("m");
/// $this_day =  date("d");

////$this_year =  2008 ;
//// $this_month =  2 ;
*/





if ($id_date == "" ) { 
$today_date =  date("Y-m-d");
$id_date =  $today_date ; 
} ////


if ($id_month == "" ) { 
$this_month =  date("m");
$id_month =  $this_month ; 
} ////

if ($id_year == "") {
$this_year =  date("Y");
$id_year = $this_year ; 	
}

//// year th
$this_year_th = $this_year + 543 ; 

//// name
$show_month_name =   fc_month_th_nn($this_month) . "&nbsp;$this_year_th " ;

/// icon
////$icon_booking = "<img src=\"../system_design_images/_design_icon/task_icon.gif\" width=\"15\" height=\"12\" />" ; 
$icon_calendar = "<img src=\"../images/icon/icon_cal1.png\" width=\"16\" height=\"16\" hspace=\"0\" vspace=\"0\" border=\"0\" align=\"absmiddle\" />" ; 
///$icon_booking = "" ; 


?>
  <tr>
    <td height="250" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="2" cellpadding="0" style="padding:0px; background-color:#EEEEEE">
      <tr>
        <td height="25" align="left" class="text_normal1"  style="padding:0px;background-color:#EEEEEE" >
        &nbsp;<a href="../calendar/calendar.php?<? print "id_month=$id_month&id_year=$id_year" ; ?>"><font color="#000000"><b>เดือน <? print $show_month_name ; ?></b></font></a></td>
      </tr>
    </table>
<? 




////print "$this_year " ; 
///// วันที่ 1 ตรงกับวันอะไร
/// 0 = sun
///$ck_dayofweek_start = date("w",mktime(0, 0, 0,  $this_month  , 1 , $this_year ));


/*  
+++++++++++++++++++++++++++ note +++++++++++++++++++++++++++

check_tb_week = loop day 1 -7 

+++++++++++++++++++++++++++ note +++++++++++++++++++++++++++ 
*/



$dayofweek_start = date("w",mktime(0, 0, 0,  $this_month  , 1 , $this_year ));
//// print " dayofweek_start = $dayofweek_start <br> " ;
//// เพิ่มวันที่เพื่อ จะได้มองเห็นวันของเดือนที่ผ่านมา
$dayofweek_start = $dayofweek_start + 6 ; 



//// เดือนนี้มีกี่วัน
$check_total_dayofmonth = function_daysinmonth( $this_month , $this_year ) ; 
$check_total_dayofmonth_this = $check_total_dayofmonth ; 



//// เดือนที่แล้วเดือนอะไรถ้า 0 ให้เป็น 12
$back_month = $this_month - 1 ; 
if ($back_month== 0 ) { $back_month = 12 ; }
/// จำนวนวันของเดือนที่แล้ว 
$back_month_total_dayofmonth = function_daysinmonth( $back_month , $this_year ) ; 
////หาวันทีเริ่มต้นของตาราง
$back_month_start = $back_month_total_dayofmonth - $dayofweek_start ; 


///$back_month_start = $back_month_start - 1 ; 









print "
<center>
<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#FFFFFF\">

" ;

///head
print  "
<tr><td ></td></tr>
<tr >

<td bgcolor=\"#339933\" class=text_bot1  style=\"padding:0px;\"><center><font color=#FFFFFF>จ. </font></center></td>
<td bgcolor=\"#339933\" class=text_bot1 style=\"padding:0px;\"><center><font color=#FFFFFF>อ. </font></center></td>
<td bgcolor=\"#339933\" class=text_bot1 style=\"padding:0px;\"><center><font color=#FFFFFF>พ. </font></center></td>
<td bgcolor=\"#339933\" class=text_bot1 style=\"padding:0px;\"><center><font color=#FFFFFF>พฤ.</font></center></td>
<td bgcolor=\"#339933\" class=text_bot1 style=\"padding:0px;\"><center><font color=#FFFFFF>ศ.</font></center></td>
<td bgcolor=\"#3AC93B\" class=text_bot1 style=\"padding:0px;\"><center><font color=#FFFFFF>ส.</font></center></td>
<td bgcolor=\"#3AC93B\" class=text_bot1 height=25  style=\"padding:0px;\" ><center><font color=#FFFFFF>อา.</font></center></td>
</tr>
" ;

print "<tr>" ; 



$check_tb_week = 0 ; 
////$dayofmonth_start = 0 ; 
$input_day  = $back_month_start ; 
////$input_day  = $back_month_start ; 
$bg_day = "#FFFFFF" ;
$this_month_day = "no" ; 



////////////////////////////////////////////////////////////////////////////////// main loop 
for ($main_table = 0 ;  $main_table < 49 ; $main_table++   ) {
$check_tb_week = $check_tb_week + 1 ; 


if ($check_tb_week == 6 or $check_tb_week == 7   )
{ $bg_day = "#DBDFE4" ; } else  { $bg_day = "#FFFFFF" ; }


////////
if ($dayofweek_start == $main_table ) { //// เริ่มใส่วันที่ 1 
$input_day = 0 ; 
$this_month_day = "yes" ; 
} 


//////// ไปจนถึงวันสุดท้ายของเดือน
if ($check_total_dayofmonth == $input_day ) {
$input_day = 0 ; 
$this_month_day = "no" ;
} 


$input_day = $input_day + 1 ; 


//////////////////////////// Check DB
$this_month = substr( '00' . $this_month  , strlen ('00' . $this_month  ) -2 , 2 );
$input_day = substr( '00' . $input_day  , strlen ('00' . $input_day  ) -2 , 2 );
////$data_this_datedb = "$this_year-$this_month-$input_day" ; 
$data_this_datedb = "$this_year-$this_month-$input_day" ; 
$loop_this_date = "$this_year-$this_month-$input_day" ; 




///++++++++++++++++++++++++++++++++++++++++++++++ check database
/// Check Information where thins day 


$input_array = array(
"sql_whereother"=>"  and  ( datetime_action  LIKE '%$loop_this_date%'  ) " , 
"option_status"=>"on" , 
);
$data_count_row = $sys_calendar->function_countbyset($input_array);
/// $data_rs = $tng_training_calendar->function_viewbyset($input_array); /// select ข้อมูล



$tag_day_item = " "; 
if ($data_count_row > 0 ) {
$tag_day_item = " <a href=\"../calendar/calendar_bydate.php?id_date=$loop_this_date\"  $option_target >$icon_calendar<span class=text_normal2>$data_count_row</span></a>"; 
}



///++++++++++++++++++++++++++++++++++++++++++++++ check database



$tag_show_today = "" ; 
$tag_show_today_end = "" ; 


///if ($input_day==$this_day) { 
if ($loop_this_date == $id_date ) { 

$tag_show_today = "
<table width=\"100%\" height=\"40\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" bgcolor=\"#000000\" >
<tr><td align=left  valign=\"top\" bgcolor=\"$bg_day\"   class=text_normal1    style=\"padding:0px;\" >
" ; 

$tag_show_today_end = " </td></tr></table>" ; 

} ////











//////////////////////////////////////////////////////////////////////////////////// day form
if ($this_month_day == "yes") { 

print "

<td bgcolor=\"$bg_day\" height=\"40\" valign=\"top\"  width=\"14%\"  align=\"left\"  class=text2  style=\"padding:0px;\" > 

$tag_show_today

<table width=\"100%\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\" bgcolor=\"#A6DF62\" >
<tr><td align=\"left\"   style=\"padding:2px;height:10px;\" >
<span class=text_bot1><font color=#FFFFFF> $input_day </font></span>
</td></tr></table>

$tag_day_item
$tag_show_today_end


</td>" ; 
}  else { ////  if ($this_month_day == "yes") { 

///////////////// เดือนอื่นๆ
print "
<td bgcolor=\"#eeeeee\" height=\"40\" valign=\"top\"  align=\"left\"  class=text2   style=\"padding:0px;\"> 

<table width=\"100%\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\" bgcolor=\"#dddddd\" >
<tr><td align=\"left\"  style=\"padding:2px;height:10px;\">
<span class=text_normal1 ><font color=#999999> <b>$input_day</b> </font></span>
</td></tr></table>

</td>

" ; 

}  ////  if ($this_month_day == "yes") { 

//////////////////////////////////////////////////////////////////////////////////// day form end



if ($check_tb_week==7) { 
print "</tr>" ;
$check_tb_week = 0 ; 
 }




} ///// 
//////////////////////////////////////////////////////////////////////////////////main loop 

///print "</tr>" ;

print "</table></center>" ; 



//////////////////////////////////// CAL END
?>				

<? /////////////////////////////////////////////////////////////// ?></td>
</tr>
</table>