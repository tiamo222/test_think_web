<?
/*###Include ##########################################*/
include("../app_system/system_connection.php"); 




$content_id_name = "contactus";
include("../content/inc_content_viewbyid.php"); 



/// appaction start

if (empty($_REQUEST["appaction"]) )  {  $appaction="";  } else { $appaction=$_REQUEST["appaction"];  }
if (empty($_REQUEST["show_status"]) )  {  $show_status="";  } else { $show_status=$_REQUEST["show_status"];  }


if ($appaction == "submit") {
	

///$contact_type = "type_contactus"; 
$option_read = "none"; 
$option_reply = "none"; 
$option_status = "on"; 

///////// check request

if (empty($_REQUEST["contact_type"]) ) 			{  $contact_type="";  } else { $contact_type=$_REQUEST["contact_type"];  }
if (empty($_REQUEST["contact_subject"]) ) 		{  $contact_subject="";  } else { $contact_subject=$_REQUEST["contact_subject"];  }
if (empty($_REQUEST["contact_des"]) )  			{  $contact_des="";  } else { $contact_des=$_REQUEST["contact_des"];  }
if (empty($_REQUEST["contact_detail"]) )  		{  $contact_detail="";  } else { $contact_detail=$_REQUEST["contact_detail"];  }

if (empty($_REQUEST["contact_name"]) )  		{  $contact_name="";  } else { $contact_name=$_REQUEST["contact_name"];  }
if (empty($_REQUEST["contact_phone"]) )  		{  $contact_phone="";  } else { $contact_phone=$_REQUEST["contact_phone"];  }
if (empty($_REQUEST["contact_mobile"]) )  		{  $contact_mobile="";  } else { $contact_mobile=$_REQUEST["contact_mobile"];  }
if (empty($_REQUEST["contact_email"]) )  		{  $contact_email="";  } else { $contact_email=$_REQUEST["contact_email"];  }
if (empty($_REQUEST["contact_address"]) )  	{  $contact_address="";  } else { $contact_address=$_REQUEST["contact_address"];  }


///////// check input
/// system_id
/// category_id_root
/// category_name


$show_status = "success";


if ($contact_name == "" ) {
$show_status = "error";
$array_report_error[] = "- Input Your name / กรุณาระบุ ชื่อและนามสกุล ของท่าน"; 
}


if ($contact_phone == "" ) {
$show_status = "error";
$array_report_error[] = "- Input Your Phone number  /กรุณาระบุ เบอร์โทรศัพท์เพื่อติดต่อกลับ "; 
}


if ($contact_subject == "" ) {
$show_status = "error";
$array_report_error[] = "-  Input  Subject / กรุณาระบุ เรื่องที่ติดต่อ "; 
}

if ($contact_detail == "" ) {
$show_status = "error";
$array_report_error[] = "-   Input  Detail / กรุณาระบุ รายละเอียด "; 
}




if ($show_status == "success" ){ 


$input_array = array(
"contact_type"=>"type_contactus" , 
"category_id"=>"$category_id" , 

"contact_subject"=>"$contact_subject" , 
"contact_des"=>"$contact_des" , 
"contact_detail"=>"$contact_detail" , 

"contact_name"=>"$contact_name" , 
"contact_phone"=>"$contact_phone" , 
"contact_mobile"=>"$contact_mobile" , 
"contact_email"=>"$contact_email" , 
"contact_address"=>"$contact_address" , 
"contact_by_member_id"=>"$contact_by_member_id" , 

"option_read"=>"$option_read" , 
"option_reply"=>"$option_reply" , 
"option_status"=>"$option_status" , 

"user_update"=>"$user_update" , 
"ipaddress_post"=>"$ipaddress_post" , 
"datetime_now"=>"$datetime_now" , 
);
$result_update = $app_contactus->function_update( $input_array );

$show_status = $result_update["show_status"];
//// $category_id = $result_update["category_id"];

} ///if ($process_check_input == "success" ){ 

/// print "show_status = $show_status ";

if ($show_status == "success" ){ 
header("Location:index.php?show_status=$show_status"); 
} 

} //// if ($appaction == "update_information") {
////////////////////////############## PROCESS UPDATE  END

///appaction end







/// ##################################### banner
$input_page_id = "/contactus/index.php"; 
$input_sql_other = ""; 
include("../banner/inc_adsbanner.php"); 
/// ##################################### banner end






////////// config by process

$config_inc_page_content = "index_inc_page.php"; 

////////// config by page
$config_sitetitle = "$config_sitetitle :: แบบฟอร์มติดต่อสอบถาม"; 




$langurl = "?"; 

////////// output
include("$path_app_design/page_content.php"); 


?>
<? $db->Close();?>