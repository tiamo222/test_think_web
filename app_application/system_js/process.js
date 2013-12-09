/* ฟังก์ชั่น ตรวจสอบข้อมูลที่เป็น Number */
	function ChkNum1(event){
		var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
				
			
			if(keyCode < 48 || keyCode > 57 ){			
					 return false;
			}			
	}
	
/* ฟังก์ชั่น ตรวจสอบข้อมูลที่เป็น Number */
	function ChkNum(field,event){
		var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
				
			
			if(keyCode < 48 || keyCode > 57 ){			
					 return false;
			}

			Enter(field,event);						
	}

/* ฟังก์ชั่น ยืนยันการลบข้อมูล*/
	function Confirm(object){
   		if (confirm("คุณต้องการลบข้อมูลนี้ใช่หรือไม่?")== true){
				return true;
		}
			return false;	
	}

/* ฟังก์ชั่น ยืนยันการอัพเดทข้อมูล*/
	function ConfirmUpdate(object){
   		if (confirm("การแก้ไขข้อมูลนี้ จะไม่สามารถเปลี่ยนกลับคืนได้ \n             กรุณายืนยันการแก้ไข?")== true){
				return true;
		}
			return false;	
	}
	
/* ฟังก์ชั่น ลบข้อมูลทั้งหมดที่เลือก*/
	function DeleteSelect(Sindex,Scount){
		var tempObj;
 		
			if (confirm("คุณต้องการลบข้อมูลทั้งหมดที่เลือกใช่หรือไม่?")){
					for(i=Sindex;i<=Scount;i++){
					
							
							tempObj = eval("document.editForm.CK" + i ); 
							
											alert(tempObj);

							if(tempObj.checked ==true){
									document.editForm.select_list.value = tempObj.value  + "," + document.editForm.select_list.value ;										
							}						
								alert(	document.editForm.select_list.value );
//								document.editForm.action = self.location
//								document.editForm.submit();  
							
					}
			}
	}
	
/* ฟังก์ชั่น ยกเลิกการกด ENTER*/
	function DisEnter (field, event){
			var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
			if (keyCode == 13){
				return false;
			} 
			else
			return true;
	}      

/* ฟังก์ชั่น เลื่อนไปฟิลถัดไปเมื่อกด ENTER*/
	function Enter (field, event){
			var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
			if (keyCode == 13){
				var i;
				for (i = 0; i < field.form.elements.length; i++)
					if (field == field.form.elements[i])
						break;
				i = (i + 1) % field.form.elements.length;
				field.form.elements[i].focus();
				return false;
			} 
			else
			return true;
		}      

	
	function GetFileName(){
		var filename = document.editForm.add_file.value;
		
		filename = filename.substr(filename.lastIndexOf("\\") + 1 ,filename.length );
		document.editForm.file_name.value = filename.substr(0 ,filename.lastIndexOf(".")  );

	}
	
/* ฟังก์ชั่น ยืนยันการออกจากระบบ*/
	function Logout(){
   		if (confirm("คุณต้องการออกจากระบบใช่หรือไม่?")== true){
				window.location.replace("../system/logout.php?page="+document.editForm.action);				
				return true;
		}
		//return false;	
	}

/* ฟังก์ชั่น ค้นหาข้อมูลทั้งหมดในไซท์ */
	function SearchData(event){

			var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
			
			
			if (keyCode == 13||keyCode==null){
			
				   if (document.editForm.search_txt.value == ""){
					 alert("กรุณาป้อนข้อมูลที่ต้องการค้นหา"); 
					 document.editForm.search_txt.focus();
					 return false;
				  }else
				  {	
							document.editForm.action = "search_data.php";
							document.editForm.submit();  
				  }
			}
	}

/* ฟังก์ชั่น ค้นหาข้อมูลในฟอร์ม*/
	function SearchForm(event){

			var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
		 //alert(keyCode);
			if (keyCode == 13||keyCode==null){
			
			
				   if (document.editForm.search_txt.value == ""){
					 alert("กรุณาป้อนข้อมูลที่ต้องการค้นหา"); 
					 document.editForm.search_txt.focus();
					 return false;
				  }else
				  {	
  							if (document.editForm.page!=null)document.editForm.page.value = "1";
							document.editForm.searching.value = "true";
							document.editForm.action = self.location
							document.editForm.submit();  
				  }
			}
	}

/* ฟังก์ชั่น แก้ไขข้อมูลทั้งหมดที่เลือก*/ 
	function UpdateSelect(txt){
		var tmp=1;
		if (confirm(txt)){
			var win = document.forms[0];
			for(i=0;i<win.elements.length;i++){
				if(win.elements[i].type=="checkbox"){
					if(win.elements[i].checked){
						if(win.elements[i].name!="CKAll"){
							if(tmp==1)	document.editForm.select_list.value = win.elements[i].value ;		
							else document.editForm.select_list.value = document.editForm.select_list.value  + "," + win.elements[i].value ;
							tmp++;
						}			
					}
				}//element == checkbox
			}//loop for
			if(tmp==1) alert("กรุณาเลือกข้อมูล");
			else document.forms[0].submit(); 
		}
		
	}
	function UpdateRadio(txt){
		var tmp=1;
		if(confirm(txt)){
			var win = document.forms[0];
			for(i=0;i<win.elements.length;i++){
				if(win.elements[i].type=="radio"){
					if(win.elements[i].checked){
						if(tmp==1)	document.editForm.select_list.value = win.elements[i].value ;		
						else document.editForm.select_list.value = document.editForm.select_list.value  + "," + win.elements[i].value ;
						tmp++;
					}
				}//element == checkbox
			}//loop for
			if(tmp==1) alert("กรุณาเลือกข้อมูล");
			else document.forms[0].submit(); 
		}
	}
		
	function UpdateSelectText(txt){
		var tmp=1;
		if (confirm(txt)){
			var win = document.forms[0];
			win.select_list.value = "";
			for(i=0;i<win.elements.length;i++){
				if(win.elements[i].type=="checkbox"){
					if(win.elements[i].checked){
						if(win.elements[i].name!="CKAll"){
							if(tmp==1)	win.select_list.value = "'"+win.elements[i].value+"'" ;		
							else win.select_list.value+= ",'"+win.elements[i].value+"'" ;
							tmp++;
						}			
					}
				}//element == checkbox
			}//loop for
			if(tmp==1) alert("กรุณาเลือกข้อมูล");
			else document.forms[0].submit(); 
		}
		
	}