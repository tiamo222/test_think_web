<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){
	
	

/*
$show_status
$show_status_detail 
$show_status_width = "" ; 
*/




if ($show_status_width == "" ){
$show_status_width = "100%" ;
}

if ($show_status == "error" ) {


if ($show_status_detail == "" ) {
$show_status_detail = "มีข้อผิดพลาดในการบันทึกข้อมูล ... <br>"; 
}




$count_array_report_error = count($array_report_error);
if ($count_array_report_error > 0 ) {

for( $i =0 ; $i < $count_array_report_error ; $i++){ /// start loop
$status_detail = $array_report_error["$i"];
$show_status_detail = $show_status_detail . "<br>  $status_detail "; 

} /// loop
} /// if ($count_array_report_error > 0 ) {

?>



<table width="<?=$show_status_width ?>" border="0" align="center" cellpadding="0" cellspacing="2"  style="background-color:#CC0000;">
        <tr>
          <td height="80" align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#FFF5CB;" class="text_normal1">

<b>Message : </b> <br />

          

          <?=$show_status_detail ?> ...</td>
        </tr>
      </table>


<table width="100" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td  style="padding:0px;"><img src="../images/span.gif" width="100" height="7" /></td>
  </tr>
</table>

<?
}  ///if ($option_show_message != "error" ) {

//// 
if ($show_status == "success" ) {

if ($show_status_detail == "" ) {
$show_status_detail = "Complete... "; 
}

?>




<table width="<?=$show_status_width ?>" border="0" align="center" cellpadding="0" cellspacing="2"  style="background-color:#339900">
        <tr>
          <td height="80" align="left" valign="top" bgcolor="#FFFFFF"  style="padding:5px; background-color:#DFEDDC;"  class="text_normal1"><b>Message : </b> <br />
<?=$show_status_detail ?></td>
        </tr>
      </table>



<table width="100" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td style="padding:0px;"><img src="../images/span.gif" width="100" height="7" /></td>
  </tr>
</table>

<?
} ///if ($option_show_message != "" ) {
?>