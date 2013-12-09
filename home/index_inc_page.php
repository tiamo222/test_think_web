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





<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="../images/span.gif" width="100" height="7" /></td>
  </tr>
</table>
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#FFF">
  <tr>
    <td align="center" valign="top" width="360"  style="padding-right:10px;"  >
    
    
    
    

<?php /// include("../home/inc_recommend_product.php"); ?>
   

      
      <br />
      <br />
      <br />

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
      <br />
      <br />
      <br />
      <br />
      <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="236" height="10" /></td>
        </tr>
      </table></td>
    <td width="744" align="left" valign="top" style="width:744px;" >
      
      
      
      
      <?
/// include("index_inc_bannertap_v2.php");
?> 
      
      
      
      
      
      
      
   
      
      
      
      
<?



$category_code = "product";
$this_config_path_index = "../product";
$this_config_path_detail = "../product/detail.php";
$this_config_set_pager_limit1 = ""; 
$this_config_set_pager_limit2 = "10"; 
include("../content/inc_content_viewbycat.php");


$category_code = "training";
$this_config_path_index = "../training";
$this_config_path_detail = "../training/detail.php";
$this_config_set_pager_limit1 = ""; 
$this_config_set_pager_limit2 = "10"; 
include("../content/inc_content_viewbycat.php");



$category_code = "news";
$this_config_path_index = "../news";
$this_config_path_detail = "../news/detail.php";
$this_config_set_pager_limit1 = ""; 
$this_config_set_pager_limit2 = "10"; 
include("../content/inc_content_viewbycat.php");



$category_code = "activity";
$this_config_path_index = "../activity";
$this_config_path_detail = "../activity/detail.php";
$this_config_set_pager_limit1 = ""; 
$this_config_set_pager_limit2 = "10"; 
include("../content/inc_content_viewbycat.php");




$category_code = "content";
$this_config_path_index = "../content";
$this_config_path_detail = "../content/detail.php";
$this_config_set_pager_limit1 = ""; 
$this_config_set_pager_limit2 = "10"; 
include("../content/inc_content_viewbycat.php");



?>
      
    
    

   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
     <tr>
    <td align="left" valign="top" style="background-image:url(../images/design_think/barm3.gif)"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="1"  style="background-image:url(../images/design_think/barm2.gif)"><img src="../images/design_think/barm2.gif" width="2" height="39" /></td>
        <td width="300" align="left" valign="top" class="bot1" style="background-image:url(../images/design_think/barm2.gif); padding-left:10px; padding-top:8px;"><font color="#FFFFFF">
        Business Partner
        </font></td>
        <td width="1" valign="top" style="background-image:url(../images/design_think/barm2.gif)"><img src="../images/design_think/barm1.gif" width="24" height="39" /></td>
      </tr>
    </table></td>
  </tr>
</table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="100" align="left" valign="top"><img src="../images/design_think/banner2009112000524709112000524700206.jpg" hspace="4" vspace="4" /></td>
        </tr>
      </table>
    
    
    
    
    
    
    
       <table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="../images/span.gif" width="744" height="2" /></td>
        </tr>
      </table>
      
      
      
      
    </td>
  </tr>
</table>



<?
} /// if ($config_design_page == "complete" ){
?>

