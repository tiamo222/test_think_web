var isNN = (navigator.appName.indexOf("Netscape")!=-1);
function checkNumValue(event){
	var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
	if ((keyCode < 48 || keyCode > 57 )&&(keyCode != 13)) {			
		return false;
	}else return true;
}
function checkInt(event){
	var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
	if ((keyCode < 48 || keyCode > 57 )&&(keyCode != 13)) {			
		return false;
	}else return true;
}
function checkFloat(event){
	var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
	if ((keyCode < 48 || keyCode > 57 )&&(keyCode != 13)&&(keyCode != 46)) {			
		return false;
	}else return true;
}
function checkNumSlash(event){
	var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
	if ((keyCode < 47 || keyCode > 57 )&&(keyCode != 13)) {			
		return false;
	}else return true;
}
function checkEmail(event){
	var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
	if ((keyCode != 45)&&(keyCode != 46)&&(keyCode < 48 || keyCode > 57 )&&(keyCode< 64 || keyCode > 90 )&&(keyCode != 95)&&(keyCode< 97 || keyCode > 122 )&&(keyCode != 13)) {			
		return false;
	}else return true;
}
function check_number(ch){
	var len=0, digit;
	if(ch == " ")	return false;
	else len = ch.length;
	for(var i=0 ; i<len ; i++){
		digit = ch.charAt(i)
		if(digit >="0" && digit <="9")	continue;
		else return false;
	} 
	return true;
}
function checkIDCard(ele){
	var len = ele.value.length;
	if(len==13){
		if(checkDigitIdCard(ele.value.slice(0, 12)) != ele.value.slice(12, 13)) {
			alert("เลขประจำตัวประชาชนผิด กรุณากรอกใหม่");
		}
	}else{
		alert("กรุณากรอกเลขประจำตัวประชาชนให้ครบ 13 หลัก");
	}
}
// คำนวณเลข Check Digit Id Card 12 Digit
function checkDigitIdCard(num){
	var digit = 0;
	var len = num.length;
	if(len==12){
		for(var i=0 ; i<len; i++){
			var tmp = num.charAt(i);
			digit += (tmp*(13-i));
		} 
		digit = 11-(digit%11);
		if(digit>9) digit = digit-10;
		digit= ""+digit;
	}
	return digit;
}
function autoCalculateCheckDigitIdCard(ele, evt){
	if(checkNumValue(evt)){
		var len = ele.value.length;
		if(len==11){
			alert(checkDigitIdCard(ele.value + String.fromCharCode(evt.keyCode)));
			ele.value +=String.fromCharCode(evt.keyCode)+checkIdCard(ele.value + String.fromCharCode(evt.keyCode));
		}
		return false;	
	}
}
function autoTab(varname, order, max_id, next_element, len, e) {
	var current_id = varname + '_' + order
	var prev_id
	if (order <= 1) {
		prev_id = varname + '_' + order
	} else {
		prev_id = varname + '_' + (order-1)
	}
	var next_id
	if (order >= max_id) {
		next_id = next_element
	} else {
		next_id = varname + '_' + (order+1)
	}

	var keyCode = (isNN) ? e.which : e.keyCode;
	if (( e.keyCode >= 48 && e.keyCode <= 57 ) || ( e.keyCode >= 96 && e.keyCode <= 105 ) || e.keyCode == 9 || e.keyCode == 8){

	} else {
		document.getElementById(current_id).focus();
		document.getElementById(current_id).select();
		return false;
	}
	var filter = (isNN) ? [0,8,9] : [0,8,9,16,17,18,37,38,39,40,46];

	if(e.keyCode == 8){
		// Backspace
		document.getElementById(prev_id).focus();
		document.getElementById(prev_id).select();
	} 

	if(document.getElementById(current_id).value.length >= len && !containsElement(filter,keyCode)) {
		document.getElementById(next_id).value.slice(0, len);
		document.getElementById(next_id).focus();
		//document.getElementById(next_id).select();
	}
	return true;
}
function containsElement(arr, ele) {
	var found = false, index = 0;
	while(!found && index < arr.length)
		if(arr[index] == ele)
			found = true;
		else
			index++;
	return found;
}