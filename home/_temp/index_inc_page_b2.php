<?
if ($config_design_page != "complete" ){
print "<meta http-equiv=\"Refresh\" content=\"0;URL=../index.php\" />";
} else {
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../app_design/css/style_web.css" rel="stylesheet" type="text/css">
<?
}//////if ($tag_for_code == "hide" ){
?>






<?
if ($option_fix == "show"){
?>
<script language="javascript" src="../app_application/system_js/calendar_v2.js"></script>
<script type="text/javascript" src="../app_application/system_js/jquery-1.2.6.min.js"></script>
<?
} ///
?>


<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function slideSwitch() {
    var $active = $('#slideshow DIV.active');

    if ( $active.length == 0 ) $active = $('#slideshow DIV:last');

    // use this to pull the divs in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow DIV:first');

    // uncomment below to pull the divs randomly
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});

</script>

<style type="text/css">

/*** set the width and height to match your images **/

#slideshow {
    position:relative;
    height:200px;
}

#slideshow DIV {
    position:absolute;
    top:0;
    left:0;
    z-index:8;
    opacity:0.0;
  	height: 200px;
    background-color: #FFF;
}

#slideshow DIV.active {
    z-index:10;
    opacity:1.0;
}

#slideshow DIV.last-active {
    z-index:9;
}

#slideshow DIV IMG {
   height: 200px;
    display: block;
    border: 0;
    margin-bottom: 0px;
}

</style>




<link rel="stylesheet" type="text/css" href="../app_application/featuredcontentslider/contentslider.css" />
<script type="text/javascript" src="../app_application/featuredcontentslider/contentslider.js"></script>












<table width="990" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#FFF">
  <tr>
    <td width="615" align="center" valign="top" style="padding-right:10px;" >
    
    
    

<?
 include("index_inc_bannertap_v2.php");
?> 
      
      
      
      
      
      
      
      <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="../images/span.gif" width="620" height="2" /></td>
      </tr>
    </table>
      



<?
///include("../home/inc_holiday.php");
?>

<?
include("../home/inc_plannextbreak_v2.php");
?> 

<?
include("inc_popular_destination_v2.php"); 
?>
    
    
    </td>
    <td align="right" valign="top" width="360"   ><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="1"><img src="../images/design_v2/boxb1.gif" width="9" height="35" /></td>
        <td width="1"   style="background-image:url(../images/design_v2/boxbg1.gif)"><img src="../images/design_v2/box_icon1.gif" width="45" height="35" /></td>
        <td align="left" valign="middle" class="big1" style="background-image:url(../images/design_v2/boxbg1.gif)">&nbsp;<font color="#FFFFFF">Translate Tool </font></td>
        <td width="1"><img src="../images/design_v2/boxb2.gif" width="9" height="35" /></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="50" align="center" valign="middle" style="background-image:url(../images/design_v2/boxbg2.gif)">
          

  <div id="google_translate_element"></div><script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: 'th'
  }, 'google_translate_element');
}
</script><script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

          
          
          </td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="1"><img src="../images/design_v2/boxb3.gif" width="9" height="9" /></td>
          <td style="background-image:url(../images/design_v2/boxbg2.gif)"><img src="../images/span.gif" width="100" height="5" /></td>
          <td width="1"><img src="../images/design_v2/boxb4.gif" width="9" height="9" /></td>
        </tr>
      </table>
      <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="100" height="10" /></td>
        </tr>
      </table>
<?
include("../longstay/inc_search_new.php");
?>
<?
///include("../bidding/inc_bidding_home.php"); 
?>
<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="../images/span.gif" width="100" height="10" /></td>
  </tr>
</table>
<?
include("../home/inc_news.php");
?>




<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1"><img src="../images/design_v2/boxb1.gif" width="9" height="35" /></td>
    <td width="1"   style="background-image:url(../images/design_v2/boxbg1.gif)"><img src="../images/design_v2/box_icon1.gif" width="45" height="35" /></td>
    <td align="left" valign="middle" class="big1" style="background-image:url(../images/design_v2/boxbg1.gif)">&nbsp;&nbsp;  <font color="#FFFFFF">Gallery Long Stay </font></td>
    <td width="1"><img src="../images/design_v2/boxb2.gif" width="9" height="35" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="100" align="center" valign="top" style="background-image:url(../images/design_v2/boxbg2.gif)"><br />
      <img src="../images/design_v2/ex_b2.gif" width="339" height="288" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="1"><img src="../images/design_v2/boxb3.gif" width="9" height="9" /></td>
    <td style="background-image:url(../images/design_v2/boxbg2.gif)"><img src="../images/span.gif" width="100" height="5" /></td>
    <td width="1"><img src="../images/design_v2/boxb4.gif" width="9" height="9" /></td>
  </tr>
</table>
<table width="100" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="../images/span.gif" width="100" height="10" /></td>
  </tr>
</table>


<?
include("../newsletter/inc_form_input.php"); 
?>




<?
$ads_banner_show = $show_banner["home_c1"]["banner_data"]; 
if ($ads_banner_show){
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td align="center" valign="middle"><?
print  $ads_banner_show ;
?></td>
  </tr>
</table>
<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="../images/span.gif" width="100" height="10" /></td>
  </tr>
</table>

<?
} //if ($ads_banner_show){


/*
<script type="text/javascript" src="http://static.ak.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/en_US"></script>
<script type="text/javascript">FB.init("fee3c8697eba8ee47b7a843016066bbf");</script>
<fb:fan profile_id="149618842212" stream="1" connections="10" width="320" height="530"></fb:fan>
*/


?>






      <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="315" height="10" /></td>
        </tr>
    </table></td>
  </tr>
</table>
<table width="940" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#FFF">
  <tr>
    <td width="620" align="left" valign="top" ><br /></td>
    <td width="328" align="center" valign="top"  style="padding-left:5px;" >&nbsp;</td>
  </tr>
</table>






<?
} /// if ($config_design_page == "complete" ){
?>