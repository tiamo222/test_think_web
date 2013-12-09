 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="background-color:#FFFFFF;">
<tr><td bgcolor="#FFFFFF">

<?
if ($ads_banner_a1 != "" or  $ads_banner_a2 != "" or  $ads_banner_a3 != "" or  $ads_banner_a4 != "" or  $ads_banner_a5 != ""  ){ 
?>
<div id="slideshow">
<?
if ($ads_banner_a1 != ""   ){ 
?>
<div class="active">
<?=$ads_banner_a1 ?>
</div>
<?
}///
?>

<?
if ($ads_banner_a2 != ""   ){ 
?>
<div>
<?=$ads_banner_a2 ?>
</div>
<?
}///
?>

    
<?
if ($ads_banner_a3 != ""   ){ 
?>
<div>
<?=$ads_banner_a3 ?>
</div>
<?
}///
?>

<?
if ($ads_banner_a4 != ""   ){ 
?>
<div>
<?=$ads_banner_a4 ?>
</div>
<?
}///
?>

<?
if ($ads_banner_a5 != ""   ){ 
?>
<div>
<?=$ads_banner_a5 ?>
</div>
<?
}///
?>
    
   
</div>
<?
} 
?>



</td></tr></table>