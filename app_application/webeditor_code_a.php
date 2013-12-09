<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){




// The first editor -------------------------------------- 
/// $editor1 = new wysiwygPro('demo5_1'); 
$editor1 = new wysiwygPro($editor_config_name); 

///$editor1->set_name('editor1'); 
$editor1->set_name($editor_config_name); 


// specify a stylesheet to use 
//$editor1->set_stylesheet('/demos/stylesheet2.css'); 
$editor1->set_stylesheet('../system_web/style_web_admin.css'); 
//$editor->set_fontmenu('Tahoma;AngsanaUPC;MS Sans Serif;Microsoft Sans Serif;Verdana;Arial;sans-serif;sans-serif;Webdings');
$editor1->set_fontmenu('Tahoma; AngsanaUPC; MS Sans Serif; Microsoft Sans Serif; Verdana; Arial; sans-serif');
/// $editor1->set_code(implode("", @file('editable_documents/document.htm'))); 

if ($editor_show_information !="" ) {
$editor1->set_code( $editor_show_information ); 
} 
$editor_show_information="" ;

//$editor1->removebuttons('tab, spacer3, spacer4, tbl, ruler, link, document, image, smiley, bookmark, special'); 

// prints the editor to the browser 
$editor1->print_editor($editor_config_w,$editor_config_h); 

?> 