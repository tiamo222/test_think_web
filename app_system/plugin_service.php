<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){


include("system_application.php");
$system_application = new system_application();

include("system_config.php");
$system_config = new system_config();

include("system_log.php");
$system_log = new system_log();

include("system_user.php");
$system_user = new system_user();









include("app_ads_banner.php");
$app_ads_banner = new app_ads_banner();

include("app_ads_banner_position.php");
$app_ads_banner_position = new app_ads_banner_position();

include("app_ads_banner_match.php");
$app_ads_banner_match = new app_ads_banner_match();




/*
include("app_ads_page.php");
$app_ads_page = new app_ads_page();
*/


include("app_calendar.php");
$app_calendar = new app_calendar();

include("app_category.php");
$app_category = new app_category();

include("app_category_match.php");
$app_category_match = new app_category_match();






include("app_comment_reply.php");
$app_comment_reply = new app_comment_reply();

include("app_content.php");
$app_content = new app_content();

include("app_directory.php");
$app_directory = new app_directory();

include("app_gallery.php");
$app_gallery = new app_gallery();

include("app_gallery_picture.php");
$app_gallery_picture = new app_gallery_picture();






include("app_video.php");
$app_video = new app_video();

include("app_webboard.php");
$app_webboard = new app_webboard();






include("app_member_myaccount.php");
$app_member_myaccount = new app_member_myaccount();

include("app_member_mycategory.php");
$app_member_mycategory = new app_member_mycategory();

include("app_member_mycategory_match.php");
$app_member_mycategory_match = new app_member_mycategory_match();

include("app_member_myconfig.php");
$app_member_myconfig = new app_member_myconfig();

include("app_member_myconfig_option.php");
$app_member_myconfig_option = new app_member_myconfig_option();





include("app_member_mygallery.php");
$app_member_mygallery = new app_member_mygallery();


include("app_member_myprofile.php");
$app_member_myprofile = new app_member_myprofile();




include("info_province.php");
$info_province = new info_province();


include("app_contactus.php");
$app_contactus = new app_contactus();





///////////////////////////////////////////////////////// app_property
include("app_property.php");
$app_property = new app_property();

include("app_property_room.php");
$app_property_room = new app_property_room();



///////////////////////////////////////////////////////// app_shoppingcart
include("app_shoppingcart.php");
$app_shoppingcart = new app_shoppingcart();

include("app_shoppingcart_item.php");
$app_shoppingcart_item = new app_shoppingcart_item();



///////////////////////////////////////////////////////// bidding
include("app_bidding.php");
$app_bidding = new app_bidding();


include("app_bidding_item.php");
$app_bidding_item = new app_bidding_item();




///////////////////////////////////////////////////////// newsletter
include("app_newsletter_email.php");
$app_newsletter_email = new app_newsletter_email();

include("app_newsletter_content.php");
$app_newsletter_content = new app_newsletter_content();


include("app_rating.php");
$app_rating = new app_rating();




?>