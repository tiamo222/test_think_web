<?
//// inc_adsbanner.php
///include("../banner/inc_adsbanner.php"); 


$config_site_title = $app_system_config["config_site_title"]["config_value"];
$config_site_des = $app_system_config["config_site_des"]["config_value"];
$config_site_keyword = $app_system_config["config_site_keyword"]["config_value"];



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$config_site_title ?></title>
<meta name="Keywords" content="<?=$config_site_keyword ?>" />
<meta name="Description" content="<?=$config_site_des ?>"/>
<meta name="author" content="Thailand" />
<meta name="robots" content="index,follow" />
<meta name="revisit-after" content="1 days" />
<?=$config_page_header ?>

<link href="../app_design/css/style_web.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
margin-left: 0px;
margin-top: 0px;
margin-right: 0px;
margin-bottom: 0px;
background-color: #FFFFFF;
	
padding: 0;
margin: 0;
width: 100%;
display: table;

}
-->
</style>





<link type="text/css" href="../app_application/jquery-ui-1.7.2.custom/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="../app_application/jquery-ui-1.7.2.custom/development-bundle/jquery-1.3.2.js"></script>
<script type="text/javascript" src="../app_application/jquery-ui-1.7.2.custom/development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="../app_application/jquery-ui-1.7.2.custom/development-bundle/ui/ui.datepicker.js"></script>
<link type="text/css" href="../app_application/jquery-ui-1.7.2.custom/development-bundle/demos/demos.css" rel="stylesheet" />

<script type="text/javascript">
$(function() {
 
$('#date_start').datepicker({
changeMonth: true,
changeYear: true,
showOn: 'button', buttonImage: '../images/calendar/dlcalendar_2.gif', buttonImageOnly: true
});
		

$('#date_end').datepicker({
changeMonth: true,
changeYear: true,
showOn: 'button', buttonImage: '../images/calendar/dlcalendar_2.gif', buttonImageOnly: true
});



$('#search_checkin').datepicker({
changeMonth: true,
changeYear: true,
showOn: 'button', buttonImage: '../images/calendar/dlcalendar_2.gif', buttonImageOnly: true
});


$('#search_checkout').datepicker({
changeMonth: true,
changeYear: true,
showOn: 'button', buttonImage: '../images/calendar/dlcalendar_2.gif', buttonImageOnly: true
});


		
});
</script>


<script>
function chgBg(obj,color){
if (document.all || document.getElementById)
  obj.style.backgroundColor=color;
else if (document.layers)
  obj.bgColor=color;
}
</script>





<style type="text/css">
<!--
#slideshow {    position:relative;
    height:200px;
}
-->
</style>




<link type="text/css" href="../app_application/aToolTip/css/atooltip.css" rel="stylesheet"  media="screen" />
	<!-- aToolTip js -->
<script type="text/javascript" src="../app_application/aToolTip/js/atooltip.min.jquery.js"></script>
<script type="text/javascript">
			$(function(){ 
				$('a.normalTip').aToolTip();
				
				
				$('a.fixedTip').aToolTip({
		    		fixed: true
				});
				
				$('a.clickTip').aToolTip({
		    		clickIt: true,
		    		tipContent: 'Hello I am aToolTip with content from the "tipContent" param'
				});				
				
				
			}); 
</script>	


</head>

<body><center>


<?php include("design_top_front.php"); ?>
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="500" align="center" valign="top" bgcolor="#FFFFFF" style="padding-left:5px; padding-right:5px;"><?

if ($config_inc_page_content != "" ) { 
include("$config_inc_page_content");
} 

?>
    
    
    &nbsp;</td>
    </tr>
</table>
<?php
include("design_bottom_front.php"); 
?>
</center>
</body>
</html>