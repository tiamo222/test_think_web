
<?

SET_SHOW_PATH="../imagesSystem/ContentEditor/"

STOREPASSPORT=Request("SP")
FlashID=Request("FlashID")
AdminID=Request("AdminID")
AppID=Request("AppID")

'//////////////////////////////// Delete Picture

Delete_PicName=Request.Form("imglist")

If Delete_PicName<>"" then

'////////////// Del File
Set fs = CreateObject("Scripting.FileSystemObject")
path = Server.Mappath(ContentEditorPath&Trim(Delete_PicName))
If fs.FileExists(path) Then
fs.DeleteFile(path) 
End If 

////////////// Del DB
sql = "Delete From imagesTB  Where imgName='"&Delete_PicName&"'  "
ConnAdminShare.Execute(sql)

End If

?>


<html>
<head>

	<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-874">	
</head>
<body bgcolor="white" style="margin:0px; border:0px">
	
<table border="0" cellspacing="0" cellpadding="2" width="100%" align="center" valign="top" style="font-family: MS Sans Serif; font-size: 12px; vertical-align: middle;" >

  
  
  
<%
If STOREPASSPORT<>"" then
SQL_this=" Where STOREPASSPORT='"&STOREPASSPORT&"'   AND   FileType=2  "
End If

If AdminID<>"" then
SQL_this=" Where AdminID='"&AdminID&"'  AND   FileType=2  "
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
Show_icon_image="images_Editor/flash.gif"
End Select

%>
  <tr>
    <td align="left" valign="middle" NOWRAP  
	<%
	 IF  FlashID=ImageName Then 
	Response.Write("bgcolor=#F4F4F4")
	End If
	 %>
	   style="cursor:hand"  > 
	<a href="flash_tool.php?FlashID=<%=ImageName%>&SP=<%=STOREPASSPORT%>" target="_parent">
<img src="<%=Show_icon_image%>" alt="" width="20" height="20" hspace="2" border="0" align="absmiddle"><%=ImageName%>
</a>
</td>
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
