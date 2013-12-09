<!------------------------------------------------------------------------
//
//  File:         ColorPicker.htm
//
//  Description:  The ColorPicker behavior provides an easy, declarative way
//                to add a standard color picker control to web pages and html
//                based applications.  It provides a variety of properties
//                to customize the look and feel along with a strong set 
//                events and functionality.
//
//	Author:		  Venkata Karthikeyan, GE Power Systems (Bently Nevada)
//				  venkat_it@hotmail.com
//----------------------------------------------------------------------->

<HTML XMLNS:VenkataKarthikeyan_ColorPicker XMLNS:mpc>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
	<title>Color Picker</title>
	<style>
	@media all
	{ 
		VenkataKarthikeyan_ColorPicker\:colorpicker { behavior: url(colorpicker.htc);} 
		mpc\:container {behavior:url(mpc.htc);}
		mpc\:page {behavior:url(mpc.htc)};}
	}
	</style>
	<script>
	
	//For Web Palette selection
	function fnOnWebPaletteClick()
	{
		//Get clicked element
		var e = window.event.srcElement
		
		var table = document.all['webPalette']
		
		//Verify clicked element is table cell or not
		if(e.tagName == "TD") 
		{
			//remove the selected border if any
			for(i=0;i<table.rows.length;i++) 
			{
				for(j=0;j<table.rows(i).cells.length;j++) 
				{
					table.rows(i).cells(j).style.borderColor = 'white'
				}
			}

			//Change the border
			e.style.borderColor = 'black'
			
			//Set the backcolor of selected cell to display area
			self.document.all['webPaletteDisplay'].innerText = e.title
			
			cpicker.Color = e.title
		}
	
	}
	
	//For Named Colors selection
	function fnOnNamedColorsClick()
	{
		//Get clicked element
		var e = window.event.srcElement
		
		//get table object
		var table = document.all['namedColors']
		
		//Verify clicked element is table cell or not
		if(e.tagName == "TD") 
		{
			//remove the selected border if any
			for(i=0;i<table.rows.length;i++) 
			{
				for(j=0;j<table.rows(i).cells.length;j++) 
				{
					table.rows(i).cells(j).style.borderColor = 'white'
				}
			}
			
			//Change the border
			e.style.borderColor = 'black'
			
			//Set the backcolor of selected cell to display area
			self.document.all['namedColorsDisplay'].innerText = e.style.background
			
			cpicker.Color = e.style.background
		}
	}
	
	//For System Colors selection
	function fnOnChange()
	{
		//Description info array
		var systemClrsDescription = new Array('Active Window Border', 'Active Window Caption', 'Background color of multiple document interface',
		'Desktop background', 'Face color for three-dimensional display elements', 
		'Dark shadow for three-dimensional display elements (for edges facing away from the light source)', 
		'Shadow color for three-dimensional display elements', 'Text on push buttons', 
		'Text in caption, size box and scrollbar arrow box', 
		'Grayed (disabled) text. This color is set to #000 if the current display driver does not support a solid gray color',
		'Item(s) selected in a control', 'Text of item(s) selected in a control', 'Inactive window border', 
		'Inactive window caption', 'Color of text in an inactive caption', 'Background color for tooltip controls',
		'Text color for tooltip controls', 'Menu background', 'Text in menus', 'Scroll bar gray area', 
		'Dark shadow for three-dimensional display elements', 'Face color for three-dimensional display elements',
		'Highlight color for three-dimensional display elements', 
		'Light color for three-dimensional display elements (for edges facing the light source)', 
		'Shadow color for three-dimensional display elements (for edges facing away from the light source)', 
		'Window background', 'Window frame', 'Text in windows')
		
		//Get Colors drop down list control object
		var sysClrs = self.document.all['systemColorsCombo']
		
		//Get Description control and set proper description for selected system color
		var desc = self.document.all['sysClrsDescription']
		desc.innerText = systemClrsDescription[sysClrs.selectedIndex]
		
		//Set preview color on Preview control
		var preview = self.document.all['sysClrsPreview']
		preview.style.backgroundColor = sysClrs.options[sysClrs.selectedIndex].innerText
		
		//Set color number display
		var checkBoxSysClrs = self.document.all['CheckboxSystemColors']
		self.document.all['systemColorsDisplay'].innerText = sysClrs.options[sysClrs.selectedIndex].innerText
		
		cpicker.Color = sysClrs.options[sysClrs.selectedIndex].innerText

	}
	
	//For Custom Color Scroling activities
	function fnOnScroll()
	{

		//Get scrollbar controls objects
		var redScroll = self.document.all['redScroll']
		var greenScroll = self.document.all['greenScroll']
		var blueScroll = self.document.all['blueScroll']
	
		//Calculate r value
		var rColor = parseInt((redScroll.offsetWidth * redScroll.scrollLeft) / redScroll.scrollWidth)
		self.document.all['rValue'].innerText = rColor
		rColor = rColor.toString(16)
		if(rColor.length == 1) rColor = "0" + rColor;
	
		//Calculate g value
		var gColor = parseInt((greenScroll.offsetWidth * greenScroll.scrollLeft) / greenScroll.scrollWidth)
		self.document.all['gValue'].innerText = gColor
		gColor = gColor.toString(16)
		if(gColor.length == 1) gColor = "0" + gColor;
	
		//Calculate b value
		var bColor = parseInt((blueScroll.offsetWidth * blueScroll.scrollLeft) / blueScroll.scrollWidth)
		self.document.all['bValue'].innerText = bColor
		bColor = bColor.toString(16)
		if(bColor.length == 1) bColor = "0" + bColor;
	
		//Set preview & Color Number display
		var preview = self.document.all['customeColorPreview']
		preview.style.backgroundColor = '#'+ rColor + gColor + bColor
		self.document.all['customColorDisplay'].innerText = '#'+ rColor + gColor + bColor
		
		cpicker.Color = '#'+ rColor + gColor + bColor
	}
	</script>
	<body bgcolor="#d4d0c8">
		<VenkataKarthikeyan_ColorPicker:ColorPicker id="cpicker"></VenkataKarthikeyan_ColorPicker:ColorPicker>
	</body>
	<SCRIPT event="onload" for="window">
	
	//Load given color value
	cpicker.Color = (self.dialogArguments == "")?'#ffffff':self.dialogArguments
	cpicker.fnSetGivenColor()
				
	//set return value. In case, if user clicks cancel, he will get this.
	self.returnValue = self.dialogArguments
		
	</SCRIPT>
</HTML>
