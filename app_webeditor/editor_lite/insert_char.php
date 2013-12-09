
<html>
	<head>
		<title>Special characters 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </title>
		<script language="javascript">function writeChars(){var tds=22;var str="";for(var i=33;i<256;){document.write('<tr>');for(var j=0;j<=tds;j++){document.write('<td style=\"align: left; height: 20; font-size: 12px; FONT-FAMILY: Verdana;\" bgcolor=white width=\"18\" align=center onClick=\"getchar(this)\" onmouseover=\"spcOver(this)\" onmouseout=\"spcOut(this)\" title=\"" + Chars[i] + "\" >');document.write('&#'+i+';');document.write('</td>');i++;};document.write('</tr>');};};function spcOver(el){el.style.background="#0A246A";el.style.color="white";};function spcOut(el){el.style.background="white";el.style.color="black";};function getchar(obj){if(!obj.innerHTML)return;window.returnValue=obj.innerHTML||"";window.close();};function cancel(){window.returnValue=null;window.close();};</script>	
	</head>
	<body bgcolor="#efefef">
		<form id="Insert_chart" method="post" runat="server">
			<table border="0" cellspacing="2" cellpadding="2" width="96%" align="center">
				<tr>
					<td align="center">
						<fieldset style="padding-bottom:5px" align="center" style="font-family: MS Sans Serif; font-size: 9pt; vertical-align: middle; cursor: hand;">
							<legend>
								Special characters
							</legend>
							<br>
							<TABLE width="95%" cellspacing="1" cellpadding="1" border="0" bordercolor="dimgray" align="center" bgcolor="dimgray">
								<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
						<!--
						writeChars();
						-->
								</SCRIPT>
							</TABLE>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td align="right">
						<BUTTON style="font-family: MS Sans Serif; font-size: 9pt; vertical-align: middle; cursor: hand; font-size: x-small;" type="reset" onclick="cancel()" id="button1" name="button1">
							Cancel
						</BUTTON>
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
