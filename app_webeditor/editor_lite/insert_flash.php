<%
STOREPASSPORT=Request("SP")
%>
<html>
<head>
	<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
	<meta http-equiv="Page-Enter" content="blendTrans(Duration=0.1)">
	<meta http-equiv="Page-Exit" content="blendTrans(Duration=0.1)">
	<title>Insert Flash : STOREPASSPORT=<%=STOREPASSPORT%>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</title>
		
	
<style>
	.btn {border: 1px solid #d7d3cc;padding: 1px;cursor: default;Width:14px;Height: 12px;vertical-align: middle;}
	#browse_Img {Width:215;Height:210; VISIBILITY: inherit; Z-INDEX: 2;border: 1.5pt inset;}
	#upload_image {Height:80; VISIBILITY: inherit; Width: 320; Z-INDEX: 2}
	#cutePrev {
		border: 1.5pt inset;
		Width: 320px;
		Height: 210px;
		overflow: auto;
		text-align: center;
		vertical-align: top;
		padding: 0px;
	}
	select,input,td {font-family: MS Sans Serif; font-size: 9pt; vertical-align: top; cursor: hand;}
</style>
	 <link href="dialog.css" type="text/css" rel="stylesheet" />
</head>
<div id="colorbox" style="display:none;Width:200px;Height:120px;overflow:visible;"></div>
<body bgcolor="#F9F9F9" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<script language="javascript">
  <!--
    window.name = 'imglibrary';
  //-->
  </script>

<table border="0" cellspacing="2" cellpadding="0" Width="560" align="center" ID="Table1">
	<tr>
		<td valign="top">
			<iframe src="browse_flash.php?SP=<%=STOREPASSPORT%>&MType=2&FP=/uploads" id="browse_Img" frameborder="0" scrolling="auto"></iframe>		
		</td>
		<td valign="top">
			<div style="BORDER-RIGHT: 1.5pt inset; PADDING-RIGHT: 10px; BORDER-TOP: 1.5pt inset; PADDING-LEFT: 10px; PADDING-BOTTOM: 10px; VERTICAL-ALIGN: top; OVERFLOW: auto; BORDER-LEFT: 1.5pt inset; WIDTH: 330px; PADDING-TOP: 10px; BORDER-BOTTOM: 1.5pt inset; HEIGHT: 210px; BACKGROUND-COLOR: white; TEXT-ALIGN: center">
				<div id="divpreview" style="BACKGROUND-COLOR: white" height="100%" width="100%">
					&nbsp;
				</div>
			</div>
		</td>
	</tr>
</table>


<table border="0" cellspacing="2" cellpadding="0" Width="560" align="center" ID="Table2">
	<tr>
		<td nowrap Width=220>
			<fieldset style="padding:2px" align="center">
				<legend>Properties</legend>
				
				<table border=0 cellpadding=5 cellspacing=0 ID="Table3">
				<tr>
				<td>
				
				<table border=0 cellpadding=2 cellspacing=0 ID="Table4">
					<tr>
						<td  Width=100>Width:</td>
						<td><input type="text" name="Width" id="Width" style="Width : 80px;"  onchange="do_preview()" value="200"></td>
					</tr>
						<td>Height:</td>
						<td><input type="text" name="Height" id="Height" style="Width : 80px;"  onchange="do_preview()" value="200"></td>
					</tr>
					<tr>
						<td>Background color:</td>
						<td>
							<input type="text" id="bgColortext" name="bgColortext" size="7" style="Width:57px;" >
							<img src="images_Editor/Theme_V1/colorpicker.gif" width="21" height="18" align="absMiddle" id="s_bordercolor" onclick="SelectColor();">
						</td>
					</tr>
					<tr>
						<td>Transparency:</td>
						<td><input type="checkbox" name="Transparency" onchange="do_preview()" id="Transparency" value="Transparency"></td>
					</tr>
					<tr>
						<td>Quality</td>
						<td>
							<select name="Quality" id="Quality" style="Width : 80px;"  onchange="do_preview()" >
								<option selected value="high">High</option>
								<option value="medium">Medium</option>
								<option value="low">Low</option>
							</select>
						</td>
					</tr>
				</table>
				
				</td>
				</tr>
				</table>
			</fieldset>		
		</td>
		<td Width=10>
		</td>
		<td nowrap Width=330>
			<fieldset style="padding:2px" align="center" ><legend>Insert flash</legend><input type="hidden" id="imgpath" NAME="imgpath">
			<table border=0 cellpadding=5 cellspacing=0 ID="Table5">
				<tr>
				<td>
				<table border=0 cellpadding=2 cellspacing=0 ID="Table8">
					<tr>
						<td valign=middle>URL :</td>
						<td><input type="text" id="TargetUrl" size="40" NAME="TargetUrl"></td>
					</tr>
				</table>
				</td>
				</tr>
			</table>
			</fieldset>
			
			
			<fieldset  style="padding:2px" align="center">
				<input type="hidden" id="Hidden1" NAME="Hidden1">
				<legend>Upload (Max size 100K)</legend>
				<iframe src="upload.php?SP=<%=STOREPASSPORT%>&MType=2&FP=/uploads&MaxSize=100&Type=Flash" id="upload_image" frameborder="0" scrolling="auto"></iframe>
			</fieldset>	
						
		    <p align=center>
				<input type="button" value="Insert" style="Width:70px" onclick="insert_Flash()" >&nbsp;&nbsp;
				<input type="button" value="Preview" style="Width:70px" >&nbsp;&nbsp;
				<input type="button" value="Cancel" style="Width:70px" onclick="window.close()">						
			</p>
		</td>
	</tr>
</table>
</body>
</html>

<script language="JavaScript">
	var OxO9d4a=["returnValue","divpreview","TargetUrl","value","","Please choose a Flash movie to insert","Width","w","px","Height","h","Transparency","wm","bgColortext","bg","Quality","qu","swf","href","location","document","browse_flash.asp?FP=","\x3COBJECT align=\x22\x22 src=\x22","\x22 codebase=","\x22http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab\x22"," Height=\x22","\x22 Width=\x22","\x22 classid=","\x22clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\x22\x3E"," \x3CPARAM name=\x22_cx\x22 value=\x224180\x22\x3E"," \x3CPARAM name=\x22_cy\x22 value=\x221455\x22\x3E"," \x3CPARAM name=\x22FlashVars\x22 value=\x224180\x22\x3E"," \x3CPARAM name=\x22Movie\x22 value=\x22","\x22\x3E"," \x3CPARAM name=\x22Src\x22 value=\x22"," \x3CPARAM name=\x22WMode\x22 value=\x22Window\x22\x3E"," \x3CPARAM name=\x22Play\x22 value=\x22-1\x22\x3E"," \x3CPARAM name=\x22Loop\x22 value=\x22-1\x22\x3E"," \x3CPARAM name=\x22Quality\x22 value=\x22"," \x3CPARAM name=\x22SAlign\x22 value=\x22\x22\x3E"," \x3CPARAM name=\x22Menu\x22 value=\x22-1\x22\x3E"," \x3CPARAM name=\x22Base\x22 value=\x22\x22\x3E"," \x3CPARAM name=\x22AllowScriptAccess\x22 value=\x22always\x22\x3E"," \x3CPARAM name=\x22Scale\x22 value=\x22ShowAll\x22\x3E"," \x3CPARAM name=\x22DeviceFont\x22 value=\x220\x22\x3E"," \x3CPARAM name=\x22EmbedMovie\x22 value=\x220\x22\x3E"," \x3CPARAM name=\x22BGColor\x22 value=\x22"," \x3CPARAM name=\x22SWRemote\x22 value=\x22\x22\x3E","\x3C/OBJECT\x3E","innerHTML","TD","length","backgroundColor","style","#d7d3cc","color","black","highlight","highlighttext","src","upload_image","upload.asp?FP=","Do you want to delete the selected file(s)?","colorbox","#000000","#993300","#333300","#003300","#003366","#000080","#333399","#333333","#800000","#FF6600","#808000","#008000","#008080","#0000FF","#666699","#808080","#FF0000","#FF9900","#99CC00","#339966","#33CCCC","#3366FF","#800080","#999999","#FF00FF","#FFCC00","#FFFF00","#00FF00","#00FFFF","#00CCFF","#993366","#C0C0C0","#FF99CC","#FFCC99","#FFFF99","#CCFFCC","#CCFFFF","#99CCFF","#CC99FF","#FFFFFF","\x3Ctable cellpadding=0 cellspacing=5 style=\x27cursor: hand;font-family: Verdana; font-size: 6px; BORDER: #666666 1px solid;\x27 bgcolor=#efefef\x3E\x3Ctr\x3E\x3Ctd\x3E","\x3Ctable cellpadding=0 cellspacing=0 style=\x27font-size: 3px;\x27\x3E","\x3Ctr\x3E","\x3Ctd colspan=10 style=\x22border: solid 1px #efefef;\x22 onMouseOver=\x22parent.button_over(this)\x22 onMouseOut=\x22parent.button_out(this)\x22 onClick=parent.doColor() \x3E\x3Cdiv style=\x22padding: 2px; margin: 2px;\x22\x3E","\x3Ctable cellspacing=0 cellpadding=0 border=0 Width=90% style=\x22font-size:3px\x22\x3E","\x3Ctr\x3E\x3Ctd\x3E\x3Cdiv style=\x22background-color:#000000; border:solid 1px #808080; Width:12px; Height:12px\x22\x3E\x3C/div\x3E\x3C/td\x3E\x3Ctd align=center style=\x22font-size:11px\x22\x3EAutomatic\x26nbsp;\x26nbsp;\x26nbsp;\x26nbsp;\x26nbsp;\x26nbsp;\x3C/td\x3E\x3C/tr\x3E","\x3C/table\x3E","\x3C/div\x3E","\x3C/td\x3E","\x3C/tr\x3E","\x3Ctr\x3E\x3Ctd\x3E\x26nbsp;\x3C/td\x3E\x3C/tr\x3E","\x3Ctd onMouseOver=\x22parent.button_over(this)\x22  onMouseOut=\x22parent.button_out(this)\x22 onClick=parent.doColor(\x22","\x22) style=\x22padding:2px;border:solid 1px #efefef;\x22\x3E\x3Cdiv style=\x22background-color:","; border:solid 1px #808080; Width:12px; Height:12px\x22\x3E\x26nbsp;\x3C/div\x3E\x3C/td\x3E","\x3Ctd colspan=\x2210\x22 style=\x22Height:23px; font-family: arial; font-size:11px; border: solid 1px #efefef;\x22 onMouseOver=\x22parent.button_over(this)\x22 onMouseOut=\x22parent.button_out(this)\x22 onClick=parent.setMoreColors(\x22","\x22) align=center\x3E\x26nbsp;More Colors...\x3C/td\x3E","\x3C/td\x3E\x3C/tr\x3E","body","onmouseleave","dialogHeight:400px;dialogWidth:600px;center:Yes;help:No;scroll:No;resizable:No;status:No;","isOpen","borderColor","#0A246A","#B6BDD2","#efefef","keyCode","border","1px solid #00107B","background","#F1EEE7","1px solid #d7d3cc"];var popUp=window.createPopup();var currentfolder='browse_Flash.asp?FP=/uploads'; function cancel(){ window[OxO9d4a[0x0]]=null ; window.close() ;}  ;var divpreview=document.getElementById(OxO9d4a[0x1]);var parameters= new Array(); function insert_Flash(){var Ox1e1=document.getElementById(OxO9d4a[0x2]);if(Ox1e1[OxO9d4a[0x3]]==OxO9d4a[0x4]){ alert(OxO9d4a[0x5]) ;return false;} ; parameters[OxO9d4a[0x7]]=document.getElementById(OxO9d4a[0x6])[OxO9d4a[0x3]]+OxO9d4a[0x8] ; parameters[OxO9d4a[0xa]]=document.getElementById(OxO9d4a[0x9])[OxO9d4a[0x3]]+OxO9d4a[0x8] ; parameters[OxO9d4a[0xc]]=document.getElementById(OxO9d4a[0xb])[OxO9d4a[0x3]] ; parameters[OxO9d4a[0xe]]=document.getElementById(OxO9d4a[0xd])[OxO9d4a[0x3]] ;;; parameters[OxO9d4a[0x10]]=document.getElementById(OxO9d4a[0xf])[OxO9d4a[0x3]] ; parameters[OxO9d4a[0x11]]=Ox1e1[OxO9d4a[0x3]] ; window[OxO9d4a[0x0]]=parameters ; window.close() ;}  ; function UploadSaved(Ox1d9,Ox6){ TargetUrl[OxO9d4a[0x3]]=Ox1d9 ; browse_Img[OxO9d4a[0x14]][OxO9d4a[0x13]][OxO9d4a[0x12]]=OxO9d4a[0x15]+Ox6 ; do_preview() ;}  ; function do_preview(){var Ox1e3;var Ox1e4;var Ox1e1=document.getElementById(OxO9d4a[0x2]);var Ox1e5=document.getElementById(OxO9d4a[0xd])[OxO9d4a[0x3]];var Ox1e6=document.getElementById(OxO9d4a[0x6])[OxO9d4a[0x3]];var Ox1e7=document.getElementById(OxO9d4a[0x9])[OxO9d4a[0x3]];var Ox1e8=document.getElementById(OxO9d4a[0xf])[OxO9d4a[0x3]];var Ox1e9=document.getElementById(OxO9d4a[0xb]); preview_width=0x118 ; preview_height=0x104 ; w=parseInt(Ox1e6) ; h=parseInt(Ox1e7) ;if(w>h){ Ox1e6=preview_width ; Ox1e7=preview_height*h/w ;} else { Ox1e6=preview_width*w/h ; Ox1e7=preview_height ;} ; Ox1e6=parseInt(Ox1e6) ; Ox1e7=parseInt(Ox1e7) ; Ox1e4=OxO9d4a[0x16]+Ox1e1[OxO9d4a[0x3]]+OxO9d4a[0x17]+OxO9d4a[0x18]+OxO9d4a[0x19]+Ox1e7+OxO9d4a[0x1a]+Ox1e6+OxO9d4a[0x1b]+OxO9d4a[0x1c]+OxO9d4a[0x1d]+OxO9d4a[0x1e]+OxO9d4a[0x1f]+OxO9d4a[0x20]+Ox1e1[OxO9d4a[0x3]]+OxO9d4a[0x21]+OxO9d4a[0x22]+Ox1e1[OxO9d4a[0x3]]+OxO9d4a[0x21]+OxO9d4a[0x23]+OxO9d4a[0x24]+OxO9d4a[0x25]+OxO9d4a[0x26]+Ox1e8+OxO9d4a[0x21]+OxO9d4a[0x27]+OxO9d4a[0x28]+OxO9d4a[0x29]+OxO9d4a[0x2a]+OxO9d4a[0x2b]+OxO9d4a[0x2c]+OxO9d4a[0x2d]+OxO9d4a[0x2e]+Ox1e5+OxO9d4a[0x21]+OxO9d4a[0x2f]+OxO9d4a[0x30] ; divpreview[OxO9d4a[0x31]]=Ox1e4 ;}  ; function highlightcell(Ox2){var Ox3=document.getElementsByTagName(OxO9d4a[0x32]);for( i=0x0 ;i<Ox3[OxO9d4a[0x33]];i++){ Ox3[i][OxO9d4a[0x35]][OxO9d4a[0x34]]=OxO9d4a[0x36] ; Ox3[i][OxO9d4a[0x35]][OxO9d4a[0x37]]=OxO9d4a[0x38] ;} ; Ox2[OxO9d4a[0x35]][OxO9d4a[0x34]]=OxO9d4a[0x39] ; Ox2[OxO9d4a[0x35]][OxO9d4a[0x37]]=OxO9d4a[0x3a] ;}  ; function SetUpload_FlashPath(Ox6){ document.getElementById(OxO9d4a[0x3c])[OxO9d4a[0x3b]]=OxO9d4a[0x3d]+Ox6+'&MaxSize=100&Type=Flash' ;}  ; function Delete(){if(confirm(OxO9d4a[0x3e])==true){return true;} else {return false;} ;}  ; function SelectColor(){var Ox216=s_bordercolor[OxO9d4a[0x35]][OxO9d4a[0x34]];var Ox1d=document.getElementById(OxO9d4a[0x3f]);var Ox1e=OxO9d4a[0x4];var Ox1f= new Array(OxO9d4a[0x40],OxO9d4a[0x41],OxO9d4a[0x42],OxO9d4a[0x43],OxO9d4a[0x44],OxO9d4a[0x45],OxO9d4a[0x46],OxO9d4a[0x47],OxO9d4a[0x48],OxO9d4a[0x49],OxO9d4a[0x4a],OxO9d4a[0x4b],OxO9d4a[0x4c],OxO9d4a[0x4d],OxO9d4a[0x4e],OxO9d4a[0x4f],OxO9d4a[0x50],OxO9d4a[0x51],OxO9d4a[0x52],OxO9d4a[0x53],OxO9d4a[0x54],OxO9d4a[0x55],OxO9d4a[0x56],OxO9d4a[0x57],OxO9d4a[0x58],OxO9d4a[0x59],OxO9d4a[0x5a],OxO9d4a[0x5b],OxO9d4a[0x5c],OxO9d4a[0x5d],OxO9d4a[0x5e],OxO9d4a[0x5f],OxO9d4a[0x60],OxO9d4a[0x61],OxO9d4a[0x62],OxO9d4a[0x63],OxO9d4a[0x64],OxO9d4a[0x65],OxO9d4a[0x66],OxO9d4a[0x67]);var Ox20=Ox1f[OxO9d4a[0x33]];var Ox1f3=0x8; Ox1e+=OxO9d4a[0x68] ; Ox1e+=OxO9d4a[0x69] ; Ox1e+=OxO9d4a[0x6a] ; Ox1e+=OxO9d4a[0x6b] ; Ox1e+=OxO9d4a[0x6c] ; Ox1e+=OxO9d4a[0x6d] ; Ox1e+=OxO9d4a[0x6e] ; Ox1e+=OxO9d4a[0x6f] ; Ox1e+=OxO9d4a[0x70] ; Ox1e+=OxO9d4a[0x71] ; Ox1e+=OxO9d4a[0x72] ;for(var i=0x0;i<Ox20;i++){if((i%Ox1f3)==0x0){ Ox1e+=OxO9d4a[0x6a] ;} ; Ox1e+=OxO9d4a[0x73]+Ox1f[i]+OxO9d4a[0x74]+Ox1f[i]+OxO9d4a[0x75] ;if(((i+0x1)>=Ox20)||(((i+0x1)%Ox1f3)==0x0)){ Ox1e+=OxO9d4a[0x71] ;} ;} ; Ox1e+=OxO9d4a[0x72] ; Ox1e+=OxO9d4a[0x6a] ; Ox1e+=OxO9d4a[0x76]+Ox1f[i]+OxO9d4a[0x77] ; Ox1e+=OxO9d4a[0x71] ; Ox1e+=OxO9d4a[0x6e] ; Ox1e+=OxO9d4a[0x78] ; Ox1e+=OxO9d4a[0x6e] ; Ox1d[OxO9d4a[0x31]]=Ox1e ; hidePopup() ;var Ox22=popUp[OxO9d4a[0x14]][OxO9d4a[0x79]]; popUp[OxO9d4a[0x14]][OxO9d4a[0x79]][OxO9d4a[0x7a]]=hidePopup ; popUp[OxO9d4a[0x14]][OxO9d4a[0x79]][OxO9d4a[0x31]]=Ox1d[OxO9d4a[0x31]] ; popUp.show(0x0,0x19,0xa0,0xa0,s_bordercolor) ;}  ; function row_click(Ox6){ document.getElementById(OxO9d4a[0x2])[OxO9d4a[0x3]]=Ox6 ; do_preview() ;}  ; function doColor(Ox24){if(Ox24){ bgColortext[OxO9d4a[0x3]]=Ox24.toUpperCase() ; bgColortext[OxO9d4a[0x35]][OxO9d4a[0x34]]=Ox24 ; s_bordercolor[OxO9d4a[0x35]][OxO9d4a[0x34]]=Ox24 ;} ; do_preview() ; hidePopup() ;}  ; function setMoreColors(Ox24,Oxde){ Ox24=window.showModalDialog('colorpicker.asp?UC=en-en',s_bordercolor[OxO9d4a[0x35]].backgroundColor,OxO9d4a[0x7b]) ;if(Ox24){ bgColortext[OxO9d4a[0x3]]=Ox24.toUpperCase() ; bgColortext[OxO9d4a[0x35]][OxO9d4a[0x34]]=Ox24 ; s_bordercolor[OxO9d4a[0x35]][OxO9d4a[0x34]]=Ox24 ;} ; hidePopup() ;}  ; function hidePopup(){if(popUp){if(popUp[OxO9d4a[0x7c]]){ popUp.hide() ;} ;} ;}  ; function button_over(Ox28){ Ox28[OxO9d4a[0x35]][OxO9d4a[0x7d]]=OxO9d4a[0x7e] ; Ox28[OxO9d4a[0x35]][OxO9d4a[0x34]]=OxO9d4a[0x7f] ;}  ; function button_out(Ox28){ Ox28[OxO9d4a[0x35]][OxO9d4a[0x7d]]=OxO9d4a[0x80] ; Ox28[OxO9d4a[0x35]][OxO9d4a[0x34]]=OxO9d4a[0x80] ;}  ; function IsDigit(){return ((event[OxO9d4a[0x81]]>=0x30)&&(event[OxO9d4a[0x81]]<=0x39));}  ; function Check(Ox53,Ox42){if(Ox42==0x1){ Ox53[OxO9d4a[0x35]][OxO9d4a[0x82]]=OxO9d4a[0x83] ; Ox53[OxO9d4a[0x35]][OxO9d4a[0x84]]=OxO9d4a[0x85] ;} else { Ox53[OxO9d4a[0x35]][OxO9d4a[0x82]]=OxO9d4a[0x86] ; Ox53[OxO9d4a[0x35]][OxO9d4a[0x84]]=OxO9d4a[0x36] ;} ;}  ;
</script>
