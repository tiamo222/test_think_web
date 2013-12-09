<?

$NEW_EDITOR_JAVA_PATH="../system_webeditor/editor_lite/" ;
$NEW_EDITOR_IMAGES_PATH="../system_webeditor/editor_lite/images_editor/Theme_V1/";
$NEW_EDITOR_EMOTION_PATH="../system_webeditor/editor_lite/images_editor/Emotion/";

if (empty($SET_EDITOR_NAME) )   {  $SET_EDITOR_NAME="editor1";  } else  {  $SET_EDITOR_NAME=$SET_EDITOR_NAME;  }
if (empty($SET_NEW_EDITOR_MAIN_WIDTH) )   {  $SET_NEW_EDITOR_MAIN_WIDTH="100%";  } else  {  $SET_NEW_EDITOR_MAIN_WIDTH=$SET_NEW_EDITOR_MAIN_WIDTH;  }
if (empty($SET_NEW_EDITOR_WIDTH) ) { $SET_NEW_EDITOR_WIDTH="100%"; } else  {  $SET_NEW_EDITOR_WIDTH=$SET_NEW_EDITOR_WIDTH;  } 
if (empty($SET_NEW_EDITOR_HIGHT) )  { $SET_NEW_EDITOR_HIGHT="450";}  else  {  $SET_NEW_EDITOR_HIGHT=$SET_NEW_EDITOR_HIGHT;  }

if (empty($EDITOR_SHOW_DEFAULT_VALUE) )  {  $EDITOR_SHOW_DEFAULT_VALUE="";  } else { $EDITOR_SHOW_DEFAULT_VALUE=$EDITOR_SHOW_DEFAULT_VALUE ; }
if (empty($SET_NEW_EDITOR_NEW_LINE) )  {  $SET_NEW_EDITOR_NEW_LINE="";  } else { $SET_NEW_EDITOR_NEW_LINE=$SET_NEW_EDITOR_NEW_LINE ; }

$option_show_tool_images="off" ;
$option_show_tool_flash="off" ;
///$option_show_tool_emo="off" ;

$option_show_tool_zoom="off" ;

/// $option_show_tool_br="<br>" ;
///$option_show_tool_br="" ;

?>

<script language="JavaScript" SRC="<? echo $NEW_EDITOR_JAVA_PATH ;?>WinIE.js"></script>
<style type="text/css">
.button { MARGIN: 1px; VERTICAL-ALIGN: middle; PADDING: 0px}
.buttonover {BORDER: #0A246A 1px solid; BACKGROUND-COLOR: #B6BDD2; PADDING: 0px; MARGIN: 0px; VERTICAL-ALIGN: middle;}
.buttondown {BORDER-RIGHT: buttonhighlight 1px solid; BORDER-TOP: buttonshadow 1px solid; BORDER-LEFT: buttonshadow 1px solid; BORDER-BOTTOM: buttonhighlight 1px solid; MARGIN: 0px; VERTICAL-ALIGN: middle; PADDING: 0px;}
.spacer {border-top: 1px solid buttonshadow; border-left: 1px solid buttonshadow; border-bottom: 1px solid buttonhighlight; border-right: 1px solid buttonhighlight;width:2px;margin-left:2px;margin-right:2px;height:18px;VERTICAL-ALIGN: middle;}
.container {MARGIN: 0px; BACKGROUND-COLOR: #efefef; TEXT-ALIGN: left; padding: 4px;  BORDER: #c0c0c0 1px solid;}
.editBox {BORDER: #c0c0c0 1px solid; PADDING: 5px; MARGIN: 0px 0px 0px 0px; OVERFLOW: auto; BACKGROUND-COLOR: #ffffff; TEXT-ALIGN: left}
.selectColor {BORDER-RIGHT: #efefef 1px solid; PADDING-RIGHT: 0px; BORDER-TOP: #efefef 1px solid; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; VERTICAL-ALIGN: middle; BORDER-LEFT: #efefef 1px solid; PADDING-TOP: 0px; BORDER-BOTTOM: #efefef 1px solid;}
.dropdown {VERTICAL-ALIGN: middle; width:100%; margin-top:3;margin-left:3;font-family:verdana; Color:#000000; font-size: 8pt;}
</style>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<link href="../../system_web/Style_Font.css" rel="stylesheet" type="text/css">
<center>
<div id="<? echo $SET_EDITOR_NAME ;?>_container" style="width:<? echo $SET_NEW_EDITOR_MAIN_WIDTH ;?>" class="container"  >
<input name="<? echo $SET_EDITOR_NAME ;?>_HTMLContent" id="<? echo $SET_EDITOR_NAME ;?>_HTMLContent" type="hidden" value=""/>
<div id="<? echo $SET_EDITOR_NAME ;?>_toolbar" style="margin-left:1px;margin-bottom:4px;" onmouseup="m_up();" onmousedown="m_down();" onmouseover="m_over();" onmouseout="m_out();" onselectstart="doFalse()" ondragstart="doFalse()"><nobr>
<select OnChange="_Format(<? echo $SET_EDITOR_NAME ;?>,'fontname',this.options[this.selectedIndex].value);this.selectedIndex=0;" style="width: 110" class=dropdown>
<option value="Font">Font</option>
<option value='Arial'>Arial</option>
<option value='Verdana'>Verdana</option>
<option value='Comic Sans MS'>Comic Sans MS</option>
<option value='Courier'>Courier</option>
<option value='Georgia'>Georgia</option>
<option value='Impact'>Impact</option>
<option value='Lucida Console'>Lucida Console</option>
<option value='Tahoma'>Tahoma</option>
<option value='Times New Roman'>Times New Roman</option>
<option value='Wingdings'>Wingdings</option>
</select>


<select OnChange="_Format(<? echo $SET_EDITOR_NAME ;?>,'fontsize',this.options[this.selectedIndex].value);this.selectedIndex=0;" style="width: 60" class=dropdown>
<option value="Size">Size</option>
<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
<option value='7'>7</option>
</select>

<?
if ($option_show_tool_zoom=="on") { 
?>
<select OnChange="_Format(<? echo $SET_EDITOR_NAME ;?>,'zoom',this.options[this.selectedIndex].value);this.selectedIndex=0;"  style="width: 60" class=dropdown>
<option value="Zoom">Zoom</option>
<option value='500%'>500%</option>
<option value='200%'>200%</option>
<option value='125%'>125%</option>
<option value='100%'>100%</option>
<option value='90%'>90%</option>
<option value='85%'>85%</option>
<option value='80%'>80%</option>
<option value='75%'>75%</option>
<option value='50%'>50%</option>
<option value='25%'>25%</option>
</select>
<?
} /// 
?>



<? echo $SET_NEW_EDITOR_NEW_LINE;?> 

<?
if ($option_show_tool_images=="on") {
?>
<img title="Insert Image" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'Insert_Image');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>image.gif' width=20 height=20 border=0 /> 
<?
}

if ($option_show_tool_flash=="on") {
?>
<img   src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>flash.gif' width=20 height=20 class="button" title="Bold" type="btn"  onClick="MM_openBrWindow('../system_webeditor/editor_lite/flash_tool.php?MType=2','','status=yes,scrollbars=yes,width=580,height=290')" /> 
<?
}

if ($option_show_tool_emo=="on") {
?>
    <img title="Insert Emotions" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'Emotion');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>Emotion.gif' width=20 height=20 border=0 /> 
<?
}
?>
    <span class="spacer"></span> <img title="Special characters" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'Char');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>specialchar.gif' width=20 height=20 border=0 /> 
    <img title="Insert Line" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'InsertHorizontalRule');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>rule.gif' width=20 height=20 border=0 /> 
    <img title="Insert Link" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'Insert_link');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>Link.gif' width=20 height=20 border=0 /> 
    <span class="spacer"></span> <img title="Special characters" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'Char');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>help.gif' width=20 height=20 border=0 /> 


<? print $option_show_tool_br ; ?>




<img title="Bold" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'Bold');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>Bold.gif' width=20 height=20 border=0 />
<img title="Italic" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'Italic');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>Italic.gif' width=20 height=20 border=0 />
<img title="Underline" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'Underline');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>Under.gif' width=20 height=20 border=0 />
<span class="spacer"></span>
<img title="Left Justify" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'JustifyLeft','','p align=left');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>left.gif' width=20 height=20 border=0 />
<img title="Center" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'JustifyCenter','','p align=center');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>center.gif' width=20 height=20 border=0 />
<img title="Right Justify" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'JustifyRight','','p align=right');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>right.gif' width=20 height=20 border=0 />
<span class="spacer"></span>
<img title="Insert Numbered List" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'InsertOrderedList');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>NumList.gif' width=20 height=20 border=0 />
<img title="Insert Unordered List" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'InsertUnorderedList');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>bullist.gif' width=20 height=20 border=0 />
<span class="spacer"></span><img title="Indent Text" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'Indent');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>Indent.gif' width=20 height=20 border=0 />
<img title="Outdent Text" class="button" onclick="_Format(<? echo $SET_EDITOR_NAME ;?>,'Outdent');" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>Outdent.gif' width=20 height=20 border=0 />
<span class="spacer"></span><img id="<? echo $SET_EDITOR_NAME ;?>_forecolorimg" style="BACKGROUND-COLOR: red;" title="Font Color" class="SelectColor" onmousedown="_Format(<? echo $SET_EDITOR_NAME ;?>,'ForeColor',<? echo $SET_EDITOR_NAME ;?>_forecolorimg.style.backgroundColor);" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>fontcolor.gif' border="0" />
<img id="Set_forecolorimg" style="Width:9" title="Set Font Color" class="SelectColor" onmousedown="SelectColor(<? echo $SET_EDITOR_NAME ;?>,'<? echo $SET_EDITOR_NAME ;?>_forecolorimg',1);;" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>tbdown.gif' border="0" />
<div id="colorbox" style="display:none;width:200px;height:120px;overflow:visible;"></div>
<img id="<? echo $SET_EDITOR_NAME ;?>_bkcolorimg" style="BACKGROUND-COLOR: yellow;" title="HighLight" class="SelectColor" onmousedown="_Format(<? echo $SET_EDITOR_NAME ;?>,'BackColor',<? echo $SET_EDITOR_NAME ;?>_bkcolorimg.style.backgroundColor);" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>colorpen.gif' border="0" />
<img id="Set_backcolorimg" style="Width:9" title="Set Highlight" class="SelectColor" onmousedown="SelectColor(<? echo $SET_EDITOR_NAME ;?>,'<? echo $SET_EDITOR_NAME ;?>_bkcolorimg',2);;" type="btn" src='<? echo $NEW_EDITOR_IMAGES_PATH; ?>tbdown.gif' border="0" />
<br>
</nobr></div>


<div id="<? echo $SET_EDITOR_NAME ;?>_editBox" onpaste="oneditorpaste(<? echo $SET_EDITOR_NAME ;?>);"  style="width: <? echo $SET_NEW_EDITOR_WIDTH;?>; height:<? echo $SET_NEW_EDITOR_HIGHT;?>;" class="editBox"  >
<? echo $EDITOR_SHOW_DEFAULT_VALUE;?>
</div>





<Div id="<? echo $SET_EDITOR_NAME ;?>_sandbox" style="VISIBILITY: hidden; OVERFLOW: hidden; POSITION: absolute; WIDTH: 1px; HEIGHT: 1px;"></Div>
<div id="<? echo $SET_EDITOR_NAME ;?>_bottombar" onmouseup="m_up();" onmousedown="m_down();" onmouseover="m_over();" onmouseout="m_out();" onselectstart="doFalse()" ondragstart="doFalse()" style="margin-top:0;margin-left:3;margin-right:0;margin-bottom:0;padding:0;">

</div></div>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left"  >


<?
$editor_show_tap = "off" ; 
if ($editor_show_tap == "on") { 
?>
<img src="<? echo $NEW_EDITOR_IMAGES_PATH; ?>tb_design_tab_on.gif" hspace="0" vspace="0" border="0" class="CuteEditorButton" title="Normal" onclick="EditorView(<? echo $SET_EDITOR_NAME ;?>,0);" type="btn" />
<img src="<? echo $NEW_EDITOR_IMAGES_PATH; ?>tb_html_tab_on.gif" hspace="0" vspace="0" border="0" class="CuteEditorButton" title="HTML" onclick="EditorView(<? echo $SET_EDITOR_NAME ;?>,1);" type="btn" />
<img src="<? echo $NEW_EDITOR_IMAGES_PATH; ?>icon_preview.gif" hspace="0" vspace="0" border="0" class="CuteEditorButton" title="Preview" onclick="EditorView(<? echo $SET_EDITOR_NAME ;?>,2);" type="btn" />	
<?
} /// if ($editor_show_tap == "on") { 
?>
	
	
	</td>
  </tr>
</table>

<script language="javascript">	
var <? echo $SET_EDITOR_NAME ;?> =  new _CState('<? echo $SET_EDITOR_NAME ;?>','/upload/imgs','/_cute/CuteEditor_Files',30,'True','True','/uploads',100,'/uploads',100, 'en-en', 'br','False','#efefef','/uploads',100,'','');
<? echo $SET_EDITOR_NAME ;?>.Load();
</script>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
</center>
