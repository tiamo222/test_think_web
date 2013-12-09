<?


/*
$category_code = "activity";
$this_config_path_index = "../activity";
$this_config_path_detail = "../activity/detail.php";
*/



if ($category_code != ""  ) { 
$input_array = array(
"sql_other"=>"  AND  category_code = '$category_code'  " , 
);
///$rs_category1 = $app_category>function_viewbyid( $input_array2 );
$rs_category1 = $app_category->function_viewbyid_sql( $input_array );
if ($rs_category1 ) {	
$category_id = $rs_category1["category_id"];
$category_name = $rs_category1["category_name"];
$category_name_lang2 = $rs_category1["category_name_lang2"];
$category_name_lang3 = $rs_category1["category_name_lang3"];
$category_name_lang4 = $rs_category1["category_name_lang4"];
$category_name_lang5 = $rs_category1["category_name_lang5"];
}////
}////if ($category_code != ""  ) { 


if($get_language_key == 1 ){ $category_name = $category_name ; }
if($get_language_key == 2 ){ $category_name = $category_name_lang2 ; }
if($get_language_key == 3 ){ $category_name = $category_name_lang3 ; }
if($get_language_key == 4 ){ $category_name = $category_name_lang4 ; }
if($get_language_key == 5 ){ $category_name = $category_name_lang5 ; }


$category_id_this = $category_id ;






/// get_language_key
/// if ($get_language_key ==2 ){ $sql_lang = " and  option_lang$get_language_key = 'on' "; }

///option_order

///////////////// content
$input_array1 = array(
"sql_orderby"=>" ORDER BY datetime_create  DESC " ,
"category_id"=>"$category_id_this" , 
"option_highlight"=>"highlight" , 
"option_status"=>"on" , 

"set_pager_limit"=>"$this_config_set_pager_limit1" , 
"sql_other"=>" and  option_lang$get_language_key = 'on' " , 
);
$content_count_row1 = $app_content->function_countbyset( $input_array1 );


$input_array2 = array(
"sql_orderby"=>" ORDER BY datetime_create  DESC " ,
"category_id"=>"$category_id_this" , 
"option_highlight"=>"none" , 
"option_status"=>"on" , 

"set_pager_limit"=>"$this_config_set_pager_limit2" , 
"sql_other"=>" and  option_lang$get_language_key = 'on' " , 
);
$content_count_row2 = $app_content->function_countbyset( $input_array2 );

$content_count_row = $content_count_row1 + $content_count_row2 ; 
if ( $category_id_this == "" ){$content_count_row = 0 ; }


if ($content_count_row > 0  ){ 


?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top" style="background-image:url(../images/design_think/barm3.gif)"><table border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="1"  style="background-image:url(../images/design_think/barm2.gif)"><img src="../images/design_think/barm2.gif" width="2" height="39" /></td>
          <td width="300" align="left" valign="top" class="bot1" style="background-image:url(../images/design_think/barm2.gif); padding-left:10px; padding-top:8px;"><a href="<?=$this_config_path_index?>"><font color="#FFFFFF">
            <?=$category_name ?>
          </font></a></td>
          <td width="1" valign="top" style="background-image:url(../images/design_think/barm2.gif)"><img src="../images/design_think/barm1.gif" width="24" height="39" /></td>
        </tr>
    </table></td>
  </tr>
</table>
<?
////////////////////////////// Highlight topic
if ($content_count_row1 > 0 ){
?>
<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><img src="../images/span.gif" width="100" height="10" /></td>
</tr>
</table>


<?




$content_result = $app_content->function_viewbyset( $input_array1 ); /// select ข้อมูล

$content_loop = 0 ;
while($content_rs = $content_result->FetchRow()){ /////// loop 
$content_loop = $content_loop + 1  ;

///////////////// set value
$content_id = $content_rs["content_id"];

if($get_language_key == 1 ){
$content_name = $content_rs["content_name"];
$content_des = $content_rs["content_des"];
}

if($get_language_key == 2 ){
$content_name = $content_rs["content_name_lang2"];
$content_des = $content_rs["content_des_lang2"];
}

if($get_language_key == 3 ){
$content_name = $content_rs["content_name_lang3"];
$content_des = $content_rs["content_des_lang3"];
}

if($get_language_key == 4 ){
$content_name = $content_rs["content_name_lang4"];
$content_des = $content_rs["content_des_lang4"];
}

if($get_language_key == 5 ){
$content_name = $content_rs["content_name_lang5"];
$content_des = $content_rs["content_des_lang5"];
}



$content_image_mini = $content_rs["content_image_mini"];

$content_image_mini_show = ""; 	
$content_image_mini_show = "<img src=\"../images/icon/nopic.gif\"  width=\"100\"  border=0 />"; 	
if ($content_image_mini != "" ){
$content_image_mini_show = "<img src=\"$path_content$content_image_mini\"     width=\"100px\" border=0 />"; 	
}

?>
            
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
  <?
if ($content_image_mini_show != "" ){ 
?>
                <td width="50" align="center" valign="top" style="padding:2px"><table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" style="background-color:#E7E2D5;">
                  <tr>
                    <td bgcolor="#FFFFFF">
                    <a href="<?=$this_config_path_detail?>?id=<?=$content_id ?>">
                      <?=$content_image_mini_show?>
                      </a></td>
                    </tr>
                </table></td>
                <?
} ////level1_category_image_mini
?>
                <td align="left" valign="middle" class="text2" style="padding-left:10px;">
                <a href="<?=$this_config_path_detail?>?id=<?=$content_id ?>"> <font color="#333333"> <b>
                  <?=$content_name ?>
                  </b>  </font><br />
                 <font color="#666666"> <?=$content_des ?>
                </font>
                
               <br> <img src="../images/icon/icon_more.jpg" hspace="0" vspace="0" border="0" align="absmiddle" /><span class="text2"> more detail </span>
                </a>
                
                
                </td>
              </tr>
            </table>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
              <tr>
                <td style="background-image:url(../images/design_agency4/content_bg_dot.gif)"><img src="../images/design_agency4/content_bg_dot.gif" width="64" height="5" /></td>
              </tr>
            </table>
<?

} /// content loop
} /// content count

////////////////////////////// Highlight topic end

?>
            


<?
//////////////////////////////////// normal topic
if ($content_count_row2 > 0 ){
?>
<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><img src="../images/span.gif" width="100" height="10" /></td>
</tr>
</table>


<?




$content_result = $app_content->function_viewbyset( $input_array2 ); /// select ข้อมูล

$content_loop = 0 ;
while($content_rs = $content_result->FetchRow()){ /////// loop 
$content_loop = $content_loop + 1  ;

///////////////// set value
$content_id = $content_rs["content_id"];

if($get_language_key == 1 ){
$content_name = $content_rs["content_name"];
$content_des = $content_rs["content_des"];
}

if($get_language_key == 2 ){
$content_name = $content_rs["content_name_lang2"];
$content_des = $content_rs["content_des_lang2"];
}

if($get_language_key == 3 ){
$content_name = $content_rs["content_name_lang3"];
$content_des = $content_rs["content_des_lang3"];
}

if($get_language_key == 4 ){
$content_name = $content_rs["content_name_lang4"];
$content_des = $content_rs["content_des_lang4"];
}

if($get_language_key == 5 ){
$content_name = $content_rs["content_name_lang5"];
$content_des = $content_rs["content_des_lang5"];
}



$content_image_mini = $content_rs["content_image_mini"];

$content_image_mini_show = ""; 	
////$content_image_mini_show = "<img src=\"../images/design_agency/pic3.jpg\"  width=\"108\" height=\"94\" border=0 />"; 	
if ($content_image_mini != "" ){
$content_image_mini_show = "<img src=\"$path_content$content_image_mini\"   border=0  width=\"150px\" />"; 	
}

?>
            
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>

                <td width="1" align="center" valign="top" style="padding:2px"><img src="../images/icon/icon_blank.gif" /></td>
      
                <td align="left" valign="middle" class="text2" style="padding-left:5px;">
                <a href="<?=$this_config_path_detail?>?id=<?=$content_id ?>"> <font color="#333333">
                  <?=$content_name ?>
                
                  
                </font></a></td>
              </tr>
            </table>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="4">
              <tr>
                <td style="background-image:url(../images/design_agency4/content_bg_dot.gif)"><img src="../images/design_agency4/content_bg_dot.gif" width="64" height="5" /></td>
              </tr>
            </table>
<?

} /// content loop
} /// content count


//////////////////////////////////// normal topic end
?>
            




            
 <?
 
print "<br><br>";
 
 }//// if ($content_count_row1 > 0 ){
 
 ?>      
            
            
            
            
  