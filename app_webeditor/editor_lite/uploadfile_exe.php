<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<!--#Include file="../System_Web/Connection.asp"-->
<!--#include file="../MarketPlace/inc_CheckLogin.asp"-->
<!--#Include file="../System_Web/GetUploadData.asp"-->

<%

'-----------------------------------------------------------------------------------
'This Application Develop by 
'Kriangkrai Kaewsaen "Jack"
'jack@megrand.com
'http://www.megrand.com
'-----------------------------------------------------------------------------------

Response.Buffer = True
Response.Expires = 0
Response.ExpiresAbsolute = Now() - 2
Response.AddHeader "pragma","no-cache"
Response.AddHeader "cache-control","private"
Response.CacheControl = "no-cache"

%>


<%

'-----------------------------------------------------------------------------------
'//////////////////////////////////////////////////////////////Delete Picture Step1
On error Resume Next

STOREPASSPORT=uploaddata.Item("SP").Item("value")
MType=uploaddata.Item("MType").Item("value")

'///////////// OPTION FLASH
FWidth=uploaddata.Item("FWidth").Item("value")
FHeight=uploaddata.Item("FHeight").Item("value")
FBGColor=uploaddata.Item("FBGColor").Item("value")
Option_T=uploaddata.Item("Option_T").Item("value")
Option_Q=uploaddata.Item("Option_Q").Item("value")

FileUpload_Filename=uploaddata.Item("FileUpload").Item("filename")
FileUpload_Filevalue=uploaddata.Item("FileUpload").Item("value")

set uploaddata= Nothing

On error goto 0


%>

<%


IF STOREPASSPORT<>""     Then

'///////////////////// SET VALUE
AdminID=""
AppID="Market"
SET_SHOW_PATH="../imagesSystem/ContentEditor/"

'//////////////////////////////// 
Set rs = Server.CreateObject("ADODB.Recordset")
sql="Select   *   from imagesTB  "
rs.Open sql,ConnAdminShare,1,3
CK_RECORD_IMAGE=rs.RecordCount
rs.AddNew

rs("STOREPASSPORT")=STOREPASSPORT
rs("AdminID")=AdminID
rs("AppID")=AppID
rs("FileType")=MType
rs("imgDate")=Date

'////////////// FLASH 
rs("FWidth")=FWidth
rs("FHeight")=FHeight
rs("FBGColor")=FBGColor
rs("Option_T")=Option_T
rs("Option_Q")=Option_Q

rs.Update
This_imgid=rs("imgID")
This_IMAGEID=This_imgid
rs.Close
Set rs=Nothing



'//////////////////////////////////////////////////////////////////////////////// Image Upload
IF  FileUpload_Filevalue<>"" Then

IF MType=1 Then
FileName_New="IMAGE-"&FC_GEN_SHORT_PS(This_imgid)
End If

IF MType=2 Then
FileName_New="FLASH-"&FC_GEN_SHORT_PS(This_imgid)
End If

IF MType="" OR MType=0  Then
FileName_New="FILE-"&FC_GEN_SHORT_PS(This_imgid)
End If

FileName_W=FileUpload_Filename
FileValue_W=FileUpload_Filevalue
'//// FilePath_W=StoreContentPath
FilePath_W=SET_SHOW_PATH
FileUpload_JFileUploadExe=JFileUploadExe(FileName_New,FileName_W,FileValue_W,FilePath_W)

'//// IF  upload_Filevalue<>"" Then
End If


'Response.Write("This_imgid="&This_imgid)
'Response.Write("<BR>TESTTTT")
'Response.Write("<BR>CK_RECORD_IMAGE="&CK_RECORD_IMAGE)
'Response.Write("<BR>This_IMAGEID="&This_IMAGEID)


'//////////////////////////////////////////////////////////////////////////////// Connect to Database
Set rs=Server.CreateObject("ADODB.Recordset")
sql="Select  imgName   from imagesTB  Where  imgID="&This_IMAGEID&"  "
rs.Open sql,ConnAdminShare,1,3
rs("imgName")=FileUpload_JFileUploadExe
rs.Update
rs.Close
Set rs=Nothing

This_FileName=FileUpload_JFileUploadExe

'///// Close Database Connection
ConnAdminShare.Close
Set  ConnAdminShare = Nothing



IF MType=1 Then
Response.Redirect("Insert_image.asp?SP="&STOREPASSPORT&"")
End If

IF MType=2 Then
Response.Redirect("Flash_tool.asp?FlashID="&This_FileName&"&SP="&STOREPASSPORT&"")
End If

IF MType="" OR MType=0  Then
Response.Redirect("Insert_file.asp?SP="&STOREPASSPORT&"")
End If


'///  IF STOREPASSPORT<>""   AND  upload_Filevalue<>""   Then
End If


%>
