/*** Copy Right Information ***
  * Please do not remove following information.
  * Element Size v1.0
  * Author: John J Kim
  * Email: john@frontendframework.com
  * URL: www.FrontEndFramework.com
  * 
  * You are welcome to modify the codes as long as you include this copyright information.
 *****************************/
 
GetWidth = function(elem) {
	function _convertValue(val) {
		if (!val) {return;}
		val = parseInt(val.replace("px",""));
		if (!val || isNaN(val)) {return 0;}
		return val;
	}
	var currentStyle;
	if (elem.currentStyle)	{ currentStyle = elem.currentStyle; }
	else if (window.getComputedStyle) {	currentStyle = document.defaultView.getComputedStyle(elem, null); }
	else { currentStyle = elem.style; }
	
	return (elem.offsetWidth -
			_convertValue(currentStyle.marginLeft) -
			_convertValue(currentStyle.marginRight) -
			_convertValue(currentStyle.borderLeftWidth) -
			_convertValue(currentStyle.borderRightWidth));
}

GetHeight = function(elem) {
	function _convertValue(val) {
		if (!val) {return;}
		val = parseInt(val.replace("px",""));
		if (!val || isNaN(val)) {return 0;}
		return val;
	}
	var currentStyle;
	if (elem.currentStyle)	{ currentStyle = elem.currentStyle; }
	else if (window.getComputedStyle) {	currentStyle = document.defaultView.getComputedStyle(elem, null); }
	else { currentStyle = elem.style; }
	return (elem.offsetHeight -
	        _convertValue(currentStyle.marginTop) -
    	    _convertValue(currentStyle.marginBottom) -
        	_convertValue(currentStyle.borderTopWidth) -
        	_convertValue(currentStyle.borderBottomWidth));	
}
