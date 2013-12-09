<?

$input_array = array(
"system_id"=>"app_content" , 
"option_orderby"=>"option_order" ,
"option_highlight"=>"highlight" ,
"option_status"=>"on" ,
);
$content_count_row = $app_content->function_countbyset( $input_array );
if ($content_count_row > 0 ) { 

?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link rel="stylesheet" href="../application/smoothgallery/css/layout.css" type="text/css" media="screen" charset="utf-8" />
<link rel="stylesheet" href="../application/smoothgallery/css/jd.gallery.css" type="text/css" media="screen" charset="utf-8" />
<script src="../application/smoothgallery/scripts/mootools-1.2.1-core-yc.js" type="text/javascript"></script>
<script src="../application/smoothgallery/scripts/mootools-1.2-more.js" type="text/javascript"></script>
<script src="../application/smoothgallery/scripts/jd.gallery.js" type="text/javascript"></script>
<script src="../application/smoothgallery/scripts/jd.gallery.transitions.js" type="text/javascript"></script>






<script type="text/javascript">
function startGallery() {
var myGallery = new gallery($('myGallery'), {
timed: true,
defaultTransition: "continuoushorizontal"
});
}
window.addEvent('domready', startGallery);
</script>
<div class="content">
<div id="myGallery">
 
<?


$input_array = array(
///"set_pager_limit"=>"$set_pager_limit" , 
///"set_pager_start"=>"$set_pager_start" , 

"system_id"=>"app_content" , 
"option_orderby"=>"option_order" ,
"option_highlight"=>"highlight" ,
"option_status"=>"on" ,

);
$content_rs = $app_content->function_viewbyset( $input_array ); /// select ¢ÈÕ¡Ÿ≈


$lv1_count_loop = 0 ;
while($rs = $content_rs->FetchRow()){ /////// loop 
$lv1_count_loop = $lv1_count_loop + 1  ;


///////////////// set value
$content_id = $rs["content_id"];
$content_name = $rs["content_name"];
$content_des = $rs["content_des"];

$content_image_mini = $rs["content_image_mini"];
$content_image = $rs["content_image"];

$option_order = $rs["option_order"];
$option_reply = $rs["option_reply"];
$option_highlight = $rs["option_highlight"];
$option_recommend = $rs["option_recommend"];
$option_approve = $rs["option_approve"];
$option_status = $rs["option_status"];


if ($option_status == "on" ) {$option_status_text = "ÕÕπ‰≈πÏ"; }
if ($option_status == "off" ) {$option_status_text = "ÕÕø‰≈πÏ"; }

$show_content_image_mini = ""; 
if ($content_image_mini != "" ) {
$show_content_image_mini = "<img src=\"$path_content$content_image_mini\"   class=\"thumbnail\">";
}

$show_content_image = ""; 
if ($content_image != "" ) {
$show_content_image = "<img src=\"$path_content$content_image\" width=600   class=\"full\" >";
}

?>

<div class="imageElement">
<?
print "
$show_content_image_mini
$show_content_image
";
?>
<h3><span class="text_bot1"><font color="#FFFFFF"><?=$content_name ?></font></span></h3>
<p><span class="text_normal1"><font color="#FFFFFF"><?=$content_des ?></font></span></p>
<a href="../magazine/detail.php?<? print "id=$content_id"; ?>" title="open image" class="open"></a>
</div>
<?
} ////////// loop
?>
				
</div>
</div>

<?
} ///if ($content_count_row == 0 ) { 
?>    
