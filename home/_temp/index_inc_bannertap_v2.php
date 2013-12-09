 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#FFFFFF;">
<tr><td bgcolor="#FFFFFF">

<?
if ($ads_banner_a1 != "" or  $ads_banner_a2 != "" or  $ads_banner_a3 != "" or  $ads_banner_a4 != "" or  $ads_banner_a5 != ""  ){ 
?>



<div id="slider1" class="sliderwrapper">
<?
if ($ads_banner_a1 != ""   ){ 
?>
<div class="contentdiv">
<?=$ads_banner_a1 ?>
</div>
<?
}///
?>

<?
if ($ads_banner_a2 != ""   ){ 
?>
<div class="contentdiv">
<?=$ads_banner_a2 ?>
</div>
<?
}///
?>


<?
if ($ads_banner_a3 != ""   ){ 
?>
<div class="contentdiv">
<?=$ads_banner_a3 ?>
</div>
<?
}///
?>

<?
if ($ads_banner_a4 != ""   ){ 
?>
<div class="contentdiv">
<?=$ads_banner_a4 ?>
</div>
<?
}///
?>

<?
if ($ads_banner_a5 != ""   ){ 
?>
<div class="contentdiv">
<?=$ads_banner_a5 ?>
</div>
<?
}///
?>

</div>

<div id="paginate-slider1" class="pagination">
</div>

<script type="text/javascript">
featuredcontentslider.init({
	id: "slider1",  //id of main slider DIV
	contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
	toc: "#increment",  //Valid values: "#increment", "markup", ["label1", "label2", etc]
	nextprev: ["Back", "Next"],  //labels for "prev" and "next" links. Set to "" to hide.
	revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
	enablefade: [true, 0.2],  //[true/false, fadedegree]
	autorotate: [true, 3000],  //[true/false, pausetime]
	onChange: function(previndex, curindex){  //event handler fired whenever script changes slide
		//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
		//curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
	}
})

</script>

<?
} 
?>

</td></tr></table>