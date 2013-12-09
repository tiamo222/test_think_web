<!--#Include file="../System_Web/Connection.asp"-->
<!--#include file="../MarketPlace/inc_CheckLogin.asp"-->

<%

STOREPASSPORT=Request("SP")
FlashID=Request("FlashID")
AppAction=Request("AppAction")


'//////////////////////////////// Delete Picture
IF AppAction="DeleteFlash"  and  STOREPASSPORT<>"" Then
Delete_PicName=FlashID
If Delete_PicName<>"" then
'////////////// Del File
Set fs = CreateObject("Scripting.FileSystemObject")
path = Server.Mappath(ContentEditorPath&Trim(Delete_PicName))
If fs.FileExists(path) Then
fs.DeleteFile(path) 
End If 

'////////////// Del DB
sql = "Delete From imagesTB  Where imgName='"&Delete_PicName&"'      "
ConnAdminShare.Execute(sql)
End If

Response.Redirect("Flash_tool.asp?SP="&STOREPASSPORT&"&MType=2")
'/// Response.Redirect("Flash_tool.asp?FlashID="&This_FileName&"&SP="&STOREPASSPORT&"")

'//// IF AppAction="DeleteFlash"  and  STOREPASSPORT<>"" Then
End If


'//////////////////////////////////////////////// SAVESETTIONG
IF AppAction="SaveSetting" Then
FWidth=Request("FWidth")
FHeight=Request("FHeight")
FBGColor=Request("FBGColor")
Option_T=Request("Option_T")
Option_Q=Request("Option_Q")

Set rs=Server.CreateObject("ADODB.Recordset")
sql="Select  *   from imagesTB  Where  imgName='"&FlashID&"'   and    STOREPASSPORT='"&STOREPASSPORT&"'  "
rs.Open sql,ConnAdminShare,1,3
CK_FLASH_Save=rs.RecordCount

IF CK_FLASH_Save>0 Then

rs("FWidth")=FWidth
rs("FHeight")=FHeight
rs("FBGColor")=FBGColor
rs("Option_T")=Option_T
rs("Option_Q")=Option_Q

'///////////////////////////////////////////// SETTING
AppAction="EditSetting" 

rs.Update
'/// IF CK_FLASH_Save>0 Then
End If

rs.Close
Set rs=Nothing


'// IF AppAction="" Then
End If

'///////////////////// Edit
IF FlashID<>"" AND  STOREPASSPORT<>""  Then

Set rs=Server.CreateObject("ADODB.Recordset")
sql="Select  *   from imagesTB  Where  imgName='"&FlashID&"'   and    STOREPASSPORT='"&STOREPASSPORT&"'  "
rs.Open sql,ConnAdminShare,1,1
CK_FLASH=rs.RecordCount

IF CK_FLASH>0 Then
FlashID=rs("imgName")

FWidth=rs("FWidth")
FHeight=rs("FHeight")

FBGColor=rs("FBGColor")
Option_T=rs("Option_T")
Option_Q=rs("Option_Q")

'///////////////////////////////////////////// SETTING
AppAction="EditSetting" 

'/// IF CK_FLASH>0 Then
End If

rs.Close
Set rs=Nothing


'/// IF FlashID<>"" AND  STOREPASSPORT<>"" Then
End If


%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Flash Tool</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="../System/Font_Style.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#F9F9F9" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<script language="javascript">
  <!--
    window.name = 'FlashTool';
  //-->
  </script>
<div align="center">
<a name="uploadfile"></a>
  <table width="560" height="210" border="0" cellpadding="0" cellspacing="2">
    <tr valign="top">
      <td width="175" align="center"> <iframe  width="175" height="210" src="browse_flash.php?SP=<%=STOREPASSPORT%>&MType=2&FlashID=<%=Request("FlashID")%>" id="browse_Img" frameborder="0" scrolling="auto">
     
        </iframe>
		
		   <table width="100" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="images_Editor/Span-T.gif" width="175"  height="5"></td>
          </tr>
        </table></td>
      <td width="380" align="center">
	  
	  
	  

<%
IF AppAction<>"EditSetting"  Then
%>
          <table width="100%" height="210" border="0" cellpadding="0" cellspacing="3" bgcolor="#FFFFFF">
          <form action="uploadfile_exe.php" method="post" enctype="multipart/form-data" name="form1">
            <tr bgcolor="#99CC66" class="text2"> 
              <td height="25" colspan="2" class="bot2"><font color="#FFFFFF">&nbsp;Upload 
                New File</font></td>
            </tr>
            <tr class="text2"> 
              <td width="150" align="left" bgcolor="#eeeeee">&nbsp;Width : </td>
              <td width="80%"><input name="FWidth" type="text" class="text2" id="FWidth" size="6" maxlength="4">
                Pixels</td>
            </tr>
            <tr class="text2"> 
              <td align="left" bgcolor="#eeeeee">&nbsp;Height : </td>
              <td><input name="FHeight" type="text" class="text2" id="FHeight" size="6" maxlength="4">
                Pixels</td>
            </tr>
            <tr class="text2"> 
              <td align="left" bgcolor="#eeeeee">&nbsp;BG Color : </td>
              <td><input name="FBGColor" type="text" class="text2" id="FBGColor" size="10" maxlength="10">
                Transparency : 
                <input name="Option_T" type="checkbox" id="Option_T" value="1"  > 
              </td>
            </tr>
            <tr class="text2"> 
              <td align="left" bgcolor="#eeeeee">&nbsp;Quality :</td>
              <td><select name="Option_Q" class="text2" id="Option_Q">
                  <option value="1" selected>High</option>
                  <option value="2">Medium</option>
                  <option value="3">Low</option>
                </select> <input name="MType" type="hidden" id="MType" value="2"> 
                <input name="SP" type="hidden" id="SP" value="<%=STOREPASSPORT%>"></td>
            </tr>
            <tr class="text2"> 
              <td align="left" bgcolor="#eeeeee">&nbsp;File Flash : </td>
              <td><input name="FileUpload" type="file" class="text2" id="FileUpload" size="25"></td>
            </tr>
            <tr align="center" class="text2"> 
              <td height="35">&nbsp; </td>
              <td height="35" align="left"><input type="submit" name="Submit2" value="Upload New File" class="bot2"></td>
            </tr>
          </form>
        </table>
		
<%
'/// IF AppAction<>"EditSetting"  Then
End If
%>
		
		
		


<%
IF AppAction="EditSetting" Then
%>
        <table width="100%" height="210" border="0" cellpadding="0" cellspacing="3" bgcolor="#FFFFFF">
          <form action="flash_tool.php" method="post"  name="form2">
            <tr bgcolor="#FF9933" class="text2"> 
              <td height="25" colspan="2" class="bot2"><font color="#FFFFFF">&nbsp;Edit 
                Setting Flash</font></td>
            </tr>
            <tr class="text2"> 
              <td align="left" bgcolor="#eeeeee">&nbsp;File Name :</td>
              <td height="20" class="bot1"><%=FlashID%><input name="MType" type="hidden" id="MType" value="2"></td>
            </tr>
            <tr class="text2"> 
              <td width="150" align="left" bgcolor="#eeeeee">&nbsp;Width : </td>
              <td width="80%"><input name="FWidth" type="text" class="text2" id="FWidth" value="<%=FWidth%>" size="6" maxlength="4">
                Pixels</td>
            </tr>
            <tr class="text2"> 
              <td align="left" bgcolor="#eeeeee">&nbsp;Height : </td>
              <td><input name="FHeight" type="text" class="text2" id="FHeight" value="<%=FHeight%>" size="6" maxlength="4">
                Pixels</td>
            </tr>
            <tr class="text2"> 
              <td align="left" bgcolor="#eeeeee">&nbsp;BG Color : </td>
              <td><input name="FBGColor" type="text" class="text2" id="FBGColor" value="<%=FBGColor%>" size="10" maxlength="10"  >
                Transparency : 
                <input name="Option_T" type="checkbox" id="Option_T" value="1"  <% IF Option_T=1 Then Response.Write("checked") End If %>>
              </td>
            </tr>
            <tr class="text2"> 
              <td align="left" bgcolor="#eeeeee">&nbsp;Quality :</td>
              <td>
			  
			  <select name="Option_Q" class="text2" id="Option_Q">
			          <option value="1" <% IF Option_Q =1 Then Response.Write("selected") End If %>>High</option>
                  <option value="2"  <% IF Option_Q =2 Then Response.Write("selected") End If %>>Medium</option>
                  <option value="3"  <% IF Option_Q =3 Then Response.Write("selected") End If %>>Low</option>
                </select> <input name="MType" type="hidden" id="MType3" value="2"> 
                <input name="SP" type="hidden" id="SP" value="<%=STOREPASSPORT%>">
                <input name="AppAction" type="hidden" id="SP3" value="SaveSetting"></td>
            </tr>
            <tr align="center" class="text2"> 
              <td height="35" colspan="2"><input type="submit" name="Submit232" value="Save Setting" class="bot2"> 
                &nbsp; <input type="button" name="Submit222" value="Delete" class="bot2"  value_url="Flash_tool.asp?AppAction=DeleteFlash&FlashID=<%=FlashID%>&SP=<%=STOREPASSPORT%>"  ONCLICK="location.href = this.value_url"> 
                &nbsp; <input type="button" name="Submit24" value="Upload New File" class="bot2"    value_url="Flash_tool.asp?SP=<%=STOREPASSPORT%>"  ONCLICK="location.href = this.value_url">
				
				
			
				</td>
            </tr>
          </form>
        </table>
<%
'/// IF AppAction="EditSetting" Then
End If
%>

<table width="100" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="images_Editor/Span-T.gif" width="175"  height="5"></td>
          </tr>
        </table>		
		
		
		
		</td>
    </tr>
  </table>
  <table width="560" border="0" align="center" cellpadding="5" cellspacing="0">
    <tr> 
      <td align="left" valign="top" class="text2"> 
        <strong><font color="#333333">คำแนะนำ</font></strong><font color="#333333"><br>
        เลือกอัพโหลด ไฟล์ Flash โดยคลิกที่ <strong><font color="#009900">Upload 
        New File</font></strong> <br>
        ถ้าต้องการ ปรับค่าต่างๆ คลิกที่ ชื่อไฟล์ภาพที่ต้องการ ด้าน ซ้าย<br>
        จากนั้น ปรับแต่งค่าต่างๆตามต้องการ แล้ว <strong><font color="#FF3300">Save 
        Setting</font></strong> เพื่อทำการ สร้างโค๊ด Html</font></td>
      <td width="75" align="center" valign="top" class="text2">

<%
IF AppAction="EditSetting" Then
%>
	  <a href="#copycode" target="_self">
	  <img src="images_Editor/icon_download_F.gif" width="50" height="31" border="0"></a><br>
        Copy Code
<%
End If
%>
		</td>
    </tr>
  </table>
  
<%
IF AppAction="EditSetting" Then
%>
<a name="copycode"></a>  
  <table width="560" height="50" border="0" cellpadding="5" cellspacing="0">
    <tr valign="top"> 
      <td width="50%" height="10" align="left" class="text2"><strong>Code GEN 
        : </strong></td>
      <td align="right" class="text2"><a href="#flashpreview" target="_self">Flash Preview</a> 
        : <a href="#uploadfile" >Back top</a></td>
    </tr>
    <tr valign="top"> 
      <td height="60" colspan="2" align="left" bgcolor="#FFFFFF" class="text2"> 
        <%
 IF FWidth<>""  AND  FWidth<>"0" Then 
Show_Width=" width="&FWidth&" "
 End If 
 
IF FHeight<>""    AND  FHeight<>"0"  Then 
Show_Height=" Height="&FHeight&" "
 End If 
 
%> <textarea name="textarea" cols="80" rows="17" wrap="VIRTUAL" style="width=550;" >
<!-----------START FLASH FILE="<%=FlashID%>" ----------->
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" 
codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" 
<%=Show_Width%> <%=Show_Height%> hspace="0" vspace="0">
 
<param name="movie" 
value="../imagesSystem/ContentEditor/<%=FlashID%>">
<param name="quality" value="high"><param name="BGCOLOR" value="#99CC99">

<embed src="../imagesSystem/ContentEditor/<%=FlashID%>" <%=Show_Width%> <%=Show_Height%>
 hspace="0" vspace="0" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer"
type="application/x-shockwave-flash" bgcolor="<%=FBGColor%>">
</embed></object>
<!-----------END FLASH FILE="<%=FlashID%>" -----------></textarea> 
         </td>
    </tr>
    <tr valign="top"> 
      <td height="10" align="left" class="text2"><strong>Flash Preview : </strong></td>
      <td height="10" align="right" class="text2"><a href="#uploadfile">Back 
        top</a></td>
    </tr>
  </table>
  
  
  
  
  
  <table width="560" border="0" cellspacing="5" cellpadding="5">
    <tr>
      <td align="center" valign="top" bgcolor="#FFFFFF">





<!-----------START FLASH FILE=" " ----------->
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" 
codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" 
<%=Show_Width%> <%=Show_Height%>
 hspace="0" vspace="0">
 
<param name="movie" 
value="../imagesSystem/ContentEditor/<%=FlashID%>">
<param name="quality" value="high"><param name="BGCOLOR" value="#99CC99">

<embed src="../imagesSystem/ContentEditor/<%=FlashID%>" 
<%=Show_Width%> <%=Show_Height%>
 hspace="0" vspace="0" quality="high" 
pluginspage="http://www.macromedia.com/go/getflashplayer"
type="application/x-shockwave-flash" bgcolor="<%=FBGColor%>">
</embed></object>
<!-----------END FLASH FILE=" " ----------->
	   
      </td>
    </tr>
  </table>
<a name="flashpreview"></a>
<%
'/// IF AppAction="EditSetting" Then
End If 
%>
   </div>
</body>
</html>

<%
ConnAdminShare.Close
Set  ConnAdminShare = Nothing
%>
