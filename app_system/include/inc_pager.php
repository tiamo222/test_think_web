<?

$tag_span = "<img src=\"../images/span.gif\" width=\"20\" height=\"1\" />";

/*
///////////////////////////////////////////////////////////////////////////// pager
$set_pager_limit = 10 ; //// ¨Ó¹Ç¹µèÍË¹éÒ
$set_pager_start =  0 ; //// àÃÔèÁµé¹·Õè id ÅÓ´Ñº·Õè

$set_pager_count_data = $data_count_row ; 
$set_pager_total  =  ( $set_pager_count_data /  $set_pager_limit ); 
$set_pager_total = ceil($set_pager_total); 

if ($id_pager == ""  or $id_pager == 0  ) { $id_pager = 1 ;  } /// lower
if ($id_pager > $set_pager_total   ) { $id_pager = $set_pager_total ;  } /// heigher

if ($id_pager > 1 ) {
$number_n = $id_pager - 1 ; 
$set_pager_start =  $set_pager_limit * $number_n  ; 
}

$set_pager_url = "news_update_showall.php?";
$set_pager_value = "";  
///////////////////////////////////////////////////////////////////////////// pager end
*/









///////////////////////// start pager v1
 
 /*
id_pager
set_pager_limit
set_pager_start
*/

/*
$set_pager_url = "news_update_showall.php?";
$set_pager_value = "";  

$set_pager_count_data = $data_count_row ; 
$set_pager_total  =  ( $set_pager_count_data /  $set_pager_limit ); 
$set_pager_total = ceil($set_pager_total); 
$set_pager_group  = 5 ; 
*/


/// $set_pager_group  = 5 ; 


?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td align="right" valign="middle" class="text2">
<?

print " Total  $set_pager_count_data, Page  $id_pager/$set_pager_total&nbsp; " ;

?>
  </td>
<td width="260" align="right" valign="middle"><table border="0" cellpadding="1" cellspacing="2">
  <tr class="text_normal1">
<td width="35" align="center" valign="middle" bgcolor="#CCCCCC"  style="background-color:#CCCCCC;" class="text_normal1">
<? 
$this_url = "$set_pager_url"."id_pager=1&#showpager";
print "<a href=\"$this_url\">First</a>" ;  

print "<table width=\"1\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td style=\"padding:0px;background-color:#CCCCCC;\">
<img src=\"../images/span.gif\" width=\"35\" height=\"1\" /></td></tr></table>"; 

?>
</td>

<td width="35" align="center" valign="middle" bgcolor="#CCCCCC"   style="background-color:#CCCCCC;" class="text_normal1">
<? 
$id_pager_back = $id_pager - 1 ; 
if ($id_pager==0 or $id_pager==1) { $id_pager_back=1 ;   }
$this_url = "$set_pager_url"."id_pager=$id_pager_back&#showpager";
print "<a href=\"$this_url\">Back</a>" ;  

print "<table width=\"1\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td style=\"padding:0px;background-color:#CCCCCC;\">
<img src=\"../images/span.gif\" width=\"35\" height=\"1\" /></td></tr></table>"; 

?>
</td>

<?
/////////// set rang

$loop_page_start = 1 ; 
$loop_page_end = $set_pager_total ; 

if ($id_pager >= 0 and $id_pager <= 10 ) { 
$loop_page_start = 1 ; 
$loop_page_end = 10 ; 
}

/*

if ($id_pager >= 11 and $id_pager <= 20 ) { 
$loop_page_start = 11 ; 
$loop_page_end = 20 ; 
}

if ($id_pager >= 21 and $id_pager <= 30 ) { 
$loop_page_start = 21 ; 
$loop_page_end = 30 ; 
}

if ($id_pager >= 31 and $id_pager <= 40 ) { 
$loop_page_start = 31 ; 
$loop_page_end = 40 ; 
}

if ($id_pager >= 41 and $id_pager <= 50 ) { 
$loop_page_start = 41 ; 
$loop_page_end = 50 ; 
}

if ($id_pager >= 51 and $id_pager <= 60 ) { 
$loop_page_start = 51 ; 
$loop_page_end = 60 ; 
}

if ($id_pager >= 61 and $id_pager <= 70 ) { 
$loop_page_start = 61 ; 
$loop_page_end = 70 ; 
}

if ($id_pager >= 71 and $id_pager <= 80 ) { 
$loop_page_start = 71 ; 
$loop_page_end = 80 ; 
}

if ($id_pager >= 81 and $id_pager <= 90 ) { 
$loop_page_start = 81 ; 
$loop_page_end = 90 ; 
}

if ($id_pager >= 91 and $id_pager <= 100 ) { 
$loop_page_start = 91 ; 
$loop_page_end = 100 ; 
}

if ($id_pager >= 101 and $id_pager <= 110 ) { 
$loop_page_start = 101 ; 
$loop_page_end = 110 ; 
}

*/



//////////////////////////// set 
for ($loop_key = 1 ; $loop_key <= 50 ; $loop_key++ ){ 

$id_page_start = $loop_key * 10 ;
$id_page_end = $id_page_start + 10 ;
$id_page_start = $id_page_start + 1 ; 

if ($id_pager >= $id_page_start  and  $id_pager <= $id_page_end ) { 
$loop_page_start = $id_page_start ; 
$loop_page_end = $id_page_end ; 
}

}
//////////////////////////// set  end





////print "<br>loop_page_end = $loop_page_end <br>" ; 

/// end
if ($loop_page_end >= $set_pager_total  ){	$loop_page_end = $set_pager_total ; 	}

////print "<br>loop_page_end = $loop_page_end <br>" ; 
/////////// set rang end
//// for ( $loop_page = 1; $loop_page <= $set_pager_total ; $loop_page ++) {//// loop pager

for ( $loop_page = $loop_page_start ;  $loop_page <= $loop_page_end ; $loop_page ++) {//// loop pager
$this_url = "$set_pager_url"."id_pager=$loop_page&#showpager";

$pager_bg = "#CCCCCC";
if ($loop_page == $id_pager  ) { $pager_bg = "#FF9933" ; } 
?>
<td width="20" align="center" valign="middle" bgcolor="<?=$pager_bg?>" style="width:20px;background-color:<?=$pager_bg?>;"  class="text_normal1">
<?
print "<a href=\"$this_url\"><b>$loop_page</b></a><br>$tag_span" ; 

/*
print "<table width=\"1\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td style=\"padding:0px;background-color:$pager_bg;\">
$tag_span</td></tr></table>"; 
*/


?>
<table width="1" border="0" cellspacing="0" cellpadding="0"><tr><td style="padding:0px;">
<img src="../images/span.gif" width="20" height="1" /></td></tr></table>
</td>
<?
} //// loop pager
?>

<td width="35" align="center" valign="middle" bgcolor="#CCCCCC" style="background-color:#CCCCCC;"  class="text_normal1">
<? 
$id_pager_next = $id_pager + 1 ; 
if ($id_pager == $set_pager_total ) { $id_pager_next = $set_pager_total ;  }
$this_url = "$set_pager_url"."id_pager=$id_pager_next&#showpager";
print "<a href=\"$this_url\">Next</a>" ;  

print "<table width=\"1\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td style=\"padding:0px;background-color:#CCCCCC;\">
<img src=\"../images/span.gif\" width=\"35\" height=\"1\" /></td></tr></table>"; 

?>
</td>
<td width="35" align="center" valign="middle" bgcolor="#CCCCCC"  style="background-color:#CCCCCC;" class="text_normal1">
<? 
$id_pager_next = $id_pager + 1 ; 
$this_url = "$set_pager_url"."id_pager=$set_pager_total&#showpager";
print "<a href=\"$this_url\">Last</a>";  

print "<table width=\"1\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td style=\"padding:0px;background-color:#CCCCCC;\">
<img src=\"../images/span.gif\" width=\"35\" height=\"1\" /></td></tr></table>"; 

?>
</td>

</tr>
</table>

</td>
</tr>
</table>
<?
 ///////////////////////// end pager v1

?>