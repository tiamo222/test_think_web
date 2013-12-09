<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>

<link rel="stylesheet" type="text/css" href="../TabContentScript/tabcontent.css" />
<script type="text/javascript" src="../TabContentScript/tabcontent.js"></script>

</head>
<body>




<?

/////////////////////////////////// START TAP
print "<ul id=\"tabsmain\" class=\"shadetabs\">";
print "<li><a href=\"#\" rel=\"tapsmain1\" class=\"selected\">Tab 1</a></li>";
print "<li><a href=\"#\" rel=\"tapsmain2\">Tab 2</a></li>";
print "</ul>";


print "<div style=\"border:1px solid gray; width:98%; margin-bottom: 1em; padding: 10px\">";

/////////////////////////////////// start main 1
print "<div id=\"tapsmain1\" class=\"tabcontent\">";
print " MAIN 1  <br /><br /> ";


/////////////////////////////////// start sub
print "<ul id=\"tabssub\" class=\"shadetabs\">";
print "<li><a href=\"#\" rel=\"sub1\" class=\"selected\">Sub 1</a></li>";
print "<li><a href=\"#\" rel=\"sub2\">Sub 2</a></li>";
print "</ul>";

print "<div style=\"border:1px solid gray; width:95%; margin-bottom: 1em; padding: 10px\">";

print "<div id=\"sub1\" class=\"tabcontent\">";
print "SUB 1";
print "</div>";

print "<div id=\"sub2\" class=\"tabcontent\">";
print "SUB 2";
print "</div>";

print "</div>";
/////////////////////////////////// end sub

print "</div>";
/////////////////////////////////// end main 1


/////////////////////////////////// start main 2
print "<div id=\"tapsmain2\" class=\"tabcontent\">";
print "MAIN 2 <br /><br />";
print "</div>";
/////////////////////////////////// end main 2



print "</div>";
/////////////////////////////////// end TAP





?>

<script type="text/javascript">
var tabsmain_n=new ddtabcontent("tabsmain")
tabsmain_n.setpersist(true)
tabsmain_n.setselectedClassTarget("link") //"link" or "linkparent"
tabsmain_n.init()
</script>


<script type="text/javascript">
var tabssub_n=new ddtabcontent("tabssub")
tabssub_n.setpersist(true)
tabssub_n.setselectedClassTarget("link") //"link" or "linkparent"
tabssub_n.init()
</script>










<ul id="tabsmain" class="shadetabs">
<li><a href="#" rel="country1" class="selected">Tab 1</a></li>
<li><a href="#" rel="country2">Tab 2</a></li>
<li><a href="#" rel="country3">Tab 3</a></li>
<li><a href="#" rel="country4">Tab 4</a></li>
</ul>

<div style="border:1px solid gray; width:98%; margin-bottom: 1em; padding: 10px">

<div id="country1" class="tabcontent">
Tab content 1 here<br />Tab content 1 here<br />
<br />
<br />
<br />



<?
/////////////////////////////////// start sub
?>
<ul id="tabssub" class="shadetabs">
<li><a href="#" rel="n1" class="selected">XXXXX 1</a></li>
<li><a href="#" rel="n2">XXXXX 2</a></li>
<li><a href="#" rel="n3">XXXXX 3</a></li>
</ul>

<div style="border:1px solid gray; width:95%; margin-bottom: 1em; padding: 10px">
<div id="n1" class="tabcontent">
Tab XXXXX 1 here<br />Tab content 1 here<br />
</div>

<div id="n2" class="tabcontent">
Tab XXXXX 2 here<br />Tab content 2 here<br />
</div>

<div id="n3" class="tabcontent">
Tab XXXXX 3 here<br />Tab content 3 here<br />
</div>

</div>

<?
/////////////////////////////////// end sub
?>
</div>




<div id="country2" class="tabcontent">
Tab content 2 here<br />Tab content 2 here<br />
</div>

<div id="country3" class="tabcontent">
Tab content 3 here<br />Tab content 3 here<br />
</div>

<div id="country4" class="tabcontent">
Tab content 4 here<br />Tab content 4 here<br />
</div>

</div>





<script type="text/javascript">
var tabsmain_n=new ddtabcontent("tabsmain")
tabsmain_n.setpersist(true)
tabsmain_n.setselectedClassTarget("link") //"link" or "linkparent"
tabsmain_n.init()
</script>


<script type="text/javascript">
var tabssub_n=new ddtabcontent("tabssub")
tabssub_n.setpersist(true)
tabssub_n.setselectedClassTarget("link") //"link" or "linkparent"
tabssub_n.init()
</script>








  
  
</body>
</html>