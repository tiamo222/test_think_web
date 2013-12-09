<%
STOREPASSPORT=Request("SP")
%>
<html>
<head>
	<title>Insert Image  :  STOREPASSPORT=<%=STOREPASSPORT%>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</title>
	
	
	<script language="JavaScript">
	
	var popUp = window.createPopup();
	var sAction = "INSERT";
	var sTitle = "INSERT";

	var oControl;
	var oSeletion;
	var sRangeType;

	var v_imgname = "1x1.gif";
	var v_imgpath = "";
	var v_AlternateText = "";
	var v_Border = "0";
	var v_BorderColor = "#000000";
	var v_sFilter = "";
	var v_sAlign = "";
	var v_Width;
	var v_Height;
	var v_VSpace;
	var v_HSpace;

	var sCheckFlag = "file";
	
	var oControl     = window.dialogArguments;
	if(oControl)
	{
		v_imgname = oControl.src;
		v_imgpath = oControl.value;
		v_Action = "MODI";
		v_Title = "Modify";
		//alert(typeof oControl);
		v_AlternateText = oControl.alt;
		v_Border = oControl.border;
		//alert(typeof oControl.border);
		v_BorderColor = oControl.style.borderColor;
		v_Filter = oControl.style.filter;
		v_Align = oControl.align;
		v_Width = oControl.width;
		v_Height = oControl.height;
		v_VSpace = oControl.vspace;
		v_HSpace = oControl.hspace;
	}
			
	function SetWidthandHeight()
	{
		Width.value		= "";
		Height.value	= "";
	}
		
	function insert_Image() 
	{		
		var sHTML = '<img' 
				+ attr("src", imgname.value)
				+ attr("alt", AlternateText.value) 
				+ attr("align", Align.value)
				+ ((Width.value)  ? attr("width" , Width.value)  : "")
				+ ((Height.value) ? attr("height", Height.value) : "")
				+ ((VSpace.value) ? attr("vspace", VSpace.value) : "")
				+ ((HSpace.value) ? attr("hspace", HSpace.value) : "")
				+ ((Border.value) ? attr("border", Border.value) : attr("border",0))				
				+ ((bordercolor.value&&(Border.value > 0)) ? attr("style", "border-color="+bordercolor.value) : "")
				+ '/>';
		
		window.returnValue = sHTML;
		window.close();
	}
	
	function UploadSaved(sFileName){
		imgname.value = sFileName;
		browse_Img.document.location.href = "browse_Img.asp?GP=/upload/imgs";
		Img_Preview();
	}
	function Img_Preview()
	{
		previewpic.src = imgname.value;
		previewpic.mvalue = imgpath.value;		
		previewpic.alt = AlternateText.value;
		previewpic.align = Align.value;
		if(Width.value&& Width.value != "")			
			previewpic.width = Width.value;			
		if(Height.value&& Height.value != "")			
			previewpic.height = Height.value;
		previewpic.vspace = VSpace.value;
		previewpic.hspace = HSpace.value;
		previewpic.border = Border.value;	
		previewpic.style.borderColor = bordercolor.value;	
		//alert(previewpic.style.borderColor);  adam
	}
	
	function attr(name, value) 
	{
		if (!value || value == "") return "" ;
			return ' ' + name + '="' + value + '"' ;
	}
	
	function Check(t,n)	
	{
		if(n==1) {
			t.style.border = "1px solid #00107B";
			t.style.background = "#F1EEE7";
		}
		else  {
			t.style.border = "1px solid #efefef";
			t.style.background = "#efefef";
		}
	}
	function Init()
	{
		if(v_imgname!='1x1.gif')
		{
			imgname.value = v_imgname;
			imgpath.value = v_imgpath;
			AlternateText.value = v_AlternateText;
			Border.value		= v_Border;
			bordercolor.value	= v_BorderColor;  // this the value of the border color
			s_bordercolor.style.backgroundColor = v_BorderColor;
			Width.value			= v_Width;
			Height.value		= v_Height;
			VSpace.value		= v_VSpace;
			HSpace.value		= v_HSpace;
			Img_Preview();
		}
	}
	function SetBgcolor()
	{
		var orginalcolor = s_bordercolor.style.backgroundColor;
		
		var div = document.getElementById('colorbox');
	
		var temp_html = '';
		var colors = new Array("#000000","#993300","#333300","#003300","#003366","#000080","#333399","#333333",
		"#800000","#FF6600","#808000","#008000","#008080","#0000FF","#666699","#808080",
		"#FF0000","#FF9900","#99CC00","#339966","#33CCCC","#3366FF","#800080","#999999",
		"#FF00FF","#FFCC00","#FFFF00","#00FF00","#00FFFF","#00CCFF","#993366","#C0C0C0",
		"#FF99CC","#FFCC99","#FFFF99","#CCFFCC","#CCFFFF","#99CCFF","#CC99FF","#FFFFFF");				
		var total = colors.length;
		var width = 8;

		temp_html += "<table cellpadding=0 cellspacing=5 style='cursor: hand;font-family: Verdana; font-size: 6px; BORDER: #666666 1px solid;' bgcolor=#efefef><tr><td>";
		temp_html += "<table cellpadding=0 cellspacing=0 style='font-size: 3px;'>";
		temp_html += '<tr>';
		temp_html += '<td colspan=10 style="border: solid 1px #efefef;" onMouseOver="parent.button_over(this)" onMouseOut="parent.button_out(this)" onClick=parent.doColor() ><div style="padding: 2px; margin: 2px;">';
		temp_html += '<table cellspacing=0 cellpadding=0 border=0 width=90% style="font-size:3px">';
		temp_html += '<tr><td><div style="background-color:#000000; border:solid 1px #808080; width:12px; height:12px"></div></td><td align=center style="font-size:11px">Automatic&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>';
		temp_html += '</table>';
		temp_html += '</div>';
		temp_html += '</td>';
		temp_html += '</tr>';
		temp_html += '<tr><td>&nbsp;</td></tr>';

		for (var i=0; i<total; i++) {
			if ((i % width) == 0) 
			temp_html += "<tr>"; 
			temp_html += '<td onMouseOver="parent.button_over(this)"  onMouseOut="parent.button_out(this)" onClick=parent.doColor("'+colors[i]+'") style="padding:2px;border:solid 1px #efefef;"><div style="background-color:'+colors[i]+'; border:solid 1px #808080; width:12px; height:12px">&nbsp;</div></td>';
			if ( ((i+1)>=total) || (((i+1) % width) == 0)) { 
				temp_html += "</tr>";
			}
		}		
		temp_html += '<tr><td>&nbsp;</td></tr>';
		temp_html += '<tr>';
		temp_html += '<td colspan="10" style="height:23px; font-family: arial; font-size:11px; border: solid 1px #efefef;" onMouseOver="parent.button_over(this)" onMouseOut="parent.button_out(this)" onClick=parent.setMoreColors("'+colors[i]+'") align=center>&nbsp;More Colors...</td>';
		temp_html += '</tr>';
		temp_html += '</table>';
		temp_html += '</td></tr>';
		temp_html += '</table>';
	
		div.innerHTML = temp_html;
	
		hidePopup();
		// Retrieve the source element which fired the event.
		var oPopBody = popUp.document.body;
		popUp.document.body.onmouseleave = hidePopup;
		popUp.document.body.innerHTML = div.innerHTML; 
		popUp.show(0,25, 160, 160, s_bordercolor);
	}
	
	function doColor(oColor) {
		if (oColor)
		{
			bordercolor.value= oColor.toUpperCase();
			s_bordercolor.style.backgroundColor = oColor;
		}
		hidePopup();
	}

	function setMoreColors(oColor,filepath) {

		oColor = window.showModalDialog('ColorPicker.htm',s_bordercolor.style.backgroundColor,'dialogHeight:455px;dialogWidth:370px;center:Yes;help:No;scroll:No;resizable:No;status:No;');
		if (oColor)
		{
			bordercolor.value=oColor.toUpperCase();
			s_bordercolor.style.backgroundColor = oColor;
		}
		hidePopup();
	}
	
	function hidePopup(){if(popUp) if(popUp.isOpen)	popUp.hide();}
	function button_over(eButton){
		eButton.style.borderColor = "#0A246A";
		eButton.style.backgroundColor = "#B6BDD2";
	}		
	function button_out(eButton){
		eButton.style.borderColor = "#efefef";
		eButton.style.backgroundColor = "#efefef";
	}
	function IsDigit(){
		return ((event.keyCode >= 48) && (event.keyCode <= 57));
	}
	
	
///////////////////////////// DELETE
 function deleteClick()
 {
 
selectdelete = imgpath.value;

      if (selectdelete!="" )
      {
       
//----------------------------------------------------------------
// ยืนยันการลบภาพ

	del = window.confirm("กรุณายืนยันการลบภาพ!!");			
	if(del)
	{
	////	formDelete.submit();			
	}


//window.close();
//----------------------------------------------------------------
      }
      else
      {
         alert('กรุณาเลือกภาพที่ต้องการลบ');
      }
}

</script>
<script language="javascript">
  <!--
    window.name = 'imglibrary';
  //-->
  </script>

<style>
	.btn {border: 1px solid #efefef;padding: 1px;cursor: default;width:14px;height: 12px;vertical-align: middle;}
	#browse_Img {width:215;height:210; VISIBILITY: inherit; Z-INDEX: 2; border: 1.5pt inset;}
	#upload_image {height:80; VISIBILITY: inherit; width: 320; Z-INDEX: 2}
	#cutePrev {
		border: 1.5pt inset;
		width: 335px;
		height: 210px;
		overflow: auto;
		text-align: center;
		vertical-align: top;
		padding: 0px;
	}
	select,input,td {font-family: MS Sans Serif; font-size: 9pt; vertical-align: top; cursor: hand;}
</style>
<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">	
<link href="../System/Font_Style.css" rel="stylesheet" type="text/css">
</head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"><div id="colorbox" style="display:none;width:200px;height:120px;overflow:visible;"></div>
<body bgcolor="#efefef" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onload="Init();">

<center>
<table border="0" cellspacing="2" cellpadding="0" width="560" align="center" ID="Table1">
	<tr>
		<td valign="top">
			<iframe src="browse_Img.php?SP=<%=STOREPASSPORT%>&MType=1&GP=/upload/imgs" id="browse_Img" frameborder="0" scrolling="auto"></iframe>	
		</td>
		<td valign="top">
			<div id="cutePrev" style=" text-align:left; background-color: white" >
				<center><IMG src="images_Editor/icon_nopic.gif" NAME="previewpic" hspace="0" vspace="0" id=previewpic" ></center>
			</div>
		</td>
	</tr>
</table>

<table border="0" cellspacing="2" cellpadding="0" width="560" align="center" ID="Table2">
	<tr>
		<td nowrap width=220>
			<fieldset  style="padding:2px">
      <legend> <b>Layout </b></legend>			
			<table border=0 cellpadding=5 cellspacing=0 ID="Table6">
				<tr>
				<td>
				<table border=0 cellpadding=2 cellspacing=0 ID="Table3">
					<tr>
						
                <td width=100 align="right">Alignment : </td>
						<td>
						<select NAME=ImgAlign style="width : 80px;" ID="Align" onchange="Img_Preview()">
							<OPTION id=optNotSet value="">Not set</OPTION>
							<OPTION id=optLeft value=left>Left</OPTION>
							<OPTION id=optRight value=right>Right</OPTION> 
							<OPTION id=optTexttop value=textTop>Texttop</OPTION>
							<OPTION id=optAbsMiddle value=absMiddle>Absmiddle</OPTION>
							<OPTION id=optBaseline value=baseline selected>Baseline</OPTION>
							<OPTION id=optAbsBottom value=absBottom>Absbottom</OPTION>
							<OPTION id=optBottom value=bottom>Bottom</OPTION>
							<OPTION id=optMiddle value=middle>Middle</OPTION> 
							<OPTION id=optTop value=top>Top</OPTION>
						</select>
						</td>
					</tr>
					<tr>
						
                <td align="right" nowrap>Border Thickness : </td>
						<td>
							<INPUT TYPE=TEXT SIZE=2  NAME=Border   onchange="Img_Preview()" ONKEYPRESS="event.returnValue=IsDigit();" style="width : 80px;" ID="Border">
						</td>
					</tr>
					<tr>
						
                <td align="right" nowrap>Border Color : </td>
						<td>
							<input type="text" id="bordercolor" name="bordercolor" size="7" style="width:57px;" >
							<img src="images_Editor/Theme_V1/colorpicker.gif" width="21" height="18" align="absMiddle" id="s_bordercolor" onclick="SetBgcolor();">
						</td>
					</tr>
					<tr>
						
                <td align="right" nowrap>Width : </td>
						<td>
							<INPUT TYPE=TEXT SIZE=2  NAME=Width   onchange="Img_Preview()" ONKEYPRESS="event.returnValue=IsDigit();" style="width : 80px;" ID="Width">
						</td>
					</tr>
					<tr>
						
                <td align="right" nowrap>Height : </td>
						<td>
							<INPUT TYPE=TEXT SIZE=2  NAME=Height   onchange="Img_Preview()" ONKEYPRESS="event.returnValue=IsDigit();" style="width : 80px;" ID="Height">
						</td>
					</tr>
				</table>
				</td>
				</tr>
				</table>
			</fieldset>
			
			
			<fieldset style="padding:2px">
      <legend> <b>Spacing </b></legend>		
			<table border=0 cellpadding=5 cellspacing=0 ID="Table4">
				<tr>
				<td>
				<table border=0 cellpadding=2 cellspacing=0 ID="Table7">
				<tr>
					
                <td width=100 align="right" valign=middle>Horizontal : </td>
					<td><INPUT TYPE=TEXT SIZE=2  NAME=HSpace  value="" onchange="Img_Preview()" ONKEYPRESS="event.returnValue=IsDigit();" style="width:80px;" ID="HSpace"> </td>
				</tr>
				<tr>
					
                <td align="right" valign=middle>Vertical : </td>
					<td><INPUT TYPE=TEXT SIZE=2  NAME=VSpace   onchange="Img_Preview()" ONKEYPRESS="event.returnValue=IsDigit();" style="width:80px;" ID="VSpace"></td>
				</tr>
				</table>
				</td>
				</tr>
			</table>
			</fieldset>
			
		</td>
		<td width=10>
		</td>
		<td nowrap width=330>
			
			<fieldset style="padding:2px" align="center" >
      <legend><b>Insert Image</b></legend>
      <input type="hidden" id="imgpath" NAME="imgpath">
			<table width="100%" border=0 cellpadding=5 cellspacing=0 ID="Table5">
				<tr>
				<td>
				<table width="100%" border=0 cellpadding=2 cellspacing=0 ID="Table8">
					<tr>
						
                <td align="right" valign=middle>URL : </td>
						<td width="1" align="left" valign="middle"><input type="text" id="imgname" size="35" NAME="imgname"></td>
					</tr>
					<tr>
						
                <td align="right" valign=middle>Alternate Text : </td>
						<td align="left" valign=middle><input type="text" id="AlternateText" size="35" NAME="Text4"></td>
					</tr>
				</table>
				</td>
				</tr>
			</table>
			</fieldset>
			
			
			<fieldset  style="padding:2px" align="center">
				<input type="hidden" id="Hidden1" NAME="Hidden1">
        <legend><b>Upload</b> (Max size 100 Kb) </legend>
				<iframe src="upload.php?SP=<%=STOREPASSPORT%>&MType=1&FP=/upload/imgs&MaxSize=30&BG=%23efefef&Type=Image" id="upload_image" frameborder="0" scrolling="no"></iframe>
			</fieldset>
			
				
	 
<table width="100" border="0" align="center" cellpadding="0" cellspacing="4"><tr align="center" valign="bottom">
            <td> <br>
              <input type="button" value="+ เลือกใช้งานภาพนี้" style="width:130px" onclick="insert_Image()" ID="Button3" NAME="Button1"  class="bot1" ></td>
            <td> <br>
              <input type="button" value="ยกเลิก" style="width:60px" onclick="window.close()" ID="Button4" NAME="Button2" class="bot1"></td>
            <form name="formDelete" method="post" action="deletefile_exe.php"  target="imglibrary">
			<input NAME="imgpath" type="hidden" id="imgpath"   >
			<input name="SP" type="hidden" id="SP" value="<%=STOREPASSPORT%>">
			<td> <br>
                 
                <input type="button" value="x ลบภาพที่เลือก" style="width:110px" ID="Button1" NAME="Button1" class="bot1" onclick="deleteClick();"   ></td></form></tr></table>
		</td>
	</tr>
</table>
</center>
</body>
</html>
