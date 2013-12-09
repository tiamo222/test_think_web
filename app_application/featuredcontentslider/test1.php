<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>


<link rel="stylesheet" type="text/css" href="contentslider.css" />
<script type="text/javascript" src="contentslider.js"></script>

</head>

<body>

<h2>Example 1</h2>

<!--Inner content DIVs should always carry "contentdiv" CSS class-->
<!--Pagination DIV should always carry "paginate-SLIDERID" CSS class-->

<div id="slider1" class="sliderwrapper">

<div class="contentdiv">
Content 1 Here. <br />
<p></p><a href="javascript:featuredcontentslider.jumpTo('slider1', 3)">Go to 3rd slide</a></p>
</div>

<div class="contentdiv">
Content 2 Here.
</div>

<div class="contentdiv">
Content 3 Here.
</div>

</div>

<div id="paginate-slider1" class="pagination">

</div>

<script type="text/javascript">

featuredcontentslider.init({
	id: "slider1",  //id of main slider DIV
	contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
	toc: "#increment",  //Valid values: "#increment", "markup", ["label1", "label2", etc]
	nextprev: ["Previous", "Next"],  //labels for "prev" and "next" links. Set to "" to hide.
	revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
	enablefade: [true, 0.2],  //[true/false, fadedegree]
	autorotate: [true, 3000],  //[true/false, pausetime]
	onChange: function(previndex, curindex){  //event handler fired whenever script changes slide
		//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
		//curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
	}
})

</script>




<br />
<h2>Example 2, Pagination links from markup</h2>

<!--Inner content DIVs should always carry "contentdiv" CSS class-->
<!--Pagination DIV should always carry "paginate-SLIDERID" CSS class-->

<div id="slider2" class="sliderwrapper">

<div class="contentdiv">
Content 1 Here.
</div>

<div class="contentdiv">
Content 2 Here. <br />
<p></p><a href="javascript:featuredcontentslider.jumpTo('slider2', 1)">Go back to 1st slide</a></p>
</div>

<div class="contentdiv">
Content 3 Here.
</div>

</div>

<div id="paginate-slider2" class="pagination">

<a href="#" class="toc">First Page</a> 
<a href="#" class="toc anotherclass">Second Page</a>
<a href="#" class="toc">Third Page</a>
<a href="#" class="prev" style="margin-left: 10px"><</a> <a href="#" class="next">></a>

</div>

<script type="text/javascript">

featuredcontentslider.init({
	id: "slider2",  //id of main slider DIV
	contentsource: ["inline", ""],  //Valid values: ["inline", ""] or ["ajax", "path_to_file"]
	toc: "markup",  //Valid values: "#increment", "markup", ["label1", "label2", etc]
	nextprev: ["Previous", "Next"],  //labels for "prev" and "next" links. Set to "" to hide.
	revealtype: "click", //Behavior of pagination links to reveal the slides: "click" or "mouseover"
	enablefade: [true, 0.2],  //[true/false, fadedegree]
	autorotate: [false, 3000],  //[true/false, pausetime]
	onChange: function(previndex, curindex){  //event handler fired whenever script changes slide
		//previndex holds index of last slide viewed b4 current (1=1st slide, 2nd=2nd etc)
		//curindex holds index of currently shown slide (1=1st slide, 2nd=2nd etc)
	}
})

</script>


</body>
</html>