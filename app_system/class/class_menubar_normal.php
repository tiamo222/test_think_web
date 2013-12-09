<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


class  class_menubar_normal{ 

	var $page = array();
	var $page_id = "";
	
	function show_menubar_normal(){
		print "<table class='toolbar' cellspacing='0' style=\"background-color:#999;border-collapse:1;\" ><tr>";
		foreach($this->page as $pIndex=>$tab){
			print "<td width='".$tab[2]."'  class=text_normal1  ";
			if($tab[0]==""){
				print ($this->page_id==$pIndex?"id='tab_on_nolink' ":"id='tab_off_nolink'  style=\"background-color:#E5E5E5;\"  "); 
			}else{
				print ($this->page_id==$pIndex?"id='tab_on' ":"id='tab_off'  onmouseover='this.id=\"tab_over\"' onmouseout='this.id=\"tab_off\"'  style=\"background-color:#E5E5E5;\"  "); 
				/// echo "onclick='edit_toolbar(\"".$tab[0]."\")' ";
			}
			print ">";													
			print "<a href=\"".$tab[0]."\"><img src='../images/icon/".$tab[3].".gif' width='24' height='24' hspace='2' vspace='4' align='absmiddle'  border='0'/><font color=#333333><b>".$tab[1]."</b></font></a></td>";													
			print "<td class='tab_space' rowspan='2'><img src='../images/span.gif' width='1' height='25' /></td>";
		}
		print "</tr><tr>";
		foreach($this->page as $pIndex=>$tab){
			print "<td    ";
			print ($this->page_id==$pIndex?"id='line_on' ":"id='line_off' "); 
			print "><img src='../images/span.gif' width='100' height='1' /></td>";													
		}
		print "</tr></table>";
	}

	
}   /// end class

?>