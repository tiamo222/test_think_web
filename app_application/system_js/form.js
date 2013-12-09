var form = document.getElementById;
function afterDate(day, y, m, d){
	var arDate = day.split("/");
	var dateObj = new Date(arDate[2]-543, arDate[1]-1, arDate[0]);
	dateObj.setYear( parseInt(dateObj.getFullYear())+parseInt(y) );
	dateObj.setMonth( parseInt(dateObj.getMonth())+parseInt(m) );
	dateObj.setDate( parseInt(dateObj.getDate())+parseInt(d) );
	return	padZero(dateObj.getDate())+"/"+padZero(dateObj.getMonth()+1)+"/"+(dateObj.getFullYear()+543);
}
function beforeDate(day, y, m, d){
	var arDate = day.split("/");
	var dateObj = new Date(arDate[2]-543, arDate[1]-1, arDate[0]);
	dateObj.setYear( parseInt(dateObj.getFullYear())-parseInt(y) );
	dateObj.setMonth( parseInt(dateObj.getMonth())-parseInt(m) );
	dateObj.setDate( parseInt(dateObj.getDate())-parseInt(d) );
	return	padZero(dateObj.getDate())+"/"+padZero(dateObj.getMonth()+1)+"/"+(dateObj.getFullYear()+543);
}
function chkLveDay(chkLveDay, lveDay1, lveDay2, partDay1, partDay2) {
	if(lveDay1!="" && lveDay2!=""){
//		var arLveDay1 = new Array();
		arLveDay1 = lveDay1.split("/");
		arLveDay2 = lveDay2.split("/");

		var date1 = new Date(arLveDay1[2]-543, arLveDay1[1]-1, arLveDay1[0]);
		var date2 = new Date(arLveDay2[2]-543, arLveDay2[1]-1, arLveDay2[0]);
		if(date2<date1){
			alert("ไม่สามารถเลือกวันลาเริ่มต้นก่อนวันลาที่จะถึง");
		}else{
			var numDay = (date2-date1)/86400000;
			if(partDay1==0 && partDay2==0)	chkLveDay.value = numDay+1;
			if(partDay1==0 && partDay2==1)	chkLveDay.value = numDay+0.5;
			if(partDay1==0 && partDay2==2)	chkLveDay.value = numDay+1;
			if(partDay1==1 && partDay2==0)	chkLveDay.value = numDay+1;
			if(partDay1==1 && partDay2==1)	chkLveDay.value = numDay+0.5;
			if(partDay1==1 && partDay2==2)	chkLveDay.value = numDay+1;
			if(partDay1==2 && partDay2==0)	chkLveDay.value = numDay+0.5;
			if(partDay1==2 && partDay2==1)	chkLveDay.value = numDay;
			if(partDay1==2 && partDay2==2)	chkLveDay.value = numDay+0.5;
			document.getElementById('save').disabled = false;
		}
	}else{
		alert("กรุณาเลือกวันลา");
	}
}

/* ฟังก์ชั่น popup */
function help(url){
	var win = launchCenter(url, 'help', 600,800, "scrollbars=yes,status=no,menubar=no,resizable=yes", false);
	if(win.closed == false){
		win.focus()
	}
}

/* ฟังก์ชั่น popup */
function previewDoc(url){
	var win = launchCenter(url, 'doc', 600,800, "scrollbars=no,status=no,menubar=no,resizable=no", true);
	if(win.closed == false){
		win.focus()
	}
}

/* ฟังก์ชั่น popup */
function popup(url){
	var win = launchCenter(url, 'newwin', 700,900, "scrollbars=yes,status=no,menubar=no,resizable=yes", true);
}
function launchCenter(url, name, height, width, features, lock) {

	var str = "height=" + height + ",innerHeight=" + height;
	str += ",width=" + width + ",innerWidth=" + width;
	if (window.screen) {
		var ah = screen.availHeight - 30;
		var aw = screen.availWidth - 10;
		
		var xc = (aw - width) / 2;
		var yc = (ah - height) / 2;
		
		str += ",left=" + xc + ",screenX=" + xc;
		str += ",top=" + yc + ",screenY=" + yc;
	}
	
	str += ","+features;
	var childwindow = window.open(url, name, str);
	if(lock){
		window.onfocus = function(){if (childwindow.closed == false){childwindow.focus();};};
	}
  return childwindow;
}
/* ฟังก์ชั่น Taggle Filter*/
function TaggleFilter(){
	if(document.getElementById('quick_search').style.display=="inline"){
		document.getElementById('searching').value = "";	
		document.getElementById('search_txt').value = "";	
		document.getElementById('quick_search').style.display = "none";	
		document.getElementById('sensitive_search').style.display = "inline";	
	}else{
		document.getElementById('searching').value = "";	
		document.getElementById('search_txt').value = "";	
		document.getElementById('sensitive_search').style.display = "none";	
		document.getElementById('quick_search').style.display = "inline";	
	}
}
/* ฟังก์ชั่น Filter*/
function ClrSelect(modelSelectName){
	var modelSelect = document.getElementById(modelSelectName);
	modelSelect.options.length = 0; 
	modelSelect.options[0] = new Option(modelSelect.title,"");
}
function FilterSelect(makeSelect, modelSelectName, arraySelect){
	var modelSelect = document.getElementById(modelSelectName);
	modelSelect.options.length = 0; 
	modelSelect.options[0] = new Option(modelSelect.title,"");
	index = makeSelect.options[makeSelect.selectedIndex].value;
	if (index >0){
		var name =  arraySelect[index];
		var x=0;
		for( var i in name){
			 x++;
			 modelSelect.options[x] = new Option(name[i],i);
		}
	}
}
/* ฟังก์ชั่น ยกเลิกการ goto page */
function ChPage(page){
	document.editForm.page.value = page;	
	SubmitForm("Edit");	
}

/* ฟังก์ชั่น ยกเลิกการ Submit Form */
	function CancelForm(){
   		if (confirm("คุณต้องการยกเลิกการบันทึกข้อมูลนี้ใช่หรือไม่?")== true){	
				history.back();				
				return true;
		}
		return false;	
	}

	function CancelItem(head){	
		   	document.editForm.process.value ="";
			document.editForm.id.value = head;
			SubmitForm(head)
	}
/* ฟังก์ชั่น อ่าน text ใน dropdown ที่เลือก*/
	function getTextOptionsSelected(ele){
		var result = "";
		for ( i = 0; i<ele.length; i++){
			 if(ele.options[i].selected) result = ele.options[i].text;
		}
		return result;
	}
/* ฟังก์ชั่น อ่าน value ใน dropdown ที่เลือก*/
	function getValueOptionsSelected(ele){
		var result = "";
		for ( i = 0; i<ele.length; i++){
			 if(ele.options[i].selected) result = ele.options[i].value;
		}
		return result;
	}
/* ฟังก์ชั่น เลือกข้อมูลทั้งหมด*/
	function CheckAll(Sindex,Scount){
		if(document.editForm.CKAll.checked ==true){				
					for(i=Sindex;i<=Scount;i++){		
										eval("document.editForm.CK"+i+".checked = true") ;
					}
		}else{
				for(i=Sindex;i<=Scount;i++){
					eval("document.editForm.CK"+i+".checked = false");					
				}
		}
	}
	
	

/* ฟังก์ชั่น เลือกข้อมูลทั้งหมด แบบส่งค่าของ ck box ได้*/
	function CheckAlln(Sindex,Scount,object){
		if(object.checked ==true){
				for(i=Sindex;i<=Scount;i++){
					eval("document.editForm.CK"+i+".checked = true")
				}
		}else{
				for(i=Sindex;i<=Scount;i++){
					eval("document.editForm.CK"+i+".checked = false")
				}
		}
	}
	
	function CheckAllK(){
		var win = document.forms[0];
		for(i=0;i<win.elements.length;i++){
			if(win.elements[i].type=="checkbox"){
				win.elements[i].checked = win.CKAll.checked;
			}//element == checkbox
		}//loop for
	}

/*  ฟังก์ชั่นกรองข้อมูลในดรอปดาวน์ลิส */			
	function Filter(name,field){				
		var arPosition = new Array();	  
		var add = true;
		
		groupFilter =document.getElementById('parent'+name);	
		gLen = groupFilter.length;
		for ( i=0; i<gLen ; i++){		
			if(groupFilter.options[i].text == field.name){
					groupFilter.options[i].value=field.value;	
			}
		}	
		
		m1 = document.getElementById(''+name)	;		
		m2 = document.getElementById('temp'+name)	;	
		
		m1len = m1.length ;
		m2len = m2.length ;
		
		for ( i = (m1len -1); i>0; i--){
			m1.options[i] = null;
		}
		
		for ( i=1; i<m2len ; i++){		
			arPosition = m2.options[i].value.split('_');
			for ( j=0; j<gLen ; j++){	
				if (arPosition[j+1] !=groupFilter.options[j].value){		
						if(groupFilter.options[j].value!='')add = false;							
				}
			}//loop for
			if(add==true){
				m1len = m1.length;	
				m1.options[m1len]= new Option(m2.options[i].text , arPosition[0]);		
				if(m2.options[i].selected==true)m1.options[m1len].selected=true;
			}
			add = true;
		}		

	}
	
	function FilterConcenYear(name,field){			
		Filter(name,field)	;
		groupFilter =document.getElementById(name);	
		len = groupFilter.options[1].text
		for ( i=0; i<=len ; i++){		
			if(i==0)groupFilter.options[i] = new Option(groupFilter.options[0].text,"");
			else groupFilter.options[i]= new Option(i , i);		
		}	
	}

/* ฟังก์ชั่น refresh หน้าจอ*/
	function RefreshForm(){
			window.location.replace(document.editForm.action);				
	}
	
/* ฟังก์ชั่นเลือกข้อมูลทั้งหมดใน textbox */
	function SelectText (field){
			field.select();
	}      

	function SubmitForm(head){
				document.editForm.action += "#head" + head;
				document.editForm.submit();  
	}

	function SubmitPage(page){
				document.editForm.action = page;
				document.editForm.submit();  
	}

function checkCurrentPage(){
	var currentPage = document.location.pathname.toString();
	currentPage = currentPage.substr(currentPage.lastIndexOf("/")+1, currentPage.length);
	if(currentPage.length < 1) return;

	var objMenu = document.getElementById("navMenu");
	if(!objMenu) return;

	var objs = objMenu.getElementsByTagName("A");
	for(var i=0; i<objs.length; i++){
		var page = objs[i].href;
		page = page.substr(page.lastIndexOf("/")+1, page.length);
		if(page == currentPage) objs[i].className = "buttons-active";
	}
}
/*เรียกใช้งาน AJAX*/
function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
}	
/*ซ่อนข้อความบนสเตตัสบาร์*/
function HideStatus(){
	 self.status = "ระบบบริหารจัดการทรัพยากรมนุษย์ (HRD) มหาวิทยาลัยเทคโนโลยีราชมงคลสุวรรณภูมิ";
	return true
}
//---------------------------------------START LEK---------------------------------------
//สร้างข้อความใน  tag td
function createCellWithText(text,ali,wid) {
	var font = document.createElement("font");
	font.face = "Tahoma"; 
	font.size = "2px";
	//font.weight = "bold";
	font.appendChild(document.createTextNode(text));
	var cell = document.createElement("td");
	cell.align = ali;
	cell.width = wid;
	cell.appendChild(font);
	return cell;
}
//สร้าง option ของ dropdrow
function createOption(idDiv,txt,val){
	var createOption = document.createElement("option");
	var createText = document.createTextNode(txt);
	idDiv.appendChild(createOption);
	createOption.appendChild(createText);	
	createOption.setAttribute("value",val);	
} 
//ลบ Element 
function clearDiv(divName){
	var dcl = divName.childNodes.length;
	for(var i = dcl-1;i>=0;i--){
		divName.removeChild(divName.childNodes[i]);
	}
}
//คำนวณตำแหน่ง Tooltip
function setOffsets(dataDiv,width,height) {
 var end = offsetEl.offsetWidth;
 var top = calculateOffsetTop(offsetEl,height);
 dataDiv.style.border = "#999999 1px solid";
 dataDiv.style.left = end + width + "px";
 dataDiv.style.top = top + "px";
}
function calculateOffsetTop(field,height) {
 return calculateOffset(field,"offsetTop",height);
}
function calculateOffset(field,attr,height) {
 var offset = height;
 while(field) {
 	offset += field[attr]; 
    field = field.offsetParent;
 }
 return offset;
}
//จัดการ event จาก element
function handleEvent(element){
	var ids = element.id;
		  Event.observe(ids,"mouseover",processTooltip);
		  Event.observe(ids,"mouseout",clearTooltip);
		  Event.observe(ids,"click",clearTooltip);
}
function detailTooltip(result){
	$("tooltip").innerHTML = result.responseText;
}
function clearTooltip(event){
	$("tooltip").style.display = "none";	
}
//ตรวจสอบ ให้กรอกได้เฉพาะตัวเลขและตัวเลขทศนิยมเท่านั้น
function check_number(ch){
	var len, digit;
	if(ch == " "){ 
		return false;
		len=0;
	}
	else{
		len = ch.length;
	}
	for(var i=0 ; i<len ; i++){
		var pattern = "[0-9]\.[0-9]";
 		var re = new RegExp(pattern);
		digit = ch.charAt(i)
		if((digit >="0" && digit <="9") || (ch.match(re))){
			; 
		}
		else{
			return false; 
		} 
	} 
	return true;
}
function searchSelect(ele_name){
	var myObject = document.getElementById(ele_name);
//	var myObject = new Object();
	if(myObject.type == "select-one"){
		var result = showModalDialog("../popup/dlg_search.php", myObject, "dialogWidth:328px;dialogHeight:475px");
		if(result!=null){
			myObject.value = result;
		}
	}
}
function SelectListAdd(listObj, optionValue, optionText){
	listObj.options[listObj.length]= new Option(optionText , optionValue);		
}
function SelectListRemove(listObj, optionsSelectedIndex){
	if(listObj.options.selectedIndex >-1)	listObj.options.remove(optionsSelectedIndex)
}

ModalPopup = function (elem,options) {
	//option default settings
	//// alert(form)
	
		
	options = options || {};
	var HasBackground = (options.HasBackground!=null)?options.HasBackground:true;
	var BackgroundColor = options.BackgroundColor || '#000000';
	var BackgroundOpacity = options.BackgroundOpacity || 60; // 1-100
	BackgroundOpacity = (BackgroundOpacity > 0) ? BackgroundOpacity : 1;
	var BackgroundOnClick = options.BackgroundOnClick || function(){};
	var BackgroundCursorStyle = options.BackgroundCursorStyle || "default";
	var Zindex = options.Zindex || 90000;
	var AddLeft = options.AddLeft || 0; //in px
	var AddTop = options.AddTop || 0; //in px

	var popup = document.getElementById(elem);
	if (!popup) {return;}
	//set the popup layer styles
	var winW = Window.getWindowWidth();
	var winH = Window.getWindowHeight();
	//display the popup layer
	popup.style.display = "block";
	popup.style.visibility = "visible";
	var elemW = GetWidth(popup);
	var elemH = GetHeight(popup);
	popup.style.position = "fixed";
	popup.style.left = (winW/2 - elemW/2 + AddLeft) + "px";
	popup.style.top = (winH/2 - elemH/2 + AddTop - 10) + "px";
	popup.style.zIndex = Zindex + 1;
	if (HasBackground) {		
		if (!ModalPopup._BackgroundDiv) {
			ModalPopup._BackgroundDiv = document.createElement('div');
			ModalPopup._BackgroundDiv.style.display = "none";
			ModalPopup._BackgroundDiv.style.width = "100%";
			ModalPopup._BackgroundDiv.style.position = "absolute";
			ModalPopup._BackgroundDiv.style.top = "0px";
			ModalPopup._BackgroundDiv.style.left = "0px";
			document.body.appendChild(ModalPopup._BackgroundDiv);
		}
		ModalPopup._BackgroundDiv.onclick =  BackgroundOnClick;
		ModalPopup._BackgroundDiv.style.background = BackgroundColor;	
		ModalPopup._BackgroundDiv.style.height = Window.getScrollHeight() + "px";
		ModalPopup._BackgroundDiv.style.filter = "progid:DXImageTransform.Microsoft.Alpha(opacity=" + BackgroundOpacity +")";
		ModalPopup._BackgroundDiv.style.MozOpacity = BackgroundOpacity / 100;		ModalPopup._BackgroundDiv.style.opacity = BackgroundOpacity / 100;
		ModalPopup._BackgroundDiv.style.zIndex = Zindex;
		ModalPopup._BackgroundDiv.style.cursor = BackgroundCursorStyle;
		//Display the background
		ModalPopup._BackgroundDiv.style.display = "";
	}
}
ModalPopup.Close = function(id) {
	if(id) {
		document.getElementById(id).style.display = "none";
		document.getElementById(id).style.visibility = "hidden";	
	}
	if(ModalPopup._BackgroundDiv) {
		ModalPopup._BackgroundDiv.style.display = "none";
	}
}//-------------------------------------END LEK---------------------------------------
if (document.layers)
document.captureEvents(Event.MOUSEOVER | Event.MOUSEOUT)

document.onmouseover=HideStatus
document.onmouseout=HideStatus

