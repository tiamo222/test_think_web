<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?


function dateDiv($t1,$t2){ // ส่งวันที่ที่ต้องการเปรียบเทียบ ในรูปแบบ มาตรฐาน 2006-03-27 21:39:12

    $t1Arr=splitTime($t1);
    $t2Arr=splitTime($t2);
   
    $Time1=mktime($t1Arr["h"], $t1Arr["m"], $t1Arr["s"], $t1Arr["M"], $t1Arr["D"], $t1Arr["Y"]);
    $Time2=mktime($t2Arr["h"], $t2Arr["m"], $t2Arr["s"], $t2Arr["M"], $t2Arr["D"], $t2Arr["Y"]);
    $TimeDiv=abs($Time2-$Time1);

	$Time["MAX"]=$TimeDiv; //  จำนวนวัน
    $Time["D"]=intval($TimeDiv/86400); //  จำนวนวัน
    $Time["H"]=intval(($TimeDiv%86400)/3600); // จำนวน ชั่วโมง
    $Time["M"]=intval((($TimeDiv%86400)%3600)/60); // จำนวน นาที
    $Time["S"]=intval(((($TimeDiv%86400)%3600)%60)); // จำนวน วินาที
 return $Time;
}

 

function splitTime($time){ // เวลาในรูปแบบ มาตรฐาน 2006-03-27 21:39:12 
 $timeArr["Y"]= substr($time,2,2);
 $timeArr["M"]= substr($time,5,2);
 $timeArr["D"]= substr($time,8,2);
 $timeArr["h"]= substr($time,11,2);
 $timeArr["m"]= substr($time,14,2);
    $timeArr["s"]= substr($time,17,2);
 return $timeArr;
}


//------------------------------  ตัวอย่างการใช้งาน
///$t1="2009-09-26 5:20:00"; /// time start

$time_now = date("Y-m-d H:i:s");
$t1= $time_now ;

//$t1="2009-09-26 5:20:00"; /// time start
$t2="2009-09-30 11:21:50"; /// time end

$time=dateDiv($t1,$t2);
//// print_r($time);
$showmax = $time["MAX"];


if ( $t1 > $t2 ){
$showmax = 0 ;
}

/// $showmax = 0 ;
/// print_r($time);
///  print "time = $time <br>";
/// print "showmax = $showmax <br>";
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#E79D27"><img src="../images/span.gif" width="100" height="1" /></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1" bgcolor="#E79D27"><img src="../images/design_agency3/box5m1.gif" width="1" height="9" /></td>
    <td height="26" align="left" valign="middle" bgcolor="#FFBA00" class="bot1" style="background-image:url(../images/design_agency3/box5bgtop.gif); height:26px; padding-left:10px;">&nbsp; Bidding on Holiday Hotel !!!</td>
    <td width="1" align="right" valign="middle" class="bot1" style="background-color:#FFBA00;"><img src="../images/design_agency3/box5more.gif" width="36" height="12" hspace="4" /></td>
    <td width="1" bgcolor="#E79D27"><img src="../images/design_agency3/box5m1.gif" width="1" height="9" /></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1"><img src="../images/design_agency3/box5b1.gif" width="34" height="9" /></td>
    <td style="background-image:url(../images/design_agency3/box5bbg.gif)"><img src="../images/design_agency3/box5bbg.gif" width="3" height="9" /></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="4" style="background-color:#F0E0E0;">
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0" style="background-color:#EBC0C0;">
      <tr>
        <td align="left" valign="top" class="text2"><b>Centara Grand Beach Resort Villas, Krabi</b></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="5" cellpadding="0" style="background-color:#F0E0E0;">
      <tr>
        <td width="100" align="center" valign="top" bgcolor="#F0E0E0"><table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" style="background-color:#CCCCCC;">
          <tr>
            <td align="center" valign="top" bgcolor="#FFFFFF"><img src="../upload/room/roomm2009091402005109091402005100237.jpg" width="150" height="100" /></td>
          </tr>
        </table></td>
        <td align="left" valign="top" bgcolor="#F0E0E0" class="text1" style="padding:0px;"> Star Rating : <br />
          <table width="50" border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><img src="../images/design_agency3/icon_star.gif" width="15" height="15" /></td>
              <td><img src="../images/design_agency3/icon_star.gif" width="15" height="15" /></td>
              <td><img src="../images/design_agency3/icon_star.gif" width="15" height="15" /></td>
              <td><img src="../images/design_agency3/icon_star.gif" width="15" height="15" /></td>
              <td><img src="../images/design_agency3/icon_star.gif" width="15" height="15" /></td>
            </tr>
          </table>
          Facilities : <br />
          <table width="100" border="0" cellspacing="3" cellpadding="0">
            <tr>
              <td><img src="../images/icon_facilities/swimming_pool.gif" width="21" height="21" /></td>
              <td><img src="../images/icon_facilities/internet.gif" width="21" height="21" /></td>
              <td><img src="../images/icon_facilities/tv.gif" width="21" height="21" /></td>
              <td><img src="../images/icon_facilities/pets.gif" width="21" height="21" /></td>
              <td><img src="../images/icon_facilities/whellchair.gif" width="21" height="21" /></td>
            </tr>
            <tr>
              <td><img src="../images/icon_facilities/fitness.gif" width="21" height="21" /></td>
              <td><img src="../images/icon_facilities/telephone.gif" width="21" height="21" /></td>
              <td><img src="../images/icon_facilities/meetingroom.gif" width="21" height="21" /></td>
              <td><img src="../images/icon_facilities/kitchen.gif" width="21" height="21" /></td>
              <td><img src="../images/icon_facilities/spa.gif" width="21" height="21" /></td>
            </tr>
          </table></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="5" cellpadding="0" style="background-color:#F0E0E0;">
        <tr>
          <td align="left" valign="top" bgcolor="#F0E0E0" class="text2"><b>Address :</b> 99 Sridonchai Rd., T.Changklan, A.Muang Chaing Mai 50100, Thailand </td>
        </tr>
        <tr>
          <td align="left" valign="top" bgcolor="#F0E0E0" class="text2"><b>Description :</b> Room interiors, although enjoying all the contemporary that you would expect, cleverly retain the local culture heritage with modern and traditional </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="3" cellpadding="0" style="background-color:#F0E0E0;">
        <tr>
          <td align="right" valign="top" bgcolor="#F0E0E0" ><table width="100%" border="0" cellspacing="2" cellpadding="0">
            <tr>
              <td width="75" height="22" align="right" valign="middle" class="text1">เหลือเวลา:</td>
              <td align="left" valign="middle" class="bot1" >
              
              <table width="100%" border="0" cellspacing="1" cellpadding="2" style="background-color:#FFBA00">
                <tr>
                  <td bgcolor="#FFFFFF" class="bot1" >
                  
<?


if ( $showmax == 0 ){
print "&nbsp;<b>- หมดเวลาประมูล</b>";
} else { /////

?>

<div id="id2_showtime"  class="bot1" align="center">ต้องเปิดใช้ Javascript </div>
<script language="JavaScript" type="text/javascript">
id2_time=<?=$showmax?> ; // เวลา(วินาที)
function id2_function_countdown() 
{if ((0 <= 100) || (0 > 0)) {id2_time--;if(id2_time == 0){
document.getElementById("id2_showtime").innerHTML = "หมดเวลาประมูล";
}if(id2_time > 0){

total_time = 0 
total_time  = id2_time ;
total_time_hr = 0;
total_time_min = 0;
total_time_sec = 0;



if (total_time >= 86400){
total_time_day=Math.floor(total_time/86400);
total_time = total_time - (86400*total_time_day); 
}


///// ชม.
if (total_time >= 3600){
total_time_hr=Math.floor(total_time/3600);
total_time =  total_time - (3600*total_time_hr)  ; 
}

//// นาที
if (total_time >= 60){
total_time_min=Math.floor(total_time/60);
total_time =  total_time - (60*total_time_min)  ; 
}

//// วินาที
total_time_sec = total_time ;



document.getElementById("id2_showtime").innerHTML =   total_time_day+ ' วัน '+ total_time_hr+'ชั่วโมง '+ total_time_min+'นาที '+ total_time_sec +'วินาที';
setTimeout('id2_function_countdown()',1000); } }}id2_function_countdown();
</script>

<?
} ////if ( $showmax == 0 ){
?>


                  </td>
                </tr>
              </table>
              
</td>
            </tr>
            <tr>
              <td height="22" align="right" valign="middle" class="text1">ราคาเริ่มต้น:</td>
              <td align="left" valign="middle" class="text1" ><b>1,200 บาท</b></td>
            </tr>
            <tr>
              <td height="22" align="right" valign="middle" class="text1">ราคาล่าสุด:</td>
              <td align="left" class="text1" ><font color="#CC0000"><b>1,500 บาท</b></font></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="5" cellpadding="0" style="background-color:#F0E0E0;">
        <tr>
          <td width="50%" align="right" valign="top" bgcolor="#F0E0E0" class="text2"><table width="110" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="1"><img src="../images/design_agency3/botm1.gif" width="4" height="33" /></td>
                <td align="center" valign="middle" class="bot1" style="background-image:url(../images/design_agency3/botbg.gif)" ><a href="#"><font color="#660000">เข้าร่วมประมูล<font></a></td>
                <td width="1"><img src="../images/design_agency3/botm2.gif" width="4" height="33" /></td>
              </tr>
          </table>
            <table width="100" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="../images/span.gif" width="100" height="5" /></td>
              </tr>
          </table></td>
          <td width="50%" align="left" valign="top" bgcolor="#F0E0E0" class="text2"><table width="110" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="1"><img src="../images/design_agency3/botm1.gif" width="4" height="33" /></td>
                <td align="center" valign="middle" class="bot1" style="background-image:url(../images/design_agency3/botbg.gif)" ><a href="../longstay/detail.php?id=property09090318083300002"><font color="#660000">รายละเอียด<font></a></td>
                <td width="1"><img src="../images/design_agency3/botm2.gif" width="4" height="33" /></td>
              </tr>
          </table>
            <table width="100" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><img src="../images/span.gif" width="100" height="5" /></td>
              </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="../images/span.gif" width="100" height="10" /></td>
  </tr>
</table>
