var popUp = window.createPopup()
function _CState(uniqueId,imagegallerypath,filepath,maximagesize,allowupload,allowpastehtml,flashpath,maxflashsize,documentpath,maxdocumentsize,uiculture,whichbreakmode,readonly,popupcolor,mediapath,maxmediasize,fwstorepassport,ApplicatonID) {
	this.currentview		= 0;
	this.SHOWBORDER 		= 1;
	this.UniqueID			= uniqueId;
	this.EditorID			= uniqueId+"_editBox";	
	this.ImageGalleryPath   = imagegallerypath;
///	this.FilesPath			= filepath;
	this.FilesPath			= "../system_webeditor/editor_lite/";
	this.MaxImageSize		= maximagesize;	
	this.AllowUpload		= allowupload;	
	this.AllowPasteHtml		= allowpastehtml;	
	this.FlashPath			= flashpath;
	this.MaxFlashSize		= maxflashsize;	
	this.DocumentPath		= documentpath;
	this.MaxDocumentSize	= maxdocumentsize;	
	this._initColor			= null;					
	this.Load				= EditorLoad;
	this.EditorView			= EditorView;
	this.save				= save;
	this.UICulture			= uiculture;
	this.BreakMode			= whichbreakmode;	
	this.ReadOnly			= readonly;	
	this.PopupColor			= escape(popupcolor);
	this.MaxFlashSize		= maxflashsize;		
	this.MediaPath			= mediapath;
	this.MaxMediaSize		= maxmediasize;
	this.AppPath			= "../system_webeditor/editor_lite/";
	this.fwstorepassportgm	= fwstorepassport;
	this.GMApplicatonID		= ApplicatonID;
	
	
}	
function EditorView(current,view) {
	
	hidePopup();
	var editor	= document.getElementById(current.EditorID);	
	if(current.currentview==1)
		tempContent		=	editor.innerText;
	else 
		tempContent		=	editor.innerHTML;
	var toolbar	= document.getElementById(current.UniqueID+"_toolbar");		
	if(view==0){
		//Normal Mode
		editor.style.removeAttribute("whiteSpace");
		editor.innerHTML			= tempContent;
		editor.unselectable			= "off";
		editor.contentEditable		= "true";
		editor.focus();
		Toggleborder(current, 0);			
		toolbar.style.display	= "inline";
	}
	if(view==1) {
		//HTML Mode	
		editor.unselectable			= "off";
		editor.contentEditable		= "true";
		editor.focus();	
		editor.innerHTML			= ""	
		editor.innerText			= tempContent;
		toolbar.style.display		= "none";
	}
	if(view==2){		
		//Preview Mode
		editor.location				= "about:blank";
		editor.style.display		= "inline";
		editor.unselectable			= "on";
		editor.contentEditable		= "false";
		editor.innerHTML			= tempContent;
		toolbar.style.display		= "none";
	}
	current.currentview=view;
}
function EditorLoad() {
	var current = this;
	var editor = document.getElementById(current.EditorID); 
	editor.content = false;
	Toggleborder(current,0);
	editor.ondblclick = function() {
		var e = event.srcElement;
		if( e.tagName == 'TABLE') 
			_Format(current,'Table', e );
		if( e.tagName == 'IMG') 
			_Format(current,'Insert_Image', e );
	}
	var editorID = current.EditorID;
	editor.onfocus = function() {
		Initialize2D(editorID);
	}	
	
		
	if (current.BreakMode.toLowerCase() == 'br' || current.BreakMode.toLowerCase() == 'div')
	{
		
		editor.onkeydown = function() 
		{
			if((event.keyCode == 13)&&(event.shiftKey == false))
			{
				var sel	= editor.document.selection;
				if (sel.type == "Control")
					return;
				
				var r = sel.createRange();
				if (GetElement(current.EditorID,r,"LI")||GetElement(current.EditorID,r,"OL")||GetElement(current.EditorID,r,"UL"))
					return;
				else
				{	
					if (current.BreakMode.toLowerCase() == 'br')
					{
						r.pasteHTML("<br>"); 
						event.cancelBubble = true;  
						event.returnValue = false;  
						r.select(); 
						r.moveEnd("character", 1); 
						r.moveStart("character", 1); 
						r.collapse(false); 
						return false; 
					}
					else
					{	
					
						e = r.parentElement();
						if((e.tagName == "TD")||(e.tagName == "THEAD")||(e.tagName == "P")||(e.tagName == "HTML")||(e.tagName == "BODY")) {
							editor.document.execCommand("FormatBlock", false, "<div>");
							return true; 
						}
					}
				}
			}
			else 
			{
				if (event.keyCode == 9 && current.currentview=="0") { // TAB
				var sel	= editor.document.selection;
				if (sel.type == "Control")
					return;
				
				var r = sel.createRange();
				r.pasteHTML(' &nbsp;&nbsp;&nbsp; ')
				return false
				}
			}
		}
	}
	if(current.ReadOnly == "True")
	{
		editor.contentEditable = false;
	}
	else
		editor.contentEditable = true;	
}			
function insertHTML(EditorID, html)  {
	var editor	= document.getElementById(EditorID);
	editor.focus();	
	var sel = editor.document.selection;
	var curRange = get_range(0,EditorID);
	if (editor.document.selection.type == "Control") {
   		curRange.execCommand('Delete');
		curRange = get_range(0,EditorID);
		curRange.pasteHTML(html);	
	}	
	else {
		var htmlText = curRange.htmlText;
		htmlText = htmlText.replace( /[\n\r]/gi, '' );
		if( htmlText.match( /<td(?:\s+?.*?)?>.*<\/td>/i ) ) 
			return null;
		else
			curRange.pasteHTML(html);	
	}
}
function checkRange(EditorID) {
	var editor	= document.getElementById(EditorID);
	editor.focus();
	if (editor.document.selection.type == "None") {
		editor.document.selection.createRange();
	}
}

function get_range( remove , EditorID) {
	var editor	= document.getElementById(EditorID);	
	var sel = editor.document.selection;
	remove && ( sel.type != 'None' ) && sel.clear();
	var curRange  = sel.createRange();
	curRange.parents = [];
	if( sel.type == 'Control' ) {
		curRange.control = true;
		curRange.parents.push(curRange.item(0) );
		curRange.parent = curRange.item(0).parentElement;
	} 
	else {
		curRange.control = false;
		curRange.parent = curRange .parentElement();
	}
	while( curRange.parent && curRange.parent.id != EditorID ) {
		curRange.parents.push( curRange.parent );
		curRange.parent = curRange.parent.parentElement;
	}
	return curRange ;
}
function _Format(current, szHow, szValue, szHelp) {
//	hidePopup();
	var editor	= document.getElementById(current.EditorID);
	editor.focus();
	switch(szHow){		
		case "Table":
			var html;
			var objReference	= null;
			var selectedRange	= editor.document.selection.createRange();
			var RangeType		= editor.document.selection.type;
			var strTable	= current.FilesPath + "/insert_table.asp?UC="+ current.UICulture;
			strTable = strTable +"&BG="+ current.PopupColor;
			
			var strAttr = "status:no;dialogWidth:560px;dialogHeight:500px; scroll: yes; resizable: yes; help:no";
			if (RangeType == "Control") {
				if(selectedRange.length > 0)
					objReference = selectedRange.item(0);
				if (objReference.tagName != "TABLE")		
					html = showModalDialog(strTable, "", strAttr);
				else
					html = showModalDialog(strTable, objReference, strAttr);
			}
			else
			{
				html = showModalDialog(strTable, "", strAttr);
			}			
			if(html && html!="") 
				insertHTML(current.EditorID, html);
			Toggleborder(current, 0);			
			break;
		
		case "EditRow":
			var tableSelection = GetTableSelection(current.EditorID);
			var currentRow, currentTable;
			if (tableSelection == null)
				return false;
			currentRow = tableSelection;
			if (currentRow.tagName == "TD") 
				currentRow = currentRow.parentElement;
			var selectedRange	= editor.document.selection.createRange();
			var RangeType		= editor.document.selection.type;
			var strTable	= current.FilesPath + "/rowproperties.asp?UC=" + current.UICulture;
			strTable = strTable +"&BG="+ current.PopupColor;
			var strAttr = "status:no;dialogWidth:550px;dialogHeight:280px; scroll: yes; resizable: yes; help:no";
			html = showModalDialog(strTable, currentRow, strAttr);							
			break;
		case "EditCell":		
			var tableSelection = GetTableSelection(current.EditorID);
			var currentCell;
			if ((tableSelection == null)  || (tableSelection.tagName!= "TD"))  //table selection must be a TD
				return false;
			currentCell = tableSelection;
			var selectedRange	= editor.document.selection.createRange();
			var RangeType		= editor.document.selection.type;
			var strTable	= current.FilesPath + "/cellproperties.asp?UC=" + current.UICulture;
			strTable = strTable +"&BG="+ current.PopupColor;
			var strAttr = "status:no;dialogWidth:550px;dialogHeight:280px; scroll: yes; resizable: yes; help:no";
			html = showModalDialog(strTable, currentCell, strAttr);		
			break;
		
		case "Insert_Image":
		/// var strImage	= current.FilesPath + "/insert_image.asp";
			var strImage	=  current.AppPath+"Insert_image.php";
			strImage = strImage +"?GP="+ current.ImageGalleryPath;
			//strImage = strImage +"&MaxImageSize="+ current.MaxImageSize;
			//strImage = strImage +"&Upload="+ current.AllowUpload;
			//strImage = strImage +"&UC="+ current.UICulture;
			strImage = strImage +"&BG="+ current.PopupColor;
			strImage = strImage +"&SP="+ current.fwstorepassportgm;
			strImage = strImage +"&AppID="+ current.GMApplicatonID;
			/// GMApplicatonID
			
			strAttr = "status:no;dialogWidth:580px;dialogHeight:490px; scroll: no; resizable: no; help:no";
			var html;			
			var selectedRange	= editor.document.selection.createRange();
			var RangeType		= editor.document.selection.type;
			if (RangeType == "Control") {
				if(selectedRange.length > 0)
					objReference = selectedRange.item(0);
				if (objReference.tagName != "IMG")		
					html = showModalDialog(strImage, "", strAttr);
				else
					html = showModalDialog(strImage, objReference, strAttr);
			}
			else
			{
				html = showModalDialog(strImage, "", strAttr);
			}
			
			if (html) 
				insertHTML(current.EditorID, html);
			editor.focus();			
			break;
			
		case "InsertImage":
			checkRange(current.EditorID);	
			editor.document.execCommand("insertimage", true, null);
			break;
		case "Insert_Media":
			var strMedia	= current.FilesPath + "/Insert_media.php?UC="+ current.UICulture;
			strMedia = strMedia +"&BG="+ current.PopupColor;
			strMedia = strMedia +"&MP="+ current.MediaPath;
			strMedia = strMedia +"&MaxMediaSize="+ current.MaxMediaSize;
			strMedia = strMedia +"&Upload="+ current.AllowUpload;
						
			strAttr = "status:no;dialogWidth:580px;dialogHeight:620px; scroll: no; resizable: yes; help:no";
			var FSrc = showModalDialog(strMedia, window, strAttr);
			if (FSrc)
			{
				strmedia = "<embed name=\"MediaPlayer1\" src=\"" + FSrc['medianame'] + "\" autostart=\"" + FSrc['AutoStart'] + "\" showcontrols=\"" + FSrc['ShowControls'] + "\"  width=\"" + FSrc['w'] + "\" height=\"" + FSrc['h'] + "\" type=\"application/x-mplayer2\" pluginspage=\"http://www.microsoft.com/Windows/MediaPlayer\" ></embed>\n";
				insertHTML(current.EditorID, unescape(strmedia));
			}
			break;	
		case "Insert_Flash":
			///var strImage	= current.AppPath + "Insert_flash.asp";
			var strImage	= current.AppPath + "flash_tool.php";
			strImage = strImage +"?FP="+ current.FlashPath;;
			strImage = strImage +"&MaxFlashSize="+ current.MaxFlashSize;
			strImage = strImage +"&Upload="+ current.AllowUpload;		
			strImage = strImage +"&UC="+ current.UICulture;
			strImage = strImage +"&BG="+ current.PopupColor;
			strImage = strImage +"&SP="+ current.fwstorepassportgm;
						
			strAttr = "status:no;dialogWidth:575px;dialogHeight:450px; scroll: no; resizable: yes; help:no";
			var FSrc = showModalDialog(strImage, window, strAttr);
			if (FSrc)
			{
				strSwf = "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,42,0\"  width=\"" + FSrc['w'] + "\" height=\"" + FSrc['h'] + "\">\n";
				strSwf += "<param name=\"movie\" value=\"" + FSrc['swf'] + "\">\n";
				strSwf += "<param name=\"quality\" value=\"" + FSrc['qu'] + "\">\n";
				strSwf += "<param name=\"bgcolor\" value=\"" + FSrc['bg'] + "\">\n";
				if (FSrc['wm'] == "yes") {strSwf += "<param name=\"wmode\" value=\"transparent\">\n";}
				strSwf += "<embed src=\"" + FSrc['swf'] + "\" quality=\"" + FSrc['qu'] + "\" bgcolor=\"" + FSrc['bg'] + "\"  width=\"" + FSrc['w'] + "\" height=\"" + FSrc['h'] + "\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\"></embed>\n";
				strSwf += "</object>";
				insertHTML(current.EditorID, strSwf);
			}
			break;
		case "DownloadableFiles":
			var objReference	= null;
			var selectedRange	= editor.document.selection.createRange();			
			var RangeType		= editor.document.selection.type;	
			var objReference;			
			if (RangeType == "Control")
			{
				if (selectedRange.item(0).tagName.toLowerCase() != "img")  //fix the unfined bug--adam
					return;
				else
				{
					IsImage =  selectedRange.item(0);
					if (selectedRange.item(0).parentElement.tagName.toLowerCase() == "a") 
						objReference = selectedRange.item(0).parentElement;
				}
			} 
			else
				objReference = selectedRange.parentElement() ;
			
			while (objReference && objReference.nodeName != "A")
				objReference = objReference.parentNode ;
			if (objReference && objReference.nodeName == "A")
				selectedRange.moveToElementText( objReference ) ;
			
			if (IsImage){
				var oTextRange = document.body.createTextRange() ;
				oTextRange.moveToElementText(selectedRange.item(0)) ;
				selectedRange = oTextRange;
				selectedRange.select();
			}
			
			var strImage	= "/Insert_document.asp";
			strImage = strImage +"?DP="+ current.DocumentPath;;
			strImage = strImage +"&MaxDocumentSize="+ current.MaxDocumentSize;
			strImage = strImage +"&Upload="+ current.AllowUpload;		
			strImage = strImage +"&UC="+ current.UICulture;
			strImage = strImage +"&BG="+ current.PopupColor;
						
			strAttr = "status:no;dialogWidth:600px;dialogHeight:540px; scroll: no; resizable: yes; help:no";
			if (objReference)				
				FSrc = showModalDialog(strImage, objReference, strAttr);
			else
				FSrc = showModalDialog(strImage, "", strAttr);
				
			if (FSrc)
			{
				var temp;
				if (selectedRange.htmlText != "")
				{
					selectedRange.execCommand('RemoveFormat');
					selectedRange.execCommand('unlink');
					temp = 	selectedRange.htmlText;
					selectedRange.execCommand('Delete');
				}
				else
					temp = FSrc['href'];
					
				var sHTML = '<a href=' 
				+ FSrc['href']
				+ attr("target", FSrc['Target']) 
				+ attr("Title", FSrc['Title'])	
				+ attr("Title", FSrc['Title'])					
				+ (FSrc['linkcolor'] ? attr("style", "color:"+FSrc['linkcolor']) : "")			
				+ '>'
				+ temp
				+ '</a>';
				insertHTML(current.EditorID,sHTML);			
			}			
			break;
			
		case "Insert_Image":
		/// var strImage	= current.FilesPath + "/Insert_image.asp";
			var strImage	=  current.AppPath+"Insert_image.php";
			strImage = strImage +"&GP="+ current.ImageGalleryPath;
			strImage = strImage +"&MaxImageSize="+ current.MaxImageSize;
			strImage = strImage +"&Upload="+ current.AllowUpload;		
			strImage = strImage +"&UC="+ current.UICulture;
			strImage = strImage +"&BG="+ current.PopupColor;
						
			strAttr = "status:no;dialogWidth:530px;dialogHeight:570px; scroll: no; resizable: yes; help:no";
			var ImgSrc = showModalDialog(strImage, window, strAttr);
			if (ImgSrc) 
				insertHTML(current.EditorID, ImgSrc);
			break;
					
		case "InsertTime":
			var d = new Date(); 
			insertHTML(current.EditorID,d.toLocaleTimeString());
			break;		
					
		case "InsertDate":	
			var d = new Date(); 
			insertHTML(current.EditorID,d.toLocaleDateString());
			break;
			
		case "New":
			if (confirm("Please confirm that you want to reload the document.\n The changes you made will be discarded.\n Are you sure?"))    {
				editor.document.execCommand("refresh", false, null);
			}
			break;
						
		case "Emotion":
		/// var strEmoticon = current.FilesPath + "Editor_New/Insert_emotion.asp?UC="+ current.UICulture;
			var strEmoticon =current.AppPath+"Insert_emotion.php?UC="+ current.UICulture;
			strEmoticon = strEmoticon +"&BG="+ current.PopupColor;
			strAttr = "status:no;dialogWidth:300px;dialogHeight:330px;scroll: no; resizable: no; help:no";
			html = showModalDialog(strEmoticon, window, strAttr);
			if (html) 
				insertHTML(current.EditorID, html);
			break;
			
		case "Char":
		/// var strChar		= current.FilesPath + "/Insert_char.asp?UC="+ current.UICulture;
			var strChar		=current.AppPath+"Insert_char.php?UC="+ current.UICulture;
			strChar = strChar +"&BG="+ current.PopupColor;	
			strAttr = "status:no;dialogWidth:450px;dialogHeight:300px; scroll: no; resizable: no; help:no";
			html = showModalDialog(strChar, window, strAttr);
			if (html) 
				insertHTML(current.EditorID, html);
			break;
			
		case "InsertTemplate":
			var strTemplate		= current.AppPath+"Insert_Template.asp?UC="+ current.UICulture;
			strTemplate = strTemplate +"&BG="+ current.PopupColor;		
			strAttr = "status:no;dialogWidth:643px;dialogHeight:420px; scroll: no; resizable: yes; help:no";
			html = showModalDialog(strTemplate, window, strAttr);
			if (html) 
			{
				insertHTML(current.EditorID, html);
				Toggleborder(current, 0);			
			}
			break;
			
		case "Insert_Text":
			checkRange(current.EditorID);			
			var oNode1=editor.document.createElement("span");
			var oNode=editor.document.createElement("div");
			editor.insertBefore(oNode1);	
			oNode1.insertBefore(oNode)	
			oNode.innerText='Enter some text here';
			oNode.style.position='absolute';
			oNode1.style.position='relative';
			oNode.setActive()			
			break;			
		case "Toggleborder":
			checkRange(current.EditorID); // get the focus and text range
  			Toggleborder(current, 1);
			break;						
		case "Backward":
			stackingorder(current.EditorID, 'backward'); // get the focus and text range
			break;			
		case "Forward":
			stackingorder(current.EditorID, 'forward'); // get the focus and text range
			break;
		case "AbsolutePosition":
			absolutePosition(current.EditorID);
			break;			
		case "JustifyLeft":
			SetJustify(current.EditorID,'JustifyLeft');
			break;			
		case "JustifyCenter":
			SetJustify(current.EditorID,'JustifyCenter');
			break;			
		case "JustifyRight":
			SetJustify(current.EditorID,'JustifyRight');
			break;			
		case "CleanupCode":
			cleanCode(current.EditorID);
			Toggleborder(current, 0);
			break;	
		case "setStyle":
			editor.focus();
			var curRange = get_range(0,current.EditorID);
			if (curRange.control) 
				szValue&&( curRange.item(0).className = szValue );
			else
			{
				var htmlText = curRange.htmlText;
				htmlText = htmlText.replace( /[\n\r]/gi, '' );
				if( htmlText.match( /<td(?:\s+?.*?)?>.*<\/td>/i ) ) 
				{
					var sel = document.body.createTextRange();
					var tds = curRange.parentElement().all.tags('td');
					for( var i = 0; i < tds.length; i++ ) {
						sel.moveToElementText( tds[i] );
						szValue && curRange.inRange( sel ) && ( tds[i].className = szValue );
					}
				} 
				else {
					htmlText.match( /^\s/ ) && ( htmlText = htmlText.replace( /^\s/, '&nbsp;' ) );
					szValue && ( curRange.pasteHTML( ' <font class="' + szValue + '">' + htmlText + '</font>' ) );
				}
			}			
			break;			
		case "insertHTML":
			if (szValue != '') {
				insertHTML(current.EditorID, szValue);
			}			
			break;			
		case "Insert_link":
			var objReference	= null;
			var selectedRange	= editor.document.selection.createRange();			
			var RangeType		= editor.document.selection.type;	
			var objReference;
			var IsImage;
			
			if (RangeType == "Control")
			{
				if (selectedRange.item(0).tagName.toLowerCase() != "img")  //fix the unfined bug--adam
					return;
				else
				{
					IsImage =  selectedRange.item(0);
					if (selectedRange.item(0).parentElement.tagName.toLowerCase() == "a") 
						objReference = selectedRange.item(0).parentElement;
				}
			} 
			else
				objReference = selectedRange.parentElement() ;
			
			while (objReference && objReference.nodeName != "A")
				objReference = objReference.parentNode ;
			if (objReference && objReference.nodeName == "A")
				selectedRange.moveToElementText( objReference ) ;
			
			if (IsImage){
				var oTextRange = document.body.createTextRange() ;
				oTextRange.moveToElementText(selectedRange.item(0)) ;
				selectedRange = oTextRange;
				selectedRange.select();
			}
			/// var strImage	= current.FilesPath + "/Insert_link.asp?UC="+ current.UICulture;
			var strImage	=current.AppPath+"Insert_link.php?UC="+ current.UICulture;
			strImage = strImage +"&BG="+ current.PopupColor;
			
			strAttr = "status:no;dialogWidth:350px;dialogHeight:210px; scroll: no; resizable: yes; help:no";
			
			if (objReference)				
				FSrc = showModalDialog(strImage, objReference, strAttr);
			else
				FSrc = showModalDialog(strImage, "", strAttr);
				
			if (FSrc)
			{
				var temp;
				if (selectedRange.htmlText != "")
				{
					selectedRange.execCommand('RemoveFormat');
					selectedRange.execCommand('unlink');
					temp = 	selectedRange.htmlText;
					selectedRange.execCommand('Delete');
				}
				else
					temp = FSrc['href'];
					
				var sHTML = '<a href=' 
				+ unescape(FSrc['href'])
				+ attr("target", FSrc['Target']) 
				+ attr("Title", FSrc['Title'])	
				+ attr("Title", FSrc['Title'])					
				+ (FSrc['linkcolor'] ? attr("style", "color:"+FSrc['linkcolor']) : "")			
				+ '>'
				+ unescape(temp)
				+ '</a>';
		//		alert(temp);
				insertHTML(current.EditorID,sHTML);			
			}
			break;	
		case "PasteText":
			pastePlainText(current.EditorID);						
			editor.document.execCommand('Paste');
			break;	
		case "PasteWord":
			var sHTML = GetClipboardData(current) ;
			var sandbox = document.getElementById(current.UniqueID+"_sandbox");
			sandbox.innerHTML = removeword( sHTML ) ;
			var oTextRange = document.body.createTextRange() ;
			oTextRange.moveToElementText(sandbox) ;
			oTextRange.execCommand("Copy") ;				
			editor.document.execCommand('Paste');
			break;	
		case "zoom":
			editor.style.zoom = szValue;
			break;						
		case "insertLink":
			if (szValue != '') {
				insertHTML(current.EditorID, '<a href=' + szValue + '>' + szHelp + '</a>');
			}			
			break;						
		default:
			checkRange(current.EditorID); // get the focus and text range
  			if (szValue=="")				
				editor.document.execCommand(szHow);
			else
		  		editor.document.execCommand(szHow, false, arguments[2]);
			break;
	}
	editor.content = false;
	return true
}
function SelectColor(current,id,colorType) {
	var editor	= document.getElementById(current.EditorID);
	editor.focus();
	
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
	temp_html += '<td colspan=10 style="border: solid 1px #efefef;" onMouseOver="parent.button_over(this)" onMouseOut="parent.button_out(this)" onClick=parent.setColor("'+current.EditorID+'",'+colorType+',"'+id+'") ><div style="padding: 2px; margin: 2px;">';
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
			temp_html += '<td onMouseOver="parent.button_over(this)"  onMouseOut="parent.button_out(this)" onClick=parent.setColor("'+current.EditorID+'",'+colorType+',"'+id+'","'+colors[i]+'") style="padding:2px;border:solid 1px #efefef;"><div style="background-color:'+colors[i]+'; border:solid 1px #808080; width:12px; height:12px">&nbsp;</div></td>';
			if ( ((i+1)>=total) || (((i+1) % width) == 0)) { 
			temp_html += "</tr>";
		}
	}		
	temp_html += '<tr><td>&nbsp;</td></tr>';
	temp_html += '<tr>';
	temp_html += '<td colspan="10" style="height:23px; font-family: arial; font-size:11px; border: solid 1px #efefef;" onMouseOver="parent.button_over(this)" onMouseOut="parent.button_out(this)" onClick=parent.setMoreColors("'+current.EditorID+'",'+colorType+',"'+id+'","'+colors[i]+'","'+current.FilesPath+'") align=center>&nbsp;More Colors...</td>';
	temp_html += '</tr>';
	temp_html += '</table>';
	temp_html += '</td></tr>';
	temp_html += '</table>';
	
	div.innerHTML=temp_html;
	
	richDropDown('Editor1_forecolorimg','colorbox',160,160,'#FFFFFF','8pt','verdana');
}			

function setColor(editorID,colorType,id,oColor) {

	var editor	= document.getElementById(editorID);
	var colorTarget	= document.getElementById(id);	
	if (oColor)
		colorTarget.style.backgroundColor = oColor;
	else 
	{
		if (colorType == 1)
			colorTarget.style.backgroundColor = "#000000"
		else
			colorTarget.style.backgroundColor = "#FFFFFF"
	}	
	
	if (colorType == 1)
		 editor.document.execCommand('ForeColor', false, oColor);
	else
		 editor.document.execCommand('BackColor', false, oColor);

	hidePopup();
}

function setMoreColors(editorID,colorType,id,oColor,filepath) {

	var editor	= document.getElementById(editorID);
	var colorTarget	= document.getElementById(id);
	///var thispath	=  current.AppPath;
	//// var strImage	=  current.AppPath+"Insert_image.asp";
	//// 	oColor = window.showModalDialog(filepath + '/ColorPicker.asp',colorTarget.style.backgroundColor,'dialogHeight:455px;dialogWidth:370px;center:Yes;help:No;scroll:No;resizable:No;status:No;');	
	oColor = window.showModalDialog(filepath+'colorpicker.php',colorTarget.style.backgroundColor,'dialogHeight:455px;dialogWidth:370px;center:Yes;help:No;scroll:No;resizable:No;status:No;');
	if (oColor)
		colorTarget.style.backgroundColor = oColor;
	else 
	{
		if (colorType == 1)
			colorTarget.style.backgroundColor = "#000000"
		else
			colorTarget.style.backgroundColor = "#FFFFFF"
	}	
	
	if (colorType == 1)
		 editor.document.execCommand('ForeColor', false, oColor);
	else
		 editor.document.execCommand('BackColor', false, oColor);

	hidePopup();

}



function save(current)	{
	var tempContent;
	var editor	= document.getElementById(current.EditorID);	
	if(current.currentview==1)
		tempContent		=	editor.innerText;
	else 
		tempContent		=	editor.innerHTML;
	var HtmlContent = document.getElementById(current.UniqueID+"_HTMLContent");
	HtmlContent.value = tempContent;
}
function oneditorpaste(current)	{
	if(current.AllowPasteHtml!='True')
	{
		pastePlainText(current.EditorID) ;	
		return false ;
	}
	else
	{
		var sHTML = GetClipboardData(current) ;
		var re = /<\w[^>]* class="?MsoNormal"?/gi ;
		if ( re.test( sHTML ) )
		{
			if ( confirm( "Do you want to clean the code before pasting from word?" ) )
			{
				var sandbox = document.getElementById(current.UniqueID+"_sandbox");
				sandbox.innerHTML = removeword( sHTML ) ;
				var oTextRange = document.body.createTextRange() ;
				oTextRange.moveToElementText(sandbox) ;
				oTextRange.execCommand("Copy") ;
				return false ;
			}
		}
		else
		{
			var sandbox = document.getElementById(current.UniqueID+"_sandbox");
			sandbox.innerHTML = cleantool( sHTML ) ;
			var oTextRange = document.body.createTextRange() ;
			oTextRange.moveToElementText(sandbox) ;
			oTextRange.execCommand("Copy") ;
			return false ;
		}
	}
	
}
function pastePlainText(id)
{
	var clipData = clipboardData.getData("Text");
    if (clipData == 'null') {
		clipboardData.clearData();
		return;
    }
    var oTextArea = document.createElement("TEXTAREA");
    oTextArea.value = clipData;
    var objText = oTextArea.createTextRange();
    objText.execCommand("RemoveFormat");
    objText.execCommand("Unlink");            
    objText.execCommand("Copy");
}
function GetClipboardData(current)
{	
	var sandbox = document.getElementById(current.UniqueID+"_sandbox");
	sandbox.innerHTML = "" ;	
	var oTextRange = document.body.createTextRange() ;
	oTextRange.moveToElementText(sandbox) ;
	oTextRange.execCommand("Paste") ;	
	var sData = sandbox.innerHTML ;
	sandbox.innerHTML = "" ;	
	return sData ;
}
function absolutePosition(EditorID){
	var objReference	= null;
	var editor	= document.getElementById(EditorID)
   	var selectedRange	= editor.document.selection.createRange();
	var RangeType		= editor.document.selection.type;	
	if (RangeType == "Control") {
		if(selectedRange.length > 0)
			objReference = selectedRange.item(0);
			
		if (objReference.style.position != 'relative') {
			objReference.style.position='relative';
		}
		else
			objReference.style.position='static';		
		editor.content = false;
		editor.setActive();
    }
}

function cleanCode(EditorID) {
	var editor	= document.getElementById(EditorID);
	editor.innerHTML = cleantool(editor.innerHTML);;
//	alert("MS Word Formatting Removed");
}

function cleantool(h)
{
	h = h.replace(/<o:[pP]>&nbsp;<\/o:[pP]>/g, ""); // Remove all instances of <o:p></o:p>
    h = h.replace(/o:/g, ""); // delete all o: prefixes
    h = h.replace(/<st1:.*?>/g, ""); // delete all smarttags
    h = h.replace(/<(\/)?strong>/ig, '<$1B> '); //replaces <STRONG> with <B>
	h = h.replace(/<(\/)?em>/ig, '<$1I> '); //replaces <EM> with <I>
	h = h.replace(/<P class=[^>]*>/gi, '<P>');
	h = h.replace(/<\\?\??xml[^>]>/gi, "");
	h = h.replace(/<\/?\w+:[^>]*>/gi, ""); 
	h = h.replace(/<SPAN[^>]*>/gi, '');
	h = h.replace(/<\/SPAN>/gi, '');
	h = h.replace(/<TBODY>/gi, '');
	h = h.replace(/<\/TBODY>/gi, '');
	h = h.replace(/<T/gi, '\n<T');
	h = h.replace(/<TD>\n/gi, '<TD>');
	h = h.replace(/<\/TR>/gi, '\n<\/TR>');
	h = h.replace(/<\/TR>\n/gi, '<\/TR>');	
	return h;
}
function removeword(h)
{
	h = h.replace(/<\?xml[^>]*>/ig, "");
	h = h.replace(/<\/?[a-z]+:[^>]*>/ig, "");
	h = h.replace(new RegExp("(<[^>]+) class=[^ |^>]*([^>]*>)", "ig"), "$1 $2");
	h = h.replace(/(<[^>]+) style="[^"]*"([^>]*>)/ig, "$1 $2");
	h = h.replace(/<span[^>]*><\/span[^>]*>/ig, "");
	h = h.replace(/<span[^>]*><\/span[^>]*>/ig, "");
	h = h.replace(/<span><span>/ig, "<span>");
	h = h.replace(/<\/span><\/span>/ig, "</span>");
	return h;
}
function SetJustify(EditorID, action){
	var objReference	= null;
	var editor	= document.getElementById(EditorID);   
	var selectedRange	= editor.document.selection.createRange();
	var RangeType		= editor.document.selection.type;	
	if (RangeType == "Control") {
			if(selectedRange.length > 0)
				objReference = selectedRange.item(0);
	}	
	if (RangeType != "Control")	{
		checkRange(EditorID); // get the focus and text range
  		editor.document.execCommand(action);
  		return;
	}
	else {
		if (objReference.tagName != "IMG")	{
			checkRange(EditorID); // get the focus and text range
  			editor.document.execCommand(action);
  			return;
		}
		switch(action)	{
			case "JustifyLeft":
				objReference.setAttribute('align','Left');			
			break;
			case "JustifyCenter":
				objReference.setAttribute('align','Middle');					
			break;
			case "JustifyRight":
				objReference.setAttribute('align','Right');					
			break;
			default:
				objReference.setAttribute('align','Justify');		
			break;
		}
		objReference.setAttribute('hspace',10);
		objReference.setAttribute('vspace',10);
		editor.content = false;
		editor.setActive();
	}
}
function stackingorder(EditorID, action){
	var objReference	= null;
	var editor	= document.getElementById(EditorID);
	if (editor.document.selection.type != "Control") 
		return null;
	var selectedRange	= editor.document.selection.createRange();
	var RangeType		= editor.document.selection.type;
	if(selectedRange.length > 0)
		objReference = selectedRange.item(0);
	if (action=='forward')
		objReference.style.zIndex  +=1;
	else
		objReference.style.zIndex  -=1;			
	objReference.style.position='relative';
	editor.content = false;
	editor.setActive();
}
function Toggleborder(currenteditor,toggle) {
	if (toggle)  
		currenteditor.SHOWBORDER = !currenteditor.SHOWBORDER;
	var editor	= document.getElementById(currenteditor.EditorID);
	var atables = editor.getElementsByTagName("TABLE");
	for (var i = 0; i < atables.length; i++) {
		if (atables[i].border == 0)	{
			for( var k = 0; k < atables[i].rows.length; k++ ) {
				for( var j = 0; j < atables[i].rows[k].cells.length; j++ ) {
					if (currenteditor.SHOWBORDER) 
						atables[i].rows[k].cells[j].runtimeStyle.border = '1 dashed #3C3C3C';
					else 
						atables[i].rows[k].cells[j].runtimeStyle.border = '0';					
				}
			}
		}
	}
}
function Initialize2D(EditorID) {
	var editor	= document.getElementById(EditorID)
    editor.document.execCommand("2D-Position", true, true);
	editor.document.execCommand("MultipleSelection", true, true);
    editor.document.execCommand("LiveResize", true, true);
}   
function GetTableSelection(EditorID) {
	var tableSelection = null;
	var e, currentRow, c;
	var editor	= document.getElementById(EditorID)
	if (editor.document.selection.type == "Control") 
		return null;
	editor.focus();
	var selectedRange = editor.document.selection.createRange();
	e = selectedRange.parentElement();
	if (e.id==EditorID)
		return null;
	if ((window.event.altKey) || (e.tagName == "TR")) {
		currentRow = GetElement(EditorID,e,"TR");
		if (currentRow != null) 
			tableSelection = currentRow;
	} 
	else {
		c = GetElement(EditorID,e,"TD");
		if (c != null)
			tableSelection = c;
	}
	window.event.cancelBubble = true;
	return tableSelection;
} 
function GetElement(EditorID,e,sMatchTag)
{
	if (e == null)
		return null;
	if (e.tagName == sMatchTag)
		return e;
	else if (e.id==EditorID) 
		return null;
	else 
		return GetElement(EditorID,e.parentElement,sMatchTag);
}
function doRow(current, action) {
	hidePopup();
	var editor	= document.getElementById(current.EditorID);
	var tableSelection = GetTableSelection(current.EditorID);
	var currentRow, currentTable;
	if (tableSelection == null)
		return false;
	currentRow = tableSelection;
	if (currentRow.tagName == "TD") 
		currentRow = currentRow.parentElement;
	currentTable = currentRow.parentElement;  //Now currentTable is the current Table,  currentRow is the current row
	// go back to TABLE def and keep track of cell index
	var idx = 0;
	var rowidx = 0;
	var tr = currentRow;
	var numcells = currentRow.childNodes.length;  //how many cells in this row
  	while (tr) {
         if (tr.tagName == "TR")
            rowidx++;
         tr = tr.previousSibling;
	}
	// now we should have a row index indicating where the row should be added / removed
    if (action == "add") {        
		var newRow = currentTable.insertRow(rowidx);
		for (var i = 0; i < numcells; i++) {
			var c = newRow.appendChild( editor.document.createElement("TD") );
			if (currentRow.colSpan)
				c.colSpan = newRow.childNodes[i].colSpan;
		}
	}
	else 
		currentTable.removeChild(currentRow);
	Toggleborder(current, 0);		
	tableSelection	= null;
	currentTable	= null;
	currentRow		= null;
}
function doColumn(current, action) {
	hidePopup();
	var editor	= document.getElementById(current.EditorID);
	var tableSelection = GetTableSelection(current.EditorID);
	var currentCell, currentRow, currentTable;
	if ((tableSelection == null) || (tableSelection.tagName != "TD"))
		return false;
    currentCell = tableSelection;
	currentRow = currentCell.parentElement;
	currentTable = currentRow.parentElement;  //Now currentTable is the current Table,  currentRow is the current Row
	if ((!currentTable.childNodes.length) || (!currentTable))
         return false;
	// go back to TABLE def and keep track of cell index
	var cellIndex = currentCell.cellIndex;
    for (var i = 0; i < currentTable.rows.length; i++) {
         var cell = currentTable.rows[i].childNodes[cellIndex];
         if (!cell)
			break; // can't add cell after cell that doesn't exist
         if (action == "add") 
			cell.insertAdjacentElement("AfterEnd",  editor.document.createElement("TD") );
         else {
			if (cell.rowSpan > 1)
				i += (cell.rowSpan - 1);
			cell.removeNode(true);
         }
    }
    Toggleborder(current,0);    
    tableSelection	= null;
	currentTable	= null;
	currentRow		= null;
	currentCell		= null;
}
function doCell(current, action) {
	
	hidePopup();	
	var editor	= document.getElementById(current.EditorID);
	var tableSelection = GetTableSelection(current.EditorID);
	var currentRow, currentCell;
	if ((tableSelection == null)  || (tableSelection.tagName!= "TD"))  //table selection must be a TD
		return false;
	currentCell = tableSelection;
	currentRow	= currentCell.parentElement;
	switch(action){
		case "add":
			var nc = editor.document.createElement("TD");
			currentRow.insertBefore(nc, currentCell);
			break;
		case "delete":
			currentRow.removeChild(currentCell);
			break;
		case "merge":
			if (!currentCell.nextSibling)
				return;
			// don't allow user to merge rows with different rowspans
			if (currentCell.rowSpan != currentCell.nextSibling.rowSpan) {
				alert("Can't merge cells with different rowSpans.");
				return;
			}
			currentCell.innerHTML += currentCell.nextSibling.innerHTML;
			currentCell.colSpan += currentCell.nextSibling.colSpan;
			currentCell.nextSibling.removeNode(true);
			break;
		case "split":
			if (currentCell.colSpan < 2) 
				return this.doCell(current.UniqueID,'add');
			currentCell.colSpan = currentCell.colSpan - 1;
			var newCell = currentCell.parentNode.insertBefore( editor.document.createElement("TD"), currentCell);
			newCell.rowSpan = currentCell.rowSpan;
	  		break;
		default : return;
	}	
	Toggleborder(current, 0);
	tableSelection	= null;
	currentRow		= null;
	currentCell		= null;
}
function m_over() {
	element = window.event.srcElement;
	if(element && element.type=='btn')
		element.className='buttonover';
}
function m_out() {
	element = window.event.srcElement;
	if(element && element.type=='btn')
		element.className='button';
}
function m_up() {
	element = window.event.srcElement;
	if(element && element.type=='btn')
		element.className='buttonover';
}
function m_down(src) {
	element = window.event.srcElement;
	if(element && element.type=='btn')
		element.className='buttondown';
}
function doFalse() {
	window.event.returnValue = false;
}
function richDropDown(b_src,oContest,w,h,bgcolor,fontsize,fontFamily)
{
	hidePopup();
	// Retrieve the source element which fired the event.
	srcElem = event.srcElement;
	var oPopBody = popUp.document.body;
	popUp.document.body.onmouseleave = hidePopup;
	b_src = document.getElementById(b_src);
	oContest = document.getElementById(oContest);
    popUp.document.body.innerHTML = oContest.innerHTML; 
    popUp.show(0,25, w, h, b_src);

}
function hidePopup(){if(popUp) if(popUp.isOpen)	popUp.hide();}

function attr(name, value) 
{
	if (!value || value == "") return "" ;
		return ' ' + name + '="' + value + '"' ;
}

function button_over(eButton){
	eButton.style.borderColor = "#0A246A";
	eButton.style.backgroundColor = "#B6BDD2";
}		
function button_out(eButton){
	eButton.style.borderColor = "#efefef";
	eButton.style.backgroundColor = "#efefef";
}