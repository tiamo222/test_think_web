
<html>
<head>
	<title>Insert Link
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
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

	var v_imgname = "";
	var v_Title = "";
	var v_Target = "";
	var v_linkcolor = "";
	var v_protocol = "";

	var sCheckFlag = "file";
	
	var oControl     = window.dialogArguments;
	if(oControl)
	{
		v_imgname    = oControl.getAttribute("href",2) ;	
		//alert(oControl.style.color);	
		//alert(oControl.getAttribute("target"));	...adam
		v_Title  = oControl.title;
		v_Target  = oControl.target;
		v_linkcolor = oControl.style.color;
		v_protocol = getProtocol(v_imgname);
		
		if(v_Target == "" || v_Target == null)
			v_Target = "Not set";
	//	alert(oControl.style.color);
	}	
				
	var parameters = new Array();	//adam send an array instead of one value!
	
	function insert_link() 
	{		
		parameters['href'] = imgname.value;
		parameters['Title'] = Title.value;
		if (Target.value == "Not set")
			parameters['Target'] = ""
		else
			parameters['Target'] = Target.value;
		parameters['linkcolor'] = linkcolor.value;
		//alert(linkcolor.value);
		
		window.returnValue = parameters;
		window.close();
	}
	
	function attr(name, value) 
	{
		if (!value || value == "") return "" ;
			return ' ' + name + '="' + value + '"' ;
	}

	function Init()
	{
		if(v_imgname!= "")
		{
			imgname.value = v_imgname;		
			Title.value = v_Title;	
			Target.value = v_Target;		
			linkcolor.value = v_linkcolor;			
			s_linkcolor.style.backgroundColor = v_linkcolor;
		}
	}

	function Setcolor()
	{
		var orginalcolor = s_linkcolor.style.backgroundColor;
		
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
		popUp.show(0,25, 160, 160, s_linkcolor);
	}
	
	function doColor(oColor) {
		if (oColor)
		{
			linkcolor.value= oColor.toUpperCase();
			s_linkcolor.style.backgroundColor = oColor;
		}
		hidePopup();
	}

	function setMoreColors(oColor,filepath) {

		oColor = window.showModalDialog('ColorPicker.htm',s_linkcolor.style.backgroundColor,'dialogHeight:455px;dialogWidth:370px;center:Yes;help:No;scroll:No;resizable:No;status:No;');
		if (oColor)
		{
			linkcolor.value=oColor.toUpperCase();
			s_linkcolor.style.backgroundColor = oColor;
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
	function changeProtocol(index){
		sProtocol= protocol.options[index].value;
		sUrl = imgname.value;
		var re = /(.+:\/*)/gi;
		sUrl = sUrl.replace(re, "");
		imgname.value = sProtocol + sUrl;
	}	
	function getProtocol(url){
		var re=/(.+:\/*)(.*)/gi;
		return url.replace(re,"$1");	
	}
</script>
<style>
	.btn {border: 1px solid buttonface;padding: 1px;cursor: default;width:14px;height: 12px;vertical-align: middle;}
	#browse_Document {width:560;height:200; VISIBILITY: inherit; Z-INDEX: 2; border: 1.5pt inset;}
	#upload_document {height:60; VISIBILITY: inherit; width: 320; Z-INDEX: 2}
	#cutePrev {
		border: 1.5pt inset;
		width: 320px;
		height: 300px;
		overflow: auto;
		text-align: center;
		vertical-align: top;
		padding: 10px;
	}
	select,input,td {font-family: MS Sans Serif; font-size: 9pt; vertical-align: top; cursor: hand;}
</style>
<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">	
</head>
<body bgcolor="#efefef" onload="Init();">

<div id="colorbox" style="display:none;width:200px;height:120px;overflow:visible;"></div>

<table border="0" cellspacing="2" cellpadding="5" width="340" align="center" ID="Table2">
	<tr>
		<td nowrap width=330>
			
			<fieldset style="padding:2px" align="center" ><legend>Hyperlink Information</legend><input type="hidden" id="imgpath" NAME="imgpath">
			<table border=0 cellpadding=5 cellspacing=0 ID="Table5">
				<tr>
				<td>
				<table border=0 cellpadding=2 cellspacing=0 ID="Table8">
					<tr>
						<td width=60>Target:</td>
						<td>
						<select NAME=Target style="width : 100px;" ID="Target">
							<OPTION id=optNotSet value="Not set" selected>Not set</OPTION>
							<OPTION id=optNewWindow value="_blank">New Window</OPTION>
							<OPTION id=optParentWindow value="_parent">Parent Window</OPTION>
							<OPTION id=optSameWindow value="_self">Same Window</OPTION>
							<OPTION id=optTopWindow  value="_top">Topmost Window</OPTION>
						</select>
						</td>
						<td>&nbsp;</td>
						<td width=60>Type:</td>
						<td nowrap>
							<select name="protocol" onchange="changeProtocol(this.selectedIndex);" id="protocol">
								<option value="http://" selected>http</option>
								<option value="https://">https</option>
								<option value="mailto:">mailto</option>
								<option value="file://">file</option>
								<option value="ftp://">ftp</option>
								<option value="gopher://">gopher</option>
								<option value="news:">news</option>
								<option value="telnet:">telnet</option>
								<option value="wias:">wias</option>
								<option value="javascript:">javascript</option>
								<option value="">Other</option>
							</select>
						</td>
					</tr>
					<tr>
						<td valign=middle>URL:</td>
						<td colspan="4"><input type="text" id="imgname" size="40" value="http://" NAME="imgname"></td>
					</tr>
					<tr>
						<td valign=middle>Title:</td>
						<td  colspan="4" valign=middle><input type="text" id="Title" size="40" NAME="Title"></td>
					</tr>
					<tr>
						<td nowrap>Link Color:</td>
						<td  colspan="4">
							<input type="text" id="linkcolor" name="linkcolor" size="7" style="width:76px;" >
							<img src="images_Editor/Theme_V1/colorpicker.gif" width="21" height="18" align="absMiddle" id="s_linkcolor" onclick="Setcolor();">
						</td>
					</tr>
				</table>
				</td>
				</tr>
			</table>
			</fieldset>
			<br>
			<div style="width:60%; text-align:center">
				<input type="button" value="Insert" style="width:70px" onclick="insert_link()" ID="Button2" NAME="Button1">&nbsp;&nbsp;
				<input type="button" value="Cancel" style="width:70px" onclick="window.close()" ID="Button6" NAME="Button2">						
			</div>
		</td>
	</tr>
</table>
</body>
</html>
