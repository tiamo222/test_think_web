<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


	
/*
	ÊÃéÒ§ÇÑ¹·Õèã¹ÃÙ»áººä·Â
	input 2006-02-21 xx:xx:xx
	output 21 ¡ØÁÀÒ¾Ñ¹¸ì 2549 xx:xx:xx
*/

function function_datetime_dbtoshow_full($datetime){
if ($datetime =="0000-00-00 00:00:00"  or  $datetime =="" ) {
$result_datetime = "" ; 
} else {
/// $thaimonthFull = $GLOBALS['thaimonthFull'];
$get_year=substr($datetime,"0","4");  
$get_month=substr($datetime,"5","2");   	
$get_day = substr($datetime,"8","2"); 
$get_day = (integer)$get_day ; 
$get_time = substr($datetime,"11","8");	
$get_year = $get_year+543 ;

/// print "get_month = $get_month "; 

$result_month = function_get_monthname($get_month); 	
$get_month_th_full = $result_month["month_th_full"];


/// $result_month = $thaimonthFull[$get_month-1] ; 				
$result_datetime = "$get_day $get_month_th_full $get_year  $get_time ¹." ; 	
} 
return  $result_datetime ;

}	




function function_datetime_dbtoshow_full_en($datetime){
if ($datetime =="0000-00-00 00:00:00"  or  $datetime =="" ) {
$result_datetime = "" ; 
} else {
/// $thaimonthFull = $GLOBALS['thaimonthFull'];
$get_year=substr($datetime,"0","4");  
$get_month=substr($datetime,"5","2");   	
$get_day = substr($datetime,"8","2"); 
$get_day = (integer)$get_day ; 
$get_time = substr($datetime,"11","8");	
///$get_year = $get_year+543 ;

/// print "get_month = $get_month "; 

$result_month = function_get_monthname($get_month); 	
$get_month_th_full = $result_month["month_en_full"];


/// $result_month = $thaimonthFull[$get_month-1] ; 				
$result_datetime = "$get_day $get_month_th_full $get_year  $get_time " ; 	
} 
return  $result_datetime ;

}	


function function_date_dbtoshow_full_en($datetime){
if ($datetime =="0000-00-00 00:00:00"  or  $datetime =="" ) {
$result_datetime = "" ; 
} else {
/// $thaimonthFull = $GLOBALS['thaimonthFull'];
$get_year=substr($datetime,"0","4");  
$get_month=substr($datetime,"5","2");   	
$get_day = substr($datetime,"8","2"); 
$get_day = (integer)$get_day ; 
$get_time = substr($datetime,"11","8");	
///$get_year = $get_year+543 ;

/// print "get_month = $get_month "; 

$result_month = function_get_monthname($get_month); 	
$get_month_th_full = $result_month["month_en_full"];


/// $result_month = $thaimonthFull[$get_month-1] ; 				
$result_datetime = "$get_day $get_month_th_full $get_year" ; 	
} 
return  $result_datetime ;

}	












/*
	ÊÃéÒ§ÇÑ¹·Õèã¹ÃÙ»áººä·Â
	input 2006-02-21 xx:xx:xx
	output 21 ¡.¾. 2549 xx:xx:xx
*/
function function_datetime_dbtoshow_mini($datetime){

if ($datetime =="0000-00-00 00:00:00"  or  $datetime =="" ) {
$result_datetime = "" ; 
} else {

///$thaimonthFull = $GLOBALS['thaimonth'];
$get_year=substr($datetime,"0","4");
$get_month=substr($datetime,"5","2");			
$get_day = substr($datetime,"8","2");
$get_day = (integer)$get_day ; 			
$get_time = substr($datetime,"11","8");			
$get_year = $get_year+543;

//// $result_month = $thaimonthFull[$get_month-1] ; 		

$result_month = function_get_monthname($get_month); 	
$month_th_mini = $result_month["month_th_mini"];

$result_datetime = "$get_day $month_th_mini $get_year  $get_time ¹." ; 

} 

return  $result_datetime ;
}	
	
/*
	ÊÃéÒ§ÇÑ¹·Õèã¹ÃÙ»áººä·Â
	input 2006-02-21 xx:xx:xx
	output 21 ¡.¾. 2549 xx:xx:xx
*/
function function_date_dbtoshow_mini($datetime){

if ($datetime =="0000-00-00 00:00:00"  or  $datetime =="" ) {
$result_datetime = "" ; 
} else {

//// $thaimonthFull = $GLOBALS['thaimonth'];
$get_year=substr($datetime,"0","4");
$get_month=substr($datetime,"5","2");			
$get_day = substr($datetime,"8","2");
$get_day = (integer)$get_day ; 			
$get_time = substr($datetime,"11","8");			
$get_year = $get_year+543;

/// $result_month = $thaimonthFull[$get_month-1] ; 

//// $result_month = $thaimonthFull[$get_month-1] ; 

$result_month = function_get_monthname($get_month); 	
$month_th_mini = $result_month["month_th_mini"];

$result_datetime = "$get_day $month_th_mini $get_year" ; 	

} /// else { 
return  $result_datetime ;

}	



function function_date_dbtoshow_full($datetime){

if ($datetime =="0000-00-00 00:00:00"  or  $datetime =="" ) {
$result_datetime = "" ; 
} else {

//// $thaimonthFull = $GLOBALS['thaimonthFull'];
///$thaimonthFull = $GLOBALS['thaimonth'];
$get_year=substr($datetime,"0","4");
$get_month=substr($datetime,"5","2");			
$get_day = substr($datetime,"8","2");
$get_day = (integer)$get_day ; 			
$get_time = substr($datetime,"11","8");			
$get_year = $get_year+543;

///$result_month = function_get_monthname($get_month) ; 		


$result_month = function_get_monthname($get_month); 	
$month_th_full = $result_month["month_th_full"];

$result_datetime = "$get_day $month_th_full $get_year" ; 	

} /// else { 
return  $result_datetime ;

}	






/////////////////////////////////////////////////////////////////////////////////   jack start
	
function function_daysinmonth($month, $year)
{
    $days=31;
    while(!checkdate($month, $days, $year)) $days--;
    return $days;
}



function function_get_monthname( $month_id ) {

$month_th_full = "" ; 
$month_th_mini = "" ;
$month_en_full = "" ; 
$month_en_mini = "" ;

if ($month_id == "01"  or $month_id==1  ) { 
$month_th_full = "Á¡ÃÒ¤Á"; 
$month_th_mini = "Á.¤."; 
$month_en_full = "January";  
$month_en_mini = "Jan.";  
}

if ($month_id == "02"  or $month_id==2 ) { 
$month_th_full = "¡ØÁÀÒ¾Ñ¹¸ì" ;  
$month_th_mini = "¡.¾."; 
$month_en_full = "Febraury";  
$month_en_mini = "Feb.";  
}

if ($month_id == "03"  or $month_id==3 ) { 
$month_th_full = "ÁÕ¹Ò¤Á"; 
$month_th_mini = "ÁÕ.¤."; 
$month_en_full = "March";  
$month_en_mini = "Mar.";  
}

if ($month_id == "04"  or $month_id==4 ) { 
$month_th_full = "àÁÉÒÂ¹";
$month_th_mini = "àÁ.Â."; 
$month_en_full = "April";  
$month_en_mini = "Apri.";  
}

if ($month_id == "05"  or $month_id==5 ) { 
$month_th_full = "¾ÄÉÀÒ¤Á";
$month_th_mini = "¾.¤."; 
$month_en_full = "May";  
$month_en_mini = "May.";  
}


if ($month_id == "06"  or $month_id==6 ) { 
$month_th_full = "ÁÔ¶Ø¹ÒÂ¹" ;  
$month_th_mini = "ÁÔ.Â."; 
$month_en_full = "June";  
$month_en_mini = "Jun.";  
}

if ($month_id == "07"  or $month_id==7 ) { 
$month_th_full = "¡Ã¡®Ò¤Á";  
$month_th_mini = "¡.¤."; 
$month_en_full = "July";  
$month_en_mini = "July.";  
}

if ($month_id == "08"  or $month_id==8 ) { 
$month_th_full = "ÊÔ§ËÒ¤Á";  
$month_th_mini = "Ê.¤."; 
$month_en_full = "August";  
$month_en_mini = "Aug.";  
}

if ($month_id == "09"  or $month_id==9 ) { 
$month_th_full = "¡Ñ¹ÂÒÂ¹"; 
$month_th_mini = "¡.Â."; 
$month_en_full = "September";  
$month_en_mini = "Sep.";  
}

if ($month_id == "10") { 
$month_th_full = "µØÅÒ¤Á";
$month_th_mini = "µ.¤."; 
$month_en_full = "October";  
$month_en_mini = "Oct.";  
}

if ($month_id == "11") { 
$month_th_full = "¾ÄÈ¨Ô¡ÒÂ¹" ;  
$month_th_mini = "¾.Â."; 
$month_en_full = "November";  
$month_en_mini = "Nov.";  
}

if ($month_id == "12") { 
$month_th_full = "¸Ñ¹ÇÒ¤Á" ;  
$month_th_mini = "¸.¤."; 
$month_en_full = "December";  
$month_en_mini = "Dec.";  
}


$result_return = array(
"month_th_full"=>"$month_th_full" , 
"month_th_mini"=>"$month_th_mini" , 
"month_en_full"=>"$month_en_full" , 
"month_en_mini"=>"$month_en_mini" , 
);
return $result_return ;

}



function function_get_weekname( $input_day_id ) {
$week_name = "" ; 

if ($input_day_id == "1") { 
$week_name_th_full = "¨Ñ¹·Ãì" ;  
$week_name_th_mini = "¨." ;  
$week_name_en_full = "Monday" ;  
$week_name_en_mini = "Mo" ;  
}

if ($input_day_id == "2") { 
$week_name_th_full = "ÍÑ§¤ÒÃ" ;  
$week_name_th_mini = "Í." ;  
$week_name_en_full = "Tuesday" ;  
$week_name_en_mini = "Tu" ;  
}

if ($input_day_id == "3") { 
$week_name_th_full = "¾Ø¸" ;  
$week_name_th_mini = "¾." ;  
$week_name_en_full = "Wednesday" ;  
$week_name_en_mini = "We" ;  
}

if ($input_day_id == "4") { 
$week_name_th_full = "¾ÄËÑÊº´Õ" ;  
$week_name_th_mini = "¾Ä." ;  
$week_name_en_full = "Thursday" ;  
$week_name_en_mini = "Thu" ;  
}

if ($input_day_id == "5") { 
$week_name_th_full = "ÈØ¡Ãì" ;  
$week_name_th_mini = "È." ;  
$week_name_en_full = "Friday" ;  
$week_name_en_mini = "Fri." ;  
}

if ($input_day_id == "6") { 
$week_name_th_full = "àÊÒÃì" ;  
$week_name_th_mini = "Ê." ;  
$week_name_en_full = "Saturday" ;  
$week_name_en_mini = "Sat." ;  
}

if ($input_day_id == "7") { 
$week_name_th_full = "ÍÒ·ÔµÂì" ;  
$week_name_th_mini = "ÍÒ." ;  
$week_name_en_full = "Sunday" ;  
$week_name_en_mini = "Sun." ;  
}

$input_array = array(
"week_name_th_full"=>$week_name_th_full , 
"week_name_th_mini"=>$week_name_th_mini , 
"week_name_en_full"=>$week_name_en_full , 
"week_name_en_mini"=>$week_name_en_mini , 
);
return $input_array ;

}





	function daysinmonth($month, $year)
{
    $days=31;
    while(!checkdate($month, $days, $year)) $days--;
    return $days;
}


function fc_month_th_nn( $input_month_xx ) {
$show_month_name = "" ; 

if ($input_month_xx == "01") { $show_month_name = "Á¡ÃÒ¤Á" ;  }
if ($input_month_xx == "02") { $show_month_name = "¡ØÁÀÒ¾Ñ¹¸ì" ;  }
if ($input_month_xx == "03") { $show_month_name = "ÁÕ¹Ò¤Á" ;  }
if ($input_month_xx == "04") { $show_month_name = "àÁÉÒÂ¹" ;  }
if ($input_month_xx == "05") { $show_month_name = "¾ÄÉÀÒ¤Á" ;  }

if ($input_month_xx == "06") { $show_month_name = "ÁÔ¶Ø¹ÒÂ¹" ;  }
if ($input_month_xx == "07") { $show_month_name = "¡Ã¡®Ò¤Á" ;  }
if ($input_month_xx == "08") { $show_month_name = "ÊÔ§ËÒ¤Á" ;  }
if ($input_month_xx == "09") { $show_month_name = "¡Ñ¹ÂÒÂ¹" ;  }
if ($input_month_xx == "10") { $show_month_name = "µØÅÒ¤Á" ;  }

if ($input_month_xx == "11") { $show_month_name = "¾ÄÈ¨Ô¡ÒÂ¹" ;  }
if ($input_month_xx == "12") { $show_month_name = "¸Ñ¹ÇÒ¤Á" ;  }

return $show_month_name ;

}







function dateDiv($t1,$t2){ // Êè§ÇÑ¹·Õè·ÕèµéÍ§¡ÒÃà»ÃÕÂºà·ÕÂº ã¹ÃÙ»áºº ÁÒµÃ°Ò¹ 2006-03-27 21:39:12

    $t1Arr=splitTime($t1);
    $t2Arr=splitTime($t2);
   
    $Time1=mktime($t1Arr["h"], $t1Arr["m"], $t1Arr["s"], $t1Arr["M"], $t1Arr["D"], $t1Arr["Y"]);
    $Time2=mktime($t2Arr["h"], $t2Arr["m"], $t2Arr["s"], $t2Arr["M"], $t2Arr["D"], $t2Arr["Y"]);
    $TimeDiv=abs($Time2-$Time1);

	$Time["MAX"]=$TimeDiv; //  ¨Ó¹Ç¹ÇÑ¹
    $Time["D"]=intval($TimeDiv/86400); //  ¨Ó¹Ç¹ÇÑ¹
    $Time["H"]=intval(($TimeDiv%86400)/3600); // ¨Ó¹Ç¹ ªÑèÇâÁ§
    $Time["M"]=intval((($TimeDiv%86400)%3600)/60); // ¨Ó¹Ç¹ ¹Ò·Õ
    $Time["S"]=intval(((($TimeDiv%86400)%3600)%60)); // ¨Ó¹Ç¹ ÇÔ¹Ò·Õ
 return $Time;
}

 

function splitTime($time){ // àÇÅÒã¹ÃÙ»áºº ÁÒµÃ°Ò¹ 2006-03-27 21:39:12 
 $timeArr["Y"]= substr($time,2,2);
 $timeArr["M"]= substr($time,5,2);
 $timeArr["D"]= substr($time,8,2);
 $timeArr["h"]= substr($time,11,2);
 $timeArr["m"]= substr($time,14,2);
    $timeArr["s"]= substr($time,17,2);
 return $timeArr;
}











?>