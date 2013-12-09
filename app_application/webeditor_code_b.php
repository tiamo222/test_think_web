<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){
	



// The second editor -------------------------------------- 
/// $editor2 = new wysiwygPro('demo5_2'); 

$editor2 = new wysiwygPro($editor_config_name); 
$editor2->subsequent(true); 

//// $editor2->set_name('editor2'); 
$editor2->set_name($editor_config_name); 

// specify a stylesheet to use 
//$editor2->set_stylesheet('/demos/stylesheet2.css'); 
$editor2->set_stylesheet('../system_web/style_web_admin.css'); 
$editor2->set_fontmenu('Tahoma; AngsanaUPC; MS Sans Serif; Microsoft Sans Serif; Verdana; Arial; sans-serif');

if ($editor_show_information !="" ) {
$editor2->set_code( $editor_show_information ); 
} 
$editor_show_information="" ;

// set font menu 
// $editor2->set_fontmenu('Arial; Arial Black; Times New Roman; Courier New; Georgia; Verdana; Geneva; Tahoma; Wingdings'); 
                             
// prints the editor to the browser 
//$Set_Editor_Width="100%";

$editor2->print_editor($editor_config_w,$editor_config_h); 

//echo $Set_Editor_Width

// END CODE ///////////////// 
?> 