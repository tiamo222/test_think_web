/* �ѧ���� ��Ǩ�ͺ�����ŷ���� Number */
	function ChkNum1(event){
		var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
				
			
			if(keyCode < 48 || keyCode > 57 ){			
					 return false;
			}			
	}
	
/* �ѧ���� ��Ǩ�ͺ�����ŷ���� Number */
	function ChkNum(field,event){
		var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
				
			
			if(keyCode < 48 || keyCode > 57 ){			
					 return false;
			}

			Enter(field,event);						
	}

/* �ѧ���� �׹�ѹ���ź������*/
	function Confirm(object){
   		if (confirm("�س��ͧ���ź�����Ź�����������?")== true){
				return true;
		}
			return false;	
	}

/* �ѧ���� �׹�ѹ����Ѿഷ������*/
	function ConfirmUpdate(object){
   		if (confirm("�����䢢����Ź�� ���������ö����¹��Ѻ�׹�� \n             ��س��׹�ѹ������?")== true){
				return true;
		}
			return false;	
	}
	
/* �ѧ���� ź�����ŷ�����������͡*/
	function DeleteSelect(Sindex,Scount){
		var tempObj;
 		
			if (confirm("�س��ͧ���ź�����ŷ�����������͡���������?")){
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
	
/* �ѧ���� ¡��ԡ��á� ENTER*/
	function DisEnter (field, event){
			var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
			if (keyCode == 13){
				return false;
			} 
			else
			return true;
	}      

/* �ѧ���� ����͹仿�ŶѴ�����͡� ENTER*/
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
	
/* �ѧ���� �׹�ѹ����͡�ҡ�к�*/
	function Logout(){
   		if (confirm("�س��ͧ����͡�ҡ�к����������?")== true){
				window.location.replace("../system/logout.php?page="+document.editForm.action);				
				return true;
		}
		//return false;	
	}

/* �ѧ���� ���Ң����ŷ������䫷� */
	function SearchData(event){

			var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
			
			
			if (keyCode == 13||keyCode==null){
			
				   if (document.editForm.search_txt.value == ""){
					 alert("��سһ�͹�����ŷ���ͧ��ä���"); 
					 document.editForm.search_txt.focus();
					 return false;
				  }else
				  {	
							document.editForm.action = "search_data.php";
							document.editForm.submit();  
				  }
			}
	}

/* �ѧ���� ���Ң�����㹿����*/
	function SearchForm(event){

			var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
		 //alert(keyCode);
			if (keyCode == 13||keyCode==null){
			
			
				   if (document.editForm.search_txt.value == ""){
					 alert("��سһ�͹�����ŷ���ͧ��ä���"); 
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

/* �ѧ���� ��䢢����ŷ�����������͡*/ 
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
			if(tmp==1) alert("��س����͡������");
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
			if(tmp==1) alert("��س����͡������");
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
			if(tmp==1) alert("��س����͡������");
			else document.forms[0].submit(); 
		}
		
	}