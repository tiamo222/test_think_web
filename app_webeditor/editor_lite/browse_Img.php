<%
Response.Buffer = True
Response.Expires = 0
Response.ExpiresAbsolute = Now() - 2
Response.AddHeader "pragma","no-cache"
Response.AddHeader "cache-control","private"
Response.CacheControl = "no-cache"
%>

<!--#Include file="../../System_Web/Connection.asp"-->

<%

SET_SHOW_PATH="../../imagesSystem/ContentEditor/"


STOREPASSPORT=Request("SP")
AdminID=Request("AdminID")
AppID=Request("AppID")
MType=Request("MType")


%>


<html>
<head>
<script language="JavaScript">

	function highlightcell(c) {
		var allcells = document.getElementsByTagName("TD");
		for (i=0;i<allcells.length;i++) {
			allcells[i].style.backgroundColor = "white"; allcells[i].style.color = "black";
		}
		c.style.backgroundColor = "highlight"; c.style.color = "highlighttext";
	}
	
	function Editor_upfolder(path) {
		arrloc = curloc.split("/"); 
		str = "";
		for (i=0;i<arrloc.length-2;i++) {
			str += arrloc[i] + "/";
		}
		location.href = path + ".asp?GP=/upload/imgs/&loc=" + str + "&u=y";
	}
</script>
<script language="JavaScript">var curloc = "";</script> 
	<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-874">	
</head>
<body bgcolor="white" style="margin:0px; border:0px">
	
<table border="0" cellspacing="0" cellpadding="2" width="100%" align="center" valign="top" style="font-family: MS Sans Serif; font-size: 12px; vertical-align: middle;" >

  
  
  
<%

If STOREPASSPORT<>"" then
SQL_this=" Where STOREPASSPORT='"&STOREPASSPORT&"'  AND  FileType<>2 "
End If

If AdminID<>"" then
SQL_this=" Where AdminID='"&AdminID&"'  AND  FileType<>2 "
End If



Set rs = Server.CreateObject("ADODB.Recordset")
sql="Select  *  from imagesTB "&SQL_this&" Order By  imgID  DESC"
rs.Open sql,ConnAdminShare,1,1

CKPic=rs.RecordCount

If CKPic>0 then
Do While Not rs.EOF

ImageName=rs("imgName")

'///////////////// CHECK FILE TYPE
Report_FileType=CK_Filetype(ImageName)
Select Case Report_FileType
Case ".jpg"
Show_icon_image="images_Editor/jpg.gif"

Case ".jpeg"
Show_icon_image="images_Editor/jpg.gif"

Case ".gif"
Show_icon_image="images_Editor/gif.gif"

Case ".png"
Show_icon_image="images_Editor/png.gif"

Case ".bmp"
Show_icon_image="images_Editor/bmp.gif"

Case ".swf"
Show_icon_image="images_Editor/flash.gif"

Case Else
Show_icon_image=""
End Select

%>
  <tr>
    <td align="left" valign="middle" NOWRAP style="cursor:hand" onclick="parent.previewpic.src = '<%=SET_SHOW_PATH%><%=ImageName%>'; parent.imgpath.value='<%=ImageName%>'; parent.imgname.value='<%=SET_SHOW_PATH%><%=ImageName%>'; highlightcell(this); parent.SetWidthandHeight();" > 
      <div align="left"><img src="<%=Show_icon_image%>" alt="" width="16" height="16" hspace="2" border="0" align="absmiddle"><%=ImageName%></div></td>
  </tr>
<%
RS.MoveNext
Loop
' If CKPic>0 then
End If

rs.Close
Set rs=Nothing
%>
  
</table>
</body>
</html>
<%
ConnAdminShare.Close
Set  ConnAdminShare = Nothing
%>
