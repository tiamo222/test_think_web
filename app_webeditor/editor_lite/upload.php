<html>
	<head>

		<title>Upload Page</title>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
	
<link href="../System/Font_Style.css" rel="stylesheet" type="text/css">
</head>
	<body bgcolor="#efefef" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

			
<table border="0"  cellspacing="2" cellpadding="0" width="100%" align="center" ID="Table1" >
  <form action="uploadfile_exe.php" enctype="multipart/form-data" method="post"   target="imglibrary" >
    <tr>
      <td class="text2">Õ—æ‚À≈¥‰¥È‡©æ“– ‰æ≈Ï .gif , .jpg , .jpeg , .png , .swf<br>
        ·≈–¢π“¥‰æ≈Ï‰¡Ë§«√‡°‘π 100K</td>
    </tr>
    <tr> 
      <td class="text2"> 
        <input name="FileUpload" type="file" id="File_Upload" style="font-family: MS Sans Serif; font-size: 9pt; vertical-align: top;" size="30" > 
      </td>
    </tr>
    <tr> 
      <td> <input name="SP" type="hidden" id="SP" value="<%=REQUEST("SP")%>"> 
        <input name="MType" type="hidden" id="MType" value="<%=REQUEST("MType")%>"> 
        <input NAME="Submit1" type="submit"  ID="Submit1" style="font-family: MS Sans Serif; font-size: 9pt; vertical-align: top;" value="Upload File ..."> 
      </td>
    </tr>
  </form>
</table>
	
	</body>
</html>
